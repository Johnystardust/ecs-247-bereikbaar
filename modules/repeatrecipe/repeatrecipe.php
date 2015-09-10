<?php

class repeatrecipeModule {

	function __construct() {

		add_filter('the_content', array( &$this, 'ecs_repeatrecipe_module_content_filter') );

	}

	function ecs_repeatrecipe_module_content_filter( $content ) {

		$page = get_field('option_herhaalrecept_page', 'option'); 

		if( is_page($page->ID) ):

			ob_start();

			if( get_field('option_vacation_notice', 'option') ):

				?>
					
				<div class="info">
					
					<?php the_field('option_vacation_notice_text', 'option'); ?>

				</div>

				<?php

			endif;

		    gravity_form_enqueue_scripts(6, true);
		    gravity_form(6, false, false, false, '', true, 1); 
			

			return ob_get_clean();

		else:

			return $content;

		endif;

	}


	function ecs_degister_module() {

		

	}
}

$repeatrecipe_module = new repeatrecipeModule;
