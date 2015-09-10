<?php

/*
 * Update
 *
 * This file is used to
 * make this theme updateable.
 *
 */
require_once( 'core/update.php' );

/*
 * Template functions
 *
 * This file contains helpful
 * template functions.
 *
 */
require_once( 'core/template-functions.php' );

/*
 * Core functions
 *
 * This file contains functionality
 * that is not used in templates or hooks
 * but makes theme development easier in 
 * different ways.
 *
 */
require_once( 'core/core-functions.php' );

/*
 * Modules
 *
 * The main file to route modules
 * after they are enabled.
 *
 */
require_once( 'modules/modules.php' );

/*
 * Enqueue scripts & styles
 */
require_once( 'includes/enqueue.php' );

/*
 * Register image sizes, sidebars and menus
 */
require_once( 'includes/default.php' );

/*
 * Default layout function
 */
require_once( 'includes/layout-functions.php' );

/*
 * Custom site options functionality
 */
require_once( 'includes/theme-options.php' );

/*
 * Custom style compiling functionality
 */
require_once( 'scssphp/compile-styles.php' );

/*
 * Custom extended functionality
 */
require_once( 'includes/custom.php' );

/*
 *Add nav walker for sub menu
 */
require_once( 'includes/nav-walker.php' );

/*
 *Load all ACF fields
 */
require_once( 'includes/acf.php' );



/*
 * Setup theme
 *
 * This is where the theme is
 * set up and claims support
 * for different kind of 
 * 'modules'. 
 * For all available modules 
 * check ecs-coreframework/core/hybrid.php.
 * Here you can also remove support for 
 * core modules.
 *
 */

add_action( 'after_setup_theme', 'ecs_setup_corporate_theme', 11 );

function ecs_setup_corporate_theme() {

	/* 
	 * Default WordPress 
	 */
	add_theme_support( 'post-thumbnails' );

}