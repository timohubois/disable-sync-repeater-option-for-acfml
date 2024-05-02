<?php

/**
 * Plugin Name:       Disable Sync Repeater Option for ACFML
 * Plugin URI:        https://github.com/timohubois/disable-sync-repeater-option-for-acfml/
 * Description:       Disables the sync repeater option of ACFML.
 * Version:           1.0
 * Requires at least: 5.0
 * Requires PHP:      8.0
 * Author:            Timo Hubois
 * Author URI:        https://pixelsaft.wtf
 * Text Domain:       disable-sync-repeater-option-for-acfml
 * Domain Path:       /languages
 * License:           GPLv3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 */

defined('ABSPATH') || exit;

/*
* Define the default value for the repeater sync checkbox.
*
* @see https://wpml.org/documentation/support/wpml-coding-api/wpml-constants/#acfml_repeater_sync_default
*/
if (!defined('ACFML_REPEATER_SYNC_DEFAULT')) {
    define('ACFML_REPEATER_SYNC_DEFAULT', false);
}

/*
* Remove the meta box that displays the repeater sync checkbox in the post edit screen.
*/
add_action('add_meta_boxes', function (): void {
    if (!class_exists('ACFML\Repeater\Sync\CheckboxUI') || !defined('ACFML\Repeater\Sync\CheckboxUI::META_BOX_ID')) {
        return;
    }

    global $pagenow;
    $metaBoxId = \ACFML\Repeater\Sync\CheckboxUI::META_BOX_ID;
    $isOnPostEdit = isset($pagenow) && 'post.php' === $pagenow;
    $screen = get_current_screen();
    $postType = $screen->post_type ?? null;

    if (!$isOnPostEdit || $postType === null) {
        return;
    }

    remove_meta_box($metaBoxId, $postType, 'normal');
}, 11);

/*
* Delete the option that stores the sync status.
*/
add_action('plugins_loaded', function (): void {
    if (!is_admin() || !class_exists('ACFML\Repeater\Sync\CheckboxOption') || !defined('ACFML\Repeater\Sync\CheckboxOption::SYNCHRONISE_WP_OPTION_NAME')) {
        return;
    }

    $optionName = \ACFML\Repeater\Sync\CheckboxOption::SYNCHRONISE_WP_OPTION_NAME;

    if (get_option($optionName) === false) {
        return;
    }

    delete_option($optionName);
});
