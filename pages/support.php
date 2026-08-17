<?php
// pages/support.php — ปัญหาที่พบบ่อย (FAQ)
require_once '../includes/config.php';
$page_title = 'ปัญหาที่พบบ่อย';
$cat = $_GET['cat'] ? $_GET['cat'] : '';

$sections = [
  'redlogin'  => ['label' => 'เข้าหน้าแดงไม่ได้'],
  'hrweb'     => ['label' => 'เข้าเว็บ HR ไม่ได้'],
  'fileshare' => ['label' => 'เข้าไฟล์แชร์ไม่ได้'],
];

// ── Helper: สร้าง accordion item ──────────────────────────────────
function faq_accordion($id, $title, $body_html)
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
function faq_action_btn($url, $label, $color = 'primary')
{
  $styles = [
    'primary' => 'background:var(--clr-primary);color:#fff;border:1.5px solid var(--clr-primary);',
    'outline' => 'background:transparent;color:var(--clr-primary);border:1.5px solid var(--clr-primary);',
  ];
  $s = $styles[$color] ? $styles[$color] : $styles['primary'];
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
function faq_cause_box($title, $desc, $type = 'info')
{
  $colors = [
    'info'    => ['border' => '#cbd5e1', 'dot' => '#64748b'],
    'warning' => ['border' => '#fbbf24', 'dot' => '#d97706'],
    'danger'  => ['border' => '#fca5a5', 'dot' => '#dc2626'],
  ];
  $c = $colors[$type] ? $colors[$type] : $colors['info'];
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
function faq_divider($label)
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

  // ──────────────────────────────────────────────────────────────
  // 3. เข้าไฟล์แชร์ไม่ได้
  // ──────────────────────────────────────────────────────────────
  [
    'cat'   => 'fileshare',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                  <line x1="12" y1="11" x2="12" y2="17" stroke="#dc2626" stroke-width="2.5"/>
                  <line x1="9" y1="14" x2="15" y2="14" stroke="#dc2626" stroke-width="2.5"/>
                </svg>',
    'title' => 'เข้าไฟล์แชร์ไม่ได้ (Network File Share)',
    'desc'  => 'รวมวิธีแก้ไขปัญหาไม่สามารถเข้าถึงโฟลเดอร์แชร์ผ่านเครือข่ายบนเครื่อง Windows',
    'extra_html' => '

      <p style="font-size:.9rem;line-height:1.8;color:var(--clr-text-muted);margin-bottom:20px">
        ปัญหานี้มักเกิดจากการที่ระบบปฏิบัติการ Windows รุ่นใหม่ตั้งค่าความปลอดภัยเริ่มต้นให้ปิดกั้นการเชื่อมต่อ
        แบบ Guest หรือแบบไม่ใช้การยืนยันตัวตนขั้นสูง (Insecure Guest Authentication) ซึ่งอุปกรณ์แชร์ไฟล์บางประเภท
        ในเครือข่ายยังใช้การเชื่อมต่อรูปแบบนี้อยู่ กรุณาแก้ไขตามลำดับขั้นตอนด้านล่าง
      </p>

      <div class="faq-group">' .

        faq_accordion('fs1', 'สาเหตุของปัญหา', '
          ' . faq_cause_box(
            'ข้อความ Error ที่พบ',
            'เมื่อพยายามเข้าถึงโฟลเดอร์แชร์ ระบบจะแจ้งข้อผิดพลาดในลักษณะไม่สามารถเชื่อมต่อได้
             ซึ่งเกิดจากนโยบายความปลอดภัยของ Windows ที่ปิดการอนุญาตให้เชื่อมต่อแบบไม่ปลอดภัย (Insecure Guest Auth)
             เป็นค่าเริ่มต้น',
            'warning'
          ) . '
          <div style="border:1px solid var(--clr-border);border-radius:10px;overflow:hidden;margin-top:14px">
            <img src="../assets/images/support/fileshare/fs1.png"
                alt="ตัวอย่างข้อความ Error เมื่อเข้าไฟล์แชร์ไม่ได้"
                style="width:100%;display:block">
          </div>
        ') .

        faq_accordion('fs2', 'วิธีที่ 1: แก้ไขผ่าน Registry Editor', '
          <div style="font-size:.85rem;color:var(--clr-text);line-height:1.8;margin-bottom:16px">
            เปิดโปรแกรม Registry Editor โดยกดปุ่ม Start พิมพ์คำว่า <strong>regedit</strong> แล้วเลือกเปิดโปรแกรม
          </div>
          ' . faq_divider('ขั้นตอน') . '
          <ol style="font-size:.85rem;color:var(--clr-text);line-height:2;padding-left:20px;margin-bottom:16px">
            <li>ไล่ไปตามลำดับหัวข้อในแถบด้านซ้าย:<br>
              <code style="background:var(--clr-bg);padding:2px 6px;border-radius:4px;font-size:.8rem">
                Computer\\HKEY_LOCAL_MACHINE\\SYSTEM\\CurrentControlSet\\Services\\LanmanWorkstation\\Parameters
              </code>
            </li>
            <li>มองหารายการชื่อ <strong>AllowInsecureGuestAuth</strong> ในช่องด้านขวามือ</li>
          </ol>
          <div style="border:1px solid var(--clr-border);border-radius:10px;overflow:hidden;margin-bottom:14px">
            <img src="../assets/images/support/fileshare/fs2.png" alt="ตำแหน่ง Registry Path" style="width:100%;display:block">
          </div>
          <ol start="3" style="font-size:.85rem;color:var(--clr-text);line-height:2;padding-left:20px;margin-bottom:16px">
            <li>หากพบรายการแล้ว ให้ดับเบิลคลิก แล้วแก้ไขค่า Value data จาก <strong>0</strong> เป็น <strong>1</strong> จากนั้นกด OK</li>
          </ol>
          <div style="border:1px solid var(--clr-border);border-radius:10px;overflow:hidden;margin-bottom:14px">
            <img src="../assets/images/support/fileshare/fs3.png" alt="แก้ไขค่า Value จาก 0 เป็น 1" style="width:100%;display:block">
          </div>
          ' . faq_cause_box(
            'กรณีไม่พบรายการ AllowInsecureGuestAuth',
            'คลิกขวาที่พื้นที่ว่างในช่องด้านขวา เลือก New > DWORD (32-bit) Value',
            'info'
          ) . '
          <div style="border:1px solid var(--clr-border);border-radius:10px;overflow:hidden;margin-bottom:14px">
            <img src="../assets/images/support/fileshare/fs4.png" alt="สร้างค่า DWORD ใหม่" style="width:100%;display:block">
          </div>
          <div style="font-size:.85rem;color:var(--clr-text);line-height:1.8;margin-bottom:14px">
            ตั้งชื่อค่าที่สร้างใหม่เป็น <strong>AllowInsecureGuestAuth</strong> จากนั้นดับเบิลคลิกเพื่อแก้ไข
            Value data จาก 0 เป็น 1 แล้วกด OK
          </div>
          <div style="border:1px solid var(--clr-border);border-radius:10px;overflow:hidden">
            <img src="../assets/images/support/fileshare/fs5.png" alt="ตั้งชื่อและกำหนดค่า" style="width:100%;display:block">
          </div>
        ') .

        faq_accordion('fs3', 'วิธีที่ 2: แก้ไขผ่าน Group Policy Editor (สำหรับผู้ที่ไม่ถนัดแก้ Registry โดยตรง)', '
          <ol style="font-size:.85rem;color:var(--clr-text);line-height:2;padding-left:20px;margin-bottom:14px">
            <li>กดปุ่ม Start พิมพ์คำว่า <strong>gpedit.msc</strong> แล้วเปิดโปรแกรม</li>
          </ol>
          <div style="border:1px solid var(--clr-border);border-radius:10px;overflow:hidden;margin-bottom:14px">
            <img src="../assets/images/support/fileshare/fs6.png" alt="เปิด gpedit.msc" style="width:100%;display:block">
          </div>
          <ol start="2" style="font-size:.85rem;color:var(--clr-text);line-height:2;padding-left:20px;margin-bottom:14px">
            <li>ไปที่ Computer Configuration > Administrative Templates > Network > Lanman Workstation
                แล้วมองหารายการ <strong>Enable insecure guest logons</strong> ทางด้านขวามือ จากนั้นดับเบิลคลิก</li>
          </ol>
          <div style="border:1px solid var(--clr-border);border-radius:10px;overflow:hidden;margin-bottom:14px">
            <img src="../assets/images/support/fileshare/fs7.png" alt="ตำแหน่งนโยบาย Enable insecure guest logons" style="width:100%;display:block">
          </div>
          <ol start="3" style="font-size:.85rem;color:var(--clr-text);line-height:2;padding-left:20px;margin-bottom:14px">
            <li>เลือก <strong>Enabled</strong> แล้วกด OK จากนั้นลองเข้าโฟลเดอร์ที่แชร์อีกครั้ง</li>
          </ol>
          <div style="border:1px solid var(--clr-border);border-radius:10px;overflow:hidden">
            <img src="../assets/images/support/fileshare/fs8.png" alt="ตั้งค่าเป็น Enabled" style="width:100%;display:block">
          </div>
        ') .

        faq_accordion('fs4', 'วิธีที่ 3: นำเข้าไฟล์ Registry (.reg) — สำหรับ Windows 11', '
          <div style="font-size:.85rem;color:var(--clr-text);line-height:1.8;margin-bottom:14px">
            เปิดโปรแกรม Notepad แล้วคัดลอกข้อความด้านล่างวางลงไป
          </div>
          <pre style="background:#1e2c3a;color:#e2e8f0;padding:16px;border-radius:8px;font-size:.78rem;
                       overflow-x:auto;margin-bottom:16px;line-height:1.6">Windows Registry Editor Version 5.00

[HKEY_LOCAL_MACHINE\\SYSTEM\\CurrentControlSet\\Services\\LanmanWorkstation\\Parameters]
"EnablePlainTextPassword"=dword:00000000
"EnableSecuritySignature"=dword:00000001
"RequireSecuritySignature"=dword:00000000
"AllowInsecureGuestAuth"=dword:00000001</pre>
          <ol style="font-size:.85rem;color:var(--clr-text);line-height:2;padding-left:20px;margin-bottom:14px">
            <li>บันทึกไฟล์เป็นนามสกุล <strong>.reg</strong> (เช่น <code>fix-fileshare.reg</code>) เก็บไว้ที่ Desktop
                หรือตำแหน่งใดก็ได้ในเครื่อง</li>
            <li>ดับเบิลคลิกไฟล์ .reg ที่บันทึกไว้ เมื่อมีข้อความยืนยัน ให้กด <strong>Yes</strong></li>
          </ol>
          <div style="border:1px solid var(--clr-border);border-radius:10px;overflow:hidden;margin-bottom:14px">
            <img src="../assets/images/support/fileshare/fs9.png" alt="ยืนยันการนำเข้า Registry" style="width:100%;display:block">
          </div>
          <div style="border:1px solid var(--clr-border);border-radius:10px;overflow:hidden;margin-bottom:14px">
            <img src="../assets/images/support/fileshare/fs10.png" alt="ผลลัพธ์การนำเข้าไฟล์ Registry" style="width:100%;display:block">
          </div>
          <div style="font-size:.85rem;color:var(--clr-text);line-height:1.8">
            เมื่อขึ้นข้อความยืนยันว่าดำเนินการสำเร็จ ให้กด OK แล้วลองเข้าโฟลเดอร์ที่แชร์อีกครั้ง
          </div>
          <div style="border:1px solid var(--clr-border);border-radius:10px;overflow:hidden;margin-top:14px">
            <img src="../assets/images/support/fileshare/fs11.png" alt="ข้อความยืนยันการดำเนินการสำเร็จ" style="width:100%;display:block">
          </div>
        ') .

        faq_accordion('fs5', 'วิธีที่ 4: แก้ไขผ่าน Windows PowerShell', '
          <ol style="font-size:.85rem;color:var(--clr-text);line-height:2;padding-left:20px;margin-bottom:14px">
            <li>กดปุ่ม Start พิมพ์คำว่า <strong>PowerShell</strong> คลิกขวาที่ Windows PowerShell แล้วเลือก
                <strong>Run as Administrator</strong></li>
          </ol>
          <div style="border:1px solid var(--clr-border);border-radius:10px;overflow:hidden;margin-bottom:14px">
            <img src="../assets/images/support/fileshare/fs12.png" alt="เปิด PowerShell แบบ Administrator" style="width:100%;display:block">
          </div>
          <ol start="2" style="font-size:.85rem;color:var(--clr-text);line-height:2;padding-left:20px;margin-bottom:14px">
            <li>คัดลอกคำสั่งด้านล่างไปวางในหน้าต่าง PowerShell แล้วกด Enter</li>
          </ol>
          <pre style="background:#1e2c3a;color:#e2e8f0;padding:16px;border-radius:8px;font-size:.78rem;
                       overflow-x:auto;margin-bottom:14px;line-height:1.6">reg.exe add HKEY_LOCAL_MACHINE\\SYSTEM\\CurrentControlSet\\Services\\LanmanWorkstation\\Parameters /v AllowInsecureGuestAuth /t REG_DWORD /d 1</pre>
          <div style="font-size:.85rem;color:var(--clr-text);line-height:1.8;margin-bottom:14px">
            หากมีค่าเดิมอยู่แล้ว ระบบจะถามยืนยันการเขียนทับ ให้พิมพ์ <strong>Y</strong> แล้วกด Enter
            เมื่อขึ้นข้อความ <em>The operation completed successfully</em> ให้ปิดหน้าต่างแล้วลองเข้าโฟลเดอร์ที่แชร์อีกครั้ง
          </div>
          <div style="border:1px solid var(--clr-border);border-radius:10px;overflow:hidden">
            <img src="../assets/images/support/fileshare/fs13.png" alt="ผลลัพธ์คำสั่ง PowerShell" style="width:100%;display:block">
          </div>
        ') .

        faq_accordion('fs6', 'หากยังไม่สำเร็จ: ปรับตั้งค่า Security Policy เพิ่มเติม', '
          <div style="font-size:.85rem;color:var(--clr-text);line-height:1.8;margin-bottom:14px">
            หากดำเนินการตามวิธีข้างต้นแล้วยังไม่สามารถเข้าถึงได้ ให้ปรับตั้งค่าความปลอดภัยเพิ่มเติมผ่าน gpedit.msc
          </div>
          <div style="border:1px solid var(--clr-border);border-radius:10px;overflow:hidden;margin-bottom:14px">
            <img src="../assets/images/support/fileshare/fs14.png" alt="เปิด gpedit.msc" style="width:100%;display:block">
          </div>
          <ol style="font-size:.85rem;color:var(--clr-text);line-height:2;padding-left:20px;margin-bottom:14px">
            <li>ไปที่ Computer Configuration > Windows Settings > Security Settings > Local Policies > Security Options</li>
            <li>มองหารายการ <strong>Microsoft network client: Digitally sign communications (always)</strong>
                ทางด้านขวามือ แล้วดับเบิลคลิก</li>
          </ol>
          <div style="border:1px solid var(--clr-border);border-radius:10px;overflow:hidden;margin-bottom:14px">
            <img src="../assets/images/support/fileshare/fs15.png" alt="ตำแหน่งนโยบาย Digitally sign communications" style="width:100%;display:block">
          </div>
          <ol start="3" style="font-size:.85rem;color:var(--clr-text);line-height:2;padding-left:20px;margin-bottom:14px">
            <li>เลือก <strong>Disabled</strong> แล้วกด OK จากนั้น Restart เครื่อง 1 ครั้ง</li>
          </ol>
          <div style="border:1px solid var(--clr-border);border-radius:10px;overflow:hidden">
            <img src="../assets/images/support/fileshare/fs16.png" alt="ตั้งค่าเป็น Disabled" style="width:100%;display:block">
          </div>
        ') .

        faq_accordion('fs7', 'กรณีเคยแก้ไขสำเร็จแล้ว แต่กลับมาเป็นปัญหาอีกครั้งหลังอัปเดต Windows', '
          ' . faq_cause_box(
            'สาเหตุ',
            'Windows Update บางรุ่น (เช่น ตัวอัปเดตที่มีรหัส KB5065426) อาจปรับเปลี่ยนค่าความปลอดภัยกลับไปเป็นค่าเริ่มต้น
             ทำให้ปัญหาเข้าไฟล์แชร์ไม่ได้กลับมาอีกครั้ง แม้จะเคยแก้ไขไปแล้วก็ตาม',
            'warning'
          ) . '
          <div style="font-size:.85rem;color:var(--clr-text);line-height:1.8;margin:14px 0">
            วิธีแก้เบื้องต้นคือถอนการติดตั้งอัปเดตดังกล่าวออกชั่วคราว จนกว่าจะมีตัวแก้ไขปัญหาอย่างเป็นทางการ
          </div>
          ' . faq_divider('วิธีที่ 1: ผ่าน Control Panel') . '
          <ol style="font-size:.85rem;color:var(--clr-text);line-height:2;padding-left:20px;margin-bottom:14px">
            <li>เปิด Control Panel ตั้งค่า View เป็น Small Icons แล้วเลือก Programs and Features</li>
          </ol>
          <div style="border:1px solid var(--clr-border);border-radius:10px;overflow:hidden;margin-bottom:14px">
            <img src="../assets/images/support/fileshare/fs17.png" alt="เปิด Programs and Features" style="width:100%;display:block">
          </div>
          <ol start="2" style="font-size:.85rem;color:var(--clr-text);line-height:2;padding-left:20px;margin-bottom:14px">
            <li>เลือก View installed updates</li>
          </ol>
          <div style="border:1px solid var(--clr-border);border-radius:10px;overflow:hidden;margin-bottom:14px">
            <img src="../assets/images/support/fileshare/fs18.png" alt="View installed updates" style="width:100%;display:block">
          </div>
          <ol start="3" style="font-size:.85rem;color:var(--clr-text);line-height:2;padding-left:20px;margin-bottom:14px">
            <li>มองหาอัปเดตรหัส <strong>KB5065426</strong> หากพบให้ Uninstall แล้ว Restart เครื่อง 1 ครั้ง</li>
          </ol>
          <div style="border:1px solid var(--clr-border);border-radius:10px;overflow:hidden;margin-bottom:20px">
            <img src="../assets/images/support/fileshare/fs19.png" alt="ถอนการติดตั้งอัปเดต" style="width:100%;display:block">
          </div>
          ' . faq_divider('วิธีที่ 2: ผ่าน Command Prompt (Run as Administrator)') . '
          <pre style="background:#1e2c3a;color:#e2e8f0;padding:16px;border-radius:8px;font-size:.78rem;
                       overflow-x:auto;margin-bottom:14px;line-height:1.6">wusa /uninstall /kb:5065426 /norestart</pre>
          <div style="font-size:.85rem;color:var(--clr-text);line-height:1.8;margin-bottom:14px">
            หากพบอัปเดตรหัส <strong>KB5064081</strong> ในรายการด้วย แนะนำให้ถอนการติดตั้งเพิ่มอีกรายการหนึ่งด้วยวิธีเดียวกัน
            คำสั่งนี้จะถอนการติดตั้งโดยไม่ต้อง Restart ทันที แต่หากลองเข้าโฟลเดอร์แล้วยังไม่ได้ ให้ Restart เครื่อง 1 ครั้ง
          </div>
          <div style="border:1px solid var(--clr-border);border-radius:10px;overflow:hidden;margin-bottom:14px">
            <img src="../assets/images/support/fileshare/fs20.png" alt="เปิด Command Prompt แบบ Administrator" style="width:100%;display:block">
          </div>
          <div style="border:1px solid var(--clr-border);border-radius:10px;overflow:hidden;margin-bottom:14px">
            <img src="../assets/images/support/fileshare/fs21.png" alt="ผลลัพธ์การถอนการติดตั้ง" style="width:100%;display:block">
          </div>
          <div style="border:1px solid var(--clr-border);border-radius:10px;overflow:hidden">
            <img src="../assets/images/support/fileshare/fs22.png" alt="ทดสอบเข้าโฟลเดอร์อีกครั้ง" style="width:100%;display:block">
          </div>
        ') .

      '</div>

      <div style="margin-top:24px;padding:14px 16px;border-top:1px dashed var(--clr-border);
                  font-size:.78rem;color:var(--clr-text-light);line-height:1.7">
        เนื้อหาและขั้นตอนการแก้ไขปัญหาส่วนนี้เรียบเรียงโดยอ้างอิงจากกระทู้
        <a href="https://pantip.com/topic/43099888" target="_blank" rel="noopener noreferrer"
           style="color:var(--clr-primary);text-decoration:underline">Pantip: topic 43099888</a>
      </div>
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