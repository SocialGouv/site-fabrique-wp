<?php
/**
 * VC Inner Column config
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$back_color_options = uncode_core_vc_params_get_advanced_color_options( 'back_color', esc_html__("Background color", 'uncode-core'), esc_html__("Specify a background color for the column.", 'uncode-core'), esc_html__("Style", 'uncode-core'), $uncode_colors );
list( $add_back_color_type, $add_back_color, $add_back_color_solid, $add_back_color_gradient ) = $back_color_options;

$overlay_color_options = uncode_core_vc_params_get_advanced_color_options( 'overlay_color', esc_html__("Overlay color", 'uncode-core'), esc_html__("Specify an overlay color for the background.", 'uncode-core'), esc_html__("Style", 'uncode-core'), $uncode_colors );
list( $add_overlay_color_type, $add_overlay_color, $add_overlay_color_solid, $add_overlay_color_gradient ) = $overlay_color_options;

$border_color_options = uncode_core_vc_params_get_advanced_color_options( 'border_color', esc_html__("Border color", 'uncode-core'), esc_html__("Specify a border color.", 'uncode-core'), esc_html__("Custom", 'uncode-core'), $flat_uncode_colors_w_transp, array( 'flat' => true ) );
list( $add_border_color_type, $add_border_color, $add_border_color_solid ) = $border_color_options;

vc_map(array(
	"name" => esc_html__("Inner Column", 'uncode-core') ,
	"base" => "vc_column_inner",
	"class" => "",
	"icon" => "",
	"wrapper_class" => "",
	"controls" => "full",
	"allowed_container_element" => false,
	"content_element" => false,
	"is_container" => true,
	"params" => array(
		array(
			'type' => 'uncode_shortcode_id',
			'heading' => esc_html__('Unique ID', 'uncode-core') ,
			'param_name' => 'uncode_shortcode_id',
			'description' => '' ,
			'group' => esc_html__('Aspect', 'uncode-core')
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Content Width", 'uncode-core') ,
			"param_name" => "column_width_use_pixel",
			"edit_field_class" => 'vc_column row_height',
			"description" => 'Set this value if you want to constrain the column width.',
			"group" => esc_html__("Aspect", 'uncode-core') ,
			"value" => array(
				'' => 'yes'
			)
		) ,
		array(
			"type" => "type_numeric_slider",
			"heading" => esc_html__("Content Width Value", 'uncode-core') ,
			"param_name" => "column_width_percent",
			"min" => 0,
			"max" => 100,
			"step" => 1,
			"value" => 100,
			"description" => esc_html__("Set the column width with a percent value.", 'uncode-core') ,
			"group" => esc_html__("Aspect", 'uncode-core') ,
			'dependency' => array(
				'element' => 'column_width_use_pixel',
				'is_empty' => true,
			)
		) ,
		array(
			'type' => 'textfield',
			"heading" => esc_html__("Content Width Value", 'uncode-core') ,
			'param_name' => 'column_width_pixel',
			'description' => esc_html__("Insert the column width in pixel.", 'uncode-core') ,
			"group" => esc_html__("Aspect", 'uncode-core') ,
			'dependency' => array(
				'element' => 'column_width_use_pixel',
				'value' => 'yes'
			)
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Horizontal position", 'uncode-core') ,
			"param_name" => "position_horizontal",
			"description" => esc_html__("Specify the horizontal position of the content if you have decreased the width value.", 'uncode-core') ,
			"std" => 'center',
			"value" => array(
				'Left' => 'left',
				'Center' => 'center',
				'Right' => 'right'
			) ,
			'group' => esc_html__('Aspect', 'uncode-core')
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Vertical position", 'uncode-core') ,
			"param_name" => "position_vertical",
			"description" => esc_html__("Specify the vertical position of the content.", 'uncode-core') ,
			"value" => array(
				'Top' => 'top',
				'Middle' => 'middle',
				'Bottom' => 'bottom'
			) ,
			'group' => esc_html__('Aspect', 'uncode-core')
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Text alignment", 'uncode-core') ,
			"param_name" => "align_horizontal",
			"description" => esc_html__("Specify the alignment inside the content box.", 'uncode-core') ,
			"value" => array(
				'Left' => 'align_left',
				'Center' => 'align_center',
				'Right' => 'align_right',
			) ,
			'group' => esc_html__('Aspect', 'uncode-core')
		) ,
		array(
			"type" => "type_numeric_slider",
			"heading" => esc_html__("Inner Vertical Spacing", 'uncode-core') ,
			"param_name" => "gutter_size",
			"min" => 0,
			"max" => 6,
			"step" => 1,
			"value" => 3,
			"description" => esc_html__("Set the vertical rhythm between elements.", 'uncode-core') ,
			'group' => esc_html__('Aspect', 'uncode-core') ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Custom padding", 'uncode-core') ,
			"param_name" => "override_padding",
			"description" => esc_html__('Activate this to define custom paddings.', 'uncode-core') ,
			"group" => esc_html__("Aspect", 'uncode-core') ,
			"value" => array(
				'' => 'yes'
			)
		) ,
		array(
			"type" => "type_numeric_slider",
			"heading" => esc_html__("Custom padding", 'uncode-core') ,
			"param_name" => "column_padding",
			"min" => 0,
			"max" => 5,
			"step" => 1,
			"value" => 2,
			"description" => esc_html__("Set the column padding.", 'uncode-core') ,
			"group" => esc_html__("Aspect", 'uncode-core') ,
			"dependency" => Array(
				'element' => "override_padding",
				'value' => array(
					'yes'
				)
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Extend height", 'uncode-core') ,
			"param_name" => "expand_height",
			"description" => esc_html__("Activate this to expand the height of the column to 100% when you have fluid content such as Maps. If you need to create equal height columns do not use this option but use the Rows > Columns > Columns Equal Height.", 'uncode-core') ,
			'group' => esc_html__('Aspect', 'uncode-core') ,
			"value" => Array(
				'' => 'yes'
			) ,
		) ,
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Skin", 'uncode-core') ,
			"param_name" => "style",
			"value" => array(
				esc_html__('Inherit', 'uncode-core') => '',
				esc_html__('Light', 'uncode-core') => 'light',
				esc_html__('Dark', 'uncode-core') => 'dark'
			) ,
			'group' => esc_html__('Style', 'uncode-core') ,
			"description" => esc_html__("Specify the text Skin color of the column.", 'uncode-core')
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Font Family", 'uncode-core') ,
			"param_name" => "font_family",
			"description" => esc_html__("Specify the column font family.", 'uncode-core') ,
			"value" => $heading_font,
			'std' => '',
			'group' => esc_html__('Style', 'uncode-core') ,
		) ,
		$add_back_color_type,
		$add_back_color,
		$add_back_color_solid,
		$add_back_color_gradient,
		array(
			"type" => "media_element",
			"heading" => esc_html__("Background Media", 'uncode-core') ,
			"param_name" => "back_image",
			"value" => "",
			"description" => esc_html__("Specify a media from the Media Library.", 'uncode-core') ,
			'group' => esc_html__('Style', 'uncode-core')
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Dynamic Background", 'uncode-core') ,
			"param_name" => "back_image_auto",
			"description" => esc_html__("Enable the Dynamic Background", 'uncode-core') ,
			"value" => Array(
				'' => 'yes'
			) ,
			"group" => esc_html__("Style", 'uncode-core') ,
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Dynamic media", 'uncode-core') ,
			"param_name" => "back_image_option",
			"description" => esc_html__("Set the source for the Dynamic Background.", 'uncode-core') ,
			"group" => esc_html__("Style", 'uncode-core'),
			"value" => array(
				esc_html__('Featured Image', 'uncode-core') => '',
				esc_html__('Secondary Featured Image', 'uncode-core') => 'secondary',
			) ,
			"dependency" => array(
				'element' => "back_image_auto",
				'not_empty' => true
			) ,
		) ,
		$add_background_repeat,
		$add_background_attachment,
		$add_background_position,
		$add_background_size,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Parallax", 'uncode-core') ,
			"param_name" => "parallax",
			"description" => esc_html__("Activate the Parallax effect. NB. Not available with Slides Scroll.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"dependency" => Array(
				'element' => "back_image",
				'not_empty' => true
			) ,
			"group" => esc_html__("Style", 'uncode-core')
		) ,
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Zoom effect", 'uncode-core') ,
			"param_name" => "kburns",
			"description" => esc_html__("Activate the Zoom effect you prefer.", 'uncode-core') ,
			"group" => esc_html__("Style", 'uncode-core'),
			"value" => array(
				esc_html__('None', 'uncode-core') => '',
				esc_html__('Ken Burns', 'uncode-core') => 'yes',
				esc_html__('Zoom Out', 'uncode-core') => 'zoom',
				esc_html__('Magnetic', 'uncode-core') => 'magnetic'
			) ,
			"dependency" => array(
				'element' => "back_image",
				'not_empty' => true
			) ,
		) ,
		$add_overlay_color_type,
		$add_overlay_color,
		$add_overlay_color_solid,
		$add_overlay_color_gradient,
		array(
			"type" => "type_numeric_slider",
			"heading" => esc_html__("Overlay Opacity", 'uncode-core') ,
			"param_name" => "overlay_alpha",
			"min" => 0,
			"max" => 100,
			"step" => 1,
			"value" => 50,
			"description" => esc_html__("Set the transparency for the overlay.", 'uncode-core') ,
			"group" => esc_html__("Style", 'uncode-core') ,
		) ,
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Overlay Blend Mode *", 'uncode-core') ,
			"param_name" => "overlay_color_blend",
			"description" => esc_html__("Specify a blending mode. NB. IE and Edge still do not support it.", 'uncode-core') ,
			"group" => esc_html__("Style", 'uncode-core') ,
			"value" => array(
				esc_html__('None', 'uncode-core') => '',
				esc_html__('Multiply', 'uncode-core') => 'multiply',
				esc_html__('Screen', 'uncode-core') => 'screen',
				esc_html__('Overlay', 'uncode-core') => 'overlay',
				esc_html__('Darken', 'uncode-core') => 'darken',
				esc_html__('Lighten', 'uncode-core') => 'lighten',
				esc_html__('Color dodge', 'uncode-core') => 'color-dodge',
				esc_html__('Color burn', 'uncode-core') => 'color-burn',
				esc_html__('Hard light', 'uncode-core') => 'hard-light',
				esc_html__('Soft light', 'uncode-core') => 'soft-light',
				esc_html__('Difference', 'uncode-core') => 'difference',
				esc_html__('Exclusion', 'uncode-core') => 'exclusion',
			) ,
		) ,
		array(
			"type" => "css_editor",
			"heading" => esc_html__('CSS', 'uncode-core') ,
			"description" => esc_html__("NB. This is not compatible with the Border Radius and Shadow options.", 'uncode-core') ,
			"param_name" => "css",
			"group" => esc_html__('Custom', 'uncode-core'),
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Lateral border mobile", 'uncode-core') ,
			"param_name" => "preserve_border",
			"description" => esc_html__("By default, columns are stack on mobile, and lateral borders are hidden. Use this option to preserve custom lateral Borders on mobile.", 'uncode-core') ,
			'group' => esc_html__('Custom', 'uncode-core'),
			"value" => Array(
				'' => 'yes'
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Tablet", 'uncode-core') ,
			"param_name" => "preserve_border_tablet",
			"description" => esc_html__("Use this option to preserve lateral borders on tablet.", 'uncode-core') ,
			'group' => esc_html__('Custom', 'uncode-core'),
			"value" => Array(
				'' => 'yes'
			) ,
			"dependency" => array(
				'element' => "preserve_border",
				'not_empty' => true
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Mobile", 'uncode-core') ,
			"param_name" => "preserve_border_mobile",
			"description" => esc_html__("Use this option to preserve lateral borders on Mobile.", 'uncode-core') ,
			'group' => esc_html__('Custom', 'uncode-core'),
			"value" => Array(
				'' => 'yes'
			) ,
			"dependency" => array(
				'element' => "preserve_border",
				'not_empty' => true
			) ,
		) ,
		$add_border_color_type,
		$add_border_color,
		$add_border_color_solid,
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Border style", 'uncode-core') ,
			"param_name" => "border_style",
			"description" => esc_html__("Specify a border style.", 'uncode-core') ,
			"group" => esc_html__("Custom", 'uncode-core') ,
			"value" => $border_style,
		) ,
		array(
			"type" => "type_numeric_slider",
			"heading" => esc_html__("Shift x-axis", 'uncode-core') ,
			"param_name" => "shift_x",
			"min" => - 5,
			"max" => 5,
			"step" => 1,
			"value" => 0,
			"description" => esc_html__("Set how much the element has to shift in the X axis.", 'uncode-core') ,
			'group' => esc_html__('Off-grid', 'uncode-core')
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Shift x-axis fixed", 'uncode-core') ,
			"param_name" => "shift_x_fixed",
			"description" => esc_html__("Deactive shift-x responsiveness.", 'uncode-core') ,
			'group' => esc_html__('Off-grid', 'uncode-core') ,
			"value" => Array(
				'' => 'yes'
			) ,
		) ,
		array(
			"type" => "type_numeric_slider",
			"heading" => esc_html__("Shift y-axis", 'uncode-core') ,
			"param_name" => "shift_y",
			"min" => - 5,
			"max" => 5,
			"step" => 1,
			"value" => 0,
			"description" => esc_html__("Set how much the element has to shift in the Y axis. This works on the margin-top property.", 'uncode-core') ,
			'group' => esc_html__('Off-grid', 'uncode-core')
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Shift y-axis fixed", 'uncode-core') ,
			"param_name" => "shift_y_fixed",
			"description" => esc_html__("Deactive shift-y responsiveness.", 'uncode-core') ,
			'group' => esc_html__('Off-grid', 'uncode-core') ,
			"value" => Array(
				'' => 'yes'
			) ,
		) ,
		array(
			"type" => "type_numeric_slider",
			"heading" => esc_html__("Downward off-grid", 'uncode-core') ,
			"param_name" => "shift_y_down",
			"min" => - 5,
			"max" => 5,
			"step" => 1,
			"value" => 0,
			"description" => esc_html__("Set how much the element has to move toward the element below.", 'uncode-core') ,
			'group' => esc_html__('Off-grid', 'uncode-core')
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Downward off-grid fixed", 'uncode-core') ,
			"param_name" => "shift_y_down_fixed",
			"description" => esc_html__("Deactive shift-y responsiveness.", 'uncode-core') ,
			'group' => esc_html__('Off-grid', 'uncode-core') ,
			"value" => Array(
				'' => 'yes'
			) ,
		) ,
		array(
			"type" => "type_numeric_slider",
			"heading" => esc_html__("Custom z-index", 'uncode-core') ,
			"param_name" => "z_index",
			"min" => 0,
			"max" => 10,
			"step" => 1,
			"value" => 0,
			"description" => esc_html__("Set a custom z-index to ensure the visibility of the element.", 'uncode-core') ,
			'group' => esc_html__('Off-grid', 'uncode-core')
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Desktop", 'uncode-core') ,
			"param_name" => "desktop_visibility",
			"description" => esc_html__("Choose the visibiliy of the element in desktop layout mode (960px >).", 'uncode-core') ,
			'group' => esc_html__('Responsive', 'uncode-core') ,
			"value" => Array(
				'' => 'yes'
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Tablet", 'uncode-core') ,
			"param_name" => "medium_visibility",
			"description" => esc_html__("Choose the visibiliy of the element in tablet layout mode (570px > < 960px).", 'uncode-core') ,
			'group' => esc_html__('Responsive', 'uncode-core') ,
			"value" => Array(
				'' => 'yes'
			) ,
		) ,
		array(
			"heading" => "Tablet text alignment",
			"type" => 'dropdown',
			"param_name" => "align_medium",
			"description" => esc_html__("Specify the text alignment inside the content box in tablet layout mode.", 'uncode-core') ,
			"value" => array(
				'Text align (Inherit)' => '',
				'Left' => 'align_left_tablet',
				'Center' => 'align_center_tablet',
				'Right' => 'align_right_tablet',
			) ,
			'group' => esc_html__('Responsive', 'uncode-core')
		) ,
		array(
			"heading" => "Tablet column width",
			"type" => "type_numeric_slider",
			"param_name" => "medium_width",
			"min" => 0,
			"max" => 7,
			"step" => 1,
			"value" => 0,
			"description" => esc_html__("COLUMN WIDTH. NB. If you change this value for one column you must specify a value for every column of the row.", 'uncode-core') ,
			"group" => esc_html__("Responsive", 'uncode-core')
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Mobile", 'uncode-core') ,
			"param_name" => "mobile_visibility",
			"description" => esc_html__("Choose the visibiliy of the element in mobile layout mode (< 570px).", 'uncode-core') ,
			'group' => esc_html__('Responsive', 'uncode-core') ,
			"value" => Array(
				'' => 'yes'
			) ,
		) ,
		array(
			"heading" => "Mobile text alignment",
			"type" => 'dropdown',
			"param_name" => "align_mobile",
			"description" => esc_html__("Specify the text alignment inside the content box in mobile layout mode.", 'uncode-core') ,
			"value" => array(
				'Text align (Inherit)' => '',
				'Left' => 'align_left_mobile',
				'Center' => 'align_center_mobile',
				'Right' => 'align_right_mobile',
			) ,
			'group' => esc_html__('Responsive', 'uncode-core')
		) ,
		array(
			"heading" => "Mobile column width",
			"type" => "type_numeric_slider",
			"param_name" => "mobile_width",
			"min" => 0,
			"max" => 7,
			"step" => 1,
			"value" => 0,
			"description" => esc_html__("COLUMN WIDTH. NB. If you change this value for one column you must specify a value for every column of the row.", 'uncode-core') ,
			"group" => esc_html__("Responsive", 'uncode-core')
		) ,
		array(
			"heading" => "Mobile minimum height",
			"type" => "textfield",
			"param_name" => "mobile_height",
			"description" => esc_html__("MINIMUM HEIGHT. Insert the value in pixel.", 'uncode-core') ,
			'group' => esc_html__('Responsive', 'uncode-core')
		) ,
		$add_css_animation,
		$add_animation_speed,
		$add_animation_delay,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Parallax", 'uncode-core') ,
			"param_name" => 'parallax_intensity',
			"description" => esc_html__("Specify the Parallax intensity. NB. If you select a Parallax animation for the Column, please be careful not to use animation effects on inner Elements because the Animation will not be recognized and instantiated correctly. In other words, a Column with the Parallax effect cannot contain Modules with entrance Animations. Please also note that Parallax is not available with Slides Scroll and, for performance reasons, it is disabled when working with the Frontend Editor.", 'uncode-core') ,
			'group' => esc_html__('Animation', 'uncode-core'),
			'value' => array(
				esc_html__('No', 'uncode-core') => '',
				esc_html__('10%', 'uncode-core') => 1,
				esc_html__('20%', 'uncode-core') => 2,
				esc_html__('30%', 'uncode-core') => 3,
				esc_html__('40%', 'uncode-core') => 4,
				esc_html__('50%', 'uncode-core') => 5,
				esc_html__('60%', 'uncode-core') => 6,
				esc_html__('70%', 'uncode-core') => 7,
				esc_html__('80%', 'uncode-core') => 8,
				esc_html__('90%', 'uncode-core') => 9,
				esc_html__('100%', 'uncode-core') => 10
			) ,
		),
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Parallax in Header", 'uncode-core') ,
			"param_name" => "parallax_centered",
			"description" => esc_html__("This option is recommended for elements that are in the Header, visible before you start scrolling the page.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Animation", 'uncode-core'),
			"dependency" => array(
				'element' => "parallax_intensity",
				'not_empty' => true
			) ,
		) ,
		array(
			'type' => 'vc_link',
			'heading' => esc_html__('Custom link *', 'uncode-core') ,
			'param_name' => 'link_to',
			'description' => esc_html__('Enter a custom link for the column. NB. For performance reasons, this option is disabled while working with the Frontend Editor.', 'uncode-core') ,
			'group' => esc_html__('Extra', 'uncode-core') ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Sticky", 'uncode-core') ,
			"param_name" => "sticky",
			"description" => esc_html__("Activate this to stick the element when scrolling. NB. It doesn't work on mobile and it's not compatible with the Columns Equal Height and Off-Grid options.", 'uncode-core') ,
			'group' => esc_html__('Extra', 'uncode-core') ,
			"value" => Array(
				'' => 'yes'
			) ,
		) ,
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Border radius", 'uncode-core') ,
			"param_name" => "radius",
			"description" => esc_html__("Specify the border radius effect.", 'uncode-core') ,
			'group' => esc_html__('Extra', 'uncode-core') ,
			"value" => array(
				esc_html__('None', 'uncode-core') => '',
				esc_html__('Extra Small', 'uncode-core') => 'xs',
				esc_html__('Small', 'uncode-core') => 'sm',
				esc_html__('Standard', 'uncode-core') => 'std',
				esc_html__('Large', 'uncode-core') => 'lg',
				esc_html__('Extra Large', 'uncode-core') => 'xl',
			) ,
		) ,
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Shadow", 'uncode-core') ,
			"param_name" => "shadow",
			"description" => esc_html__("Activate this for the shadow effect.", 'uncode-core') ,
			'group' => esc_html__('Extra', 'uncode-core') ,
			"value" => array(
				esc_html__('None', 'uncode-core') => '',
				esc_html__('Extra Small', 'uncode-core') => 'xs',
				esc_html__('Small', 'uncode-core') => 'sm',
				esc_html__('Standard', 'uncode-core') => 'std',
				esc_html__('Large', 'uncode-core') => 'lg',
				esc_html__('Extra Large', 'uncode-core') => 'xl',
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Shadow Darker", 'uncode-core') ,
			"param_name" => "shadow_darker",
			"description" => esc_html__("Activate this for the dark shadow effect.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Extra", 'uncode-core') ,
			'dependency' => array(
				'element' => 'shadow',
				'not_empty' => true
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Skew", 'uncode-core') ,
			"param_name" => "skew",
			"description" => esc_html__("Apply the Skew effect at the page scroll. NB. For performance reasons, this option is disabled while working with the Frontend Editor.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
			"group" => esc_html__("Extra", 'uncode-core'),
		) ,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Element ID', 'uncode-core') ,
			'param_name' => 'el_id',
			'description' => esc_html__('This value has to be unique. Change it in case it\'s needed.', 'uncode-core') ,
			"group" => esc_html__("Extra", 'uncode-core')
		) ,
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra class", 'uncode-core') ,
			"param_name" => "el_class",
			"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your CSS file.", 'uncode-core') ,
			'group' => esc_html__('Extra', 'uncode-core')
		) ,
	) ,
	"js_view" => 'UncodeColumnView'
));
