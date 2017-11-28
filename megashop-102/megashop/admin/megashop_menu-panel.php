<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
 
add_action('admin_menu', 'megashop_register_theme_menu_page');
add_action('admin_menu', 'megashop_sub_menu');

function megashop_register_theme_menu_page() {
    add_menu_page(esc_html__('About megashop', 'megashop'), esc_html__('megashop', 'megashop'), 'manage_options', 'megashop', 'welcome_megashop', get_template_directory_uri() . '/admin/images/tt_icon_menu.png', 2);
}
function megashop_sub_menu() {
     if (in_array('TTAutoInstall/auto_install.php', apply_filters('active_plugins', get_option('active_plugins')))) { 
    add_submenu_page('megashop', esc_html__('Install Demos', 'megashop'), esc_html__('Install Demos', 'megashop'), 'manage_options', 'install_demos_submenu', 'install_demos_megashop');  
     }
    add_submenu_page('megashop', esc_html__('Shortcode', 'megashop'), esc_html__('Shortcode', 'megashop'), 'manage_options', 'shortcode_submenu', 'shortcode_megashop');
    add_submenu_page('megashop', esc_html__('Support', 'megashop'), esc_html__('Support', 'megashop'), 'manage_options', 'support_megashop_submenu', 'support_megashop');
    global $submenu;  // this is a global from WordPress
    $submenu['megashop'][0][0] = esc_html__('About megashop', 'megashop');
}
function welcome_megashop() {
    get_template_part('admin/megashop_menu/megashop', 'welcome');
}

function install_demos_megashop() {
    get_template_part('admin/megashop_menu/megashop', 'install_demos');
}

function activate_submenu() {
    get_template_part('admin/megashop_menu/megashop', 'activate');
}

function shortcode_megashop() {
    get_template_part('admin/megashop_menu/megashop', 'shortcode');
}

function support_megashop() {
    get_template_part('admin/megashop_menu/megashop', 'support');
}
?>