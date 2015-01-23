<?php get_header(); ?>

	<script src="<?php echo get_bloginfo('template_url'); ?>/js/noframework.waypoints.js"></script>

	<script type="text/javascript">
		jQuery(document).scroll(function() {
			var muchScrollWow = ((jQuery(document).scrollTop() * (jQuery( window ).height()-314))/jQuery( document ).height());
			jQuery('.island-menu-wrap').css("top", muchScrollWow+50);
		});
		jQuery('.island-menu-wrap').css('display','none');

	</script>
	
	<script type="text/javascript">
		function hideHotels(hotel,namez) {
			jQuery('.hide_me_ok').css("display", "none");
			jQuery('.hotel_selector_'+hotel).css("display", "block");
			jQuery('.select_click').css("display", "none");
			jQuery('.island-filter-button').html(namez);
		};
	</script>

	<main role="main">
		<!-- section -->
		<section>

		<?php get_template_part('slider'); ?>

		</section>
		<!-- /section -->

		<section class="featured-articles">
		<?php
			$whatisthis = get_field('acf_hero_articles', 'option');
			foreach ($whatisthis as $pagepost){
		?>

		<div class="featured-articles-article">
			<a href="<?php echo get_permalink( $pagepost->ID ); ?>">
				<?php  if( has_post_thumbnail( $pagepost->ID) )  echo(get_the_post_thumbnail( $pagepost->ID, 'featured-thumb' ) ) ; ?>
			</a>
			<p class="featured-articles-cat">
				<?php
					$catz = get_the_category( $pagepost->ID );
					foreach ($catz as $post_cat){
						echo($post_cat->name);
						break;
					};
				?>
			</p>
			<a href="<?php echo get_permalink( $pagepost->ID ); ?>">
				<h2 class="featured-articles-title">
					<?php
						$title = apply_filters( 'the_title', $pagepost->post_title );
						echo limit_character_count( $title, 26 );
					?>
				</h2>
			</a>
			<p class="featured-articles-excerpt">
				<?php
					$excerpt = apply_filters( 'the_excerpt', $pagepost->post_excerpt );
					echo limit_character_count( $excerpt, 170 );
				?>
			</p>
			<a href="<?php echo get_permalink( $pagepost->ID ); ?>" class="featured-articles-more">+ Read More...</a>
		</div>

		<?php }; ?>
		</section>
		<aside class="hotel-filter">
			<div class="hotel_selector  island-filter">
				<h3 class="hotel_selector_title">Where To Stay</h3>
				<h3 class="island-filter-button dropdown" val="oahu">Oahu Hotels</h3>
				<ul class="select_click island-filter-menu close">
					<li val="oahu">OAHU HOTELS</li>
					<li val="maui">MAUI HOTELS</li>
					<li val="kauai">KAUAI HOTELS</li>
					<li val="big_island">BIG ISLAND HOTELS</li>
				</ul>			
				<div class="hotel_selector_oahu hide_me_ok">
					<ul class="hotel-filter-list">
					<?php 	
					if(get_field('acf_oahu_hotels', 'option')){
						$whatisthis = get_field('acf_oahu_hotels', 'option');
						foreach ($whatisthis as $pagepost){
					?>
					<li>
					    <a href="<?php echo get_permalink( $pagepost->ID ); ?>" class="hotel-img-link">
						<?php  if( has_post_thumbnail( $pagepost->ID) )  echo(get_the_post_thumbnail( $pagepost->ID, 'small-hotel-thumb' ) ) ; ?></a>
                        <a href="<?php echo get_permalink( $pagepost->ID ); ?>" class="hotel-img-link-title"><span><?php  echo apply_filters( 'the_title', $pagepost->post_title ); ?>	</span></a>
					</li>
				<?php 
					}}; 
					?>
					</ul>
					<a href="<?php echo get_bloginfo('url'); ?>/category/hotel+oahu/" class="hotel-filter-all" class="hotel-filter-all">VIEW ALL</a>
				</div>
						
				<div class="hotel_selector_maui hide_me_ok">
                <ul class="hotel-filter-list">
				<?php 
				if(get_field('acf_maui_hotels', 'option')){	
					$whatisthis = get_field('acf_maui_hotels', 'option');
					foreach ($whatisthis as $pagepost){
				?>
				<li>
				    <a href="<?php echo get_permalink( $pagepost->ID ); ?>" class="hotel-img-link">
						<?php  if( has_post_thumbnail( $pagepost->ID) )  echo(get_the_post_thumbnail( $pagepost->ID, 'small-hotel-thumb' ) ) ; ?>
				    </a>							<a href="<?php echo get_permalink( $pagepost->ID ); ?>" class="hotel-img-link-title"><span><?php  echo apply_filters( 'the_title', $pagepost->post_title ); ?>	</span></a>
				</li>
				<?php 
					}}; 
				?>
				</ul>
				<a href="<?php echo get_bloginfo('url'); ?>/category/hotel+maui/" class="hotel-filter-all">VIEW ALL</a>
				</div>
						
				<div class="hotel_selector_kauai hide_me_ok">
                <ul class="hotel-filter-list">
				<?php 	
				if(get_field('acf_kauai_hotels', 'option')){
					$whatisthis = get_field('acf_kauai_hotels', 'option');
					foreach ($whatisthis as $pagepost){
				?>
				<li>
				    <a href="<?php echo get_permalink( $pagepost->ID ); ?>" class="hotel-img-link">
						<?php  if( has_post_thumbnail( $pagepost->ID) )  echo(get_the_post_thumbnail( $pagepost->ID, 'small-hotel-thumb' ) ) ; ?></a>
                    <a href="<?php echo get_permalink( $pagepost->ID ); ?>" class="hotel-img-link-title"><span><?php  echo apply_filters( 'the_title', $pagepost->post_title ); ?>	</span></a>
                </li>
				<?php 
					}}; 
				?>
				</ul>
				<a href="<?php echo get_bloginfo('url'); ?>/category/hotel+kauai/" class="hotel-filter-all">VIEW ALL</a>
				</div>
						
				<div class="hotel_selector_big_island hide_me_ok">
                <ul class="hotel-filter-list">
				<?php 	
				if(get_field('acf_big_island_hotels', 'option')){
					$whatisthis = get_field('acf_big_island_hotels', 'option');
					foreach ($whatisthis as $pagepost){
				?>
				<li>
				    <a href="<?php echo get_permalink( $pagepost->ID ); ?>" class="hotel-img-link">
                    <?php  if( has_post_thumbnail( $pagepost->ID) )  echo(get_the_post_thumbnail( $pagepost->ID, 'small-hotel-thumb' ) ) ; ?></a>
                    <a href="<?php echo get_permalink( $pagepost->ID ); ?>" class="hotel-img-link-title"><span><?php  echo apply_filters( 'the_title', $pagepost->post_title ); ?>	</span></a>
				</li>
				<?php 
					}}; 
				?>
				</ul>
				<a href="<?php echo get_bloginfo('url'); ?>/category/hotel+big-island/" class="hotel-filter-all">VIEW ALL</a>
				</div>
				
			</div>
			<script type="text/javascript">
			jQuery(".select_click li").click(function() {
				var value = jQuery(this).attr("val");
				var namez = jQuery(this).html();
				hideHotels(value,namez);
			});
			</script>		
		</aside>

		<section class="editorial clear">
			<?php 
				$whatisthis = get_field('acf_editorials', 'option');
				foreach ($whatisthis as $pagepost){
			?>
			<div class="editorial-article">			
				<p class="editorial-cat"> 			
					<?php 
						$catz = get_the_category( $pagepost->ID ); 
						foreach ($catz as $post_cat){ 
							echo($post_cat->name);
							break;
						};
					?>
				</p>

				<h2 class="editorial-title"><?php  echo apply_filters( 'the_title', $pagepost->post_title ); ?></h2>
				<a href="<?php echo get_permalink( $pagepost->ID ); ?>"><?php  if( has_post_thumbnail( $pagepost->ID) )  echo(get_the_post_thumbnail( $pagepost->ID, 'grid-thumb' ) ) ; ?></a>
				<p class="editorial-excerpt"><?php  echo apply_filters( 'the_excerpt', $pagepost->post_excerpt ); ?></p>
				<a href="<?php echo get_permalink( $pagepost->ID ); ?>" class="editorial-more">Read More...</a>
			</div>
		<?php }; ?>
		</section>


		<?php 	$whatisthis = get_field('acf_oahu', 'option');?>
		<div class="waypoint oahu-border" id="oahu">
			<h3>OAHU GUIDE</h3>
			<div class="three-col-wrap">
			<?php while(has_sub_field('acf_oahu', 'option')): ?>
				<div class="eat three-col">
    				<a href="<?php echo get_permalink( $whatisthis[0]["eat"][0]->ID ); ?>" >
    				    <h2 class="post-title-grid"><?php  echo apply_filters( 'the_title', $whatisthis[0]["eat"][0]->post_title ); ?></h2>
    				</a>
    				<p class="hovering-cat">Eat</p>
    				<a href="<?php echo get_permalink( $whatisthis[0]["eat"][0]->ID ); ?>" >
    				    <?php  if( has_post_thumbnail( $whatisthis[0]["eat"][0]->ID) )  echo(get_the_post_thumbnail( $whatisthis[0]["eat"][0]->ID, 'grid-thumb' ) ) ; ?>
    				</a>
    				<p class=""><?php  echo apply_filters( 'the_excerpt', $whatisthis[0]["eat"][0]->post_excerpt ); ?></p>
				</div>
				<div class="shop three-col">
    				<a href="<?php echo get_permalink( $whatisthis[0]["shop"][0]->ID ); ?>" >
    				    <h2 class="post-title-grid"><?php  echo apply_filters( 'the_title', $whatisthis[0]["shop"][0]->post_title ); ?></h2>
    				</a>
    				<p class="hovering-cat">Shop</p>
    				<a href="<?php echo get_permalink( $whatisthis[0]["shop"][0]->ID ); ?>" >
    				    <?php  if( has_post_thumbnail( $whatisthis[0]["shop"][0]->ID) )  echo(get_the_post_thumbnail( $whatisthis[0]["shop"][0]->ID, 'grid-thumb' ) ) ; ?>
    				</a>
    				<p> <?php  echo apply_filters( 'the_excerpt', $whatisthis[0]["shop"][0]->post_excerpt ); ?></p>
				</div>
				<div class="play three-col">
    				<a href="<?php echo get_permalink( $whatisthis[0]["play"][0]->ID ); ?>" >
    				    <h2 class="post-title-grid"><?php  echo apply_filters( 'the_title', $whatisthis[0]["play"][0]->post_title ); ?></h2>
    				</a>
    				<p class="hovering-cat">Play</p>
    				<a href="<?php echo get_permalink( $whatisthis[0]["play"][0]->ID ); ?>" >
    				<?php  if( has_post_thumbnail( $whatisthis[0]["play"][0]->ID) )  echo(get_the_post_thumbnail( $whatisthis[0]["play"][0]->ID, 'grid-thumb' ) ) ; ?>
    				</a>
    				<p> <?php  echo apply_filters( 'the_excerpt', $whatisthis[0]["play"][0]->post_excerpt ); ?></p>
				</div>
			<?php endwhile; ?>
			</div>
		</div>
		
		<?php 	$whatisthis = get_field('acf_maui', 'option');?>
		<div class="waypoint" id="maui">
			<h3>MAUI GUIDE</h3>			
			<div class="three-col-wrap">
			<?php while(has_sub_field('acf_maui', 'option')): ?>
				<div class="eat three-col">
    				<a href="<?php echo get_permalink( $whatisthis[0]["eat"][0]->ID ); ?>" >
    				    <h2 class="post-title-grid"><?php  echo apply_filters( 'the_title', $whatisthis[0]["eat"][0]->post_title ); ?></h2></a>
    				<p class="hovering-cat">Eat</p>
    				<a href="<?php echo get_permalink( $whatisthis[0]["eat"][0]->ID ); ?>" >
    				<?php  if( has_post_thumbnail( $whatisthis[0]["eat"][0]->ID) )  echo(get_the_post_thumbnail( $whatisthis[0]["eat"][0]->ID, 'grid-thumb' ) ) ; ?>
    				</a>
    				<p> <?php  echo apply_filters( 'the_excerpt', $whatisthis[0]["eat"][0]->post_excerpt ); ?></p>
				</div>
				<div class="shop three-col">
    				<a href="<?php echo get_permalink( $whatisthis[0]["shop"][0]->ID ); ?>" >
    				    <h2 class="post-title-grid"><?php  echo apply_filters( 'the_title', $whatisthis[0]["shop"][0]->post_title ); ?></h2>
    				</a>
    				<p class="hovering-cat">Shop</p>
    				<a href="<?php echo get_permalink( $whatisthis[0]["shop"][0]->ID ); ?>" >
    				    <?php  if( has_post_thumbnail( $whatisthis[0]["shop"][0]->ID) )  echo(get_the_post_thumbnail( $whatisthis[0]["shop"][0]->ID, 'grid-thumb' ) ) ; ?>
    				</a>
    				<p> <?php  echo apply_filters( 'the_excerpt', $whatisthis[0]["shop"][0]->post_excerpt ); ?></p>
				</div>
				<div class="play three-col">
    				<a href="<?php echo get_permalink( $whatisthis[0]["play"][0]->ID ); ?>" >
    				    <h2 class="post-title-grid"><?php  echo apply_filters( 'the_title', $whatisthis[0]["play"][0]->post_title ); ?></h2>
    				</a>
    				<p class="hovering-cat">Play</p>
    				<a href="<?php echo get_permalink( $whatisthis[0]["play"][0]->ID ); ?>" >
    				    <?php  if( has_post_thumbnail( $whatisthis[0]["play"][0]->ID) )  echo(get_the_post_thumbnail( $whatisthis[0]["play"][0]->ID, 'grid-thumb' ) ) ; ?>
    				</a>
    				<p> <?php  echo apply_filters( 'the_excerpt', $whatisthis[0]["play"][0]->post_excerpt ); ?></p>
				</div>
			<?php endwhile; ?>
			</div>
		</div>
			
		<?php 	$whatisthis = get_field('acf_kauai', 'option');?>
		<div class="waypoint" id="kauai">
			<h3>KAUAI GUIDE</h3>
			<div class="three-col-wrap">
			<?php while(has_sub_field('acf_kauai', 'option')): ?>
				<div class="eat three-col">
    				<a href="<?php echo get_permalink( $whatisthis[0]["eat"][0]->ID ); ?>" >
    				    <h2 class="post-title-grid"><?php  echo apply_filters( 'the_title', $whatisthis[0]["eat"][0]->post_title ); ?></h2>
    				</a>
    				<p class="hovering-cat">Eat</p>
    				<a href="<?php echo get_permalink( $whatisthis[0]["eat"][0]->ID ); ?>" >
    				    <?php  if( has_post_thumbnail( $whatisthis[0]["eat"][0]->ID) )  echo(get_the_post_thumbnail( $whatisthis[0]["eat"][0]->ID, 'grid-thumb' ) ) ; ?>
    				</a>
    				<p> <?php  echo apply_filters( 'the_excerpt', $whatisthis[0]["eat"][0]->post_excerpt ); ?></p>
				</div>
				<div class="shop three-col">
    				<a href="<?php echo get_permalink( $whatisthis[0]["shop"][0]->ID ); ?>" >
    				    <h2 class="post-title-grid"><?php  echo apply_filters( 'the_title', $whatisthis[0]["shop"][0]->post_title ); ?></h2>
    				</a>
    				<p class="hovering-cat">Shop</p>
    				<a href="<?php echo get_permalink( $whatisthis[0]["shop"][0]->ID ); ?>" >
    				    <?php  if( has_post_thumbnail( $whatisthis[0]["shop"][0]->ID) )  echo(get_the_post_thumbnail( $whatisthis[0]["shop"][0]->ID, 'grid-thumb' ) ) ; ?>
    				</a>
    				<p> <?php  echo apply_filters( 'the_excerpt', $whatisthis[0]["shop"][0]->post_excerpt ); ?></p>
				</div>
				<div class="play three-col">
    				<a href="<?php echo get_permalink( $whatisthis[0]["play"][0]->ID ); ?>" >
    				    <h2 class="post-title-grid"><?php  echo apply_filters( 'the_title', $whatisthis[0]["play"][0]->post_title ); ?></h2>
    				</a>
    				<p class="hovering-cat">Play</p>
    				<a href="<?php echo get_permalink( $whatisthis[0]["play"][0]->ID ); ?>" >
    				    <?php  if( has_post_thumbnail( $whatisthis[0]["play"][0]->ID) )  echo(get_the_post_thumbnail( $whatisthis[0]["play"][0]->ID, 'grid-thumb' ) ) ; ?>
    				</a>
    				<p> <?php  echo apply_filters( 'the_excerpt', $whatisthis[0]["play"][0]->post_excerpt ); ?></p>
				</div>
			<?php endwhile; ?>
			</div>		
		</div>
				
		<?php 	$whatisthis = get_field('acf_big_island', 'option');?>
		<div class="waypoint" id="big-island">
			<h3>BIG ISLAND GUIDE</h3>
			<div class="three-col-wrap">
			<?php while(has_sub_field('acf_big_island', 'option')): ?>
				<div class="eat three-col">
    				<a href="<?php echo get_permalink( $whatisthis[0]["eat"][0]->ID ); ?>" >
    				    <h2 class="post-title-grid"> <?php  echo apply_filters( 'the_title', $whatisthis[0]["eat"][0]->post_title ); ?></h2>
    				</a>
    				<p class="hovering-cat">Eat</p>
    				<a href="<?php echo get_permalink( $whatisthis[0]["eat"][0]->ID ); ?>" >
    				    <?php  if( has_post_thumbnail( $whatisthis[0]["eat"][0]->ID) )  echo(get_the_post_thumbnail( $whatisthis[0]["eat"][0]->ID, 'grid-thumb' ) ) ; ?>
    				</a>
    				<p><?php  echo apply_filters( 'the_excerpt', $whatisthis[0]["eat"][0]->post_excerpt ); ?></p>
				</div>
				<div class="shop three-col">
    				<a href="<?php echo get_permalink( $whatisthis[0]["shop"][0]->ID ); ?>" >
    				    <h2 class="post-title-grid"><?php  echo apply_filters( 'the_title', $whatisthis[0]["shop"][0]->post_title ); ?></h2>
    				</a>
    				<p class="hovering-cat">Shop</p>
    				<a href="<?php echo get_permalink( $whatisthis[0]["shop"][0]->ID ); ?>" >
    				<?php  if( has_post_thumbnail( $whatisthis[0]["shop"][0]->ID) )  echo(get_the_post_thumbnail( $whatisthis[0]["shop"][0]->ID, 'grid-thumb' ) ) ; ?>
    				</a>
    				<p><?php  echo apply_filters( 'the_excerpt', $whatisthis[0]["shop"][0]->post_excerpt ); ?></p>
				</div>
				<div class="play three-col">
    				<a href="<?php echo get_permalink( $whatisthis[0]["play"][0]->ID ); ?>" >
    				    <h2 class="post-title-grid"><?php  echo apply_filters( 'the_title', $whatisthis[0]["play"][0]->post_title ); ?></h2>
    				</a>
    				<p class="hovering-cat">Play</p>
    				<a href="<?php echo get_permalink( $whatisthis[0]["play"][0]->ID ); ?>" >
    				    <?php  if( has_post_thumbnail( $whatisthis[0]["play"][0]->ID) )  echo(get_the_post_thumbnail( $whatisthis[0]["play"][0]->ID, 'grid-thumb' ) ) ; ?>
    				</a>
    				<p><?php  echo apply_filters( 'the_excerpt', $whatisthis[0]["play"][0]->post_excerpt ); ?></p>
				</div>
			<?php endwhile; ?>
			</div>
		</div>
		
		
	</main>


	
	<script type="text/javascript">
		var canIclick = false;
		/*                 *
		 *  WAYPOINT INIT  *
		 *                 */

		var offsetz = 200;
		//script for intercepting the anchors and changing the menu accordingly
		var waypoint = new Waypoint({
  			element: document.getElementById('oahu'),
  			handler: function(direction) {
  				if(direction == 'down'){
  					jQuery('.island-menu-wrap').css('display','block');
  				if(!isOpen){
  					jQuery('.island-menu-title').html("OAHU");
				}}
 			},
 			offset: '50%'
		});
		
		var waypoint = new Waypoint({
  			element: document.getElementById('oahu'),
  			handler: function(direction) {
  				if(direction == 'up'){
  					jQuery('.island-menu-wrap').css('display','none');
				}
 			},
 			offset: '80%'
		});

		var waypoint = new Waypoint({
  			element: document.getElementById('maui'),
  			handler: function(direction) {
  			if(direction == 'down'){
  			if(!isOpen){
    			jQuery('.island-menu-title').html("MAUI")
 			}}},		
 			offset: '50%'
		});
		
		var waypoint = new Waypoint({
  			element: document.getElementById('maui'),
  			handler: function(direction) {
  			if(direction == 'up'){
  			if(!isOpen){
    			jQuery('.island-menu-title').html("OAHU")
 			}}},		
 			offset: '80%'
		});

		var waypoint = new Waypoint({
  			element: document.getElementById('kauai'),
  			handler: function(direction) {
  			if(direction == 'down'){
  			if(!isOpen){
    			jQuery('.island-menu-title').html("KAUAI")
 			}}},
 			offset: '50%'
		});
		
		
		var waypoint = new Waypoint({
  			element: document.getElementById('kauai'),
  			handler: function(direction) {
  			if(direction == 'up'){
  			if(!isOpen){
    			jQuery('.island-menu-title').html("MAUI")
 			}}},
 			offset: '80%'
		});

		var waypoint = new Waypoint({
  			element: document.getElementById('big-island'),
  			handler: function(direction) {
  			if(direction == 'down'){
  			if(!isOpen){
    			jQuery('.island-menu-title').html("BIG ISLAND")
 			}}},
 			offset: '50%'
		});
		
		var waypoint = new Waypoint({
  			element: document.getElementById('big-island'),
  			handler: function(direction) {
  			if(direction == 'up'){
  			if(!isOpen){
    			jQuery('.island-menu-title').html("KAUAI")
 			}}},
 			offset: '80%'
		});

		/*                 *
		 *       END       *
		 *  WAYPOINT INIT  *
		 *                 */

	</script>

<?php get_footer(); ?>
