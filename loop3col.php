<?php if ( have_posts() ): ?>

	<?php
	$search_query = get_search_query();
	$query = new WP_Query(array(
		'post_type' 						 => 'any',
		'posts_per_page' 				 => 6,
		'posts_per_archive_page' => 6,
		's'											 => $search_query
	));

	while ( $query->have_posts() ) : $query->the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class('three-col'); ?>>

			<!-- post title -->
			<h2 class="post-title-grid">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo limit_character_count( get_the_title(), 22); ?></a>
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

	<?php
	endwhile;
	wp_reset_postdata();
	?>

<?php else : ?>

	<?php
	$query = new WP_Query(array(
		'orderby'        				 => 'rand',
		'post_type' 						 => 'post',
		'posts_per_page' 				 => 5,
		'posts_per_archive_page' => 5,
	));

	while ( $query->have_posts() ) : $query->the_post(); ?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class('three-col'); ?>>

		<!-- post title -->
		<h2 class="post-title-grid">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo limit_character_count( get_the_title(), 22); ?></a>
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

	<?php
	endwhile;
	wp_reset_postdata();
	?>

<?php endif; ?>
