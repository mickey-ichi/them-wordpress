<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage megashop
 * @version    2.6.1
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once TT_FRAMEWORK_TGMPA_DIRECTORY . 'class-tgm-plugin-activation.php';
add_action('tgmpa_register', 'megashop_register_required_plugins');

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function megashop_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        array(
			'name'               => 'TTeximport', // The plugin name.
			'slug'               => 'TTeximport', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/inc/plugins/TTeximport.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		), 
        array(
			'name'               => 'TTCustomShortcode', // The plugin name.
			'slug'               => 'TTCustomShortcode', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/inc/plugins/TTCustomShortcode.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
         array(
			'name'               => 'TTCustomPostType', // The plugin name.
			'slug'               => 'TTCustomPostType', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/inc/plugins/TTCustomPostType.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
         array(
			'name'               => 'TTAutoInstall', // The plugin name.
			'slug'               => 'TTAutoInstall', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/inc/plugins/TTAutoInstall.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
        array(
            'name' => esc_html__('contact-form-7', 'megashop'),
            'slug' => 'contact-form-7',
            'required' => false,
            'force_activation' => true,
            'force_deactivation' => true,
        ),
        array(
            'name'      => 'Newsletter',
            'slug'      => 'newsletter',
            'required' => false,
        ),
        array(
            'name' => esc_html__('MailPoet Newsletters', 'megashop'),
            'slug' => 'wysija-newsletters',
            'required' => false,
            'force_activation' => false,
            'force_deactivation' => true,
        ),
         array(
            'name' => esc_html__('Meta Slider', 'megashop'),
            'slug' => 'ml-slider',
            'required' => false,
        ),
        array(
            'name' => esc_html__('WooCommerce', 'megashop'),
            'slug' => 'woocommerce',
            'required' => false,
        ),
        array(
            'name' => esc_html__('YITH WooCommerce Compare', 'megashop'),
            'slug' => 'yith-woocommerce-compare',
            'required' => false,
        ),
        array(
            'name' => esc_html__('WooCommerce Accepted Payment Methods', 'megashop'),
            'slug' => 'woocommerce-accepted-payment-methods',
            'required' => false,
        ),        
        array(
            'name' => esc_html__('YITH WooCommerce Wishlist', 'megashop'),
            'slug' => 'yith-woocommerce-wishlist',
            'required' => false,
        ),array(
            'name' => esc_html__('YITH WooCommerce Quick View', 'megashop'),
            'slug' => 'yith-woocommerce-quick-view',
            'required' => false,
        ),        
        array(
            'name' => esc_html__('YITH WooCommerce Zoom Magnifier', 'megashop'),
            'slug' => 'yith-woocommerce-zoom-magnifier',
            'required' => false,
        ),
        array(
            'name' => esc_html__('Page Builder by SiteOrigin', 'megashop'),
            'slug' => 'siteorigin-panels',
            'required' => false,
        ),
        array(
            'name' => esc_html__('SiteOrigin Widgets Bundle', 'megashop'),
            'slug' => 'so-widgets-bundle',
            'required' => false,
        ),
        array(
            'name' => esc_html__('Max Mega Menu', 'megashop'),
            'slug' => 'megamenu',
            'required' => false,
        ),
        
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'id' => 'megashoptheme', // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '', // Default absolute path to bundled plugins.
        'menu' => 'megashoptheme-install-plugins', // Menu slug.
        'parent_slug' => 'themes.php', // Parent menu slug.
        'capability' => 'edit_theme_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices' => true, // Show admin notices or not.
        'dismissable' => true, // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false, // Automatically activate plugins after installation or not.
        'message' => '', // Message to output right before the plugins table.
        'strings' => array(
            'page_title' => esc_html__('Install Required Plugins', 'megashop'),
            'menu_title' => esc_html__('Install Plugins', 'megashop'),
            'installing' => esc_html__('Installing Plugin: %s', 'megashop'), // %s = plugin name.
            'oops' => esc_html__('Something went wrong with the plugin API.', 'megashop'),
            'notice_can_install_required' => _n_noop(
                    'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'megashop'
            ), // %1$s = plugin name(s).
            'notice_can_install_recommended' => _n_noop(
                    'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'megashop'
            ), // %1$s = plugin name(s).
            'notice_cannot_install' => _n_noop(
                    'Sorry, but you do not have the correct permissions to install the %1$s plugin.', 'Sorry, but you do not have the correct permissions to install the %1$s plugins.', 'megashop'
            ), // %1$s = plugin name(s).
            'notice_ask_to_update' => _n_noop(
                    'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'megashop'
            ), // %1$s = plugin name(s).
            'notice_ask_to_update_maybe' => _n_noop(
                    'There is an update available for: %1$s.', 'There are updates available for the following plugins: %1$s.', 'megashop'
            ), // %1$s = plugin name(s).
            'notice_cannot_update' => _n_noop(
                    'Sorry, but you do not have the correct permissions to update the %1$s plugin.', 'Sorry, but you do not have the correct permissions to update the %1$s plugins.', 'megashop'
            ), // %1$s = plugin name(s).
            'notice_can_activate_required' => _n_noop(
                    'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'megashop'
            ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop(
                    'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'megashop'
            ), // %1$s = plugin name(s).
            'notice_cannot_activate' => _n_noop(
                    'Sorry, but you do not have the correct permissions to activate the %1$s plugin.', 'Sorry, but you do not have the correct permissions to activate the %1$s plugins.', 'megashop'
            ), // %1$s = plugin name(s).
            'install_link' => _n_noop(
                    'Begin installing plugin', 'Begin installing plugins', 'megashop'
            ),
            'update_link' => _n_noop(
                    'Begin updating plugin', 'Begin updating plugins', 'megashop'
            ),
            'activate_link' => _n_noop(
                    'Begin activating plugin', 'Begin activating plugins', 'megashop'
            ),
            'return' => esc_html__('Return to Required Plugins Installer', 'megashop'),
            'plugin_activated' => esc_html__('Plugin activated successfully.', 'megashop'),
            'activated_successfully' => esc_html__('The following plugin was activated successfully:', 'megashop'),
            'plugin_already_active' => esc_html__('No action taken. Plugin %1$s was already active.', 'megashop'), // %1$s = plugin name(s).
            'plugin_needs_higher_version' => esc_html__('Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'megashop'), // %1$s = plugin name(s).
            'complete' => esc_html__('All plugins installed and activated successfully. %1$s', 'megashop'), // %s = dashboard link.
            'contact_admin' => esc_html__('Please contact the administrator of this site for help.', 'megashop'),
            'nag_type' => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        ),
    );

    tgmpa($plugins, $config);
}
