<?php
	
$default_args = array(
	'main_content'		=> '',
	'sidebar_action'	=> 'unicase_sidebar',
);

if( !empty( $args ) ) {
	$args = array_merge( $default_args, $args );
}

extract( $args );

$page_layout_args = unicase_get_page_layout_args();
?>

<div class="<?php echo esc_attr( apply_filters( 'unicase_container_classes', 'container' ) ); ?>">
	<div class="row">
        <?php if ($page_layout_args['layout_name'] == 'unicase-left-sidebar') : ?>
            <aside id="secondary" class="<?php echo esc_attr( apply_filters( 'unicase_sidebar_area_classes', 'sidebar-area widget-area' ) ); ?>">
                <?php do_action( $sidebar_action ); ?>
            </aside>
        <?php endif; ?>
		<div id="primary" class="<?php echo esc_attr( apply_filters( 'unicase_content_area_classes', 'content-area' ) ); ?>">
			<main class="<?php echo esc_attr( apply_filters( 'unicase_site_main_classes', 'site-main' ) ); ?>">
				<?php echo $main_content; ?>
			</main>
		</div>
        <?php if ($page_layout_args['layout_name'] == 'unicase-right-sidebar') : ?>
            <aside id="secondary" class="<?php echo esc_attr( apply_filters( 'unicase_sidebar_area_classes', 'sidebar-area widget-area' ) ); ?>">
                <?php do_action( $sidebar_action ); ?>
            </aside>
        <?php endif; ?>
	</div>
</div>