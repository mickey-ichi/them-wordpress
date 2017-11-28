<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage megashop
 * @since megashop 1.0.2
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="blog-wrap">
        <?php
        $content = get_the_content();
        //Helper variables
        $post_media = megashop_get_post_format_media();
        $is_shortcode = ( 0 === strpos($post_media, '[') );

        //Remove the media from the content
        if ($post_media) {
            $content = str_replace($post_media, '', $content);
        }
        //Output media
        if ($post_media) {
            $class = 'col-sm-7 padding_right_0';
            if ($is_shortcode) {
                $post_media = do_shortcode($post_media);
            } else {
                $post_media = '<div class="video-container">' . wp_oembed_get($post_media) . '</div>';
            }
            ?>
            <div class="col-sm-5 padding_0"> <?php
                echo $post_media;
                ?></div><?php
            } elseif(has_post_thumbnail()) {
                $class = 'col-sm-7 padding_right_0';
            ?>
                <div class="col-sm-5 padding_0">
                    <?php
                    megashop_post_thumbnail();
                    $full = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                    $url = $full['0'];
                    ?>
                    <span class="bloglinks">
                        <a class="icon zoom" data-lightbox="example-set" href="<?php echo esc_url($url); ?>" title="<?php echo esc_html(get_the_title()); ?>">
                            <i class="fa fa-search"></i>
                        </a>
                    </span>
                    </div>
                <?php }else{
                    $class = 'col-sm-12 padding_0';
                } ?>
            
        <div class="<?php echo esc_attr($class); ?>">
	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php esc_html_e( 'Featured', 'megashop' ); ?></span>
		<?php endif; ?>

		<?php
		 the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		  ?>
	</header><!-- .entry-header -->    
        <div class="entry-meta">
		<?php megashop_entry_meta(); ?>
		
	</div><!-- .entry-meta -->
	<div class="blog-content">
		<?php
                the_excerpt();
                ?>
	</div><!-- .entry-content -->
        </div>
    </div>
</article><!-- #post-## -->
