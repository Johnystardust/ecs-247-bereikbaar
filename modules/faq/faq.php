<?php

class faqModule {

	function __construct() {

		add_action('init', array( &$this, 'ecs_faq_module_init') );
		add_action( 'template_redirect', array( &$this, 'ecs_faq_module_disable_single') );

	}

	function ecs_faq_module_init() {

		register_post_type(
			'faq',
			array(
				'labels' => array(
					'name'               => __( 'FAQ'),
			        'singular_name'      => __( 'FAQ'),
			        'menu_name'          => __( 'FAQ'),
			        'name_admin_bar'     => __( 'FAQ'),
			        'add_new'            => __( 'Nieuwe FAQ toevoegen'),
			        'add_new_item'       => __( 'Nieuwe FAQ toevoegen'),
			        'edit_item'          => __( 'FAQ bewerken'),
			        'new_item'           => __( 'Nieuwe FAQ'),
			        'view_item'          => __( 'Bekijk FAQ'),
			        'search_items'       => __( 'Zoek FAQ'),
			        'not_found'          => __( 'Geen FAQ\'s gevonden'),
			        'not_found_in_trash' => __( 'Geen FAQ\'s gevonden in' ),
			        'all_items'          => __( 'Alle FAQ\'s ' ),
			        'parent_item'        => __( 'Parent FAQ' ),
			        'parent_item_colon'  => __( 'Parent FAQ:' ),
			        'archive_title'      => __( 'FAQ\'s'),
				),
				'public' 			=> true,
				'has_archive' 		=> true,			
				'hierarchical' 		=> false,
				'exclude_from_search' => false,
				'rewrite'			=> 'faq',
				'show_ui' 			=> true,
				'menu_icon'			=> 'dashicons-welcome-learn-more',
				'supports' 			=> array('title', 'editor')
			)
		);

		register_taxonomy(
		    'faq_category',
		    'faq',
			array(
				'label' => __( 'Categorieën' ),
				'rewrite' => array( 'slug' => 'faq-categorie' ),
				'hierarchical' => true,
			));

	}

	function ecs_faq_module_disable_single() {

		$queried_post_type = get_query_var('post_type');

		if ( is_single() && 'faq' ==  $queried_post_type ) {
			wp_redirect( home_url('/faq'), 301 );
			exit;
		}
	}

	function ecs_degister_module() {

		

	}
}

$faq_module = new faqModule;
