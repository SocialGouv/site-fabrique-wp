<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://lekcie.com/plugins-wordpress
 * @since      1.0.0
 *
 * @package    Responsive_Sliding_Menu
 * @subpackage Responsive_Sliding_Menu/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <div class="fixed-head copy-to-clipboard">
        <h4><?php echo __("Click to copy shortcode", "responsive-sliding-menu"); ?></h4>
        <code class="copy-clipboard-btn" title="<?php echo __("Click to copy shortcode", "responsive-sliding-menu"); ?>">
            <span class="element-to-copy">[responsive_slider_menu]</span>
            <span class="dashicons dashicons-admin-page"></span>
        </code>
        <span class="response"></span>
    </div>
    <h1 class="rsm-page-title"><?php echo esc_html(get_admin_page_title()); ?></h1>
    <?php
    if ($_POST && wp_verify_nonce($_POST['sec_field'], 'sec_action')) {
        $rsm_chosen_menu = isset($_POST['rsm_chosen_menu']) ? sanitize_text_field($_POST['rsm_chosen_menu']) : null;
        $rsm_responsive_width = isset($_POST['rsm_responsive_width']) ? sanitize_text_field($_POST['rsm_responsive_width']) : null;
        $rsm_main_menu_transform = isset($_POST['rsm_main_menu_transform']) ? sanitize_text_field($_POST['rsm_main_menu_transform']) : null;
        $rsm_main_menu_size = isset($_POST['rsm_main_menu_size']) ? sanitize_text_field($_POST['rsm_main_menu_size']) : null;
        $rsm_main_menu_color = isset($_POST['rsm_main_menu_color']) ? sanitize_text_field($_POST['rsm_main_menu_color']) : null;
        $rsm_hover_menu_color = isset($_POST['rsm_hover_menu_color']) ? sanitize_text_field($_POST['rsm_hover_menu_color']) : null;
        $rsm_burger_menu_size = isset($_POST['rsm_burger_menu_size']) ? sanitize_text_field($_POST['rsm_burger_menu_size']) : null;
        $rsm_burger_menu_background = isset($_POST['rsm_burger_menu_background']) ? sanitize_text_field($_POST['rsm_burger_menu_background']) : null;
        $rsm_main_burger_color = isset($_POST['rsm_main_burger_color']) ? sanitize_text_field($_POST['rsm_main_burger_color']) : null;
        $rsm_hover_burger_color = isset($_POST['rsm_hover_burger_color']) ? sanitize_text_field($_POST['rsm_hover_burger_color']) : null;
        $rsm_burger_menu_color = isset($_POST['rsm_burger_menu_color']) ? sanitize_text_field($_POST['rsm_burger_menu_color']) : null;
        $rsm_burger_icon = isset($_POST['rsm_burger_icon']) ? sanitize_text_field($_POST['rsm_burger_icon']) : null;

        if ($rsm_chosen_menu) {
            $reponse_cookie = false;
            if (!get_option('rsm_chosen_menu')) {
                $reponse_cookie = add_option('rsm_chosen_menu', $rsm_chosen_menu);
            } else {
                $reponse_cookie = update_option('rsm_chosen_menu', $rsm_chosen_menu);
            }
        }
        if ($rsm_responsive_width) {
            if (!get_option('rsm_responsive_width')) {
                add_option('rsm_responsive_width', $rsm_responsive_width);
            } else {
                update_option('rsm_responsive_width', $rsm_responsive_width);
            }
        }
        if ($rsm_main_menu_transform) {
            if (!get_option('rsm_main_menu_transform')) {
                add_option('rsm_main_menu_transform', $rsm_main_menu_transform);
            } else {
                update_option('rsm_main_menu_transform', $rsm_main_menu_transform);
            }
        }
        if ($rsm_main_menu_size) {
            if (!get_option('rsm_main_menu_size')) {
                add_option('rsm_main_menu_size', $rsm_main_menu_size);
            } else {
                update_option('rsm_main_menu_size', $rsm_main_menu_size);
            }
        }
        if ($rsm_main_menu_color) {
            if (!get_option('rsm_main_menu_color')) {
                add_option('rsm_main_menu_color', $rsm_main_menu_color);
            } else {
                update_option('rsm_main_menu_color', $rsm_main_menu_color);
            }
        }
        if ($rsm_hover_menu_color) {
            if (!get_option('rsm_hover_menu_color')) {
                add_option('rsm_hover_menu_color', $rsm_hover_menu_color);
            } else {
                update_option('rsm_hover_menu_color', $rsm_hover_menu_color);
            }
        }
        if ($rsm_burger_menu_size) {
            if (!get_option('rsm_burger_menu_size')) {
                add_option('rsm_burger_menu_size', $rsm_burger_menu_size);
            } else {
                update_option('rsm_burger_menu_size', $rsm_burger_menu_size);
            }
        }
        if ($rsm_burger_menu_background) {
            if (!get_option('rsm_burger_menu_background')) {
                add_option('rsm_burger_menu_background', $rsm_burger_menu_background);
            } else {
                update_option('rsm_burger_menu_background', $rsm_burger_menu_background);
            }
        }
        if ($rsm_main_burger_color) {
            if (!get_option('rsm_main_burger_color')) {
                add_option('rsm_main_burger_color', $rsm_main_burger_color);
            } else {
                update_option('rsm_main_burger_color', $rsm_main_burger_color);
            }
        }
        if ($rsm_hover_burger_color) {
            if (!get_option('rsm_hover_burger_color')) {
                add_option('rsm_hover_burger_color', $rsm_hover_burger_color);
            } else {
                update_option('rsm_hover_burger_color', $rsm_hover_burger_color);
            }
        }
        if ($rsm_burger_menu_color) {
            if (!get_option('rsm_burger_menu_color')) {
                add_option('rsm_burger_menu_color', $rsm_burger_menu_color);
            } else {
                update_option('rsm_burger_menu_color', $rsm_burger_menu_color);
            }
        }
        if ($rsm_burger_icon) {
            if (!get_option('rsm_burger_icon')) {
                add_option('rsm_burger_icon', $rsm_burger_icon);
            } else {
                update_option('rsm_burger_icon', $rsm_burger_icon);
            }
        }
    ?>
        <div class="notice notice-success is-dismissible">
            <p><?php echo  __("Update successful", 'responsive-sliding-menu'); ?></p>
        </div>
    <?php }
    $rsm_chosen_menu = get_option('rsm_chosen_menu');
    $rsm_responsive_width = get_option('rsm_responsive_width');
    $rsm_burger_icon = get_option('rsm_burger_icon');
    if (!$rsm_burger_icon) $rsm_burger_icon = "dashicons dashicons-menu-alt3";
    ?>
    <div class="content">
        <form method="POST" action="#">
            <?php wp_nonce_field('sec_action', 'sec_field'); ?>
            <?php
            submit_button();
            $menus = wp_get_nav_menus(); ?>
            <div class="rsm-row">
                <div class="rsm-col">
                    <label for="rsm_chosen_menu">
                        <?php echo __("Choose menu", "responsive-sliding-menu"); ?>
                    </label>
                </div>
                <div class="rsm-col">
                    <select name="rsm_chosen_menu" class="rsm-select <?php echo (!$rsm_chosen_menu ? "border-red" : ''); ?>">
                        <?php if (!$rsm_chosen_menu) { ?>
                            <option value="0" selected disabled><?php echo __("Choose a menu", "responsive-sliding-menu") ?></option>
                        <?php } ?>
                        <?php foreach ($menus as $menu) {
                            if ($menu->term_id == $rsm_chosen_menu) {
                                echo '<option value="' . $menu->term_id . '" selected>' . $menu->name . '</option>';
                            } else echo '<option value="' . $menu->term_id . '">' . $menu->name . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="rsm-row">
                <div class="rsm-col">
                    <label for="rsm_responsive_width">
                        <?php echo __("Mobile menu", "responsive-sliding-menu"); ?>
                    </label>
                    <span class="subtitles">
                        <?php echo __("Size screen from which the mobile menu is showed", "responsive-sliding-menu"); ?>
                        <br>
                        <?php echo __("< 992px recommanded", "responsive-sliding-menu"); ?>
                    </span>
                </div>
                <div class="rsm-col">
                    <select name="rsm_responsive_width" class="rsm-select <?php echo (!$rsm_chosen_menu ? "border-red" : ''); ?>">
                        <option value="always" <?php echo ((!$rsm_responsive_width || $rsm_responsive_width == "always") ? "selected" : ""); ?>><?php echo __("Always", "responsive-sliding-menu") ?></option>
                        <option value="992" <?php echo ((!$rsm_responsive_width || $rsm_responsive_width == "992") ? "selected" : ""); ?>><?php echo __("< 992px", "responsive-sliding-menu") ?></option>
                        <option value="768" <?php echo ($rsm_responsive_width == "768" ? "selected" : ""); ?>><?php echo __("< 768px", "responsive-sliding-menu") ?></option>
                        <option value="600" <?php echo ($rsm_responsive_width == "600" ? "selected" : ""); ?>><?php echo __("< 600px", "responsive-sliding-menu") ?></option>
                        <option value="never" <?php echo ($rsm_responsive_width == "never" ? "selected" : ""); ?>><?php echo __("Never", "responsive-sliding-menu") ?></option>
                    </select>
                </div>
            </div>
            <div class="rsm-row">
                <div class="rsm-col">
                    <label for="rsm_burger_icon">
                        <?php echo __("Mobile menu icon", "responsive-sliding-menu"); ?>
                    </label>
                    <span class="subtitles">
                        <?php echo __("The chosen icon will not be displayed in the preview mode. It will still appear on your site.", "responsive-sliding-menu"); ?>
                    </span>
                </div>
                <div class="rsm-col flex">
                    <label class="rsm-radio">
                        <span class="dashicons dashicons-menu-alt3"></span>
                        <input type="radio" name="rsm_burger_icon" value="dashicons dashicons-menu-alt3" <?php echo ($rsm_burger_icon == "dashicons dashicons-menu-alt3" ? "checked" : "") ?>>
                    </label>
                    <label class="rsm-radio">
                        <span class="dashicons dashicons-menu-alt"></span>
                        <input type="radio" name="rsm_burger_icon" value="dashicons dashicons-menu-alt" <?php echo ($rsm_burger_icon == "dashicons dashicons-menu-alt" ? "checked" : "") ?>>
                    </label>
                    <label class="rsm-radio">
                        <span class="dashicons dashicons-ellipsis"></span>
                        <input type="radio" name="rsm_burger_icon" value="dashicons dashicons-ellipsis" <?php echo ($rsm_burger_icon == "dashicons dashicons-ellipsis" ? "checked" : "") ?>>
                    </label>
                </div>
            </div>

            <div class="menu-preview">
                <h3><?php echo __("Menu Preview", "responsive-sliding-menu"); ?></h3>
                <div class="content-head">
                    <?php echo __("Click on ", "responsive-sliding-menu"); ?>
                    <span class="dashicons dashicons-edit"></span>
                    <?php echo __(" to edit the menu parts", "responsive-sliding-menu"); ?>
                </div>
                <div class="menu-preview-window-core">
                    <div class="menu-preview-window-browser">
                        <div class="browser-tabs">
                            <div class="browser-tab active"><?php echo get_bloginfo('name'); ?></div>
                            <div class="browser-tab"><?php echo __("Other website", "responsive-sliding-menu"); ?></div>
                        </div>
                        <div class="browser-url">
                            <div class="browser-search-url">
                                <i class="dashicons dashicons-lock"></i>
                                <?php echo get_home_url(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="menu-preview-window">
                        <div class="menu-preview-window-head">
                            <?php
                            echo get_custom_logo();
                            echo responsive_slider_menu_preview(); ?>
                            <span class="dashicons dashicons-edit absolute top-right" data-target-hover=".menu-preview-window-head" data-target-dark="false">
                                <div class="edit-menu bottom-right">
                                    <label for="rsm-color-menu"><?php echo __("Choose the menu background color", "responsive-sliding-menu"); ?></label>
                                    <input type="text" class="color-field" name="rsm-color-menu" data-target=".menu-preview-window-head" data-type="background-color" data-is-hover="false">
                                    <span class="subtitles"><?php echo __("This option is only demonstrative. This will not change the background of your site's menu.", "responsive-sliding-menu"); ?></span>
                                </div>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="fixed-head copy-to-clipboard footer">
            <h4><?php echo __("Click to copy shortcode", "responsive-sliding-menu"); ?></h4>
            <code class="copy-clipboard-btn" title="<?php echo __("Click to copy shortcode", "responsive-sliding-menu"); ?>">
                <span class="element-to-copy">[responsive_slider_menu]</span>
                <span class="dashicons dashicons-admin-page"></span>
            </code>
            <span class="response"></span>
        </div>
    </div>
</div>

<?php
function responsive_slider_menu_preview()
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
    $rsm_burger_icon = str_replace(" ", "-", get_option('rsm_burger_icon'));

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
    if (!$rsm_burger_icon) $rsm_burger_icon = "fas-fa-bar";

    $menu_name = $rsm_chosen_menu;
    $menu = wp_get_nav_menu_items($menu_name);
    $count = 0;

    $menu_list = '<nav class="sliding-menu" data-background="transparent">';
    $menu_list .= '<i class="dashicons dashicons-menu-alt rsm-burger"></i>';
    $menu_list .= '<span class="iconify" data-icon="dashicons:ellipsis" data-inline="false"></span> ';
    $menu_list .= '<span class="main-nav-container"><ul class="main-nav">';

    $submenu_html  = '';
    $title_parent = "";
    $link_parent = '';

    if ($menu) {
        foreach ($menu as $menu_item) {
            $submenu_html = '';
            $link = $menu_item->url;
            $title = $menu_item->title;

            //Debut menu
            if ($menu_item->menu_item_parent == 0) {
                $parent = $menu_item;
                $title_parent = $title;
                $link_parent = $link;
                $menu_list .= '<li class="item">';
            }

            //si pas de sous-menu, next
            if (count($menu) > $count + 1)
                $next = $menu[$count + 1];
            if ($menu_item->menu_item_parent == 0 && $next->menu_item_parent == 0) {
                $menu_list .= '<a href="' . $link_parent . '" target="_blank">';
                $menu_list .= '<span class="title">';
                $menu_list .= $title_parent;
                $menu_list .= "</span>";
                $menu_list .= "</a>";
            }
            //sinon, si sous-menu
            else {
                if ($menu_item->menu_item_parent == 0) {
                    //debut du sous-menu
                    $submenu_html .= '<div class="nav-desktop-layer">';
                    $submenu_html .= '<div class="nav-overlay"></div>';
                    $submenu_html .= '<div class="nav-first-layer" data-background-color="#1a1919">';
                    $submenu_html .= '<ul class="sub-menu">';
                    $submenu_html .= '<li class="item-child first">';
                    $submenu_html .= '<a href="' . $parent->url . '">';
                    $submenu_html .= __('Go to ', "responsive-sliding-menu") . $parent->title;
                    $submenu_html .= '<i class="dashicons dashicons-arrow-right-alt"></i>';
                    $submenu_html .= '</a>';
                    $submenu_html .= '</li>';

                    //on ajoute les items au sous-menu
                    foreach ($menu as $menu_item_child) {
                        if ($menu_item_child->menu_item_parent == $menu_item->ID) {
                            $link_child = $menu_item_child->url;
                            $title_child = $menu_item_child->title;
                            $submenu_html .= '<li class="item-child">';
                            $submenu_html .= '<span class="subtitle">';
                            $submenu_html .=  $title_child;
                            $submenu_html .= '</span>';

                            //ajout du sous-sous-menu
                            $subsubmenu_html = '';
                            $subsubmenu_html .= '<div class="nav-subsubmenu-desktop-layer">';
                            $subsubmenu_html .= '<div class="nav-subsubmenu-first-layer">';
                            $subsubmenu_html .= '<ul class="sub-menu">';
                            $subsubmenu_html .= '<li class="item-subsubmenu-child first">';
                            $subsubmenu_html .= '<a href="' . $link_child . '">';
                            $subsubmenu_html .= __('See ') . $title_child;
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
                    $submenu_html .= '</div>';
                    $submenu_html .= '</div>';

                    $menu_list .= '<span class="title">';
                    $menu_list .= $title_parent;
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
        $menu_list .= '<li>' . __("Please choose a menu", "responsive-sliding-menu") . '</li>';
    }
    $menu_list .= '</ul>';
    $menu_list .= '<span class="icon icon-close close-menu"></span>';
    $menu_list .= '</span>';
    $edit_button = "";
    $edit_button .= '<span class="dashicons dashicons-edit" data-target-hover=".sliding-menu">';
    $edit_button .= '<div class="edit-menu">';
    $edit_button .= '     <label for="rsm_main_menu_transform">' . __("Text Transform", "responsive-sliding-menu") . '</label>';
    $edit_button .= '     <select name="rsm_main_menu_transform" class="change-select" data-target=".main-nav li.item span.title" data-type="text-transform">';
    $edit_button .= '         <option value="capitalize" ' . ($rsm_main_menu_transform == 'capitalize' ? 'selected' : '') . '>capitalize</option>';
    $edit_button .= '         <option value="inherit" ' . ($rsm_main_menu_transform == 'inherit' ? 'selected' : '') . '>inherit</option>';
    $edit_button .= '         <option value="initial" ' . ($rsm_main_menu_transform == 'initial' ? 'selected' : '') . '>initial</option>';
    $edit_button .= '         <option value="lowercase" ' . ($rsm_main_menu_transform == 'lowercase' ? 'selected' : '') . '>lowercase</option>';
    $edit_button .= '         <option value="uppercase" ' . ($rsm_main_menu_transform == 'uppercase' ? 'selected' : '') . '>uppercase</option>';
    $edit_button .= '     </select>';
    $edit_button .= '     <label for="rsm_main_menu_size">' . __("Text size", "responsive-sliding-menu") . '</label>';
    $edit_button .= '     <input type="number" class="size-field" min="0" name="rsm_main_menu_size" data-target=".main-nav li.item span.title" data-type="font-size" data-suffix="px" value="' . $rsm_main_menu_size . '">';
    $edit_button .= '     <label for="rsm_main_menu_color">' . __("Main color", "responsive-sliding-menu") . '</label>';
    $edit_button .= '     <input type="text" class="color-field" name="rsm_main_menu_color" data-target=".main-nav li.item span.title" data-type="color" data-is-hover="false" value="' . $rsm_main_menu_color . '">';
    $edit_button .= '     <label for="rsm_hover_menu_color">' . __("Hover color", "responsive-sliding-menu") . '</label>';
    $edit_button .= '     <input type="text" class="color-field" name="rsm_hover_menu_color" data-target=".main-nav li.item span.title" data-type="color" data-is-hover="true" value="' . $rsm_hover_menu_color . '">';
    $edit_button .= '     <h4>' . __("Mobile Menu", "responsive-sliding-menu") . '</h4>';
    $edit_button .= '     <label for="rsm_burger_menu_size">' . __("Burger menu size", "responsive-sliding-menu") . '</label>';
    $edit_button .= '     <input type="number" class="size-field" min="0" name="rsm_burger_menu_size" data-target=".sliding-menu .rsm-burger" data-type="font-size" data-suffix="px" value="' . $rsm_burger_menu_size . '">';
    $edit_button .= '     <label for="rsm_burger_menu_color">' . __("Burger menu color", "responsive-sliding-menu") . '</label>';
    $edit_button .= '     <input type="text" class="color-field" name="rsm_burger_menu_color" data-target=".sliding-menu .rsm-burger" data-type="color" data-is-hover="false" value="' . $rsm_burger_menu_color . '">';
    $edit_button .= '     <label for="rsm_burger_menu_background">' . __("Background color", "responsive-sliding-menu") . '</label>';
    $edit_button .= '     <input type="text" class="color-field" name="rsm_burger_menu_background" data-target=".sliding-menu .main-nav-container" data-type="background-color" data-is-hover="false" value="' . $rsm_burger_menu_background . '">';
    $edit_button .= '     <label for="rsm_main_burger_color">' . __("Text color", "responsive-sliding-menu") . '</label>';
    $edit_button .= '     <input type="text" class="color-field" name="rsm_main_burger_color" data-target=".main-nav li.item span.title" data-type="color" data-is-hover="false" value="' . $rsm_main_burger_color . '">';
    $edit_button .= '     <label for="rsm_hover_burger_color">' . __("Text hover color", "responsive-sliding-menu") . '</label>';
    $edit_button .= '     <input type="text" class="color-field" name="rsm_hover_burger_color" data-target=".main-nav li.item span.title" data-type="color" data-is-hover="true" value="' . $rsm_hover_burger_color . '">';
    $edit_button .= '</div>';
    $edit_button .= '</span>';

    $submenu_html .= $edit_button;

    $menu_list .= $edit_button;
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
                position: absolute;
                top: 0;
                background: ' . $rsm_burger_menu_background . ';
                height: 100%;
                padding: 70px 10px 10px 30px;
                transition: 0.5s all ease-in-out;
                left: -100%;
                max-height: calc(70vh - 80px);
                width: calc(40% - 40px);
                visibility: hidden;
                opacity: 0;
            }
            .sliding-menu .main-nav-container.active {
                left: 0;
                visibility: visible;
                opacity: 1;
            }
            .sliding-menu .main-nav {
                display: flex;
                flex-direction: column;
            }
            .nav-desktop-layer .nav-first-layer {
                width: 100%;
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
            width: 120%;
        }
    }';
    $responsive .= "</style>";

    $menu_list .= $style . $responsive;

    return $menu_list;
}
// renvoie le html du contenu du menu categorie
function get_category_submenu_content($term_children, $parent_id, $is_parent = false)
{
    $submenu_html = "";
    if ($term_children) {
        foreach ($term_children as $child) {
            $term_meta = get_term_by("term_taxonomy_id", $child);
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

?>