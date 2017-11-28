<?php
/**
 * Template Name: Full Width Page
 *
 * @package WordPress
 * @subpackage Megashop
 * @since Megashop 1.0.2
 */

get_header(); ?>
<div class="container padding_0">
    <div class="page-title-wrapper">
    <?php TT_wp_breadcrumb(); ?>
    </div>
<div id="main-content" class="main-content container padding_0">
	<div id="primary" class="content-area">
		<div id="content" class="site-content">
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
</div>
<?php
get_footer();
