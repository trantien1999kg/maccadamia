<?php
    /* Trang 404 giao diện WEA: mã HTTP 404 do controller / source đặt; tiêu đề + noindex đặt ở templates/desktop.php */
?>
<div class="trang-chu trang-404">
<header>
    <div class="wrap"><?php include _layouts."wea_nav.php"; ?></div>
</header>
<main class="wrap loi404">
    <p class="loi404-so" aria-hidden="true">404</p>
    <h1>Không tìm thấy trang bạn cần</h1>
    <p>Đường dẫn có thể đã đổi hoặc trang không còn nữa. Bạn quay về trang chủ hoặc xem các mục bên dưới nhé.</p>
    <div class="nhom-nut">
        <a class="btn btn-chinh btn-lon" href="./">Về trang chủ<?=weaIcon('arrow', 'ic ic-sm')?></a>
        <a class="btn btn-vien btn-lon" href="lien-he">Liên hệ WEA</a>
    </div>
    <ul class="loi404-link">
        <li><a href="giai-phap-wea-task">WEA Task</a></li>
        <li><a href="thiet-ke-website">Thiết kế website</a></li>
        <li><a href="tinh-nang">Tính năng</a></li>
        <li><a href="tin-tuc">Blog</a></li>
    </ul>
</main>
<?php include _layouts."wea_footer.php"; ?>
</div>
