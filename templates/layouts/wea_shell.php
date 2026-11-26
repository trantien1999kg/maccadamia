<?php
    /* Khung HTML gọn cho các trang WEA (trang chủ, tính năng, blog): không nạp bộ CSS/JS cũ (jQuery, slider...) để trang nhẹ và đúng thiết kế */

    // Chỉ nhận mã màu dạng #RGB / #RRGGBB, sai định dạng thì dùng màu mặc định của thiết kế
    function weaMau($mau, $macDinh)
    {
        $mau = trim((string)$mau);
        return preg_match('/^#([0-9a-f]{3}|[0-9a-f]{6})$/i', $mau) ? $mau : $macDinh;
    }
?>
<!DOCTYPE html>
<html lang="<?=$lang?>">
<head>
    <?php include _source.'meta.php' ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700;800&display=swap">
    <link rel="stylesheet" href="assets/css/wea-home.css?v=<?=filemtime(_root._ds.'assets/css/wea-home.css')?>">
    <style>
        /* Màu nhập trong admin (Cấu hình chung): 2 màu nền + màu chữ. 2 màu còn lại (--amber, --pink) đang cố định trong wea-home.css */
        :root{
            --bl:<?=weaMau($row_setting['color_page'], '#0B7FC4')?>;
            --gr:<?=weaMau($row_setting['color_phu'], '#10B981')?>;
            --ink:<?=weaMau($row_setting['color_text'], '#10263A')?>;
        }
    </style>
    <?=$weaSchema?>
</head>
<body>
    <?=$row_setting["code_body"] ?>
    <?php include _template.$template."_tpl.php"; ?>
    <script src="assets/js/lenis.min.js" defer></script>
    <script src="assets/js/wea-cuon.js?v=<?=filemtime(_root._ds.'assets/js/wea-cuon.js')?>" defer></script>
    <script src="assets/js/wea-home.js?v=<?=filemtime(_root._ds.'assets/js/wea-home.js')?>" defer></script>
</body>
</html>
