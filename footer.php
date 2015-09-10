
	<?php get_template_part('parts/footer/bottom'); ?>

	<?php get_template_part('parts/footer/bottom-bar'); ?>

	<footer id="footer" role="contentinfo">
	    <div class="wrap">

			<?php get_template_part('parts/footer/branding'); ?>

	    </div>
	</footer><!-- #footer -->

	<?php if( in_array( get_the_ID(), get_field('option_sponsors_location_alternative_1', 'option') ) ): ?>

		<?php get_template_part('parts/footer/sponsors_alt1'); ?>

	<?php elseif( in_array( get_the_ID(), get_field('option_sponsors_location_alternative_2', 'option') ) ): ?>

		<?php get_template_part('parts/footer/sponsors_alt2'); ?>

	<?php else: ?>
		
		<?php get_template_part('parts/footer/sponsors'); ?>

	<?php endif; ?>

</div><!-- #wrapper -->

<?php wp_footer(); ?>

</body>
</html>