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
        $content  = get_the_content();
        //Helper variables
		$post_media = '';
		$image_size = apply_filters( 'entry_featured_image_size', 'thumbnail' );
		$image_link = ( is_single() ) ? ( wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ) ) : ( array( esc_url( get_permalink() ) ) );
		$image_link = array_filter( (array) apply_filters( 'entry_image_link', $image_link ) );
        //Get image HTML
		if ( has_post_thumbnail() ) {

			$post_media = get_the_post_thumbnail( null, $image_size );

		} elseif ( ! is_single() ) {

			//Helper variables
				$post_media = megashop_get_post_format_media();

			//Get the image size URL if we got image ID
				if ( is_numeric( $post_media ) ) {
					$post_media = wp_get_attachment_image_src( absint( $post_media ), $image_size );
					$post_media = $post_media[0];
				}
			//Output media
				$post_media = '<img src="' . esc_url( $post_media ) . '" alt="" title="' . the_title_attribute( 'echo=0' ) . '" />';

		}
                if (! empty( $post_media )&& apply_filters( 'entry_featured_image_display', true )) {
	?>
            <div class="col-sm-5 padding_0">
	<div class="entry-media">
			<?php
            $class = "col-sm-7 padding_right_0";
			if ( ! empty( $image_link ) ) {
				echo '<a href="' . esc_url( $image_link[0] ) . '" title="' . the_title_attribute( 'echo=0' ) . '">';
			}
			echo $post_media;
			if ( ! empty( $image_link ) ) {
				echo '</a>';
			}
			?>
	</div>
            </div>
	<?php
	}else{
            $class = "col-sm-12 padding_0";
        } ?>
        <div class="<?php echo esc_attr($class); ?> padding_right_0">
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
