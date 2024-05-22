=== Disable Sync Repeater Option for ACFML (WPML/ACF) ===
Contributors: timohubois
Tags: Tags: acfml, wpml, acf
Requires at least: 6.0
Tested up to: 6.5
Stable tag: 1.0
Requires PHP: 8.0
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Disables the sync repeater option of ACFML.

== Description ==

The [AFCML](https://wpml.org/documentation/related-projects/translate-sites-built-with-acf/ "Advanced Custom Fields (ACF) Multilingual – Translate All Fields with WPML") (Advanced Custom Fields [ACF] Multilingual) plugin extends WPML, lets you translate sites using ACF and introduces a feature that allows users to sync repeater fields across translations.

In combination with flexible content fields and when the content should vary per language, it can lead to unexpected behavior, so that this plugin does the following:

1. Define a constant that sets the default value for the repeater sync checkbox.
2. Remove the meta box that displays the repeater sync checkbox in the post edit screen.
3. Delete the option that stores the sync status in the database.

== Want to contribute? ==
Check out the Plugin [GitHub Repository](https://github.com/timohubois/disable-sync-repeater-option-for-acfml/).

== Installation ==

= INSTALL WITHIN WORDPRESS =
(recommended)

1. Open **Plugins > Add new**
2. Search for **Disable Sync Repeater Option for ACFML**
3. Click **install and activate** the plugin

= INSTALL MANUALLY THROUGH FTP =

1. Download the plugin on the WordPress plugin page
2. Upload the ‘disable-sync-repeater-option-for-acfml’ folder to the /wp-content/plugins/ directory
3. Activate the plugin through the ‘Plugins’ menu in WordPress

== Frequently Asked Questions ==

= What is the purpose of this plugin? =

This plugin disables the sync repeater option of ACFML, which can prevent unexpected behavior when using repeater fields in multilingual sites with WPML and ACF.

= What if I have repeater fields that need to be translated differently per language? =

This plugin is designed to disable repeater syncing completely. If you have repeater fields that require different translations per language, you can refer to the official ACFML documentation for alternative methods: [https://wpml.org/tutorials/2022/06/how-to-translate-acf-repeater-fields/](https://wpml.org/tutorials/2022/06/how-to-translate-acf-repeater-fields/).

= Will this plugin affect my existing translated content? =

No, this plugin only disables the sync repeater option. Existing translated content will not be affected.

= Can I re-enable the sync repeater option after installing this plugin? =

No, this plugin permanently disables the option. You would need to deactivate and delete the plugin to re-enable it.

= Does this plugin require any other plugins to work? =

Yes, this plugin requires both WPML and ACF plugins to be installed and activated.

== Changelog ==
= 1.0 =
* Initial Release
