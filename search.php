<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<?php if ( have_posts() ) : ?>
			<h1 class="search-results-title">Your Results...</h1>
			<?php else : ?>
			<h2 class="no-results-message"><?php _e( "Sorry, we couldn't find what you were looking for. Are any of these post related to your search? ....", 'html5blank' ); ?></h2>
			<?php endif; ?>

			<div class="three-col-wrap">
				<?php get_template_part('loop3col'); ?>
			</div>

			<?php if ( have_posts() ) : ?>
				<button class="jquery-ajax-get-posts" data-post-type="post" data-post-count="6" data-post-category="<?php echo strtolower( single_cat_title('', false) ) ?>" data-post-offset="6">Load More Posts</button>
			<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
