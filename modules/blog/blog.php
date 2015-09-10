<?php

class blogModule {

	function __construct() {

		add_action('init', array( &$this, 'ecs_blog_module_init') );

	}

	function ecs_blog_module_init() {

		$blog = get_field('option_module_blog_slug', 'option');
		$blog_setting = get_option( 'page_for_posts' );
		
		if( $blog->ID != $blog_setting ){
			update_option( 'page_for_posts', $blog->ID );
		}

		register_sidebar(
			array(
				'name' 			=> get_the_title( get_option( 'page_for_posts' ) ) . ' sidebar (blog module)',
				'description' 	=> 'Widget area op een blog module pagina en blog overzicht.',
				'before_widget' => '<div class="widget">',
				'after_widget' 	=> '</div></div>',
				'before_title' 	=> '<header class="widget-header"><h3>',
				'after_title' 	=> '</h3></header><div class="widget-text">'
			)
		);

	}

	function ecs_degister_module() {

		update_option( 'page_for_posts', 0 );

	}
}

$blog_module = new blogModule;
