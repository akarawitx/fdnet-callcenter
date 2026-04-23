<?php
// pages/manual.php — User Manuals & Training Docs
require_once '../includes/config.php';
$page_title = 'คู่มือสอนใช้งาน';
$cat = $_GET['cat'] ?? '';

$sections = [
  'itManual'       => ['label' => 'คู่มือการใช้งานระบบสารสนเทศ'],
  'specialManual'  => ['label' => 'คู่มือการใช้งานระบบเฉพาะทาง'],
  'trainingManual' => ['label' => 'คู่มือการอบรม & พัฒนา'],
];

$manual_items = [
  [
    'cat'   => 'itManual',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>',
    'title' => 'คู่มือการใช้งานระบบสารสนเทศ',
    'desc'  => 'เอกสารแนะนำการใช้งานโปรแกรมและระบบสารสนเทศพื้นฐานขององค์กร เช่น Microsoft 365, Email, OneDrive',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        คู่มือชุดนี้ครอบคลุมการใช้งานระบบสารสนเทศหลักที่บุคลากรทุกคนจำเป็นต้องรู้
        เหมาะสำหรับ<strong>บุคลากรใหม่</strong>ที่เพิ่งเข้าปฏิบัติงาน
        รวมถึงผู้ที่ต้องการทบทวนการใช้งานฟีเจอร์ต่างๆ อย่างละเอียด
      </p>

      <!-- หมวดคู่มือ -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:14px">คู่มือที่มีให้ดาวน์โหลด</div>
      <div style="display:flex;flex-direction:column;gap:10px;margin-bottom:28px">

        <div style="display:flex;align-items:center;gap:14px;background:var(--clr-bg);border:1px solid var(--clr-border);border-radius:12px;padding:14px 18px">
          <div style="width:44px;height:44px;background:#e0f2fe;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.4rem">📧</div>
          <div style="flex:1">
            <div style="font-weight:600;font-size:.9rem;color:var(--clr-text);margin-bottom:2px">คู่มือการใช้งาน Microsoft Outlook</div>
            <div style="font-size:.8rem;color:var(--clr-text-muted)">การรับ-ส่งอีเมล ตั้งค่าลายเซ็น จัดการปฏิทิน และการประชุมออนไลน์</div>
          </div>
          <div style="display:flex;align-items:center;gap:8px;flex-shrink:0">
            <span style="font-size:.72rem;color:var(--clr-text-muted);background:#f1f5f9;padding:3px 8px;border-radius:4px">PDF · 2.4 MB</span>
            <a href="#" style="background:var(--clr-primary);color:white;padding:6px 14px;border-radius:8px;font-size:.8rem;font-weight:600;text-decoration:none;white-space:nowrap">ดาวน์โหลด</a>
          </div>
        </div>

        <div style="display:flex;align-items:center;gap:14px;background:var(--clr-bg);border:1px solid var(--clr-border);border-radius:12px;padding:14px 18px">
          <div style="width:44px;height:44px;background:#e0fdf4;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.4rem">☁️</div>
          <div style="flex:1">
            <div style="font-weight:600;font-size:.9rem;color:var(--clr-text);margin-bottom:2px">คู่มือการใช้งาน OneDrive & SharePoint</div>
            <div style="font-size:.8rem;color:var(--clr-text-muted)">การบันทึกและแชร์ไฟล์บน Cloud รวมถึงการทำงานร่วมกันแบบ Real-time</div>
          </div>
          <div style="display:flex;align-items:center;gap:8px;flex-shrink:0">
            <span style="font-size:.72rem;color:var(--clr-text-muted);background:#f1f5f9;padding:3px 8px;border-radius:4px">PDF · 3.1 MB</span>
            <a href="#" style="background:var(--clr-primary);color:white;padding:6px 14px;border-radius:8px;font-size:.8rem;font-weight:600;text-decoration:none;white-space:nowrap">ดาวน์โหลด</a>
          </div>
        </div>

        <div style="display:flex;align-items:center;gap:14px;background:var(--clr-bg);border:1px solid var(--clr-border);border-radius:12px;padding:14px 18px">
          <div style="width:44px;height:44px;background:#fef9c3;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.4rem">💬</div>
          <div style="flex:1">
            <div style="font-weight:600;font-size:.9rem;color:var(--clr-text);margin-bottom:2px">คู่มือการใช้งาน Microsoft Teams</div>
            <div style="font-size:.8rem;color:var(--clr-text-muted)">การประชุมออนไลน์ แชทกลุ่ม แชร์หน้าจอ และการใช้งาน Channel</div>
          </div>
          <div style="display:flex;align-items:center;gap:8px;flex-shrink:0">
            <span style="font-size:.72rem;color:var(--clr-text-muted);background:#f1f5f9;padding:3px 8px;border-radius:4px">PDF · 1.8 MB</span>
            <a href="#" style="background:var(--clr-primary);color:white;padding:6px 14px;border-radius:8px;font-size:.8rem;font-weight:600;text-decoration:none;white-space:nowrap">ดาวน์โหลด</a>
          </div>
        </div>

        <div style="display:flex;align-items:center;gap:14px;background:var(--clr-bg);border:1px solid var(--clr-border);border-radius:12px;padding:14px 18px">
          <div style="width:44px;height:44px;background:#fce7f3;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.4rem">🖨️</div>
          <div style="flex:1">
            <div style="font-weight:600;font-size:.9rem;color:var(--clr-text);margin-bottom:2px">คู่มือการใช้งานเครื่องพิมพ์และสแกนเนอร์</div>
            <div style="font-size:.8rem;color:var(--clr-text-muted)">การเชื่อมต่อเครื่องพิมพ์เครือข่าย การพิมพ์สองหน้า และการสแกนส่ง Email</div>
          </div>
          <div style="display:flex;align-items:center;gap:8px;flex-shrink:0">
            <span style="font-size:.72rem;color:var(--clr-text-muted);background:#f1f5f9;padding:3px 8px;border-radius:4px">PDF · 1.2 MB</span>
            <a href="#" style="background:var(--clr-primary);color:white;padding:6px 14px;border-radius:8px;font-size:.8rem;font-weight:600;text-decoration:none;white-space:nowrap">ดาวน์โหลด</a>
          </div>
        </div>

        <div style="display:flex;align-items:center;gap:14px;background:var(--clr-bg);border:1px solid var(--clr-border);border-radius:12px;padding:14px 18px">
          <div style="width:44px;height:44px;background:#ede9fe;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.4rem">🔐</div>
          <div style="flex:1">
            <div style="font-weight:600;font-size:.9rem;color:var(--clr-text);margin-bottom:2px">คู่มือการตั้งค่าความปลอดภัยบัญชี (MFA / 2FA)</div>
            <div style="font-size:.8rem;color:var(--clr-text-muted)">การเปิดใช้งาน Multi-Factor Authentication บน Microsoft 365 และระบบอื่นๆ</div>
          </div>
          <div style="display:flex;align-items:center;gap:8px;flex-shrink:0">
            <span style="font-size:.72rem;color:var(--clr-text-muted);background:#f1f5f9;padding:3px 8px;border-radius:4px">PDF · 0.9 MB</span>
            <a href="#" style="background:var(--clr-primary);color:white;padding:6px 14px;border-radius:8px;font-size:.8rem;font-weight:600;text-decoration:none;white-space:nowrap">ดาวน์โหลด</a>
          </div>
        </div>

      </div>

      <!-- หมายเหตุ -->
      <div style="background:#f0fdf4;border:1px solid #bbf7d0;border-radius:12px;padding:14px 18px;font-size:.88rem;color:#166534;line-height:1.7">
        📥 คู่มือทั้งหมดอัปเดตล่าสุด <strong>มกราคม 2568</strong> หากพบข้อมูลไม่ตรงกับระบบที่ใช้งานจริง กรุณาแจ้ง <a href="mailto:ict@watphrathammakaya.ac.th" style="color:#166534;font-weight:600">ict@watphrathammakaya.ac.th</a>
      </div>
    ',
  ],

  [
    'cat'   => 'specialManual',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>',
    'title' => 'คู่มือการใช้งานระบบเฉพาะทาง',
    'desc'  => 'คู่มือสำหรับระบบที่ใช้งานภายในองค์กรโดยเฉพาะ เช่น ระบบบริหารบุคคล ระบบสารบรรณ และระบบทะเบียน',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        ระบบเฉพาะทางเหล่านี้พัฒนาหรือปรับแต่งมาเพื่อการใช้งานภายในองค์กรโดยเฉพาะ
        คู่มือแต่ละชุดจะระบุ<strong>กลุ่มผู้ใช้งานเป้าหมาย</strong>และสิทธิ์ที่จำเป็น
        ก่อนดาวน์โหลดกรุณาตรวจสอบว่าท่านมีสิทธิ์เข้าถึงระบบนั้นๆ แล้ว
      </p>

      <!-- ตารางระบบเฉพาะทาง -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">รายการระบบเฉพาะทาง</div>
      <table style="width:100%;border-collapse:collapse;font-size:.88rem;margin-bottom:24px">
        <thead>
          <tr style="background:var(--clr-primary-pale)">
            <th style="padding:10px 14px;text-align:left;border:1px solid var(--clr-border);color:var(--clr-primary-dark)">ระบบ</th>
            <th style="padding:10px 14px;text-align:left;border:1px solid var(--clr-border);color:var(--clr-primary-dark)">ผู้ใช้งาน</th>
            <th style="padding:10px 14px;text-align:center;border:1px solid var(--clr-border);color:var(--clr-primary-dark)">คู่มือ</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="padding:11px 14px;border:1px solid var(--clr-border)">
              <div style="display:flex;align-items:center;gap:8px">
                <span style="font-size:1.1rem">👥</span>
                <div>
                  <div style="font-weight:600">ระบบบริหารบุคคล (HR System)</div>
                  <div style="font-size:.78rem;color:var(--clr-text-muted)">ข้อมูลบุคลากร การลา เงินเดือน</div>
                </div>
              </div>
            </td>
            <td style="padding:11px 14px;border:1px solid var(--clr-border)"><span style="background:#dbeafe;color:#1e40af;font-size:.75rem;padding:2px 8px;border-radius:20px;font-weight:600">ฝ่ายบุคคล</span></td>
            <td style="padding:11px 14px;border:1px solid var(--clr-border);text-align:center"><a href="#" style="background:var(--clr-primary);color:white;padding:5px 12px;border-radius:7px;font-size:.78rem;font-weight:600;text-decoration:none">PDF</a></td>
          </tr>
          <tr style="background:var(--clr-bg)">
            <td style="padding:11px 14px;border:1px solid var(--clr-border)">
              <div style="display:flex;align-items:center;gap:8px">
                <span style="font-size:1.1rem">📜</span>
                <div>
                  <div style="font-weight:600">ระบบรับ-ส่งหนังสือ (Saraban)</div>
                  <div style="font-size:.78rem;color:var(--clr-text-muted)">หนังสือเวียน คำสั่ง บันทึกข้อความ</div>
                </div>
              </div>
            </td>
            <td style="padding:11px 14px;border:1px solid var(--clr-border)"><span style="background:#dcfce7;color:#166534;font-size:.75rem;padding:2px 8px;border-radius:20px;font-weight:600">บุคลากรทุกคน</span></td>
            <td style="padding:11px 14px;border:1px solid var(--clr-border);text-align:center"><a href="#" style="background:var(--clr-primary);color:white;padding:5px 12px;border-radius:7px;font-size:.78rem;font-weight:600;text-decoration:none">PDF</a></td>
          </tr>
          <tr>
            <td style="padding:11px 14px;border:1px solid var(--clr-border)">
              <div style="display:flex;align-items:center;gap:8px">
                <span style="font-size:1.1rem">📋</span>
                <div>
                  <div style="font-weight:600">ระบบทะเบียนพระ</div>
                  <div style="font-size:.78rem;color:var(--clr-text-muted)">บันทึกข้อมูล ประวัติ และสถานะพระภิกษุสามเณร</div>
                </div>
              </div>
            </td>
            <td style="padding:11px 14px;border:1px solid var(--clr-border)"><span style="background:#fef9c3;color:#713f12;font-size:.75rem;padding:2px 8px;border-radius:20px;font-weight:600">ฝ่ายทะเบียน</span></td>
            <td style="padding:11px 14px;border:1px solid var(--clr-border);text-align:center"><a href="#" style="background:var(--clr-primary);color:white;padding:5px 12px;border-radius:7px;font-size:.78rem;font-weight:600;text-decoration:none">PDF</a></td>
          </tr>
          <tr style="background:var(--clr-bg)">
            <td style="padding:11px 14px;border:1px solid var(--clr-border)">
              <div style="display:flex;align-items:center;gap:8px">
                <span style="font-size:1.1rem">💰</span>
                <div>
                  <div style="font-weight:600">ระบบบัญชีกรรม</div>
                  <div style="font-size:.78rem;color:var(--clr-text-muted)">บันทึกรายรับ-รายจ่าย รายงานการเงิน</div>
                </div>
              </div>
            </td>
            <td style="padding:11px 14px;border:1px solid var(--clr-border)"><span style="background:#fce7f3;color:#9d174d;font-size:.75rem;padding:2px 8px;border-radius:20px;font-weight:600">ฝ่ายบัญชี</span></td>
            <td style="padding:11px 14px;border:1px solid var(--clr-border);text-align:center"><a href="#" style="background:var(--clr-primary);color:white;padding:5px 12px;border-radius:7px;font-size:.78rem;font-weight:600;text-decoration:none">PDF</a></td>
          </tr>
          <tr>
            <td style="padding:11px 14px;border:1px solid var(--clr-border)">
              <div style="display:flex;align-items:center;gap:8px">
                <span style="font-size:1.1rem">📡</span>
                <div>
                  <div style="font-weight:600">ระบบ GBN / ถ่ายทอดสด</div>
                  <div style="font-size:.78rem;color:var(--clr-text-muted)">การใช้งานกล่องสัญญาณและระบบ Streaming</div>
                </div>
              </div>
            </td>
            <td style="padding:11px 14px;border:1px solid var(--clr-border)"><span style="background:#ede9fe;color:#4c1d95;font-size:.75rem;padding:2px 8px;border-radius:20px;font-weight:600">ฝ่ายสื่อ</span></td>
            <td style="padding:11px 14px;border:1px solid var(--clr-border);text-align:center"><a href="#" style="background:var(--clr-primary);color:white;padding:5px 12px;border-radius:7px;font-size:.78rem;font-weight:600;text-decoration:none">PDF</a></td>
          </tr>
        </tbody>
      </table>

      <div style="background:#fefce8;border:1px solid #fde68a;border-radius:12px;padding:14px 18px;font-size:.88rem;color:#713f12;line-height:1.7">
        🔒 คู่มือระบบเฉพาะทางบางรายการมีข้อมูลสำคัญ กรุณาใช้บน<strong>เครื่องขององค์กรเท่านั้น</strong>
        และห้ามเผยแพร่ออกสู่ภายนอก
      </div>
    ',
  ],

  [
    'cat'   => 'trainingManual',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>',
    'title' => 'คู่มือการอบรม & พัฒนา',
    'desc'  => 'เอกสารประกอบการอบรมหลักสูตรต่างๆ ที่จัดโดยกองบริหารสารสนเทศ พร้อมสไลด์และแบบทดสอบ',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        กองบริหารสารสนเทศจัดอบรมหลักสูตรด้านสารสนเทศให้บุคลากรสม่ำเสมอ
        เอกสารชุดนี้รวบรวม<strong>สไลด์บรรยาย แบบฝึกหัด และแบบทดสอบ</strong>
        จากทุกหลักสูตรเพื่อให้บุคลากรสามารถทบทวนได้ตลอดเวลา
      </p>

      <!-- หลักสูตรที่เปิดอบรม -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:14px">หลักสูตรที่เปิดให้ดาวน์โหลดเอกสาร</div>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:28px">

        <div style="background:var(--clr-bg);border:1px solid var(--clr-border);border-radius:14px;padding:16px;display:flex;flex-direction:column;gap:10px">
          <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:8px">
            <div style="display:flex;align-items:center;gap:8px">
              <div style="width:38px;height:38px;background:#dbeafe;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:1.2rem;flex-shrink:0">🛡️</div>
              <div style="font-weight:600;font-size:.88rem;color:var(--clr-text);line-height:1.4">ความปลอดภัยทางไซเบอร์สำหรับบุคลากร</div>
            </div>
          </div>
          <div style="font-size:.78rem;color:var(--clr-text-muted);line-height:1.5">Phishing, Ransomware, นโยบาย IT และแนวปฏิบัติที่ถูกต้อง</div>
          <div style="display:flex;align-items:center;gap:6px;font-size:.75rem;color:var(--clr-text-muted)">
            <span>📅 ปรับปรุง: ม.ค. 2568</span>
            <span>·</span>
            <span>🕐 3 ชั่วโมง</span>
          </div>
          <div style="display:flex;gap:6px;flex-wrap:wrap">
            <a href="#" style="background:var(--clr-primary);color:white;padding:5px 12px;border-radius:7px;font-size:.78rem;font-weight:600;text-decoration:none">📄 สไลด์</a>
            <a href="#" style="background:#f1f5f9;color:var(--clr-text);padding:5px 12px;border-radius:7px;font-size:.78rem;font-weight:600;text-decoration:none;border:1px solid var(--clr-border)">📝 แบบทดสอบ</a>
          </div>
        </div>

        <div style="background:var(--clr-bg);border:1px solid var(--clr-border);border-radius:14px;padding:16px;display:flex;flex-direction:column;gap:10px">
          <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:8px">
            <div style="display:flex;align-items:center;gap:8px">
              <div style="width:38px;height:38px;background:#dcfce7;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:1.2rem;flex-shrink:0">📊</div>
              <div style="font-weight:600;font-size:.88rem;color:var(--clr-text);line-height:1.4">Microsoft 365 สำหรับการทำงาน</div>
            </div>
          </div>
          <div style="font-size:.78rem;color:var(--clr-text-muted);line-height:1.5">Word, Excel, PowerPoint, Teams, Outlook และ OneDrive อย่างมืออาชีพ</div>
          <div style="display:flex;align-items:center;gap:6px;font-size:.75rem;color:var(--clr-text-muted)">
            <span>📅 ปรับปรุง: ธ.ค. 2567</span>
            <span>·</span>
            <span>🕐 6 ชั่วโมง</span>
          </div>
          <div style="display:flex;gap:6px;flex-wrap:wrap">
            <a href="#" style="background:var(--clr-primary);color:white;padding:5px 12px;border-radius:7px;font-size:.78rem;font-weight:600;text-decoration:none">📄 สไลด์</a>
            <a href="#" style="background:#f1f5f9;color:var(--clr-text);padding:5px 12px;border-radius:7px;font-size:.78rem;font-weight:600;text-decoration:none;border:1px solid var(--clr-border)">📝 แบบทดสอบ</a>
          </div>
        </div>

        <div style="background:var(--clr-bg);border:1px solid var(--clr-border);border-radius:14px;padding:16px;display:flex;flex-direction:column;gap:10px">
          <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:8px">
            <div style="display:flex;align-items:center;gap:8px">
              <div style="width:38px;height:38px;background:#fce7f3;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:1.2rem;flex-shrink:0">📡</div>
              <div style="font-weight:600;font-size:.88rem;color:var(--clr-text);line-height:1.4">การใช้งาน VPN และระบบ Remote Access</div>
            </div>
          </div>
          <div style="font-size:.78rem;color:var(--clr-text-muted);line-height:1.5">ติดตั้ง VPN, เชื่อมต่อจากภายนอก, แก้ปัญหาเบื้องต้น</div>
          <div style="display:flex;align-items:center;gap:6px;font-size:.75rem;color:var(--clr-text-muted)">
            <span>📅 ปรับปรุง: พ.ย. 2567</span>
            <span>·</span>
            <span>🕐 2 ชั่วโมง</span>
          </div>
          <div style="display:flex;gap:6px;flex-wrap:wrap">
            <a href="#" style="background:var(--clr-primary);color:white;padding:5px 12px;border-radius:7px;font-size:.78rem;font-weight:600;text-decoration:none">📄 สไลด์</a>
            <a href="#" style="background:#f1f5f9;color:var(--clr-text);padding:5px 12px;border-radius:7px;font-size:.78rem;font-weight:600;text-decoration:none;border:1px solid var(--clr-border)">📝 แบบทดสอบ</a>
          </div>
        </div>

        <div style="background:var(--clr-bg);border:1px solid var(--clr-border);border-radius:14px;padding:16px;display:flex;flex-direction:column;gap:10px">
          <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:8px">
            <div style="display:flex;align-items:center;gap:8px">
              <div style="width:38px;height:38px;background:#fef9c3;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:1.2rem;flex-shrink:0">🖥️</div>
              <div style="font-weight:600;font-size:.88rem;color:var(--clr-text);line-height:1.4">การดูแลรักษาคอมพิวเตอร์เบื้องต้น</div>
            </div>
          </div>
          <div style="font-size:.78rem;color:var(--clr-text-muted);line-height:1.5">การบำรุงรักษา การสำรองข้อมูล และการแก้ปัญหาเบื้องต้น</div>
          <div style="display:flex;align-items:center;gap:6px;font-size:.75rem;color:var(--clr-text-muted)">
            <span>📅 ปรับปรุง: ต.ค. 2567</span>
            <span>·</span>
            <span>🕐 2 ชั่วโมง</span>
          </div>
          <div style="display:flex;gap:6px;flex-wrap:wrap">
            <a href="#" style="background:var(--clr-primary);color:white;padding:5px 12px;border-radius:7px;font-size:.78rem;font-weight:600;text-decoration:none">📄 สไลด์</a>
            <a href="#" style="background:#f1f5f9;color:var(--clr-text);padding:5px 12px;border-radius:7px;font-size:.78rem;font-weight:600;text-decoration:none;border:1px solid var(--clr-border)">📝 แบบทดสอบ</a>
          </div>
        </div>

      </div>

      <!-- ปฏิทินอบรม -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">ตารางอบรมที่กำลังจะมาถึง</div>
      <div style="background:var(--clr-bg);border-radius:12px;overflow:hidden;border:1px solid var(--clr-border);margin-bottom:20px">
        <div style="display:flex;align-items:center;gap:14px;padding:13px 18px;border-bottom:1px solid var(--clr-border)">
          <div style="width:48px;height:48px;background:var(--clr-primary);color:white;border-radius:10px;display:flex;flex-direction:column;align-items:center;justify-content:center;flex-shrink:0">
            <div style="font-size:.65rem;font-weight:600;opacity:.8">พ.ค.</div>
            <div style="font-size:1.1rem;font-weight:700;line-height:1">14</div>
          </div>
          <div style="flex:1">
            <div style="font-weight:600;font-size:.88rem;color:var(--clr-text)">ความปลอดภัยทางไซเบอร์สำหรับบุคลากร (รอบ 1)</div>
            <div style="font-size:.78rem;color:var(--clr-text-muted)">09:00–12:00 · ห้องอบรม อาคารสำนักงาน ชั้น 3 · รับ 30 ท่าน</div>
          </div>
          <a href="#" style="background:var(--clr-primary);color:white;padding:6px 14px;border-radius:8px;font-size:.8rem;font-weight:600;text-decoration:none;flex-shrink:0;white-space:nowrap">สมัคร</a>
        </div>
        <div style="display:flex;align-items:center;gap:14px;padding:13px 18px;border-bottom:1px solid var(--clr-border)">
          <div style="width:48px;height:48px;background:#0891b2;color:white;border-radius:10px;display:flex;flex-direction:column;align-items:center;justify-content:center;flex-shrink:0">
            <div style="font-size:.65rem;font-weight:600;opacity:.8">พ.ค.</div>
            <div style="font-size:1.1rem;font-weight:700;line-height:1">21</div>
          </div>
          <div style="flex:1">
            <div style="font-weight:600;font-size:.88rem;color:var(--clr-text)">Microsoft 365 สำหรับการทำงาน (รอบ 2)</div>
            <div style="font-size:.78rem;color:var(--clr-text-muted)">09:00–16:00 · ห้องอบรม อาคารสำนักงาน ชั้น 3 · รับ 25 ท่าน</div>
          </div>
          <a href="#" style="background:#0891b2;color:white;padding:6px 14px;border-radius:8px;font-size:.8rem;font-weight:600;text-decoration:none;flex-shrink:0;white-space:nowrap">สมัคร</a>
        </div>
        <div style="display:flex;align-items:center;gap:14px;padding:13px 18px">
          <div style="width:48px;height:48px;background:#7c3aed;color:white;border-radius:10px;display:flex;flex-direction:column;align-items:center;justify-content:center;flex-shrink:0">
            <div style="font-size:.65rem;font-weight:600;opacity:.8">มิ.ย.</div>
            <div style="font-size:1.1rem;font-weight:700;line-height:1">4</div>
          </div>
          <div style="flex:1">
            <div style="font-weight:600;font-size:.88rem;color:var(--clr-text)">การใช้งาน VPN และ Remote Access</div>
            <div style="font-size:.78rem;color:var(--clr-text-muted)">13:00–15:00 · ออนไลน์ผ่าน Microsoft Teams · ไม่จำกัดที่นั่ง</div>
          </div>
          <a href="#" style="background:#7c3aed;color:white;padding:6px 14px;border-radius:8px;font-size:.8rem;font-weight:600;text-decoration:none;flex-shrink:0;white-space:nowrap">สมัคร</a>
        </div>
      </div>

      <div style="background:linear-gradient(135deg,#eff6ff,#dbeafe);border:1px solid #bfdbfe;border-radius:12px;padding:14px 18px;display:flex;gap:12px;align-items:flex-start">
        <div style="font-size:1.2rem;flex-shrink:0">📣</div>
        <div style="font-size:.88rem;color:#1e3a8a;line-height:1.7">
          หลักสูตรและตารางอบรมอาจมีการปรับเปลี่ยน กรุณาติดตามประกาศบน SharePoint หรือสอบถามเพิ่มเติมได้ที่กองบริหารสารสนเทศ โทร <strong>4141</strong>
        </div>
      </div>
    ',
  ],
];

require_once '../includes/header.php';
?>

<?php
$panel_title   = 'คู่มือสอนใช้งาน';
$panel_cat     = $cat;
$panel_base    = 'manual.php';
$panel_menu    = $sections;
$panel_items   = $manual_items;
$panel_contact = false;
?>

<main class="layout__main">
  <nav class="breadcrumb">
    <a href="../index.php">หน้าหลัก</a>
    <span class="breadcrumb__sep">›</span>
    <span><?= $cat && isset($sections[$cat]) ? htmlspecialchars($sections[$cat]['label']) : 'คู่มือสอนใช้งาน' ?></span>
  </nav>

  <?php require_once '../includes/single-panel.php'; ?>
</main>

<?php require_once '../includes/footer.php'; ?>