<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta name="viewport" content="width=device-width">
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' : '; } ?><?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
    <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
    <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">
			<!-- header -->

			<header class="header clear translate-down" role="banner">
					<div class="header-wrap">
					<!-- logo -->
					<div class="logo">
						<a href="<?php echo home_url(); ?>">
							<!-- svg available do later -->
							<img src="<?php echo get_template_directory_uri(); ?>/img/rm-logo.png" alt="Room and Service Logo" class="logo-img">
						</a>
					</div>
					<!-- /logo -->

					<!-- search form -->
					<?php get_template_part('searchform'); ?>

					<!-- nav -->
					<nav class="nav" role="navigation">
						<?php html5blank_nav(); ?>
					</nav>
					<!-- /nav -->
				</div>
			</header>

		<?php wp_nav_menu( array( 'theme_location' => 'sidebar-menu') ); ?>
		<script type="text/javascript">
		var canIclick = false;
		var isOpen = false;
		var activeChild = 0;

		jQuery('#menu-sidebar-scrolling-menu').wrap('<div class="island-menu-wrap"></div>');
		jQuery('#menu-sidebar-scrolling-menu .menu-item-has-children').wrap('<div class="child-island-menu-wrap"></div>');
		jQuery('#menu-sidebar-scrolling-menu .sub-menu').wrap('<div class="sub-island-menu-wrap"></div>');
		jQuery('.island-menu-wrap').prepend('<div class="island-menu-title">Island Guide +</div>');
		jQuery(".child-island-menu-wrap:first-child").addClass("open-list");
		jQuery('.child-island-menu-wrap .sub-island-menu-wrap').css("display", "none");
		jQuery('.child-island-menu-wrap.open-list .sub-island-menu-wrap').css("display", "block");


		/*jQuery('#menu-sidebar-scrolling-menu li a').click(function( event ){
			if(!canIclick){
				event.preventDefault();
				menu-item-has-children
			}
		});*/

		jQuery(".island-menu-title").click(function() {
			if(!isOpen){
				jQuery('body').find('.island-menu-wrap').addClass('expanded');
				//jQuery('#menu-sidebar-scrolling-menu li').css("display", "block");
				isOpen = true;
				jQuery('.island-menu-title').html("Island Guide +");
			}else{
				jQuery('body').find('.island-menu-wrap').removeClass('expanded');
				//jQuery('#menu-sidebar-scrolling-menu li').css("display", "none");
				isOpen = false;
			}
		});


		jQuery(".child-island-menu-wrap").click(function() {
			jQuery(".child-island-menu-wrap").removeClass("open-list");
			jQuery(this).addClass("open-list");
			jQuery('.child-island-menu-wrap .sub-island-menu-wrap').css("display", "none");
			jQuery('.child-island-menu-wrap.open-list .sub-island-menu-wrap').css("display", "block");
			//jQuery('.island-menu-title').html(jQuery(this).find('li>a').html());
		});

		</script>


			<!-- /header -->
