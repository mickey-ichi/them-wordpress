<?php
/**
 * Widget API: TT_Widget_LatestBlog class
 *
 */

class TT_Widget_LatestBlog extends WP_Widget {

	/**
	 * Sets up a new Recent Posts widget instance.
	 *
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_latestblog_entries',
			'description' => esc_html__( 'Display Latest Blog lists.','megashop' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'latestblog-widget', esc_html__( 'TT Latest Blog Lists' ,'megashop'), $widget_ops );
		$this->alt_option_name = 'widget_latestblog_entries';
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

		$show_comment = isset( $instance['show_comment'] ) ? $instance['show_comment'] : false;
		$show_author = isset( $instance['show_author'] ) ? $instance['show_author'] : false;
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
		
		?>
		
		<?php echo $args['before_widget']; ?>
		<?php if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?>
		<div class="Blog_wrap_list">
		<?php while ( $r->have_posts() ) : $r->the_post(); ?>
			<div class="blog_list">			
			<?php
					if( has_post_thumbnail() ){ ?>
					<div class="col-md-3 padding_0"><?php
						the_post_thumbnail('megashop-latest-blog-list'); ?>
						</div>
						<?php
					}
					if( has_post_thumbnail() ){ 
					$class = 'col-md-9 padding_right_0';
					}else{
					$class = 'col-md-12 padding_0';
					}
			?>
			
			<div class="<?php echo esc_attr($class); ?>">
			<h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a></h3>
				<div class="blogmeta">
				<?php if($show_author){
					?><div class="b_author"><i class="fa fa-user"> </i> <?php echo  get_the_author(); ?>
				</div><?php }  ?> <?php				
					if ( $show_comment && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
						?> <div class="b_comment"><i class="fa fa-comment"> </i><?php echo '<span class="comments-link">';
						comments_popup_link( sprintf( __( ' Leave a comment<span class="screen-reader-text"> on %s</span>', 'megashop' ), get_the_title() ) );
						echo '</span> </div>';
					} ?><?php
					if($show_date){ ?>
					  <div class="b_date"><i class="fa fa-calendar"> </i> <?php echo get_the_date(); ?></div>	<?php
					}
				?>                                			
			</div>
			</div>
			</div>
		<?php endwhile; ?>
		</div>
		<?php echo $args['after_widget']; ?>
		<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;
	}

	/**
	 * Handles updating the settings for the current Blog Posts widget instance.
	 *	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_comment'] = isset( $new_instance['show_comment'] ) ? (bool) $new_instance['show_comment'] : false;
		$instance['show_author'] = isset( $new_instance['show_author'] ) ? (bool) $new_instance['show_author'] : false;
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
		$show_comment = isset( $instance['show_comment'] ) ? (bool) $instance['show_comment'] : true;
		$show_author = isset( $instance['show_author'] ) ? (bool) $instance['show_author'] : true;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','megashop' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:','megashop' ); ?></label>
		<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $show_comment ); ?> id="<?php echo $this->get_field_id( 'show_comment' ); ?>" name="<?php echo $this->get_field_name( 'show_comment' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_comment' ); ?>"><?php _e( 'Display Blog Comment?','megashop' ); ?></label></p>
		
		<p><input class="checkbox" type="checkbox"<?php checked( $show_author ); ?> id="<?php echo $this->get_field_id( 'show_author' ); ?>" name="<?php echo $this->get_field_name( 'show_author' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_author' ); ?>"><?php _e( 'Display Blog Author?','megashop' ); ?></label></p>
		
		<p><input class="checkbox" type="checkbox"<?php checked( '$show_date' ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display Blog Date?','megashop' ); ?></label></p>
		
<?php
	}
}
// Register and load the widget
	register_widget( 'TT_Widget_LatestBlog' );