<?php 
/*
Plugin Name: WooCommerce Waitlist Sober Theme Compatibility
Description: This plugin adds some functoinality to make WooCommerce Waitlist more compatible with the Sober Theme by UIX Themes
Version: 0.1.0
Author: The team at PIE
Author URI: https://pie.co.de
*/

namespace PIE\WooCommerceWaitlistSoberThemeCompatibility;

/**
 * Load Composer autoloader
 */
require_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$update_checker = PucFactory::buildUpdateChecker(
    'https://pie.github.io/woocommerce-waitlist-sober-compatibility/update.json',
    __FILE__,
    'woocommerce-waitlist-sober-compatibility'
);


add_action( 'wp_footer', __NAMESPACE__ . '\pie_force_init_waitlist_js' );
add_action('sober_woocommerce_product_quickview_summary', __NAMESPACE__ . '\output_required_wcwl_elements', 55 );


/**
 * The Sober theme uses AJAX to load products on the shop page. This means that the waitlist plugin doesn't get a chance to 
 * initialize the waitlist buttons. This function hooks into the AJAX call that loads the quickview and makes sure that the waitlist
 * buttons are initialized after the quickview is loaded. 
 *
 * @return void
 */
function pie_force_init_waitlist_js(): void 
{
	echo '<script>jQuery(document).ready(function($) { 
		$( document.body ).on( "sober_quickview_opened", function(){
			console.log( "triggered" );
			wcwl_apply_event_on_page_update();
		} ) });
		</script>';
}

/**
 * this function outputs the waitlist buttons within the product quick view. The Sober theme doesn't do this by default as it 
 * uses different hooks.
 * 
 * @return void
 */
function output_required_wcwl_elements(): void
 {
    if ( function_exists('wcwl_get_waitlist_for_archive') && function_exists('wc_get_product')  ){
        echo wcwl_get_waitlist_for_archive( wc_get_product() );
    }
}

