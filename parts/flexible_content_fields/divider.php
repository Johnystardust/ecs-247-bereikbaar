<?php


if( get_sub_field( 'divider_type' ) ):

  $divider_type = get_sub_field('divider_type');

  switch ( $divider_type ) {
    case 'default':
      
        echo '<div class="spacer no-margin"></div>';

      break;
    case 'icon':
      
        echo '<div class="spacer no-margin"><figure class="spacer-icon"></figure></div>';

      break;
    case 'logo':

        $divider_icon = wp_get_attachment_image_src( get_field( 'option_mini_logo' , 'option'), $size = 'mini-logo-image' );

        echo '<div class="spacer no-margin"><figure class="custom-spacer-icon translate-y"><img src="'. $divider_icon[0] .'" alt=""></figure></div>';

      break;   
    default:
        echo '<div class="spacer no-margin"></div>';
      break;
  }

endif;