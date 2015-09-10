<?php if ( function_exists( 'yoast_breadcrumb' ) && ! is_front_page() ): ?>

	<div id="breadcrumb" class="<?php the_field('option_breadcrumbs_background', 'option'); ?>">
		<div class="wrap">

			<span>
				<?php yoast_breadcrumb('<span class="breadcrumb-label">' . __('U bent hier: ', 'ecs-corporate') . '</span>', ''); ?>
			</span>
		</div>
	</div>
<?php endif; ?>

		
