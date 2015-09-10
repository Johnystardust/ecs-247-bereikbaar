<?php if( have_rows('option_headerbuttons', 'option') ): ?>

	<div id="header-buttons">

		<div id="header-buttons-holder">

			<?php while ( have_rows('option_headerbuttons', 'option') ) : the_row(); ?>

				<a href="<?php the_sub_field('link'); ?>"<?php if(get_sub_field('cond_targetblank')){ echo ' target="_blank"'; }?> class="button">
					<?php the_sub_field('name'); ?>
				</a>

			<?php endwhile; ?>

		</div>
		
	</div>

<?php endif; ?>