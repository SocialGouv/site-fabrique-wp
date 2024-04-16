!function($) {
    "use strict";

    function getTaxType() {
		var $taxType = false;
		var $mainLoopField = $('.wpb_el_type_loop .loop_field').val();

		if ($mainLoopField) {
			var $mainLoop = $mainLoopField.split('|');

			for (var $loop in $mainLoop) {
				if ($mainLoop[$loop].indexOf('taxonomy_query:') != -1) {
					$taxType = $mainLoop[$loop];
					$taxType = $taxType.replace('taxonomy_query:', '');
				}
			}
		}

		return $taxType;
    }

    var $taxType = getTaxType();

    if ($taxType) {
    	window.showHideQueryBuilderOptions($taxType);
    }

    $(document).on('vc.display.template', function() {
    	var $taxType = getTaxType();

    	if ($taxType) {
			window.showHideQueryBuilderOptions($taxType);
		}
	});

	function showHideCSSGridOptions() {
		var layout = $('select.index_type');
		var extra_filters = $('input.show_extra_filters');

		if (layout.val() === 'css_grid') {
			var matrix_input = $('select[name="post_matrix"]');
			matrix_input.val('');
			matrix_input.closest('.vc_shortcode-param').hide();
			if (extra_filters.is(':checked')) {
				extra_filters.trigger('click');
			}
			extra_filters.closest('.vc_shortcode-param').hide();
		} else {
			$('li[data-tab-index="5"]').removeClass('single-tab-disabled');
			$('#vc_edit-form-tab-5').removeClass('single-tab-disabled');
			extra_filters.closest('.vc_shortcode-param').show();
		}
	}

	showHideCSSGridOptions();
	$('select.index_type').on('change', function() {
		showHideCSSGridOptions();
	});

	function showHideQueryBuilderMetaKeyOptions() {
		var order_by = $('.loop_params_holder select[name="order_by"]').val();

		console.log(order_by);

		if (order_by === 'meta_value' || order_by === 'meta_value_num') {
			$('.loop_params_holder').find('.vc_row--meta_key-field').show();
		} else {
			$('.loop_params_holder').find('.vc_row--meta_key-field').hide();
		}
	}

	 $(document).on('vc.display.template', function() {
    	showHideQueryBuilderMetaKeyOptions();
	});

	// showHideQueryBuilderMetaKeyOptions();
	$(document).on('change', '.loop_params_holder select[name="order_by"]', function() {
		showHideQueryBuilderMetaKeyOptions();
	});

    setTimeout(function() {
    	window.itemIndex();
    	window.uncode_index_show_hide_filter_pagination();
    }, 1000);

}(window.jQuery);
