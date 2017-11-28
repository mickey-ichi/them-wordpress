<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'options-framework-theme';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'megashop'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {
        
        // Background Defaults
	$background_defaults = array(
		'color' => '#ffffff',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

        $options_sidebar = array();
	global $wp_registered_sidebars;
	foreach ( $wp_registered_sidebars as $sidebar ) {
		$options_sidebar[$sidebar['id']] = array( 'value' => $sidebar['name'] );
	}
	
	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = array( 'value' => esc_html__( 'Select a page:', 'megashop' ));
	foreach ($options_pages_obj as $page) {
		$post_title = $page->post_title;
		$options_pages[$page->ID] = array( 'value' => $post_title);
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();
                
          /* Generel section settings */
        $options[] = array(
		'name' => esc_html__( 'General Settings', 'megashop' ),
		'type' => 'heading'
	);
        $options[] = array(
		'name' => esc_html__( 'Display Pre-loader', 'megashop' ),
		'desc' => esc_html__( 'display Preloder image, defaults to true.', 'megashop' ),
		'id' => 'display_preloader',
                'blockids' => 'pre_loader,preloader_bg_color',
		'std' => '1',
		'type' => 'checkbox'
	);

        $options[] = array(
		'name' => esc_html__( 'Upload Pre-loader image', 'megashop' ),
		'desc' => esc_html__( 'Upload pre-loader image for display pre load site.', 'megashop' ),
		'id' => 'pre_loader',
                'std' => $imagepath . 'pre-loader.gif',
		'type' => 'upload'
	);       
        $options[] = array(
		'name' => esc_html__( 'Pre-loader Background Color', 'megashop' ),
		'desc' => esc_html__( 'No color selected by default.', 'megashop' ),
		'id' => 'preloader_bg_color',
		'std' => '#f5f5f5',
		'type' => 'color'
	);
        $options[] = array(
		'name' => "Select Product Layout",
		'desc' => "Images for layout.",
		'id' => "product_layout",
		'std' => "product_layout1",
		'type' => "images",
                'options' => array(
                            'product_layout1' => array( 'value' => $imagepath . 'product_1.png'),
                            'product_layout2' => array( 'value' => $imagepath . 'product_2.png'),
                            'product_layout3' => array( 'value' => $imagepath . 'product_3.png')
                    )
	);
        
        $options[] = array(
		'name' => esc_html__( 'Display Scroll to Top', 'megashop' ),
		'desc' => esc_html__( 'display scroll to top button, defaults to true.', 'megashop' ),
		'id' => 'display_scroll_top',
                'blockids' => '',
		'std' => '1',
		'type' => 'checkbox'
	);
        $options[] = array(
		'name' => esc_html__( 'Custom Css', 'megashop' ),
		'desc' => esc_html__( 'Add custom css.', 'megashop' ),
		'id' => 'custom_css',
		'std' => '',
		'type' => 'textarea'
	);
        
        
         /* Theme Color Settings */
        $options[] = array(
		'name' => esc_html__( 'Theme Color Settings', 'megashop' ),
		'type' => 'heading'
	);    
        $options[] = array(
		'name' => "Select Theme Layout",
		'desc' => "Select Theme Layout.",
		'id' => "theme_layout",
		'std' => "left_sidebar_layout",
                'class' => 'mini',
		'type' => "select",
                'options' => array(
                            'left_sidebar_layout' => array( 'value' => 'Left Sidebar layout'),                              
                            'both_sidebar_layout' => array( 'value' => 'Both Sidebar Layout'),
                            'full_width_layout' => array( 'value' => 'Full Width Layout'),
                    )
	);
        $options[] = array(
		'name' => esc_html__( 'Body Background Color', 'megashop' ),
		'desc' => esc_html__( 'No color selected by default.', 'megashop' ),
		'id' => 'body_bg_color',
		'std' => '#f7f7f7',
		'type' => 'color'
	);
        $options[] = array(
		'name' => esc_html__( 'Display Box Layout', 'megashop' ),
		'desc' => esc_html__( 'Display Box Layout.', 'megashop' ),
		'id' => 'box_layout',
		'std' => '',
                'blockids' => 'body_bg_img',
		'type' => 'checkbox'
	);  
        $options[] = array(
		'name' => esc_html__( 'Upload Box Background Image', 'megashop' ),
		'desc' => esc_html__( 'This creates a full size uploader that previews the image.', 'megashop' ),
		'id' => 'body_bg_img',
                'std' => $background_defaults,
		'type' => 'background'
	);
        $options[] = array(
		'name' => esc_html__( 'Container Width in px', 'megashop' ),
		'desc' => esc_html__( 'Set Container width in px.', 'megashop' ),
		'id' => 'container_width',
		'std' => '1310',
		'class' => 'mini',
		'type' => 'number'
	);
        $options[] = array(
		'name' => esc_html__('Example Image Selector', 'megashop' ),
		'desc' => esc_html__("Images for layout.", 'megashop' ),
		'id' => "example_preset",
		'std' => "red",
		'type' => "preset",
		'options' => array(
			'red' => '#f12a43,#333333,#333333,#f12a43,#888888',
			'black' => '#272727,#ffce64,#333333,#000000,#888888',
                        'green' => '#3bac44,#ffba00,#333333,#ffba00,#888888',
                        'brown' => '#90133b,#8ba462,#333333,#f4eee5,#888888',   
                        'black & red' => '#da263c,#111111,#333333,#da263c,#888888', 
                        'blue & black' => '#1e54aa,#111111,#333333,#1e54aa,#888888', 
                        'dark Brown'=>'#3d3110,#ff8c05,#333333,#ff8c05,#888888',
                        'Dark Green & yellow'=>'#549c18,#ffba00,#333333,#ffba00,#888888',
                        'Brown & Green'=>'#9b7358,#6d923d,#333333,#739249,#888888',
                        'Blue & Black'=>'#238cd4,#fe506a,#272727,#272727,#888888',
						'pink & Black'=>'#ed5483,#111111,#5b5b5b,#ed5483,#888888',
						'Blue & yellow'=>'#2f5999,#ffd118,#5b5b5b,#2f5999,#888888',
		)
	);
        $options[] = array(
		'name' => esc_html__( 'Primary Color', 'megashop' ),
		'desc' => esc_html__( 'No color selected by default.', 'megashop' ),
		'id' => 'megashop_primary_color',
		'std' => '#f12a43',
		'type' => 'color'
	);
        $options[] = array(
		'name' => esc_html__( 'Secondary Color', 'megashop' ),
		'desc' => esc_html__( 'No color selected by default.', 'megashop' ),
		'id' => 'megashop_secondary_color',
		'std' => '#333333',
		'type' => 'color'
	);
        $options[] = array(
		'name' => esc_html__( 'Title Color', 'megashop' ),
		'desc' => esc_html__( 'No color selected by default.', 'megashop' ),
		'id' => 'megashop_title_color',
		'std' => '#555',
		'type' => 'color'
	);
        $options[] = array(
		'name' => esc_html__( 'Meta color', 'megashop' ),
		'desc' => esc_html__( 'No color selected by default.', 'megashop' ),
		'id' => 'megashop_meta_font_color',
		'std' => '#f12a43',
		'type' => 'color'
	);
        $options[] = array(
		'name' => esc_html__( 'Page Content Color', 'megashop' ),
		'desc' => esc_html__( 'No color selected by default.', 'megashop' ),
		'id' => 'megashop_pagecontent_color',
		'std' => '#888',
		'type' => 'color'
	);
        /*----------------------*/
         /* Header section settings */
        $options[] = array(
		'name' => esc_html__( 'Header Settings', 'megashop' ),
		'type' => 'heading'
	);       
        $options[] = array(
		'name' => esc_html__( 'Upload Header Logo', 'megashop' ),
		'desc' => esc_html__( 'This creates a full size uploader that previews the image.', 'megashop' ),
		'id' => 'header_logo',
		'type' => 'upload'
	);
        $options[] = array(
		'name' => esc_html__( 'Display Sticky Header', 'megashop' ),
		'desc' => esc_html__( 'display sticky header, defaults to true.', 'megashop' ),
		'id' => 'sticky_header',
		'std' => '1',
		'type' => 'checkbox'
	);
        $options[] = array(
		'name' => "Select Header Layout",
		'desc' => "Images for layout.",
		'id' => "header_layout",
		'std' => "header_1",
		'type' => "images",
                'options' => array(
                            'header_1' => array( 'value' => $imagepath . 'header_1.png', 'blockids' =>'top_bar_setting,main_menu_options,mainmenu_bg_color,support_title,support_discription,topbar_text'),
                            'header_2' => array( 'value' => $imagepath . 'header_2.png', 'blockids' =>'top_bar_setting,support_title,support_discription,main_menu_options,topbar_text'),
                            'header_3' => array( 'value' => $imagepath . 'header_3.png', 'blockids' =>'support_title,support_discription,main_menu_options'),
                    )
	);
        $wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'fullscreen,wordpress,wplink, textcolor' )
	);

	$options[] = array(
		'name' => esc_html__( 'header Banner content', 'megashop' ),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'megashop' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'header_banner',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);
	$background_defaults = array(
		'color' => '#f12a43',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );
		
	$options[] = array(
		'name' => esc_html__( 'Upload header Background Image', 'megashop' ),
		'desc' => esc_html__( 'This creates a full size uploader that previews the image.', 'megashop' ),
		'id' => 'header_background_image',
                'std' => $background_defaults,
		'type' => 'background'
	);
        $topbar_options = array(
		'disable' => array('value' => esc_html__( 'Disable', 'megashop' )),
		'left_menu_right_text' => array('value' => esc_html__( 'Left Menu Right Text', 'megashop' ),'blockids' => 'topbar_text'),
		'right_menu_left_text' => array('value' => esc_html__( 'Left Text Right Menu', 'megashop' ),'blockids' => 'topbar_text'),
	);
        
        $options[] = array(
		'name' => esc_html__( 'Select Top Bar Options', 'megashop' ),
		'desc' => esc_html__( 'Top Bar display Options.', 'megashop' ),
		'id' => 'top_bar_setting',
		'std' => 'right_menu_left_text',
		'type' => 'select',
		'class' => '', 
		'options' => $topbar_options
	);
        $options[] = array(
		'name' => esc_html__( 'Top Bar Service Text', 'megashop' ),
		'desc' => esc_html__( 'Top Bar Service Text.', 'megashop' ),
		'id' => 'topbar_text',
		'std' => esc_html__( 'Wants to explore Upcoming Deals on Weekends?', 'megashop' ),
		'type' => 'text',
		'class' => 'wide'
	);
        
        $options[] = array(
		'name' => esc_html__( 'Support Text Title', 'megashop' ),
		'desc' => esc_html__( 'Support Text Title.', 'megashop' ),
		'id' => 'support_title',
		'std' => esc_html__( 'Call center', 'megashop' ),
		'type' => 'text',
		'class' => 'wide'
	);
        $options[] = array(
		'name' => esc_html__( 'Support Text Discription', 'megashop' ),
		'desc' => esc_html__( 'Support Text Discription.', 'megashop' ),
		'id' => 'support_discription',
		'std' => esc_html__( '088-888-8888', 'megashop' ),
		'type' => 'text',
		'class' => 'wide'
	);
        
        $mainmenu_options = array(
                'disable' => array('value' => esc_html__( 'Disable menu', 'megashop' )),
		'left_menu' => array('value' => esc_html__( 'Left Align Menu', 'megashop' )),
		'center_menu' => array('value' => esc_html__( 'Center Align Menu', 'megashop' )),
		'right_menu' => array('value' => esc_html__( 'Right Align Menu', 'megashop' )),
	);
        $options[] = array(
		'name' => esc_html__( 'Select Header Menu', 'megashop' ),
		'desc' => esc_html__( 'Top Bar display Options.', 'megashop' ),
		'id' => 'main_menu_options',
		'std' => 'left_menu',
		'type' => 'select',
		'class' => '', 
		'options' => $mainmenu_options
	);
        
       /*----------------------*/
        /* Blog Page settings */
        $options[] = array(
		'name' => esc_html__( 'Blog Page Settings', 'megashop' ),
		'type' => 'heading'
	);
        
        $options[] = array(
		'name' => "Select Blog Layout",
		'desc' => "Images for layout.",
		'id' => "select_blog_layout",
		'std' => "list",
		'type' => "images",
                'options' => array(
                            'list' => array( 'value' => $imagepath . 'blog-page-list.png'),
                            'grid' => array( 'value' => $imagepath . 'blog-page-grid.png','blockids' => 'select_blog_column'),
                            'masonry' => array( 'value' => $imagepath . 'blog-page-masonry.png','blockids' => 'select_blog_column')
                    )
	);
	$blog_column = array(
		'2_column' => array('value' => esc_html__( '2 Column', 'megashop' )),
		'3_column' => array('value' => esc_html__( '3 Column', 'megashop' )),
		'4_column' => array('value' => esc_html__( '4 Column', 'megashop' )),
	);
        $options[] = array(
		'name' => esc_html__( 'Select Blog Column to display Grid or Masonry View', 'megashop' ),
		'desc' => esc_html__( 'Select Blog Column to display', 'megashop' ),
		'id' => 'select_blog_column',
		'type' => 'select',
                'std' => '3_column',
		'options' => $blog_column
	); 
        /* footer section settings */
        $options[] = array(
		'name' => esc_html__( 'Footer Settings', 'megashop' ),
		'type' => 'heading'
	);
        $wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'fullscreen,wordpress,wplink, textcolor' )
	);
        $options[] = array(
		'name' => esc_html__( 'Footer Backgorund Color', 'megashop' ),
		'desc' => esc_html__( 'No color selected by default.', 'megashop' ),
		'id' => 'footer_bg_color',
		'std' => '#ffffff',
		'type' => 'color'
	);
        
        $options[] = array(
		'name' => esc_html__( 'Footer Title Color', 'megashop' ),
		'desc' => esc_html__( 'No color selected by default.', 'megashop' ),
		'id' => 'footer_title_color',
		'std' => '#000000',
		'type' => 'color'
	);
        
        $options[] = array(
		'name' => esc_html__( 'Footer Text Color', 'megashop' ),
		'desc' => esc_html__( 'No color selected by default.', 'megashop' ),
		'id' => 'footer_text_color',
		'std' => '#888888',
		'type' => 'color'
	);
        $options[] = array(
		'name' => esc_html__( 'Footer Link Hover Color', 'megashop' ),
		'desc' => esc_html__( 'No color selected by default.', 'megashop' ),
		'id' => 'footer_link_hover_color',
		'std' => '#f12a43',
		'type' => 'color'
	);
        
	$options[] = array(
		'name' => esc_html__( 'Footer Above Widget Area Content', 'megashop' ),
		'desc' => sprintf( esc_html__( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'megashop' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'above_footer_area',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);
		$options['footer_background_image'] = array(
		'name' => esc_html__( 'Upload Footer Background Image', 'megashop' ),
		'desc' => esc_html__( 'This creates a full size uploader that previews the image.', 'megashop' ),
		'id' => 'footer_background_image',
		'type' => 'upload'
	);
	 $options['bottom_footer_bg_color'] = array(
		'name' => esc_html__( 'Bottom Footer Backgorund Color', 'megashop' ),
		'desc' => esc_html__( 'No color selected by default.', 'megashop' ),
		'id' => 'bottom_footer_bg_color',
		'std' => '#f12a43',
		'type' => 'color'
	); 
        $options[] = array(
		'name' => esc_html__( 'Display footer Widget', 'megashop' ),
		'desc' => esc_html__( 'display footer Widget, defaults to true.', 'megashop' ),
		'id' => 'display_footer_widget',
		'std' => '1',
                'blockids' => 'select_footer_column,footer_widget_1,footer_widget_2,footer_widget_3,footer_widget_4,footer_widget_5,footer_widget_6',
		'type' => 'checkbox'
	);
        $footer_column = array(
		'1_column' => array('value' => esc_html__( '1 Column', 'megashop' ), 'blockids' => 'footer_widget_1'),
		'2_column' => array('value' => esc_html__( '2 Column', 'megashop' ), 'blockids' => 'footer_widget_1,footer_widget_2'),
		'3_column' => array('value' => esc_html__( '3 Column', 'megashop' ), 'blockids' => 'footer_widget_1,footer_widget_2,footer_widget_3'),
		'4_column' => array('value' => esc_html__( '4 Column', 'megashop' ), 'blockids' => 'footer_widget_1,footer_widget_2,footer_widget_3,footer_widget_4'),
                '5_column' => array('value' => esc_html__( '5 Column', 'megashop' ), 'blockids' => 'footer_widget_1,footer_widget_2,footer_widget_3,footer_widget_4,footer_widget_5'),
                '6_column' => array('value' => esc_html__( '6 Column', 'megashop' ), 'blockids' => 'footer_widget_1,footer_widget_2,footer_widget_3,footer_widget_4,footer_widget_5,footer_widget_6'),
	);
        $options[] = array(
		'name' => esc_html__( 'Select a Footer Column to display', 'megashop' ),
		'desc' => esc_html__( 'Select a Footer Column to display', 'megashop' ),
		'id' => 'select_footer_column',
		'type' => 'select',
                'std' => '4_column',
		'options' => $footer_column
	);        
        $options[] = array(
		'name' => esc_html__( 'Select Footer Column Widget 1', 'megashop' ),
		'desc' => esc_html__( 'Select a Footer Column to display', 'megashop' ),
		'id' => 'footer_widget_1',
		'type' => 'select',
                'std' => 'footer_column_1',
		'options' => $options_sidebar
	);
        $options[] = array(
		'name' => esc_html__( 'Select Footer Column Widget 2', 'megashop' ),
		'desc' => esc_html__( 'Select a Footer Column to display', 'megashop' ),
		'id' => 'footer_widget_2',
		'type' => 'select',
                'std' => 'footer_column_2',
		'options' => $options_sidebar
	);
        $options[] = array(
		'name' => esc_html__( 'Select Footer Column Widget 3', 'megashop' ),
		'desc' => esc_html__( 'Select a Footer Column to display', 'megashop' ),
		'id' => 'footer_widget_3',
		'type' => 'select',
                'std' => 'footer_column_3',
		'options' => $options_sidebar
	);
        $options[] = array(
		'name' => esc_html__( 'Select Footer Column Widget 4', 'megashop' ),
		'desc' => esc_html__( 'Select a Footer Column to display', 'megashop' ),
		'id' => 'footer_widget_4',
		'type' => 'select',
                'std' => 'footer_column_4',
		'options' => $options_sidebar
	);
        $options[] = array(
		'name' => esc_html__( 'Select Footer Column Widget 5', 'megashop' ),
		'desc' => esc_html__( 'Select a Footer Column to display', 'megashop' ),
		'id' => 'footer_widget_5',
		'type' => 'select',
                'std' => 'footer_column_5',
		'options' => $options_sidebar
	);
        $options[] = array(
		'name' => esc_html__( 'Select Footer Column Widget 6', 'megashop' ),
		'desc' => esc_html__( 'Select a Footer Column to display', 'megashop' ),
		'id' => 'footer_widget_6',
		'type' => 'select',
                'std' => 'footer_widget_6',
		'options' => $options_sidebar
	);
        $options[] = array(
		'name' => esc_html__( 'Display footer Copyrights', 'megashop' ),
		'desc' => esc_html__( 'display footer Copyrights, defaults to true.', 'megashop' ),
		'id' => 'display_footer_copyright',
		'std' => '1',
                'blockids' => 'copyright_text',
		'type' => 'checkbox'
	);        
        $options[] = array(
		'name' => esc_html__( 'Copyright text', 'megashop' ),
		'desc' => esc_html__( 'Copyright text.', 'megashop' ),
		'id' => 'copyright_text',
		'std' => '',
		'type' => 'textarea'
	);
        $options[] = array(
		'name' => esc_html__( 'Display footer Social Icons', 'megashop' ),
		'desc' => esc_html__( 'display footer social icons, defaults to true.', 'megashop' ),
		'id' => 'display_socialicon',
		'std' => '1',
                'blockids' => 'facebook_link,twitter_link,dribbble_link,rss_link,google_plus_link,instagram_link,linkedin_link,pintrest_link,mailto_link,youtube_link,custom_link1,custom_link2,custom_link3,custom_icon1,custom_icon2,custom_icon3',
		'type' => 'checkbox'
	); 
        $options[] = array(
		'name' => esc_html__( 'Facebook Link', 'megashop' ),
		'desc' => esc_html__( 'add facebook link.', 'megashop' ),
		'id' => 'facebook_link',
		'std' => 'https://www.facebook.com/',
		'type' => 'text'
	);
        $options[] = array(
		'name' => esc_html__( 'Twitter Link', 'megashop' ),
		'desc' => esc_html__( 'add twitter link.', 'megashop' ),
		'id' => 'twitter_link',
		'std' => 'https://twitter.com/',
		'type' => 'text'
	);
        $options[] = array(
		'name' => esc_html__( 'rss Link', 'megashop' ),
		'desc' => esc_html__( 'add rss link.', 'megashop' ),
		'id' => 'rss_link',
		'std' => 'https://www.rss.com/',
		'type' => 'text'
	);
        $options[] = array(
		'name' => esc_html__( 'dribbble Link', 'megashop' ),
		'desc' => esc_html__( 'add dribble link.', 'megashop' ),
		'id' => 'dribbble_link',
		'std' => 'https://www.dribbble.com/',
		'type' => 'text'
	);
        $options[] = array(
		'name' => esc_html__( 'Google+ Link', 'megashop' ),
		'desc' => esc_html__( 'add Google+ link.', 'megashop' ),
		'id' => 'google_plus_link',
		'std' => 'https://www.plus.google.com/',
		'type' => 'text'
	);
        $options[] = array(
		'name' => esc_html__( 'instagram Link', 'megashop' ),
		'desc' => esc_html__( 'add instagram link.', 'megashop' ),
		'id' => 'instagram_link',
		'std' => 'https://www.linkedin.com/',
		'type' => 'text'
	);
        $options[] = array(
		'name' => esc_html__( 'linkedin Link', 'megashop' ),
		'desc' => esc_html__( 'add linkedin link.', 'megashop' ),
		'id' => 'linkedin_link',
		'std' => 'https://www.linkedin.com/',
		'type' => 'text'
	);
        $options[] = array(
		'name' => esc_html__( 'pintrest Link', 'megashop' ),
		'desc' => esc_html__( 'add pintrest link.', 'megashop' ),
		'id' => 'pintrest_link',
		'std' => 'https://www.pintrest.com/',
		'type' => 'text'
	);
        $options[] = array(
		'name' => esc_html__( 'mail to Link', 'megashop' ),
		'desc' => esc_html__( 'add mail to link.', 'megashop' ),
		'id' => 'mailto_link',
		'std' => '',
		'type' => 'text'
	);
        $options[] = array(
		'name' => esc_html__( 'youtube Link', 'megashop' ),
		'desc' => esc_html__( 'add youtube link.', 'megashop' ),
		'id' => 'youtube_link',
		'std' => '',
		'type' => 'text'
	);
        $options[] = array(
		'name' => esc_html__( 'custom Link 1', 'megashop' ),
		'desc' => esc_html__( 'add youtube link.', 'megashop' ),
		'id' => 'custom_link1',
		'std' => '',
		'type' => 'text'
	);
        $options[] = array(
		'name' => esc_html__( 'custom Link icon 1', 'megashop' ),
		'desc' => esc_html__( 'add custom link icon.', 'megashop' ),
		'id' => 'custom_icon1',
		'std' => 'fa-facebook',
		'type' => 'text'
	);
        $options[] = array(
		'name' => esc_html__( 'custom Link 2', 'megashop' ),
		'desc' => esc_html__( 'add custom link.', 'megashop' ),
		'id' => 'custom_link2',
		'std' => '',
		'type' => 'text'
	);
        $options[] = array(
		'name' => esc_html__( 'custom Link Icon 2', 'megashop' ),
		'desc' => esc_html__( 'add custom link Icon.', 'megashop' ),
		'id' => 'custom_icon2',
                'class'=>'',
		'std' => 'fa-facebook',
		'type' => 'text'
	);
        $options[] = array(
		'name' => esc_html__( 'custom Link 3', 'megashop' ),
		'desc' => esc_html__( 'add custom link.', 'megashop' ),
		'id' => 'custom_link3',
		'std' => '',
		'type' => 'text'
	);
        $options[] = array(
		'name' => esc_html__( 'custom Link Icon 3', 'megashop' ),
		'desc' => esc_html__( 'add custom link Icon.', 'megashop' ),
		'id' => 'custom_icon3',           
		'std' => 'fa-facebook',
		'type' => 'text'
	);
	return $options;
}