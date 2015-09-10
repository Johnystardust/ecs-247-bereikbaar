<?php get_header(); ?>

	<?php get_template_part('parts/breadcrumbs'); ?>

    <section class="section content">

    	<div class="wrap">

    		<div class="section-content">

				<div class="main full-width">

					<h1><?php the_field('option_module_product_title' , 'option'); ?></h1>

					<?php the_field('option_module_product_intro' , 'option'); ?>
					
					<div id="products">

						<?php if ( !have_posts() ) get_template_part( 'parts/notice/no-posts' ); ?>

						<?php $count = 0; ?>

				        <?php while ( have_posts() ) : the_post(); $count++; ?>

				        	
				        	<article class="product<?php if($count % 2 == 0): ?> mobile-last<?php endif; ?><?php if($count % 3 == 0): ?> tablet-last<?php endif; ?><?php if($count % 4 == 0): ?> desktop-last<?php endif; ?>">							
								<a href="<?php the_permalink(); ?>" class="product-photo">
									<?php echo wp_get_attachment_image( get_field('product_image'), $size = 'product-image' ); ?>
								</a>
								<a href="<?php the_permalink(); ?>" class="member-title">
									<h3 class="h4"><?php the_title(); ?></h3>
								</a>
							</article>


				        <?php endwhile; ?>

						<?php wp_reset_postdata(); ?>

					</div>

				</div>

        	</div>

        	<div class="spacer no-margin"></div>

        </div>

	</section><!-- .content-->

<?php get_footer(); ?>