<?php
/*
Template name: Medewerkers
*/
?>
<?php get_header(); ?>

	<?php get_template_part('parts/breadcrumbs'); ?>

    <section class="section content">
    
    	<div class="wrap">

			<div class="section-content">

				<div class="main">
				
					<?php the_content(); ?>
					
					<?php if ( !have_posts() ) get_template_part( 'parts/notice/no-posts' ); ?>

			        <?php while (have_posts()) : the_post(); ?>

			        	<?php get_template_part( '/parts/flexible_content' ); ?>

			        <?php endwhile; ?>

			        <?php wp_reset_postdata(); ?>

				</div>
				
				<?php get_sidebar(); ?>

	    	</div>
	    	
	    </div>

	</section><!-- .content-->

<?php get_footer(); ?>