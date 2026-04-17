<!-- // pages/network.php -->
<?php
// pages/network.php — Network & Security
require_once '../includes/config.php';
$page_title = 'ระบบเครือข่าย & ความปลอดภัย';
$cat = $_GET['cat'] ?? '';

$sections = [
  'policy'   => ['icon' => '📋', 'label' => 'นโยบาย IT'],
  'vpn'      => ['icon' => '🔒', 'label' => 'VPN'],
  'security' => ['icon' => '🛡️', 'label' => 'ความปลอดภัยข้อมูล'],
];

require_once '../includes/header.php';
?>

<main class="layout__main">
  <nav class="breadcrumb">
    <a href="../index.php">หน้าหลัก</a>
    <span class="breadcrumb__sep">›</span>
    <span>ระบบเครือข่าย & ความปลอดภัย</span>
  </nav>

  <div class="guides-layout">
    <aside>
      <div class="sidebar-card">
        <div class="sidebar-title">หมวดหมู่</div>
        <ul class="sidebar-menu">
          <li><a href="network.php" class="<?= !$cat ? 'active' : '' ?>">ทั้งหมด</a></li>
          <?php foreach ($sections as $key => $s): ?>
            <li><a href="network.php?cat=<?= $key ?>" class="<?= $cat === $key ? 'active' : '' ?>"><?= htmlspecialchars($s['label']) ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </aside>

    <div>
      <h1 class="page-title">ระบบเครือข่าย & ความปลอดภัย</h1>

      <?php if (!$cat || $cat === 'policy'): ?>
        <section class="net-section">
          <h2 class="section-title">นโยบาย IT</h2>
          <div class="card" style="margin-bottom:0">
            <ul class="policy-list">
              <li>ห้ามนำซอฟต์แวร์ที่ไม่ได้รับอนุญาตมาติดตั้งบนคอมพิวเตอร์ขององค์กร</li>
              <li>รหัสผ่านต้องมีความยาวอย่างน้อย 8 ตัวอักษร ประกอบด้วยตัวพิมพ์ใหญ่ ตัวพิมพ์เล็ก ตัวเลข และอักขระพิเศษ</li>
              <li>ต้องเปลี่ยนรหัสผ่านทุก 90 วัน</li>
              <li>ห้ามใช้คอมพิวเตอร์ขององค์กรเพื่อกิจกรรมส่วนตัวที่ไม่เกี่ยวข้องกับงาน</li>
              <li>ข้อมูลสำคัญต้องสำรองไว้บน OneDrive หรือ SharePoint เสมอ</li>
              <li>ต้องใช้ VPN เมื่อเข้าถึงระบบจากภายนอกวัด</li>
            </ul>
          </div>
        </section>
      <?php endif; ?>

      <?php if (!$cat || $cat === 'vpn'): ?>
        <section class="net-section">
          <h2 class="section-title">VPN</h2>
          <div class="card" style="margin-bottom:0">
            <p style="margin-bottom:14px;font-size:.9rem;color:var(--clr-text-muted)">ใช้ VPN เพื่อเชื่อมต่อระบบภายในวัดจากที่พักหรือสถานที่อื่น ๆ อย่างปลอดภัย</p>
            <a href="guides.php?cat=vpn" class="btn btn--primary btn--sm">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z" />
              </svg>
              อ่านคู่มือติดตั้ง VPN
            </a>
          </div>
        </section>
      <?php endif; ?>

      <?php if (!$cat || $cat === 'security'): ?>
        <section class="net-section">
          <h2 class="section-title">ความปลอดภัยข้อมูล</h2>
          <div class="security-tips">
            <?php
            $tips = [
              ['icon' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/><line x1="12" y1="13" x2="12" y2="20"/></svg>', 'title' => 'ระวัง Phishing', 'desc' => 'อย่าคลิกลิงก์หรือดาวน์โหลดไฟล์จาก Email ที่ไม่รู้จักหรือน่าสงสัย'],
              ['icon' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/><circle cx="12" cy="16" r="1" fill="currentColor"/></svg>', 'title' => 'ใช้ 2FA', 'desc' => 'เปิดใช้งาน Two-Factor Authentication สำหรับบัญชี Microsoft 365 ของท่าน'],
              ['icon' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"/><polyline points="16 15 12 11 8 15"/><line x1="12" y1="11" x2="12" y2="19"/></svg>', 'title' => 'สำรองข้อมูล', 'desc' => 'สำรองข้อมูลสำคัญบน OneDrive เป็นประจำ เพื่อป้องกันการสูญหาย'],
              ['icon' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/><path d="M12 7v4M10 9h4"/></svg>', 'title' => 'ล็อกหน้าจอ', 'desc' => 'ล็อกหน้าจอทุกครั้งเมื่อเว้นว่างจากโต๊ะทำงาน (Win+L)'],
            ];
            foreach ($tips as $tip): ?>
              <div class="tip-card">
                <div class="tip-icon"><?= $tip['icon'] ?></div>
                <div>
                  <div class="tip-title"><?= htmlspecialchars($tip['title']) ?></div>
                  <div class="tip-desc"><?= htmlspecialchars($tip['desc']) ?></div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </section>
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

  .net-section {
    margin-bottom: 28px;
  }

  .policy-list {
    padding-left: 20px;
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  .policy-list li {
    font-size: .88rem;
    color: var(--clr-text);
  }

  .security-tips {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px;
  }

  @media (max-width: 600px) {
    .security-tips {
      grid-template-columns: 1fr;
    }
  }

  .tip-card {
    display: flex;
    gap: 12px;
    background: var(--clr-surface);
    border: 1px solid var(--clr-border);
    border-radius: var(--radius-md);
    padding: 16px;
  }

  .tip-icon {
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

  .tip-icon svg {
    stroke: var(--clr-primary);
  }

  .tip-title {
    font-weight: 600;
    font-size: .9rem;
    margin-bottom: 3px;
  }

  .tip-desc {
    font-size: .82rem;
    color: var(--clr-text-muted);
    line-height: 1.5;
  }
</style>