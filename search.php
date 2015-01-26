<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<?php if ( !empty($q['s']) ) : ?>
			<h1 class="search-results-title">Your Results...</h1>
			<?php elseif ( isset($_GET['s']) ) : ?>
			<h2 class="no-results-message"><?php _e( "Sorry, we couldn't find what you were looking for. Are any of these post related to your search? ....", 'html5blank' ); ?></h2>
			<?php endif; ?>

			<div class="three-col-wrap">
				<?php get_template_part('loop3col'); ?>
			</div>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
