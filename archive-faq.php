<?php get_header(); ?>

	<?php get_template_part('parts/breadcrumbs'); ?>

    <section class="section content">

    	<div class="wrap">

    		<div class="section-content">

				<div class="main full-width">

					<?php $terms = get_terms( 'faq_category' ); ?>

					<?php foreach( $terms as $term ): 

						$args = array (
							'post_type'              => 'faq',
							'tax_query' => array(
								array(
									'taxonomy' => 'faq_category',
									'field'    => 'id',
									'terms'    => $term->term_id,
								),
							),
						);

						$query = new WP_Query( $args ); ?>

						<h1><?php echo $term->name; ?></h1>

						 <?php while ( $query->have_posts() ) : $query->the_post(); ?>

							<div class="toggle-holder">
							    <h5 class="toggle"><span><?php the_title(); ?></span></h5>
							    <div class="toggle-box">
							        <div>
								    	<?php the_content(); ?>
							        </div>
							    </div>
						    </div>

				        	

				        <?php endwhile; ?>

					<?php endforeach; ?>

			       

			        <?php wp_reset_postdata(); ?>

				</div>

        	</div>

        	<div class="spacer no-margin"></div>

        </div>

	</section><!-- .content-->

<?php get_footer(); ?>