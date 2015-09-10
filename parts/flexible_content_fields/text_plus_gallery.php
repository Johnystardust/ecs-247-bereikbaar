<section class="section section-cols-gallery<?php if( get_sub_field('light_background')) echo ' light-background'; if( get_sub_field('border')) echo ' has-border'; ?>">

	<div class="wrap">

		<div class="section-content">

			<header class="section-intro<?php if ( get_sub_field( 'center' ) ) : echo ' center'; endif; ?>">
				<h1><?php the_sub_field('title'); ?></h1>
				<?php the_sub_field('text'); ?>
			</header>

			<?php 
				$rows = count( get_sub_field('images') ); 

				if( $rows == 3 ){
					$col = 'three';
				}
				elseif( $rows == 4 ){
					$col = 'four';
				}
				elseif( $rows == 5 ){
					$col = 'five';
				}
				else {
					$col = '';
				}

				$count = 0;
			?>

			<div class="cols cols-gallery">

				<?php if( have_rows('images') ): ?>

					<?php while ( have_rows('images') ) : the_row(); $count++; ?>

						<?php $big_image = wp_get_attachment_image_src( get_sub_field('image'), $size = 'gallery-image-big' ); ?>
				
						<figure class="<?php echo $col;?>-cols <?php if( $count % $rows == 0 ) echo ' last' ?>">
							<a href="<?php echo $big_image[0]; ?>" class="gallery-link">
								<?php echo wp_get_attachment_image( get_sub_field('image'), $size = 'gallery-image' ); ?>
							</a>
						</figure>

					<?php endwhile; ?>

				<?php endif; ?>
				
			</div>

		</div><!-- .section-content -->

		<?php get_template_part( 'parts/flexible_content_fields/divider' ); ?>

	</div>
	
</section><!-- .section-cols-gallery -->