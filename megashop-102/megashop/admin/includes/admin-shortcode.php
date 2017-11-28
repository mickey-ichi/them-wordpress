<?php
/**
     * Append the 'Add Shortcode'
     */
    add_action('media_buttons', 'insert_shortcode_btn', 15);
   
    if (!function_exists('insert_shortcode_btn')) {

        function insert_shortcode_btn() {

                echo '<a href="#TB_inline?width=800&height=600&inlineId=choose-shortcode" class="thickbox button" title="' .
                        __("Select Shortcode into post/page", 'megashop') .
                        '"><span class="wp-media-buttons-icon" style="background:url('.  get_template_directory_uri().'/admin/images/tt_icon.png); background-repeat: no-repeat; background-position: left bottom;"></span> ' .
                        esc_html__("Add Shortcodes", 'megashop') . '</a>';
        }

    }
    
    
    /**
     * Append the 'Choose Shortcode' thickbox content to the bottom of selected admin pages
     */
    add_action('admin_footer', 'admin_footer_shortcode', 11);
    if (!function_exists('admin_footer_shortcode')) {

        function admin_footer_shortcode() {
            // Only run in post/page creation and edit screens
                //Get the slider information
                ?>
                
                <script type="text/javascript">
                    jQuery(document).ready(function () {
                        jQuery('.sc-defualt img').on('click', function () {
                            var shortcode = jQuery(this).parent('.sc-defualt').attr('sortdata');
                            window.send_to_editor(shortcode);
                            tb_remove();
                        });
                       function close_accordion_section() {
                            jQuery('.accordion .accordion-section-title').removeClass('active');
                            jQuery('.accordion .accordion-section-content').slideUp(300).removeClass('open');
                        }

                        jQuery('.accordion-section-title').click(function(e) {
                            // Grab current anchor value
                            var currentAttrValue = jQuery(this).attr('href');

                            if(jQuery(e.target).is('.active')) {
                                close_accordion_section();
                            }else {
                                close_accordion_section();
                                // Add active class to section title
                                jQuery(this).addClass('active');
                                // Open up the hidden content panel
                                jQuery('.accordion ' + currentAttrValue).slideDown(300).addClass('open'); 
                            }

                            e.preventDefault();
                        });
                    });
                </script>

                <div id="choose-shortcode" style="display: none;">
                    <div class="wrap">
                        <style>
                            #TB_window{
                                background: rgba(0, 0, 0, 0) none repeat scroll 0 0 !important;
                                box-shadow: none !important;
                            }
                            #TB_ajaxContent{
                                box-sizing: border-box;
/*                                height: 100% !important;*/
                                overflow: scroll;
                                width: 100% !important;
                                background: #ffffff none repeat scroll 0 0 !important;
                            }
                            #TB_ajaxContent .wrap{
                                box-sizing: border-box;
                                margin: 0;
                                float: left;
                                padding: 15px 0;
/*                                height: 100% !important;*/
                                width: 100% !important;
                            }
                            p.sc-defualt {
                                float: left;
                                margin-bottom: 5px;
                                margin-right: 20px;
                                margin-top: 0;
                                cursor: pointer;
                            }
                            .accordion.wrapp .accordion-section-title{
                                text-decoration: none;
                            }
                            .accordion.wrapp a:focus,.accordion.wrapp a:hover{
                                box-shadow: none;
                                color: #fff;
                            }
                            /*----- Accordion -----*/
                            .js .accordion .accordion-section-title::after {
                                position: absolute;
                                right: 10px;
                                top: 10px;
                                z-index: 1;
                            }
                            .accordion, .accordion * {
                                -webkit-box-sizing:border-box; 
                                -moz-box-sizing:border-box; 
                                box-sizing:border-box;
                            }

                            .accordion.wrapp {
                                float: left;
                                width: 100%;
                                box-shadow:0px 1px 3px rgba(0,0,0,0.25);
                                border-radius:3px;
                                background:#f7f7f7;
                                margin-bottom: 30px;
                            }

                            /*----- Section Titles -----*/
                            .accordion.wrapp .accordion-section-title {
                                width:100%;
                                padding:10px;
                                display:inline-block;
                                border-bottom:1px solid #1a1a1a;
                                background:#333;
                                transition:all linear 0.15s;
                                /* Type */
                                font-size:1.200em;
                                text-shadow:0px 1px 0px #1a1a1a;
                                color:#fff;
                            }

                            .accordion.wrapp .accordion-section-title.active, .accordion-section-title:hover {
                                background:#4c4c4c;
                                text-decoration:none;
                            }

                            .accordion-section:last-child .accordion-section-title {
                                border-bottom:none;
                            }

                            /*----- Section Content -----*/
                            .accordion-section-content {
                                padding:10px;
                                display:none;
                            }
                            .accordion-section-content h3{
                                float: left;
                                width: 100%;
                                margin: 0 0 10px;
                            }
                        </style>
                    <div class="accordion wrapp">
                        <div class="accordion-section">
                            <a class="accordion-section-title" href="#accordion-1"><?php esc_html_e('Accordians & Toggles','megashop'); ?></a>
                       <div id="accordion-1" class="accordion-section-content">
                           <h3><?php esc_html_e('Accordians','megashop'); ?></h3>
                           <p class="sc-defualt"  sortdata="[accordions style='1'][accordion title='Nam tempor diam elit']Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. Nam tempor diam elit. [/accordion][accordion title='Nam tempor diam elit']Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. Nam tempor diam elit. [/accordion][accordion title='Nam tempor diam elit' ]Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. [/accordion][/accordions]">
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/accordion1.png" />
                            </p>  
                            <p class="sc-defualt"  sortdata="[accordions style='2'][accordion title='Nam tempor diam elit']Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. Nam tempor diam elit. [/accordion][accordion title='Nam tempor diam elit']Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. Nam tempor diam elit. [/accordion][accordion title='Nam tempor diam elit' ]Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. [/accordion][/accordions]">
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/accordion2.png" />
                            </p>  
                            <p class="sc-defualt"  sortdata="[accordions style='3'][accordion title='Nam tempor diam elit']Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. Nam tempor diam elit. [/accordion][accordion title='Nam tempor diam elit']Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. Nam tempor diam elit. [/accordion][accordion title='Nam tempor diam elit' ]Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. [/accordion][/accordions]">
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/accordion3.png" />
                            </p>  
                            <p class="sc-defualt"  sortdata="[accordions style='4'][accordion title='Nam tempor diam elit']Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. Nam tempor diam elit. [/accordion][accordion title='Nam tempor diam elit']Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. Nam tempor diam elit. [/accordion][accordion title='Nam tempor diam elit' ]Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. [/accordion][/accordions]">
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/accordion4.png" />
                            </p> 
                            <br>
                           <h3><?php esc_html_e('Toggles','megashop'); ?></h3>
                            <p class="sc-defualt" sortdata="[toggles style='1' ][toggle title='Nam tempor diam elit']Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. Nam tempor diam elit. [/toggle][toggle title='Nam tempor diam elit']Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. Nam tempor diam elit. [/toggle][toggle title='Nam tempor diam elit' ]Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. [/toggle][/toggles]">
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/toggle1.png" />
                            </p>
                            <p class="sc-defualt" sortdata="[toggles style='2' ][toggle title='Nam tempor diam elit']Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. Nam tempor diam elit. [/toggle][toggle title='Nam tempor diam elit']Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. Nam tempor diam elit. [/toggle][toggle title='Nam tempor diam elit' ]Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. [/toggle][/toggles]">
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/toggle2.png" />
                            </p>
                            <p class="sc-defualt" sortdata="[toggles style='3' ][toggle title='Nam tempor diam elit']Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. Nam tempor diam elit. [/toggle][toggle title='Nam tempor diam elit']Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. Nam tempor diam elit. [/toggle][toggle title='Nam tempor diam elit' ]Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. [/toggle][/toggles]">
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/toggle3.png" />
                            </p>
                            <p class="sc-defualt" sortdata="[toggles style='4' ][toggle title='Nam tempor diam elit']Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. Nam tempor diam elit. [/toggle][toggle title='Nam tempor diam elit']Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. Nam tempor diam elit. [/toggle][toggle title='Nam tempor diam elit' ]Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. [/toggle][/toggles]">
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/toggle4.png" />
                            </p>
                            
                        </div>
                        </div>
                       <div class="accordion-section">
                            <a class="accordion-section-title" href="#accordion-2"><?php esc_html_e('Blockquotes','megashop'); ?></a>
                       <div id="accordion-2" class="accordion-section-content">
                            <p class="sc-defualt" sortdata='[tt_blockquote author="admin" link="#" style="1"] Zril quidam debitis nec eu, te eam ludus diceret voluptua, ea vix odio inani habemus. Eam te dicit regione. Partem vituperatoribus in eos, cu munere omittam voluptatum his. In sale delenit ancillae mei, quo in dicat consulatu reformidans. [/tt_blockquote]'>
                               <img src="<?php echo get_template_directory_uri(); ?>/admin/images/blockquote1.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[tt_blockquote author="admin" link="#" style="2"] Zril quidam debitis nec eu, te eam ludus diceret voluptua, ea vix odio inani habemus. Eam te dicit regione. Partem vituperatoribus in eos, cu munere omittam voluptatum his. In sale delenit ancillae mei, quo in dicat consulatu reformidans. [/tt_blockquote]'>
                               <img src="<?php echo get_template_directory_uri(); ?>/admin/images/blockquote2.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[tt_blockquote author="admin" link="#" style="3"] Zril quidam debitis nec eu, te eam ludus diceret voluptua, ea vix odio inani habemus. Eam te dicit regione. Partem vituperatoribus in eos, cu munere omittam voluptatum his. In sale delenit ancillae mei, quo in dicat consulatu reformidans. [/tt_blockquote]'>
                               <img src="<?php echo get_template_directory_uri(); ?>/admin/images/blockquote3.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[tt_blockquote author="admin" link="#" style="4"] Zril quidam debitis nec eu, te eam ludus diceret voluptua, ea vix odio inani habemus. Eam te dicit regione. Partem vituperatoribus in eos, cu munere omittam voluptatum his. In sale delenit ancillae mei, quo in dicat consulatu reformidans. [/tt_blockquote]'>
                               <img src="<?php echo get_template_directory_uri(); ?>/admin/images/blockquote4.png" />
                            </p>
                        </div>
                       </div>
                        <div class="accordion-section">
                            <a class="accordion-section-title" href="#accordion-3"><?php esc_html_e('Dividers','megashop'); ?></a>
                            <div id="accordion-3" class="accordion-section-content">
                            <p class="sc-defualt" sortdata='[tt_divider type="solid" space="30"]Zril quidam debitis nec eu, te eam ludus diceret voluptua, ea vix odio inani habemus. Eam te dicit regione. Partem vituperatoribus in eos, cu munere omittam voluptatum his. In sale delenit ancillae mei, quo in dicat consulatu reformidans.[/tt_divider]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/solid.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[tt_divider type="double" space="30"]Zril quidam debitis nec eu, te eam ludus diceret voluptua, ea vix odio inani habemus. Eam te dicit regione. Partem vituperatoribus in eos, cu munere omittam voluptatum his. In sale delenit ancillae mei, quo in dicat consulatu reformidans.[/tt_divider]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/double.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[tt_divider type="dashed" space="30"]Zril quidam debitis nec eu, te eam ludus diceret voluptua, ea vix odio inani habemus. Eam te dicit regione. Partem vituperatoribus in eos, cu munere omittam voluptatum his. In sale delenit ancillae mei, quo in dicat consulatu reformidans.[/tt_divider]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/dashed.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[tt_divider type="dotted" space="30"]Zril quidam debitis nec eu, te eam ludus diceret voluptua, ea vix odio inani habemus. Eam te dicit regione. Partem vituperatoribus in eos, cu munere omittam voluptatum his. In sale delenit ancillae mei, quo in dicat consulatu reformidans.[/tt_divider]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/dotted.png" />
                            </p>
                        </div>
                        </div>
                         <div class="accordion-section">
                            <a class="accordion-section-title" href="#accordion-4"><?php esc_html_e('Lists','megashop'); ?></a>
                            <div id="accordion-4" class="accordion-section-content">
                            <p class="sc-defualt" sortdata='[tt_list][list_item list_icon="fa-square"]Duis sollicitudin adipiscing[/list_item][list_item list_icon="fa-square"]Duis sollicitudin adipiscing[/list_item][list_item list_icon="fa-square"]Duis sollicitudin adipiscing[/list_item][list_item list_icon="fa-square"]Duis sollicitudin adipiscing[/list_item][/tt_list]'>                                 
                            <img src="<?php echo get_template_directory_uri(); ?>/admin/images/lists1.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[tt_list][list_item list_icon="fa-square-o"]Duis sollicitudin adipiscing[/list_item][list_item list_icon="fa-square-o"]Duis sollicitudin adipiscing[/list_item][list_item list_icon="fa-square-o"]Duis sollicitudin adipiscing[/list_item][list_item list_icon="fa-square-o"]Duis sollicitudin adipiscing[/list_item][/tt_list]'>                                 
                            <img src="<?php echo get_template_directory_uri(); ?>/admin/images/lists2.png" />
                            </p>
                        </div>
                         </div>
                        <div class="accordion-section">
                            <a class="accordion-section-title" href="#accordion-5"><?php esc_html_e('Map','megashop'); ?></a>
                            <div id="accordion-5" class="accordion-section-content">
                            <p class="sc-defualt" sortdata="[map address='india' type='ROADMAP' zoom='10' map_icon='' width='500px' height='200px']"> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/roadmap.png" />
                            </p>
                            <p class="sc-defualt" sortdata="[map address='india' type='TERRAIN' zoom='10' map_icon='' width='500px' height='200px']"> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/terrain.png" />
                            </p>
                            <p class="sc-defualt" sortdata="[map address='india' type='SATELLITE' zoom='10' map_icon='' width='500px' height='200px']"> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/satellite.png" />
                            </p>
                            <p class="sc-defualt" sortdata="[map address='india' type='HYBRID' zoom='10' map_icon='' width='500px' height='200px']"> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/hybrid.png" />
                            </p>
                        </div>
                        </div>
                        <div class="accordion-section">
                            <a class="accordion-section-title" href="#accordion-6"><?php esc_html_e('Message boxs','megashop'); ?></a>
                            <div id="accordion-6" class="accordion-section-content">
                            <p class="sc-defualt" sortdata="[message_box type='success']<b>Success!</b> lorem Ipsum has been the industry's standard dummy txt[/message_box]"> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/success.png" />
                            </p>
                            <p class="sc-defualt" sortdata="[message_box type='danger']<b>Danger!</b> lorem Ipsum has been the industry's standard dummy txt[/message_box]"> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/error.png" />
                            </p>
                            <p class="sc-defualt" sortdata="[message_box type='warning']<b>Warning!</b> lorem Ipsum has been the industry's standard dummy txt[/message_box]"> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/warning.png" />
                            </p>
                            <p class="sc-defualt" sortdata="[message_box type='info']<b>Info!</b> lorem Ipsum has been the industry's standard dummy txt[/message_box]"> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/info.png" />
                            </p>
                            </div>
                        </div>
                        <div class="accordion-section">
                            <a class="accordion-section-title" href="#accordion-7"><?php esc_html_e('Progress bar & Pie chart','megashop'); ?></a>
                            <div id="accordion-7" class="accordion-section-content">  
                                <h3><?php esc_html_e('Progress bar','megashop'); ?></h3>
                            <p class="sc-defualt" sortdata='[progressbar][tt_progressbar color="#000" background_color="#ff9cac" value="80" show_percentage="yes" style="1"] Web Development [/tt_progressbar][/progressbar][progressbar][tt_progressbar color="#000" background_color="#ff9cac" value="50" show_percentage="yes" style="1"] Web Development [/tt_progressbar][/progressbar][progressbar][tt_progressbar color="#000" background_color="#ff9cac" value="20" show_percentage="no" style="1"] Web Development [/tt_progressbar][/progressbar]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/progressbar1.png" />
                            </p>
                             <p class="sc-defualt" sortdata='[progressbar][tt_progressbar color="#000" background_color="#ff9cac" value="80" show_percentage="yes" style="2"] Web Development [/tt_progressbar][/progressbar][progressbar][tt_progressbar color="#000" background_color="#ff9cac" value="50" show_percentage="yes" style="2"] Web Development [/tt_progressbar][/progressbar][progressbar][tt_progressbar color="#000" background_color="#ff9cac" value="20" show_percentage="no" style="2"] Web Development [/tt_progressbar][/progressbar]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/progressbar2.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[progressbar][tt_progressbar color="#000" background_color="#ff9cac" value="80" show_percentage="yes" style="3"] Web Development [/tt_progressbar][/progressbar][progressbar][tt_progressbar color="#000" background_color="#ff9cac" value="50" show_percentage="yes" style="3"] Web Development [/tt_progressbar][/progressbar][progressbar][tt_progressbar color="#000" background_color="#ff9cac" value="20" show_percentage="no" style="3"] Web Development [/tt_progressbar][/progressbar]'> 
                                
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/progressbar3.png" />
                            </p>
                            <h3><?php esc_html_e('Pie chart','megashop'); ?></h3>
                            <p class="sc-defualt" sortdata='[tt_piechart background_color="#2c2c2c" percentage="50" title="Praesent magna" style="1"]Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. Nam tempor diam elit fermen atum in pharetra orci mollis.[/tt_piechart]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/piechart1.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[tt_piechart background_color="#2c2c2c" percentage="50" title="Praesent magna" style="2"]Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. Nam tempor diam elit fermen atum in pharetra orci mollis.[/tt_piechart]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/piechart2.png" />
                            </p>
                            </div>
                        </div>
                        <div class="accordion-section">
                            <a class="accordion-section-title" href="#accordion-8"><?php esc_html_e('Counter','megashop'); ?></a>
                            <div id="accordion-8" class="accordion-section-content">  
                            <p class="sc-defualt" sortdata="[one_third][tt_counter image='' type='horizontal' id='project' image='' icon='fa-user' icon_color='#000' title_color='#000' color='#000' start='1000' end='1500' decimal='0' duration='10' title='projects' separator=','][/tt_counter][/one_third][one_third][tt_counter type='horizontal' image='' id='websites' icon='fa-user' icon_color='#000' title_color='#000' color='#000' start='1000' end='1500' decimal='0' duration='10' title='Websites' separator=','][/tt_counter][/one_third][one_third][tt_counter type='horizontal' id='hosting' image='' icon='fa-user' icon_color='#000' title_color='#000' color='#000' start='1000' end='2000' decimal='0' duration='10' title='hosting' separator=','][/tt_counter][/one_third]"> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/counter1.png" />
                            </p>
                            <p class="sc-defualt" sortdata="[one_third][tt_counter image='' type='vertical' id='project_2' icon='fa-user' icon_color='#000' title_color='#000' color='#000' start='1000' end='1500' decimal='0' duration='10' title='projects' separator=','][/tt_counter][/one_third][one_third][tt_counter type='vertical' image='' id='websites_2' icon='fa-user' icon_color='#000' title_color='#000' color='#000' start='1000' end='1500' decimal='0' duration='10' title='Websites' separator=','][/tt_counter][/one_third][one_third][tt_counter type='vertical' image='' id='hosting_2' icon='fa-user' icon_color='#000' title_color='#000' color='#000' start='1000' end='2000' decimal='0' duration='10' title='hosting' separator=','][/tt_counter][/one_third]"> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/counter2.png" />
                            </p>
                        </div>
                        </div>
                        <div class="accordion-section">
                            <a class="accordion-section-title" href="#accordion-9"><?php esc_html_e('Pricing Table','megashop'); ?></a>
                            <div id="accordion-9" class="accordion-section-content"> 
                            <p class="sc-defualt" sortdata='[tt_pricingtable style="1" image="" currency="$" subtitle="Vitae adipiscing turpis. Aenean ligula nibh, molestie id vivide." heading="lorem ipsum" button_text="buy now" button_link=" " price="500" price_per="month" selected="no"][price_row symbol="fa-home"] Duis faucibus enim vitae [/price_row][price_row symbol="fa-home"]Duis faucibus enim vitae [/price_row][price_row symbol="fa-home"]Duis faucibus enim vitae[/price_row][/tt_pricingtable]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/pricingtable1.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[tt_pricingtable style="2" image="" currency="$" subtitle="Vitae adipiscing turpis. Aenean ligula nibh, molestie id vivide." heading="lorem ipsum" button_text="buy now" button_link=" " price="500" price_per="month" selected="no"][price_row symbol="fa-home"] Duis faucibus enim vitae [/price_row][price_row symbol="fa-home"]Duis faucibus enim vitae [/price_row][price_row symbol="fa-home"]Duis faucibus enim vitae[/price_row][/tt_pricingtable]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/pricingtable2.png" />
                            </p>
                        </div>
                        </div>
                         <div class="accordion-section">
                            <a class="accordion-section-title" href="#accordion-10"><?php esc_html_e('Services','megashop'); ?></a>
                            <div id="accordion-10" class="accordion-section-content"> 
                            <p class="sc-defualt" sortdata='[tt_service style="1" icon="fa-html5" icon_background_color="#1f2022" color="#FFFFFF" title="HTML5 + CSS3"]Meta komentofrazo ci cis, negativa antaumetado la oni, havi frida aga ac.[/tt_service]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/service1.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[tt_service style="2" icon="fa-html5" icon_background_color="#1f2022" color="#FFFFFF" title="HTML5 + CSS3"]Meta komentofrazo ci cis, negativa antaumetado la oni, havi frida aga ac.[/tt_service]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/service2.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[tt_service style="3" icon="fa-html5" icon_background_color="#1f2022" color="#FFFFFF" title="HTML5 + CSS3"]Meta komentofrazo ci cis, negativa antaumetado la oni, havi frida aga ac.[/tt_service]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/service3.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[tt_service style="4" icon="fa-html5" icon_background_color="#1f2022" color="#FFFFFF" title="HTML5 + CSS3"]Meta komentofrazo ci cis, negativa antaumetado la oni, havi frida aga ac.[/tt_service]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/service4.png" />
                            </p>
                            </div>
                        </div>
                        <div class="accordion-section">
                            <a class="accordion-section-title" href="#accordion-11"><?php esc_html_e('Tabs','megashop'); ?></a>
                            <div id="accordion-11" class="accordion-section-content"> 
                            <p class="sc-defualt" sortdata='[one_half][tt_tabs tab_type="vertical" style="1" ][tt_tab title="Tab1"] Lorem ipsum Morbi euismod diam eu arcu volutpat ut adipiscing sem auctor. Vivamus adipiscing lobortis sagittis. [/tt_tab][tt_tab title="Tab2"] Vivamus adipiscing lobortis sagittis. Nullam tempus mauris dolor, ac malesuada arcu. [/tt_tab][tt_tab title="Tab3"] Vivamus adipiscing lobortis sagittis. Nullam tempus mauris dolor, ac malesuada arcu. [/tt_tab][/tt_tabs][/one_half][one_half]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/tabs1.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[one_half][one_half][tt_tabs tab_type="horizontal" style="1" ][tt_tab title="Tab1"] Lorem ipsum Morbi euismod diam eu arcu volutpat ut adipiscing sem auctor. Vivamus adipiscing lobortis sagittis. [/tt_tab][tt_tab title="Tab2"] Vivamus adipiscing lobortis sagittis. Nullam tempus mauris dolor, ac malesuada arcu. [/tt_tab][tt_tab title="Tab3"] Vivamus adipiscing lobortis sagittis. Nullam tempus mauris dolor, ac malesuada arcu. [/tt_tab][/tt_tabs][/one_half]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/tabs2.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[one_half][tt_tabs tab_type="vertical" style="2" ][tt_tab title="Tab1"] Lorem ipsum Morbi euismod diam eu arcu volutpat ut adipiscing sem auctor. Vivamus adipiscing lobortis sagittis. [/tt_tab][tt_tab title="Tab2"] Vivamus adipiscing lobortis sagittis. Nullam tempus mauris dolor, ac malesuada arcu. [/tt_tab][tt_tab title="Tab3"] Vivamus adipiscing lobortis sagittis. Nullam tempus mauris dolor, ac malesuada arcu. [/tt_tab][/tt_tabs][/one_half]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/tabs3.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[one_half][tt_tabs tab_type="horizontal" style="2" ][tt_tab title="Tab1"] Lorem ipsum Morbi euismod diam eu arcu volutpat ut adipiscing sem auctor. Vivamus adipiscing lobortis sagittis. [/tt_tab][tt_tab title="Tab2"] Vivamus adipiscing lobortis sagittis. Nullam tempus mauris dolor, ac malesuada arcu. [/tt_tab][tt_tab title="Tab3"] Vivamus adipiscing lobortis sagittis. Nullam tempus mauris dolor, ac malesuada arcu. [/tt_tab][/tt_tabs][/one_half]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/tabs4.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[one_half][tt_tabs tab_type="vertical" style="3" ][tt_tab title="Tab1"] Lorem ipsum Morbi euismod diam eu arcu volutpat ut adipiscing sem auctor. Vivamus adipiscing lobortis sagittis. [/tt_tab][tt_tab title="Tab2"] Vivamus adipiscing lobortis sagittis. Nullam tempus mauris dolor, ac malesuada arcu. [/tt_tab][tt_tab title="Tab3"] Vivamus adipiscing lobortis sagittis. Nullam tempus mauris dolor, ac malesuada arcu. [/tt_tab][/tt_tabs][/one_half]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/tabs5.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[one_half][tt_tabs tab_type="horizontal" style="3" ][tt_tab title="Tab1"] Lorem ipsum Morbi euismod diam eu arcu volutpat ut adipiscing sem auctor. Vivamus adipiscing lobortis sagittis. [/tt_tab][tt_tab title="Tab2"] Vivamus adipiscing lobortis sagittis. Nullam tempus mauris dolor, ac malesuada arcu. [/tt_tab][tt_tab title="Tab3"] Vivamus adipiscing lobortis sagittis. Nullam tempus mauris dolor, ac malesuada arcu. [/tt_tab][/tt_tabs][/one_half]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/tabs6.png" />
                            </p>
                            </div>
                        </div>                        
                        <div class="accordion-section">
                            <a class="accordion-section-title" href="#accordion-12"><?php esc_html_e('Share & Follow Icon','megashop'); ?></a>
                            <div id="accordion-12" class="accordion-section-content">
                            <p class="sc-defualt" sortdata='[tt_shareicon size="small" shape="circle"]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/Social-Share-01.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[tt_shareicon size="small" shape="square"]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/Social-Share-02.png" />
                            </p>
                            <p class="sc-defualt" sortdata="[tt_followicon size='small' shape='circle' facebook='https://www.facebook.com/' twitter='https://twitter.com/' pinterest='https://in.pinterest.com/' googleplus='https://plus.google.com/' rss='https://www.rss.com/' instagram='https://instagram.com/' linkedin='https://in.linkedin.com/' youtube='https://www.youtube.com/' flickr='https://www.flickr.com/']"> 
                               <img src="<?php echo get_template_directory_uri(); ?>/admin/images/Social-follow-1.png" /> 
                            </p>
                             <p class="sc-defualt" sortdata="[tt_followicon size='small' shape='square' facebook='https://www.facebook.com/' twitter='https://twitter.com/' pinterest='https://in.pinterest.com/' googleplus='https://plus.google.com/' rss='https://www.rss.com/' instagram='https://instagram.com/' linkedin='https://in.linkedin.com/' youtube='https://www.youtube.com/' flickr='https://www.flickr.com/']"> 
                               <img src="<?php echo get_template_directory_uri(); ?>/admin/images/Social-follow-2.png" /> 
                            </p>
                            </div>
                        </div>
                        <div class="accordion-section">
                            <a class="accordion-section-title" href="#accordion-13"><?php esc_html_e('Buttons','megashop'); ?></a>
                            <div id="accordion-13" class="accordion-section-content">
                            <p class="sc-defualt" sortdata='[tt_button link="#" size="mini" type="basic" icon="fa-home" icon_align="left"] Button Example [/tt_button][tt_button link="#" size="small" type="basic" icon="fa-home" icon_align="left"] Button Example [/tt_button][tt_button link="#" size="medium" type="basic" icon="fa-home" icon_align="left"] Button Example [/tt_button][tt_button link="#" size="large" type="basic" icon="fa-home" icon_align="left"] Button Example [/tt_button]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/basicbtn.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[tt_button link="#" size="mini" type="primary" icon="fa-home" icon_align="left"] Button Example [/tt_button][tt_button link="#" size="small" type="primary" icon="fa-home" icon_align="left"] Button Example [/tt_button][tt_button link="#" size="medium" type="primary" icon="fa-home" icon_align="left"] Button Example [/tt_button][tt_button link="#" size="large" type="primary" icon="fa-home" icon_align="left"] Button Example [/tt_button]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/primarybtn.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[tt_button link="#" size="mini" type="info" icon="fa-home" icon_align="left"] Button Example [/tt_button][tt_button link="#" size="small" type="info" icon="fa-home" icon_align="left"] Button Example [/tt_button][tt_button link="#" size="medium" type="info" icon="fa-home" icon_align="left"] Button Example [/tt_button][tt_button link="#" size="large" type="info" icon="fa-home" icon_align="left"] Button Example [/tt_button]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/infobtn.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[tt_button link="#" size="mini" type="success" icon="fa-home" icon_align="left"] Button Example [/tt_button][tt_button link="#" size="small" type="success" icon="fa-home" icon_align="left"] Button Example [/tt_button][tt_button link="#" size="medium" type="success" icon="fa-home" icon_align="left"] Button Example [/tt_button][tt_button link="#" size="large" type="success" icon="fa-home" icon_align="left"] Button Example [/tt_button]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/successbtn.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[tt_button link="#" size="mini" type="warning" icon="fa-home" icon_align="left"] Button Example [/tt_button][tt_button link="#" size="small" type="warning" icon="fa-home" icon_align="left"] Button Example [/tt_button][tt_button link="#" size="medium" type="warning" icon="fa-home" icon_align="left"] Button Example [/tt_button][tt_button link="#" size="large" type="warning" icon="fa-home" icon_align="left"] Button Example [/tt_button]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/warningbtn.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[tt_button link="#" size="mini" type="danger" icon="fa-home" icon_align="left"] Button Example [/tt_button][tt_button link="#" size="small" type="danger" icon="fa-home" icon_align="left"] Button Example [/tt_button][tt_button link="#" size="medium" type="danger" icon="fa-home" icon_align="left"] Button Example [/tt_button][tt_button link="#" size="large" type="danger" icon="fa-home" icon_align="left"] Button Example [/tt_button]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/dangerbtn.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[tt_button link="#" size="mini" type="inverse" icon="fa-home" icon_align="left"] Button Example [/tt_button][tt_button link="#" size="small" type="inverse" icon="fa-home" icon_align="left"] Button Example [/tt_button][tt_button link="#" size="medium" type="inverse" icon="fa-home" icon_align="left"] Button Example [/tt_button][tt_button link="#" size="large" type="inverse" icon="fa-home" icon_align="left"] Button Example [/tt_button]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/inversebtn.png" />
                            </p>
                        </div>
                        </div>
                        <div class="accordion-section">
                            <a class="accordion-section-title" href="#accordion-14"><?php esc_html_e('Product Tab & Product Type','megashop'); ?></a>
                            <div id="accordion-14" class="accordion-section-content">
                            <p class="sc-defualt" sortdata='[tt_product_tab title="" no_of_product="5" product_tabs_title="all,featured,top rated,sale products,recent products,best selling" product_tabs="all,featured_products,top_rated_products,sale_products,recent_products,best_selling_products" products_columns="4" auto_slide="true" slide_speed="1000"]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/Products-tabs.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[tt_product_type title="Featured Products" no_of_product="5" product_type="featured_products" products_columns="4" auto_slide="true" slide_speed="1000"]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/Products-featured.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[tt_product_type title="Recent Products" no_of_product="5" product_type="recent_products" products_columns="4" auto_slide="true" slide_speed="1000"]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/Products-recent.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[tt_product_type title="top Rated Products" no_of_product="5" product_type="top_rated_products" products_columns="4" auto_slide="true" slide_speed="1000"]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/Products-bestseller.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[tt_product_type title="Sale Products" no_of_product="5" product_type="sale_products" products_columns="4" auto_slide="true" slide_speed="1000"]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/Products-sale.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[tt_product_type title="Best Selling Products" no_of_product="5" product_type="best_selling_products" products_columns="4" auto_slide="true" slide_speed="1000"]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/Products-top-rated.png" />
                            </p>
                            </div>
                        </div>
                        <div class="accordion-section">
                            <a class="accordion-section-title" href="#accordion-15"><?php esc_html_e('Testimonial & Our Brand','megashop'); ?></a>
                            <div id="accordion-15" class="accordion-section-content">
                            <p class="sc-defualt" sortdata='[tt_testimonial title="Testimonials" no_of_testimonial="10" testimonial_columns="1" show_thumbnail="true" show_thumbnail="true"]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/Testimonials.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[tt_ourbrand title="Manufacturers" no_of_ourbrand="10" ourbrand_columns="5" show_newtab="true"]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/Brand-Logo.png" />
                            </p>
                            </div>
                        </div>
                        <div class="accordion-section">
                            <a class="accordion-section-title" href="#accordion-16"><?php esc_html_e('Banner Layout','megashop'); ?></a>
                            <div id="accordion-16" class="accordion-section-content">
                            <p class="sc-defualt" sortdata='[tt_banner layout="layout1" background_color="#fff" hover_style="style1" img_src_1="<?php echo get_template_directory_uri(); ?>/images/banner/banner-01.jpg" img_link_1="#" img_src_2="<?php echo get_template_directory_uri(); ?>/images/banner/banner-02.jpg" img_link_2="#" img_src_3="<?php echo get_template_directory_uri(); ?>/images/banner/banner-03.jpg" img_link_3="#"]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/Banners-1.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[tt_banner layout="layout2" background_color="#fff" hover_style="style1" img_src_1="<?php echo get_template_directory_uri(); ?>/images/banner/subbanner-1.jpg" img_link_1="#" img_src_2="<?php echo get_template_directory_uri(); ?>/images/banner/subbanner-2.jpg" img_link_2="#" img_src_3="<?php echo get_template_directory_uri(); ?>/images/banner/subbanner-3.jpg" img_link_3="#" img_src_4="<?php echo get_template_directory_uri(); ?>/images/banner/subbanner-4.jpg" img_link_4="#"]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/Banners-2.png" />
                            </p>
                            <p class="sc-defualt" sortdata='[tt_banner layout="layout3" background_color="#fff" hover_style="style1" img_src_1="<?php echo get_template_directory_uri(); ?>/images/banner/lay3_banner-01.jpg" img_link_1="#" img_src_2="<?php echo get_template_directory_uri(); ?>/images/banner/lay3_banner-02.jpg" img_link_2="#" img_src_3="<?php echo get_template_directory_uri(); ?>/images/banner/lay3_banner-03.jpg" img_link_3="#"]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/Banners-3.png" />
                            </p>
                            </div>
                        </div>
                         <div class="accordion-section">
                            <a class="accordion-section-title" href="#accordion-17"><?php esc_html_e('Latest Blog','megashop'); ?></a>
                            <div id="accordion-17" class="accordion-section-content">
                            <p class="sc-defualt" sortdata='[tt_latestblog title="Latest News" no_of_post="10"  no_of_column="3" showdate="true"]'> 
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/images/Blogs.png" />
                            </p>
                            </div>
                        </div>
                        <?php
                        ?>
                    </div>
                </div>
                <?php
            }
        
        }