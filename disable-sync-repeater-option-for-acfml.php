<?php

/**
 * Plugin Name:       Disable Sync Repeater Option for ACFML
 * Plugin URI:        https://github.com/timohubois/disable-sync-repeater-option-for-acfml/
 * Description:       Disables the sync repeater option of ACFML.
 * Version:           1.0.1
 * Requires at least: 6.0
 * Requires PHP:      8.0
 * Author:            Timo Hubois
 * Author URI:        https://pixelsaft.wtf
 * Text Domain:       disable-sync-repeater-option-for-acfml
 * Domain Path:       /languages
 * License:           GPLv3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 */

defined('ABSPATH') || exit;

const DSRO_ACFML_OPTION_NAME = 'acfml_synchronise_repeater_fields';
const DSRO_ACFML_CHECKBOX_NAME = 'wpml_synchronise_acf_fields_translations';
const DSRO_ACFML_NONCE_NAME = 'wpml_synchronise_acf_fields_translations_nonce';
const DSRO_ACFML_META_BOX_ID = 'acfml-field-group-synchronise';
const DSRO_ACFML_PANEL_HANDLE = 'acfml-repeater-sync-panel';
const DSRO_ACFML_STYLE_HANDLE = 'disable-sync-repeater-option-for-acfml';

/**
 * Define ACFML's documented default for new repeater-sync choices.
 *
 * @see https://wpml.org/documentation/support/wpml-coding-api/wpml-constants/#acfml_repeater_sync_default
 */
if (!defined('ACFML_REPEATER_SYNC_DEFAULT')) {
    define('ACFML_REPEATER_SYNC_DEFAULT', false);
}

/**
 * Return ACFML's disabled repeater-sync option value.
 *
 * @param mixed $value The value supplied by WordPress or another filter.
 *
 * @return array<mixed>
 */
function dsroAcfmlDisableSyncOption(mixed $value = null): array
{
    return [];
}

add_filter('pre_option_' . DSRO_ACFML_OPTION_NAME, 'dsroAcfmlDisableSyncOption', 0);
add_filter('pre_update_option_' . DSRO_ACFML_OPTION_NAME, 'dsroAcfmlDisableSyncOption', 0);

/**
 * Return the enforced value from ACFML's repeater-sync REST endpoint.
 *
 * @param mixed           $response REST response.
 * @param mixed           $handler  Matched route handler.
 * @param WP_REST_Request $request  Current REST request.
 *
 * @return mixed
 */
function dsroAcfmlEnforceRestResponse(
    mixed $response,
    mixed $handler,
    WP_REST_Request $request
): mixed {
    if (
        '/acfml/v1/repeater-sync' !== $request->get_route()
        || 'POST' !== $request->get_method()
        || is_wp_error($response)
    ) {
        return $response;
    }

    $response = rest_ensure_response($response);
    $data = $response->get_data();

    if (is_array($data)) {
        $data['enabled'] = false;
        $response->set_data($data);
    }

    return $response;
}

add_filter('rest_request_after_callbacks', 'dsroAcfmlEnforceRestResponse', PHP_INT_MAX, 3);

/**
 * Delete choices saved before the plugin was activated.
 */
function dsroAcfmlActivate(): void
{
    delete_option(DSRO_ACFML_OPTION_NAME);
}

register_activation_hook(__FILE__, 'dsroAcfmlActivate');

/**
 * Discard legacy form controls before ACFML evaluates them.
 */
function dsroAcfmlDiscardSyncRequest(): void
{
    // phpcs:disable WordPress.Security.NonceVerification.Missing -- Values are discarded, not processed.
    unset(
        $_POST[DSRO_ACFML_CHECKBOX_NAME],
        $_POST[DSRO_ACFML_NONCE_NAME]
    );
    // phpcs:enable WordPress.Security.NonceVerification.Missing
}

add_action('acf/save_post', 'dsroAcfmlDiscardSyncRequest', 0);

/**
 * Remove ACFML's classic-editor meta box.
 */
function dsroAcfmlRemovePostMetaBox(): void
{
    $screen = get_current_screen();
    $postType = $screen->post_type ?? null;

    if (!is_string($postType) || $postType === '') {
        return;
    }

    remove_meta_box(DSRO_ACFML_META_BOX_ID, $postType, 'normal');
}

add_action('add_meta_boxes', 'dsroAcfmlRemovePostMetaBox', 11);

/**
 * Remove ACFML's ACF options-page meta box after ACFML adds it.
 */
function dsroAcfmlRemoveOptionsMetaBox(): void
{
    remove_meta_box(DSRO_ACFML_META_BOX_ID, 'acf_options_page', 'normal');
}

add_action('acf/input/admin_head', 'dsroAcfmlRemoveOptionsMetaBox', 10);

/**
 * Hide remaining ACFML controls, including taxonomy and block-editor UI.
 */
function dsroAcfmlEnqueueAdminStyles(): void
{
    wp_register_style(DSRO_ACFML_STYLE_HANDLE, false, [], null);
    wp_enqueue_style(DSRO_ACFML_STYLE_HANDLE);
    wp_add_inline_style(
        DSRO_ACFML_STYLE_HANDLE,
        '#acfml-field-group-synchronise,'
        . '.acfml-synchronise-repeater-checkbox,'
        . '.acfml-repeater-sync-panel{display:none!important;}'
    );
}

add_action('admin_enqueue_scripts', 'dsroAcfmlEnqueueAdminStyles', 100);

/**
 * Prevent ACFML's block-editor panel from registering.
 */
function dsroAcfmlDequeueBlockEditorPanel(): void
{
    wp_dequeue_script(DSRO_ACFML_PANEL_HANDLE);
}

add_action('enqueue_block_editor_assets', 'dsroAcfmlDequeueBlockEditorPanel', PHP_INT_MAX);
