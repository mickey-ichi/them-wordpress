<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product,$post;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php post_class(); ?>>
    <div class="product-container">
	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	 ?> 
	 <?php
        remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash' );
        remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail' );
        
            $attachment_ids = $product->get_gallery_image_ids();
            if(!empty($attachment_ids)){
                $hover_img = wp_get_attachment_image_src($attachment_ids[0], 'shop_catalog');
            }
            $thumb_img = get_the_post_thumbnail_url( $post->ID, 'shop_catalog');
            if(!empty($thumb_img)){
                ?>
            <img class="replace-2x img-responsive" src="<?php echo $thumb_img; ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" width="270" height="351">
            <?php if(!empty($hover_img)){ ?> <img class="fade replace-2x tt_img_hover" src="<?php echo $hover_img[0]; ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>"> <?php } ?>
                <?php 
            }else{
                wc_placeholder_img( 'shop_catalog' );
            }
	do_action( 'woocommerce_before_shop_loop_item_title' );
        add_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_link_open',1);
        add_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_link_close',11);
        
	/**
	 * woocommerce_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	do_action( 'woocommerce_shop_loop_item_title' );
	
	/**
	 * woocommerce_after_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */       
        remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10);
	do_action( 'woocommerce_after_shop_loop_item_title' );
	
	/**
	 * woocommerce_after_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	 
	remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close',5);
	do_action( 'woocommerce_after_shop_loop_item' );
	?></div>
        </div>
    </div>
</li>
