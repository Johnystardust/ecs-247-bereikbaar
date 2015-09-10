<section class="content section">

	<div class="wrap">

		<div class="section-content">

			<div class="main full-width">

				<header class="page-header">
					<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="read-more" title="">Meer nieuws &raquo;</a>
					<h1 class="page-header-title">Laatste nieuws</h1>
				</header>

				<?php

					if ( get_sub_field('show_num_posts') ) {
						$num_posts = get_sub_field('show_num_posts');
					}
					else {
						$num_posts = 3;
					}

					$args = array (
						'posts_per_page'         => $num_posts,
					);

					$query = new WP_Query( $args );

				?>

				<?php if ( $query->have_posts() ): ?>

					<?php while ( $query->have_posts() ): $query->the_post(); ?>
				
						<?php get_template_part('parts/archive/loop'); ?>

					<?php endwhile; ?>

				<?php else: ?>

					<p>Er is geen nieuws gevonden.</p>

				<?php endif; ?>

				<?php wp_reset_postdata(); ?>

			</div><!-- .main-->

		</div><!-- .section-content -->

		<!-- <div class="spacer no-margin"></div> -->

	</div>

</section><!-- .content-->