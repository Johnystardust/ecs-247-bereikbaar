<?php

if( function_exists('register_field_group') ):

register_field_group(array (
	'key' => 'group_54d2072f8cc4f',
	'title' => 'Testimonial',
	'fields' => array (
		array (
			'key' => 'field_54d21259b4724',
			'label' => 'Afbeelding',
			'name' => 'image',
			'prefix' => '',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'id',
			'preview_size' => 'thumbnail',
			'library' => 'all',
		),
		array (
			'key' => 'field_54d21273b4725',
			'label' => 'Sterren',
			'name' => 'stars',
			'prefix' => '',
			'type' => 'number',
			'instructions' => 'Vul het aantal sterren in tussen de 1 en de 5',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 1,
			'max' => 5,
			'step' => '0.1',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_54d210fdb4722',
			'label' => 'Review',
			'name' => 'quote',
			'prefix' => '',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => 'wpautop',
			'readonly' => 0,
			'disabled' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'testimonial',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

endif;