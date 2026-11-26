/* Chatbot AI WEA Soft: nút tròn góc phải dưới, bấm mở khung chat. Gọi ajax/wea_chat.php (cùng tên miền), máy chủ chuyển sang app.
   Không thư viện ngoài. Lịch sử khung chat giữ trong sessionStorage để chuyển trang vẫn thấy; mã khách (vid) ở localStorage. */
(function () {
    "use strict";
    var API = (document.querySelector("base") ? document.querySelector("base").href : "/") + "ajax/wea_chat.php";
    var GOI_Y = ["WEA Task giá bao nhiêu?", "WEA Task có những tính năng gì?", "Tôi muốn làm website bán hàng", "Website lấy liền là gì?"];
    var CHAO = "Chào bạn! Mình là trợ lý của WEA Soft. Bạn cần tư vấn phần mềm quản lý công việc WEA Task hay thiết kế website?";
    var ICON = {
        chat: '<svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 12a8 8 0 0 1-11.6 7.1L4 20l1-4.6A8 8 0 1 1 21 12z"/><path d="M8.5 12h.01M12 12h.01M15.5 12h.01"/></svg>',
        dong: '<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M6 6l12 12M18 6 6 18"/></svg>',
        gui: '<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6"/></svg>'
    };
    var store = {
        get: function (k, s) { try { return (s ? sessionStorage : localStorage).getItem(k); } catch (e) { return null; } },
        set: function (k, v, s) { try { (s ? sessionStorage : localStorage).setItem(k, v); } catch (e) { /* chế độ riêng tư: bỏ qua */ } }
    };
    var vid = store.get("weaChatVid") || "";
    var log = [];
    try { log = JSON.parse(store.get("weaChatLog", true) || "[]") || []; } catch (e) { log = []; }
    var dangGui = false, hienForm = false, nhuCau = "other";

    function esc(s) { return String(s == null ? "" : s).replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;"); }
    // Chỉ biến thành link các địa chỉ của WEA / fanpage (AI trả về chữ thường, đã escape trước khi gắn thẻ a)
    function linkHoa(s) {
        return esc(s).replace(/https:\/\/(?:(?:www\.|app\.)?weasoft\.vn|www\.facebook\.com\/weasolution)[^\s<]*/g, function (u) {
            var sach = u.replace(/[.,;:!?)]+$/, "");
            return '<a href="' + sach + '" target="_blank" rel="noopener">' + sach + "</a>" + u.slice(sach.length);
        }).replace(/\n/g, "<br>");
    }
    function luu() { store.set("weaChatLog", JSON.stringify(log.slice(-30)), true); }

    var goc = document.createElement("div");
    goc.className = "wc";
    goc.innerHTML = '<button type="button" class="wc-nut" aria-label="Mở trò chuyện với WEA Soft" aria-expanded="false">' + ICON.chat + "</button>" +
        '<section class="wc-khung" role="dialog" aria-label="Trò chuyện với WEA Soft" hidden>' +
        '<header class="wc-dau"><span class="wc-ava" aria-hidden="true">W</span><div><b>WEA Soft</b><small>Trợ lý AI · trả lời ngay</small></div>' +
        '<button type="button" class="wc-dong" aria-label="Đóng">' + ICON.dong + "</button></header>" +
        '<div class="wc-tin" aria-live="polite"></div>' +
        '<form class="wc-nhap"><label class="wc-an" for="wc-o">Câu hỏi của bạn</label><textarea id="wc-o" rows="1" maxlength="500" placeholder="Nhập câu hỏi…"></textarea>' +
        '<button type="submit" class="wc-gui" aria-label="Gửi">' + ICON.gui + "</button></form>" +
        '<p class="wc-chan">Trợ lý AI có thể nhầm. Cần chắc chắn? <button type="button" class="wc-lk" data-wc="form">Để lại liên hệ</button></p>' +
        "</section>";
    document.body.appendChild(goc);
    var nut = goc.querySelector(".wc-nut"), khung = goc.querySelector(".wc-khung"), vungTin = goc.querySelector(".wc-tin"), o = goc.querySelector("#wc-o"), form = goc.querySelector(".wc-nhap");

    function ve() {
        var html = '<div class="wc-m is-bot"><span>' + linkHoa(CHAO) + "</span></div>";
        log.forEach(function (m) { html += '<div class="wc-m is-' + m.r + '"><span>' + (m.r === "bot" ? linkHoa(m.t) : esc(m.t).replace(/\n/g, "<br>")) + "</span></div>"; });
        if (!log.length) html += '<div class="wc-goiy">' + GOI_Y.map(function (g) { return '<button type="button" data-wc="hoi">' + esc(g) + "</button>"; }).join("") + "</div>";
        if (dangGui) html += '<div class="wc-m is-bot is-cho"><span>Đang trả lời…</span></div>';
        if (hienForm) {
            html += '<form class="wc-form" novalidate><p>Để lại thông tin, đội ngũ WEA sẽ liên hệ tư vấn trong giờ làm việc.</p>' +
                '<label>Tên của bạn<input name="name" maxlength="100" autocomplete="name" required></label>' +
                '<label>Số điện thoại / Zalo hoặc email<input name="contact" maxlength="120" autocomplete="tel" required></label>' +
                '<label>Bạn quan tâm<select name="need"><option value="wea_task"' + (nhuCau === "wea_task" ? " selected" : "") + '>Phần mềm WEA Task</option><option value="website"' + (nhuCau === "website" ? " selected" : "") + '>Thiết kế website</option><option value="other"' + (nhuCau === "other" ? " selected" : "") + ">Khác</option></select></label>" +
                '<label>Ghi chú (không bắt buộc)<textarea name="note" rows="2" maxlength="1000"></textarea></label>' +
                '<p class="wc-loi" role="alert" hidden></p><div class="wc-form-nut"><button type="button" class="wc-lk" data-wc="huy">Để sau</button><button type="submit" class="wc-chinh">Gửi thông tin</button></div></form>';
        }
        vungTin.innerHTML = html;
        vungTin.scrollTop = vungTin.scrollHeight;
    }

    function moDong(mo) {
        khung.hidden = !mo;
        nut.setAttribute("aria-expanded", mo ? "true" : "false");
        goc.classList.toggle("is-mo", mo);
        if (mo) { ve(); setTimeout(function () { o.focus(); }, 50); }
        else nut.focus();
    }

    function goi(body) {
        return fetch(API, { method: "POST", headers: { "Content-Type": "application/json" }, credentials: "same-origin", body: JSON.stringify(body) })
            .then(function (r) { return r.json().catch(function () { return {}; }).then(function (j) { if (!r.ok) throw new Error(j.error || "Trợ lý đang bận. Bạn nhắn fanpage WEA Soft hoặc gọi 079 965 7558 nhé."); return j; }); });
    }

    function hoi(cau) {
        cau = String(cau || "").trim();
        if (!cau || dangGui) return;
        log.push({ r: "user", t: cau });
        dangGui = true;
        luu(); ve();
        goi({ action: "ask", vid: vid, page: location.pathname, message: cau }).then(function (j) {
            if (j.vid && /^[a-f0-9]{32}$/.test(j.vid)) { vid = j.vid; store.set("weaChatVid", vid); }
            log.push({ r: "bot", t: j.reply || "" });
            if (j.need && j.need !== "other") nhuCau = j.need;
            if (j.askContact) hienForm = true;
        }).catch(function (e) {
            log.push({ r: "bot", t: e.message });
        }).then(function () { dangGui = false; luu(); ve(); });
    }

    nut.addEventListener("click", function () { moDong(khung.hidden); });
    goc.addEventListener("click", function (e) {
        var b = e.target.closest("[data-wc], .wc-dong");
        if (!b) return;
        if (b.classList.contains("wc-dong")) moDong(false);
        else if (b.dataset.wc === "hoi") hoi(b.textContent);
        else if (b.dataset.wc === "form") { hienForm = true; ve(); var f = vungTin.querySelector(".wc-form input"); if (f) f.focus(); }
        else if (b.dataset.wc === "huy") { hienForm = false; ve(); }
    });
    form.addEventListener("submit", function (e) { e.preventDefault(); var v = o.value; o.value = ""; o.style.height = ""; hoi(v); });
    o.addEventListener("keydown", function (e) { if (e.key === "Enter" && !e.shiftKey && !e.isComposing) { e.preventDefault(); form.requestSubmit ? form.requestSubmit() : form.dispatchEvent(new Event("submit")); } });
    o.addEventListener("input", function () { o.style.height = ""; o.style.height = Math.min(o.scrollHeight, 110) + "px"; });
    document.addEventListener("keydown", function (e) { if (e.key === "Escape" && !khung.hidden) moDong(false); });

    // Form để lại liên hệ: kiểm nhanh ở trình duyệt, máy chủ kiểm lại
    vungTin.addEventListener("submit", function (e) {
        var f = e.target.closest(".wc-form");
        if (!f) return;
        e.preventDefault();
        var loi = f.querySelector(".wc-loi"), btn = f.querySelector(".wc-chinh");
        var d = { action: "lead", vid: vid, name: f.name.value.trim(), contact: f.contact.value.trim(), need: f.need.value, note: f.note.value.trim() };
        var so = d.contact.replace(/\D/g, "");
        var baoLoi = function (msg, o2) { loi.textContent = msg; loi.hidden = false; if (o2) o2.focus(); };
        if (!d.name) return baoLoi("Bạn cho WEA biết tên nhé.", f.name);
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(d.contact) && (so.length < 9 || so.length > 12)) return baoLoi("Hãy nhập số điện thoại / Zalo (9–12 số) hoặc email đúng dạng.", f.contact);
        btn.disabled = true; btn.textContent = "Đang gửi…";
        goi(d).then(function (j) {
            hienForm = false;
            log.push({ r: "bot", t: j.message || "Cảm ơn bạn! Đội ngũ WEA sẽ liên hệ sớm." });
            luu(); ve();
        }).catch(function (err) { btn.disabled = false; btn.textContent = "Gửi thông tin"; baoLoi(err.message); });
    });
    // Đoán nhu cầu theo trang đang xem để chọn sẵn ô "Bạn quan tâm"
    nhuCau = /thiet-ke-website|website/.test(location.pathname) ? "website" : /giai-phap|tinh-nang/.test(location.pathname) ? "wea_task" : "other";
})();
