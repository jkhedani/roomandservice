<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<h1 class="page-cat-title">
			<?php
						function curPageURL() {
							$pageURL = 'http';
 							if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 								$pageURL .= "://";
 							if ($_SERVER["SERVER_PORT"] != "80") {
  								$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 							} else {
  								$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 							}
 							return $pageURL;
						}

					single_cat_title();
			?>
			<script type="text/javascript">
			 		var temp = document.URL.split("/");
					var cat = temp[temp.length-2];
					cat = cat.split("+");
					cat = cat[1];
					if(cat=="maui"){document.write('+ Maui');}
					else if(cat=="oahu"){document.write('+ Oahu');}
					else if(cat=="kauai"){document.write('+ Kauai');}
					else if(cat=="big-island"){document.write('+ Big Island');}
					else{};
			</script>

			</h1>

			<style>
				.pagination{ display: none;}
			</style>

			<?php if ( is_category( 'culture' ) || is_category( 'style' ) || is_category( 'food' ) || is_category('arts') ) : ?>
			<div class="island-filter">
				<h3 class="island-filter-button dropdown">Filter by Island</h3>
				<ul class="island-filter-menu island-filter-list">
					<li><a href="" onclick="filterIsland('kauai')">Kauai</a></li>
					<li><a href="" onclick="filterIsland('maui')">Maui</a></li>
					<li><a href="" onclick="filterIsland('oahu')">Oahu</a></li>
					<li><a href="" onclick="filterIsland('big-island')">Big Island</a></li>
				</ul>
			</div>
			<?php endif; ?>

			<!-- slider -->
			<?php
					if ( ! is_category('hotel') ) {
						$testz = single_cat_title("", false);
						$testz = strtolower($testz);
						$onthis = $testz;
						$testz = "acf_slider_".$testz;
						$whatisthis = get_field($testz , 'option');
					}

					if ( is_category('hotel') ) {
						$categories = get_the_category();
						if($categories){
							foreach($categories as $category) {
								if ( $category->name !== "Hotel" ) {
									$testz = strtolower($category->name);
									$testz = str_replace(' ', '', $testz);
									$testz = "hotel_".$testz."_slider";
									$whatisthis = get_field($testz , 'option');
								}
							}
						}
					}
			?>

			<div class="slider">
			<?php
				if(function_exists('show_flexslider_rotator') && $whatisthis) echo show_flexslider_rotator($whatisthis);
			?>
			</div>
			<!-- end slider -->

			<?php if(is_category( 'culture' ) || is_category( 'style' ) || is_category( 'food' ) || is_category('arts')) : ?>
				<section class="featured-articles">

					<?php

						if(get_field('acf_'.$onthis.'_cat_featured', 'option')){
						$whatisthis = get_field('acf_'.$onthis.'_cat_featured', 'option');
						foreach ($whatisthis as $pagepost){
					?>
						<div class="featured-articles-article">
								<h2 class="featured-articles-title"><a href="<?php echo get_permalink( $pagepost->ID ); ?>"><?php  echo apply_filters( 'the_title', $pagepost->post_title ); ?></a></h2>
								<a href="<?php echo get_permalink( $pagepost->ID ); ?>"><?php  if( has_post_thumbnail( $pagepost->ID) )  echo(get_the_post_thumbnail( $pagepost->ID, 'featured-thumb' ) ) ; ?></a>
								<p class="featured-articles-excerpt"><?php  echo apply_filters( 'the_excerpt', $pagepost->post_excerpt ); ?></p>
								<a href="<?php echo get_permalink( $pagepost->ID ); ?>" class="featured-articles-more">Read More...</a>
							</div>
					<?php }}; ?>

				</section>
			<?php endif; ?>

				<div id="content" class="clear">

					<?php $shown = false; if ( $shown ) : ?>
					<?php if(get_field('acf_'.$onthis.'_sponsor', 'option')){ ?>

						<?php
							$whatisthis = get_field('acf_'.$onthis.'_sponsor', 'option');
							foreach ($whatisthis as $pagepost){
						?>
								<h2 class="post-title-grid">
									<a href="<?php echo get_permalink( $pagepost->ID ); ?>"><?php  echo limit_character_count( apply_filters( 'the_title', $pagepost->post_title ), 23); ?></a>
								</h2>
								<a href="<?php echo get_permalink( $pagepost->ID ); ?>">
								    <?php  if( has_post_thumbnail( $pagepost->ID) )  echo(get_the_post_thumbnail( $pagepost->ID, 'grid-thumb' ) ) ; ?>
								</a>
								<p class="excerpt"><?php  echo apply_filters( 'the_excerpt', $pagepost->post_excerpt ); ?></p>
								<a class="editorial-more" href="<?php echo get_the_permalink(); ?>">+ Read More</a>
						<?php }?>

						<?php } ?>
					<?php endif; ?>

				<?php get_template_part('loop'); ?>

			</div>

			<?php get_template_part('pagination'); ?>

		</section>

				<!-- /section -->
	</main>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
