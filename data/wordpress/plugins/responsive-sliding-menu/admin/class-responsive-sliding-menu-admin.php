<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://lekcie.com/plugins-wordpress
 * @since      1.0.0
 *
 * @package    Responsive_Sliding_Menu
 * @subpackage Responsive_Sliding_Menu/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Responsive_Sliding_Menu
 * @subpackage Responsive_Sliding_Menu/admin
 * @author     Lekcie <contact@lekcie.com>
 */
class Responsive_Sliding_Menu_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets before loading
	 *
	 * @since    1.0.0
	 */
	public function enqueue_init_styles()
	{
		wp_enqueue_style($this->plugin_name . 'fa', plugin_dir_url(__FILE__) . 'css/lib/Fontawesome/all.min.css', array(), "5.13.1", 'all');
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{
		wp_enqueue_style("wp-color-picker");
		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/responsive-sliding-menu-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker');

		//Javascript Translation
		wp_register_script($this->plugin_name . 'rsm', plugin_dir_url(__FILE__) . 'js/responsive-sliding-menu-admin.js', array('wp-color-picker'), false, true);
		// Localize the script with new data
		$translation_array = array(
			'copied_shortcode' => __('Shortcode copied', 'responsive-sliding-menu'),
		);
		wp_localize_script($this->plugin_name . 'rsm', 'js_translate', $translation_array);

		wp_enqueue_script($this->plugin_name . 'rsm');
	}

	/**
	 * WordPress Options menu
	 *
	 * @since    1.0.0
	 */
	function rsm_options_menu()
	{
		add_menu_page(
			'Responsive Sliding Menu Options',
			'Responsive Sliding Menu',
			'manage_options',
			'rsm_options',
			array($this, 'rsm_options_options'),
			'dashicons-menu-alt',
			99
		);
	}

	/**
	 * Front menu page
	 *
	 * @since    1.0.0
	 */
	function rsm_options_options()
	{
		require  plugin_dir_path(dirname(__FILE__)) . 'admin/partials/responsive-sliding-menu-admin-display.php';
	}

	/**
	 * Settings link on plugins page
	 *
	 * @since    1.0.0
	 */
	function add_settings_url($links)
	{
		$settings_link = '<a href="admin.php?page=rsm_options">' . __("Settings", "responsive-sliding-menu") . '</a>';
		array_unshift($links, $settings_link);
		return $links;
	}

	/**
	 * Displays review notice
	 *
	 * @since    1.1.0
	 */
	function display_review_notice()
	{
		//creates option if not exists
		$option = 'rsm_activated_date';
		$date = date("Y-m-d");
		$activated_date = get_option($option);
		if (FALSE === $activated_date) {
			add_option($option, $date);
		}

		$datetime1 = date_create($activated_date);
		$datetime2 = date_create(date('Y-m-d'));

		$interval = date_diff($datetime1, $datetime2);

		$date_diff = $interval->format("%d");
		$cookie_hide_review = $_COOKIE['rsm_hide_review'];
		if ($date_diff >= 7 && !$cookie_hide_review) {
			//checks if option date is older than 7 days, then show the notice
			echo '<div class="notice notice-info" id="rsm_review_notice">';
			echo '<h5 style="padding-top:10px;font-size: 20px;margin: 10px 0;">' . __("It only takes 1 min", "responsive-sliding-menu") . '</h5>';
			echo '<p>';
			echo __("Wonderful! You have been using Responsive Sliding Menu for more than a week. <b>Help us</b> and tell us what you think", "responsive-sliding-menu");
			echo '</p>';
			echo '<p style="padding-bottom: 15px;">';
			echo '<a class="button button-primary" href="https://wordpress.org/support/plugin/responsive-sliding-menu/reviews/#new-post" target="_blank"> ' . __("Post a review", "responsive-sliding-menu") . '</a>';
			echo '<a class="button button-secondary rsm_hide_notice" data-duration="7" style="margin: 0 10px;"> ' . __("Maybe later", "responsive-sliding-menu") . '</a>';
			echo '<a href="" class="rsm_hide_notice" data-duration="60"> ' . __("Nope, I don't want to help :(", "responsive-sliding-menu") . '</a>';
			echo '</p>';
			echo '</div>';
		}
	}
}
