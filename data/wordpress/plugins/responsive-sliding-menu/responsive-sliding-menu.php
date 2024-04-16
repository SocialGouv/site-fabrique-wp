<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://lekcie.com/plugins-wordpress
 * @since             1.0.0
 * @package           Responsive_Sliding_Menu
 *
 * @wordpress-plugin
 * Plugin Name:       Responsive Sliding Menu
 * Plugin URI:        https://lekcie.com/plugins-wordpress
 * Description:       Creates an opening sideways menu. Guaranteed "Wow" effect!
 * Version:           1.4.5
 * Author:            Lekcie
 * Author URI:        https://lekcie.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       responsive-sliding-menu
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('RESPONSIVE_SLIDING_MENU_VERSION', '1.4.5');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-responsive-sliding-menu-activator.php
 */
function activate_responsive_sliding_menu()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-responsive-sliding-menu-activator.php';
	Responsive_Sliding_Menu_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-responsive-sliding-menu-deactivator.php
 */
function deactivate_responsive_sliding_menu()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-responsive-sliding-menu-deactivator.php';
	Responsive_Sliding_Menu_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_responsive_sliding_menu');
register_deactivation_hook(__FILE__, 'deactivate_responsive_sliding_menu');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-responsive-sliding-menu.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_responsive_sliding_menu()
{

	$plugin = new Responsive_Sliding_Menu();
	$plugin->run();
}
run_responsive_sliding_menu();
