<?php
/*
* Plugin Name: WP Page Builder WooCommerce Addon
* Plugin URI: http://www.murshidalam.com/plugins/wppb-wc-addon
* Author: Fahim Murshed
* Author URI: https://profiles.wordpress.org/fahimmurshed/
* License: GNU/GPL V2 or Later
* Description: WP Page Builder addon for WooComerce
* Version: 1.0.0
*/
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// WP PageBuilder Hook
add_filter( 'wppb_available_addons', 'prefix_custom_addon_include' );
if ( ! function_exists('prefix_custom_addon_include')){
    function prefix_custom_addon_include($addons){
        $addons[] = 'wppbwca_shortcode';
        // Add Other Custom Addon class name in here, at a time.
        return $addons;
    }
}

// Add CSS and JS for WP PageBuilder WooCommerce Addon
add_action( 'wp_enqueue_scripts', 'wppbwca_style' );
if(!function_exists('wppbwca_style')):
    function wppbwca_style(){
        // CSS
        wp_enqueue_style('wppbwca-css',plugins_url('/css/wppbwca.css',__FILE__));
        wp_enqueue_style('wppbwca-bootstrap',plugins_url('/css/bootstrap.min.css',__FILE__));

        // JS
        wp_enqueue_script('wppbwca-bootstrapjs',plugins_url('/js/bootstrap.min.js',__FILE__), array('jquery'));
    }
endif;

// WP PageBuilder WooCommerce Addon Core File
require 'addons/wppbwca.php';
