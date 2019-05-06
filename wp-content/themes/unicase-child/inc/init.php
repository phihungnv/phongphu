<?php

require get_stylesheet_directory() . '/inc/hooks.php';
require get_stylesheet_directory() . '/inc/filters.php';

/**
 * Add shortcodes
 */
require get_stylesheet_directory() . '/inc/shortcodes/single-product.php';

/**
 * Add widgets
 */
require get_stylesheet_directory() . '/inc/widgets/Recent_News_Widget.php';

function register_custom_widgets() {
    register_widget( 'Recent_News_Widget' );
}
add_action( 'widgets_init', 'register_custom_widgets' );

/**
 * Register sidebars
 */
register_sidebar( apply_filters( 'unicase_register_sidebar_args', array(
    'name'          => esc_html__( 'Product Sidebar', 'unicase' ),
    'id'            => 'single-product-sidebar',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
) ) );

register_sidebar( apply_filters( 'unicase_register_sidebar_args', array(
    'name'          => esc_html__( 'Post Sidebar', 'unicase' ),
    'id'            => 'single-post-sidebar',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
) ) );

register_sidebar( apply_filters( 'unicase_register_sidebar_args', array(
    'name'          => esc_html__( 'About Us Sidebar', 'unicase' ),
    'id'            => 'about-us-sidebar',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
) ) );