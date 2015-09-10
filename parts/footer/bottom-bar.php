<section id="bottom-bar">
	<div class="wrap">
		
		<div id="bottom-social-media">

			<span class="social-media-label">
				Volg ons
			</span>

			<div class="social-media-links small">

				<?php if( get_field('option_twitter', 'option') ): ?>

					<a href="<?php echo esc_url(get_field('option_twitter', 'option')); ?>" target="_blank" class="twitter">
						<i class="fa fa-twitter"></i>
						<span class="screen-reader-text">Twitter</span>
					</a>

				<?php endif; ?>

				<?php if( get_field('option_linkedin', 'option') ): ?>

				<a href="<?php echo esc_url(get_field('option_linkedin', 'option')); ?>" target="_blank" class="linkedin">
					<i class="fa fa-linkedin"></i>
					<span class="screen-reader-text">LinkedIn</span>
				</a>

				<?php endif; ?>

				<?php if( get_field('option_facebook', 'option') ): ?>

				<a href="<?php echo esc_url(get_field('option_facebook', 'option')); ?>" target="_blank" class="facebook">
					<i class="fa fa-facebook"></i>
					<span class="screen-reader-text">Facebook</span>
				</a>

				<?php endif; ?>

				<?php if( get_field('option_googleplus', 'option') ): ?>

				<a href="<?php echo esc_url(get_field('option_googleplus', 'option')); ?>" target="_blank" class="google-plus">
					<i class="fa fa-google-plus"></i>
					<span class="screen-reader-text">Google+</span>
				</a>

				<?php endif; ?>

				<?php if( get_field('option_instagram', 'option') ): ?>

				<a href="<?php echo esc_url(get_field('option_instagram', 'option')); ?>" target="_blank" class="instagram">
					<i class="fa fa-instagram"></i>
					<span class="screen-reader-text">Instagram</span>
				</a>

				<?php endif; ?>

				<?php if( get_field('option_pinterest', 'option') ): ?>

				<a href="<?php echo esc_url(get_field('option_pinterest', 'option')); ?>" target="_blank" class="pinterest">
					<i class="fa fa-pinterest"></i>
					<span class="screen-reader-text">Pinterest</span>
				</a>

				<?php endif; ?>

				<?php if( get_field('option_flickr', 'option') ): ?>

				<a href="<?php echo esc_url(get_field('option_flickr', 'option')); ?>" target="_blank" class="flickr">
					<i class="fa fa-flickr"></i>
					<span class="screen-reader-text">Flickr</span>
				</a>

				<?php endif; ?>

				<?php if( get_field('option_thumblr', 'option') ): ?>

				<a href="<?php echo esc_url(get_field('option_thumblr', 'option')); ?>" target="_blank" class="tumblr">
					<i class="fa fa-tumblr"></i>
					<span class="screen-reader-text">Tumblr</span>
				</a>

				<?php endif; ?>

				<?php if( get_field('option_foursquare', 'option') ): ?>

				<a href="<?php echo esc_url(get_field('option_foursquare', 'option')); ?>" target="_blank" class="foursquare">
					<i class="fa fa-foursquare"></i>
					<span class="screen-reader-text">Tumblr</span>
				</a>

				<?php endif; ?>

				<?php if( get_field('option_vine', 'option') ): ?>

				<a href="<?php echo esc_url(get_field('option_vine', 'option')); ?>" target="_blank" class="vine">
					<i class="fa fa-vine"></i>
					<span class="screen-reader-text">Vine</span>
				</a>

				<?php endif; ?>

			</div>

		</div>
		<?php if( have_rows('option_certifications', 'option') ): ?>

			<div id="bottom-logos">

				<?php while ( have_rows('option_certifications', 'option') ) : the_row(); ?>

					<?php echo wp_get_attachment_image( get_sub_field('keurmerk'), $size = 'certification-image' ); ?>

				<?php endwhile; ?>

			</div>

		<?php endif; ?>

	</div>
</section><!-- #bottom-bar -->