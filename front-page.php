<?php get_header(); ?>

	<?php get_template_part('parts/breadcrumbs'); ?>

    <div id="main" role="main">

		<?php if ( !have_posts() ) get_template_part( 'parts/notice/no-posts' ); ?>

        <?php while (have_posts()) : the_post(); ?>

			<?php get_template_part( '/parts/flexible_content' ); ?>

        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>

    </div>

<?php get_footer(); ?>