(function($) {
	"use strict";

	UNCODE.stickyTrigger = function( $el ) {
	if ( SiteParameters.is_frontend_editor ) {
		return false;
	}

	var stickyTrigger = function(){
		var stickyTrick = $('.sticky-trigger').each(function(){
			var $sticky = $(this),
				$inside = $('> div', $sticky),
				insideH = $inside.outerHeight(),
				$row = $sticky.closest('.vc_row'),
				$uncont = $sticky.closest('.uncont'),
				rowBottom,
				uncontBottom ,
				diffBottom;

			ScrollTrigger.create({
				trigger: $sticky,
				start: function(){ return "top center-=" + insideH/2; },
				endTrigger: $row,
				end:  function(){
					rowBottom = $row.offset().top + $row.outerHeight();
					uncontBottom = $uncont.offset().top + $uncont.outerHeight();
					diffBottom = rowBottom - uncontBottom;
					return "bottom center+=" + ( insideH/2 + diffBottom );
				},
				anticipatePin: true,
				pin: true,
				pinSpacing: false,
				scrub: true,
				invalidateOnRefresh: true,
			});

		});
	},
	setResizeSticky;

	$(window).on( 'load', function(){
		stickyTrigger();
	});

	var oldW = UNCODE.wwidth;
	$(window).on( 'resize uncode.re-layout', function(e){
		clearRequestTimeout(setResizeSticky);
		if ( e.type === 'resize' && oldW === UNCODE.wwidth ) {
			return;
		} else {
			oldW = UNCODE.wwidth;
		}
		setResizeSticky = requestTimeout( function(){
			stickyTrigger();
			ScrollTrigger.refresh();
		}, 1000 );
	});

};


})(jQuery);
