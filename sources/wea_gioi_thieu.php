<?php  if(!defined('_source')) die("Error");

    include_once _source."wea_chung.php";

    /* ===== Trang Giới thiệu dạng bài viết. Nhập ở admin:
       - Giới thiệu: Tên = tiêu đề trang, Mô tả = câu dẫn, Nội dung = lá thư của người sáng lập, Hình = ảnh tác giả / minh họa
       - Trang chủ: Giá trị (Về WEA): 4 mục Câu chuyện / Sứ mệnh / Lắng nghe / Điều mong (dùng chung với trang chủ) ===== */

    $weaGioiThieu = $db->rawQueryOne("select ten_$lang as ten, mota_$lang as mota, noidung_$lang as noidung, photo from #_info where type=? limit 0,1", array('gioi-thieu'));
    $weaVeWea = $db->rawQueryOne("select ten_$lang as ten, mota_$lang as mota, photo from #_info where type=? limit 0,1", array('wea-ve-wea'));
    // 4 điều làm nên WEA (dùng chung với trang chủ). Link tag = tên mục trong khung "Trong bài viết"
    // Dùng select * để trang vẫn chạy khi DB chưa có cột noidung_vi (cột Nội dung riêng cho trang Giới thiệu)
    $weaGiaTri = $db->rawQuery("select *, ten_$lang as ten, ten2_$lang as ten2, mota_$lang as mota, photo_vi as photo, linktag_$lang as muc from #_photo where type=? and hienthi=1 order by stt asc, id asc limit 0,8", array('wea-gia-tri'));
    foreach($weaGiaTri as $k => $v) $weaGiaTri[$k]['noidung'] = isset($v['noidung_'.$lang]) ? $v['noidung_'.$lang] : '';

    $tenTrang = !empty($weaGioiThieu['ten']) ? trim(htmlspecialchars_decode($weaGioiThieu['ten'], ENT_QUOTES)) : 'Về WEA Soft';
    $moTaNgan = !empty($weaGioiThieu['mota']) ? trim(preg_replace('/\s+/u', ' ', strip_tags(htmlspecialchars_decode($weaGioiThieu['mota'], ENT_QUOTES)))) : '';

    weaSeoTrang('gioi-thieu',
        'Về WEA Soft – Câu chuyện làm phần mềm quản lý công việc',
        $moTaNgan != '' ? mb_substr($moTaNgan, 0, 158, 'UTF-8') : 'WEA Soft bắt đầu từ một người làm kỹ thuật hiểu nỗi mệt của đội nhỏ. Câu chuyện, sứ mệnh và điều chúng tôi mong khi làm WEA Task.');
    $seo->setSeo('type', 'article');
    $seo->setSeo('url', $https_config.'gioi-thieu');
    $row_cano = $https_config.'gioi-thieu';
    $anhSeo = !empty($weaGioiThieu['photo']) ? $weaGioiThieu['photo'] : (!empty($weaVeWea['photo']) ? $weaVeWea['photo'] : '');
    if($anhSeo != '') weaSeoAnh($anhSeo);

    $weaSchema = '<script type="application/ld+json">'.json_encode(array(
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => array(
            array('@type' => 'ListItem', 'position' => 1, 'name' => 'Trang chủ', 'item' => $https_config),
            array('@type' => 'ListItem', 'position' => 2, 'name' => 'Giới thiệu', 'item' => $https_config.'gioi-thieu'),
        ),
    ), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG).'</script>';
    $weaSchema .= '<script type="application/ld+json">'.json_encode(array(
        '@context' => 'https://schema.org',
        '@type' => 'AboutPage',
        'name' => $tenTrang,
        'url' => $https_config.'gioi-thieu',
        'about' => array('@type' => 'Organization', 'name' => 'WEA Soft', 'url' => $https_config),
    ), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG).'</script>';
?>
