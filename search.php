<?php get_header(); ?>

	<?php get_template_part('parts/breadcrumbs'); ?>

    <section class="section content">

    	<div class="wrap">

    		<div class="section-content">

				<div class="main">

					<h1>Zoekresultaten</h1>

					<div class="spacer"></div>

					<?php if ( !have_posts() ) get_template_part( 'parts/notice/no-posts' ); ?>

			        <?php while ( have_posts() ) : the_post(); ?>
			        	
			        	<?php get_template_part('parts/archive/loop'); ?>

					<?php endwhile; ?>

					<?php wp_pagenavi(); ?>

					<?php wp_reset_postdata(); ?>

   				</div>

   			<?php get_sidebar(); ?>

			</div>

		</div>

	</section><!-- .content-->

    
<?php get_footer(); ?>