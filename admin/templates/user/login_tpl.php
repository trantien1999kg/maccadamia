<?php
    // Logo lấy từ admin (Banner › Logo), giống logo ngoài website
    $logoDangNhap = $db->rawQueryOne("select photo_vi as photo from #_bannerqc where type=? and hienthi=1 limit 0,1", array('logo'));
    $logoDangNhap = (!empty($logoDangNhap['photo']) && is_file('../upload/hinhanh/'.$logoDangNhap['photo'])) ? '../upload/hinhanh/'.$logoDangNhap['photo'] : '';
?>
<style>
    /* Trang đăng nhập quản trị theo phong cách WEA (nền xanh nhạt, thẻ trắng bo tròn, nút xanh) */
    :root{--dn-xanh:#1F6FEB;--dn-navy:#0F1E3D;--dn-phu:#5B6B82;--dn-vien:#DCE4F0;--dn-nhat:#E8F1FF;--dn-chuyen:.2s ease}
    body.loginPage{margin:0;min-height:100vh;background:radial-gradient(900px 500px at 85% 0,#DCEBFF,transparent 70%),radial-gradient(700px 420px at 0 100%,#E6EEFF,transparent 70%),#F2F6FD;font-family:Inter,"Segoe UI",Roboto,Arial,sans-serif;color:var(--dn-navy)}
    .dn-trang{min-height:100vh;display:flex;align-items:center;justify-content:center;padding:32px 16px;box-sizing:border-box}
    .dn-the{display:grid;grid-template-columns:1.05fr 1fr;width:100%;max-width:1320px;background:#fff;border-radius:28px;box-shadow:0 30px 80px -30px rgba(31,80,170,.28),0 2px 8px rgba(15,30,61,.04);overflow:hidden}
    .dn-anh{background:linear-gradient(160deg,#E3EEFF,#EEE9FF)}
    .dn-anh img{display:block;width:100%;height:100%;object-fit:cover}
    .dn-form{display:flex;flex-direction:column;align-items:center;justify-content:center;padding:48px 56px}
    .dn-form *{box-sizing:border-box}
    .dn-logo{display:block;height:auto;width:300px;max-width:80%;margin:0 0 22px}
    .dn-nhan{display:inline-block;padding:6px 16px;border-radius:999px;background:var(--dn-nhat);color:var(--dn-xanh);font-size:13px;font-weight:700;letter-spacing:.06em;text-transform:uppercase}
    .dn-form h1{margin:14px 0 6px;font-size:32px;font-weight:800;letter-spacing:-.02em;color:var(--dn-navy);text-align:center}
    .dn-mota{margin:0 0 28px;color:var(--dn-phu);font-size:15px;text-align:center}
    .dn-o{width:100%;max-width:440px;margin:0 0 18px}
    .dn-o label{display:block;margin:0 0 8px;font-size:14px;font-weight:700;color:var(--dn-navy)}
    .dn-nhap{position:relative;display:flex;align-items:center}
    .dn-nhap .dn-ic{position:absolute;left:14px;width:20px;height:20px;color:#7A889C;pointer-events:none}
    .dn-nhap input{width:100%;height:50px;padding:0 48px 0 46px;border:1px solid var(--dn-vien);border-radius:12px;background:#fff;font:inherit;font-size:15px;color:var(--dn-navy);outline:0;transition:border-color var(--dn-chuyen),box-shadow var(--dn-chuyen)}
    .dn-nhap input::placeholder{color:#8C99AC}
    .dn-nhap input:focus{border-color:var(--dn-xanh);box-shadow:0 0 0 3px rgba(31,111,235,.14)}
    .dn-mat{position:absolute;right:6px;display:grid;place-items:center;width:38px;height:38px;border:0;border-radius:10px;background:none;color:#5B6B82;cursor:pointer;transition:background var(--dn-chuyen)}
    .dn-mat:hover{background:#F1F5FB}
    .dn-mat svg{width:20px;height:20px}
    .dn-mat .dn-an,.dn-mat.active .dn-hien{display:none}.dn-mat.active .dn-an{display:block}
    .dn-nut{width:100%;max-width:440px;height:52px;margin:8px 0 22px;border:0;border-radius:12px;background:linear-gradient(180deg,#2F86F6,#1F6FEB);color:#fff;font:inherit;font-size:17px;font-weight:700;cursor:pointer;box-shadow:0 10px 24px -10px rgba(31,111,235,.6);transition:background var(--dn-chuyen)}
    .dn-nut:hover{background:linear-gradient(180deg,#1F6FEB,#185CC8)}
    .dn-ve{display:inline-flex;align-items:center;gap:10px;color:var(--dn-xanh);font-size:15px;font-weight:600;text-decoration:none}
    .dn-ve:hover{text-decoration:underline}
    .dn-ve svg{width:20px;height:20px}
    .dn-form :focus-visible{outline:2px solid var(--dn-xanh);outline-offset:2px}
    .dn-nhap input:focus-visible{outline:0}
    .jq-toast-single{width:auto!important}
    /* Thu nhỏ đều cả thẻ còn 80% trên máy tính (chữ, ô nhập, ảnh, bo góc giữ đúng tỷ lệ) */
    @media (min-width:901px){.dn-the{zoom:.8}.dn-nhap{zoom:1.25}} /* riêng khung nhập giữ cỡ gốc (.8 × 1.25 = 1) */
    @media (max-width:900px){.dn-the{grid-template-columns:1fr;max-width:520px}.dn-anh{display:none}.dn-form{padding:40px 24px}}
    @media (prefers-reduced-motion:reduce){.dn-nhap input,.dn-mat,.dn-nut{transition:none}}
</style>
<main class="dn-trang">
    <div class="dn-the">
        <div class="dn-anh"><img src="../assets/images/wea/bannerAdminLogin.webp" width="715" height="764" alt="Quản trị website WEA Soft: quản lý nội dung và vận hành website tại một nơi"></div>
        <div class="dn-form">
            <?php if($logoDangNhap != ''){ ?><img class="dn-logo" src="<?=htmlspecialchars($logoDangNhap)?>" width="1815" height="640" alt="WEA Soft"><?php } ?>
            <span class="dn-nhan">Quản trị website</span>
            <h1>Đăng nhập quản trị</h1>
            <p class="dn-mota">Nhập thông tin tài khoản để tiếp tục.</p>
            <div class="dn-o">
                <label for="username">Tên đăng nhập</label>
                <div class="dn-nhap">
                    <svg class="dn-ic" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-6.5 8-6.5s8 2.5 8 6.5z"/></svg>
                    <input type="text" name="username" id="username" placeholder="Nhập tên đăng nhập" autocomplete="username" autofocus>
                </div>
            </div>
            <div class="dn-o">
                <label for="password">Mật khẩu</label>
                <div class="dn-nhap">
                    <svg class="dn-ic" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7 10V7a5 5 0 0 1 10 0v3h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2zm2 0h6V7a3 3 0 0 0-6 0z"/></svg>
                    <input type="password" name="password" id="password" placeholder="Nhập mật khẩu" autocomplete="current-password">
                    <!-- Lớp show-password: custom.js bắt sự kiện để hiện / ẩn mật khẩu -->
                    <button type="button" class="dn-mat show-password" aria-label="Hiện / ẩn mật khẩu">
                        <svg class="dn-hien" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/></svg>
                        <svg class="dn-an" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 3l18 18M10.6 5.1A10.6 10.6 0 0 1 12 5c6.4 0 10 7 10 7a17 17 0 0 1-3.2 4.1M6.6 6.6A17 17 0 0 0 2 12s3.6 7 10 7a9.8 9.8 0 0 0 5.4-1.6M9.9 9.9a3 3 0 0 0 4.2 4.2"/></svg>
                    </button>
                </div>
            </div>
            <button type="button" class="dn-nut btn-login" onclick="login('username','password')" data-login="">Đăng nhập</button>
            <a class="dn-ve" href="<?=htmlspecialchars($https_config)?>"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>Về trang chủ</a>
        </div>
    </div>
</main>
<script>
    // Nhấn Enter ở ô tên đăng nhập thì chuyển sang ô mật khẩu (Enter ở ô mật khẩu đã gửi sẵn trong custom.js)
    document.getElementById('username').addEventListener('keydown', function (e) {
        if (e.key === 'Enter') { e.preventDefault(); document.getElementById('password').focus(); }
    });
</script>
