<?php  if(!defined('_source')) die("Error");

    /* ===== sitemap.xml của website WEA Soft: chỉ liệt kê các trang thuộc phạm vi (CLAUDE.md mục 2, 5)
       Trang cố định + bài viết đang hiển thị của Tính năng, Blog (tin-tuc), Cam kết. Không liệt kê trang cũ của source ===== */

    $trangCoDinh = array(
        array('', '1.0', 'weekly'),
        array('giai-phap-wea-task', '0.9', 'weekly'),
        array('thiet-ke-website', '0.9', 'monthly'),
        array('tinh-nang', '0.8', 'monthly'),
        array('tin-tuc', '0.8', 'weekly'),
        array('cam-ket', '0.6', 'monthly'),
        array('gioi-thieu', '0.6', 'monthly'),
        array('lien-he', '0.5', 'yearly'),
    );
    $loaiBai = array('tinh-nang' => '0.7', 'tin-tuc' => '0.7', 'cam-ket' => '0.5');

    header('Content-Type: application/xml; charset=utf-8');
    echo '<?xml version="1.0" encoding="UTF-8"?>'."\n";
    echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";

    foreach($trangCoDinh as $t){
        echo '  <url><loc>'.htmlspecialchars($https_config.$t[0], ENT_XML1).'</loc><changefreq>'.$t[2].'</changefreq><priority>'.$t[1].'</priority></url>'."\n";
    }

    foreach($loaiBai as $loai => $uuTien){
        $dsBai = $db->rawQuery("select tenkhongdau_vi as slug, ngaytao, ngaysua from #_baiviet where type=? and hienthi=1 and tenkhongdau_vi<>'' order by ngaytao desc", array($loai));
        foreach((array)$dsBai as $b){
            $moc = max((int)$b['ngaytao'], (int)$b['ngaysua']);
            echo '  <url><loc>'.htmlspecialchars($https_config.$loai.'/'.$b['slug'], ENT_XML1).'</loc>'.($moc > 0 ? '<lastmod>'.date('Y-m-d', $moc).'</lastmod>' : '').'<priority>'.$uuTien.'</priority></url>'."\n";
        }
    }

    echo '</urlset>';
?>
