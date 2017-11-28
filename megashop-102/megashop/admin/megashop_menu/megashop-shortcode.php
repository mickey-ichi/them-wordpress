<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_template_part('admin/megashop_menu/megashop', 'menu_header');
?>

<div class="feature-section three-col">
    <div class="col">
        <div class="shortcode_inner">
            <h3><?php esc_html_e('Accordions Shortcode ', 'megashop'); ?></h3>
            <p><code>[accordions style='1'][accordion title='Nam tempor diam elit']Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. Nam tempor diam elit. [/accordion][accordion title='Nam tempor diam elit']Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. Nam tempor diam elit. [/accordion][accordion title='Nam tempor diam elit' ]Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. [/accordion][/accordions]</code></p>
        </div>
    </div>
    <div class="col">
        <div class="shortcode_inner">
            <h3><?php esc_html_e('Toggles Shortcode ', 'megashop'); ?></h3>
            <p><code>[toggles style='1' ][toggle title='Nam tempor diam elit']Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. Nam tempor diam elit. [/toggle][toggle title='Nam tempor diam elit']Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. Nam tempor diam elit. [/toggle][toggle title='Nam tempor diam elit' ]Nunc molestie dolor nec magna fermen atum in pharetra orci mollis. [/toggle][/toggles]</code></p>
        </div>
    </div>
    <div class="col">
        <div class="shortcode_inner">
            <h3><?php esc_html_e('Button Shortcode ', 'megashop'); ?></h3>
            <p><code>[tt_button link="#" size="mini" type="basic" icon="fa-home" icon_align="left"] Button Example [/tt_button][tt_button link="#" size="small" type="basic" icon="fa-home" icon_align="left"] Button Example [/tt_button][tt_button link="#" size="medium" type="basic" icon="fa-home" icon_align="left"] Button Example [/tt_button][tt_button link="#" size="large" type="basic" icon="fa-home" icon_align="left"] Button Example [/tt_button]</code></p>
        </div>
    </div>
    <div class="col">
        <div class="shortcode_inner">
            <h3><?php esc_html_e('Product Tab Shortcode ', 'megashop'); ?></h3>
            <p><code>[tt_product_tab title="" no_of_product="5" product_tabs="all,featured_products,top_rated_products,sale_products,recent_products,best_selling_products" products_columns="4" auto_slide="true" slide_speed="1000"]</code></p>
        </div>
    </div>
    <div class="col">
        <div class="shortcode_inner">
            <h3><?php esc_html_e('Product Type Shortcode ', 'megashop'); ?></h3>
            <p><code>[tt_product_type title="Featured Products" no_of_product="5" product_type="featured_products" products_columns="4" auto_slide="true" slide_speed="1000"]</code></p>
        </div>
    </div>
    <div class="col">
        <div class="shortcode_inner">
            <h3><?php esc_html_e('Service Shortcode ', 'megashop'); ?></h3>
            <p><code>[tt_service style="1" icon="fa-html5" icon_background_color="1f2022" color="FFFFFF" title="HTML5 + CSS3"]Meta komentofrazo ci cis, negativa antaumetado la oni, havi frida aga ac.[/tt_service]</code></p>
        </div>
    </div>
    <div class="col">
        <div class="shortcode_inner">
            <h3><?php esc_html_e('Share Icon Shortcode ', 'megashop'); ?></h3>
            <p><code>[tt_shareicon size="small" shape="square"]</code></p>
        </div>
    </div>
    <div class="col">
        <div class="shortcode_inner">
            <h3><?php esc_html_e('Counter Shortcode ', 'megashop'); ?></h3>
            <p><code>[tt_counter id='project' start='1000' end='0' decimal='0' duration='10' title='projects' separator=','][/tt_counter]</code></p>
        </div>
    </div>
    <div class="col">
        <div class="shortcode_inner">
            <h3><?php esc_html_e('Message Box Shortcode ', 'megashop'); ?></h3>
            <p><code>[message_box type='success']<b>Success!</b> lorem Ipsum has been the industry's standard dummy txt[/message_box]</code></p>
        </div>
    </div>
    <div class="col">
        <div class="shortcode_inner">
            <h3><?php esc_html_e('Follow Icon Shortcode ', 'megashop'); ?></h3>
            <p><code>[tt_followicon size='small' shape='circle' facebook='https://www.facebook.com/' twitter='https://twitter.com/' pinterest='https://in.pinterest.com/' googleplus='https://plus.google.com/' rss='https://www.rss.com/' instagram='https://instagram.com/' linkedin='https://in.linkedin.com/' youtube='https://www.youtube.com/' flickr='https://www.flickr.com/']</code></p>
        </div>
    </div>    
    <div class="col">
        <div class="shortcode_inner">
            <h3><?php esc_html_e('Tab Shortcode ', 'megashop'); ?></h3>
            <p><code>[tt_tabs tab_type="vertical" style="1" ][tt_tab title="Tab1"] Lorem ipsum Morbi euismod diam eu arcu volutpat ut adipiscing sem auctor. Vivamus adipiscing lobortis sagittis. [/tt_tab][tt_tab title="Tab2"] Vivamus adipiscing lobortis sagittis. Nullam tempus mauris dolor, ac malesuada arcu. [/tt_tab][tt_tab title="Tab3"] Vivamus adipiscing lobortis sagittis. Nullam tempus mauris dolor, ac malesuada arcu. [/tt_tab][/tt_tabs]</code></p>
        </div>
    </div>    
    <div class="col">
        <div class="shortcode_inner">
            <h3><?php esc_html_e('Pricing table Shortcode ', 'megashop'); ?></h3>
            <p><code>[tt_pricingtable style="1" heading="lorem ipsum" button_text="buy now" button_link=" " price="500" price_per="month" selected="no"][price_row symbol="fa-home"] Duis faucibus enim vitae [/price_row][price_row symbol="fa-home"]Duis faucibus enim vitae [/price_row][price_row symbol="fa-home"]Duis faucibus enim vitae[/price_row][/tt_pricingtable]</code></p>
        </div>
    </div>
    <div class="col">
        <div class="shortcode_inner">
            <h3><?php esc_html_e('Progress bar Shortcode ', 'megashop'); ?></h3>
            <p><code>[progressbar][tt_progressbar color="000" background_color="ff9cac" value="80" show_percentage="yes" style="1"] Web Development [/tt_progressbar][/progressbar]</code></p>
        </div>
    </div>    
    <div class="col">
        <div class="shortcode_inner">
            <h3><?php esc_html_e('List Shortcode ', 'megashop'); ?></h3>
            <p><code>[tt_list][list_item list_icon="fa-square"]Duis sollicitudin adipiscing[/list_item][list_item list_icon="fa-square"]Duis sollicitudin adipiscing[/list_item][/tt_list]</code></p>
        </div>
    </div>
    <div class="col">
        <div class="shortcode_inner">
            <h3><?php esc_html_e('Divider Shortcode ', 'megashop'); ?></h3>
            <p><code>[tt_divider type="dotted" space="30"]Zril quidam debitis nec eu, te eam ludus diceret voluptua, ea vix odio inani habemus Eam te dicit regione.[/tt_divider]</code></p>
        </div>
    </div>
    <div class="col">
        <div class="shortcode_inner">
            <h3><?php esc_html_e('Blockqoute Shortcode ', 'megashop'); ?></h3>
            <p><code>[tt_blockquote style="1"] Zril quidam debitis nec eu, te eam ludus diceret voluptua, ea vix odio inani habemus. Eam te dicit regione.  [/tt_blockquote]</code></p>
        </div>
    </div>
    <div class="col">
        <div class="shortcode_inner">
            <h3><?php esc_html_e('Map Shortcode ', 'megashop'); ?></h3>
            <p><code>[map address='india' type='ROADMAP' zoom='10' map_icon='' width='500px' height='200px']</code></p>
        </div>
    </div>
    
</div>

<div class="changelog">
    <div class="return-to-dashboard">
        <a href="<?php echo esc_url(self_admin_url('themes.php')); ?>"><?php is_blog_admin() ? esc_html_e('Back to Themes', 'megashop') : esc_html_e('Back to Themes', 'megashop'); ?></a>
    </div>
</div>
</div>