<?php get_header(); ?>

	<div class="slider-bgcolor">
		<!-- echoing slider if exists -->
		<?php
			get_template_part('slider');
		?>
		<!-- /slider -->
	</div>

	<main role="main">
	<!-- section -->
	<section class="content-post">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>


		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<!-- post title -->
			<h1>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h1>
			<!-- /post title -->

			<!-- post details -->
			<p class="post-cat"><?php the_category(', '); // Separated by commas ?></p>
			<span class="author"><?php the_author_posts_link(); ?></span>
			<span class="date">
				<time datetime="<?php the_time('Y-m-d'); ?>">
					<?php the_date(); ?> <?php the_time(); ?>
				</time>
			</span>
			<!-- /post details -->

			<?php the_content(); // Dynamic Content ?>

			<?php //edit_post_link(); // Always handy to have Edit Post Links available ?>

			<?php //comments_template(); ?>

		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	<?php get_template_part('share');?>

	</section>

	<aside class="hotel-list-large">
		<h2>Where to Stay</h2>
		<?php

		$posts = get_field('where_to_stay');

		if( $posts ): ?>
		<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
			<?php setup_postdata($post); ?>
			<div class="hotel-listing">
				<!-- post thumbnail -->
				<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail('stay-thumb');?>
					</a>
				<?php endif; ?>
				<!-- /post thumbnail -->
				<h3 class="hotel-listing-title">
					<a href="<?php the_permalink(); ?>"><?php echo limit_character_count(get_the_title(), 22); ?></a>
				</h3>
				<?php the_excerpt(); ?>
			</div>
	<?php endforeach; ?>
	<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
	<?php endif; ?>
	<p class="view-all"><a href="/hotel">View all</a></p>
	</aside>
	<!-- /section -->

	</main>

<?php get_template_part('relatedarticles'); ?>

<?php get_footer(); ?>
