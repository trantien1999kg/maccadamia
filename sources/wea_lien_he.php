<?php  if(!defined('_source')) die("Error");

    include_once _source."wea_chung.php";

    /* ===== Trang Liên hệ WEA (theo ảnh mẫu 20/11/2026): banner + thông tin liên hệ + form "Gửi yêu cầu".
       Form gửi bằng JS (fetch, nhận JSON) và vẫn chạy khi tắt JS (gửi form thường, trang tải lại kèm thông báo).
       PHP là chốt kiểm cuối: mã chống giả mạo (CSRF), ô bẫy spam, giới hạn số lần gửi theo IP. Lưu vào bảng contact như form cũ ===== */

    $weaChuDe = array('wea-task' => 'WEA Task', 'thiet-ke-website' => 'Thiết kế website', 'khac' => 'Khác');

    if(empty($_SESSION['lienhe_token'])) $_SESSION['lienhe_token'] = bin2hex(random_bytes(16));

    $lhGiaTri = array('chude' => 'wea-task', 'hoten' => '', 'email' => '', 'noidung' => '');
    $lhLoi = array();
    $lhThongBao = '';
    $lhThanhCong = false;

    // Giới hạn tần suất: tối đa 5 lần gửi / 30 phút / IP. Lưu mốc thời gian vào file nhỏ (bảng contact không có cột IP)
    function lhKiemTanSuat($ghiThem)
    {
        $thuMuc = _root._ds.'cache'._ds.'lienhe';
        if(!is_dir($thuMuc)) @mkdir($thuMuc, 0755, true);
        $file = $thuMuc._ds.md5('wea'.(isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '')).'.txt';
        $moc = array();
        if(is_file($file)) foreach(explode(',', (string)@file_get_contents($file)) as $t){ if((int)$t > time() - 1800) $moc[] = (int)$t; }
        if(count($moc) >= 5) return false;
        if($ghiThem){ $moc[] = time(); @file_put_contents($file, implode(',', $moc), LOCK_EX); }
        return true;
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['lh_token'])){
        $laAjax = (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest');

        $lhGiaTri['chude'] = isset($_POST['chude']) ? (string)$_POST['chude'] : '';
        $lhGiaTri['hoten'] = trim(isset($_POST['hoten']) ? (string)$_POST['hoten'] : '');
        $lhGiaTri['email'] = trim(isset($_POST['email']) ? (string)$_POST['email'] : '');
        $lhGiaTri['noidung'] = trim(isset($_POST['noidung']) ? (string)$_POST['noidung'] : '');

        $hopLe = hash_equals($_SESSION['lienhe_token'], (string)$_POST['lh_token']);
        $laBot = (isset($_POST['website']) && $_POST['website'] !== '');

        if(!$hopLe){
            $lhThongBao = 'Phiên làm việc đã hết hạn. Bạn tải lại trang rồi gửi lại giúp WEA nhé.';
        }elseif($laBot){
            // Ô bẫy bị điền: báo như thành công để bot không dò ra, không lưu gì
            $lhThanhCong = true;
        }elseif(!lhKiemTanSuat(false)){
            $lhThongBao = 'Bạn đã gửi nhiều yêu cầu liên tiếp. Vui lòng thử lại sau ít phút hoặc gọi hotline.';
        }else{
            if(!isset($weaChuDe[$lhGiaTri['chude']])) $lhLoi['chude'] = 'Vui lòng chọn chủ đề.';
            if($lhGiaTri['hoten'] === '') $lhLoi['hoten'] = 'Vui lòng nhập họ và tên.';
            elseif(mb_strlen($lhGiaTri['hoten'], 'UTF-8') > 100) $lhLoi['hoten'] = 'Họ tên tối đa 100 ký tự.';
            if($lhGiaTri['email'] === '') $lhLoi['email'] = 'Vui lòng nhập email.';
            elseif(!filter_var($lhGiaTri['email'], FILTER_VALIDATE_EMAIL) || strlen($lhGiaTri['email']) > 150) $lhLoi['email'] = 'Email chưa đúng, ví dụ: ten@congty.vn';
            if($lhGiaTri['noidung'] === '') $lhLoi['noidung'] = 'Vui lòng cho WEA biết bạn cần hỗ trợ điều gì.';
            elseif(mb_strlen($lhGiaTri['noidung'], 'UTF-8') > 3000) $lhLoi['noidung'] = 'Nội dung tối đa 3.000 ký tự.';

            if(empty($lhLoi)){
                // Lưu như form cũ (dữ liệu đã escape) để mục Liên hệ trong admin hiển thị đúng
                $luu = array(
                    'fullname' => htmlspecialchars($lhGiaTri['hoten'], ENT_QUOTES, 'UTF-8'),
                    'email' => htmlspecialchars($lhGiaTri['email'], ENT_QUOTES, 'UTF-8'),
                    'phone' => '',
                    'address' => '',
                    'subject' => 'Liên hệ: '.$weaChuDe[$lhGiaTri['chude']],
                    'content' => htmlspecialchars($lhGiaTri['noidung'], ENT_QUOTES, 'UTF-8'),
                    'hienthi' => 1,
                    'type' => 'contact',
                    'createdAt' => time(),
                );
                $idMoi = $db->insert('contact', $luu);
                if($idMoi){
                    lhKiemTanSuat(true);
                    $lhThanhCong = true;
                }else{
                    $lhThongBao = 'Chưa gửi được yêu cầu. Bạn thử lại sau ít phút hoặc gọi hotline giúp WEA nhé.';
                }
            }
        }

        if($lhThanhCong){
            $lhThongBao = 'Đã nhận yêu cầu của bạn. WEA sẽ liên hệ lại trong 24 giờ làm việc.';
            $lhGiaTri = array('chude' => 'wea-task', 'hoten' => '', 'email' => '', 'noidung' => '');
        }

        if($laAjax){
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(array('ok' => $lhThanhCong, 'thongBao' => $lhThongBao, 'loi' => $lhLoi), JSON_UNESCAPED_UNICODE);
            exit;
        }
    }

    weaSeoTrang('lien-he', 'Liên hệ WEA Soft – Tư vấn WEA Task và thiết kế website', 'Liên hệ WEA Soft để được tư vấn phần mềm quản lý công việc WEA Task hoặc dịch vụ thiết kế website. Gửi yêu cầu, WEA phản hồi trong 24 giờ làm việc.');
    $seo->setSeo('type', 'website');
    $seo->setSeo('url', $https_config.'lien-he');
    $row_cano = $https_config.'lien-he';
    // 3 ảnh của trang nhập ở admin (mục Liên hệ: ảnh nền đầu trang / ảnh bên trái / ảnh tờ thư)
    $weaLhNen = weaKhoi('wea-lien-he-nen');
    $weaLhTrai = weaKhoi('wea-lien-he-trai');
    $weaLhPhai = weaKhoi('wea-lien-he-phai');
    weaSeoAnh(!empty($weaLhTrai['photo']) ? $weaLhTrai['photo'] : 'wea-lien-he-trai.webp');

    $weaSchema = '<script type="application/ld+json">'.json_encode(array(
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => array(
            array('@type' => 'ListItem', 'position' => 1, 'name' => 'Trang chủ', 'item' => $https_config),
            array('@type' => 'ListItem', 'position' => 2, 'name' => 'Liên hệ', 'item' => $https_config.'lien-he'),
        ),
    ), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG).'</script>';
?>
