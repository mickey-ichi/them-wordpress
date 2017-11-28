<?php

/**
 * Widget API: TT_Flickr_Widget class
 *
 */
class TT_Flickr_Widget extends WP_Widget {

    /**
     * @access public
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'widget_flicker_entries',
            'description' => esc_html__('Display Flicker Photos.','megashop'),
            'customize_selective_refresh' => true,
        );
        parent::__construct('flickerphotos', esc_html__('TT Flicker Photos','megashop'), $widget_ops);
        $this->alt_option_name = 'widget_flicker_entries';
    }

    /**
     * @access public
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     */
    public function widget($args, $instance) {
        if (!isset($args['widget_id'])) {
            $args['widget_id'] = $this->id;
        }

        $title = (!empty($instance['title']) ) ? $instance['title'] : '';

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters('widget_title', $title, $instance, $this->id_base);
        $fli_type = isset($instance['type']) ? esc_attr($instance['type']) : 'user';
        $fli_id = isset($instance['id']) ? esc_attr($instance['id']) : '';
        $fli_number = isset($instance['number']) ? esc_attr($instance['number']) : '';

        echo $args['before_widget'];
        echo $args['before_title'] . $title . $args['after_title'];
        ?>
        <div id="flickr-widget" class="flicker_wrap">

            <?php if ($fli_type == 'user'): ?>
                <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $fli_number; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $fli_id; ?>"></script>
            <?php else: ?>
                <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $fli_number; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=group&amp;group=<?php echo $fli_id; ?>"></script>
            <?php endif; ?>

            <span class="flickrmore"><small><a style="font-weight: normal; letter-spacing: normal; font-size: 11px;" href="http://www.flickr.com/photos/<?php echo "$fli_id"; ?>"><?php _e("More in Flickr &raquo;", 'megashop'); ?></a></small></span>
        </div>

        <?php
        /**
         * Filters the arguments for the Recent Posts widget.
         *
         */
        echo $args['after_widget'];
        ?>
        <?php
        // Reset the global $the_post as this query will have stomped on it
    }

    /**
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Updated settings to save.
     */
    public function update($new_instance, $old_instance) {
        return $new_instance;
    }

    /**
     *
     * @param array $instance Current settings.
     */
    public function form($instance) {

        // Get the options into variables, escaping html characters on the way
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $fli_type = isset($instance['type']) ? esc_attr($instance['type']) : 'user';
        $fli_id = isset($instance['id']) ? esc_attr($instance['id']) : '';
        $fli_number = isset($instance['number']) ? esc_attr($instance['number']) : '';
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'megashop'); ?>:
                <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" class="widefat" value="<?php echo $title; ?>" /></label></p>

        <p>
            <label for="<?php echo $this->get_field_id('type'); ?>"><?php _e('Flickr Type:', 'megashop'); ?></label>
            <select id="<?php echo $this->get_field_id('type'); ?>" name="<?php echo $this->get_field_name('type'); ?>">
                <option<?php if ($fli_type == 'user') {
            echo " selected='selected'";
        } ?> name="<?php echo $this->get_field_name('type'); ?>" value="user"><?php _e('user', 'megashop'); ?></option>
                <option<?php if ($fli_type == 'group') {
            echo " selected='selected'";
        } ?> name="<?php echo $this->get_field_name('type'); ?>" value="group"><?php _e('group', 'megashop'); ?></option>
            </select>
        </p>


        <p>
            <label for="<?php echo $this->get_field_id('id'); ?>"><?php _e('Flickr ID', 'megashop'); ?>(<a target="_blank" href="http://www.idgettr.com">idGettr</a> ex: 52617155@N08):
                <input id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" type="text" class="widefat" value="<?php echo $fli_id; ?>" /></label></p>


        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of photos:', 'megashop'); ?>
                <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" class="widefat" value="<?php echo $fli_number; ?>" /></label></p>

        <?php
    }

}

// Register and load the widget
register_widget('TT_Flickr_Widget');