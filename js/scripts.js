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
