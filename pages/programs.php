<?php
// pages/programs.php — โปรแกรมองค์กร
require_once '../includes/config.php';
$page_title = 'โปรแกรมองค์กร';
$cat = $_GET['cat'] ? $_GET['cat'] : '';

$sections = [
  'donate'    => ['label' => 'DKC Donate Online'],
  'winbudget' => ['label' => 'WinBudget'],
];

$program_items = [

  // ════════════════════════════════════════════
  // 1. DKC Donate Online
  // ════════════════════════════════════════════
  [
    'cat'   => 'donate',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>',
    'title' => 'DKC Donate Online',
    'desc'  => 'ระบบบริจาคออนไลน์ สำหรับร่วมบริจาคจตุปัจจัยแก่วัดพระธรรมกาย',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.9;color:var(--clr-text);margin-bottom:24px">
        เว็บไซต์นี้จัดทำขึ้นเพื่ออำนวยความสะดวกให้กับเจ้าภาพผู้มีบุญ
        ในการร่วมบริจาคจตุปัจจัยแก่วัดพระธรรมกาย เพื่อใช้ในการเผยแผ่พระพุทธศาสนา
        และงานบุญต่างๆ ที่ทางวัดได้จัดให้มีขึ้น
      </p>

      <div style="display:flex;flex-direction:column;gap:12px;margin-bottom:24px">

        <a href="https://donate.dkcmain.org/s/signin.aspx" target="_blank"
           style="display:flex;align-items:center;gap:14px;padding:16px 18px;border:1px solid var(--clr-border);border-radius:12px;background:var(--clr-surface);text-decoration:none;transition:box-shadow .2s,border-color .2s;"
           onmouseover="this.style.boxShadow=\'0 4px 16px rgba(0,0,0,.08)\';this.style.borderColor=\'var(--clr-primary)\'"
           onmouseout="this.style.boxShadow=\'none\';this.style.borderColor=\'var(--clr-border)\'">
          <span style="flex-shrink:0;width:40px;height:40px;background:var(--clr-primary-pale);border-radius:10px;display:flex;align-items:center;justify-content:center;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--clr-primary)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
          </span>
          <span style="flex:1">
            <span style="display:block;font-weight:600;font-size:.92rem;color:var(--clr-text)">เข้าสู่ระบบ DKC Donate Online</span>
            <span style="display:block;font-size:.8rem;color:var(--clr-text-muted);margin-top:2px">donate.dkcmain.org</span>
          </span>
          <span style="flex-shrink:0;color:var(--clr-text-muted)">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
          </span>
        </a>

      </div>

      <div style="background:#f0fdf4;border:1px solid #bbf7d0;border-radius:12px;padding:14px 18px;font-size:.88rem;color:#166534;line-height:1.7">
        📞 หากพบปัญหาการใช้งาน กรุณาติดต่อกองบริหารสารสนเทศ โทร <strong>14141</strong>
      </div>
    ',
  ],

  // ════════════════════════════════════════════
  // 2. WinBudget
  // ════════════════════════════════════════════
  [
    'cat'   => 'winbudget',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="18" rx="2"/><line x1="2" y1="9" x2="22" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/></svg>',
    'title' => 'WinBudget',
    'desc'  => 'ระบบบริหารจัดการงบประมาณขององค์กร',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:24px">
        WinBudget เป็นระบบสำหรับบริหารจัดการงบประมาณภายในองค์กร
        ใช้สำหรับบุคลากรที่เกี่ยวข้องกับการเบิกจ่ายและติดตามงบประมาณ
      </p>

      <!-- ติดต่อผู้ดูแลระบบ -->
      <div style="padding:14px 16px;background:var(--clr-bg);border-radius:10px;border:1px solid var(--clr-border);font-size:.9rem;line-height:1.85;color:var(--clr-text);margin-bottom:24px">
        <p style="margin:0 0 8px;font-weight:600">ต้องการใช้งาน WinBudget ติดต่อ</p>
        <div style="display:flex;align-items:center;gap:8px">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;color:var(--clr-text-muted)"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          <span>กัลฯ สิรรัตน์ (กองคลัง): เบอร์ภายใน <a href="tel:13332" style="color:#1e73be;font-weight:600;text-decoration:none">13332</a></span>
        </div>
      </div>

      <!-- การติดตั้ง -->
      <p style="font-size:1rem;font-weight:700;color:var(--clr-text);margin-bottom:10px">การติดตั้ง</p>

      <div style="background:#fefce8;border:1px solid #fde68a;border-radius:12px;padding:14px 18px;font-size:.86rem;color:#713f12;line-height:1.75;margin-bottom:20px">
        ⚠️ หากพบปัญหาในการติดตั้ง กรณีที่เครื่องมี WinBudget ตัวเก่าอยู่แล้ว
        ให้ <strong>ถอนการติดตั้งโปรแกรม WinBudget ตัวเดิมออกก่อน</strong> แล้วจึงทดลองติดตั้งใหม่อีกครั้ง
      </div>

      <p style="font-size:.92rem;color:var(--clr-text-muted);margin-bottom:14px">
        การติดตั้ง WinBudget ต้องติดตั้งส่วนประกอบที่จำเป็น 2 รายการตามลำดับดังนี้
      </p>

      <div style="display:flex;flex-direction:column;gap:14px;margin-bottom:24px">

        <!-- Step 1 -->
        <div style="display:flex;gap:14px;padding:16px 18px;border:1px solid var(--clr-border);border-radius:12px;background:var(--clr-surface)">
          <div style="flex-shrink:0;width:30px;height:30px;border-radius:50%;background:var(--clr-primary);color:#fff;font-size:.82rem;font-weight:700;display:flex;align-items:center;justify-content:center">1</div>
          <div style="flex:1">
            <p style="margin:0 0 6px;font-weight:600;font-size:.9rem;color:var(--clr-text)">ติดตั้ง .NET Framework 4.6</p>
            <p style="margin:0 0 10px;font-size:.85rem;color:var(--clr-text-muted);line-height:1.7">
              ดาวน์โหลดไฟล์ <code style="background:var(--clr-bg);padding:1px 6px;border-radius:4px;font-size:.82em;color:#dc2626">NDP46-KB3045557-x86-x64-AllOS-ENU.exe</code>
              จาก Path ด้านล่าง โดยคัดลอกไปวางในช่อง Address Bar ของเบราว์เซอร์
            </p>
            <a href="https://fdnet.dhammakaya.network/services/winbudget.php#" target="_blank"
               style="display:inline-flex;align-items:center;gap:6px;background:#1e73be;color:#fff;font-size:.82rem;font-weight:600;padding:6px 14px;border-radius:6px;text-decoration:none">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
              คัดลอก Path ไฟล์
            </a>
          </div>
        </div>

        <!-- Step 2 -->
        <div style="display:flex;gap:14px;padding:16px 18px;border:1px solid var(--clr-border);border-radius:12px;background:var(--clr-surface)">
          <div style="flex-shrink:0;width:30px;height:30px;border-radius:50%;background:var(--clr-primary);color:#fff;font-size:.82rem;font-weight:700;display:flex;align-items:center;justify-content:center">2</div>
          <div style="flex:1">
            <p style="margin:0 0 6px;font-weight:600;font-size:.9rem;color:var(--clr-text)">ติดตั้งโปรแกรม WinBudget</p>
            <p style="margin:0 0 10px;font-size:.85rem;color:var(--clr-text-muted);line-height:1.7">
              เข้าลิงก์ด้านล่างแล้วกดปุ่ม <strong>Install</strong> เพื่อติดตั้งโปรแกรม<br>
              <span style="color:#dc2626;font-weight:600">⚠️ ต้องเปิดผ่าน Internet Explorer เท่านั้น</span>
            </p>
            <a href="https://winbudget.dhammakaya.network/wb/setup/" target="_blank"
               style="display:inline-flex;align-items:center;gap:6px;background:#1e73be;color:#fff;font-size:.82rem;font-weight:600;padding:6px 14px;border-radius:6px;text-decoration:none">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
              เปิดหน้าติดตั้ง WinBudget
            </a>
          </div>
        </div>

      </div>

      <!-- หมายเหตุ -->
      <div style="background:#eff6ff;border:1px solid #bfdbfe;border-radius:12px;padding:14px 18px;font-size:.88rem;color:#1e3a8a;line-height:1.7">
        💡 <strong>หมายเหตุ:</strong> ระบบ WinBudget จะอัปเดตเวอร์ชันให้อัตโนมัติ เมื่อพบว่ามีเวอร์ชันใหม่กว่าที่ติดตั้งอยู่
      </div>
    ',
  ],

];

require_once '../includes/header.php';
?>

<?php
$panel_title   = 'โปรแกรมองค์กร';
$panel_cat     = $cat;
$panel_base    = 'programs.php';
$panel_menu    = $sections;
$panel_items   = $program_items;
$panel_contact = false;
?>

<main class="layout__main">
  <nav class="breadcrumb">
    <a href="../index.php">หน้าหลัก</a>
    <span class="breadcrumb__sep">›</span>
    <span><?= $cat && isset($sections[$cat]) ? htmlspecialchars($sections[$cat]['label']) : 'โปรแกรมองค์กร' ?></span>
  </nav>

  <?php require_once '../includes/single-panel.php'; ?>
</main>

<?php require_once '../includes/footer.php'; ?>