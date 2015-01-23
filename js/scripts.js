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

		$('.island-filter-button').on('click', function() {
			$('.island-filter-menu.close').toggle();
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

});
