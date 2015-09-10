<?php
/*
Template name: Full width
*/
?>
<?php get_header(); ?>

	<?php get_template_part('parts/breadcrumbs'); ?>

	<section class="section content">

		<?php if ( !have_posts() ) get_template_part( 'parts/notice/no-posts' ); ?>

		<?php while (have_posts()) : the_post(); ?>

			<?php get_template_part( '/parts/flexible_content' ); ?>
		
			<?php the_content(); ?>

		<?php endwhile; ?>

		<?php wp_reset_postdata(); ?>

	</section><!-- .content-->

<?php get_footer(); ?>