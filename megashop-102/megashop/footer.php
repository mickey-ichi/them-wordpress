<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage megashop
 * @since megashop 1.0.2
 */
?>

		</div><!-- .site-content -->
                </div><!-- .site-inner -->
<?php 
                    $display_footer_widget = of_get_option('display_footer_widget');  
                    $above_footer_area = of_get_option('above_footer_area');
                        ?>
		<footer id="colophon" class="site-footer">
                    <?php if(!empty($above_footer_area)){
                        $class = 'border';
                        $above_foot = of_get_option('above_footer_area');
                        ?>
                    <div class="container above_footer_area"><div class="widget"><?php echo wp_kses_post(do_shortcode($above_foot)); ?></div></div>
                    <?php }else{
                        $class = '';
                    } ?>
                    <?php if($display_footer_widget == 1){ ?>
                    <div class="container-fluid padding_0 footer-widget-wrap">
                        <div class="container">
                            <?php 
                                    $select_footer_column = of_get_option('select_footer_column');
                                    if($select_footer_column == '1_column'){
                                        $colclass = 'col-xs-12';
                                        $column = 1;
                                    }elseif($select_footer_column == '2_column'){
                                        $colclass = 'col-xs-12 col-sm-6';
                                        $column = 2;
                                    }elseif($select_footer_column == '3_column'){
                                        $colclass = 'col-xs-12 col-sm-4';
                                        $column = 3;
                                    }elseif($select_footer_column == '4_column'){
                                        $colclass = 'col-xs-12 col-sm-6 col-md-3';
                                        $column = 4;
                                    }elseif($select_footer_column == '5_column'){
                                        $colclass = 'col-xs-12 col-sm-6 col-md-2_5';
                                        $column = 5;
                                    }elseif($select_footer_column == '6_column'){
                                        $colclass = 'col-xs-12 col-sm-6 col-md-2';
                                        $column = 6;
                                    }else{
                                        $colclass = 'col-xs-12 col-sm-6 col-md-3';
                                        $column = 4;
                                    }    
                                    $flag = 0;
                                    for($i = 1; $i <= $column; $i++){
                                        $namefooter = of_get_option('footer_widget_'.$i);
                                        if(is_active_sidebar($namefooter)){
                                            $flag = 1;
                                        }
                                    } if($flag) { ?>
                            <div class="footer-widget-area <?php echo esc_attr($class); ?> col-xs-12 padding_left_0 padding_right_0">
                                <div class="row">
                                    <?php                    
                                    for($i = 1; $i <= $column; $i++){ ?>
                                        <div class="footer-column <?php echo esc_attr($colclass); ?>">
                                            <?php 
                                             $namefooter = of_get_option('footer_widget_'.$i);
                                                if(is_active_sidebar($namefooter)){
                                                    dynamic_sidebar($namefooter);
                                                }
                                             ?>
                                        </div> 
                                    <?php }
                                    ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>	
                   <?php }
                   if ( is_active_sidebar( 'footer_payment_icon' )  ){
                   ?>
                    <div class="payment-icon-block container">
                        <div class="payment-icon-inner text-center">
                            <?php dynamic_sidebar('footer_payment_icon'); ?>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="container-fluid padding_left_0 padding_right_0 footer-bottom">
                        <div class="container">
                            <?php

                            $copyright_text = of_get_option('copyright_text');
                           if($copyright_text !=""){ ?><div class="copyright"><?php echo wp_kses_post($copyright_text);?></div><?php }
                            $display_socialicon = of_get_option('display_socialicon');
                            $facebook_link = of_get_option('facebook_link');
                            $twitter_link = of_get_option('twitter_link');
                            $rss_link = of_get_option('rss_link');
                            $dribbble_link = of_get_option('dribbble_link');
                            $google_plus_link = of_get_option('google_plus_link');
                            $instagram_link = of_get_option('instagram_link');
                            $linkedin_link = of_get_option('linkedin_link');
                            $pintrest_link = of_get_option('pintrest_link');
                            $mailto_link = of_get_option('mailto_link');
                            $youtube_link = of_get_option('youtube_link');
                            $custom_link1 = of_get_option('custom_link1');
                            $custom_icon1 = of_get_option('custom_icon1');
                            $custom_link2 = of_get_option('custom_link2');
                            $custom_icon2 = of_get_option('custom_icon2');
                            $custom_link3 = of_get_option('custom_link3');
                            $custom_icon3 = of_get_option('custom_icon3');                                                       
                            
                            if($display_socialicon == 1){
                            ?>
                            <div id="social_block" class="follow-us pull-right">
                                <ul class="list-unstyled">
                                    <?php if(!empty($facebook_link)){ ?><li class="facebook"><a target="_blank" title="facebook" href="<?php echo esc_url($facebook_link); ?>"><i class="fa fa-facebook"></i></a></li><?php } ?>
                                    <?php if(!empty($twitter_link)){ ?><li class="twitter"><a target="_blank" title="twitter" href="<?php echo esc_url($twitter_link); ?>"><i class="fa fa-twitter"></i></a></li><?php } ?>
                                    <?php if(!empty($rss_link)){ ?><li class="rss"><a target="_blank" title="rss" href="<?php echo esc_url($rss_link); ?>"><i class="fa fa-rss"></i></a></li><?php } ?>
                                    <?php if(!empty($dribbble_link)){ ?><li class="dribbble"><a target="_blank" title="dribbble" href="<?php echo esc_url($dribbble_link); ?>"><i class="fa fa-dribbble"></i></a></li><?php } ?>
                                    <?php if(!empty($google_plus_link)){ ?><li class="googleplus"><a target="_blank" title="googleplus" href="<?php echo esc_url($google_plus_link); ?>"><i class="fa fa-google-plus"></i></a></li><?php } ?>
                                    <?php if(!empty($instagram_link)){ ?><li class="instagram"><a target="_blank" title="instagram" href="<?php echo esc_url($instagram_link); ?>"><i class="fa fa-instagram"></i></a></li><?php } ?>
                                    <?php if(!empty($linkedin_link)){ ?><li class="linkedin"><a target="_blank" title="linkedin" href="<?php echo esc_url($linkedin_link); ?>"><i class="fa fa-linkedin"></i></a></li><?php } ?>
                                    <?php if(!empty($pintrest_link)){ ?><li class="pintrest"><a target="_blank" title="pintrest" href="<?php echo esc_url($pintrest_link); ?>"><i class="fa fa-pinterest"></i></a></li><?php } ?>
                                    <?php if(!empty($mailto_link)){ ?><li class="mail"><a target="_blank" title="mail" href="<?php echo esc_url($mailto_link); ?>"><i class="fa fa-mail-forward"></i></a></li><?php } ?>
                                    <?php if(!empty($youtube_link)){ ?><li class="youtube"><a target="_blank" title="youtube" href="<?php echo esc_url($youtube_link); ?>"><i class="fa fa-youtube"></i></a></li><?php } ?>
                                    <?php if(!empty($custom_link1) && !empty($custom_icon1)){ ?><li class="<?php echo esc_attr($custom_icon1); ?>"><a target="_blank" title="" href="<?php echo esc_url($custom_link1); ?>"><i class="fa <?php echo esc_attr($custom_icon1); ?>"></i></a></li><?php } ?>
                                    <?php if(!empty($custom_link2) && !empty($custom_icon2)){ ?><li class="<?php echo esc_attr($custom_icon1); ?>"><a target="_blank" title="" href="<?php echo esc_url($custom_link2); ?>"><i class="fa <?php echo esc_attr($custom_icon2); ?>"></i></a></li><?php } ?>                                    
                                    <?php if(!empty($custom_link3) && !empty($custom_icon3)){ ?><li class="<?php echo esc_attr($custom_icon1); ?>"><a target="_blank" title="" href="<?php echo esc_url($custom_link3); ?>"><i class="fa <?php echo esc_attr($custom_icon3); ?>"></i></a></li><?php } ?>
                                    
                                </ul>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
		</footer><!-- .site-footer -->
	
</div><!-- .site -->
<?php 
        $display_scroll_top = of_get_option('display_scroll_top'); 
        if( $display_scroll_top == 1 ){
?>
    <a id="to_top" class="scroll-up" href="javascript:void(0);">
        <i class="fa fa-angle-up"></i>
    </a>
<?php 
} ?>
<?php wp_footer(); ?>
</body>
</html>