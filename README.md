# disable-sync-repeater-option-for-acfml

ACFML introduces a feature that allows users to sync repeater fields across translations.

In combination flexible content fields and when the content should vary per language and it can lead to unexpected behavior, so that this plugin does the following:

1. Define a constant that sets the default value for the repeater sync checkbox.
2. Remove the meta box that displays the repeater sync checkbox in the post edit screen.
3. Delete the option that stores the sync status in the database.

## Requirements

* PHP >= 8.0

## Installation

1. Make sure you have the correct [requirements](#requirements).
2. Clone the repository and place it in `wp-content/plugins/` folder.

## Development

1. Make sure you have the correct [requirements](#requirements).
2. Perform [Installation](#installation).
3. Run `composer i` to install composer dependency.

## License

GPLv3
