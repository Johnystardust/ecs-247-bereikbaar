<?php

add_action( 'init', 'ecs_load_module_dependencies' );
add_action( 'after_setup_theme', 'ecs_load_modules', 25 );

function ecs_load_module_dependencies(){

	if( is_module_active( 'econsult' ) ):
		require_once( get_stylesheet_directory() . '/modules/econsult/acf_export/econsult-acf-fields.php' );
	endif;

	if( is_module_active( 'testimonials' ) ):
		require_once( get_stylesheet_directory() . '/modules/testimonials/acf-field.php' );
	endif;

}

function ecs_load_modules() {

	$modules = get_field( 'option_active_modules', 'option' );

	if( !is_array($modules) )
		return;

	foreach ($modules as $key => $module) {
		
		require_once( ecs_module_dir( $module ) );

	}

}

function is_module_active( $module ) {

	$modules = get_field( 'option_active_modules', 'option' );

	if( !is_array($modules))
		return false;

	if( in_array($module, $modules) ){
		return true;
	}

	return false;

}

/* Degister module */

add_filter('acf/update_value/name=option_active_modules', 'ecs_deregister_module', 10, 3);

function ecs_deregister_module( $new_modules, $post_id, $field ) {

	$current_modules = get_field('option_active_modules', 'option');

	if( !is_array($current_modules))
		return $new_modules;

	foreach ($current_modules as $key => $value) {

		if( empty( $new_modules ) ) {

			$class_name = $value . 'Module';
			
			$deregister = new $class_name;

			$deregister->ecs_degister_module();
			
		}
		elseif( !in_array($value, $new_modules) ) {

			$class_name = $value . 'Module';
			
			$deregister = new $class_name;

			$deregister->ecs_degister_module();

		}

	}

	return $new_modules;

}

/* Inactive module logic */

if( !is_module_active('blog') ) {

	add_filter('acf/load_field/name=page_content', 'ecs_blog_module_acf_filter' );

}

function ecs_blog_module_acf_filter( $fields ){

	foreach ($fields['layouts'] as $key => $field) {

		if( $field['name'] == 'blog' ){
			unset($fields['layouts'][$key]);
		}
	}

	return $fields;
	
}

if( !is_module_active('enews') ) {

	add_filter('acf/load_field/name=page_content', 'ecs_enews_module_acf_filter' );

}

function ecs_enews_module_acf_filter( $fields ){

	foreach ($fields['layouts'] as $key => $field) {

		if( $field['name'] == 'subscribe_newsletter' ){
			unset($fields['layouts'][$key]);
		}
	}

	return $fields;
	
}