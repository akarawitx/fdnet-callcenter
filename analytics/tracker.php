<?php
/**
 * analytics/tracker.php
 * รับข้อมูล pageview จาก JS แล้วบันทึกลง SQLite
 */

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
    exit;
}

$raw  = file_get_contents('php://input');
$data = json_decode($raw, true);

if (!$data) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid JSON']);
    exit;
}

$page     = isset($data['page'])     ? substr(strip_tags($data['page']),     0, 500) : '';
$title    = isset($data['title'])    ? substr(strip_tags($data['title']),    0, 300) : '';
$referrer = isset($data['referrer']) ? substr(strip_tags($data['referrer']), 0, 500) : '';
$ua       = $_SERVER['HTTP_USER_AGENT'] ?? '';
$ip_raw   = $_SERVER['REMOTE_ADDR']     ?? '';

// Hash IP รายวัน (ไม่เก็บ IP จริง)
$ip_hash = substr(hash('sha256', $ip_raw . date('Y-m-d')), 0, 16);

// กรอง Bot
$bot_patterns = ['bot','crawl','spider','slurp','mediapartners','curl','wget','python','java'];
$ua_lower = strtolower($ua);
foreach ($bot_patterns as $p) {
    if (str_contains($ua_lower, $p)) {
        echo json_encode(['ok' => true, 'skipped' => 'bot']);
        exit;
    }
}

// แยก device
$device = 'desktop';
if (preg_match('/Mobile|Android|iPhone/i', $ua)) $device = 'mobile';
elseif (preg_match('/iPad|Tablet/i', $ua))        $device = 'tablet';

// แยก browser
$browser = 'Other';
$ua_lower_b = strtolower($ua);
if (str_contains($ua_lower_b, 'edg'))      $browser = 'Edge';
elseif (str_contains($ua_lower_b, 'chrome'))   $browser = 'Chrome';
elseif (str_contains($ua_lower_b, 'firefox'))  $browser = 'Firefox';
elseif (str_contains($ua_lower_b, 'safari'))   $browser = 'Safari';
elseif (str_contains($ua_lower_b, 'opr'))      $browser = 'Opera';

$db_path = __DIR__ . '/pageviews.db';

try {
    $db = new PDO('sqlite:' . $db_path);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
        );
        CREATE INDEX IF NOT EXISTS idx_date    ON pageviews(date);
        CREATE INDEX IF NOT EXISTS idx_page    ON pageviews(page);
        CREATE INDEX IF NOT EXISTS idx_ip_date ON pageviews(ip_hash, date);
    ");

    $now = new DateTime('now', new DateTimeZone('Asia/Bangkok'));

    $stmt = $db->prepare("
        INSERT INTO pageviews (ts, date, hour, page, title, referrer, ip_hash, device, browser)
        VALUES (:ts,:date,:hour,:page,:title,:referrer,:ip_hash,:device,:browser)
    ");
    $stmt->execute([
        ':ts'       => $now->format('Y-m-d H:i:s'),
        ':date'     => $now->format('Y-m-d'),
        ':hour'     => (int)$now->format('H'),
        ':page'     => $page,
        ':title'    => $title,
        ':referrer' => $referrer,
        ':ip_hash'  => $ip_hash,
        ':device'   => $device,
        ':browser'  => $browser,
    ]);

    echo json_encode(['ok' => true]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}