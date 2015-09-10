<?php

/**
 * Theme defaults
 * 
 * In this file:
 * - Register nav menus in ecs_register_menus()
 * - Register sidebars in ecs_register_sidebars()
 * - Setup theme image sizes in ecs_init_thumbnails()
 * - Change the attachment link size in ecs_get_attachment_link_filter()
 *
 * - Setup post types in ecs_corporate_register_post_types()
 * - Setup taxonomies in ecs_corporate_register_taxonomies()
 *
 * - Remove dashboard menu pages in ecs_corporate_remove_menu_pages()
 * - Add ACF options pages
 */

add_action( 'init', 'ecs_register_menus' );
add_action( 'init', 'ecs_register_sidebars' );
add_action( 'init', 'ecs_init_thumbnails' );
add_filter( 'wp_get_attachment_link', 'ecs_get_attachment_link_filter', 10, 4);

add_action( 'init', 'ecs_corporate_register_post_types' );
add_action( 'init', 'ecs_corporate_register_taxonomies' );

add_action( 'admin_menu', 'ecs_corporate_remove_menu_pages' );

/**
 * Register navigation menus. Hooked to init.
 */
function ecs_register_menus() {
	register_nav_menus(
		array(
			'main-menu' => 'Hoofdmenu',
			'footer-menu-1' => 'Footer menu 1',
			'footer-menu-2' => 'Footer menu 2',
			'footer-menu-3' => 'Footer menu 3'
		)
	);
}

/**
 * Register theme widget areas (sidebars). Hooked to init.
 */
function ecs_register_sidebars() {

	register_sidebar(
		array(
			'name' 			=> 'Sidebar',
			'description' 	=> 'Widget area op een pagina...',
			'before_widget' => '<div class="widget">',
			'after_widget' 	=> '</div></div>',
			'before_title' 	=> '<header class="widget-header"><h3>',
			'after_title' 	=> '</h3></header><div class="widget-text">'
		)
	);

}


/**
 * Setup theme image sizes. Hooked to init.
 */
function ecs_init_thumbnails() {	
	// Add appropriate image sizes
	add_image_size('slider-image', 1000, 355, true);
	add_image_size('text-plus-image', 314, 246, true);
	add_image_size('blog-thumbnail', 170, 165, true);
	add_image_size('gallery-image', 368, 240, true);
	add_image_size('ico-favicon', 32, 32, true);
	add_image_size('certification-image', 54, 54, true);
	add_image_size('mini-logo-image', 50, 28, true);
	add_image_size('gallery-image-big', 1000, 600, true);
	add_image_size('blog-image', 645, 296, true);
	add_image_size('employee-image', 380, 418, true);
	add_image_size('product-image', 250, 250, true);
	add_image_size('product-image-single', 310, 280, true);
}


/**
 * WP Gallery link to 'large' image size url
 */

function ecs_get_attachment_link_filter( $content, $post_id, $size, $permalink ) {

    // Only do this if we're getting the file URL
    if (! $permalink) {
        // This returns an array of (url, width, height)
        $image = wp_get_attachment_image_src( $post_id, 'large' );
        $new_content = preg_replace('/href=\'(.*?)\'/', 'href=\'' . $image[0] . '\'', $content );
        return $new_content;
    } else {
        return $content;
    }
}


/* 
 * Post types & taxonomies
 *
 * Register post types and taxonomies below.
 *
 */

function ecs_corporate_register_post_types() {

/* Default CPT declaration */
/*
	register_post_type(
		'posttype',
		array(
			'labels' => array(
				'name' 					=> __( 'Posttype items' ),
				'singular_name' 		=> __( 'Posttype item' ),
				'add_new' 				=> __( 'Nieuwe toevoegen' ),
				'add_new_item' 			=> __( 'Nieuw posttype item toevoegen' ),
				'edit' 					=> __( 'Bewerken' ),
				'edit_item' 			=> __( 'Bewerk posttype item' ),
				'new_item' 				=> __( 'Nieuw posttype item' ),
				'view' 					=> __( 'Bekijken' ),
				'view_item' 			=> __( 'Bekijk posttype item' ),
				'search_items' 			=> __( 'Zoek posttype items' ),
				'not_found' 			=> __( 'Geen posttype items gevonden' ),
				'not_found_in_trash' 	=> __( 'Geen posttype items gevonden in prullenbak' )
			),
			'public' 			=> true,
			'has_archive' 		=> 'posttype',			
			'hierarchical' 		=> false,
			'rewrite' 			=> array('slug' => 'posttype', 'with_front' => false),			
			'show_ui' 			=> true,
			'supports' 			=> array('title', 'editor', 'excerpt', 'thumbnail' )
		)
	);
*/

/* Default custom menu page declaration */


	/*
	* Options page voor posttype archief
	* 1. Creëer een options pagina voor de zojuist aangemaakte posttype (hieronder)
	* 2. Kopieer de field group "posttype archief" bij ACF
	* 3. Verander de slugs van de velden met de naam van je posttype
	* 4. Koppel de gekopieerde field group aan de nieuwe options pagina
	*/

	/*
	 
	if( function_exists('acf_add_options_sub_page') )
	{
	    acf_add_options_sub_page(array(
	        'title' 		=> 'Posttype archief',
	        'parent' 		=> 'edit.php?post_type=posttype',
	        'capability' 	=> 'manage_options',
	        'slug'			=> 'posttype-archive-options',
	        'menu'			=> 'Posttype archief'
	    ));
	}
	
	*/

}

function ecs_corporate_register_taxonomies() {

/* Default taxonomy declaration */
/*
	$labels = array(
		'name'              => _x( 'Types', 'taxonomy portfolio type general name' ),
		'singular_name'     => _x( 'Type', 'taxonomy portfolio type singular name' ),
		'edit_item'         => __( 'Bewerk type' ),
		'update_item'       => __( 'Type bijwerken' ),
		'add_new_item'      => __( 'Nieuw type toevoegen' ),
		'menu_name'         => __( 'Type' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'type' ),
	);

	register_taxonomy( 'type', array( 'portfolio' ), $args );
*/

}

/* Remove default menu pages */
function ecs_corporate_remove_menu_pages() {

	if( !is_module_active('blog') ) {
		remove_menu_page('edit.php');
	}

	/* Links */
	remove_menu_page('link-manager.php');

	/* Comments */
	remove_menu_page('edit-comments.php');

	/* ACF options page */
	remove_menu_page('admin.php?page=acf-options');	

}


?>