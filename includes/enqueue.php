<?php

/**
 * Enqueue default theme scripts. Hooked to wp_enqueue_scripts.
 *
 * Remember: always, always, ALWAYS use wp_enqueue_script() and
 * NEVER EVER include the scripts directly in header.php or footer.php!
 * See http://codex.wordpress.org/Function_Reference/wp_enqueue_script
 *
 * The one and ONLY exception to this rule is html5.js because it requires
 * conditional comments.
 *
 * Rule of thumb: include libraries such as jQuery in the header, include
 * own scripts in footer.
 */

add_action( 'wp_enqueue_scripts', 'ecs_corporate_enqueue_scripts', 20 );
add_action( 'wp_print_styles', 'ecs_load_fonts' );
//add_action( 'wp_print_scripts', 'ecs_corporate_dequeue_script', 100 );

function ecs_corporate_enqueue_scripts() {

	/* Styles */
	// wp_enqueue_style( 'theme-global', ecs_css_uri( 'global' ) );
	wp_enqueue_style( 'theme-global', ecs_css_uri( 'global-gen' ) );

	/* Scripts */
	wp_enqueue_script( 'theme-scripts', ecs_js_uri( 'min/global-min' ), array( 'jquery' ), false, true );
	wp_localize_script( 'theme-scripts', 'ecs_ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));

}


/**
 * Enqueue google fonts.
 */
function ecs_load_fonts() {

    wp_register_style( 'google-fonts-open-sans', '//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' );
    wp_register_style( 'google-fonts-roboto', '//fonts.googleapis.com/css?family=Roboto:400,300,500,700' );

    $font = get_field( 'option_font', 'option' );
    $heading_font = get_field( 'option_heading_font', 'option' );

    switch ( $font ) {
		case 'opensans':
			wp_enqueue_style( 'google-fonts-open-sans' );
			break;
		case 'roboto':
			wp_enqueue_style( 'google-fonts-roboto' );
			break;
	}

	if ( $font !== $heading_font ) {

		switch ( $heading_font ) {
			case 'opensans':
				wp_enqueue_style( 'google-fonts-open-sans' );
				break;
			case 'roboto':
				wp_enqueue_style( 'google-fonts-roboto' );
				break;
		}

	}

}


/**
 *
 * Dequeue plugin scripts and styles as needed
 *
 **/

function ecs_corporate_dequeue_script() {

	/* Styles */

	/* Scripts */
	//wp_dequeue_script( 'shortcode-scripts' );

}