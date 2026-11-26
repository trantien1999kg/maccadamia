<?php
/* Cầu nối chatbot AI: trình duyệt → file này (cùng tên miền weasoft.vn, không cần CORS) → app.weasoft.vn/api/site_chat.php
   kèm khóa chung (config 'wea_chat' 'key', phải trùng config 'site_chat' 'key' bên app) + IP thật của khách để app giới hạn đúng người.
   Chỉ chuyển các trường đã biết; câu trả lời / lưu hội thoại / giới hạn tần suất do app quyết định. */
defined('_lib') ?: define('_lib', __DIR__ . '/../libraries/');
require_once _lib . 'config.php';

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');
header('X-Robots-Tag: noindex, nofollow');

function weaChatTraVe($data, $ma = 200)
{
    http_response_code($ma);
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit;
}

$loiChung = 'Trợ lý đang bận. Bạn nhắn fanpage WEA Soft hoặc gọi 079 965 7558 nhé.';
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') weaChatTraVe(array('error' => 'Chỉ nhận POST.'), 405);

// Chỉ nhận từ chính website (trang khác không mượn được chatbot để đốt token)
$nguon = (string)($_SERVER['HTTP_ORIGIN'] ?? '');
$tenMien = preg_replace('/:\d+$/', '', (string)($_SERVER['HTTP_HOST'] ?? ''));
if ($nguon !== '' && strtolower((string)parse_url($nguon, PHP_URL_HOST)) !== strtolower($tenMien)) weaChatTraVe(array('error' => 'Yêu cầu không hợp lệ.'), 403);

$cauHinh = isset($config['wea_chat']) && is_array($config['wea_chat']) ? $config['wea_chat'] : array();
if (empty($cauHinh['url']) || empty($cauHinh['key'])) weaChatTraVe(array('error' => 'Trợ lý chưa được bật. Bạn nhắn fanpage WEA Soft hoặc gọi 079 965 7558 nhé.'), 503);

$tho = (string)file_get_contents('php://input');
if (strlen($tho) > 4000) weaChatTraVe(array('error' => 'Nội dung quá dài.'), 413);
$vao = json_decode($tho, true);
if (!is_array($vao)) weaChatTraVe(array('error' => 'Yêu cầu không hợp lệ.'), 400);

$hanhDong = (string)($vao['action'] ?? '');
if ($hanhDong === 'ask') {
    $gui = array('action' => 'ask', 'vid' => (string)($vao['vid'] ?? ''), 'page' => mb_substr((string)($vao['page'] ?? ''), 0, 190), 'message' => (string)($vao['message'] ?? ''));
} elseif ($hanhDong === 'lead') {
    $gui = array('action' => 'lead', 'vid' => (string)($vao['vid'] ?? ''), 'name' => (string)($vao['name'] ?? ''), 'contact' => (string)($vao['contact'] ?? ''),
        'need' => (string)($vao['need'] ?? ''), 'note' => (string)($vao['note'] ?? ''));
} else {
    weaChatTraVe(array('error' => 'Yêu cầu không hợp lệ.'), 400);
}

$ch = curl_init((string)$cauHinh['url']);
curl_setopt_array($ch, array(
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($gui, JSON_UNESCAPED_UNICODE),
    CURLOPT_HTTPHEADER => array('Content-Type: application/json', 'X-Site-Key: ' . $cauHinh['key'], 'X-Visitor-Ip: ' . (string)($_SERVER['REMOTE_ADDR'] ?? '')),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 35,
    CURLOPT_CONNECTTIMEOUT => 8,
));
$traLoi = curl_exec($ch);
$maHttp = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
$loiCurl = curl_error($ch);
curl_close($ch);

$json = is_string($traLoi) ? json_decode($traLoi, true) : null;
if (!is_array($json)) {
    error_log('wea_chat: ' . $maHttp . ' ' . $loiCurl);
    weaChatTraVe(array('error' => $loiChung), 502);
}
// Lỗi khóa chung (cấu hình 2 bên lệch) không nói chi tiết cho khách
if ($maHttp === 403) {
    error_log('wea_chat: app từ chối khóa (kiểm tra wea_chat.key trùng site_chat.key)');
    weaChatTraVe(array('error' => $loiChung), 502);
}
weaChatTraVe($json, $maHttp ?: 502);
