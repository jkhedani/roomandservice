<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	<section>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<section class="hotel-header">
				<!-- post title -->
				<h1 class="hotel-name post-title">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</h1>

				<div id="hotel-info" class="hotel-info">
					<span id="info-url" class="hotel-info-website">
						<a href="<?php echo get_post_meta($post->ID, "_url", true); ?>"><?php echo get_post_meta($post->ID, "_url", true); ?></a>
					</span>
					<span id="info-phone" class="hotel-info-phone">
						<?php echo get_post_meta($post->ID, "_phone", true); ?>
					</span>
				</div>
				<!-- /post title -->

				<!-- slider -->
				<div class="slider clear">
					<?php if(function_exists('show_flexslider_rotator') && get_field('acf_hotel_slider_single')) echo show_flexslider_rotator(get_field('acf_hotel_slider_single'));?>
				</div>
				<?php //the_content(); // Dynamic Content ?>

				<!-- /slider -->

			</section>

			<section class="hotel-content">
				<?php //the_content(); // Dynamic Content ?>

				<div id="hotel-tabs" class="hotel-tabs">
					<h2 id="tab-about"class="tab active-tab" data-tab="tab-1">ABOUT</h2>
					<h2 id="tab-why" class="tab"  data-tab="tab-2">WHY WE LOVE THIS PLACE</h2>
					<h2 id="tab-amenities" class="tab" data-tab="tab-3">AMENITIES</h2>
				</div>

				<div id="tab-1" class="tab-content active-tab-content">
						<?php echo wpautop(get_post_meta($post->ID, "_about", true)); ?>
						<?php
                		$categories = get_the_category();
                		if($categories[0]->name == "Hotel"){
                		?>
                			<a href="http://www.roomandservice.com/category/hotel+<?php echo($categories[1]->slug); ?>/" class="return-hotel"> View <?php echo($categories[1]->name); ?> Hotels</a>	
                		<?php
                		}else{
                		?>
                			<a href="http://www.roomandservice.com/category/hotel+<?php echo($categories[0]->slug); ?>/" class="return-hotel"> View <?php echo($categories[0]->name); ?> Hotels</a>			
                		<?php
                		}
                		?>
				</div>
				<div id="tab-2" class="tab-content">
					<?php echo wpautop(get_post_meta($post->ID, "_why", true)); ?>
				</div>
				<div id="tab-3" class="tab-content">
					<?php echo wpautop(get_post_meta($post->ID, "_amenities", true)); ?>
				</div>

			<?php //edit_post_link(); // Always handy to have Edit Post Links available ?>
			</section>
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

	</section>

	<?php get_template_part('share');?>

	<!-- /section -->
	</main>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
