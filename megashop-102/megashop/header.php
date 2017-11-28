<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage megashop
 * @since megashop 1.0.2
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php 
    $box_layout = of_get_option('box_layout');
    $product_layout = of_get_option('product_layout');
    
    if($box_layout == 1){
        $class = "box_layout container padding_0";
    }else{
        $class = '';
    }
    $layout = get_option('layout');
    ?>
    <div id="page" class="site <?php echo esc_attr($class)." ". esc_attr($product_layout) ." ". esc_attr($layout); ?>">
    <?php 
    $pre_loader = of_get_option('pre_loader');
        $display_preloader = of_get_option('display_preloader');
        if(!empty($pre_loader)  && $display_preloader == 1 && is_front_page()){
        ?>        
        <div class="ttloader"><span class="rotating"></span>
        </div>
    <?php } ?>
	<div class="site-inner">
		<?php get_template_part( 'header/header', 'layout' );  ?>
		<div id="content-wrap" class="site-content-wrap">