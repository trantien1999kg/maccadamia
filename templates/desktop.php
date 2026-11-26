<?php
// Trang chủ và các trang giao diện WEA (template trong thư mục wea/) dùng khung riêng, các trang khác giữ khung cũ
// Trang 404: dùng giao diện WEA, tiêu đề riêng, không cho Google lập chỉ mục
if($template == 'error/404'){
    include_once _source."wea_chung.php";
    $template = 'wea/loi_404';
    $seo->setSeo('title', 'Không tìm thấy trang – WEA Soft');
    $seo->setSeo('description', 'Trang bạn tìm không tồn tại hoặc đã đổi đường dẫn. Quay về trang chủ WEA Soft để tiếp tục.');
    $row_detail['index_robots'] = 'noindex,follow';
    $row_cano = $https_config;
}
if(($source == 'index' && $template == 'index') || strpos($template, 'wea/') === 0){ include _layouts."wea_shell.php"; return; }

// Các trang còn lại (Giới thiệu, Liên hệ, chi tiết bài, Chính sách, 404) giữ phần nội dung cũ nhưng dùng menu + footer WEA
include_once _source."wea_chung.php";
$weaMauChinh = preg_match('/^#([0-9a-f]{3}|[0-9a-f]{6})$/i', trim((string)$row_setting['color_page'])) ? trim($row_setting['color_page']) : '#1F6FEB';
?>
<!DOCTYPE html>

<html lang="<?=$lang?>" itemscope itemtype="http://schema.org/WebSite">

<head>

    <?php include _source.'meta.php' ?>

    <?php include _layouts."css.php"; ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700;800&display=swap">
    <link rel="stylesheet" href="assets/css/wea-khung.css?v=<?=filemtime(_root._ds.'assets/css/wea-khung.css')?>">
    <style>:root{--bl:<?=$weaMauChinh?>}</style>
    <script src="assets/js/all.js"></script>
    <?php if(isset($_GET['link_direct'])){?>
    <script>
    window.onload = function() {
        window.history.pushState('<?= $func->getCurrentPageURL()?>', '<?= $title_seo?>',
            '<?= $_GET['link_direct']?>')
    }
    </script>
    <?php }?>
</head>

<body itemscope itemtype="https://schema.org/WebPage">

    <?=$row_setting["code_body"] ?>

    <?php include _layouts."seo.php"; ?>

    <div id="wrapper">

        <div class="wea-khung wea-dau"><div class="wrap"><?php include _layouts."wea_nav.php"; ?></div></div>

        <div class="o-hidden">

            <div>


                <div class="breadcumb" style="background:url('<?= _upload_hinhanh_l.$bg_breadcrumb['photo']?>') no-repeat fixed center/cover;padding:96px 0 104px;">

                    <div class="title-default mb20 t-center p-relative">

                        <h1>

                            <span>

                                <?php if($seo->getSeo('h1') != ""){?>
                                <?=$seo->getSeo('h1')?>
                                <?php }else{ echo $title_seo;}?>

                            </span>

                        </h1>

                    </div>

                    <?=$str_breadcrumbs?>



                </div>


            </div>

            <?php include _template.$template."_tpl.php";?>

            <div class="wea-khung"><?php include _layouts."wea_footer.php"; ?></div>

        </div>

    </div>

    <?php include _layouts."js.php"; ?>
    <script src="assets/js/lenis.min.js" defer></script>
    <script src="assets/js/wea-cuon.js?v=<?=filemtime(_root._ds.'assets/js/wea-cuon.js')?>" defer></script>
    <script src="assets/js/wea-home.js?v=<?=filemtime(_root._ds.'assets/js/wea-home.js')?>" defer></script>

    <div class="mask-overlay"></div>

</body>



</html>
