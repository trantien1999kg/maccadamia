<?php
    /* Trang Giải pháp WEA Task (/giai-phap-wea-task), theo ảnh mẫu 18/11/2026. Dữ liệu ở sources/wea_giai_phap.php */

    $dauDong = weaDong(isset($wtDau['mota']) ? $wtDau['mota'] : '');
    $iconNoiBat = array('team', 'chart', 'layers');
    $iconNhip = array(array('chat', 'xanh'), array('calendar', 'cam'), array('team', 'tim'));
    $iconKeHoach = array('kanban', 'gantt', 'users', 'chart', 'layers', 'grid');
    $iconPhoiHop = array(array('chat', 'xanh'), array('calendar', 'cam'), array('bolt', 'la'), array('grid', 'tim'));
    $iconExt = array('gantt', 'users', 'chart', 'shield', 'bolt', 'kanban', 'chat', 'calendar', 'layers', 'cog');
    $mauExt = array('xanh', 'la', 'cam', 'tim');
    $comboDongCuoi = isset($comboDong[2]) ? $comboDong[2] : '';
?>
<div class="trang-chu trang-gp trang-wt">
<header class="gp-hero">
    <div class="wrap"><?php include _layouts."wea_nav.php"; ?></div>
    <div class="wrap gp-hero-luoi">
        <div class="gp-hero-chu">
            <nav class="gp-dd" aria-label="Đường dẫn"><a href="./">Trang chủ</a><span aria-hidden="true">/</span><span>Giải pháp</span><span aria-hidden="true">/</span><span aria-current="page">WEA Task</span></nav>
            <span class="nhan">WEA Task</span>
            <h1><?=!empty($wtDau['ten']) ? weaTieuDeDong($wtDau['ten']) : 'WEA Task giúp đội của bạn nhìn rõ việc đang diễn ra'?></h1>
            <?php if(!empty($dauDong[0])){ ?><p class="gp-dan"><?=weaChu($dauDong[0])?></p><?php } ?>
            <div class="nhom-nut">
                <a class="btn btn-chinh btn-lon" href="<?=$weaLinkDangKy?>">Bắt đầu miễn phí<?=weaIcon('arrow', 'ic ic-sm')?></a>
                <a class="btn btn-vien btn-lon" href="giai-phap-wea-task#bang-gia">Xem gói &amp; giá<?=weaIcon('external', 'ic ic-sm')?></a>
            </div>
            <?php if(count($dauDong) > 1){ ?>
            <ul class="gp-noibat">
                <?php foreach(array_slice($dauDong, 1, 3) as $k => $dong){ ?><li><?=weaIcon($iconNoiBat[$k], 'ic ic-sm')?><span><?=weaChu($dong)?></span></li><?php } ?>
            </ul>
            <?php } ?>
        </div>
        <?php $dsAnh = $wtSlide; $nhanAnh = 'Giao diện WEA Task'; $kieuAnh = 'tab'; include _template."wea/khoi_thu_vien_anh.php"; ?>
    </div>
</header>

<main>
<nav class="wrap gp-muc" aria-label="Các phần của trang">
    <a class="on" href="giai-phap-wea-task#tong-quan"><?=weaIcon('layers', 'ic ic-sm')?>Tổng quan</a>
    <a href="giai-phap-wea-task#van-hanh"><?=weaIcon('grid', 'ic ic-sm')?>Tính năng</a>
    <a href="giai-phap-wea-task#phoi-hop"><?=weaIcon('team', 'ic ic-sm')?>Cộng tác</a>
    <a href="giai-phap-wea-task#bang-gia"><?=weaIcon('cart', 'ic ic-sm')?>Gói &amp; giá</a>
    <?php if(!empty($wtExtDs)){ ?><a href="giai-phap-wea-task#extension"><?=weaIcon('bolt', 'ic ic-sm')?>Extension</a><?php } ?>
</nav>

<?php if(!empty($wtNhip) && !empty($wtNhipThe)){ ?>
<section class="khoi" id="tong-quan">
    <div class="wrap">
        <h2 class="tieu-de"><?=weaTieuDeDong($wtNhip['ten'])?></h2>
        <p class="mota-khoi"><?=weaChu($wtNhip['mota'])?></p>
        <div class="luoi-3">
            <?php foreach($wtNhipThe as $k => $v){ $ic = $iconNhip[$k % 3]; ?>
            <div class="the gp-nhip nen-<?=$ic[1]?>">
                <span class="o-icon o-<?=$ic[1]?>"><?=weaIcon($ic[0])?></span>
                <h3><?=weaChu($v['ten'])?></h3>
                <p><?=weaChu($v['mota'])?></p>
                <?php if($v['ten2'] != ''){ ?><p class="gp-nhip-giai"><span class="o-<?=$ic[1]?>"><?=weaIcon('arrow', 'ic ic-sm')?></span><?=weaChu($v['ten2'])?></p><?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>

<?php if(!empty($wtKeHoach) && !empty($wtKeHoachTab)){ ?>
<section class="khoi" id="van-hanh">
    <div class="wrap">
        <h2 class="tieu-de"><?=weaTieuDeDong($wtKeHoach['ten'])?></h2>
        <p class="mota-khoi"><?=weaChu($wtKeHoach['mota'])?></p>
        <div class="tab-ds gp-tab-ds" role="tablist" aria-label="Cách WEA Task vận hành" data-tabwea>
            <?php foreach($wtKeHoachTab as $k => $v){ ?>
            <button type="button" role="tab" id="tab-kh-<?=$v['id']?>" aria-controls="pane-kh-<?=$v['id']?>" aria-selected="<?=$k == 0 ? 'true' : 'false'?>" class="<?=$k == 0 ? 'on' : ''?>"><?=weaIcon($iconKeHoach[$k % 6], 'ic ic-sm')?><?=weaChu($v['ten'])?></button>
            <?php } ?>
        </div>
        <?php foreach($wtKeHoachTab as $k => $v){ $anh = $v['photo'] != '' ? weaAnh($v['photo'], $v['ten2'] != '' ? $v['ten2'] : $v['ten']) : ''; ?>
        <div class="tab-pane<?=$k == 0 ? ' on' : ''?><?=$anh == '' ? ' gp-khong-anh' : ''?>" role="tabpanel" id="pane-kh-<?=$v['id']?>" aria-labelledby="tab-kh-<?=$v['id']?>">
            <?php if($anh != ''){ ?><div class="tab-anh"><?=$anh?></div><?php } ?>
            <div class="tab-chu">
                <h3><?=weaChu($v['ten2'] != '' ? $v['ten2'] : $v['ten'])?></h3>
                <div class="noi-dung-tich"><?=weaHtml($v['mota'])?></div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>
<?php } ?>

<?php if(!empty($wtPhoiHop) && !empty($wtPhoiHopThe)){ ?>
<section class="khoi" id="phoi-hop">
    <div class="wrap">
        <h2 class="tieu-de"><?=weaTieuDeDong($wtPhoiHop['ten'])?></h2>
        <p class="mota-khoi"><?=weaChu($wtPhoiHop['mota'])?></p>
        <div class="gp-ph-luoi">
            <?php foreach($wtPhoiHopThe as $k => $v){ $ic = $iconPhoiHop[$k % 4]; $anh = $v['photo'] != '' ? weaAnh($v['photo'], $v['ten']) : ''; ?>
            <div class="the gp-ph nen-<?=$ic[1]?><?=$anh == '' ? ' gp-ph-chu' : ''?>">
                <div class="gp-ph-noi">
                    <span class="o-icon o-<?=$ic[1]?>"><?=weaIcon($ic[0])?></span>
                    <h3><?=weaChu($v['ten'])?></h3>
                    <p><?=weaChu($v['mota'])?></p>
                </div>
                <?php if($anh != ''){ ?><div class="gp-ph-anh"><?=$anh?></div><?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>

<?php
    // Bảng gói dùng chung với trang chủ, chỉ đổi chữ đầu khối
    $bangGiaNhan = 'Gói &amp; giá';
    if(!empty($wtGoi['ten'])) $bangGiaTieuDe = weaTieuDeDong($wtGoi['ten']);
    if(!empty($wtGoi['mota'])) $bangGiaMoTa = weaChu($wtGoi['mota']);
    include _template."wea/khoi_bang_gia.php";
?>

<?php if(!empty($wtExtDs)){ ?>
<section class="khoi" id="extension">
    <div class="wrap">
        <div class="gp-dau-khoi">
            <span class="o-icon o-xanh"><?=weaIcon('bolt')?></span>
            <div>
                <h2 class="tieu-de"><?=!empty($wtExt['ten']) ? weaTieuDeDong($wtExt['ten']) : 'Chỉ mua thêm những gì đội bạn cần'?></h2>
                <?php if(!empty($wtExt['mota'])){ ?><p class="mota-khoi"><?=weaChu($wtExt['mota'])?></p><?php } ?>
            </div>
        </div>
        <div class="gp-bang">
            <table>
                <thead><tr><th scope="col">Tính năng</th><th scope="col">Bạn có thể làm gì</th><th scope="col">Giá / seat / tháng</th></tr></thead>
                <tbody>
                    <?php foreach($wtExtDs as $k => $v){ $gia = trim(htmlspecialchars_decode((string)$v['ten2'], ENT_QUOTES)); $laSo = preg_match('/^\d[\d.]*$/', $gia); ?>
                    <tr>
                        <th scope="row"><span class="gp-bang-ten"><span class="gp-bang-ic o-<?=$mauExt[$k % 4]?>"><?=weaIcon($iconExt[$k % 10], 'ic ic-sm')?></span><?=weaChu($v['ten'])?></span></th>
                        <td><?=weaChu($v['mota'])?></td>
                        <td><span class="gp-gia<?=$laSo ? '' : ' gp-gia-chu'?>"><?=$laSo ? weaTien(str_replace('.', '', $gia)) : weaChu($gia != '' ? $gia : 'Liên hệ')?></span><?php if($laSo){ ?><small class="gp-gia-dv">/ seat / tháng</small><?php } ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="gp-bang-cuoi">
                <p><?=weaIcon('question', 'ic ic-sm')?>Tính năng đã có trong gói không cần mua lại.</p>
                <a class="btn btn-chinh" href="<?=$weaLinkApp?>">Đăng nhập để mua thêm<?=weaIcon('arrow', 'ic ic-sm')?></a>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<?php if(!empty($wtTokenDs)){ ?>
<section class="khoi" id="token-ai">
    <div class="wrap">
        <div class="gp-dau-khoi">
            <span class="o-icon o-xanh"><?=weaIcon('layers')?></span>
            <div>
                <h2 class="tieu-de"><?=!empty($wtToken['ten']) ? weaTieuDeDong($wtToken['ten']) : 'Mua thêm token AI'?></h2>
                <?php if(!empty($wtToken['mota'])){ ?><p class="mota-khoi"><?=weaChu($wtToken['mota'])?></p><?php } ?>
            </div>
        </div>
        <div class="luoi-3 gp-token">
            <?php foreach($wtTokenDs as $k => $v){ $gia = trim(htmlspecialchars_decode((string)$v['ten2'], ENT_QUOTES)); $laSo = preg_match('/^\d[\d.]*$/', $gia); ?>
            <div class="the gp-token-the mau-<?=$k % 4?><?=(int)$v['number'] == 1 ? ' noi-bat' : ''?>">
                <?php if((int)$v['number'] == 1){ ?><span class="gp-token-nhan">Phổ biến</span><?php } ?>
                <span class="ic-mau"><?=weaIcon('layers')?></span>
                <div>
                    <h3><?=weaChu($v['ten'])?></h3>
                    <p class="gp-token-gia"><b><?=$laSo ? weaTien(str_replace('.', '', $gia)) : weaChu($gia)?></b><?php if($v['chuLink'] != ''){ ?><span>/ <?=weaChu($v['chuLink'])?></span><?php } ?></p>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>

<?php if(!empty($wtCombo) && $comboGia > 0 && !empty($wtComboMuc)){ ?>
<section class="khoi" id="combo">
    <div class="wrap">
        <div class="gp-combo">
            <?php if(!empty($wtCombo['photo'])){ ?><div class="gp-combo-anh"><?=weaAnh($wtCombo['photo'], $wtCombo['ten'])?></div><?php } ?>
            <div class="gp-combo-chu">
                <h2><?=weaIcon('star', 'ic')?><?=weaChu($wtCombo['ten'])?></h2>
                <?php if(!empty($comboDong[0])){ ?><p class="gp-combo-mota"><?=weaChu($comboDong[0])?></p><?php } ?>
                <ul class="gp-combo-ds">
                    <?php foreach($wtComboMuc as $k => $v){ $giaRieng = (int)preg_replace('/[^0-9]/', '', htmlspecialchars_decode((string)$v['ten2'], ENT_QUOTES)); ?>
                    <li><span class="o-icon o-<?=$k % 2 ? 'tim' : 'xanh'?>"><?=weaIcon($k % 2 ? 'layers' : 'globe')?></span><span><b><?=weaChu($v['ten'])?></b><small><?=weaChu($v['mota'])?></small></span><?php if($giaRieng > 0){ ?><em><?=weaTien($giaRieng)?></em><?php } ?></li>
                    <?php } ?>
                </ul>
                <?php if($comboDongCuoi != ''){ ?><p class="gp-combo-ghichu"><?=weaIcon('question', 'ic ic-sm')?><?=weaChu($comboDongCuoi)?></p><?php } ?>
            </div>
            <div class="gp-combo-gia">
                <span class="gp-combo-nhan">Giá combo</span>
                <b><?=weaTien($comboGia)?></b>
                <?php if($comboMuaRieng > $comboGia){ ?>
                <p>Mua riêng: <s><?=weaTien($comboMuaRieng)?></s></p>
                <span class="gp-combo-tiet">Tiết kiệm <?=weaTien($comboMuaRieng - $comboGia)?></span>
                <?php } ?>
                <a class="btn btn-chinh" href="lien-he">Nhận tư vấn combo<?=weaIcon('arrow', 'ic ic-sm')?></a>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<section class="khoi khoi-cuoi">
    <div class="wrap">
        <div class="gp-cuoi">
            <div>
                <h2><?=!empty($wtCuoi['ten']) ? weaTieuDeDong($wtCuoi['ten']) : 'Muốn xem WEA Task có hợp với cách đội bạn đang làm việc không?'?></h2>
                <?php if(!empty($wtCuoi['mota'])){ ?><p><?=weaChu($wtCuoi['mota'])?></p><?php } ?>
            </div>
            <div class="nhom-nut">
                <a class="btn btn-chinh btn-lon" href="<?=$weaLinkDangKy?>">Bắt đầu miễn phí<?=weaIcon('arrow', 'ic ic-sm')?></a>
                <a class="btn btn-vien btn-lon" href="tinh-nang"><?=weaIcon('play', 'ic ic-sm')?>Xem tính năng</a>
            </div>
        </div>
    </div>
</section>
</main>

<?php include _layouts."wea_footer.php"; ?>
</div>
