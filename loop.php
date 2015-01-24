<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<?php if(is_category( 'eat' ) || is_category( 'shop' ) || is_category( 'play' )) : ?>
		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class('three-col-rtl'); ?>>

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

			<?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>

			<a class="editorial-more" href="<?php echo get_the_permalink(); ?>">+ Read More</a>

		</article>

	<?php  else: ?>
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

				<?php echo limit_character_count( get_the_excerpt(), 120); ?>
				<?php //html5wp_excerpt('html5wp_index', 100); // Build your custom callback length in functions.php ?>

				<a class="editorial-more" href="<?php echo get_the_permalink(); ?>">+ Read More</a>

			</article>
			<!-- /article -->
	<?php endif; ?>

<?php endwhile; ?>

<?php else: ?>

<?php endif; ?>
