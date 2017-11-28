/*! Customized Jquery from Punit Korat.  punit@templatetrip.com  : www.templatetrip.com
Authors & copyright (c) 2016: TemplateTrip - Webzeel Services(addonScript). */
/*! NOTE: This Javascript is licensed under two options: a commercial license, a commercial OEM license and Copyright by Webzeel Services - For use Only with TemplateTrip Themes for our Customers*/
jQuery(window).load(function () {
     
    // animation
    jQuery('.animated').waypoint(function() {
        jQuery(this).toggleClass(jQuery(this).data('animated'));
    });        
    jQuery('.woocommerce-cart .cart-collaterals .cross-sells').insertAfter('.woocommerce-cart .cart-collaterals .cart_totals.calculated_shipping');
                
    
    jQuery('.toggles_wrap.style3 .toggle_heading,.toggles_wrap.style4 .toggle_heading').find('i').addClass('fa-hand-o-right');
    jQuery('.toggles_wrap.style3 .toggle_heading,.toggles_wrap.style4 .toggle_heading').click(function () {
        jQuery(this).next('.toggle-answer').slideToggle(500);
        jQuery(this).toggleClass('toggleclose');
        if (jQuery(this).hasClass("toggleclose")) {
            jQuery(this).find('i').removeClass('fa-hand-o-down');
            jQuery(this).find('i').addClass('fa-hand-o-right');
        } else {
            jQuery(this).find('i').addClass('fa-hand-o-down');
            jQuery(this).find('i').removeClass('fa-hand-o-right');
        }
    });
    jQuery('.toggles_wrap.style1 .toggle_heading,.toggles_wrap.style2 .toggle_heading').find('i').addClass('fa-plus');
    jQuery('.toggles_wrap.style1 .toggle_heading,.toggles_wrap.style2 .toggle_heading').click(function () {
        jQuery(this).next('.toggle-answer').slideToggle(500);
        jQuery(this).toggleClass('toggleclose');
        if (jQuery(this).hasClass("toggleclose")) {
            jQuery(this).find('i').removeClass('fa-minus');
            jQuery(this).find('i').addClass('fa-plus');
        } else {
            jQuery(this).find('i').addClass('fa-minus');
            jQuery(this).find('i').removeClass('fa-plus');
        }
    });
	
	
    jQuery('.accordians_wrap.style1 .accordion_heading,.accordians_wrap.style2 .accordion_heading').find('i').addClass('fa-plus');
    jQuery('.accordians_wrap.style1 .accordion_heading,.accordians_wrap.style2 .accordion_heading').click(function () {
        var selected = jQuery(this);
        jQuery('.accordians_wrap.style1 .accordion_heading,.accordians_wrap.style2 .accordion_heading').each(function () {
            var qhead = jQuery(this);
            if (!selected.is(qhead)) {
                if (!jQuery(this).hasClass('accoodionclose')) {
                    jQuery(this).next('.accordion-answer').slideUp(500);
                    jQuery(this).addClass('accoodionclose');
                    jQuery(this).find('i').removeClass('fa-minus');
                    jQuery(this).find('i').addClass('fa-plus');
                }
            }
        });
        jQuery(this).next('.accordion-answer').slideToggle(500);
        jQuery(this).toggleClass('accoodionclose');
        if (jQuery(this).find('i').hasClass('fa-minus')) {
            jQuery(this).find('i').removeClass('fa-minus');
            jQuery(this).find('i').addClass('fa-plus');
        } else {
            jQuery(this).find('i').addClass('fa-minus');
            jQuery(this).find('i').removeClass('fa-plus');
        }
    });
    jQuery('.accordians_wrap.style3 .accordion_heading,.accordians_wrap.style4 .accordion_heading').find('i').addClass(' fa-hand-o-right');
    jQuery('.accordians_wrap.style3 .accordion_heading,.accordians_wrap.style4 .accordion_heading').click(function () {
        var selected = jQuery(this);
        jQuery('.accordians_wrap.style3 .accordion_heading,.accordians_wrap.style4 .accordion_heading').each(function () {
            var qhead = jQuery(this);
            if (!selected.is(qhead)) {
                if (!jQuery(this).hasClass('accoodionclose')) {
                    jQuery(this).next('.accordion-answer').slideUp(500);
                    jQuery(this).addClass('accoodionclose');					
                    jQuery(this).find('i').removeClass('fa-hand-o-down');
                    jQuery(this).find('i').addClass('fa-hand-o-right');
                }
            }
        });
        jQuery(this).next('.accordion-answer').slideToggle(500);
        jQuery(this).toggleClass('accoodionclose');
        if (jQuery(this).find('i').hasClass('fa-hand-o-down')) {
            jQuery(this).find('i').removeClass('fa-hand-o-down');
            jQuery(this).find('i').addClass('fa-hand-o-right');
        } else {
            jQuery(this).find('i').addClass('fa-hand-o-down');
            jQuery(this).find('i').removeClass('fa-hand-o-right');
        }
    });
    
});
jQuery(document).ready(function() {
    "use strict";	
    
    // animation
    jQuery('.animated').waypoint(function() {
        jQuery(this).toggleClass(jQuery(this).data('animated'));
    });        
    jQuery('.woocommerce-cart .cart-collaterals .cross-sells').insertAfter('.woocommerce-cart .cart-collaterals .cart_totals.calculated_shipping');
                
    
    jQuery('.toggles_wrap.style3 .toggle_heading,.toggles_wrap.style4 .toggle_heading').find('i').addClass('fa-hand-o-right');
    jQuery('.toggles_wrap.style3 .toggle_heading,.toggles_wrap.style4 .toggle_heading').click(function () {
        jQuery(this).next('.toggle-answer').slideToggle(500);
        jQuery(this).toggleClass('toggleclose');
        if (jQuery(this).hasClass("toggleclose")) {
            jQuery(this).find('i').removeClass('fa-hand-o-down');
            jQuery(this).find('i').addClass('fa-hand-o-right');
        } else {
            jQuery(this).find('i').addClass('fa-hand-o-down');
            jQuery(this).find('i').removeClass('fa-hand-o-right');
        }
    });
    jQuery('.toggles_wrap.style1 .toggle_heading,.toggles_wrap.style2 .toggle_heading').find('i').addClass('fa-plus');
    jQuery('.toggles_wrap.style1 .toggle_heading,.toggles_wrap.style2 .toggle_heading').click(function () {
        jQuery(this).next('.toggle-answer').slideToggle(500);
        jQuery(this).toggleClass('toggleclose');
        if (jQuery(this).hasClass("toggleclose")) {
            jQuery(this).find('i').removeClass('fa-minus');
            jQuery(this).find('i').addClass('fa-plus');
        } else {
            jQuery(this).find('i').addClass('fa-minus');
            jQuery(this).find('i').removeClass('fa-plus');
        }
    });
	
	
    jQuery('.accordians_wrap.style1 .accordion_heading,.accordians_wrap.style2 .accordion_heading').find('i').addClass('fa-plus');
    jQuery('.accordians_wrap.style1 .accordion_heading,.accordians_wrap.style2 .accordion_heading').click(function () {
        var selected = jQuery(this);
        jQuery('.accordians_wrap.style1 .accordion_heading,.accordians_wrap.style2 .accordion_heading').each(function () {
            var qhead = jQuery(this);
            if (!selected.is(qhead)) {
                if (!jQuery(this).hasClass('accoodionclose')) {
                    jQuery(this).next('.accordion-answer').slideUp(500);
                    jQuery(this).addClass('accoodionclose');
                    jQuery(this).find('i').removeClass('fa-minus');
                    jQuery(this).find('i').addClass('fa-plus');
                }
            }
        });
        jQuery(this).next('.accordion-answer').slideToggle(500);
        jQuery(this).toggleClass('accoodionclose');
        if (jQuery(this).find('i').hasClass('fa-minus')) {
            jQuery(this).find('i').removeClass('fa-minus');
            jQuery(this).find('i').addClass('fa-plus');
        } else {
            jQuery(this).find('i').addClass('fa-minus');
            jQuery(this).find('i').removeClass('fa-plus');
        }
    });
    jQuery('.accordians_wrap.style3 .accordion_heading,.accordians_wrap.style4 .accordion_heading').find('i').addClass(' fa-hand-o-right');
    jQuery('.accordians_wrap.style3 .accordion_heading,.accordians_wrap.style4 .accordion_heading').click(function () {
        var selected = jQuery(this);
        jQuery('.accordians_wrap.style3 .accordion_heading,.accordians_wrap.style4 .accordion_heading').each(function () {
            var qhead = jQuery(this);
            if (!selected.is(qhead)) {
                if (!jQuery(this).hasClass('accoodionclose')) {
                    jQuery(this).next('.accordion-answer').slideUp(500);
                    jQuery(this).addClass('accoodionclose');					
                    jQuery(this).find('i').removeClass('fa-hand-o-down');
                    jQuery(this).find('i').addClass('fa-hand-o-right');
                }
            }
        });
        jQuery(this).next('.accordion-answer').slideToggle(500);
        jQuery(this).toggleClass('accoodionclose');
        if (jQuery(this).find('i').hasClass('fa-hand-o-down')) {
            jQuery(this).find('i').removeClass('fa-hand-o-down');
            jQuery(this).find('i').addClass('fa-hand-o-right');
        } else {
            jQuery(this).find('i').addClass('fa-hand-o-down');
            jQuery(this).find('i').removeClass('fa-hand-o-right');
        }
    });
    
    /* when product quantity changes, update quantity attribute on add-to-cart button */
        jQuery("form.cart").on("change", "input.qty", function() {
            if (this.value === "0")
                this.value = "1";

            jQuery(this.form).find("button[data-quantity]").data("quantity", this.value);
        });

        /* remove old "view cart" text, only need latest one thanks! */
        jQuery(document.body).on("adding_to_cart", function() {
            jQuery("a.added_to_cart").remove();
        });
        jQuery(".products .product .add_to_cart_button.product_type_simple").on('click', function() {

          var $button = jQuery(this);

          $button.data('quantity', $button.parent('.product').find('input.quantity').val());
        });
    
    /* review add click to slidedown */
    jQuery(".woocommerce-review-link").click(function(e) {
        e.preventDefault();
        jQuery(".woocommerce-Reviews").show();
        jQuery('html, body').animate({ scrollTop: jQuery(".woocommerce-tabs.wc-tabs-wrapper").offset().top-150 }, 1000);
    });
    /*Scroll to top js*/
    jQuery(".scroll-up").click(function () { jQuery("html, body").animate({scrollTop: 0}, '1000'); return false; });
    /* filter position change */
    jQuery('<div class="filter_wrapper"></div>').insertBefore('.filter-grid-list');
    jQuery( ".sidebar .widget.woocommerce.widget_price_filter" ).wrap( "<div class='options_filter'></div>" );
    jQuery( ".sidebar .widget.widget_layered_nav" ).each(function() {
         var nav_l_id = jQuery( this ).attr('id');
         var a = jQuery( this );
         jQuery( this ).wrap( "<div class='widget_layered_nav_filter "+nav_l_id+"'></div>" )
    })
    jQuery( ".site-content .testimonial_slider_wrap li" ).wrap( "<div class='testimo_li_wrap'></div>" );
    
        if(jQuery( window ).width() <= 768) {
            jQuery('.shop_table.wishlist_table').addClass('shop_table_responsive');	
            var product_name = jQuery('.shop_table.wishlist_table th.product-name span').html();	
            var product_price = jQuery('.shop_table.wishlist_table th.product-price span').html();
            var product_status = jQuery('.shop_table.wishlist_table th.product-stock-stauts span').html();
            jQuery('.shop_table.wishlist_table tbody td.product-name').attr('data-title', product_name);
            jQuery('.shop_table.wishlist_table tbody td.product-price').attr('data-title', product_price);
            jQuery('.shop_table.wishlist_table tbody td.product-stock-status').attr('data-title', product_status);
        }
           
    /* added wishlist update count in header menu */
    var update_wishlist_count = function() {
        jQuery.ajax({
            beforeSend: function () {
            },
            complete : function () {
            },
            data : {
                action: 'megashop_update_wishlist_count'
            },
            success : function (data) {
                jQuery('.wishlistbtn a span').html( data );
            },
            url: screenReaderText.ajaxurl
        });
    };
    jQuery('body').on( 'added_to_wishlist removed_from_wishlist added_to_cart', update_wishlist_count );
    /**************************/
    /* header title move on title wrapper */
    jQuery(".site-main > header h1.page-title").detach().prependTo('.page-title-wrapper');
    jQuery('body').not( ".search" ).find(".site-main > article > header > h1.page-title").detach().prependTo('.page-title-wrapper');
    jQuery(".category-description-wrap h1.page-title").detach().prependTo('.page-title-wrapper');
    jQuery(".woo_page h1.page-title").detach().prependTo('.page-title-wrapper');
    jQuery(".site-content article.page.type-page .entry-header h1.page-title").detach().prependTo('.page-title-wrapper');
    
    /***************************/
 
    jQuery(".error404 .site-content .not-found h1.page-title").detach().prependTo('.page-title-wrapper');
    var $pro_title = jQuery('.product-block .summary.entry-summary h1.product_title').clone();
    jQuery($pro_title).prependTo('.page-title-wrapper');

    jQuery('.thumbnails.slider .yith_magnifier_gallery').each(function() {
        var children = jQuery(this).children('li');
        var count = children.length;
        if(count <= 3){
            jQuery(this).parent().addClass('slider_cnt');
        }
    });

    jQuery(".dropdown.myaccount-menu .dropdown-toggle.myaccount").click(function(){
        jQuery( ".account-link-toggle.dropdown-menu" ).slideToggle( "2000" );
        jQuery(this).parent('div.dropdown').toggleClass('openclose closelink');
        jQuery( ".dropdowncartwidget" ).slideUp('slow');
    }); 
    
    jQuery(".header_cart .cart_contents").click(function(){
        jQuery( ".dropdowncartwidget" ).slideToggle( "2000" );
        if(jQuery('.dropdown-toggle.myaccount').parent().hasClass('closelink')){
            jQuery('.dropdown-toggle.myaccount').parent().addClass('openclose');
            jQuery('.dropdown-toggle.myaccount').parent().removeClass('closelink');
        }      
        jQuery( ".account-link-toggle.dropdown-menu" ).slideUp('slow');
    });
    
    jQuery('.products li .caption .description p').each(function() {
            var title = jQuery.trim(jQuery(this).text());
            var max = 160;

            if (title.length > max) {
                var shortText = jQuery.trim(title).substring(0, max - 3) + '...';
                jQuery(this).html('<span class="product-shorten-desc">' + shortText + '</span>');
            }
    });
    
    /*related Products slider*/
    jQuery('.related.products ul.products').owlCarousel({
        items : 4, //4 items above 1000px browser width
        itemsDesktop : [1200,3], 
        itemsDesktopSmall : [991,3], 
        itemsTablet: [767,2], 
        itemsMobile : [480,1] ,
        slideSpeed : 1000,
        autoPlay : false,
        navigation:true,
        pagination:false,
        stopOnHover:true
    });
    jQuery('.both_sidebar_layout .related.products ul.products').owlCarousel({
        items : 4, //4 items above 1000px browser width
        itemsDesktop : [1200,3], 
        itemsDesktopSmall : [1024,2], 
        itemsTablet: [767,2], 
        itemsMobile : [480,1] ,
        slideSpeed : 1000,
        autoPlay : false,
        navigation:true,
        pagination:false,
        stopOnHover:true
    });

    // Custom Navigation Events
    if(jQuery('.related.products ul.products .owl-controls.clickable').css('display') == 'none'){                                            
        jQuery('.related.products .customNavigation').hide();
    }else{
        jQuery('.related.products .customNavigation').show();
        jQuery(".related_next").click(function(){
            jQuery('.related.products ul.products').trigger('owl.next');
        });

        jQuery(".related_prev").click(function(){
            jQuery('.related.products ul.products').trigger('owl.prev');
        });
    }
    /*upsell Products slider*/
    jQuery('.upsells.products ul.products').owlCarousel({
        items : 4, //4 items above 1000px browser width
        itemsDesktop : [1200,3], 
        itemsDesktopSmall : [1024,2], 
        itemsTablet: [767,2], 
        itemsMobile : [480,1] ,
        slideSpeed : 1000,
        pagination:false,
        navigation:true,
        autoPlay : false,
        stopOnHover:true
    });

/*upsell Products slider*/
    jQuery('.both_sidebar_layout .upsells.products ul.products').owlCarousel({
        items : 4, //4 items above 1000px browser width
        itemsDesktop : [1200,3], 
        itemsDesktopSmall : [1024,3], 
        itemsTablet: [767,2], 
        itemsMobile : [480,1] ,
        slideSpeed : 1000,
        pagination:false,
        navigation:true,
        autoPlay : false,
        stopOnHover:true
    });

    // Custom Navigation Events
    if(jQuery('.upsells.products ul.products .owl-controls.clickable').css('display') == 'none'){                                            
        jQuery('.upsells.products .customNavigation').hide();
    }else{
        jQuery('.upsells.products .customNavigation').show();
        jQuery(".upsells_next").click(function(){
            jQuery('.upsells.products ul.products').trigger('owl.next');
        });

        jQuery(".upsells_prev").click(function(){
            jQuery('.upsells.products ul.products').trigger('owl.prev');
        });
    }
     /*upsell Products slider*/
    jQuery('.cross-sells ul.products').owlCarousel({
        items : 4, //4 items above 1000px browser width
        itemsDesktop : [1200,3], 
        itemsDesktopSmall : [991,3], 
        itemsTablet: [767,2], 
        itemsMobile : [480,1] ,
        slideSpeed : 1000,
        pagination:false,
        navigation:true,
        autoPlay : false,
        stopOnHover:true
    });
    /*upsell Products slider*/
    jQuery('.both_sidebar_layout .cross-sells ul.products').owlCarousel({
        items : 4, //4 items above 1000px browser width
        itemsDesktop : [1200,3], 
        itemsDesktopSmall : [991,2], 
        itemsTablet: [767,2], 
        itemsMobile : [480,1] ,
        slideSpeed : 1000,
        pagination:false,
        navigation:true,
        autoPlay : false,
        stopOnHover:true
    });

    // Custom Navigation Events
    if(jQuery('.cross-sells.products ul.products .owl-controls.clickable').css('display') == 'none'){                                            
        jQuery('.cross-sells.products .customNavigation').hide();
    }else{
        jQuery('.cross-sells.products .customNavigation').show();
        jQuery(".cross-sells_next").click(function(){
            jQuery('.cross-sells.products ul.products').trigger('owl.next');
        });

        jQuery(".cross-sells_prev").click(function(){
            jQuery('.cross-sells.products ul.products').trigger('owl.prev');
        });
    }
  
    (function(e) {
        "use strict";
        e(".active_progresbar > span").each(function() {
            e(this).data("origWidth", e(this).width()).width(0).animate({
                width: e(this).data("origWidth")
            }, 1200)
        })
    })(jQuery);
    		
    (function(e) {
        "use strict";
        e(".tab ul.tabs li:first-child a").addClass("current");
        e(".tab .tab_groupcontent div.tabs_tab").hide();
        e(".tab .tab_groupcontent div.tabs_tab:first-child").css("display", "block");
        e(".tab ul.tabs li a").click(function(t) {
            var n = e(this).parent().parent().parent(),
            r = e(this).parent().index();
            n.find("ul.tabs").find("a").removeClass("current");
            e(this).addClass("current");
            n.find(".tab_groupcontent").find("div.tabs_tab").not("div.tabs_tab:eq(" + r + ")").slideUp();
            n.find(".tab_groupcontent").find("div.tabs_tab:eq(" + r + ")").slideDown();
            t.preventDefault();
        })
    })(jQuery);
    
    // tooltips on hover
	jQuery('[data-toggle=\'tooltip\']').tooltip({container: 'body'});

	// Makes tooltips work on ajax generated content
	jQuery(document).ajaxStop(function() {
		jQuery('[data-toggle=\'tooltip\']').tooltip({container: 'body'});
	});
        
    jQuery('.product_wrap .products > .product-list .product-thumb').attr('class', 'product-thumb col-xs-5 col-sm-5 col-md-3 padding_left_0');
    jQuery('.product_wrap .products > .product-list .product-description').attr('class', 'product-description col-xs-7 col-sm-7 col-md-9');
    /*layout 8*/
    jQuery('.auto_install_layout8 .product_wrap .products > .product-list .product-thumb').attr('class', 'product-thumb col-xs-12 col-sm-5 col-md-4 padding_left_0');
    jQuery('.auto_install_layout8 .product_wrap .products > .product-list .product-description').attr('class', 'product-description col-xs-12 col-sm-7 col-md-8');
    
    jQuery('.product_wrap .products > .product-grid .product-thumb').attr('class', 'product-thumb col-xs-12 padding_0');
    jQuery('.product_wrap .products > .product-grid .product-description').attr('class', 'product-description col-xs-12');
    jQuery('select.form-control').wrap("<div class='select-wrapper'></div>");
    /* Active class in Product List Grid START */
    jQuery('.product_wrap ul.products > li').addClass('product-grid');
    jQuery('#list-view').click(function() {
        jQuery('.product_wrap ul.products > li').removeClass('product-grid');
        jQuery('.product_wrap ul.products > li').addClass('product-list');
        jQuery('#grid-view').removeClass('active');
        jQuery('#list-view').addClass('active');
        jQuery('.product_wrap .products > .product-list .product-thumb').attr('class', 'product-thumb col-xs-5 col-sm-5 col-md-3 padding_left_0');
        jQuery('.product_wrap .products > .product-list .product-description').attr('class', 'product-description col-xs-7 col-sm-7 col-md-9');
        jQuery('.auto_install_layout8 .product_wrap .products > .product-list .product-thumb').attr('class', 'product-thumb col-xs-12 col-sm-5 col-md-4 padding_left_0');
        jQuery('.auto_install_layout8 .product_wrap .products > .product-list .product-description').attr('class', 'product-description col-xs-12 col-sm-7 col-md-8');
        localStorage.setItem('display', 'list');
    });
    jQuery('#grid-view').click(function() {
        jQuery('#list-view').removeClass('active');
        jQuery('#grid-view').addClass('active');
        jQuery('.product_wrap ul.products > li').removeClass('product-list');
        jQuery('.product_wrap ul.products > li').addClass('product-grid');
        jQuery('.product_wrap .products > .product-grid .product-thumb').attr('class', 'product-thumb col-xs-12 padding_0');
        jQuery('.product_wrap .products > .product-grid .product-description').attr('class', 'product-description col-xs-12');	
        localStorage.setItem('display', 'grid');
    });
    /* Active class in Product List Grid END */
    if (localStorage.getItem('display') == 'list') {
        jQuery('#list-view').trigger('click');
    } else if (localStorage.getItem('display') == 'grid') { 
        jQuery('#grid-view').trigger('click');
    }
    
    /**
    * Gallery post format slideshow
    */
    jQuery('.format-gallery .enable-slider').slick({
        prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"><i class="fa fa-angle-right"></i></button>'
    });
    jQuery('#stoggle').click(function () {
        if (jQuery(this).hasClass('open')) {
            jQuery(this).removeClass('open');
            jQuery(this).find('i').removeClass('fa-spin');
            jQuery('.theme_customize').css('right', '-300px');
        } else {
            jQuery(this).addClass('open');
            jQuery(this).find('i').addClass('fa-spin');
            jQuery('.theme_customize').css('right', '0');
        }
    });
        
});

/* Start Homepage Stickyheader JS */	

function header() {    
    if (jQuery(window).width() > 1200){
        if(jQuery('.full-header').hasClass("active")){
            if (jQuery(this).scrollTop() > 100)
            {    
                jQuery('.full-header').addClass("fixed");
 
            }else{
                jQuery('.full-header').removeClass("fixed");
            }
        } else {
            jQuery('.full-header').removeClass("fixed");
        }
    }else{
        jQuery('.full-header').removeClass('fixed');
    }    
}
jQuery(window).scroll(function () {
    var scroll = jQuery(window).scrollTop();
    if (scroll > 100) {
        jQuery(".scroll-up").fadeIn();
    } else {
        jQuery(".scroll-up").fadeOut();
    }
});
 
function menuToggle() {
    if(jQuery( window ).width() < 992) {
        jQuery('.sidebar .widget_maxmegamenu .mega-menu-wrap').appendTo('.responsivemenu');			
    }
    else if(jQuery( window ).width() >= 992){
        jQuery('.responsivemenu .mega-menu-wrap').insertAfter('.sidebar .widget_maxmegamenu h2');
    }
}
jQuery(document).ready(function() {
    menuToggle();
});
jQuery( window ).resize(function(){
    menuToggle();
});

jQuery(document).ready(function(){
    header();
});
jQuery(window).resize(function() {
    header();
    if(jQuery( window ).width() <= 768) {
        jQuery('.shop_table.wishlist_table').addClass('shop_table_responsive');	
        var product_name = jQuery('.shop_table.wishlist_table th.product-name span').html();	
        var product_price = jQuery('.shop_table.wishlist_table th.product-price span').html();
        var product_status = jQuery('.shop_table.wishlist_table th.product-stock-stauts span').html();
        jQuery('.shop_table.wishlist_table tbody td.product-name').attr('data-title', product_name);
        jQuery('.shop_table.wishlist_table tbody td.product-price').attr('data-title', product_price);
        jQuery('.shop_table.wishlist_table tbody td.product-stock-status').attr('data-title', product_status);
    }
});
jQuery(window).scroll(function() {
    header();
});


function footerToggle() {
    if(jQuery( window ).width() < 992) {   
        jQuery('.sidebar .yith-woocommerce-ajax-product-filter.widget').appendTo('.filter_wrapper')
        jQuery(".sidebar .widget h2").addClass( "toggle" );
        jQuery(".sidebar .widget").children(':nth-child(2)').css( 'display', 'none' );
        jQuery(".sidebar .widget.active").children(':nth-child(2)').css( 'display', 'block' );
        jQuery(".sidebar .widget h2.toggle").unbind("click");
        jQuery(".sidebar .widget h2.toggle").click(function() {
            jQuery(this).parent().toggleClass('active').children(':nth-child(2)').slideToggle( "fast" );
        });
        jQuery(".site-footer  .widget h2").addClass( "toggle" );
        jQuery(".site-footer .widget").children(':nth-child(2)').css( 'display', 'none' );
        jQuery(".site-footer .widget.active").children(':nth-child(2)').css( 'display', 'block' );
        jQuery(".site-footer .widget h2.toggle").unbind("click");
        jQuery(".site-footer .widget h2.toggle").click(function() {
            jQuery(this).parent().toggleClass('active').children(':nth-child(2)').slideToggle( "fast" );
        });
        jQuery('.sidebar .widget_price_filter.widget').detach().appendTo('.filter_wrapper');
        jQuery('.sidebar .yith-woocommerce-ajax-product-filter.widget').detach().appendTo('.filter_wrapper');        
        
        jQuery('.widget_price_filter.widget > form').css( 'display', 'block' );
        jQuery('.yith-woocommerce-ajax-product-filter.widget').css( 'display', 'block' );
        
        jQuery( ".sidebar .widget.widget_layered_nav" ).each(function() {
         var nav_l_id = jQuery( this ).attr('id');
            jQuery('.widget_layered_nav.widget#'+nav_l_id).detach().appendTo('.filter_wrapper');
        });       
        
        jQuery("#content .filter_wrapper .widget.woocommerce").children(':nth-child(2)').css( 'display', 'block' );
        jQuery("#content .filter_wrapper .widget.woocommerce").addClass('active');
        jQuery('.widget_layered_nav.widget > form').css( 'display', 'block' );
    }else{
        jQuery( ".filter_wrapper .widget.widget_layered_nav" ).each(function() {
         var nav_l_id = jQuery( this ).attr('id');
            jQuery('.filter_wrapper .widget_layered_nav.widget#'+nav_l_id).detach().appendTo('.sidebar .widget_layered_nav_filter.'+nav_l_id);
        });
        jQuery("#content .filter_wrapper .widget.woocommerce").removeClass('active');
        jQuery('.filter_wrapper .widget_price_filter.widget').detach().appendTo('.sidebar .options_filter');
        jQuery(".sidebar .widget h2").unbind("click");
        jQuery(".sidebar .widget h2").removeClass( "toggle" );
        jQuery(".sidebar .widget").children(':nth-child(2)').css( 'display', 'block' );
        jQuery(".site-footer .widget h2").unbind("click");
        jQuery(".site-footer .widget h2").removeClass( "toggle" );
        jQuery(".site-footer .widget").children(':nth-child(2)').css( 'display', 'block' );
                
    }
}
jQuery(document).ready(function() {
    footerToggle();
});
jQuery(window).resize(function() {
    footerToggle();
});


function responsivemenu()
{
    if (jQuery(document).width() <= 991)
    {
        jQuery('.main-navigation ul.primary-menu').appendTo('.responsivemenu .mega-menu-wrap > ul');	
        jQuery('.main-navigation ul.mega-menu').appendTo('.responsivemenu .mega-menu-wrap > ul');	
		jQuery('.top-navigation ul.Top-menu').appendTo('.responsivemenu .mega-menu-wrap > ul');
    }
    else 
    {	
        jQuery('.primary-menu.nav-menu.main-menu').prependTo('.site-inner .main-navigation > div');
		jQuery('.Top-menu.main-menu').prependTo('.site-inner .top-navigation > div');
        jQuery('ul.mega-menu > ul.mega-menu#mega-menu-primary').prependTo('.main-navigation .mega-menu-wrap');	
    }
}
jQuery(document).ready(function() {
    responsivemenu();
});
jQuery( window ).resize(function(){
    responsivemenu();
});