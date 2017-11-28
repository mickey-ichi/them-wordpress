<?php
/*
 *  Custom Theme Functions 
 */

/* ---------------------------------------------------------------------------
 * get template part 
 * --------------------------------------------------------------------------- */
function return_get_template_part($slug, $name = null) {
    ob_start();
    get_template_part($slug, $name);
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}

/* ---------------------------------------------------------------------------
 * Attachment | GET attachment ID by URL
 * --------------------------------------------------------------------------- */
if (!function_exists('tt_get_attachment_id_url')) {

    function tt_get_attachment_id_url($image_url) {
        global $wpdb;

        $image_url = esc_url($image_url);
        $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url));

        if (isset($attachment[0])) {
            return $attachment[0];
        }
    }

}
/* ---------------------------------------------------------------------------
 * Get Menu location
 * --------------------------------------------------------------------------- */
function megashop_get_menu_by_location( $location ) {
    if( empty($location) ) return false;

    $locations = get_nav_menu_locations();
    if( ! isset( $locations[$location] ) ) return false;

    $menu_obj = get_term( $locations[$location], 'nav_menu' );

    return $menu_obj;
}
/* ---------------------------------------------------------------------------
 * Attachment | GET attachment data
 * --------------------------------------------------------------------------- */
if (!function_exists('tt_get_attachment_data')) {

    function tt_get_attachment_data($image, $data, $with_key = false) {
        $size = $return = false;
        if (!is_numeric($image)) {
            // QUICK FIX https
            $image_ID = tt_get_attachment_id_url($image);

            if (!$image_ID) {
                $image = str_replace('https://', 'http://', $image);
                $image_ID = tt_get_attachment_id_url($image);
            }

            $image = $image_ID;
        }

        $meta = wp_prepare_attachment_for_js($image);
        if (is_array($meta) && isset($meta[$data])) {
            $return = $meta[$data];

            // if looking for alt and it isn't specified use image title
            if ($data == 'alt' && !$return) {
                $return = $meta['title'];
            }
        }

        if ($return && $with_key) {
            $return = $data . '="' . $return . '"';
        }

        return $return;
    }

}
/* ---------------------------------------------------------------------------
 * funtion for display pre-loader image
 * --------------------------------------------------------------------------- */
if (!function_exists('tt_pre_loader')) {
    function tt_pre_loader() {
        $pre_loader = of_get_option('pre_loader');
        $preloader_bg_color = of_get_option('preloader_bg_color');
        $display_preloader = of_get_option('display_preloader');
        if (!empty($pre_loader) && $display_preloader == 1 && is_front_page()) {
            
            $custom_css = ".ttloader {
                    background-color: ".esc_js($preloader_bg_color).";
                    height: 100%;
                    left: 0;
                    position: fixed;
                    top: 0;
                    width: 100%;
                    z-index: 999999;
                }.rotating {
                    background-image: url(".esc_js($pre_loader).");
                }.rotating {
                    background-position: center center;
                    background-repeat: no-repeat;
                    bottom: 0;
                    height: auto;
                    left: 0;
                    margin: auto;
                    position: absolute;
                    right: 0;
                    top: 0;
                    width: 100%;
                }";
            
            wp_add_inline_script( 'bootstrapjs', 'jQuery(window).load(function() { jQuery(".ttloader").fadeOut("slow"); });' );
            wp_add_inline_style( 'megashop-style', $custom_css );
        }
    }

}
add_action('wp_enqueue_scripts', 'tt_pre_loader');


if (!function_exists('megashop_masonry_init')) :

    function megashop_masonry_init() {
        $blog_layout = of_get_option('select_blog_layout');
        if ($blog_layout == 'masonry') {
             wp_add_inline_script( 'bootstrapjs', 'jQuery(window).load(function() { var $container = jQuery(".blog_wrap_div.masonry"); $container.imagesLoaded( function() {  $container.masonry({ itemSelector : ".ms-item"  }); }); });' );
        }
    }
    add_action('wp_enqueue_scripts', 'megashop_masonry_init');
    
endif; // ! megashop_masonry_init exists

 
/* ---------------------------------------------------------------------------
 * Woocommerce Functions
 * --------------------------------------------------------------------------- */
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    /* related post filter */
    add_filter('woocommerce_output_related_products_args', 'tt_related_products_args');

    function tt_related_products_args($args) {
        $args['posts_per_page'] = 8; // 4 related products
        return $args;
    }

    /* add wishlist in shop page */
    if (defined('YITH_WCWL') && !function_exists('yith_wcwl_add_wishlist_on_loop')) {

        function megashop_yith_wcwl_add_wishlist_on_loop() {
            ?><div class="button wishlist"><?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?></div> <?php
        }

        add_action('woocommerce_after_shop_loop_item', 'megashop_yith_wcwl_add_wishlist_on_loop', 15);
    }

    add_filter('woocommerce_add_to_cart_fragments', 'megashop_woocommerce_header_add_to_cart_fragment');

    function megashop_woocommerce_header_add_to_cart_fragment($fragments) {
        global $woocommerce;
        ob_start();
        ?>
        <button class="btn btn-inverse btn-block btn-lg dropdown-toggle" type="button" data-toggle="dropdown" data-loading-text="Loading...">
            <?php $cart_cnt = $woocommerce->cart->cart_contents_count; ?>
            <i class="cart-contents" id="headercarttrigger" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" title="<?php esc_html_e('View your shopping cart', 'megashop'); ?>"><span><?php echo esc_attr($cart_cnt); ?></span>
            </i>	
        </button>
        <?php
        $fragments['i.cart-contents'] = ob_get_clean();
        return $fragments;
    }

    function megashop_add_productthumb_div() {
        ?>
        <div class="product-thumb">
            <?php
        }

        add_action('woocommerce_before_shop_loop_item', 'megashop_add_productthumb_div', 5);

        function megashop_close_productthumb_div() {
            woo_custom_lable();
            woocommerce_show_product_loop_sale_flash();
            woocommerce_template_loop_product_link_close();
            ?>
        </div>
        <?php
    }

    add_action('woocommerce_before_shop_loop_item_title', 'megashop_close_productthumb_div', 15);

    add_action('woocommerce_before_single_product_summary', 'megashop_add_sproductthumb_div', 9);

    function megashop_add_sproductthumb_div() {
        ?>
        <div class="product-img">
            <?php
        }

        add_action('woocommerce_before_single_product_summary', 'close_sproductthumb_div', 25);

        function close_sproductthumb_div() {
            ?>
        </div>
        <?php
    }

    function add_productdesc_div() {
        ?>
        <div class="product-description"><div class="caption">
                <?php
            }

            add_action('woocommerce_before_shop_loop_item_title', 'add_productdesc_div', 20);

            function add_product_description_div() {
                global $post;
                ?><div class="description">
                    <?php echo apply_filters('woocommerce_short_description', $post->post_excerpt); ?>
                </div>
            </div><div class="button-wrapper">
                    <?php woocommerce_template_loop_price(); ?>
                <div class="button-group">
                    <?php
                }

                add_action('woocommerce_after_shop_loop_item', 'add_product_description_div', 1);

                function close_productdesc_div() {
                    ?>
                </div>
                <?php
            }

            add_action('woocommerce_after_shop_loop_item', 'close_productdesc_div', 20);

            /** add product sold out label * */
            add_action('woocommerce_before_shop_loop_item', 'product_outof_stock', 1);

            function product_outof_stock() {
                global $product;

                if (!$product->is_in_stock()) {
                    echo '<div class="soldout_wrap"><span class="soldout">' . esc_html__('SOLD OUT', 'megashop') . '</span></div>';
                }
            }

            /* cross cell products display in cart totlas */
            remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
            add_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 15);
            /*             * ******** */
            /* search products for ajax saerch */
            add_action('wp_ajax_nopriv_megashop_tt_ajax_pro_search', 'megashop_tt_ajax_pro_search');

            add_action('wp_ajax_megashop_tt_ajax_pro_search', 'megashop_tt_ajax_pro_search');

            function megashop_tt_ajax_pro_search() {
                global $woocommerce;
                $search_keyword = $_POST['keyword'];
                 $ordering_args = $woocommerce->query->get_catalog_ordering_args('title', 'asc');
                $search_results = array();
                $args = apply_filters( 'tt_live_search_query_args', array(
				'posts_per_page' 	=> 10,
				'no_found_rows' 	=> true,
				'post_type'		=> 'product',
				'post_status'		=> 'publish',
                                'orderby' => $ordering_args['orderby'],
                                'order' => $ordering_args['order']
			) );

			if( isset( $search_keyword ) ) {
				$args['s'] = $search_keyword;
			}

                if (isset($_POST['category']) && !empty($_POST['category'])) {
                    $args['tax_query'] = array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'slug',
                            'terms' => $_POST['category']
                            ));
                }
                $products = get_posts($args);
                if (!empty($products)) {
                    foreach ($products as $post) {
                        $product = wc_get_product($post);

                        $search_results[] = array(
                            'image' => get_the_post_thumbnail_url($product->id, 'shop_thumbnail'),
                            'id' => $product->id,
                            'value' => strip_tags($product->get_title()),
                            'url' => $product->get_permalink()
                        );
                    }
                } else {
                    $search_results[] = array(
                        'id' => 0,
                        'value' => esc_html__('No results', 'megashop'),
                        'url' => '#',
                    );
                }
                wp_reset_postdata();

                $search_results = array(
                    'search_results' => $search_results
                );
                echo json_encode($search_results);
                die();
            }

            /**/
            /*             * ********* add product category image and subcategory *********** */
            add_action('woocommerce_archive_description', 'megashop_woocommerce_category_image', 2);

            function megashop_woocommerce_category_image() {
                if (is_product_category()) {
                    global $wp_query;
                    $cat = $wp_query->get_queried_object();
                    $IDbySlug = get_term_by('slug', $cat->slug, 'product_cat');
                    $product_cat_ID = $IDbySlug->term_id;
                    $args = array(
                        'hierarchical' => 1,
                        'show_option_none' => '',
                        'hide_empty' => 0,
                        'parent' => $product_cat_ID,
                        'taxonomy' => 'product_cat'
                    );
                    $subcats = get_categories($args);
                    $desc = $IDbySlug->description;
                    $thumbnail_id = get_woocommerce_term_meta($cat->term_id, 'thumbnail_id', true);
                    $image = wp_get_attachment_url($thumbnail_id);
                    $subcats = array_filter($subcats);
                    if (!empty($subcats) || !empty($desc) || !empty($image)) {
                        ?><div class="category-description-wrap"><?php if (apply_filters('woocommerce_show_page_title', true)) { ?>
                                <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
                                <?php
                            }
                            if ($image) {
                                echo '<img src="' . esc_url($image) . '" alt="" />';
                            }
                        }
                    }
                }

                add_action('woocommerce_archive_description', 'megashop_woocommerce_category_image_end', 11);

                function megashop_woocommerce_category_image_end() {
                    if (is_product_category()) {
                        global $wp_query;
                        $cat = $wp_query->get_queried_object();
                        megashop_woocommerce_subcats_from_parentcat_by_Id($cat->slug);
                        $IDbySlug = get_term_by('slug', $cat->slug, 'product_cat');
                        $product_cat_ID = $IDbySlug->term_id;
                        $args = array(
                            'hierarchical' => 1,
                            'show_option_none' => '',
                            'hide_empty' => 0,
                            'parent' => $product_cat_ID,
                            'taxonomy' => 'product_cat'
                        );
                        $subcats = get_categories($args);
                        $desc = $IDbySlug->description;
                        $thumbnail_id = get_woocommerce_term_meta($cat->term_id, 'thumbnail_id', true);
                        $image = wp_get_attachment_url($thumbnail_id);
                        $subcats = array_filter($subcats);
                        if (!empty($subcats) || !empty($desc) || !empty($image)) {
                            ?></div><?php
            }
        }
    }

    function megashop_woocommerce_subcats_from_parentcat_by_Id($parent_cat_slug) {
        $IDbySlug = get_term_by('slug', $parent_cat_slug, 'product_cat');
        $product_cat_ID = $IDbySlug->term_id;
        $args = array(
            'hierarchical' => 1,
            'show_option_none' => '',
            'hide_empty' => 0,
            'parent' => $product_cat_ID,
            'taxonomy' => 'product_cat'
        );
        $subcats = get_categories($args);
        if (!empty($subcats)) {
            echo '<div class="category-list"><h3>' . esc_html__('Refine Search', 'megashop') . '</h3><div class="row"><div class="col-sm-12"><ul class="wooc_sclist unstyle-list">';
            foreach ($subcats as $sc) {
                $link = get_term_link($sc->slug, $sc->taxonomy);
                echo '<li><a href="' . esc_url($link) . '">' . $sc->name . '</a></li>';
            }
            echo '</ul></div></div></div>';
        }
    }

    /*     * ***************** */
    remove_action('woocommerce_pagination', 'woocommerce_pagination', 10);

    function woocommerce_pagination() {
                    ?><div class="woo_pagination"><?php
            the_posts_pagination(array(
                'prev_text' => esc_html__('Previous page', 'megashop'),
                'next_text' => esc_html__('Next page', 'megashop'),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__('Page', 'megashop') . ' </span>',
            ));
                    ?></div><?php
    }

    add_action('woocommerce_pagination', 'woocommerce_pagination', 10);

    function megashop_wooc_extra_register_fields() {
        ?> 
                <p class="form-row form-row-first"> 
                    <label for="reg_billing_first_name"><?php esc_html_e('First name', 'megashop'); ?><span class="required">*</span></label> 
                    <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if (!empty($_POST['billing_first_name'])) echo esc_html($_POST['billing_first_name']); ?>" /> 
                </p> 
                <p class="form-row form-row-last"> 
                    <label for="reg_billing_last_name"><?php esc_html_e('Last name', 'megashop'); ?><span class="required">*</span></label> 
                    <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if (!empty($_POST['billing_last_name'])) echo esc_html($_POST['billing_last_name']); ?>" /> 
                </p> 
                <div class="clear"></div> 
                <p class="form-row form-row-wide"> 
                    <label for="reg_billing_phone"><?php esc_html_e('Phone', 'megashop'); ?><span class="required">*</span></label> 
                    <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php if (!empty($_POST['billing_phone'])) echo esc_html($_POST['billing_phone']); ?>" /> 
                </p> 
                <?php
            }

            add_action('woocommerce_register_form_start', 'megashop_wooc_extra_register_fields');

            // Woocommerce rating stars always
            add_filter('woocommerce_product_get_rating_html', 'tt_get_rating_html', 10, 2);

            function tt_get_rating_html($rating_html, $rating) {
                if ($rating > 0) {
                    $title = sprintf(__('Rated %s out of 5', 'megashop'), $rating);
                } else {
                    $title = esc_html__('Not yet rated', 'megashop');
                    $rating = 0;
                }

                $rating_html = '<div class="star-rating" title="' . $title . '">';
                $rating_html .= '<span style="width:' . ( ( $rating / 5 ) * 100 ) . '%"><strong class="rating">' . $rating . '</strong> ' . esc_html__('out of 5', 'megashop') . '</span>';
                $rating_html .= '</div>';
                return $rating_html;
            }

            function wooc_validate_extra_register_fields($username, $email, $validation_errors) {
                if (isset($_POST['billing_first_name']) && empty($_POST['billing_first_name'])) {
                    $validation_errors->add('billing_first_name_error', __('<strong>Error</strong>: First name is required!', 'megashop'));
                }
                if (isset($_POST['billing_last_name']) && empty($_POST['billing_last_name'])) {
                    $validation_errors->add('billing_last_name_error', __('<strong>Error</strong>: Last name is required!.', 'megashop'));
                }
                if (isset($_POST['billing_phone']) && empty($_POST['billing_phone'])) {
                    $validation_errors->add('billing_phone_error', __('<strong>Error</strong>: Phone is required!.', 'megashop'));
                }
            }

            add_action('woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3);
            add_action('woocommerce_product_options_general_product_data', 'woo_add_custom_general_fields');

            function woo_add_custom_general_fields() {
                echo '<div class="options_group">';
                woocommerce_wp_text_input(
                        array(
                            'id' => 'new_label_text_field',
                            'label' => esc_html__('Product Custom Label', 'megashop'),
                            'placeholder' => esc_html__('New', 'megashop'),
                            'desc_tip' => 'true',
                            'description' => esc_html__('Enter the custom value here.', 'megashop')
                        )
                );
                woocommerce_wp_text_input(
                        array(
                            'id' => 'new_label_date_field',
                            'label' => esc_html__('Custom Label Last Date', 'megashop'),
                            'placeholder' => esc_html__('To  YYYY-MM-DD', 'megashop'),
                            'desc_tip' => 'true',
                            'description' => esc_html__('Select Date For Display Lable.', 'megashop')
                        )
                );
                echo '</div>';
            }

            add_action('woocommerce_process_product_meta', 'woo_add_custom_general_fields_save');

            function woo_add_custom_general_fields_save($post_id) {
                $new_label_text_field = $_POST['new_label_text_field'];
                if (!empty($new_label_text_field))
                    update_post_meta($post_id, 'new_label_text_field', esc_attr($new_label_text_field));
                $new_label_date_field = $_POST['new_label_date_field'];
                if (!empty($new_label_date_field))
                    update_post_meta($post_id, 'new_label_date_field', esc_attr($new_label_date_field));
            }

            function woo_custom_lable() {
                global $post;
                $date2 = date("Y-m-d");
                $custom_lable = get_post_meta($post->ID, 'new_label_text_field', true);
                $date1 = get_post_meta($post->ID, 'new_label_date_field', true);
                if (!empty($custom_lable) && strtotime($date2) <= strtotime($date1)) {
                    ?><div class="custom_lable"><?php echo esc_attr($custom_lable); ?></div><?php
        }
    }

}
/* ---------------------------------------------------------------------------
 * yith wishlist ajax update count
 * --------------------------------------------------------------------------- */
if (function_exists('YITH_WCWL')) {

    function megashop_update_wishlist_count() {
        wp_send_json(YITH_WCWL()->count_products());
    }

}
add_action('wp_ajax_megashop_update_wishlist_count', 'megashop_update_wishlist_count');
add_action('wp_ajax_nopriv_megashop_update_wishlist_count', 'megashop_update_wishlist_count');

/* ---------------------------------------------------------------------------
 * Get Parent Terms
 * --------------------------------------------------------------------------- */
function get_parent_terms($term) {
    if ($term->parent > 0) {
        $term = get_term_by("id", $term->parent, "product_cat");
        if ($term->parent > 0) {
            get_parent_terms($term);
        } else
            return $term;
    }
}
/* ---------------------------------------------------------------------------
 * Admin Footer Text 
 * --------------------------------------------------------------------------- */
if (isset($_GET['page']) && ($_GET['page'] == 'megashop' || $_GET['page'] == 'options-framework' || $_GET['page'] == 'support_megashop_submenu' || $_GET['page'] == 'shortcode_submenu')) {
    add_filter('admin_footer_text', 'megashop_remove_footer_admin'); //change admin footer text
    if (!function_exists('megashop_remove_footer_admin')) {

        function megashop_remove_footer_admin() {   ?>
            <p id="footer-left" class="alignleft">
                <?php esc_html_e('If you like ', 'megashop') ?>
                <a href="#" target="_blank"><strong><?php esc_html_e('Megashop WooCommerce Responsive Theme ', 'megashop') ?></strong></a>
            <?php esc_html_e('please leave us a ', 'megashop') ?>
                <a class="as-review-link" data-rated="Thanks :)" target="_blank" href="https://themeforest.net/item/mega-shop-woocommerce-multipurpose-responsive-theme/reviews/19403919">&#x2605;&#x2605;&#x2605;&#x2605;&#x2605;</a>
            <?php esc_html_e(' rating. A huge thank you from TemplateTrip in advance!', 'megashop') ?>
            </p>
            <?php
      }
    }
}
/* ---------------------------------------------------------------------------
 * Add Theme Panel 
 * --------------------------------------------------------------------------- */
if (current_user_can('manage_options')) {
    get_template_part('admin/megashop_menu', 'panel');
}

/* ---------------------------------------------------------------------------
 * Redirect on theme activation
 * --------------------------------------------------------------------------- */
add_action('admin_init', 'megashop_theme_setup_options');

function megashop_theme_setup_options() {
    global $pagenow;
    if (is_admin() && isset($_GET['activated']) && $pagenow == 'themes.php') {
        wp_redirect(admin_url('admin.php?page=megashop'));
        exit;
    }
}

/* ---------------------------------------------------------------------------
 * post classes
 * --------------------------------------------------------------------------- */
add_filter('post_class', 'megashop_prefix_post_class', 21);

function megashop_prefix_post_class($classes) {
    if ('product' == get_post_type()) {
        $classes = array_diff($classes, array('first', 'last'));
    }
    return $classes;
}

/* ---------------------------------------------------------------------------
 * advanced search functionality for product search
 * --------------------------------------------------------------------------- */
function megashop_advanced_search_query($query) {

    if ($query->is_search()) {
        // category terms search.
        if (isset($_GET['category']) && !empty($_GET['category'])) {
            $query->set('tax_query', array(array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => array($_GET['category']))
            ));
        }
        return $query;
    }
}

add_action('pre_get_posts', 'megashop_advanced_search_query', 1000);
