<?php

function mytheme_add_woocommerce_support() {
  add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'mytheme_add_woocommerce_support');
add_filter('woocommerce_is_purchasable', '__return_false');

/*
* Change read more button text
*/
add_filter( 'woocommerce_loop_add_to_cart_link', 'replace_loop_add_to_cart_button', 10, 2 );

function replace_loop_add_to_cart_button( $button, $product  ) {
    return '<a class="button product_type_simple" href="' . $product->get_permalink() . '">' . __( "Mais Informações" ) . '</a>';
}

/*
 * Add in text after price to certain products
*/
function themeprefix_custom_price_message( $price ) { 

	global $post;

	$product_id = $post->ID;
	$my_product_array = array( 345, 717 );//add in product IDs
	if ( in_array( $product_id, $my_product_array )) {
    $textafter = ' antes de customização.';

    return $price . '<span class="price-description">' . $textafter . '</span>';
	}

	else { 
    return $price; 
    // return $pricefrom;
	} 
}
add_filter( 'woocommerce_get_price_html', 'themeprefix_custom_price_message' );

/*
* Add text before price to certain products*/
add_filter('woocommerce_get_price_html', 'cw_change_product_price_display');
add_filter('woocommerce_cart_item_price', 'cw_change_product_price_display');
function cw_change_product_price_display($price) {

  $text = __('Preço base: ');


  if (is_product() && has_term(array('custom'), 'product_tag')) {
    // returning the text before the price
    return $text . ' ' . $price;
  } else {
    return $price;
  }
}

/*
* Register new Widget area for Product Cat sort dropdown.
*/
add_action( 'widgets_init', 'wb_extra_widgets' );

function wb_extra_widgets() {
	register_sidebar( array(
		'id'            => 'prod_sort',
		'name'          => __( 'Product Cat Sort', 'themename' ),
		'description'   => __( 'This site below Shop Title', 'themename' ),
		'before_widget'	=> '<div class="category-list-dropdown-container"><div class="category-list-dropdown">',
		'after_widget'	=> '</div></div>',
		'before_title'  => '<h3 class="product-cat-title">',
		'after_title'   => '</h3>'
	) );
}

add_action( 'woocommerce_before_shop_loop','wb_prod_sort' ); // Hook it after headline and before loop

//  Position the Product Category Sort dropdown.

function wb_prod_sort() {
	if ( is_active_sidebar( 'prod_sort' ) ) {
		dynamic_sidebar( 'prod_sort' );
	}
}

/*
* Change delimiter character from / to >
*/
add_filter( 'woocommerce_breadcrumb_defaults', 'my_change_breadcrumb_delimiter' );

function my_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimiter from '/' to '>'
	$defaults['delimiter'] = ' » ';
	return $defaults;
}

/*
* Change dropdown text on product page
*/
add_filter( 'wp_dropdown_cats', function( $html, $args ) {
  if ( $args['taxonomy'] === 'product_cat' ) {
      $html = str_replace( '<select', '<select data-placeholder="Escolha uma categoria"', $html );
  }
  return $html;
}, 10, 2);

//To change  "Browse the list"
add_filter('ywraq_product_added_view_browse_list', 'ywraq_change_browse_list');

function ywraq_change_browse_list( $text ){
    $text = __( 'Go to my selected product list', '_themename' );
    return $text;
}

// Remove the description tab
add_filter( 'woocommerce_product_tabs', 'yikes_remove_description_tab', 20, 1 );

function yikes_remove_description_tab( $tabs ) {

    if ( isset( $tabs['description'] ) ) unset( $tabs['description'] );      	    
    return $tabs;
}

// Remove the additional information tab
function woo_remove_product_tabs( $tabs ) {
	unset( $tabs['additional_information'] );
	return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );