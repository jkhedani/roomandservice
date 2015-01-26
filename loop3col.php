<?php if (have_posts()): while (have_posts()) : the_post(); ?>

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
		<p class="excerpt"><?php  echo limit_character_count( get_the_excerpt(), 120); ?></p>

		<a class="editorial-more" href="http://192.168.20.50/backpacking-haleakala/">+ Read More</a>

	</article>
	<!-- /article -->

<?php endwhile; ?>

<?php else: ?>

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
			<p class="excerpt"><?php  echo limit_character_count( get_the_excerpt(), 100); ?></p>

			<a class="editorial-more" href="http://192.168.20.50/backpacking-haleakala/">+ Read More</a>

		</article>
		<!-- /article -->

		<?php
		endwhile;
		wp_reset_postdata();
	?>

<?php endif; ?>
