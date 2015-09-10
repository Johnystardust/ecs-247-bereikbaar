<div id="logo">

	<?php if ( !is_front_page() ) : ?>
	<a href="<?php echo home_url(); ?>">
	<?php endif; ?>

		<?php if( get_field('option_sitelogo', 'option') ): ?>

			<figure id="logo-image">

				<img src="<?php the_field('option_sitelogo', 'option') ?>" alt="<?php bloginfo('name'); ?>" />

			</figure>

		<?php endif; ?>

		<?php if( get_field('option_sitename', 'option') || get_field('option_sitesubtitle', 'option') ): ?>

			<div id="logo-text">

				<?php if( get_field('option_sitename', 'option')): ?><span class="website-title"><?php the_field('option_sitename', 'option'); ?></span><?php endif; ?>
				<?php if( get_field('option_sitesubtitle', 'option')): ?><span class="website-payoff"><?php the_field('option_sitesubtitle', 'option'); ?></span><?php endif; ?>

			</div>

		<?php endif; ?>

	<?php if ( !is_front_page() ) : ?>
	</a>
	<?php endif; ?>

</div>