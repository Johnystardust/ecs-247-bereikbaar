<?php get_header(); ?>

	<?php get_template_part('parts/breadcrumbs'); ?>

    <div id="main" class="full-width" role="main">

		<article <?php post_class(); ?>>

			<?php get_template_part('parts/error-404/404'); ?>

		</article>

    </div>

<?php get_footer(); ?>