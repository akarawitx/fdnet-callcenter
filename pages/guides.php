<?php
// pages/guides.php — Guides & Manuals
require_once '../includes/config.php';

$page_title = 'คู่มือการใช้งาน';
$cat = $_GET['cat'] ?? '';

$categories = [
  'account'    => ['label' => 'Account & ล็อกอิน'],
  'email'      => ['label' => 'Email'],
  'wifi'       => ['label' => 'Wi-Fi & เครือข่าย'],
  'office365'  => ['label' => 'Office 365'],
  'teams'      => ['label' => 'Microsoft Teams'],
  'onedrive'   => ['label' => 'OneDrive'],
  'saraban'    => ['label' => 'ระบบสารบรรณ'],
  'vpn'        => ['label' => 'VPN'],
  'word-excel' => ['label' => 'Word & Excel'],
  'sharepoint' => ['label' => 'SharePoint'],
];

$guides = [
  [
    'cat'   => 'account',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>',
    'title' => 'การขอ Account และตั้งค่าครั้งแรก',
    'desc'  => 'ขั้นตอนตั้งแต่กรอกแบบฟอร์ม รออนุมัติ ล็อกอินครั้งแรก จนถึงตั้ง 2FA',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        คู่มือนี้จะพาคุณผ่านกระบวนการขอ Account จนถึงล็อกอินได้สำเร็จ
        อ่านทีละขั้นตอนและทำตามตัวอย่างที่แสดงไว้
        หากติดขัดตรงไหน สามารถโทรแจ้ง IT Support ได้ตลอดเวลาทำการ
      </p>

      <!-- Mock Login Screen -->
      <div style="border:1px solid var(--clr-border);border-radius:14px;overflow:hidden;margin-bottom:24px;background:#f8fafc">
        <div style="background:#0f172a;padding:10px 16px;display:flex;align-items:center;gap:8px">
          <div style="width:10px;height:10px;border-radius:50%;background:#ef4444"></div>
          <div style="width:10px;height:10px;border-radius:50%;background:#f59e0b"></div>
          <div style="width:10px;height:10px;border-radius:50%;background:#22c55e"></div>
          <span style="color:#64748b;font-size:.72rem;margin-left:8px">portal.example.go.th/login</span>
        </div>
        <div style="padding:32px;display:flex;flex-direction:column;align-items:center;gap:14px;background:white">
          <div style="width:56px;height:56px;background:linear-gradient(135deg,#1e40af,#3b82f6);border-radius:16px;display:flex;align-items:center;justify-content:center">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          </div>
          <div style="font-size:.95rem;font-weight:700;color:#1e293b">ลงชื่อเข้าใช้งาน</div>
          <div style="width:100%;max-width:280px;display:flex;flex-direction:column;gap:10px">
            <div style="border:1.5px solid #e2e8f0;border-radius:8px;padding:10px 14px;font-size:.85rem;color:#94a3b8;background:#f8fafc">Username เช่น somchai.j</div>
            <div style="border:1.5px solid #3b82f6;border-radius:8px;padding:10px 14px;font-size:.85rem;color:#94a3b8;background:#f8fafc;display:flex;justify-content:space-between"><span>รหัสผ่าน</span><span>••••••••</span></div>
            <div style="background:#2563eb;color:white;border-radius:8px;padding:10px;font-size:.85rem;font-weight:600;text-align:center">เข้าสู่ระบบ</div>
          </div>
        </div>
      </div>

      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        เมื่อได้รับ Username และ Password เริ่มต้นจากเจ้าหน้าที่แล้ว ให้เข้าเว็บ <strong>portal.example.go.th</strong>
        และล็อกอินด้วยข้อมูลที่ได้รับ ระบบจะบังคับให้เปลี่ยนรหัสผ่านทันทีในครั้งแรก
      </p>

      <!-- ตั้งค่า 2FA -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">การเปิดใช้งาน 2FA (Two-Factor Authentication)</div>
      <div style="display:flex;flex-direction:column;gap:0;margin-bottom:20px;border:1px solid var(--clr-border);border-radius:12px;overflow:hidden">
        <div style="display:flex;gap:14px;padding:14px 16px;background:var(--clr-bg);border-bottom:1px solid var(--clr-border)">
          <div style="width:28px;height:28px;border-radius:50%;background:#2563eb;color:white;display:flex;align-items:center;justify-content:center;font-size:.78rem;font-weight:700;flex-shrink:0">1</div>
          <div style="font-size:.88rem;color:var(--clr-text);line-height:1.6">ไปที่ <strong>การตั้งค่าบัญชี → ความปลอดภัย → การยืนยันตัวตนสองขั้นตอน</strong></div>
        </div>
        <div style="display:flex;gap:14px;padding:14px 16px;border-bottom:1px solid var(--clr-border)">
          <div style="width:28px;height:28px;border-radius:50%;background:#2563eb;color:white;display:flex;align-items:center;justify-content:center;font-size:.78rem;font-weight:700;flex-shrink:0">2</div>
          <div style="font-size:.88rem;color:var(--clr-text);line-height:1.6">ดาวน์โหลดแอป <strong>Microsoft Authenticator</strong> บนมือถือ</div>
        </div>
        <div style="display:flex;gap:14px;padding:14px 16px;background:var(--clr-bg);border-bottom:1px solid var(--clr-border)">
          <div style="width:28px;height:28px;border-radius:50%;background:#2563eb;color:white;display:flex;align-items:center;justify-content:center;font-size:.78rem;font-weight:700;flex-shrink:0">3</div>
          <div style="font-size:.88rem;color:var(--clr-text);line-height:1.6">สแกน QR Code ที่แสดงบนหน้าจอด้วยแอป</div>
        </div>
        <div style="display:flex;gap:14px;padding:14px 16px">
          <div style="width:28px;height:28px;border-radius:50%;background:#22c55e;color:white;display:flex;align-items:center;justify-content:center;font-size:.78rem;font-weight:700;flex-shrink:0">✔</div>
          <div style="font-size:.88rem;color:var(--clr-text);line-height:1.6">กรอกรหัส 6 หลักจากแอปเพื่อยืนยัน — เสร็จสิ้น!</div>
        </div>
      </div>
    ',
  ],

  [
    'cat'   => 'email',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>',
    'title' => 'การตั้งค่า Email บน Outlook และ Mobile',
    'desc'  => 'เพิ่มบัญชี Email องค์กรบน Outlook, iOS และ Android พร้อมตั้งค่า Signature',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        Email ขององค์กรในรูปแบบ <strong>ชื่อ.นามสกุล@example.go.th</strong>
        สามารถตั้งค่าได้ทั้งบน Microsoft Outlook (คอมพิวเตอร์) และแอปบนมือถือ
        เพื่อรับ-ส่งอีเมลได้ทุกที่ทุกเวลา
      </p>

      <!-- Platform Tabs -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">วิธีตั้งค่าตามอุปกรณ์</div>
      <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:10px;margin-bottom:24px">
        <div style="background:linear-gradient(135deg,#eff6ff,#dbeafe);border:1px solid #bfdbfe;border-radius:12px;padding:16px;text-align:center">
          <div style="font-size:1.8rem;margin-bottom:8px">🖥️</div>
          <div style="font-weight:700;font-size:.88rem;color:#1e40af;margin-bottom:6px">Outlook Desktop</div>
          <div style="font-size:.78rem;color:#1e3a8a;line-height:1.6">File → Add Account → กรอก Email → Sign In</div>
        </div>
        <div style="background:linear-gradient(135deg,#f0fdf4,#dcfce7);border:1px solid #bbf7d0;border-radius:12px;padding:16px;text-align:center">
          <div style="font-size:1.8rem;margin-bottom:8px">🍎</div>
          <div style="font-weight:700;font-size:.88rem;color:#166534;margin-bottom:6px">iPhone / iPad</div>
          <div style="font-size:.78rem;color:#14532d;line-height:1.6">Settings → Mail → Add Account → Microsoft Exchange</div>
        </div>
        <div style="background:linear-gradient(135deg,#fef3c7,#fde68a);border:1px solid #fcd34d;border-radius:12px;padding:16px;text-align:center">
          <div style="font-size:1.8rem;margin-bottom:8px">🤖</div>
          <div style="font-weight:700;font-size:.88rem;color:#92400e;margin-bottom:6px">Android</div>
          <div style="font-size:.78rem;color:#78350f;line-height:1.6">ดาวน์โหลด Outlook App → Add Account → กรอก Email</div>
        </div>
      </div>

      <!-- Signature Template -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">ตัวอย่าง Email Signature มาตรฐาน</div>
      <div style="border:1px solid var(--clr-border);border-radius:12px;overflow:hidden;margin-bottom:20px">
        <div style="background:#f1f5f9;padding:8px 14px;font-size:.72rem;color:#64748b;border-bottom:1px solid var(--clr-border)">ลายเซ็นอีเมล (Email Signature)</div>
        <div style="padding:16px 20px;background:white">
          <div style="font-size:.92rem;font-weight:700;color:#1e293b">สมชาย ใจดี</div>
          <div style="font-size:.83rem;color:#64748b;margin-bottom:6px">นักวิชาการคอมพิวเตอร์ | กองบริหารสารสนเทศ</div>
          <div style="border-top:2px solid #2563eb;padding-top:8px;font-size:.8rem;color:#475569;display:flex;flex-direction:column;gap:3px">
            <div>📞 02-xxx-xxxx ต่อ 1234</div>
            <div>✉️ somchai.j@example.go.th</div>
            <div>🌐 www.example.go.th</div>
          </div>
        </div>
      </div>

      <div style="background:#eff6ff;border:1px solid #bfdbfe;border-radius:12px;padding:14px 18px;font-size:.88rem;color:#1e40af;line-height:1.7">
        💡 <strong>ตั้งค่า Signature:</strong> ใน Outlook ไปที่ File → Options → Mail → Signatures แล้ววาง Signature ตามรูปแบบข้างต้น
      </div>
    ',
  ],

  [
    'cat'   => 'wifi',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>',
    'title' => 'การเชื่อมต่อ Wi-Fi ภายในอาคาร',
    'desc'  => 'วิธีเชื่อมต่อ Wi-Fi สำหรับบุคลากรและผู้มาเยือน รวมถึงการแก้ปัญหาเบื้องต้น',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        ภายในอาคารมีเครือข่าย Wi-Fi ให้บริการ 3 ประเภท เลือกใช้ให้ตรงกับสถานะของคุณ
        บุคลากรควรใช้ <strong>STAFF-NET</strong> เท่านั้น เพื่อความปลอดภัยของข้อมูล
      </p>

      <!-- ตาราง SSID -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:10px">เครือข่าย Wi-Fi ที่ให้บริการ</div>
      <table style="width:100%;border-collapse:collapse;font-size:.88rem;margin-bottom:24px">
        <thead>
          <tr style="background:var(--clr-primary-pale)">
            <th style="padding:10px 14px;text-align:left;border:1px solid var(--clr-border)">ชื่อเครือข่าย (SSID)</th>
            <th style="padding:10px 14px;text-align:left;border:1px solid var(--clr-border)">สำหรับ</th>
            <th style="padding:10px 14px;text-align:left;border:1px solid var(--clr-border)">การเข้าถึง</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);font-weight:700;color:var(--clr-primary)">STAFF-NET</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">บุคลากรประจำ</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">Username/Password องค์กร</td>
          </tr>
          <tr style="background:var(--clr-bg)">
            <td style="padding:10px 14px;border:1px solid var(--clr-border);font-weight:700">GUEST-WIFI</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">ผู้มาเยือน / แขก</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">ขอรหัสที่เคาน์เตอร์ประชาสัมพันธ์</td>
          </tr>
          <tr>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);font-weight:700">CONF-ROOM</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">ห้องประชุม</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">รหัสแสดงในห้องประชุม</td>
          </tr>
        </tbody>
      </table>

      <!-- แผนที่ครอบคลุม Wi-Fi -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">พื้นที่ครอบคลุม Wi-Fi</div>
      <div style="background:var(--clr-bg);border-radius:12px;padding:16px;margin-bottom:20px;border:1px solid var(--clr-border)">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;font-size:.85rem">
          <div style="display:flex;align-items:center;gap:8px"><span style="color:#22c55e;font-size:1.1rem">●</span> อาคาร A ทุกชั้น</div>
          <div style="display:flex;align-items:center;gap:8px"><span style="color:#22c55e;font-size:1.1rem">●</span> อาคาร B ทุกชั้น</div>
          <div style="display:flex;align-items:center;gap:8px"><span style="color:#22c55e;font-size:1.1rem">●</span> โรงอาหาร</div>
          <div style="display:flex;align-items:center;gap:8px"><span style="color:#22c55e;font-size:1.1rem">●</span> ห้องประชุมทุกห้อง</div>
          <div style="display:flex;align-items:center;gap:8px"><span style="color:#f59e0b;font-size:1.1rem">●</span> ลานจอดรถ (สัญญาณอ่อน)</div>
          <div style="display:flex;align-items:center;gap:8px"><span style="color:#ef4444;font-size:1.1rem">●</span> ใต้ดิน (ไม่มีสัญญาณ)</div>
        </div>
      </div>

      <!-- แก้ปัญหาเบื้องต้น -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:10px">แก้ปัญหาเบื้องต้น</div>
      <div style="display:flex;flex-direction:column;gap:8px">
        <div style="background:var(--clr-bg);border-radius:10px;padding:12px 16px;font-size:.87rem;border:1px solid var(--clr-border)">
          <strong>ล็อกอินไม่ได้</strong> → ตรวจสอบว่า Account ยังไม่หมดอายุ และรหัสผ่านถูกต้อง
        </div>
        <div style="background:var(--clr-bg);border-radius:10px;padding:12px 16px;font-size:.87rem;border:1px solid var(--clr-border)">
          <strong>เชื่อมต่อแล้วแต่ใช้ Internet ไม่ได้</strong> → ลองลืมเครือข่ายและเชื่อมต่อใหม่
        </div>
        <div style="background:var(--clr-bg);border-radius:10px;padding:12px 16px;font-size:.87rem;border:1px solid var(--clr-border)">
          <strong>สัญญาณตก บ่อย</strong> → แจ้ง IT Support พร้อมระบุห้องและชั้นที่มีปัญหา
        </div>
      </div>
    ',
  ],

  [
    'cat'   => 'office365',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>',
    'title' => 'ภาพรวม Microsoft 365 สำหรับบุคลากร',
    'desc'  => 'แนะนำเครื่องมือทั้งหมดใน Microsoft 365: Teams, Outlook, OneDrive, SharePoint',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        Microsoft 365 คือชุดซอฟต์แวร์สำนักงานครบวงจรที่องค์กรให้บุคลากรทุกคนใช้งาน
        สามารถเข้าถึงได้ผ่านเว็บ คอมพิวเตอร์ และมือถือโดยใช้ Account เดียวกัน
      </p>

      <!-- แผนผังเครื่องมือ -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">เครื่องมือหลักใน Microsoft 365</div>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:24px">
        <div style="background:linear-gradient(135deg,#0078d4,#106ebe);border-radius:12px;padding:16px;color:white">
          <div style="font-size:1.5rem;margin-bottom:8px">📧</div>
          <div style="font-weight:700;font-size:.92rem;margin-bottom:4px">Outlook</div>
          <div style="font-size:.8rem;opacity:.85;line-height:1.6">รับ-ส่งอีเมล จัดการปฏิทิน และนัดหมาย</div>
        </div>
        <div style="background:linear-gradient(135deg,#464775,#6264a7);border-radius:12px;padding:16px;color:white">
          <div style="font-size:1.5rem;margin-bottom:8px">💬</div>
          <div style="font-weight:700;font-size:.92rem;margin-bottom:4px">Teams</div>
          <div style="font-size:.8rem;opacity:.85;line-height:1.6">แชท ประชุมออนไลน์ ทำงานร่วมกัน</div>
        </div>
        <div style="background:linear-gradient(135deg,#0078d4,#005a9e);border-radius:12px;padding:16px;color:white">
          <div style="font-size:1.5rem;margin-bottom:8px">☁️</div>
          <div style="font-weight:700;font-size:.92rem;margin-bottom:4px">OneDrive</div>
          <div style="font-size:.8rem;opacity:.85;line-height:1.6">พื้นที่เก็บไฟล์ส่วนตัว 1 TB บน Cloud</div>
        </div>
        <div style="background:linear-gradient(135deg,#036c70,#03787c);border-radius:12px;padding:16px;color:white">
          <div style="font-size:1.5rem;margin-bottom:8px">📂</div>
          <div style="font-weight:700;font-size:.92rem;margin-bottom:4px">SharePoint</div>
          <div style="font-size:.8rem;opacity:.85;line-height:1.6">คลังเอกสารส่วนกลางขององค์กร</div>
        </div>
        <div style="background:linear-gradient(135deg,#217346,#2e7d32);border-radius:12px;padding:16px;color:white">
          <div style="font-size:1.5rem;margin-bottom:8px">📊</div>
          <div style="font-weight:700;font-size:.92rem;margin-bottom:4px">Excel</div>
          <div style="font-size:.8rem;opacity:.85;line-height:1.6">ตารางข้อมูล สูตรคำนวณ กราฟ</div>
        </div>
        <div style="background:linear-gradient(135deg,#2b579a,#1f4e79);border-radius:12px;padding:16px;color:white">
          <div style="font-size:1.5rem;margin-bottom:8px">📝</div>
          <div style="font-weight:700;font-size:.92rem;margin-bottom:4px">Word</div>
          <div style="font-size:.8rem;opacity:.85;line-height:1.6">พิมพ์เอกสาร รายงาน หนังสือราชการ</div>
        </div>
      </div>

      <!-- ลิงก์เข้าใช้งาน -->
      <div style="background:var(--clr-bg);border-radius:12px;padding:16px 18px;border:1px solid var(--clr-border)">
        <div style="font-size:.82rem;font-weight:600;color:var(--clr-text);margin-bottom:8px">🌐 เข้าใช้งานผ่านเว็บ (ไม่ต้องติดตั้ง)</div>
        <div style="font-family:monospace;font-size:.9rem;color:var(--clr-primary);background:var(--clr-primary-pale);padding:8px 14px;border-radius:8px">office.com → Sign In ด้วย Account องค์กร</div>
      </div>
    ',
  ],

  [
    'cat'   => 'teams',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>',
    'title' => 'การใช้งาน Microsoft Teams',
    'desc'  => 'การสร้าง Channel, นัดประชุมออนไลน์, แชร์ไฟล์ และการตั้งค่าพื้นฐาน',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        Microsoft Teams คือศูนย์กลางการทำงานร่วมกันขององค์กร
        ใช้แทนการส่ง Email ภายในได้ในหลายกรณี ทำให้การสื่อสารรวดเร็วและมีประสิทธิภาพมากขึ้น
      </p>

      <!-- Mock Teams UI -->
      <div style="border:1px solid var(--clr-border);border-radius:14px;overflow:hidden;margin-bottom:24px">
        <div style="display:flex;height:200px">
          <!-- Sidebar -->
          <div style="width:180px;background:#2d2d30;padding:12px;display:flex;flex-direction:column;gap:6px;flex-shrink:0">
            <div style="font-size:.68rem;color:#8a8a8a;text-transform:uppercase;letter-spacing:.06em;padding:4px 6px">ทีมของฉัน</div>
            <div style="background:#ffffff15;border-radius:6px;padding:6px 8px;color:white;font-size:.78rem;display:flex;align-items:center;gap:6px">
              <span style="color:#b5b5b5">#</span> กองสารสนเทศ
            </div>
            <div style="padding:6px 8px;color:#b5b5b5;font-size:.78rem;display:flex;align-items:center;gap:6px">
              <span>#</span> ทั่วไป
            </div>
            <div style="padding:6px 8px;color:#b5b5b5;font-size:.78rem;display:flex;align-items:center;gap:6px">
              <span>#</span> โครงการปี 2568
            </div>
            <div style="padding:6px 8px;color:#b5b5b5;font-size:.78rem;display:flex;align-items:center;gap:6px">
              <span>#</span> IT-Support
            </div>
          </div>
          <!-- Chat area -->
          <div style="flex:1;background:#1a1a1a;padding:12px;display:flex;flex-direction:column;gap:8px;overflow:hidden">
            <div style="display:flex;gap:8px;align-items:flex-start">
              <div style="width:28px;height:28px;border-radius:50%;background:#6264a7;display:flex;align-items:center;justify-content:center;font-size:.7rem;color:white;flex-shrink:0">สช</div>
              <div>
                <div style="font-size:.72rem;color:#8a8a8a;margin-bottom:2px">สมชาย ใจดี  10:30</div>
                <div style="background:#2d2d30;border-radius:0 8px 8px 8px;padding:8px 10px;color:#e0e0e0;font-size:.8rem">แนบไฟล์รายงานประจำเดือนมาให้แล้วนะครับ 📎</div>
              </div>
            </div>
            <div style="display:flex;gap:8px;align-items:flex-start;justify-content:flex-end">
              <div>
                <div style="font-size:.72rem;color:#8a8a8a;margin-bottom:2px;text-align:right">ฉัน  10:32</div>
                <div style="background:#6264a7;border-radius:8px 0 8px 8px;padding:8px 10px;color:white;font-size:.8rem">รับทราบครับ ขอบคุณ 👍</div>
              </div>
              <div style="width:28px;height:28px;border-radius:50%;background:#036c70;display:flex;align-items:center;justify-content:center;font-size:.7rem;color:white;flex-shrink:0">ฉ</div>
            </div>
          </div>
        </div>
      </div>

      <!-- ฟีเจอร์หลัก -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">ฟีเจอร์ที่ใช้บ่อย</div>
      <table style="width:100%;border-collapse:collapse;font-size:.88rem;margin-bottom:20px">
        <thead>
          <tr style="background:var(--clr-primary-pale)">
            <th style="padding:10px 14px;text-align:left;border:1px solid var(--clr-border)">ฟีเจอร์</th>
            <th style="padding:10px 14px;text-align:left;border:1px solid var(--clr-border)">วิธีเข้าถึง</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">📅 นัดประชุม</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">Calendar → New Meeting → เพิ่มผู้เข้าร่วม</td>
          </tr>
          <tr style="background:var(--clr-bg)">
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">📎 แชร์ไฟล์</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">คลิก Attach (📎) ในช่องพิมพ์ข้อความ</td>
          </tr>
          <tr>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">🎥 เปิดกล้อง/ไมค์</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">ระหว่างประชุม กดไอคอนกล้อง/ไมโครโฟน</td>
          </tr>
          <tr style="background:var(--clr-bg)">
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">🖥️ แชร์หน้าจอ</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">ระหว่างประชุม กดไอคอน Share → เลือกหน้าจอ</td>
          </tr>
        </tbody>
      </table>
    ',
  ],

  [
    'cat'   => 'onedrive',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>',
    'title' => 'การใช้ OneDrive สำหรับเก็บและแชร์ไฟล์',
    'desc'  => 'อัปโหลด จัดการโฟลเดอร์ แชร์ไฟล์ Sync บนคอมพิวเตอร์ และการจัดการสิทธิ์',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        OneDrive คือพื้นที่เก็บไฟล์ส่วนตัวบน Cloud ขนาด <strong>1 TB</strong>
        ไฟล์ที่บันทึกจะ Sync อัตโนมัติและเข้าถึงได้จากทุกอุปกรณ์
        ไม่ต้องกลัวข้อมูลหายเมื่อคอมพิวเตอร์พัง
      </p>

      <!-- พื้นที่ใช้งาน Visual -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">พื้นที่จัดเก็บ</div>
      <div style="background:var(--clr-bg);border-radius:12px;padding:16px;margin-bottom:24px;border:1px solid var(--clr-border)">
        <div style="display:flex;justify-content:space-between;font-size:.85rem;margin-bottom:8px">
          <span>ใช้แล้ว <strong>234 GB</strong></span>
          <span style="color:var(--clr-text-muted)">จากทั้งหมด <strong>1 TB</strong></span>
        </div>
        <div style="background:#e2e8f0;border-radius:20px;height:16px;overflow:hidden">
          <div style="background:linear-gradient(90deg,#0078d4,#40a9ff);width:23%;height:100%;border-radius:20px"></div>
        </div>
        <div style="display:flex;gap:16px;margin-top:10px;font-size:.78rem;color:var(--clr-text-muted)">
          <span>📄 เอกสาร 120 GB</span>
          <span>🖼️ รูปภาพ 80 GB</span>
          <span>📦 อื่นๆ 34 GB</span>
        </div>
      </div>

      <!-- วิธีแชร์ไฟล์ -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">การแชร์ไฟล์ให้เพื่อนร่วมงาน</div>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-bottom:20px">
        <div style="background:#eff6ff;border:1px solid #bfdbfe;border-radius:10px;padding:14px">
          <div style="font-weight:600;font-size:.88rem;color:#1e40af;margin-bottom:6px">🔗 แชร์ลิงก์</div>
          <div style="font-size:.8rem;color:#1e3a8a;line-height:1.6">คลิกขวาที่ไฟล์ → Share → Copy Link → ส่งทาง Teams หรือ Email</div>
        </div>
        <div style="background:#f0fdf4;border:1px solid #bbf7d0;border-radius:10px;padding:14px">
          <div style="font-weight:600;font-size:.88rem;color:#166534;margin-bottom:6px">👤 เพิ่มผู้ใช้</div>
          <div style="font-size:.8rem;color:#14532d;line-height:1.6">คลิกขวา → Share → พิมพ์ Email เพื่อนร่วมงาน → กำหนดสิทธิ์</div>
        </div>
      </div>

      <!-- ระดับสิทธิ์ -->
      <table style="width:100%;border-collapse:collapse;font-size:.88rem">
        <thead>
          <tr style="background:var(--clr-primary-pale)">
            <th style="padding:10px 14px;text-align:left;border:1px solid var(--clr-border)">สิทธิ์</th>
            <th style="padding:10px 14px;text-align:center;border:1px solid var(--clr-border)">อ่าน</th>
            <th style="padding:10px 14px;text-align:center;border:1px solid var(--clr-border)">แก้ไข</th>
            <th style="padding:10px 14px;text-align:center;border:1px solid var(--clr-border)">ลบ</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);font-weight:600">View only</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center;color:#22c55e">✔</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center;color:#ef4444">✘</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center;color:#ef4444">✘</td>
          </tr>
          <tr style="background:var(--clr-bg)">
            <td style="padding:10px 14px;border:1px solid var(--clr-border);font-weight:600">Can edit</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center;color:#22c55e">✔</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center;color:#22c55e">✔</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center;color:#ef4444">✘</td>
          </tr>
          <tr>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);font-weight:600">Owner</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center;color:#22c55e">✔</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center;color:#22c55e">✔</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center;color:#22c55e">✔</td>
          </tr>
        </tbody>
      </table>
    ',
  ],

  [
    'cat'   => 'saraban',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>',
    'title' => 'ระบบรับ-ส่งหนังสือราชการดิจิทัล',
    'desc'  => 'วิธีสร้าง ส่ง รับ และจัดเก็บหนังสือในระบบสารบรรณอิเล็กทรอนิกส์',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        ระบบสารบรรณอิเล็กทรอนิกส์ใช้สำหรับ<strong>รับและส่งหนังสือราชการ</strong>
        ทั้งภายในองค์กรและระหว่างหน่วยงานภายนอก ลดการใช้กระดาษ
        และสามารถติดตามสถานะหนังสือได้แบบ Real-time
      </p>

      <!-- ประเภทหนังสือ -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">ประเภทหนังสือในระบบ</div>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-bottom:24px">
        <div style="background:var(--clr-bg);border-radius:10px;padding:14px;border-left:4px solid #2563eb">
          <div style="font-weight:600;font-size:.9rem;color:var(--clr-text);margin-bottom:4px">📨 หนังสือรับ</div>
          <div style="font-size:.82rem;color:var(--clr-text-muted);line-height:1.6">หนังสือที่ได้รับจากหน่วยงานภายนอกหรือภายใน ระบบจะแจ้งเตือนทาง Email อัตโนมัติ</div>
        </div>
        <div style="background:var(--clr-bg);border-radius:10px;padding:14px;border-left:4px solid #16a34a">
          <div style="font-weight:600;font-size:.9rem;color:var(--clr-text);margin-bottom:4px">📤 หนังสือส่ง</div>
          <div style="font-size:.82rem;color:var(--clr-text-muted);line-height:1.6">หนังสือที่สร้างและส่งออกไป ต้องผ่านการอนุมัติก่อนส่งทุกครั้ง</div>
        </div>
        <div style="background:var(--clr-bg);border-radius:10px;padding:14px;border-left:4px solid #d97706">
          <div style="font-weight:600;font-size:.9rem;color:var(--clr-text);margin-bottom:4px">🔄 หนังสือเวียน</div>
          <div style="font-size:.82rem;color:var(--clr-text-muted);line-height:1.6">ประกาศและคำสั่งที่แจกจ่ายไปยังหลายหน่วยงานพร้อมกัน</div>
        </div>
        <div style="background:var(--clr-bg);border-radius:10px;padding:14px;border-left:4px solid #7c3aed">
          <div style="font-weight:600;font-size:.9rem;color:var(--clr-text);margin-bottom:4px">📁 จัดเก็บ</div>
          <div style="font-size:.82rem;color:var(--clr-text-muted);line-height:1.6">หนังสือที่ดำเนินการเสร็จแล้วและเก็บเข้าทะเบียนอย่างถาวร</div>
        </div>
      </div>

      <!-- สถานะการติดตาม -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">การติดตามสถานะหนังสือ</div>
      <div style="border:1px solid var(--clr-border);border-radius:12px;overflow:hidden;margin-bottom:20px">
        <div style="background:var(--clr-primary-pale);padding:10px 16px;font-size:.82rem;font-weight:600;color:var(--clr-primary-dark)">
          หนังสือเลขที่ สน.0001/2568 — ขอความร่วมมือจัดการอบรม
        </div>
        <div style="padding:14px 16px;display:flex;flex-direction:column;gap:0">
          <div style="display:flex;gap:12px;padding:8px 0;border-bottom:1px solid var(--clr-border)">
            <span style="color:#22c55e;font-weight:700;font-size:.85rem">✔</span>
            <span style="font-size:.85rem">รับหนังสือ — 15 ม.ค. 2568 09:00</span>
          </div>
          <div style="display:flex;gap:12px;padding:8px 0;border-bottom:1px solid var(--clr-border)">
            <span style="color:#22c55e;font-weight:700;font-size:.85rem">✔</span>
            <span style="font-size:.85rem">ส่งให้ผู้บังคับบัญชาพิจารณา — 15 ม.ค. 2568 10:30</span>
          </div>
          <div style="display:flex;gap:12px;padding:8px 0;border-bottom:1px solid var(--clr-border)">
            <span style="color:#f59e0b;font-weight:700;font-size:.85rem">⏳</span>
            <span style="font-size:.85rem;color:var(--clr-text-muted)">รอการอนุมัติและดำเนินการ</span>
          </div>
          <div style="display:flex;gap:12px;padding:8px 0">
            <span style="color:#d1d5db;font-weight:700;font-size:.85rem">○</span>
            <span style="font-size:.85rem;color:var(--clr-text-muted)">จัดเก็บ</span>
          </div>
        </div>
      </div>
    ',
  ],

  [
    'cat'   => 'vpn',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>',
    'title' => 'การใช้งาน VPN เพื่อเข้าระบบจากนอกอาคาร',
    'desc'  => 'ติดตั้งและตั้งค่า VPN Client บน Windows, macOS และ Mobile',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        คู่มือนี้แนะนำการติดตั้ง VPN Client สำหรับ Windows 10/11 โดยละเอียด
        สำหรับ macOS และมือถือ ดูคู่มือย่อยได้จากหน้า <strong>ระบบเครือข่าย → VPN</strong>
      </p>

      <!-- Windows Steps -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">การติดตั้ง VPN บน Windows 10/11</div>

      <div style="border:1px solid var(--clr-border);border-radius:12px;overflow:hidden;margin-bottom:24px">
        <div style="display:flex;gap:14px;padding:14px 16px;border-bottom:1px solid var(--clr-border);align-items:flex-start">
          <div style="width:32px;height:32px;border-radius:8px;background:#0078d4;color:white;display:flex;align-items:center;justify-content:center;font-size:.8rem;font-weight:700;flex-shrink:0">1</div>
          <div>
            <div style="font-weight:600;font-size:.9rem;margin-bottom:3px">เปิด Settings</div>
            <div style="font-size:.83rem;color:var(--clr-text-muted)">กด <strong>Win + I</strong> หรือคลิก Start → Settings → Network & Internet → VPN</div>
          </div>
        </div>
        <div style="display:flex;gap:14px;padding:14px 16px;background:var(--clr-bg);border-bottom:1px solid var(--clr-border);align-items:flex-start">
          <div style="width:32px;height:32px;border-radius:8px;background:#0078d4;color:white;display:flex;align-items:center;justify-content:center;font-size:.8rem;font-weight:700;flex-shrink:0">2</div>
          <div>
            <div style="font-weight:600;font-size:.9rem;margin-bottom:3px">Add a VPN Connection</div>
            <div style="font-size:.83rem;color:var(--clr-text-muted)">คลิก <strong>"+ Add a VPN connection"</strong> แล้วกรอกข้อมูล</div>
          </div>
        </div>
        <div style="display:flex;gap:14px;padding:14px 16px;border-bottom:1px solid var(--clr-border);align-items:flex-start">
          <div style="width:32px;height:32px;border-radius:8px;background:#0078d4;color:white;display:flex;align-items:center;justify-content:center;font-size:.8rem;font-weight:700;flex-shrink:0">3</div>
          <div>
            <div style="font-weight:600;font-size:.9rem;margin-bottom:3px">กรอกข้อมูล VPN</div>
            <div style="font-size:.83rem;color:var(--clr-text-muted);background:var(--clr-bg);border-radius:8px;padding:8px 12px;margin-top:6px;font-family:monospace;line-height:1.8">
              Provider: Windows (built-in)<br>
              Connection name: VPN-องค์กร<br>
              Server: vpn.example.go.th<br>
              VPN type: IKEv2
            </div>
          </div>
        </div>
        <div style="display:flex;gap:14px;padding:14px 16px;align-items:flex-start">
          <div style="width:32px;height:32px;border-radius:8px;background:#22c55e;color:white;display:flex;align-items:center;justify-content:center;font-size:.9rem;font-weight:700;flex-shrink:0">✔</div>
          <div>
            <div style="font-weight:600;font-size:.9rem;margin-bottom:3px">เชื่อมต่อ</div>
            <div style="font-size:.83rem;color:var(--clr-text-muted)">คลิก VPN ที่สร้างไว้ → Connect → กรอก Username/Password องค์กร</div>
          </div>
        </div>
      </div>

      <div style="background:#fef3c7;border:1px solid #fde68a;border-radius:12px;padding:14px 18px;font-size:.88rem;color:#713f12;line-height:1.7">
        ⚠️ หากเชื่อมต่อไม่ได้ ให้ตรวจสอบว่าเปิดใช้งาน VPN ขณะอยู่ในเครือข่ายภายนอกเท่านั้น ห้ามใช้ VPN ขณะเชื่อมต่อ Wi-Fi ภายในอาคาร
      </div>
    ',
  ],

  [
    'cat'   => 'word-excel',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>',
    'title' => 'Word & Excel สำหรับงานทั่วไป',
    'desc'  => 'เทมเพลตหนังสือราชการ การทำตารางข้อมูล และทริคที่ใช้บ่อยในสำนักงาน',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        Word และ Excel เป็นเครื่องมือพื้นฐานที่บุคลากรทุกคนควรใช้เป็น
        คู่มือนี้รวบรวมทริค Shortcut และเทมเพลตที่ใช้บ่อยในงานราชการ
      </p>

      <!-- Word Shortcuts -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:10px">Shortcut Word ที่ใช้บ่อย</div>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;margin-bottom:24px">
        <div style="background:var(--clr-bg);border-radius:8px;padding:10px 14px;display:flex;gap:10px;align-items:center;border:1px solid var(--clr-border)">
          <kbd style="background:#1e293b;color:white;padding:3px 8px;border-radius:4px;font-size:.75rem;font-family:monospace">Ctrl + S</kbd>
          <span style="font-size:.83rem">บันทึกไฟล์</span>
        </div>
        <div style="background:var(--clr-bg);border-radius:8px;padding:10px 14px;display:flex;gap:10px;align-items:center;border:1px solid var(--clr-border)">
          <kbd style="background:#1e293b;color:white;padding:3px 8px;border-radius:4px;font-size:.75rem;font-family:monospace">Ctrl + Z</kbd>
          <span style="font-size:.83rem">เลิกทำ</span>
        </div>
        <div style="background:var(--clr-bg);border-radius:8px;padding:10px 14px;display:flex;gap:10px;align-items:center;border:1px solid var(--clr-border)">
          <kbd style="background:#1e293b;color:white;padding:3px 8px;border-radius:4px;font-size:.75rem;font-family:monospace">Ctrl + B</kbd>
          <span style="font-size:.83rem">ตัวหนา</span>
        </div>
        <div style="background:var(--clr-bg);border-radius:8px;padding:10px 14px;display:flex;gap:10px;align-items:center;border:1px solid var(--clr-border)">
          <kbd style="background:#1e293b;color:white;padding:3px 8px;border-radius:4px;font-size:.75rem;font-family:monospace">Ctrl + P</kbd>
          <span style="font-size:.83rem">พิมพ์</span>
        </div>
        <div style="background:var(--clr-bg);border-radius:8px;padding:10px 14px;display:flex;gap:10px;align-items:center;border:1px solid var(--clr-border)">
          <kbd style="background:#1e293b;color:white;padding:3px 8px;border-radius:4px;font-size:.75rem;font-family:monospace">Ctrl + H</kbd>
          <span style="font-size:.83rem">Find & Replace</span>
        </div>
        <div style="background:var(--clr-bg);border-radius:8px;padding:10px 14px;display:flex;gap:10px;align-items:center;border:1px solid var(--clr-border)">
          <kbd style="background:#1e293b;color:white;padding:3px 8px;border-radius:4px;font-size:.75rem;font-family:monospace">Alt + F4</kbd>
          <span style="font-size:.83rem">ปิดโปรแกรม</span>
        </div>
      </div>

      <!-- Excel สูตรที่ใช้บ่อย -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:10px">สูตร Excel ที่ใช้บ่อยในสำนักงาน</div>
      <table style="width:100%;border-collapse:collapse;font-size:.87rem">
        <thead>
          <tr style="background:linear-gradient(135deg,#217346,#2e7d32)">
            <th style="padding:10px 14px;text-align:left;border:1px solid #2e7d32;color:white">สูตร</th>
            <th style="padding:10px 14px;text-align:left;border:1px solid #2e7d32;color:white">ใช้ทำอะไร</th>
            <th style="padding:10px 14px;text-align:left;border:1px solid #2e7d32;color:white">ตัวอย่าง</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);font-family:monospace;color:#166534;font-weight:600">=SUM()</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">รวมตัวเลข</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);font-family:monospace;font-size:.8rem">=SUM(A1:A10)</td>
          </tr>
          <tr style="background:var(--clr-bg)">
            <td style="padding:10px 14px;border:1px solid var(--clr-border);font-family:monospace;color:#166534;font-weight:600">=AVERAGE()</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">หาค่าเฉลี่ย</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);font-family:monospace;font-size:.8rem">=AVERAGE(B1:B20)</td>
          </tr>
          <tr>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);font-family:monospace;color:#166534;font-weight:600">=COUNTIF()</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">นับตามเงื่อนไข</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);font-family:monospace;font-size:.8rem">=COUNTIF(C1:C50,"ผ่าน")</td>
          </tr>
          <tr style="background:var(--clr-bg)">
            <td style="padding:10px 14px;border:1px solid var(--clr-border);font-family:monospace;color:#166534;font-weight:600">=VLOOKUP()</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">ค้นหาข้อมูล</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);font-family:monospace;font-size:.8rem">=VLOOKUP(D1,A:B,2,0)</td>
          </tr>
        </tbody>
      </table>
    ',
  ],

  [
    'cat'   => 'sharepoint',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>',
    'title' => 'SharePoint: คลังเอกสารองค์กร',
    'desc'  => 'วิธีเข้าถึง อัปโหลด และจัดการเอกสารส่วนกลางบน SharePoint',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        SharePoint คือ<strong>คลังเอกสารส่วนกลาง</strong>ขององค์กร
        แตกต่างจาก OneDrive ที่เป็นพื้นที่ส่วนตัว SharePoint เปิดให้ทุกคนในทีมเข้าถึงและแก้ไขได้พร้อมกัน
        เหมาะสำหรับจัดเก็บนโยบาย แบบฟอร์ม และเอกสารที่ต้องใช้ร่วมกัน
      </p>

      <!-- เปรียบเทียบ OneDrive vs SharePoint -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:10px">OneDrive vs SharePoint ใช้อะไรดี?</div>
      <table style="width:100%;border-collapse:collapse;font-size:.88rem;margin-bottom:24px">
        <thead>
          <tr>
            <th style="padding:10px 14px;text-align:left;border:1px solid var(--clr-border);background:#f1f5f9"></th>
            <th style="padding:10px 14px;text-align:center;border:1px solid var(--clr-border);background:#eff6ff;color:#1e40af">☁️ OneDrive</th>
            <th style="padding:10px 14px;text-align:center;border:1px solid var(--clr-border);background:#f0fdf4;color:#166534">📂 SharePoint</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);font-weight:600">ผู้ใช้</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center">เฉพาะตัว</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center">ทั้งทีม</td>
          </tr>
          <tr style="background:var(--clr-bg)">
            <td style="padding:10px 14px;border:1px solid var(--clr-border);font-weight:600">เหมาะกับ</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center">ไฟล์ส่วนตัว</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center">เอกสารทีมงาน</td>
          </tr>
          <tr>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);font-weight:600">แก้ไขพร้อมกัน</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center;color:#ef4444">✘</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center;color:#22c55e">✔</td>
          </tr>
          <tr style="background:var(--clr-bg)">
            <td style="padding:10px 14px;border:1px solid var(--clr-border);font-weight:600">ประวัติเวอร์ชัน</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center;color:#22c55e">✔</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center;color:#22c55e">✔</td>
          </tr>
        </tbody>
      </table>

      <!-- โครงสร้างโฟลเดอร์ -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">โครงสร้างโฟลเดอร์ใน SharePoint</div>
      <div style="background:var(--clr-bg);border-radius:12px;padding:16px;font-family:monospace;font-size:.85rem;line-height:2;border:1px solid var(--clr-border)">
        <div>📂 <strong>คลังเอกสารองค์กร</strong></div>
        <div style="padding-left:20px">📁 นโยบายและระเบียบ</div>
        <div style="padding-left:20px">📁 แบบฟอร์ม</div>
        <div style="padding-left:40px">📄 แบบฟอร์มขอ Account.docx</div>
        <div style="padding-left:40px">📄 แบบฟอร์มลา.docx</div>
        <div style="padding-left:20px">📁 รายงานประจำปี</div>
        <div style="padding-left:20px">📁 คู่มือการใช้งาน</div>
      </div>
    ',
  ],
];

$display_guides = $cat ? array_filter($guides, fn($g) => $g['cat'] === $cat) : $guides;
$display_guides = array_values($display_guides);

require_once '../includes/header.php';
?>

<?php
$panel_title   = 'คู่มือการใช้งาน';
$panel_cat     = $cat;
$panel_base    = 'guides.php';
$panel_menu    = $categories;
$panel_items   = $guides;
$panel_contact = false;
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

  <?php require_once '../includes/single-panel.php'; ?>
</main>

<?php require_once '../includes/footer.php'; ?>