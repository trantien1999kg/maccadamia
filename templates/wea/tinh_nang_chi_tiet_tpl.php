<?php
    /* Trang chi tiết 1 tính năng (/tinh-nang/ten-tinh-nang). Dữ liệu ở sources/wea_tinh_nang.php */

    include _template."wea/minh_hoa.php";

    $ma = trim(htmlspecialchars_decode((string)$weaChiTiet['ma'], ENT_QUOTES));
?>
<header style="background:linear-gradient(180deg,#EAF7FF,rgba(255,255,255,0))">
    <div class="wrap">
        <?php include _layouts."wea_nav.php"; ?>
        <div class="phero">
            <nav class="dd" aria-label="Đường dẫn"><a href="./">Trang chủ</a><span aria-hidden="true">/</span><a href="tinh-nang">Tính năng</a></nav>
            <h1><?=weaChu($weaChiTiet['ten'])?></h1>
        </div>
    </div>
</header>

<main>
<section style="padding:24px 0 72px">
    <div class="wrap ctn">
        <div class="ctn-hinh">
            <?php if($weaChiTiet['photo'] != ''){ ?>
            <div class="win"><div style="padding:14px;background:#F6FAFC"><?=weaAnh($weaChiTiet['photo'], $weaChiTiet['ten'], 'fetchpriority="high"', false, 0, 0, _upload_baiviet_l)?></div></div>
            <?php }elseif(isset($weaMinhHoa[$ma])){ ?>
            <?=$weaMinhHoa[$ma]?>
            <?php } ?>
        </div>
        <article class="art ctn-noidung">
            <?php if($weaChiTiet['mota'] != ''){ ?><div class="ctn-mota"><?=weaHtml($weaChiTiet['mota'])?></div><?php } ?>
            <?=weaHtml($weaChiTiet['noidung'])?>
        </article>
    </div>
</section>

<?php if(!empty($weaTinhNangKhac)){ ?>
<section style="padding:0 0 24px">
    <div class="wrap">
        <h2 class="ctn-khac-tieude">Tính năng khác</h2>
        <ul class="ctn-khac">
            <?php foreach($weaTinhNangKhac as $v){ ?>
            <li><a href="tinh-nang/<?=weaChu($v['slug'])?>"><?=weaChu($v['ten'])?></a></li>
            <?php } ?>
        </ul>
    </div>
</section>
<?php } ?>

<section class="sec">
    <div class="wrap">
        <div class="end">
            <h2>Thử một lần cho biết nhé</h2>
            <p>Dùng thử Pro 14 ngày cho cả đội, không cần thẻ thanh toán. Khách mời xem tiến độ miễn phí 100%.</p>
            <div style="margin-top:28px"><a class="pill pg" href="<?=$weaLinkDangKy?>" style="min-height:52px;padding:0 32px">Dùng thử Pro 14 ngày miễn phí</a></div>
        </div>
    </div>
</section>
</main>

<?php include _layouts."wea_footer.php"; ?>
<div id="pgb"></div>
