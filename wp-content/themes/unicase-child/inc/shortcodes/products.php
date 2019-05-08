<?php

function custom_liquidation_products_callback( $atts ) {
    $atts = shortcode_atts( array(
        'title' => 'Liquidation',
        'per_page' => 4,
        'columns' => 4
    ), $atts, 'custom_liquidation_products' );

    $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => $atts['per_page'],
        'meta_key'   => 'liquidation',
        'meta_value' => 1
    );

    $loop = new WP_Query( $args );

    if ( is_woocommerce_activated() ) {
        if ( $loop->have_posts() ) {
            echo '<section class="unicase-product-section unicase-liquidation-products">';
            echo '<div class="section-head">';
            echo '<h2 class="section-title">' . esc_attr( $atts['title'] ) . '</h2>';
            echo '<a class="view-all" href="' . get_home_url()  .'/shop?liquidation=1">Xem Thêm</a>';
            echo '</div>';
            echo '<ul class="products columns-' . $atts['columns'] . '">';

            while ( $loop->have_posts() ) : $loop->the_post();
                wc_get_template_part( 'content', 'product' );
            endwhile;

            echo '</ul>';
            echo '</section>';
        }
        wp_reset_postdata();
    }
}

add_shortcode( 'custom_liquidation_products', 'custom_liquidation_products_callback' );

function custom_featured_products_callback( $atts ) {
    $atts = shortcode_atts( array(
        'title' => 'Featured',
        'per_page' => 4,
        'columns' => 4
    ), $atts, 'custom_featured_products' );

    $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => $atts['per_page'],
        'tax_query' => array(
            array(
                'taxonomy' => 'product_visibility',
                'field'    => 'name',
                'terms'    => 'featured',
            ),
        ),
    );

    $loop = new WP_Query( $args );

    if ( is_woocommerce_activated() ) {
        if ( $loop->have_posts() ) {
            echo '<section class="unicase-product-section unicase-featured-products">';
            echo '<div class="section-head">';
            echo '<h2 class="section-title">' . esc_attr( $atts['title'] ) . '</h2>';
            echo '<a class="view-all" href="' . get_home_url()  .'/shop?featured=1">Xem Thêm</a>';
            echo '</div>';
            echo '<ul class="products columns-' . $atts['columns'] . '">';

            while ( $loop->have_posts() ) : $loop->the_post();
                wc_get_template_part( 'content', 'product' );
            endwhile;

            echo '</ul>';
            echo '</section>';
        }
        wp_reset_postdata();
    }
}

add_shortcode( 'custom_featured_products', 'custom_featured_products_callback' );