<?php
/**
 * Unicase Child
 *
 * @package unicase-child
 */

/**
 * Include all your custom code here
 */

function unicase_child_theme_enqueue_scripts() {
    wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '/style.css'  );
    wp_enqueue_style( 'childstyle' );
}
add_action( 'wp_enqueue_scripts', 'unicase_child_theme_enqueue_scripts', 11);

require get_stylesheet_directory() . '/inc/init.php';

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart');
remove_action( 'woocommerce_single_product_summary', 'unicase_single_product_add_to_cart', 30);
add_filter( 'woocommerce_get_price_html', function( $price ) {
    return '';
} );
add_filter( 'woocommerce_cart_item_price', '__return_false' );
add_filter( 'woocommerce_cart_item_subtotal', '__return_false' );

function add_live_search($items, $args) {
    if ($args->theme_location == 'primary') {
        ob_start();
        unicase_get_template( 'sections/unicase_search_bar.php' );
        $search_form = ob_get_clean();
        $items .= '<li class="menu-item menu-item-type-custom menu-item-object-custom animate-dropdown primary-menu-search">'. $search_form .'</li>';
    }

    return $items;
}
add_filter('wp_nav_menu_items', 'add_live_search', 10, 2);

function custom_best_selling_products( $atts ) {
    $atts = shortcode_atts( array(
        'title' => 'Best Selling',
        'per_page' => 8,
        'columns' => 4
    ), $atts, 'best_selling_products' );

    if ( is_woocommerce_activated() ) {
        echo '<section class="unicase-product-section unicase-best-selling-products">';

        echo '<h2 class="section-title">' . esc_attr( $atts['title'] ) . '</h2>';
        echo do_shortcode( '[products tag="best-selling" per_page="' . intval( $atts['per_page'] ) . '" columns="' . intval( $atts['columns'] ) . '"]' );

        echo '</section>';
    }
}
add_shortcode( 'custom_best_selling_products', 'custom_best_selling_products' );

function custom_liquidation_products( $atts ) {
    $atts = shortcode_atts( array(
        'title' => 'Liquidation',
        'per_page' => 8,
        'columns' => 4
    ), $atts, 'best_selling_products' );

    if ( is_woocommerce_activated() ) {
        echo '<section class="unicase-product-section unicase-best-selling-products">';

        echo '<h2 class="section-title">' . esc_attr( $atts['title'] ) . '</h2>';
        echo do_shortcode( '[products tag="liquidation" per_page="' . intval( $atts['per_page'] ) . '" columns="' . intval( $atts['columns'] ) . '"]' );

        echo '</section>';
    }
}
add_shortcode( 'custom_liquidation_products', 'custom_liquidation_products' );