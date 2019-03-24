<?php

require get_stylesheet_directory() . '/inc/structure/hooks.php';
require get_stylesheet_directory() . '/inc/structure/header.php';
require get_stylesheet_directory() . '/inc/widgets/Recent_News_Widget.php';

function register_recent_news_widget() {
    register_widget( 'Recent_News_Widget' );
}
add_action( 'widgets_init', 'register_recent_news_widget' );