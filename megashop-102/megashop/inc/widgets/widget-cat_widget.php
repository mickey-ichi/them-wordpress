<?php

/**
 * Core class used to implement a Display Category Block widget.
 *
 * @see TT_Add_new_Block
 */
class TT_Add_new_Block extends WP_Widget {

	/**
	 * Sets up a new Category Blocks widget instance.
	 *
	 * @access public
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_add_new_block',
			'description' => esc_html__( 'TT Display Category Blocks.','megashop'  ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'add_new_block-widget', esc_html__( 'TT Display Category Blocks','megashop' ), $widget_ops );
		$this->alt_option_name = 'widget_add_new_block';
	}

	/**
	 * Outputs the content for the current Category Blocks widget instance.
         * 
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';

		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
                $cat_title = $instance['cat_title'];
                $cat_link = $instance['cat_link'];                
		$cat_image = $instance['cat_image'];
                $total = count($cat_title);
		$id= rand();
		?>
		
		<?php echo $args['before_widget']; ?>
		<?php if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} 
                if(!empty($cat_title)){
                    $i = 0;
                    ?>
                        <div id="ttcategory">
                            <div class="ttcmscategory">
                            <div class="ttcategory-main">
                            <ul id="ttcategory-carousel" class="list-unstyled category_carousel<?php echo $id; ?>">
                                <?php
                        for ($i = 0; $i < $total; $i++) {
                            ?>                            
                            <li class="ttcategory inner">
                            <div class="tticon categoryimg">
                            <a href="<?php echo esc_url($cat_link[$i]); ?>"><img src="<?php echo esc_url($cat_image[$i]); ?>" alt="<?php echo esc_html($cat_title[$i]); ?>"></a>
                            </div>
                            <div class="tt-title"><?php echo esc_html($cat_title[$i]); ?></div>
                            </li>
                            
                            <?php
                        }
                        ?>
                            </ul>
                            </div>
                            </div>
                            <?php 
                                $jquery_code = "";                
                                $jquery_code .= "\n jQuery(document).ready(function () {";
                                $jquery_code .= "\n jQuery('.category_carousel". esc_js($id) ."').owlCarousel({\n";
                                $jquery_code .= "\n autoPlay : true,\n";
                                $jquery_code .= "\n  items :5,\n";
                                $jquery_code .= "\n  itemsDesktop : [1200,4], \n";
                                $jquery_code .= "\n itemsDesktopSmall : [991,4], \n";
                                $jquery_code .= "\n itemsTablet: [767,3], \n";
                                $jquery_code .= "\n itemsMobile : [480,2],navigation: false,pagination: false });\n";
                                $jquery_code .= "\n }); \n";
                                wp_add_inline_script( 'bootstrapjs', $jquery_code );                            
                            ?>
                            </div>
                            <?php
                }
                ?>
		<?php echo $args['after_widget'];
		// Reset the global $the_post as this query will have stomped on it
		
	}

	/**
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
                $instance['cat_title'] = $new_instance['cat_title'];
                $instance['cat_link'] = $new_instance['cat_link'];
                $instance['cat_image'] = $new_instance['cat_image'];	
		return $instance;
	}

	/**
	 *
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
                 $id = rand();
            $cat_title = isset( $instance['cat_title'] ) ?  $instance['cat_title'] : '';
            $cat_image = isset( $instance['cat_image'] ) ? $instance['cat_image'] : '';
            $cat_link = isset( $instance['cat_link'] ) ? $instance['cat_link'] : '';
        ?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','megashop' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
		
                <div class="wrap_<?php echo $id; ?>">
                    <div class="our_text">
                    <div class="cat_block">
                                    <div class="drag_icon"> 
                                        <div></div>
                                        <div></div>
                                        <div></div>                                        
                                    </div>
                    <p class="">
                        <label for=""><?php _e( 'Cat Title:','megashop' ); ?></label> 
                        <input class="widefat cat_title" id="" name="<?php echo $this->get_field_name( 'cat_title' ); ?>[]" type="text" value="<?php if(!empty($cat_title[0])) echo esc_attr($cat_title[0]); ?>">
                    </p>
                    <p class="">
                        <label for=""><?php _e( 'Cat Link:','megashop' ); ?></label> 
                        <input class="widefat cat_link" id="" name="<?php echo $this->get_field_name( 'cat_link' ); ?>[]" type="text" value="<?php if(!empty($cat_link[0])) echo esc_url($cat_link[0]); ?>">
                    </p>
                    <p class="image_div">
                        <label for=""><?php _e( 'Cat Image:','megashop' ); ?></label>
                        <input class="widefat image_input" id="" name="<?php echo $this->get_field_name( 'cat_image' ); ?>[]" type="text" value="<?php if(!empty($cat_image[0])) echo esc_url($cat_image[0]); ?>" />
                        <input type="button" class="button secondary upload_image" value="upload"/>
                        <span class="image_wrap">
                        <?php if(!empty($cat_image[0])){ ?>
                        <img src="<?php echo $cat_image[0];  ?>" >
                        <a class="remove-image">remove</a>		
                        <?php } ?>		
                        </span>
                        </p>
                    </div>
                        <?php
                        $total = count($cat_image);
                        $i = 1;
                        for ($i = 1; $i < $total; $i++) {
                            if ($cat_title[$i] != "") {
                                ?>
                                <div class="cat_block">
                                    <div class="drag_icon"> 
                                        <div></div>
                                        <div></div>
                                        <div></div>                                        
                                    </div>
                                    <p class="">
                                        <label for=""><?php _e('Cat Title:','megashop'); ?></label> 
                                        <input class="widefat" id="" name="<?php echo $this->get_field_name('cat_title'); ?>[]" type="text" value="<?php if (!empty($cat_title[$i])) echo esc_attr($cat_title[$i]); ?>">
                                    </p>
                                    <p class="">
                                        <label for=""><?php _e('Cat Link:','megashop'); ?></label> 
                                        <input class="widefat" id="" name="<?php echo $this->get_field_name('cat_link'); ?>[]" type="text" value="<?php if (!empty($cat_link[$i])) echo esc_url($cat_link[$i]); ?>">
                                    </p>
                                    <p class="image_div">
                                    <label for="<?php echo $this->get_field_id( 'cat_image' ); ?>"><?php _e( 'Cat Image:','megashop' ); ?></label>
                                    <input class="widefat" id="" name="<?php echo $this->get_field_name( 'cat_image' ); ?>[]" type="text" value="<?php if (!empty($cat_image[$i])) echo esc_url($cat_image[$i]); ?>" />
                                    <input type="button" class="button secondary upload_image" value="upload"/>
                                    <span class="image_wrap">
                                    <?php if(!empty($cat_image[$i])){ ?>
                                    <img src="<?php echo $cat_image[$i];  ?>" >
                                    <a class="remove-image">remove</a>		
                                    <?php } ?>		
                                    </span>
                                    </p>
                                    <input type="button" class="remove_div" value="<?php _e('Remove', 'megashop'); ?>">
                                </div>
                                    
                                <?php
                            }
                        }
                        ?>
                </div>
                <input type="button" class="addnew_div" value="<?php _e('Add New','megashop'); ?>">
                </div>
                 <script type="text/javascript">
                    jQuery(document).ready(function(){
                    var total = jQuery(".wrap_<?php echo esc_js($id); ?> .cat_block").length;
                        total = total + 1;
                    jQuery(".wrap_<?php echo esc_js($id); ?> .addnew_div").on('click', function() {
                        var s_title = jQuery(this).parent().find('.cat_title').attr('name');
                        var s_link = jQuery(this).parent().find('.cat_link').attr('name');
                        var cat_image = jQuery(this).parent().find('.image_input').attr('name');
                        var textap = ' ';
                        textap +='<div class="cat_block"><div class="drag_icon"><div></div><div></div><div></div></div>';
                        textap +='<p class=""><label for=""><?php _e( 'Cat Title:','megashop'); ?></label>'; 
                        textap +='<input class="widefat" id="" name="'+ s_title +'" type="text"></p>';
                        textap +='<p class=""><label for=""><?php _e( 'Cat Link:','megashop'); ?></label>'; 
                        textap +='<input class="widefat" id="" name="'+ s_link +'" type="text"></p>';
                        textap +='<p class="image_div"><label for=""><?php _e( 'Cat image:' ,'megashop'); ?></label>'; 
                        textap +='<input class="widefat image_input" id="" name="'+cat_image+'" type="text" value="" /><input type="button" class="button secondary upload_image" value="upload"/><span class="image_wrap"></span></p>';
                        textap +='<input type="button" class="remove_div" value="<?php _e('Remove','megashop'); ?>"></div>';   
                        jQuery('.wrap_<?php echo esc_js($id); ?> .our_text').append(textap);   
                        total++;
                    });
                    jQuery( ".our_text" ).sortable({ handle: '.drag_icon' });

                    jQuery(".wrap_<?php echo esc_js($id); ?> .remove_div").live('click', function() {
                    jQuery(this).parent().remove();                    
                    });
                });
            </script>		
<?php
	}
}
function register_TT_Add_new_Block() {
    register_widget( 'TT_Add_new_Block' );
}
add_action( 'widgets_init', 'register_TT_Add_new_Block' );