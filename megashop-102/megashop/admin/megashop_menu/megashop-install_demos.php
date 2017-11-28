<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
/* include file for auto install */
get_template_part('admin/megashop_menu/megashop', 'menu_header');
$megashop_theme = wp_get_theme();
?>
<div>
    <p class="about"><?php printf(esc_html__("Megashop is a beautifully designed responsive WooCommerce Theme for your eCommerce Clean and Unique Store, It comes with custom homepages, shortcodes, drop-down menus, meta slider plugin and lots of more useful features available inside theme options.", "megashop"), $megashop_theme->get('Name')); ?></p>
</div>
<h2 class="install_demo_title"><?php esc_html_e('Is your store looks same as our live theme demo?', 'megashop'); ?></h2>
<?php $auto_install = get_option('listing_xml');
$layout = get_option('layout');
if ($auto_install == 0) {
    $class = 'select_demo';
}else{
    $class = '';
}
?>
<div class="demo_layout_wrap <?php echo esc_attr($class); ?>">
    <div class="row">
        <div class="demodiv">
            <div class="bgframe <?php if($layout == 'auto_install_layout1'){ echo 'selected'; } ?>"><span class="scroll_image <?php if($layout == 'auto_install_layout1'){ echo 'selected'; } ?>" demo-attr="auto_install_layout1" style="background-image:url('<?php echo get_template_directory_uri(); ?>/admin/images/layout/layout_01.png');"></span>
            <div class="img_hover"><span><a href="<?php echo esc_url( 'http://demo.templatetrip.com/WooCommerce/WCM040/WCM01/' ); ?>" target="_blank"><?php esc_html_e('Live Demo','megashop'); ?></a></span></div>
            </div>
        </div>
        <div class="demodiv">
            <div class="bgframe <?php if($layout == 'auto_install_layout6'){ echo 'selected'; } ?>"><span class="scroll_image <?php if($layout == 'auto_install_layout6'){ echo 'selected'; } ?>" demo-attr="auto_install_layout6" style="background-image:url('<?php echo get_template_directory_uri(); ?>/admin/images/layout/layout_06.png');"></span>
            <div class="img_hover"><span><a href="<?php echo esc_url('http://demo.templatetrip.com/WooCommerce/WCM040/WCM06/'); ?>" target="_blank"><?php esc_html_e('Live Demo','megashop'); ?></a></span></div></div>
        </div>
        <div class="demodiv">
            <div class="bgframe <?php if($layout == 'auto_install_layout2'){ echo 'selected'; } ?>"><span class="scroll_image <?php if($layout == 'auto_install_layout2'){ echo 'selected'; } ?>"  demo-attr="auto_install_layout2" style="background-image:url('<?php echo get_template_directory_uri(); ?>/admin/images/layout/layout_02.png');"></span>
                <div class="img_hover"><span><a href="<?php echo esc_url( 'http://demo.templatetrip.com/WooCommerce/WCM040/WCM02/' ); ?>" target="_blank"><?php esc_html_e('Live Demo','megashop'); ?></a></span></div>
            </div>
        </div>        
        <div class="demodiv">
            <div class="bgframe <?php if($layout == 'auto_install_layout7'){ echo 'selected'; } ?>"><span class="scroll_image <?php if($layout == 'auto_install_layout7'){ echo 'selected'; } ?>" demo-attr="auto_install_layout7" style="background-image:url('<?php echo get_template_directory_uri(); ?>/admin/images/layout/layout_07.png');"></span>
            <div class="img_hover"><span><a href="<?php echo esc_url( 'http://demo.templatetrip.com/WooCommerce/WCM040/WCM07/' ); ?>" target="_blank"><?php esc_html_e('Live Demo','megashop'); ?></a></span></div></div>
        </div>       
        <div class="demodiv">
            <div class="bgframe <?php if($layout == 'auto_install_layout4'){ echo 'selected'; } ?>"><span class="scroll_image <?php if($layout == 'auto_install_layout4'){ echo 'selected'; } ?>" demo-attr="auto_install_layout4" style="background-image:url('<?php echo get_template_directory_uri(); ?>/admin/images/layout/layout_04.png');"></span>
            <div class="img_hover"><span><a href="<?php echo esc_url( 'http://demo.templatetrip.com/WooCommerce/WCM040/WCM04/' ); ?>" target="_blank"><?php esc_html_e('Live Demo','megashop'); ?></a></span></div></div>
        </div>
        <div class="demodiv">
            <div class="bgframe <?php if($layout == 'auto_install_layout5'){ echo 'selected'; } ?>"><span class="scroll_image <?php if($layout == 'auto_install_layout5'){ echo 'selected'; } ?>" demo-attr="auto_install_layout5" style="background-image:url('<?php echo get_template_directory_uri(); ?>/admin/images/layout/layout_05.png');"></span>
            <div class="img_hover"><span><a href="<?php echo esc_url( 'http://demo.templatetrip.com/WooCommerce/WCM040/WCM05/' ); ?>" target="_blank"><?php esc_html_e('Live Demo','megashop'); ?></a></span></div></div>
        </div>
         <div class="demodiv">
            <div class="bgframe <?php if($layout == 'auto_install_layout3'){ echo 'selected'; } ?>"><span class="scroll_image <?php if($layout == 'auto_install_layout3'){ echo 'selected'; } ?>" demo-attr="auto_install_layout3" style="background-image:url('<?php echo get_template_directory_uri(); ?>/admin/images/layout/layout_03.png');"></span>
            <div class="img_hover"><span><a href="<?php echo esc_url( 'http://demo.templatetrip.com/WooCommerce/WCM040/WCM03/' ); ?>" target="_blank"><?php esc_html_e('Live Demo','megashop'); ?></a></span></div></div>
        </div>
        <div class="demodiv">
            <div class="bgframe <?php if($layout == 'auto_install_layout8'){ echo 'selected'; } ?>"><span class="scroll_image <?php if($layout == 'auto_install_layout8'){ echo 'selected'; } ?>" demo-attr="auto_install_layout8" style="background-image:url('<?php echo get_template_directory_uri(); ?>/admin/images/layout/layout_08.png');"></span>
            <div class="img_hover"><span><a href="<?php echo esc_url( 'http://demo.templatetrip.com/WooCommerce/WCM040/WCM08/' ); ?>" target="_blank"><?php esc_html_e('Live Demo','megashop'); ?></a></span></div></div>
        </div>
        <div class="demodiv">
            <div class="bgframe <?php if($layout == 'auto_install_layout9'){ echo 'selected'; } ?>"><span class="scroll_image <?php if($layout == 'auto_install_layout9'){ echo 'selected'; } ?>" demo-attr="auto_install_layout9" style="background-image:url('<?php echo get_template_directory_uri(); ?>/admin/images/layout/layout_09.png');"></span>
            <div class="img_hover"><span><a href="<?php echo esc_url( 'http://demo.templatetrip.com/WooCommerce/WCM040/WCM09/' ); ?>" target="_blank"><?php esc_html_e('Live Demo','megashop'); ?></a></span></div></div>
        </div>
        <div class="demodiv">
            <div class="bgframe <?php if($layout == 'auto_install_layout10'){ echo 'selected'; } ?>"><span class="scroll_image <?php if($layout == 'auto_install_layout10'){ echo 'selected'; } ?>" demo-attr="auto_install_layout10" style="background-image:url('<?php echo get_template_directory_uri(); ?>/admin/images/layout/layout_10.png');"></span>
            <div class="img_hover"><span><a href="<?php echo esc_url( 'http://demo.templatetrip.com/WooCommerce/WCM040/WCM10/' ); ?>" target="_blank"><?php esc_html_e('Live Demo','megashop'); ?></a></span></div></div>
        </div>
        <div class="demodiv">
            <div class="bgframe <?php if($layout == 'auto_install_layout11'){ echo 'selected'; } ?>"><span class="scroll_image <?php if($layout == 'auto_install_layout11'){ echo 'selected'; } ?>" demo-attr="auto_install_layout11" style="background-image:url('<?php echo get_template_directory_uri(); ?>/admin/images/layout/layout_11.png');"></span>
            <div class="img_hover"><span><a href="<?php echo esc_url( 'http://demo.templatetrip.com/WooCommerce/WCM040/WCM11/' ); ?>" target="_blank"><?php esc_html_e('Live Demo','megashop'); ?></a></span></div></div>
        </div>
        <div class="demodiv">
            <div class="bgframe <?php if($layout == 'auto_install_layout12'){ echo 'selected'; } ?>"><span class="scroll_image <?php if($layout == 'auto_install_layout12'){ echo 'selected'; } ?>" demo-attr="auto_install_layout12" style="background-image:url('<?php echo get_template_directory_uri(); ?>/admin/images/layout/layout_12.png');"></span>
            <div class="img_hover"><span><a href="<?php echo esc_url( 'http://demo.templatetrip.com/WooCommerce/WCM040/WCM12/' ); ?>" target="_blank"><?php esc_html_e('Live Demo','megashop'); ?></a></span></div></div>
        </div>
		<div class="demodiv">
            <div class="bgframe <?php if($layout == 'auto_install_layout13'){ echo 'selected'; } ?>"><span class="scroll_image <?php if($layout == 'auto_install_layout13'){ echo 'selected'; } ?>"  demo-attr="auto_install_layout13" style="background-image:url('<?php echo get_template_directory_uri(); ?>/admin/images/layout/layout_13.png');"></span>
                <div class="img_hover"><span><a href="<?php echo esc_url( 'http://demo.templatetrip.com/WooCommerce/WCM040/WCM13/' ); ?>" target="_blank"><?php esc_html_e('Live Demo','megashop'); ?></a></span></div>
            </div>
    </div>
	<div class="demodiv">
            <div class="bgframe <?php if($layout == 'auto_install_layout14'){ echo 'selected'; } ?>"><span class="scroll_image <?php if($layout == 'auto_install_layout14'){ echo 'selected'; } ?>" demo-attr="auto_install_layout14" style="background-image:url('<?php echo get_template_directory_uri(); ?>/admin/images/layout/layout_14.png');"></span>
            <div class="img_hover"><span><a href="<?php echo esc_url( 'http://demo.templatetrip.com/WooCommerce/WCM040/WCM14/' ); ?>" target="_blank"><?php esc_html_e('Live Demo','megashop'); ?></a></span></div></div>
        </div>
</div>
<div class="one-col demo_install_button">    
    <?php
    $auto_install = get_option('listing_xml');
    if ($auto_install == 0) { ?>
        <div class="start_install">
            <a id="auto-install" class="install_demo" data-href=""><?php esc_html_e('Install Sample Data', 'megashop'); ?></a>
        </div><?php
    }
    if ($auto_install == 1) { ?>
        <div class="start_install end_install">
            <a id="remove-auto-install" class="uninstall_demo" data-href="" ><?php esc_html_e('Uninstall Sample Data', 'megashop'); ?></a>
        </div><?php
    }
    ?>
</div>
<div class="auto_install_details">
    <?php
    if ($auto_install == 0) { ?>
        <p class="theme_import_note"><?php esc_html_e("So that you don't start on a blank site, the sample data will help you get started with the theme. The content includes some default settings, widgets in their locations, pages, posts and a few dummy posts.", 'megashop'); ?></p>
    <?php
    }
    if ($auto_install == 1) { ?>
        <p class="theme_export_note"> <?php esc_html_e("NOTE: Bofore click on Uninstall-Sample-Data button, you'll never restore your current store configuration and settings ", 'megashop'); ?>:( </p>
    <?php
    }
    ?>
</div>
<div class="auto-install-loader">
    <p>
        <?php
        $auto_install = get_option('listing_xml');
        if ($auto_install == 0) {
            esc_html_e('This could take up to 5-10 minutes. Sit back and relax while we install the sample data for you. Please do not close this window until it completes.', 'megashop');
        }
        if ($auto_install == 1) {
            esc_html_e('This could take up to 5-10 minutes. Sit back and relax while we delete the sample data for you. Please do not close this window until it completes.', 'megashop');
        }
        ?>
    </p>
</div>
<div class="changelog">
    <div class="return-to-dashboard">
        <a href="<?php echo esc_url(self_admin_url('themes.php')); ?>"><?php is_blog_admin() ? esc_html_e('Go to Themes', 'megashop') : esc_html_e('Go to Themes', 'megashop'); ?></a>
    </div>
</div>