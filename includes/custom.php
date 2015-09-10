<?php

/**
 * Loop all products on product archive without pagination
 */

function get_all_product_posts( $query ) {
    if( !is_admin() && $query->is_main_query() && is_post_type_archive( 'product' ) ) {
        $query->set( 'posts_per_page', '-1' );
    }
}

add_action( 'pre_get_posts', 'get_all_product_posts');



/**
 * Change gravityforms confirmation scroll anchor.
 */

$header_height 		= 108;
$navigation_height 	= 71;
$navigation_height 	= 0; // no height, because it's position: fixed;
$breadcrumbs_height = 39;
$scroll_top = $header_height + $navigation_height + $breadcrumbs_height;

add_filter( 'gform_confirmation_anchor', create_function( '', 'return ' . $scroll_top . ';' ) );


/**
 * Ajax function to delete comment from a single video page
 **/

add_action( 'wp_ajax_nopriv_ecs_delete_comment', 'ecs_delete_comment' );
add_action( 'wp_ajax_ecs_delete_comment', 'ecs_delete_comment' );

function ecs_delete_comment(){

	$return_val = 'false';

	if( is_numeric( $_POST[ 'comment_id' ] ) ){

		$delete_comment = wp_delete_comment( $_POST[ 'comment_id' ], true );

		if( $delete_comment ){

			$return_val = 'true';

		}

	}

	echo $return_val;

	die();

}


/** COMMENTS WALKER */
class ecs_walker_comment extends Walker_Comment {

    // init classwide variables
    var $tree_type = 'comment';
    var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );

    /** CONSTRUCTOR
     * You'll have to use this if you plan to get to the top of the comments list, as
     * start_lvl() only goes as high as 1 deep nested comments */
    function __construct() { ?>

        <header class="comments-title">
            <span><?php echo get_comments_number(); ?></span> <?php _e( 'reactie(s) tot nu toe...', 'ecs-corporate' ); ?>
        </header>

    <?php }

    /** START_LVL
     * Starts the list before the CHILD elements are added. */
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 1; ?>
         <ul class="children">
    <?php }

    /** END_LVL
     * Ends the children list of after the elements are added. */
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 1; ?>

        </ul><!-- /.children -->

    <?php }

    /** START_EL */
    function start_el( &$output, $comment, $depth, $args, $id = 0 ) {
        $depth++;
        $GLOBALS['comment_depth'] = $depth;
        $GLOBALS['comment'] = $comment;
        $parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); ?>

            <div class="comment" id="comment-<?php comment_ID(); ?>" data-parent-class="<?php echo $parent_class; ?>">

                <!-- <figure class="avatar">
                    <?php echo ( $args['avatar_size'] != 0 ? get_avatar( $comment, $args['avatar_size'] ) :'' ); ?>
                </figure> -->

                <div class="comment-text" id="comment-text-<?php comment_ID(); ?>">

                    <span class="comment-title"><?php echo get_comment_author_link(); ?>, <?php comment_date(); ?> <?php _e( 'op', 'ecs-corporate' ); ?> <?php comment_time(); ?>:</span>

                    <?php if( !$comment->comment_approved ) : ?>

                        <p class="comment-awaiting-moderation"><?php _e( 'Uw reactie is in afwachting van plaatsing.', 'ecs-corporate' ); ?></p>

                    <?php else:

                        comment_text(); ?>

                    <?php endif; ?>

                    <div class="comment-utilities">
                    <?php

                    global $current_user;

                    if( $current_user->ID  == intval( $comment->user_id ) || current_user_can( 'moderate_comments' ) ){

                        ?>
                        <button class="delete-comment" data-comment-id="<?php echo $comment->comment_ID; ?>"><?php _e( 'Verwijder dit bericht', 'ecs-corporate' ); ?></button>
                        <?php

                    }

                    ?>
                    </div>

                </div>

                <?php

                /**
                 * Replies are an upsell
                 **/

                /*

                $reply_args = array(
                    'add_below' => $add_below,
                    'depth' => $depth,
                    'max_depth' => $args['max_depth'] );

                comment_reply_link( array_merge( $args, $reply_args ) );

                */

                ?>

    <?php }

    function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>

        </div>

    <?php }

    /** DESTRUCTOR
     * I'm just using this since we needed to use the constructor to reach the top
     * of the comments list, just seems to balance out nicely:) */
    function __destruct() { ?>

    <?php }
}