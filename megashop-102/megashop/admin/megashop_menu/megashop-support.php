<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_template_part('admin/megashop_menu/megashop', 'menu_header');
$megashop_theme = wp_get_theme();
?>
<div class="ttsupport">
    <h2><?php esc_html_e('Megashop Support', 'megashop'); ?></h2>
    <p class="about"><?php printf(esc_html__("We know what it's like to need support. This is the reason why our customers are the top priority and we treat every issue with seriousness. The team is working hard to help every customer, to keep the theme's documentation up to date, to produce video tutorials and to develop new ways to make everything easier.", "megashop"), $megashop_theme->get('Name')); ?></p>
    <p class="about"><?php printf(esc_html__('You can count on us, we are here for you!', 'megashop'), $megashop_theme->get('Name')); ?></p>
</div>

<div class="three-col">
    <div class="col support">
        <h3><?php esc_html_e('Need Help?', 'megashop'); ?></h3>
        <p><?php esc_html_e("We provide 24/7 outstanding support - dedicated and friendly help. We have an amazing team to provide outstanding support at any time. Do not hesitate to contact us for support.", "megashop") ?></p>
        <p>
            <a href="<?php echo esc_url('http://support.templatetrip.com/'); ?>" target="_blank" class="button button-primary"><?php esc_html_e('Generate Ticket Here', 'megashop'); ?></a>
        </p>
    </div>
</div>
<div class="clear"></div>
<div class="changelog">
    <div class="return-to-dashboard">
        <a href="<?php echo esc_url(self_admin_url('themes.php')); ?>"><?php is_blog_admin() ? esc_html_e('Back to Themes', 'megashop') : esc_html_e('Back to Themes', 'megashop'); ?></a>
    </div>
</div>
</div>