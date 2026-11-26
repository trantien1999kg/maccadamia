<?php
    /* Trang danh sách bài Cam kết (/cam-ket): lưới thẻ giống trang Blog. Dữ liệu ở sources/wea_cam_ket.php */
    $weaNenThe = array('#EAF7FF', '#FFFBEB', '#ECFDF5', '#FFF1F3');
?>
<header style="background:linear-gradient(180deg,#EAF7FF,rgba(255,255,255,0))">
    <div class="wrap">
        <?php include _layouts."wea_nav.php"; ?>
        <div class="phero">
            <span class="tagp">Cam kết</span>
            <h1><?=!empty($weaDauTrang['ten']) ? weaTieuDe(str_replace('|', ' ', $weaDauTrang['ten'])) : 'Cam kết của WEA Soft'?></h1>
            <?php if(!empty($weaDauTrang['mota'])){ ?><p><?=weaChu($weaDauTrang['mota'])?></p><?php } ?>
        </div>
    </div>
</header>

<main>
<section style="padding:24px 0 96px">
    <div class="wrap">
        <?php if(!empty($weaCamKet)){ ?>
        <div class="bg3">
            <?php foreach($weaCamKet as $k => $v){ ?>
            <a class="post" href="cam-ket/<?=weaChu($v['slug'])?>">
                <div class="th" style="background:<?=$weaNenThe[$k % 4]?>">
                    <?php if($v['photo'] != ''){ ?>
                    <?=weaAnh($v['photo'], $v['ten'], '', $k > 2, 0, 0, _upload_baiviet_l)?>
                    <?php }else{ ?>
                    <span aria-hidden="true">WEA</span>
                    <?php } ?>
                </div>
                <div class="bd">
                    <h2><?=weaChu($v['ten'])?></h2>
                    <?php if($v['mota'] != ''){ ?><p><?=weaChu(strip_tags(htmlspecialchars_decode($v['mota'], ENT_QUOTES)))?></p><?php } ?>
                </div>
            </a>
            <?php } ?>
        </div>
        <?php }else{ ?>
        <p class="trong">Chưa có bài cam kết nào. <a href="./">Về trang chủ</a></p>
        <?php } ?>
    </div>
</section>
</main>

<?php include _layouts."wea_footer.php"; ?>
<div id="pgb"></div>
