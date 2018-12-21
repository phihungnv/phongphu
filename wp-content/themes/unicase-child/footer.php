<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package unicase
 */
?>
	</div><!-- #content -->

	<?php 
	do_action( 'unicase_before_footer' ); ?>
	
	<!-- ========================================= FOOTER ========================================= -->
	<footer id="colophon" class="site-footer color-bg">
			
			<?php
			/**
			 * @hooked unicase_footer_top_widgets - 10
			 * @hooked unicase_footer_bottom_widgets - 20
			 * @hooked unicase_credit - 30
			 */
            if (!is_front_page()) {
                remove_action('unicase_footer',	'unicase_footer_content_top',10);
            }
            remove_action('unicase_footer',	'unicase_footer_content_middle',20);
			do_action( 'unicase_footer' ); ?>

	</footer><!-- #colophon -->
		
	<?php 
	do_action( 'unicase_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>