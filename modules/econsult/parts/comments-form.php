<?php

/**
 * Customization of the WordPress comment form
 **/

global $current_user;

$comment_form_args = array(
	'id_form'           => 'comment-form',
	'id_submit'         => 'comment-button',
	'title_reply'       => __( 'Reageer hier!' ),
	'title_reply_to'    => __( 'Reageer op bovenstaand bericht' ),
	'cancel_reply_link' => __( 'Afbreken' ),
	'label_submit'      => __( 'Reactie plaatsen' ),

	'comment_field' =>  '<p class="comment-form-comment"><textarea id="comment" name="comment" placeholder="' . __( 'Vul hier uw bericht in...' ) . '" cols="45" rows="8" aria-required="true"></textarea></p>',

	'must_log_in' => '<p class="must-log-in">' .
	sprintf(
	  __( 'Je moet <a href="%s">ingelogd</a> zijn om een bericht te kunnen plaatsen.' ),
	  wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
	) . '</p>',

	'logged_in_as' => false,

	'comment_notes_before' => false,

	'comment_notes_after' => '<input type="hidden" name="econsult_guid" value="'.get_field( 'econsult_guid' ).'">',

	'fields' => apply_filters( 'comment_form_default_fields', array(

		'author' =>
		  '<p class="comment-form-author">' .
		  '<label for="author">' . __( 'Naam', 'ecs-corporate' ) . '</label> ' .
		  ( $req ? '<span class="required">*</span>' : '' ) .
		  '<input id="author" name="author" type="text" value="' . $_GET[ 'fullname' ] .
		  '" size="30"' . $aria_req . ' /></p>',

		'email' =>
		  '<p class="comment-form-email"><label for="email">' . __( 'E-mailadres', 'ecs-corporate' ) . '</label> ' .
		  ( $req ? '<span class="required">*</span>' : '' ) .
		  '<input id="email" name="email" type="text" value="' . $_GET[ 'emailaddress' ] .
		  '" size="30"' . $aria_req . ' /></p>'
		)

	),
);

echo comment_form( $comment_form_args ); 
