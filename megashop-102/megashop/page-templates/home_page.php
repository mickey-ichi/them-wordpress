<?php
/**
 * Template Name: Home Page
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
<div id="main-content" class="main-content col-xs-12">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" >
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile; ?>
				
				    
		</div><!-- #content -->
	</div><!-- #primary -->
</div>
</div>
</div>
<?php
}else{
?>
<div class="left_sidebar container padding_0"><?php
if($theme_layout == 'both_sidebar_layout'){ ?>
    <div id="main-content" class="main-content col-md-6 col-sm-6 col-xs-12 col-sm-push-3 col-md-push-3 col-lg-push-2 col-lg-8">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" >
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile; ?>
				
				    
		</div><!-- #content -->
	</div><!-- #primary -->
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
                                            echo "<h2 class='widget-title'>".esc_attr($menu_obj->name)."</h2>";
                                            if (!empty($locations) && array_key_exists('left_menu', $locations)) {
                                                wp_nav_menu(array('theme_location' => 'left_menu','container_class' => 'mega-menu-wrap', 'menu_class' => 'mega-menu'));
                                            }
                                        ?>
                                <?php } ?>
                </section> 
            <?php }  dynamic_sidebar('sidebar-1'); ?>
                </aside><!-- .sidebar .widget-area -->
<aside id="rightsidebar" class="sidebar widget-area col-sm-3 col-md-3 col-xs-12 col-lg-2">
        <?php dynamic_sidebar( 'right-sidebar' ); ?>
</aside><!-- .sidebar .widget-area -->
<?php
}elseif($theme_layout == 'left_sidebar_layout'){
    ?>

<div id="main-content" class="main-content col-md-9 col-sm-9 col-xs-12 col-sm-push-3 col-md-push-3">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" >
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile; ?>
		</div><!-- #content -->
	</div><!-- #primary -->
        </div><!-- #main-content -->
<?php get_sidebar(); 
}
?> </div> <?php }
get_footer();
