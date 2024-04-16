<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://lekcie.com/plugins-wordpress
 * @since      1.0.0
 *
 * @package    Responsive_Sliding_Menu
 * @subpackage Responsive_Sliding_Menu/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Responsive_Sliding_Menu
 * @subpackage Responsive_Sliding_Menu/includes
 * @author     Lekcie <contact@lekcie.com>
 */
class Responsive_Sliding_Menu_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'responsive-sliding-menu',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
