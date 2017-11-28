<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage megashop
 * @since megashop 1.0.2
 */
get_header();
$theme_layout = of_get_option('theme_layout');
if($theme_layout == 'full_width_layout'){
   ?>
<div class="container-fluid padding_0 left_sidebar">    
    <div class="container padding_0">
    <div class="page-title-wrapper">
        <?php TT_wp_breadcrumb(); ?>
    </div>
    <div id="main-content-wrap" class="main-content">
        <div id="main-content" class="content-area col-xs-12">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" >
                        <?php
                        // Start the loop.
                        while (have_posts()) : the_post();

                            // Include the single post content template.
                            get_template_part('template-parts/content', 'single');

                            // If comments are open or we have at least one comment, load up the comment template.
                            if (comments_open() || get_comments_number()) {
                                comments_template();
                            }

                            if (is_singular('attachment')) {
                                // Parent post navigation.
                                the_post_navigation(array(
                                    'prev_text' => _x('<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'megashop'),
                                ));
                            } elseif (is_singular('post')) {
                                // Previous/next post navigation.
                                the_post_navigation(array(
                                    'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__('Next', 'megashop') . '</span> ' .
                                    '<span class="screen-reader-text">' . esc_html__('Next post:', 'megashop') . '</span> ' .
                                    '<span class="post-title">%title</span>',
                                    'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__('Previous', 'megashop') . '</span> ' .
                                    '<span class="screen-reader-text">' . esc_html__('Previous post:', 'megashop') . '</span> ' .
                                    '<span class="post-title">%title</span>',
                                ));
                            }

                        // End of the loop.
                        endwhile;
                        ?>

                    </main><!-- .site-main -->


                </div><!-- .content-area -->
            </div>
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
    <div id="main-content-wrap" class="main-content">
        <?php
        if ($theme_layout == 'both_sidebar_layout') {
            ?>
            <div id="main-content" class="content-area col-md-6 col-sm-6 col-xs-12 col-sm-push-3 col-md-push-3 col-lg-push-2 col-lg-8">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" >
                        <?php
                        // Start the loop.
                        while (have_posts()) : the_post();

                            // Include the single post content template.
                            get_template_part('template-parts/content', 'single');

                            // If comments are open or we have at least one comment, load up the comment template.
                            if (comments_open() || get_comments_number()) {
                                comments_template();
                            }

                            if (is_singular('attachment')) {
                                // Parent post navigation.
                                the_post_navigation(array(
                                    'prev_text' => _x('<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'megashop'),
                                ));
                            } elseif (is_singular('post')) {
                                // Previous/next post navigation.
                                the_post_navigation(array(
                                    'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__('Next', 'megashop') . '</span> ' .
                                    '<span class="screen-reader-text">' . esc_html__('Next post:', 'megashop') . '</span> ' .
                                    '<span class="post-title">%title</span>',
                                    'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__('Previous', 'megashop') . '</span> ' .
                                    '<span class="screen-reader-text">' . esc_html__('Previous post:', 'megashop') . '</span> ' .
                                    '<span class="post-title">%title</span>',
                                ));
                            }

                        // End of the loop.
                        endwhile;
                        ?>

                    </main><!-- .site-main -->


                </div><!-- .content-area -->
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
                    <main id="main" class="site-main" >
                        <?php
                        // Start the loop.
                        while (have_posts()) : the_post();

                            // Include the single post content template.
                            get_template_part('template-parts/content', 'single');

                            // If comments are open or we have at least one comment, load up the comment template.
                            if (comments_open() || get_comments_number()) {
                                comments_template();
                            }

                            if (is_singular('attachment')) {
                                // Parent post navigation.
                                the_post_navigation(array(
                                    'prev_text' => _x('<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'megashop'),
                                ));
                            } elseif (is_singular('post')) {
                                // Previous/next post navigation.
                                the_post_navigation(array(
                                    'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__('Next', 'megashop') . '</span> ' .
                                    '<span class="screen-reader-text">' . esc_html__('Next post:', 'megashop') . '</span> ' .
                                    '<span class="post-title">%title</span>',
                                    'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__('Previous', 'megashop') . '</span> ' .
                                    '<span class="screen-reader-text">' . esc_html__('Previous post:', 'megashop') . '</span> ' .
                                    '<span class="post-title">%title</span>',
                                ));
                            }

                        // End of the loop.
                        endwhile;
                        ?>

                    </main><!-- .site-main -->

            </div><!-- .content-area -->
            <?php
            get_sidebar();
        }
        ?>
    </div>
</div>
<?php
}
get_footer();