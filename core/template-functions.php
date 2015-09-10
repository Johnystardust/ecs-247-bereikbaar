<?php 
/* 
 * General template functions
 *
 * This file contains helpful functions for use in the parent
 * theme as well as the child theme. 
 *
 */

/*
 * Get CSS URL
 *
 * Gets the URL to the css directory, i.e. starting with http://
  *
 * @param string $file the filename without extension, i.e. 'slider'
 *
 * @return void;
 */
function ecs_css_uri( $file = '', $framework = false ) {

	if ( ! empty( $file ) )
		$directory = "/assets/css/{$file}.css";
	else
		$directory = '/assets/css/';

	// Load from framework ?
	if ( $framework )
		return get_template_directory_uri() . $directory;
	else
		return get_stylesheet_directory_uri() . $directory;
}

/*
 * Get CSS directory
 *
 * Gets the the css directory, i.e. starting with /public_html
 * Useful for including files in stead of linking to them
 *
 * @param string $file the filename without extension, i.e. 'slider'
 *
 * @return void;
 */
function ecs_css_dir( $file = '', $framework = false  ) {

	if ( ! empty( $file ) )
		$directory = "/assets/css/{$file}.css";
	else
		$directory = '/assets/css/';

	// Load from framework ?
	if ( $framework )
		return get_template_directory() . $directory;
	else
		return get_stylesheet_directory() . $directory;

}

/*
 * Get JS URL
 *
 * Gets the URL to the js directory, i.e. starting with http://
 *
 * @param string $file the filename without extension, i.e. 'slider'
 *
 * @return void;
 */
function ecs_js_uri( $file = '', $framework = false  ) {

	if ( ! empty( $file ) )
		$directory = "/assets/scripts/{$file}.js";
	else
		$directory = '/assets/scripts/';

	// Load from framework ?
	if ( $framework )
		return get_template_directory_uri() . $directory;
	else
		return get_stylesheet_directory_uri() . $directory;	
}

/*
 * Get JS directory
 *
 * Gets the the js directory, i.e. starting with /public_html
 * Useful for including files in stead of linking to them
 *
 * @param string $file the filename without extension, i.e. 'slider'
 *
 * @return void;
 */
function ecs_js_dir( $file = '', $framework = false  ) {

	if ( ! empty( $file ) )
		$directory = "/assets/scripts/{$file}.js";
	else
		$directory = '/assets/scripts/';

	// Load from framework ?
	if ( $framework )
		return get_template_directory() . $directory;
	else
		return get_stylesheet_directory() . $directory;	
}

/*
 * Get Image URL
 *
 * Gets the URL to the image directory, i.e. starting with http://
 *
 * @param string $file the filename without extension, i.e. 'slider'
 * @param string $extension the filetype of the image
 *
 * @return void;
 */
function ecs_image_uri( $file = '', $extension = 'png', $framework = false  ) {

	if ( ! empty( $file ) )
		$directory = "/assets/images/{$file}.{$extension}";
	else
		$directory = '/assets/images/';

	// Load from framework ?
	if ( $framework )
		return get_template_directory_uri() . $directory;
	else
		return get_stylesheet_directory_uri() . $directory;	
}

/*
 * Get Image directory
 *
 * Gets the the image directory, i.e. starting with /public_html
 * Useful for including files in stead of linking to them
 *
 * @param string $file the filename without extension, i.e. 'slider'
 * @param string $extension the filetype of the image 
 *
 * @return void;
 */
function ecs_image_dir( $file = '', $extension = 'png', $framework = false  ) {

	if ( ! empty( $file ) )
		$directory = "/assets/images/{$file}.{$extension}";
	else
		$directory = '/assets/images/';

	// Load from framework ?
	if ( $framework )
		return get_template_directory() . $directory;
	else
		return get_stylesheet_directory() . $directory;	
}

/*
 * Get module directory
 *
 * Gets the the modules directory, i.e. starting with /public_html
 * Useful for including files in stead of linking to them.
 *
 * @param string $file the filename without extension, i.e. 'slider'
 *
 * @return void;
 */
function ecs_module_dir(  $file = '', $framework = false   ) {

	if ( ! empty( $file ) )
		return get_stylesheet_directory() . "/modules/{$file}/{$file}.php";
	else
		return get_stylesheet_directory() . '/modules/';
	
}

/**
 * Gets the id of the topmost ancestor of the current page. Returns the current posts's ID if there is no parent.
 * 
 * @uses object $post - global $post object
 *
 * @return int / boolean - parent post id or false
 */

if ( !function_exists( 'ecs_get_post_top_ancestor_id' )) {

	function ecs_get_post_top_ancestor_id( $post_id = false ){
	    
		global $post;

		if ( $post_id )
			$post = get_post( $post_id );

		if ( ! is_object( $post ) )
		    return;

		if( $post->post_parent ){
		    $ancestors = array_reverse(get_post_ancestors( $post->ID ) );
		    return $ancestors[0];
		}

		return $post->ID;

	}

}
/**
 * Gets the name of the current menu name
 * 
 * @param Theme location of the menu
 *
 * @return string - name of the menu
 */

if ( !function_exists( 'ecs_get_theme_menu_name' )) {

	function ecs_get_theme_menu_name( $theme_location ) {

	     if ( !has_nav_menu( $theme_location ) ) return false;
	     
	     $menus      = get_nav_menu_locations();
	     $menu_title = wp_get_nav_menu_object( $menus[$theme_location] )->name;
	     
	     return $menu_title;
	}
}

