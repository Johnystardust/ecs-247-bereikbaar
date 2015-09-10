<?php get_header(); ?>

	<?php get_template_part('parts/breadcrumbs'); ?>

    <section class="section content">

    	<div class="wrap">

    		<div class="section-content">

				<div class="main full-width">

					<article <?php post_class(); ?>>

						<?php if ( !have_posts() ) get_template_part( 'parts/notice/no-posts' ); ?>

				        <?php while (have_posts()) : the_post(); ?>

				        	<figure class="product-image">
				        	
				        		<?php $image = get_field( 'product_image' ); ?>
				        		<?php $image_large = wp_get_attachment_image_src( $image, 'large' ); ?>
				        		
				        		<a class="zoom" href="<?php echo $image_large[0]; ?>">
									<?php echo wp_get_attachment_image( $image, 'product-image-single' ); ?>
								</a>
								
							</figure>
							
							<div class="product-text">
								
								<h1><?php the_title(); ?></h1>

								<?php the_content(); ?>

								<a href="<?php the_field('product_link'); ?>" class="button">
									<?php if( get_field('product_link_text') ): ?>
										<?php the_field('product_link_text'); ?>
									<?php else: ?>
										Bestel nu
									<?php endif; ?>
								
								</a>

							</div>

				        <?php endwhile; ?>

				        <?php wp_reset_postdata(); ?>

					</article>

			    </div>

			</div>

        </div>

	</section><!-- .content-->

    

<?php get_footer(); ?>