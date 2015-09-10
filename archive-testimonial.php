<?php get_header(); ?>

	<?php get_template_part('parts/breadcrumbs'); ?>

    <section class="section content">

    	<div class="wrap">

    		<div class="section-content">

				<div class="main">

					<h1>Testimonials</h1>

					<div class="spacer"></div>

					<?php if ( !have_posts() ) get_template_part( 'parts/notice/no-posts' ); $count = 0; ?>

			        <?php while ( have_posts() ) : the_post(); $count++ ?>

						<article class="testimonial-single testimonial-post<?php if($count % 2 == 0) echo ' last'; ?>">
							
							<?php if ( get_field( 'image' ) ) : ?>
								<figure class="author-image">
									<?php echo wp_get_attachment_image( get_field( 'image' ), 'thumbnail' ); ?>
								</figure>
							<?php endif; ?>
							
							<div class="testimonial-text">
								<div class="testimonial-content">
									
									<h3 class="testimonial-author">
										<?php the_title(); ?>
									</h3>

									<?php 
									
									$rating = get_field( 'stars' );
									
									if ( $rating ) : ?>
										
										<div class="author-rating">
											<div class="rating-stars">
												<span class="star-filler" style="width: <?php echo $rating * 20; ?>%;"></span>
											</div>
										</div>
										
									<?php endif; ?>

									<?php the_field( 'quote' ); ?>

								</div>
													
							</div>
						</article>

					<?php endwhile; ?>

					<?php wp_pagenavi(); ?>

					<?php wp_reset_postdata(); ?>

   				</div>

   			<?php get_sidebar(); ?>

			</div>

		</div>

	</section><!-- .content-->

    
<?php get_footer(); ?>