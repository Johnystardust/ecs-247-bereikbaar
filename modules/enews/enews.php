<?php

class enewsModule {

	function __construct() {

		add_action('init', array( &$this, 'ecs_enews_module_init') );

	}

	function ecs_enews_module_init() {

	}

	function ecs_degister_module() {

		

	}
}

$enews_module = new enewsModule;
