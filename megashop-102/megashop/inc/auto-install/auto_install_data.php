<?php
/* Get theme data before auto install */
if (!function_exists('get_id_by_slug')) {

    function get_id_by_slug($page_slug) {
        $page = get_page_by_path($page_slug);
        if ($page) {
            return $page->ID;
        } else {
            return null;
        }
    }

}

function get_local_file_contents( $file_path ) {
    ob_start();
    include $file_path;
    $contents = ob_get_clean();

    return $contents;
}

function is_serial_data($serialdata) { return (@unserialize($serialdata) !== false || $serialdata == 'b:0;'); }
if (!function_exists('theme_auto_install')) {
    /* Import sample data */

    function theme_auto_install() {
        global $wpdb;
        $layout = $_POST['layout'];
        update_option('layout', $layout);
        // Get tag line before auto install
        $before_auto_install_desc = get_option('blogdescription');
        update_option('before_auto_install_tagline', $before_auto_install_desc);
        $after_auto_install_desc = "Megashop";
        update_option('blogdescription', $after_auto_install_desc);
        $before_auto_install_sidebar = get_option('sidebars_widgets');
        update_option('before_auto_install_sidebars_widgets', $before_auto_install_sidebar);
        update_option('show_on_front', 'page');

        // Get post,page,attachment before auto install
        $args = array(
            'post_type' => array(
                'post',
                'page',
                'products',
                'portfolio',
                'testimonial',
                'ourbrand',
                'attachment'
            ),
            'post_status' => array('publish', 'draft', 'pending', 'future'),
            'posts_per_page' => -1
        );
        $get_before_page_post = new WP_Query($args);
        if ($get_before_page_post->have_posts()) {
            $post_page_arr = array();
            while ($get_before_page_post->have_posts()) : $get_before_page_post->the_post();
                $post_page_arr[] = get_the_ID();
            endwhile;
            wp_reset_postdata();
        }

        update_option('posts_before_auto_install', $post_page_arr);

        //Get all attachment id before auto install
        $attachment = array(
            'post_type' => 'attachment',
            'post_mime_type' => array('image', 'video', 'audio'),
            'post_status' => 'inherit',
            'posts_per_page' => - 1,
        );
        $attachments = new WP_Query($attachment);
        $attachment_ids = array();
        if ($attachments->have_posts()) :
            while ($attachments->have_posts()) :
                $attachments->the_post();
                $attachment_ids[] = get_the_id();
            endwhile;
            wp_reset_postdata();
        endif;
        update_option('attchments_before_auto_install', $attachment_ids);

        $theme_posts_before_auto_install = get_option('posts_before_auto_install');
        $post_diff = $theme_posts_before_auto_install;
        if ($post_diff) {
            $post_cate = array();
            $post_tags = array();
            foreach ($post_diff as $value) {
                $post_category = get_the_category($value);
                if ($post_category) {
                    $post_cate[] = $post_category;
                }
                $post_tag = wp_get_post_tags($value);
                if ($post_tag) {
                    $post_tags[] = $post_tag;
                }
            }
            update_option('categories_before_auto_install', $post_cate);
            update_option('tags_before_auto_install', $post_tags);
        }

        

        $menu_arr = array();
        $nav_menus = get_terms('nav_menu', array('hide_empty' => true));
        if ($nav_menus) {
            foreach ($nav_menus as $menu) {
                $menu_arr[] = $menu->term_id;
            }
        }
        update_option('menu_before_auto_install', $menu_arr);        
        $options_frm = get_option('options-framework-theme');
        if ($options_frm) {
            $theme_name = $options_frm['id'];
            $theme_options = get_option($theme_name);
            $page_on_front = get_option('page_on_front');
            $page_name = get_the_title($page_on_front);
            $show_on_front = get_option('show_on_front');
            $theme_settings_options = array(
                'base_url' => home_url(),
                $theme_name => $theme_options,
                'page_on_front' => $page_name,
                'show_on_front' => $show_on_front
            );
        }
        update_option('theme_options_before_auto_install', $theme_settings_options);
    }

}
if (!function_exists('remove_auto_update')) {
    /* Remove sample data */

    function remove_auto_update() {
        global $wpdb;
        $args = array(
            'post_type' => array(
                'post',
                'page',
                'portfolio',
                'products',
                'oredrs',
                'testimonial',
                'ourbrand',
                'attachment',
            ),
            'post_status' => array('publish', 'draft', 'pending', 'future'),
            'posts_per_page' => -1
        );
        $get_after_page_post = new WP_Query($args);
        
        if ($get_after_page_post->have_posts()) {
            $after_post_page_arr = array();
            while ($get_after_page_post->have_posts()) :
                $get_after_page_post->the_post();
                $after_post_page_arr[] = get_the_ID();
            endwhile;
            wp_reset_postdata();
        }
        $attachment = array(
            'post_type' => 'attachment',
            'post_mime_type' => array('image', 'video', 'audio'),
            'post_status' => 'inherit',
            'posts_per_page' => - 1,
        );
        $after_attchment_install = new WP_Query($attachment);
        $after_attchment_install_arr = array();
        if ($after_attchment_install->have_posts()) :
            while ($after_attchment_install->have_posts()) :
                $after_attchment_install->the_post();
                $after_attchment_install_arr[] = get_the_id();
            endwhile;
            wp_reset_postdata();
        endif;
        $get_attachment = get_option('attchments_before_auto_install');
        $att_diff = array_diff($after_attchment_install_arr, $get_attachment);
        update_option('theme_attachment_id', $att_diff);

        $locations = get_terms('nav_menu', array('hide_empty' => true));

        $after_menu_arr = array();
        if ($locations) {
            foreach ($locations as $menu_id) {
                $after_menu_arr[] = $menu_id->term_id;
            }
        }
        $get_menu = get_option('menu_before_auto_install');
        $menu_diff = array_diff($after_menu_arr, $get_menu);
        update_option('menu_after_auto_install', $menu_diff);

        $theme_posts_before_auto_install = get_option('posts_before_auto_install');
        $post_diff = array_diff($after_post_page_arr, $theme_posts_before_auto_install);
        update_option('theme_sample_data_id', $post_diff);


        $diff = get_option('theme_sample_data_id');
        $cat = get_option('categories_before_auto_install');
        $tags = get_option('tags_before_auto_install');
        $attachment = get_option('theme_attachment_id');
        $menu_list = get_option('menu_after_auto_install');

        // Remove Sidebar
        $before_auto_install_sidebar = get_option('before_auto_install_sidebars_widgets');
        $after_auto_install_sidebar = get_option('sidebars_widgets');
        update_option('after_auto_install_sidebars_widgets', $after_auto_install_sidebar);
        $after_auto_install_sidebar = get_option('after_auto_install_sidebars_widgets');
        update_option('sidebars_widgets', $before_auto_install_sidebar);

        $remove_data = false;
        $remove_widget = false;
        $remove_options = false;

       

        foreach ($diff as $value) {
            $post_category = get_the_category($value);
            if ($post_category) {
                $post_cate[] = $post_category;
            }
            $post_tag = wp_get_post_tags($value);
            if ($post_tag) {
                $post_tags[] = $post_tag;
            }
        }

        //Remove installed post,page and its category,tag and attachment
        if ($diff) {
            //Remove tag line
            $old_tagline = get_option('before_auto_install_tagline');
            update_option('blogdescription', $old_tagline);

            //Remove category of post.
            foreach ($post_cate as $post_cat) {
                foreach ($post_cat as $value) {
                    wp_delete_term($value->term_id, 'category');
                }
                update_option('categories_before_auto_install', '');
            }

            //Remove tag of post.
            foreach ($post_tags as $post_tag) {
                foreach ($post_tag as $value) {
                    wp_delete_term($value->term_id, 'post_tag');
                }
                update_option('tags_before_auto_install', '');
            }

            //Remove attachment of post.
            if ($attachment) {
                foreach ($attachment as $attachment_id) {
                    wp_delete_attachment($attachment_id, true);
                }
                update_option('theme_attachment_id', '');
            }

            //Remove post, pages, client and testimonial.
            foreach ($diff as $value) {
                wp_delete_post($value, true);
            }
            update_option('theme_sample_data_id', '');

            //Remove imported menu list.
            if ($menu_diff) {
                foreach ($menu_diff as $value) {
                    if (is_nav_menu($value)) {
                        $deletion = wp_delete_nav_menu($value);
                    } else {
                        $nav_menu_selected_id = 0;
                        unset($_REQUEST['menu']);
                    }
                }
                update_option('menu_after_auto_install', '');
            }

            $remove_data = true;
        }
        
        $import_defualt_options = get_template_directory() . '/inc/auto-install/defualt-options.txt';
        $defualt_options = get_local_file_contents($import_defualt_options);
        if (is_serial_data($defualt_options)) {
            $options = unserialize($defualt_options);
        }
        if ($options) {
            foreach ($options as $options) {
                update_option($options->option_name, unserialize($options->option_value));
            }
        }
        
        //Remove theme option auto install
        $framewrk_options = get_option('theme_options_before_auto_install');
        if ($framewrk_options) {
            
                $theme_name = $options_frm['id'];
                $theme_option_value = $framewrk_options[$theme_name];
                update_option($theme_name, $theme_option_value);
            $page_name = $framewrk_options['page_on_front'];
            $page_id = get_page_by_title($page_name);
            if (isset($page_id->ID)) {
                update_option('page_on_front', $page_id->ID);
            }
            update_option('show_on_front', 'posts');
            update_option('theme_options_before_auto_install', '');
            $remove_options = true;
        }
        update_option('listing_xml', 0);
        update_option('layout', '');
    }

}

function theme_install_process(){    
    /* Set the nav menu location option as per menu type */
    $theme_name = get_option('stylesheet');

    /* get the nav menu list */
    $nav_menus = wp_get_nav_menus(array('orderby' => 'name'));

    foreach ($nav_menus as $menus) {
        if ($menus->slug == 'header-menu') {
            $primary_term_id = $menus->term_id;
        }
        if ($menus->slug == 'categories') {
            $left_term_id = $menus->term_id;
        }
        if ($menus->slug == 'top_menu') {
            $top_term_id = $menus->term_id;
        }
    }

    $nav_menu_locations = get_option('theme_mods_' . strtolower($theme_name));
    /* Check if primary menu is available or not */
    if (!has_nav_menu('primary')) {
        $nav_menu_locations['nav_menu_locations']['primary'] = $primary_term_id ? $primary_term_id : '';
    }
    if (!has_nav_menu('top_menu')) {
        $nav_menu_locations['nav_menu_locations']['top_menu'] = $top_term_id ? $top_term_id : '';
    }
    if (!has_nav_menu('left_menu')) {
        $nav_menu_locations['nav_menu_locations']['left_menu'] = $left_term_id ? $left_term_id : '';
    }

    /* set menu in database */
    if (!empty($nav_menu_locations)) {
        update_option('theme_mods_' . strtolower($theme_name), $nav_menu_locations);
    }
}
function auto_install_layout() {
    theme_auto_install();
    $theme_name = str_replace(' ', '', strtolower(wp_get_theme()));
    
    /*
     *  Import Data using xml
     */    
    $layout = $_POST['layout'];
    if($layout != ''){
        if (get_option('listing_xml') != 1) {
        $xml_import = new Megashop_Theme_Import();
        $import_all_options = get_template_directory() . '/inc/auto-install/'.$layout.'/theme-options.txt';
        $backupoptions = get_local_file_contents($import_all_options);
        if (is_serial_data($backupoptions)) {
            $themeoptions = unserialize($backupoptions);
        }
        if ($themeoptions) {
            foreach ($themeoptions as $themeoption) {
                update_option($themeoption->option_name, unserialize($themeoption->option_value));
            }
        }
        $import_all_widgets = get_template_directory() . '/inc/auto-install/'.$layout.'/import-widgets.wie';
        $import_all_contents = get_template_directory() . '/inc/auto-install/'.$layout.'/import-sample-contents.xml';
        

        if (file_exists($import_all_widgets)) {
            $flag = 'widget';
            $xml_import->import($import_all_widgets, $flag);
        }
        if (file_exists($import_all_contents)) {
            $flag = 'content';
            $xml_import->import($import_all_contents, $flag);
        }   
        update_option('listing_xml', 1);
        $args = array(
            'post_type' => 'page',
            'meta_key' => '_wp_page_template',
            'meta_value' => 'page-templates/home_page.php'
        );
        $page_query = new WP_Query($args);
        $front_page_id = $page_query->post->ID;
        update_option('page_on_front', $front_page_id);

        $page_for_posts = get_id_by_slug('blogs');
        update_option('page_for_posts', $page_for_posts);
        /* Set the nav menu location option as per menu type */
        $theme_name = get_option('stylesheet');        
    }
        theme_install_process();
    }
    
}