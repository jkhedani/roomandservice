<?php
	$cat = get_query_var( 'cats' );
	if ( $cat === 'starwood' ) :
		get_template_part('archive-starwood');
 	else : ?>
	<?php get_header(); ?>

		<main role="main">
			<!-- section -->
			<section>
	        <?php
				if ( is_post_type_archive() ) {
					?>
					<h1 class="archive-name all-hotels page-cat-title"><?php
						if ( $cat ) {
								echo ucfirst($cat);
						} else {
							echo 'All';
					} ?> <?php post_type_archive_title(); ?></h1>
					<?php
				} else {
					?>
					<h1 class="archive-name page-cat-title"><?php _e( 'Archives', 'html5blank' ); ?></h1>
					<?php } ?>


				<div class="island-filter">
					<h3 class="island-filter-button dropdown">Filter by Island</h3>
					<ul class="island-filter-menu island-filter-list">
						<?php
							$total = new WP_Query(array(
								'post_type' 						 => 'hotel',
								'post_count' 						 => -1,
								'category_name'					 => "oahu"
							));
						?>
						<li><a class="jquery-ajax-get-posts jquery-ajax-clear-posts jquery-ajax-update-load-more" data-post-type="hotel" data-post-count="6" data-post-category="oahu" data-post-offset="0" data-total-post-count="<?php echo $total->found_posts; ?>">Oahu</a></li>
						<?php
							$total = new WP_Query(array(
								'post_type' 						 => 'hotel',
								'post_count' 						 => -1,
								'category_name'					 => strtolower( single_cat_title('', false) ) . "+kauai"
							));
						?>
						<li><a class="jquery-ajax-get-posts jquery-ajax-clear-posts jquery-ajax-update-load-more" data-post-type="hotel" data-post-count="6" data-post-category="kauai" data-post-offset="0" data-total-post-count="<?php echo $total->found_posts; ?>">Kauai</a></li>
						<?php
							$total = new WP_Query(array(
								'post_type' 						 => 'hotel',
								'post_count' 						 => -1,
								'category_name'					 => strtolower( single_cat_title('', false) ) . "+maui"
							));
						?>
						<li><a class="jquery-ajax-get-posts jquery-ajax-clear-posts jquery-ajax-update-load-more" data-post-type="hotel" data-post-count="6" data-post-category="maui" data-post-offset="0" data-total-post-count="<?php echo $total->found_posts; ?>">Maui</a></li>
						<?php
							$total = new WP_Query(array(
								'post_type' 						 => 'post',
								'post_count' 						 => -1,
								'category_name'					 => strtolower( single_cat_title('', false) ) . "+big-island"
							));
						?>
						<li><a class="jquery-ajax-get-posts jquery-ajax-clear-posts jquery-ajax-update-load-more" data-post-type="hotel" data-post-count="6" data-post-category="big-island" data-post-offset="0" data-total-post-count="<?php echo $total->found_posts; ?>">Big Island</a></li>
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
					<?php get_template_part('loop3col'); ?>
				</div>

				<?php
					// Total Post Count
					$total = new WP_Query(array(
						'post_type' 						 => 'hotel',
						'post_count' 						 => -1
					));
				?>
				<button class="jquery-ajax-get-posts jquery-ajax-get-posts-button" data-post-type="hotel" data-post-count="6" data-post-category="" data-post-offset="6" data-total-post-count="<?php echo $total->found_posts; ?>">Load More Posts</button>


				<?php //get_template_part('pagination'); ?>

			</section>
			<!-- /section -->
		</main>

	<?php //get_sidebar(); ?>

	<?php get_footer(); ?>
<?php endif; ?>
