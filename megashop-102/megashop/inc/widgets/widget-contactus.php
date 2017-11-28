<?php  // Reference:  http://codex.wordpress.org/Widgets_API
/**
 * Core class used to implement a Display Contact Us widget.
 */

class TT_ContactUsWidget extends WP_Widget
{
    function TT_ContactUsWidget(){
		$widget_settings = array('description' => esc_html__( 'TT Contact Us Widge.','megashop'  ), 'classname' => 'widgets-contactus');
		parent::__construct(false,$name= esc_html__( 'TT Contact Us Widge.','megashop'  ),$widget_settings);
    }
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_html__( 'Contact Us','megashop'  ) : $instance['title']);
		$text = empty($instance['text']) ? '' : $instance['text'];
		$address = empty($instance['address']) ? '' : $instance['address'];
		$email_title = empty($instance['email_title']) ? '' : $instance['email_title'];
		$linkURL = empty($instance['linkURL']) ? '' : $instance['linkURL'];
                $window_target = isset($instance['window_target']) ? $instance['window_target'] : false;
		$ph_no = empty($instance['ph_no']) ? '' : $instance['ph_no'];
		
                
                echo $args['before_widget']; 
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} 
		?> 
		<ul class="list-unstyled contact-footer ">
                    <li>
                        <div class="contact_wrapper">
                                <div class="address">
                                        <i class="fa fa-map-marker"></i>	
                                                <div class="address_content">
                                                        <?php if(!empty($text)) : ?>			
                                                                <div class="contact_title">
                                                                        <?php echo esc_attr($text); ?>
                                                                </div>
                                                        <?php endif; ?>
                                                        <?php if(!empty($address)) : ?>
                                                                <div class="contact_address"><?php echo esc_attr($address); ?></div>
                                                        <?php endif; ?>	
                                                </div>
                                </div>
                                <div class="phone">
                                        <i class="fa fa-phone"></i>
                                        <?php if(!empty($ph_no)) : ?>
                                                <div class="contact_phone"><?php echo esc_attr($ph_no); ?></div>
                                        <?php endif; ?>	
                                </div>
                        <div class="email">
                            <i class="fa fa-envelope-o "></i>
                            <?php if(!empty($email_title)) : ?>
                                    <div class="contact_email"><a href="<?php if($linkURL == ""): echo esc_url(home_url( '/' )) ; else:?>
                                            <?php echo esc_url($linkURL); endif;?>" <?php if($window_target == true) echo 'target="_blank"'; ?>>
                                            <?php echo esc_attr($email_title);  ?></a>
                                    </div>
                            <?php endif; ?>
                        </div>
                        </div>
                    </li>
		</ul>
		<?php
		echo $args['after_widget'];			
	}
    function update($new_instance, $old_instance){
		$instance = $old_instance;		
		$instance['window_target'] = false;
		$instance['is_template_path'] = false;
		if (isset($new_instance['window_target'])) $instance['window_target'] = true;
		if (isset($new_instance['is_template_path'])) $instance['is_template_path'] = true;
		$instance['title'] =($new_instance['title']);
		$instance['text'] =($new_instance['text']);
		$instance['address'] =($new_instance['address']);
		$instance['email_title'] =($new_instance['email_title']);
		$instance['linkURL'] = strip_tags($new_instance['linkURL']);
		$instance['ph_no'] =($new_instance['ph_no']);
		return $instance;
	}
    function form($instance){
		$instance = wp_parse_args( (array) $instance, array(
		'title'=>'Contact Us', 
		'text'=>'My Company Pvt Limited,',
		'address'=>'My Company, 42 Puffin street 12345 Puffinville France ', 
		'email_title'=>'sales@yourcompany.com',
		'linkURL'=>'#',
		'ph_no'=>'0123-456-789',
		'window_target'=> true) );	
		$title = esc_attr($instance['title']);
		$text = esc_attr($instance['text']);
		$address = esc_attr($instance['address']);
		$email_title = esc_attr($instance['email_title']);
		$ph_no = esc_attr($instance['ph_no']);
		$linkURL = esc_attr($instance['linkURL']);
		?>
		<p>
                    <label for="<?php echo esc_attr($this->get_field_id('title'));?>"><?php esc_html_e('Title:', 'megashop'); ?></label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title'));?>" name="<?php echo esc_attr($this->get_field_name('title'));?>" type="text" value="<?php echo esc_attr($title);?>" />
                </p>
		<p>
                    <label for="<?php echo esc_attr($this->get_field_id('text'));?>"><?php esc_html_e('Text:', 'megashop'); ?></label>
                    <textarea cols="18" rows="3" class="widefat" id="<?php echo esc_attr($this->get_field_id('text'));?>" name="<?php echo esc_attr($this->get_field_name('text'));?>" ><?php echo esc_attr($text);?></textarea>
                </p>
		<p>
                    <label for="<?php echo esc_attr($this->get_field_id('address'));?>"><?php esc_html_e('Address:', 'megashop'); ?></label>
                    <textarea cols="18" rows="3" class="widefat" id="<?php echo esc_attr($this->get_field_id('address'));?>" name="<?php echo esc_attr($this->get_field_name('address'));?>" ><?php echo esc_attr($address);?></textarea>
                </p>	
		<p>
                    <label for="<?php echo esc_attr($this->get_field_id('email_title'));?>"><?php esc_html_e('E-mail:', 'megashop'); ?></label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('email_title'));?>" name="<?php echo esc_attr($this->get_field_name('email_title'));?>" type="text" value="<?php echo esc_attr($email_title);?>" />
                </p>	
		<p>
                    <label for="<?php echo esc_attr($this->get_field_id('linkURL'));?>"><?php esc_html_e('Link URL:', 'megashop'); ?><br /></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('linkURL'));?>" name="<?php echo esc_attr($this->get_field_name('linkURL'));?>" type="text" value="<?php echo esc_attr($linkURL);?>" />
		<label>(e.g. mailto:sales@yourcompany.com.com)</label><br />
		<input class="checkbox" type="checkbox" <?php checked($instance['window_target'], true) ?> id="<?php echo esc_attr($this->get_field_id('window_target')); ?>" name="<?php echo esc_attr($this->get_field_name('window_target')); ?>" /><label for="<?php echo esc_attr($this->get_field_id('window_target')); ?>"><?php esc_html_e('Open Link In New Window', 'megashop'); ?></label></p>		
		<p>
                    <label for="<?php echo esc_attr($this->get_field_id('ph_no'));?>"><?php esc_html_e('Phone No:', 'megashop'); ?></label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('ph_no'));?>" name="<?php echo esc_attr($this->get_field_name('ph_no'));?>" type="text" value="<?php echo esc_attr($ph_no);?>" />
                </p>	
		<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("TT_ContactUsWidget");'));