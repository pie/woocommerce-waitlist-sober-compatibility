# WooCommerce Waitlist Sober Theme Compatibility

This plugin adds some functionality to make WooCommerce Waitlist more compatible with the Sober Theme by UIX Themes.

The Sober theme uses AJAX to load products on the shop page. This means that the waitlist plugin doesn't get a chance to initialize the waitlist buttons. This plugin hooks into the functionality that loads the quickview and makes sure that the waitlist buttons are initialized after the quickview is loaded. 

## Steps to get up and running:

1. Download the zip of the latest release from https://github.com/pie/woocommerce-waitlist-sober-compatibility/releases
1. Upload to your WordPress install
1. Activate

## Contributing:

1. Create a branch from `next-release` for your feature
1. When complete and happy, merge your feature branch back in to `next-release`

## Deploying updates:

This plugin is set up to work with integrated WordPress updates through the use of
[yahnis-elsts/plugin-update-checker](https://github.com/YahnisElsts/plugin-update-checker) and 
[rymndhng/release-on-push-action](https://github.com/rymndhng/release-on-push-action)

In order to deploy an update:

1. Thoroughly test the `next-release` branch in your test environment
1. Create a pull request to merge the `next-release` branch into `main` and add the appropriate label:
    * `release:major`
    * `release:minor`
    * `release:patch`
1. When merged, the `release.yml` workflow will update all of your version numbers and commit them back into main and create a github release artifact: `woocommerce-waitlist-sober-compatibility.zip`
1. Updates should then show in wp-admin for any users of the plugin

