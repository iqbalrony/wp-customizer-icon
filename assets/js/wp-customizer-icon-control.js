(function ($) {
	"use strict";

	jQuery(document).ready(function ($) {

		/**
		 * Script for icon option
		 */
		$('.icon_options').each(function () {
			var icon_options = $(this);
			var icon_input = icon_options.find('input.cls_input');
			var icon_filter = icon_options.find('input.filter');
			var icon_wrap = icon_options.find('.customizer_icon');
			var icon = icon_wrap.find('i');
			//click on input show icon area
			icon_input.on('click', function () {
				icon_wrap.slideDown("fast");
			});
			//type on input search icon item in icon area
			icon_filter.on("keyup", function() {
				var value = $(this).val().toLowerCase();
				icon.filter(function() {
					$(this).closest('li').toggle($(this).attr('class').toLowerCase().indexOf(value) > -1);
				});
			});
			//click on icon hide icon area
			icon.on('click', function () {
				icon_input.val($(this).attr('class')).change();
				setTimeout(function () {
					icon_wrap.slideUp("fast");
				}, 310)
			});
		});

	});

})(jQuery);