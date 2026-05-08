<?php
// pages/support.php — ปัญหาที่พบบ่อย (FAQ)
require_once '../includes/config.php';
$page_title = 'ปัญหาที่พบบ่อย';
$cat = $_GET['cat'] ?? '';

$sections = [
  'redlogin'  => ['label' => 'เข้าหน้าแดงไม่ได้'],
  'hrweb'     => ['label' => 'เข้าเว็บ HR ไม่ได้'],
];

// ── Helper: สร้าง accordion item ──────────────────────────────────
function faq_accordion(string $id, string $title, string $body_html): string
{
  return '
    <div class="faq-acc" id="faq-' . $id . '">
      <button class="faq-acc__btn" onclick="faqToggle(\'faq-' . $id . '\')" type="button">
        <span class="faq-acc__indicator"></span>
        <span class="faq-acc__title">' . $title . '</span>
        <span class="faq-acc__chevron">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
               stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="6 9 12 15 18 9"/>
          </svg>
        </span>
      </button>
      <div class="faq-acc__body">
        <div class="faq-acc__inner">' . $body_html . '</div>
      </div>
    </div>';
}

// ── Helper: inline action button ─────────────────────────────────
function faq_action_btn(string $url, string $label, string $color = 'primary'): string
{
  $styles = [
    'primary' => 'background:var(--clr-primary);color:#fff;border:1.5px solid var(--clr-primary);',
    'outline' => 'background:transparent;color:var(--clr-primary);border:1.5px solid var(--clr-primary);',
  ];
  $s = $styles[$color] ?? $styles['primary'];
  return '<a href="' . htmlspecialchars($url) . '"
     style="display:inline-flex;align-items:center;gap:7px;padding:8px 18px;
            border-radius:7px;font-size:.84rem;font-weight:600;text-decoration:none;
            transition:opacity .15s;' . $s . '"
     onmouseover="this.style.opacity=\'.82\'" onmouseout="this.style.opacity=\'1\'">' .
     $label . ' <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
       stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
       <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
     </svg></a>';
}

// ── Helper: สร้างกล่อง "สาเหตุที่พบบ่อย" ──────────────────────
function faq_cause_box(string $title, string $desc, string $type = 'info'): string
{
  $colors = [
    'info'    => ['border' => '#cbd5e1', 'dot' => '#64748b'],
    'warning' => ['border' => '#fbbf24', 'dot' => '#d97706'],
    'danger'  => ['border' => '#fca5a5', 'dot' => '#dc2626'],
  ];
  $c = $colors[$type] ?? $colors['info'];
  return '<div style="border:1px solid ' . $c['border'] . ';border-radius:10px;
              padding:14px 16px;margin-bottom:10px">
    <div style="display:flex;align-items:flex-start;gap:10px">
      <div style="width:8px;height:8px;border-radius:50%;background:' . $c['dot'] . ';
                  flex-shrink:0;margin-top:6px"></div>
      <div style="flex:1">
        <div style="font-weight:600;font-size:.88rem;color:var(--clr-text);margin-bottom:4px">' . $title . '</div>
        <div style="font-size:.83rem;color:var(--clr-text-muted);line-height:1.7">' . $desc . '</div>
      </div>
    </div>
  </div>';
}

// ── Helper: divider label ─────────────────────────────────────────
function faq_divider(string $label): string
{
  return '<div style="margin:16px 0 12px"></div>';
}

// ════════════════════════════════════════════════════════════════
// $support_items
// ════════════════════════════════════════════════════════════════
$support_items = [

  // ──────────────────────────────────────────────────────────────
  // 1. เข้าหน้าแดงไม่ได้
  // ──────────────────────────────────────────────────────────────
  [
    'cat'   => 'redlogin',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="2" y="3" width="20" height="14" rx="2"/>
                  <line x1="8" y1="21" x2="16" y2="21"/>
                  <line x1="12" y1="17" x2="12" y2="21"/>
                  <line x1="9" y1="9" x2="9.01" y2="9" stroke-width="3"/>
                  <line x1="12" y1="9" x2="15" y2="9"/>
                  <line x1="9" y1="13" x2="15" y2="13"/>
                </svg>',
    'title' => 'เข้าหน้าแดงไม่ได้ / เข้าใช้อินเทอร์เน็ตไม่ได้',
    'desc'  => 'รวมปัญหาที่พบบ่อยเมื่อไม่สามารถ Login หน้าแดง FD-NET หรือใช้งานอินเทอร์เน็ตไม่ได้',
    'extra_html' => '

      <p style="font-size:.9rem;line-height:1.8;color:var(--clr-text-muted);margin-bottom:20px">
        ปัญหาการเข้าใช้อินเทอร์เน็ตผ่านหน้าแดง FD-NET มักเกิดจากสาเหตุใดสาเหตุหนึ่งด้านล่าง
        กรุณาตรวจสอบตามลำดับก่อนติดต่อเจ้าหน้าที่
      </p>

      <div class="faq-group">' .

        faq_accordion('rl1', 'บัญชีถูกล็อคชั่วคราว (ใส่รหัสผิดหลายครั้ง)', '
          ' . faq_cause_box(
            'สาเหตุ',
            'ระบบจะล็อคบัญชีอัตโนมัติหาก <strong>ใส่รหัสผ่านผิดติดต่อกัน 30 ครั้ง</strong> ภายใน 5 ชั่วโมง
             เพื่อป้องกันการเข้าถึงโดยไม่ได้รับอนุญาต',
            'warning'
          ) . '
          <div style="font-size:.85rem;color:var(--clr-text);line-height:1.8;margin-bottom:16px">
            บัญชีที่ถูกล็อคจะปลดล็อคอัตโนมัติหลังครบ 5 ชั่วโมง
            หรือสามารถติดต่อเจ้าหน้าที่เพื่อปลดล็อคได้ทันที
          </div>
          ' . faq_divider('แนวทางแก้ไข') . '
          <div style="display:flex;gap:10px;flex-wrap:wrap">
            ' . faq_action_btn('services.php?cat=reset', 'รีเซทรหัสผ่าน', 'primary') . '
          </div>
        ') .

        faq_accordion('rl2', 'รหัสผ่านหมดอายุ หรือจำรหัสผ่านไม่ได้', '
          ' . faq_cause_box(
            'สาเหตุ',
            'รหัสผ่านขององค์กรมีอายุการใช้งาน เมื่อหมดอายุจะไม่สามารถ Login ได้
             หรืออาจเกิดจากการลืมรหัสผ่านที่ตั้งไว้',
            'info'
          ) . '
          <div style="font-size:.85rem;color:var(--clr-text);line-height:1.8;margin-bottom:16px">
            สามารถรีเซทรหัสผ่านด้วยตัวเองได้ตลอด 24 ชั่วโมง
            ผ่านระบบ OTP ที่ส่งไปยัง Email ที่ผูกไว้กับบัญชี
          </div>
          ' . faq_divider('แนวทางแก้ไข') . '
          <div style="display:flex;gap:10px;flex-wrap:wrap">
            ' . faq_action_btn('services.php?cat=reset', 'รีเซทรหัสผ่านด้วยตัวเอง', 'primary') . '
            ' . faq_action_btn('services.php?cat=status', 'เช็กสถานะ Account/รหัสผ่าน', 'primary') . '
          </div>
        ') .

        faq_accordion('rl3', 'Account ถูกระงับการใช้งาน (Account Disabled)', '
          ' . faq_cause_box(
            'ไม่ได้ต่ออายุ Account ประจำปี',
            'บัญชีที่ไม่ได้ต่ออายุภายในเดือนธันวาคมของทุกปีจะถูกระงับการใช้งานโดยอัตโนมัติ',
            'danger'
          ) . '
          ' . faq_cause_box(
            'สาเหตุอื่น',
            'อาจเกิดจากการฝ่าฝืนนโยบายการใช้งาน หรือผู้ดูแลระบบดำเนินการตามขั้นตอน',
            'info'
          ) . '
          ' . faq_divider('แนวทางแก้ไข') . '
          <div style="font-size:.85rem;color:var(--clr-text);line-height:1.8;margin-bottom:16px">
            กรุณาตรวจสอบสถานะบัญชีก่อน หากบัญชีถูกระงับจะต้องติดต่อเจ้าหน้าที่
            เพื่อดำเนินการต่ออายุหรือขอเปิดใช้งานใหม่
          </div>
          <div style="display:flex;gap:10px;flex-wrap:wrap">
            ' . faq_action_btn('services.php?cat=status', 'เช็กสถานะ Account', 'primary') . '
            ' . faq_action_btn('services.php?cat=renew', 'ต่ออายุ Account', 'outline') . '
          </div>
        ') .

        faq_accordion('rl4', 'โควต้าอินเทอร์เน็ตหมด', '
          ' . faq_cause_box(
            'สาเหตุ',
            'แต่ละบัญชีมีโควต้าการใช้งานอินเทอร์เน็ตรายวัน เมื่อใช้งานครบจะไม่สามารถเชื่อมต่อได้จนกว่าจะเริ่มรอบวันใหม่',
            'info'
          ) . '
          ' . faq_divider('แนวทางแก้ไข') . '
          <div style="font-size:.85rem;color:var(--clr-text);line-height:1.8;margin-bottom:16px">
            ตรวจสอบปริมาณโควต้าที่ใช้ไปในแต่ละวันผ่านระบบ Sophos User Portal
            หากโควต้าหมดในวันนี้ รอบใหม่จะเริ่มในวันถัดไป
            หากต้องการเพิ่มโควต้าสามารถยื่นคำขอได้
          </div>
          <div style="display:flex;gap:10px;flex-wrap:wrap">
            ' . faq_action_btn('services.php?cat=quota', 'เช็กโควต้าอินเทอร์เน็ต', 'primary') . '
            ' . faq_action_btn('services.php?cat=internet', 'ขอเพิ่มโควต้า', 'outline') . '
          </div>
        ') .

      '</div>
    ',
  ],

  // ──────────────────────────────────────────────────────────────
  // 2. เข้าเว็บ HR ไม่ได้
  // ──────────────────────────────────────────────────────────────
  [
    'cat'   => 'hrweb',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                  <circle cx="12" cy="7" r="4"/>
                  <line x1="17" y1="11" x2="22" y2="11" stroke="#dc2626" stroke-width="2.5"/>
                </svg>',
    'title' => 'เข้าเว็บ HR ไม่ได้',
    'desc'  => 'รวมปัญหาที่พบบ่อยเมื่อไม่สามารถ Login เข้าระบบ HR ได้',
    'extra_html' => '

      <p style="font-size:.9rem;line-height:1.8;color:var(--clr-text-muted);margin-bottom:20px">
        ปัญหาการ Login เข้าระบบ HR มักเกิดจากสาเหตุต่อไปนี้
        กรุณาตรวจสอบตามลำดับ
      </p>

      <div class="faq-group">' .

        faq_accordion('hr1', 'กดปุ่ม Login ผิด', '
          <div style="font-size:.85rem;color:var(--clr-text);line-height:1.8;margin-bottom:16px">
            ในหน้าเว็บ HR มีปุ่ม Login หลายปุ่ม กรุณากดที่ปุ่ม
            <strong style="color:var(--clr-primary)">"Login เข้าสู่ระบบ HR"</strong> เท่านั้น
          </div>
          ' . faq_cause_box(
            'วิธีตรวจสอบ',
            'มองหาปุ่มที่มีข้อความว่า "Login เข้าสู่ระบบ HR" บนหน้าเว็บ HR
             ห้ามกดปุ่มอื่นหรือช่องทาง Login อื่นที่อาจปรากฏบนหน้าเดียวกัน',
            'info'
          ) . '
          <div style="border:1px solid var(--clr-border);border-radius:10px;overflow:hidden;margin-top:14px">
            <div style="...">ตัวอย่างปุ่มที่ถูกต้อง</div>

            <!-- รูปภาพจริง -->
            <img src="../assets/images/support/hr_login_button.png"
                alt="ตัวอย่างปุ่ม Login เข้าสู่ระบบ HR"
                style="width:100%;display:block;cursor:pointer">

            <!-- fallback ถ้ารูปโหลดไม่ได้ -->
            <div style="display:none;">ไม่พบรูปภาพ</div>
          </div>
        ') .

        faq_accordion('hr2', 'บัญชีถูกล็อคชั่วคราว (ใส่รหัสผิดหลายครั้ง)', '
          ' . faq_cause_box(
            'สาเหตุ',
            'ระบบจะล็อคบัญชีอัตโนมัติหาก <strong>ใส่รหัสผ่านผิดติดต่อกัน 30 ครั้ง</strong> ภายใน 5 ชั่วโมง
             บัญชีที่ถูกล็อคจะปลดล็อคเองหลังครบ 5 ชั่วโมง',
            'warning'
          ) . '
          ' . faq_divider('แนวทางแก้ไข') . '
          <div style="font-size:.85rem;color:var(--clr-text);line-height:1.8;margin-bottom:16px">
            รอให้ครบ 5 ชั่วโมงแล้วลอง Login ใหม่ หรือรีเซทรหัสผ่านเพื่อปลดล็อคทันที
          </div>
          <div style="display:flex;gap:10px;flex-wrap:wrap">
            ' . faq_action_btn('services.php?cat=reset', 'รีเซทรหัสผ่าน', 'primary') . '
          </div>
        ') .

        faq_accordion('hr3', 'รหัสผ่านหมดอายุ หรือจำรหัสผ่านไม่ได้', '
          ' . faq_cause_box(
            'สาเหตุ',
            'รหัสผ่านขององค์กรมีอายุการใช้งาน เมื่อหมดอายุจะไม่สามารถ Login เข้าระบบ HR ได้
             หรืออาจเกิดจากการลืมรหัสผ่าน',
            'info'
          ) . '
          ' . faq_divider('แนวทางแก้ไข') . '
          <div style="font-size:.85rem;color:var(--clr-text);line-height:1.8;margin-bottom:16px">
            สามารถรีเซทรหัสผ่านด้วยตัวเองได้ตลอด 24 ชั่วโมง ผ่านระบบ OTP Email
          </div>
          <div style="display:flex;gap:10px;flex-wrap:wrap">
            ' . faq_action_btn('services.php?cat=reset', 'รีเซทรหัสผ่านด้วยตัวเอง', 'primary') . '
            ' . faq_action_btn('services.php?cat=status', 'เช็กสถานะ Account/รหัสผ่าน', 'primary') . '
          </div>
        ') .

        faq_accordion('hr4', 'Account ถูกระงับการใช้งาน (Account Disabled)', '
          ' . faq_cause_box(
            'ไม่ได้ต่ออายุ Account ประจำปี',
            'บัญชีที่ไม่ได้ต่ออายุภายในเดือนธันวาคมของทุกปีจะถูกระงับการใช้งาน
             ซึ่งส่งผลให้ Login เข้าระบบ HR ไม่ได้ด้วย',
            'danger'
          ) . '
          ' . faq_cause_box(
            'สาเหตุอื่น',
            'อาจเกิดจากการฝ่าฝืนนโยบาย หรือผู้ดูแลระบบดำเนินการตามขั้นตอน',
            'info'
          ) . '
          ' . faq_divider('แนวทางแก้ไข') . '
          <div style="font-size:.85rem;color:var(--clr-text);line-height:1.8;margin-bottom:16px">
            ตรวจสอบสถานะบัญชีก่อน จากนั้นดำเนินการต่ออายุหรือติดต่อเจ้าหน้าที่
          </div>
          <div style="display:flex;gap:10px;flex-wrap:wrap">
            ' . faq_action_btn('services.php?cat=status', 'เช็กสถานะ Account', 'primary') . '
            ' . faq_action_btn('services.php?cat=renew', 'ต่ออายุ Account', 'outline') . '
          </div>
        ') .

      '</div>
    ',
  ],

];

require_once '../includes/header.php';
?>

<?php
$panel_title   = 'ปัญหาที่พบบ่อย';
$panel_cat     = $cat;
$panel_base    = 'support.php';
$panel_menu    = $sections;
$panel_items   = $support_items;
$panel_contact = false;
?>

<main class="layout__main">
  <nav class="breadcrumb">
    <a href="../index.php">หน้าหลัก</a>
    <span class="breadcrumb__sep">›</span>
    <span>ปัญหาที่พบบ่อย</span>
    <?php if ($cat && isset($sections[$cat])): ?>
      <span class="breadcrumb__sep">›</span>
      <span><?= htmlspecialchars($sections[$cat]['label']) ?></span>
    <?php endif; ?>
  </nav>

  <?php require_once '../includes/single-panel.php'; ?>
</main>

<!-- FAQ Accordion Styles -->
<style>
  /* ── FAQ Accordion ────────────────────────────────────────── */
  .faq-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
  }

  .faq-acc {
    border: 1px solid var(--clr-border);
    border-radius: 10px;
    background: var(--clr-surface);
    overflow: hidden;
    transition: box-shadow .2s;
  }

  .faq-acc.is-open {
    box-shadow: 0 2px 12px rgba(26, 111, 168, .08);
  }

  .faq-acc__btn {
    width: 100%;
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 14px 18px;
    background: none;
    border: none;
    cursor: pointer;
    text-align: left;
    font-family: inherit;
    font-size: .9rem;
    font-weight: 500;
    color: var(--clr-text);
    transition: background .15s;
  }

  .faq-acc__btn:hover {
    background: var(--clr-bg);
  }

  .faq-acc.is-open .faq-acc__btn {
    background: var(--clr-bg);
    border-bottom: 1px solid var(--clr-border);
  }

  /* colored indicator dot */
  .faq-acc__indicator {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: var(--clr-border);
    flex-shrink: 0;
    transition: background .2s;
  }

  .faq-acc.is-open .faq-acc__indicator {
    background: var(--clr-primary);
  }

  .faq-acc__title {
    flex: 1;
    line-height: 1.4;
  }

  .faq-acc__chevron {
    color: var(--clr-text-muted);
    flex-shrink: 0;
    display: flex;
    transition: transform .25s;
  }

  .faq-acc.is-open .faq-acc__chevron {
    transform: rotate(180deg);
  }

  /* Body */
  .faq-acc__body {
    max-height: 0;
    overflow: hidden;
    transition: max-height .32s cubic-bezier(.4, 0, .2, 1);
  }

  .faq-acc.is-open .faq-acc__body {
    max-height: 9999px;
  }

  .faq-acc__inner {
    padding: 18px 20px 20px;
  }
</style>

<script>
  function faqToggle(id) {
    const el = document.getElementById(id);
    if (el) el.classList.toggle('is-open');
  }
</script>

<?php require_once '../includes/footer.php'; ?>