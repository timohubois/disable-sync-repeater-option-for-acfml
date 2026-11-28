# Disable Sync Repeater Option for ACFML (WPML/ACF)

This plugin turns off ACFML's optional repeater synchronization for sites where translations need different repeater rows or flexible content layouts. It enforces the disabled choice across classic form saves, block-editor REST requests, taxonomy terms and ACF options pages, and removes the related editor controls.

## Requirements

- WordPress 6.0 or later.
- PHP 8.0 or later.
- ACFML 2.0.0 or later, with a compatible version of WPML.
- ACF with support for the field types you use. Repeater and flexible content fields require ACF PRO.

Follow [WPML's ACFML setup guidance](https://wpml.org/documentation/translating-your-contents/acf/) for compatible dependency versions. These plugins and their licenses are not included.

## Installation

1. Install and configure WPML, ACFML and ACF.
2. Back up the site and check the workflow on staging, especially if translations already have synchronized layouts.
3. Clone this repository into `wp-content/plugins/disable-sync-repeater-option-for-acfml/`.
4. Activate **Disable Sync Repeater Option for ACFML** under **Plugins**.
5. Save and reopen a test translation to confirm that its intended layout is retained.

There is no settings screen. Composer is not required to run the plugin.

## Development

Install the development dependencies and run the checks:

```bash
composer install
composer php:lint
```

## Behavior and limitations

While active, the plugin:

- Sets `ACFML_REPEATER_SYNC_DEFAULT` to `false` unless it was already defined.
- Makes ACFML's `acfml_synchronise_repeater_fields` option read as disabled and prevents enabled choices from being stored.
- Discards ACFML's legacy repeater-sync form fields before `acf/save_post` handlers run.
- Removes or hides the related controls in classic editors, the block editor, taxonomy screens and ACF options pages.
- Deletes previously saved repeater-sync choices when the plugin is activated.

The plugin targets ACFML's optional repeater-sync choice. ACFML field-group modes, field translation preferences, WPML translation editors and other integrations still control their own synchronization behavior. Existing posts and ACF field values are not edited directly; earlier synchronization is not undone.

To let ACFML control the option again, deactivate this plugin and review the desired ACFML settings. Choices deleted on activation are not restored automatically.

## License

GPL-3.0-or-later. See [LICENSE](LICENSE).
