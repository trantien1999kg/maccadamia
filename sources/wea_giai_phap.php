<?php  if(!defined('_source')) die("Error");

    include_once _source."wea_chung.php";

    /* ===== Trang Giải pháp WEA Task (/giai-phap-wea-task). Nhập ở admin, các mục "Giải pháp WEA Task: ..." =====
       Giá gói dùng chung "Trang chủ: Bảng giá"; giá Extension / token phải khớp app (api/plan_lib.php, addon_lib.php, wallet_lib.php) */

    $wtDau = weaKhoi('wt-dau');
    $wtSlide = weaDanhSach('wt-slide', 8);

    $wtNhip = weaKhoi('wt-nhip');
    $wtNhipThe = weaDanhSach('wt-nhip-the', 3);

    $wtKeHoach = weaKhoi('wt-ke-hoach');
    $wtKeHoachTab = weaDanhSach('wt-ke-hoach-tab', 6);

    $wtPhoiHop = weaKhoi('wt-phoi-hop');
    $wtPhoiHopThe = weaDanhSach('wt-phoi-hop-the', 4);

    $wtGoi = weaKhoi('wt-goi');
    $weaGoi = weaDanhSach('wea-goi', 4);

    $wtExt = weaKhoi('wt-ext');
    $wtExtDs = weaDanhSach('wt-ext', 20);

    $wtToken = weaKhoi('wt-token');
    $wtTokenDs = weaDanhSach('wt-token', 6);

    $wtCombo = weaKhoi('wt-combo');
    $wtComboMuc = weaDanhSach('wt-combo-muc', 6);

    $wtCuoi = weaKhoi('wt-cuoi');

    // Combo: dòng 2 mô tả là giá combo; tổng giá mua riêng cộng từ từng phần, tiết kiệm = mua riêng - combo
    $comboDong = weaDong(isset($wtCombo['mota']) ? $wtCombo['mota'] : '');
    $comboGia = isset($comboDong[1]) ? (int)preg_replace('/[^0-9]/', '', $comboDong[1]) : 0;
    $comboMuaRieng = 0;
    foreach((array)$wtComboMuc as $v) $comboMuaRieng += (int)preg_replace('/[^0-9]/', '', htmlspecialchars_decode((string)$v['ten2'], ENT_QUOTES));

    /* ===== SEO ===== */
    weaSeoTrang('giai-phap-wea-task',
        'WEA Task – Phần mềm quản lý dự án, công việc cho đội nhóm',
        'WEA Task là phần mềm quản lý dự án, quản lý công việc cho đội nhóm: Kanban, Gantt, workload, báo cáo, trợ lý AI. Có gói Free, dùng thử Pro 14 ngày.');
    $seo->setSeo('type', 'website');
    $seo->setSeo('url', $https_config.'giai-phap-wea-task');
    $row_cano = $https_config.'giai-phap-wea-task';
    if(!empty($wtSlide[0]['photo'])) weaSeoAnh($wtSlide[0]['photo']);

    // JSON-LD: đường dẫn + phần mềm WEA Task với giá các gói lấy từ bảng giá (đúng giá trong app)
    $giaGoi = array();
    foreach((array)$weaGoi as $v){
        $g = weaGia($v['ten2']);
        if($g['laSo']) $giaGoi[] = array('@type' => 'Offer', 'name' => trim(htmlspecialchars_decode($v['ten'], ENT_QUOTES)), 'price' => (string)$g['thang'], 'priceCurrency' => 'VND');
    }
    $phanMem = array(
        '@context' => 'https://schema.org',
        '@type' => 'SoftwareApplication',
        'name' => 'WEA Task',
        'applicationCategory' => 'BusinessApplication',
        'operatingSystem' => 'Web',
        'url' => $https_config.'giai-phap-wea-task',
        'publisher' => array('@type' => 'Organization', 'name' => 'WEA Soft'),
    );
    if(!empty($giaGoi)) $phanMem['offers'] = $giaGoi;

    $weaSchema = '<script type="application/ld+json">'.json_encode(array(
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => array(
            array('@type' => 'ListItem', 'position' => 1, 'name' => 'Trang chủ', 'item' => $https_config),
            array('@type' => 'ListItem', 'position' => 2, 'name' => 'WEA Task', 'item' => $https_config.'giai-phap-wea-task'),
        ),
    ), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG).'</script>';
    $weaSchema .= '<script type="application/ld+json">'.json_encode($phanMem, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG).'</script>';
?>
