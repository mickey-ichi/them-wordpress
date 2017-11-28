<?php
/**
 * Template Name: Left Sidebar Page
 *
 * @package WordPress
 * @subpackage Megashop
 * @since Megashop 1.0.2
 */

get_header(); ?>
<div class="left_sidebar container padding_0">
   <div class="page-title-wrapper">
    <?php TT_wp_breadcrumb(); ?>
    </div>
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
</div>
<?php get_sidebar(); 
get_footer();
