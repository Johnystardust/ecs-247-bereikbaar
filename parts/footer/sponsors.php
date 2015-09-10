<?php if( have_rows('option_sponsors', 'option') ): ?>

	<?php $count = 0; $rows = count(get_field('option_sponsors','option')); ?>

	<div id="sponsors">
		<div class="wrap">
		
	    	<span class="label">
	    		<?php the_field( 'option_sponsor_title', 'option' ); ?>
	    	</span>

	    	<?php while ( have_rows('option_sponsors', 'option') ) : the_row(); $count++ ?>
	    	
		    	<a <?php if(get_sub_field('target_blank')) echo 'target="_blank" '; ?>href="<?php the_sub_field('link'); ?>" target="_blank" class="sponsor-link-button"><?php the_sub_field('link_text'); ?></a>
		    	
				<?php if( $count != $rows ): ?>

		    		<span class="divider">-</span>

		    	<?php endif; ?>

		    <?php endwhile; ?>
	    	
		</div>
	</div>

<?php endif; ?>