<?php
// pages/services.php — IT Services Page
require_once '../includes/config.php';

$page_title = 'บริการ IT';
$cat = $_GET['cat'] ?? '';

$categories = [
  'account'  => ['label' => 'ขอ Account ใหม่'],
  'renew'    => ['label' => 'ต่ออายุ Account'],
  'status'   => ['label' => 'เช็กสถานะ Account/รหัสผ่าน'],
  'reset'    => ['label' => 'รีเซทรหัสผ่าน'],
  'domain'   => ['label' => 'ขอ Join Domain'],
  'access'   => ['label' => 'ขอสิทธิ์เข้า Computer'],
  'email'    => ['label' => 'ขอเปลี่ยน Email'],
  'internet' => ['label' => 'ขอเพิ่มปริมาณอินเทอร์เน็ต'],
];

$all_services = [
  [
    'cat'   => 'account',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/><line x1="18" y1="8" x2="23" y2="13"/><line x1="23" y1="8" x2="18" y2="13"/></svg>',
    'title' => 'ขอ Account ใหม่',
    'desc'  => 'สมัครบัญชีผู้ใช้งานใหม่สำหรับบุคลากรที่ยังไม่เคยมี Account ในระบบ',
    'extra_html' => '
      <!-- รูปแบบฟอร์ม -->
      <div style="width:100%;border-radius:14px;overflow:hidden;border:1px solid var(--clr-border);margin-bottom:24px;background:#f8fafc">
        <div style="background:linear-gradient(135deg,#1e40af 0%,#3b82f6 100%);padding:18px 24px;display:flex;align-items:center;gap:12px">
          <div style="width:36px;height:36px;background:rgba(255,255,255,.2);border-radius:8px;display:flex;align-items:center;justify-content:center">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          </div>
          <span style="color:white;font-weight:600;font-size:.95rem">แบบฟอร์มขอ Account ใหม่ — กองบริหารสารสนเทศ</span>
        </div>
        <div style="padding:20px 24px;display:flex;flex-direction:column;gap:12px">
          <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px">
            <div style="background:white;border:1px solid #e2e8f0;border-radius:8px;padding:12px">
              <div style="font-size:.72rem;color:#64748b;margin-bottom:4px;font-weight:600;text-transform:uppercase;letter-spacing:.04em">ชื่อ-นามสกุล</div>
              <div style="height:8px;background:#e2e8f0;border-radius:4px;width:80%"></div>
            </div>
            <div style="background:white;border:1px solid #e2e8f0;border-radius:8px;padding:12px">
              <div style="font-size:.72rem;color:#64748b;margin-bottom:4px;font-weight:600;text-transform:uppercase;letter-spacing:.04em">รหัสบุคลากร</div>
              <div style="height:8px;background:#e2e8f0;border-radius:4px;width:60%"></div>
            </div>
          </div>
          <div style="background:white;border:1px solid #e2e8f0;border-radius:8px;padding:12px">
            <div style="font-size:.72rem;color:#64748b;margin-bottom:4px;font-weight:600;text-transform:uppercase;letter-spacing:.04em">หน่วยงาน / แผนก</div>
            <div style="height:8px;background:#e2e8f0;border-radius:4px;width:50%"></div>
          </div>
          <div style="background:white;border:1px solid #e2e8f0;border-radius:8px;padding:12px">
            <div style="font-size:.72rem;color:#64748b;margin-bottom:6px;font-weight:600;text-transform:uppercase;letter-spacing:.04em">ลายมือชื่อผู้บังคับบัญชา</div>
            <div style="height:32px;border-bottom:1px dashed #cbd5e1;display:flex;align-items:flex-end;padding-bottom:4px">
              <div style="height:6px;background:#e2e8f0;border-radius:4px;width:40%"></div>
            </div>
          </div>
        </div>
      </div>

      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        การขอ Account ใหม่เหมาะสำหรับ<strong>บุคลากรที่เพิ่งเข้าปฏิบัติงาน</strong>และยังไม่มีบัญชีผู้ใช้งานในระบบขององค์กร
        ไม่ว่าจะเป็นพนักงานใหม่ อาสาสมัคร หรือผู้รับจ้างระยะสั้น ทุกคนที่ต้องการเข้าถึงระบบสารสนเทศภายในจำเป็นต้องผ่านกระบวนการนี้
      </p>

      <!-- ตารางเอกสารที่ต้องเตรียม -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:10px">เอกสารที่ต้องเตรียม</div>
      <table style="width:100%;border-collapse:collapse;font-size:.88rem;margin-bottom:24px">
        <thead>
          <tr style="background:var(--clr-primary-pale)">
            <th style="padding:10px 14px;text-align:left;border:1px solid var(--clr-border);color:var(--clr-primary-dark)">ลำดับ</th>
            <th style="padding:10px 14px;text-align:left;border:1px solid var(--clr-border);color:var(--clr-primary-dark)">เอกสาร</th>
            <th style="padding:10px 14px;text-align:left;border:1px solid var(--clr-border);color:var(--clr-primary-dark)">หมายเหตุ</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">1</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">แบบฟอร์มขอ Account (ดาวน์โหลดด้านล่าง)</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">กรอกให้ครบถ้วน</td>
          </tr>
          <tr style="background:var(--clr-bg)">
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">2</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">สำเนาบัตรประชาชน</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">เซ็นรับรองสำเนาถูกต้อง</td>
          </tr>
          <tr>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">3</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">ลายเซ็นผู้บังคับบัญชา</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">ในแบบฟอร์มเท่านั้น</td>
          </tr>
        </tbody>
      </table>

      <!-- ข้อมูลสำคัญ -->
      <div style="background:linear-gradient(135deg,#eff6ff,#dbeafe);border:1px solid #bfdbfe;border-radius:12px;padding:16px 18px;display:flex;gap:12px;align-items:flex-start">
        <div style="font-size:1.3rem;flex-shrink:0">ℹ️</div>
        <div>
          <div style="font-weight:600;font-size:.88rem;color:#1e40af;margin-bottom:4px">หมายเหตุสำคัญ</div>
          <div style="font-size:.85rem;color:#1e3a8a;line-height:1.7">
            Username และ Password เริ่มต้นจะถูกส่งไปยัง Email สำรองที่ระบุในแบบฟอร์ม
            กรุณาเปลี่ยนรหัสผ่านทันทีหลังล็อกอินครั้งแรก และต้องประกอบด้วยตัวอักษร+ตัวเลขอย่างน้อย 8 ตัว
          </div>
        </div>
      </div>
    ',
  ],

  [
    'cat'   => 'renew',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M23 4v6h-6"/><path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"/></svg>',
    'title' => 'ต่ออายุ Account',
    'desc'  => 'ขยายอายุการใช้งานบัญชีที่ใกล้หมดอายุหรือถูกระงับชั่วคราว',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        Account ของบุคลากรทุกคนมีอายุการใช้งาน<strong>1 ปีนับจากวันที่สร้าง</strong>
        เมื่อใกล้หมดอายุ ระบบจะส่งอีเมลแจ้งเตือนล่วงหน้า 30 วัน และ 7 วัน
        หากไม่ดำเนินการต่ออายุ บัญชีจะถูกระงับโดยอัตโนมัติ
      </p>

      <!-- Timeline วันแจ้งเตือน -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:14px">ลำดับการแจ้งเตือน</div>
      <div style="display:flex;align-items:center;gap:0;margin-bottom:28px;overflow-x:auto">
        <div style="display:flex;flex-direction:column;align-items:center;flex:1;min-width:80px">
          <div style="width:36px;height:36px;border-radius:50%;background:#fef3c7;border:2px solid #f59e0b;display:flex;align-items:center;justify-content:center;font-size:.8rem;font-weight:700;color:#92400e">30</div>
          <div style="width:100%;height:3px;background:#f59e0b;margin:0"></div>
          <div style="font-size:.72rem;color:var(--clr-text-muted);margin-top:6px;text-align:center">แจ้งเตือน<br>ครั้งแรก</div>
        </div>
        <div style="height:3px;background:#e5e7eb;flex:1;min-width:20px"></div>
        <div style="display:flex;flex-direction:column;align-items:center;flex:1;min-width:80px">
          <div style="width:36px;height:36px;border-radius:50%;background:#fef3c7;border:2px solid #f59e0b;display:flex;align-items:center;justify-content:center;font-size:.8rem;font-weight:700;color:#92400e">7</div>
          <div style="font-size:.72rem;color:var(--clr-text-muted);margin-top:6px;text-align:center">แจ้งเตือน<br>ครั้งสอง</div>
        </div>
        <div style="height:3px;background:#e5e7eb;flex:1;min-width:20px"></div>
        <div style="display:flex;flex-direction:column;align-items:center;flex:1;min-width:80px">
          <div style="width:36px;height:36px;border-radius:50%;background:#fee2e2;border:2px solid #ef4444;display:flex;align-items:center;justify-content:center;font-size:.8rem;font-weight:700;color:#991b1b">0</div>
          <div style="font-size:.72rem;color:var(--clr-text-muted);margin-top:6px;text-align:center">วันหมด<br>อายุ</div>
        </div>
        <div style="height:3px;background:#e5e7eb;flex:1;min-width:20px"></div>
        <div style="display:flex;flex-direction:column;align-items:center;flex:1;min-width:80px">
          <div style="width:36px;height:36px;border-radius:50%;background:#f3f4f6;border:2px solid #9ca3af;display:flex;align-items:center;justify-content:center;font-size:1rem">🔒</div>
          <div style="font-size:.72rem;color:var(--clr-text-muted);margin-top:6px;text-align:center">ระงับ<br>บัญชี</div>
        </div>
      </div>

      <!-- ตารางเปรียบเทียบ -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:10px">เปรียบเทียบสถานะบัญชี</div>
      <table style="width:100%;border-collapse:collapse;font-size:.88rem;margin-bottom:20px">
        <thead>
          <tr style="background:var(--clr-primary-pale)">
            <th style="padding:10px 14px;text-align:left;border:1px solid var(--clr-border)">สถานะ</th>
            <th style="padding:10px 14px;text-align:center;border:1px solid var(--clr-border)">เข้าระบบได้</th>
            <th style="padding:10px 14px;text-align:center;border:1px solid var(--clr-border)">รับ Email</th>
            <th style="padding:10px 14px;text-align:left;border:1px solid var(--clr-border)">การแก้ไข</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)"><span style="color:#16a34a;font-weight:600">✔ ปกติ</span></td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center">✔</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center">✔</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">—</td>
          </tr>
          <tr style="background:var(--clr-bg)">
            <td style="padding:10px 14px;border:1px solid var(--clr-border)"><span style="color:#d97706;font-weight:600">⚠ ใกล้หมดอายุ</span></td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center">✔</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center">✔</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">ยื่นคำร้องต่ออายุ</td>
          </tr>
          <tr>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)"><span style="color:#dc2626;font-weight:600">✖ หมดอายุ/ระงับ</span></td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center">✖</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center">✖</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">ติดต่อ IT โดยตรง</td>
          </tr>
        </tbody>
      </table>

      <div style="background:#f0fdf4;border:1px solid #bbf7d0;border-radius:12px;padding:14px 18px;font-size:.88rem;color:#166534;line-height:1.7">
        💡 <strong>เคล็ดลับ:</strong> ยื่นคำร้องก่อนวันหมดอายุอย่างน้อย 7 วัน เพื่อให้บัญชีไม่หยุดชะงักระหว่างใช้งาน
      </div>
    ',
  ],

  [
    'cat'   => 'status',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>',
    'title' => 'เช็กสถานะ Account/รหัสผ่าน',
    'desc'  => 'ตรวจสอบว่าบัญชียังใช้งานได้อยู่หรือไม่ และวันหมดอายุของรหัสผ่าน',
    'extra_html' => '
      <!-- Mock UI ระบบตรวจสอบ -->
      <div style="border:1px solid var(--clr-border);border-radius:14px;overflow:hidden;margin-bottom:24px">
        <div style="background:#1e293b;padding:10px 16px;display:flex;align-items:center;gap:8px">
          <div style="width:10px;height:10px;border-radius:50%;background:#ef4444"></div>
          <div style="width:10px;height:10px;border-radius:50%;background:#f59e0b"></div>
          <div style="width:10px;height:10px;border-radius:50%;background:#22c55e"></div>
          <span style="color:#94a3b8;font-size:.75rem;margin-left:8px">account.example.go.th/check</span>
        </div>
        <div style="background:#f8fafc;padding:24px">
          <div style="font-size:.85rem;font-weight:600;color:#334155;margin-bottom:12px">ตรวจสอบสถานะบัญชี</div>
          <div style="display:flex;gap:10px;margin-bottom:16px">
            <div style="flex:1;background:white;border:1px solid #e2e8f0;border-radius:8px;padding:10px 14px;font-size:.85rem;color:#94a3b8">กรอก Username ของคุณ...</div>
            <div style="background:#2563eb;color:white;border-radius:8px;padding:10px 18px;font-size:.85rem;font-weight:600;white-space:nowrap">ตรวจสอบ</div>
          </div>
          <div style="background:white;border:1px solid #bbf7d0;border-radius:10px;padding:14px 16px">
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:10px">
              <div style="width:10px;height:10px;border-radius:50%;background:#22c55e"></div>
              <span style="font-weight:600;font-size:.88rem;color:#166534">บัญชีใช้งานได้ปกติ</span>
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;font-size:.82rem;color:#475569">
              <div>👤 Username: <strong>user2025</strong></div>
              <div>📅 หมดอายุ: <strong>31 ธ.ค. 2569</strong></div>
              <div>🔑 รหัสผ่าน: <strong>อีก 45 วัน</strong></div>
              <div>🏢 แผนก: <strong>กองสารสนเทศ</strong></div>
            </div>
          </div>
        </div>
      </div>

      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        ระบบตรวจสอบสถานะ Account ให้บริการ<strong>ตลอด 24 ชั่วโมง</strong>ผ่านเว็บเบราว์เซอร์
        ไม่จำเป็นต้องล็อกอิน เพียงกรอก Username ก็สามารถดูข้อมูลพื้นฐานได้ทันที
        ข้อมูลที่แสดงได้แก่ สถานะบัญชี วันหมดอายุ และวันที่รหัสผ่านต้องเปลี่ยน
      </p>

      <!-- สถานะที่เป็นไปได้ -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">ความหมายของแต่ละสถานะ</div>
      <div style="display:flex;flex-direction:column;gap:10px;margin-bottom:20px">
        <div style="display:flex;gap:12px;align-items:center;background:var(--clr-bg);border-radius:10px;padding:12px 16px">
          <div style="width:12px;height:12px;border-radius:50%;background:#22c55e;flex-shrink:0"></div>
          <div>
            <div style="font-weight:600;font-size:.88rem;color:var(--clr-text)">ใช้งานได้ปกติ</div>
            <div style="font-size:.8rem;color:var(--clr-text-muted)">บัญชียังมีอายุและรหัสผ่านยังไม่หมด สามารถเข้าใช้งานได้ทันที</div>
          </div>
        </div>
        <div style="display:flex;gap:12px;align-items:center;background:var(--clr-bg);border-radius:10px;padding:12px 16px">
          <div style="width:12px;height:12px;border-radius:50%;background:#f59e0b;flex-shrink:0"></div>
          <div>
            <div style="font-weight:600;font-size:.88rem;color:var(--clr-text)">รหัสผ่านใกล้หมดอายุ</div>
            <div style="font-size:.8rem;color:var(--clr-text-muted)">เข้าระบบได้ แต่ควรเปลี่ยนรหัสผ่านก่อนครบกำหนด 90 วัน</div>
          </div>
        </div>
        <div style="display:flex;gap:12px;align-items:center;background:var(--clr-bg);border-radius:10px;padding:12px 16px">
          <div style="width:12px;height:12px;border-radius:50%;background:#ef4444;flex-shrink:0"></div>
          <div>
            <div style="font-weight:600;font-size:.88rem;color:var(--clr-text)">หมดอายุ / ถูกระงับ</div>
            <div style="font-size:.8rem;color:var(--clr-text-muted)">ไม่สามารถเข้าระบบได้ กรุณาติดต่อกองบริหารสารสนเทศโดยตรง</div>
          </div>
        </div>
      </div>
    ',
  ],

  [
    'cat'   => 'reset',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>',
    'title' => 'รีเซทรหัสผ่าน',
    'desc'  => 'ขอรีเซทรหัสผ่านกรณีลืมรหัสผ่านหรือรหัสผ่านหมดอายุ',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        หากลืมรหัสผ่านหรือรหัสผ่านหมดอายุ สามารถขอรีเซทได้ 2 ช่องทาง
        ได้แก่ <strong>มาด้วยตนเอง</strong>ที่กองบริหารสารสนเทศ หรือ<strong>ยืนยันตัวตนออนไลน์</strong>
        ผ่านระบบหากลงทะเบียน Email สำรองและเบอร์โทรไว้แล้ว
      </p>

      <!-- 2 ช่องทาง -->
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-bottom:24px">
        <div style="border:2px solid #bfdbfe;border-radius:14px;padding:18px;background:#eff6ff">
          <div style="font-size:1.6rem;margin-bottom:8px">🏢</div>
          <div style="font-weight:700;font-size:.92rem;color:#1e40af;margin-bottom:6px">มาด้วยตนเอง</div>
          <div style="font-size:.82rem;color:#1e3a8a;line-height:1.7">
            แสดงบัตรประจำตัวบุคลากร<br>
            เจ้าหน้าที่รีเซทให้ทันที<br>
            <strong>ใช้เวลา ~5 นาที</strong>
          </div>
        </div>
        <div style="border:2px solid #d1fae5;border-radius:14px;padding:18px;background:#f0fdf4">
          <div style="font-size:1.6rem;margin-bottom:8px">📱</div>
          <div style="font-weight:700;font-size:.92rem;color:#166534;margin-bottom:6px">ออนไลน์ (Self-Service)</div>
          <div style="font-size:.82rem;color:#14532d;line-height:1.7">
            รับ OTP ทาง SMS<br>
            ยืนยันตัวตนผ่านเว็บ<br>
            <strong>ต้องลงทะเบียนล่วงหน้า</strong>
          </div>
        </div>
      </div>

      <!-- กฎรหัสผ่านใหม่ -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">ข้อกำหนดรหัสผ่านใหม่</div>
      <div style="background:var(--clr-bg);border-radius:12px;padding:16px;margin-bottom:20px">
        <div style="display:flex;flex-direction:column;gap:8px;font-size:.88rem">
          <div style="display:flex;align-items:center;gap:8px"><span style="color:#22c55e;font-size:1rem">✔</span> ความยาวอย่างน้อย <strong>8 ตัวอักษร</strong></div>
          <div style="display:flex;align-items:center;gap:8px"><span style="color:#22c55e;font-size:1rem">✔</span> มีตัวพิมพ์ใหญ่อย่างน้อย <strong>1 ตัว</strong> (A–Z)</div>
          <div style="display:flex;align-items:center;gap:8px"><span style="color:#22c55e;font-size:1rem">✔</span> มีตัวเลขอย่างน้อย <strong>1 ตัว</strong> (0–9)</div>
          <div style="display:flex;align-items:center;gap:8px"><span style="color:#22c55e;font-size:1rem">✔</span> มีอักขระพิเศษอย่างน้อย <strong>1 ตัว</strong> (!@#$%)</div>
          <div style="display:flex;align-items:center;gap:8px"><span style="color:#ef4444;font-size:1rem">✘</span> <strong>ห้ามใช้รหัสผ่านเดิม</strong>ซ้ำ 5 ครั้งล่าสุด</div>
        </div>
      </div>

      <!-- ตัวอย่างรหัสผ่าน -->
      <table style="width:100%;border-collapse:collapse;font-size:.85rem">
        <thead>
          <tr style="background:var(--clr-primary-pale)">
            <th style="padding:9px 14px;text-align:left;border:1px solid var(--clr-border)">ตัวอย่าง</th>
            <th style="padding:9px 14px;text-align:center;border:1px solid var(--clr-border)">ผ่านเกณฑ์</th>
            <th style="padding:9px 14px;text-align:left;border:1px solid var(--clr-border)">เหตุผล</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="padding:9px 14px;border:1px solid var(--clr-border);font-family:monospace">P@ssw0rd!</td>
            <td style="padding:9px 14px;border:1px solid var(--clr-border);text-align:center;color:#22c55e;font-weight:700">✔</td>
            <td style="padding:9px 14px;border:1px solid var(--clr-border)">ครบทุกเงื่อนไข</td>
          </tr>
          <tr style="background:var(--clr-bg)">
            <td style="padding:9px 14px;border:1px solid var(--clr-border);font-family:monospace">password123</td>
            <td style="padding:9px 14px;border:1px solid var(--clr-border);text-align:center;color:#ef4444;font-weight:700">✘</td>
            <td style="padding:9px 14px;border:1px solid var(--clr-border)">ไม่มีตัวพิมพ์ใหญ่และอักขระพิเศษ</td>
          </tr>
        </tbody>
      </table>
    ',
  ],

  [
    'cat'   => 'domain',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>',
    'title' => 'ขอ Join Domain',
    'desc'  => 'เชื่อมต่อคอมพิวเตอร์เข้ากับ Domain ขององค์กรเพื่อใช้งานระบบต่างๆ',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        การ Join Domain คือการนำคอมพิวเตอร์เข้าสู่ระบบเครือข่ายส่วนกลางขององค์กร
        เมื่อ Join Domain แล้ว สามารถล็อกอินด้วย Account องค์กร เข้าถึงไฟล์ Server
        ใช้งานเครื่องพิมพ์ส่วนกลาง และระบบต่างๆ ได้โดยอัตโนมัติ
      </p>

      <!-- แผนภาพ Network -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:14px">โครงสร้างเครือข่ายองค์กร</div>
      <div style="background:var(--clr-bg);border-radius:14px;padding:24px;margin-bottom:24px;text-align:center">
        <div style="display:inline-flex;flex-direction:column;align-items:center;gap:0">
          <!-- Domain Controller -->
          <div style="background:linear-gradient(135deg,#1e40af,#3b82f6);color:white;border-radius:12px;padding:12px 24px;font-size:.85rem;font-weight:600;box-shadow:0 4px 12px rgba(59,130,246,.3)">
            🖥️ Domain Controller<br><span style="font-size:.72rem;opacity:.8;font-weight:400">domain.example.go.th</span>
          </div>
          <!-- เส้น -->
          <div style="width:2px;height:20px;background:#94a3b8"></div>
          <!-- Switch -->
          <div style="background:#475569;color:white;border-radius:8px;padding:8px 20px;font-size:.8rem">⚡ Network Switch</div>
          <div style="display:flex;gap:40px;align-items:flex-start;margin-top:0">
            <div style="display:flex;flex-direction:column;align-items:center;gap:0">
              <div style="width:2px;height:16px;background:#94a3b8"></div>
              <div style="background:white;border:2px solid #22c55e;border-radius:8px;padding:8px 14px;font-size:.75rem;color:#166534;font-weight:600;text-align:center">💻 PC-001<br><span style="font-weight:400;color:#94a3b8">Joined ✔</span></div>
            </div>
            <div style="display:flex;flex-direction:column;align-items:center;gap:0">
              <div style="width:2px;height:16px;background:#94a3b8"></div>
              <div style="background:white;border:2px dashed #f59e0b;border-radius:8px;padding:8px 14px;font-size:.75rem;color:#92400e;font-weight:600;text-align:center">💻 PC-002<br><span style="font-weight:400;color:#94a3b8">รอ Join</span></div>
            </div>
            <div style="display:flex;flex-direction:column;align-items:center;gap:0">
              <div style="width:2px;height:16px;background:#94a3b8"></div>
              <div style="background:white;border:2px solid #22c55e;border-radius:8px;padding:8px 14px;font-size:.75rem;color:#166534;font-weight:600;text-align:center">💻 PC-003<br><span style="font-weight:400;color:#94a3b8">Joined ✔</span></div>
            </div>
          </div>
        </div>
      </div>

      <!-- ข้อมูลที่ต้องเตรียม -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:10px">ข้อมูลที่ต้องเตรียมก่อนมาติดต่อ</div>
      <table style="width:100%;border-collapse:collapse;font-size:.88rem;margin-bottom:20px">
        <tbody>
          <tr>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);background:var(--clr-primary-pale);font-weight:600;width:40%">หมายเลขครุภัณฑ์คอมพิวเตอร์</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">ดูได้จากสติ๊กเกอร์ที่ตัวเครื่อง</td>
          </tr>
          <tr>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);background:var(--clr-primary-pale);font-weight:600">ชื่อผู้ใช้งานหลัก</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">บุคลากรที่จะล็อกอินเครื่องนี้เป็นหลัก</td>
          </tr>
          <tr>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);background:var(--clr-primary-pale);font-weight:600">ห้อง / ชั้น / อาคาร</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">สำหรับบันทึกทะเบียนเครื่อง</td>
          </tr>
          <tr>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);background:var(--clr-primary-pale);font-weight:600">ระบบปฏิบัติการ</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">Windows 10 / Windows 11</td>
          </tr>
        </tbody>
      </table>

      <div style="background:#fefce8;border:1px solid #fde68a;border-radius:12px;padding:14px 18px;font-size:.88rem;color:#713f12;line-height:1.7">
        ⚠️ <strong>หมายเหตุ:</strong> นำคอมพิวเตอร์มาที่กองบริหารสารสนเทศด้วยตนเอง เจ้าหน้าที่จะดำเนินการ Join Domain และทดสอบล็อกอินให้ในขั้นตอนเดียว ใช้เวลาประมาณ 30–60 นาที
      </div>
    ',
  ],

  [
    'cat'   => 'access',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
    'title' => 'ขอสิทธิ์เข้า Computer',
    'desc'  => 'ขอสิทธิ์ใช้งานคอมพิวเตอร์เครื่องใดเครื่องหนึ่งหรือระบบเฉพาะทาง',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        คอมพิวเตอร์ขององค์กรแต่ละเครื่องมีการกำหนดสิทธิ์ผู้ใช้งาน
        หากต้องการเข้าใช้เครื่องที่ไม่ใช่เครื่องประจำ เช่น เครื่องในห้องประชุม
        หรือเครื่องในหน่วยงานอื่น จำเป็นต้องยื่นคำร้องขอสิทธิ์ก่อนทุกครั้ง
      </p>

      <!-- ประเภทสิทธิ์ -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">ประเภทสิทธิ์การเข้าถึง</div>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:24px">
        <div style="background:var(--clr-bg);border-radius:12px;padding:16px;border:1px solid var(--clr-border)">
          <div style="font-size:1.3rem;margin-bottom:8px">👤</div>
          <div style="font-weight:600;font-size:.9rem;color:var(--clr-text);margin-bottom:4px">Standard User</div>
          <div style="font-size:.8rem;color:var(--clr-text-muted);line-height:1.6">ใช้งานโปรแกรมทั่วไป ไม่สามารถติดตั้งซอฟต์แวร์เองได้</div>
        </div>
        <div style="background:var(--clr-bg);border-radius:12px;padding:16px;border:1px solid var(--clr-border)">
          <div style="font-size:1.3rem;margin-bottom:8px">🛡️</div>
          <div style="font-weight:600;font-size:.9rem;color:var(--clr-text);margin-bottom:4px">Power User</div>
          <div style="font-size:.8rem;color:var(--clr-text-muted);line-height:1.6">ติดตั้งโปรแกรมบางรายการได้ ต้องได้รับอนุมัติพิเศษ</div>
        </div>
        <div style="background:var(--clr-bg);border-radius:12px;padding:16px;border:1px solid var(--clr-border)">
          <div style="font-size:1.3rem;margin-bottom:8px">📊</div>
          <div style="font-weight:600;font-size:.9rem;color:var(--clr-text);margin-bottom:4px">เข้าถึงข้อมูลเฉพาะทาง</div>
          <div style="font-size:.8rem;color:var(--clr-text-muted);line-height:1.6">สำหรับงานที่ต้องเข้าถึงฐานข้อมูลหรือระบบเฉพาะ</div>
        </div>
        <div style="background:var(--clr-bg);border-radius:12px;padding:16px;border:1px solid var(--clr-border)">
          <div style="font-size:1.3rem;margin-bottom:8px">🖨️</div>
          <div style="font-weight:600;font-size:.9rem;color:var(--clr-text);margin-bottom:4px">เครื่องพิมพ์/สแกนเนอร์</div>
          <div style="font-size:.8rem;color:var(--clr-text-muted);line-height:1.6">เพิ่มสิทธิ์ใช้อุปกรณ์ต่อพ่วงในเครือข่าย</div>
        </div>
      </div>

      <div style="background:#fdf4ff;border:1px solid #e9d5ff;border-radius:12px;padding:14px 18px;font-size:.88rem;color:#581c87;line-height:1.7">
        🔐 สิทธิ์ทั้งหมดต้องได้รับการอนุมัติจาก<strong>ผู้บังคับบัญชาระดับหัวหน้าฝ่าย</strong>ขึ้นไป และจะถูกยกเลิกอัตโนมัติเมื่อสิ้นสุดโครงการหรือหมดสัญญาจ้าง
      </div>
    ',
  ],

  [
    'cat'   => 'email',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>',
    'title' => 'ขอเปลี่ยน Email',
    'desc'  => 'ขอแก้ไขที่อยู่อีเมลองค์กร เช่น เปลี่ยนชื่อหรือย้ายไปโดเมนใหม่',
    'extra_html' => '
      <!-- ตัวอย่าง Email เดิม → ใหม่ -->
      <div style="display:flex;align-items:center;gap:12px;margin-bottom:24px;flex-wrap:wrap">
        <div style="flex:1;min-width:140px;background:#fee2e2;border:1px solid #fca5a5;border-radius:10px;padding:12px 16px;text-align:center">
          <div style="font-size:.72rem;color:#991b1b;font-weight:600;margin-bottom:4px">EMAIL เดิม</div>
          <div style="font-size:.88rem;font-family:monospace;color:#7f1d1d;word-break:break-all">somchai.j@old-domain.go.th</div>
        </div>
        <div style="font-size:1.5rem;flex-shrink:0;color:var(--clr-text-muted)">→</div>
        <div style="flex:1;min-width:140px;background:#dcfce7;border:1px solid #86efac;border-radius:10px;padding:12px 16px;text-align:center">
          <div style="font-size:.72rem;color:#166534;font-weight:600;margin-bottom:4px">EMAIL ใหม่</div>
          <div style="font-size:.88rem;font-family:monospace;color:#14532d;word-break:break-all">somchai.j@example.go.th</div>
        </div>
      </div>

      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        การเปลี่ยน Email องค์กรอาจเกิดขึ้นจากหลายสาเหตุ เช่น การเปลี่ยนชื่อจริง
        การโยกย้ายหน่วยงาน หรือการเปลี่ยนโดเมนขององค์กร
        กระบวนการนี้ใช้เวลา <strong>1–2 วันทำการ</strong> และ Email เดิมจะยังคงรับจดหมายได้อีก <strong>30 วัน</strong>
        เพื่อให้มีเวลาแจ้งผู้ติดต่อ
      </p>

      <!-- ผลกระทบที่ต้องทราบ -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:10px">สิ่งที่ได้รับผลกระทบและต้องอัปเดต</div>
      <table style="width:100%;border-collapse:collapse;font-size:.88rem;margin-bottom:20px">
        <thead>
          <tr style="background:var(--clr-primary-pale)">
            <th style="padding:10px 14px;text-align:left;border:1px solid var(--clr-border)">ระบบ</th>
            <th style="padding:10px 14px;text-align:center;border:1px solid var(--clr-border)">อัปเดตอัตโนมัติ</th>
            <th style="padding:10px 14px;text-align:left;border:1px solid var(--clr-border)">หมายเหตุ</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">Microsoft 365 / Outlook</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center;color:#22c55e;font-weight:700">✔</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">IT ดำเนินการให้</td>
          </tr>
          <tr style="background:var(--clr-bg)">
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">ระบบสารบรรณ</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center;color:#22c55e;font-weight:700">✔</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">IT ดำเนินการให้</td>
          </tr>
          <tr>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">ระบบภายนอกอื่นๆ</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center;color:#ef4444;font-weight:700">✘</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">ต้องแจ้งด้วยตนเอง</td>
          </tr>
          <tr style="background:var(--clr-bg)">
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">บัตรนามบัตร / ลายเซ็น</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center;color:#ef4444;font-weight:700">✘</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">ต้องแก้ไขเอง</td>
          </tr>
        </tbody>
      </table>
    ',
  ],

  [
    'cat'   => 'internet',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.55a11 11 0 0 1 14.08 0"/><path d="M1.42 9a16 16 0 0 1 21.16 0"/><path d="M8.53 16.11a6 6 0 0 1 6.95 0"/><circle cx="12" cy="20" r="1" fill="currentColor"/></svg>',
    'title' => 'ขอเพิ่มปริมาณอินเทอร์เน็ต',
    'desc'  => 'ขอเพิ่ม Bandwidth หรือโควต้าการใช้งานอินเทอร์เน็ตสำหรับงานที่ต้องการ',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        บุคลากรแต่ละคนได้รับ Bandwidth พื้นฐาน <strong>10 Mbps</strong> สำหรับการทำงานทั่วไป
        หากงานต้องการการส่งไฟล์ขนาดใหญ่ ประชุมออนไลน์คุณภาพสูง หรือเข้าถึง Cloud Service
        สามารถขอเพิ่มได้สูงสุด <strong>50 Mbps</strong> โดยต้องได้รับอนุมัติจากหัวหน้าแผนก
      </p>

      <!-- กราฟแสดง Bandwidth -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">การจัดสรร Bandwidth ตามประเภทงาน</div>
      <div style="background:var(--clr-bg);border-radius:12px;padding:20px;margin-bottom:24px;display:flex;flex-direction:column;gap:12px">
        <div>
          <div style="display:flex;justify-content:space-between;font-size:.82rem;margin-bottom:5px">
            <span style="color:var(--clr-text)">📧 อีเมลและเอกสาร</span>
            <span style="font-weight:600;color:var(--clr-primary)">5 Mbps</span>
          </div>
          <div style="background:#e2e8f0;border-radius:20px;height:12px;overflow:hidden">
            <div style="background:var(--clr-primary);width:10%;height:100%;border-radius:20px"></div>
          </div>
        </div>
        <div>
          <div style="display:flex;justify-content:space-between;font-size:.82rem;margin-bottom:5px">
            <span style="color:var(--clr-text)">💬 Microsoft Teams / ประชุมออนไลน์</span>
            <span style="font-weight:600;color:#0891b2">10 Mbps</span>
          </div>
          <div style="background:#e2e8f0;border-radius:20px;height:12px;overflow:hidden">
            <div style="background:#0891b2;width:20%;height:100%;border-radius:20px"></div>
          </div>
        </div>
        <div>
          <div style="display:flex;justify-content:space-between;font-size:.82rem;margin-bottom:5px">
            <span style="color:var(--clr-text)">☁️ อัปโหลด/ดาวน์โหลด Cloud</span>
            <span style="font-weight:600;color:#7c3aed">25 Mbps</span>
          </div>
          <div style="background:#e2e8f0;border-radius:20px;height:12px;overflow:hidden">
            <div style="background:#7c3aed;width:50%;height:100%;border-radius:20px"></div>
          </div>
        </div>
        <div>
          <div style="display:flex;justify-content:space-between;font-size:.82rem;margin-bottom:5px">
            <span style="color:var(--clr-text)">🎥 สตรีมมิ่ง / ถ่ายทอดสดงานองค์กร</span>
            <span style="font-weight:600;color:#dc2626">50 Mbps</span>
          </div>
          <div style="background:#e2e8f0;border-radius:20px;height:12px;overflow:hidden">
            <div style="background:#dc2626;width:100%;height:100%;border-radius:20px"></div>
          </div>
        </div>
      </div>

      <!-- ตารางแพ็คเกจ -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:10px">แพ็คเกจที่ขอได้</div>
      <table style="width:100%;border-collapse:collapse;font-size:.88rem">
        <thead>
          <tr style="background:var(--clr-primary-pale)">
            <th style="padding:10px 14px;text-align:left;border:1px solid var(--clr-border)">แพ็คเกจ</th>
            <th style="padding:10px 14px;text-align:center;border:1px solid var(--clr-border)">Bandwidth</th>
            <th style="padding:10px 14px;text-align:left;border:1px solid var(--clr-border)">เหมาะสำหรับ</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">พื้นฐาน (ค่าเริ่มต้น)</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center;font-weight:700">10 Mbps</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">งานเอกสาร อีเมล เว็บทั่วไป</td>
          </tr>
          <tr style="background:var(--clr-bg)">
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">กลาง</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center;font-weight:700">25 Mbps</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">Teams, OneDrive, ประชุมออนไลน์</td>
          </tr>
          <tr>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">สูงสุด</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border);text-align:center;font-weight:700">50 Mbps</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">ถ่ายทอดสด ส่งไฟล์ขนาดใหญ่</td>
          </tr>
        </tbody>
      </table>
    ',
  ],
];

$display_services = $cat ? array_filter($all_services, fn($s) => $s['cat'] === $cat) : $all_services;
$display_services = array_values($display_services);

require_once '../includes/header.php';
?>

<?php
$panel_title   = 'บริการยูสเซอร์สำหรับบุคลากร';
$panel_cat     = $cat;
$panel_base    = 'services.php';
$panel_menu    = $categories;
$panel_items   = $all_services;
$panel_contact = true;
?>

<main class="layout__main">
  <nav class="breadcrumb" aria-label="breadcrumb">
    <a href="../index.php">หน้าหลัก</a>
    <span class="breadcrumb__sep">›</span>
    <span><?= $cat && isset($categories[$cat]) ? htmlspecialchars($categories[$cat]['label']) : 'บริการ IT' ?></span>
  </nav>

  <?php require_once '../includes/single-panel.php'; ?>
</main>

<?php require_once '../includes/footer.php'; ?>