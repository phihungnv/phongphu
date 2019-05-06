<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package unicase
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

    <?php
        if (comments_open()) {
            echo do_shortcode('[gs-fb-comments]');
        }
    ?>

</div><!-- #comments -->
