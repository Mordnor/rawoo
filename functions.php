<?php


// Woocommerce Function
function rawoo_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'rawoo_add_woocommerce_support' );

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// HOOK 


// ADD LABEL TO SHORT DESC SINGLE_PRODUCT


  
// The hook in function $availability is passed via the filter!
// SHOW 'IN STOCK' OR 'OUT OF STOCK' RATHER THAN THE STOCK HIMSELF
add_filter( 'woocommerce_get_availability', 'custom_override_get_availability', 1, 2);

function custom_override_get_availability( $availability, $_product ) {
if ( $_product->is_in_stock() ) $availability['availability'] = __('In Stock', 'woocommerce');
return $availability;
}






function remove_admin_login_header() {
  remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');



// My Steelsheets

wp_enqueue_style( 'index', get_stylesheet_uri() );

wp_enqueue_style( 'single_product', '/wp-content/themes/rawoo/single_product.css' );



// NAV MENU
function register_my_menu() {
	register_nav_menu('new-menu',__( 'New Menu' ));
  }
  add_action( 'init', 'register_my_menu' );
?>