<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<h1 class="search-results-title">Your Results...</h1>

			<div class="three-col-wrap">
				<?php get_template_part('loop3col'); ?>
			</div>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
