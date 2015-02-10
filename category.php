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

			?>
			<?php
				$cat_title = single_cat_title('', false);
				if ( $cat_title !== 'Hotel') {
					echo $cat_title;
				}
			?>

			<script type="text/javascript">
			 		var temp = document.URL.split("/");
					var cat = temp[temp.length-2];
					cat = cat.split("+");
					cat = cat[1];
					console.log(cat);
					if(cat=="maui"){document.write('Maui');}
					else if(cat=="oahu"){document.write('Oahu');}
					else if(cat=="kauai"){document.write('Kauai');}
					else if(cat=="big-island"){document.write('Big Island');}
					else if(cat=="starwood"){document.write('Starwood');}
					else{};
			</script>

			<?php
				if ( $cat_title === 'Hotel') {
					echo $cat_title;
					echo 's';
				}
			?>

			</h1>

			<?php if ( is_category( 'culture' ) || is_category( 'explore' ) || is_category( 'food' ) || is_category('arts') ) : ?>

			<div class="island-filter">
				<h3 class="island-filter-button dropdown">Filter by Island</h3>
				<ul class="island-filter-menu island-filter-list">
					<?php
						$total = new WP_Query(array(
							'post_type' 						 => 'post',
							'post_count' 						 => -1,
							'category_name'					 => strtolower( single_cat_title('', false) ) . "+oahu"
						));
					?>
					<li><a class="jquery-ajax-get-posts jquery-ajax-clear-posts jquery-ajax-update-load-more" data-post-type="post" data-post-count="6" data-post-category="<?php echo "oahu+" . strtolower( single_cat_title('', false) ); ?>" data-post-offset="0" data-total-post-count="<?php echo $total->found_posts; ?>">Oahu</a></li>
					<?php
						$total = new WP_Query(array(
							'post_type' 						 => 'post',
							'post_count' 						 => -1,
							'category_name'					 => strtolower( single_cat_title('', false) ) . "+kauai"
						));
					?>
					<li><a class="jquery-ajax-get-posts jquery-ajax-clear-posts jquery-ajax-update-load-more" data-post-type="post" data-post-count="6" data-post-category="<?php echo "kauai+" . strtolower( single_cat_title('', false) ); ?>" data-post-offset="0" data-total-post-count="<?php echo $total->found_posts; ?>">Kauai</a></li>
					<?php
						$total = new WP_Query(array(
							'post_type' 						 => 'post',
							'post_count' 						 => -1,
							'category_name'					 => strtolower( single_cat_title('', false) ) . "+maui"
						));
					?>
					<li><a class="jquery-ajax-get-posts jquery-ajax-clear-posts jquery-ajax-update-load-more" data-post-type="post" data-post-count="6" data-post-category="<?php echo "maui+" . strtolower( single_cat_title('', false) ); ?>" data-post-offset="0" data-total-post-count="<?php echo $total->found_posts; ?>">Maui</a></li>
					<?php
						$total = new WP_Query(array(
							'post_type' 						 => 'post',
							'post_count' 						 => -1,
							'category_name'					 => strtolower( single_cat_title('', false) ) . "+big-island"
						));
					?>
					<li><a class="jquery-ajax-get-posts jquery-ajax-clear-posts jquery-ajax-update-load-more" data-post-type="post" data-post-count="6" data-post-category="<?php echo "big-island+" . strtolower( single_cat_title('', false) ); ?>" data-post-offset="0" data-total-post-count="<?php echo $total->found_posts; ?>">Big Island</a></li>
				</ul>
			</div>
			<?php endif; ?>

			<!-- slider -->
			<?php

					if ( is_category('culture') || is_category('explore') || is_category('food') || is_category('arts') ) {
						$categories = get_the_category();
						if($categories){
							foreach($categories as $category) {
								if ( $category->name === $cat_title ) {
									$testz = strtolower($category->name);
									$testz = str_replace(' ', '', $testz);
									$testz = "acf_slider_".$testz;
									$whatisthis = get_field($testz , 'option');
								}
							}
						}
					}

					if ( is_category('eat') ) {
						// $categories = get_the_category();
						// if($categories){
						// 	foreach($categories as $category) {
						// 		if ( $category->name !== "Eat" ) {
						// 			$testz = strtolower($category->name);
						// 			$testz = str_replace(' ', '', $testz);
						// 			$testz = "eat_".$testz."_slider";
						// 			$whatisthis = get_field($testz , 'option');
						// 		}
						// 	}
						// }
						$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
						$parsed_url = explode('/category/eat+', parse_url($actual_link, PHP_URL_PATH) );
						$category_query = str_replace('/', '', $parsed_url[1]);
						$testz = "eat_".$category_query."_slider";
						$whatisthis = get_field($testz , 'option');
					}

					if ( is_category('shop') ) {
						// $categories = get_the_category();
						// if($categories){
						// 	foreach($categories as $category) {
						// 		if ( $category->name !== "Shop" ) {
						// 			$testz = strtolower($category->name);
						// 			error_log($testz);
						// 			$testz = str_replace(' ', '', $testz);
						// 			$testz = "shop_".$testz."_slider";
						// 			$whatisthis = get_field($testz , 'option');
						// 		}
						// 	}
						// }
						$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
						$parsed_url = explode('/category/shop+', parse_url($actual_link, PHP_URL_PATH) );
						$category_query = str_replace('/', '', $parsed_url[1]);
						$testz = "shop_".$category_query."_slider";
						$whatisthis = get_field($testz , 'option');
					}

					if ( is_category('play') ) {
						// $categories = get_the_category();
						// if($categories){
						// 	foreach($categories as $category) {
						// 		if ( $category->name !== "Play" ) {
						// 			$testz = strtolower($category->name);
						// 			$testz = str_replace(' ', '', $testz);
						// 			$testz = "play_".$testz."_slider";
						// 			$whatisthis = get_field($testz , 'option');
						// 		}
						// 	}
						// }
						$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
						$parsed_url = explode('/category/play+', parse_url($actual_link, PHP_URL_PATH) );
						$category_query = str_replace('/', '', $parsed_url[1]);
						$testz = "play_".$category_query."_slider";
						$whatisthis = get_field($testz , 'option');
					}

					if ( is_category('hotel') ) {
						// $categories = get_the_category();
						// if($categories){
						// 	foreach($categories as $category) {
						// 		if ( $category->name !== "Hotel" ) {
						// 			$testz = strtolower($category->name);
						// 			$testz = str_replace(' ', '', $testz);
						// 			$testz = "hotel_".$testz."_slider";
						// 			$whatisthis = get_field($testz , 'option');
						// 		}
						// 	}
						// }
						$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
						$parsed_url = explode('/category/hotel+', parse_url($actual_link, PHP_URL_PATH) );
						$category_query = str_replace('/', '', $parsed_url[1]);
						$testz = "hotel_".$category_query."_slider";
						$whatisthis = get_field($testz , 'option');
					}
			?>

			<div class="slider">
			<?php
				if(function_exists('show_flexslider_rotator') && $whatisthis) echo show_flexslider_rotator($whatisthis);
			?>
			</div>
			<!-- end slider -->

			<?php if(is_category( 'culture' ) || is_category( 'explore' ) || is_category( 'food' ) || is_category('arts')) : ?>
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
									<a href="<?php echo get_permalink( $pagepost->ID ); ?>"><?php  echo limit_character_count( apply_filters( 'the_title', $pagepost->post_title ), 21); ?></a>
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
