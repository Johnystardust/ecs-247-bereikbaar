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


					<?php if( get_field('option_cond_social_sharing', 'option') ): ?>  

						<?php get_template_part('parts/social-share'); ?>

					<?php endif; ?>
					
					<div id="post-navigation">
							
						<div class="alignleft"><?php echo previous_post_link( '%link', '<i class="fa fa-chevron-left"></i>&nbsp;&nbsp;Vorige&nbsp;bericht' ); ?></div>
    					<div class="alignright"><?php echo next_post_link( '%link', 'Volgende&nbsp;bericht&nbsp;&nbsp;<i class="fa fa-chevron-right"></i>' ); ?></div>
    					
    					<div class="clear"></div>
						
					</div>

			    </div>

			    <?php get_sidebar(); ?>
			</div>

		</div>

	</section><!-- .content-->

    

<?php get_footer(); ?>