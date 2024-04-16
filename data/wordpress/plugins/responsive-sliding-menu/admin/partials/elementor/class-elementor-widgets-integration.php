<?php
/**
 * Elementor Widget RSM
 *
 * Elementor widget that inserts RSMenu
 *
 * @since 1.4.0
 */
class Elementor_Widgets_Integration extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve oEmbed widget name.
     *
     * @since 1.4.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'rsm-menu';
    }

    /**
     * Get widget title.
     *
     * Retrieve oEmbed widget title.
     *
     * @since 1.4.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return sprintf(__('%s Menu', 'responsive-sliding-menu'), '<strong>RSM > </strong>');
    }

    /**
     * Get widget icon.
     *
     * Retrieve oEmbed widget icon.
     *
     * @since 1.4.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-menu-bar';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
     *
     * @since 1.4.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['general'];
    }

    /**
     * Register oEmbed widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.4.0
     * @access protected
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Enable/disable', 'responsive-sliding-menu'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_responsive_control(
            'rsm_widget',
            [
                'label'        => __('Enable?', 'responsive-sliding-menu'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'options'      => [
                    'yes' => __('Yes', 'responsive-sliding-menu'),
                    'no'  => __('No', 'responsive-sliding-menu'),
                ],
                'label_on'     => __('Yes', 'responsive-sliding-menu'),
                'label_off'    => __('No', 'responsive-sliding-menu'),
                'default'      => 'no',
                'return_value' => 'yes',
                'desktop_default' => 'yes',
                'tablet_default' => 'yes',
                'mobile_default' => 'yes',
                'description'  => sprintf(__('Toggle this option if you want to enable or disable the Responsive Sliding Menu. You can edit settings in WordPress > %s Responsive Sliding menu %s', 'responsive-sliding-menu'), '<a href="' . get_admin_url() . 'admin.php?page=rsm_options" target="_blank">', '</a>'),
                'devices' => ['desktop', 'tablet', 'mobile'],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render RSM widget output on the frontend.
     *
     * @since 1.4.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $rsm_widget = $settings['rsm_widget'];
        $rsm_widget_tablet = $settings['rsm_widget_tablet'];
        $rsm_widget_mobile = $settings['rsm_widget_mobile'];

        $breakpoints = \Elementor\Plugin::$instance->breakpoints->get_breakpoints();
        $br_mobile = $breakpoints['mobile']->get_value();
        $br_tablet = $breakpoints['tablet']->get_value();
        $br_laptop = $breakpoints['laptop']->get_value();
        $br_widescreen = $breakpoints['widescreen']->get_value();
        if ($rsm_widget || $rsm_widget_tablet || $rsm_widget_mobile) {
            echo '<div class="rsm-elementor-widget">';
            echo do_shortcode('[responsive_slider_menu]');
            echo '</div>';
?>
            <style>
                @media only screen and (min-width: <?php echo $br_widescreen; ?>px) {
                    .rsm-elementor-widget {
                        display: <?php echo ($rsm_widget ? "block" : "none"); ?>;
                    }
                }

                @media only screen and (max-width: <?php echo $br_laptop; ?>px) {
                    .rsm-elementor-widget {
                        display: <?php echo ($rsm_widget ? "block" : "none"); ?>;
                    }
                }

                @media only screen and (max-width: <?php echo $br_tablet; ?>px) {
                    .rsm-elementor-widget {
                        display: <?php echo ($rsm_widget_tablet ? "block" : "none"); ?>;
                    }
                }

                @media only screen and (max-width: <?php echo $br_mobile; ?>px) {
                    .rsm-elementor-widget {
                        display: <?php echo ($rsm_widget_mobile ? "block" : "none"); ?>;
                    }
                }
            </style>
<?php
        } else {
            // If in edit mode
            if (\Elementor\Plugin::$instance->editor->is_edit_mode()) {
                echo '<em>' . __('This widget is not enabled.', 'responsive-sliding-menu') . '</em>';
            }
        }
    }
}
