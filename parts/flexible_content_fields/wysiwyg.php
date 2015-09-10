<?php if ( get_sub_field( 'content' ) ) : ?>

<section class="section content<?php if( get_sub_field('light_background')) echo ' light-background'; if( get_sub_field('border')) echo ' has-border'; ?>">

	<div class="wrap">

		<div class="section-content">

			<?php the_sub_field('content'); ?>

		</div>

		<?php get_template_part( 'parts/flexible_content_fields/divider' ); ?>

	</div>

</section>

<?php endif; ?>