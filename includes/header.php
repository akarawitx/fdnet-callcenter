<!-- // includes/header.php -->
<?php
// includes/header.php
// Requires $page_title to be set in the calling page.
// Optionally $page_description.
if (!isset($page_title))       $page_title       = SITE_NAME;
if (!isset($page_description)) $page_description = 'ศูนย์บริการสารสนเทศ วัดพระธรรมกาย — บริการให้คำปรึกษา ติดตั้ง และแก้ไขปัญหาด้านสารสนเทศ';

// Recursive helper: render one level of nav items
function render_nav_items(array $items, int $depth = 0): void
{
  $class = $depth === 0 ? 'nav__list' : 'nav__dropdown';
  echo '<ul class="' . $class . '">';
  foreach ($items as $item) {
    $has_children = !empty($item['children']);
    $li_class     = $has_children ? 'nav__item nav__item--has-children' : 'nav__item';
    $active       = is_active($item['url']) ? ' nav__link--active' : '';
    echo '<li class="' . $li_class . '">';
    echo '<a href="' . htmlspecialchars($item['url']) . '" class="nav__link' . $active . '">';
    if ($depth === 0 && !empty($item['icon'])) {
      echo '<span class="nav__icon">' . $item['icon'] . '</span>';
    }
    echo htmlspecialchars($item['label']);
    if ($has_children) echo '<span class="nav__arrow">›</span>';
    echo '</a>';
    if ($has_children) {
      render_nav_items($item['children'], $depth + 1);
    }
    echo '</li>';
  }
  echo '</ul>';
}
?>
<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($page_title) ?> — <?= SITE_NAME ?></title>
  <meta name="description" content="<?= htmlspecialchars($page_description) ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300;400;500;600&family=IBM+Plex+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <style>
    /* ============================================================
   CSS VARIABLES & RESET
   ============================================================ */
    :root {
      --clr-primary: #4a90b8;
      --clr-primary-dark: #2e6f96;
      --clr-primary-pale: #eef6fb;
      --clr-accent: #c9a84c;
      --clr-white: #ffffff;
      --clr-bg: #f5f8fc;
      --clr-surface: #ffffff;
      --clr-border: #dde8f2;
      --clr-text: #1e2c3a;
      --clr-text-muted: #5a7186;
      --clr-text-light: #8dafc7;
      --clr-success: #1f8c5b;
      --clr-warning: #d97706;
      --clr-danger: #c0392b;

      --font-th: 'IBM Plex Sans Thai', sans-serif;
      --font-en: 'IBM Plex Sans', sans-serif;

      --radius-sm: 4px;
      --radius-md: 8px;
      --radius-lg: 14px;
      --shadow-sm: 0 1px 3px rgba(26, 111, 168, .08), 0 1px 2px rgba(0, 0, 0, .04);
      --shadow-md: 0 4px 16px rgba(26, 111, 168, .10), 0 2px 6px rgba(0, 0, 0, .04);
      --shadow-lg: 0 10px 40px rgba(26, 111, 168, .14);

      --header-h: 64px;
      --sidebar-w: 248px;
      --nav-h: 52px;
    }

    *,
    *::before,
    *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    html {
      scroll-behavior: smooth;
      font-size: 15px;
    }

    body {
      font-family: var(--font-th);
      background: var(--clr-bg);
      color: var(--clr-text);
      line-height: 1.65;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    a {
      color: inherit;
      text-decoration: none;
    }

    ul {
      list-style: none;
    }

    img {
      display: block;
      max-width: 100%;
    }

    /* ============================================================
   HEADER / BRANDING
   ============================================================ */
    .site-header {
      background: var(--clr-white);
      height: var(--header-h);
      display: flex;
      align-items: center;
      padding: 0 24px;
      gap: 16px;
      border-bottom: 1px solid var(--clr-border);
      box-shadow: var(--shadow-sm);
      position: sticky;
      top: 0;
      z-index: 200;
    }

    .site-header__logo {
      width: 48px;
      height: 48px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .site-header__logo-img {
      width: 100%;
      height: 100%;
      object-fit: contain;
    }

    .site-header__brand {
      flex: 1;
    }

    .site-header__name {
      font-size: 1.05rem;
      font-weight: 600;
      color: var(--clr-primary-dark);
      letter-spacing: .01em;
      line-height: 1.2;
    }

    .site-header__sub {
      font-family: var(--font-en);
      font-size: .73rem;
      color: var(--clr-text-muted);
      font-weight: 400;
    }

    .site-header__search {
      display: flex;
      align-items: center;
      background: var(--clr-bg);
      border: 1px solid var(--clr-border);
      border-radius: 8px;
      padding: 0 12px;
      gap: 8px;
      transition: border-color .2s, box-shadow .2s;
    }

    .site-header__search:focus-within {
      border-color: var(--clr-primary);
      box-shadow: 0 0 0 3px rgba(26, 111, 168, .12);
    }

    .site-header__search input {
      border: none;
      background: transparent;
      outline: none;
      font-family: var(--font-th);
      font-size: .88rem;
      color: var(--clr-text);
      width: 200px;
      padding: 9px 0;
    }

    .site-header__search input::placeholder {
      color: var(--clr-text-light);
    }

    .site-header__search button {
      border: none;
      background: none;
      color: var(--clr-primary);
      cursor: pointer;
      font-size: 1rem;
      padding: 0;
      line-height: 1;
    }

    .hamburger {
      display: none;
      background: none;
      border: none;
      cursor: pointer;
      flex-direction: column;
      gap: 5px;
      padding: 6px;
    }

    .hamburger span {
      display: block;
      width: 22px;
      height: 2px;
      background: var(--clr-primary);
      border-radius: 2px;
      transition: transform .3s, opacity .3s;
    }

    /* ============================================================
   PRIMARY NAVIGATION BAR
   ============================================================ */
    .nav-bar {
      background: var(--clr-primary);
      position: sticky;
      top: var(--header-h);
      z-index: 190;
      box-shadow: 0 2px 8px rgba(26, 111, 168, .2);
    }

    .nav__list {
      display: flex;
      max-width: 1280px;
      margin: 0 auto;
      padding: 0 16px;
      position: relative;
    }

    .nav__item {
      position: relative;
    }

    .nav__link {
      display: flex;
      align-items: center;
      gap: 6px;
      padding: 0 14px;
      height: var(--nav-h);
      color: rgba(255, 255, 255, .88);
      font-size: .86rem;
      font-weight: 500;
      transition: background .2s, color .2s;
      white-space: nowrap;
    }

    .nav__link:hover,
    .nav__link--active {
      background: rgba(255, 255, 255, .15);
      color: #fff;
    }

    .nav__icon {
      font-size: .95rem;
      display: flex;
      align-items: center;
    }

    .nav__icon svg {
      stroke: rgba(255, 255, 255, .88);
    }

    .nav__link:hover .nav__icon svg,
    .nav__link--active .nav__icon svg {
      stroke: #fff;
    }

    .nav__arrow {
      font-size: .7rem;
      margin-left: 2px;
      display: inline-block;
      transition: transform .25s;
    }

    .nav__item--has-children:hover .nav__arrow {
      transform: rotate(90deg);
    }

    /* Dropdown */
    .nav__dropdown {
      display: none;
      position: absolute;
      top: 100%;
      left: 0;
      min-width: 220px;
      background: var(--clr-white);
      border: 1px solid var(--clr-border);
      border-top: 2px solid var(--clr-primary);
      border-radius: 0 0 var(--radius-md) var(--radius-md);
      box-shadow: var(--shadow-lg);
      z-index: 300;
      padding: 6px 0;
      animation: fade-drop .18s ease;
    }

    @keyframes fade-drop {
      from {
        opacity: 0;
        transform: translateY(-6px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .nav__item--has-children:hover>.nav__dropdown {
      display: block;
    }

    .nav__dropdown .nav__item {
      position: relative;
    }

    .nav__dropdown .nav__link {
      color: var(--clr-text);
      height: auto;
      padding: 9px 16px;
      font-size: .85rem;
      font-weight: 400;
      border-radius: 0;
      justify-content: space-between;
    }

    .nav__dropdown .nav__link:hover {
      background: var(--clr-primary-pale);
      color: var(--clr-primary);
    }

    .nav__dropdown .nav__link--active {
      background: var(--clr-primary-pale);
      color: var(--clr-primary);
      font-weight: 500;
    }

    /* Sub-dropdown (3rd level) */
    .nav__dropdown .nav__dropdown {
      top: 0;
      left: 100%;
      border-top: 2px solid var(--clr-primary);
    }

    /* ============================================================
   LAYOUT
   ============================================================ */
    .layout {
      flex: 1;
      display: flex;
    }

    .layout__main {
      flex: 1;
      max-width: 1280px;
      margin: 0 auto;
      padding: 32px 24px 48px;
      width: 100%;
    }

    .layout--with-sidebar .layout__main {
      max-width: none;
    }

    .layout__sidebar {
      width: var(--sidebar-w);
      flex-shrink: 0;
      padding: 24px 0 24px 24px;
      display: none;
      /* shown per-page */
    }

    /* ============================================================
   BREADCRUMB
   ============================================================ */
    .breadcrumb {
      display: flex;
      align-items: center;
      gap: 6px;
      font-size: .8rem;
      color: var(--clr-text-muted);
      margin-bottom: 24px;
    }

    .breadcrumb a {
      color: var(--clr-primary);
    }

    .breadcrumb a:hover {
      text-decoration: underline;
    }

    .breadcrumb__sep {
      color: var(--clr-text-light);
    }

    /* ============================================================
   CARDS & COMMON COMPONENTS
   ============================================================ */
    .card {
      background: var(--clr-surface);
      border: 1px solid var(--clr-border);
      border-radius: var(--radius-lg);
      padding: 24px;
      box-shadow: var(--shadow-sm);
      transition: box-shadow .2s, transform .2s;
    }

    .card:hover {
      box-shadow: var(--shadow-md);
      transform: translateY(-2px);
    }

    .section-title {
      font-size: 1.05rem;
      font-weight: 600;
      color: var(--clr-primary-dark);
      padding-bottom: 12px;
      margin-bottom: 20px;
      border-bottom: 2px solid var(--clr-primary-pale);
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .section-title::before {
      content: '';
      display: block;
      width: 4px;
      height: 18px;
      background: var(--clr-primary);
      border-radius: 2px;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 9px 20px;
      border-radius: var(--radius-md);
      font-family: var(--font-th);
      font-size: .9rem;
      font-weight: 500;
      cursor: pointer;
      border: none;
      transition: all .2s;
    }

    .btn--primary {
      background: var(--clr-primary);
      color: #fff;
    }

    .btn--primary:hover {
      background: var(--clr-primary-dark);
      box-shadow: 0 4px 12px rgba(26, 111, 168, .25);
    }

    .btn--outline {
      background: transparent;
      color: var(--clr-primary);
      border: 1.5px solid var(--clr-primary);
    }

    .btn--outline:hover {
      background: var(--clr-primary-pale);
    }

    .btn--sm {
      padding: 6px 14px;
      font-size: .82rem;
    }

    .badge {
      display: inline-block;
      padding: 2px 8px;
      border-radius: 20px;
      font-size: .72rem;
      font-weight: 500;
    }

    .badge--blue {
      background: var(--clr-primary-pale);
      color: var(--clr-primary);
    }

    .badge--green {
      background: #d1fae5;
      color: #065f46;
    }

    .badge--amber {
      background: #fef3c7;
      color: #92400e;
    }

    .badge--new {
      background: var(--clr-accent);
      color: #fff;
    }

    /* ============================================================
   MOBILE NAV OVERLAY
   ============================================================ */
    .mobile-nav-overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, .4);
      z-index: 400;
      backdrop-filter: blur(2px);
    }

    .mobile-nav {
      position: fixed;
      top: 0;
      left: 0;
      bottom: 0;
      width: 300px;
      background: var(--clr-white);
      z-index: 401;
      overflow-y: auto;
      transform: translateX(-100%);
      transition: transform .3s cubic-bezier(.4, 0, .2, 1);
      box-shadow: var(--shadow-lg);
    }

    .mobile-nav.open {
      transform: translateX(0);
    }

    .mobile-nav__header {
      background: var(--clr-primary);
      color: #fff;
      padding: 20px 16px;
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .mobile-nav__close {
      margin-left: auto;
      background: rgba(255, 255, 255, .2);
      border: none;
      color: #fff;
      width: 32px;
      height: 32px;
      border-radius: 50%;
      font-size: 1.1rem;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .mobile-menu-list {
      padding: 8px 0;
    }

    .mobile-menu-list a {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 12px 20px;
      color: var(--clr-text);
      font-size: .9rem;
      border-left: 3px solid transparent;
      transition: background .15s, border-color .15s;
    }

    .mobile-menu-list a:hover {
      background: var(--clr-primary-pale);
      border-left-color: var(--clr-primary);
    }

    .mobile-submenu {
      background: var(--clr-bg);
    }

    .mobile-submenu a {
      padding-left: 44px;
      font-size: .85rem;
    }

    .mobile-group-label {
      padding: 14px 20px 4px;
      font-size: .72rem;
      font-weight: 600;
      color: var(--clr-text-muted);
      text-transform: uppercase;
      letter-spacing: .08em;
    }

    .mobile-divider {
      height: 1px;
      background: var(--clr-border);
      margin: 8px 0;
    }

    .mobile-toggle-btn {
      width: 100%;
      background: none;
      border: none;
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 12px 20px;
      color: var(--clr-text);
      font-family: var(--font-th);
      font-size: .9rem;
      cursor: pointer;
      text-align: left;
      border-left: 3px solid transparent;
      transition: background .15s;
    }

    .mobile-toggle-btn:hover {
      background: var(--clr-primary-pale);
    }

    .mobile-toggle-btn .mobile-chevron {
      margin-left: auto;
      transition: transform .25s;
      font-size: .75rem;
    }

    .mobile-toggle-btn.open .mobile-chevron {
      transform: rotate(90deg);
    }

    .mobile-submenu {
      display: none;
    }

    .mobile-submenu.open {
      display: block;
    }

    @media (max-width: 900px) {
      .nav-bar {
        display: none;
      }

      .hamburger {
        display: flex;
      }

      .site-header__search input {
        width: 140px;
      }
    }

    @media (max-width: 580px) {
      .site-header__search {
        display: none;
      }
    }
  </style>
</head>

<body>

  <!-- SITE HEADER -->
  <header class="site-header">
    <button class="hamburger" id="hamburger-btn" aria-label="เมนู">
      <span></span><span></span><span></span>
    </button>
    <div class="site-header__logo">
      <img src="<?= BASE_URL ?>/assets/images/logo.png" alt="<?= SITE_NAME ?>" class="site-header__logo-img">
    </div>
    <div class="site-header__brand">
      <div class="site-header__name"><?= SITE_NAME_EN ?></div>
      <div class="site-header__sub"><?= SITE_NAME ?></div>
    </div>
    <div class="site-header__search">
      <button type="button" aria-label="ค้นหา">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="11" cy="11" r="8" />
          <line x1="21" y1="21" x2="16.65" y2="16.65" />
        </svg>
      </button>
      <input type="search" placeholder="ค้นหาคู่มือ, บริการ...">
    </div>
  </header>

  <!-- PRIMARY NAV BAR -->
  <nav class="nav-bar" role="navigation" aria-label="เมนูหลัก">
    <?php render_nav_items(get_navigation()); ?>
  </nav>

  <!-- MOBILE NAV -->
  <div class="mobile-nav-overlay" id="mobile-overlay"></div>
  <div class="mobile-nav" id="mobile-nav">
    <div class="mobile-nav__header">
      <div class="site-header__logo" style="width:36px;height:36px;background:none;box-shadow:none">
        <img src="<?= BASE_URL ?>/assets/images/logo.png" alt="<?= SITE_NAME ?>" style="width:100%;height:100%;object-fit:contain">
      </div>
      <div>
        <div style="font-weight:600;font-size:.95rem"><?= SITE_NAME ?></div>
        <div style="font-size:.72rem;opacity:.75"><?= SITE_NAME_EN ?></div>
      </div>
      <button class="mobile-nav__close" id="mobile-close-btn">✕</button>
    </div>
    <ul class="mobile-menu-list">
      <?php foreach (get_navigation() as $item):
        $has = !empty($item['children']);
      ?>
        <?php if ($has): ?>
          <li>
            <button class="mobile-toggle-btn">
              <span><?= $item['icon'] ?? '' ?></span>
              <?= htmlspecialchars($item['label']) ?>
              <span class="mobile-chevron">›</span>
            </button>
            <ul class="mobile-submenu">
              <?php foreach ($item['children'] as $child):
                $has2 = !empty($child['children']);
              ?>
                <?php if ($has2): ?>
                  <li>
                    <button class="mobile-toggle-btn" style="padding-left:44px;font-size:.85rem">
                      <?= htmlspecialchars($child['label']) ?>
                      <span class="mobile-chevron">›</span>
                    </button>
                    <ul class="mobile-submenu" style="background:#edf2f7">
                      <?php foreach ($child['children'] as $gc): ?>
                        <li><a href="<?= htmlspecialchars($gc['url']) ?>" style="padding-left:64px;font-size:.82rem"><?= htmlspecialchars($gc['label']) ?></a></li>
                      <?php endforeach; ?>
                    </ul>
                  </li>
                <?php else: ?>
                  <li><a href="<?= htmlspecialchars($child['url']) ?>"><?= htmlspecialchars($child['label']) ?></a></li>
                <?php endif; ?>
              <?php endforeach; ?>
            </ul>
          </li>
        <?php else: ?>
          <li><a href="<?= htmlspecialchars($item['url']) ?>"><span><?= $item['icon'] ?? '' ?></span> <?= htmlspecialchars($item['label']) ?></a></li>
        <?php endif; ?>
      <?php endforeach; ?>
    </ul>
  </div>

  <!-- MAIN LAYOUT -->
  <div class="layout">