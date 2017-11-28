<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Megashop
 * @since Megashop 1.0.2
 */
get_header();
$theme_layout = of_get_option('theme_layout');
if($theme_layout == 'full_width_layout'){
   ?>
<div class="container-fluid padding_0">
    <div class="container padding_0">
    <div class="page-title-wrapper">
        <?php TT_wp_breadcrumb(); ?>
    </div>
        <div class="col-xs-12">
        <?php   if (is_singular('product')) { ?>
        <div id="primary" class="col-xs-12">
        <?php 
         do_action( 'woocommerce_before_main_content' );
        }else{ ?>
            <div id="primary" class="content-area col-md-9 col-sm-9 col-xs-12 col-sm-push-3 col-md-push-3">
                <?php } ?>
            <main id="main" class="site-main woo_page" >
                <?php
                if (is_singular('product')) {
                    woocommerce_content();
                    
                } else {
                    //For ANY product archive.
                    //Product taxonomy, product search or /shop landing
                    wc_get_template('archive-product.php');
                }
                ?>

            </main><!-- .site-main -->
        </div>
            <?php   if (is_singular('product')) { ?>
        <?php 
         do_action( 'woocommerce_after_main_content' );
        }
        ?>
        <?php if (!is_singular('product')) {  get_sidebar(); } ?>
        </div>
        </div>
</div>
<?php
}else{
?>
<div class="container padding_0 left_sidebar">
    <div class="page-title-wrapper">
        <?php TT_wp_breadcrumb(); ?>
    </div>
    <?php
    if ($theme_layout == 'both_sidebar_layout') {
        ?>
        <div id="primary" class="content-area col-md-6 col-sm-6 col-xs-12 col-sm-push-3 col-md-push-3 col-lg-push-2 col-lg-8">
            <main id="main" class="site-main woo_page" >
                <?php
                if (is_singular('product')) {
                    woocommerce_content();
                } else {
                    //For ANY product archive.
                    //Product taxonomy, product search or /shop landing
                    wc_get_template('archive-product.php');
                }
                ?>

            </main><!-- .site-main -->
        </div>
       <aside id="secondary" class="sidebar widget-area col-sm-3 col-lg-2 col-md-3 col-md-pull-6 col-sm-pull-6 col-lg-pull-8">
                <?php
                        if ( has_nav_menu( 'left_menu' ) ) { 
                ?>
                <section id="maxmegamenu_mega" class="widget widget_maxmegamenu">            
                                <?php if ( has_nav_menu( 'left_menu' ) ) { ?>
                                        <?php
                                        //if you after the menu at a specific location
                                            $location = 'left_menu';
                                            $menu_obj = megashop_get_menu_by_location($location); 
                                            $locations = get_nav_menu_locations();
                                            if($menu_obj->name == 'left-menu'){
                                                $title = esc_html('Categories','megashop');
                                            }else{
                                                $title = $menu_obj->name;
                                            }
                                            echo "<h2 class='widget-title'>".esc_attr($title)."</h2>";
                                            if (!empty($locations) && array_key_exists('left_menu', $locations)) {
                                                wp_nav_menu(array('theme_location' => 'left_menu','container_class' => 'mega-menu-wrap', 'menu_class' => 'mega-menu'));
                                            }
                                        ?>
                                <?php } ?>
                </section> 
            <?php }  dynamic_sidebar('sidebar-1'); ?>
                </aside><!-- .sidebar .widget-area -->
        <aside id="rightsidebar" class="sidebar widget-area col-sm-3 col-md-3 col-xs-12 col-lg-2">
            <?php dynamic_sidebar('right-sidebar'); ?>
        </aside><!-- .sidebar .widget-area -->
        <?php
    } elseif ($theme_layout == 'left_sidebar_layout') {
        ?>
        <div id="primary" class="content-area col-md-9 col-sm-9 col-xs-12 col-sm-push-3 col-md-push-3">
            <main id="main" class="site-main woo_page" >
                <?php
                if (is_singular('product')) {
                    woocommerce_content();
                } else {
                    //For ANY product archive.
                    //Product taxonomy, product search or /shop landing
                    wc_get_template('archive-product.php');
                }
                ?>

            </main><!-- .site-main -->

        </div><!-- .content-area -->
        <?php
        get_sidebar();
    }
    ?>
</div>
<?php
}
get_footer();