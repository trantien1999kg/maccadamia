<?php  if(!defined('_source')) die("Error");

    include_once _source."wea_chung.php";

    /* ===== Trang Thiết kế & Phát triển Website (/thiet-ke-website). Nhập ở admin, các mục "Thiết kế website: ..." ===== */

    $webDau = weaKhoi('web-dau');
    $webSlide = weaDanhSach('web-slide', 8);
    $webNangLuc = weaDanhSach('web-nang-luc', 4);

    $webMoHinh = weaKhoi('web-mo-hinh');
    $webMoHinhThe = weaDanhSach('web-mo-hinh-the', 9);

    $webHaiMat = weaKhoi('web-hai-mat');
    $webHaiMatAnh = weaDanhSach('web-hai-mat-anh', 2);

    $webQuyTrinh = weaKhoi('web-quy-trinh');
    $webQuyTrinhBuoc = weaDanhSach('web-quy-trinh-buoc', 6);

    $webNenTang = weaKhoi('web-nen-tang');
    $webNenTangO = weaDanhSach('web-nen-tang-o', 4);

    $webForm = weaKhoi('web-form');

    // Lựa chọn "Loại website" của form = tên các mô hình + "Khác"
    $loaiWeb = array();
    foreach((array)$webMoHinhThe as $v){ $t = trim(htmlspecialchars_decode($v['ten'], ENT_QUOTES)); if($t != '') $loaiWeb[] = $t; }
    $loaiWeb[] = 'Khác';

    /* ===== Form tư vấn: kiểm dữ liệu (PHP là chốt cuối), chống spam (ô ẩn, mã chống giả mạo, giới hạn theo IP), lưu vào Khách liên hệ ===== */

    if(empty($_SESSION['wea_tv_ma'])) $_SESSION['wea_tv_ma'] = bin2hex(random_bytes(16));
    $tvMa = $_SESSION['wea_tv_ma'];
    $tvGiu = array('ho_ten' => '', 'lien_he' => '', 'loai' => '', 'nhu_cau' => '');
    $tvLoi = array();
    $tvXong = false;
    $tvThongBao = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['wea_tu_van'])){
        $laAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'fetch';
        foreach($tvGiu as $k => $v) $tvGiu[$k] = isset($_POST[$k]) ? trim((string)$_POST[$k]) : '';
        $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';

        if(!hash_equals($tvMa, isset($_POST['ma']) ? (string)$_POST['ma'] : '')){
            $tvThongBao = 'Phiên làm việc đã hết hạn. Bạn tải lại trang rồi gửi lại giúp mình nhé.';
        }elseif(isset($_POST['website']) && $_POST['website'] !== ''){
            // Ô ẩn bị điền: máy tự gửi. Trả về như thành công để không gợi ý cho máy spam
            $tvXong = true;
        }elseif(!empty($_SESSION['wea_tv_luc']) && time() - $_SESSION['wea_tv_luc'] < 60){
            $tvThongBao = 'Bạn vừa gửi yêu cầu. Vui lòng chờ khoảng 1 phút rồi gửi tiếp.';
        }else{
            $soDong = mb_strlen($tvGiu['ho_ten'], 'UTF-8');
            if($soDong < 2 || $soDong > 100) $tvLoi['ho_ten'] = 'Bạn nhập họ và tên (2–100 ký tự).';

            $soDienThoai = preg_replace('/[\s.\-()]/', '', $tvGiu['lien_he']);
            $laEmail = filter_var($tvGiu['lien_he'], FILTER_VALIDATE_EMAIL) !== false;
            $laSdt = preg_match('/^(\+84|0)\d{9,10}$/', $soDienThoai);
            if($tvGiu['lien_he'] == '') $tvLoi['lien_he'] = 'Bạn nhập email hoặc số điện thoại để chúng tôi liên hệ lại.';
            elseif(!$laEmail && !$laSdt) $tvLoi['lien_he'] = 'Email hoặc số điện thoại chưa đúng (vd ten@congty.vn hoặc 0901234567).';

            if(!in_array($tvGiu['loai'], $loaiWeb, true)) $tvLoi['loai'] = 'Bạn chọn loại website.';

            $soKyTu = mb_strlen($tvGiu['nhu_cau'], 'UTF-8');
            if($soKyTu < 10) $tvLoi['nhu_cau'] = 'Bạn mô tả ngắn nhu cầu (ít nhất 10 ký tự).';
            elseif($soKyTu > 3000) $tvLoi['nhu_cau'] = 'Nội dung hơi dài, bạn rút gọn dưới 3000 ký tự giúp mình.';

            if(empty($tvLoi)){
                // Mỗi IP tối đa 5 yêu cầu / giờ (IP ghi ở cột ghi chú)
                $daGui = $db->rawQueryOne("select count(*) as so from #_contact where type=? and notes like ? and createdAt > ?", array('contact', '%IP '.$ip, time() - 3600));
                if(!empty($daGui['so']) && (int)$daGui['so'] >= 5){
                    $tvThongBao = 'Bạn đã gửi khá nhiều yêu cầu. Vui lòng thử lại sau ít phút hoặc gọi trực tiếp cho chúng tôi.';
                }else{
                    $ok = $db->insert('contact', array(
                        'fullname' => htmlspecialchars($tvGiu['ho_ten'], ENT_QUOTES, 'UTF-8'),
                        'email' => $laEmail ? htmlspecialchars($tvGiu['lien_he'], ENT_QUOTES, 'UTF-8') : '',
                        'phone' => $laSdt ? $soDienThoai : '',
                        'subject' => htmlspecialchars('Tư vấn thiết kế website: '.$tvGiu['loai'], ENT_QUOTES, 'UTF-8'),
                        'content' => htmlspecialchars($tvGiu['nhu_cau'], ENT_QUOTES, 'UTF-8'),
                        'notes' => 'Gửi từ trang Thiết kế website · IP '.$ip,
                        'view' => 0,
                        'type' => 'contact',
                        'hienthi' => 1,
                        'photo' => '',
                        'thumb' => '',
                        'createdAt' => time(),
                    ));
                    if($ok){
                        $tvXong = true;
                        $_SESSION['wea_tv_luc'] = time();
                    }else{
                        $tvThongBao = 'Chưa gửi được yêu cầu. Bạn thử lại sau ít phút hoặc gọi trực tiếp cho chúng tôi.';
                    }
                }
            }
        }

        if($tvXong){
            $tvThongBao = 'Đã nhận yêu cầu của bạn. Chúng tôi sẽ liên hệ trong 24 giờ.';
            $tvGiu = array('ho_ten' => '', 'lien_he' => '', 'loai' => '', 'nhu_cau' => '');
        }

        if($laAjax){
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(array('ok' => $tvXong, 'loi' => $tvLoi, 'thongBao' => $tvThongBao), JSON_UNESCAPED_UNICODE);
            exit;
        }
    }

    /* ===== SEO ===== */
    weaSeoTrang('thiet-ke-website',
        'Thiết kế website chuyên nghiệp, website nghiệp vụ – WEA Soft',
        'WEA Soft thiết kế website chuyên nghiệp chuẩn SEO: website nghiệp vụ theo yêu cầu (bán hàng, đặt phòng, khóa học, web app) và website lấy liền bàn giao nhanh.');
    $seo->setSeo('type', 'website');
    $seo->setSeo('url', $https_config.'thiet-ke-website');
    $row_cano = $https_config.'thiet-ke-website';
    if(!empty($webSlide[0]['photo'])) weaSeoAnh($webSlide[0]['photo']);

    $weaSchema = '<script type="application/ld+json">'.json_encode(array(
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => array(
            array('@type' => 'ListItem', 'position' => 1, 'name' => 'Trang chủ', 'item' => $https_config),
            array('@type' => 'ListItem', 'position' => 2, 'name' => 'Thiết kế & Phát triển Website', 'item' => $https_config.'thiet-ke-website'),
        ),
    ), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG).'</script>';
    $weaSchema .= '<script type="application/ld+json">'.json_encode(array(
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => 'Thiết kế website chuyên nghiệp',
        'serviceType' => 'Thiết kế website',
        'description' => 'Thiết kế website chuyên nghiệp chuẩn SEO, website nghiệp vụ theo yêu cầu và website lấy liền theo mẫu.',
        'provider' => array('@type' => 'Organization', 'name' => 'WEA Soft', 'url' => 'https://weasoft.vn/'),
        // 3 dịch vụ chính, để Google / AI nối đúng các cụm "website nghiệp vụ", "website lấy liền" với WEA Soft
        'hasOfferCatalog' => array('@type' => 'OfferCatalog', 'name' => 'Dịch vụ thiết kế website', 'itemListElement' => array(
            array('@type' => 'Offer', 'itemOffered' => array('@type' => 'Service', 'name' => 'Thiết kế website chuyên nghiệp chuẩn SEO')),
            array('@type' => 'Offer', 'itemOffered' => array('@type' => 'Service', 'name' => 'Website nghiệp vụ theo yêu cầu', 'description' => 'Bán hàng, đặt phòng, khóa học, doanh nghiệp, web app theo quy trình riêng.')),
            array('@type' => 'Offer', 'itemOffered' => array('@type' => 'Service', 'name' => 'Website lấy liền', 'description' => 'Website dựng sẵn theo mẫu, đổi nội dung và thương hiệu rồi bàn giao nhanh.')),
        )),
        'areaServed' => 'VN',
        'url' => $https_config.'thiet-ke-website',
    ), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG).'</script>';
?>
