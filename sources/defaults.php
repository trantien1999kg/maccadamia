<?php
	/* Dữ liệu chung cho mọi trang. Chỉ giữ phần web WEA còn dùng; truy vấn của web cũ (menu, footer, slider, sản phẩm, album, video...) đã bỏ.
	   Dữ liệu riêng của trang chủ / Tính năng / Blog nằm ở sources/wea_chung.php và source của từng trang. */

	$row_setting= $db->rawQueryOne("select * from #_setting limit 0,1");

	// Ảnh nền khối tiêu đề (breadcrumb) của các trang Giới thiệu, Liên hệ, chi tiết bài, Chính sách, 404
	$bg_breadcrumb= $db->rawQueryOne("select photo_$lang as photo from #_bannerqc where hienthi=1 and type=?",array('bg_breadcrumb'));

	// Hình đại diện khi chia sẻ link
	$seoPage =$db->rawQueryOne("select photo_$lang,options from #_bannerqc where hienthi=1 and type=? limit 0,1",array('hinhdaidien'));
?>
