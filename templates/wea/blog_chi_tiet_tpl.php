<?php
    /* Chi tiết bài Blog (/tin-tuc/ten-bai). Dữ liệu ở sources/wea_blog.php; Mô tả + Nội dung nhập bằng trình soạn thảo ở admin */
?>
<div class="trang-chu trang-blog">
<header>
    <div class="wrap"><?php include _layouts."wea_nav.php"; ?></div>
</header>

<main>
<article class="wrap bl-bai">
    <nav class="bl-dd" aria-label="Đường dẫn"><a href="./">Trang chủ</a><span aria-hidden="true">/</span><a href="tin-tuc">Blog</a></nav>
    <h1><?=weaChu($weaChiTiet['ten'])?></h1>
    <?php if(!empty($weaChiTiet['ngaytao'])){ ?><time class="bl-ngay" datetime="<?=date('Y-m-d', $weaChiTiet['ngaytao'])?>">Đăng ngày <?=date('d/m/Y', $weaChiTiet['ngaytao'])?></time><?php } ?>
    <?php if($weaChiTiet['photo'] != ''){ ?>
    <div class="bl-bai-anh"><?=weaAnh($weaChiTiet['photo'], $weaChiTiet['ten'], 'fetchpriority="high"', false, 0, 0, _upload_baiviet_l)?></div>
    <?php } ?>
    <?php if($weaChiTiet['mota'] != ''){ ?><div class="bl-bai-mota"><?=weaHtml($weaChiTiet['mota'])?></div><?php } ?>
    <div class="bl-bai-nd"><?=weaHtml($weaChiTiet['noidung'])?></div>
</article>

<?php if(!empty($weaBaiKhac)){ ?>
<section class="wrap bl-khac">
    <h2 class="bl-tieude">Bài viết khác</h2>
    <div class="bl-luoi">
        <?php foreach($weaBaiKhac as $v){ ?>
        <a class="bl-the" href="tin-tuc/<?=weaChu($v['slug'])?>">
            <div class="bl-the-anh"><?php if($v['photo'] != ''){ ?><?=weaAnh($v['photo'], $v['ten'], '', true, 0, 0, _upload_baiviet_l)?><?php }else{ ?><span aria-hidden="true">WEA</span><?php } ?></div>
            <div class="bl-the-chu">
                <h3><?=weaChu($v['ten'])?></h3>
                <?php if($v['mota'] != ''){ ?><p><?=blogMoTa($v['mota'])?></p><?php } ?>
            </div>
        </a>
        <?php } ?>
    </div>
</section>
<?php } ?>

<section class="wrap bl-cta">
    <h2>Thử ngay với đội của bạn</h2>
    <p>Dùng thử Pro 14 ngày cho cả workspace, hoặc bắt đầu với gói Free.</p>
    <div class="nhom-nut"><a class="btn btn-chinh btn-lon" href="<?=$weaLinkDangKy?>">Dùng thử miễn phí<?=weaIcon('arrow', 'ic ic-sm')?></a><a class="btn btn-vien btn-lon" href="lien-he">Liên hệ tư vấn</a></div>
</section>
</main>

<?php include _layouts."wea_footer.php"; ?>
</div>
