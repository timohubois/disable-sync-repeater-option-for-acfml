=== Disable Sync Repeater Option for ACFML (WPML/ACF) ===
Contributors: timohubois
Tags: acfml, wpml, acf
Requires at least: 6.0
Tested up to: 7.1
Stable tag: 1.1.0
Requires PHP: 8.0
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Let translations use different ACF repeater rows or flexible content layouts by turning off ACFML's optional repeater sync.

== Description ==

ACFML can keep repeater rows and flexible content layouts in the same order as the default language. This plugin turns that optional synchronization off across classic editors, the block editor, taxonomy terms and ACF options pages. It also removes the related controls and clears previously saved choices when activated.

The plugin does not change ACF field translation settings or WPML translation-editor settings. You need ACFML 2.0.0 or later, a compatible version of WPML, and ACF PRO. Follow [WPML's ACFML setup guide](https://wpml.org/documentation/translating-your-contents/acf/) before activating this plugin.

== Installation ==

1. Back up the site and try the plugin on staging before activating it on your live site.
2. In **Plugins > Add New**, search for **Disable Sync Repeater Option for ACFML (WPML/ACF)**, then install and activate it. If you downloaded the ZIP, use **Upload Plugin** instead.
3. Save and reopen a test translation to check that its layout stays as intended. There is no separate settings page.

== Frequently Asked Questions ==

= Does this disable every kind of ACF field synchronization? =

No. It disables ACFML's optional repeater-sync choice. ACFML field-group modes, field translation preferences, WPML translation editors and other integrations can still synchronize content.

= What happens to existing translations? =

The plugin does not directly edit posts or field values, undo past synchronization, or restore prior layouts. Back up the content and verify your editing workflow on staging.

= Can I re-enable ACFML's repeater-sync controls? =

Deactivate this plugin and review the desired setting in ACFML. Choices deleted when the plugin was activated are not restored automatically.

= Why is synchronization still happening? =

Check the ACFML field-group mode, individual field translation preferences and the WPML translation editor in use. Those settings are separate from the optional repeater-sync choice targeted by this plugin.

If that does not explain what you are seeing, [report an issue on GitHub](https://github.com/timohubois/disable-sync-repeater-option-for-acfml/issues) with the WordPress, PHP, WPML, ACFML and ACF versions involved.

== Changelog ==

= 1.1.0 =
* Enforce the disabled repeater-sync choice across classic form saves and block-editor REST requests.
* Remove the related controls from post, taxonomy and ACF options-page editors.
* Require ACFML 2.0.0 or later.

= 1.0.1 =
* Raise the minimum WordPress version from 5.0 to 6.0. Repeater-sync behavior is unchanged.

= 1.0 =
* Initial release.

== Upgrade Notice ==

= 1.1.0 =
Repeater sync is now disabled across all supported ACFML editor surfaces. Requires ACFML 2.0.0 or later.
