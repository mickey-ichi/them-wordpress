<?php
/**
 * Widget API: TT_Widget_Blog class
 *
 */

class TT_Widget_Blog extends WP_Widget {

	/**
	 * Sets up a new Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_blog_entries',
			'description' => esc_html__( 'Display Blogs Slider.','megashop' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'latestblog-posts', esc_html__( 'TT Latest Blogs Slider','megashop' ), $widget_ops );
		$this->alt_option_name = 'widget_blog_entries';
	}

	/**
	 * Outputs the content for the current Blog Posts widget instance.
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Blog Posts widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$id = rand();

		$Blog_columns = empty( $instance['Blog_columns'] ) ? '1_column' : $instance['Blog_columns'];
		$show_comment = isset( $instance['show_comment'] ) ? $instance['show_comment'] : false;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number )
			$number = 5;

		/**
		 * Filters the arguments for the Recent Posts widget.
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args An array of arguments used to retrieve the recent posts.
		 */
		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'post_type'         => 'post',
			'ignore_sticky_posts' => true
		) ) );

		if ($r->have_posts()) :
		if($Blog_columns == '1_column'){
			$Blog_columns = 1;
		}elseif($Blog_columns == '2_column'){
			$Blog_columns = 2;
		}
                elseif($Blog_columns == '3_column'){
			$Blog_columns = 3;
		}
                $jquery_code = "";                
                $jquery_code .= "\n jQuery(document).ready(function () { var ttlatestblog = jQuery('.latestblog_wrap_".esc_js($id)."');\n";
                $jquery_code .= "\n jQuery('.latestblog_wrap_". esc_js($id)."').owlCarousel({\n";
                $jquery_code .= "\n items : ". esc_js($Blog_columns).",\n";                
                $jquery_code .= "\n itemsDesktop : [1200," .esc_js($Blog_columns)."],\n";
                if($Blog_columns > 2){  $$Blog_columns = $Blog_columns - 1; }
                elseif($Blog_columns == 2){ $Blog_columns = $Blog_columns; }elseif($Blog_columns == 1){ $Blog_columns = $Blog_columns; }
                $jquery_code .= "\n itemsDesktopSmall : [991,". esc_js($Blog_columns)."],\n";
                $jquery_code .= "\n itemsTablet: [767,2],itemsMobile : [480,1],\n";
                $jquery_code .= "\n navigation:true,pagination: false,stopOnHover:true,\n";
                $jquery_code .= "\n autoPlay : true });\n";
                $jquery_code .= "\n if(jQuery('.latest_blog_". esc_js($id)." .owl-controls.clickable').css('display') == 'none'){\n";
                $jquery_code .= "\n jQuery('.latest_blog_". esc_js($id)." .customNavigation').hide();\n";
                $jquery_code .= "\n }else{\n";
                $jquery_code .= "\n jQuery('.latest_blog_". esc_js($id)." .customNavigation').show();\n";
                $jquery_code .= "\n jQuery('.latest_blog_". esc_js($id)." .ttblog_next').click(function(){\n";
                $jquery_code .= "\n ttlatestblog.trigger('owl.next'); });\n";
                $jquery_code .= "\n jQuery('.latest_blog_". esc_js($id)." .ttblog_prev').click(function(){\n";
                $jquery_code .= "\n ttlatestblog.trigger('owl.prev'); });\n";
                $jquery_code .= "\n  } }); \n";
                wp_add_inline_script( 'bootstrapjs', $jquery_code );
		?>
		<?php echo $args['before_widget']; ?>
		
		<div class="row">
                <div id="latest_blog_<?php echo esc_attr($id); ?>" class="latest_blog_<?php echo esc_attr($id); ?> col-xs-12 padding_0">
                    <div class="box-heading">
                        <h3><?php if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?></h3>
                    </div>
                <div class="customNavigation">
                    <a class="btn prev ttblog_prev"></a>
                    <a class="btn next ttblog_next"></a>
                </div>
		<ul class="latestblog_wrap_<?php echo esc_attr($id); ?> latestblog-carousel latestblog-wrap list-unstyled">
		<?php 
                while ( $r->have_posts() ) : $r->the_post(); ?>
                <li>
	<div class="blog-content">
            <?php $content = get_the_content();
            $post_media = megashop_get_post_format_media();
            if (get_post_format() == 'video') {
                $is_shortcode = ( 0 === strpos($post_media, '[') );
                if ($post_media) {
                    $content = str_replace($post_media, '', $content);
                }
                if ($post_media) {
                    if ($is_shortcode) {
                        $post_media = do_shortcode($post_media);
                    } else {
                        $post_media = '<div class="video-container">' . wp_oembed_get($post_media) . '</div>';
                    }
                   echo $post_media;
                }
            } elseif (get_post_format() == 'audio') {
                $is_shortcode = ( 0 === strpos($post_media, '[') );
                if (0 === strpos($post_media, '[playlist') || !$is_shortcode) {
                    $display_image = false;
                }
                if ($post_media && $is_shortcode) {
                    $content = str_replace($post_media, '', $content);
                }
                if (has_post_thumbnail() && $display_image) {
                    the_post_thumbnail();
                }
                if ($post_media && (!is_single() || $is_shortcode )) {
                    if ($is_shortcode) {
                        $post_media = do_shortcode($post_media);
                    } else {
                        $post_media = wp_oembed_get($post_media);
                    }
                     echo $post_media;
                }
            } elseif (get_post_format() == 'gallery') {
                if (!is_array($post_media)) {
                    $post_media = explode(',', $post_media);
                }
                if (is_array($post_media) && !empty($post_media)) {
                    echo '<div class="format-gallery"><div class="entry-media enable-slider flexslider"><ul class="slides">';
                    foreach ($post_media as $image_id) {
                        echo '<li><a href="' . esc_url(get_permalink()) . '" class="slide">' . wp_get_attachment_image(absint($image_id), $image_size) . '</a></li>';
                    }
                    echo '</ul></div></div>';
                }
            }elseif(get_post_format() == 'quote'){
                $content = preg_replace('/<(\/?)blockquote(.*?)>/', '', get_the_content());
            $quote_source = trim(get_post_meta(get_the_ID(), 'quote_source', true));
            if (empty($quote_source)) {
                $quote_source = strip_tags(get_the_title());
            }
            if ( false === stristr($content, '<cite') && $quote_source) {
                echo '<cite class="quote-source">' . $quote_source . '</cite>';
            }
            $content = explode('<cite', $content);
           echo '<blockquote class="quote-content">' . $content[0] . '</blockquote>';
            if (isset($content[1]) && $content[1]) {
                echo '<cite' . $content[1];
            }}elseif(has_post_thumbnail()){ ?>
            <div class="ttblog_image_holder blog_image_holder col-xs-12 col-sm-12 padding_0">
                    <a href="<?php echo esc_url(get_the_permalink()); ?>">
                        <?php
                        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'megashop-latest-blog');
                        $full = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                        $url = $thumb['0'];
                        ?>
                        <img class="image_thumb" src="<?php echo esc_url($url); ?>" alt="<?php _e('Latest Blog', 'megashop'); ?>" title="<?php _e('Latest Blog', 'megashop') ?>">
                        <div class="blog-hover"></div>
                    </a>
                    <span class="bloglinks">
                        <a class="icon zoom" data-lightbox="example-set" href="<?php echo esc_url($full[0]); ?>" title="<?php echo esc_html(get_the_title()); ?>">
                            <i class="fa fa-search"></i>
                        </a> 
                    </span>
                </div>
		<?php } ?>	
		<div class="blog-caption blog-sub-content col-xs-12 col-sm-12 padding_0">
			<?php if($show_comment == 'true' || $show_date == 'true'){
                       ?>
			<div class="col-xs-12 padding_0">
                            <?php  if($show_date == 'true'){ ?>
                            <span class="blog-date" style="display: block">
				<i class="fa fa-calendar"></i>
                                <span class="date"><?php echo get_the_date('d'); ?></span>
				<span class="month"><?php echo get_the_date('M, Y'); ?></span>
			</span>
                            <?php } $num_comments = get_comments_number(get_the_ID()); // get_comments_number returns only a numeric value
                            if($show_comment == 'true'){ ?> <div class="comment" style="display: block"> <?php
                            if ( comments_open() ) {
                                    if ( $num_comments == 0 ) {
                                            $comments = esc_html__('0 Comments','megashop');
                                    } elseif ( $num_comments > 1 ) {
                                            $comments = $num_comments . __(' Comments','megashop');
                                    } else {
                                            $comments = esc_html__('1 Comment', 'megashop');
                                    }
                                   echo  $write_comments = '<a href="' . get_comments_link() .'"><i class="fa fa-comments-o"></i> '. $comments.'</a>';
                            } else {
                                   echo $write_comments =  esc_html__('Comments are off for this post.','megashop');
                            } ?> </div><?php } ?>
                           
                        </div>
                    <?php } ?>
                    <div class="col-xs-12 padding_0">
			<h5 class="post_title">
                            <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a></h5>
			<p class="blog-description">
                                    <?php
                                        $content_legth = 12;
                                    $trimexcerpt = wp_trim_excerpt();
                                    $shortexcerpt = wp_trim_words($trimexcerpt, $content_legth, '..<div class="continue_read"><a href="' . esc_url(get_the_permalink()) . '" class="read-more">' . esc_html__('Read More', 'megashop') . '</a></div>');
                                    echo $shortexcerpt;
                                    ?>
                        </p>
                    </div>
								
		</div>
	</div>
	</li>
		<?php endwhile; 
                 wp_reset_postdata();
                ?>
		</ul>
                </div>
                </div>
		<?php echo $args['after_widget']; ?>
		<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;
	}

	/**
	 * Handles updating the settings for the current Blog Posts widget instance.
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		if ( in_array( $new_instance['Blog_columns'], array( '1_column', '2_column', '3_column' ) ) ) {
			$instance['Blog_columns'] = $new_instance['Blog_columns'];
		} else {
			$instance['Blog_columns'] = '1_column';
		}
		$instance['show_comment'] = isset( $new_instance['show_comment'] ) ? (bool) $new_instance['show_comment'] : false;
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		return $instance;
	}

	/**
	 * Outputs the settings form for the Blog Posts widget.
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$Blog_columns    = isset( $instance['Blog_columns'] ) ? esc_attr( $instance['Blog_columns'] ) : '1_column';
		$show_comment = isset( $instance['show_comment'] ) ? (bool) $instance['show_comment'] : true;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : true;
		
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','megashop' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:','megashop' ); ?></label>
		<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>


		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'Blog_columns' ) ); ?>"><?php _e( 'Blog Columns:','megashop' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'Blog_columns' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'Blog_columns' ) ); ?>" class="widefat">
				<option value="1_column"<?php selected( $Blog_columns, '1_column' ); ?>><?php _e('1 Column','megashop'); ?></option>
				<option value="2_column"<?php selected( $Blog_columns, '2_column' ); ?>><?php _e('2 Columns','megashop'); ?></option>
                                <option value="3_column"<?php selected( $Blog_columns, '3_column' ); ?>><?php _e('3 Columns','megashop'); ?></option>
			</select>
		</p>
		
		<p><input class="checkbox" type="checkbox"<?php checked( $show_comment ); ?> id="<?php echo $this->get_field_id( 'show_comment' ); ?>" name="<?php echo $this->get_field_name( 'show_comment' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_comment' ); ?>"><?php _e( 'Display Blog Comment?','megashop' ); ?></label></p>
				
		<p><input class="checkbox" type="checkbox"<?php checked( '$show_date' ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display Blog Date?','megashop' ); ?></label></p>
		
<?php
	}
}
// Register and load the widget
	register_widget( 'TT_Widget_Blog' );