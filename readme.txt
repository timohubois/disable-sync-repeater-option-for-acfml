=== Disable Sync Repeater Option for ACFML (WPML/ACF) ===
Contributors: timohubois
Tags: acfml, wpml, acf
Requires at least: 6.0
Tested up to: 7.1
Stable tag: 1.1.0
Requires PHP: 8.0
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Turn off ACFML's repeater sync option for multilingual sites where layouts need to vary by language.

== Description ==

Use this plugin when translated pages need a different order of Repeater rows or different Flexible Content layouts from the default language.

[Advanced Custom Fields Multilingual (ACFML)](https://wpml.org/documentation/related-projects/translate-sites-built-with-acf/) connects WPML with Advanced Custom Fields. Its repeater sync option synchronizes the order of Repeater rows and Flexible Content layouts with the default language. This plugin keeps that optional choice off across supported editor and save paths and hides the related controls.

The change applies site-wide. It does not change field translation rules or WPML's translation-editor settings.

**Requirements**

* WordPress 6.0 or later and PHP 8.0 or later.
* ACFML 2.0.0 or later, a compatible version of WPML, and ACF with support for the field types you use.
* ACF PRO for repeater and flexible content fields.

The required plugins and their licenses are not included.

== Installation ==

1. Install and configure WPML, ACFML and ACF. Follow [ACFML's setup and dependency guidance](https://wpml.org/documentation/related-projects/translate-sites-built-with-acf/) for your versions.
2. Under **Plugins > Add New**, search for **Disable Sync Repeater Option for ACFML (WPML/ACF)**, then install and activate it. Alternatively, upload the disable-sync-repeater-option-for-acfml folder to /wp-content/plugins/ and activate it under **Plugins**.

There is no settings page.

== Frequently Asked Questions ==

= Does this disable every kind of ACF field synchronization? =

No. It disables ACFML's optional repeater sync choice. ACFML field-group modes, field translation preferences, WPML translation editors and other integrations can still synchronize content.

For field translation settings, see [WPML's guide to translating ACF repeater fields](https://wpml.org/documentation/translating-your-contents/acf/#repeater-and-flexible-content).

= Can I apply it to individual languages or field groups? =

No. The optional choice stays off site-wide while the plugin is active. There are no separate controls for individual users, posts, languages, field groups or post types.

= Will it change my existing translated content? =

No. The plugin does not edit posts or ACF field values, undo earlier synchronization or restore layouts that were already changed.

Before editing existing translations, back up the content. Save and reopen one translation on staging to check whether other WPML settings still synchronize its fields.

= Can I re-enable the repeater sync option? =

Deactivate this plugin to let ACFML control repeater synchronization again, then review the setting in ACFML. Activation clears the current site's saved sync preferences; deactivation does not restore them. Updating while active ignores any stored preferences without clearing them, so those preferences can take effect again after deactivation.

= Why is the checkbox still visible or synchronization still happening? =

* If the checkbox is still visible, check that this plugin and a supported version of ACFML are active.
* `ACFML_REPEATER_SYNC_DEFAULT` is set to false only if it has not already been defined, even if ACFML is inactive. If your site defines it as true, change or remove that definition to keep ACFML from defaulting to sync. See the [ACFML constant reference](https://wpml.org/documentation/support/wpml-coding-api/wpml-constants/#acfml_repeater_sync_default).

If the checkbox is hidden but fields still synchronize, check ACFML's field-group mode, field translation preferences and the WPML translation editor being used.

== Want to contribute? ==

Report issues or contribute on [GitHub](https://github.com/timohubois/disable-sync-repeater-option-for-acfml/).

== Changelog ==

= 1.1.0 =
* Keep ACFML's optional repeater sync setting off when saving, not just hidden in the editor.
* Hide the sync controls in the block editor and on ACF options and taxonomy screens, in addition to the classic editor.

= 1.0.1 =
* Raise the minimum supported WordPress version from 5.0 to 6.0. Repeater-sync behavior is unchanged.

= 1.0 =
* Initial release.

== Upgrade Notice ==

= 1.1.0 =
Requires ACFML 2.0.0 or later. Activation clears the site's saved sync choices; deactivation cannot restore them. Updating while active ignores saved choices without clearing them.

= 1.0.1 =
Requires WordPress 6.0 or later. Repeater-sync behavior is unchanged.
