# Disable Sync Repeater Option for ACFML (WPML/ACF)

Disable Sync Repeater Option for ACFML (WPML/ACF) turns off ACFML's repeater sync option for multilingual sites where layouts need to vary by language. It keeps the optional choice off across supported editor and save paths and hides the related controls.

## Requirements

- WordPress 6.0 or later.
- PHP 8.0 or later.
- ACFML 2.0.0 or later, a compatible version of WPML, and ACF with support for the field types you use. Repeater and flexible content fields require ACF PRO.

Follow [ACFML's setup and dependency guidance](https://wpml.org/documentation/related-projects/translate-sites-built-with-acf/) for compatible versions. These plugins and their licenses are not included.

## Installation

1. Install and configure WPML, ACFML and ACF.
2. Back up the site and check the workflow on staging, especially if translations already have synchronized layouts.
3. Clone this repository into `wp-content/plugins/disable-sync-repeater-option-for-acfml/`.
4. Activate **Disable Sync Repeater Option for ACFML (WPML/ACF)** under **Plugins**.
5. Open an existing post with the relevant fields and check that ACFML's repeater sync meta box is absent. Save and reopen a test translation to confirm that its intended layout is retained.

There is no additional settings screen. Composer is not required to run the plugin.

## Behavior and limitations

- `ACFML_REPEATER_SYNC_DEFAULT` is set to `false` only if it has not already been defined. If it is defined as `true`, ACFML can still default to sync.
- The plugin hides the related editor controls and keeps the optional sync choice off during supported saves, including classic forms and block-editor REST requests.
- Activation clears previously saved sync preferences.
- ACFML field-group modes, field translation preferences, WPML translation editors and other integrations still control their own synchronization behavior.
- Existing posts and ACF field values are not edited directly. Earlier synchronization is not undone, and previously changed layouts are not restored.

Verify compatibility with your installed versions on staging.

To re-enable ACFML's control, deactivate the plugin and review the desired setting in ACFML. Deactivation does not restore preferences cleared on activation.

## Development

Use a staging or disposable WordPress installation with the required plugins active. Use PHP 8.4 for development and CI; the released plugin supports PHP 8.0. Composer development dependencies are not included in the release.

```sh
composer install
composer check-platform-reqs
composer validate --strict
composer php:lint
```

When changing the integration, verify both existing-post and new-post screens, save and reopen a translation, and check behavior after deactivation. Keep plugin code compatible with PHP 8.0.

## License

GPLv3 or later. See [LICENSE](LICENSE).
