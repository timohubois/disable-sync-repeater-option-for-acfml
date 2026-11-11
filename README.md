# disable-sync-repeater-option-for-acfml

The [ACFML](https://wpml.org/documentation/related-projects/translate-sites-built-with-acf/ "Advanced Custom Fields (ACF) Multilingual – Translate All Fields with WPML") (Advanced Custom Fields [ACF] Multilingual) plugin extends WPML, lets you translate sites using ACF and introduces a feature that allows users to sync repeater fields across translations.

In combination with flexible content fields and when the content should vary per language, it can lead to unexpected behavior, so that this plugin does the following:

1. Define a constant that sets the default value for the repeater sync checkbox.
2. Remove the meta box that displays the repeater sync checkbox in the post edit screen.
3. Delete the option that stores the sync status in the database.

## Requirements

* PHP >= 8.0
* WPML, its ACFML add-on, and ACF (ACF PRO for repeater and flexible content fields). Follow ACFML's requirements for compatible versions.

## Installation

1. Make sure you have the correct [requirements](#requirements).
2. Clone the repository and place it in `wp-content/plugins/` folder.

## Development

1. Make sure you have the correct [requirements](#requirements).
2. Perform [Installation](#installation).
3. Run `composer i` to install composer dependency.

## Listing assets

WordPress.org listing assets live in [.wordpress-org/](.wordpress-org/) and are excluded from plugin ZIPs. The two PNG banners and genuine vector icon with PNG fallbacks follow the [official asset requirements](https://developer.wordpress.org/plugins/wordpress-org/plugin-assets/).

The banner is an annotated illustration based on an existing backend capture, not a new runtime screenshot. The existing WPML and ACF logos identify the integrations and remain the property of their respective owners; they do not imply endorsement.

## License

GPLv3
