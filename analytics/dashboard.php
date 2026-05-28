<?php
/**
 * analytics/dashboard.php
 * หน้าแดชบอร์ดดูสถิติการเข้าชม
 * เข้าถึงได้ที่ http://vm14/itdiv/makarawit-services/analytics/dashboard.php
 *
 * !! ควรเพิ่ม password หรือ IP whitelist ก่อน deploy จริง !!
 */

// ============================================================
// Basic password protect — เปลี่ยน password ตรงนี้
// ============================================================
define('DASH_PASSWORD', 'fdnet4141');   // <-- เปลี่ยนก่อนใช้งาน

session_start();
$auth_error = '';

if (!isset($_SESSION['analytics_auth'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pw'])) {
        if ($_POST['pw'] === DASH_PASSWORD) {
            $_SESSION['analytics_auth'] = true;
        } else {
            $auth_error = 'รหัสผ่านไม่ถูกต้อง';
        }
    }
    if (!isset($_SESSION['analytics_auth'])) {
        // แสดงหน้า login
        ?><!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Analytics Login</title>
<style>
  body { font-family:'IBM Plex Sans',sans-serif;background:#f5f8fc;display:flex;
         align-items:center;justify-content:center;min-height:100vh;margin:0; }
  .box { background:#fff;border:1px solid #dde8f2;border-radius:14px;padding:36px 40px;
         width:100%;max-width:360px;box-shadow:0 4px 20px rgba(0,0,0,.08); }
  h1 { font-size:1.1rem;font-weight:600;color:#1e2c3a;margin-bottom:4px; }
  p  { font-size:.82rem;color:#64748b;margin-bottom:24px; }
  input[type=password] {
    width:100%;padding:10px 14px;border:1px solid #dde8f2;border-radius:8px;
    font-size:.9rem;font-family:inherit;outline:none;box-sizing:border-box;
  }
  input[type=password]:focus { border-color:#4a90b8;box-shadow:0 0 0 3px rgba(74,144,184,.15); }
  button {
    width:100%;margin-top:12px;padding:11px;background:#4a90b8;color:#fff;
    border:none;border-radius:8px;font-size:.9rem;font-weight:600;
    font-family:inherit;cursor:pointer;
  }
  button:hover { background:#2e6f96; }
  .err { color:#dc2626;font-size:.82rem;margin-top:8px; }
</style>
</head>
<body>
<div class="box">
  <h1>🔐 Analytics Dashboard</h1>
  <p>กองบริหารสารสนเทศ — สถิติการเข้าชม</p>
  <form method="POST">
    <input type="password" name="pw" placeholder="รหัสผ่าน" autofocus>
    <?php if ($auth_error): ?>
      <div class="err"><?= htmlspecialchars($auth_error) ?></div>
    <?php endif; ?>
    <button type="submit">เข้าสู่ระบบ</button>
  </form>
</div>
</body>
</html>
        <?php
        exit;
    }
}

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: dashboard.php');
    exit;
}

// ============================================================
// เชื่อม SQLite
// ============================================================
$db_path = __DIR__ . '/pageviews.db';
$db = null;
$db_error = '';

if (!file_exists($db_path)) {
    $db_error = 'ยังไม่มีข้อมูล (pageviews.db ยังไม่ถูกสร้าง — รอให้มีคนเข้าเว็บก่อน)';
} else {
    try {
        $db = new PDO('sqlite:' . $db_path);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $db_error = $e->getMessage();
    }
}

// ============================================================
// ช่วงเวลาที่เลือก
// ============================================================
$range = $_GET['range'] ?? '7';   // วัน: 7, 30, 90
$range = in_array($range, ['1','7','30','90']) ? (int)$range : 7;

// ============================================================
// ดึงข้อมูล (ถ้า db พร้อม)
// ============================================================
$total_views = 0;
$unique_visitors = 0;
$top_pages = [];
$hourly = array_fill(0, 24, 0);
$daily  = [];
$devices = [];
$browsers = [];
$recent = [];

if ($db) {
    $since = date('Y-m-d', strtotime("-{$range} days"));

    // รวม pageview ทั้งหมด
    $total_views = (int)$db->query(
        "SELECT COUNT(*) FROM pageviews WHERE date >= '$since'"
    )->fetchColumn();

    // unique visitor (นับจาก ip_hash รายวัน)
    $unique_visitors = (int)$db->query(
        "SELECT COUNT(DISTINCT ip_hash||date) FROM pageviews WHERE date >= '$since'"
    )->fetchColumn();

    // หน้าที่นิยม
    $top_pages = $db->query(
        "SELECT page, title, COUNT(*) as views
         FROM pageviews WHERE date >= '$since'
         GROUP BY page ORDER BY views DESC LIMIT 10"
    )->fetchAll();

    // เข้าชมรายชั่วโมง (7 วันล่าสุด)
    $rows = $db->query(
        "SELECT hour, COUNT(*) as c FROM pageviews
         WHERE date >= '" . date('Y-m-d', strtotime('-7 days')) . "'
         GROUP BY hour"
    )->fetchAll();
    foreach ($rows as $r) $hourly[(int)$r['hour']] = (int)$r['c'];

    // เข้าชมรายวัน
    $rows = $db->query(
        "SELECT date, COUNT(*) as views,
                COUNT(DISTINCT ip_hash) as uniq
         FROM pageviews WHERE date >= '$since'
         GROUP BY date ORDER BY date ASC"
    )->fetchAll();
    // เติมวันที่ไม่มีข้อมูลให้ครบ
    for ($i = $range - 1; $i >= 0; $i--) {
        $d = date('Y-m-d', strtotime("-{$i} days"));
        $daily[$d] = ['views' => 0, 'uniq' => 0];
    }
    foreach ($rows as $r) {
        $daily[$r['date']] = ['views' => (int)$r['views'], 'uniq' => (int)$r['uniq']];
    }

    // อุปกรณ์
    $rows = $db->query(
        "SELECT device, COUNT(*) as c FROM pageviews WHERE date >= '$since' GROUP BY device"
    )->fetchAll();
    foreach ($rows as $r) $devices[$r['device']] = (int)$r['c'];

    // เบราว์เซอร์
    $rows = $db->query(
        "SELECT browser, COUNT(*) as c FROM pageviews WHERE date >= '$since' GROUP BY browser ORDER BY c DESC"
    )->fetchAll();
    foreach ($rows as $r) $browsers[$r['browser']] = (int)$r['c'];

    // ล่าสุด 20 รายการ
    $recent = $db->query(
        "SELECT ts, page, title, device, browser FROM pageviews ORDER BY id DESC LIMIT 20"
    )->fetchAll();
}

// ============================================================
// เตรียมข้อมูลสำหรับกราฟ (JSON)
// ============================================================
$daily_labels = array_map(fn($d) => date('d/m', strtotime($d)), array_keys($daily));
$daily_views  = array_column(array_values($daily), 'views');
$daily_uniq   = array_column(array_values($daily), 'uniq');
$hourly_data  = array_values($hourly);

$dev_labels = array_keys($devices);
$dev_data   = array_values($devices);

$brow_labels = array_keys($browsers);
$brow_data   = array_values($browsers);
?>
<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Analytics Dashboard — กองบริหารสารสนเทศ</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  :root {
    --blue:   #4a90b8;
    --blue-d: #2e6f96;
    --blue-p: #eef6fb;
    --bg:     #f5f8fc;
    --surface:#ffffff;
    --border: #dde8f2;
    --text:   #1e2c3a;
    --muted:  #5a7186;
    --radius: 14px;
    --shadow: 0 1px 4px rgba(0,0,0,.06);
  }
  body { font-family:'IBM Plex Sans','Prompt',sans-serif; background:var(--bg); color:var(--text); }

  /* NAV */
  .top-nav {
    background:var(--blue-d);color:#fff;padding:0 24px;
    display:flex;align-items:center;gap:16px;height:56px;
  }
  .top-nav .logo { font-weight:700;font-size:1rem; }
  .top-nav .sub  { font-size:.78rem;opacity:.75; }
  .top-nav a.logout {
    margin-left:auto;font-size:.8rem;color:rgba(255,255,255,.75);
    border:1px solid rgba(255,255,255,.3);border-radius:6px;padding:4px 12px;
    text-decoration:none;
  }
  .top-nav a.logout:hover { background:rgba(255,255,255,.15); }

  /* LAYOUT */
  .wrap { max-width:1280px;margin:0 auto;padding:28px 24px 48px; }

  /* RANGE PILLS */
  .range-bar { display:flex;gap:8px;margin-bottom:24px;flex-wrap:wrap;align-items:center; }
  .range-bar span { font-size:.82rem;color:var(--muted);margin-right:4px; }
  .range-pill {
    padding:6px 16px;border-radius:20px;font-size:.82rem;font-weight:500;
    border:1.5px solid var(--border);background:var(--surface);color:var(--muted);
    text-decoration:none;transition:all .15s;
  }
  .range-pill:hover, .range-pill.active {
    background:var(--blue);border-color:var(--blue);color:#fff;
  }

  /* STAT CARDS */
  .stat-row { display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:16px;margin-bottom:28px; }
  .stat-card {
    background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);
    padding:20px 22px;box-shadow:var(--shadow);
  }
  .stat-card .label { font-size:.75rem;font-weight:600;text-transform:uppercase;
                       letter-spacing:.06em;color:var(--muted);margin-bottom:8px; }
  .stat-card .value { font-size:2rem;font-weight:700;color:var(--blue-d);line-height:1; }
  .stat-card .sub   { font-size:.75rem;color:var(--muted);margin-top:6px; }

  /* CHARTS */
  .chart-grid { display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:28px; }
  @media(max-width:768px){ .chart-grid { grid-template-columns:1fr; } }
  .chart-card {
    background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);
    padding:20px 22px;box-shadow:var(--shadow);
  }
  .chart-card.full { grid-column:1/-1; }
  .chart-title {
    font-size:.85rem;font-weight:600;color:var(--text);margin-bottom:16px;
    padding-bottom:10px;border-bottom:1px solid var(--border);
    display:flex;align-items:center;gap:6px;
  }
  .chart-wrap { position:relative;height:220px; }

  /* TOP PAGES */
  .section-title {
    font-size:1rem;font-weight:600;color:var(--blue-d);margin-bottom:14px;
    padding-bottom:10px;border-bottom:2px solid var(--blue-p);
    display:flex;align-items:center;gap:8px;
  }
  .section-title::before {
    content:'';display:block;width:4px;height:18px;
    background:var(--blue);border-radius:2px;
  }
  .page-list { display:flex;flex-direction:column;gap:8px; }
  .page-item {
    display:flex;align-items:center;gap:12px;
    background:var(--surface);border:1px solid var(--border);
    border-radius:10px;padding:12px 16px;
  }
  .page-rank {
    width:28px;height:28px;border-radius:50%;background:var(--blue-p);
    color:var(--blue-d);font-size:.78rem;font-weight:700;
    display:flex;align-items:center;justify-content:center;flex-shrink:0;
  }
  .page-info { flex:1;min-width:0; }
  .page-url  { font-size:.82rem;color:var(--blue);white-space:nowrap;overflow:hidden;text-overflow:ellipsis; }
  .page-ttl  { font-size:.78rem;color:var(--muted);margin-top:2px; }
  .page-views { font-size:.85rem;font-weight:700;color:var(--text);white-space:nowrap; }
  .page-bar-wrap { width:80px;height:6px;background:#e2e8f0;border-radius:3px;flex-shrink:0; }
  .page-bar { height:100%;background:var(--blue);border-radius:3px; }

  /* RECENT */
  .recent-table { width:100%;border-collapse:collapse;font-size:.82rem; }
  .recent-table th {
    text-align:left;padding:10px 12px;background:var(--blue-p);
    color:var(--blue-d);font-weight:600;border-bottom:1px solid var(--border);
  }
  .recent-table td { padding:9px 12px;border-bottom:1px solid #f1f5f9;color:var(--text); }
  .recent-table tr:last-child td { border-bottom:none; }
  .recent-table tr:hover td { background:#f8fafc; }

  /* badges */
  .badge {
    display:inline-block;padding:2px 8px;border-radius:20px;font-size:.7rem;font-weight:600;
  }
  .badge-desktop { background:#eff6ff;color:#1d4ed8; }
  .badge-mobile  { background:#fef3c7;color:#92400e; }
  .badge-tablet  { background:#f0fdf4;color:#166534; }

  /* error */
  .db-error {
    background:#fef2f2;border:1px solid #fecaca;border-radius:12px;
    padding:20px 24px;color:#991b1b;font-size:.88rem;margin-bottom:24px;
  }

  .two-col { display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:28px; }
  @media(max-width:768px){ .two-col { grid-template-columns:1fr; } }
  .card-plain {
    background:var(--surface);border:1px solid var(--border);
    border-radius:var(--radius);padding:20px 22px;box-shadow:var(--shadow);
  }
</style>
</head>
<body>

<!-- NAV -->
<nav class="top-nav">
  <div>
    <div class="logo">📊 Analytics Dashboard</div>
    <div class="sub">กองบริหารสารสนเทศ — FD-net Callcenter 4141</div>
  </div>
  <a href="?logout=1" class="logout">ออกจากระบบ</a>
</nav>

<div class="wrap">

  <!-- RANGE -->
  <div class="range-bar">
    <span>ช่วงเวลา:</span>
    <?php foreach ([1=>'วันนี้',7=>'7 วัน',30=>'30 วัน',90=>'90 วัน'] as $v => $l): ?>
      <a href="?range=<?= $v ?>" class="range-pill <?= $range==$v?'active':'' ?>"><?= $l ?></a>
    <?php endforeach; ?>
  </div>

  <?php if ($db_error): ?>
    <div class="db-error">⚠️ <?= htmlspecialchars($db_error) ?></div>
  <?php endif; ?>

  <!-- STAT CARDS -->
  <div class="stat-row">
    <div class="stat-card">
      <div class="label">การเข้าชมทั้งหมด</div>
      <div class="value"><?= number_format($total_views) ?></div>
      <div class="sub"><?= $range ?> วันที่ผ่านมา</div>
    </div>
    <div class="stat-card">
      <div class="label">ผู้เข้าชมไม่ซ้ำ (รายวัน)</div>
      <div class="value"><?= number_format($unique_visitors) ?></div>
      <div class="sub">นับจาก IP hash รายวัน</div>
    </div>
    <div class="stat-card">
      <div class="label">เฉลี่ยต่อวัน</div>
      <div class="value"><?= $range > 0 ? number_format($total_views/$range,1) : 0 ?></div>
      <div class="sub">pageview / วัน</div>
    </div>
    <div class="stat-card">
      <div class="label">หน้าที่เข้าชม</div>
      <div class="value"><?= count($top_pages) ?></div>
      <div class="sub">หน้าที่มีข้อมูล (top 10)</div>
    </div>
  </div>

  <!-- CHARTS ROW 1: Daily line -->
  <div class="chart-grid">
    <div class="chart-card full">
      <div class="chart-title">📈 การเข้าชมรายวัน (<?= $range ?> วัน)</div>
      <div class="chart-wrap">
        <canvas id="dailyChart"></canvas>
      </div>
    </div>
  </div>

  <!-- CHARTS ROW 2: Hourly + Device + Browser -->
  <div class="chart-grid">
    <div class="chart-card">
      <div class="chart-title">🕐 รายชั่วโมง (7 วันล่าสุด)</div>
      <div class="chart-wrap"><canvas id="hourlyChart"></canvas></div>
    </div>
    <div class="chart-card">
      <div class="chart-title">📱 อุปกรณ์</div>
      <div class="chart-wrap"><canvas id="deviceChart"></canvas></div>
    </div>
  </div>

  <div class="chart-grid">
    <div class="chart-card full">
      <div class="chart-title">🌐 เบราว์เซอร์</div>
      <div class="chart-wrap" style="height:160px"><canvas id="browserChart"></canvas></div>
    </div>
  </div>

  <!-- TOP PAGES -->
  <div style="margin-bottom:28px">
    <div class="section-title">หน้าที่ถูกเข้าชมมากที่สุด</div>
    <?php if (empty($top_pages)): ?>
      <p style="color:var(--muted);font-size:.85rem">ยังไม่มีข้อมูล</p>
    <?php else: ?>
      <?php $max_views = $top_pages[0]['views'] ?? 1; ?>
      <div class="page-list">
        <?php foreach ($top_pages as $i => $p): ?>
        <div class="page-item">
          <div class="page-rank"><?= $i+1 ?></div>
          <div class="page-info">
            <div class="page-url"><?= htmlspecialchars($p['page']) ?></div>
            <?php if ($p['title']): ?>
              <div class="page-ttl"><?= htmlspecialchars($p['title']) ?></div>
            <?php endif; ?>
          </div>
          <div class="page-bar-wrap">
            <div class="page-bar" style="width:<?= round($p['views']/$max_views*100) ?>%"></div>
          </div>
          <div class="page-views"><?= number_format($p['views']) ?> ครั้ง</div>
        </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>

  <!-- RECENT -->
  <div>
    <div class="section-title">การเข้าชมล่าสุด 20 รายการ</div>
    <?php if (empty($recent)): ?>
      <p style="color:var(--muted);font-size:.85rem">ยังไม่มีข้อมูล</p>
    <?php else: ?>
    <div style="overflow-x:auto;border:1px solid var(--border);border-radius:12px;">
      <table class="recent-table">
        <thead>
          <tr>
            <th>เวลา</th>
            <th>หน้า</th>
            <th>หัวข้อ</th>
            <th>อุปกรณ์</th>
            <th>เบราว์เซอร์</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($recent as $r): ?>
          <tr>
            <td style="white-space:nowrap;color:var(--muted)"><?= htmlspecialchars($r['ts']) ?></td>
            <td style="max-width:260px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">
              <?= htmlspecialchars($r['page']) ?>
            </td>
            <td style="max-width:180px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;color:var(--muted)">
              <?= htmlspecialchars($r['title'] ?? '') ?>
            </td>
            <td>
              <span class="badge badge-<?= $r['device'] ?>">
                <?= $r['device']==='mobile'?'📱':($r['device']==='tablet'?'📟':'🖥️') ?>
                <?= htmlspecialchars($r['device']) ?>
              </span>
            </td>
            <td><?= htmlspecialchars($r['browser']) ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <?php endif; ?>
  </div>

</div><!-- /wrap -->

<script>
const BLUE   = '#4a90b8';
const BLUE_D = '#2e6f96';
const TEAL   = '#22c55e';
const GRID   = 'rgba(0,0,0,0.06)';

const baseOpts = {
  responsive: true,
  maintainAspectRatio: false,
  plugins: { legend: { display: false } },
  scales: {
    x: { grid: { color: GRID }, ticks: { font: { size: 11 }, color: '#64748b' } },
    y: { grid: { color: GRID }, ticks: { font: { size: 11 }, color: '#64748b' }, beginAtZero: true }
  }
};

// Daily line chart
new Chart(document.getElementById('dailyChart'), {
  type: 'line',
  data: {
    labels: <?= json_encode(array_values($daily_labels)) ?>,
    datasets: [
      {
        label: 'Pageviews',
        data: <?= json_encode($daily_views) ?>,
        borderColor: BLUE, backgroundColor: 'rgba(74,144,184,0.12)',
        tension: 0.3, fill: true, pointRadius: 4, pointBackgroundColor: BLUE
      },
      {
        label: 'Unique',
        data: <?= json_encode($daily_uniq) ?>,
        borderColor: TEAL, backgroundColor: 'rgba(34,197,94,0.08)',
        tension: 0.3, fill: true, pointRadius: 4, pointBackgroundColor: TEAL,
        borderDash: [4,3]
      }
    ]
  },
  options: {
    ...baseOpts,
    plugins: {
      legend: {
        display: true,
        labels: { font: { size: 11 }, color: '#64748b', boxWidth: 14 }
      }
    }
  }
});

// Hourly bar
new Chart(document.getElementById('hourlyChart'), {
  type: 'bar',
  data: {
    labels: Array.from({length:24}, (_,i) => i + ':00'),
    datasets: [{
      data: <?= json_encode($hourly_data) ?>,
      backgroundColor: 'rgba(74,144,184,0.75)',
      borderRadius: 4
    }]
  },
  options: baseOpts
});

// Device doughnut
new Chart(document.getElementById('deviceChart'), {
  type: 'doughnut',
  data: {
    labels: <?= json_encode($dev_labels) ?>,
    datasets: [{
      data: <?= json_encode($dev_data) ?>,
      backgroundColor: ['#4a90b8','#f59e0b','#22c55e','#a78bfa'],
      borderWidth: 2, borderColor: '#fff'
    }]
  },
  options: {
    responsive: true, maintainAspectRatio: false,
    plugins: {
      legend: { position: 'right', labels: { font: { size: 11 }, color: '#64748b' } }
    }
  }
});

// Browser horizontal bar
new Chart(document.getElementById('browserChart'), {
  type: 'bar',
  data: {
    labels: <?= json_encode($brow_labels) ?>,
    datasets: [{
      data: <?= json_encode($brow_data) ?>,
      backgroundColor: ['#4a90b8','#f59e0b','#ef4444','#22c55e','#a78bfa','#64748b'],
      borderRadius: 6
    }]
  },
  options: {
    ...baseOpts,
    indexAxis: 'y',
    scales: {
      x: { grid: { color: GRID }, ticks: { font: { size: 11 }, color: '#64748b' }, beginAtZero: true },
      y: { grid: { display: false }, ticks: { font: { size: 11 }, color: '#64748b' } }
    }
  }
});
</script>

</body>
</html>