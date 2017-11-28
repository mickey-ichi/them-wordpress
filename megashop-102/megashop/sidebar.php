<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Megashop
 * @since Megashop 1.0.2
 */
?>

<?php
$sidebar = 'sidebar-1';
 $class = 'col-md-3 col-sm-3 col-xs-12 col-sm-pull-9 col-md-pull-9';
if ( is_active_sidebar( $sidebar )  ) : ?>
	<aside id="secondary" class="sidebar widget-area <?php echo esc_attr($class); ?>">
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
            <?php }    
                dynamic_sidebar( $sidebar ); ?>
	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>