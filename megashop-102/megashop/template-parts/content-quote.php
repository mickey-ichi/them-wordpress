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
            $content = preg_replace('/<(\/?)blockquote(.*?)>/', '', get_the_content());
            //Quote source
            //First, look for custom field
            $quote_source = trim(get_post_meta(get_the_ID(), 'quote_source', true));
            //Fall back to post title as quote source if no custom field set
            if (empty($quote_source)) {
                $quote_source = strip_tags(get_the_title());
            }
            //Finally, display the above set quote source only if it wasn't included in the post content
            if (
                    false === stristr($content, '<cite')
                    && $quote_source
            ) {
                $content .= '<cite class="quote-source">' . $quote_source . '</cite>';
            }
            //Output
            $content = explode('<cite', $content);
            $class = "col-sm-7 padding_right_0";
            ?>
            <div class="col-sm-5 padding_0">
            <?php
            //Quote content
            echo '<blockquote class="quote-content">' . esc_attr($content[0]) . '</blockquote>';
            //Quote source
            if (isset($content[1]) && $content[1]) {
                echo '<cite' . $content[1];
                ?>
            </div>
                <?php
            } elseif(has_post_thumbnail()) {
                $class = "col-sm-7 padding_right_0";
                ?><div class="col-sm-5 padding_0">
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
                $class = "col-sm-12 padding_0";
            }
                ?>
        
        <div class="<?php echo esc_attr($class); ?>">
            <header class="entry-header">
                <?php if (is_sticky() && is_home() && !is_paged()) : ?>
                <span class="sticky-post"><?php esc_html_e('Featured', 'megashop'); ?></span>
                <?php endif; ?>

                <?php
                the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
                ?>
            </header><!-- .entry-header -->    
            <div class="entry-meta">
                <?php megashop_entry_meta(); ?>

            </div><!-- .entry-meta -->
            <div class="blog-content">
                <?php
                $shortexcerpt = '<div class="continue_read"><a href="' . esc_url(get_the_permalink()) . '" class="read-more">' . esc_html__('Read More', 'megashop') . '</a></div>';
                echo $shortexcerpt;
                ?>
            </div><!-- .entry-content -->
        </div>
    </div>	
</article><!-- #post-## -->
