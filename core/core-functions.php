<?php

/**
 * Removes WP generator tag
 *
 * Removes the WP generator tag for security reasons.
 *
 */

remove_action('wp_head', 'wp_generator');

/**
 * Hooks to WP head
 *
 * Add analytics, html5shiv and favicon to the head by default.
 *
 */

add_action( 'wp_head', 		'ecs_head_html5shiv', 1 );
add_action( 'wp_head', 		'ecs_head_analytics' );
add_action( 'wp_head', 		'ecs_head_retargeting' );
add_action(	'wp_head', 		'ecs_head_favicon');
add_action(	'admin_head', 	'ecs_head_favicon');

function ecs_head_analytics(){
	get_template_part( 'parts/head/analytics' );
}

function ecs_head_html5shiv(){
	get_template_part( 'parts/head/html5shiv' );
}

function ecs_head_retargeting() {
	get_template_part( 'parts/head/retargeting' );
}

function ecs_head_favicon() {

	if( get_field('option_favicon', 'option') ){
		echo '<link rel="icon" type="image/png" href="' . get_field('option_favicon', 'option') . '">';
	}

	
}

/**
 * Change WPSEO metabox prio
 *
 * Changes the WPSEO metabox prio to low so the meta box is always below on the post editor.
 *
 */

add_filter( 'wpseo_metabox_prio', function() { return 'low'; } );

/**
 * Noindex check
 *
 * Find out what environment we are on and update the noindex (blog_public)
 * option accordingly.
 *
 * @return void;
 */

add_action( 'init', 'ecs_core_noindex' );

function ecs_core_noindex() {

	/** Stop if setting is cached */
	if ( false !== get_transient( 'ecs_index' ) )
		return;

	/** Check what environment we are running on */
	if ( ! defined( 'WP_LOCAL_SERVER' ) && ! defined( 'WP_STAGING_SERVER' ) ) {

		/** No environment constants defined, check another way */

		if ( false !== stripos( site_url(), 'elephantlabs' ) || false !== stripos( site_url(), 'vest161labs' ) || false !== stripos( site_url(), 'localhost' ) || false !== stripos( site_url(), '.local' ) )
			$index = false; /** Don't index */
		else
			$index = true; /** Index */

	} else {

		/** We have environment constants to work with */

		if ( false == WP_LOCAL_SERVER && false == WP_STAGING_SERVER )
			$index = true; /** Not on local or staging, so index */
		else
			$index = false;

	}

	/** Allow overwrite through filters (for intranets i.e.) */
	$index = apply_filters( 'ecs_override_noindex', $index );

	/** Update option and cache setting */
	update_option( 'blog_public', $index );
	set_transient( 'ecs_index', $index, DAY_IN_SECONDS );

}

/**
 * 
 * Hide ACF menu from the admin menu
 *
 * @return void;
 */

add_action( 'admin_menu', 'ecs_remove_acf_menu' );

function ecs_remove_acf_menu() {
 
    /** Users allowed to use ACF */
    $admins = array( 
        'elephant',
        'vest161' 
    );

    /** Allow for filtering in child themes */
    $admins = apply_filters( 'ecs_acf_users', $admins );
 
    /** Get the current user */
    $current_user = wp_get_current_user();
 
    /** Match and remove if needed */
    if( ! in_array( $current_user->user_login, $admins ) ) {
        remove_menu_page('edit.php?post_type=acf-field-group');
    }
 
}

/**
 * Replace Gravity Forms input[type=submit] for <button> element
 * 
 * This allows to style with :before and :after pseudo elements
 *
 * @return string $button A string with the html element
 */

add_filter( 'gform_submit_button', 'ecs_gform_submit_button', 10, 2 );

function ecs_gform_submit_button( $button, $form) {

	$button = sprintf( '<button class="button" id="gform_submit_button_%s">%s</button>', $form['id'], $form['button']['text'] );

    return $button;

}

/**
 * Always enable the anti spam honeypot in Gravity Forms
 * 
 * @uses object $form - $form object before it is submitted
 *
 * @return object $form - Modified $form object
 */

add_action( 'gform_pre_form_settings_save', 'my_custom_function', 10, 2);

function my_custom_function( $form ){

	if( empty( $form['enableHoneypot'] ) ):

		$form['enableHoneypot'] = true;

	endif;

	return $form;

}

/**
 * 	Adds a class of the title of the widget to the surrounding widget div.
 *
 *	@return array - parameters of the widget, where the classes are altered
 */

add_filter('dynamic_sidebar_params', 'ecs_add_classes_to_widget');

function ecs_add_classes_to_widget( $params ){

	// Remove number from the widget_id, it will appear like: product-categories
	$str = trim( str_replace( range( 0, 9 ), '', $params[0]['widget_id'] ) );
	$str = substr_replace( $str, '', -1 );
	$str = str_replace( '_', '-', $str );

	// Add the class to the markup
    $class_to_add 				= 'class="' . $str . ' ';
    $params[0]['before_widget'] = str_replace( 'class="', $class_to_add, $params[0]['before_widget'] );
    
    return $params;

}

/**
 * 	Add custom class to the content editor to show lists properly
 *
 *	@return string - the new modified content
 */

add_filter( 'the_content', 'ecs_content_filter' );
add_filter( 'acf_the_content', 'ecs_content_filter' );

function ecs_content_filter( $content ) {

	if ( false !== strpos( $content, '<ul>' ) ) {
		$content = str_replace( '<ul>', '<ul class="content-ul">', $content );
	}

	return $content;

}