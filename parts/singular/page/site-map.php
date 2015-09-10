    <?php
    /*
    *
    *	@sitemap
    *
    *	Custom template for the sitemap shortcode.
    *
    * 	Specify as [sitemap template="/parts/singular/page/sitemap.php"][/sitemap]
    *	If the template is not specified, it will fallback to the template in the
    *	shortcodes plugin.
    *
    */
    ?>

    <div class="two-cols">

        <div class="box free">

            <div class="text">
        
                <h3><?php _e( "Pagina's:", 'ecs-corporate' ); ?></h3>
                <ul>
                    <?php $args = array(
                        'exclude'   => '2, 92, 509, 510, 515',
                        'title_li'  => ''
                        );

                    wp_list_pages( $args ); ?>
                </ul>

                 <h3><?php _e('RSS Feeds:', 'ecs-corporate'); ?></h3>
                <ul>
                    <li><a href="<?php echo get_stylesheet_directory_uri(); ?>/feed"><?php _e('Berichten', 'ecs-corporate'); ?></a></li>
                    <li><a href="<?php echo get_stylesheet_directory_uri(); ?>/comments/feed/"><?php _e('Reacties', 'ecs-corporate'); ?></a></li>
                </ul>

            </div>

        </div>
      
    </div>

    <div class="two-cols last">

        <div class="box free">

            <div class="text">

                <h3><?php _e('Blog Berichten:', 'ecs-corporate'); ?></h3>
                <ul>
                    <?php
                    // TODO: wat is dit?
                    $archive_query = new WP_Query('showposts=-1');
                    while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
                        <small>(<?php the_time( 'j M Y' ); ?>)</small>
                    </li>
                    <?php endwhile; ?>

                    <?php wp_reset_postdata(); ?>
                </ul>

                <h3><?php _e('Blog Categorieen:', 'ecs-corporate'); ?></h3>
                <ul>
                    <?php wp_list_categories('title_li=&sort_column=name&optioncount=1&hierarchical=0&feed=RSS'); ?>
                </ul>

                <h3><?php _e('Archieven:', 'ecs-corporate'); ?></h3>
                <ul>
                    <?php wp_get_archives('type=monthly&show_post_count=true'); ?>
                </ul>

            </div>

        </div>

    </div>

    <div class="clear"></div>