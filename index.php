<!-- // index.php -->
<?php
// index.php — Home Page
require_once 'includes/config.php';

$page_title = 'หน้าหลัก';

// ---- Quick services ----
$quick_services = [
  ['icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/><line x1="18" y1="8" x2="23" y2="13"/><line x1="23" y1="8" x2="18" y2="13"/></svg>', 'label' => 'ขอ Account ใหม่', 'sub' => 'สมัครบัญชีใหม่', 'url' => 'pages/services.php?cat=account'],
  ['icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M23 4v6h-6"/><path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"/></svg>', 'label' => 'ต่ออายุ Account', 'sub' => 'ขยายอายุการใช้งาน', 'url' => 'pages/services.php?cat=renew'],
  ['icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>', 'label' => 'เช็กสถานะ Account', 'sub' => 'ตรวจสอบ / รหัสผ่าน', 'url' => 'pages/services.php?cat=status'],
  ['icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>', 'label' => 'รีเซทรหัสผ่าน', 'sub' => 'ลืม / เปลี่ยน password', 'url' => 'pages/services.php?cat=reset'],
  ['icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>', 'label' => 'ขอ Join Domain', 'sub' => 'เชื่อมคอมกับ Domain', 'url' => 'pages/services.php?cat=domain'],
  ['icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>', 'label' => 'ขอสิทธิ์เข้า Computer', 'sub' => 'ขอสิทธิ์ใช้งาน', 'url' => 'pages/services.php?cat=access'],
  ['icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>', 'label' => 'ขอเปลี่ยน Email', 'sub' => 'แก้ไขอีเมลองค์กร', 'url' => 'pages/services.php?cat=email'],
  ['icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.55a11 11 0 0 1 14.08 0"/><path d="M1.42 9a16 16 0 0 1 21.16 0"/><path d="M8.53 16.11a6 6 0 0 1 6.95 0"/><circle cx="12" cy="20" r="1" fill="currentColor"/></svg>', 'label' => 'ขอเพิ่มอินเทอร์เน็ต', 'sub' => 'เพิ่มปริมาณการใช้งาน', 'url' => 'pages/services.php?cat=internet'],
];

// ---- Featured guides ----
$featured_guides = [
  [
    'badge'  => 'มือใหม่',
    'title'  => 'การขอ Account และตั้งค่าครั้งแรก',
    'desc'   => 'ขั้นตอนตั้งแต่กรอกแบบฟอร์ม รออนุมัติ ล็อกอินครั้งแรก จนถึงตั้ง 2FA',
    'tags'   => ['Account', 'ขั้นตอน'],
    'url'    => 'pages/guides.php?cat=account',
  ],
  [
    'badge'  => 'บุคลากร',
    'title'  => 'การใช้งาน Microsoft 365 ภายในวัด',
    'desc'   => 'Teams, Outlook, OneDrive และ SharePoint สำหรับบุคลากรภายในองค์กร',
    'tags'   => ['Office 365', 'Teams'],
    'url'    => 'pages/guides.php?cat=office365',
  ],
  [
    'badge'  => 'ระบบสาร',
    'title'  => 'ระบบรับ-ส่งหนังสือราชการดิจิทัล',
    'desc'   => 'วิธีสร้าง ส่ง รับ และจัดเก็บหนังสือในระบบสารบรรณอิเล็กทรอนิกส์',
    'tags'   => ['สารบรรณ', 'เอกสาร'],
    'url'    => 'pages/guides.php?cat=saraban',
  ],
  [
    'badge'  => 'ความปลอดภัย',
    'title'  => 'นโยบายและแนวทางความปลอดภัยข้อมูล',
    'desc'   => 'การตั้งรหัสที่ปลอดภัย การใช้ VPN และสิ่งที่ต้องระวังในการใช้งานเครือข่าย',
    'tags'   => ['Security', 'นโยบาย'],
    'url'    => 'pages/network.php?cat=security',
  ],
];

require_once 'includes/header.php';
?>

<!-- PAGE CONTENT -->
<main class="layout__main">

  <!-- HERO BANNER -->
  <section class="hero">
    <div class="hero__text">
      <div class="hero__eyebrow">ยินดีต้อนรับ</div>
      <h1 class="hero__title">กองบริการสารสนเทศ</h1>
      <p class="hero__desc">บริการให้คำปรึกษา และแก้ไขปัญหาด้านสารสนเทศครบวงจร<br>เปิดทำการทุกวันจันทร์–เสาร์ เวลา 9:00–17:30 น.</p>
      <div class="hero__actions">
        <a href="pages/services.php" class="btn btn--red-account">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
            <circle cx="12" cy="7" r="4" />
            <line x1="18" y1="8" x2="23" y2="13" />
            <line x1="23" y1="8" x2="18" y2="13" />
          </svg>
          ยูสเซอร์หน้าแดง
        </a>
      </div>
    </div>
  </section>

  <!-- QUICK SERVICES -->
  <section class="page-section">
    <h2 class="section-title">บริการที่ใช้บ่อย</h2>
    <div class="service-grid">
      <?php foreach ($quick_services as $svc): ?>
        <a href="<?= htmlspecialchars($svc['url']) ?>" class="service-card">
          <div class="service-card__icon"><?= $svc['icon'] ?></div>
          <div class="service-card__label"><?= htmlspecialchars($svc['label']) ?></div>
          <div class="service-card__sub"><?= htmlspecialchars($svc['sub']) ?></div>
        </a>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- FEATURED GUIDES -->
  <div>
    <section class="page-section">
      <h2 class="section-title">คู่มือแนะนำ</h2>
      <div class="guide-list">
        <?php foreach ($featured_guides as $g): ?>
          <a href="<?= htmlspecialchars($g['url']) ?>" class="guide-item">
            <div class="guide-item__top">
              <span class="badge badge--blue"><?= htmlspecialchars($g['badge']) ?></span>
            </div>
            <div class="guide-item__title"><?= htmlspecialchars($g['title']) ?></div>
            <div class="guide-item__desc"><?= htmlspecialchars($g['desc']) ?></div>
            <div class="guide-item__tags">
              <?php foreach ($g['tags'] as $tag): ?>
                <span class="tag"><?= htmlspecialchars($tag) ?></span>
              <?php endforeach; ?>
            </div>
          </a>
        <?php endforeach; ?>
        <a href="pages/guides.php" class="btn btn--outline btn--sm" style="align-self:flex-start;margin-top:4px">ดูคู่มือทั้งหมด →</a>
      </div>
    </section>

</main>

<?php require_once 'includes/footer.php'; ?>

<style>
  /* ============================================================
   HOME PAGE STYLES
   ============================================================ */

  /* Hero */
  .hero {
    background:
      linear-gradient(135deg, rgba(8, 47, 73, 0.82) 0%, rgba(13, 77, 128, 0.70) 100%),
      url('https://images.unsplash.com/photo-1518770660439-4636190af475?w=1400&q=80') center/cover no-repeat;
    border-radius: var(--radius-lg);
    padding: 40px 40px 40px 44px;
    margin-bottom: 36px;
    display: flex;
    gap: 32px;
    align-items: center;
    overflow: hidden;
    position: relative;
    min-height: 200px;
    box-shadow: var(--shadow-md);
    border: 1px solid rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(0px);
  }

  .hero__text {
    flex: 1;
    position: relative;
    z-index: 2;
  }

  .hero__eyebrow {
    font-size: .82rem;
    color: rgba(255, 255, 255, .7);
    margin-bottom: 8px;
  }

  .hero__title {
    font-size: 1.55rem;
    font-weight: 600;
    color: #fff;
    line-height: 1.3;
    margin-bottom: 12px;
  }

  .hero__desc {
    font-size: .9rem;
    color: rgba(255, 255, 255, .78);
    line-height: 1.7;
    margin-bottom: 24px;
  }

  .hero__actions {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
  }

  .hero__actions .btn--outline {
    color: #fff;
    border-color: rgba(255, 255, 255, .5);
  }

  .hero__actions .btn--outline:hover {
    background: rgba(255, 255, 255, .15);
  }

  .btn--red-account {
    background: rgba(220, 80, 80, 0.25);
    color: #fff;
    border: 1.5px solid rgba(255, 160, 160, 0.6);
    backdrop-filter: blur(4px);
  }

  .btn--red-account:hover {
    background: rgba(220, 80, 80, 0.40);
    border-color: rgba(255, 180, 180, 0.8);
  }

  .btn--red-account svg {
    stroke: #ffb3b3;
  }

  .hero__illustration {
    position: relative;
    width: 160px;
    flex-shrink: 0;
  }

  .hero__circle {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, .06);
  }

  .c1 {
    width: 130px;
    height: 130px;
    top: -30px;
    right: -20px;
  }

  .c2 {
    width: 80px;
    height: 80px;
    top: 20px;
    right: 50px;
    background: rgba(255, 255, 255, .04);
  }

  .c3 {
    width: 50px;
    height: 50px;
    top: 70px;
    right: 0;
    background: rgba(255, 255, 255, .08);
  }

  .hero__icon-grid {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 10px;
    position: relative;
    z-index: 2;
    padding-top: 10px;
  }

  .hero__icon-grid span {
    font-size: 1.6rem;
    background: rgba(255, 255, 255, .1);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 44px;
    backdrop-filter: blur(4px);
    transition: transform .2s;
  }

  .hero__icon-grid span:hover {
    transform: scale(1.1);
  }

  /* Service grid */
  .service-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
    gap: 14px;
  }

  .service-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    background: var(--clr-surface);
    border: 1px solid var(--clr-border);
    border-radius: var(--radius-lg);
    padding: 22px 16px;
    transition: box-shadow .2s, transform .2s, border-color .2s;
    cursor: pointer;
  }

  .service-card:hover {
    box-shadow: var(--shadow-md);
    transform: translateY(-3px);
    border-color: var(--clr-primary);
  }

  .service-card__icon {
    width: 44px;
    height: 44px;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--clr-primary-pale);
    border-radius: 10px;
    color: var(--clr-primary);
  }

  .service-card__icon svg {
    stroke: var(--clr-primary);
  }

  .service-card__label {
    font-size: .9rem;
    font-weight: 600;
    color: var(--clr-text);
    margin-bottom: 3px;
  }

  .service-card__sub {
    font-size: .76rem;
    color: var(--clr-text-muted);
  }

  /* Two-col */
  .two-col-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
  }

  @media (max-width: 720px) {
    .two-col-grid {
      grid-template-columns: 1fr;
    }
  }

  /* Guides */
  .guide-list {
    display: flex;
    flex-direction: column;
    gap: 14px;
  }

  .guide-item {
    background: var(--clr-surface);
    border: 1px solid var(--clr-border);
    border-radius: var(--radius-md);
    padding: 16px;
    transition: box-shadow .2s, border-color .2s;
  }

  .guide-item:hover {
    border-color: var(--clr-primary);
    box-shadow: var(--shadow-sm);
  }

  .guide-item__top {
    margin-bottom: 6px;
  }

  .guide-item__title {
    font-size: .9rem;
    font-weight: 600;
    color: var(--clr-text);
    margin-bottom: 4px;
  }

  .guide-item__desc {
    font-size: .8rem;
    color: var(--clr-text-muted);
    margin-bottom: 8px;
    line-height: 1.5;
  }

  .guide-item__tags {
    display: flex;
    gap: 6px;
    flex-wrap: wrap;
  }

  .tag {
    background: var(--clr-primary-pale);
    color: var(--clr-primary);
    font-size: .72rem;
    padding: 2px 8px;
    border-radius: 20px;
  }

  /* Announcements */
  .announce-list {
    display: flex;
    flex-direction: column;
    gap: 0;
  }

  .announce-item {
    padding: 14px 0;
    border-bottom: 1px solid var(--clr-border);
  }

  .announce-item:last-of-type {
    border-bottom: none;
  }

  .announce-item__date {
    font-size: .75rem;
    color: var(--clr-text-light);
    margin-bottom: 4px;
    font-family: var(--font-en);
  }

  .announce-item__title {
    font-size: .88rem;
    color: var(--clr-text);
    line-height: 1.5;
  }

  /* Sections */
  .page-section {
    margin-bottom: 36px;
  }

  @media (max-width: 600px) {
    .hero {
      flex-direction: column;
      padding: 28px 20px;
    }

    .hero__illustration {
      display: none;
    }

    .hero__title {
      font-size: 1.2rem;
    }

    .service-grid {
      grid-template-columns: repeat(3, 1fr);
    }
  }
</style>