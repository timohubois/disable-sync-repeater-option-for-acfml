=== Disable Sync Repeater Option for ACFML (WPML/ACF) ===
Contributors: timohubois
Tags: acfml, wpml, acf
Requires at least: 6.0
Tested up to: 7.1
Stable tag: 1.0.1
Requires PHP: 8.0
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Turn off ACFML's repeater sync option for multilingual sites where layouts need to vary by language.

== Description ==

Use this plugin when translated pages need a different order of Repeater rows or different Flexible Content layouts from the default language.

[Advanced Custom Fields Multilingual (ACFML)](https://wpml.org/documentation/related-projects/translate-sites-built-with-acf/) connects WPML with Advanced Custom Fields. Its repeater sync option synchronizes the order of Repeater rows and Flexible Content layouts with the default language. This plugin sets that option to off by default and hides its checkbox on existing-post edit screens.

The change applies site-wide. It does not change field translation rules or WPML's translation-editor settings.

**Requirements**

* WordPress 6.0 or later and PHP 8.0 or later.
* WPML, its ACFML add-on, and ACF with support for the field types you use.
* ACF PRO for repeater and flexible content fields.

The required plugins and their licenses are not included.

== Installation ==

1. Install and configure WPML, ACFML and ACF. Follow [ACFML's setup and dependency guidance](https://wpml.org/documentation/related-projects/translate-sites-built-with-acf/) for your versions.
2. Under **Plugins > Add New**, search for **Disable Sync Repeater Option for ACFML (WPML/ACF)**, then install and activate it. Alternatively, upload the disable-sync-repeater-option-for-acfml folder to /wp-content/plugins/ and activate it under **Plugins**.

There is no settings page.

== Frequently Asked Questions ==

= Does this disable every kind of ACF field synchronization? =

No. It targets ACFML's repeater sync checkbox and saved preference. Field translation preferences, WPML translation editors and other integrations can still affect synchronization.

For field translation settings, see [WPML's guide to translating ACF repeater fields](https://wpml.org/documentation/translating-your-contents/acf/#repeater-and-flexible-content).

= Can I apply it to individual languages or field groups? =

No. While active, the plugin clears ACFML's saved site-wide sync preference during admin requests. There are no separate controls for individual users, posts, languages, field groups or post types.

= Will it change my existing translated content? =

No. The plugin does not edit posts or ACF field values, undo earlier synchronization or restore layouts that were already changed.

Before editing existing translations, back up the content. Save and reopen one translation on staging to check whether other WPML settings still synchronize its fields.

= Can I re-enable the repeater sync option? =

Deactivate this plugin to let ACFML control repeater synchronization again. The deleted sync preference is not restored automatically; choose and save the desired setting in ACFML.

= Why is the checkbox still visible or synchronization still happening? =

* Checkbox removal applies to existing-post edit screens (`post.php`), not the new-post screen.
* `ACFML_REPEATER_SYNC_DEFAULT` is set to false only if it has not already been defined, even if ACFML is inactive. An existing definition is left unchanged. See the [ACFML constant reference](https://wpml.org/documentation/support/wpml-coding-api/wpml-constants/#acfml_repeater_sync_default).
* Checkbox removal requires `ACFML\Repeater\Sync\CheckboxUI::META_BOX_ID`; clearing the saved preference requires `ACFML\Repeater\Sync\CheckboxOption::SYNCHRONISE_WP_OPTION_NAME`.

If the expected classes or constants are unavailable when the hooks run, that action is skipped. Check that ACFML is active and loaded before those hooks run.

If the checkbox is hidden but fields still synchronize, check ACFML's field translation preferences and the WPML translation editor being used.

== Want to contribute? ==

Report issues or contribute on [GitHub](https://github.com/timohubois/disable-sync-repeater-option-for-acfml/).

== Changelog ==

= 1.0.1 =
* Raise the minimum supported WordPress version from 5.0 to 6.0. Repeater-sync behavior is unchanged.

= 1.0 =
* Initial release.

== Upgrade Notice ==

= 1.0.1 =
Requires WordPress 6.0 or later. Repeater-sync behavior is unchanged.
