<?php
    /* Trang Thiết kế & Phát triển Website (/thiet-ke-website), theo ảnh mẫu 18/11/2026. Dữ liệu + xử lý form ở sources/wea_thiet_ke_web.php */

    $dauDong = weaDong(isset($webDau['mota']) ? $webDau['mota'] : '');
    $haiMatDong = weaDong(isset($webHaiMat['mota']) ? $webHaiMat['mota'] : '');
    $iconNangLuc = array(array('star', 'tim'), array('grid', 'xanh'), array('layers', 'tim'), array('cog', 'tim'));
    $iconMoHinh = array(array('cart', 'cam'), array('calendar', 'xanh'), array('book', 'la'), array('play', 'tim'), array('team', 'xanh'), array('layers', 'cam'));
    $iconBuoc = array('search', 'star', 'grid', 'shield', 'bolt', 'check');
    $iconNenTang = array(array('grid', 'xanh'), array('search', 'cam'), array('shield', 'la'), array('layers', 'xanh'));
    $tvCo = function($k) use ($tvLoi){ return isset($tvLoi[$k]); };
?>
<div class="trang-chu trang-gp trang-web">
<header class="gp-hero">
    <div class="wrap"><?php include _layouts."wea_nav.php"; ?></div>
    <div class="wrap gp-hero-luoi">
        <div class="gp-hero-chu">
            <nav class="gp-dd" aria-label="Đường dẫn"><a href="./">Trang chủ</a><span aria-hidden="true">/</span><span>Dịch vụ</span><span aria-hidden="true">/</span><span aria-current="page">Thiết kế &amp; Phát triển Website</span></nav>
            <span class="nhan">Dịch vụ của WEA Soft</span>
            <h1><?=!empty($webDau['ten']) ? weaTieuDeDong($webDau['ten']) : 'Thiết kế &amp; phát triển website'?></h1>
            <?php if(!empty($dauDong[0])){ ?><p class="gp-dan"><?=weaChu($dauDong[0])?></p><?php } ?>
            <div class="nhom-nut">
                <a class="btn btn-chinh btn-lon" href="thiet-ke-website#tu-van">Trao đổi dự án<?=weaIcon('arrow', 'ic ic-sm')?></a>
                <?php if(!empty($webMoHinhThe)){ ?><a class="btn btn-vien btn-lon" href="thiet-ke-website#mo-hinh"><?=weaIcon('play', 'ic ic-sm')?>Xem các mô hình</a><?php } ?>
            </div>
            <?php if(count($dauDong) > 1){ ?>
            <ul class="web-tich">
                <?php foreach(array_slice($dauDong, 1, 4) as $dong){ ?><li><?=weaIcon('check', 'ic ic-sm')?><span><?=weaChu($dong)?></span></li><?php } ?>
            </ul>
            <?php } ?>
        </div>
        <?php $dsAnh = $webSlide; $nhanAnh = 'Mẫu website do WEA Soft thiết kế'; include _template."wea/khoi_thu_vien_anh.php"; ?>
    </div>
    <?php if(!empty($webNangLuc)){ ?>
    <div class="wrap">
        <ul class="web-nang-luc">
            <?php foreach($webNangLuc as $k => $v){ $ic = $iconNangLuc[$k % 4]; ?>
            <li><span class="o-icon o-<?=$ic[1]?>"><?=weaIcon($ic[0])?></span><span><b><?=weaChu($v['ten'])?></b><small><?=weaChu($v['mota'])?></small></span></li>
            <?php } ?>
        </ul>
    </div>
    <?php } ?>
</header>

<main>
<?php if(!empty($webMoHinhThe)){ ?>
<section class="khoi web-nen-trang" id="mo-hinh">
    <div class="wrap">
        <div class="web-dau-giua">
            <h2 class="tieu-de"><?=!empty($webMoHinh['ten']) ? weaTieuDeDong($webMoHinh['ten']) : 'Mỗi mô hình kinh doanh, một giải pháp website phù hợp'?></h2>
            <?php if(!empty($webMoHinh['mota'])){ ?><p class="mota-khoi"><?=weaChu($webMoHinh['mota'])?></p><?php } ?>
        </div>
        <?php // Lưới 3 cột: mỗi thẻ ảnh mẫu trên nền pastel ở trên, chữ + nhãn ở dưới; màu nền đi theo thứ tự thẻ ?>
        <div class="web-mh2-luoi">
            <?php foreach($webMoHinhThe as $k => $v){
                $ic = $iconMoHinh[$k % 6];
                $nhan = array_filter(array_map('trim', explode(',', htmlspecialchars_decode((string)$v['ten2'], ENT_QUOTES))), 'strlen');
                $anh = $v['photo'] != '' ? weaAnh($v['photo'], 'Mẫu website '.$v['ten']) : '';
            ?>
            <article class="web-mh2 mau-<?=$k % 6?>">
                <?php if($anh != ''){ ?><div class="web-mh2-anh"><?=$anh?></div><?php } ?>
                <div class="web-mh2-chu">
                    <h3><span class="web-mh2-ic o-<?=$ic[1]?>"><?=weaIcon($ic[0], 'ic')?></span><?=weaChu($v['ten'])?></h3>
                    <p><?=weaChu($v['mota'])?></p>
                    <?php if(!empty($nhan)){ ?><ul class="web-nhan"><?php foreach($nhan as $n){ ?><li><?=weaChu($n)?></li><?php } ?></ul><?php } ?>
                    <?php if($v['link'] != ''){ ?><a class="link-mui" href="<?=weaChu($v['link'])?>"><?=weaChu($v['chuLink'] != '' ? $v['chuLink'] : 'Xem mô hình')?><?=weaIcon('arrow', 'ic ic-sm')?></a><?php } ?>
                </div>
            </article>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>

<?php if(!empty($webHaiMat)){ ?>
<section class="khoi">
    <div class="wrap web-hm2">
        <div class="web-hm2-chu">
            <h2 class="tieu-de"><?=weaTieuDeDong($webHaiMat['ten'])?></h2>
            <?php if(!empty($haiMatDong[0])){ ?><p class="mota-khoi"><?=weaChu($haiMatDong[0])?></p><?php } ?>
            <?php if(count($haiMatDong) > 1){ ?>
            <ul class="web-tich">
                <?php foreach(array_slice($haiMatDong, 1) as $dong){ ?><li><?=weaIcon('check', 'ic ic-sm')?><span><?=weaChu($dong)?></span></li><?php } ?>
            </ul>
            <?php } ?>
        </div>
        <?php if(!empty($webHaiMatAnh)){ ?>
        <?php // Ảnh 1 (giao diện khách) nằm trước, thấp bên trái; ảnh 2 (quản trị) nằm sau, cao bên phải, chồng nhẹ lên nhau ?>
        <div class="web-hm2-anh">
            <?php $soAnh = 0; foreach($webHaiMatAnh as $k => $v){ $anh = weaAnh($v['photo'], $v['ten'] != '' ? $v['ten'] : 'Giao diện website'); if($anh == '' || $soAnh == 2) continue; $soAnh++; ?>
            <figure class="web-hm2-hinh web-hm2-hinh-<?=$soAnh?>">
                <figcaption><?=weaIcon($soAnh == 1 ? 'users' : 'cog', 'ic ic-sm')?><?=$v['ten'] != '' ? weaChu($v['ten']) : 'Giao diện website'?></figcaption>
                <div class="web-hm2-khung"><span class="web-khung-cham" aria-hidden="true"><i></i><i></i><i></i></span><?=$anh?></div>
            </figure>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</section>
<?php } ?>

<?php if(!empty($webQuyTrinhBuoc)){ ?>
<section class="khoi web-nen-trang">
    <div class="wrap">
        <div class="web-dau-trai">
            <h2 class="tieu-de"><?=!empty($webQuyTrinh['ten']) ? weaTieuDeDong($webQuyTrinh['ten']) : 'Quy trình triển khai rõ ràng, minh bạch'?></h2>
            <?php if(!empty($webQuyTrinh['mota'])){ ?><p class="mota-khoi"><?=weaChu($webQuyTrinh['mota'])?></p><?php } ?>
        </div>
        <ol class="web-tl">
            <?php foreach($webQuyTrinhBuoc as $k => $v){ ?>
            <li>
                <span class="web-tl-ic"><?=weaIcon($iconBuoc[$k % 6])?></span>
                <span class="web-tl-so" aria-hidden="true"><?=str_pad($k + 1, 2, '0', STR_PAD_LEFT)?></span>
                <h3><?=weaChu($v['ten'])?></h3>
                <p><?=weaChu($v['mota'])?></p>
            </li>
            <?php } ?>
        </ol>
    </div>
</section>
<?php } ?>

<?php if(!empty($webNenTangO)){ ?>
<section class="khoi">
    <div class="wrap web-nt">
        <div class="web-nt-trai">
            <h2 class="tieu-de"><?=!empty($webNenTang['ten']) ? weaTieuDeDong($webNenTang['ten']) : 'Nền tảng vững chắc cho sự phát triển lâu dài'?></h2>
            <?php if(!empty($webNenTang['mota'])){ ?><p class="mota-khoi"><?=weaChu($webNenTang['mota'])?></p><?php } ?>
        </div>
        <ul class="web-nt-ds">
            <?php foreach($webNenTangO as $k => $v){ $ic = $iconNenTang[$k % 4]; ?>
            <li><span class="o-icon o-<?=$ic[1]?>"><?=weaIcon($ic[0])?></span><span><b><?=weaChu($v['ten'])?></b><small><?=weaChu($v['mota'])?></small></span></li>
            <?php } ?>
        </ul>
    </div>
</section>
<?php } ?>

<section class="khoi khoi-cuoi" id="tu-van">
    <div class="wrap">
        <div class="web-form">
            <div class="web-form-trai">
                <h2><?=!empty($webForm['ten']) ? weaTieuDeDong($webForm['ten']) : 'Bạn đang muốn xây dựng website như thế nào?'?></h2>
                <?php if(!empty($webForm['mota'])){ ?><p><?=weaChu($webForm['mota'])?></p><?php } ?>
            </div>
            <form class="web-form-phai" method="post" action="thiet-ke-website#tu-van" novalidate data-tuvan>
                <input type="hidden" name="wea_tu_van" value="1">
                <input type="hidden" name="ma" value="<?=weaChu($tvMa)?>">
                <div class="web-an" aria-hidden="true"><label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
                <div class="web-o">
                    <label for="tv-ho-ten">Họ và tên <span aria-hidden="true">*</span></label>
                    <input id="tv-ho-ten" name="ho_ten" type="text" maxlength="100" autocomplete="name" placeholder="Nhập họ và tên" value="<?=weaChu($tvGiu['ho_ten'])?>" required<?=$tvCo('ho_ten') ? ' aria-invalid="true"' : ''?> aria-describedby="tv-loi-ho_ten">
                    <p class="web-loi" id="tv-loi-ho_ten"><?=isset($tvLoi['ho_ten']) ? weaChu($tvLoi['ho_ten']) : ''?></p>
                </div>
                <div class="web-o">
                    <label for="tv-lien-he">Email hoặc số điện thoại <span aria-hidden="true">*</span></label>
                    <input id="tv-lien-he" name="lien_he" type="text" maxlength="150" autocomplete="email" placeholder="Nhập email hoặc số điện thoại" value="<?=weaChu($tvGiu['lien_he'])?>" required<?=$tvCo('lien_he') ? ' aria-invalid="true"' : ''?> aria-describedby="tv-loi-lien_he">
                    <p class="web-loi" id="tv-loi-lien_he"><?=isset($tvLoi['lien_he']) ? weaChu($tvLoi['lien_he']) : ''?></p>
                </div>
                <div class="web-o web-o-rong">
                    <label for="tv-loai">Loại website <span aria-hidden="true">*</span></label>
                    <select id="tv-loai" name="loai" required<?=$tvCo('loai') ? ' aria-invalid="true"' : ''?> aria-describedby="tv-loi-loai">
                        <option value="">Chọn mô hình website</option>
                        <?php foreach($loaiWeb as $l){ ?><option value="<?=weaChu($l)?>"<?=$tvGiu['loai'] === $l ? ' selected' : ''?>><?=weaChu($l)?></option><?php } ?>
                    </select>
                    <p class="web-loi" id="tv-loi-loai"><?=isset($tvLoi['loai']) ? weaChu($tvLoi['loai']) : ''?></p>
                </div>
                <div class="web-o web-o-rong">
                    <label for="tv-nhu-cau">Nhu cầu / yêu cầu dự án <span aria-hidden="true">*</span></label>
                    <textarea id="tv-nhu-cau" name="nhu_cau" rows="4" maxlength="3000" placeholder="Mô tả ngắn gọn mục tiêu, tính năng hoặc yêu cầu đặc biệt của bạn..." required<?=$tvCo('nhu_cau') ? ' aria-invalid="true"' : ''?> aria-describedby="tv-loi-nhu_cau"><?=weaChu($tvGiu['nhu_cau'])?></textarea>
                    <p class="web-loi" id="tv-loi-nhu_cau"><?=isset($tvLoi['nhu_cau']) ? weaChu($tvLoi['nhu_cau']) : ''?></p>
                </div>
                <div class="web-form-cuoi">
                    <p class="web-thong-bao<?=$tvXong ? ' ok' : ''?>" role="status" aria-live="polite"><?=weaChu($tvThongBao)?></p>
                    <button type="submit" class="btn btn-chinh btn-lon"><?=weaIcon('arrow', 'ic ic-sm')?><span>Gửi yêu cầu tư vấn</span></button>
                </div>
            </form>
        </div>
    </div>
</section>
</main>

<?php include _layouts."wea_footer.php"; ?>
</div>
