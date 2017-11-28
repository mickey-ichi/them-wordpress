<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $submenu;

if (isset($submenu['megashop'])) {
    $menu_items = $submenu['megashop'];
}

if (is_array($menu_items)) {
   settings_errors(); ?>
    <div class="wrap about-wrap mega_menu_wrap">
         
                <h1><?php _e('Welcome to megashop Theme', 'megashop'); ?></h1>
<div class="theme_content">
                <div class="about-text"><?php esc_html_e('Thank you for activation! megashop Theme makes it even easier to format your content and customize your site.', 'megashop'); ?></div>

        <?php $megashop_theme = wp_get_theme();  ?>

        <div class="wp-badge" style="padding-top:0;background: url(http://www.templatetrip.com/images/logo.png) no-repeat scroll 100% center / 100% auto rgba(0, 0, 0, 0) ;box-shadow: none;color: #32373c;"><?php printf(__('Version %s', 'megashop'), $megashop_theme->get('Version')); ?></div>
</div>
        <h2 class="nav-tab-wrapper">
            <?php
            foreach ($menu_items as $menu_item) {
                ?>
                <a href="?page=<?php echo esc_attr($menu_item[2]) ?>" class="nav-tab <?php
                   if (isset($_GET['page']) and $_GET['page'] == $menu_item[2]) {
                       echo 'nav-tab-active';
                   }
                   ?>"><?php echo esc_attr($menu_item[0]) ?></a>
                   <?php
               }
               ?>
        </h2>
        <?php
    }