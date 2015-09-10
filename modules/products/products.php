<?php

class productsModule {

	function __construct() {

			add_action('init', array( &$this, 'ecs_products_module_init') );

	}

	function ecs_products_module_init() {

		register_post_type(
			'product',
			array(
				'labels' => array(
					'name'               => __( 'Producten'),
			        'singular_name'      => __( 'Product'),
			        'menu_name'          => __( 'Producten'),
			        'name_admin_bar'     => __( 'Producten'),
			        'add_new'            => __( 'Nieuw product toevoegen'),
			        'add_new_item'       => __( 'Nieuwe product toevoegen'),
			        'edit_item'          => __( 'Product bewerken'),
			        'new_item'           => __( 'Nieuw product'),
			        'view_item'          => __( 'Bekijk product'),
			        'search_items'       => __( 'Zoek producten'),
			        'not_found'          => __( 'Geen producten gevonden'),
			        'not_found_in_trash' => __( 'Geen producten gevonden in' ),
			        'all_items'          => __( 'Alle producten' ),
			        'parent_item'        => __( 'Parent product' ),
			        'parent_item_colon'  => __( 'Parent product:' ),
			        'archive_title'      => __( 'Producten'),
				),
				'public' 			=> true,
				'has_archive' 		=> true,			
				'hierarchical' 		=> false,
				'exclude_from_search' => false,
				'rewrite' 			=> array('slug' => 'product', 'with_front' => false),
				'show_ui' 			=> true,
				'menu_icon'			=> 'dashicons-products',
				'supports' 			=> array('title', 'editor')
			)
		);
	}


	function ecs_degister_module() {

		

	}
}

$products_module = new productsModule;
