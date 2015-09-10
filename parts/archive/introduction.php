<?php
/**
* @introduction.php
*
* In this file we retrieve the options page for the post type we are on
**/

$post_type = get_post_type();

?>

<?php if( get_field( $post_type . '_archive_title', 'options' ) ) : ?>

<div class="archive-introduction archive-introduction-<?php echo $post_type; ?>">
		
	<?php $thumbnail_id = get_field( $post_type . '_archive_image', 'options' ); ?>
	
	<?php if( !empty( $thumbnail_id ) ): ?>
	
	<figure class="archive-introduction-image">

		<?php echo wp_get_attachment_image( $thumbnail_id, array( 160, 160 ) ); ?>

	</figure>
	
	<?php endif; ?>
		
	<div class="archive-introduction-text">

		<h1><?php the_field( $post_type . '_archive_title', 'options' ); ?></h1>
		<?php the_field( $post_type . '_archive_description', 'options' ); ?>

	</div>
	
</div>

<?php endif; ?>