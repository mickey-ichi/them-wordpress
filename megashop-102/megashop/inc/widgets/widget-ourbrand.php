<?php
/**
 * Widget API: TT_Widget_OurBrands class
 *
 */

class TT_Widget_OurBrands extends WP_Widget {

	/**
	 * Sets up a new Recent Posts widget instance.
	 *
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_ourbrand_entries',
			'description' => esc_html__( 'Display Our Brands.','megashop' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'ourbrand-posts', esc_html__( 'TT Our Brands','megashop' ), $widget_ops );
		$this->alt_option_name = 'widget_ourbrand_entries';
	}

	/**
	 * Outputs the content for the current Our Brand Posts widget instance.
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Recent Posts widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Our Brands','megashop' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$id = rand();

		$ourbrand_columns = empty( $instance['ourbrand_columns'] ) ? '1_column' : $instance['ourbrand_columns'];
		$show_newtab = isset( $instance['show_newtab'] ) ? $instance['show_newtab'] : false;
		

		/**
		 * Filters the arguments for the Recent Our Brand Posts widget.
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args An array of arguments used to retrieve the recent posts.
		 */
		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'post_type'         => 'ourbrand',
			'ignore_sticky_posts' => true
		) ) );

		if ($r->have_posts()) :
		if($ourbrand_columns == '1_column'){
			$ourbrand_columns = 1;
		}elseif($ourbrand_columns == '2_column'){
			$ourbrand_columns = 2;
		}
		elseif($ourbrand_columns == '3_column'){
			$ourbrand_columns = 3;
		}elseif($ourbrand_columns == '4_column'){
			$ourbrand_columns = 4;
		}
		elseif($ourbrand_columns == '5_column'){
			$ourbrand_columns = 5;
		}
                $jquery_code = "";                
                $jquery_code .= "\n jQuery(document).ready(function () { \n";
                $jquery_code .= "\n jQuery('.ourbrand_wrap_". esc_js($id)."').owlCarousel({\n";
                $jquery_code .= "\n items : ". esc_js($ourbrand_columns).",\n";
                $jquery_code .= "\n itemsDesktop : [1200,4],\n";
                $jquery_code .= "\n itemsDesktopSmall : [991,3],\n";
                $jquery_code .= "\n itemsTablet: [767,3],itemsMobile : [480,1],\n";
                $jquery_code .= "\n navigation:true,pagination: false,stopOnHover:true,\n";
                $jquery_code .= "\n autoPlay : true });\n";
                $jquery_code .= "\n if(jQuery('.our_brand_". esc_js($id)." .owl-controls.clickable').css('display') == 'none'){\n";
                $jquery_code .= "\n jQuery('.our_brand_". esc_js($id)." .customNavigation').hide();\n";
                $jquery_code .= "\n }else{\n";
                $jquery_code .= "\n jQuery('.our_brand_". esc_js($id)." .customNavigation').show();\n";
                $jquery_code .= "\n jQuery('.our_brand_". esc_js($id)." .ttmanufacturer_next').click(function(){\n";
                $jquery_code .= "\n jQuery('.our_brand_". esc_js($id)."').trigger('owl.next'); });\n";
                $jquery_code .= "\n jQuery('.our_brand_". esc_js($id)." .ttmanufacturer_prev').click(function(){\n";
                $jquery_code .= "\n jQuery('.our_brand_". esc_js($id)."').trigger('owl.prev'); });\n";
                $jquery_code .= "\n  } }); \n";
                wp_add_inline_script( 'bootstrapjs', $jquery_code );
		?>
		<?php echo $args['before_widget']; ?>
		
                <div class="row">
                <div class="our_brand col-xs-12 padding_0">
                <div id="ttbrandlogo" class="brand-carousel our_brand_<?php echo $id; ?>">
                    <div class="box-heading">
                       <?php if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
                        } ?>
                    </div>
                <div class="customNavigation">
                <a class="btn prev ttmanufacturer_prev"></a>
                <a class="btn next ttmanufacturer_next"></a>
                </div>
		<div class="ourbrand_wrap_<?php echo $id; ?> brand-carousel-wrap">
		<?php while ( $r->have_posts() ) : $r->the_post(); ?>
			<?php 
                                if(has_post_thumbnail()){ 
                                $brand_url = get_post_meta(get_the_ID(),'brand_url',true);
                                ?>
                    <div class="item">
                                <a href="<?php if(!empty($brand_url)){ echo esc_url($brand_url); }else{ echo '#';} ?>" <?php if($show_newtab == 'true' && !empty($brand_url)){ ?> target="_blank" <?php } ?>>
                                        <img src="<?php esc_url(the_post_thumbnail_url()); ?>" alt="<?php echo esc_html(get_the_title()); ?>"/>
                                </a>
                    </div>
                        <?php	} 
			?>
		<?php endwhile;
                 wp_reset_postdata(); ?>
		</div>
                </div>
                </div>
                </div>
		<?php echo $args['after_widget']; ?>
		<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;
	}

	/*
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		if ( in_array( $new_instance['ourbrand_columns'], array( '1_column', '2_column', '3_column', '4_column', '5_column' ) ) ) {
			$instance['ourbrand_columns'] = $new_instance['ourbrand_columns'];
		} else {
			$instance['ourbrand_columns'] = '1_column';
		}
		//$instance['show_thumbnail'] = isset( $new_instance['show_thumbnail'] ) ? (bool) $new_instance['show_thumbnail'] : false;
		$instance['show_newtab'] = isset( $new_instance['show_newtab'] ) ? (bool) $new_instance['show_newtab'] : false;
		return $instance;
	}

	/**
	 * Outputs the settings form for the our Brand Posts widget.
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$ourbrand_columns    = isset( $instance['ourbrand_columns'] ) ? esc_attr( $instance['ourbrand_columns'] ) : '1_column';
		$show_newtab = isset( $instance['show_newtab'] ) ? (bool) $instance['show_newtab'] : true;
?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','megashop' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'ourbrand_columns' ) ); ?>"><?php _e( 'Our Brans Columns:','megashop' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'ourbrand_columns' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'ourbrand_columns' ) ); ?>" class="widefat">
				<option value="1_column"<?php selected( $ourbrand_columns, '1_column' ); ?>><?php _e('1 Column','megashop'); ?></option>
				<option value="2_column"<?php selected( $ourbrand_columns, '2_column' ); ?>><?php _e('2 Columns','megashop'); ?></option>
				<option value="3_column"<?php selected( $ourbrand_columns, '3_column' ); ?>><?php _e( '3 Columns','megashop' ); ?></option>
				<option value="4_column"<?php selected( $ourbrand_columns, '4_column' ); ?>><?php _e( '4 Columns','megashop' ); ?></option>
				<option value="5_column"<?php selected( $ourbrand_columns, '5_column' ); ?>><?php _e( '5 Columns' ,'megashop'); ?></option>
			</select>
		</p>		
		<p><input class="checkbox" type="checkbox"<?php checked( $show_newtab ); ?> id="<?php echo $this->get_field_id( 'show_newtab' ); ?>" name="<?php echo $this->get_field_name( 'show_newtab' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_newtab' ); ?>"><?php _e( 'Open new tab brand url?','megashop' ); ?></label></p>
<?php
	}
}
// Register and load the widget
	register_widget( 'TT_Widget_OurBrands' );