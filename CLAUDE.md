# CLAUDE.md — Website WEA Soft

Đây là "hợp đồng làm việc" giữa Claude Code và chủ dự án. Đọc hết trước khi sửa code. Có data mới không cần xuất file, chỉ dán mã SQL để chủ dự án tự nhập.

## 1. Sứ mệnh

Website giới thiệu và quảng bá phần mềm của **WEA Soft**. Sản phẩm chính: **WEA Task (Task Management 2.0)** — quản lý công việc theo dự án kiểu ClickUp, chạy thật tại **https://app.weasoft.vn**.
Mục tiêu: khách tìm thấy trên Google (SEO), hiểu sản phẩm trong vài giây, tin tưởng và **bấm Dùng thử / Đăng nhập (sang app) hoặc Liên hệ**.

Trước mỗi thay đổi, tự hỏi:

1. Khách đọc trang này để quyết định điều gì? Trang đã trả lời đủ chưa?
2. Người không rành công nghệ có hiểu ngay, có biết bấm vào đâu tiếp không?
3. Thông tin (tính năng, giá, gói) có ĐÚNG với phần mềm đang chạy không?

Ưu tiên: **nội dung đúng + SEO tốt > an toàn > tốc độ tải trang > giao diện đúng thiết kế > code đẹp**.

## 2. Phạm vi (chỉ làm các phần này)

| Trang                | Nội dung                                                                                                                     |
| -------------------- | ---------------------------------------------------------------------------------------------------------------------------- |
| Trang chủ            | Giới thiệu WEA Soft + WEA Task, lợi ích chính, ảnh chụp sản phẩm, bảng gói (nếu thiết kế có), lời kêu gọi Dùng thử / Liên hệ |
| Tin tức / Bài viết   | Danh sách bài (phân trang, danh mục nếu source có sẵn) + trang chi tiết bài                                                  |
| Giới thiệu (About)   | Về WEA Soft, tầm nhìn, liên hệ                                                                                               |
| Liên hệ (form) + 404 | Dùng phần có sẵn của source, chỉ sửa giao diện / nội dung                                                                    |

Tính năng đã lên kế hoạch, chưa làm: **Trợ lý AI chăm sóc khách hàng** (khung chat + lưu hội thoại + thống kê + báo cáo) — xem `docs/ke-hoach/ai-chat-cskh.md`.

Source kế thừa từ website cũ, đã có sẵn nhiều thứ. **Không xây thêm** chức năng ngoài phạm vi khi chưa được yêu cầu. Phần không dùng thì để yên, không xóa, không refactor; chỉ ẩn khỏi menu / sitemap nếu cần.

## 3. Nguồn gốc source và dữ liệu (QUAN TRỌNG)

- Source và DB mang về từ công ty cũ của chủ dự án. **Không đưa lên web WEA Soft bất kỳ dữ liệu, bài viết, logo, tên khách hàng, thông tin liên hệ, tài khoản admin hay cấu hình nào của công ty cũ.**
- Gặp dấu vết công ty cũ (tên, domain, email, số điện thoại, khóa API, mật khẩu SMTP, mã Google Analytics, pixel quảng cáo, tài khoản admin...) thì **dừng và liệt kê cho chủ dự án**, không tự dùng tiếp, không tự xóa.
- Hướng an toàn: giữ khung code, DB mới sạch, nội dung WEA Soft tự nhập. Tài khoản admin cũ phải được đổi / xóa trước khi lên mạng.

## 3b. Đồng bộ với phần mềm WEA Task (nguồn sự thật)

- Website **không được tự bịa** tính năng, giá, hạn mức, thời gian dùng thử. Nguồn sự thật là project phần mềm (`c:\xampp\htdocs\task-management`): `README.md` (tính năng người dùng thấy) và `api/plan_lib.php` (`PLAN_CATALOG`: gói, giá, hạn mức).
- Giá đã chốt (11/2026, đồng / người / tháng): Free 0 · Standard 59.000 (trả năm 53.000) · Pro 99.000 (trả năm 88.000) · Business 199.000 (trả năm 168.000). Khách (Guest) miễn phí. Có Tiện ích mở rộng (Extension) mua lẻ. Dùng thử Pro 14 ngày cho cả workspace.
- Khi giá / gói đổi ở phần mềm thì website phải đổi theo trong cùng đợt; nghi ngờ thì hỏi chủ dự án, không đoán.
- Nút hành động: **Dùng thử miễn phí / Đăng ký** → `https://app.weasoft.vn/login.html` (hoặc trang đăng ký của app), **Đăng nhập** → `https://app.weasoft.vn`. Không làm form đăng ký riêng trên website.
- Tên gọi thống nhất: "WEA Task", "WEA Soft", các gói "Free / Standard / Pro / Business" — giống hệt trong app.

### Hai dự án được nối với nhau (làm việc trên cả hai)

- `.claude/settings.json` của mỗi dự án khai báo thư mục dự án kia ở `permissions.additionalDirectories`, nên Claude mở ở website vẫn đọc / sửa được phần mềm và ngược lại (đã nối 26/11/2026).
- Website: `c:\xampp\htdocs\maccadamia` (git `maccadamia/production`) → https://weasoft.vn. Phần mềm: `c:\xampp\htdocs\task-management` → https://app.weasoft.vn. **Mỗi dự án có git riêng, commit riêng**; sửa file bên nào thì commit / đóng gói bên đó.
- Sửa bên phần mềm thì theo `task-management/CLAUDE.md` (quy tắc của nó chặt hơn: phân quyền, `dich()`, README, docs/ky-thuat.md…), không áp quy tắc website sang.
- Việc chạm cả hai (vd đổi giá gói, thêm tính năng cần giới thiệu, đổi đường dẫn đăng nhập / đăng ký): sửa nguồn ở phần mềm trước, rồi cập nhật website trong cùng đợt; báo cáo tách rõ file của từng dự án.
- Thư mục bị chặn đọc (bí mật / dump DB / thư viện): xem `deny` trong `.claude/settings.json` của từng dự án; không tìm cách đọc vòng.
- Chatbot AI (27/11/2026): `assets/js/wea-chat.js` + `assets/css/wea-chat.css` nạp ở cuối `wea_footer.php` (chỉ khi config có `wea_chat.key`), gọi `ajax/wea_chat.php` (cầu nối máy chủ → app.weasoft.vn/api/site_chat.php, khóa chung + IP khách). Nội dung trả lời, giới hạn, lưu hội thoại, liên hệ khách để lại đều ở phía phần mềm (`api/site_chat_lib.php`, xem ở /admin › Khách hỏi). Đổi giá / dịch vụ: sửa bên phần mềm là bot nói theo.
- Đếm lượt xem (26/11/2026): cuối `templates/layouts/wea_footer.php` có đoạn `navigator.sendBeacon` gửi đường dẫn + trang giới thiệu + utm_source về `app.weasoft.vn/api/track.php` (xem ở app.weasoft.vn/admin › Thống kê). Không cookie, không thư viện ngoài, chỉ chạy trên tên miền thật. Trang WEA mới phải include `wea_footer.php` thì mới được đếm; không thêm Google Analytics / pixel khác khi chưa hỏi.

## 4. Công nghệ và cấu trúc

- Ngôn ngữ / framework: **PHP thuần, CMS tự viết** (kiểu "iweb"), PHP 7.4 (`composer.json`). Không framework, không bước build. Router `libraries/AltoRouter.php`, DB qua `libraries/PDODb.php` (`$db->rawQuery / rawQueryOne` có tham số `?`). Đa ngôn ngữ: cột `_vi / _en / _cn`, file chữ `sources/langWeb/lang_vi.php`. **Hiện chỉ làm tiếng Việt**; `_en / _cn` để yên.
- Database: MySQL/MariaDB, DB dev **`db_macca`** (dump `db_macca.sql` ở gốc; còn `database/iwebvn_stdqm.sql`). Tiền tố bảng `table_` (trong code viết `#_`).
  - Bài viết: `table_baiviet` (cột `type`: `tin-tuc`, `dich-vu`...; slug `tenkhongdau_vi`; `ten_vi`, `mota_vi`, `noidung_vi`, `photo`, `hienthi`). Danh mục: `table_baiviet_list` → `_cat` → `_item` → `_sub`; ảnh phụ `table_baiviet_photo`.
  - Trang tĩnh (Giới thiệu): `table_info` (theo `type`, vd `gioi-thieu`).
  - Cấu hình chung (tên, hotline, email, favicon, analytics...): `table_setting`. Banner/logo: `table_bannerqc`, `table_photo`.
  - SEO: `table_seo` (từng bài/mục), `table_seopage` (trang danh sách), `table_redirect`.
- Môi trường dev: XAMPP (`root`, không mật khẩu). URL dev: `http://localhost/maccadamia/` (base path ở `libraries/config.php` → `website.url`).
- Thư mục quan trọng:
  - `index.php` → nạp `libraries/config.php`, `libraries/controller.php` (định tuyến), rồi `templates/desktop.php` (khung HTML chung).
  - `sources/*.php` = lấy dữ liệu từng trang; `templates/**/*_tpl.php` = giao diện; `templates/layouts/` = header, footer, menu, slider, css.php, js.php, seo.php.
  - **Trang chủ**: `sources/index.php` + `templates/index_tpl.php` (slider ở `templates/layouts/slider.php`).
  - **Tin tức**: route `tin-tuc` → `sources/news.php` + `templates/news/news2_tpl.php` (danh sách), `templates/news/news_detail_tpl.php` (chi tiết).
  - **Giới thiệu**: route `gioi-thieu` → `sources/baiviet.php` + `templates/pages/baiviet_tpl.php` (đọc `table_info`).
  - Liên hệ: `contacts/contact_tpl.php`. 404: `templates/error/404_tpl.php`.
  - Dữ liệu chung mọi trang (`$row_setting`...): `sources/defaults.php`.
  - CSS/JS: `assets/css/`, `assets/js/`; nạp qua `templates/layouts/css.php` / `js.php` (lớp `CssMinify` / `JsMinify` gộp thành `assets/css/cached.css` — **sửa CSS xong phải xóa / tạo lại file cached** nếu không thấy thay đổi). Ảnh upload: `upload/` (bài viết `upload/baiviet/`, banner `upload/hinhanh/`); thumbnail tự sinh qua `thumbs/WxHxZ/...`.
  - **Quản trị**: `admin/` (`admin/index.php?com=baiviet&act=man&type=tin-tuc`). Loại bài / trang tĩnh khai báo ở `libraries/setting.php` (`$GLOBAL['baiviet'][type]`, `$GLOBAL['info'][type]`).
  - File thiết kế tham khảo: `WEASoft.html` ở gốc.
- Thêm 1 trang / route: (1) thêm `case 'slug-moi':` trong `switch($com)` ở `libraries/controller.php` (đặt `$title_seo`, `$type`, `$source`, `$template`); (2) tạo `sources/<source>.php` + `templates/<template>_tpl.php`; (3) nếu trang có slug trong DB thì thêm vào `$attr_com` (cùng file) để sitemap + tra slug chạy; (4) cần quản trị thì khai báo type ở `libraries/setting.php`. URL: `/slug`, `/vi/slug`, `/vi/tin-tuc/ten-bai`.
- SEO sẵn có:
  - `<head>` (title, description, canonical, robots, OG, Twitter): `sources/meta.php`, lấy từ `$seo` (`libraries/seos.php`: `setSeo / getSeo / getSeoDB`).
  - Dữ liệu SEO nhập ở admin (`admin/sources/seos.php`) → `table_seo` / `table_seopage`; trường `schema` chèn JSON-LD.
  - JSON-LD dựng sẵn: `libraries/jsonSchema.php` (`Organization`, `NewsArticle`, `BreadcrumbList`, `ItemList`...). Breadcrumb: `libraries/breadCrumbs.php`.
  - `<h1>`: trang trong ở `templates/desktop.php` (khối `.breadcumb`); trang chủ in `<h1>` ẩn ở `templates/layouts/seo.php`.
  - Sitemap: route `sitemap.xml` → `sitemap.php` → `libraries/sitemap.php` (dựa trên `$attr_com`). `robots.txt` ở gốc. Slug: `$func->changeTitle()` (`libraries/functions.php`). 301: `table_redirect`.

Không thêm framework, thư viện, CDN hay bước build khi chưa hỏi. Cần thêm thì nêu lý do + phương án thay thế trước.

## 5. Yêu cầu SEO (bắt buộc cho mọi trang)

- Mỗi trang 1 `<title>` riêng (≤ 60 ký tự) + `<meta name="description">` riêng (≤ 160 ký tự), tiếng Việt có dấu, có từ khóa chính (vd "phần mềm quản lý công việc", "quản lý dự án").
- Đúng 1 `<h1>` / trang, tiêu đề con theo thứ tự h2 → h3. Không dùng thẻ heading chỉ để làm chữ to.
- URL thân thiện, không dấu, gạch nối; slug không trùng. Đổi slug bài đã đăng thì thêm 301 ở `table_redirect`.
- `canonical` (luôn dạng `https://weasoft.vn/...`, không `www`, không `index.php`), Open Graph (`og:title`, `og:description`, `og:image` 1200×630) cho trang chủ, About và từng bài.
- Ảnh có `alt` mô tả thật, có width / height, ảnh dưới màn hình đầu `loading="lazy"`, ưu tiên WebP, ảnh lớn ≤ 200 KB.
- `sitemap.xml` + `robots.txt` (dùng cái có sẵn, chỉ liệt kê trang thuộc phạm vi, chặn `/admin/`). Sau deploy: khai báo sitemap ở Google Search Console.
- JSON-LD: `Organization` (trang chủ, có logo + sameAs), `SoftwareApplication` cho WEA Task (trang chủ, giá lấy đúng mục 3b), `Article`/`NewsArticle` (bài viết), `BreadcrumbList` (tin tức, about).
- Tốc độ: không script ngoài thừa (chat widget, pixel cũ...), CSS / JS gọn, font tự host hoặc 1 Google Font. Mục tiêu Lighthouse mobile: Performance ≥ 85, SEO ≥ 95, Accessibility ≥ 90.
- 404 có giao diện tử tế + link về trang chủ + trả đúng mã HTTP 404.
- Rà SEO 26/11/2026: từ khóa mục tiêu = "WEA Soft / WEA / weasoft", "phần mềm quản lý dự án", "phần mềm quản lý công việc", "thiết kế website chuyên nghiệp", "website nghiệp vụ", "website lấy liền" (đưa vào title / description / h2 / bài viết khi viết nội dung). Trang chủ có `WebSite` + `Organization` với `alternateName` (các cách gõ tên thương hiệu) và `sameAs` fanpage weasolution; KHÔNG in lại SearchAction / Person / Library của template cũ (`sources/meta.php`). `/llms.txt` = bản tóm tắt cho AI (ChatGPT, Gemini, Perplexity), sửa khi đổi giá / dịch vụ (`.htaccess` cho phép riêng robots.txt + llms.txt). Router nhận HEAD như GET; `getCurrentPageURL` không ghi cổng 80 / 443.

## 6. Giao diện

- Chủ dự án **đã có bản thiết kế** (ảnh gửi trong chat / `WEASoft.html`): luôn bám sát, không tự sáng tác bố cục khác. Có ảnh mẫu thì chụp màn thật đúng cỡ, đặt cạnh mẫu so từng chi tiết (khoảng cách, cỡ chữ, màu, bo góc) trước khi báo xong.
- Phong cách đồng bộ với app: **WEA Design System – Premium Pastel SaaS** (nền xanh xám rất nhạt, thẻ trắng nổi, thẻ nhóm nền pastel + viền cùng tông, bo 14–20px, viền mảnh, bóng mềm; màu chủ đạo xanh crystal `#38bdf8`, cảnh báo `#fb7185`). Chi tiết ở `task-management/docs/ky-thuat.md` mục "Phong cách giao diện WEA".
- Bố cục cân đối, thoáng: khối cùng hàng cao bằng nhau, padding / khoảng cách đều, chữ không tràn. Hover tô nền ô đậm hơn 1 nấc, không phủ màu chói, không đổi màu chữ.
- "Sinh động, nổi bật" = màu sắc, icon, thẻ, bố cục rõ ràng. **Không** nhấp nháy, pulse, mờ dần lặp lại. Thu / mở / đổi khối có chuyển động 0.2s, không giật chớp. Nút luôn rõ và đứng yên.
- Responsive: kiểm desktop, tablet, điện thoại (390px), zoom 150%. Không tràn ngang. Bố cục hẹp thì giảm cột trước khi bẻ chữ.
- Màu / font / khoảng cách dùng biến CSS (`:root`), không hard-code rải rác.
- Truy cập: nút chỉ có icon phải có `aria-label`, giữ `:focus-visible`, tôn trọng `prefers-reduced-motion`, tương phản chữ đủ đọc.
- Icon: 1 bộ thống nhất (SVG nét đều), không emoji thay icon.

## 6b. Trạng thái màn hình và form

- Danh sách bài: xử lý đủ **rỗng** (chưa có bài: câu thân thiện + link về trang chủ), **không có kết quả** (danh mục / tìm kiếm trống), **lỗi** (không lộ lỗi PHP).
- Form liên hệ: báo lỗi ngay dưới ô (thiếu tên, email sai, số điện thoại sai), giữ nguyên chữ đã gõ, focus vào ô sai; nút gửi `disabled` khi đang gửi; gửi xong có thông báo rõ ("Đã nhận, chúng tôi sẽ liên hệ trong 24 giờ"). Validate cả JS lẫn PHP; PHP là chốt cuối.
- Form liên hệ chống spam: giới hạn tần suất theo IP, ô honeypot ẩn; không tiết lộ lỗi kỹ thuật.

## 7. Quy ước code

- Giữ phong cách sẵn có của từng file (thụt lề, cách đặt tên). Không đổi tên / định dạng lại hàng loạt.
- Code mới: camelCase, có thể xen tiếng Việt không dấu (`layDanhSachBaiViet`); khái niệm kỹ thuật giữ tiếng Anh (`render`, `fetch`). Không có dấu trong tên biến / hàm / class / id.
- Comment **tiếng Việt có dấu**, giải thích vì sao, chỉ ở chỗ khó / dễ hiểu nhầm.
- Chữ hiển thị: tiếng Việt có dấu, lịch sự, ngắn gọn, nói rõ khách làm gì tiếp.
- Không để `console.log`, `var_dump`, `print_r`, code bị comment bỏ dở trong bản giao.
- SQL luôn prepared statement (`?` + mảng tham số), không nối chuỗi dữ liệu người dùng. Mọi dữ liệu đưa ra HTML phải escape (`htmlspecialchars`); nội dung bài viết từ trình soạn admin chỉ in ở đúng chỗ đã qua bộ lọc của source.

## 8. Cơ sở dữ liệu

- **Claude KHÔNG tự chạy SQL** vào DB của chủ dự án (kể cả localhost). Cần đổi DB: dán nguyên mã SQL trong câu trả lời (khối sql, chạy lại nhiều lần an toàn, `IF NOT EXISTS`), chủ dự án tự nhập bằng SQLyog / phpMyAdmin. Không tạo file migration riêng, không chỉ ghi tên file.
- Đọc cấu trúc DB từ file `.sql` có sẵn, hoặc hỏi trước.
- Không xóa dữ liệu, không chạy lệnh phá hủy (`DROP`, `TRUNCATE`, `rm -rf`) khi chưa được xác nhận.
- Khi xóa bài / ảnh có file trên đĩa thì xóa cả file (dùng hàm sẵn có của admin).

## 9. Bảo mật (kiểm trước khi lên mạng)

- [ ] File cấu hình bí mật (`libraries/config.php` hoặc tương đương: DB, SMTP, khóa) KHÔNG commit; có bản mẫu không bí mật. Không đọc / in mật khẩu khi kiểm tra.
- [ ] Tài khoản admin công ty cũ đã xóa / đổi; admin dùng mật khẩu mạnh; đường dẫn `/admin/` không lộ trên menu, có `noindex`.
- [ ] Gói triển khai KHÔNG chứa: `.sql`, dump DB, `WEASoft.html`, `CLAUDE.md`, tài liệu nội bộ, thư mục thử, bản sao lưu. `.htaccess` chặn tải `.sql/.md/.txt/.zip/.bak/.log`, `Options -Indexes`.
- [ ] Thư mục upload chặn chạy script (`.htaccess` `FilesMatch` php → deny). Upload ở admin kiểm loại file bằng nội dung, đặt tên ngẫu nhiên.
- [ ] `display_errors = 0` trên máy thật; lỗi ghi log, không hiện cho khách.
- [ ] Form (liên hệ, admin) có chống CSRF / giới hạn tần suất; dữ liệu khách được escape khi hiển thị lại trong admin.
- [ ] HTTPS bắt buộc, http tự chuyển https (301); canonical / sitemap dùng `https://weasoft.vn`.

Nếu phát hiện lỗ hổng hoặc bí mật bị lộ: **dừng và báo chủ dự án ngay**, kèm cách khắc phục.

## 10. Triển khai (deploy)

- Hosting: **Vietnix cPanel**, tài khoản `weasoftv`, IP `103.200.23.152`. Website ở **`public_html`** (tên miền `weasoft.vn` + `www`); phần mềm ở thư mục riêng `app.weasoft.vn` — **không đụng** thư mục / database của app.
- DNS quản lý ở trang tên miền Vietnix (bản ghi A `@`, `www`, `app` → IP trên). SSL Let's Encrypt đã cấp cho `weasoft.vn`, `www`, `app` (gắn ở cPanel › SSL/TLS › Installation).
- Database website: tạo DB + user riêng (`weasoftv_...`), không dùng chung DB của app.
- Quy trình: Claude đóng gói zip sạch (chỉ file cần chạy) → chủ dự án kéo lên bằng FileZilla → giải nén ở File Manager → điền config trên host → nhập SQL qua phpMyAdmin → Claude kiểm từ máy (`curl`: trang 200, file bí mật 403/404, http → https 301).
- Sau deploy: đặt quyền thư mục 755, file 644, file config 600 (cPanel Terminal: `find . -type d -exec chmod 755 {} \;` ...). Đổi `website.url` sang `https://weasoft.vn/`.
- Thay đổi về sau: chỉ upload file đã sửa, ghi rõ danh sách file trong báo cáo.

## 11. Cách làm việc với chủ dự án

- **Từng giai đoạn:** việc lớn (1 trang mới, làm lại giao diện 1 trang, deploy) → báo kế hoạch ngắn (file nào đổi, DB có đổi không, rủi ro) và hỏi duyệt trước khi code → làm 1 giai đoạn → báo + hỏi duyệt (sửa thêm / commit) → mới sang giai đoạn kế.
- Sửa **nhỏ nhất đủ giải quyết vấn đề**. Không refactor ngoài phạm vi.
- Được phép sửa thẳng vào file. Nếu hướng dẫn sửa tay thì chỉ vị trí bằng đoạn code, **không theo số dòng**. Không dán lại cả file có sẵn.
- Ưu tiên đơn giản, ít bước, dễ dùng cho người không rành công nghệ. Phân vân về luồng dùng thì làm như các website SaaS quốc tế (ClickUp, Notion, Trello).
- Yêu cầu mơ hồ: hỏi lại 1 câu ngắn, hoặc nêu giả định rồi làm.
- Tiết kiệm token: chỉ đọc file liên quan; chỉ xem ảnh khi cần; việc nhỏ sửa nhanh, báo 1–3 dòng; mỗi phiên tập trung 1 trang.
- Kiểm tra: chỉ kiểm phần vừa sửa (mở trang, Console không lỗi, xem trên điện thoại, xem nguồn trang có đủ title / description / h1 / canonical).
- **Commit = push** luôn lên origin khi chủ dự án bảo commit. Không commit file bí mật, dump DB, ảnh gốc chưa dùng.

**Báo cáo lại** bằng tiếng Việt, ngắn gọn: đã làm gì, file nào, SQL cần chạy (dán nguyên mã), cách kiểm, điều chưa chắc. Thành thật nêu chỗ chưa làm được.

## 12. Tiêu chuẩn "xong"

Một trang chỉ coi là xong khi:

1. Đúng thiết kế (đã so ảnh mẫu), đúng nội dung, thông tin sản phẩm khớp mục 3b.
2. Đủ SEO mục 5 (title, description, 1 h1, canonical, OG, JSON-LD, alt ảnh), có trong sitemap.
3. Chạy tốt desktop / tablet / điện thoại / zoom 150%, không tràn, không lỗi Console.
4. Xử lý đủ trạng thái rỗng / không có kết quả / lỗi; form báo lỗi dưới ô, có thông báo thành công.
5. An toàn: escape, prepared statement, không lộ dữ liệu / thương hiệu công ty cũ, không lộ bí mật.

## 13. Không được làm

- Không đưa dữ liệu / thương hiệu công ty cũ lên web.
- Không bịa tính năng, giá, số liệu khách hàng, lời chứng thực (testimonial) giả.
- Không in ra hay commit bí mật, mật khẩu, token.
- Không tự chạy SQL / lệnh phá hủy.
- Không thêm thư viện / framework / script bên ngoài khi chưa hỏi.
- Không đổi tên hàng loạt, không định dạng lại cả file.
- Không làm chức năng ngoài phạm vi khi chưa được yêu cầu.
- Không đụng thư mục / database của phần mềm (`app.weasoft.vn`) khi làm website.
