<?php  if(!defined('_source')) die("Error");

    /* ===== Phần dùng chung cho các trang giao diện WEA (trang chủ, tính năng, blog) ===== */

    // Admin lưu chữ đã qua htmlspecialchars, nên giải mã trước rồi escape lại đúng một lần
    function weaChu($chuoi)
    {
        return htmlspecialchars(htmlspecialchars_decode((string)$chuoi, ENT_QUOTES), ENT_QUOTES, 'UTF-8');
    }

    // Nội dung CKEditor: giải mã để ra HTML (nội dung do admin nhập)
    function weaHtml($chuoi)
    {
        return htmlspecialchars_decode((string)$chuoi, ENT_QUOTES);
    }

    // Tách mô tả nhiều dòng thành mảng, bỏ dòng trống
    function weaDong($chuoi)
    {
        $dong = preg_split('/\r\n|\r|\n/', htmlspecialchars_decode((string)$chuoi, ENT_QUOTES));
        return array_values(array_filter(array_map('trim', $dong), 'strlen'));
    }

    // In thẻ <img> có width/height thật (tránh trang bị giật khi ảnh tải xong)
    function weaAnh($tenFile, $alt, $thuocTinh = '', $lazy = true, $wMacDinh = 0, $hMacDinh = 0, $thuMuc = _upload_hinhanh_l)
    {
        if($tenFile == '') return '';
        $duongDan = $thuMuc.$tenFile;
        // Chưa có file ảnh thì không in thẻ img (tránh ảnh vỡ), khối vẫn hiện phần chữ
        if(!file_exists($duongDan)) return '';
        $kichThuoc = @getimagesize($duongDan);
        $w = $kichThuoc ? $kichThuoc[0] : $wMacDinh;
        $h = $kichThuoc ? $kichThuoc[1] : $hMacDinh;
        return '<img src="'.weaChu($duongDan).'" alt="'.weaChu($alt).'"'
            .($w ? ' width="'.$w.'" height="'.$h.'"' : '')
            .($lazy ? ' loading="lazy"' : '')
            .' decoding="async" '.$thuocTinh.'>';
    }

    // Ảnh to co nét bằng hàm createThumb của web (đường dẫn thumbs/RxCx3/... : co vừa khung, giữ tỉ lệ, không cắt).
    // Màn thường dùng bản đã co đúng cỡ khung, màn nét cao (Retina) dùng ảnh gốc; ảnh gốc nhỏ hơn khung thì in thẳng
    // Ảnh GIF "rê chuột mới chạy 1 lần": từ file GIF admin tải lên, tự tạo (1 lần, tạo lại khi GIF đổi)
    // - ảnh tĩnh = khung hình đầu (WebP) để hiện sẵn
    // - bản GIF bỏ khối lặp NETSCAPE2.0 để trình duyệt chỉ chạy 1 vòng
    // Không phải GIF / lỗi thì trả null (dùng ảnh thường)
    function weaGifReChuot($tenFile, $thuMuc)
    {
        $goc = $thuMuc.$tenFile;
        if(strtolower(pathinfo($tenFile, PATHINFO_EXTENSION)) != 'gif' || !is_file($goc)) return null;
        $ten = pathinfo($tenFile, PATHINFO_FILENAME);
        $tinh = $thuMuc.$ten.'-tinh.webp';
        $motLan = $thuMuc.$ten.'-1lan.gif';
        $moc = filemtime($goc);
        if(!is_file($tinh) || filemtime($tinh) < $moc){
            $im = @imagecreatefromgif($goc);
            if(!$im) return null;
            imagepalettetotruecolor($im);
            @imagewebp($im, $tinh, 86);
            imagedestroy($im);
        }
        if(!is_file($motLan) || filemtime($motLan) < $moc){
            $b = file_get_contents($goc);
            $p = strpos($b, "\x21\xFF\x0BNETSCAPE2.0");
            // Khối lặp dài 19 byte: 21 FF 0B "NETSCAPE2.0" 03 01 <số lần lặp 2 byte> 00
            if($p !== false && substr($b, $p + 14, 2) == "\x03\x01" && $b[$p + 18] == "\x00") $b = substr($b, 0, $p).substr($b, $p + 19);
            @file_put_contents($motLan, $b);
        }
        if(!is_file($tinh) || !is_file($motLan)) return null;
        // Màu nền ảnh (điểm ở góc trên trái) để tô nền thẻ cho ảnh hòa vào thẻ; lưu sẵn ra file nhỏ, khỏi đọc ảnh mỗi lần
        $fileNen = $thuMuc.$ten.'-nen.txt';
        if(!is_file($fileNen) || filemtime($fileNen) < $moc){
            $im = @imagecreatefromwebp($tinh);
            $nen = '';
            // Lấy màu xuất hiện nhiều nhất (nền chiếm phần lớn ảnh), chính xác hơn 1 điểm ở góc
            if($im){
                $dem = array(); $w = imagesx($im); $h = imagesy($im);
                for($x = 0; $x < $w; $x += 4) for($y = 0; $y < $h; $y += 4){ $m = imagecolorat($im, $x, $y) & 0xFFFFFF; $dem[$m] = isset($dem[$m]) ? $dem[$m] + 1 : 1; }
                arsort($dem); $nen = sprintf('#%06x', key($dem)); imagedestroy($im);
            }
            @file_put_contents($fileNen, $nen);
        }
        $nen = is_file($fileNen) ? trim(file_get_contents($fileNen)) : '';
        $kt = @getimagesize($goc);
        return array('tinh' => $tinh, 'gif' => $motLan, 'w' => $kt ? $kt[0] : 0, 'h' => $kt ? $kt[1] : 0, 'nen' => preg_match('/^#[0-9a-f]{6}$/', $nen) ? $nen : '');
    }

    function weaAnhNet($tenFile, $alt, $wKhung, $hKhung, $lazy = true, $sizes = '(max-width: 960px) 92vw, 46vw')
    {
        if($tenFile == '') return '';
        $duongDan = _upload_hinhanh_l.$tenFile;
        if(!file_exists($duongDan)) return '';
        // GIF động: không co (co sẽ mất chuyển động). GIF của tab chưa mở ($lazy) chưa tải ngay, JS gắn src khi bấm tab (data-src)
        if(strtolower(pathinfo($tenFile, PATHINFO_EXTENSION)) == 'gif'){
            $the = weaAnh($tenFile, $alt, '', false);
            return $lazy ? str_replace(' src="', ' src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="', $the) : $the;
        }
        $k = @getimagesize($duongDan);
        if(!$k || ($k[0] <= $wKhung && $k[1] <= $hKhung)) return weaAnh($tenFile, $alt, '', $lazy);
        $tiLe = min($wKhung / $k[0], $hKhung / $k[1]);
        $w = (int)round($k[0] * $tiLe);
        $h = (int)round($k[1] * $tiLe);
        $nho = _thumbs.'/'.$wKhung.'x'.$hKhung.'x3/'.$duongDan;
        return '<img src="'.weaChu($nho).'" srcset="'.weaChu($nho).' '.$w.'w, '.weaChu($duongDan).' '.$k[0].'w" sizes="'.weaChu($sizes).'" alt="'.weaChu($alt).'" width="'.$w.'" height="'.$h.'"'
            .($lazy ? ' loading="lazy"' : '').' decoding="async">';
    }

    // Tiêu đề có phần trong [ ] được tô màu, vd: "Cả team [rảnh tay.]"
    function weaTieuDe($chuoi, $the = 'em')
    {
        return preg_replace('/\[(.+?)\]/u', '<'.$the.'>$1</'.$the.'>', weaChu($chuoi));
    }

    // SEO trang con: mặc định theo thiết kế, admin nhập ở "SEO page" thì dùng của admin
    function weaSeoTrang($loai, $tieuDeMacDinh, $moTaMacDinh)
    {
        global $db, $seo, $func, $seolang, $https_config;

        $seo->setSeo('title', $tieuDeMacDinh);
        $seo->setSeo('description', $moTaMacDinh);

        $seoPage = $db->rawQueryOne("select * from #_seopage where type = ? limit 0,1", array($loai));
        if(!empty($seoPage['title_'.$seolang])) $seo->setSeo('title', $seoPage['title_'.$seolang]);
        if(!empty($seoPage['keywords_'.$seolang])) $seo->setSeo('keywords', $seoPage['keywords_'.$seolang]);
        if(!empty($seoPage['description_'.$seolang])) $seo->setSeo('description', $seoPage['description_'.$seolang]);

        $seo->setSeo('url', $func->getCurrentPageURL());

        if(!empty($seoPage['photo'])) weaSeoAnh($seoPage['photo']);
    }

    // Ảnh chia sẻ mạng xã hội (og:image)
    function weaSeoAnh($tenFile, $thuMuc = _upload_hinhanh_l)
    {
        global $seo, $func, $https_config;

        $anh = $func->getImgSize($tenFile, $thuMuc.$tenFile);
        if(empty($anh['w'])) return;
        $seo->setSeo('photo', $https_config.$thuMuc.$tenFile);
        $seo->setSeo('photo:width', $anh['w']);
        $seo->setSeo('photo:height', $anh['h']);
        $seo->setSeo('photo:type', $anh['m']);
    }

    // Bộ icon nét SVG dùng chung (cùng độ dày nét, theo màu chữ). Không dùng emoji thay icon.
    function weaIcon($ten, $lop = 'ic')
    {
        $net = array(
            'chat2' => '<path d="M14 9a2 2 0 0 1-2 2H6l-4 4V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2z"/><path d="M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1"/><path d="M5.5 6.5h.01M8 6.5h.01M10.5 6.5h.01"/>',
            'pen' => '<path d="M15.7 21.3a1 1 0 0 1-1.4 0l-1.6-1.6a1 1 0 0 1 0-1.4l5.6-5.6a1 1 0 0 1 1.4 0l1.6 1.6a1 1 0 0 1 0 1.4z"/><path d="m18 13-1.4-6.9a1 1 0 0 0-.7-.8L3.2 2a1 1 0 0 0-1.2 1.2l3.3 12.7a1 1 0 0 0 .8.7L13 18"/><path d="m2.3 2.3 7.3 7.3"/><circle cx="11" cy="11" r="2"/>',
            'code' => '<path d="M8 8l-4 4 4 4M16 8l4 4-4 4M13.5 5.5l-3 13"/>',
            'shield-check' => '<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/>',
            'rocket' => '<path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/><circle cx="16" cy="8" r="1.4"/>',
            'headset' => '<path d="M4 14v-2a8 8 0 0116 0v2"/><path d="M20 14v3a2 2 0 01-2 2h-1v-6h1a2 2 0 012 2zM4 14v3a2 2 0 002 2h1v-6H6a2 2 0 00-2 2z"/>',
            'sprout' => '<path d="M7 20h10"/><path d="M10 20c5.5-2.5.8-6.4 3-10"/><path d="M9.5 9.4c1.1.8 1.8 2.2 2.3 3.7-2 .4-3.5.4-4.8-.3-1.2-.6-2.3-1.9-3-4.2 2.8-.5 4.4 0 5.5.8z"/><path d="M14.1 6a7 7 0 0 0-1.1 4c1.9-.1 3.3-.6 4.3-1.4 1-1 1.6-2.3 1.7-4.6-2.7.1-4 1-4.9 2z"/>',
            'chart-up' => '<path d="M4 20h16"/><rect x="5" y="14" width="3" height="4" rx=".5"/><rect x="10.5" y="11" width="3" height="7" rx=".5"/><rect x="16" y="8" width="3" height="10" rx=".5"/><path d="M5 10l5-4 3 2 6-5M15 3h4v4"/>',
            'heart' => '<path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>',
            'chat-oval' => '<path d="M12 3.5c5.25 0 9.5 3.13 9.5 7s-4.25 7-9.5 7c-1.15 0-2.25-.15-3.27-.43L4.5 19.5l1.02-3.55C3.95 14.7 2.5 12.7 2.5 10.5c0-3.87 4.25-7 9.5-7z"/><path d="M8 10.5h.01M12 10.5h.01M16 10.5h.01" stroke-width="2.8"/>',
            'clock' => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
            'bolt' => '<path d="M13 2L4 14h7l-1 8 9-12h-7z"/>',
            'users' => '<circle cx="9" cy="8" r="3.5"/><path d="M2.5 20a6.5 6.5 0 0113 0"/><path d="M16 4.5a3.5 3.5 0 010 7M21.5 20a6.5 6.5 0 00-4-6"/>',
            'shield' => '<path d="M12 3l8 3v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V6z"/><path d="M9 12l2 2 4-4"/>',
            'folder' => '<path d="M3 7a2 2 0 012-2h4l2 2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>',
            'monitor' => '<rect width="20" height="14" x="2" y="3" rx="2"/><path d="M8 21h8M12 17v4"/><path d="M6 7h6M6 10h4"/>',
            'chat-dots' => '<path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/><path d="M8 12h.01M12 12h.01M16 12h.01"/>',
            'calendar-so' => '<path d="M8 2v4M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18M8 14h.01M12 14h.01M16 14h.01M8 18h.01M12 18h.01M16 18h.01"/>',
            'layers3' => '<path d="M12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83z"/><path d="M2 12a1 1 0 0 0 .58.91l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9A1 1 0 0 0 22 12"/><path d="M2 17a1 1 0 0 0 .58.91l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9A1 1 0 0 0 22 17"/>',
            'calendar' => '<rect x="3" y="5" width="18" height="16" rx="2"/><path d="M3 10h18M8 3v4M16 3v4"/><path d="M9 15l2 2 4-4"/>',
            'team' => '<circle cx="12" cy="8" r="3"/><circle cx="5" cy="10" r="2.2"/><circle cx="19" cy="10" r="2.2"/><path d="M6.5 20a5.5 5.5 0 0111 0M1.5 19a4 4 0 015-3.5M22.5 19a4 4 0 00-5-3.5"/>',
            'kanban' => '<rect x="3" y="4" width="18" height="16" rx="2"/><path d="M9 4v16M15 4v16"/>',
            'gantt' => '<path d="M4 4v16h16"/><rect x="7" y="7" width="7" height="3" rx="1"/><rect x="10" y="13" width="8" height="3" rx="1"/>',
            'chart' => '<path d="M4 20V10M10 20V4M16 20v-7M22 20H2"/>',
            'chat' => '<path d="M4 5h16v11H9l-5 4z"/><path d="M8 10h8M8 13h5"/>',
            'globe' => '<circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a14 14 0 010 18M12 3a14 14 0 000 18"/>',
            'cart' => '<circle cx="9" cy="20" r="1.5"/><circle cx="18" cy="20" r="1.5"/><path d="M2 3h3l2.5 12h11.5l2-8H6"/>',
            'grid' => '<rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/>',
            'cog' => '<circle cx="12" cy="12" r="3"/><path d="M12 2v3M12 19v3M2 12h3M19 12h3M4.9 4.9l2.1 2.1M17 17l2.1 2.1M19.1 4.9L17 7M7 17l-2.1 2.1"/>',
            'trend' => '<path d="M3 17l6-6 4 4 8-8"/><path d="M15 7h6v6"/>',
            'layers' => '<path d="M12 3l9 5-9 5-9-5z"/><path d="M3 13l9 5 9-5"/>',
            'flag' => '<path d="M5 21V4"/><path d="M5 4h11l-2 4 2 4H5"/>',
            'target' => '<circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1.5"/>',
            'book' => '<path d="M4 5a2 2 0 0 1 2-2h13v15H6a2 2 0 0 0-2 2z"/><path d="M4 20a2 2 0 0 0 2 2h13v-4"/><path d="M9 8h6M9 11h4"/>',
            'handshake' => '<path d="M12 21s-8-4.5-8-11a4.5 4.5 0 018-2.8A4.5 4.5 0 0120 10c0 6.5-8 11-8 11z"/>',
            'star' => '<path d="M12 3l2.7 5.6 6.1.9-4.4 4.3 1 6.1L12 17l-5.4 2.9 1-6.1-4.4-4.3 6.1-.9z"/>',
            'check' => '<circle cx="12" cy="12" r="9"/><path d="M8 12l3 3 5-6"/>',
            'arrow' => '<path d="M5 12h14M13 6l6 6-6 6"/>',
            'arrow-cheo' => '<path d="M7 17L17 7M8 7h9v9"/>',
            'external' => '<path d="M14 4h6v6M20 4l-9 9"/><path d="M18 14v5a1 1 0 01-1 1H5a1 1 0 01-1-1V7a1 1 0 011-1h5"/>',
            'play' => '<circle cx="12" cy="12" r="9"/><path d="M10 8.5l6 3.5-6 3.5z"/>',
            'chevron' => '<path d="M6 9l6 6 6-6"/>',
            'send' => '<path d="M21 3L10 14"/><path d="M21 3l-7 18-4-7-7-4 18-7z"/>',
            'mail' => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/>',
            'phone' => '<path d="M5 3h4l2 5-2.5 1.5a11 11 0 006 6L16 13l5 2v4a2 2 0 01-2 2A17 17 0 013 5a2 2 0 012-2z"/>',
            'pin' => '<path d="M12 21s-7-6.5-7-12a7 7 0 0114 0c0 5.5-7 12-7 12z"/><circle cx="12" cy="9" r="2.5"/>',
            'menu' => '<path d="M4 7h16M4 12h16M4 17h16"/>',
            'search' => '<circle cx="11" cy="11" r="7"/><path d="M21 21l-5-5"/>',
            'question' => '<circle cx="12" cy="12" r="9"/><path d="M9.5 9.5a2.5 2.5 0 015 .5c0 1.5-2.5 2-2.5 3.5M12 17h.01"/>',
        );
        // Icon mạng xã hội dạng khối đặc
        $dac = array(
            'facebook' => '<path d="M14 8h2V5h-2.5C11 5 10 6.6 10 8.8V11H8v3h2v7h3v-7h2.4l.6-3h-3V9c0-.6.4-1 1-1z"/>',
            'youtube' => '<path d="M21.6 7.2a2.6 2.6 0 00-1.8-1.8C18.2 5 12 5 12 5s-6.2 0-7.8.4a2.6 2.6 0 00-1.8 1.8A27 27 0 002 12a27 27 0 00.4 4.8 2.6 2.6 0 001.8 1.8C5.8 19 12 19 12 19s6.2 0 7.8-.4a2.6 2.6 0 001.8-1.8A27 27 0 0022 12a27 27 0 00-.4-4.8zM10 15V9l5.2 3z"/>',
            'linkedin' => '<path d="M5 9h3v11H5zM6.5 4a1.7 1.7 0 110 3.4 1.7 1.7 0 010-3.4zM10 9h2.9v1.5c.4-.8 1.5-1.7 3.1-1.7 3.3 0 3.9 2.1 3.9 4.9V20h-3v-5.6c0-1.3 0-3-1.9-3s-2.1 1.4-2.1 2.9V20H10z"/>',
        );
        if(isset($dac[$ten])) return '<svg class="'.$lop.'" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false">'.$dac[$ten].'</svg>';
        if(!isset($net[$ten])) return '';
        return '<svg class="'.$lop.'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">'.$net[$ten].'</svg>';
    }

    /* ===== Đọc dữ liệu các khối WEA (nhập ở admin) + định dạng, dùng chung cho trang chủ và các trang con ===== */

    // Đọc 1 khối chữ / ảnh (table_info) theo type
    function weaKhoi($loai)
    {
        global $db, $lang;
        return $db->rawQueryOne("select ten_$lang as ten, mota_$lang as mota, photo from #_info where type=? limit 0,1", array($loai));
    }

    // Đường dẫn ảnh nhập ở admin (upload/hinhanh), kèm ?v= theo ngày sửa file để trình duyệt không giữ ảnh cũ.
    // Chưa nhập hoặc mất file thì dùng ảnh mặc định $macDinh (cũng nằm trong upload/hinhanh)
    function weaAnhAdmin($tenFile, $macDinh = "", $tuyetDoi = false)
    {
        global $https_config;
        $ten = ($tenFile != "" && is_file(_upload_hinhanh_l.$tenFile)) ? $tenFile : $macDinh;
        if($ten == "" || !is_file(_upload_hinhanh_l.$ten)) return "";
        return ($tuyetDoi ? $https_config : "")._upload_hinhanh_l.$ten."?v=".filemtime(_upload_hinhanh_l.$ten);
    }

    // Đọc danh sách thẻ (table_photo) theo type, theo thứ tự STT
    function weaDanhSach($loai, $gioiHan = 20)
    {
        global $db, $lang;
        return $db->rawQuery("select id, ten_$lang as ten, ten2_$lang as ten2, mota_$lang as mota, photo_vi as photo, link, linktag_$lang as chuLink, number from #_photo where type=? and hienthi=1 order by stt asc, id asc limit 0,".(int)$gioiHan, array($loai));
    }

    // Giá gói: "59000|53000" -> giá tháng, giá năm (đồng / người / tháng). Không phải số thì hiện nguyên chữ (vd "Liên hệ")
    function weaGia($chuoi)
    {
        $phan = array_map('trim', explode('|', htmlspecialchars_decode((string)$chuoi, ENT_QUOTES)));
        $thang = isset($phan[0]) ? $phan[0] : '';
        $nam = isset($phan[1]) && $phan[1] !== '' ? $phan[1] : $thang;
        $laSo = preg_match('/^\d[\d.]*$/', $thang) && preg_match('/^\d[\d.]*$/', $nam);
        return array(
            'laSo' => (bool)$laSo,
            'thang' => $laSo ? (int)str_replace('.', '', $thang) : $thang,
            'nam' => $laSo ? (int)str_replace('.', '', $nam) : $nam,
        );
    }

    // Tiêu đề từ admin: [ ] tô màu, | xuống dòng
    function weaTieuDeDong($chuoi)
    {
        // Có dấu cách trước <br> để khi ẩn <br> trên điện thoại, các chữ không bị dính vào nhau
        return str_replace('|', ' <br>', weaTieuDe($chuoi, 'em'));
    }

    // Tiền Việt: 59000 -> 59.000đ
    function weaTien($so)
    {
        return number_format((int)$so, 0, ',', '.').'đ';
    }

    /* ===== Đường dẫn sang phần mềm WEA Task (app.weasoft.vn) ===== */

    $weaLinkApp = 'https://app.weasoft.vn';

    $weaLinkDangKy = 'https://app.weasoft.vn/login.html';

    /* ===== Dữ liệu dùng chung: logo, liên hệ (menu + footer) ===== */

    $weaLogo = $db->rawQueryOne("select photo_vi as photo from #_bannerqc where type=? and hienthi=1 limit 0,1", array('logo'));

    $weaHotline = preg_replace('/[^0-9+]/', '', (string)$row_setting['hotline']);

    $weaZalo = preg_replace('/[^0-9]/', '', (string)($row_setting['sozalo'] != '' ? $row_setting['sozalo'] : $row_setting['hotline']));

    // Dữ liệu cấu trúc (JSON-LD) của từng trang, khung trang sẽ in ra trong <head>
    $weaSchema = '';

?>
