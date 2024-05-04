=== Disable Sync Repeater Option for ACFML ===
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

ACFML introduces a feature that allows users to sync repeater fields across translations.

In combination flexible content fields and when the content should vary per language, it can lead to unexpected behavior, so that this plugin does the following:

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

== Changelog ==
= 1.0 =
* Initial Release
