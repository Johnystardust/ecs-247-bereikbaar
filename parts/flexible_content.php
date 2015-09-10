<?php 
  /*
   * Load layout depending on flexible content
   */

  if ( get_field( 'page_content' ) ) :

    while ( has_sub_field( 'page_content' ) ) :

      switch ( get_row_layout() ) :

        case 'slider' :
          get_template_part( 'parts/flexible_content_fields/slider' );
          break;
        case 'text-plus-image' :
          get_template_part( 'parts/flexible_content_fields/text_plus_image' );
          break;
        case 'text_plus_widget' :
          get_template_part( 'parts/flexible_content_fields/text_plus_widget' );
          break;
        case 'text_plus_gallery' :
          get_template_part( 'parts/flexible_content_fields/text_plus_gallery' );
          break;
        case 'text_plus_images' :
          get_template_part( 'parts/flexible_content_fields/text_plus_images' );
          break;
        case 'text_plus_blocks' :
          get_template_part( 'parts/flexible_content_fields/text_plus_blocks' );
          break;        
        case 'blog' :
          if(is_module_active('blog')) get_template_part( 'parts/flexible_content_fields/blog' );
          break;
        case 'subscribe_newsletter' :
          if(is_module_active('enews')) get_template_part( 'parts/flexible_content_fields/subscribe_newsletter' );
          break;
        case 'wysiwyg' :
          get_template_part( 'parts/flexible_content_fields/wysiwyg' );
          break;
        case 'employees' :
          get_template_part( 'parts/flexible_content_fields/employees' );
          break;
                                              
      endswitch;

    endwhile;
  endif;  

?>  