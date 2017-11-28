<?php
/**
 * Widget API: TT_Widget_Testimonials class
 *
 */
class TT_Widget_Testimonials extends WP_Widget {

	/**
	 * Sets up a new Recent Testimonials widget instance.
	 *
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_testimonial_entries',
			'description' => esc_html__( 'Display Testimonials.','megashop' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'testimonial-posts', esc_html__( 'TT Testimonials.','megashop' ), $widget_ops );
		$this->alt_option_name = 'widget_testimonial_entries';
	}

	/**
	 * Outputs the content for the current testimonial Posts widget instance.
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current testimonial Posts widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$id = rand();

		$testimonial_columns = empty( $instance['testimonial_columns'] ) ? '1_column' : $instance['testimonial_columns'];
		$show_designation = isset( $instance['show_designation'] ) ? $instance['show_designation'] : false;
		$show_thumbnail = isset( $instance['show_thumbnail'] ) ? $instance['show_thumbnail'] : false;
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number )
			$number = 5;

		/**
		 * Filters the arguments for the Testimonials Posts widget.
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args An array of arguments used to retrieve the recent posts.
		 */
		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'post_type'         => 'testimonial',
			'ignore_sticky_posts' => true
		) ) );

		if ($r->have_posts()) :
		if($testimonial_columns == '1_column'){
			$testimonial_columns = 1;
		}elseif($testimonial_columns == '2_column'){
			$testimonial_columns = 2;
		}
		elseif($testimonial_columns == '3_column'){
			$testimonial_columns = 3;
		}
                
                $jquery_code = "";                
                $jquery_code .= "\n jQuery(document).ready(function () {";
                $jquery_code .= "\n jQuery('.testimonial_wrap_". esc_js($id)."').owlCarousel({\n";
                $jquery_code .= "\n items : ". esc_js($testimonial_columns).",\n";
                $jquery_code .= "\n itemsDesktop : [1200," .esc_js($testimonial_columns)."],\n";
                $jquery_code .= "\n itemsDesktopSmall : [991,1],\n";
                $jquery_code .= "\n itemsTablet: [767,1],itemsMobile : [480,1],\n";
                $jquery_code .= "\n navigation:true,pagination: false,stopOnHover:true,\n";
                $jquery_code .= "\n autoPlay : true });\n";
                $jquery_code .= "\n }); \n";
                wp_add_inline_script( 'bootstrapjs', $jquery_code );
		?>
		<?php echo $args['before_widget']; ?>
		<?php if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?>
                <div class="testimonial_slider_wrap">
                <ul class="padding_0 testimonial_slider testimonial_wrap_<?php echo esc_attr($id); ?>">
		<?php while ( $r->have_posts() ) : $r->the_post(); ?>
			<li><div class="testimonial-image">
			<?php if ( $show_thumbnail ) : 
					if( has_post_thumbnail() ){ ?>
						<img src="<?php esc_url(the_post_thumbnail_url()); ?>" alt="<?php echo esc_html(get_the_title()); ?>"/>
                        <?php     } 
				endif;
			?></div>
				<div class="testimonial-user-title"><h3><?php the_title(); ?></h3>
			<?php if ( $show_designation ) : ?>
				<span class="tttestimonial-subtitle "><?php echo esc_html(get_post_meta(get_the_ID(),'testimonial_designation',true)); ?></span>
			<?php endif; ?>
			</div>
                            <div class="testimonial-content">
					<div class="testimonial-desc">
					<?php the_content(); ?>
					</div>
			</div>
                        </li>
		<?php endwhile; 
                        wp_reset_postdata();
                ?>
		</ul>
                </div>
		<?php echo $args['after_widget']; ?>
		<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;
	}

	/**
	 * Handles updating the settings for the current Testimonial Posts widget instance.
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
		if ( in_array( $new_instance['testimonial_columns'], array( '1_column', '2_column', '3_column' ) ) ) {
			$instance['testimonial_columns'] = $new_instance['testimonial_columns'];
		} else {
			$instance['testimonial_columns'] = '1_column';
		}
		$instance['show_thumbnail'] = isset( $new_instance['show_thumbnail'] ) ? (bool) $new_instance['show_thumbnail'] : false;
		$instance['show_designation'] = isset( $new_instance['show_designation'] ) ? (bool) $new_instance['show_designation'] : false;
		return $instance;
	}

	/**
	 * Outputs the settings form for the Testimonial Posts widget.
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$testimonial_columns    = isset( $instance['testimonial_columns'] ) ? esc_attr( $instance['testimonial_columns'] ) : '1_column';
		$show_designation = isset( $instance['show_designation'] ) ? (bool) $instance['show_designation'] : true;
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_thumbnail = isset( $instance['show_thumbnail'] ) ? (bool) $instance['show_thumbnail'] : true;
?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','megashop' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:','megashop' ); ?></label>
		<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>


		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'testimonial_columns' ) ); ?>"><?php _e( 'Testimonial Columns:','megashop' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'testimonial_columns' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'testimonial_columns' ) ); ?>" class="widefat">
				<option value="1_column"<?php selected( $testimonial_columns, '1_column' ); ?>><?php _e('1 Column','megashop'); ?></option>
				<option value="2_column"<?php selected( $testimonial_columns, '2_column' ); ?>><?php _e('2 Columns','megashop'); ?></option>
				<option value="3_column"<?php selected( $testimonial_columns, '3_column' ); ?>><?php _e( '3 Columns','megashop' ); ?></option>
			</select>
		</p>
		
		<p><input class="checkbox" type="checkbox"<?php checked( $show_designation ); ?> id="<?php echo $this->get_field_id( 'show_designation' ); ?>" name="<?php echo $this->get_field_name( 'show_designation' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_designation' ); ?>"><?php _e( 'Display Testimonial designation?','megashop' ); ?></label></p>
		<p><input class="checkbox" type="checkbox"<?php checked( $show_thumbnail ); ?> id="<?php echo $this->get_field_id( 'show_thumbnail' ); ?>" name="<?php echo $this->get_field_name( 'show_thumbnail' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_thumbnail' ); ?>"><?php _e( 'Display Testimonial feature image?','megashop' ); ?></label></p>
<?php
	}
}
// Register and load the widget
function wpb_load_widget() {
	register_widget( 'TT_Widget_Testimonials' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
