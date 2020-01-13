<?php
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
add_filter('woocommerce_show_page_title', '__return_false');
/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 2; // 3 products per row
	}
}
add_action( 'woocommerce_shop_loop_item_title', 'custom_wrap_start', 1 );
function custom_wrap_start(){
	?>
	<div class="d-table w-100">
		<div class="d-table-cell text-left p-20">
	<?php
}
add_action( 'woocommerce_shop_loop_item_title', 'custom_wrap_end', 11 );
function custom_wrap_end(){
	?>
	</div>
	<?php
}
add_action( 'woocommerce_after_shop_loop_item_title', 'custom_wrap_start_one', 1 );
function custom_wrap_start_one(){
	?>
		<div class="d-table-cell text-right p-20">
	<?php
}
add_action( 'woocommerce_after_shop_loop_item_title', 'custom_wrap_end', 11 );
add_action( 'woocommerce_after_shop_loop_item_title', 'custom_wrap_end', 12 );

add_filter('woocommerce_default_address_fields', 'override_default_address_checkout_fields', 20, 1);
function override_default_address_checkout_fields( $address_fields ) {
    $address_fields['first_name']['placeholder'] = 'First name *';
    $address_fields['last_name']['placeholder'] = 'Last name *';
    $address_fields['company']['placeholder'] = 'Company name (optional)';
    $address_fields['address_1']['placeholder'] = 'Address Line 1';
    $address_fields['address_2']['placeholder'] = 'Address Line 2';
    $address_fields['state']['placeholder'] = 'State';
    $address_fields['city']['placeholder'] = 'City';
    $address_fields['postcode']['placeholder'] = 'Postcode';
    $address_fields['phone']['placeholder'] = 'Phone';
    $address_fields['email']['placeholder'] = 'Email';
    return $address_fields;
}