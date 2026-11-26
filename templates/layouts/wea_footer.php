<?php
    /* Footer WEA theo ảnh mẫu 20/11/2026: thương hiệu + 3 cột link, thanh Liên hệ (email, hotline, website), dòng bản quyền.
       Email / hotline / website lấy từ Cấu hình chung ở admin. Nền mờ hình nguyên tử: assets/images/wea/ftr-nen.svg */
    $weaWebsite = trim((string)$row_setting['website']);
    $weaWebsiteLink = $weaWebsite != '' ? (preg_match('#^https?://#i', $weaWebsite) ? $weaWebsite : 'https://'.$weaWebsite) : $https_config;
?>
<footer class="ftr ftr2">
    <div class="wrap ftr-luoi">
        <div class="ftr-gt">
            <a class="hd-logo" href="./" aria-label="WEA Soft, về trang chủ">
                <?php if(!empty($weaLogo['photo'])){ ?><?=weaAnh($weaLogo['photo'], 'Logo WEA Soft', '', true, 1815, 640)?><?php } ?>
            </a>
            <p>Giải pháp quản lý công việc, dự án và website cho doanh nghiệp Việt.</p>
            <div class="ftr-mxh">
                <?php /* Chỉ hiện mạng xã hội đã nhập trong Cấu hình chung */ ?>
                <?php if($row_setting['facebook'] != ''){ ?><a href="<?=weaChu($row_setting['facebook'])?>" target="_blank" rel="noopener" aria-label="Facebook của WEA Soft"><?=weaIcon('facebook')?></a><?php } ?>
                <?php if($row_setting['linksyoutube'] != ''){ ?><a href="<?=weaChu($row_setting['linksyoutube'])?>" target="_blank" rel="noopener" aria-label="YouTube của WEA Soft"><?=weaIcon('youtube')?></a><?php } ?>
            </div>
        </div>
        <div>
            <h2>Giải pháp</h2>
            <ul>
                <li><a href="giai-phap-wea-task">WEA Task</a></li>
                <li><a href="thiet-ke-website">Thiết kế website</a></li>
                <li><a href="tinh-nang">Tính năng</a></li>
                <li><a href="giai-phap-wea-task#bang-gia">Gói &amp; giá</a></li>
            </ul>
        </div>
        <div>
            <h2>Tài nguyên</h2>
            <ul>
                <li><a href="tin-tuc">Blog</a></li>
                <li><a href="#hoi-dap">Câu hỏi thường gặp</a></li>
                <li><a href="<?=$weaLinkApp?>">Đăng nhập WEA Task</a></li>
            </ul>
        </div>
        <div>
            <h2>Về WEA</h2>
            <ul>
                <li><a href="gioi-thieu">Giới thiệu</a></li>
                <li><a href="lien-he">Liên hệ</a></li>
            </ul>
        </div>
    </div>
    <div class="wrap">
        <div class="ftr-lh2">
            <h2>Liên hệ</h2>
            <ul>
                <?php if($row_setting['email'] != ''){ ?><li><?=weaIcon('mail')?><a href="mailto:<?=weaChu($row_setting['email'])?>"><?=weaChu($row_setting['email'])?></a></li><?php } ?>
                <?php if($weaHotline != ''){ ?><li><?=weaIcon('phone')?><a href="tel:<?=$weaHotline?>"><?=weaChu($row_setting['hotline'])?></a></li><?php } ?>
                <li><?=weaIcon('globe')?><a href="<?=weaChu($weaWebsiteLink)?>">Website WEA Soft<?=weaIcon('arrow-cheo', 'ic ic-sm')?></a></li>
            </ul>
        </div>
    </div>
    <div class="wrap ftr-cuoi">
        <span>© <?=date('Y')?> WEA Soft. Tất cả các quyền được bảo lưu.</span>
        <span><a href="chinh-sach">Chính sách bảo mật</a><a href="chinh-sach">Điều khoản sử dụng</a></span>
    </div>
</footer>
<?php /* Đếm lượt xem cho trang quản trị phần mềm (app.weasoft.vn/admin › Thống kê): gửi đường dẫn + trang giới thiệu, không cookie,
   không thư viện ngoài; chỉ chạy trên tên miền thật để máy dev không làm sai số liệu. Lưu gì: api/site_stats_lib.php bên phần mềm. */ ?>
<script>
(function () {
    try {
        if (!/(^|\.)weasoft\.vn$/.test(location.hostname) || !navigator.sendBeacon) return;
        var q = new URLSearchParams(location.search);
        navigator.sendBeacon("<?=$weaLinkApp?>/api/track.php", JSON.stringify({ p: location.pathname, r: document.referrer, u: q.get("utm_source") || "" }));
    } catch (e) {}
})();
</script>
