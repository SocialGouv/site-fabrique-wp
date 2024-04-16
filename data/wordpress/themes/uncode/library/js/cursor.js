(function($) {
	"use strict";

	UNCODE.magicCursor = function(){
	var $customCursor = $('#uncode-custom-cursor'),
		$customPilot = $('#uncode-custom-cursor-pilot'),
		$postLists = $('.uncode-post-titles'),
		currentCursor = 'auto',
		setTime,
		isScrolling,
		mouseEvent;

	function delayChangeCursor(cursorType, delayt_time){
		clearRequestTimeout(setTime);
		setTime = requestTimeout(function() {
			$customCursor.attr('data-cursor', cursorType);
			if ( $customPilot.length ) {
				$customPilot.attr('data-cursor', cursorType);
			}
			currentCursor = cursorType;
		}, delayt_time);
	}

	function changeCursor($wrap){
		$wrap = typeof $wrap === 'undefined' ? $('body') : $wrap;
		var href = SiteParameters.custom_cursor_selector != '' ? SiteParameters.custom_cursor_selector : '[href], a[data-lbox]',
			$href = $wrap.find(href),
			cursorType,
			setTime, set_delay;

		$href.hover(function(e) {
			var $this = $(this),
				data_cursor = $this.closest('[data-cursor]').attr('data-cursor') || $this.attr('data-cursor'),
				is_frontend_editor = $this.closest('.vc_controls').length,
				hasSrcOrClck = $('[src]', $this).length || $('.t-background-cover', $this).length || $this.closest('.tmb-click-row').length,
				$parent_cursor = $this.closest('[class*="custom-cursor"]');
			if ( is_frontend_editor ) {
				cursorType = 'auto';
			} else if ( typeof data_cursor !== 'undefined' && data_cursor !== '' && hasSrcOrClck ) {
				cursorType = data_cursor;
			} else if ( $parent_cursor.length ) {
				if ( $parent_cursor.hasClass('custom-cursor-light') ) {
					cursorType = 'icon-light';
				} else if ( $parent_cursor.hasClass('custom-cursor-diff') ) {
					cursorType = 'icon-diff';
				} else if ( $parent_cursor.hasClass('custom-cursor-accent') ) {
					cursorType = 'icon-accent';
				} else {
					cursorType = 'icon-dark';
				}
			} else {
				cursorType = 'pointer';
			}
			delayChangeCursor(cursorType, 0);
		}, function(){
			delayChangeCursor('auto', 150);
		});

		$(window).on('disable-hover', function(event) {
			document.addEventListener("mousemove", function(e) {
				mouseEvent = e;
			});
			delayChangeCursor('auto', 0);
		});

		$(window).on('enable-hover', function(event) {
			if ( typeof mouseEvent !== 'undefined' ) {
				var x = mouseEvent.clientX,
					y = mouseEvent.clientY;

				var elements = document.elementsFromPoint(x, y),
					$element = $(elements[0]);

				$element.closest(href).trigger('mouseenter');
			}
		});

	}

	$(window).on('load uncode-custom-cursor uncode-quick-view-loaded', function(event) {
		changeCursor();
	});

	$(document).ajaxComplete(function( event, xhr, settings ) {
		changeCursor();
	});

	$('.isotope-container').on('isotope-layout-complete', function() {
		var $this = $(this);
		changeCursor($this);
	});

};


})(jQuery);
