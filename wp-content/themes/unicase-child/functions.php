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