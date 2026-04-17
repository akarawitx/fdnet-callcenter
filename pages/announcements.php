<!-- pages/announcements.php -->
<?php
// pages/announcements.php
require_once '../includes/config.php';
$page_title = 'ประกาศ & ข่าวสาร';

$announcements = [
  ['date' => '16 เมษายน 2569', 'cat' => 'แจ้งเตือน', 'cat_class' => 'badge--amber', 'title' => 'ระบบ Email จะหยุดให้บริการชั่วคราว วันเสาร์ที่ 19 เมษายน เวลา 02:00–04:00 น.', 'desc' => 'ทีมเจ้าหน้าที่จะดำเนินการบำรุงรักษาระบบ Email Server ในช่วงดังกล่าว โปรดวางแผนการใช้งานล่วงหน้า', 'is_new' => true],
  ['date' => '10 เมษายน 2569', 'cat' => 'อบรม',     'cat_class' => 'badge--green', 'title' => 'เปิดอบรม "การใช้งาน Microsoft Teams" รุ่น 3 รับสมัครแล้ววันนี้', 'desc' => 'อบรมวันเสาร์ที่ 26 เมษายน 2569 เวลา 09:00–12:00 น. ณ ห้องอบรม ICT ชั้น 2', 'is_new' => true],
  ['date' => '1 เมษายน 2569',  'cat' => 'นโยบาย',   'cat_class' => 'badge--blue',  'title' => 'อัปเดตนโยบายรหัสผ่านใหม่ — ต้องเปลี่ยนทุก 90 วัน มีผลตั้งแต่ 1 พฤษภาคม 2569', 'desc' => 'เพื่อความปลอดภัยของบัญชีผู้ใช้งาน ทุกท่านจะได้รับการแจ้งเตือนทาง Email ก่อนวันครบกำหนด 7 วัน', 'is_new' => false],
  ['date' => '20 มีนาคม 2569', 'cat' => 'อัปเดต',   'cat_class' => 'badge--blue',  'title' => 'อัปเกรด Wi-Fi บริเวณศาลาหลวงพ่อ และอาคาร 100 ปี เสร็จสมบูรณ์', 'desc' => 'ขณะนี้ Wi-Fi บริเวณดังกล่าวรองรับมาตรฐาน Wi-Fi 6 ความเร็วสูงสุด 1.2 Gbps', 'is_new' => false],
];

require_once '../includes/header.php';
?>

<main class="layout__main">
  <nav class="breadcrumb">
    <a href="../index.php">หน้าหลัก</a>
    <span class="breadcrumb__sep">›</span>
    <span>ประกาศ & ข่าวสาร</span>
  </nav>

  <h1 class="page-title">ประกาศ & ข่าวสาร</h1>

  <div class="announce-page-list">
    <?php foreach ($announcements as $ann): ?>
      <div class="ann-card">
        <div class="ann-card__side"></div>
        <div class="ann-card__body">
          <div class="ann-card__top">
            <span class="badge <?= $ann['cat_class'] ?>"><?= htmlspecialchars($ann['cat']) ?></span>
            <?php if ($ann['is_new']): ?><span class="badge badge--new">ใหม่</span><?php endif; ?>
            <span class="ann-card__date"><?= $ann['date'] ?></span>
          </div>
          <h3 class="ann-card__title"><?= htmlspecialchars($ann['title']) ?></h3>
          <p class="ann-card__desc"><?= htmlspecialchars($ann['desc']) ?></p>
        </div>
      </div>
    <?php endforeach; ?>
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

  .announce-page-list {
    display: flex;
    flex-direction: column;
    gap: 16px;
    max-width: 800px;
  }

  .ann-card {
    display: flex;
    background: var(--clr-surface);
    border: 1px solid var(--clr-border);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: box-shadow .2s;
  }

  .ann-card:hover {
    box-shadow: var(--shadow-md);
  }

  .ann-card__side {
    width: 5px;
    background: var(--clr-primary);
    flex-shrink: 0;
  }

  .ann-card__body {
    padding: 20px 22px;
    flex: 1;
  }

  .ann-card__top {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 10px;
  }

  .ann-card__date {
    font-size: .78rem;
    color: var(--clr-text-light);
    margin-left: auto;
  }

  .ann-card__title {
    font-size: .95rem;
    font-weight: 600;
    color: var(--clr-text);
    margin-bottom: 6px;
    line-height: 1.4;
  }

  .ann-card__desc {
    font-size: .83rem;
    color: var(--clr-text-muted);
    line-height: 1.6;
  }
</style>