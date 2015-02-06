<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<!-- article -->
			<article id="post-404">


			<script type="text/javascript">
				//3 second redirect
				// setTimeout(function () {
   		// 			window.location.href='<?php echo get_site_url(); ?>';
   		// 		},3000);
   			</script>

				<h1><?php _e( '404 Page Not Found', 'html5blank' ); ?></h1>

				<h2>Don't worry, we'll redirect you in a couple seconds. Sit tight!</h2>

			</article>
			<!-- /article -->

		</section>
		<!-- /section -->
	</main>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
