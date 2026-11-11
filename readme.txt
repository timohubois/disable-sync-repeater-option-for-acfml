=== Disable Sync Repeater Option for ACFML (WPML/ACF) ===
Contributors: timohubois
Tags: acfml, wpml, acf
Requires at least: 6.0
Tested up to: 7.1
Stable tag: 1.0
Requires PHP: 8.0
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Turn off ACFML's repeater sync option for multilingual sites where layouts need to vary by language.

== Description ==

Not every translation needs the same page layout. If your WPML site uses ACF repeater or flexible content fields and you want layouts to vary by language, this small utility turns off ACFML's repeater sync option and removes its checkbox from existing-post edit screens.

[Advanced Custom Fields Multilingual (ACFML)](https://wpml.org/documentation/related-projects/translate-sites-built-with-acf/) connects WPML with Advanced Custom Fields (ACF). Its repeater sync option keeps repeater and flexible sub-fields in the same order as the default language. Disable Sync Repeater Option for ACFML targets that option; it does not replace ACFML or configure field translation rules for you.

**What the plugin does**

* Sets ACFML_REPEATER_SYNC_DEFAULT to false, unless another plugin or your configuration has already defined it.
* Removes ACFML's repeater sync meta box from existing-post edit screens when the expected ACFML class is available.
* Clears ACFML's saved sync preference during admin requests when the expected ACFML class is available.
* Works without a separate settings page: activate the plugin to apply its behavior.

**Before you start**

You need WPML, its ACFML add-on, and ACF with support for the field types you use. Repeater and flexible content fields are ACF PRO features. This utility does not include those plugins or their licenses.

The plugin targets a specific ACFML option, not every possible source of field synchronization. Field translation settings and other integrations still apply. It relies on ACFML's internal classes, so check the behavior with your installed versions on a staging site before using it on a live site.

== Installation ==

1. Install and configure compatible versions of WPML, ACFML, and ACF. Follow [ACFML's setup and dependency guidance](https://wpml.org/documentation/related-projects/translate-sites-built-with-acf/) for your versions.
2. Back up the site and check the workflow on staging, especially if translations already have synchronized layouts.
3. In **Plugins > Add New**, search for **Disable Sync Repeater Option for ACFML**, then install and activate it. Alternatively, upload the disable-sync-repeater-option-for-acfml folder to /wp-content/plugins/ and activate it from **Plugins**.
4. Open an existing post that uses the relevant fields and check that ACFML's repeater sync meta box is absent. Save and reopen a test translation to confirm your intended field layout is retained.

There is no additional settings screen. Composer is not needed to run the plugin.

== Frequently Asked Questions ==

= Does this disable every kind of ACF field synchronization? =

No. It changes the default and saved preference for ACFML's repeater sync checkbox and removes its meta box on existing-post edit screens. It does not change field translation preferences, configure WPML's translation editors, or override other plugins. Review those settings separately for your translation workflow.

For background, see [WPML's guide to translating ACF repeater fields](https://wpml.org/tutorials/2022/06/how-to-translate-acf-repeater-fields/).

= Where are the plugin's settings? =

There are none. Its behavior applies while it is active, and the saved ACFML sync preference it clears is site-wide, not per user or per post. There is no built-in switch for individual languages, field groups, or post types.

= Will it change my existing translated content? =

The plugin does not directly edit posts or ACF field values. It deletes ACFML's saved sync preference, and changes to synchronization can affect subsequent editing. It does not undo earlier synchronization or restore layouts that were already changed. Back up your content and verify the save-and-reopen workflow on staging.

= Can I re-enable the repeater sync option? =

Yes. Deactivate this plugin; deleting it is not required. On subsequent requests it no longer sets the default, removes the meta box, or clears the preference. ACFML then controls the available UI and behavior again. The previously deleted sync preference is not restored automatically, so review and save the desired setting in ACFML.

= Why is the checkbox still visible or synchronization still happening? =

The meta box removal only targets existing-post edit screens (post.php), not the new-post screen. Another configuration may have already defined ACFML_REPEATER_SYNC_DEFAULT; this plugin deliberately leaves an existing definition unchanged.

It also relies on ACFML's Repeater Sync CheckboxUI and CheckboxOption classes and their constants. If those are unavailable when its hooks run, the corresponding removal or preference cleanup is skipped. ACFML updates or load-order differences may therefore affect compatibility. Other WPML or field translation settings can still synchronize content.

= What happens if ACFML is not active? =

This is an add-on, not a standalone translation plugin. Without the expected ACFML classes, it skips the meta box removal and preference cleanup. It still defines the default constant if it was not already defined, but does not provide translation or repeater features itself.

== Want to contribute? ==

Report issues or contribute through the [GitHub repository](https://github.com/timohubois/disable-sync-repeater-option-for-acfml/). For compatibility reports, include your WordPress, PHP, WPML, ACFML, and ACF versions and the steps to reproduce, without private site data.

== Changelog ==
= 1.0 =
* Initial Release
