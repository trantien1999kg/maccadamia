<?php
    /* Trang Giới thiệu (/gioi-thieu), theo ảnh mẫu 19/11/2026. Dữ liệu ở sources/wea_gioi_thieu.php
       - Đầu trang: Tên + Mô tả của mục Giới thiệu, ảnh = Hình của mục Giới thiệu
       - Thân bài: Nội dung của mục Giới thiệu, tách theo từng tiêu đề H2 (mỗi H2 = 1 mục trong khung "Trong bài viết").
         Mục đầu trải hết bề ngang, các mục sau xếp 2 cột
       - "Bốn điều làm nên WEA": Nội dung riêng của từng mục (chưa nhập thì dùng Mô tả) */

    // Ảnh đầu trang: ảnh của mục Giới thiệu, không có (hoặc mất file) thì dùng ảnh khối Về WEA ở trang chủ
    $anhGt = !empty($weaGioiThieu['photo']) ? weaAnh($weaGioiThieu['photo'], 'Góc làm việc của người sáng lập WEA Soft', 'fetchpriority="high"', false) : '';
    if($anhGt == '' && !empty($weaVeWea['photo'])) $anhGt = weaAnh($weaVeWea['photo'], 'Góc làm việc của người sáng lập WEA Soft', 'fetchpriority="high"', false);

    // Tách Nội dung theo H2; mục không có H2 ở đầu thì đặt tên "Lời người sáng lập"
    $baiGt = !empty($weaGioiThieu['noidung']) ? trim(weaHtml($weaGioiThieu['noidung'])) : '';
    // Khung trích dẫn đã tự vẽ dấu “ nên bỏ dấu ngoặc kép người nhập gõ ở đầu / cuối đoạn trích
    $baiGt = preg_replace_callback('/<blockquote[^>]*>.*?<\/blockquote>/is', function($m){
        return preg_replace(array('/(<blockquote[^>]*>(?:\s*<p[^>]*>)?\s*)["“]/iu', '/["”](\s*(?:<\/p>\s*)?<\/blockquote>)$/iu'), '$1', $m[0]);
    }, $baiGt);
    $phanGt = array();
    foreach(preg_split('/(?=<h2[\s>])/i', $baiGt, -1, PREG_SPLIT_NO_EMPTY) as $p){
        if(trim(strip_tags($p, '<img>')) == '') continue;
        $tenPhan = preg_match('/^\s*<h2[^>]*>(.*?)<\/h2>/is', $p, $m) ? trim(strip_tags($m[1])) : '';
        if($tenPhan == ''){
            $tenPhan = 'Lời người sáng lập';
            $p = '<h2>'.$tenPhan.'</h2>'.$p;
        }
        $phanGt[] = array('ten' => $tenPhan, 'html' => $p);
    }

    $bonDieu = 'Bốn điều làm nên WEA';
?>
<div class="trang-chu trang-gt">
<header>
    <div class="wrap"><?php include _layouts."wea_nav.php"; ?></div>
    <div class="gt3-hero<?=$anhGt == '' ? ' khong-anh' : ''?>">
        <div class="gt3-hero-chu">
            <nav class="gt3-dd" aria-label="Đường dẫn"><a href="./">Trang chủ</a><span aria-hidden="true">/</span><span aria-current="page">Giới thiệu</span></nav>
            <span class="nhan">Về WEA Soft</span>
            <h1><?=weaTieuDe($tenTrang)?></h1>
            <?php if(!empty($weaGioiThieu['mota'])){ ?><div class="gt3-dan"><?=weaHtml($weaGioiThieu['mota'])?></div><?php } ?>
        </div>
        <?php if($anhGt != ''){ ?><div class="gt3-hero-anh"><?=$anhGt?></div><?php } ?>
    </div>
</header>

<main>
<?php if(!empty($phanGt)){ ?>
<section class="gt3-than">
    <div class="wrap gt3-luoi">
        <aside class="gt3-ml" aria-label="Trong bài viết">
            <p class="gt3-ml-ten">Trong bài viết</p>
            <ul data-mucluc>
                <?php /* Mục 1 = cả phần giới thiệu phía trên, tiếp theo là 4 điều làm nên WEA (tên ngắn) */ ?>
                <li><a href="gioi-thieu#muc-gt-1" class="on">Giới thiệu</a></li>
                <?php foreach($weaGiaTri as $k => $v){ ?>
                <li><a href="gioi-thieu#muc-<?=$k + 1?>"><?=weaChu($v['ten'] != '' ? $v['ten'] : $v['ten2'])?></a></li>
                <?php } ?>
            </ul>
        </aside>
        <article class="gt3-bai">
            <div class="gt3-phan" id="muc-gt-1"><?=$phanGt[0]['html']?></div>
            <?php if(count($phanGt) > 1){ ?>
            <div class="gt3-cot">
                <?php for($i = 1; $i < count($phanGt); $i++){ ?>
                <div class="gt3-phan" id="muc-gt-<?=$i + 1?>"><?=$phanGt[$i]['html']?></div>
                <?php } ?>
            </div>
            <?php } ?>
        </article>
    </div>
</section>
<?php } ?>

<?php if(!empty($weaGiaTri)){ ?>
<section class="khoi gt3-bon" id="muc-bon-dieu">
    <div class="wrap">
        <h2 class="gt3-tieude"><?=$bonDieu?></h2>
        <div class="gt3-ds">
            <?php foreach($weaGiaTri as $k => $v){
                $noiDung = trim(strip_tags(weaHtml($v['noidung']))) != '' ? $v['noidung'] : $v['mota'];
            ?>
            <article class="gt3-muc" id="muc-<?=$k + 1?>">
                <div class="gt3-muc-so">
                    <span class="gt3-so"><?=str_pad($k + 1, 2, '0', STR_PAD_LEFT)?></span>
                    <span class="gt3-muc-ten"><?=weaChu($v['ten'])?></span>
                </div>
                <div class="gt3-muc-chu">
                    <h3><?=weaChu($v['ten2'] != '' ? $v['ten2'] : $v['ten'])?></h3>
                    <div class="gt3-muc-nd"><?=weaHtml($noiDung)?></div>
                </div>
            </article>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>

<section class="khoi khoi-cuoi">
    <div class="wrap">
        <div class="gt3-cta">
            <h2>Làm việc hiệu quả hơn hôm nay,<br> sẵn sàng cho bước phát triển tiếp theo</h2>
            <div class="nhom-nut">
                <a class="btn btn-chinh btn-lon" href="<?=$weaLinkDangKy?>">Bắt đầu miễn phí<?=weaIcon('arrow', 'ic ic-sm')?></a>
                <a class="btn btn-vien btn-lon" href="lien-he"><?=weaIcon('chat-oval', 'ic ic-sm')?>Trò chuyện với chúng tôi</a>
            </div>
        </div>
    </div>
</section>
</main>

<?php include _layouts."wea_footer.php"; ?>
</div>
