<?php
    /* Khối bảng giá 4 gói (dữ liệu admin "Trang chủ: Bảng giá", phải khớp giá trong app). Dùng ở trang chủ và trang Giải pháp WEA Task.
       Biến cần có: $weaGoi; tùy chọn $bangGiaNhan, $bangGiaTieuDe, $bangGiaMoTa để đổi chữ đầu khối */
    if(!isset($bangGiaNhan)) $bangGiaNhan = 'Bảng giá &amp; gói dịch vụ';
    if(!isset($bangGiaTieuDe)) $bangGiaTieuDe = 'Gói giải pháp linh hoạt, phù hợp với mọi quy mô';
    if(!isset($bangGiaMoTa)) $bangGiaMoTa = 'Giá tính theo mỗi người dùng một tháng. Khách mời vào xem dự án luôn miễn phí.';
    // $bangGiaGon = true (trang chủ): không liệt kê quyền lợi, ghi giá trả năm, nút dẫn sang bảng giá đầy đủ ở trang WEA Task
    if(!isset($bangGiaGon)) $bangGiaGon = false;
?>
<?php if(!empty($weaGoi)){ ?>
<section class="khoi" id="bang-gia">
    <div class="wrap">
        <span class="nhan"><?=$bangGiaNhan?></span>
        <h2 class="tieu-de"><?=$bangGiaTieuDe?></h2>
        <p class="mota-khoi"><?=$bangGiaMoTa?></p>
        <div class="ky-tra" role="group" aria-label="Chọn kỳ thanh toán" data-kytra>
            <button type="button" class="on" aria-pressed="true" data-ky="thang">Trả theo tháng</button>
            <button type="button" aria-pressed="false" data-ky="nam">Trả theo năm</button>
        </div>
        <div class="luoi-goi">
            <?php foreach($weaGoi as $iGoi => $v){
                $noiBat = ((int)$v['number'] == 1);
                $gia = weaGia($v['ten2']);
                $mota = weaHtml($v['mota']);
                // Đoạn <p> đầu của mô tả là câu giới thiệu gói, phần còn lại là danh sách quyền lợi
                $gioiThieu = '';
                if(preg_match('/^\s*<p>(.*?)<\/p>/s', $mota, $m)){ $gioiThieu = $m[1]; $mota = substr($mota, strlen($m[0])); }
            ?>
            <div class="goi goi-<?=$iGoi % 4?><?=$noiBat ? ' noi-bat' : ''?>">
                <?php // Chưa có số liệu thật về gói được chọn nhiều nhất nên chỉ ghi "Gợi ý", không ghi "Phổ biến nhất" ?>
                <?php if($noiBat){ ?><span class="goi-nhan"><?=weaIcon('star', 'ic ic-xs')?>Gợi ý</span><?php } ?>
                <h3><?=weaChu($v['ten'])?></h3>
                <?php if($gioiThieu != ''){ ?><p class="goi-gt"><?=$gioiThieu?></p><?php } ?>
                <div class="goi-gia">
                    <?php if($gia['laSo']){ ?>
                    <b data-thang="<?=weaTien($gia['thang'])?>" data-nam="<?=weaTien($gia['nam'])?>"><?=weaTien($gia['thang'])?></b><span><?=$gia['thang'] > 0 ? '/ người / tháng' : 'mãi mãi'?></span>
                    <?php if($bangGiaGon && $gia['nam'] < $gia['thang']){ ?><small class="goi-nam-gon">(Trả theo năm: <?=weaTien($gia['nam'])?>)</small><?php } ?>
                    <?php if(!$bangGiaGon && $gia['nam'] < $gia['thang']){ ?><small class="goi-nam" hidden>trả trước 12 tháng</small><?php } ?>
                    <?php }else{ ?>
                    <b><?=weaChu($gia['thang'])?></b>
                    <?php } ?>
                </div>
                <?php if($bangGiaGon){ ?>
                <a class="btn <?=$noiBat ? 'btn-chinh' : 'btn-vien'?> btn-day" href="giai-phap-wea-task#bang-gia">Xem chi tiết gói</a>
                <?php }else{ ?>
                <div class="goi-ds"><?=$mota?></div>
                <?php } ?>
                <?php if(!$bangGiaGon && $v['chuLink'] != ''){ ?><a class="btn <?=$noiBat ? 'btn-chinh' : 'btn-vien'?> btn-day" href="<?=weaChu($v['link'] != '' ? $v['link'] : $weaLinkDangKy)?>"><?=weaChu($v['chuLink'])?></a><?php } ?>
            </div>
            <?php } ?>
        </div>
        <p class="goi-ghichu">Cần thêm một tính năng lẻ? WEA Task có <b>Tiện ích mở rộng</b> mua riêng, xem trong phần Gói của ứng dụng.</p>
    </div>
</section>
<?php } ?>
