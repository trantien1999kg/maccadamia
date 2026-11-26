<?php
    /* Ảnh đầu trang (Giải pháp WEA Task, Thiết kế website). Cần: $dsAnh (từ weaDanhSach), $nhanAnh (alt mặc định).
       - Mặc định: 1 ảnh lớn + tối đa 3 ảnh nhỏ, bấm ảnh nhỏ thì đổi chỗ với ảnh lớn (JS [data-thuvien]).
       - $kieuAnh = 'tab': 1 ảnh lớn + thanh tab có mũi tên (chữ tab = Tên 2), bấm tab thì đổi ảnh (JS [data-anhtab]).
         Mọi ảnh nằm sẵn trong khung, chỉ ẩn / hiện, nên đổi tab nhiều lần không tải lại ảnh */
    if(!isset($kieuAnh)) $kieuAnh = '';
    $anhCo = array();
    foreach((array)$dsAnh as $v){
        if($v['photo'] == '' || !file_exists(_upload_hinhanh_l.$v['photo'])) continue;
        $anhCo[] = array('photo' => $v['photo'], 'alt' => $v['ten'] != '' ? $v['ten'] : $nhanAnh, 'tab' => $v['ten2'] != '' ? $v['ten2'] : 'Ảnh '.(count($anhCo) + 1));
        if(count($anhCo) == 4) break;
    }
?>
<?php if(!empty($anhCo) && $kieuAnh == 'tab'){ ?>
<div class="gp-anhtab" data-anhtab>
    <div class="gp-anhtab-khung">
        <?php foreach($anhCo as $k => $v){ ?>
        <div class="gp-anhtab-anh<?=$k == 0 ? ' on' : ''?>" role="tabpanel" id="anh-dau-<?=$k?>" aria-labelledby="tab-anh-dau-<?=$k?>"<?=$k == 0 ? '' : ' aria-hidden="true"'?>><?=weaAnh($v['photo'], $v['alt'], $k == 0 ? 'fetchpriority="high"' : '', $k != 0)?></div>
        <?php } ?>
    </div>
    <?php if(count($anhCo) > 1){ ?>
    <div class="gp-anhtab-thanh">
        <button type="button" class="gp-anhtab-mui" data-lui aria-label="Ảnh trước"><?=weaIcon('chevron', 'ic ic-sm')?></button>
        <div class="gp-anhtab-ds" role="tablist" aria-label="Chọn ảnh giao diện">
            <?php foreach($anhCo as $k => $v){ ?>
            <button type="button" role="tab" id="tab-anh-dau-<?=$k?>" aria-controls="anh-dau-<?=$k?>" aria-selected="<?=$k == 0 ? 'true' : 'false'?>" tabindex="<?=$k == 0 ? '0' : '-1'?>" class="<?=$k == 0 ? 'on' : ''?>"><?=weaChu($v['tab'])?></button>
            <?php } ?>
        </div>
        <button type="button" class="gp-anhtab-mui gp-anhtab-toi" data-toi aria-label="Ảnh tiếp theo"><?=weaIcon('chevron', 'ic ic-sm')?></button>
    </div>
    <?php } ?>
</div>
<?php }elseif(!empty($anhCo)){ ?>
<div class="gp-anh" data-thuvien>
    <div class="gp-anh-chinh"><?=weaAnh($anhCo[0]['photo'], $anhCo[0]['alt'], 'fetchpriority="high"', false)?></div>
    <?php if(count($anhCo) > 1){ ?>
    <div class="gp-anh-nho">
        <?php foreach(array_slice($anhCo, 1) as $v){ ?>
        <button type="button" aria-label="Xem ảnh lớn: <?=weaChu($v['alt'])?>"><?=weaAnh($v['photo'], $v['alt'], '', false)?></button>
        <?php } ?>
    </div>
    <?php } ?>
</div>
<?php } ?>
