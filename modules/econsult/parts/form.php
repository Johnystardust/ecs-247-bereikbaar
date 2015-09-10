<?php if( get_field('option_vacation_notice', 'option') ): ?>
	
<div class="info">
	
	<?php the_field('option_vacation_notice_text', 'option'); ?>

</div>

<?php endif;

acf_form( array(
	'post_id'		=> 'new_post',
	'new_post'		=> array(
		'post_type'			=> 'econsult',
		'post_status'		=> 'publish'
	),
	'field_groups'	=> array(
		'group_54c8fbe67c657'
	),
	'post_content'		=> false,
	'return'			=> add_query_arg( array( 
	 	'econsult_sent' => 'true'
	 	),
	 	get_permalink()
	),
	'submit_value'		=> 'Vraag een econsult aan'
));