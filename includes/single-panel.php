<?php

/**
 * includes/single-panel.php
 *
 * ไฟล์กลางสำหรับแสดง Sidebar + Content เต็มหน้า
 *
 * ตัวแปรที่ต้องส่งมาก่อน include:
 *   $panel_title   string  — ชื่อหัวข้อใหญ่ เช่น 'บริการ IT'
 *   $panel_cat     string  — ค่า cat ปัจจุบัน (จาก $_GET['cat'])
 *   $panel_base    string  — URL ของไฟล์นี้ เช่น 'services.php'
 *   $panel_menu    array   — [ 'key' => ['label'=>'...'], ... ]
 *   $panel_items   array   — รายการทั้งหมด แต่ละรายการมี:
 *                              'cat', 'icon', 'title', 'desc'
 *                            และอาจมี 'steps', 'time', 'extra_html'
 *   $panel_contact bool    — แสดงกล่องโทรศัพท์หรือไม่ (default true)
 */

$panel_contact = $panel_contact ?? true;
$current = $panel_cat;

// กรองรายการตาม cat
if ($current) {
  $filtered = array_values(array_filter($panel_items, fn($x) => $x['cat'] === $current));
} else {
  $filtered = array_values($panel_items);
}
?>

<div class="sp-layout">

  <!-- SIDEBAR -->
  <aside class="sp-sidebar">
    <div class="sp-sidebar-card">
      <div class="sp-sidebar-title">หมวดหมู่</div>
      <ul class="sp-menu">
        <li>
          <a href="<?= htmlspecialchars($panel_base) ?>"
            class="sp-menu__link <?= $current === '' ? 'sp-menu__link--active' : '' ?>">
            ทั้งหมด
          </a>
        </li>
        <?php foreach ($panel_menu as $key => $item): ?>
          <li>
            <a href="<?= htmlspecialchars($panel_base) ?>?cat=<?= urlencode($key) ?>"
              class="sp-menu__link <?= $current === $key ? 'sp-menu__link--active' : '' ?>">
              <?= htmlspecialchars($item['label']) ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

    <?php if ($panel_contact): ?>
      <div class="sp-sidebar-card sp-contact">
        <div class="sp-sidebar-title">ต้องการความช่วยเหลือ?</div>
        <p>โทรติดต่อเจ้าหน้าที่โดยตรง</p>
        <a href="tel:<?= SITE_PHONE ?>" class="btn btn--primary btn--sm sp-contact__btn">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.41 2 2 0 0 1 3.6 1.23h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.91a16 16 0 0 0 6.18 6.18l.95-.95a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" />
          </svg>
          <?= SITE_PHONE ?>
        </a>
      </div>
    <?php endif; ?>
  </aside>

  <!-- MAIN CONTENT -->
  <div class="sp-content">

    <?php if (empty($filtered)): ?>
      <div class="sp-empty">ไม่พบข้อมูลในหมวดหมู่นี้</div>

    <?php elseif ($current && count($filtered) === 1): ?>
      <!-- ===== SINGLE VIEW (เต็มหน้า) ===== -->
      <?php $item = $filtered[0]; ?>
      <h1 class="sp-page-title"><?= htmlspecialchars($item['title']) ?></h1>

      <div class="sp-single">

        <div class="sp-single__head">
          <span class="sp-single__icon"><?= $item['icon'] ?></span>
          <div>
            <div class="sp-single__name"><?= htmlspecialchars($item['title']) ?></div>
            <?php if (!empty($item['time'])): ?>
              <span class="sp-single__time">⏱ <?= htmlspecialchars($item['time']) ?></span>
            <?php endif; ?>
          </div>
        </div>

        <?php if (!empty($item['desc'])): ?>
          <p class="sp-single__desc"><?= htmlspecialchars($item['desc']) ?></p>
        <?php endif; ?>

        <?php if (!empty($item['steps'])): ?>
          <div class="sp-single__steps">
            <div class="sp-steps-label">ขั้นตอนการขอรับบริการ</div>
            <ol class="sp-steps-list">
              <?php foreach ($item['steps'] as $i => $step): ?>
                <li>
                  <span class="sp-step-num"><?= $i + 1 ?></span>
                  <span><?= htmlspecialchars($step) ?></span>
                </li>
              <?php endforeach; ?>
            </ol>
          </div>
        <?php endif; ?>

        <?php if (!empty($item['extra_html'])): ?>
          <div class="sp-single__extra"><?= $item['extra_html'] ?></div>
        <?php endif; ?>

        <!-- <div class="sp-single__footer">
          <a href="#" class="btn btn--primary sp-single__cta">ขอรับบริการนี้ →</a>
        </div> -->

      </div><!-- /.sp-single -->

    <?php else: ?>
      <!-- ===== GRID VIEW (หน้าแรก / ไม่มี cat) ===== -->
      <h1 class="sp-page-title"><?= htmlspecialchars($panel_title) ?></h1>
      <div class="sp-grid">
        <?php foreach ($filtered as $item): ?>
          <a href="<?= htmlspecialchars($panel_base) ?>?cat=<?= urlencode($item['cat']) ?>" class="sp-grid-card">
            <div class="sp-grid-card__icon"><?= $item['icon'] ?></div>
            <div class="sp-grid-card__body">
              <div class="sp-grid-card__title"><?= htmlspecialchars($item['title']) ?></div>
              <div class="sp-grid-card__desc"><?= htmlspecialchars($item['desc']) ?></div>
            </div>
            <?php if (!empty($item['time'])): ?>
              <span class="sp-grid-card__time">⏱ <?= htmlspecialchars($item['time']) ?></span>
            <?php endif; ?>
          </a>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

  </div><!-- /.sp-content -->
</div><!-- /.sp-layout -->

<style>
  /* ============================================================
   SINGLE-PANEL — shared layout
   ============================================================ */

  .sp-layout {
    display: grid;
    grid-template-columns: 210px 1fr;
    gap: 28px;
    align-items: start;
  }

  @media (max-width: 800px) {
    .sp-layout {
      grid-template-columns: 1fr;
    }
  }

  /* --- Sidebar --- */
  .sp-sidebar-card {
    background: var(--clr-surface);
    border: 1px solid var(--clr-border);
    border-radius: var(--radius-lg);
    padding: 18px;
    margin-bottom: 14px;
    box-shadow: var(--shadow-sm);
  }

  .sp-sidebar-title {
    font-size: .76rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: .07em;
    color: var(--clr-text-muted);
    margin-bottom: 10px;
  }

  .sp-menu {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .sp-menu__link {
    display: block;
    padding: 8px 10px;
    border-radius: var(--radius-sm);
    font-size: .87rem;
    color: var(--clr-text-muted);
    border-left: 3px solid transparent;
    transition: background .15s, color .15s;
  }

  .sp-menu__link:hover {
    background: var(--clr-primary-pale);
    color: var(--clr-primary);
  }

  .sp-menu__link--active {
    background: var(--clr-primary-pale);
    color: var(--clr-primary);
    border-left-color: var(--clr-primary);
    font-weight: 500;
  }

  .sp-contact p {
    font-size: .82rem;
    color: var(--clr-text-muted);
    margin-bottom: 8px;
  }

  .sp-contact__btn {
    width: 100%;
    justify-content: center;
  }

  /* --- Page title --- */
  .sp-page-title {
    font-size: 1.4rem;
    font-weight: 600;
    color: var(--clr-primary-dark);
    margin-bottom: 20px;
  }

  /* --- Empty --- */
  .sp-empty {
    padding: 60px;
    text-align: center;
    color: var(--clr-text-muted);
  }

  /* ============================================================
   SINGLE VIEW — เต็มพื้นที่
   ============================================================ */
  .sp-single {
    background: var(--clr-surface);
    border: 1px solid var(--clr-border);
    border-radius: var(--radius-lg);
    padding: 32px 36px;
    box-shadow: var(--shadow-sm);
    display: flex;
    flex-direction: column;
    gap: 24px;
    /* เต็มความกว้าง */
    width: 100%;
  }

  .sp-single__head {
    display: flex;
    align-items: flex-start;
    gap: 16px;
  }

  .sp-single__icon {
    width: 52px;
    height: 52px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--clr-primary-pale);
    border-radius: 12px;
    flex-shrink: 0;
  }

  .sp-single__icon svg {
    stroke: var(--clr-primary);
  }

  .sp-single__name {
    font-size: 1.15rem;
    font-weight: 600;
    color: var(--clr-text);
    margin-bottom: 4px;
  }

  .sp-single__time {
    display: inline-block;
    font-size: .78rem;
    color: var(--clr-text-muted);
    background: var(--clr-bg);
    padding: 3px 10px;
    border-radius: 20px;
  }

  .sp-single__desc {
    font-size: .95rem;
    color: var(--clr-text-muted);
    line-height: 1.75;
    padding-bottom: 8px;
    border-bottom: 1px solid var(--clr-border);
  }

  /* Steps */
  .sp-steps-label {
    font-size: .78rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: .05em;
    color: var(--clr-text-muted);
    margin-bottom: 14px;
  }

  .sp-steps-list {
    list-style: none;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 14px;
  }

  .sp-steps-list li {
    display: flex;
    align-items: center;
    gap: 14px;
    font-size: .95rem;
    color: var(--clr-text);
  }

  .sp-step-num {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: var(--clr-primary);
    color: #fff;
    font-size: .82rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }

  .sp-single__footer {
    padding-top: 8px;
    border-top: 1px solid var(--clr-border);
  }

  .sp-single__cta {
    padding: 11px 32px;
    font-size: .95rem;
    width: 100%;
    justify-content: center;
  }

  /* ============================================================
   GRID VIEW
   ============================================================ */
  .sp-grid {
    display: flex;
    flex-direction: column;
    gap: 12px;
  }

  .sp-grid-card {
    display: flex;
    align-items: center;
    gap: 16px;
    background: var(--clr-surface);
    border: 1px solid var(--clr-border);
    border-radius: var(--radius-lg);
    padding: 18px 20px;
    box-shadow: var(--shadow-sm);
    transition: box-shadow .2s, border-color .2s, transform .2s;
    text-decoration: none;
  }

  .sp-grid-card:hover {
    box-shadow: var(--shadow-md);
    border-color: var(--clr-primary);
    transform: translateX(4px);
  }

  .sp-grid-card__icon {
    width: 46px;
    height: 46px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--clr-primary-pale);
    border-radius: 10px;
    flex-shrink: 0;
  }

  .sp-grid-card__icon svg {
    stroke: var(--clr-primary);
  }

  .sp-grid-card__body {
    flex: 1;
    min-width: 0;
  }

  .sp-grid-card__title {
    font-size: .95rem;
    font-weight: 600;
    color: var(--clr-text);
    margin-bottom: 3px;
  }

  .sp-grid-card__desc {
    font-size: .82rem;
    color: var(--clr-text-muted);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .sp-grid-card__time {
    font-size: .75rem;
    color: var(--clr-text-muted);
    background: var(--clr-bg);
    padding: 3px 10px;
    border-radius: 20px;
    white-space: nowrap;
    flex-shrink: 0;
  }
</style>