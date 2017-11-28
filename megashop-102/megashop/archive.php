<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
    <div id="main-content" class="content-area col-xs-12">
            <main id="main" class="site-main" >
                <?php if (have_posts()) : ?>

                    <header class="page-header">
                        <?php
                        the_archive_title('<h1 class="page-title">', '</h1>');
                        the_archive_description('<div class="taxonomy-description">', '</div>');
                        ?>
                    </header><!-- .page-header -->
                    <div class="archive-div">
                        <?php
                        // Start the Loop.
                        while (have_posts()) : the_post();

                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part('template-parts/content', get_post_format());

                        // End the loop.
                        endwhile;
                        ?></div><?php
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
        <div id="main-content" class="content-area col-md-6 col-sm-6 col-xs-12 col-sm-push-3 col-md-push-3 col-lg-push-2 col-lg-8">
            <main id="main" class="site-main" >
                <?php if (have_posts()) : ?>

                    <header class="page-header">
                        <?php
                        the_archive_title('<h1 class="page-title">', '</h1>');
                        the_archive_description('<div class="taxonomy-description">', '</div>');
                        ?>
                    </header><!-- .page-header -->
                    <div class="archive-div">
                        <?php
                        // Start the Loop.
                        while (have_posts()) : the_post();

                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part('template-parts/content', get_post_format());

                        // End the loop.
                        endwhile;
                        ?></div><?php
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

                    <header class="page-header">
                        <?php
                        the_archive_title('<h1 class="page-title">', '</h1>');
                        the_archive_description('<div class="taxonomy-description">', '</div>');
                        ?>
                    </header><!-- .page-header -->
                    <div class="archive-div">
                        <?php
                        // Start the Loop.
                        while (have_posts()) : the_post();

                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part('template-parts/content', get_post_format());

                        // End the loop.
                        endwhile;
                        ?></div><?php
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
<?php }
get_footer();