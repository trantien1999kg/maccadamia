<?php
    /* Trang Blog (/tin-tuc) theo ảnh mẫu 23/11/2026. Dữ liệu ở sources/wea_blog.php
       - Banner: Hình của mục admin "Blog: Đầu trang" (chưa nhập thì dùng upload/hinhanh/wea-blog-banner.webp); chữ đầu trang nhập ở admin mục "Blog: đầu trang" (wea-blog), dấu | = xuống dòng
       - Thẻ ngang: bài tích "Nổi bật" mới nhất; lưới "Bài hướng dẫn": các bài còn lại */
    $tenDau = !empty($weaDauTrang['ten']) ? $weaDauTrang['ten'] : 'Hướng dẫn và những điều|bọn mình học được.';
?>
<div class="trang-chu trang-blog">
<header>
    <div class="wrap"><?php include _layouts."wea_nav.php"; ?></div>
</header>

<main>
<section class="bl-hero"<?php $nenBl = weaAnhAdmin(isset($weaDauTrang['photo']) ? $weaDauTrang['photo'] : '', 'wea-blog-banner.webp', true); ?><?=$nenBl != '' ? ' style="--bl-nen:url('.weaChu($nenBl).')"' : ''?>>
    <div class="wrap">
        <span class="nhan">Blog</span>
        <h1><?=weaTieuDeDong($tenDau)?></h1>
        <?php if(!empty($weaDauTrang['mota'])){ ?><p><?=nl2br(weaChu($weaDauTrang['mota']))?></p><?php }else{ ?><p>Từng bài viết là một việc nhỏ bọn mình muốn làm giúp bạn:<br> dùng WEA Task thuận tay hơn, và quản lý đội nhóm nhẹ nhàng hơn.</p><?php } ?>
    </div>
</section>

<div class="wrap bl-than">
    <?php if(!empty($weaNoiBat)){ ?>
    <a class="bl-noibat" href="tin-tuc/<?=weaChu($weaNoiBat['slug'])?>">
        <div class="bl-noibat-anh"><?php if($weaNoiBat['photo'] != ''){ ?><?=weaAnh($weaNoiBat['photo'], $weaNoiBat['ten'], 'fetchpriority="high"', false, 0, 0, _upload_baiviet_l)?><?php } ?></div>
        <div class="bl-noibat-chu">
            <span class="bl-nhan-nb"><?=weaIcon('star', 'ic ic-sm')?>Bài nổi bật</span>
            <h2><?=weaChu($weaNoiBat['ten'])?></h2>
            <?php if($weaNoiBat['mota'] != ''){ ?><p><?=blogMoTa($weaNoiBat['mota'])?></p><?php } ?>
        </div>
        <span class="bl-mui" aria-hidden="true"><?=weaIcon('arrow', 'ic ic-sm')?></span>
    </a>
    <?php } ?>

    <?php if(!empty($weaBaiViet)){ ?>
    <h2 class="bl-tieude">Bài hướng dẫn</h2>
    <div class="bl-luoi">
        <?php foreach($weaBaiViet as $k => $v){ ?>
        <a class="bl-the" href="tin-tuc/<?=weaChu($v['slug'])?>">
            <div class="bl-the-anh"><?php if($v['photo'] != ''){ ?><?=weaAnh($v['photo'], $v['ten'], '', true, 0, 0, _upload_baiviet_l)?><?php }else{ ?><span aria-hidden="true">WEA</span><?php } ?></div>
            <div class="bl-the-chu">
                <h3><?=weaChu($v['ten'])?></h3>
                <?php if($v['mota'] != ''){ ?><p><?=blogMoTa($v['mota'])?></p><?php } ?>
            </div>
        </a>
        <?php } ?>
    </div>

    <?php if($weaTongTrang > 1){ ?>
    <nav class="pgn" aria-label="Phân trang">
        <?php for($i = 1; $i <= $weaTongTrang; $i++){ ?>
            <?php if($i == $weaTrang){ ?>
            <span class="on" aria-current="page"><?=$i?></span>
            <?php }else{ ?>
            <a href="tin-tuc<?=$i > 1 ? '?page='.$i : ''?>" aria-label="Trang <?=$i?>"><?=$i?></a>
            <?php } ?>
        <?php } ?>
    </nav>
    <?php } ?>
    <?php } ?>

    <?php if(empty($weaNoiBat) && empty($weaBaiViet)){ ?>
    <p class="trong">Chưa có bài viết nào. <a href="./">Về trang chủ</a></p>
    <?php } ?>
</div>
</main>

<?php include _layouts."wea_footer.php"; ?>
</div>
