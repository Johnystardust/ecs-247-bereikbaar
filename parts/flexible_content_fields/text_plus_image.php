<section class="section text-plus-image<?php if( get_sub_field('light_background')) echo ' light-background'; if( get_sub_field('border')) echo ' has-border'; ?>">

	<div class="wrap">

		<div class="section-content">
	
			<article class="<?php the_sub_field('image_position'); ?>">

				<?php if( get_sub_field('image_position') == 'image-left' ): ?>

					<figure class="image">
						<?php echo wp_get_attachment_image( get_sub_field('image'), $size = 'text-plus-image' ); ?>
					</figure>

				<?php endif; ?>
						
				<div class="text">

					<h1><?php the_sub_field('title'); ?></h1>

					<?php the_sub_field('text'); ?>

					<?php if( get_sub_field('cond_button') ): ?>
						<a href="<?php the_sub_field('button_link'); ?>" class="button"><?php the_sub_field('button_text'); ?></a>
					<?php endif; ?>

				</div>

				<?php if( get_sub_field('image_position') == 'image-right' ): ?>

					<figure class="image">
						<?php echo wp_get_attachment_image( get_sub_field('image'), $size = 'text-plus-image' ); ?>
					</figure>

				<?php endif; ?>

			</article>

		</div><!-- .section-content -->

		<?php get_template_part( 'parts/flexible_content_fields/divider' ); ?>

	</div>
	
</section><!-- .text-plus-image -->