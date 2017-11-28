<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_template_part('admin/megashop_menu/megashop', 'menu_header');
$megashop_theme = wp_get_theme();
?>

<div class="point-releases">
    <h3><?php esc_html_e('Megashop Theme', 'megashop'); ?></h3> 
    <p><strong><?php esc_html_e('Megashop WooCommerce Multipurpose Responsive Theme', 'megashop'); ?></strong> <?php esc_html_e("is specialized for Mega Stores, Layout, Electronics, Fashion, Auto, automotive, tools, parts, Furniture, art, home, decor, crafts, Gift, Flowers, Organic, Grocery, Wine, bakery, food, gusto, drinks, mega, lingerie, Beauty, cosmetics, Jewelry, accessories, cloths, Blog, accessories, minimal and multipurpose store. Mega Shop Layouts are looking good with its colors combination and included 8+ different Layouts. It is very clean and looks professional, For any technical queries please feel free to contact us at", "megashop"); ?> <a href="<?php echo esc_url('http://support.templatetrip.com/'); ?>" target="_blank">http://support.templatetrip.com</a><br><br><?php esc_html_e('Enjoy it', 'megashop'); ?>! :)<br>
    </p>
</div>

<div class="theme_info">
    <div class="theme_info_column clearfix">
        <div class="theme_info_left">
            <div class="theme_link">
                <h3><?php esc_html_e('Theme Options', 'megashop'); ?></h3>
                <p class="about"><?php printf(esc_html__('%s provides own theme option panel. Click on "Theme Options" to start your customization.', 'megashop'), $megashop_theme->get('Name')); ?>>[<?php esc_html_e('No Need To Code For It!', 'megashop'); ?>]</p>
                <p>
                    <a href="<?php echo admin_url('admin.php?page=options-framework'); ?>" class="button button-primary"><?php esc_html_e('Theme Options', 'megashop'); ?></a>
                </p>
            </div>
            <div class="theme_link">
                <h3><?php esc_html_e('Theme Documentation', 'megashop'); ?></h3>
                <p class="about"><?php printf(esc_html__('Need any help to setup and configure %s? Please have a look at our documentations instructions,', 'megashop'), $megashop_theme->get('Name')); ?><br><?php esc_html_e("It includes with Theme-Package > Documentation.zip",'megashop'); ?></p>
            </div>
            <div class="theme_link">
                <h3><?php esc_html_e('Having Trouble, Need Support?', 'megashop'); ?></h3>
                <p class="about"><?php printf(esc_html__('Support for %s WooCommerce Responsive Theme is conducted through TemplateTrip own support forum.', 'megashop'), $megashop_theme->get('Name')); ?></p>

                <p>
                    <a href="<?php echo esc_url('http://support.templatetrip.com/'); ?>" target="_blank" class="button button-secondary"><?php echo sprintf(esc_html('Generate Ticket Here', 'megashop')); ?></a>
                </p>
            </div>
        </div>

        <div class="theme_info_right">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/screenshot.png'); ?>" alt="<?php esc_attr_e('Theme Screenshot', 'megashop') ?>" />
        </div>
    </div>
</div>


<div class="changelog">
    <div class="return-to-dashboard">
        <a href="<?php echo esc_url(self_admin_url('themes.php')); ?>"><?php is_blog_admin() ? esc_html_e('Back to Themes', 'megashop') : esc_html_e('Back to Themes', 'megashop'); ?></a>
    </div>
</div>
</div>
