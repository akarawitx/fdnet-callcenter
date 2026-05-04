<?php
// pages/network.php — Network & Security
require_once '../includes/config.php';
$page_title = 'ระบบเครือข่าย & ความปลอดภัย';
$cat = $_GET['cat'] ?? '';

$sections = [
  'network'  => ['label' => 'WiFi ภายในองค์กร'],
];

$network_items = [
  // WiFi ภายในองค์กร
  [
    'cat'   => 'network',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>',
    'title' => 'WiFi ภายในองค์กร',
    'desc'  => 'เครือข่ายอินเทอร์เน็ตไร้สายในแต่ละพื้นที่ของวัดพระธรรมกาย',
    'extra_html' => '
      <div style="overflow-x:auto">
        <table style="width:100%;border-collapse:collapse;font-size:.95rem">
          <thead>
            <tr style="background:#2f7aa3;color:#fff;text-align:left">
              <th style="padding:10px">สถานที่</th>
              <th style="padding:10px">ชื่อ Wifi</th>
            </tr>
          </thead>
          <tbody>
            <tr style="background:#f2f2f2">
              <td style="padding:10px">สำนักงานใหญ่</td>
              <td style="padding:10px">DKC Network (HQ)</td>
            </tr>
            <tr>
              <td style="padding:10px">อาคาร 100 ปี</td>
              <td style="padding:10px">.100Y-Office</td>
            </tr>
            <tr style="background:#f2f2f2">
              <td style="padding:10px">สภาธรรมกายสากล</td>
              <td style="padding:10px">DKC Network (Spha)</td>
            </tr>
            <tr>
              <td style="padding:10px">มหาวิหารคด</td>
              <td style="padding:10px">DKC Network (VHK)</td>
            </tr>
            <tr style="background:#f2f2f2">
              <td style="padding:10px">อาคารพระผู้ปราบมาร</td>
              <td style="padding:10px">DKC Network (PM)</td>
            </tr>
            <tr>
              <td style="padding:10px">อาคารหนึ่งไม่มีสอง</td>
              <td style="padding:10px">DKC Network (UPK)</td>
            </tr>
            <tr style="background:#f2f2f2">
              <td style="padding:10px">พื้นที่ 58 ไร่</td>
              <td style="padding:10px">DKC Network</td>
            </tr>
            <tr>
              <td style="padding:10px">อาคารบุญรักษา</td>
              <td style="padding:10px">Boonraksa</td>
            </tr>
          </tbody>
        </table>
      </div>
    ',
  ],
];

require_once '../includes/header.php';
?>

<?php
$panel_title   = 'ระบบเครือข่าย & ความปลอดภัย';
$panel_cat     = $cat;
$panel_base    = 'network.php';
$panel_menu    = $sections;
$panel_items   = $network_items;
$panel_contact = false;
?>

<main class="layout__main">
  <nav class="breadcrumb">
    <a href="../index.php">หน้าหลัก</a>
    <span class="breadcrumb__sep">›</span>
    <span>ระบบเครือข่าย & ความปลอดภัย</span>
  </nav>

  <?php require_once '../includes/single-panel.php'; ?>
</main>

<?php require_once '../includes/footer.php'; ?>