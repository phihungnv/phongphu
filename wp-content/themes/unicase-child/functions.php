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
    wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '/styles.css'  );
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

function custom_best_selling_products_callback( $atts ) {
    $atts = shortcode_atts( array(
        'title' => 'Best Selling',
        'per_page' => 8,
        'columns' => 4
    ), $atts, 'best_selling_products' );

    $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => $atts['per_page'],
        'meta_key'   => 'best_selling',
        'meta_value' => 1
    );

    $loop = new WP_Query( $args );

    if ( is_woocommerce_activated() ) {
        if ( $loop->have_posts() ) {
            echo '<section class="unicase-product-section unicase-best-selling-products">';
            echo '<h2 class="section-title">' . esc_attr( $atts['title'] ) . '</h2>';
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
add_shortcode( 'custom_best_selling_products', 'custom_best_selling_products_callback' );

function custom_liquidation_products_callback( $atts ) {
    $atts = shortcode_atts( array(
        'title' => 'Liquidation',
        'per_page' => 8,
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
            echo '<h2 class="section-title">' . esc_attr( $atts['title'] ) . '</h2>';
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

function custom_main_products_callback( $atts ) {
    $atts = shortcode_atts( array(
        'title' => 'Main Products',
        'per_page' => 8,
        'columns' => 4
    ), $atts, 'custom_main_products' );

    $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => $atts['per_page'],
        'meta_key'   => 'main_product',
        'meta_value' => 1
    );

    $loop = new WP_Query( $args );

    if ( is_woocommerce_activated() ) {
        if ( $loop->have_posts() ) {
            echo '<section class="unicase-product-section unicase-main-products">';
            echo '<h2 class="section-title">' . esc_attr( $atts['title'] ) . '</h2>';
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
add_shortcode( 'custom_main_products', 'custom_main_products_callback' );

function shop_policy_callback () {
    ob_start();
    ?>
        <ul class="hidden-xs shop-policy">
            <li>
                <img src="<?php echo get_home_url() ?>/wp-content/uploads/2018/12/icon_vanchuyen.png">
                <p>GIAO HÀNG FREE 20KM TRỞ LẠI</p>
            </li>
            <li>
                <img src="<?php echo get_home_url() ?>/wp-content/uploads/2018/12/icon_thanhtoan.png">
                <p>THANH TOÁN KHI NHẬN HÀNG</p>
            </li>
            <li>
                <img src="<?php echo get_home_url() ?>/wp-content/uploads/2018/12/icon_dienthoai.png">
                <p>Tel: 0985 675 611 / 0988 964 461<br/>MOBILE: 0985 675 611</p>
            </li>
        </ul>
    <?php

    return ob_get_clean();
}
add_shortcode( 'shop_policy', 'shop_policy_callback' );

register_sidebar( apply_filters( 'unicase_register_sidebar_args', array(
    'name'          => esc_html__( 'Product Sidebar', 'unicase' ),
    'id'            => 'single-product-sidebar',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
) ) );