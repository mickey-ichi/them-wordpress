<?php
/**
 * Widget API: TT_Widget_Products class
 *
 */

class TT_Widget_Products_Type extends WP_Widget {

	/**
	 * Sets up a new Products Posts widget instance.
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_tt_woo_products_entries',
			'description' => esc_html__( 'Display Products.','megashop' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'tt-woo-products', esc_html__( 'TT Woocommerce Products','megashop' ), $widget_ops );
		$this->alt_option_name = 'widget_tt_woo_products_entries';
	}

	/**
	 * Outputs the content for the current Products Posts widget instance.
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Products Posts widget instance.
	 */
	public function widget( $argsm, $instance ) {
		if ( ! isset( $argsm['widget_id'] ) ) {
			$argsm['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$id = rand();

		$Products_columns = empty( $instance['Products_columns'] ) ? '1_column' : $instance['Products_columns'];
                $Products_type = empty( $instance['Products_type'] ) ? 'recent_products' : $instance['Products_type'];
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
                $autoslide_speed = ( ! empty( $instance['autoslide_speed'] ) ) ? absint( $instance['autoslide_speed'] ) : 1000;
                $show_autoslide = isset( $instance['show_autoslide'] ) ? $instance['show_autoslide'] : false;
		if ( ! $number )
			$number = 5;
                global $woocommerce;

		/**
		 * Filters the arguments for the Products Posts widget.
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args An array of arguments used to retrieve the recent posts.
		 */
		
                if($Products_type == 'featured_products'){
                    $args = array(
			'post_type' => 'product',
                        'meta_key' => '_featured',  
                        'meta_value' => 'yes', 
                        'post_status'         => 'publish',
			'posts_per_page' => $number
			);
                }elseif($Products_type == 'best_selling_products'){
                    $args = array(
                            'post_type'           => 'product',
                            'post_status'         => 'publish',
                            'posts_per_page'      => $number,
                            'meta_key'            => 'total_sales',
                            'orderby'             => 'meta_value_num',
                    );	
                }elseif($Products_type == 'top_rated_products'){
                    
                     add_filter( 'posts_clauses',  array( $woocommerce->query, 'order_by_rating_post_clauses' ) );

                    $args = array('posts_per_page' => $number, 'post_status' => 'publish', 'post_type' => 'product' );

                    $args['meta_query'] = array();

                    $args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
                    $args['meta_query'][] = $woocommerce->query->visibility_meta_query();
                    
                }elseif($Products_type == 'sale_products'){
                    
                     $args = array(
                        'post_type'      => 'product',                         
                        'post_status'         => 'publish',
			'posts_per_page' => $number,
                        'meta_query'     => array(
                            'relation' => 'OR',
                            array( // Simple products type
                                'key'           => '_sale_price',
                                'value'         => 0,
                                'compare'       => '>',
                                'type'          => 'numeric'
                            ),
                            array( // Variable products type
                                'key'           => '_min_variation_sale_price',
                                'value'         => 0,
                                'compare'       => '>',
                                'type'          => 'numeric'
                            )
                        )
                    );
                    
                }elseif ($Products_type == 'recent_products' ) {
                    $args = array(
			'post_type' => 'product',
                        'orderby'     => 'date',
                        'post_status'         => 'publish',
			'posts_per_page' => $number
			);
                }
               
		$loop = new WP_Query( $args );

		if ($loop->have_posts()) :
		if($Products_columns == '1_column'){
			$Products_columns = 1;
		}elseif($Products_columns == '2_column'){
			$Products_columns = 2;
		}
                elseif($Products_columns == '3_column'){
			$Products_columns = 3;
		}
                elseif($Products_columns == '4_column'){
			$Products_columns = 4;
		}
                if($show_autoslide){
                    $show_autoslide = 'true';
                }else{
                    $show_autoslide = 'false';
                }
                $theme_layout = of_get_option('theme_layout');
                if($theme_layout == 'both_sidebar_layout'){
                    $product_col = 2;
                }else{
                    $product_col = 3;
                }
                $jquery_code = "";                
                $jquery_code .= "\n jQuery(document).ready(function () {var ttfeature = jQuery('.Products_wrap_". esc_js($id)."');\n";
                $jquery_code .= "\n jQuery('.Products_wrap_". esc_js($id)."').owlCarousel({\n";
                $jquery_code .= "\n items : ". esc_js($Products_columns).",\n";
                $jquery_code .= "\n itemsDesktop : [1200," .esc_js($product_col)."],\n";
                $jquery_code .= "\n itemsDesktopSmall : [991,". esc_js($product_col)."],\n";
                $jquery_code .= "\n itemsTablet: [767,2],itemsMobile : [480,1],\n";
                $jquery_code .= "\n navigation:true,pagination: false,stopOnHover:true,\n";
                $jquery_code .= "\n autoPlay : ".esc_js($show_autoslide).", slideSpeed: ".esc_js($autoslide_speed)." });\n";
                $jquery_code .= "\n if(jQuery('.Products_wrap_".esc_js($id)." .owl-controls.clickable').css('display') == 'none'){\n";
                $jquery_code .= "\n jQuery('.products_wrap_".esc_js($id)." .customNavigation').hide();\n";
                $jquery_code .= "\n }else{\n";
                $jquery_code .= "\n jQuery('.products_wrap_". $id." .customNavigation').show();\n";
                $jquery_code .= "\n jQuery('.tt".esc_js($Products_type)."_".esc_js($id)."_next').click(function(){\n";
                $jquery_code .= "\n jQuery('.Products_wrap_". $id."').trigger('owl.next'); });\n";
                $jquery_code .= "\n jQuery('.tt".esc_js($Products_type)."_".esc_js($id)."_prev').click(function(){\n";
                $jquery_code .= "\n jQuery('.Products_wrap_".esc_js($id)."').trigger('owl.prev'); });\n";
                $jquery_code .= "\n  } }); \n";
                wp_add_inline_script( 'bootstrapjs', $jquery_code );
		?>
		
		<?php echo $argsm['before_widget']; ?>
                
		<?php if ( $title ) {
			echo $argsm['before_title'] . $title . $argsm['after_title'];
		} ?>
                <div class="woocommerce products_block padding_0 woo_product products_wrap_<?php echo esc_attr($id); ?>">
                    <div class="customNavigation">
                        <a class="btn prev tt<?php echo $Products_type.'_'. $id; ?>_prev"><?php _e('prev','megashop'); ?></a>
                        <a class="btn next tt<?php echo $Products_type.'_'. $id; ?>_next"><?php _e('next','megashop'); ?></a>
                    </div>
		<ul class="tt-carousel Products_wrap_<?php echo $id; ?>">
                            <?php $loop1 = new WP_Query($args);
                                    $cnt = 1;
                                    $found_posts = $loop1->found_posts;
                                    while ($loop1->have_posts()) : $loop1->the_post();
                                        if (($found_posts >= $Products_columns * 2) && ($number >= ($Products_columns * 2))) {
                                            if ($cnt % 2 != 0) {
                                            echo "<li><ul class='single-column'>";
                                            }
                                        }
                                        $content = return_get_template_part('woocommerce/content', 'product');
                                        echo $content;
                                        if (($found_posts >= $Products_columns * 2) && ($number >= ($Products_columns * 2))) {
                                            if ($cnt % 2 == 0) {
                                                echo '</ul></li>';
                                            }
                                        }
                                        $cnt++;
                                    endwhile;    
                                    if(($found_posts > $Products_columns * 2) && ($number > ($Products_columns * 2))) { if($cnt % 2 == 0) { echo '</li></ul>'; } } 
                                    ?>
		</ul>
                </div>
		<?php echo $argsm['after_widget']; ?>
		<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;
	}

	/**
	 * Handles updating the settings for the current Products Posts widget instance.
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
                $instance['autoslide_speed'] = (int) $new_instance['autoslide_speed'];
		if ( in_array( $new_instance['Products_columns'], array( '1_column', '2_column','3_column', '4_column' ) ) ) {
			$instance['Products_columns'] = $new_instance['Products_columns'];
		} else {
			$instance['Products_columns'] = '4_column';
		}
                if ( in_array( $new_instance['Products_type'], array( 'recent_products', 'featured_products','best_selling_products', 'top_rated_products','sale_products' ) ) ) {
			$instance['Products_type'] = $new_instance['Products_type'];
		} else {
			$instance['Products_type'] = 'recent_products';
		}
                $instance['show_autoslide'] = isset( $new_instance['show_autoslide'] ) ? (bool) $new_instance['show_autoslide'] : false;
		return $instance;
	}

	/**
	 * Outputs the settings form for the Products Posts widget.
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$Products_columns    = isset( $instance['Products_columns'] ) ? esc_attr( $instance['Products_columns'] ) : '4_column';
                $Products_type    = isset( $instance['Products_type'] ) ? esc_attr( $instance['Products_type'] ) : 'recent_products';
		$show_autoslide = isset( $instance['show_autoslide'] ) ? (bool) $instance['show_autoslide'] : true;
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
                $autoslide_speed    = isset( $instance['autoslide_speed'] ) ? absint( $instance['autoslide_speed'] ) : 1000;
?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','megashop' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of products to show:','megashop' ); ?></label>
		<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>


		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'Products_type' ) ); ?>"><?php _e( 'Products Type:','megashop' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'Products_type' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'Products_type' ) ); ?>" class="widefat">
				<option value="recent_products"<?php selected( $Products_type, 'recent_products' ); ?>><?php _e('Recent Products','megashop'); ?></option>
				<option value="featured_products"<?php selected( $Products_type, 'featured_products' ); ?>><?php _e('Featured Products','megashop'); ?></option>
                                <option value="best_selling_products"<?php selected( $Products_type, 'best_selling_products' ); ?>><?php _e('Best-Selling Products','megashop'); ?></option>
				<option value="top_rated_products"<?php selected( $Products_type, 'top_rated_products' ); ?>><?php _e('Top Rated Products ','megashop'); ?></option>
                                <option value="sale_products"<?php selected( $Products_type, 'sale_products' ); ?>><?php _e('Sale Products ','megashop'); ?></option>
			</select>
		</p>
                <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'Products_columns' ) ); ?>"><?php _e( 'Products Columns:','megashop' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'Products_columns' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'Products_columns' ) ); ?>" class="widefat">
				<option value="1_column"<?php selected( $Products_columns, '1_column' ); ?>><?php _e('1 Column','megashop'); ?></option>
				<option value="2_column"<?php selected( $Products_columns, '2_column' ); ?>><?php _e('2 Columns','megashop'); ?></option>
                                <option value="3_column"<?php selected( $Products_columns, '3_column' ); ?>><?php _e('3 Column','megashop'); ?></option>
				<option value="4_column"<?php selected( $Products_columns, '4_column' ); ?>><?php _e('4 Columns','megashop'); ?></option>
			</select>
		</p>
                <p><input class="checkbox" type="checkbox"<?php checked( $show_autoslide ); ?> id="<?php echo $this->get_field_id( 'show_autoslide' ); ?>" name="<?php echo $this->get_field_name( 'show_autoslide' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_autoslide' ); ?>"><?php _e( 'Display Slider Auto slide?','megashop' ); ?></label></p>
                
                <p class="slide_speed"><label for="<?php echo $this->get_field_id( 'autoslide_speed' ); ?>"><?php _e( 'Slide Speed:','megashop' ); ?></label>
		<input class="tiny-text" id="<?php echo $this->get_field_id( 'autoslide_speed' ); ?>" name="<?php echo $this->get_field_name( 'autoslide_speed' ); ?>" type="number" step="" min="" value="<?php echo $autoslide_speed; ?>" size="6" /></p>
		
<?php
	}
}
// Register and load the widget
	register_widget( 'TT_Widget_Products_Type' );