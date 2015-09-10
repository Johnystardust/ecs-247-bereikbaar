<?php

class compile_styles {

	function __construct(){
		
		add_action('acf/save_post', array( &$this, 'acf_compile_styles'), 20);

	}

	function acf_compile_styles( $post_id ) {

		$field_object = get_field_object( key( $_POST['acf'] ) );

		if( $post_id = 'options' && $field_object['parent'] == 'group_54902d601fb49' ){
			if( $this->writeScss() ) {
				$this->compileScss();
			}
		}    
	}

	function writeScss(){
		
		$primary_color 		= get_field('option_primary_color', 'option');
		$secundary_color 	= get_field('option_secondary_color', 'option');
		$tertiary_color 	= get_field('option_tertiary_color', 'option');

		switch ( get_field('option_font', 'option') ) {
			case 'opensans':
				$font = "'Open Sans', Helvetica, Arial, sans-serif";
				break;
			case 'roboto':
				$font = "'Roboto', Helvetica, Arial, sans-serif";
				break;
			case 'georgia':
				$font = "Georgia, Times, 'Times New Roman', serif";
				break;
			default:
				$font = "'Open Sans', Helvetica, Arial, sans-serif";
				break;
		}

		switch ( get_field('option_heading_font', 'option') ) {
			case 'opensans':
				$heading_font = "'Open Sans', Helvetica, Arial, sans-serif";
				break;
			case 'roboto':
				$heading_font = "'Roboto', Helvetica, Arial, sans-serif";
				break;
			case 'georgia':
				$heading_font = "Georgia, Times, 'Times New Roman', serif";
				break;
			default:
				$heading_font = "'Open Sans', Helvetica, Arial, sans-serif";
				break;
		}

		

		$border_radius = get_field('option_border_radius', 'option');

		$variable_file = file_get_contents(get_stylesheet_directory() . '/assets/scss/_variables-custom.scss');

		$replaced_variable_file = sprintf("/**\r\n* @Theme options variables - compiled by sassphp\r\n*\r\n*/\r\n\r\n");

		$replaced_variable_file .= sprintf("\$font: ".$font.";\r\n");

		$replaced_variable_file .= sprintf("\$heading-font: ".$heading_font.";\r\n");

		$replaced_variable_file .= sprintf("\$color-1: ".$primary_color.";\r\n");

		$replaced_variable_file .= sprintf("\$color-2: ".$secundary_color.";\r\n");
		
		$replaced_variable_file .= sprintf("\$color-3: ".$tertiary_color.";\r\n");

		$replaced_variable_file .= sprintf("\$radius: ".$border_radius."px;");

		file_put_contents(get_stylesheet_directory() . '/assets/scss/_variables-custom.scss', $replaced_variable_file);

		return true;

	}

	function compileScss() {

		require "scss.inc.php";

		$scss = new scssc();

		$scss->setImportPaths(get_stylesheet_directory() . '/assets/scss/');
		$scss->setFormatter('scss_formatter_compressed');

		file_put_contents(get_stylesheet_directory() . '/assets/css/global-gen.css', $scss->compile('@import "global.scss"') );


	}


}

$compile_styles = new compile_styles;


