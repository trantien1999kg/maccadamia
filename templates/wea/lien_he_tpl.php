<?php
    /* Trang Liên hệ (/lien-he) theo ảnh mẫu 23/11/2026. Dữ liệu + xử lý form ở sources/wea_lien_he.php
       - 3 ảnh nhập ở admin (Hình của mục "Liên hệ: ảnh nền đầu trang / ảnh bên trái / ảnh tờ thư"); chưa nhập thì dùng file mặc định wea-lien-he-nen/trai/phai.webp
       - Nền khối phủ lớp xanh nhạt cho chữ dễ đọc; thẻ trái có 3 kênh liên hệ đặt đè góc dưới; tờ thư bên phải chứa form, đầu thư là logo WEA = "Gửi WEA"
       - Email / điện thoại / Zalo lấy từ Cấu hình chung ở admin (Zalo: ô Số Zalo, bỏ trống thì dùng Hotline) */
    $soZalo = preg_replace("/[^0-9]/", "", (string)($row_setting["sozalo"] != "" ? $row_setting["sozalo"] : $row_setting["hotline"]));
    $lhAnhNen = weaAnhAdmin(isset($weaLhNen['photo']) ? $weaLhNen['photo'] : '', 'wea-lien-he-nen.webp', true);
    $lhAnhTrai = weaAnhAdmin(isset($weaLhTrai['photo']) ? $weaLhTrai['photo'] : '', 'wea-lien-he-trai.webp');
    $lhAnhPhai = weaAnhAdmin(isset($weaLhPhai['photo']) ? $weaLhPhai['photo'] : '', 'wea-lien-he-phai.webp', true);
    $lhLoiCua = function($o) use ($lhLoi){ return isset($lhLoi[$o]) ? $lhLoi[$o] : ''; };
    // Chữ có chân trên ảnh trái: chỉ tải đúng các ký tự cần (tham số text của Google Fonts) nên rất nhẹ
    $chuCoChan = 'Gửi emailGọi điệnNhắn tin qua Zalo';
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap&text=<?=rawurlencode($chuCoChan)?>">
<div class="trang-chu trang-lh">
<header>
    <div class="wrap"><?php include _layouts."wea_nav.php"; ?></div>
</header>

<main class="lh-than" style="<?=$lhAnhNen != '' ? '--lh-anh-nen:url('.weaChu($lhAnhNen).');' : ''?><?=$lhAnhPhai != '' ? '--lh-anh-thu:url('.weaChu($lhAnhPhai).')' : ''?>">
    <div class="wrap">
        <div class="lh-dau">
            <h1>Liên hệ</h1>
            <p>Bạn muốn tìm hiểu WEA Task, trao đổi về thiết kế website hay cần hỗ trợ khi sử dụng?<br> Hãy chọn kênh liên hệ thuận tiện hoặc để lại lời nhắn qua biểu mẫu bên dưới.</p>
        </div>

        <div class="lh-luoi">
            <div class="lh-trai">
                <img class="lh-trai-anh" src="<?=weaChu($lhAnhTrai)?>" alt="Giải phóng thời gian, khơi mở tiềm năng. Để WEA đồng hành cùng bạn, biến những ý tưởng lớn thành hiện thực." width="900" height="786" fetchpriority="high">
                <ul class="lh-kenh" aria-label="Kênh liên hệ">
                    <?php if($row_setting['email'] != ''){ ?>
                    <li><a href="mailto:<?=weaChu($row_setting['email'])?>" aria-label="Gửi email tới <?=weaChu($row_setting['email'])?>"><?=weaIcon('mail')?><span>Gửi email</span></a></li>
                    <?php } ?>
                    <?php if($weaHotline != ''){ ?>
                    <li><a href="tel:<?=$weaHotline?>" aria-label="Gọi điện tới <?=weaChu($row_setting['hotline'])?>"><?=weaIcon('phone')?><span>Gọi điện</span></a></li>
                    <?php } ?>
                    <?php if($soZalo != ''){ ?>
                    <li><a href="https://zalo.me/<?=$soZalo?>" target="_blank" rel="noopener"><?=weaIcon('chat-oval')?><span>Nhắn tin qua Zalo</span></a></li>
                    <?php } ?>
                </ul>
            </div>

            <div class="lh-phai">
                <form class="lh-thu" method="post" action="lien-he" novalidate data-lienhe>
                    <input type="hidden" name="lh_token" value="<?=weaChu($_SESSION['lienhe_token'])?>">
                    <?php // Ô bẫy spam: người thật không thấy, bot điền vào thì bị bỏ qua ?>
                    <div class="lh-bay" aria-hidden="true"><label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>

                    <?php // Đầu thư: logo WEA thay chữ "Nội dung liên hệ" (thư gửi WEA); tiêu đề H2 vẫn giữ cho trình đọc màn hình ?>
                    <h2 class="lh-thu-dau">
                        <?php if(!empty($weaLogo['photo'])){ ?><?=weaAnh($weaLogo['photo'], 'Gửi WEA Soft', '', true, 1815, 640)?><?php }else{ ?>Gửi WEA Soft<?php } ?>
                        <span class="lh-an">Nội dung liên hệ</span>
                    </h2>

                    <fieldset class="lh-chude">
                        <legend>Chủ đề</legend>
                        <div class="lh-chude-ds">
                            <?php foreach($weaChuDe as $ma => $ten){ ?>
                            <label><input type="radio" name="chude" value="<?=$ma?>"<?=$lhGiaTri['chude'] === $ma ? ' checked' : ''?>><span><?=$ten?></span></label>
                            <?php } ?>
                        </div>
                        <p class="lh-loi" id="loi-chude"<?=$lhLoiCua('chude') == '' ? ' hidden' : ''?>><?=weaChu($lhLoiCua('chude'))?></p>
                    </fieldset>

                    <div class="lh-o lh-o-dong">
                        <label for="lh-hoten">Họ và tên</label>
                        <input id="lh-hoten" name="hoten" type="text" autocomplete="name" maxlength="100" required value="<?=weaChu($lhGiaTri['hoten'])?>" aria-describedby="loi-hoten"<?=$lhLoiCua('hoten') != '' ? ' aria-invalid="true"' : ''?>>
                        <p class="lh-loi" id="loi-hoten"<?=$lhLoiCua('hoten') == '' ? ' hidden' : ''?>><?=weaChu($lhLoiCua('hoten'))?></p>
                    </div>
                    <div class="lh-o lh-o-dong">
                        <label for="lh-email">Email nhận phản hồi</label>
                        <input id="lh-email" name="email" type="email" autocomplete="email" maxlength="150" required value="<?=weaChu($lhGiaTri['email'])?>" aria-describedby="loi-email"<?=$lhLoiCua('email') != '' ? ' aria-invalid="true"' : ''?>>
                        <p class="lh-loi" id="loi-email"<?=$lhLoiCua('email') == '' ? ' hidden' : ''?>><?=weaChu($lhLoiCua('email'))?></p>
                    </div>
                    <div class="lh-o lh-o-nhan">
                        <label for="lh-noidung">Lời nhắn</label>
                        <textarea id="lh-noidung" name="noidung" rows="4" maxlength="3000" required aria-describedby="loi-noidung"<?=$lhLoiCua('noidung') != '' ? ' aria-invalid="true"' : ''?>><?=weaChu($lhGiaTri['noidung'])?></textarea>
                        <p class="lh-loi" id="loi-noidung"<?=$lhLoiCua('noidung') == '' ? ' hidden' : ''?>><?=weaChu($lhLoiCua('noidung'))?></p>
                    </div>

                    <button type="submit" class="btn btn-chinh lh-gui"><?=weaIcon('send', 'ic ic-sm')?><span>Gửi yêu cầu</span></button>
                    <p class="lh-thongbao<?=$lhThanhCong ? ' ok' : ''?>" role="status" aria-live="polite"<?=$lhThongBao == '' ? ' hidden' : ''?>><?=weaChu($lhThongBao)?></p>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include _layouts."wea_footer.php"; ?>
</div>
