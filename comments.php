<?php
/**
 * The template for displaying Comments
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<?php if ( have_comments() ) : ?>

	<?php wp_list_comments( array(
        'walker' 		=> new ecs_walker_comment,
        'style' 		=> 'ul',
        'callback' 		=> null,
        'end-callback' 	=> null,
        'type' 			=> 'all',
        'page' 			=> null,
        'avatar_size' 	=> 80,
        'format' 		=> 'html5'
    ) ); ?>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Navigatie voor reacties', 'ecs-corporate' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( __( '&larr; Oudere reacties', 'ecs-corporate' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Nieuwere reacties &rarr;', 'ecs-corporate' ) ); ?></div>
	</nav><!-- #comment-nav-below -->
	<?php endif; // Check for comment navigation. ?>

	<?php if ( ! comments_open() ) : ?>
	<p class="no-comments"><?php _e( 'Reacties zijn gesloten.', 'ecs-corporate' ); ?></p>
	<?php endif; ?>

<?php endif; // have_comments() ?>