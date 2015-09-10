<section class="section content<?php if( get_sub_field('light_background')) echo ' light-background'; if( get_sub_field('border')) echo ' has-border'; ?>">

	<div class="wrap">

		<div class="section-content">

			<div class="main">

				<h1><?php the_sub_field('title'); ?></h1>

				<?php the_sub_field('text'); ?>

			</div><!-- .main-->
			
			<aside class="sidebar" role="complementary">

				<?php $widget = get_sub_field('widget'); ?>

				<?php

					switch ( $widget ) {
						case 'opening_times':
							
								get_template_part( 'parts/flexible_content_fields/widgets/opening_times' );

							break;

						case 'text':
							
								get_template_part( 'parts/flexible_content_fields/widgets/content' );

							break;

						case 'appointment':

								get_template_part( 'parts/flexible_content_fields/widgets/appointment' );

							break;
						
						default:
							
								get_template_part( 'parts/flexible_content_fields/widgets/opening_times' );

							break;
					}

				?>
	            
        	</aside><!-- .sidebar-->
			
		</div><!-- .section-content -->

		<?php get_template_part( 'parts/flexible_content_fields/divider' ); ?>

    </div>

</section><!-- .content-->