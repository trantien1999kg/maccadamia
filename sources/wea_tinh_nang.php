<?php  if(!defined('_source')) die("Error");

    include_once _source."wea_chung.php";

    /* ===== Trang Tính năng (theo mẫu "Tính năng WEASoft.html"). Dữ liệu nhập ở admin, mục bài viết "Tính năng" ===== */

    $weaDauTrang = $db->rawQueryOne("select ten_$lang as ten, mota_$lang as mota, photo from #_info where type=? limit 0,1", array('wea-tinh-nang'));

    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    // URL có phần sau /tinh-nang/ nhưng không khớp bài nào thì báo 404, không hiện lại trang danh sách
    if(!$id && !empty($act)){
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
        $template = "error/404";
        return;
    }

    $duongDan = array(
        array('@type' => 'ListItem', 'position' => 1, 'name' => 'Trang chủ', 'item' => $https_config),
        array('@type' => 'ListItem', 'position' => 2, 'name' => 'Tính năng', 'item' => $https_config.'tinh-nang'),
    );

    if($id){

        /* ----- Trang chi tiết 1 tính năng ----- */

        $weaChiTiet = $db->rawQueryOne("select id, ten_$lang as ten, tenkhongdau_$lang as slug, mota_$lang as mota, noidung_$lang as noidung, photo, tenrieng as ma, cano_$lang as cano, ngaytao, ngaysua, type from #_baiviet where type=? and hienthi=1 and id=? limit 0,1", array('tinh-nang', $id));

        if(empty($weaChiTiet)){
            header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
            $template = "error/404";
            return;
        }

        // Các tính năng khác để gợi ý xem tiếp
        $weaTinhNangKhac = $db->rawQuery("select id, ten_$lang as ten, tenkhongdau_$lang as slug from #_baiviet where type=? and hienthi=1 and id<>? order by stt asc, id asc limit 0,6", array('tinh-nang', $id));

        $tenBai = htmlspecialchars_decode($weaChiTiet['ten'], ENT_QUOTES);
        $moTaNgan = trim(preg_replace('/\s+/u', ' ', strip_tags(htmlspecialchars_decode($weaChiTiet['mota'], ENT_QUOTES))));

        // SEO: mặc định lấy tên + mô tả, admin nhập SEO riêng cho bài thì dùng của admin
        $seo->setSeo('title', $tenBai.' – WEA Task');
        $seo->setSeo('description', mb_substr($moTaNgan, 0, 158, 'UTF-8'));
        $seoDB = $seo->getSeoDB($weaChiTiet['id'], 'baiviet', 'man', 'tinh-nang');
        if(!empty($seoDB['title_'.$seolang])) $seo->setSeo('title', $seoDB['title_'.$seolang]);
        if(!empty($seoDB['keywords_'.$seolang])) $seo->setSeo('keywords', $seoDB['keywords_'.$seolang]);
        if(!empty($seoDB['description_'.$seolang])) $seo->setSeo('description', $seoDB['description_'.$seolang]);
        $seo->setSeo('url', $https_config.'tinh-nang/'.$weaChiTiet['slug']);
        $seo->setSeo('type', 'article');
        $row_cano = !empty($weaChiTiet['cano']) ? $weaChiTiet['cano'] : $https_config.'tinh-nang/'.$weaChiTiet['slug'];
        if($weaChiTiet['photo'] != '') weaSeoAnh($weaChiTiet['photo'], _upload_baiviet_l);

        $duongDan[] = array('@type' => 'ListItem', 'position' => 3, 'name' => $tenBai, 'item' => $https_config.'tinh-nang/'.$weaChiTiet['slug']);

        $baiViet = array(
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $tenBai,
            'description' => $moTaNgan,
            'mainEntityOfPage' => $https_config.'tinh-nang/'.$weaChiTiet['slug'],
            'publisher' => array('@type' => 'Organization', 'name' => 'WEA Soft'),
        );
        if(!empty($weaChiTiet['ngaytao'])) $baiViet['datePublished'] = date('c', $weaChiTiet['ngaytao']);
        if(!empty($weaChiTiet['ngaysua'])) $baiViet['dateModified'] = date('c', $weaChiTiet['ngaysua']);
        if($weaChiTiet['photo'] != '') $baiViet['image'] = $https_config._upload_baiviet_l.$weaChiTiet['photo'];

        $weaSchema = '<script type="application/ld+json">'.json_encode($baiViet, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG).'</script>';

    }else{

        /* ----- Trang danh sách tính năng ----- */

        $weaTinhNang = $db->rawQuery("select id, ten_$lang as ten, ten2_$lang as ten2, tenkhongdau_$lang as slug, mota_$lang as mota, photo, tenrieng as ma from #_baiviet where type=? and hienthi=1 order by stt asc, id asc", array('tinh-nang'));

        weaSeoTrang('tinh-nang', 'Tính năng WEA Task – Kanban, Gantt, AI và tự động hóa', 'Khám phá tính năng WEA Task: Kanban, danh sách, quy trình, Gantt, báo cáo, trợ lý AI, workload và tự động hóa. Khách mời miễn phí.');
        weaSeoAnh(!empty($weaDauTrang['photo']) ? $weaDauTrang['photo'] : 'wea-tinh-nang-banner.webp');

        $seo->setSeo('type', 'website');

        $weaSchema = '';

    }

    $weaSchema .= '<script type="application/ld+json">'.json_encode(array(
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => $duongDan,
    ), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG).'</script>';

?>
