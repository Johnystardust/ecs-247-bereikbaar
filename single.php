<?php get_header(); ?>

	<?php get_template_part('parts/breadcrumbs'); ?>

    <section class="section content">

    	<div class="wrap">

    		<div class="section-content">

				<div class="main">

					<?php if ( !have_posts() ) get_template_part( 'parts/notice/no-posts' ); ?>

			        <?php while ( have_posts() ) : the_post(); ?>

				        <article <?php post_class(); ?>>

				        	<header class="single-post-header">
								
								<h1><?php the_title(); ?></h1>
								
								<time class="post-date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time( 'd F Y' ); ?></time>

							</header>

							<?php if ( has_post_thumbnail() ) : ?>
											
								<figure class="single-post-image">
									<?php the_post_thumbnail( 'blog-image' ); ?>
								</figure>
								
							<?php endif; ?>
				
							<?php the_content(); ?>
				
						</article>

					<?php endwhile; ?> 

					<?php wp_reset_postdata(); ?>

			    </div>

			    <?php get_sidebar(); ?>
			</div>

		</div>

	</section><!-- .content-->

    

<?php get_footer(); ?>