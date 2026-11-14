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

Disable Sync Repeater Option for ACFML turns off ACFML's repeater sync option for multilingual sites where layouts need to vary by language.

While active, it changes the default, removes the repeater sync checkbox from existing-post edit screens and clears ACFML's saved site-wide sync preference during admin requests. There is no settings page.

[Advanced Custom Fields Multilingual (ACFML)](https://wpml.org/documentation/related-projects/translate-sites-built-with-acf/) connects WPML with Advanced Custom Fields. Its repeater sync option keeps repeater and flexible sub-fields in the same order as the default language.

This utility targets that option only. It does not replace ACFML, change field translation rules or disable every possible source of synchronization.

**Requirements**

* WordPress 6.0 or later and PHP 8.0 or later.
* WPML, its ACFML add-on, and ACF with support for the field types you use.
* ACF PRO for repeater and flexible content fields.

The required plugins and their licenses are not included. Test your translation workflow on staging before using the plugin on a live site.

== Installation ==

1. Install and configure compatible versions of WPML, ACFML, and ACF. Follow [ACFML's setup and dependency guidance](https://wpml.org/documentation/related-projects/translate-sites-built-with-acf/) for your versions.
2. Back up the site and check the workflow on staging, especially if translations already have synchronized layouts.
3. Under **Plugins > Add New**, search for **Disable Sync Repeater Option for ACFML (WPML/ACF)**, then install and activate it. Alternatively, upload the disable-sync-repeater-option-for-acfml folder to /wp-content/plugins/ and activate it under **Plugins**.
4. Open an existing post that uses the relevant fields and check that ACFML's repeater sync meta box is absent. Save and reopen a test translation to confirm your intended field layout is retained.

There is no additional configuration screen. Composer is not needed to run the plugin.

== Frequently Asked Questions ==

= Does this disable every kind of ACF field synchronization? =

No. It targets ACFML's repeater sync checkbox and saved preference. Field translation preferences, WPML translation editors and other integrations can still affect synchronization.

Review those settings separately for your workflow. For background, see [WPML's guide to translating ACF repeater fields](https://wpml.org/documentation/translating-your-contents/acf/#repeater-and-flexible-content).

= Can I apply it to individual languages or field groups? =

No. Its behavior applies while the plugin is active, and the saved preference it clears is site-wide—not per user or per post.

There is no built-in switch for individual languages, field groups or post types.

= Will it change my existing translated content? =

The plugin does not directly edit posts or ACF field values. Changes to synchronization can affect subsequent editing, but the plugin does not undo earlier synchronization or restore layouts that were already changed.

Back up your content and verify the save-and-reopen workflow on staging.

= Can I re-enable the repeater sync option? =

Yes. Deactivate this plugin; deleting it is not required. On subsequent requests it no longer changes the default, removes the meta box or clears the preference.

ACFML then controls the available UI and behavior again. The previously deleted sync preference is not restored automatically, so review and save the desired setting in ACFML.

= Why is the checkbox still visible or synchronization still happening? =

The meta box removal targets existing-post edit screens (`post.php`), not the new-post screen.

The plugin defines `ACFML_REPEATER_SYNC_DEFAULT` as false only if it has not already been defined. An existing definition is left unchanged. See the [ACFML constant reference](https://wpml.org/documentation/support/wpml-coding-api/wpml-constants/#acfml_repeater_sync_default).

Meta box removal depends on `ACFML\Repeater\Sync\CheckboxUI` and its `META_BOX_ID` constant. Preference cleanup depends on `ACFML\Repeater\Sync\CheckboxOption` and its `SYNCHRONISE_WP_OPTION_NAME` constant, and runs during admin requests.

If the expected classes or constants are unavailable when the hooks run, the corresponding action is skipped. ACFML updates or load-order differences can therefore affect compatibility.

Other WPML or field translation settings can still synchronize content.

= What happens if ACFML is not active? =

The plugin skips meta box removal and preference cleanup when the expected ACFML classes are unavailable.

It still defines the default constant if it was not already defined, but does not provide translation or repeater features itself.

== Want to contribute? ==

Report issues or contribute on [GitHub](https://github.com/timohubois/disable-sync-repeater-option-for-acfml/).

== Changelog ==

= 1.0.1 =
* Raise the minimum supported WordPress version from 5.0 to 6.0 and align plugin metadata with the documentation.
* Clarify setup, requirements, behavior, limitations, and deactivation guidance.
* Refine development code-quality checks and formatting. Repeater-sync behavior is unchanged.

= 1.0 =
* Initial release.

== Upgrade Notice ==

= 1.0.1 =
Requires WordPress 6.0 or later. Repeater-sync behavior is unchanged.
