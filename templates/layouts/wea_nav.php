<?php
    /* Thanh menu WEA (dùng chung mọi trang). Menu xổ có icon + mô tả; bám đầu trang khi cuộn (JS thêm lớp .hd-co-dinh).
       Link "#..." đi theo <base href> nên từ trang nào bấm cũng về đúng khối ở trang chủ */
    // Chỉ trỏ tới trang (không trỏ khối "#..."), mỗi trang xuất hiện 1 lần; Liên hệ đứng cuối cùng bên phải
    $weaMenu = array(
        array('ten' => 'Giải pháp', 'con' => array(
            array('WEA Task', 'Quản lý dự án, công việc, workload và AI cho đội nhóm', 'giai-phap-wea-task', 'layers', 'xanh'),
            array('Thiết kế website', 'Website theo mô hình kinh doanh, chuẩn SEO, dễ quản trị', 'thiet-ke-website', 'globe', 'tim'),
        )),
        array('ten' => 'Về WEA', 'link' => 'gioi-thieu'),
        array('ten' => 'Tính năng', 'link' => 'tinh-nang'),
        array('ten' => 'Blog', 'link' => 'tin-tuc'),
        array('ten' => 'Liên hệ', 'link' => 'lien-he'),
    );
    // Trang hiện tại: mục cha có trang con trùng $com thì được tô đậm
    $weaTrangNay = isset($com) ? (string)$com : '';
?>
<div class="hd-dinh" data-hd-dinh>
<nav class="hd" aria-label="Menu chính">
    <a class="hd-logo" href="./" aria-label="WEA Soft, về trang chủ">
        <?php if(!empty($weaLogo['photo'])){ ?><?=weaAnh($weaLogo['photo'], 'Logo WEA Soft', '', false, 1815, 640)?><?php } ?>
    </a>
    <button type="button" class="hd-mo" aria-expanded="false" aria-controls="hd-menu" aria-label="Mở menu"><?=weaIcon('menu')?></button>
    <div class="hd-menu" id="hd-menu">
        <ul class="hd-ds">
            <?php foreach($weaMenu as $i => $m){ ?>
            <?php if(isset($m['con'])){
                $dang = false;
                foreach($m['con'] as $c) if($weaTrangNay != '' && $c[2] === $weaTrangNay) $dang = true;
            ?>
            <li class="hd-xo<?=$dang ? ' dang' : ''?>">
                <button type="button" aria-expanded="false" aria-controls="hd-xo-<?=$i?>"><?=$m['ten']?><?=weaIcon('chevron', 'ic ic-xs')?></button>
                <ul id="hd-xo-<?=$i?>">
                    <?php foreach($m['con'] as $c){ ?>
                    <li><a href="<?=weaChu($c[2])?>"<?=$c[2] === $weaTrangNay ? ' aria-current="page"' : ''?>><span class="hd-xo-ic hd-<?=$c[4]?>"><?=weaIcon($c[3], 'ic ic-sm')?></span><span><b><?=$c[0]?></b><small><?=$c[1]?></small></span></a></li>
                    <?php } ?>
                </ul>
            </li>
            <?php }else{ ?>
            <li><a href="<?=weaChu($m['link'])?>"<?=$m['link'] === $weaTrangNay ? ' aria-current="page"' : ''?>><?=$m['ten']?></a></li>
            <?php } ?>
            <?php } ?>
        </ul>
        <div class="hd-nut">
            <a class="btn btn-vien" href="<?=$weaLinkApp?>">Đăng nhập</a>
            <a class="btn btn-chinh" href="<?=$weaLinkDangKy?>">Bắt đầu miễn phí</a>
        </div>
    </div>
</nav>
</div>
