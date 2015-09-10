<?php if ( get_field( 'slider' ) ): ?>

<section class="section-slider section">

	<div class="slider-holder">

		<div class="slider">

			<?php foreach ( get_field( 'slider' ) as $slide ) : ?>
			
				<article class="slide <?php echo $slide['box_background']; ?>">
						
					<figure class="slide-image">
						<?php echo wp_get_attachment_image( $slide['image'], $size = 'slider-image' ); ?>
					</figure>
					
					<div class="slide-text">
						<h2><?php echo $slide['title']; ?></h2>
						<?php echo apply_filters( 'the_content', $slide['text'] ); ?>
						<div class="button-holder<?php if ( ! $slide['link_text'] ) : echo ' no-button-text'; endif; ?>">
							<a href="<?php echo $slide['link']; ?>" class="button">
								<span class="button-text"><?php echo $slide['link_text']; ?></span>
								<span class="title-text"><?php echo $slide['title']; ?></span>
							</a>
						</div>
					</div>
					
				</article>

			<?php endforeach; ?>
			
		</div>
		
	</div><!-- #slider-holder -->
  
</section>

<?php endif ?>