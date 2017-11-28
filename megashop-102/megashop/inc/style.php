<?php

    /*
    * To change this template, choose Tools | Templates
    * and open the template in the editor.
    */
    if (!defined('ABSPATH')) {
        exit; // Exit if accessed directly
    }
    if (!is_admin()) {
            $megashop_PrimaryColor = of_get_option('megashop_primary_color');
            $megashop_SecondaryColor = of_get_option('megashop_secondary_color');
            $megashop_TitleColor = of_get_option('megashop_title_color');
            $megashop_MetaFontColor = of_get_option('megashop_meta_font_color');
            $megashop_PageContentColor = of_get_option('megashop_pagecontent_color');
            $theme_layout = of_get_option('theme_layout');
            $back_pattern =of_get_option('body_back_image');
			$header_background_image = of_get_option('header_background_image');
            $header_layout = of_get_option('header_layout');
            $container_width = of_get_option('container_width');
            $theme_layout = of_get_option('theme_layout');
            $footer_bg_color = of_get_option('footer_bg_color');
			$footer_background_image = of_get_option('footer_background_image');
			$bottom_footer_bg_color = of_get_option('bottom_footer_bg_color');
            $footer_title_color = of_get_option('footer_title_color');
            $footer_text_color = of_get_option('footer_text_color');
            $footer_link_hover_color = of_get_option('footer_link_hover_color');
            $box_layout = of_get_option('box_layout');
            $background = of_get_option('body_bg_img');
            $body_bg_color = of_get_option('body_bg_color');

        if($box_layout == 1){ 
            if ($background['color'] || $background['image']) {
                echo '<style type="text/css" >';
                echo 'body {';
                echo 'padding: 40px 0;';
                if ($background['color']) {   
                    echo '
                    background-color: ' .esc_attr($background['color']). ';';
                }

                if ($background['image']) {
                    echo '
                    background-image: url('.esc_attr($background['image']). ') ;';
                    echo 'background-reapet:'.esc_attr($background['repeat']). '; ';
                    echo 'background-position:'.esc_attr($background['position']). ';';
                    echo 'background-attachment:'.esc_attr($background['attachment']). ';';
                } 
                echo '
                }';
                echo '</style>';
            }
        }
		if ($header_background_image['color'] || $header_background_image['image']) {
                echo '<style type="text/css" >';
                echo 'header .full-header {';
                if ($header_background_image['color']) {   
                    echo '
                    background-color: ' .esc_attr($header_background_image['color']). ';';
                }

                if ($header_background_image['image']) {
                    echo '
                    background-image: url('.esc_attr($header_background_image['image']). ') ;';
                    echo 'background-reapet:'.esc_attr($header_background_image['repeat']). '; ';
                    echo 'background-position:'.esc_attr($header_background_image['position']). ';';
                    echo 'background-attachment:'.esc_attr($header_background_image['attachment']). ';';
                } 
                echo '
                }';
                echo '</style>';
            }
        $custom_css = of_get_option('custom_css');
    ?>
    <style type="text/css">
        table.compare-list .add-to-cart td a.button{
            text-transform: capitalize !important;
        }
        table.compare-list th,table.compare-list tr,table.compare-list td{
            line-height:1.5;
        }
        .DTFC_ScrollWrapper .DTFC_LeftWrapper{
            border-left:1px solid #dddddd;
        }
        #wc-quick-view-popup{
            display:none;
        }
        table.compare-list .remove td a .remove{
            height: 15px;
            line-height: 12px;
            width: 15px;
        }
        <?php if (!empty($custom_css)) {
        echo esc_attr($custom_css); 
            }
        if($body_bg_color !="" && $box_layout != 1){ ?>
        body {
            background: <?php echo esc_attr($body_bg_color); ?>;
        }
        <?php }
        if($body_bg_color == "#ffffff" || $body_bg_color =="#fff"){ ?>
        .page.type-page .entry-content{
            padding:0;
        }
		<?php }
		if($footer_background_image != ""){ ?>
			footer.site-footer{
				background-image:url("<?php echo esc_attr($footer_background_image); ?>");
				background-repeat:no-repeat;
	}
	<?php
    } if($bottom_footer_bg_color != ""){ ?>
	.site-footer .footer-bottom{
	background:<?php echo esc_attr($bottom_footer_bg_color); ?> none repeat scroll 0 0;
	}
    <?php }
        if($body_bg_color !="" && $box_layout == 1){ ?>
        .site.box_layout.container.padding_0 {
            background: <?php echo esc_attr($body_bg_color); ?>;
        }
        <?php }  if($container_width > 1310){ ?>    
        @media (min-width:992px) {
            .container , .box_layout .full-header.fixed{
                width: 970px
            }
        }
        @media (min-width: <?php echo esc_attr($container_width); ?>px) {
        .container , .box_layout .full-header.fixed{
            max-width: <?php echo esc_attr($container_width); ?>px;
            width:  100%;
        }
        }
        @media  (min-width: 1599px) and (max-width:1630px) {
            div:not(.box_layout) .container {
                width: 100%;
            }   
        }
        @media (min-width: 1301px) and (max-width: 1600px) {
        .container, .box_layout .full-header.fixed {
                max-width: 1295px;
                width:1295px;
        }
        }
        @media (min-width: 1200px) and (max-width: 1300px) {
                .container, .box_layout .full-header.fixed {
                    max-width: 1170px;
                        width:1170px;;
                }	
        }
            <?php  }
        if($container_width != "" && $container_width <= 1310){ ?>
        @media screen and (min-width: 1280px) {
        .container, .box_layout .full-header.fixed {
            max-width: <?php echo esc_attr($container_width); ?>px;
            width: 100%;
        }
        }

        <?php
        }if($megashop_TitleColor != ""){
            ?>
    .sidebar .widget_maxmegamenu .mega-menu-wrap ul.mega-menu li a:hover, .sidebar .widget_maxmegamenu .mega-menu-wrap ul.mega-menu li.mega-current-menu-item > a, .sidebar .widget_maxmegamenu .mega-menu-wrap ul.mega-menu li.mega-current-menu-parent > a,.site .address-container h1.small-title span,.pricing_heading,.cart-collaterals .cart_totals h2,.woocommerce table.shop_table tbody th,.woocommerce table.shop_table th,.woocommerce-cart .cart-collaterals .cart_totals table tr:first-child th,a:hover, a:focus, a:active,.page-title-wrapper .page-title,.page-title-wrapper .product_title,.page-title-wrapper .page-title a,#ttcmsleftservices .block_content > div .ttcontent_inner .service .service-content .service-title.entry-content h2,.entry-content h2, .entry-summary h2,.comment-content h3.entry-summary h3,.sidebar .widget .widget-title,.TTProduct-Tab .nav-tabs > li > a,
        .comment-content h3,.entry-content h1,.entry-summary h1,.comment-content h1,.entry-content h4,.entry-summary h4,.comment-content h4,.entry-content h5,.entry-summary h5,.comment-content h5,#blog_latest_new_home .block_content ul,#ttsmartblog-carousel li .blog-content .blog-sub-content .read-more:hover{
            color:<?php echo esc_attr($megashop_TitleColor); ?>;
        }
        .comments-title, .comment-reply-title,.metaslider .flexslider .flex-direction-nav a.flex-next:after,.metaslider .flexslider .flex-direction-nav a.flex-prev:after,.auto_install_layout8 .product-description a h3,.myaccount-menu.dropdown .dropdown-menu a:hover,.product-categories li.current-cat > a, .product-categories li.current-cat-parent > a,.woocommerce div.product .woocommerce-tabs ul.tabs > li.active > a, .woocommerce div.product .woocommerce-tabs ul.tabs > li.active > a:focus, .woocommerce div.product .woocommerce-tabs ul.tabs > li.active > a:hover, .woocommerce div.product .woocommerce-tabs ul.tabs > li.active > a:focus,.products > h2, .summary.entry-summary .product_title, .woocommerce-account .addresses .title h3,.blog-content .blog-sub-content .post_title a,li.product:hover .caption a h3,.testimonial_slider li .testimonial-user-title h3,.site .address-container h1.small-title,.TTProduct-Tab .nav-tabs > li > a,.box-heading > h3,.site .address-container h1.small-title,.site .address-container h1.small-title span,.address-text .address-label,.cross-sells .owl-controls .owl-buttons .owl-prev:hover:before,.cross-sells .owl-controls .owl-buttons .owl-next:hover:before,.customNavigation a:hover:before,.filter_wrapper .widget .widget-title,.sidebar .widget .widget-title,.woocommerce-account .woocommerce-MyAccount-content a,.woocommerce-MyAccount-navigation-link.is-active a,.myaccount-menu.dropdown .dropdown-menu .woocommerce-MyAccount-navigation-link.is-active a,.myaccount-menu.dropdown .dropdown-menu a.login.is_active, .metaslider .flexslider .flex-next,.metaslider .flexslider .flex-prev,.metaslider .flexslider .flex-next:hover,.metaslider .flexslider .flex-prev:hover,.custom_lable,#ttcategory .ttcmscategory .ttcategory-main #ttcategory-carousel .ttcategory.inner:hover .tt-title,.sidebar .widget_maxmegamenu .mega-menu-wrap ul.mega-menu li a:hover,.sidebar .widget_maxmegamenu .mega-menu-wrap ul.mega-menu li.mega-current-menu-item > a,.sidebar .widget_maxmegamenu .mega-menu-wrap ul.mega-menu li.mega-current-menu-parent > a, .woocommerce table.shop_table tfoot td, .woocommerce table.shop_table tfoot th ,.woocommerce-checkout-payment label,
        .woocommerce-checkout h3,.woocommerce h2.wc-bacs-bank-details-heading,.woocommerce-order-received .woocommerce h2{
            color: <?php echo esc_attr($megashop_TitleColor); ?>;
        } 
        .metaslider .flexslider .flex-next,.metaslider .flexslider .flex-prev{
            border-color:<?php echo esc_attr($megashop_TitleColor); ?>;
        }
        #mega-menu-wrap-left_menu .mega-menu-toggle,.style-2 .pricing_button a#pricing-btn,.style-1 .pricing_button a#pricing-btn:hover,.auto_install_layout8.woocommerce .product_layout3 ul.products li.product-list .button.add_to_cart_button,.metaslider .flexslider .flex-next:hover,.metaslider .flexslider .flex-prev:hover{
            background-color:<?php echo esc_attr($megashop_TitleColor); ?>;
        }
        .woocommerce div.product .woocommerce-tabs ul.tabs > li.active > a,
        .woocommerce div.product .woocommerce-tabs ul.tabs > li.active > a:focus,
        .woocommerce div.product .woocommerce-tabs ul.tabs > li.active > a:hover,
        .woocommerce div.product .woocommerce-tabs ul.tabs > li.active > a:focus{
            border-color:<?php echo esc_attr($megashop_TitleColor); ?>;
        }
        @media (max-width:767px) {
            .header_1 .header_cart button.btn.dropdown-toggle{
                background: <?php echo esc_attr($megashop_SecondaryColor); ?> !important;
            }
        }<?php
        } if($megashop_PageContentColor != ""){
            ?>
        del > .woocommerce-Price-amount.amount,.myaccount-menu.dropdown .dropdown-menu a,.select2-container .select2-choice,.sidebar .widget_maxmegamenu .mega-menu-wrap ul.mega-menu > li.mega-menu-item-has-children::after, .sidebar .widget_maxmegamenu .mega-menu-wrap ul.mega-menu > li.mega-menu-flyout li.mega-menu-item-has-children::after, .sidebar .widget_maxmegamenu .mega-menu-wrap ul.mega-menu > li.mega-menu-flyout li li.mega-menu-item-has-children::after, input[type="date"], input[type="time"], input[type="datetime-local"], input[type="week"], input[type="month"], input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="search"], input[type="tel"], input[type="number"], textarea,.woocommerce-error, .woocommerce-info, .woocommerce-message,.testimonial_slider .tttestimonial-subtitle,.woocommerce div.product .woocommerce-tabs ul.tabs li a,body,a,*::-moz-placeholder,.product-description a h3,.woocommerce ul.products li.product .price del > .woocommerce-Price-amount.amount, .woocommerce li.product .price del > .woocommerce-Price-amount.amount, .woocommerce ul.products li.product .price, .woocommerce li.product .price,body:not(.search-results) .entry-summary{
            color:<?php echo esc_attr($megashop_PageContentColor); ?>;
        }
        .sidebar .widget_maxmegamenu .mega-menu-wrap ul.mega-menu > li > a{
            color:<?php echo esc_attr($megashop_PageContentColor); ?> !important;
        }

        <?php
        }    
		 if($header_background_image['color'] =="#ffffff"){ ?>
        .ttheader .ttcmsheaderservices,.ttheader  .header_cart {
			color:<?php echo esc_attr($megashop_PageContentColor); ?> !important;
		}

		<?php
		}
		 if($megashop_PrimaryColor !=""){ ?>    
       .auto_install_layout10 .header_1 .top-header,.auto_install_layout3 #headercarttrigger > span,.product-description .button-group .ajax.button.quick-btn:hover, .product-description .button-group .button.yith-wcqv-button:hover,.style-1 .pricing_button a#pricing-btn,.style-2 .pricing_button a#pricing-btn:hover,.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,.woocommerce .widget_price_filter .ui-slider .ui-slider-range,.style1 #tab ul li a.current, .style1 #tab ul li a:hover,.auto_install_layout5 .search_button.btn.button-search:hover,.auto_install_layout8 .pagination .prev:hover,.auto_install_layout8 .pagination .next:hover,
        .auto_install_layout8 .product-list .product-description .add_to_cart_button,.header_2 .top-header,.quick-wcqv-head #wc-quick-view-close:hover,#yith-wacp-popup .yith-wacp-close:hover,
        .footer-bottom,a.scroll-up:hover,button, input[type="button"], input[type="reset"], input[type="submit"],#yith-wacp-popup .yith-wacp-content a.button,
        .woocommerce #respond input#submit, .woocommerce a.button, .product-description .button-group .button:hover, 
        .product-description .button-group .button.wishlist .yith-wcwl-add-to-wishlist:hover, 
        .product-description .button-group .button.wishlist .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse.show,
        .product-description .button-group .button.wishlist .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse.show,
        .product-description .button-group .button.ajax_add_to_cart.added, .product-description .yith-wcwl-wishlistaddedbrowse.show > a, 
        .yith-wcwl-wishlistaddedbrowse.show, .product-description .button-group .compare.button.added,.header-middle .header-bottom-menu,
        .woocommerce button.button, .woocommerce input.button, .pagination .page-numbers:hover,.pagination .current,
        .product-list .product-description .add_to_cart_button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,
        .product-description .button-group .ajax.button.quick-btn:hover,.widget_calendar tbody a,li .blog-content .blog_image_holder .bloglinks a:hover, article.type-post .blog-wrap .bloglinks a:hover{
        background-color:<?php echo esc_attr($megashop_PrimaryColor); ?>;
        }
        .woocommerce .woocommerce-Reviews nav.woocommerce-pagination ul li a:hover,.woocommerce .woocommerce-Reviews nav.woocommerce-pagination ul li a:focus,.woocommerce .woocommerce-Reviews nav.woocommerce-pagination ul li a:hover,.woocommerce-Reviews .woocommerce-pagination .page-numbers span.page-numbers.current,.woocommerce-Reviews .woocommerce-pagination .page-numbers span.page-numbers:hover, .auto_install_layout8 .site-header .search_button.btn.button-search:hover,.woocommerce .single_add_to_cart_button.alt,.yith-wcqv-wrapper .single_add_to_cart_button.alt,.auto_install_layout4.woocommerce li.product .button-group a.button:hover,.auto_install_layout4 .woocommerce a.checkout-button.button:hover,.auto_install_layout4.woocommerce .product-list .product-description .add_to_cart_button,.auto_install_layout1 .widget_wysija .widget_wysija_cont .wysija-submit:hover,.auto_install_layout2 .widget_wysija .widget_wysija_cont .wysija-submit:hover,.auto_install_layout2 .wysija-submit:hover,.auto_install_layout5 .site-header  .search_button.btn.button-search:hover,.auto_install_layout6 .footer-column .widget_wysija .widget_wysija_cont .wysija-submit:hover,.auto_install_layout6 .site-header .search_button.btn.button-search:hover,.auto_install_layout3 .responsivemenu #mega-menu-wrap-left_menu,.auto_install_layout3 .footer-column .widget_wysija .widget_wysija_cont .wysija-submit:hover,.auto_install_layout3 .site-header .search_button.btn.button-search:hover,.auto_install_layout3 .top-header,table.compare-list .add-to-cart td a:hover,.woocommerce-page #content div.product .product-block .single_add_to_cart_button,.quick-wcqv-main .single_add_to_cart_button.alt{
        background-color:<?php echo esc_attr($megashop_PrimaryColor); ?> !important;
        }
        .woocommerce .woocommerce-Reviews nav.woocommerce-pagination ul li a.page-numbers:hover,.woocommerce .woocommerce-Reviews nav.woocommerce-pagination ul li a:hover,.woocommerce .woocommerce-Reviews nav.woocommerce-pagination ul li a:focus,.woocommerce .woocommerce-Reviews nav.woocommerce-pagination ul li a:hover,.woocommerce-Reviews .woocommerce-pagination .page-numbers span.page-numbers.current,.woocommerce-Reviews .woocommerce-pagination .page-numbers span.page-numbers:hover,.yith-wcqv-head #yith-quick-view-close:hover,.auto_install_layout8 .pagination .page-numbers.current,.auto_install_layout8 .pagination .page-numbers:hover,.auto_install_layout8 .pagination:hover:before,.auto_install_layout8 .pagination:hover:after,
        .auto_install_layout3 .site-header .search_button.btn.button-search:hover,li .blog-content .blog_image_holder .bloglinks a:hover, article.type-post .blog-wrap .bloglinks a:hover,.auto_install_layout8 .site-header .search_button.btn.button-search:hover{
            border-color:<?php echo esc_attr($megashop_PrimaryColor); ?>;
        }
        .pagination .page-numbers:hover,.pagination .current{
            border:1px solid <?php echo esc_attr($megashop_PrimaryColor); ?>;
        }    
        .horizontal_tab.style2 #tab ul li a.current, .horizontal_tab.style2 #tab ul li a:hover{
        border-top: 2px solid <?php echo $megashop_PrimaryColor; ?>;
        }
        .vertical_tab.style2 #tab ul li a.current, .vertical_tab.style2 #tab ul li a:hover{
            border-left: 2px solid <?php echo esc_attr($megashop_PrimaryColor); ?>;
        }
        #yith-quick-view-close,.woocommerce-Price-amount.amount,.yith-wcqv-head #yith-quick-view-close:hover,.address-text .fa,.pricing_top_inner sup.currency ,.pricing_top .pricing_price,.pricing_top .pricing_per ,.style3 #tab ul li a.current, .style3 #tab ul li a:hover,.blog-content .blog-sub-content .read-more, .blog-content .read-more,.entry-footer a:hover, .entry-footer a:focus, .entry-meta a:hover, .entry-meta a:focus,.auto_install_layout8 .top-header a:hover,.post-navigation a:hover .post-title, .post-navigation a:focus .post-title,.woocommerce li.product .price ins,#ttcmsleftservices .block_content > div:hover .ttcontent_inner .service .service-content .service-title,
        .TTProduct-Tab .nav-tabs > li.active > a, .TTProduct-Tab .nav-tabs > li.active > a:hover, .TTProduct-Tab .nav-tabs > li.active > a:focus,
        .product_list_widget ins .woocommerce-Price-amount.amount,.blog-content .blog-sub-content .read-more,.blog-content .read-more
        .woocommerce li.product .woocommerce-Price-amount.amount, .product_list_widget ins .woocommerce-Price-amount.amount,
        .woocommerce li.product .woocommerce-Price-amount.amount, .product_list_widget ins .woocommerce-Price-amount.amount, .woocommerce .product-price ins .woocommerce-Price-amount.amount
        .woocommerce .product-price ins .woocommerce-Price-amount.amount,.breadcrumb a:hover, .breadcrumb a:focus,.product_list_widget ins .woocommerce-Price-amount.amount
        .woocommerce .wishlist_table tr td.product-stock-status span.wishlist-in-stock,.woocommerce div.product p.price, .woocommerce div.product span.price,.site-footer .follow-us ul li a:hover{
            color: <?php echo esc_attr($megashop_PrimaryColor); ?>;
        }
        .auto_install_layout12 .TTProduct-Tab .nav-tabs > li.active > a,.auto_install_layout12 .TTProduct-Tab .nav-tabs > li.active > a:hover,.auto_install_layout12 .TTProduct-Tab .nav-tabs > li.active > a:focus, .auto_install_layout8 .wishlistbtn a:hover,.auto_install_layout4 .widget .widget_wysija input[type="submit"]:hover,.auto_install_layout4.woocommerce-page div.product .product-block .single_add_to_cart_button:hover,.auto_install_layout4.woocommerce #payment #place_order, .auto_install_layout4.woocommerce-page #payment #place_order:hover,.auto_install_layout4.woocommerce .product-list .product-description .add_to_cart_button:hover,.auto_install_layout4 .woocommerce a.checkout-button.button,.auto_install_layout4 .woocommerce #respond input#submit:hover,.auto_install_layout4 .woocommerce a.button:hover,.auto_install_layout4 .woocommerce button.button:hover,.site-footer .follow-us li a:hover,.site-header .search_button.btn.button-search:hover{
            color: <?php echo esc_attr($megashop_PrimaryColor); ?> !important;
        }    
        <?php } if($megashop_SecondaryColor !=""){ ?>
       .auto_install_layout9 .woocommerce .product-thumb span.onsale,.auto_install_layout9 .woocommerce ul.products li.product .product-thumb .onsale,.auto_install_layout9 .metaslider .flexslider .flex-next:hover,.auto_install_layout9 .metaslider .flexslider .flex-prev:hover,.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content,.latestblog-carousel li.item .blog_image_holder .ttblog_date,button:hover, button[disabled]:hover, button[disabled]:focus, #yith-wacp-popup .yith-wacp-content a.button:hover
        , input[type="button"][disabled]:hover, input[type="button"][disabled]:focus, input[type="reset"], 
        input[type="reset"][disabled]:hover, input[type="reset"][disabled]:focus,
        input[type="submit"][disabled]:hover, input[type="submit"][disabled]:focus,.quick-wcqv-head #wc-quick-view-close,#yith-wacp-popup .yith-wacp-close,
        .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,
        .product-list .product-description .add_to_cart_button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.single-product.woocommerce .product-img .thumbnails #slider-prev:hover, .single-product.woocommerce .product-img .thumbnails #slider-next:hover{
            background-color: <?php echo esc_attr($megashop_SecondaryColor); ?>;
        }
        .latestblog-carousel li.item .blog_image_holder .ttblog_date::before,.latestblog-carousel li.item .blog_image_holder .ttblog_date::after{
            border-top: 1px solid <?php echo esc_attr($megashop_SecondaryColor); ?>;
        }
        .auto_install_layout8 .site-header .search_button.btn.button-search,.auto_install_layout8 .product-description .button-group .compare.button.added,.auto_install_layout8.woocommerce .product_layout3 ul.products .button.yith-wcqv-button:hover, .auto_install_layout8.woocommerce .product_layout3 ul.products li .button.wishlist .yith-wcwl-add-to-wishlist:hover,.auto_install_layout8.woocommerce .product_layout3 ul.products li .button.ajax.button.quick-btn:hover,.auto_install_layout8.woocommerce .product_layout3 ul.products li .button:hover,.auto_install_layout8.woocommerce .product_layout3 ul.products li.product-list .button.add_to_cart_button:hover,.auto_install_layout4 li .blog-content .blog_image_holder .bloglinks a:hover,.auto_install_layout4 article.type-post .blog-wrap .bloglinks a:hover,.widget_calendar tbody a:hover, .widget_calendar tbody a:focus,.auto_install_layout8 .pagination .prev,.auto_install_layout8 .pagination .next,.auto_install_layout8 .pagination::before,.auto_install_layout8 .pagination::after,.auto_install_layout8 .product-list .product-description .add_to_cart_button:hover,.auto_install_layout8 .TTProduct-Tab .nav-tabs > li > a:hover,.auto_install_layout8 .TTProduct-Tab .nav-tabs > li.active > a,.auto_install_layout8 .product-description .button-group .button.wishlist .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse.show,
        .auto_install_layout8 .product-description .button-group .button.wishlist .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse.show,
        .auto_install_layout8 .product-description .button-group .button.ajax_add_to_cart.added,.auto_install_layout8 .product-description .yith-wcwl-wishlistaddedbrowse.show > a, 
        .product_layout3 .product-description .button-group .button:hover,.auto_install_layout8 #headercarttrigger > span,
        .product_layout3 .product-description .button-group .ajax.button.quick-btn:hover,.product_layout3 li.product-grid .product-description .button-group .button.wishlist .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse.show,
        .product_layout3 .product-description .button-group .button.wishlist .yith-wcwl-add-to-wishlist:hover,.site-header.header_2 .cart_contents, a.scroll-up,button:hover, button:focus, input[type="button"]:hover, input[type="button"]:focus, input[type="reset"]:hover, input[type="reset"]:focus, input[type="submit"]:hover, input[type="submit"]:focus {
            background-color: <?php echo esc_attr($megashop_SecondaryColor); ?>;
        }
        .auto_install_layout9 .metaslider .flexslider .flex-direction-nav a:hover,.auto_install_layout2 .wysija-submit,.auto_install_layout2 .site-header .woocommerce-product-search .search_button.btn.button-search:hover,.auto_install_layout2 .site-header .woocommerce-product-search .search_button.btn.button-search,.auto_install_layout4 #headercarttrigger > span,.auto_install_layout8 #mega-menu-primary > li.mega-menu-item > a:hover,.auto_install_layout8 #mega-menu-primary > li.mega-current-menu-parent > a,.auto_install_layout8 #mega-menu-primary > li.mega-current-menu-item > a,table.compare-list .add-to-cart td a,.woocommerce.single-product .single_add_to_cart_button.button:hover,.site-header.header_2 .responsivemenu .mega-menu-wrap,.site-header.header_2 .mega-menu-toggle,.woocommerce-page #content div.product .product-block .single_add_to_cart_button:hover,.widget .widget_wysija input[type="submit"]:hover, .widget .widget_wysija input[type="submit"]:focus,.site-header .search_button.btn.button-search:hover,.auto_install_layout7 .site-header .search_button.btn.button-search:hover,.auto_install_layout6 .site-header .search_button.btn.button-search:hover{
            background: <?php echo esc_attr($megashop_SecondaryColor); ?> !important;
        }
        .woocommerce .woocommerce-Reviews nav.woocommerce-pagination ul li a,.auto_install_layout8 .site-header .search_button.btn.button-search,.auto_install_layout8.woocommerce .product_layout3 ul.products li .button.wishlist .yith-wcwl-add-to-wishlist:hover,.auto_install_layout8.woocommerce .product_layout3 ul.products li .button.ajax.button.quick-btn:hover,.auto_install_layout8.woocommerce .product_layout3 ul.products li .button:hover,.auto_install_layout8.woocommerce .product_layout3 ul.products li.product-list .button.add_to_cart_button:hover,.auto_install_layout4 li .blog-content .blog_image_holder .bloglinks a:hover,.auto_install_layout4 article.type-post .blog-wrap .bloglinks a:hover,.widget_calendar tbody a:hover, .widget_calendar tbody a:focus,.auto_install_layout8 .pagination .prev,.auto_install_layout8 .pagination .next,.auto_install_layout8 .pagination::before,.auto_install_layout8 .pagination::after,.auto_install_layout8 .product-list .product-description .add_to_cart_button:hover,.auto_install_layout8 .TTProduct-Tab .nav-tabs > li > a:hover,.auto_install_layout8 .TTProduct-Tab .nav-tabs > li.active > a,.auto_install_layout8 .product-description .button-group .button.wishlist .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse.show,
        .auto_install_layout8 .product-description .button-group .button.wishlist .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse.show,.auto_install_layout2 .site-header .woocommerce-product-search .search_button.btn.button-search,.single-product.woocommerce .product-img .thumbnails #slider-next:hover,.single-product.woocommerce .product-img .thumbnails #slider-prev:hover,.auto_install_layout4 li .blog-content .blog_image_holder .bloglinks a:hover,.auto_install_layout4 article.type-post .blog-wrap .bloglinks a:hover,.auto_install_layout8 .TTProduct-Tab .nav-tabs > li > a:hover, .auto_install_layout8 .TTProduct-Tab .nav-tabs > li > a:focus,.auto_install_layout8 .pagination .page-numbers,.auto_install_layout8 .pagination::before,.auto_install_layout8 .pagination::after,.site-header .search_button.btn.button-search:hover,.auto_install_layout8 .TTProduct-Tab .nav-tabs > li.active > a,.auto_install_layout8 .TTProduct-Tab .nav-tabs > li.active > a:focus,.auto_install_layout8 .TTProduct-Tab .nav-tabs > li.active > a:hover{
            border-color:<?php echo esc_attr($megashop_SecondaryColor); ?>;
        }    
		.auto_install_layout9 .metaslider .flexslider .flex-direction-nav a:hover{
		border-color:<?php echo esc_attr($megashop_SecondaryColor); ?> !important;
		}
        .woocommerce .woocommerce-Reviews nav.woocommerce-pagination ul li a.page-numbers{
            color: <?php echo esc_attr($megashop_SecondaryColor); ?> !important;
        }
        #mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item.mega-toggle-on > a.mega-menu-link, #mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item > a.mega-menu-link:hover, #mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item > a.mega-menu-link:focus,.auto_install_layout4.woocommerce .product-list .product-description .add_to_cart_button:hover,.auto_install_layout4.woocommerce a.button:hover,.auto_install_layout4.woocommerce li.product.product-list .button-group a.add_to_cart_button.button:hover{
            background-color: <?php echo esc_attr($megashop_SecondaryColor); ?> !important;
        }
        .ttcategory.inner:hover .tt-title,footer.site-footer .copyright a:hover{
            color: <?php echo esc_attr($megashop_SecondaryColor); ?> !important;
        }
        @media (max-width:991px) {
            #mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item.mega-toggle-on > a.mega-menu-link, #mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item > a.mega-menu-link:hover, #mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item > a.mega-menu-link:focus,#mega-menu-wrap-primary #mega-menu-primary > li:hover > a.mega-menu-link,#mega-menu-wrap-primary #mega-menu-primary > li.mega-current-menu-item > a.mega-menu-link,#mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item.mega-toggle-on > a.mega-menu-link,#mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item.mega-toggle-on > a.mega-menu-link,.auto_install_layout8 #mega-menu-primary > li.mega-menu-item > a:hover,.auto_install_layout8 #mega-menu-primary > li.mega-current-menu-parent > a,.auto_install_layout8 #mega-menu-primary > li.mega-current-menu-item > a{
                background-color:transparent !important;
            }
        }
        @media (max-width:767px) {
            .site-header.header_3 .header_cart.ttheader_cart{
                background: <?php echo esc_attr($megashop_SecondaryColor); ?> !important;
            } 
        }
        <?php } if($megashop_MetaFontColor != ""){
            ?>
        .TTProduct-Tab .nav-tabs > li > a:hover,#ttcmsleftservices .block_content > div:hover .ttcontent_inner .service .service-content .service-title,    
        .site-footer .widget .widget-title, .site-footer #ttcmsfooterservice .title_block,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.TTProduct-Tab .nav-tabs > li.active > a, .TTProduct-Tab .nav-tabs > li.active > a:hover, .TTProduct-Tab .nav-tabs > li.active > a:focus{
            color:<?php echo esc_attr($megashop_MetaFontColor); ?>;
        }
        .auto_install_layout4 a.scroll-up{
            color:<?php echo esc_attr($megashop_MetaFontColor); ?> !important;
        }
        .auto_install_layout4 a.scroll-up:hover{
            color: #fff !important;
        }
		.auto_install_layout12 .header_1 .top-header{
		background:<?php echo esc_attr($megashop_TitleColor); ?> !important;
		}
        .auto_install_layout8.product_layout3 ul.products li.product:hover .product-container,.auto_install_layout8 .product-description .button-group .button,.auto_install_layout8 .product-description .button-group .ajax.button.quick-btn,.auto_install_layout8 .product-description .button-group .button.wishlist .yith-wcwl-add-to-wishlist,.auto_install_layout4 a.scroll-up:hover,.product_layout3 .product_wrap ul.products li.product-list:hover .product-container .product-thumb,.auto_install_layout8 .TTProduct-Tab .nav-tabs > li > a,.auto_install_layout8 .header_1 .top-header,.product_layout3 .product-carousel li.product:hover .product-container,
        .product_layout3 ul.products li.product.product-grid:hover .product-container,.product_layout3 li.product-grid .product-description .button-group .button, 
        .product_layout3 li.product-grid .product-description .button-group .button.wishlist .yith-wcwl-add-to-wishlist,.product_layout3 li.product-grid .product-description .button-group .ajax.button.quick-btn{
            background-color: <?php echo esc_attr($megashop_MetaFontColor); ?>;
        }
        .auto_install_layout8 .header_1 .top-header,.product_layout3 ul.products li.product:hover .product-container, .product_layout3 li.product-grid .product-description .button-group .button, 
        .product_layout3 li.product-grid .product-description .button-group .button.wishlist .yith-wcwl-add-to-wishlist{
            border-color: <?php echo esc_attr($megashop_MetaFontColor); ?>;
        }
        .auto_install_layout7 .widget .widget_wysija input[type="submit"]:hover,.auto_install_layout7 .widget .widget_wysija input[type="submit"]:focus{
            background-color: <?php echo esc_attr($megashop_MetaFontColor); ?> !important;
        }
        .auto_install_layout7 .widget_wysija .widget_wysija_cont .wysija-submit:hover{
            color: #fff !important;
        }
        .auto_install_layout8.product_layout3 ul.products li.product.product-list:hover .product-container{
            background-color: rgba(0, 0, 0, 0);
        }

        <?php
        }if($footer_link_hover_color !=""){
            ?>
        footer.site-footer a:hover, .site-footer .footer-widget-area a:hover{
            color:<?php echo esc_attr($footer_link_hover_color); ?> !important;
        }
        <?php
        }
        if($footer_bg_color !=""){ ?>
            footer.site-footer{
                background-color: <?php echo esc_attr($footer_bg_color); ?> !important;
            } 
    <?php }
    if($footer_title_color !=""){ ?>
            .site-footer a:hover,#ttcmsfooterservice .ttcmsfooterservice .ttfooterservice .service-block-content .footer-service-desc .service-heading,
            .site-footer .widget .widget-title, .site-footer #ttcmsfooterservice .title_block,#ttcmsfooterservice .ttcmsfooterservice .ttfooterservice .service-block-content .footer-service-desc .service-desc li{
                color: <?php echo esc_attr($footer_title_color); ?> !important;
            }         
    <?php }
    if($footer_text_color !=""){ ?>
            footer.site-footer,.site-footer .footer-widget-area a,.contact-footer li i,.footer-widget-area,.contact-footer {
                color: <?php echo esc_attr($footer_text_color); ?> !important;
            } 
            .auto_install_layout8 #ttcmsfooterservice .ttcmsfooterservice .ttfooterservice .service-block-content .footer-service-desc .service-desc li{
                color: <?php echo esc_attr($footer_text_color); ?> !important;
            }
    <?php }
        ?>
            .metaslider .flexslider .flex-direction-nav a.flex-next:hover:after,.metaslider .flexslider .flex-direction-nav a.flex-prev:hover:after,.auto_install_layout7 .widget .widget_wysija input[type="submit"]:hover,.auto_install_layout7 .widget .widget_wysija input[type="submit"]:focus,.woocommerce .woocommerce-checkout input.button:hover, .auto_install_layout8.woocommerce #respond input#submit:hover,.auto_install_layout4.woocommerce #payment #place_order:hover,.auto_install_layout4.woocommerce-page #payment #place_order:hover,.auto_install_layout4 .woocommerce a.checkout-button.button:hover,.auto_install_layout5 .site-header .search_button.btn.button-search:hover,.auto_install_layout3 .widget_wysija .widget_wysija_cont .wysija-submit:hover,
            .auto_install_layout1 .widget_wysija .widget_wysija_cont .wysija-submit:hover,.auto_install_layout2 .widget_wysija .widget_wysija_cont .wysija-submit:hover,.auto_install_layout8 .widget_wysija .widget_wysija_cont .wysija-submit:hover,.auto_install_layout6 .widget_wysija .widget_wysija_cont .wysija-submit:hover,.auto_install_layout7 .site-header .search_button.btn.button-search:hover,.auto_install_layout6 .site-header .search_button.btn.button-search:hover{
                color: #fff !important;
            }
    </style>
    <?php } ?>