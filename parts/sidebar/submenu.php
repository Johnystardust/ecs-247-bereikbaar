<?php

/*
 * Submenu
 *
 * Search for parent/ancestor items and also display child items
 * for an effective stylable submenu.
 */

/* Child items */
$child_items = wp_list_pages( array( 
	'title_li'	=> '', 
	'depth'		=> 1,
	'child_of'	=> ecs_get_post_top_ancestor_id(),
	'echo'		=> 0,
	'post_type'	=> get_post_type() 
) ); 

$custom_links = get_field( 'submenu_items' );
$subnavi_header = false;

if ( ! empty( $child_items ) || ! empty( $custom_links ) ) : ?>

	<nav id="subnavi" class="widget">

		<?php if ( $subnavi_header ) : ?>
			
			<header class="widget-header">
				<h3>
					<?php echo get_the_title( ecs_get_post_top_ancestor_id() ); ?>
				</h3>
			</header>

		<?php endif; ?>

		<ul class="sub-menu">

		<?php while( has_sub_field( 'submenu_items' ) ): ?>

		<li class="page_item custom"><a href="<?php the_sub_field( 'links' ); ?>"><?php the_sub_field( 'titel' ); ?></a></li>

		<?php endwhile; ?>

		<?php echo $child_items ; ?>

		</ul>

	</nav>

<?php endif; ?>

