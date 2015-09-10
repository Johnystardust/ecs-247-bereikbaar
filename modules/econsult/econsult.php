<?php

class econsultModule {

	function __construct() {

		add_action( 'template_redirect', array( &$this, 'ecs_econsult_confirmation_redirect') );
		add_filter( 'the_content', array( &$this, 'ecs_econsult_module_content_filter') );
		add_action( 'init', array( &$this, 'ecs_econsult_register_post_types' ) );
		add_action( 'get_header', array( &$this, 'ecs_econsult_acf_form_head' ) );
		add_filter( 'acf/pre_save_post' , array( &$this, 'ecs_change_post_title' ), 10, 1 );
		add_action( 'acf/save_post', array( &$this, 'ecs_send_notifications' ), 20 );
		add_filter( 'comment_post_redirect', array( &$this, 'ecs_comment_redirect' ) );

	}

	function ecs_econsult_confirmation_redirect() {

		if( isset( $_GET[ 'econsult_sent' ] ) && get_field( 'econsult_confirmation_page', 'options' ) ){
			wp_redirect( get_permalink( get_field( 'econsult_confirmation_page', 'options' ) ) );
			exit();
		}
		
	}

	function ecs_econsult_module_content_filter( $content ) {

		$page = get_field('option_emailconsule_page', 'option');

		if( is_page( $page->ID ) ):

			ob_start();

			if ( is_page_template( 'page-full.php' ) ) {

				echo '<section class="section content">

						<div class="wrap">

							<div class="section-content" style="padding-top: 0;">';

			}

		    if( !isset( $_GET[ 'econsult_sent' ] ) ){

				get_template_part( 'modules/econsult/parts/form' );

			} else {

				get_template_part( 'modules/econsult/parts/confirmation' );

			}

			if ( is_page_template( 'page-full.php' ) ) {

				echo '</div>

						</div>

							</section>';

			}

			return ob_get_clean();

		elseif( is_single() && 'econsult' == get_post_type() ):

			ob_start();

			$guid_in_post = get_field( 'econsult_guid' );

			if( isset( $_GET[ 'guid' ] ) && $_GET[ 'guid' ] == $guid_in_post ):

				get_template_part( 'modules/econsult/parts/single-econsult' );

			else:

				get_template_part( 'modules/econsult/parts/single-not-allowed' );

			endif;

			return ob_get_clean();

		else:

			return $content;

		endif;

	}

	function ecs_econsult_register_post_types(){

		register_post_type(
			'econsult',
			array(
				'labels' => array(
					'name'               => __( 'E-consult'),
			        'singular_name'      => __( 'E-consult'),
			        'menu_name'          => __( 'E-consult'),
			        'name_admin_bar'     => __( 'E-consult'),
			        'add_new'            => __( 'Nieuw e-consult'),
			        'add_new_item'       => __( 'Nieuw e-consult'),
			        'edit_item'          => __( 'E-consult bewerken'),
			        'new_item'           => __( 'Nieuwe e-consult'),
			        'view_item'          => __( 'Bekijk e-consult'),
			        'search_items'       => __( 'Zoek e-consult'),
			        'not_found'          => __( 'Geen e-consult\'s gevonden'),
			        'not_found_in_trash' => __( 'Geen e-consult\'s gevonden in' ),
			        'all_items'          => __( 'Alle e-consult\'s ' ),
			        'parent_item'        => __( 'Parent e-consult' ),
			        'parent_item_colon'  => __( 'Parent e-consult:' ),
			        'archive_title'      => __( 'E-consult\'s'),
				),
				'public' 			=> true,
				'has_archive' 		=> false,
				'hierarchical' 		=> false,
				'exclude_from_search' => true,
				'show_ui' 			=> true,
				'menu_icon'			=> 'dashicons-heart',
				'supports' 			=> array( 'title', 'editor', 'comments' )
			)
		);

		register_taxonomy(
		    'econsult_category',
		    'econsult',
			array(
				'label' => __( 'Categorieën' ),
				'rewrite' => array( 'slug' => 'econsult-categorie' ),
				'hierarchical' => true,
			));

		acf_add_options_sub_page(array(
	        'title' 		=> 'Instellingen e-consult',
	        'parent' 		=> 'edit.php?post_type=econsult',
	        'capability' 	=> 'manage_options'
	    ));

	}

	function ecs_econsult_acf_form_head(){

		$page = get_field('option_emailconsule_page', 'option');

		if( is_page( $page->ID ) ){

			acf_form_head();

		}

	}

	function ecs_change_post_title( $post_id ){

		// We kunnen niet checken op $post_id = 'new_post' (hook is te laat)
		// Maar het enige wat dat form kan is nieuwe posts creeren
		// Dus kunnen we wel de post updaten
		$post_object = get_post( $post_id );

		if( !is_admin() && 'econsult' == $post_object->post_type ){

		    // Zo nee, dan creeren we een nieuwe post
		    $post = array(
		    	'ID'		  => $post_id,
		        'post_title'  => __( 'Consult: #', 'ecs-corporate' ) . $post_id . ' - ' . $_POST[ 'acf' ][ 'field_54c8fc316e997' ] . ', ' . $_POST[ 'acf' ][ 'field_54c8fc136e996' ],
		        'post_name'	  => 'consult-' . $post_id
		    );

		    // Nu moeten we nog een GUID genereren!
		    $_POST[ 'acf' ][ 'field_54c9fd4c2924f' ] = uniqid();

		    // Inserten hem
		    $post_id = wp_update_post( $post );

		}

	    // En geven hem terug
	    return $post_id;

	}

	function ecs_send_notifications( $post_id ){

		$post_object = get_post( $post_id );

		/**
		 * Check of het niet in de admin is, wel een econsult is, maar niet het initiele formulier
		 **/

		if( !is_admin() && 'econsult' == $post_object->post_type && get_comments_number() == 0 ){

			/**
			 *
			 * Email to sender
			 *
			 **/

			$email_to_sender_info = array(
				'emailaddress'	=> sanitize_email( $_POST[ 'acf' ][ 'field_54c8fc7c6e99a' ] ),
				'first_name' 	=> $_POST[ 'acf' ][ 'field_54c8fc136e996' ],
				'last_name' 	=> $_POST[ 'acf' ][ 'field_54c8fc316e997' ],
				'consult_link'	=> add_query_arg(
					array(
						'guid' => $_POST[ 'acf' ][ 'field_54c9fd4c2924f' ],
						'emailaddress' => urlencode( sanitize_email( $_POST[ 'acf' ][ 'field_54c8fc7c6e99a' ] ) ),
						'fullname' => urlencode( $_POST[ 'acf' ][ 'field_54c8fc136e996' ] . ' ' . $_POST[ 'acf' ][ 'field_54c8fc316e997' ] )
					),
					get_permalink( $post_id )
				)
			);

			if( get_field( 'econsult_email_to_sender', 'options' ) ){
				$email_to_sender_info[ 'message' ] = get_field( 'econsult_email_to_sender', 'options' );
			} else {
				$email_to_sender_info[ 'message' ] = __( 'Uw consult is succesvol geplaatst en zal z.s.m door een professional worden behandeld. U kunt uw consult via de volgende beveiligde link bekijken. Verstrek deze link niet aan anderen! ', 'ecs-corporate' );
			}

			$email_to_sender_info[ 'message' ] .= $this->ecs_format_link( $email_to_sender_info[ 'consult_link' ] );

			/**
			 *
			 * Email to admin
			 *
			 **/

			$email_to_admin_info = array(
				'first_name' 	=> $_POST[ 'acf' ][ 'field_54c8fc136e996' ],
				'last_name' 	=> $_POST[ 'acf' ][ 'field_54c8fc316e997' ],
				'consult_link'	=> add_query_arg(
					array(
						'guid' => $_POST[ 'acf' ][ 'field_54c9fd4c2924f' ],
						'emailaddress' => urlencode( sanitize_email( $_POST[ 'acf' ][ 'field_54c8fc7c6e99a' ] ) ),
						'fullname' => urlencode( $_POST[ 'acf' ][ 'field_54c8fc136e996' ] . ' ' . $_POST[ 'acf' ][ 'field_54c8fc316e997' ] )
					),
					get_permalink( $post_id )
				)
			);

			if( get_field( 'econsult_admin_emailaddress', 'options' ) ){
				$email_to_admin_info[ 'emailaddress' ] = get_field( 'econsult_admin_emailaddress', 'options' );
			} else {
				$email_to_admin_info[ 'emailaddress' ] = get_option( 'admin_email' );
			}

			if( get_field( 'econsult_email_to_admin', 'options' ) ){
				$email_to_admin_info[ 'message' ] = get_field( 'econsult_email_to_admin', 'options' );
			} else {
				$email_to_admin_info[ 'message' ] = __( 'Er is een nieuw consult voor u geplaatst. Bekijk dit via de volgende link. Deze link is persoonlijk en dient niet aan anderen verstrekt te worden. ', 'ecs-corporate' );
			}

			$email_to_admin_info[ 'message' ] .= $this->ecs_format_link( $email_to_admin_info[ 'consult_link' ] );

			/**
			 *
			 * Time to email
			 *
			 **/

			add_filter( 'wp_mail_content_type', array( &$this, 'set_html_content_type' ) );

			// E-mail to sender
			$headers[] = 'From: '.get_option( 'blogname' ).' <'.$email_to_sender_info[ 'emailaddress' ].'>';
			$subject = __( 'Consult succesvol aangemaakt!', 'ecs-corporate' );
			wp_mail( $email_to_sender_info[ 'emailaddress' ], $subject, $this->ecs_wrap_message( $email_to_sender_info[ 'message' ] ), $headers );

			// E-mail to admin
			$headers[] = 'From: '.$email_to_admin_info[ 'first_name' ].' '.$email_to_admin_info[ 'last_name' ].' <'.$email_to_admin_info[ 'emailaddress' ].'>';
			$subject = __( 'Nieuw e-consult!', 'ecs-corporate' );
			wp_mail( $email_to_admin_info[ 'emailaddress' ], $subject, $this->ecs_wrap_message( $email_to_admin_info[ 'message' ] ), $headers );

			remove_filter( 'wp_mail_content_type', array( &$this, 'set_html_content_type' ) );

		}

	}

	function ecs_comment_redirect( $location ){

		$post_object = get_post( $_POST[ 'comment_post_ID' ] );

		if( 'econsult' == $post_object->post_type ){

			/**
			 * Mail actie naar verzender
			 *
			 * 1. Is het de dokter of patient?
			 * 2. Stuur een update naar de ander
			 * 3. Gebruik het options 'update' veld!
			 **/

			global $current_user;

			// Als de user ingelogd is, is het de dokter, tenzij die per ongeluk niet ingelogd is.
			// Dan controleren of e-mail hetzelfde is als admin e-mail.

			if( is_user_logged_in() || !$_POST[ 'email' ] ){

				// Ontvanger: patient!
				$recipient 	= sanitize_email( get_field( 'econsult_emailaddress', $_POST[ 'comment_post_ID' ] ) );
				$from 		= sanitize_email( get_field( 'econsult_admin_emailaddress', 'options' ) );

			} else {

				// Ontvanger: dokter!
				$recipient 	= sanitize_email( get_field( 'econsult_admin_emailaddress', 'options' ) );
				$from 		= sanitize_email( get_field( 'econsult_emailaddress', $_POST[ 'comment_post_ID' ] ) );

			}

			// var_dump( $recipient );
			// var_dump( $from );

			add_filter( 'wp_mail_content_type', array( &$this, 'set_html_content_type' ) );

			if( get_field( 'econsult_update_email', 'options' ) ):

				$message = get_field( 'econsult_update_email', 'options' );

			else:

				$message = __( 'Er is een update op uw consult. ', 'ecs-corporate' );

			endif;

			$redirect_link = add_query_arg(
				array(
					'guid' => $_POST[ 'econsult_guid' ],
					'emailaddress' => urlencode( sanitize_email( get_field( 'econsult_emailaddress', $_POST[ 'comment_post_ID' ] ) ) ),
					'fullname' => urlencode( get_field( 'econsult_first_name', $_POST[ 'comment_post_ID' ] ) . ' ' . get_field( 'econsult_last_name', $_POST[ 'comment_post_ID' ] ) )
				),
				get_permalink( $_POST[ 'comment_post_ID' ] )
			);

			$message .= $this->ecs_format_link( $redirect_link );

			// E-mail to sender
			$headers[] = 'From: '.get_option( 'blogname' ).' <'.$from.'>';
			$subject = __( 'Update op consult ' . $_POST[ 'comment_post_ID' ], 'ecs-corporate' );
			wp_mail( $recipient, $subject, $this->ecs_wrap_message( $message ), $headers );

			remove_filter( 'wp_mail_content_type', array( &$this, 'set_html_content_type' ) );

		    return $redirect_link;

		}

	}

	function ecs_wrap_message( $msg ){

		ob_start();

		$header = get_template_part( 'modules/econsult/parts/email/header' );
		echo $msg;
		$footer = get_template_part( 'modules/econsult/parts/email/footer' );

		return ob_get_clean();

	}

	function ecs_format_link( $link ){

		return '<br><br><a href="'.$link.'" class="btn">'.__( 'Bekijk consult online', 'ecs-corporate' ).'</a>';

	}

	function set_html_content_type(){

		return 'text/html';

	}

	function ecs_degister_module(){

	}


}

$econsult_module = new econsultModule;
