<?php

date_default_timezone_set('Asia/Bangkok');

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(array('error' => 'Method Not Allowed'));
    exit;
}

$raw  = file_get_contents('php://input');
$data = json_decode($raw, true);

if (!$data) {
    http_response_code(400);
    echo json_encode(array('error' => 'Invalid JSON'));
    exit;
}

$page     = isset($data['page'])     ? substr(strip_tags($data['page']),     0, 500) : '';
$title    = isset($data['title'])    ? substr(strip_tags($data['title']),    0, 300) : '';
$referrer = isset($data['referrer']) ? substr(strip_tags($data['referrer']), 0, 500) : '';
$ua       = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
$ip_raw   = isset($_SERVER['REMOTE_ADDR'])     ? $_SERVER['REMOTE_ADDR']     : '';

$ip_hash  = substr(hash('sha256', $ip_raw . date('Y-m-d')), 0, 16);

// กรอง Bot
$bot_patterns = array('bot','crawl','spider','slurp','mediapartners','curl','wget','python','java');
$ua_lower = strtolower($ua);
foreach ($bot_patterns as $p) {
    if (strpos($ua_lower, $p) !== false) {
        echo json_encode(array('ok' => true, 'skipped' => 'bot'));
        exit;
    }
}

// แยก device
$device = 'desktop';
if      (preg_match('/Mobile|Android|iPhone/i', $ua)) $device = 'mobile';
elseif  (preg_match('/iPad|Tablet/i', $ua))           $device = 'tablet';

// แยก browser
$browser    = 'Other';
$ua_lower_b = strtolower($ua);
if      (strpos($ua_lower_b, 'edg')     !== false) $browser = 'Edge';
elseif  (strpos($ua_lower_b, 'chrome')  !== false) $browser = 'Chrome';
elseif  (strpos($ua_lower_b, 'firefox') !== false) $browser = 'Firefox';
elseif  (strpos($ua_lower_b, 'safari')  !== false) $browser = 'Safari';
elseif  (strpos($ua_lower_b, 'opr')     !== false) $browser = 'Opera';

// วันเวลา — แก้จุดที่ 1
$ts   = date('Y-m-d H:i:s');
$date = date('Y-m-d');
$hour = (int)date('H');

$db_path = __DIR__ . '/pageviews.db';

try {
    $db = new PDO('sqlite:' . $db_path);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // แก้จุดที่ 3 — แยก exec ทีละ statement
    $db->exec("
        CREATE TABLE IF NOT EXISTS pageviews (
            id       INTEGER PRIMARY KEY AUTOINCREMENT,
            ts       TEXT NOT NULL,
            date     TEXT NOT NULL,
            hour     INTEGER NOT NULL,
            page     TEXT NOT NULL,
            title    TEXT,
            referrer TEXT,
            ip_hash  TEXT,
            device   TEXT,
            browser  TEXT
        )
    ");
    $db->exec("CREATE INDEX IF NOT EXISTS idx_date    ON pageviews(date)");
    $db->exec("CREATE INDEX IF NOT EXISTS idx_page    ON pageviews(page)");
    $db->exec("CREATE INDEX IF NOT EXISTS idx_ip_date ON pageviews(ip_hash, date)");

    $stmt = $db->prepare("
        INSERT INTO pageviews (ts, date, hour, page, title, referrer, ip_hash, device, browser)
        VALUES (:ts, :date, :hour, :page, :title, :referrer, :ip_hash, :device, :browser)
    ");

    // แก้จุดที่ 2 — ใช้ array() แทน []
    $stmt->execute(array(
        ':ts'       => $ts,
        ':date'     => $date,
        ':hour'     => $hour,
        ':page'     => $page,
        ':title'    => $title,
        ':referrer' => $referrer,
        ':ip_hash'  => $ip_hash,
        ':device'   => $device,
        ':browser'  => $browser,
    ));

    echo json_encode(array('ok' => true));

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(array('error' => $e->getMessage()));
}