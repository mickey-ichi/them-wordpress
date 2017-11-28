<?php

/*
*   Function for adding sidebar (AJAX action) 
*/

if(!function_exists('template_trip_add_sidebar_action')) {
	function template_trip_add_sidebar_action(){
	    if (!wp_verify_nonce($_GET['_wpnonce_template_trip_widgets'],'template_trip-add-sidebar-widgets') ) die( 'Security check' );
	    if($_GET['template_trip_sidebar_name'] == '') die('Empty Name');
	    $option_name = 'template_trip_custom_sidebars';
	    if(!get_option($option_name) || get_option($option_name) == '') delete_option($option_name); 
	    
	    $new_sidebar = $_GET['template_trip_sidebar_name'];		

		$result = template_trip_add_sidebar(esc_attr($new_sidebar));

	    if($result) die($result);
	    else die('error');
	}
}

if( ! function_exists('template_trip_add_sidebar') ) {
	function template_trip_add_sidebar($name) {
		$option_name = 'template_trip_custom_sidebars';
		if(get_option($option_name)) {
			$et_custom_sidebars = template_trip_get_stored_sidebar();
			$et_custom_sidebars[] = trim($name);
			$result = update_option($option_name, $et_custom_sidebars);
		}else{
			
			$et_custom_sidebars[] = $name;
			$result2 = add_option($option_name, $et_custom_sidebars);
		}
		if($result) return 'Updated';
		elseif($result2) return 'added';
		else die('error');
	}
}


/**
*   Function for deleting sidebar (AJAX action) 
*/

if(!function_exists('template_trip_delete_sidebar')) {
	function template_trip_delete_sidebar(){
	    $option_name = 'template_trip_custom_sidebars';
	    $del_sidebar = trim($_GET['template_trip_sidebar_name']);
	        
	    if(get_option($option_name)) {
	        $et_custom_sidebars = template_trip_get_stored_sidebar();
	        foreach($et_custom_sidebars as $key => $value){
	            if($value == $del_sidebar)
	                unset($et_custom_sidebars[$key]);
	        }
	        $result = update_option($option_name, $et_custom_sidebars);
	    }
	    
	    if($result) die('Deleted');
	    else die('error');
	}
}

/**
*   Function for registering previously stored sidebars
*/

if(!function_exists('template_trip_register_stored_sidebar')) {
	function template_trip_register_stored_sidebar(){
	    $et_custom_sidebars = template_trip_get_stored_sidebar();
		
	    if(is_array($et_custom_sidebars)) {
	        foreach($et_custom_sidebars as $name){
			$name_ID = str_replace(' ', '-', $name); // Replaces all spaces with hyphens.
			$name_ID = preg_replace('/[^A-Za-z0-9\-]/', '', $name_ID); // Removes special chars.
	            register_sidebar( array(
	                'name' => ''.$name.'',
	                'id' => $name_ID,
	                'class' => 'template_trip_custom_sidebar',
	                'before_widget' => '<div id="%1$s" class="sidebar-widget widget-container %2$s">',
	                'after_widget' => '</div>',
	                'before_title' => '<h3 class="widget-title"><span>',
	                'after_title' => '</span></h3>',
	            ) );
	        }
	    }
	}
}

/**
*   Function gets stored sidebar array
*/

if(!function_exists('template_trip_get_stored_sidebar')) {
	function template_trip_get_stored_sidebar(){
	    $option_name = 'template_trip_custom_sidebars';
	    return get_option($option_name);
	}
}


/**
*   Add form after all widgets
*/

if(!function_exists('template_trip_sidebar_form')) {
	function template_trip_sidebar_form(){
	    ?>
	    
	    <form action="<?php echo admin_url( 'widgets.php' ); ?>" method="post" class="template_trip_add_sidebar" id="template_trip_add_sidebar_form">
                <h2><?php esc_html_e('Custom Sidebar','megashop'); ?> </h2>
	        <?php wp_nonce_field( 'template_trip-add-sidebar-widgets', '_wpnonce_template_trip_widgets', false ); ?>
	        <input type="text" name="template_trip_sidebar_name" id="template_trip_sidebar_name" placeholder="<?php esc_html_e('Enter Name of new Widget Area','megashop'); ?>" />
	        <button type="submit" class="button-primary" value="add-sidebar"><?php esc_html_e('Add Sidebar','megashop'); ?> </button>
	    </form>
	    <script type="text/javascript">
	        var sidebarForm = jQuery('#template_trip_add_sidebar_form');
	        var sidebarFormNew = sidebarForm.clone();
	        sidebarForm.remove();
	        jQuery('#widgets-right').append('<div style="clear:both;"></div>');
	        jQuery('#widgets-right').append(sidebarFormNew);
	        
	        sidebarFormNew.submit(function(e){
	            e.preventDefault();
	            var data =  {
	                'action':'template_trip_add_sidebar',
	                '_wpnonce_template_trip_widgets': jQuery('#_wpnonce_template_trip_widgets').val(),
	                'template_trip_sidebar_name': jQuery('#template_trip_sidebar_name').val()
	            };
	            //console.log(data);
	            jQuery.ajax({
	                url: ajaxurl,
	                data: data,
	                success: function(response){
	                    console.log(response);
	                    window.location.reload(true);
	                    
	                },
	                error: function(data) {
	                    console.log('error');
	                    
	                }
	            });
	        });
	        
	    </script>
	    <?php
	}
}
add_action( 'sidebar_admin_page', 'template_trip_sidebar_form', 30 );
add_action('wp_ajax_template_trip_add_sidebar', 'template_trip_add_sidebar_action');
add_action('wp_ajax_template_trip_delete_sidebar', 'template_trip_delete_sidebar');
add_action( 'widgets_init', 'template_trip_register_stored_sidebar' );
