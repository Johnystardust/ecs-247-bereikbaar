<section class="section section-cols<?php if( get_sub_field('light_background')) echo ' light-background'; if( get_sub_field('border')) echo ' has-border'; ?>">

	<div class="wrap">

		<div class="section-content">

			<header class="section-intro<?php if ( get_sub_field( 'center' ) ) : echo ' center'; endif; ?>">
				<h1><?php the_sub_field('title'); ?></h1>
				<p><?php the_sub_field('text'); ?></p>
			</header>

			<?php 
				$rows = count( get_sub_field('blocks') ); 

				if( $rows == 2 ){
					$col = 'two';
				}
				elseif( $rows == 3 ){
					$col = 'three';
				}
				elseif( $rows == 4 ){
					$col = 'four';
				}
				else {
					$col = '';
				}

				$count = 0;
			?>

			<div class="cols">

				<?php if( have_rows('blocks') ): ?>

					<?php while ( have_rows('blocks') ) : the_row(); $count++; ?>

						<div class="box <?php echo $col;?>-cols<?php if( $count % $rows == 0 ) echo ' last' ?>">
							<h2 class="has-icon">
								<i class="fa <?php the_sub_field('icon'); ?>"></i>
								<?php the_sub_field('title'); ?>
							</h2>

							<?php the_sub_field('text'); ?>

							<?php if( get_sub_field('cond_button') ): ?>

								<a href="<?php the_sub_field('button_link'); ?>" class="button"><?php the_sub_field('button_text'); ?></a>

							<?php endif; ?>

						</div>

					<?php endwhile; ?>

				<?php endif; ?>

			</div>

		</div><!-- .section-content -->

		<?php get_template_part( 'parts/flexible_content_fields/divider' ); ?>

	</div>
	
</section><!-- .section-3-cols -->