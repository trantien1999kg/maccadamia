<?php  if(!defined('_source')) die("Error");

    include_once _source."wea_chung.php";

    /* ===== Bài viết Cam kết. Nhập ở admin mục bài viết "Cam kết":
       Tên + Mô tả hiện ở thẻ, Nội dung hiện ở trang chi tiết, tích "Nổi bật" thì hiện ở khối Cam kết trang chủ ===== */

    $weaDauTrang = $db->rawQueryOne("select ten_$lang as ten, mota_$lang as mota from #_info where type=? limit 0,1", array('wea-cam-ket-dau'));

    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    // Có phần sau /cam-ket/ nhưng không khớp bài nào thì báo 404
    if(!$id && !empty($act)){
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
        $template = "error/404";
        return;
    }

    $duongDan = array(
        array('@type' => 'ListItem', 'position' => 1, 'name' => 'Trang chủ', 'item' => $https_config),
        array('@type' => 'ListItem', 'position' => 2, 'name' => 'Cam kết', 'item' => $https_config.'cam-ket'),
    );

    if($id){

        /* ----- Trang chi tiết 1 bài cam kết ----- */

        $weaChiTiet = $db->rawQueryOne("select id, ten_$lang as ten, tenkhongdau_$lang as slug, mota_$lang as mota, noidung_$lang as noidung, photo, cano_$lang as cano, ngaytao, ngaysua from #_baiviet where type=? and hienthi=1 and id=? limit 0,1", array('cam-ket', $id));

        if(empty($weaChiTiet)){
            header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
            $template = "error/404";
            return;
        }

        $weaCamKetKhac = $db->rawQuery("select id, ten_$lang as ten, tenkhongdau_$lang as slug from #_baiviet where type=? and hienthi=1 and id<>? order by stt asc, id asc limit 0,6", array('cam-ket', $id));

        $tenBai = htmlspecialchars_decode($weaChiTiet['ten'], ENT_QUOTES);
        $moTaNgan = trim(preg_replace('/\s+/u', ' ', strip_tags(htmlspecialchars_decode($weaChiTiet['mota'], ENT_QUOTES))));

        $seo->setSeo('title', $tenBai.' – Cam kết của WEA Soft');
        $seo->setSeo('description', mb_substr($moTaNgan, 0, 158, 'UTF-8'));
        $seoDB = $seo->getSeoDB($weaChiTiet['id'], 'baiviet', 'man', 'cam-ket');
        if(!empty($seoDB['title_'.$seolang])) $seo->setSeo('title', $seoDB['title_'.$seolang]);
        if(!empty($seoDB['keywords_'.$seolang])) $seo->setSeo('keywords', $seoDB['keywords_'.$seolang]);
        if(!empty($seoDB['description_'.$seolang])) $seo->setSeo('description', $seoDB['description_'.$seolang]);
        $seo->setSeo('url', $https_config.'cam-ket/'.$weaChiTiet['slug']);
        $seo->setSeo('type', 'article');
        $row_cano = !empty($weaChiTiet['cano']) ? $weaChiTiet['cano'] : $https_config.'cam-ket/'.$weaChiTiet['slug'];
        if($weaChiTiet['photo'] != '') weaSeoAnh($weaChiTiet['photo'], _upload_baiviet_l);

        $duongDan[] = array('@type' => 'ListItem', 'position' => 3, 'name' => $tenBai, 'item' => $https_config.'cam-ket/'.$weaChiTiet['slug']);

        $baiViet = array(
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $tenBai,
            'description' => $moTaNgan,
            'mainEntityOfPage' => $https_config.'cam-ket/'.$weaChiTiet['slug'],
            'publisher' => array('@type' => 'Organization', 'name' => 'WEA Soft'),
        );
        if(!empty($weaChiTiet['ngaytao'])) $baiViet['datePublished'] = date('c', $weaChiTiet['ngaytao']);
        if(!empty($weaChiTiet['ngaysua'])) $baiViet['dateModified'] = date('c', $weaChiTiet['ngaysua']);
        if($weaChiTiet['photo'] != '') $baiViet['image'] = $https_config._upload_baiviet_l.$weaChiTiet['photo'];

        $weaSchema = '<script type="application/ld+json">'.json_encode($baiViet, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG).'</script>';

    }else{

        /* ----- Trang danh sách tất cả bài cam kết ----- */

        $weaCamKet = $db->rawQuery("select id, ten_$lang as ten, tenkhongdau_$lang as slug, mota_$lang as mota, photo, ngaytao from #_baiviet where type=? and hienthi=1 order by stt asc, id desc", array('cam-ket'));

        weaSeoTrang('cam-ket', 'Cam kết của WEA Soft – Đồng hành cùng đội ngũ của bạn', 'Những cam kết của WEA Soft khi đồng hành cùng doanh nghiệp: trải nghiệm trước khi quyết định, hỗ trợ khi cần và mở rộng theo nhu cầu thực tế.');

        $seo->setSeo('type', 'website');

        $weaSchema = '';
    }

    $weaSchema .= '<script type="application/ld+json">'.json_encode(array('@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => $duongDan), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG).'</script>';
?>
