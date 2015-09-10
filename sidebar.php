<aside class="sidebar" role="complementary">

	<?php get_template_part( 'parts/sidebar/submenu' ); ?>

	<?php get_template_part( 'parts/sidebar/flexible-widgets' ); ?>

	<?php if ( is_home() || is_singular( 'post' ) ) : ?>

		<?php dynamic_sidebar( get_the_title( get_option( 'page_for_posts' ) ) . ' sidebar (blog module)' ); ?> 

	<?php else: ?>

		<?php dynamic_sidebar( 'Sidebar' ); ?> 

	<?php endif; ?>

</aside>