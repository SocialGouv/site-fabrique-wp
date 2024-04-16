jQuery(document).ready(function ($) {
	//copy to clipboard script
	$('body').on('click', '.copy-to-clipboard', function () {
		var $temp = $("<input>");
		$("body").append($temp);
		$temp.val($(this).find('.element-to-copy').text()).select();
		document.execCommand("copy");
		$temp.remove();

		$(this).parent().find(".response").html('<span class="dashicons dashicons-yes-alt"></span> ' + js_translate.copied_shortcode);
		$(this).parent().find(".response").fadeIn();
	});

	//click sur item navbar, on ouvre le menu
	$("body").on('click', '.main-nav .item .title', function () {
		$('.nav-desktop-layer').removeClass('active').fadeOut();
		$('.main-nav li.item span.title').removeClass('active');

		$(this).addClass('active');
		$(this).parent().find('.nav-desktop-layer').fadeIn(function () {
			$(this).addClass("active");
		});
	});

	//click sur croix, on ferme le menu
	$("body").on('click', '.main-nav .icon.icon-close.close-submenu', function () {
		$('.main-nav .nav-desktop-layer').removeClass("active").fadeOut();
		$('.main-nav .item .title').removeClass('active');
		$('.edit_menu_button').addClass('hide');
	});

	//click sur submenu item, on ouvre subsubmenu
	$("body").on('click', '.main-nav .sub-menu .item-child .subtitle', function () {
		$('.main-nav .sub-menu .item-child').removeClass('active');
		$('.nav-subsubmenu-desktop-layer').removeClass('active');

		var parent_li = $(this).parent();
		parent_li.addClass('active');
		parent_li.find('.nav-subsubmenu-desktop-layer').show(function () {
			parent_li.find('.nav-subsubmenu-desktop-layer').addClass('active');
		});
	});
	//click sur croix subsubmenu, on ferme
	$("body").on('click', '.nav-desktop-layer .icon.icon-close.close-subsubmenu', function () {
		$('.main-nav .sub-menu .item-child').removeClass('active');
		$('.nav-subsubmenu-desktop-layer').removeClass('active');
	});

	//click sur edit button, popup options
	$('.menu-preview .dashicons.dashicons-edit').on('click', function (e) {
		$(this).find('.edit-menu').toggleClass('active');
	}).children().click(function (e) {
		return false;
	});
	//hover edit button, on hover la partie interessee
	$('.menu-preview .dashicons.dashicons-edit').on('hover', function (e) {
		var target = $(this).data('target-hover');
		var target_dark = $(this).data('target-dark');
		var original_background = $(target).attr('data-background-color');
		if (!original_background) original_background = "transparent";

		var background_color = target_dark ? "#646253" : "#fffbcb";

		if (e.type === "mouseenter") {
			$(target).css('background-color', background_color);
		}
		else {
			$(target).css('background-color', original_background);
		}
	}).children().on('hover', function (e) {
		return false;
	});

	//colorpicker
	$('.color-field').wpColorPicker({
		change: function (event, ui) {
			var original_input = event.target
			var color_hex = ui.color.toString();
			$(original_input).val(color_hex);
			$(original_input).trigger("change");
		}
	});
	//si input change, on edit le design
	$('body').on('change', 'input.color-field', function () {
		var target = $(this).data('target');
		var type = $(this).data('type');
		var is_hover = $(this).data('is-hover');
		var color = $(this).val();
		if (is_hover) {
			var original_type = $(target).css(type);
			$(target).hover(function (e) {
				$(this).css(type, e.type === "mouseenter" ? color : original_type);
			});
		}
		else {
			$(target).css(type, color);
			$(target).attr("data-" + type, color);
		}
	});
	//pareil avec select
	$('body').on('change', 'select.change-select', function () {
		var target = $(this).data('target');
		var type = $(this).data('type');
		var value = this.value;

		$(target).css(type, value);
	});
	//pareil avec input number
	$('body').on('change', 'input.size-field', function () {
		var target = $(this).data('target');
		var type = $(this).data('type');
		var suffix = $(this).data('suffix');
		var value = this.value;

		if (suffix) {
			value = value + suffix;
		}
		$(target).css(type, value);
	});

	//click sur menu, on affiche les options
	$('.main-nav li.item span.title').on('click', function () {
		$('.edit_menu_button').removeClass('hide');
	});

	//menu burger click = show menu	
	$('.rsm-burger').on('click', function () {
		$('.sliding-menu .main-nav-container').addClass('active');
	})
	//click sur croix menu burger, on hide
	$('.sliding-menu .icon.icon-close.close-menu').on('click', function () {
		$('.sliding-menu .main-nav-container').removeClass('active');
	});

	//click sur exterieur submenu, on hide
	$('body').on('click', '.nav-overlay', function (e) {
		$('.nav-desktop-layer').removeClass('active').fadeOut();
	});

	//hides notice
	$('body').on('click', ".rsm_hide_notice", function () {
		var duration = $(this).data('duration');
		setCookie('rsm_hide_review', 'true', duration);
		$('#rsm_review_notice').slideUp();
	});
});

function setCookie(name, value, days) {
	var expires = "";
	if (days) {
		var date = new Date();
		date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
		expires = "; expires=" + date.toUTCString();
	}
	document.cookie = name + "=" + (value || "") + expires + "; path=/";
}