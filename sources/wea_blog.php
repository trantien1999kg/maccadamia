<?php  if(!defined('_source')) die("Error");

    include_once _source."wea_chung.php";

    /* ===== Trang Blog (theo ảnh mẫu 23/11/2026): banner + 1 bài nổi bật (bài tích "Nổi bật" mới nhất) + lưới "Bài hướng dẫn".
       Chi tiết bài (/tin-tuc/ten-bai): Mô tả + Nội dung nhập bằng trình soạn thảo ở admin (bài viết "Tin tức") ===== */

    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    // URL có phần sau /tin-tuc/ nhưng không khớp bài nào thì báo 404, không hiện lại trang danh sách
    if(!$id && !empty($act)){
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
        $template = "error/404";
        return;
    }

    $duongDan = array(
        array('@type' => 'ListItem', 'position' => 1, 'name' => 'Trang chủ', 'item' => $https_config),
        array('@type' => 'ListItem', 'position' => 2, 'name' => 'Blog', 'item' => $https_config.'tin-tuc'),
    );

    if($id){

        /* ----- Chi tiết 1 bài ----- */

        $weaChiTiet = $db->rawQueryOne("select id, ten_$lang as ten, tenkhongdau_$lang as slug, mota_$lang as mota, noidung_$lang as noidung, photo, cano_$lang as cano, ngaytao, ngaysua from #_baiviet where type=? and hienthi=1 and id=? limit 0,1", array('tin-tuc', $id));

        if(empty($weaChiTiet)){
            header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
            $template = "error/404";
            return;
        }

        $db->rawQuery("update #_baiviet set luotxem = luotxem + 1 where id=?", array($id));

        $weaBaiKhac = $db->rawQuery("select id, ten_$lang as ten, tenkhongdau_$lang as slug, mota_$lang as mota, photo from #_baiviet where type=? and hienthi=1 and id<>? order by ngaytao desc, id desc limit 0,3", array('tin-tuc', $id));

        $tenBai = htmlspecialchars_decode($weaChiTiet['ten'], ENT_QUOTES);
        $moTaNgan = trim(preg_replace('/\s+/u', ' ', strip_tags(htmlspecialchars_decode($weaChiTiet['mota'], ENT_QUOTES))));
        $urlBai = $https_config.'tin-tuc/'.$weaChiTiet['slug'];

        $seo->setSeo('title', mb_substr($tenBai.' – Blog WEA Soft', 0, 60, 'UTF-8'));
        $seo->setSeo('description', mb_substr($moTaNgan, 0, 158, 'UTF-8'));
        $seoDB = $seo->getSeoDB($weaChiTiet['id'], 'baiviet', 'man', 'tin-tuc');
        if(!empty($seoDB['title_'.$seolang])) $seo->setSeo('title', $seoDB['title_'.$seolang]);
        if(!empty($seoDB['keywords_'.$seolang])) $seo->setSeo('keywords', $seoDB['keywords_'.$seolang]);
        if(!empty($seoDB['description_'.$seolang])) $seo->setSeo('description', $seoDB['description_'.$seolang]);
        $seo->setSeo('url', $urlBai);
        $seo->setSeo('type', 'article');
        $row_cano = !empty($weaChiTiet['cano']) ? $weaChiTiet['cano'] : $urlBai;
        if($weaChiTiet['photo'] != '') weaSeoAnh($weaChiTiet['photo'], _upload_baiviet_l);

        $duongDan[] = array('@type' => 'ListItem', 'position' => 3, 'name' => $tenBai, 'item' => $urlBai);

        $baiViet = array(
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $tenBai,
            'description' => $moTaNgan,
            'mainEntityOfPage' => $urlBai,
            'publisher' => array('@type' => 'Organization', 'name' => 'WEA Soft'),
        );
        if(!empty($weaChiTiet['ngaytao'])) $baiViet['datePublished'] = date('c', $weaChiTiet['ngaytao']);
        if(!empty($weaChiTiet['ngaysua'])) $baiViet['dateModified'] = date('c', $weaChiTiet['ngaysua']);
        if($weaChiTiet['photo'] != '') $baiViet['image'] = $https_config._upload_baiviet_l.$weaChiTiet['photo'];
        $weaSchema = '<script type="application/ld+json">'.json_encode($baiViet, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG).'</script>';

    }else{

        /* ----- Danh sách ----- */

        $weaSoBaiMoiTrang = 9;
        $weaDauTrang = $db->rawQueryOne("select ten_$lang as ten, mota_$lang as mota, photo from #_info where type=? limit 0,1", array('wea-blog'));

        // Bài nổi bật: bài tích "Nổi bật" mới nhất, chỉ hiện ở trang 1 và không lặp lại trong lưới bên dưới
        $weaNoiBat = $db->rawQueryOne("select id, ten_$lang as ten, tenkhongdau_$lang as slug, mota_$lang as mota, photo from #_baiviet where type=? and hienthi=1 and noibat=1 order by ngaytao desc, id desc limit 0,1", array('tin-tuc'));
        $boQua = !empty($weaNoiBat) ? (int)$weaNoiBat['id'] : 0;

        // Phân trang
        $tongBai = $db->rawQueryOne("select count(id) as tong from #_baiviet where type=? and hienthi=1 and id<>?", array('tin-tuc', $boQua));
        $weaTongTrang = max(1, (int)ceil(((int)$tongBai['tong']) / $weaSoBaiMoiTrang));
        $weaTrang = min(max(1, (int)(isset($_GET['page']) ? $_GET['page'] : 1)), $weaTongTrang);
        $batDau = ($weaTrang - 1) * $weaSoBaiMoiTrang;
        if($weaTrang > 1) $weaNoiBat = null;

        $weaBaiViet = $db->rawQuery("select id, ten_$lang as ten, tenkhongdau_$lang as slug, mota_$lang as mota, photo, ngaytao from #_baiviet where type=? and hienthi=1 and id<>? order by ngaytao desc, id desc limit $batDau, $weaSoBaiMoiTrang", array('tin-tuc', $boQua));

        weaSeoTrang('tin-tuc', 'Blog WEA Task – Hướng dẫn quản lý công việc đội nhóm', 'Hướng dẫn sử dụng WEA Task và kinh nghiệm quản lý công việc, dự án cho freelancer, agency và đội nhóm nhỏ.');
        $seo->setSeo('type','object');
        // Trang 2 trở đi: canonical về chính trang đó, tránh trùng nội dung với trang 1
        $row_cano = $https_config.'tin-tuc'.($weaTrang > 1 ? '?page='.$weaTrang : '');
        weaSeoAnh(!empty($weaDauTrang['photo']) ? $weaDauTrang['photo'] : 'wea-blog-banner.webp');
        $weaSchema = '';
    }

    $weaSchema .= '<script type="application/ld+json">'.json_encode(array('@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => $duongDan), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG).'</script>';

    // Mô tả bài dạng chữ thường (bỏ thẻ HTML của trình soạn thảo) để in trên thẻ
    function blogMoTa($html)
    {
        return weaChu(trim(strip_tags(htmlspecialchars_decode((string)$html, ENT_QUOTES))));
    }
?>
