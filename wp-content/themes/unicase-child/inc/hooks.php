<?php
/**
 * Move review to bottom of single product
 */
add_action( 'woocommerce_after_single_product_summary', 'comments_template', 50 );

/**
 * Replace social sharing
 */
add_action( 'woocommerce_share', 'custom_social_share', 10 );
//remove_action('woocommerce_share', 'unicase_single_product_share_icons', 10);
add_action( 'unicase_single_post', 'custom_social_share', 60 );
function custom_social_share() {
    echo do_shortcode('[Sassy_Social_Share]');
}

/**
 * Related Posts by Taxonomy
 */
add_action( 'unicase_single_post_after', 'show_related_post_taxonomy', 11 );
function show_related_post_taxonomy() {
    echo do_shortcode('[related_posts_by_tax posts_per_page="4" format="thumbnails" image_size="medium" columns="4"]');
}