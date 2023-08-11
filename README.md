# WooCommerce Waitlist Sober Theme Compatibility

This plugin adds some functoinality to make WooCommerce Waitlist more compatible with the Sober Theme by UIX Themes.

Steps to get up and running:
1. Download the zip of the latest release
1. Upload to your WordPress install
1. Activate

Deploying updates:

This plugin is set up to work with integrated WordPress updates through the use of
[yahnis-elsts/plugin-update-checker](https://github.com/YahnisElsts/plugin-update-checker) and 
[rymndhng/release-on-push-action](https://github.com/rymndhng/release-on-push-action)

In order to deploy an update:

1. (Once) Enable Github Pages on your repository (Settings > Pages) so that a `update.json` can be read by the Update Checker in production sites.
1. Create a pull request to merge your branch into `main` and add the appropriate label:
    * `release:major`
    * `release:minor`
    * `release:patch`
1. When merged, the `release.yml` workflow will update all of your version numbers and commit them back into main and create a github release with two artifacts:
    1. `plugin-slug.zip` - the uploadable plugin for manual installation
    1. `update.zip` containing the files needed by the updater
1. Updates should then show in wp-admin for any users of the plugin

