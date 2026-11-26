<?php
    /* Trang chủ WEA Soft (thiết kế lại 18/11/2026: trang chủ công ty, giới thiệu đều 2 mảng dịch vụ website + sản phẩm WEA Task).
       Dữ liệu lấy ở sources/index.php, nhập ở admin mục "Trang chủ: ..." */

    // Icon + màu các thẻ, đi theo thứ tự STT trong admin
    $iconGiaiPhap = array(array('layers3', 'xanh'), array('monitor', 'tim'));
    $iconGiaTri = array('layers3', 'target', 'heart', 'star');
    $iconVanDe = array(array('chat-dots', 'xanh'), array('calendar-so', 'cam'), array('layers3', 'tim'));
    $iconTab = array('kanban', 'gantt', 'chart', 'chat', 'bolt', 'grid');
    $iconDichVuTab = array('globe', 'cart', 'calendar', 'book', 'chat', 'layers'); // doanh nghiệp, bán hàng, đặt phòng, khóa học, AI Support, (dự phòng)
    $iconViSao = array('clock', 'calendar', 'layers3', 'chart-up');
    $iconBuoc = array('chat-dots', 'pen', 'code', 'shield-check', 'rocket', 'check');

    $heroDong = weaDong($weaHeroText['mota']);
    $veWeaDong = weaDong($weaVeWea['mota']);
    $viSaoDau = weaDong(isset($weaViSaoDau['mota']) ? $weaViSaoDau['mota'] : '');
    $ctaDong = weaDong(isset($weaCta['mota']) ? $weaCta['mota'] : '');
?>
<div class="trang-chu trang-home">
<header class="hero2">
    <div class="wrap"><?php include _layouts."wea_nav.php"; ?></div>
    <div class="wrap hero2-luoi">
        <div class="hero2-chu">
            <span class="nhan">WEA Soft — Giải pháp công nghệ cho doanh nghiệp</span>
            <h1><?=weaTieuDeDong($weaHeroText['ten'])?></h1>
            <?php if(!empty($heroDong[0])){ ?><p class="hero2-mota"><?=weaChu($heroDong[0])?></p><?php } ?>
            <div class="nhom-nut">
                <a class="btn btn-chinh btn-lon" href="giai-phap-wea-task">Khám phá WEA Task<?=weaIcon('arrow', 'ic ic-sm')?></a>
                <a class="btn btn-vien btn-lon" href="thiet-ke-website">Tư vấn website<?=weaIcon('external', 'ic ic-sm')?></a>
            </div>
            <?php if(count($heroDong) > 1){ ?>
            <ul class="hero2-loiich">
                <?php foreach(array_slice($heroDong, 1, 3) as $k => $dong){ ?>
                <li><span class="o-tron o-<?=array('xanh', 'tim', 'xanh')[$k]?>"><?=weaIcon(array('bolt', 'layers', 'headset')[$k], 'ic ic-sm')?></span><span><?=weaChu($dong)?></span></li>
                <?php } ?>
            </ul>
            <?php } ?>
        </div>
        <div class="hero2-anh">
            <?php if(!empty($weaHeroAnh['photo'])){ ?><?=weaAnh($weaHeroAnh['photo'], $weaHeroAnh['ten'], 'fetchpriority="high"', false)?><?php } ?>
        </div>
    </div>
</header>

<main>
<?php if(!empty($weaVeWea)){ ?>
<?php
    // Ảnh nền cả khối (tràn hết bề ngang) = Hình của mục admin "Trang chủ: Về WEA"
    $nenVe = (!empty($weaVeNen['photo']) && file_exists(_upload_hinhanh_l.$weaVeNen['photo'])) ? _upload_hinhanh_l.$weaVeNen['photo'] : '';
?>
<?php // Đường dẫn ảnh nền phải đầy đủ: url() trong biến CSS bị tính theo thư mục file CSS chứ không theo trang ?>
<section class="khoi hm-ve3" id="ve-wea"<?=$nenVe != '' ? ' style="--nen-ve:url(\''.weaChu($https_config.$nenVe.'?v='.filemtime($nenVe)).'\')"' : ''?>>
    <div class="wrap">
        <?php
            // Mỗi tab: Tên = tên chip, Tên 2 = tiêu đề bên phải, Mô tả = nội dung, Hình = ảnh nền ô bên trái khi chọn chip. Tab chưa có Mô tả thì không hiện.
            $veTab = array();
            foreach((array)$weaGiaTri as $k => $v){ if(trim(strip_tags(str_replace('</p>', '</p> ', weaHtml($v['mota'])))) != '') $veTab[$k] = $v; }
            // Ô trái lấy data mục "Trang chủ: Về WEA" (admin): Tên = tiêu đề; Mô tả = các dòng đầu là đoạn văn, dòng cuối (khi có từ 2 dòng) là câu trích.
            // Không lấy theo bài Giới thiệu để sửa trang Giới thiệu không làm đổi trang chủ
            $veBai = '';
            $veDoan = $veWeaDong; $veTrich = count($veDoan) > 1 ? weaChu(array_pop($veDoan)) : '';
            foreach($veDoan as $doan) $veBai .= '<p>'.weaChu($doan).'</p>';
            $veTieuDe = trim(str_replace(array('[', ']', '|'), array('', '', ' '), htmlspecialchars_decode((string)$weaVeWea['ten'], ENT_QUOTES)));
        ?>
        <div class="hm-ve3-luoi">
            <div class="hm-ve3-trai">
                <?php $dau = true; foreach($veTab as $k => $v){ $anhVe = ($v['photo'] != '' && file_exists(_upload_hinhanh_l.$v['photo'])) ? _upload_hinhanh_l.$v['photo'] : ''; ?>
                <div class="hm-ve3-nen<?=$dau ? ' on' : ''?>" data-theo="ve-nd-<?=$v['id']?>"<?=$anhVe != '' ? ' style="background-image:url(\''.weaChu($anhVe).'\')"' : ''?>></div>
                <?php $dau = false; } ?>
                <div class="hm-ve3-chu">
                    <span class="nhan">Về WEA</span>
                    <h2 class="tieu-de"><?=weaChu($veTieuDe)?></h2>
                    <div class="hm-ve3-bai"><?=$veBai?></div>
                </div>
                <?php if($veTrich != ''){ ?><blockquote class="hm-ve3-trich"><span aria-hidden="true">&ldquo;</span><p><?=$veTrich?></p></blockquote><?php } ?>
            </div>
            <div class="hm-ve3-phai">
                <div class="ve-nd">
                    <?php $dau = true; foreach($veTab as $k => $v){ ?>
                    <div class="ve-nd-pane<?=$dau ? ' on' : ''?>" role="tabpanel" id="ve-nd-<?=$v['id']?>" aria-labelledby="ve-tab-<?=$v['id']?>">
                        <h3><?=weaChu($v['ten2'] != '' ? $v['ten2'] : $v['ten'])?></h3>
                        <div class="hm-ve3-nd" tabindex="0"><?=weaHtml($v['mota'])?></div>
                    </div>
                    <?php $dau = false; } ?>
                </div>
                <?php if(count($veTab) > 1){ ?>
                <div class="hm-ve3-chip" role="tablist" aria-label="Về WEA Soft" data-tabwea>
                    <?php $dau = true; foreach($veTab as $k => $v){ ?>
                    <button type="button" role="tab" id="ve-tab-<?=$v['id']?>" aria-controls="ve-nd-<?=$v['id']?>" aria-selected="<?=$dau ? 'true' : 'false'?>" class="<?=$dau ? 'on' : ''?>"><?=weaIcon($iconGiaTri[$k % 4])?><span><?=weaChu($v['ten'])?></span></button>
                    <?php $dau = false; } ?>
                </div>
                <?php } ?>
                <a class="link-mui hm-ve-them" href="gioi-thieu">Đọc câu chuyện của WEA<?=weaIcon('arrow', 'ic ic-sm')?></a>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<?php if(!empty($weaGiaiPhap)){ ?>
<section class="khoi" id="giai-phap">
    <div class="wrap">
        <h2 class="tieu-de giua">Hai giải pháp, một đối tác <span class="gach">đồng hành</span></h2>
        <p class="mota-khoi hm-gp-mota">Từ quản lý công việc, dự án đến xây dựng website, WEA Soft giúp bạn vận hành hiệu quả và phát triển kinh doanh bền vững.</p>
        <div class="luoi-2">
            <?php foreach($weaGiaiPhap as $k => $v){ $ic = $iconGiaiPhap[$k % 2]; ?>
            <article class="the-gp nen-<?=$ic[1]?>">
                <div class="the-gp-chu">
                    <div class="the-gp-dau">
                        <span class="o-icon o-<?=$ic[1]?>"><?=weaIcon($ic[0])?></span>
                        <div>
                            <h3><?=weaChu($v['ten'])?></h3>
                            <?php if($v['ten2'] != ''){ ?><p class="phu"><?=weaChu($v['ten2'])?></p><?php } ?>
                        </div>
                    </div>
                    <p><?=weaChu($v['mota'])?></p>
                    <?php if($v['link'] != ''){ ?><a class="link-mui" href="<?=weaChu($v['link'])?>"><?=weaChu($v['chuLink'] != '' ? $v['chuLink'] : 'Xem thêm')?><?=weaIcon('arrow', 'ic ic-sm')?></a><?php } ?>
                </div>
                <?php if($v['photo'] != ''){ ?><div class="the-gp-anh"><?=weaAnh($v['photo'], $v['ten'])?></div><?php } ?>
            </article>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>

<?php if(!empty($weaVanDe) && !empty($weaVanDeThe)){ ?>
<section class="khoi" id="van-de">
    <?php // Dải vấn đề: tiêu đề trái, 3 vấn đề bên phải ngăn bằng đường kẻ, không đóng thẻ ?>
    <div class="wrap hm-vande">
        <div class="hm-vande-dau">
            <h2 class="tieu-de"><?=weaTieuDeDong($weaVanDe['ten'])?></h2>
            <?php if(!empty($weaVanDe['mota'])){ ?><p><?=weaChu($weaVanDe['mota'])?></p><?php } ?>
        </div>
        <ul class="hm-vande-ds">
            <?php foreach($weaVanDeThe as $k => $v){ $ic = $iconVanDe[$k % 3]; ?>
            <?php // Dải ngắn: chỉ hiện câu vấn đề (Tên); đoạn giải thích vẫn giữ trong admin ?>
            <li><span class="o-icon o-<?=$ic[1]?>"><?=weaIcon($ic[0])?></span><b><?=weaChu($v['ten'])?></b></li>
            <?php } ?>
        </ul>
    </div>
</section>
<?php } ?>

<?php if(!empty($weaNenTang) && !empty($weaNenTangTab)){ ?>
<section class="khoi hm-nen-trang" id="nen-tang">
    <?php
        // Bố cục y như khối Dịch vụ website nhưng đảo bên: trái = ảnh; phải = tiêu đề + đoạn dẫn của tab, hàng tab nhỏ, danh sách + nút.
        // Mô tả của tab: đoạn <p> đầu là đoạn dẫn (nằm trên hàng tab), phần còn lại (danh sách) nằm dưới hàng tab; cả hai đổi theo tab
        $ntTach = array();
        foreach($weaNenTangTab as $k => $v){
            $html = weaHtml($v['mota']);
            $dan = '';
            if(preg_match('/^\s*<p>(.*?)<\/p>/s', $html, $m)){ $dan = $m[1]; $html = substr($html, strlen($m[0])); }
            $ntTach[$k] = array('dan' => $dan, 'con' => $html);
        }
    ?>
    <div class="wrap">
        <div class="hm-sr-dau">
            <span class="nhan">WEA Task</span>
            <?php // Tiêu đề khối ẩn khỏi mắt nhưng giữ cho Google + trình đọc màn hình (thứ tự H2 → H3 không bị đứt) ?>
            <h2 class="hm-an"><?=weaChu(str_replace(array('[', ']', '|'), array('', '', ' '), $weaNenTang['ten']))?></h2>
        </div>
        <div class="hm-sr hm-dv3">
            <div class="hm-sr-anh">
                <?php foreach($weaNenTangTab as $k => $v){ ?>
                <div class="hm-sr-hinh<?=$k == 0 ? ' on' : ''?>" data-theo="pane-nt-<?=$v['id']?>"><?=weaAnhNet($v['photo'], $v['ten2'] != '' ? $v['ten2'] : $v['ten'], 800, 600, $k != 0)?></div>
                <?php } ?>
            </div>
            <div class="hm-sr-chu">
                <?php foreach($weaNenTangTab as $k => $v){ ?>
                <div class="tab-pane hm-sr-pane hm-dv-tren<?=$k == 0 ? ' on' : ''?>" role="tabpanel" id="pane-nt-<?=$v['id']?>" aria-labelledby="tab-nt-<?=$v['id']?>">
                    <h3><?=weaChu($v['ten2'] != '' ? $v['ten2'] : $v['ten'])?></h3>
                    <?php if($ntTach[$k]['dan'] != ''){ ?><p class="hm-dv-dan"><?=$ntTach[$k]['dan']?></p><?php } ?>
                </div>
                <?php } ?>
                <div class="hm-chip" role="tablist" aria-label="Tính năng WEA Task" data-tabwea>
                    <?php foreach($weaNenTangTab as $k => $v){ ?>
                    <button type="button" role="tab" id="tab-nt-<?=$v['id']?>" aria-controls="pane-nt-<?=$v['id']?>" aria-selected="<?=$k == 0 ? 'true' : 'false'?>" class="<?=$k == 0 ? 'on' : ''?>"><?=weaChu($v['ten'])?></button>
                    <?php } ?>
                </div>
                <?php foreach($weaNenTangTab as $k => $v){ ?>
                <div class="hm-sr-pane hm-dv-duoi<?=$k == 0 ? ' on' : ''?>" data-theo="pane-nt-<?=$v['id']?>">
                    <div class="noi-dung-tich"><?=$ntTach[$k]['con']?></div>
                    <div class="nhom-nut">
                        <a class="btn btn-chinh" href="<?=weaChu($v['link'] != '' ? $v['link'] : 'giai-phap-wea-task')?>"><?=weaChu($v['chuLink'] != '' ? $v['chuLink'] : 'Tìm hiểu WEA Task')?><?=weaIcon('arrow', 'ic ic-sm')?></a>
                        <a class="btn btn-vien" href="<?=$weaLinkDangKy?>">Dùng thử miễn phí</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<?php if(!empty($weaDichVu) && !empty($weaDichVuTab)){ ?>
<section class="khoi hm-nen-bang" id="dich-vu">
    <?php
        // Nhãn trên cùng; bên dưới: trái = tiêu đề + đoạn dẫn của chip, hàng chip, danh sách + nút; phải = ảnh.
        // Mô tả của tab: đoạn <p> đầu là đoạn dẫn (nằm trên hàng chip), phần còn lại (danh sách) nằm dưới hàng chip; cả hai đổi theo chip
        $dvTach = array();
        foreach($weaDichVuTab as $k => $v){
            $html = weaHtml($v['mota']);
            $dan = '';
            if(preg_match('/^\s*<p>(.*?)<\/p>/s', $html, $m)){ $dan = $m[1]; $html = substr($html, strlen($m[0])); }
            $dvTach[$k] = array('dan' => $dan, 'con' => $html);
        }
    ?>
    <div class="wrap">
        <div class="hm-sr-dau">
            <span class="nhan">Dịch vụ website</span>
            <?php // Tiêu đề khối ẩn khỏi mắt nhưng giữ cho Google + trình đọc màn hình (thứ tự H2 → H3 không bị đứt) ?>
            <h2 class="hm-an"><?=weaChu(str_replace(array('[', ']', '|'), array('', '', ' '), $weaDichVu['ten']))?></h2>
        </div>
        <div class="hm-sr hm-sr-dao hm-dv3">
            <div class="hm-sr-chu">
                <?php foreach($weaDichVuTab as $k => $v){ ?>
                <div class="tab-pane hm-sr-pane hm-dv-tren<?=$k == 0 ? ' on' : ''?>" role="tabpanel" id="pane-dv-<?=$v['id']?>" aria-labelledby="tab-dv-<?=$v['id']?>">
                    <h3><?=weaChu($v['ten2'] != '' ? $v['ten2'] : $v['ten'])?></h3>
                    <?php if($dvTach[$k]['dan'] != ''){ ?><p class="hm-dv-dan"><?=$dvTach[$k]['dan']?></p><?php } ?>
                </div>
                <?php } ?>
                <div class="hm-chip" role="tablist" aria-label="Các loại website" data-tabwea>
                    <?php foreach($weaDichVuTab as $k => $v){ ?>
                    <button type="button" role="tab" id="tab-dv-<?=$v['id']?>" aria-controls="pane-dv-<?=$v['id']?>" aria-selected="<?=$k == 0 ? 'true' : 'false'?>" class="<?=$k == 0 ? 'on' : ''?>"><?=weaChu($v['ten'])?></button>
                    <?php } ?>
                </div>
                <?php foreach($weaDichVuTab as $k => $v){ ?>
                <div class="hm-sr-pane hm-dv-duoi<?=$k == 0 ? ' on' : ''?>" data-theo="pane-dv-<?=$v['id']?>">
                    <div class="noi-dung-tich"><?=$dvTach[$k]['con']?></div>
                    <div class="nhom-nut">
                        <a class="btn btn-chinh" href="<?=weaChu($v['link'] != '' ? $v['link'] : 'thiet-ke-website#tu-van')?>"><?=weaChu($v['chuLink'] != '' ? $v['chuLink'] : 'Nhận tư vấn miễn phí')?><?=weaIcon('arrow', 'ic ic-sm')?></a>
                        <a class="btn btn-vien" href="thiet-ke-website">Xem chi tiết dịch vụ</a>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="hm-sr-anh">
                <?php foreach($weaDichVuTab as $k => $v){ $anhTab = $v['photo'] != '' ? $v['photo'] : $weaDichVu['photo']; ?>
                <div class="hm-sr-hinh<?=$k == 0 ? ' on' : ''?>" data-theo="pane-dv-<?=$v['id']?>"><?=weaAnhNet($anhTab, 'Minh họa '.($v['ten2'] != '' ? $v['ten2'] : $v['ten']), 800, 600, $k != 0)?></div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<?php if(!empty($weaQuyTrinh)){ ?>
<section class="khoi hm-nen-trang" id="quy-trinh">
    <div class="wrap">
        <div class="hm-dau-ngang">
            <h2 class="tieu-de">Quy trình thiết kế website tại WEA Soft</h2>
            <a class="link-mui" href="thiet-ke-website">Xem chi tiết dịch vụ<?=weaIcon('arrow', 'ic ic-sm')?></a>
        </div>
        <?php
            // Bản thử 20/11/2026: có ảnh quy trình (đã vẽ sẵn số + tên 5 bước) thì ảnh thay hàng icon + tên bước,
            // tên bước vẫn giữ trong thẻ h3 ẩn cho Google; mô tả từng bước nằm dưới ảnh, chia 5 cột khớp 5 bước trong ảnh.
            // Xóa file ảnh thì tự quay về bố cục cũ (icon + tên + mô tả)
            $anhQt = 'wea-quy-trinh.gif';
            $coAnhQt = is_file(_upload_hinhanh_l.$anhQt);
        ?>
        <?php if($coAnhQt){ $ktQt = @getimagesize(_upload_hinhanh_l.$anhQt); ?>
        <div class="hm-qt-khung">
        <img class="hm-qt-anh" src="<?=_upload_hinhanh_l.$anhQt?>?v=<?=filemtime(_upload_hinhanh_l.$anhQt)?>" alt="Quy trình 5 bước: lắng nghe và phân tích, thiết kế UI/UX, phát triển, kiểm thử và nghiệm thu, triển khai và bàn giao" width="<?=$ktQt ? $ktQt[0] : 2048?>" height="<?=$ktQt ? $ktQt[1] : 682?>" loading="lazy" decoding="async">
        <?php } ?>
        <?php // web-tl-tinh: 5 bước đứng yên cùng cấp (trang chủ không có tiến trình thật nên không tô sáng lần lượt) ?>
        <ol class="web-tl web-tl-tinh<?=$coAnhQt ? ' hm-qt-co-anh' : ''?>">
            <?php foreach($weaQuyTrinh as $k => $v){ ?>
            <li>
                <?php if(!$coAnhQt){ ?><span class="web-tl-ic"><?=weaIcon($iconBuoc[$k % 6])?></span><?php } ?>
                <span class="web-tl-so" aria-hidden="true"><?=str_pad($k + 1, 2, '0', STR_PAD_LEFT)?></span>
                <h3<?=$coAnhQt ? ' class="hm-an"' : ''?>><?=weaChu($v['ten'])?></h3>
                <p><?=weaChu($v['mota'])?></p>
            </li>
            <?php } ?>
        </ol>
        <?php if($coAnhQt){ ?></div><?php } ?>
    </div>
</section>
<?php } ?>

<?php if(!empty($weaViSao)){ ?>
<section class="khoi" id="vi-sao">
    <div class="wrap">
        <?php // Theo ảnh mẫu 19/11: đầu khối (nhãn, tiêu đề | vạch | đoạn dẫn) + 1 thẻ trắng 3 cột: mục lục dạng dòng thời gian | bài viết | ảnh dọc đổi theo mục ?>
        <div class="hm-vs3-dau">
            <span class="nhan">Vì sao chọn chúng tôi?</span>
            <div class="hm-vs3-dau-luoi">
                <h2 class="tieu-de"><?=!empty($weaViSaoDau['ten']) ? weaTieuDeDong($weaViSaoDau['ten']) : 'Một khoản đầu tư nhỏ. Thêm thời gian cho những điều lớn hơn.'?></h2>
                <?php if(!empty($viSaoDau)){ ?><div class="hm-vs3-dan"><?php foreach($viSaoDau as $dong){ ?><p><?=weaChu($dong)?></p><?php } ?></div><?php } ?>
            </div>
        </div>
        <div class="hm-vs3">
            <div class="hm-vs3-ml" role="tablist" aria-label="Vì sao chọn WEA" aria-orientation="vertical" data-tabwea>
                <?php foreach($weaViSao as $k => $v){ ?>
                <button type="button" role="tab" id="tab-vs-<?=$v['id']?>" aria-controls="bai-vs-<?=$v['id']?>" aria-selected="<?=$k == 0 ? 'true' : 'false'?>" class="<?=$k == 0 ? 'on' : ''?>"><i class="hm-vs3-cham" aria-hidden="true"></i><?=weaIcon($iconViSao[$k % 4])?><span><?=weaChu($v['ten'])?></span></button>
                <?php } ?>
            </div>
            <div class="hm-vs3-giua">
                <?php foreach($weaViSao as $k => $v){ $sau = isset($weaViSao[$k + 1]) ? $weaViSao[$k + 1] : null; ?>
                <article class="tab-pane hm-vs3-bai<?=$k == 0 ? ' on' : ''?>" role="tabpanel" id="bai-vs-<?=$v['id']?>" aria-labelledby="tab-vs-<?=$v['id']?>" tabindex="0">
                    <h3><?=weaChu($v['ten2'] != '' ? $v['ten2'] : $v['ten'])?></h3>
                    <div class="hm-vs-nd"><?=weaHtml($v['mota'])?></div>
                    <?php if($sau){ ?><button type="button" class="link-mui hm-vs-toi" data-bai-toi="tab-vs-<?=$sau['id']?>">Bài tiếp theo: <?=weaChu($sau['ten'])?><?=weaIcon('arrow', 'ic ic-sm')?></button><?php } ?>
                </article>
                <?php } ?>
            </div>
            <div class="hm-vs3-anh" aria-hidden="true">
                <?php foreach($weaViSao as $k => $v){ $anhVs = ($v['photo'] != '' && file_exists(_upload_hinhanh_l.$v['photo'])) ? _upload_hinhanh_l.$v['photo'] : ''; ?>
                <div class="hm-vs3-hinh<?=$k == 0 ? ' on' : ''?>" data-theo="bai-vs-<?=$v['id']?>"<?=$anhVs != '' ? ' style="background-image:url(\''.weaChu($anhVs).'\')"' : ''?>></div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<?php if(!empty($weaCamKet)){ ?>
<?php $camKetDong = weaDong(isset($weaCamKetDau['mota']) ? $weaCamKetDau['mota'] : ''); $mauCk = array('xanh', 'trang', 'la'); ?>
<section class="khoi" id="cam-ket">
    <div class="wrap">
        <?php // Theo ảnh mẫu: đầu khối như Vì sao/Hỏi đáp; 3 bài Nổi bật: bài 1 thẻ lớn bên trái, bài 2-3 xếp dọc bên phải; bấm thẻ mở bài ?>
        <div class="hm-vs3-dau">
            <span class="nhan">Cam kết</span>
            <div class="hm-vs3-dau-luoi">
                <h2 class="tieu-de"><?=!empty($weaCamKetDau['ten']) ? weaTieuDeDong($weaCamKetDau['ten']) : 'Đồng hành từ ngày đầu, theo nhịp phát triển của bạn'?></h2>
                <?php if(!empty($camKetDong)){ ?><div class="hm-vs3-dan"><?php foreach($camKetDong as $dong){ ?><p><?=weaChu($dong)?></p><?php } ?></div><?php } ?>
            </div>
        </div>
        <div class="hm-ck">
            <?php foreach($weaCamKet as $k => $v){
                // Hình là GIF: hiện ảnh tĩnh (khung đầu), rê chuột vào thẻ thì GIF chạy 1 lần (JS ở wea-home.js, data-gif)
                $anhCk = ''; $gifCk = ''; $nenCk = ''; $wCk = 1200; $hCk = 900;
                if($v['photo'] != '' && file_exists(_upload_baiviet_l.$v['photo'])){
                    $re = weaGifReChuot($v['photo'], _upload_baiviet_l);
                    if($re){ $nenCk = $re['nen']; $anhCk = $re['tinh'].'?v='.filemtime($re['tinh']); $gifCk = $re['gif'].'?v='.filemtime($re['gif']); if($re['w']){ $wCk = $re['w']; $hCk = $re['h']; } }
                    else{ $anhCk = _upload_baiviet_l.$v['photo']; $kt = @getimagesize($anhCk); if($kt){ $wCk = $kt[0]; $hCk = $kt[1]; } }
                }
            ?>
            <a class="hm-ck-the hm-ck-<?=$k == 0 ? 'lon' : 'nho'?> mau-<?=$mauCk[$k % 3]?>" href="cam-ket/<?=weaChu($v['slug'])?>"<?=($k > 0 && $nenCk != '') ? ' style="background-color:'.$nenCk.'"' : ''?>>
                <?php if($k == 0 && $anhCk != ''){ ?><img class="hm-ck-nen" src="<?=weaChu($anhCk)?>"<?=$gifCk != '' ? ' data-gif="'.weaChu($gifCk).'"' : ''?> alt="" width="<?=$wCk?>" height="<?=$hCk?>" loading="lazy" decoding="async"><?php } ?>
                <div class="hm-ck-chu">
                    <h3><?=weaChu($v['ten'])?></h3>
                    <?php if($v['mota'] != ''){ ?><p><?=weaChu(trim(strip_tags(htmlspecialchars_decode($v['mota'], ENT_QUOTES))))?></p><?php } ?>
                    <span class="hm-ck-xem">Xem chi tiết<?=weaIcon('arrow', 'ic ic-sm')?></span>
                </div>
                <?php if($k > 0 && $anhCk != ''){ ?><img class="hm-ck-anh" src="<?=weaChu($anhCk)?>"<?=$gifCk != '' ? ' data-gif="'.weaChu($gifCk).'"' : ''?> alt="<?=weaChu($v['ten'])?>" width="<?=$wCk?>" height="<?=$hCk?>" loading="lazy" decoding="async"><?php } ?>
            </a>
            <?php } ?>
        </div>
        <a class="link-mui hm-ck-tatca" href="cam-ket">Xem tất cả cam kết<?=weaIcon('arrow', 'ic ic-sm')?></a>
    </div>
</section>
<?php } ?>

<?php
    // Bảng gói đầy đủ, y như ở trang WEA Task (quyền lợi từng gói + nút chọn gói); chữ đầu khối lấy cùng mục admin "WEA Task: Gói & giá" (wt-goi)
    $bangGiaNhan = 'Gói &amp; giá';
    if(!empty($wtGoi['ten'])) $bangGiaTieuDe = weaTieuDeDong($wtGoi['ten']);
    if(!empty($wtGoi['mota'])) $bangGiaMoTa = weaChu($wtGoi['mota']);
    $bangGiaGon = false;
    include _template."wea/khoi_bang_gia.php";
?>

<?php if(!empty($weaHoiDap)){ ?>
<?php
    // Hỏi đáp theo ảnh mẫu 19/11: câu hỏi gom theo nhóm (Tên 2 của từng câu) ở cột trái, câu trả lời hiện ở khung nắng bên phải.
    // Ảnh nền khung phải = Hình của mục "Trang chủ: Câu hỏi thường gặp (đầu khối)"
    $faqDong = weaDong(isset($weaHoiDapDau['mota']) ? $weaHoiDapDau['mota'] : '');
    $faqNhom = array();
    foreach($weaHoiDap as $v){ $tenNhom = trim(htmlspecialchars_decode((string)$v['ten2'], ENT_QUOTES)); $faqNhom[$tenNhom != '' ? $tenNhom : 'Câu hỏi chung'][] = $v; }
    $nenFaq = (!empty($weaHoiDapDau['photo']) && file_exists(_upload_hinhanh_l.$weaHoiDapDau['photo'])) ? _upload_hinhanh_l.$weaHoiDapDau['photo'] : '';
    $faqDau = true;
?>
<section class="khoi" id="hoi-dap">
    <div class="wrap">
        <div class="hm-vs3-dau hm-faq2-dau">
            <span class="nhan">Câu hỏi thường gặp</span>
            <div class="hm-vs3-dau-luoi">
                <h2 class="tieu-de"><?=!empty($weaHoiDapDau['ten']) ? weaTieuDeDong($weaHoiDapDau['ten']) : 'Giải đáp nhanh những thắc mắc phổ biến'?></h2>
                <?php if(!empty($faqDong[0])){ ?><div class="hm-vs3-dan"><p><?=weaChu($faqDong[0])?></p></div><?php } ?>
            </div>
        </div>
        <div class="hm-faq2">
            <div class="hm-faq2-ds" role="tablist" aria-label="Câu hỏi thường gặp" aria-orientation="vertical" data-tabwea>
                <?php foreach($faqNhom as $tenNhom => $ds){ ?>
                <div class="hm-faq2-nhom">
                    <span class="hm-faq2-ten"><?=weaChu($tenNhom)?></span>
                    <div class="hm-faq2-cau">
                        <?php foreach($ds as $v){ ?>
                        <button type="button" role="tab" id="tab-hd-<?=$v['id']?>" aria-controls="tl-hd-<?=$v['id']?>" aria-selected="<?=$faqDau ? 'true' : 'false'?>" class="<?=$faqDau ? 'on' : ''?>"><span><?=weaChu($v['ten'])?></span><?=weaIcon('chevron', 'ic ic-sm')?></button>
                        <?php $faqDau = false; } ?>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="hm-faq2-tl"<?=$nenFaq != '' ? ' style="background-image:url(\''.weaChu($nenFaq).'\')"' : ''?>>
                <?php $faqDau = true; foreach($faqNhom as $tenNhom => $ds){ foreach($ds as $v){ ?>
                <div class="tab-pane hm-faq2-pane<?=$faqDau ? ' on' : ''?>" role="tabpanel" id="tl-hd-<?=$v['id']?>" aria-labelledby="tab-hd-<?=$v['id']?>">
                    <span class="hm-faq2-nhan"><?=weaIcon('chat-oval')?><?=weaChu($tenNhom)?></span>
                    <h3><?=weaChu($v['ten'])?></h3>
                    <div class="hm-faq2-nd" tabindex="0"><?php foreach(weaDong($v['mota']) as $doan){ ?><p><?=weaChu($doan)?></p><?php } ?></div>
                </div>
                <?php $faqDau = false; } } ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<?php if(!empty($weaCta)){ ?>
<?php $nenCta = (!empty($weaCta['photo']) && file_exists(_upload_hinhanh_l.$weaCta['photo'])) ? _upload_hinhanh_l.$weaCta['photo'] : ''; ?>
<section class="khoi khoi-cuoi">
    <div class="wrap">
        <?php // Lời kết: ảnh nền nhập ở admin (Hình của "Lời kêu gọi cuối trang"), lớp đen mờ 0.68 bên trái nhạt dần tới giữa để chữ trắng nổi ?>
        <div class="hm-cta2"<?=$nenCta != '' ? ' style="background-image:url(\''.weaChu($nenCta).'\')"' : ''?>>
            <div class="hm-cta2-chu">
                <h2><?=str_replace('|', '<br>', weaChu($weaCta['ten']))?></h2>
                <?php foreach($ctaDong as $i => $dong){ ?><p<?=$i == count($ctaDong) - 1 && count($ctaDong) > 2 ? ' class="hm-cta2-chot"' : ''?>><?=weaChu($dong)?></p><?php } ?>
                <div class="nhom-nut">
                    <a class="btn btn-vien-trang btn-lon" href="thiet-ke-website#tu-van">Liên hệ tư vấn</a>
                    <a class="btn btn-chinh btn-lon" href="<?=$weaLinkDangKy?>">Dùng thử WEA Task</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
</main>

<?php include _layouts."wea_footer.php"; ?>
</div>
