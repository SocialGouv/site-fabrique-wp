(function($) {
	"use strict";

	var marqueeAttempts = 0,
	marqueeTO;

UNCODE.textMarquee = function( $titles ) {

	var initTextMarquee = function( $titles ){

		if ( typeof $titles == 'undefined' ) {
			$titles = $('.un-text-marquee');
		}

		if ( ! $titles.length ) {
			return;
		}

		$titles.each(function(){
			var $title = $(this),
				$span = $('> span', $title),
				txt,
				first = true,
				newW = UNCODE.wwidth;

			$('.marquee-clone-wrap', $title).remove();

			txt = $title.text();

			if ( ! $('.marquee-original-core', $span).length ) {
				$span = $('> span', $title).wrapInner('<span class="marquee-original-core" />').addClass('marquee-original');
			}

			var checkResize,
				spanW,
				$prepended = $('<span class="marquee-clone-wrap wrap-prepended" />'),
				$appended = $('<span class="marquee-clone-wrap wrap-appended" />'),
				clearSpeed,
				speed = 10;

			$span.prepend($prepended);
			$span.append($appended);

			var continuousTextMarquee = function(){
				var bound = $title.css({
						'transform': 'none',
						'opacity': 0
					}).offset();

				var xStrt = first || $title.hasClass('un-marquee-infinite') ? 0 : UNCODE.wwidth - bound.left,
					xEnd = $title.hasClass('un-marquee-infinite') ? spanW : ( spanW + bound.left ),
					xSpeed = $title.hasClass('un-marquee-infinite') ? ( spanW + bound.left ) : ( xStrt + ( UNCODE.wwidth + bound.left ) ),
					direction = $title.hasClass('un-marquee-opposite') ? 1 : -1;

				var marqueeTL = new TimelineMax({paused:true, reversed:true});

				var inViewElement = $title.closest('.sticky-trigger').length || $title.closest('.pin-spacer').length ? $title.closest('.vc_row')[0] : $title[0];

				var inview = new Waypoint.Inview({
					element: inViewElement,
					enter: function(direction) {
						marqueeTL.play();
					},
					exited: function(direction) {
						marqueeTL.pause();
					}
				});

				//gsap.killTweensOf($title);
				marqueeTL.fromTo( $title, {
					opacity: 1,
					x: xStrt * direction * -1
				},
				{
					duration: xSpeed / UNCODE.wwidth * speed,
					x: xEnd * direction,
					onComplete: function(){
						first = false;
						continuousTextMarquee();
					},
					ease: Linear.easeNone
				});
			};

			var runTextMarquee = function(){
				var time = Date.now();

				var textMarqueeScroll = function(){
					var $row = $title.closest('.vc_row'),
						$bound = $title.closest('.pin-spacer').length ? $row : $title,
						bound = $bound[0].getBoundingClientRect(),
						wait = 100,
						direction = $title.hasClass('un-marquee-scroll-opposite') ? -1 : 1;

					if ( bound.top === 0 && bound.bottom === 0 && bound.left === 0 && bound.right === 0 &&
						bound.height === 0 && bound.width === 0 && bound.x === 0 && bound.y === 0 &&
						marqueeAttempts < 2 ) {

						clearRequestTimeout(marqueeTO);

						marqueeTO = requestTimeout(function(){
							marqueeAttempts++;
							initTextMarquee();
						}, 100);
					}

					//if ((time + wait - Date.now()) < 0) {
						//if ( bound.top > ( bound.height * -4 ) && ( bound.top - bound.height ) < UNCODE.wheight * 2 ) {
							// $title[0].style.transform = 'translateX(' + ( UNCODE.wheight * 0.5 - bound.top ) * 0.75 + 'px)';
							gsap.killTweensOf($title);
							gsap.to( $title, {
								duration: 0.24,
								x: ( UNCODE.wheight * 0.35 - bound.top ) * 0.5 * direction,
								//ease: Expo.easeOut,
							});
						//}
						//time = Date.now();
					//}
				};

				textMarqueeScroll();
				$(window).on( 'load scroll', function() {
					textMarqueeScroll();
				});

			};

			var cloneSpan = function($_title, cntnt){

				if ( $_title.hasClass('un-marquee-infinite') ) {
					$('> span.marquee-clone-wrap', $_title).text('');
				}

				gsap.to( $_title, {
					duration: 0,
					x: 0
				});
				spanW = $span.outerWidth();

				if ( !spanW ) {
					return;
				}

				var part = Math.ceil( UNCODE.wwidth / spanW ) * 2;

				if ( $_title.hasClass('un-marquee-infinite') ) {

					for ( var i = 0; i < part; i++ ) {
						$prepended[0].textContent += cntnt + "\u00A0";
						$appended[0].textContent += cntnt + "\u00A0";
					}
				}

				if ( $('body').hasClass('compose-mode') ) {
					return;
				}

				if ( $_title.hasClass('un-marquee') || $_title.hasClass('un-marquee-opposite') ) {
					continuousTextMarquee();
				}

				if ( $_title.hasClass('un-marquee-scroll') || $_title.hasClass('un-marquee-scroll-opposite') ) {
					runTextMarquee();
				}

			};

			var marqueResize = function(){
				clearRequestTimeout(checkResize);
				checkResize = requestTimeout(function(){
					if ( newW !== UNCODE.wwidth ) {
						gsap.killTweensOf($title);
						initTextMarquee();
						newW = UNCODE.wwidth;
					}
				}, 1000);
			};

			$(window).off('resize', marqueResize)
			.on( 'resize', marqueResize);

			cloneSpan($title, txt);

			if ( $('body').hasClass('compose-mode') && typeof window.parent.vc !== 'undefined' ) {
				window.parent.vc.events.on( 'shortcodeView:updated', function( e ){
					// imageHover();
					var $_titles = $('.un-text-marquee',e.view.$el);
					initTextMarquee($_titles);
				});
			}
		});
	};

	$(document).ready(function(){
		initTextMarquee();
	});

};


})(jQuery);
