<article class="blog-post has-image">

	<figure class="post-image">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php the_post_thumbnail( 'blog-thumbnail' ); ?>
		</a>
	</figure>
	
	<div class="post-text">

		<header class="post-header">
			<h2>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h2>
			<div class="post-meta">
				<span class="post-author meta-item">
					Door <em><?php the_author(); ?></em>
				</span>
				<time class="post-date meta-item" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time( 'd F Y' ); ?></time>
				<span class="post-category meta-item">
					 &middot; In <?php the_category(); ?>
				</span>
			</div>
		</header>
	
		<?php the_excerpt(); ?>
		
		<a href="<?php the_permalink(); ?>" class="view-post" title="<?php the_title(); ?>">Lees meer &raquo;</a>
		
	</div>
	
</article>