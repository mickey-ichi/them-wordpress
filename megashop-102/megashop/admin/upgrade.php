<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Updates Options Framework Data
 *
 * @package     Options Framework
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.5
 */
function optionsframework_upgrade_routine() {
    optionsframework_update_version();
}


/**
 * Updates Options Framework version in the database
 *
 * @access      public
 * @since       1.5
 * @return      void
 */
function optionsframework_update_version() {
    $optionsframework_settings = get_option('options-framework-theme');
    $optionsframework_settings['version'] = '1.5';
    update_option('options-framework-theme', $optionsframework_settings);
}
