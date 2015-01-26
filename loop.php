
	<div class="three-col-wrap jquery-ajax-post-container">
	<?php

		$categories = get_the_category();
		$separator = "+";
		$category_title = "";
		foreach($categories as $category) {
			if ($category === end($categories)) {
				$category_title .= $category->name;
			} else {
				$category_title .= $category->name . $separator;
			}
		}

		if( is_category( 'eat' ) || is_category( 'shop' ) || is_category( 'play' ) ) :
			$query = new WP_Query(array(
				'post_type' 						 => 'post',
				'posts_per_page' 				 => 6,
				'posts_per_archive_page' => 6,
				'category_name'					 => $category_title
			));
		elseif ( is_category( 'hotel' ) ) :
			$categories = get_the_category();
			$separator = "+";
			$category_title = "";
			foreach($categories as $category) {
				if ($category === end($categories)) {
					$category_title .= $category->name;
				}
			}
			$query = new WP_Query(array(
				'post_type' 						 => 'hotel',
				'posts_per_page' 				 => 6,
				'posts_per_archive_page' => 6,
				'category_name'					 => strtolower( $category_title )
			));
		else :
			$query = new WP_Query(array(
				'post_type' 						 => 'post',
				'posts_per_page' 				 => 6,
				'posts_per_archive_page' => 6,
				'category_name'					 => strtolower( single_cat_title('', false) )
			));
		endif;

		while ( $query->have_posts() ) : $query->the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class('three-col'); ?>>

			<!-- post title -->
			<h2 class="post-title-grid">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo limit_character_count( get_the_title(), 23); ?></a>
			</h2>
			<!-- /post title -->

			<!-- post thumbnail -->
			<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php the_post_thumbnail('grid-thumb'); // Declare pixel size you need inside the array ?>
				</a>
			<?php endif; ?>
			<!-- /post thumbnail -->

			<?php //html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>
			<?php $excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $query->post->ID)); ?>
			<p class="excerpt"><?php  echo limit_character_count( $excerpt, 100); ?></p>

			<a class="editorial-more" href="<?php the_permalink(); ?>">+ Read More</a>

		</article>
		<!-- /article -->

	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
	</div><!-- .three-col-wrap -->

	<?php if( is_category( 'eat' ) || is_category( 'shop' ) || is_category( 'play' ) ) : ?>
		<?php
			$categories = get_the_category();
			$separator = "+";
			$category_title = "";
			foreach($categories as $category) {
				if ($category === end($categories)) {
					$category_title .= $category->name;
				} else {
					$category_title .= $category->name . $separator;
				}
			}
		?>
		<button class="jquery-ajax-get-posts" data-post-type="post" data-post-count="6" data-post-category="<?php echo strtolower( $category_title ); ?>" data-post-offset="6">Load More Posts</button>
	<?php elseif( is_category( 'hotel' ) ) : ?>
		<?php
		$categories = get_the_category();
		$separator = "+";
		$category_title = "";
		foreach($categories as $category) {
			if ($category === end($categories)) {
				$category_title .= $category->name;
			}
		}
		?>
		<button class="jquery-ajax-get-posts" data-post-type="hotel" data-post-count="6" data-post-category="<?php echo strtolower($category_title); ?>" data-post-offset="6">Load More Posts</button>
	<?php else : ?>
		<button class="jquery-ajax-get-posts" data-post-type="post" data-post-count="6" data-post-category="<?php echo strtolower( single_cat_title('', false) ); ?>" data-post-offset="6">Load More Posts</button>
	<?php endif; ?>
