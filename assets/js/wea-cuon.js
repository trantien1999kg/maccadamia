/* Cuộn mượt có quán tính (thư viện Lenis, file tại assets/js/lenis.min.js) cho chuột / touchpad trên máy tính.
   Điện thoại giữ cuộn gốc; tắt khi người dùng bật "giảm chuyển động" */
(function () {
    if (!window.Lenis || (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches)) return;
    var lenis = new Lenis({
        lerp: 0.085,
        wheelMultiplier: 1,
        smoothWheel: true,
        // Vùng có thanh cuộn riêng (bài Vì sao, mô tả Về WEA, menu điện thoại, ô nhập...) cuộn bình thường bên trong.
        // Tự dò: phần tử nào có cuộn dọc (overflow auto/scroll và nội dung dài hơn khung) thì để trình duyệt tự cuộn
        prevent: function (n) {
            for (var el = n; el && el !== document.body; el = el.parentElement) {
                if (el.matches && el.matches('[data-lenis-prevent],textarea,select,.hd-menu')) return true;
                var oy = getComputedStyle(el).overflowY;
                if ((oy === 'auto' || oy === 'scroll') && el.scrollHeight > el.clientHeight + 1) return true;
            }
            return false;
        }
    });
    window.weaLenis = lenis;
    function chay(t) { lenis.raf(t); requestAnimationFrame(chay); }
    requestAnimationFrame(chay);
    // Link tới khối trong cùng trang (#bang-gia...): trượt mượt, chừa chỗ cho menu dính
    document.addEventListener('click', function (e) {
        var a = e.target.closest && e.target.closest('a[href*="#"]');
        if (!a || e.defaultPrevented || e.button || e.metaKey || e.ctrlKey || e.shiftKey) return;
        var u = new URL(a.href, location.href);
        if (u.origin !== location.origin || u.pathname !== location.pathname || !u.hash) return;
        var dich = document.getElementById(decodeURIComponent(u.hash.slice(1)));
        if (!dich) return;
        e.preventDefault();
        lenis.scrollTo(dich, { offset: -80 });
        history.pushState(null, '', u.hash);
    });
})();
