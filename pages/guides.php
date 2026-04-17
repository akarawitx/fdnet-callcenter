<!-- // pages/guides.php -->
<?php
// pages/guides.php — Guides & Manuals
require_once '../includes/config.php';

$page_title = 'คู่มือการใช้งาน';
$cat = $_GET['cat'] ?? '';

$categories = [
  ''          => ['label' => 'ทั้งหมด'],
  'account'   => ['label' => 'Account & ล็อกอิน'],
  'email'     => ['label' => 'Email'],
  'wifi'      => ['label' => 'Wi-Fi & เครือข่าย'],
  'office365' => ['label' => 'Office 365'],
  'teams'     => ['label' => 'Microsoft Teams'],
  'onedrive'  => ['label' => 'OneDrive'],
  'saraban'   => ['label' => 'ระบบสารบรรณ'],
  'vpn'       => ['label' => 'VPN'],
  'word-excel' => ['label' => 'Word & Excel'],
  'sharepoint' => ['label' => 'SharePoint'],
];

$guides = [
  [
    'cat'    => 'account',
    'title'  => 'การขอ Account และตั้งค่าครั้งแรก',
    'desc'   => 'ขั้นตอนตั้งแต่กรอกแบบฟอร์ม รออนุมัติ ล็อกอินครั้งแรก จนถึงตั้ง 2FA',
    'level'  => 'มือใหม่',
    'pages'  => 8,
    'updated' => 'มี.ค. 2569',
  ],
  [
    'cat'    => 'email',
    'title'  => 'การตั้งค่า Email บน Outlook และ Mobile',
    'desc'   => 'เพิ่มบัญชี Email องค์กรบน Outlook, iOS และ Android พร้อมตั้งค่า Signature',
    'level'  => 'ทั่วไป',
    'pages'  => 12,
    'updated' => 'ก.พ. 2569',
  ],
  [
    'cat'    => 'wifi',
    'title'  => 'การเชื่อมต่อ Wi-Fi ภายในวัด',
    'desc'   => 'วิธีเชื่อมต่อ Wi-Fi สำหรับบุคลากรและผู้มาเยือน รวมถึงการแก้ปัญหาเบื้องต้น',
    'level'  => 'มือใหม่',
    'pages'  => 6,
    'updated' => 'ม.ค. 2569',
  ],
  [
    'cat'    => 'office365',
    'title'  => 'ภาพรวม Microsoft 365 สำหรับบุคลากร',
    'desc'   => 'แนะนำเครื่องมือทั้งหมดใน Microsoft 365: Teams, Outlook, OneDrive, SharePoint',
    'level'  => 'ทั่วไป',
    'pages'  => 15,
    'updated' => 'เม.ย. 2569',
  ],
  [
    'cat'    => 'teams',
    'title'  => 'การใช้งาน Microsoft Teams',
    'desc'   => 'การสร้าง Channel, นัดประชุมออนไลน์, แชร์ไฟล์ และการตั้งค่าพื้นฐาน',
    'level'  => 'ทั่วไป',
    'pages'  => 20,
    'updated' => 'มี.ค. 2569',
  ],
  [
    'cat'    => 'onedrive',
    'title'  => 'การใช้ OneDrive สำหรับเก็บและแชร์ไฟล์',
    'desc'   => 'อัปโหลด จัดการโฟลเดอร์ แชร์ไฟล์ Sync บนคอมพิวเตอร์ และการจัดการสิทธิ์',
    'level'  => 'ทั่วไป',
    'pages'  => 10,
    'updated' => 'ก.พ. 2569',
  ],
  [
    'cat'    => 'saraban',
    'title'  => 'ระบบรับ-ส่งหนังสือราชการดิจิทัล',
    'desc'   => 'วิธีสร้าง ส่ง รับ และจัดเก็บหนังสือในระบบสารบรรณอิเล็กทรอนิกส์',
    'level'  => 'เฉพาะทาง',
    'pages'  => 18,
    'updated' => 'ม.ค. 2569',
  ],
  [
    'cat'    => 'vpn',
    'title'  => 'การใช้งาน VPN เพื่อเข้าระบบจากนอกวัด',
    'desc'   => 'ติดตั้งและตั้งค่า VPN Client บน Windows, macOS และ Mobile',
    'level'  => 'ทั่วไป',
    'pages'  => 9,
    'updated' => 'มี.ค. 2569',
  ],
  [
    'cat'    => 'word-excel',
    'title'  => 'Word & Excel สำหรับงานทั่วไป',
    'desc'   => 'เทมเพลตหนังสือราชการ การทำตารางข้อมูล และทริคที่ใช้บ่อยในสำนักงาน',
    'level'  => 'ทั่วไป',
    'pages'  => 14,
    'updated' => 'ก.พ. 2569',
  ],
  [
    'cat'    => 'sharepoint',
    'title'  => 'SharePoint: คลังเอกสารองค์กร',
    'desc'   => 'วิธีเข้าถึง อัปโหลด และจัดการเอกสารส่วนกลางบน SharePoint',
    'level'  => 'เฉพาะทาง',
    'pages'  => 11,
    'updated' => 'ม.ค. 2569',
  ],
];

$level_badge = [
  'มือใหม่'   => 'badge--green',
  'ทั่วไป'    => 'badge--blue',
  'เฉพาะทาง'  => 'badge--amber',
];

$display_guides = $cat ? array_filter($guides, fn($g) => $g['cat'] === $cat) : $guides;
$display_guides = array_values($display_guides);

require_once '../includes/header.php';
?>

<main class="layout__main">

  <nav class="breadcrumb">
    <a href="../index.php">หน้าหลัก</a>
    <span class="breadcrumb__sep">›</span>
    <span>คู่มือการใช้งาน</span>
    <?php if ($cat && isset($categories[$cat])): ?>
      <span class="breadcrumb__sep">›</span>
      <span><?= htmlspecialchars($categories[$cat]['label']) ?></span>
    <?php endif; ?>
  </nav>

  <div class="guides-layout">

    <!-- SIDEBAR -->
    <aside>
      <div class="sidebar-card">
        <div class="sidebar-title">หมวดหมู่คู่มือ</div>
        <ul class="sidebar-menu">
          <?php foreach ($categories as $key => $c): ?>
            <li><a href="guides.php<?= $key ? '?cat=' . $key : '' ?>" class="<?= $cat === $key ? 'active' : '' ?>"><?= htmlspecialchars($c['label']) ?></a></li> <?php endforeach; ?>
        </ul>
      </div>
    </aside>

    <!-- CONTENT -->
    <div>
      <div class="guides-header">
        <h1 class="page-title"><?= isset($categories[$cat]) ? htmlspecialchars($categories[$cat]['label']) : 'คู่มือทั้งหมด' ?></h1> <span class="guides-count"><?= count($display_guides) ?> รายการ</span>
      </div>

      <?php if (empty($display_guides)): ?>
        <div class="empty-state">ไม่พบคู่มือในหมวดหมู่นี้</div>
      <?php else: ?>
        <div class="guides-grid">
          <?php foreach ($display_guides as $guide): ?>
            <div class="guide-card">
              <div class="guide-card__top">
                <span class="badge <?= $level_badge[$guide['level']] ?? 'badge--blue' ?>"><?= htmlspecialchars($guide['level']) ?></span>
                <span class="guide-card__meta">📄 <?= $guide['pages'] ?> หน้า &nbsp;·&nbsp; อัปเดต <?= $guide['updated'] ?></span>
              </div>
              <h3 class="guide-card__title"><?= htmlspecialchars($guide['title']) ?></h3>
              <p class="guide-card__desc"><?= htmlspecialchars($guide['desc']) ?></p>
              <a href="#" class="btn btn--primary btn--sm" style="margin-top:auto">อ่านคู่มือ →</a>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>

</main>

<?php require_once '../includes/footer.php'; ?>

<style>
  .page-title {
    font-size: 1.4rem;
    font-weight: 600;
    color: var(--clr-primary-dark);
  }

  .guides-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 24px;
  }

  .guides-count {
    background: var(--clr-primary-pale);
    color: var(--clr-primary);
    font-size: .78rem;
    padding: 3px 10px;
    border-radius: 20px;
    font-weight: 500;
  }

  .guides-layout {
    display: grid;
    grid-template-columns: 200px 1fr;
    gap: 28px;
    align-items: start;
  }

  @media (max-width: 750px) {
    .guides-layout {
      grid-template-columns: 1fr;
    }
  }

  .sidebar-card {
    background: var(--clr-surface);
    border: 1px solid var(--clr-border);
    border-radius: var(--radius-lg);
    padding: 18px;
    margin-bottom: 16px;
    box-shadow: var(--shadow-sm);
  }

  .sidebar-title {
    font-size: .78rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: .07em;
    color: var(--clr-text-muted);
    margin-bottom: 12px;
  }

  .sidebar-menu li a {
    display: block;
    padding: 7px 10px;
    border-radius: var(--radius-sm);
    font-size: .85rem;
    color: var(--clr-text-muted);
    transition: background .15s, color .15s;
    border-left: 3px solid transparent;
  }

  .sidebar-menu li a:hover {
    background: var(--clr-primary-pale);
    color: var(--clr-primary);
  }

  .sidebar-menu li a.active {
    background: var(--clr-primary-pale);
    color: var(--clr-primary);
    border-left-color: var(--clr-primary);
    font-weight: 500;
  }

  .guides-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 18px;
  }

  .guide-card {
    background: var(--clr-surface);
    border: 1px solid var(--clr-border);
    border-radius: var(--radius-lg);
    padding: 20px;
    box-shadow: var(--shadow-sm);
    display: flex;
    flex-direction: column;
    gap: 10px;
    transition: box-shadow .2s, transform .2s;
  }

  .guide-card:hover {
    box-shadow: var(--shadow-md);
    transform: translateY(-2px);
  }

  .guide-card__top {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .guide-card__meta {
    font-size: .72rem;
    color: var(--clr-text-light);
  }

  .guide-card__title {
    font-size: .95rem;
    font-weight: 600;
    color: var(--clr-text);
    line-height: 1.4;
  }

  .guide-card__desc {
    font-size: .82rem;
    color: var(--clr-text-muted);
    line-height: 1.55;
    flex: 1;
  }

  .empty-state {
    padding: 60px;
    text-align: center;
    color: var(--clr-text-muted);
  }
</style>