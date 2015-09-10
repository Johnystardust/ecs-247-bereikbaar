<?php
/*
 * Load different "widget" by layout
 */
if ( get_field( 'widgets' ) ) :

	$layout_count = 1;

	while ( has_sub_field( 'widgets' ) ) :

		switch ( get_row_layout() ) :

			case 'openingtimes' :

				get_template_part( 'parts/flexible_content_fields/widgets/opening_times' );

				break;

			case 'text' :

				get_template_part( 'parts/flexible_content_fields/widgets/content' );

				break;

			case 'appointment' :
				get_template_part( 'parts/flexible_content_fields/widgets/appointment' );

				break;
																						
		endswitch;

		$layout_count++;

	endwhile;

endif;	