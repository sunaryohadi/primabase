<?php
/**
 * Woo Customization
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package primebase
 */

// Declare woocommerce support
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}


// Remove each style one by one
add_filter( 'woocommerce_enqueue_styles', 'primebase_woo_dequeue_styles' );
function primebase_woo_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}

function wp_enqueue_woocommerce_style(){
	wp_register_style( 'woo', get_template_directory_uri() . '/woocommerce/css/woocommerce.css' );
	wp_register_style( 'woo-layout', get_template_directory_uri() . '/woocommerce/css/woocommerce-layout.css' );
	wp_register_style( 'woo-small', get_template_directory_uri() . '/woocommerce/css/woocommerce-smallscreen.css' );
	
	if ( class_exists( 'woocommerce' ) ) {
		wp_enqueue_style( 'woo' );
		wp_enqueue_style( 'woo-layout' );
		// wp_enqueue_style( 'woo-small' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_enqueue_woocommerce_style' );