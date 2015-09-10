<?php 

/** Step 2 (from text above). */
add_action( 'admin_menu', 'custom_theme_menu' );

/** Step 1. */
function custom_theme_menu() {
	add_object_page( 'Site opties', 'Site opties', 'manage_options', 'custom-theme-options', 'custom_options_menu', 'dashicons-editor-kitchensink' );
}

function custom_options_menu() {
	echo '<div class="wrap">';

    echo "<h2>" . __( 'Thema opties', 'ecs-corporate' ) . "</h2>";

    echo "<p>" . __('Hier kunnen de verschillende thema opties van de site aangepast worden, verschillende onderdelen zijn onder dit menu te vinden', 'ecs-corporate') . "</p>";

    echo '</div>';
}

if(function_exists('acf_add_options_page')) { 

	acf_add_options_page();
	acf_add_options_sub_page(array( 
		'title' 		=> 'Algemeen', 
		'slug' 			=> 'custom-theme-options-general', 
		'parent' 		=> 'custom-theme-options',
		'capability' 	=> 'manage_options'
	));

	acf_add_options_sub_page(array( 
		'title' 		=> 'Styling', 
		'slug' 			=> 'custom-theme-options-styling', 
		'parent' 		=> 'custom-theme-options',
		'capability' 	=> 'manage_options'
	));

}