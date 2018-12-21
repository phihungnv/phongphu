<?php

if ( ! function_exists( 'main_header_company_info' ) ) {
    function main_header_company_info() {
        ob_start();
        ?>
            <div class="company-info">
                <p class="company-name">CÔNG TY TNHH ĐẦU TƯ VÀ SẢN XUẤT PHONG PHÚ</p>
                <p class="company-address">Địa chỉ: Khu Đào Xá - Phường Phong Khê - T.P Bắc Ninh - Tỉnh Bắc Ninh</p>
                <p class="company-tel">Tel: 0985 675 611 / 0988 964 461&nbsp; &nbsp;&nbsp;   / &nbsp;&nbsp;&nbsp;    Email: phongphu.paper.bn@gmail.com</p>
            </div>
        <?php
        $contact_info = ob_get_clean();
        echo $contact_info;
    }
}

if ( ! function_exists( 'main_header_right' ) ) {
    function main_header_right() {
        ob_start();
        ?>
        <div class="header-right">
            <img src="<?php echo  get_stylesheet_directory_uri(); ?>/images/right-header-img.png"
        </div>
        <?php
        $contact_info = ob_get_clean();
        echo $contact_info;
    }
}
