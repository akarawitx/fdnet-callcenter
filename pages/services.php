<!-- // pages/services.php -->
<?php
// pages/services.php — IT Services Page
require_once '../includes/config.php';

$page_title = 'บริการ IT';
$cat = $_GET['cat'] ?? '';

$categories = [
  'account'  => ['label' => 'ขอ Account ใหม่'],
  'reset'    => ['label' => 'รีเซ็ตรหัสผ่าน'],
  'email'    => ['label' => 'ขอ Email องค์กร'],
  'wifi'     => ['label' => 'ขอใช้ Wi-Fi'],
  'software' => ['label' => 'ขอซอฟต์แวร์'],
];

$all_services = [
  [
    'cat'   => 'account',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"/></svg>',
    'title' => 'ขอ Account ใหม่',
    'desc'  => 'สมัครบัญชีผู้ใช้งานใหม่สำหรับบุคลากรและผู้ที่เกี่ยวข้องกับวัด',
    'steps' => ['กรอกแบบฟอร์มขอ Account', 'รอการอนุมัติจากเจ้าหน้าที่ 1-2 วันทำการ', 'รับ username/password ทาง Email', 'ล็อกอินและตั้งค่า 2FA'],
    'time'  => '1–2 วันทำการ',
    'url'   => '?cat=account',
  ],
  [
    'cat'   => 'reset',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M23 4v6h-6"/><path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"/></svg>',
    'title' => 'รีเซ็ตรหัสผ่าน',
    'desc'  => 'ลืมหรือต้องการเปลี่ยนรหัสผ่านบัญชีระบบต่างๆ',
    'steps' => ['แสดงบัตรประจำตัว', 'ยืนยันตัวตนกับเจ้าหน้าที่', 'รับรหัสผ่านชั่วคราว', 'เปลี่ยนรหัสผ่านเมื่อล็อกอิน'],
    'time'  => 'ทันที (ในเวลาทำการ)',
    'url'   => '?cat=reset',
  ],
  [
    'cat'   => 'email',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>',
    'title' => 'ขอ Email องค์กร',
    'desc'  => 'ขอบัญชีอีเมลในโดเมน @watphrathammakaya.ac.th สำหรับบุคลากร',
    'steps' => ['กรอกคำร้องขอ Email', 'ระบุชื่อที่ต้องการใช้', 'รอการสร้างบัญชี 1 วัน', 'รับข้อมูลเข้าใช้งาน'],
    'time'  => '1 วันทำการ',
    'url'   => '?cat=email',
  ],
  [
    'cat'   => 'wifi',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.55a11 11 0 0 1 14.08 0"/><path d="M1.42 9a16 16 0 0 1 21.16 0"/><path d="M8.53 16.11a6 6 0 0 1 6.95 0"/><circle cx="12" cy="20" r="1" fill="currentColor"/></svg>',
    'title' => 'ขอใช้ Wi-Fi',
    'desc'  => 'ขอรหัสหรือลงทะเบียนอุปกรณ์เพื่อใช้งาน Wi-Fi ภายในวัด',
    'steps' => ['ระบุประเภทการใช้งาน', 'แจ้ง MAC Address อุปกรณ์', 'รับรหัส Wi-Fi ชั่วคราว', 'ลงทะเบียนอุปกรณ์ถาวร'],
    'time'  => 'ทันที (ในเวลาทำการ)',
    'url'   => '?cat=wifi',
  ],
  [
    'cat'   => 'software',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>',
    'title' => 'ขอซอฟต์แวร์',
    'desc'  => 'ขอติดตั้งซอฟต์แวร์ที่ได้รับอนุญาตบนคอมพิวเตอร์ขององค์กร',
    'steps' => ['ระบุชื่อซอฟต์แวร์ที่ต้องการ', 'ระบุเหตุผลการใช้งาน', 'รอการอนุมัติจากผู้บังคับบัญชา', 'เจ้าหน้าที่ติดตั้งให้'],
    'time'  => '2–3 วันทำการ',
    'url'   => '?cat=software',
  ],
];

// Filter if cat specified
$display_services = $cat ? array_filter($all_services, fn($s) => $s['cat'] === $cat) : $all_services;
$display_services = array_values($display_services);

require_once '../includes/header.php';
?>

<main class="layout__main">

  <!-- BREADCRUMB -->
  <nav class="breadcrumb" aria-label="breadcrumb">
    <a href="../index.php">หน้าหลัก</a>
    <span class="breadcrumb__sep">›</span>
    <span><?= $cat && isset($categories[$cat]) ? htmlspecialchars($categories[$cat]['label']) : 'บริการ IT' ?></span>
  </nav>

  <div class="services-layout">
    <!-- SIDEBAR -->
    <aside class="services-sidebar">
      <div class="sidebar-card">
        <div class="sidebar-title">หมวดหมู่บริการ</div>
        <ul class="sidebar-menu">
          <li><a href="services.php" class="<?= !$cat ? 'active' : '' ?>">บริการทั้งหมด</a></li>
          <?php foreach ($categories as $key => $c): ?>
            <li><a href="services.php?cat=<?= $key ?>" class="<?= $cat === $key ? 'active' : '' ?>"><?= htmlspecialchars($c['label']) ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="sidebar-card sidebar-contact">
        <div class="sidebar-title">ต้องการความช่วยเหลือ?</div>
        <p>โทรติดต่อเจ้าหน้าที่โดยตรง</p>
        <a href="tel:<?= SITE_PHONE ?>" class="btn btn--primary btn--sm" style="width:100%;justify-content:center;margin-top:10px">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.41 2 2 0 0 1 3.6 1.23h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.91a16 16 0 0 0 6.18 6.18l.95-.95a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" />
          </svg>
          <?= SITE_PHONE ?>
        </a>
      </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="services-content">
      <h1 class="page-title"><?= $cat && isset($categories[$cat]) ? htmlspecialchars($categories[$cat]['label']) : 'บริการ IT ทั้งหมด' ?></h1>
      <?php if (empty($display_services)): ?>
        <div class="empty-state">ไม่พบข้อมูลบริการในหมวดหมู่นี้</div>
      <?php else: ?>
        <div class="service-detail-grid">
          <?php foreach ($display_services as $svc): ?>
            <div class="svc-detail-card">
              <div class="svc-detail-card__head">
                <span class="svc-detail-card__icon"><?= $svc['icon'] ?></span>
                <div>
                  <h2 class="svc-detail-card__title"><?= htmlspecialchars($svc['title']) ?></h2>
                  <span class="svc-detail-card__time">⏱ <?= htmlspecialchars($svc['time']) ?></span>
                </div>
              </div>
              <p class="svc-detail-card__desc"><?= htmlspecialchars($svc['desc']) ?></p>
              <div class="svc-detail-card__steps">
                <div class="steps-label">ขั้นตอนการขอรับบริการ</div>
                <ol class="steps-list">
                  <?php foreach ($svc['steps'] as $step): ?>
                    <li><?= htmlspecialchars($step) ?></li>
                  <?php endforeach; ?>
                </ol>
              </div>
              <a href="<?= htmlspecialchars($svc['url']) ?>" class="btn btn--primary btn--sm">ขอรับบริการนี้ →</a>
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
    margin-bottom: 24px;
  }

  .services-layout {
    display: grid;
    grid-template-columns: 220px 1fr;
    gap: 28px;
    align-items: start;
  }

  @media (max-width: 800px) {
    .services-layout {
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
    font-size: .82rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: .07em;
    color: var(--clr-text-muted);
    margin-bottom: 12px;
  }

  .sidebar-menu li a {
    display: block;
    padding: 8px 10px;
    border-radius: var(--radius-sm);
    font-size: .87rem;
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

  .sidebar-contact p {
    font-size: .82rem;
    color: var(--clr-text-muted);
    margin-bottom: 4px;
  }

  .service-detail-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
  }

  .svc-detail-card {
    background: var(--clr-surface);
    border: 1px solid var(--clr-border);
    border-radius: var(--radius-lg);
    padding: 22px;
    box-shadow: var(--shadow-sm);
    display: flex;
    flex-direction: column;
    gap: 14px;
    transition: box-shadow .2s;
  }

  .svc-detail-card:hover {
    box-shadow: var(--shadow-md);
  }

  .svc-detail-card__head {
    display: flex;
    align-items: flex-start;
    gap: 12px;
  }

  .svc-detail-card__icon {
    width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--clr-primary-pale);
    border-radius: 10px;
    flex-shrink: 0;
    color: var(--clr-primary);
  }

  .svc-detail-card__icon svg {
    stroke: var(--clr-primary);
  }

  .svc-detail-card__title {
    font-size: 1rem;
    font-weight: 600;
    color: var(--clr-text);
    margin-bottom: 2px;
  }

  .svc-detail-card__time {
    font-size: .75rem;
    color: var(--clr-text-muted);
    background: var(--clr-bg);
    padding: 2px 8px;
    border-radius: 20px;
  }

  .svc-detail-card__desc {
    font-size: .85rem;
    color: var(--clr-text-muted);
    line-height: 1.6;
  }

  .steps-label {
    font-size: .78rem;
    font-weight: 600;
    color: var(--clr-text-muted);
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: .05em;
  }

  .steps-list {
    padding-left: 18px;
    display: flex;
    flex-direction: column;
    gap: 6px;
  }

  .steps-list li {
    font-size: .85rem;
    color: var(--clr-text);
  }

  .empty-state {
    padding: 60px;
    text-align: center;
    color: var(--clr-text-muted);
    font-size: 1rem;
  }
</style>