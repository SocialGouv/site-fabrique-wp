<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://lekcie.com/plugins-wordpress
 * @since      1.0.0
 *
 * @package    Responsive_Sliding_Menu
 * @subpackage Responsive_Sliding_Menu/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Responsive_Sliding_Menu
 * @subpackage Responsive_Sliding_Menu/public
 * @author     Lekcie <contact@lekcie.com>
 */
class Responsive_Sliding_Menu_Public
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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{
		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/responsive-sliding-menu-public.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{
		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/responsive-sliding-menu-public.js', array('jquery'), $this->version, false);
	}

	/**
	 * Shortcode : display the responsive slider menu
	 *
	 * @since    1.0.0
	 */
	function responsive_slider_menu($atts)
	{ 
		$rsm_chosen_menu = get_option('rsm_chosen_menu');
		$rsm_responsive_width = get_option('rsm_responsive_width');
		$rsm_main_menu_transform = get_option('rsm_main_menu_transform');
		$rsm_main_menu_size = get_option('rsm_main_menu_size');
		$rsm_main_menu_color = get_option('rsm_main_menu_color');
		$rsm_hover_menu_color = get_option('rsm_hover_menu_color');
		$rsm_burger_menu_size = get_option('rsm_burger_menu_size');
		$rsm_burger_menu_background = get_option('rsm_burger_menu_background');
		$rsm_main_burger_color = get_option('rsm_main_burger_color');
		$rsm_hover_burger_color = get_option('rsm_hover_burger_color');
		$rsm_burger_menu_color = get_option('rsm_burger_menu_color');
		$rsm_burger_icon = get_option('rsm_burger_icon');

		if ($rsm_chosen_menu) {
			$menu = wp_get_nav_menu_items($rsm_chosen_menu);
		} else {
			$menu = wp_get_nav_menu_items("Main menu");
		}

		if (!$rsm_responsive_width) $rsm_responsive_width = "992";
		if (!$rsm_main_menu_transform) $rsm_main_menu_transform = "uppercase";
		if (!$rsm_main_menu_size) $rsm_main_menu_size = "11";
		if (!$rsm_main_menu_color) $rsm_main_menu_color = "#4e4e4e";
		if (!$rsm_hover_menu_color) $rsm_hover_menu_color = "#aaa";
		if (!$rsm_burger_menu_size) $rsm_burger_menu_size = "25";
		if (!$rsm_burger_menu_background) $rsm_burger_menu_background = "#1a1919";
		if (!$rsm_main_burger_color) $rsm_main_burger_color = $rsm_main_menu_color;
		if (!$rsm_hover_burger_color) $rsm_hover_burger_color = $rsm_hover_menu_color;
		if (!$rsm_burger_menu_color) $rsm_burger_menu_color = $rsm_main_menu_color;
		if (!$rsm_burger_icon) $rsm_burger_icon = "dashicons dashicons-menu-alt3";

		$menu_name = $rsm_chosen_menu;
		$menu = wp_get_nav_menu_items($menu_name);
		$count = 0;

		$menu_list  = '<nav class="sliding-menu">';
		$menu_list .= '<span class="' . $rsm_burger_icon . ' rsm-burger"></span>';

		$menu_list .= '<span class="main-nav-container"><ul class="main-nav">';
		$submenu_html  = '';
		$title_parent = "";
		$link_parent = '';

		if ($menu) {
			foreach ($menu as $menu_item) {
				$submenu_html = '';
				$type = $menu_item->type;
				$link = $menu_item->url;
				$title = $menu_item->title;

				if (sizeof($menu) > ($count + 1)) {
					$next = $menu[$count + 1];
				}

				//Debut menu
				if ($menu_item->menu_item_parent == 0) {
					$parent = $menu_item;
					$title_parent = $title;
					$link_parent = $link;
					$menu_list .= '<li class="item">';
				}

				//si pas de sous-menu ni est categorie, next
				if ($menu_item->menu_item_parent == 0 && $next->menu_item_parent == 0 && $type != "taxonomy") {
					$menu_list .= '<a href="' . $link_parent . '"';
					$menu_list .= '>';
					$menu_list .= '<span class="title">';
					$menu_list .= $title_parent;
					$menu_list .= "</span>";
					$menu_list .= "</a>";
				}
				//sinon, si sous-menu et/ou si est categorie
				else {
					if ($menu_item->menu_item_parent == 0) {
						//debut du sous-menu
						$submenu_html .= '<div class="nav-desktop-layer">';
						$submenu_html .= '<div class="nav-overlay"></div>';
						$submenu_html .= '<div class="nav-first-layer">';
						$submenu_html .= '<ul class="sub-menu">';
						$submenu_html .= '<li class="item-child first">';
						$submenu_html .= '<a href="' . $parent->url . '">';
						$submenu_html .= __('Go to ', "responsive-sliding-menu") . $parent->title;
						$submenu_html .= '<i class="dashicons dashicons-arrow-right-alt"></i>';
						$submenu_html .= '</a>';
						$submenu_html .= '</li>';
						foreach ($menu as $menu_item_child) {
							$link_child = $menu_item_child->url;
							$title_child = $menu_item_child->title;
							if ($menu_item_child->menu_item_parent == $menu_item->ID) {
								$submenu_html .= '<li class="item-child">';
								$submenu_html .= '<span class="subtitle">';
								$submenu_html .=  $title_child;
								$submenu_html .=  '<span class="dashicons dashicons-arrow-right-alt2"></span>';
								$submenu_html .= '</span>';
								//ajout du sous-sous-menu
								$subsubmenu_html = '';
								$subsubmenu_html .= '<div class="nav-subsubmenu-desktop-layer">';
								$subsubmenu_html .= '<div class="nav-subsubmenu-first-layer">';
								$subsubmenu_html .= '<ul class="sub-menu">';
								$subsubmenu_html .= '<li class="item-subsubmenu-child first">';
								$subsubmenu_html .= '<a href="' . $link_child . '">';
								$subsubmenu_html .= __('Go to ', "responsive-sliding-menu") . $title_child;
								$subsubmenu_html .= '<i class="dashicons dashicons-arrow-right-alt"></i>';
								$subsubmenu_html .= '</a>';
								$subsubmenu_html .= '</li>';
								foreach ($menu as $menu_item_child_child) {
									if ($menu_item_child_child->menu_item_parent == $menu_item_child->ID) {
										$subsubmenu_url = $menu_item_child_child->url;
										$subsubmenu_title = $menu_item_child_child->title;
										$subsubmenu_html .= '<li class="item-subsubmenu-child">';
										$subsubmenu_html .= '<a href="' . $subsubmenu_url . '" class="title">' . $subsubmenu_title . '</a>';
										$subsubmenu_html .= '</li>';
									}
								}
								$subsubmenu_html .= '</ul>';
								$subsubmenu_html .= '<span class="icon icon-close close-subsubmenu"></span>';
								$subsubmenu_html .= '</div>';
								$subsubmenu_html .= '</div>';
								//fin sous-sous menu

								$submenu_html .= $subsubmenu_html;
								$submenu_html .= '</li>';
							}
						}
						//fin sous-menu
						$submenu_html .= '</ul>';
						$submenu_html .= '<span class="icon icon-close close-submenu"></span>';
						$submenu_html .= '<span class="bottom-overlay"></span>';
						$submenu_html .= '</div>';
						$submenu_html .= '</div>';

						$menu_list .= '<span class="title">';
						$menu_list .= $title_parent;
						if ($menu_item->menu_item_parent != 0 || $next->menu_item_parent != 0 || $type == "taxonomy") {
							$menu_list .= '<span class="dashicons dashicons-arrow-right-alt2"></span>';
						}
						$menu_list .= '</span>';
						$menu_list .= $submenu_html; //ajout du sous-menu
					}
				}

				//Fin menu
				if ($menu_item->menu_item_parent == 0) {
					$menu_list .= '</li>';
				}

				$count++;
			}
		} else {
			$menu_list .= '<li>' . __("Please select a menu in the Responsive Sliding Menu plugin settings area", "responsive-sliding-menu") . '</li>';
		}
		$menu_list .= '</ul>';
		$menu_list .= '<span class="icon icon-close close-menu"></span>';
		$menu_list .= '</span>';
		$menu_list .= '</nav>';

		$style = "<style>";
		$style .= ".main-nav li.item span.title {";
		$style .= "     text-transform:" . $rsm_main_menu_transform . ';';
		$style .= "     color:" . $rsm_main_menu_color . ';';
		$style .= "     font-size:" . $rsm_main_menu_size . 'px';
		$style .= "}";
		$style .= ".main-nav li.item span.title:hover {";
		$style .= "     color:" . $rsm_hover_menu_color;
		$style .= "}";
		$style .= "</style>";

		$responsive = "<style>";
		if ($rsm_responsive_width != "never") {
			if ($rsm_responsive_width != "always") {
				$responsive .= '@media only screen and (max-width: ' . $rsm_responsive_width . 'px) {';
			}
			$responsive .= '.sliding-menu .rsm-burger {
				display: inline-block;
				font-size: ' . $rsm_burger_menu_size . 'px;
				color: ' . $rsm_burger_menu_color . ';
			}
			.sliding-menu .main-nav-container {
				position: fixed;
				top: 0;
				background: ' . $rsm_burger_menu_background . ';
				height: 100%;
				padding: 70px 10px 10px 30px;
				transition: 0.5s all ease-in-out;
				left: -100%;
				width: 40%;
				visibility: hidden;
				opacity: 0;
				z-index: 9999;
				box-shadow: 0px 0 10px #d8d8d8;
			}
			.sliding-menu .main-nav-container.active {
				left: 0;
				visibility: visible;
				opacity: 1;
				padding-top: 95px;
			}
			.sliding-menu .main-nav {
				display: flex;
				flex-direction: column;
			}
			.nav-desktop-layer .nav-first-layer {
				width: 40%;
			}
			.nav-desktop-layer {
				z-index: 1007;
			}
			.main-nav li.item {
				margin-bottom: 15px;
			}
			.sliding-menu .icon.icon-close.close-menu {
				visibility: visible;
				opacity: 1;
				z-index: 1006;
			}
			.nav-desktop-layer .nav-overlay {
				width: 250%;
			}
			.main-nav li.item span.title {
				color : ' . $rsm_main_burger_color . ';
			}
			.main-nav li.item span.title:hover {
				color : ' . $rsm_hover_burger_color . ';
			}';

			if ($rsm_responsive_width != "always") {
				$responsive .= '}';
			}
		}

		$responsive .= '@media only screen and (max-width: 600px) {
			.sliding-menu .main-nav-container {
				width: 60%;
			}
			.nav-desktop-layer .nav-first-layer {
				width: 80%;
			}
		}';

		$responsive .= "</style>";

		$menu_list .= $style . $responsive;

		return $menu_list;
	}

	// renvoie le html du contenu du menu
	function get_submenu_content($term_children, $parent_id, $is_parent = false)
	{
		$submenu_html = "";
		if ($term_children) {
			foreach ($term_children as $child) {
				$term_meta = get_term_by("term_taxonomy_id", $child);
				//echo "$parent_id == $term_meta->parent<br>"; 
				//debut sous-menu
				if ($parent_id == $term_meta->parent) {
					$submenu_html .= '<li class="item-child ' . ($is_parent ? 'parent' : '') . '">';
					$submenu_html .= '<span class="subtitle">' . $term_meta->name . '</span>';

					//debut sous-sous menu
					$submenu_url = get_category_link($child);
					$submenu_html .= '<div class="nav-subsubmenu-desktop-layer">';
					$submenu_html .= '<div class="nav-subsubmenu-first-layer">';
					$submenu_html .= '<ul class="sub-menu">';
					$submenu_html .= '<li class="item-subsubmenu-child first">';
					$submenu_html .= '<a href="' . $submenu_url . '">';
					$submenu_html .= __('All ', "responsive-sliding-menu") . $term_meta->name;
					$submenu_html .= '<i class="dashicons dashicons-arrow-right-alt"></i>';
					$submenu_html .= '</a>';
					$submenu_html .= '</li>';

					//recuperation des petits enfants
					$term_child_object = get_term($child);
					$term_child_tax = $term_child_object->taxonomy;
					$term_child_children = get_term_children($child, $term_child_tax);

					if ($term_child_children) {
						foreach ($term_child_children as $term_child_child) {
							$term_child_meta = get_term_by("term_taxonomy_id", $term_child_child);
							$subsubmenu_url = get_category_link($term_child_child);
							$submenu_html .= '<li class="item-subsubmenu-child">';
							$submenu_html .= '<a href="' . $subsubmenu_url . '" class="title">' . $term_child_meta->name . '</a>';
							$submenu_html .= '</li>';
						}
					}
					//fin sous-sous menu
					$submenu_html .= '</ul>';
					$submenu_html .= '<span class="icon icon-close close-subsubmenu"></span>';
					$submenu_html .= '</div>';
					$submenu_html .= '</div>';

					//$submenu_html .= '</span>';

					//fin sous-menu
					$submenu_html .= '</li>';
				}
			}
		}
		return $submenu_html;
	}

	/**
	 * allows to load dashicon
	 *
	 * @since    1.3.2
	 */
	function ww_load_dashicons()
	{
		wp_enqueue_style('dashicons');
	}

}
