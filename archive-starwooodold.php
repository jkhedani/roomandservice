<?php get_header(); ?>

	<?php $cat = get_query_var( 'cats' ); ?>
	
	<main role="main">
		<!-- section -->
		<section>

			<h1 class="archive-name all-hotels page-cat-title"><?php echo ucfirst($cat); ?> Hotels</h1>
			<div class="island-filter">
				<h3 class="island-filter-button dropdown">Filter by Island</h3>
				<ul class="island-filter-menu island-filter-list">
					<?php
						$total = new WP_Query(array(
							'post_type' 						 => 'hotel',
							'post_count' 						 => -1,
							'category_name'					 => $cat . "+oahu"
						));
					?>
					<li><a class="jquery-ajax-get-posts jquery-ajax-clear-posts jquery-ajax-update-load-more" data-post-type="hotel" data-post-count="6" data-post-category="<?php echo $cat; ?>+oahu" data-post-offset="0" data-total-post-count="<?php echo $total->found_posts; ?>">Oahu</a></li>
					<?php
						$total = new WP_Query(array(
							'post_type' 						 => 'hotel',
							'post_count' 						 => -1,
							'category_name'					 => $cat . "+kauai"
						));
					?>
					<li><a class="jquery-ajax-get-posts jquery-ajax-clear-posts jquery-ajax-update-load-more" data-post-type="hotel" data-post-count="6" data-post-category="<?php echo $cat; ?>+kauai" data-post-offset="0" data-total-post-count="<?php echo $total->found_posts; ?>">Kauai</a></li>
					<?php
						$total = new WP_Query(array(
							'post_type' 						 => 'hotel',
							'post_count' 						 => -1,
							'category_name'					 => $cat . "+maui"
						));
					?>
					<li><a class="jquery-ajax-get-posts jquery-ajax-clear-posts jquery-ajax-update-load-more" data-post-type="hotel" data-post-count="6" data-post-category="<?php echo $cat; ?>+maui" data-post-offset="0" data-total-post-count="<?php echo $total->found_posts; ?>">Maui</a></li>
					<?php
						$total = new WP_Query(array(
							'post_type' 						 => 'post',
							'post_count' 						 => -1,
							'category_name'					 => $cat . "+big-island"
						));
					?>
					<li><a class="jquery-ajax-get-posts jquery-ajax-clear-posts jquery-ajax-update-load-more" data-post-type="hotel" data-post-count="6" data-post-category="<?php echo $cat; ?>+big-island" data-post-offset="0" data-total-post-count="<?php echo $total->found_posts; ?>">Big Island</a></li>
				</ul>
			</div>

						<section>

					<?php //get_template_part('slider');?>
					<div class="slider clear">
						<!-- echoing slider if exists -->
						<?php
						if(function_exists('show_flexslider_rotator') && get_field('all-hotels-slider', 'option')) echo show_flexslider_rotator(get_field('all-hotels-slider', 'option'));
						?>
						<!-- /slider -->
					</div>

				</section>

			<div id="content" class="three-col-wrap jquery-ajax-post-container">
				<?php
				$search_query = get_search_query();
				$query = new WP_Query(array(
					'post_type' 						 => 'hotel',
					'posts_per_page' 				 => 6,
					'posts_per_archive_page' => 6,
					'category_name'					 => $cat
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
			</div>

			<?php
				// Total Post Count
				$total = new WP_Query(array(
					'post_type' 						 => 'hotel',
					'post_count' 						 => -1,
					'category_name'					 => $cat
				));
			?>
			<button class="jquery-ajax-get-posts jquery-ajax-get-posts-button" data-post-type="hotel" data-post-count="6" data-post-category="<?php echo $cat; ?>" data-post-offset="6" data-total-post-count="<?php echo $total->found_posts; ?>">Load More Posts</button>


			<?php //get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
