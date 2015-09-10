<?php

class testimonialsModule {

	function __construct() {

		add_action('init', array( &$this, 'ecs_testimonials_module_init') );
		add_action( 'template_redirect', array( &$this, 'ecs_testimonials_module_disable_single') );
		add_action( 'pre_get_posts', array( &$this, 'ecs_testimonials_module_unlim_ppp') );

		
	}

	function ecs_testimonials_module_unlim_ppp( $query ) {

		if( !is_admin() && $query->is_main_query() && is_post_type_archive( 'testimonial' ) ) {
	        $query->set( 'posts_per_page', '-1' );
	    }
	}

	function ecs_testimonials_module_init() {

		register_post_type(
			'testimonial',
			array(
				'labels' => array(
					'name' 					=> __( 'Testimonials' ),
					'singular_name' 		=> __( 'Testimonial' ),
					'add_new' 				=> __( 'Nieuwe testimonial toevoegen' ),
					'add_new_item' 			=> __( 'Nieuwe testimonial toevoegen' ),
					'edit' 					=> __( 'Testimonial bewerken' ),
					'edit_item' 			=> __( 'Bewerk testimonial' ),
					'new_item' 				=> __( 'Nieuwe testimonial' ),
					'view' 					=> __( 'Referentie bekijken' ),
					'view_item' 			=> __( 'Bekijk testimonial' ),
					'search_items' 			=> __( 'Zoek testimonials' ),
					'not_found' 			=> __( 'Geen testimonials gevonden' ),
					'not_found_in_trash' 	=> __( 'Geen testimonials gevonden in prullenbak' )
				),
				'public' 				=> true,
				'has_archive' 			=> 'testimonials',			
				'hierarchical' 			=> false,
				'rewrite' 				=> array('slug' => 'testimonials', 'with_front' => false),			
				'show_ui' 				=> true,
				'supports' 				=> array('title' ),
				'menu_icon'				=> 'dashicons-testimonial',
				'exclude_from_search'	=> true

			)
		);

	}

	function ecs_testimonials_module_disable_single() {

		$queried_post_type = get_query_var('post_type');

		if ( is_single() && 'testimonial' ==  $queried_post_type ) {
			wp_redirect( home_url('/testimonials'), 301 );
			exit;
		}
	}

	function ecs_degister_module() {

		

	}
}

$testimonials_module = new testimonialsModule;
