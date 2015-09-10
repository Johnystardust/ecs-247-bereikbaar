<section class="newsletter section no-border">
	<div class="wrap">
		
		<h4 class="h2"><?php the_sub_field('title'); ?></h4>

		<?php 
		    $form = get_sub_field('form');
		    gravity_form_enqueue_scripts($form->id, true);
		    gravity_form($form->id, false, false, false, '', true, 1); 
		?>

	</div>
</section>