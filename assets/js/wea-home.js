/* Trang chủ WEA: script nhỏ, không phụ thuộc jQuery để trang tải nhanh */
(function () {
    var d = document, r = d.documentElement;
    var giamChuyenDong = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // Không hỗ trợ IntersectionObserver thì giữ nguyên nội dung hiển thị, không thêm hiệu ứng
    if (!('IntersectionObserver' in window)) return;

    r.classList.add('js');

    // Tự gắn hiệu ứng lướt lên cho nội dung các khối (trang chủ, Giải pháp WEA Task, Thiết kế website...), khỏi sửa từng template.
    // Lưới thẻ thì từng thẻ lướt lên lần lượt; bỏ qua tab đang ẩn (nếu gắn thì tab mở sau sẽ không hiện)
    var luoiThe = '.luoi-2,.luoi-3,.luoi-4,.luoi-goi,.luoi-vande,.luoi-faq,.gia-tri,.web-mh2-luoi,.web-tl,.gp-ph-luoi,.web-nt-ds,.gt2-luoi';
    d.querySelectorAll('.trang-chu main section.khoi').forEach(function (sec) {
        var w = sec.querySelector(':scope > .wrap') || sec;
        Array.prototype.forEach.call(w.children, function (c) {
            if (c.matches('.tab-pane,[role="tabpanel"],.ky-tra,.goi-ghichu')) return;
            if (c.matches(luoiThe)) {
                Array.prototype.forEach.call(c.children, function (the, k) { the.classList.add('rv'); the.style.setProperty('--d', Math.min(k, 5) * 0.08 + 's'); });
            } else c.classList.add('rv');
        });
    });

    // Quy trình (Thiết kế website): tô sáng lần lượt từng bước, chạy vòng khi khối đang trên màn hình, ra khỏi màn hình thì dừng
    if (!giamChuyenDong) d.querySelectorAll('.web-tl:not(.web-tl-tinh)').forEach(function (tl) {
        var buoc = tl.children, i = -1, hen = null;
        if (buoc.length < 2) return;
        function toi() {
            i = (i + 1) % buoc.length;
            Array.prototype.forEach.call(buoc, function (b, k) { b.classList.toggle('dang', k === i); b.classList.toggle('qua', k < i); });
            tl.style.setProperty('--tien', i / (buoc.length - 1));
        }
        new IntersectionObserver(function (es) {
            es.forEach(function (e) {
                if (e.isIntersecting) { if (!hen) { toi(); hen = setInterval(toi, 1800); } }
                else if (hen) { clearInterval(hen); hen = null; }
            });
        }, { threshold: .3 }).observe(tl);
    });

    // Khối hiện dần khi cuộn tới
    var io = new IntersectionObserver(function (es) {
        es.forEach(function (e) {
            if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); }
        });
    }, { threshold: .1 });
    d.querySelectorAll('.rv').forEach(function (el) { io.observe(el); });
    // Dự phòng: cuộn (hoặc nhảy) tới cuối trang thì hiện hết khối còn ẩn, tránh khoảng trống trước footer
    function hienHet() {
        if (window.scrollY + window.innerHeight < r.scrollHeight - 80) return;
        d.querySelectorAll('.rv:not(.in)').forEach(function (el) { el.classList.add('in'); io.unobserve(el); });
        window.removeEventListener('scroll', hienHet);
    }
    window.addEventListener('scroll', hienHet, { passive: true });

    // Đếm số chạy lên một lần (bỏ qua nếu người dùng tắt chuyển động)
    if (!giamChuyenDong) {
        var co = new IntersectionObserver(function (es) {
            es.forEach(function (e) {
                if (!e.isIntersecting) return;
                var el = e.target, t = +el.dataset.count, s = el.dataset.suf || '', st = performance.now();
                (function f(n) {
                    var p = Math.min((n - st) / 1200, 1);
                    el.textContent = Math.round(t * (1 - Math.pow(1 - p, 3))) + s;
                    if (p < 1) requestAnimationFrame(f);
                })(st);
                co.unobserve(el);
            });
        }, { threshold: .6 });
        d.querySelectorAll('[data-count]').forEach(function (el) {
            el.textContent = '0' + (el.dataset.suf || '');
            co.observe(el);
        });
    }

    // Tab biểu đồ
    d.querySelectorAll('[data-tabs]').forEach(function (w) {
        var bs = w.querySelectorAll('[data-tab]'), ps = w.parentNode.querySelectorAll('[data-pane]');
        bs.forEach(function (b) {
            b.addEventListener('click', function () {
                bs.forEach(function (x) {
                    x.classList.toggle('on3', x === b);
                    x.setAttribute('aria-selected', x === b);
                });
                ps.forEach(function (p) { p.hidden = p.dataset.pane !== b.dataset.tab; });
            });
        });
    });

    // "Lý do chọn WEA": bấm mục nào thì chỉ hiện nội dung mục đó
    d.querySelectorAll('[data-lydo]').forEach(function (ds) {
        var bs = Array.prototype.slice.call(ds.querySelectorAll('[role="tab"]'));
        function chon(b) {
            bs.forEach(function (x) {
                var on = x === b, p = d.getElementById(x.getAttribute('aria-controls'));
                x.classList.toggle('on', on);
                x.setAttribute('aria-selected', on);
                x.tabIndex = on ? 0 : -1;
                if (p) p.classList.toggle('on', on);
            });
            // Điện thoại: mục lục nằm trên nội dung, cuộn xuống nếu phần đầu nội dung đang khuất
            var p = d.getElementById(b.getAttribute('aria-controls'));
            if (p && p.getBoundingClientRect().top > innerHeight * .8) {
                p.scrollIntoView({ behavior: giamChuyenDong ? 'auto' : 'smooth', block: 'start' });
            }
        }
        bs.forEach(function (b, i) {
            b.tabIndex = b.classList.contains('on') ? 0 : -1;
            b.addEventListener('click', function () { chon(b); });
            b.addEventListener('keydown', function (e) {
                var j = e.key === 'ArrowDown' || e.key === 'ArrowRight' ? i + 1 : e.key === 'ArrowUp' || e.key === 'ArrowLeft' ? i - 1 : null;
                if (j === null) return;
                e.preventDefault();
                var k = bs[(j + bs.length) % bs.length];
                k.focus(); chon(k);
            });
        });
    });

    // Thanh tiến trình đọc trên cùng
    var pb = d.getElementById('pgb');
    if (pb) {
        addEventListener('scroll', function () {
            var h = r.scrollHeight - innerHeight;
            pb.style.width = (h > 0 ? scrollY / h * 100 : 0) + '%';
        }, { passive: true });
    }
})();

/* Thiết kế 11/2026: menu, tab nền tảng, đổi giá tháng / năm (chạy được cả khi trình duyệt cũ) */
(function () {
    var d = document;

    // Menu bám đầu trang: cuộn qua khỏi chỗ của menu thì menu chuyển sang cố định (khung bọc giữ chiều cao để trang không nhảy)
    d.querySelectorAll('[data-hd-dinh]').forEach(function (w) {
        var hd = w.querySelector('.hd');
        if (!hd) return;
        w.style.minHeight = hd.offsetHeight + 'px';
        function xem() {
            var moc = w.getBoundingClientRect().top + window.pageYOffset + w.offsetHeight;
            hd.classList.toggle('hd-co-dinh', window.pageYOffset > moc);
        }
        addEventListener('scroll', xem, { passive: true });
        xem();
    });

    // Menu điện thoại: nút ☰ mở / đóng cả menu
    d.querySelectorAll('.hd-mo').forEach(function (nut) {
        var hd = nut.closest('.hd');
        nut.addEventListener('click', function () {
            var mo = hd.classList.toggle('mo');
            nut.setAttribute('aria-expanded', mo);
            nut.setAttribute('aria-label', mo ? 'Đóng menu' : 'Mở menu');
        });
    });

    // Menu xổ xuống: bấm để mở (điện thoại, bàn phím); bấm ra ngoài hoặc Esc thì đóng
    var xo = d.querySelectorAll('.hd-xo');
    function dongHet(tru) {
        xo.forEach(function (li) {
            if (li === tru) return;
            li.classList.remove('mo');
            li.querySelector('button').setAttribute('aria-expanded', 'false');
        });
    }
    xo.forEach(function (li) {
        var nut = li.querySelector('button');
        nut.addEventListener('click', function () {
            var mo = li.classList.toggle('mo');
            nut.setAttribute('aria-expanded', mo);
            dongHet(li);
        });
    });
    d.addEventListener('click', function (e) { if (!e.target.closest('.hd-xo')) dongHet(); });
    d.addEventListener('keydown', function (e) { if (e.key === 'Escape') dongHet(); });

    // Tab "Một nền tảng cho cả hành trình dự án"
    d.querySelectorAll('[data-tabwea]').forEach(function (ds) {
        var bs = Array.prototype.slice.call(ds.querySelectorAll('[role="tab"]'));
        function chon(b) {
            bs.forEach(function (x) {
                var on = x === b, p = d.getElementById(x.getAttribute('aria-controls'));
                x.classList.toggle('on', on);
                x.setAttribute('aria-selected', on);
                x.tabIndex = on ? 0 : -1;
                if (p) p.classList.toggle('on', on);
                // Phần đi kèm tab nằm chỗ khác (vd ảnh bên phải khối Dịch vụ website) gắn data-theo="id pane"
                d.querySelectorAll('[data-theo="' + x.getAttribute('aria-controls') + '"]').forEach(function (q) {
                    q.classList.toggle('on', on);
                    // Ảnh động (GIF) của tab chỉ tải khi tab được mở lần đầu
                    if (on) q.querySelectorAll('img[data-src]').forEach(function (im) { im.src = im.getAttribute('data-src'); im.removeAttribute('data-src'); });
                });
            });
        }
        // Nút "Bài tiếp theo" trong khối Vì sao chọn: bấm tab kế tiếp
        ds.parentNode.querySelectorAll('[data-bai-toi]').forEach(function (n) {
            n.addEventListener('click', function () {
                var b = d.getElementById(n.getAttribute('data-bai-toi'));
                if (b) { chon(b); b.focus(); }
            });
        });
        bs.forEach(function (b, i) {
            b.tabIndex = b.classList.contains('on') ? 0 : -1;
            b.addEventListener('click', function () { chon(b); });
            b.addEventListener('keydown', function (e) {
                var j = (e.key === 'ArrowRight' || e.key === 'ArrowDown') ? i + 1 : (e.key === 'ArrowLeft' || e.key === 'ArrowUp') ? i - 1 : null;
                if (j === null) return;
                e.preventDefault();
                var k = bs[(j + bs.length) % bs.length];
                k.focus(); chon(k);
            });
        });
    });

    // Ảnh GIF chạy 1 lần khi rê chuột (thẻ Cam kết trang chủ): ban đầu hiện ảnh tĩnh, rê chuột / chọn bằng bàn phím
    // thì đổi sang GIF. Tải GIF 1 lần (khi thẻ sắp vào màn hình), mỗi lần rê tạo link blob mới để GIF chạy lại từ đầu
    d.querySelectorAll('img[data-gif]').forEach(function (img) {
        if ((window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) || !window.fetch || !window.URL || !URL.createObjectURL) return;
        var the = img.closest('a') || img, gif = null, dangTai = null, linkCu = '';
        function tai() {
            if (!dangTai) dangTai = fetch(img.getAttribute('data-gif')).then(function (r) { return r.ok ? r.blob() : null; }).then(function (b) { gif = b; }).catch(function () {});
            return dangTai;
        }
        function chay() {
            tai().then(function () {
                if (!gif) return;
                var link = URL.createObjectURL(gif), cu = linkCu;
                img.src = link; linkCu = link;
                if (cu) setTimeout(function () { URL.revokeObjectURL(cu); }, 1000);
            });
        }
        the.addEventListener('mouseenter', chay);
        the.addEventListener('focus', chay);
        if ('IntersectionObserver' in window) {
            var io = new IntersectionObserver(function (es) { if (es[0].isIntersecting) { io.disconnect(); tai(); } }, { rootMargin: '300px 0px' });
            io.observe(img);
        }
    });

    // Trang Giới thiệu: khung "Trong bài viết" tô đậm mục đang đọc khi cuộn tới
    // Tính theo vị trí cuộn (không dùng IntersectionObserver) vì 2 mục xếp 2 cột nằm cùng độ cao, mục ngắn có thể không chạm vùng theo dõi
    d.querySelectorAll('[data-mucluc]').forEach(function (ds) {
        var links = Array.prototype.slice.call(ds.querySelectorAll('a[href*="#muc-"]')).filter(function (a) { return d.getElementById(a.hash.slice(1)); });
        if (!links.length) return;
        var khoa = 0, hen = 0;
        // Người dùng tự cuộn (lăn chuột, vuốt, phím) thì bỏ khóa, quay lại tô theo vị trí cuộn
        ['wheel', 'touchmove', 'keydown'].forEach(function (s) { window.addEventListener(s, function () { khoa = 0; }, { passive: true }); });
        function to(a) { links.forEach(function (x) { x.classList.toggle('on', x === a); if (x === a) x.setAttribute('aria-current', 'true'); else x.removeAttribute('aria-current'); }); }
        function doVi() {
            if (khoa) return;
            var chon = links[0], dinhTruoc = null;
            links.forEach(function (a) {
                var dinh = Math.round(d.getElementById(a.hash.slice(1)).getBoundingClientRect().top);
                // Mục nằm cùng hàng với mục trước (cột phải) thì không tính, để mục cột trái được tô
                if (dinh <= 140 && dinh !== dinhTruoc) chon = a;
                dinhTruoc = dinh;
            });
            to(chon);
        }
        links.forEach(function (a) {
            // Bấm mục nào tô mục đó ngay, giữ nguyên tới khi người dùng tự cuộn
            // Tự cuộn tại chỗ (không để trình duyệt mở lại trang khi đường dẫn đang là /vi/gioi-thieu, có dấu / cuối...)
            a.addEventListener('click', function (e) {
                var dich = d.getElementById(a.hash.slice(1));
                e.preventDefault();
                to(a); khoa = 1;
                if (window.weaLenis) window.weaLenis.scrollTo(dich, { offset: -80 });
                else window.scrollTo({ top: dich.getBoundingClientRect().top + window.pageYOffset - 80, behavior: 'smooth' });
                if (history.replaceState) history.replaceState(null, '', location.pathname + location.search + a.hash);
            });
        });
        window.addEventListener('scroll', function () { if (!hen) hen = requestAnimationFrame(function () { hen = 0; doVi(); }); }, { passive: true });
        doVi();
    });

    // Slide ảnh đầu trang (trang Giải pháp, Thiết kế website): bấm chấm để đổi ảnh, tự chạy 5 giây / ảnh,
    // dừng khi rê chuột / đang chọn bằng bàn phím, không tự chạy nếu người dùng tắt chuyển động
    // Ảnh đầu trang dạng tab (trang Giải pháp WEA Task): bấm tab / mũi tên / phím trái phải để đổi ảnh, không tự chạy
    d.querySelectorAll('[data-anhtab]').forEach(function (kv) {
        var anh = kv.querySelectorAll('.gp-anhtab-anh'), tab = kv.querySelectorAll('[role="tab"]'), i = 0;
        if (anh.length < 2) return;
        function hien(j, dat) {
            i = (j + anh.length) % anh.length;
            anh.forEach(function (a, k) { a.classList.toggle('on', k === i); if (k === i) a.removeAttribute('aria-hidden'); else a.setAttribute('aria-hidden', 'true'); });
            tab.forEach(function (t, k) { t.classList.toggle('on', k === i); t.setAttribute('aria-selected', k === i ? 'true' : 'false'); t.tabIndex = k === i ? 0 : -1; });
            if (dat) tab[i].focus();
        }
        tab.forEach(function (t, k) {
            t.addEventListener('click', function () { hien(k); });
            t.addEventListener('keydown', function (e) {
                if (e.key === 'ArrowRight') { e.preventDefault(); hien(i + 1, true); }
                if (e.key === 'ArrowLeft') { e.preventDefault(); hien(i - 1, true); }
            });
        });
        kv.querySelector('[data-lui]').addEventListener('click', function () { hien(i - 1); });
        kv.querySelector('[data-toi]').addEventListener('click', function () { hien(i + 1); });
    });

    // Thư viện ảnh đầu trang: bấm ảnh nhỏ thì đổi chỗ với ảnh lớn (mờ đi 0.3s, đổi ảnh, hiện lại 0.3s)
    d.querySelectorAll('[data-thuvien]').forEach(function (tv) {
        var chinh = tv.querySelector('.gp-anh-chinh img'), dangDoi = false;
        if (!chinh) return;
        function doiAnh(a, b) {
            ['src', 'alt', 'width', 'height'].forEach(function (t) { var g = a.getAttribute(t); a.setAttribute(t, b.getAttribute(t)); b.setAttribute(t, g); });
        }
        tv.querySelectorAll('.gp-anh-nho button').forEach(function (nut) {
            nut.addEventListener('click', function () {
                var nho = nut.querySelector('img');
                if (!nho || dangDoi) return;
                var xong = function () { doiAnh(chinh, nho); nut.setAttribute('aria-label', 'Xem ảnh lớn: ' + nho.alt); tv.classList.remove('dang-doi'); nut.classList.remove('dang-doi'); dangDoi = false; };
                if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) { xong(); return; }
                dangDoi = true; tv.classList.add('dang-doi'); nut.classList.add('dang-doi');
                setTimeout(xong, 300);
            });
        });
    });

    // Form tư vấn (trang Thiết kế website): kiểm dữ liệu ngay trên trình duyệt, gửi không tải lại trang.
    // PHP vẫn kiểm lại lần cuối; trình duyệt không chạy JS thì form gửi kiểu thường
    d.querySelectorAll('[data-tuvan]').forEach(function (f) {
        var nut = f.querySelector('button[type="submit"]'), tb = f.querySelector('.web-thong-bao');
        function baoLoi(ten, chu) {
            var o = f.elements[ten], p = d.getElementById('tv-loi-' + ten);
            if (p) p.textContent = chu || '';
            if (o) { if (chu) o.setAttribute('aria-invalid', 'true'); else o.removeAttribute('aria-invalid'); }
        }
        function kiem() {
            var loi = {}, v = function (n) { return (f.elements[n].value || '').trim(); };
            if (v('ho_ten').length < 2) loi.ho_ten = 'Bạn nhập họ và tên (2–100 ký tự).';
            var lh = v('lien_he'), sdt = lh.replace(/[\s.\-()]/g, '');
            if (!lh) loi.lien_he = 'Bạn nhập email hoặc số điện thoại để chúng tôi liên hệ lại.';
            else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(lh) && !/^(\+84|0)\d{9,10}$/.test(sdt)) loi.lien_he = 'Email hoặc số điện thoại chưa đúng (vd ten@congty.vn hoặc 0901234567).';
            if (!v('loai')) loi.loai = 'Bạn chọn loại website.';
            if (v('nhu_cau').length < 10) loi.nhu_cau = 'Bạn mô tả ngắn nhu cầu (ít nhất 10 ký tự).';
            return loi;
        }
        function hienLoi(loi) {
            ['ho_ten', 'lien_he', 'loai', 'nhu_cau'].forEach(function (n) { baoLoi(n, loi[n]); });
            var dau = Object.keys(loi)[0];
            if (dau) f.elements[dau].focus();
            return !dau;
        }
        f.addEventListener('submit', function (e) {
            e.preventDefault();
            tb.textContent = ''; tb.classList.remove('ok');
            if (!hienLoi(kiem())) return;
            nut.disabled = true;
            fetch(f.action, { method: 'POST', body: new FormData(f), headers: { 'X-Requested-With': 'fetch' }, credentials: 'same-origin' })
                .then(function (r) { return r.json(); })
                .then(function (kq) {
                    hienLoi(kq.loi || {});
                    tb.textContent = kq.thongBao || '';
                    if (kq.ok) { tb.classList.add('ok'); f.reset(); }
                })
                .catch(function () { tb.textContent = 'Chưa gửi được yêu cầu. Bạn kiểm tra kết nối mạng rồi thử lại giúp mình nhé.'; })
                .then(function () { nut.disabled = false; });
        });
        // Sửa ô nào thì xóa báo lỗi của ô đó
        f.addEventListener('input', function (e) { if (e.target.name && d.getElementById('tv-loi-' + e.target.name)) baoLoi(e.target.name, ''); });
    });

    // Bảng giá: đổi giữa giá trả theo tháng và trả theo năm
    d.querySelectorAll('[data-kytra]').forEach(function (nhom) {
        var bs = nhom.querySelectorAll('[data-ky]'), khoi = nhom.closest('section');
        bs.forEach(function (b) {
            b.addEventListener('click', function () {
                var ky = b.getAttribute('data-ky');
                bs.forEach(function (x) { x.classList.toggle('on', x === b); x.setAttribute('aria-pressed', x === b); });
                khoi.querySelectorAll('[data-thang]').forEach(function (g) { g.textContent = g.getAttribute('data-' + ky); });
                khoi.querySelectorAll('.goi-nam').forEach(function (n) { n.hidden = ky !== 'nam'; });
            });
        });
    });
})();

/* Khối Vì sao chọn: lăn chuột trên cột mục lục bên trái thì chuyển lần lượt sang mục kế / mục trước (kiểu oripio.com).
   Tới mục cuối (lăn xuống) hoặc mục đầu (lăn lên) thì để trang cuộn tiếp bình thường */
(function () {
    document.querySelectorAll('.hm-vs3-ml').forEach(function (ml) {
        var dong = 0, khoa = 0;
        ml.addEventListener('wheel', function (e) {
            if (Math.abs(e.deltaY) < Math.abs(e.deltaX)) return;
            var bs = Array.prototype.slice.call(ml.querySelectorAll('[role="tab"]'));
            var i = bs.findIndex(function (b) { return b.classList.contains('on'); });
            var toi = e.deltaY > 0 ? i + 1 : i - 1;
            if (toi < 0 || toi >= bs.length) { dong = 0; return; }
            // Giữ cuộn ở trong khung: không để trang (và Lenis) cuộn theo
            e.preventDefault(); e.stopPropagation();
            if (khoa) return;
            dong += e.deltaY;
            if (Math.abs(dong) < 60) return;
            dong = 0; khoa = Date.now() + 650;
            bs[toi].click();
        }, { passive: false });
    });
})();


/* Form Liên hệ (/lien-he): kiểm ngay trên trình duyệt, báo lỗi dưới từng ô, giữ chữ đã gõ, focus vào ô sai đầu tiên;
   gửi bằng fetch (máy chủ trả JSON), nút "Gửi" khóa trong lúc gửi. Máy chủ vẫn kiểm lại lần cuối */
(function () {
    var form = document.querySelector('[data-lienhe]');
    if (!form || !window.fetch || !window.FormData) return;
    var nut = form.querySelector('.lh-gui'), tb = form.querySelector('.lh-thongbao'), chuNut = nut.querySelector('span').textContent;
    var o = { hoten: form.elements.hoten, email: form.elements.email, noidung: form.elements.noidung };

    function baoLoi(ten, chu) {
        var p = document.getElementById('loi-' + ten);
        if (p) { p.textContent = chu || ''; p.hidden = !chu; }
        if (o[ten]) { if (chu) o[ten].setAttribute('aria-invalid', 'true'); else o[ten].removeAttribute('aria-invalid'); }
    }
    function kiem() {
        var loi = {}, email = o.email.value.trim();
        if (!form.querySelector('input[name="chude"]:checked')) loi.chude = 'Vui lòng chọn chủ đề.';
        if (!o.hoten.value.trim()) loi.hoten = 'Vui lòng nhập họ và tên.';
        if (!email) loi.email = 'Vui lòng nhập email.';
        else if (!/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(email)) loi.email = 'Email chưa đúng, ví dụ: ten@congty.vn';
        if (!o.noidung.value.trim()) loi.noidung = 'Vui lòng cho WEA biết bạn cần hỗ trợ điều gì.';
        return loi;
    }
    function hienLoi(loi) {
        ['chude', 'hoten', 'email', 'noidung'].forEach(function (t) { baoLoi(t, loi[t]); });
        var dau = ['hoten', 'email', 'noidung'].filter(function (t) { return loi[t]; })[0];
        if (loi.chude) form.querySelector('input[name="chude"]').focus();
        else if (dau) o[dau].focus();
    }
    // Sửa ô nào thì ẩn lỗi của ô đó
    ['hoten', 'email', 'noidung'].forEach(function (t) { o[t].addEventListener('input', function () { baoLoi(t, ''); }); });
    form.addEventListener('change', function (e) { if (e.target.name === 'chude') baoLoi('chude', ''); });

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        tb.hidden = true; tb.classList.remove('ok');
        var loi = kiem();
        if (Object.keys(loi).length) { hienLoi(loi); return; }
        nut.disabled = true; nut.querySelector('span').textContent = 'Đang gửi...';
        fetch(form.getAttribute('action'), { method: 'POST', body: new FormData(form), headers: { 'X-Requested-With': 'XMLHttpRequest' }, credentials: 'same-origin' })
            .then(function (r) { return r.json(); })
            .then(function (kq) {
                if (kq.loi && Object.keys(kq.loi).length) hienLoi(kq.loi);
                if (kq.thongBao) { tb.textContent = kq.thongBao; tb.hidden = false; tb.classList.toggle('ok', !!kq.ok); }
                if (kq.ok) { o.hoten.value = ''; o.email.value = ''; o.noidung.value = ''; }
            })
            .catch(function () {
                tb.textContent = 'Chưa gửi được yêu cầu. Bạn kiểm tra kết nối mạng rồi thử lại, hoặc gọi hotline giúp WEA nhé.';
                tb.hidden = false;
            })
            .then(function () { nut.disabled = false; nut.querySelector('span').textContent = chuNut; });
    });
})();
