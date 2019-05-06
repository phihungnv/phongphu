<?php
/**
 * Remove review tab in single product
 */
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['reviews'] );
    unset( $tabs['additional_information'] );
    return $tabs;
}

add_filter('woocommerce_after_widget_product_list', 'woo_view_all_link');

function woo_view_all_link() {
    return "<li class='view-all-product'><a href='" . get_home_url() . "/shop'>View All</a></li></ul>";
}