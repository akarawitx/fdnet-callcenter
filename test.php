<?php
/**
 * test_server.php
 * วางไฟล์นี้ไว้ที่ root ของโปรเจกต์ เช่น \\vm14\itdiv\makarawit-services\test_server.php
 * เข้าผ่าน http://vm14/itdiv/makarawit-services/test_server.php
 * 
 * ไฟล์นี้ทดสอบว่า vm14 รองรับอะไรบ้างสำหรับระบบ Analytics
 * ลบออกหลังทดสอบเสร็จแล้ว
 */

// ไม่ให้แสดงผลแบบ cache
header('Cache-Control: no-store, no-cache');
header('Content-Type: text/html; charset=utf-8');

// ============================================================
// Helper
// ============================================================
function check(string $label, bool $pass, string $detail = ''): string
{
    $icon  = $pass ? '✅' : '❌';
    $color = $pass ? '#166534' : '#991b1b';
    $bg    = $pass ? '#f0fdf4' : '#fef2f2';
    $border = $pass ? '#bbf7d0' : '#fecaca';
    return '
    <div style="display:flex;align-items:flex-start;gap:12px;
                padding:12px 16px;border-radius:10px;margin-bottom:8px;
                background:' . $bg . ';border:1px solid ' . $border . '">
      <span style="font-size:1.1rem;flex-shrink:0">' . $icon . '</span>
      <div style="flex:1">
        <div style="font-weight:600;font-size:.9rem;color:' . $color . '">' . $label . '</div>
        ' . ($detail ? '<div style="font-size:.8rem;color:#6b7280;margin-top:3px;font-family:monospace">' . htmlspecialchars($detail) . '</div>' : '') . '
      </div>
    </div>';
}

function section(string $title): string
{
    return '<h2 style="font-size:1rem;font-weight:600;color:#1e293b;
                margin:28px 0 12px;padding-bottom:8px;
                border-bottom:2px solid #e2e8f0">' . $title . '</h2>';
}

// ============================================================
// ทดสอบ SQLite
// ============================================================
$sqlite_ok  = false;
$sqlite_msg = '';
$sqlite_write_ok = false;
$sqlite_write_msg = '';

if (extension_loaded('pdo_sqlite') || extension_loaded('sqlite3')) {
    $sqlite_ok = true;
    $sqlite_msg = 'extension: ' . (extension_loaded('pdo_sqlite') ? 'PDO_SQLite' : '') .
                  (extension_loaded('sqlite3') ? ' SQLite3' : '');

    // ทดสอบสร้างไฟล์ .db จริง
    $db_path = __DIR__ . '/analytics_test.db';
    try {
        $pdo = new PDO('sqlite:' . $db_path);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec('CREATE TABLE IF NOT EXISTS t (id INTEGER PRIMARY KEY, val TEXT)');
        $pdo->exec("INSERT INTO t (val) VALUES ('hello')");
        $row = $pdo->query('SELECT val FROM t LIMIT 1')->fetch();
        if ($row['val'] === 'hello') {
            $sqlite_write_ok  = true;
            $sqlite_write_msg = 'สร้างไฟล์ + อ่าน/เขียนได้: ' . $db_path;
        }
        $pdo->exec('DROP TABLE t');
        unset($pdo);
        @unlink($db_path);
    } catch (Exception $e) {
        $sqlite_write_msg = 'ไม่สามารถเขียนไฟล์: ' . $e->getMessage();
    }
} else {
    $sqlite_msg = 'ไม่มี extension pdo_sqlite / sqlite3';
}

// ============================================================
// ทดสอบเขียนไฟล์
// ============================================================
$write_dir  = __DIR__ . '/analytics';
$write_ok   = false;
$write_msg  = '';

if (!is_dir($write_dir)) {
    @mkdir($write_dir, 0755, true);
}
if (is_dir($write_dir) && is_writable($write_dir)) {
    $test_file = $write_dir . '/_write_test.txt';
    if (file_put_contents($test_file, 'ok') !== false) {
        $write_ok  = true;
        $write_msg = 'สร้าง folder analytics/ และเขียนไฟล์ได้: ' . $write_dir;
        @unlink($test_file);
    } else {
        $write_msg = 'mkdir สำเร็จ แต่ file_put_contents ล้มเหลว';
    }
} else {
    $write_msg = 'ไม่สามารถสร้างหรือเขียนใน: ' . $write_dir;
}

// ============================================================
// JSON file fallback (ถ้าไม่มี SQLite)
// ============================================================
$json_ok  = false;
$json_msg = '';
$json_file = __DIR__ . '/analytics/_test_log.json';

$log_entry = ['ts' => date('c'), 'page' => 'test', 'ip' => $_SERVER['REMOTE_ADDR'] ?? ''];
if (file_put_contents($json_file, json_encode($log_entry) . "\n", FILE_APPEND | LOCK_EX) !== false) {
    $json_ok  = true;
    $json_msg = 'เขียน JSON log ได้: ' . $json_file;
    @unlink($json_file);
} else {
    $json_msg = 'ไม่สามารถเขียน JSON log ใน analytics/';
}

// ============================================================
// ข้อมูล PHP / Server
// ============================================================
$php_version = PHP_VERSION;
$php_ok      = version_compare($php_version, '7.4', '>=');
$extensions  = get_loaded_extensions();
sort($extensions);

$server_info = [
    'SERVER_SOFTWARE' => $_SERVER['SERVER_SOFTWARE'] ?? 'ไม่ทราบ',
    'SERVER_NAME'     => $_SERVER['SERVER_NAME']     ?? 'ไม่ทราบ',
    'DOCUMENT_ROOT'   => $_SERVER['DOCUMENT_ROOT']   ?? 'ไม่ทราบ',
    'SCRIPT_FILENAME' => $_SERVER['SCRIPT_FILENAME'] ?? 'ไม่ทราบ',
    'HTTP_HOST'       => $_SERVER['HTTP_HOST']       ?? 'ไม่ทราบ',
    'REMOTE_ADDR'     => $_SERVER['REMOTE_ADDR']     ?? 'ไม่ทราบ',
];

// ============================================================
// สรุปผล: รองรับ analytics แบบไหน?
// ============================================================
$method = '';
if ($sqlite_write_ok && $write_ok) {
    $method = 'SQLite (แนะนำ) — เก็บข้อมูลใน .db file สะดวกและรวดเร็ว';
} elseif ($write_ok && $json_ok) {
    $method = 'JSON Log File — เขียนข้อมูลเป็น .json ทีละบรรทัด (ง่าย แต่ช้ากว่า)';
} else {
    $method = '❌ ยังไม่พบวิธีที่ใช้ได้ — ต้องตรวจสอบ permission บนเซิร์ฟเวอร์';
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Server Test — Analytics Readiness</title>
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  body {
    font-family: 'IBM Plex Sans', 'Prompt', sans-serif;
    background: #f5f8fc;
    color: #1e2c3a;
    padding: 32px 24px;
    max-width: 780px;
    margin: 0 auto;
  }
  .header {
    background: linear-gradient(135deg, #1e3a5f, #2563eb);
    color: white;
    border-radius: 14px;
    padding: 24px 28px;
    margin-bottom: 28px;
  }
  .header h1 { font-size: 1.3rem; font-weight: 700; margin-bottom: 4px; }
  .header p  { font-size: .85rem; opacity: .8; }
  .card {
    background: white;
    border: 1px solid #dde8f2;
    border-radius: 14px;
    padding: 24px;
    margin-bottom: 20px;
    box-shadow: 0 1px 4px rgba(0,0,0,.05);
  }
  .summary-box {
    background: #eff6ff;
    border: 2px solid #3b82f6;
    border-radius: 12px;
    padding: 20px 24px;
    margin-bottom: 28px;
  }
  .summary-box .label { font-size:.75rem;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:#1d4ed8;margin-bottom:6px; }
  .summary-box .value { font-size:1rem;font-weight:600;color:#1e3a8a;line-height:1.6; }
  table { width:100%;border-collapse:collapse;font-size:.82rem; }
  th { padding:8px 12px;text-align:left;background:#f1f5f9;font-weight:600;color:#475569; }
  td { padding:8px 12px;border-bottom:1px solid #f1f5f9;font-family:monospace;color:#334155; }
  tr:last-child td { border-bottom: none; }
  .ext-list {
    display:flex;flex-wrap:wrap;gap:6px;margin-top:8px;
  }
  .ext-pill {
    background:#f0fdf4;border:1px solid #bbf7d0;color:#166534;
    font-size:.72rem;padding:2px 10px;border-radius:20px;font-family:monospace;
  }
  .ext-pill.highlight {
    background:#dbeafe;border-color:#93c5fd;color:#1e40af;font-weight:700;
  }
</style>
</head>
<body>

<div class="header">
  <h1>🔬 Server Capability Test</h1>
  <p>ทดสอบว่า vm14 รองรับระบบ Analytics ด้วยตัวเองได้หรือไม่</p>
  <p style="margin-top:6px;opacity:.7;font-size:.78rem">
    เวลา: <?= date('d/m/Y H:i:s') ?> | PHP <?= $php_version ?>
  </p>
</div>

<!-- สรุป -->
<div class="summary-box">
  <div class="label">วิธีที่แนะนำสำหรับเซิร์ฟเวอร์นี้</div>
  <div class="value"><?= htmlspecialchars($method) ?></div>
</div>

<div class="card">
  <?= section('1. PHP Version') ?>
  <?= check('PHP ' . $php_version . ' (' . ($php_ok ? 'รองรับ' : 'เวอร์ชันเก่าเกินไป') . ')', $php_ok, 'ต้องการ PHP 7.4+') ?>

  <?= section('2. SQLite Extension') ?>
  <?= check('SQLite Extension โหลดได้', $sqlite_ok, $sqlite_msg) ?>
  <?= check('SQLite เขียน/อ่านไฟล์ .db ได้จริง', $sqlite_write_ok, $sqlite_write_msg) ?>

  <?= section('3. File System (เขียนไฟล์)') ?>
  <?= check('สร้าง folder analytics/ ได้', $write_ok, $write_msg) ?>
  <?= check('เขียน JSON log ได้ (fallback)', $json_ok, $json_msg) ?>

  <?= section('4. Server Info') ?>
  <table>
    <tr><th>Key</th><th>Value</th></tr>
    <?php foreach ($server_info as $k => $v): ?>
    <tr><td><?= $k ?></td><td><?= htmlspecialchars($v) ?></td></tr>
    <?php endforeach; ?>
  </table>

  <?= section('5. PHP Extensions ที่โหลดอยู่') ?>
  <p style="font-size:.82rem;color:#64748b;margin-bottom:8px">
    Extensions ที่สำคัญสำหรับระบบ Analytics จะแสดงเป็นสีน้ำเงิน
  </p>
  <div class="ext-list">
    <?php
    $important = ['pdo', 'pdo_sqlite', 'sqlite3', 'json', 'mbstring', 'curl', 'openssl', 'fileinfo'];
    foreach ($extensions as $ext):
      $hi = in_array(strtolower($ext), $important) ? ' highlight' : '';
    ?>
    <span class="ext-pill<?= $hi ?>"><?= htmlspecialchars($ext) ?></span>
    <?php endforeach; ?>
  </div>
</div>

<!-- คำแนะนำขั้นต่อไป -->
<div class="card" style="border-color:#fbbf24;background:#fffbeb">
  <h2 style="font-size:1rem;font-weight:600;color:#92400e;margin-bottom:12px">
    📋 ขั้นตอนต่อไป (อ่านผลแล้วบอก Claude)
  </h2>
  <ol style="font-size:.87rem;color:#78350f;line-height:2;padding-left:20px">
    <li>Screenshot หน้านี้หรือแจ้งผล ✅/❌ ของแต่ละข้อ</li>
    <li>ถ้า SQLite ✅ → จะสร้างระบบ Analytics แบบ SQLite (สมบูรณ์ที่สุด)</li>
    <li>ถ้า SQLite ❌ แต่ JSON ✅ → จะสร้างแบบ JSON Log File (เบากว่า)</li>
    <li>ถ้าทั้งคู่ ❌ → ต้องแก้ permission บนเซิร์ฟเวอร์ก่อน</li>
    <li><strong>ลบไฟล์นี้ออกหลังทดสอบเสร็จ</strong> เพราะแสดงข้อมูล server</li>
  </ol>
</div>

<p style="font-size:.75rem;color:#94a3b8;text-align:center;margin-top:16px">
  test_server.php — ลบไฟล์นี้ออกหลังใช้งาน
</p>

</body>
</html>