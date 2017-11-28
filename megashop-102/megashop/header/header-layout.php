<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$header_layout = of_get_option('header_layout');
$top_bar_setting = of_get_option('top_bar_setting');
$topbar_text = of_get_option('topbar_text');
global $woocommerce;
if($header_layout == 'header_1'){ 
    $header_banner = of_get_option('header_banner');
            if(empty($header_banner) && is_front_page()){
                $style = 'margin-bottom:25px;';
            }else{
                $style = '';
            }
    ?>
    <header id="masthead" class="site-header <?php echo esc_attr($header_layout); ?>" style="<?php echo wp_kses_post($style); ?>">
        <?php if($top_bar_setting != 'disable'){  ?>
        <div class="top-header" >
            <div class="container">
            <?php 
            if($top_bar_setting == 'left_menu_right_text'){ ?>
                <div class="left_menu_right_text">  <?php  
				if ( has_nav_menu( 'top_menu' ) ) { ?>
                                    <nav id="top-navigation" class="top-navigation"  aria-label="<?php esc_html_e( 'Top Menu', 'megashop' ); ?>">
                                    <?php
                                        $locations = get_nav_menu_locations();
                                        if (!empty($locations) && array_key_exists('top_menu', $locations)) {
                                            wp_nav_menu(array('theme_location' => 'top_menu', 'menu_class' => 'main-menu Top-menu'));
                                        }
                                    ?>
                                    </nav><!-- .main-navigation -->
                            <?php }                                      
                    if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) { ?>
                        <div class="dropdown myaccount-menu openclose">
                            <a class="dropdown-toggle myaccount" href="#" title="<?php esc_html_e('My Account', 'megashop'); ?>" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user"></i>
                                <span class="hidden-xs"><?php esc_html_e('My Account', 'megashop'); ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-ul dropdown-menu-right account-link-toggle">
                                <?php
                                $logout_url = '';
                                if (is_user_logged_in()) {
                                    $myaccount_page_id = get_option('woocommerce_myaccount_page_id');
                                    if ($myaccount_page_id) {
                                        $logout_url = wp_logout_url(get_permalink($myaccount_page_id));
                                        if (get_option('woocommerce_force_ssl_checkout') == 'yes') {
                                            if (is_ssl()) {
                                                $logout_url = str_replace('http:', 'https:', $logout_url);
                                            }
                                        }
                                    }
                                    ?>
                                    <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
                                            <li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
                                                    <a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
                                            </li>
                                    <?php endforeach; ?>
                                <?php } else {
                                    ?>
                                    <li>                            
                                        <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>?action=register" class="login show-login-link <?php  if(isset($_GET['action'])=='register'){ echo 'is_active'; } ?>" id="show-register-link" ><?php echo esc_html_e('Register', 'megashop'); ?></a>

                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" class="login show-login-link <?php if(is_account_page() && isset($_GET['action'])!='register'){ echo 'is_active'; } ?>" id="show-login-link" ><?php echo esc_html_e('Login', 'megashop'); ?></a>                        
                                    </li>
                                    <?php }
                                ?>
                            </ul>
                        </div> 
                    <?php } if (defined('YITH_WCWL') && !function_exists('yith_wcwl_add_wishlist_on_loop')) { ?>
                    <div class="wishlistbtn"><a href="<?php echo esc_url(get_site_url()); ?>/wishlist"><?php esc_html_e('Wish List','megashop'); ?></a></div>
                <?php } 
                $topbar_text = of_get_option('topbar_text');
                ?>
                    </div>
                <?php if(!empty($topbar_text)){ ?>
                <div class="right_text">
                    <div id="ttcmsheader">
                        <div class="ttheader-service"><?php echo esc_attr($topbar_text); ?></div>
                    </div>
                </div>
            <?php }
            }elseif($top_bar_setting == 'right_menu_left_text'){ 
                $topbar_text = of_get_option('topbar_text');
                if(!empty($topbar_text)){
                ?>
                <div class="left_text">
                    <div id="ttcmsheader">
                        <div class="ttheader-service"><?php echo esc_attr($topbar_text); ?></div>
                    </div>
                </div>
                <?php } ?>
                <div class="right_menu_left_text padding_0"> <?php
				if ( has_nav_menu( 'top_menu' ) ) { ?>
                                    <nav id="top-navigation" class="top-navigation"  aria-label="<?php esc_html_e( 'Top Menu', 'megashop' ); ?>">
                                    <?php
                                        $locations = get_nav_menu_locations();
                                        if (!empty($locations) && array_key_exists('top_menu', $locations)) {
                                            wp_nav_menu(array('theme_location' => 'top_menu', 'menu_class' => 'main-menu Top-menu'));
                                        }
                                    ?>
                                    </nav><!-- .main-navigation -->
                            <?php }               
                     if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) { ?>
                        <div class="dropdown myaccount-menu openclose">
                            <a class="dropdown-toggle myaccount" href="#" title="<?php esc_html_e('My Account', 'megashop'); ?>" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user"></i>
                                <span class="hidden-xs"><?php esc_html_e('My Account', 'megashop'); ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-ul dropdown-menu-right account-link-toggle">
                                <?php
                                $logout_url = '';
                                if (is_user_logged_in()) {
                                    $myaccount_page_id = get_option('woocommerce_myaccount_page_id');
                                    if ($myaccount_page_id) {
                                        $logout_url = wp_logout_url(get_permalink($myaccount_page_id));
                                        if (get_option('woocommerce_force_ssl_checkout') == 'yes') {
                                            if (is_ssl()) {
                                                $logout_url = str_replace('http:', 'https:', $logout_url);
                                            }
                                        }
                                    }
                                    ?>
                                    <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
                                            <li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
                                                    <a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
                                            </li>
                                    <?php endforeach; ?>
                                <?php } else {
                                    ?>
                                    <li>                            
                                        <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>?action=register" class="login show-login-link <?php  if(isset($_GET['action'])=='register'){ echo 'is_active'; } ?>" id="show-register-link" ><?php echo esc_html_e('Register', 'megashop'); ?></a>

                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" class="login show-login-link <?php if(is_account_page() && isset($_GET['action'])!='register'){ echo 'is_active'; } ?>" id="show-login-link" ><?php echo esc_html_e('Login', 'megashop'); ?></a>                        
                                    </li>
                                    <?php }
                                ?>
                            </ul>
                        </div> 
                    <?php } if (defined('YITH_WCWL') && !function_exists('yith_wcwl_add_wishlist_on_loop')) { ?>
                    <div class="wishlistbtn"><a href="<?php echo esc_url(get_site_url()); ?>/wishlist"><?php esc_html_e('Wish List','megashop'); ?></a></div>
                <?php } ?>
                </div>
            <?php
            } ?>
        </div>
        </div>
        <?php } 
        $sticky_header = of_get_option('sticky_header'); 
                    if($sticky_header == 1){
                        $class = "active";
                    }else{
                        $class = "";
                    }
        ?>	
        <div class="header-middle full-header <?php echo esc_attr($class); ?> ">
             <div class="container">
                 <div class="ttheader">
                 <div class="header_logo headermiddle ">
            <?php $header_logo = of_get_option('header_logo'); 
            ?> <div class="logo"> <?php
            if($header_logo !=""){
            ?>
            <a class="header-logo" href="<?php echo esc_url(get_site_url()); ?>" title="<?php esc_html_e('Site Title','megashop'); ?>" rel="home">
            <img src="<?php echo esc_url($header_logo); ?>" alt="<?php _e('Header Logo','megashop'); ?>" /></a>
                 <?php $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                            <p class="site-description"><?php echo esc_attr($description); ?></p>
                    <?php endif; ?>
                 <?php }else{
                     ?>
                 <div class="site-branding">

                    <?php if ( is_front_page() && is_home() ) : ?>
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php else : ?>
                            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php endif;

                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                            <p class="site-description"><?php echo esc_attr($description); ?></p>
                    <?php endif; ?>
		</div><!-- .site-branding -->
                 <?php
                 } ?>
            </div>
            </div>
                 <div class="search_cart ttheader-bg dropdown openclose">
                     <?php if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) { ?>
                     <div class="header_cart ttheader_cart col-sm-3 padding_right_0">
					<div class="cart_contents">
                                            <span class="cart-heading"><?php esc_html_e('Cart','megashop'); ?></span>
                                            <button class="btn btn-inverse btn-block btn-lg dropdown-toggle" type="button" data-toggle="dropdown" data-loading-text="Loading...">
                                                <?php $cart_total = $woocommerce->cart->cart_contents_count; ?>
                                                <i class="cart-contents" id="headercarttrigger" title="<?php esc_html_e('View your shopping cart', 'megashop'); ?>"><span><?php echo esc_attr($cart_total); ?></span></i>
                                            </button>
                                            <div class="dropdowncartwidget dropdown-ul">
				<div class="widget shopping-cart-sidebar woocommerce widget_shopping_cart">
				<div class="widget_shopping_cart_content"></div>
				</div>
				</div>
					</div>
				
				</div>
                     <?php } ?>
                     <div class="col-xs-12 col-sm-6 col-lg-2 ttcmsheaderservices header_right">
                     <?php 
                            $support_title = of_get_option('support_title');
                            $support_discription = of_get_option('support_discription');
                            if(!empty($support_title) || !empty($support_discription)){
                     ?>
                     <div class="ttsupport">
                        <div class="ttcontent_inner">
                        <div class="service">
                        <div class="ttsupport_img service-icon"></div>
                        <div class="service-content">
                        <?php
                        if(empty($support_title) || empty($support_discription) ){
                            $style = 'style="padding-top:10px;"';
                        }else{
                            $style = '';
                        }
                        if($support_title !="" ){ ?><div class="service-title" <?php echo wp_kses_post($style); ?>><?php echo esc_attr($support_title); ?></div><?php } ?>
                        <?php if($support_discription !="" ){ ?><div class="service-desc" <?php echo wp_kses_post($style); ?>><?php echo esc_attr($support_discription); ?></div><?php } ?>
                        </div>
                        </div>
                        </div>
                     </div>
                     <?php } ?>
                 </div>
                     <div class="clearfix col-sm-6 header_left search_block_top">
                     <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <?php   $args = array( 'type' => 'product', 'taxonomy' => 'product_cat' ); 
                                        $categories = get_categories( $args );  ?>  
                                <input type="search" value="<?php echo get_search_query() ?>" name="s" id="tt_pro_search_input" class="tt_pro_search_input search-field" placeholder="<?php echo esc_attr__( 'Enter Your Keyword&hellip;', 'megashop' ); ?>"  data-min-chars="2" autocomplete="off" />                             
                                <?php if(!empty($categories)){ ?>
                                <div class="select-wrapper">
                                    <select name="category">
                                        <?php
                                        if(!empty($categories)){ ?>
                                            <option value=""><?php esc_html_e('Categories','megashop'); ?></option>
                                        <?php
                                        }
                                        foreach ($categories as $cat) { 
                                                 $cat_slug = $cat->slug;
                                                $cat_name = $cat->name;
                                                ?>
                                                <option value="<?php echo esc_attr($cat_slug); ?>"><?php echo esc_attr($cat_name); ?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                                <?php } ?>
                                <button class="search_button btn button-search" type="submit">
                                    <?php _e('Search','megashop'); ?>
                                </button>
                                <input type="hidden" name="post_type" value="product" />
                                <div class="tt_ajax_search_results" style="display:none">				
				</div>
                        </form>
                         
                 </div>
                 
                 </div>
                     <div class="responsivemenu"></div>
             </div>
        </div>
            <?php $main_menu_options = of_get_option('main_menu_options'); 
            if($main_menu_options == 'left_menu'){
                $menuclass =  'left_menu';
            }elseif($main_menu_options == 'center_menu'){
                $menuclass =  'center_menu';
            }elseif($main_menu_options == 'right_menu'){
                $menuclass =  'right_menu';
            }
            if ( has_nav_menu( 'primary' ) && $main_menu_options != 'disable' ) { 
            ?>
            <div class="header-bottom-menu">
            <?php
                 $sticky_header = of_get_option('sticky_header'); 
                    if($sticky_header == 1){
                        $class = "active";
                    }else{
                        $class = "";
                    }
                    ?>
                    <div id="site-header-menu" class="site-header-menu <?php echo esc_attr($class).' '.esc_attr($menuclass); ?>">                        
                        <div class="container">
                            <?php if ( has_nav_menu( 'primary' ) ) { ?>
                                    <nav id="site-navigation" class="main-navigation"  aria-label="<?php esc_html_e( 'Primary Menu', 'megashop' ); ?>">
                                    <?php
                                        $locations = get_nav_menu_locations();
                                        if (!empty($locations) && array_key_exists('primary', $locations)) {
                                            wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'nav nav-menu main-menu primary-menu'));
                                        }
                                    ?>
                                    </nav><!-- .main-navigation -->
                            <?php } ?>
                    </div><!-- .site-header-menu -->
                    </div>
            </div> 
            <?php } ?>            
            </div>
            <?php
            $header_banner = of_get_option('header_banner');
            if(!empty($header_banner) && is_front_page()){
            ?>
            <div class="header-bottom container">
                <?php 
                    echo do_shortcode($header_banner);
                ?>
            </div>
        <?php } ?>
    </header><!-- .site-header -->

<?php }elseif($header_layout == 'header_2'){
    $header_banner = of_get_option('header_banner');
            if(empty($header_banner) && is_front_page()){
                $style = 'margin-bottom:25px;';
            }else{
                $style = '';
            }
    ?>
    <header id="masthead" class="site-header <?php echo esc_attr($header_layout); ?>"  style="<?php echo wp_kses_post($style); ?>">
        <?php if($top_bar_setting != 'disable'){  ?>
        <div class="top-header" >
            <div class="container">
            <?php 
            if($top_bar_setting == 'left_menu_right_text'){ ?>
                <div class="left_menu_right_text padding_0"> <?php 
				if ( has_nav_menu( 'top_menu' ) ) { ?>
                                    <nav id="top-navigation" class="top-navigation"  aria-label="<?php esc_html_e( 'Top Menu', 'megashop' ); ?>">
                                    <?php
                                        $locations = get_nav_menu_locations();
                                        if (!empty($locations) && array_key_exists('top_menu', $locations)) {
                                            wp_nav_menu(array('theme_location' => 'top_menu', 'menu_class' => 'main-menu Top-menu'));
                                        }
                                    ?>
                                    </nav><!-- .main-navigation -->
                            <?php }         
                   if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) { ?>
                        <div class="dropdown myaccount-menu openclose">
                            <a class="dropdown-toggle myaccount" href="#" title="<?php esc_html_e('My Account', 'megashop'); ?>" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user"></i>
                                <span class="hidden-xs"><?php esc_html_e('My Account', 'megashop'); ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-ul dropdown-menu-right account-link-toggle">
                                <?php
                                $logout_url = '';
                                if (is_user_logged_in()) {
                                    $myaccount_page_id = get_option('woocommerce_myaccount_page_id');
                                    if ($myaccount_page_id) {
                                        $logout_url = wp_logout_url(get_permalink($myaccount_page_id));
                                        if (get_option('woocommerce_force_ssl_checkout') == 'yes') {
                                            if (is_ssl()) {
                                                $logout_url = str_replace('http:', 'https:', $logout_url);
                                            }
                                        }
                                    }
                                    ?>
                                    <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
                                            <li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
                                                    <a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
                                            </li>
                                    <?php endforeach; ?>
                                <?php } else {
                                    ?>
                                     <li>                            
                                        <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>?action=register" class="login show-login-link <?php  if(isset($_GET['action'])=='register'){ echo 'is_active'; } ?>" id="show-register-link" ><?php echo esc_html_e('Register', 'megashop'); ?></a>

                                    </li>
                                    <li>
                                        <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" class="login show-login-link <?php if(is_account_page() && isset($_GET['action'])!='register'){ echo 'is_active'; } ?>" id="show-login-link" ><?php echo esc_html_e('Login', 'megashop'); ?></a>                        
                                    </li>
                                    <?php }
                                ?>
                            </ul>
                        </div>   
                    <?php } if (defined('YITH_WCWL') && !function_exists('yith_wcwl_add_wishlist_on_loop')) { ?>
                    <div class="wishlistbtn"><a href="<?php echo get_site_url(); ?>/wishlist"><?php esc_html_e('Wish List','megashop'); ?></a></div>
                <?php } 
                 
                ?>
                </div>
                <?php if(!empty($topbar_text)){ ?>
                <div class="right_text">
                    <div id="ttcmsheader">
                        <div class="ttheader-service"><?php echo esc_attr($topbar_text); ?></div>
                    </div>
                </div>
            <?php
            }
            }elseif($top_bar_setting == 'right_menu_left_text'){
                if(!empty($topbar_text)) {
                ?>   
                <div class="left_text">
                    <div id="ttcmsheader">
                        <div class="ttheader-service"><?php echo esc_attr($topbar_text); ?></div>
                    </div>
                </div>
                <?php } ?>
                <div class="right_menu_left_text padding_0">  
                    <div class="right_menu_left_text padding_0"><?php
					if ( has_nav_menu( 'top_menu' ) ) { ?>
                                    <nav id="top-navigation" class="top-navigation"  aria-label="<?php esc_html_e( 'Top Menu', 'megashop' ); ?>">
                                    <?php
                                        $locations = get_nav_menu_locations();
                                        if (!empty($locations) && array_key_exists('top_menu', $locations)) {
                                            wp_nav_menu(array('theme_location' => 'top_menu', 'menu_class' => 'main-menu Top-menu'));
                                        }
                                    ?>
                                    </nav><!-- .main-navigation -->
                            <?php }         
                   if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) { ?>
                        <div class="dropdown myaccount-menu openclose">
                            <a class="dropdown-toggle myaccount" href="#" title="<?php esc_html_e('My Account', 'megashop'); ?>" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user"></i>
                                <span class="hidden-xs"><?php esc_html_e('My Account', 'megashop'); ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-ul dropdown-menu-right account-link-toggle">
                                <?php
                                $logout_url = '';
                                if (is_user_logged_in()) {
                                    $myaccount_page_id = get_option('woocommerce_myaccount_page_id');
                                    if ($myaccount_page_id) {
                                        $logout_url = wp_logout_url(get_permalink($myaccount_page_id));
                                        if (get_option('woocommerce_force_ssl_checkout') == 'yes') {
                                            if (is_ssl()) {
                                                $logout_url = str_replace('http:', 'https:', $logout_url);
                                            }
                                        }
                                    }
                                    ?>
                                    <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
                                            <li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
                                                    <a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
                                            </li>
                                    <?php endforeach; ?>
                                <?php } else {
                                    ?>
                                     <li>                            
                                        <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>?action=register" class="login show-login-link <?php  if(isset($_GET['action'])=='register'){ echo 'is_active'; } ?>" id="show-register-link" ><?php echo esc_html_e('Register', 'megashop'); ?></a>

                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" class="login show-login-link <?php if(is_account_page() && isset($_GET['action'])!='register'){ echo 'is_active'; } ?>" id="show-login-link" ><?php echo esc_html_e('Login', 'megashop'); ?></a>                        
                                    </li>
                                    <?php }
                                ?>
                            </ul>
                        </div>   
                    <?php } if (defined('YITH_WCWL') && !function_exists('yith_wcwl_add_wishlist_on_loop')) { ?>
                    <div class="wishlistbtn"><a href="<?php echo esc_url(get_site_url()); ?>/wishlist"><?php _e('Wish List','megashop'); ?></a></div>
                <?php } ?>
                </div></div>
            <?php
            } 
            } ?>
            </div>
        </div>
                <?php
        $sticky_header = of_get_option('sticky_header'); 
                    if($sticky_header == 1){
                        $class = "active";
                    }else{
                        $class = "";
                    }
        ?>	
        <div class="header-middle full-header <?php echo esc_attr($class); ?> ">
             <div class="container">
                 <div class="ttheader">
                 <div class="header_logo headermiddle ">
            <?php $header_logo = of_get_option('header_logo'); 
            ?> <div class="logo"> <?php
            if($header_logo !=""){
            ?>
            <a class="header-logo" href="<?php echo esc_url(get_site_url()); ?>" title="<?php esc_html_e('Site Title','megashop'); ?>" rel="home">
            <img src="<?php echo esc_url($header_logo); ?>" alt="<?php esc_html_e('Header Logo','megashop'); ?>" /></a>
                 <?php $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                            <p class="site-description"><?php echo esc_attr($description); ?></p>
                    <?php endif; ?>
                 <?php }else{
                     ?>
                 <div class="site-branding">

                    <?php if ( is_front_page() && is_home() ) : ?>
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php else : ?>
                            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php endif;

                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                            <p class="site-description"><?php echo esc_attr($description); ?></p>
                    <?php endif; ?>
		</div><!-- .site-branding -->
                 <?php
                 } ?>
            </div>
            </div>
                 <div class="search_cart ttheader-bg dropdown openclose">
                     <?php if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) { ?>
                     <div class="header_cart ttheader_cart col-sm-3 padding_right_0">
					<div class="cart_contents">
                                            <button class="btn btn-inverse btn-block btn-lg dropdown-toggle" type="button" data-toggle="dropdown" data-loading-text="Loading...">
                                                <?php $cart_total = $woocommerce->cart->cart_contents_count; ?>
                                                <i class="cart-contents" id="headercarttrigger" title="<?php esc_html_e('View your shopping cart', 'megashop'); ?>"><span><?php echo esc_attr($cart_total); ?></span></i>
                                            </button>
                                            <div class="dropdowncartwidget dropdown-ul">
				<div class="widget shopping-cart-sidebar woocommerce widget_shopping_cart">
				<div class="widget_shopping_cart_content"></div>
				</div>
				</div>
					</div>
				
				</div>
                     <?php } ?>
                     <div class="col-xs-12 col-sm-6 col-lg-2 ttcmsheaderservices header_right">
                     <?php 
                            $support_title = of_get_option('support_title');
                            $support_discription = of_get_option('support_discription');
                            if(!empty($support_title) || !empty($support_discription)){
                     ?>
                     <div class="ttsupport">
                        <div class="ttcontent_inner">
                        <div class="service">
                        <div class="ttsupport_img service-icon"></div>
                        <div class="service-content">
                        <?php
                        if(empty($support_title) || empty($support_discription) ){
                            $style = 'style="padding-top:10px;"';
                        }else{
                            $style = '';
                        }
                        if($support_title !="" ){ ?><div class="service-title" <?php echo wp_kses_post($style); ?>><?php echo esc_attr($support_title); ?></div><?php } ?>
                        <?php if($support_discription !="" ){ ?><div class="service-desc" <?php echo wp_kses_post($style); ?>><?php echo esc_attr($support_discription); ?></div><?php } ?>
                        </div>
                        </div>
                        </div>
                     </div>
                     <?php } ?>
                 </div>
                     <div class="clearfix col-sm-7 header_left search_block_top">
                     <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <?php   $args = array( 'type' => 'product', 'taxonomy' => 'product_cat' ); 
                                        $categories = get_categories( $args );  ?>                                    
                                <input type="search" value="<?php echo get_search_query() ?>" name="s" id="tt_pro_search_input" class="tt_pro_search_input search-field" placeholder="<?php echo esc_attr__( 'Enter Your Keyword&hellip;', 'megashop' ); ?>"  data-min-chars="2" autocomplete="off" />
                                <?php if(!empty($categories)){ ?>
                                <div class="select-wrapper">
                                    <select name="category">
                                        <?php
                                        if(!empty($categories)){ ?>
                                            <option value=""><?php esc_html_e('Categories','megashop'); ?></option>
                                        <?php
                                        }
                                        foreach ($categories as $cat) { 
                                                 $cat_slug = $cat->slug;
                                                $cat_name = $cat->name;
                                                ?>
                                                <option value="<?php echo esc_attr($cat_slug); ?>"><?php echo esc_attr($cat_name); ?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                                <?php } ?>
                                <button class="search_button btn button-search" type="submit">
                                    <?php esc_html_e('Search','megashop'); ?>
                                </button>
                                <input type="hidden" name="post_type" value="product" />
                                <div class="tt_ajax_search_results" style="display:none">				
				</div>
                        </form>
                 </div>
                 
                 </div>
                     <div class="responsivemenu"></div>
             </div>
        </div>
            <?php $main_menu_options = of_get_option('main_menu_options'); 
            if($main_menu_options == 'left_menu'){
                $menuclass =  'left_menu';
            }elseif($main_menu_options == 'center_menu'){
                $menuclass =  'center_menu';
            }elseif($main_menu_options == 'right_menu'){
                $menuclass =  'right_menu';
            }
            if ( has_nav_menu( 'primary' ) && $main_menu_options != 'disable' ) { 
            ?>
            <div class="header-bottom-menu">
            <?php
                 $sticky_header = of_get_option('sticky_header'); 
                    if($sticky_header == 1){
                        $class = "active";
                    }else{
                        $class = "";
                    }
                    ?>
                    <div id="site-header-menu" class="site-header-menu <?php echo esc_attr($class).' '.esc_attr($menuclass); ?>">                        
                        <div class="container">
                            <?php if ( has_nav_menu( 'primary' ) ) { ?>
                                    <nav id="site-navigation" class="main-navigation"  aria-label="<?php esc_html_e( 'Primary Menu', 'megashop' ); ?>">
                                    <?php
                                        $locations = get_nav_menu_locations();
                                        if (!empty($locations) && array_key_exists('primary', $locations)) {
                                            wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'nav nav-menu main-menu primary-menu'));
                                        }
                                    ?>
                                    </nav><!-- .main-navigation -->
                            <?php } ?>
                    </div><!-- .site-header-menu -->
                    </div>
            </div> 
            <?php } ?>            
            </div>
            <?php
            $header_banner = of_get_option('header_banner');
            if(!empty($header_banner) && is_front_page()){
            ?>
            <div class="header-bottom container">
                <?php 
                    echo do_shortcode($header_banner);
                ?>
            </div>
        <?php } ?>
    </header><!-- .site-header -->
<?php }if($header_layout == 'header_3'){
   $header_banner = of_get_option('header_banner');
            if(empty($header_banner) && is_front_page()){
                $style = 'margin-bottom:25px;';
            }else{
                $style = '';
            }
    ?>
    <header id="masthead" class="site-header <?php echo esc_attr($header_layout); ?>"  style="<?php echo wp_kses_post($style); ?>">
        <?php $sticky_header = of_get_option('sticky_header'); 
                    if($sticky_header == 1){
                        $class = "active";
                    }else{
                        $class = "";
                    }
        ?>	
        <div class="header-middle full-header <?php echo esc_attr($class); ?> ">  
             <div class="container">
                 <div class="ttheader">
                 <div class="header_logo headermiddle ">
            <?php $header_logo = of_get_option('header_logo'); 
            ?> <div class="logo"> <?php
            if($header_logo !=""){
            ?>
            <a class="header-logo" href="<?php echo esc_url(get_site_url()); ?>" rel="home">
            <img src="<?php echo esc_url($header_logo); ?>" alt="<?php esc_html_e('Header Logo','megashop'); ?>" /></a>
                 <?php $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                            <p class="site-description"><?php echo esc_attr($description); ?></p>
                    <?php endif; ?>
                 <?php }else{
                     ?>
                 <div class="site-branding">

                    <?php if ( is_front_page() && is_home() ) : ?>
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php else : ?>
                            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php endif;

                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                            <p class="site-description"><?php echo esc_attr($description); ?></p>
                    <?php endif; ?>
		</div><!-- .site-branding -->
                 <?php
                 } ?>
            </div>
            </div>
                     <?php if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) { ?>
                 <div class="search_cart ttheader-bg dropdown openclose header_right">
                     <div class="header_cart ttheader_cart col-sm-3 padding_right_0">
                        <div class="cart_contents">
                            <button class="btn btn-inverse btn-block btn-lg dropdown-toggle" type="button" data-toggle="dropdown" data-loading-text="Loading...">
                                <?php $cart_total = $woocommerce->cart->cart_contents_count; ?>
                                <i class="cart-contents" id="headercarttrigger" title="<?php esc_html_e('View your shopping cart', 'megashop'); ?>"><span><?php echo esc_attr($cart_total); ?></span></i>
                            </button>
                            <div class="dropdowncartwidget dropdown-ul">
                                <div class="widget shopping-cart-sidebar woocommerce widget_shopping_cart">
                                    <div class="widget_shopping_cart_content"></div>
                                </div>
                            </div>
                        </div>				
                    </div>
                 </div>
                     <?php } ?>
                     <div class="tt-wrap ttcmsheaderservices">
                     <?php if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) { ?>
                         <div class="userwishlist">
                        <div class="dropdown myaccount-menu openclose">
                            <a class="dropdown-toggle myaccount" href="#" title="<?php esc_html_e('My Account', 'megashop'); ?>" data-toggle="dropdown" aria-expanded="false">                              
                                <div class="my-account"></div>
                            </a>
                            <ul class="dropdown-menu dropdown-ul dropdown-menu-right account-link-toggle">
                                <?php
                                $logout_url = '';
                                if (is_user_logged_in()) {
                                    $myaccount_page_id = get_option('woocommerce_myaccount_page_id');
                                    if ($myaccount_page_id) {
                                        $logout_url = wp_logout_url(get_permalink($myaccount_page_id));
                                        if (get_option('woocommerce_force_ssl_checkout') == 'yes') {
                                            if (is_ssl()) {
                                                $logout_url = str_replace('http:', 'https:', $logout_url);
                                            }
                                        }
                                    }
                                    ?>
                                    <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
                                            <li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
                                                    <a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
                                            </li>
                                    <?php endforeach; ?>
                                <?php } else {
                                    ?>
                                     <li>                            
                                        <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>?action=register" class="login show-login-link <?php  if(isset($_GET['action'])=='register'){ echo 'is_active'; } ?>" id="show-register-link" ><?php echo esc_html_e('Register', 'megashop'); ?></a>

                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" class="login show-login-link <?php if(is_account_page() && isset($_GET['action'])!='register'){ echo 'is_active'; } ?>" id="show-login-link" ><?php echo esc_html_e('Login', 'megashop'); ?></a>                        
                                    </li>
                                    <?php }
                                ?>
                            </ul>
                        </div>   
                    <?php  if( function_exists( 'YITH_WCWL' ) ){ ?>
                            <div class="wishlistbtn"><a href="<?php echo esc_url(get_site_url()); ?>/wishlist"><div class="wishlisticon"></div></a></div>
                        <?php } ?>
                        </div> <?php }
                        ?>
                 
                         <?php 
                                $support_title = of_get_option('support_title');
                                $support_discription = of_get_option('support_discription');
                                if(!empty($support_title) || !empty($support_discription)){
                        ?>
                        <div class="ttsupport">
                            <div class="ttcontent_inner">
                            <div class="service">
                            <div class="ttsupport_img service-icon"></div>
                            <div class="service-content">
                            <?php
                            if(empty($support_title) || empty($support_discription) ){
                                $style = 'style="padding-top:10px;"';
                            }else{
                                $style = '';
                            }
                            if($support_title !="" ){ ?><div class="service-title" <?php echo wp_kses_post($style); ?>><?php echo esc_attr($support_title); ?></div><?php } ?>
                            <?php if($support_discription !="" ){ ?><div class="service-desc" <?php echo wp_kses_post($style); ?>><?php echo esc_attr($support_discription); ?></div><?php } ?>
                            </div>
                            </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                     <div class="clearfix col-sm-6 header_left search_block_top">
                     <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <?php   $args = array( 'type' => 'product', 'taxonomy' => 'product_cat' ); 
                                        $categories = get_categories( $args );  ?>                                    
                                <input type="search" value="<?php echo get_search_query() ?>" name="s" id="tt_pro_search_input" class="tt_pro_search_input search-field" placeholder="<?php echo esc_attr__( 'Enter Your Keyword&hellip;', 'megashop' ); ?>"  data-min-chars="2" autocomplete="off" />
                                <?php if(!empty($categories)){ ?>
                                <div class="select-wrapper">
                                    <select name="category">
                                        <?php
                                        if(!empty($categories)){ ?>
                                            <option value=""><?php esc_html_e('Categories','megashop'); ?></option>
                                        <?php
                                        }
                                        foreach ($categories as $cat) { 
                                                 $cat_slug = $cat->slug;
                                                $cat_name = $cat->name;
                                                ?>
                                                <option value="<?php echo esc_attr($cat_slug); ?>"><?php echo esc_attr($cat_name); ?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                                <?php } ?>
                                <button class="search_button btn button-search" type="submit">
                                    <?php esc_html_e('Search','megashop'); ?>
                                </button>
                                <input type="hidden" name="post_type" value="product" />
                                <div class="tt_ajax_search_results" style="display:none">				
				</div>
                        </form>
                 </div>
                 </div>
                     <div class="responsivemenu"></div>
             </div>
        </div>  
         <?php $main_menu_options = of_get_option('main_menu_options'); 
            if($main_menu_options == 'left_menu'){
                $menuclass =  'left_menu';
            }elseif($main_menu_options == 'center_menu'){
                $menuclass =  'center_menu';
            }elseif($main_menu_options == 'right_menu'){
                $menuclass =  'right_menu';
            }
            if ( has_nav_menu( 'primary' ) && $main_menu_options != 'disable' ) { 
            ?>
            <div class="header-bottom-menu">
            <?php
                 $sticky_header = of_get_option('sticky_header'); 
                    if($sticky_header == 1){
                        $class = "active";
                    }else{
                        $class = "";
                    }
                    ?>
                    <div id="site-header-menu" class="site-header-menu <?php echo esc_attr($class).' '.esc_attr($menuclass); ?>">                        
                        <div class="container">
                            <?php if ( has_nav_menu( 'primary' ) ) { ?>
                                    <nav id="site-navigation" class="main-navigation"  aria-label="<?php esc_html_e( 'Primary Menu', 'megashop' ); ?>">
                                    <?php
                                        $locations = get_nav_menu_locations();
                                        if (!empty($locations) && array_key_exists('primary', $locations)) {
                                            wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'nav nav-menu main-menu primary-menu'));
                                        }
                                    ?>
                                    </nav><!-- .main-navigation -->
                            <?php } ?>
                    </div><!-- .site-header-menu -->
                    </div>
            </div> 
            <?php } 
            $header_banner = of_get_option('header_banner');
            if(!empty($header_banner) && is_front_page()){
            ?>
            <div class="header-bottom container">
                <?php 
                    echo do_shortcode($header_banner);
                ?>
            </div>
        <?php } ?>
    </header><!-- .site-header -->
    <?php
}