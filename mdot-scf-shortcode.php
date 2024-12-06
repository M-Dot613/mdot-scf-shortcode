<?php
/**
 * Plugin Name: M-Dot ACF Shortcode Plugin
 * Plugin URI: https://mdotweb.com
 * Description: A plugin to create a shortcode that runs get_field().
 * Version: 1.1
 * Author: Your Name
 * Author URI: https://mdotweb.com
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Registers the [mdot_scf] shortcode.
 */
function mdot_acf_shortcode_register() {
    add_shortcode( 'mdot_scf', 'mdot_scf_shortcode_handler' );
}

/**
 * Shortcode handler for [mdot_scf].
 *
 * @param array $atts Shortcode attributes.
 * @return string The field value or an empty string if not found.
 */
function mdot_scf_shortcode_handler( $atts ) {
    // Extract attributes with defaults.
    $atts = shortcode_atts(
        [
            'name'      => '',      // Field name or key (required).
            'post'       => false,  // Post ID (optional, defaults to current post).
            'format'  => true,   // Apply ACF formatting (default: true).
            'eschtml'   => false,  // Escape HTML output (default: false, ACF 6.2.6+ required).
        ],
        $atts,
        'mdot_scf'
    );

    // Validate that a name is provided.
    if ( empty( $atts['name'] ) ) {
        return esc_html__( 'Error: No name provided.', 'mdot_acf' );
    }

    // Ensure boolean values are properly handled.
    $format = filter_var( $atts['format'], FILTER_VALIDATE_BOOLEAN );
    $eschtml  = filter_var( $atts['eschtml'], FILTER_VALIDATE_BOOLEAN );

    // Fetch the field value using get_field().
    $field_value = get_field( $atts['name'], $atts['post'], $format, $eschtml );

    // Return the value or a fallback message.
    if ( $field_value ) {
        return $field_value;
    }

    return esc_html__( 'Field not found or is empty.', 'mdot_acf' );
}

// Hook the shortcode registration function.
add_action( 'init', 'mdot_acf_shortcode_register' );
