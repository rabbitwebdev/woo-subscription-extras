<?php
/**
 * Plugin Name: Woo Subscription Extras
 * Description: Adds optional extras to WooCommerce Subscriptions in a step-by-step wizard.
 * Version: 1.0
 * Author: ZapStart Digital
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'WSE_PATH', plugin_dir_path( __FILE__ ) );

add_action('plugins_loaded', 'wse_init_plugin');

function wse_init_plugin() {
    require_once WSE_PATH . 'includes/class-step-form.php';
    new WSE_Step_Form();
}
