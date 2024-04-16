jQuery(document).ready(function ($) {
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

	//ajout d'une croix dans les filtres
	var croix_html = '<span class="icon icon-close"></span>';
	$('.woof_auto_show_indent').append(croix_html);

	//click sur filtres exterieur + croix, on ferme filtres
	$('.woof_auto_show').click(function (e) {
		if (!$(e.target).is('.woof_front_toggle') &&
			!$(e.target).is('.woof_list.woof_list_checkbox li>*')) {
			$('.woof_hide_auto_form').click();
		}
	}).children().click(function (e) {
		if ($(e.target).is('.woof_reset_search_form')) {
			reinit_filter();
		}
		if (!$(e.target).is('.icon.icon-close') &&
			!$(e.target).is('.woof_front_toggle') &&
			!$(e.target).is('.woof_list.woof_list_checkbox li>*')) {
			return false;
		}
	});

	//scroll down, sticky header
	var previousScroll = 0;
	$(window).scroll(function () {
		var currentScroll = $(this).scrollTop();
		if (currentScroll > previousScroll) {
			if (currentScroll >= 180) {
				$('#site-header').addClass('is_sticky');
			}
		} else {
			if (currentScroll < 100) {
				$('#site-header').removeClass('is_sticky');
			}
		}
		previousScroll = currentScroll;
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
});