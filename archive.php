<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>
        <?php
			if ( is_post_type_archive() ) {
				?>
				<h1 class="archive-name all-hotels page-cat-title">All <?php post_type_archive_title(); ?></h1>
				<?php
			} else {
				?>
				<h1 class="archive-name page-cat-title"><?php _e( 'Archives', 'html5blank' ); ?></h1>
				<?php } ?>

		
			<style>
				.pagination{ display: none;}
			</style>
			
			<div class="island-filter">
				<h3 class="island-filter-button dropdown">Filter Hotels by Island</h3>
				<ul class="island-filter-menu island-filter-list close">
					<li><a href="" val="kauai">Kauai</a></li>
					<li><a href="" val="maui">Maui</a></li>
					<li><a href="" val="oahu">Oahu</a></li>
					<li><a href="" val="big-island">Big Island</a></li>
				</ul>
			</div>
			<script type="text/javascript">
 					var temp = document.URL.split("/");
					var cat = temp[temp.length-2];
					cat = cat.split("+");
					cat = cat[0];
					jQuery(".island-filter ul a").each(function() {
						jQuery(this).attr('href', "<?php echo get_site_url(); ?>/category/"  + cat + "+" + jQuery(this).attr('val') + "/" );					
					});
					
			</script>
            
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
			
			<div id="content" class="clear three-col-wrap">
				<?php get_template_part('loop3col'); ?>
			</div>
			
			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
