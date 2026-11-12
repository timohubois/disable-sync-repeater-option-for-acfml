# Disable Sync Repeater Option for ACFML (WPML/ACF)

Disable Sync Repeater Option for ACFML (WPML/ACF) turns off ACFML's repeater sync option for multilingual sites where layouts need to vary by language. It sets the default to false, removes the checkbox from existing-post edit screens and clears the saved sync preference during admin requests.

## Requirements

- WordPress 6.0 or later.
- PHP 8.0 or later.
- WPML, its ACFML add-on, and ACF with support for the field types you use. Repeater and flexible content fields require ACF PRO.

Follow [ACFML's setup and dependency guidance](https://wpml.org/documentation/related-projects/translate-sites-built-with-acf/) for compatible versions. These plugins and their licenses are not included.

## Installation

1. Install and configure WPML, ACFML and ACF.
2. Back up the site and check the workflow on staging, especially if translations already have synchronized layouts.
3. Clone this repository into `wp-content/plugins/disable-sync-repeater-option-for-acfml/`.
4. Activate **Disable Sync Repeater Option for ACFML (WPML/ACF)** under **Plugins**.
5. Open an existing post with the relevant fields and check that ACFML's repeater sync meta box is absent. Save and reopen a test translation to confirm that its intended layout is retained.

There is no additional settings screen. Composer is not required to run the plugin.

## Behavior and limitations

- `ACFML_REPEATER_SYNC_DEFAULT` is set to `false` only if it has not already been defined.
- Meta box removal targets existing-post edit screens (`post.php`), not the new-post screen.
- The saved sync preference is cleared site-wide during admin requests when the expected ACFML classes are available.
- Field translation preferences, WPML translation editors and other integrations still control their own synchronization behavior.
- Existing posts and ACF field values are not edited directly. Earlier synchronization is not undone, and previously changed layouts are not restored.

The integration relies on ACFML's internal classes and constants. Verify compatibility with your installed versions and load order on staging. Without the expected classes, meta box removal and preference cleanup are skipped.

To re-enable ACFML's control, deactivate the plugin and review the desired setting in ACFML. The deleted preference is not restored automatically.

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
