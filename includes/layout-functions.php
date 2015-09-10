<?php 

/**
 * 	Add custom post classes
 *
 *	@return array - the modified classes
 */

add_filter( 'post_class', 'ecs_add_post_classes' );

function ecs_add_post_classes( $classes ) {

	/* Add custom post class to posts with a featured image */
	if ( get_the_post_thumbnail() && ! is_singular() )
		$classes[] = 'has-image';

	return $classes;
}

/**
 * 	Add support tag for reponsive
 *
 */

add_action( 'wp_head', 'ecs_responsive_meta_tag', 1 );

function ecs_responsive_meta_tag() {
	echo '<meta name="viewport" content="initial-scale=1.0, width=device-width, maximum-scale=1">';
}

/**
 * Fixes ussue where shortcodes would have empty <p> elements
 *
 */

remove_filter( 'the_content', 'wpautop' );
remove_filter( 'acf_the_content', 'wpautop' );

add_filter( 'the_content', 'wpautop' , 12);
add_filter( 'acf_the_content', 'wpautop' , 12);