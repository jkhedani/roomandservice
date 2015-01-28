(function( root, $, undefined ) {
	"use strict";

	$(function () {
		// DOM ready, take it away
		$('.tab').on('click', function() {
			var activeTab;
			var tabCount = $('.hotel-tabs .tab').length;
			//switch color on tabs
			$(this).addClass('active-tab').siblings().removeClass('active-tab');
			activeTab = $(this).attr('data-tab');
			//switch content related to tab
			for(var i = 1; i <= tabCount; i++) {
				if($('.tab-content').attr('id') && activeTab == 'tab-' + i ) {
						$('#tab-'+i).addClass('active-tab-content').siblings().removeClass('active-tab-content');
				}
			}
		});

		$('.island-filter-button, .island-filter-menu li').on('click', function() {
			$('.island-filter-menu.island-filter-list').toggleClass('fadeIn');
			//$('.island-filter-menu.close').toggle();
		});

	});

} ( this, jQuery ));

jQuery(document).ready(function( $ ) {

	// Header scroll animation
	$(window).on('scroll', function() {
		var scrollPos = $(document).scrollTop();
		if ( scrollPos > 130 ) {
			// Move up to hide header
			$('header.header').removeClass('translate-down');
			$('header.header').addClass('translate-up');
		} else if ( scrollPos < 130 ) {
			// Move down to show header
			$('header.header').removeClass('translate-up');
			$('header.header').addClass('translate-down');
		}
	});

	var hashTagActive = "";
	$("#menu-sidebar-scrolling-menu .child-island-menu-wrap li a:first-child").click(function (event) {
		if(hashTagActive != this.hash) { //this will prevent if the user click several times the same link to freeze the scroll.
			event.preventDefault();
			//calculate destination place
			var dest = 0;
			if ($(this.hash).offset().top > $(document).height() - $(window).height()) {
				dest = $(document).height() - $(window).height();
			} else {
				dest = $(this.hash).offset().top;
			}
			//go to destination
			$('html,body').animate({
				scrollTop: dest
			}, 1500, 'swing');
			hashTagActive = this.hash;
		}
	});

	// Sliders on category and home: wrap in span
	if ( $('body').hasClass('home') || $('body').hasClass('category') ) {
		$('body').find('.slide-data').each( function() {
			var title = $(this).find('h2.slide-title').detach();
			$(this).wrapInner("<span></span>");
			$(this).append(title);
		});
	}

});
