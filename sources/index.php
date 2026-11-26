<?php  if(!defined('_source')) die("Error");

    include_once _source."wea_chung.php";

    /* ===== Dữ liệu trang chủ (thiết kế 11/2026, nhập trong admin) ===== */

    $weaHeroText = weaKhoi('wea-hero-text');

    $weaHeroAnh = $db->rawQueryOne("select ten_$lang as ten, photo_vi as photo from #_photo where type=? and hienthi=1 order by stt asc, id asc limit 0,1", array('wea-hero'));

    $weaGiaiPhap = weaDanhSach('wea-giai-phap', 2);

    $weaVeWea = weaKhoi('wea-ve-wea');
    $weaGiaTri = weaDanhSach('wea-gia-tri', 4);
    // Ô trái khối Về WEA lấy bài của trang Giới thiệu (tiêu đề + đoạn văn + câu trích); ảnh nền khối nhập riêng
    $weaGioiThieu = $db->rawQueryOne("select noidung_$lang as noidung from #_info where type=? limit 0,1", array('gioi-thieu'));
    $weaVeNen = weaKhoi('wea-ve-nen');

    $weaVanDe = weaKhoi('wea-van-de');
    $weaVanDeThe = weaDanhSach('wea-van-de-the', 3);

    $weaNenTang = weaKhoi('wea-nen-tang');
    $weaNenTangTab = weaDanhSach('wea-nen-tang-tab', 6);

    $weaDichVu = weaKhoi('wea-dich-vu');
    $weaDichVuO = weaDanhSach('wea-dich-vu-o', 6);
    $weaDichVuTab = weaDanhSach('wea-dich-vu-tab', 6);

    $weaViSaoDau = weaKhoi('wea-vi-sao-dau');
    $weaViSao = weaDanhSach('wea-vi-sao', 4);

    // Khối Cam kết: 3 bài viết Cam kết được tích Nổi bật (theo STT)
    $weaCamKetDau = weaKhoi('wea-cam-ket-dau');
    $weaCamKet = $db->rawQuery("select id, ten_$lang as ten, tenkhongdau_$lang as slug, mota_$lang as mota, photo from #_baiviet where type=? and hienthi=1 and noibat=1 order by stt asc, id desc limit 0,3", array('cam-ket'));

    // Quy trình 5 bước dùng chung dữ liệu với trang Thiết kế website
    $weaQuyTrinh = weaDanhSach('web-quy-trinh-buoc', 6);

    $weaGoi = weaDanhSach('wea-goi', 4);
    // Chữ đầu khối bảng giá dùng chung với trang WEA Task
    $wtGoi = weaKhoi('wt-goi');

    $weaHoiDap = weaDanhSach('wea-hoi-dap', 12);
    $weaHoiDapDau = weaKhoi('wea-hoi-dap-dau');

    $weaCta = weaKhoi('wea-cta');

    /* ===== SEO ===== */

    $seoDB = $seo->getSeoDB(0,'setting','capnhat','');

    // Mặc định theo nội dung trang, admin nhập SEO trang chủ thì dùng của admin
    $seo->setSeo('title', 'WEA Soft – Phần mềm quản lý dự án & thiết kế website');

    $seo->setSeo('description', 'WEA Soft: WEA Task – phần mềm quản lý dự án, quản lý công việc có gói Free – và thiết kế website chuyên nghiệp, website nghiệp vụ, website lấy liền.');

    if(!empty($seoDB['title_'.$seolang])) $seo->setSeo('title',$seoDB['title_'.$seolang]);

    if(!empty($seoDB['keywords_'.$seolang])) $seo->setSeo('keywords',$seoDB['keywords_'.$seolang]);

    if(!empty($seoDB['description_'.$seolang])) $seo->setSeo('description',$seoDB['description_'.$seolang]);

    $seo->setSeo('url',$func->getCurrentPageURL());

    $seo->setSeo('type','website');

    // Ảnh chia sẻ mạng xã hội: ảnh chính đầu trang
    if(!empty($weaHeroAnh['photo'])) weaSeoAnh($weaHeroAnh['photo']);

    /* ===== Dữ liệu cấu trúc: Organization + SoftwareApplication (giá lấy từ bảng giá admin) + FAQPage ===== */

    // Fanpage chính thức luôn có (chưa nhập ở admin vẫn nối được), để Google / AI hiểu fanpage và website là cùng 1 đơn vị
    $sameAs = array('https://www.facebook.com/weasolution/');
    foreach(array('facebook', 'linksyoutube') as $cot){
        if(!empty($row_setting[$cot]) && preg_match('#^https?://#', $row_setting[$cot]) && !in_array($row_setting[$cot], $sameAs)) $sameAs[] = $row_setting[$cot];
    }

    // Tên gọi khác của thương hiệu (người dùng hay gõ liền / gõ sai): giúp Google và AI nối đúng "WEA", "weasoft", "Wea Soft"… về WEA Soft
    $tenKhac = array('WEA', 'WEASoft', 'weasoft', 'Wea Soft', 'WEA Software', 'weasoft.vn');
    $toChuc = array(
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'WEA Soft',
        'alternateName' => $tenKhac,
        'url' => 'https://weasoft.vn/',
        'description' => 'WEA Soft phát triển WEA Task – phần mềm quản lý công việc, quản lý dự án cho doanh nghiệp và đội nhóm – và cung cấp dịch vụ thiết kế website chuyên nghiệp, website nghiệp vụ theo yêu cầu, website lấy liền.',
        'knowsAbout' => array('Phần mềm quản lý công việc', 'Phần mềm quản lý dự án', 'Quản lý đội nhóm', 'Thiết kế website', 'Website nghiệp vụ', 'Website lấy liền'),
    );
    // Tên website hiện trên kết quả Google ("WEA Soft" thay vì "weasoft.vn")
    $trangWeb = array(
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        'name' => 'WEA Soft',
        'alternateName' => $tenKhac,
        'url' => 'https://weasoft.vn/',
        'inLanguage' => 'vi',
    );
    if(!empty($weaLogo['photo'])) $toChuc['logo'] = $https_config._upload_hinhanh_l.$weaLogo['photo'];
    if(!empty($sameAs)) $toChuc['sameAs'] = $sameAs;
    if(!empty($row_setting['email'])) $toChuc['email'] = $row_setting['email'];

    $giaCacGoi = array();
    foreach((array)$weaGoi as $v){
        $g = weaGia($v['ten2']);
        if($g['laSo']) $giaCacGoi[] = $g['thang'];
    }
    $ungDung = array(
        '@context' => 'https://schema.org',
        '@type' => 'SoftwareApplication',
        'name' => 'WEA Task',
        'applicationCategory' => 'BusinessApplication',
        'operatingSystem' => 'Web',
        'url' => $weaLinkApp,
        'publisher' => array('@type' => 'Organization', 'name' => 'WEA Soft'),
    );
    if(!empty($giaCacGoi)){
        $ungDung['offers'] = array(
            '@type' => 'AggregateOffer',
            'priceCurrency' => 'VND',
            'lowPrice' => min($giaCacGoi),
            'highPrice' => max($giaCacGoi),
            'offerCount' => count($giaCacGoi),
        );
    }

    $cauHoi = array();
    foreach((array)$weaHoiDap as $v){
        $cauHoi[] = array(
            '@type' => 'Question',
            'name' => htmlspecialchars_decode($v['ten'], ENT_QUOTES),
            'acceptedAnswer' => array('@type' => 'Answer', 'text' => trim(strip_tags(htmlspecialchars_decode($v['mota'], ENT_QUOTES)))),
        );
    }

    $kieuJson = JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG;
    $weaSchema = '<script type="application/ld+json">'.json_encode($trangWeb, $kieuJson).'</script>'
        .'<script type="application/ld+json">'.json_encode($toChuc, $kieuJson).'</script>'
        .'<script type="application/ld+json">'.json_encode($ungDung, $kieuJson).'</script>';
    if(!empty($cauHoi)){
        $weaSchema .= '<script type="application/ld+json">'.json_encode(array('@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => $cauHoi), $kieuJson).'</script>';
    }

?>
