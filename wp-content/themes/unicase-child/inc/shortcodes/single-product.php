<?php
function shop_policy_callback () {
    ob_start();
    ?>
    <ul class="hidden-xs shop-policy">
        <li>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon_vanchuyen.png">
            <p>GIAO HÀNG FREE 20KM TRỞ LẠI</p>
        </li>
        <li>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon_thanhtoan.png">
            <p>THANH TOÁN KHI NHẬN HÀNG</p>
        </li>
        <li>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon_dienthoai.png">
            <p>TEL: 0985 675 611 / 0988 964 461<br/>MOBILE: 0985 675 611</p>
        </li>
    </ul>
    <?php

    return ob_get_clean();
}
add_shortcode( 'shop_policy', 'shop_policy_callback' );