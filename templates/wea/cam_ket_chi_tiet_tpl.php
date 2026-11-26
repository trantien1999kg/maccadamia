<?php
    /* Trang chi tiết 1 bài Cam kết (/cam-ket/ten-bai). Dữ liệu ở sources/wea_cam_ket.php */
?>
<header style="background:linear-gradient(180deg,#EAF7FF,rgba(255,255,255,0))">
    <div class="wrap">
        <?php include _layouts."wea_nav.php"; ?>
        <div class="phero">
            <nav class="dd" aria-label="Đường dẫn"><a href="./">Trang chủ</a><span aria-hidden="true">/</span><a href="cam-ket">Cam kết</a></nav>
            <h1><?=weaChu($weaChiTiet['ten'])?></h1>
        </div>
    </div>
</header>

<main>
<section style="padding:24px 0 72px">
    <div class="wrap ctn">
        <?php if($weaChiTiet['photo'] != ''){ ?>
        <div class="ctn-hinh">
            <div class="win"><div style="padding:14px;background:#F6FAFC"><?=weaAnh($weaChiTiet['photo'], $weaChiTiet['ten'], 'fetchpriority="high"', false, 0, 0, _upload_baiviet_l)?></div></div>
        </div>
        <?php } ?>
        <article class="art ctn-noidung">
            <?php if($weaChiTiet['mota'] != ''){ ?><div class="ctn-mota"><?=weaHtml($weaChiTiet['mota'])?></div><?php } ?>
            <?=weaHtml($weaChiTiet['noidung'])?>
        </article>
    </div>
</section>

<?php if(!empty($weaCamKetKhac)){ ?>
<section style="padding:0 0 24px">
    <div class="wrap">
        <h2 class="ctn-khac-tieude">Cam kết khác</h2>
        <ul class="ctn-khac">
            <?php foreach($weaCamKetKhac as $v){ ?>
            <li><a href="cam-ket/<?=weaChu($v['slug'])?>"><?=weaChu($v['ten'])?></a></li>
            <?php } ?>
        </ul>
    </div>
</section>
<?php } ?>

<section class="sec">
    <div class="wrap">
        <div class="end">
            <h2>Bắt đầu cùng WEA hôm nay</h2>
            <p>Dùng thử Pro 14 ngày cho cả đội, không cần thẻ thanh toán. Cần tư vấn website, đội ngũ WEA luôn sẵn sàng.</p>
            <div style="margin-top:28px;display:flex;gap:12px;justify-content:center;flex-wrap:wrap"><a class="pill pg" href="<?=$weaLinkDangKy?>" style="min-height:52px;padding:0 32px">Dùng thử miễn phí</a><a class="pill pw" href="lien-he" style="min-height:52px;padding:0 32px">Liên hệ tư vấn</a></div>
        </div>
    </div>
</section>
</main>

<?php include _layouts."wea_footer.php"; ?>
<div id="pgb"></div>
