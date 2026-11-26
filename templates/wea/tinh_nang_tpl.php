<?php
    /* Trang Tính năng (/tinh-nang) theo ảnh mẫu 23/11/2026. Dữ liệu ở sources/wea_tinh_nang.php (admin: bài viết "Tính năng")
       - Banner: Hình của mục admin "Tính năng: Đầu trang" (chưa nhập thì dùng upload/hinhanh/wea-tinh-nang-banner.webp), chữ HTML bên trái (admin "Tính năng: đầu trang")
       - Lưới "Khám phá tính năng": mỗi bài 1 thẻ (ảnh đại diện + tên ngắn + mô tả); bấm thẻ mở trang chi tiết.
         Tên trên thẻ = "Tên 2" của bài (tên ngắn), bỏ trống thì dùng Tên; bài chưa có hình giữ khung nền xanh nhạt */
?>
<div class="trang-chu trang-blog trang-tn">
<header>
    <div class="wrap"><?php include _layouts."wea_nav.php"; ?></div>
</header>

<main>
<section class="bl-hero tn-hero"<?php $nenTn = weaAnhAdmin(isset($weaDauTrang['photo']) ? $weaDauTrang['photo'] : '', 'wea-tinh-nang-banner.webp', true); ?><?=$nenTn != '' ? ' style="--bl-nen:url('.weaChu($nenTn).')"' : ''?>>
    <div class="wrap">
        <span class="nhan">Tính năng</span>
        <h1><?=weaTieuDeDong(!empty($weaDauTrang['ten']) ? $weaDauTrang['ten'] : 'Mọi thứ bạn cần để việc trôi chảy, và không thừa thứ nào.')?></h1>
        <?php if(!empty($weaDauTrang['mota'])){ ?><p><?=weaChu($weaDauTrang['mota'])?></p><?php } ?>
    </div>
</section>

<div class="wrap bl-than">
    <?php if(!empty($weaTinhNang)){ ?>
    <h2 class="bl-tieude">Khám phá tính năng</h2>
    <div class="bl-luoi tn-luoi">
        <?php foreach($weaTinhNang as $k => $v){ $tenNgan = trim((string)$v['ten2']) != '' ? $v['ten2'] : $v['ten']; ?>
        <a class="bl-the tn-the" href="tinh-nang/<?=weaChu($v['slug'])?>">
            <div class="bl-the-anh"><?php if($v['photo'] != ''){ ?><?=weaAnh($v['photo'], $tenNgan, '', $k > 2, 0, 0, _upload_baiviet_l)?><?php }else{ ?><span aria-hidden="true">WEA</span><?php } ?></div>
            <div class="bl-the-chu">
                <h3><?=weaChu($tenNgan)?></h3>
                <?php if($v['mota'] != ''){ ?><p><?=weaChu(trim(strip_tags(htmlspecialchars_decode($v['mota'], ENT_QUOTES))))?></p><?php } ?>
            </div>
            <span class="tn-mui" aria-hidden="true"><?=weaIcon('arrow', 'ic ic-sm')?></span>
        </a>
        <?php } ?>
    </div>
    <?php }else{ ?>
    <p class="trong">Chưa có tính năng nào. <a href="./">Về trang chủ</a></p>
    <?php } ?>
</div>

<section class="wrap bl-cta">
    <h2>Thử một lần cho biết nhé</h2>
    <p>Dùng thử Pro 14 ngày cho cả workspace. Khách mời xem tiến độ miễn phí.</p>
    <div class="nhom-nut"><a class="btn btn-chinh btn-lon" href="<?=$weaLinkDangKy?>">Dùng thử miễn phí<?=weaIcon('arrow', 'ic ic-sm')?></a><a class="btn btn-vien btn-lon" href="lien-he">Liên hệ tư vấn</a></div>
</section>
</main>

<?php include _layouts."wea_footer.php"; ?>
</div>
