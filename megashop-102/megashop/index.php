<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage megashop
 * @since megashop 1.0.2
 */
get_header();
$theme_layout = of_get_option('theme_layout');
$blog_layout = of_get_option('select_blog_layout');
$blog_column = of_get_option('select_blog_column');
$class = '';
if ($blog_column == '3_column') {
    $class = 'three_col';
}
if ($blog_column == '2_column') {
    $class = 'two_col';
}
if ($blog_column == '4_column') {
    $class = 'four_col';
}
if ($theme_layout == 'full_width_layout') {
    ?>
    <div class="container-fluid padding_0 left_sidebar">    
        <div class="container padding_0">
            <div class="page-title-wrapper">
                <?php TT_wp_breadcrumb(); ?>
            </div>
            <div id="main-content" class="main-content">
                <div id="main-content" class="content-area">
                    <main id="main" class="site-main" >

                        <?php if (have_posts()) : ?>

                            <?php if (is_home() && !is_front_page()) : ?>
                                <header>
                                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                                </header>
                            <?php endif; ?>
                            <div class="blog-div  <?php echo esc_attr($blog_layout) . ' ' . esc_attr($class); ?>">
                                <?php if ($blog_layout == 'masonry') { ?>
                                    <div class="blog_wrap_div <?php echo esc_attr($blog_layout) . ' ' . esc_attr($class); ?>">
                                    <?php
                                    }
                                    // Start the loop.
                                    while (have_posts()) : the_post();

                                        /*
                                         * Include the Post-Format-specific template for the content.
                                         * If you want to override this in a child theme, then include a file
                                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                         */
                                        ?><?php if ($blog_layout == 'masonry') { ?><div class="ms-item"> <?php } ?>
                                            <?php get_template_part('template-parts/content', get_post_format());
                                            if ($blog_layout == 'masonry') {
                                                ?></div><?php
                        }
                    // End the loop.
                    endwhile;
                    if ($blog_layout == 'masonry') {
                                            ?></div> <?php } ?></div><?php
                        // Previous/next page navigation.
                        the_posts_pagination(array(
                            'prev_text' => esc_html__('Previous page', 'megashop'),
                            'next_text' => esc_html__('Next page', 'megashop'),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__('Page', 'megashop') . ' </span>',
                        ));

                    // If no content, include the "No posts found" template.
                    else :
                        get_template_part('template-parts/content', 'none');

                    endif;
                    ?>

                    </main><!-- .site-main -->
                </div>
            </div>
        </div>
    </div>
            <?php
        }else {
            ?>
    <div class="container padding_0 left_sidebar">
        <div class="page-title-wrapper">
            <?php TT_wp_breadcrumb(); ?>
        </div>
        <div id="main-content" class="main-content">
    <?php
    if ($theme_layout == 'both_sidebar_layout') {
        ?>
                <div id="main-content" class="content-area col-md-6 col-sm-6 col-xs-12 col-sm-push-3 col-md-push-3 col-lg-push-2 col-lg-8">
                    <main id="main" class="site-main" >

        <?php if (have_posts()) : ?>

                            <?php if (is_home() && !is_front_page()) : ?>
                                <header>
                                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                                </header>
                                    <?php endif; ?>
                            <div class="blog-div  <?php echo esc_attr($blog_layout) . ' ' . esc_attr($class); ?>">
                                    <?php if ($blog_layout == 'masonry') { ?>
                                    <div class="blog_wrap_div <?php echo esc_attr($blog_layout) . ' ' . esc_attr($class); ?>">
                                    <?php
                                    }
                                    // Start the loop.
                                    while (have_posts()) : the_post();

                                        /*
                                         * Include the Post-Format-specific template for the content.
                                         * If you want to override this in a child theme, then include a file
                                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                         */
                                        ?><?php if ($blog_layout == 'masonry') { ?><div class="ms-item"> <?php } ?>
                                    <?php get_template_part('template-parts/content', get_post_format());
                                    if ($blog_layout == 'masonry') {
                                        ?></div><?php
                }
            // End the loop.
            endwhile;
            if ($blog_layout == 'masonry') {
                                    ?></div> <?php } ?></div><?php
                    // Previous/next page navigation.
                    the_posts_pagination(array(
                        'prev_text' => esc_html__('Previous page', 'megashop'),
                        'next_text' => esc_html__('Next page', 'megashop'),
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__('Page', 'megashop') . ' </span>',
                    ));

                // If no content, include the "No posts found" template.
                else :
                    get_template_part('template-parts/content', 'none');

                endif;
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
                    }elseif ($theme_layout == 'left_sidebar_layout') {
                        ?>
                <div id="primary" class="content-area col-md-9 col-sm-9 col-xs-12 col-sm-push-3 col-md-push-3">
                    <main id="main" class="site-main" >

                            <?php if (have_posts()) : ?>

                                    <?php if (is_home() && !is_front_page()) : ?>
                                <header>
                                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                                </header>
                                    <?php endif; ?>
                            <div class="blog-div  <?php echo esc_attr($blog_layout) . ' ' . esc_attr($class); ?>">
                                    <?php if ($blog_layout == 'masonry') { ?>
                                    <div class="blog_wrap_div <?php echo esc_attr($blog_layout) . ' ' . esc_attr($class); ?>">
                                    <?php
                                    }
                                    // Start the loop.
                                    while (have_posts()) : the_post();

                                        /*
                                         * Include the Post-Format-specific template for the content.
                                         * If you want to override this in a child theme, then include a file
                                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                         */
                                        ?><?php if ($blog_layout == 'masonry') { ?><div class="ms-item"> <?php } ?>
                                    <?php get_template_part('template-parts/content', get_post_format());
                                    if ($blog_layout == 'masonry') {
                                        ?></div><?php
                }
            // End the loop.
            endwhile;
            if ($blog_layout == 'masonry') {
                                    ?></div> <?php } ?></div><?php
                    // Previous/next page navigation.
                    the_posts_pagination(array(
                        'prev_text' => esc_html__('Previous page', 'megashop'),
                        'next_text' => esc_html__('Next page', 'megashop'),
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__('Page', 'megashop') . ' </span>',
                    ));

                // If no content, include the "No posts found" template.
                else :
                    get_template_part('template-parts/content', 'none');

                endif;
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
} get_footer();