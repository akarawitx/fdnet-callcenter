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
  'quota'    => ['label' => 'เช็กโควต้าอินเทอร์เน็ต'],
];

$all_services = [
  // ขอ Account ใหม่
  [
    'cat'   => 'account',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/><line x1="18" y1="8" x2="23" y2="13"/><line x1="23" y1="8" x2="18" y2="13"/></svg>',
    'title' => 'ขอ Account ใหม่',
    'desc'  => 'สมัครบัญชีผู้ใช้งานใหม่สำหรับบุคลากรที่ยังไม่เคยมี Account ในระบบ',
    'extra_html' => '

      <!-- ───── ปุ่มลิงก์ไปฟอร์มจริง ───── -->
      <a href="https://fdnet.dhammakaya.network/register.php" target="_blank"
         style="display:flex;align-items:center;justify-content:space-between;
                background:linear-gradient(135deg,#1e40af 0%,#3b82f6 100%);
                color:white;border-radius:14px;padding:16px 22px;text-decoration:none;
                margin-bottom:24px;box-shadow:0 4px 15px rgba(59,130,246,.35)">
        <div style="display:flex;align-items:center;gap:12px">
          <div style="width:40px;height:40px;background:rgba(255,255,255,.2);border-radius:10px;
                      display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
              <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
              <circle cx="12" cy="7" r="4"/>
            </svg>
          </div>
          <div>
            <div style="font-weight:700;font-size:.95rem">เปิดแบบฟอร์มขอ Account ใหม่</div>
            <div style="font-size:.78rem;opacity:.85;margin-top:2px">fdnet.dhammakaya.network/register.php</div>
          </div>
        </div>
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5"
             stroke-linecap="round" stroke-linejoin="round">
          <line x1="5" y1="12" x2="19" y2="12"/>
          <polyline points="12 5 19 12 12 19"/>
        </svg>
      </a>

      <!-- ───── ภาพตัวอย่างฟอร์ม ───── -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;
                  color:var(--clr-text-muted);margin-bottom:10px">ตัวอย่างหน้าฟอร์ม</div>
      <div style="border:1px solid var(--clr-border);border-radius:14px;overflow:hidden;margin-bottom:24px;
                  box-shadow:0 2px 12px rgba(0,0,0,.07)">
        <!-- header bar จำลอง browser -->
        <div style="background:#e2e8f0;padding:8px 14px;display:flex;align-items:center;gap:6px">
          <div style="width:10px;height:10px;background:#f87171;border-radius:50%"></div>
          <div style="width:10px;height:10px;background:#fbbf24;border-radius:50%"></div>
          <div style="width:10px;height:10px;background:#34d399;border-radius:50%"></div>
          <div style="background:white;border-radius:4px;padding:3px 12px;font-size:.72rem;
                      color:#64748b;margin-left:8px;flex:1;max-width:320px">
            fdnet.dhammakaya.network/register.php
          </div>
        </div>
        <img src="../assets/images/account_form_preview.png"
             alt="ตัวอย่างหน้าฟอร์มขอ Account ใหม่"
             style="width:100%;display:block"
             onerror="this.style.display=\'none\';this.nextElementSibling.style.display=\'flex\'">
        <!-- fallback ถ้าไม่มีรูป -->
        <div style="display:none;background:#f8fafc;padding:32px;flex-direction:column;
                    align-items:center;gap:10px;color:#94a3b8">
          <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <rect x="3" y="3" width="18" height="18" rx="2"/>
            <circle cx="8.5" cy="8.5" r="1.5"/>
            <polyline points="21 15 16 10 5 21"/>
          </svg>
          <span style="font-size:.82rem">วางรูปภาพ account_form_preview.png ไว้ในโฟลเดอร์ images/</span>
        </div>
      </div>

      <!-- ───── ขั้นตอนการกรอกฟอร์ม ───── -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;
                  color:var(--clr-text-muted);margin-bottom:12px">วิธีกรอกแบบฟอร์ม (ทีละขั้นตอน)</div>

      <!-- Step 1 -->
      <div style="border:1px solid var(--clr-border);border-radius:14px;overflow:hidden;margin-bottom:12px">
        <div style="background:var(--clr-primary-pale);padding:10px 16px;display:flex;
                    align-items:center;gap:10px;border-bottom:1px solid var(--clr-border)">
          <div style="width:24px;height:24px;background:var(--clr-primary);border-radius:50%;
                      display:flex;align-items:center;justify-content:center;
                      color:white;font-size:.72rem;font-weight:700;flex-shrink:0">1</div>
          <span style="font-weight:600;font-size:.9rem;color:var(--clr-primary-dark)">กรอกข้อมูลส่วนบุคคล (ฝั่งซ้าย)</span>
        </div>
        <div style="padding:14px 16px;font-size:.85rem;color:var(--clr-text);line-height:1.75;
                    display:flex;flex-direction:column;gap:6px">
          <div style="display:flex;gap:8px">
            <span style="color:var(--clr-primary);font-weight:700;flex-shrink:0">•</span>
            <span><strong>ประเภท</strong> — เลือก "ขอ Account ใหม่"</span>
          </div>
          <div style="display:flex;gap:8px">
            <span style="color:var(--clr-primary);font-weight:700;flex-shrink:0">•</span>
            <span><strong>ชื่อ-สกุล / ฉายา</strong> และ <strong>ชื่อภาษาอังกฤษ</strong></span>
          </div>
          <div style="display:flex;gap:8px">
            <span style="color:var(--clr-primary);font-weight:700;flex-shrink:0">•</span>
            <span><strong>ประเภทสมาชิก</strong>, <strong>หมายเลขบัตรประชาชน</strong></span>
          </div>
          <div style="display:flex;gap:8px">
            <span style="color:var(--clr-primary);font-weight:700;flex-shrink:0">•</span>
            <span><strong>Email Address</strong> (นามใช้เมล์องค์กร), <strong>เบอร์ภายใน</strong>, <strong>เบอร์มือถือ</strong></span>
          </div>
          <div style="display:flex;gap:8px">
            <span style="color:var(--clr-primary);font-weight:700;flex-shrink:0">•</span>
            <span><strong>รูปบัตรองค์กรหรือเซลฟี่คู่บัตรประชาชน</strong> — ไม่เกิน 5 MB (JPG, GIF, PNG)</span>
          </div>
        </div>
      </div>

      <!-- Step 2 -->
      <div style="border:1px solid var(--clr-border);border-radius:14px;overflow:hidden;margin-bottom:12px">
        <div style="background:var(--clr-primary-pale);padding:10px 16px;display:flex;
                    align-items:center;gap:10px;border-bottom:1px solid var(--clr-border)">
          <div style="width:24px;height:24px;background:var(--clr-primary);border-radius:50%;
                      display:flex;align-items:center;justify-content:center;
                      color:white;font-size:.72rem;font-weight:700;flex-shrink:0">2</div>
          <span style="font-weight:600;font-size:.9rem;color:var(--clr-primary-dark)">กรอกข้อมูลหน่วยงาน (ฝั่งขวา)</span>
        </div>
        <div style="padding:14px 16px;font-size:.85rem;color:var(--clr-text);line-height:1.75;
                    display:flex;flex-direction:column;gap:6px">
          <div style="display:flex;gap:8px">
            <span style="color:var(--clr-primary);font-weight:700;flex-shrink:0">•</span>
            <span><strong>กอง/ศูนย์</strong> — พิมพ์ชื่อแล้วเลือกจากตัวเลือก</span>
          </div>
          <div style="display:flex;gap:8px">
            <span style="color:var(--clr-primary);font-weight:700;flex-shrink:0">•</span>
            <span><strong>ฝ่าย, สำนัก, ชื่อหัวหน้า</strong> — แสดงอัตโนมัติหลังเลือกกอง</span>
          </div>
          <div style="display:flex;gap:8px">
            <span style="color:var(--clr-primary);font-weight:700;flex-shrink:0">•</span>
            <span><strong>ใช้งานเกี่ยวกับ</strong> และ <strong>Computer Name</strong></span>
          </div>
          <div style="display:flex;gap:8px">
            <span style="color:var(--clr-primary);font-weight:700;flex-shrink:0">•</span>
            <span>อ่านข้อตกลงการใช้บริการแล้วเลือก <strong>"ยอมรับ"</strong></span>
          </div>
        </div>
      </div>

      <!-- Step 3 -->
      <div style="border:1px solid var(--clr-border);border-radius:14px;overflow:hidden;margin-bottom:24px">
        <div style="background:#f0fdf4;padding:10px 16px;display:flex;
                    align-items:center;gap:10px;border-bottom:1px solid #bbf7d0">
          <div style="width:24px;height:24px;background:#16a34a;border-radius:50%;
                      display:flex;align-items:center;justify-content:center;
                      color:white;font-size:.72rem;font-weight:700;flex-shrink:0">3</div>
          <span style="font-weight:600;font-size:.9rem;color:#166534">กด "คลิกส่งข้อมูล"</span>
        </div>
        <div style="padding:14px 16px;font-size:.85rem;color:var(--clr-text);line-height:1.75">
          ระบบจะส่ง <strong>Username และ Password เริ่มต้น</strong> ไปยัง Email ที่ระบุไว้
          กรุณา<strong>เปลี่ยนรหัสผ่านทันที</strong>หลังล็อกอินครั้งแรก
          (ต้องประกอบด้วยตัวอักษร + ตัวเลข อย่างน้อย 8 ตัว)
        </div>
      </div>

      <!-- ───── ตัวอย่างรูปบัตรที่ใช้ได้ ───── -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;
                  color:var(--clr-text-muted);margin-bottom:12px">ตัวอย่างรูปบัตรที่ใช้ยืนยันตัวตน</div>
      <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-bottom:24px">

        <!-- บัตรองค์กร -->
        <a href="https://fdnet.dhammakaya.network/form/fdnet62/card.jpg" target="_blank"
           style="text-decoration:none;border:1px solid var(--clr-border);border-radius:12px;
                  overflow:hidden;display:flex;flex-direction:column;
                  transition:box-shadow .15s;background:var(--clr-bg)"
           onmouseover="this.style.boxShadow=\'0 4px 16px rgba(0,0,0,.12)\'"
           onmouseout="this.style.boxShadow=\'none\'">
          <div style="aspect-ratio:16/9;overflow:hidden;background:#f1f5f9;position:relative">
            <img src="https://fdnet.dhammakaya.network/form/fdnet62/card.jpg"
                 alt="บัตรองค์กรที่สามารถใช้ได้"
                 style="width:100%;height:100%;object-fit:cover"
                 onerror="this.parentElement.innerHTML=\'<div style=&quot;width:100%;height:100%;display:flex;align-items:center;justify-content:center;color:#94a3b8&quot;>🪪</div>\'">
          </div>
          <div style="padding:10px 12px">
            <div style="font-weight:600;font-size:.82rem;color:var(--clr-text);margin-bottom:2px">บัตรองค์กร</div>
            <div style="font-size:.74rem;color:var(--clr-text-muted)">บัตรที่สามารถใช้ได้</div>
          </div>
        </a>

        <!-- สำหรับเจ้าหน้าที่ -->
        <a href="https://fdnet.dhammakaya.network/form/fdnet61/staff.jpg" target="_blank"
           style="text-decoration:none;border:1px solid var(--clr-border);border-radius:12px;
                  overflow:hidden;display:flex;flex-direction:column;
                  transition:box-shadow .15s;background:var(--clr-bg)"
           onmouseover="this.style.boxShadow=\'0 4px 16px rgba(0,0,0,.12)\'"
           onmouseout="this.style.boxShadow=\'none\'">
          <div style="aspect-ratio:16/9;overflow:hidden;background:#f1f5f9">
            <img src="https://fdnet.dhammakaya.network/form/fdnet61/staff.jpg"
                 alt="ตัวอย่างสำหรับเจ้าหน้าที่"
                 style="width:100%;height:100%;object-fit:cover"
                 onerror="this.parentElement.innerHTML=\'<div style=&quot;width:100%;height:100%;display:flex;align-items:center;justify-content:center;color:#94a3b8&quot;>👤</div>\'">
          </div>
          <div style="padding:10px 12px">
            <div style="font-weight:600;font-size:.82rem;color:var(--clr-text);margin-bottom:2px">สำหรับเจ้าหน้าที่</div>
            <div style="font-size:.74rem;color:var(--clr-text-muted)">ตัวอย่างการถ่ายรูป</div>
          </div>
        </a>

        <!-- สำหรับหัวหน้ากอง -->
        <a href="https://fdnet.dhammakaya.network/form/fdnet61/head.jpg" target="_blank"
           style="text-decoration:none;border:1px solid var(--clr-border);border-radius:12px;
                  overflow:hidden;display:flex;flex-direction:column;
                  transition:box-shadow .15s;background:var(--clr-bg)"
           onmouseover="this.style.boxShadow=\'0 4px 16px rgba(0,0,0,.12)\'"
           onmouseout="this.style.boxShadow=\'none\'">
          <div style="aspect-ratio:16/9;overflow:hidden;background:#f1f5f9">
            <img src="https://fdnet.dhammakaya.network/form/fdnet61/head.jpg"
                 alt="ตัวอย่างสำหรับหัวหน้ากอง"
                 style="width:100%;height:100%;object-fit:cover"
                 onerror="this.parentElement.innerHTML=\'<div style=&quot;width:100%;height:100%;display:flex;align-items:center;justify-content:center;color:#94a3b8&quot;>👑</div>\'">
          </div>
          <div style="padding:10px 12px">
            <div style="font-weight:600;font-size:.82rem;color:var(--clr-text);margin-bottom:2px">สำหรับหัวหน้ากอง</div>
            <div style="font-size:.74rem;color:var(--clr-text-muted)">ตัวอย่างการถ่ายรูป</div>
          </div>
        </a>

      </div>

      <!-- ───── หมายเหตุ ───── -->
      <div style="border:1px solid var(--clr-border);border-radius:12px;overflow:hidden;margin-bottom:16px">
        <div style="background:#fef2f2;padding:10px 16px;border-bottom:1px solid #fecaca">
          <span style="font-weight:600;font-size:.85rem;color:#991b1b">📋 หมายเหตุ : ขอ Account ใหม่</span>
        </div>
        <div style="padding:14px 16px;font-size:.84rem;color:var(--clr-text);line-height:1.85;
                    display:flex;flex-direction:column;gap:6px">
          <div style="display:flex;gap:8px">
            <span style="flex-shrink:0">•</span>
            <span>กรอกข้อมูลให้ครบถ้วนทุกช่อง</span>
          </div>
          <div style="display:flex;gap:8px">
            <span style="flex-shrink:0">•</span>
            <span>เซลฟี่หน้าตนเองพร้อมบัตรองค์กรหรือบัตรประจำตัวประชาชนและลายเซ็น พร้อมเขียนคำอื่นๆ ที่จำเป็นในการยืนยันตัวตนด้วยลายมือท่านเองเท่านั้น ตามคู่มือนี้</span>
          </div>
        </div>
      </div>

      <!-- ───── ติดต่อสอบถาม ───── -->
      <div style="display:flex;flex-wrap:wrap;gap:10px;align-items:center">

        <!-- Email -->
        <a href="mailto:noc@dhammakaya.center"
           style="display:inline-flex;align-items:center;gap:8px;
                  background:var(--clr-bg);border:1px solid var(--clr-border);
                  color:var(--clr-text);padding:10px 18px;border-radius:8px;
                  font-size:.87rem;font-weight:600;text-decoration:none">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
               stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
            <polyline points="22,6 12,13 2,6"/>
          </svg>
          noc@dhammakaya.center
        </a>

        <!-- Line it4141 -->
        <a href="https://line.me/ti/p/~it4141" target="_blank"
           style="display:inline-flex;align-items:center;gap:8px;
                  background:#06C755;border:1px solid #05a847;
                  color:white;padding:10px 18px;border-radius:8px;
                  font-size:.87rem;font-weight:600;text-decoration:none">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="white">
            <path d="M19.365 9.863c.349 0 .63.285.63.631 0 .345-.281.63-.63.63H17.61v1.125h1.755
                     c.349 0 .63.283.63.63 0 .344-.281.629-.63.629h-2.386c-.345 0-.627-.285-.627-.629V8.108
                     c0-.345.282-.63.63-.63h2.386c.346 0 .627.285.627.63 0 .349-.281.63-.63.63H17.61v1.125h1.755z
                     M14.271 12.629c0 .27-.174.51-.432.594a.627.627 0 0 1-.695-.232l-2.386-3.239v2.877
                     c0 .344-.283.629-.627.629-.35 0-.631-.285-.631-.629V8.108c0-.27.173-.51.43-.594
                     a.63.63 0 0 1 .697.233l2.386 3.239V8.108c0-.345.282-.63.63-.63.346 0 .628.285.628.63v4.521z
                     M9.818 12.629c0 .344-.282.629-.63.629-.346 0-.628-.285-.628-.629V8.108
                     c0-.345.282-.63.628-.63.348 0 .63.285.63.63v4.521z
                     M7.576 12.629H5.189c-.344 0-.627-.285-.627-.629V8.108c0-.345.283-.63.63-.63
                     .345 0 .627.285.627.63v3.891h1.755c.349 0 .63.283.63.63 0 .344-.281.629-.628.629z
                     M22 10.732C22 5.442 17.073 1 11 1S0 5.442 0 10.732c0 4.766 4.168 8.76 9.8 9.516
                     .382.083.902.254 1.033.582.12.3.078.769.038 1.073l-.164 1.003
                     c-.045.3-.24 1.178 1.048.642 1.286-.537 6.956-4.143 9.489-7.094
                     C21.392 14.375 22 12.618 22 10.732z"/>
          </svg>
          Line: it4141
        </a>

        <!-- Line it4141-2 -->
        <a href="https://line.me/ti/p/~it4141-2" target="_blank"
           style="display:inline-flex;align-items:center;gap:8px;
                  background:#06C755;border:1px solid #05a847;
                  color:white;padding:10px 18px;border-radius:8px;
                  font-size:.87rem;font-weight:600;text-decoration:none">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="white">
            <path d="M19.365 9.863c.349 0 .63.285.63.631 0 .345-.281.63-.63.63H17.61v1.125h1.755
                     c.349 0 .63.283.63.63 0 .344-.281.629-.63.629h-2.386c-.345 0-.627-.285-.627-.629V8.108
                     c0-.345.282-.63.63-.63h2.386c.346 0 .627.285.627.63 0 .349-.281.63-.63.63H17.61v1.125h1.755z
                     M14.271 12.629c0 .27-.174.51-.432.594a.627.627 0 0 1-.695-.232l-2.386-3.239v2.877
                     c0 .344-.283.629-.627.629-.35 0-.631-.285-.631-.629V8.108c0-.27.173-.51.43-.594
                     a.63.63 0 0 1 .697.233l2.386 3.239V8.108c0-.345.282-.63.63-.63.346 0 .628.285.628.63v4.521z
                     M9.818 12.629c0 .344-.282.629-.63.629-.346 0-.628-.285-.628-.629V8.108
                     c0-.345.282-.63.628-.63.348 0 .63.285.63.63v4.521z
                     M7.576 12.629H5.189c-.344 0-.627-.285-.627-.629V8.108c0-.345.283-.63.63-.63
                     .345 0 .627.285.627.63v3.891h1.755c.349 0 .63.283.63.63 0 .344-.281.629-.628.629z
                     M22 10.732C22 5.442 17.073 1 11 1S0 5.442 0 10.732c0 4.766 4.168 8.76 9.8 9.516
                     .382.083.902.254 1.033.582.12.3.078.769.038 1.073l-.164 1.003
                     c-.045.3-.24 1.178 1.048.642 1.286-.537 6.956-4.143 9.489-7.094
                     C21.392 14.375 22 12.618 22 10.732z"/>
          </svg>
          Line: it4141-2
        </a>

      </div>

    ',
  ],

  // ต่ออายุ Account
  [
    'cat'   => 'renew',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M23 4v6h-6"/><path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"/></svg>',
    'title' => 'ต่ออายุ Account',
    'desc'  => 'ขยายอายุการใช้งานบัญชีที่ใกล้หมดอายุหรือถูกระงับชั่วคราว',
    'extra_html' => '

      <!-- ───── ปุ่มลิงก์ไปฟอร์มจริง ───── -->
      <a href="https://fdnet.dhammakaya.network/register_renew.php" target="_blank"
         style="display:flex;align-items:center;justify-content:space-between;
                background:linear-gradient(135deg,#166534 0%,#22c55e 100%);
                color:white;border-radius:14px;padding:16px 22px;text-decoration:none;
                margin-bottom:24px;box-shadow:0 4px 15px rgba(34,197,94,.3)">
        <div style="display:flex;align-items:center;gap:12px">
          <div style="width:40px;height:40px;background:rgba(255,255,255,.2);border-radius:10px;
                      display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round">
              <path d="M23 4v6h-6"/>
              <path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"/>
            </svg>
          </div>
          <div>
            <div style="font-weight:700;font-size:.95rem">เปิดแบบฟอร์มต่ออายุ Account</div>
            <div style="font-size:.78rem;opacity:.85;margin-top:2px">fdnet.dhammakaya.network</div>
          </div>
        </div>
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5"
             stroke-linecap="round" stroke-linejoin="round">
          <line x1="5" y1="12" x2="19" y2="12"/>
          <polyline points="12 5 19 12 12 19"/>
        </svg>
      </a>

      <!-- ───── ภาพตัวอย่างฟอร์ม ───── -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;
                  color:var(--clr-text-muted);margin-bottom:10px">ตัวอย่างหน้าฟอร์มต่ออายุ</div>
      <div style="border:1px solid var(--clr-border);border-radius:14px;overflow:hidden;margin-bottom:24px;
        box-shadow:0 2px 12px rgba(0,0,0,.07)">
        <!-- browser bar จำลอง -->
        <div style="background:#e2e8f0;padding:8px 14px;display:flex;align-items:center;gap:6px">
          <div style="width:10px;height:10px;background:#f87171;border-radius:50%"></div>
          <div style="width:10px;height:10px;background:#fbbf24;border-radius:50%"></div>
          <div style="width:10px;height:10px;background:#34d399;border-radius:50%"></div>
          <div style="background:white;border-radius:4px;padding:3px 12px;font-size:.72rem;
                      color:#64748b;margin-left:8px;flex:1;max-width:320px">
            fdnet.dhammakaya.network — ต่ออายุ Account
          </div>
        </div>
        <img src="../assets/images/renew_form_preview.png"
             alt="ตัวอย่างหน้าฟอร์มต่ออายุ Account"
             style="width:100%;display:block"
             onerror="this.style.display=\'none\';this.nextElementSibling.style.display=\'flex\'">
        <!-- fallback ถ้าไม่มีรูป -->
        <div style="display:none;background:#f8fafc;padding:32px;flex-direction:column;
                    align-items:center;gap:10px;color:#94a3b8">
          <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <rect x="3" y="3" width="18" height="18" rx="2"/>
            <circle cx="8.5" cy="8.5" r="1.5"/>
            <polyline points="21 15 16 10 5 21"/>
          </svg>
          <span style="font-size:.82rem">วางรูปภาพ renew_form_preview.png ไว้ในโฟลเดอร์ assets/images/</span>
        </div>
      </div>

      <!-- ───── ขั้นตอนการกรอกฟอร์ม ───── -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;
                  color:var(--clr-text-muted);margin-bottom:12px">วิธีกรอกแบบฟอร์ม (ทีละขั้นตอน)</div>

      <!-- Step 1 -->
      <div style="border:1px solid var(--clr-border);border-radius:14px;overflow:hidden;margin-bottom:10px">
        <div style="background:#f0fdf4;padding:10px 16px;display:flex;align-items:center;gap:10px;
                    border-bottom:1px solid #bbf7d0">
          <div style="width:24px;height:24px;background:#16a34a;border-radius:50%;flex-shrink:0;
                      display:flex;align-items:center;justify-content:center;
                      color:white;font-size:.72rem;font-weight:700">1</div>
          <span style="font-weight:600;font-size:.9rem;color:#166534">กรอกข้อมูลส่วนบุคคล (ฝั่งซ้าย)</span>
        </div>
        <div style="padding:14px 16px;font-size:.85rem;color:var(--clr-text);
                    line-height:1.75;display:flex;flex-direction:column;gap:5px">
          <div style="display:flex;gap:8px">
            <span style="color:#16a34a;font-weight:700;flex-shrink:0">•</span>
            <span><strong>Username</strong> — ใส่ username ที่มีอยู่แล้วของท่าน</span>
          </div>
          <div style="display:flex;gap:8px">
            <span style="color:#16a34a;font-weight:700;flex-shrink:0">•</span>
            <span><strong>ชื่อ-สกุล / ฉายา</strong>, <strong>Email (งดใช้เมล์องค์กร)</strong></span>
          </div>
          <div style="display:flex;gap:8px">
            <span style="color:#16a34a;font-weight:700;flex-shrink:0">•</span>
            <span><strong>เบอร์มือถือ</strong> และ <strong>เบอร์ภายใน</strong></span>
          </div>
          <div style="display:flex;gap:8px">
            <span style="color:#16a34a;font-weight:700;flex-shrink:0">•</span>
            <span><strong>ภาพถ่ายบัตรองค์กรหรือบัตรประชาชน</strong> — ไม่เกิน 5 MB (JPG, GIF, PNG)</span>
          </div>
        </div>
      </div>

      <!-- Step 2 -->
      <div style="border:1px solid var(--clr-border);border-radius:14px;overflow:hidden;margin-bottom:10px">
        <div style="background:#f0fdf4;padding:10px 16px;display:flex;align-items:center;gap:10px;
                    border-bottom:1px solid #bbf7d0">
          <div style="width:24px;height:24px;background:#16a34a;border-radius:50%;flex-shrink:0;
                      display:flex;align-items:center;justify-content:center;
                      color:white;font-size:.72rem;font-weight:700">2</div>
          <span style="font-weight:600;font-size:.9rem;color:#166534">กรอกข้อมูลหน่วยงาน (ฝั่งขวา)</span>
        </div>
        <div style="padding:14px 16px;font-size:.85rem;color:var(--clr-text);
                    line-height:1.75;display:flex;flex-direction:column;gap:5px">
          <div style="display:flex;gap:8px">
            <span style="color:#16a34a;font-weight:700;flex-shrink:0">•</span>
            <span><strong>กอง/ศูนย์</strong> — ระบบแสดงอัตโนมัติตามที่ท่านสังกัด</span>
          </div>
          <div style="display:flex;gap:8px">
            <span style="color:#16a34a;font-weight:700;flex-shrink:0">•</span>
            <span><strong>ฝ่าย, สำนัก, ชื่อหัวหน้า</strong> — แสดงอัตโนมัติ</span>
          </div>
          <div style="display:flex;gap:8px">
            <span style="color:#16a34a;font-weight:700;flex-shrink:0">•</span>
            <span><strong>ใช้งานเกี่ยวกับ</strong> — ระบุลักษณะงานของท่าน</span>
          </div>
          <div style="display:flex;gap:8px">
            <span style="color:#16a34a;font-weight:700;flex-shrink:0">•</span>
            <span><strong>เหตุผลที่ไม่ส่งต่ออายุ</strong> — ระบุสาเหตุที่ไม่ได้ต่ออายุตามกำหนด (ถ้ามี)</span>
          </div>
          <div style="display:flex;gap:8px">
            <span style="color:#16a34a;font-weight:700;flex-shrink:0">•</span>
            <span>อ่านข้อตกลงแล้วติ๊ก <strong>"ฉันยอมรับข้อกำหนดและเงื่อนไขการใช้งาน"</strong></span>
          </div>
        </div>
      </div>

      <!-- Step 3 -->
      <div style="border:1px solid #bbf7d0;border-radius:14px;overflow:hidden;margin-bottom:24px">
        <div style="background:#dcfce7;padding:10px 16px;display:flex;align-items:center;gap:10px;
                    border-bottom:1px solid #bbf7d0">
          <div style="width:24px;height:24px;background:#15803d;border-radius:50%;flex-shrink:0;
                      display:flex;align-items:center;justify-content:center;
                      color:white;font-size:.72rem;font-weight:700">3</div>
          <span style="font-weight:600;font-size:.9rem;color:#14532d">กด "คลิกส่งข้อมูล"</span>
        </div>
        <div style="padding:14px 16px;font-size:.85rem;color:var(--clr-text);line-height:1.75">
          เจ้าหน้าที่จะดำเนินการต่ออายุและแจ้งผลกลับไปยัง <strong>Email ที่ระบุ</strong>
          ภายใน <strong>1 วันทำการ</strong>
        </div>
      </div>

      <!-- ───── ตัวอย่างรูปบัตร ───── -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;
                  color:var(--clr-text-muted);margin-bottom:12px">ตัวอย่างบัตรองค์กรที่ใช้ต่ออายุได้</div>
      <a href="https://fdnet.dhammakaya.network/form/fdnet62/card.jpg" target="_blank"
         style="text-decoration:none;display:flex;gap:14px;align-items:center;
                border:1px solid var(--clr-border);border-radius:14px;overflow:hidden;
                margin-bottom:24px;background:var(--clr-bg);
                transition:box-shadow .15s"
         onmouseover="this.style.boxShadow=\'0 4px 16px rgba(0,0,0,.12)\'"
         onmouseout="this.style.boxShadow=\'none\'">
        <!-- thumbnail -->
        <div style="width:130px;min-height:90px;flex-shrink:0;overflow:hidden;background:#f1f5f9;
                    display:flex;align-items:center;justify-content:center">
          <img src="https://fdnet.dhammakaya.network/form/fdnet62/card.jpg"
               alt="ตัวอย่างบัตรองค์กร"
               style="width:100%;height:100%;object-fit:cover"
               onerror="this.parentElement.innerHTML=\'<span style=&quot;font-size:2rem&quot;>🪪</span>\'">
        </div>
        <div style="padding:14px 16px 14px 0">
          <div style="font-weight:700;font-size:.9rem;color:var(--clr-text);margin-bottom:4px">
            บัตรองค์กรที่สามารถใช้ต่ออายุได้
          </div>
          <div style="font-size:.8rem;color:var(--clr-text-muted);margin-bottom:10px;line-height:1.6">
            คลิกเพื่อดูรูปตัวอย่างบัตรที่ระบบยอมรับสำหรับการยืนยันตัวตนในการต่ออายุ Account
          </div>
          <div style="display:inline-flex;align-items:center;gap:6px;
                      background:#f0fdf4;border:1px solid #bbf7d0;
                      color:#166534;border-radius:6px;padding:5px 12px;font-size:.78rem;font-weight:600">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
              <polyline points="15 3 21 3 21 9"/>
              <line x1="10" y1="14" x2="21" y2="3"/>
            </svg>
            เปิดดูรูปตัวอย่าง
          </div>
        </div>
      </a>

      <!-- ───── คำเตือนกำหนดเวลา ───── -->
      <div style="border:1px solid #fca5a5;border-radius:12px;overflow:hidden;margin-bottom:12px">
        <div style="background:#fef2f2;padding:10px 16px;border-bottom:1px solid #fca5a5">
          <span style="font-weight:600;font-size:.85rem;color:#991b1b">⚠️ คำเตือน : กำหนดการต่ออายุ</span>
        </div>
        <div style="padding:14px 16px;font-size:.84rem;color:var(--clr-text);line-height:1.85;display:flex;flex-direction:column;gap:6px">
          <div style="display:flex;gap:8px">
            <span style="flex-shrink:0;color:#dc2626;font-weight:700">•</span>
            <span id="renew-deadline-notice"></span>
          </div>
          <div style="display:flex;gap:8px">
            <span style="flex-shrink:0;color:#dc2626;font-weight:700">•</span>
            <span>หากยื่นคำขอ<strong>หลังวันที่ 31 ธันวาคม</strong> ผู้ใช้จะต้องขึ้นมาติดต่อที่ <strong>กองบริหารสารสนเทศ</strong> เองเท่านั้น</span>
          </div>
        </div>
      </div>
      <script>
        (function () {
          var thYear = new Date().getFullYear() + 543;
          var el = document.getElementById(\'renew-deadline-notice\');
          if (el) {
            el.innerHTML = \'การขอต่ออายุสามารถขอได้<strong>ก่อนวันที่ 31 ธันวาคม \' + thYear + \'</strong>\';
          }
        })();
      </script>

      <!-- ───── หมายเหตุ ───── -->
      <div style="border:1px solid var(--clr-border);border-radius:12px;overflow:hidden;margin-bottom:16px">
        <div style="background:#fef9f0;padding:10px 16px;border-bottom:1px solid #fde68a">
          <span style="font-weight:600;font-size:.85rem;color:#92400e">📋 หมายเหตุ : การต่ออายุ Account</span>
        </div>
        <div style="padding:14px 16px;font-size:.84rem;color:var(--clr-text);
                    line-height:1.85;display:flex;flex-direction:column;gap:6px">
          <div style="display:flex;gap:8px">
            <span style="flex-shrink:0">•</span>
            <span>กรอกข้อมูลให้ครบถ้วนทุกช่อง</span>
          </div>
          <div style="display:flex;gap:8px">
            <span style="flex-shrink:0">•</span>
            <span>ถ่ายรูปบัตรองค์กร หรือ บัตรประจำตัวประชาชน</span>
          </div>
          <div style="display:flex;gap:8px">
            <span style="flex-shrink:0">•</span>
            <span>
              <a href="https://fdnet.dhammakaya.network/form/fdnet62/card.jpg" target="_blank"
                 style="color:var(--clr-primary);text-decoration:underline">
                คลิกดูตัวอย่าง บัตรองค์กรที่สามารถใช้ต่ออายุได้
              </a>
            </span>
          </div>
        </div>
      </div>

      <!-- ───── ติดต่อสอบถาม ───── -->
      <div style="display:flex;flex-wrap:wrap;gap:10px;align-items:center">

        <!-- Email -->
        <a href="mailto:noc@dhammakaya.center"
           style="display:inline-flex;align-items:center;gap:8px;
                  background:var(--clr-bg);border:1px solid var(--clr-border);
                  color:var(--clr-text);padding:10px 18px;border-radius:8px;
                  font-size:.87rem;font-weight:600;text-decoration:none">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
               stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
            <polyline points="22,6 12,13 2,6"/>
          </svg>
          noc@dhammakaya.center
        </a>

        <!-- Line it4141 -->
        <a href="https://line.me/ti/p/~it4141" target="_blank"
           style="display:inline-flex;align-items:center;gap:8px;
                  background:#06C755;border:1px solid #05a847;
                  color:white;padding:10px 18px;border-radius:8px;
                  font-size:.87rem;font-weight:600;text-decoration:none">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="white">
            <path d="M19.365 9.863c.349 0 .63.285.63.631 0 .345-.281.63-.63.63H17.61v1.125h1.755
                     c.349 0 .63.283.63.63 0 .344-.281.629-.63.629h-2.386c-.345 0-.627-.285-.627-.629V8.108
                     c0-.345.282-.63.63-.63h2.386c.346 0 .627.285.627.63 0 .349-.281.63-.63.63H17.61v1.125h1.755z
                     M14.271 12.629c0 .27-.174.51-.432.594a.627.627 0 0 1-.695-.232l-2.386-3.239v2.877
                     c0 .344-.283.629-.627.629-.35 0-.631-.285-.631-.629V8.108c0-.27.173-.51.43-.594
                     a.63.63 0 0 1 .697.233l2.386 3.239V8.108c0-.345.282-.63.63-.63.346 0 .628.285.628.63v4.521z
                     M9.818 12.629c0 .344-.282.629-.63.629-.346 0-.628-.285-.628-.629V8.108
                     c0-.345.282-.63.628-.63.348 0 .63.285.63.63v4.521z
                     M7.576 12.629H5.189c-.344 0-.627-.285-.627-.629V8.108c0-.345.283-.63.63-.63
                     .345 0 .627.285.627.63v3.891h1.755c.349 0 .63.283.63.63 0 .344-.281.629-.628.629z
                     M22 10.732C22 5.442 17.073 1 11 1S0 5.442 0 10.732c0 4.766 4.168 8.76 9.8 9.516
                     .382.083.902.254 1.033.582.12.3.078.769.038 1.073l-.164 1.003
                     c-.045.3-.24 1.178 1.048.642 1.286-.537 6.956-4.143 9.489-7.094
                     C21.392 14.375 22 12.618 22 10.732z"/>
          </svg>
          Line: it4141
        </a>

        <!-- Line it4141-2 -->
        <a href="https://line.me/ti/p/~it4141-2" target="_blank"
           style="display:inline-flex;align-items:center;gap:8px;
                  background:#06C755;border:1px solid #05a847;
                  color:white;padding:10px 18px;border-radius:8px;
                  font-size:.87rem;font-weight:600;text-decoration:none">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="white">
            <path d="M19.365 9.863c.349 0 .63.285.63.631 0 .345-.281.63-.63.63H17.61v1.125h1.755
                     c.349 0 .63.283.63.63 0 .344-.281.629-.63.629h-2.386c-.345 0-.627-.285-.627-.629V8.108
                     c0-.345.282-.63.63-.63h2.386c.346 0 .627.285.627.63 0 .349-.281.63-.63.63H17.61v1.125h1.755z
                     M14.271 12.629c0 .27-.174.51-.432.594a.627.627 0 0 1-.695-.232l-2.386-3.239v2.877
                     c0 .344-.283.629-.627.629-.35 0-.631-.285-.631-.629V8.108c0-.27.173-.51.43-.594
                     a.63.63 0 0 1 .697.233l2.386 3.239V8.108c0-.345.282-.63.63-.63.346 0 .628.285.628.63v4.521z
                     M9.818 12.629c0 .344-.282.629-.63.629-.346 0-.628-.285-.628-.629V8.108
                     c0-.345.282-.63.628-.63.348 0 .63.285.63.63v4.521z
                     M7.576 12.629H5.189c-.344 0-.627-.285-.627-.629V8.108c0-.345.283-.63.63-.63
                     .345 0 .627.285.627.63v3.891h1.755c.349 0 .63.283.63.63 0 .344-.281.629-.628.629z
                     M22 10.732C22 5.442 17.073 1 11 1S0 5.442 0 10.732c0 4.766 4.168 8.76 9.8 9.516
                     .382.083.902.254 1.033.582.12.3.078.769.038 1.073l-.164 1.003
                     c-.045.3-.24 1.178 1.048.642 1.286-.537 6.956-4.143 9.489-7.094
                     C21.392 14.375 22 12.618 22 10.732z"/>
          </svg>
          Line: it4141-2
        </a>

      </div>
    ',
  ],

  // เช็กสถานะ Account/รหัสผ่าน
  [
    'cat'   => 'status',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>',
    'title' => 'เช็กสถานะ Account/รหัสผ่าน',
    'desc'  => 'ตรวจสอบว่าบัญชียังใช้งานได้อยู่หรือไม่ และวันหมดอายุของรหัสผ่าน',
    'extra_html' => '

      <!-- ───── วิธีใช้งาน ───── -->
      <p style="font-size:.93rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        ระบบเช็กสถานะให้บริการ <strong>ตลอด 24 ชั่วโมง</strong>
        เพียงพิมพ์ <strong>Username หน้าแดง</strong> ลงในช่องแล้วกดตรวจสอบ
        ระบบจะแสดงสถานะบัญชีและอายุรหัสผ่านทันที
      </p>

      <!-- ───── ภาพ Step 1: หน้าจอกรอก Username ───── -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;
                  color:var(--clr-text-muted);margin-bottom:10px">
        ขั้นตอนที่ 1 — กรอก Username แล้วกดตรวจสอบ
      </div>
      <div style="border:1px solid var(--clr-border);border-radius:14px;overflow:hidden;
                  margin-bottom:8px;box-shadow:0 2px 10px rgba(0,0,0,.07)">
        <img src="../assets/images/status_step1.png"
             alt="หน้าจอเช็กสถานะ — กรอก Username"
             style="width:100%;display:block"
             onerror="this.style.display=\'none\';this.nextElementSibling.style.display=\'flex\'">
        <div style="display:none;background:#f0f9ff;padding:24px;flex-direction:column;
                    align-items:center;gap:8px;color:#94a3b8">
          <span style="font-size:1.8rem">🔍</span>
          <span style="font-size:.82rem">วางรูปภาพ status_step1.png ไว้ในโฟลเดอร์ assets/images/</span>
        </div>
      </div>
      <div style="background:#f0f9ff;border:1px solid #bae6fd;border-radius:8px;
                  padding:10px 14px;font-size:.82rem;color:#0369a1;margin-bottom:24px">
        💡 พิมพ์ <strong>User หน้าแดง</strong> ในช่อง Username เช่น pjohn, vjohn, mjohn
      </div>

      <!-- ───── ผลลัพธ์ที่เป็นไปได้ ───── -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;
                  color:var(--clr-text-muted);margin-bottom:12px">ผลลัพธ์ที่อาจได้รับ</div>

      <!-- กรณี ✅ บัญชีปกติ -->
      <div style="border:1px solid #bbf7d0;border-radius:14px;overflow:hidden;margin-bottom:12px">
        <div style="background:#f0fdf4;padding:10px 16px;display:flex;align-items:center;gap:8px;
                    border-bottom:1px solid #bbf7d0">
          <div style="width:10px;height:10px;border-radius:50%;background:#22c55e;flex-shrink:0"></div>
          <span style="font-weight:600;font-size:.88rem;color:#166534">กรณีที่ 1 — บัญชีและรหัสผ่านปกติ</span>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:0">
          <div style="padding:14px 16px;border-right:1px solid #bbf7d0">
            <img src="../assets/images/status_ok.png"
                 alt="ผลลัพธ์บัญชีปกติ"
                 style="width:100%;border-radius:8px;display:block"
                 onerror="this.style.display=\'none\';this.nextElementSibling.style.display=\'flex\'">
            <div style="display:none;background:#f8fafc;border-radius:8px;padding:20px;
                        flex-direction:column;align-items:center;gap:6px;color:#94a3b8;min-height:80px">
              <span style="font-size:.75rem">status_ok.png</span>
            </div>
          </div>
          <div style="padding:16px;display:flex;flex-direction:column;justify-content:center;gap:8px">
            <div style="font-size:.85rem;color:var(--clr-text);line-height:1.7">
              ระบบแสดง <strong style="color:#166534">ชื่อ-สกุล</strong> และ
              <strong style="color:#166534">อายุรหัสผ่าน</strong> ที่เหลืออยู่
            </div>
            <div style="background:#dcfce7;border-radius:8px;padding:10px 12px;
                        font-size:.82rem;color:#166534;line-height:1.6">
              ✅ ใช้งานได้ตามปกติ<br>ไม่ต้องดำเนินการใดๆ
            </div>
          </div>
        </div>
      </div>

      <!-- กรณี ❌ บัญชีถูกระงับ -->
      <div style="border:1px solid #fecaca;border-radius:14px;overflow:hidden;margin-bottom:20px">
        <div style="background:#fef2f2;padding:10px 16px;display:flex;align-items:center;gap:8px;
                    border-bottom:1px solid #fecaca">
          <div style="width:10px;height:10px;border-radius:50%;background:#ef4444;flex-shrink:0"></div>
          <span style="font-weight:600;font-size:.88rem;color:#991b1b">กรณีที่ 2 — บัญชีถูกระงับ / รหัสผ่านหมดอายุ</span>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:0">
          <div style="padding:14px 16px;border-right:1px solid #fecaca">
            <img src="../assets/images/status_expired.png"
                 alt="ผลลัพธ์บัญชีถูกระงับ"
                 style="width:100%;border-radius:8px;display:block"
                 onerror="this.style.display=\'none\';this.nextElementSibling.style.display=\'flex\'">
            <div style="display:none;background:#f8fafc;border-radius:8px;padding:20px;
                        flex-direction:column;align-items:center;gap:6px;color:#94a3b8;min-height:80px">
              <span style="font-size:.75rem">status_expired.png</span>
            </div>
          </div>
          <div style="padding:16px;display:flex;flex-direction:column;justify-content:center;gap:10px">
            <div style="font-size:.85rem;color:var(--clr-text);line-height:1.7">
              ระบบแจ้ง <strong style="color:#dc2626">Account ถูกระงับ</strong>
              และ/หรือ <strong style="color:#dc2626">รหัสผ่านหมดอายุ</strong>
              พร้อมแสดงลิงก์ดำเนินการ
            </div>
            <!-- ปุ่มต่ออายุ -->
            <a href="services.php?cat=renew"
               style="display:flex;align-items:center;gap:8px;background:#fff7ed;
                      border:1px solid #fed7aa;border-radius:8px;padding:9px 12px;
                      text-decoration:none;font-size:.82rem;color:#9a3412;font-weight:600">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                   stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M23 4v6h-6"/>
                <path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"/>
              </svg>
              ต่ออายุ Account
            </a>
            <!-- ปุ่มรีเซตรหัสผ่าน -->
            <a href="services.php?cat=reset"
               style="display:flex;align-items:center;gap:8px;background:#fef2f2;
                      border:1px solid #fecaca;border-radius:8px;padding:9px 12px;
                      text-decoration:none;font-size:.82rem;color:#991b1b;font-weight:600">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                   stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
              </svg>
              รีเซตรหัสผ่าน
            </a>
          </div>
        </div>
      </div>

      <!-- ───── ความหมายสถานะสรุป ───── -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;
                  color:var(--clr-text-muted);margin-bottom:10px">สรุปความหมายของแต่ละสถานะ</div>
      <div style="display:flex;flex-direction:column;gap:8px;margin-bottom:20px">
        <div style="display:flex;gap:12px;align-items:center;background:var(--clr-bg);
                    border-radius:10px;padding:11px 14px">
          <div style="width:11px;height:11px;border-radius:50%;background:#22c55e;flex-shrink:0"></div>
          <div>
            <span style="font-weight:600;font-size:.87rem">ใช้งานได้ปกติ</span>
            <span style="font-size:.8rem;color:var(--clr-text-muted);margin-left:8px">บัญชียังมีอายุและรหัสผ่านยังไม่หมด</span>
          </div>
        </div>
        <div style="display:flex;gap:12px;align-items:center;background:var(--clr-bg);
                    border-radius:10px;padding:11px 14px">
          <div style="width:11px;height:11px;border-radius:50%;background:#f59e0b;flex-shrink:0"></div>
          <div>
            <span style="font-weight:600;font-size:.87rem">ใกล้หมดอายุ</span>
            <span style="font-size:.8rem;color:var(--clr-text-muted);margin-left:8px">ควรดำเนินการก่อนบัญชีถูกระงับ</span>
          </div>
        </div>
        <div style="display:flex;gap:12px;align-items:center;background:var(--clr-bg);
                    border-radius:10px;padding:11px 14px">
          <div style="width:11px;height:11px;border-radius:50%;background:#ef4444;flex-shrink:0"></div>
          <div>
            <span style="font-weight:600;font-size:.87rem">หมดอายุ / ถูกระงับ</span>
            <span style="font-size:.8rem;color:var(--clr-text-muted);margin-left:8px">ต้องต่ออายุหรือรีเซตรหัสผ่านก่อนใช้งาน</span>
          </div>
        </div>
      </div>

      <!-- ───── ลิงก์ดำเนินการ ───── -->
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px">
        <a href="services.php?cat=renew"
           style="text-decoration:none;display:flex;gap:10px;align-items:center;
                  background:linear-gradient(135deg,#166534,#22c55e);
                  border-radius:10px;padding:13px 16px">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white"
               stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M23 4v6h-6"/>
            <path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"/>
          </svg>
          <div>
            <div style="font-weight:700;font-size:.87rem;color:white">ต่ออายุ Account</div>
            <div style="font-size:.73rem;color:rgba(255,255,255,.8);margin-top:1px">ไปที่หน้าต่ออายุ</div>
          </div>
        </a>
        <a href="services.php?cat=reset"
           style="text-decoration:none;display:flex;gap:10px;align-items:center;
                  background:linear-gradient(135deg,#1e40af,#3b82f6);
                  border-radius:10px;padding:13px 16px">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white"
               stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
          </svg>
          <div>
            <div style="font-weight:700;font-size:.87rem;color:white">รีเซตรหัสผ่าน</div>
            <div style="font-size:.73rem;color:rgba(255,255,255,.8);margin-top:1px">ไปที่หน้ารีเซต</div>
          </div>
        </a>
      </div>

      <!-- ───── ติดต่อสอบถาม ───── -->
      <div style="margin-top:20px;padding-top:16px;border-top:1px solid var(--clr-border)">
        <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;
                    color:var(--clr-text-muted);margin-bottom:10px">ติดต่อสอบถาม</div>
        <div style="display:flex;flex-wrap:wrap;gap:10px;align-items:center">

          <!-- Email -->
          <a href="mailto:noc@dhammakaya.center"
             style="display:inline-flex;align-items:center;gap:8px;
                    background:var(--clr-bg);border:1px solid var(--clr-border);
                    color:var(--clr-text);padding:10px 18px;border-radius:8px;
                    font-size:.87rem;font-weight:600;text-decoration:none">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
              <polyline points="22,6 12,13 2,6"/>
            </svg>
            noc@dhammakaya.center
          </a>

          <!-- Line it4141 -->
          <a href="https://line.me/ti/p/~it4141" target="_blank"
             style="display:inline-flex;align-items:center;gap:8px;
                    background:#06C755;border:1px solid #05a847;
                    color:white;padding:10px 18px;border-radius:8px;
                    font-size:.87rem;font-weight:600;text-decoration:none">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="white">
              <path d="M19.365 9.863c.349 0 .63.285.63.631 0 .345-.281.63-.63.63H17.61v1.125h1.755
                       c.349 0 .63.283.63.63 0 .344-.281.629-.63.629h-2.386c-.345 0-.627-.285-.627-.629V8.108
                       c0-.345.282-.63.63-.63h2.386c.346 0 .627.285.627.63 0 .349-.281.63-.63.63H17.61v1.125h1.755z
                       M14.271 12.629c0 .27-.174.51-.432.594a.627.627 0 0 1-.695-.232l-2.386-3.239v2.877
                       c0 .344-.283.629-.627.629-.35 0-.631-.285-.631-.629V8.108c0-.27.173-.51.43-.594
                       a.63.63 0 0 1 .697.233l2.386 3.239V8.108c0-.345.282-.63.63-.63.346 0 .628.285.628.63v4.521z
                       M9.818 12.629c0 .344-.282.629-.63.629-.346 0-.628-.285-.628-.629V8.108
                       c0-.345.282-.63.628-.63.348 0 .63.285.63.63v4.521z
                       M7.576 12.629H5.189c-.344 0-.627-.285-.627-.629V8.108c0-.345.283-.63.63-.63
                       .345 0 .627.285.627.63v3.891h1.755c.349 0 .63.283.63.63 0 .344-.281.629-.628.629z
                       M22 10.732C22 5.442 17.073 1 11 1S0 5.442 0 10.732c0 4.766 4.168 8.76 9.8 9.516
                       .382.083.902.254 1.033.582.12.3.078.769.038 1.073l-.164 1.003
                       c-.045.3-.24 1.178 1.048.642 1.286-.537 6.956-4.143 9.489-7.094
                       C21.392 14.375 22 12.618 22 10.732z"/>
            </svg>
            Line: it4141
          </a>

          <!-- Line it4141-2 -->
          <a href="https://line.me/ti/p/~it4141-2" target="_blank"
             style="display:inline-flex;align-items:center;gap:8px;
                    background:#06C755;border:1px solid #05a847;
                    color:white;padding:10px 18px;border-radius:8px;
                    font-size:.87rem;font-weight:600;text-decoration:none">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="white">
              <path d="M19.365 9.863c.349 0 .63.285.63.631 0 .345-.281.63-.63.63H17.61v1.125h1.755
                       c.349 0 .63.283.63.63 0 .344-.281.629-.63.629h-2.386c-.345 0-.627-.285-.627-.629V8.108
                       c0-.345.282-.63.63-.63h2.386c.346 0 .627.285.627.63 0 .349-.281.63-.63.63H17.61v1.125h1.755z
                       M14.271 12.629c0 .27-.174.51-.432.594a.627.627 0 0 1-.695-.232l-2.386-3.239v2.877
                       c0 .344-.283.629-.627.629-.35 0-.631-.285-.631-.629V8.108c0-.27.173-.51.43-.594
                       a.63.63 0 0 1 .697.233l2.386 3.239V8.108c0-.345.282-.63.63-.63.346 0 .628.285.628.63v4.521z
                       M9.818 12.629c0 .344-.282.629-.63.629-.346 0-.628-.285-.628-.629V8.108
                       c0-.345.282-.63.628-.63.348 0 .63.285.63.63v4.521z
                       M7.576 12.629H5.189c-.344 0-.627-.285-.627-.629V8.108c0-.345.283-.63.63-.63
                       .345 0 .627.285.627.63v3.891h1.755c.349 0 .63.283.63.63 0 .344-.281.629-.628.629z
                       M22 10.732C22 5.442 17.073 1 11 1S0 5.442 0 10.732c0 4.766 4.168 8.76 9.8 9.516
                       .382.083.902.254 1.033.582.12.3.078.769.038 1.073l-.164 1.003
                       c-.045.3-.24 1.178 1.048.642 1.286-.537 6.956-4.143 9.489-7.094
                       C21.392 14.375 22 12.618 22 10.732z"/>
            </svg>
            Line: it4141-2
          </a>

        </div>
      </div>

    ',
  ],

  // รีเซทรหัสผ่าน
  [
    'cat'   => 'reset',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>',
    'title' => 'รีเซทรหัสผ่าน',
    'desc'  => 'ขอรีเซทรหัสผ่านกรณีลืมรหัสผ่านหรือรหัสผ่านหมดอายุ',
    'extra_html' => '

      <!-- ───── ปุ่มลิงก์ไประบบรีเซท ───── -->
      <a href="https://fdnet.dhammakaya.network/new_domain/index.php" target="_blank"
         style="display:flex;align-items:center;justify-content:space-between;
                background:linear-gradient(135deg,#1e40af 0%,#6366f1 100%);
                color:white;border-radius:14px;padding:16px 22px;text-decoration:none;
                margin-bottom:24px;box-shadow:0 4px 15px rgba(99,102,241,.3)">
        <div style="display:flex;align-items:center;gap:12px">
          <div style="width:40px;height:40px;background:rgba(255,255,255,.2);border-radius:10px;
                      display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round">
              <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
              <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
            </svg>
          </div>
          <div>
            <div style="font-weight:700;font-size:.95rem">เปิดระบบรีเซทรหัสผ่าน</div>
            <div style="font-size:.78rem;opacity:.85;margin-top:2px">fdnet.dhammakaya.network/new_domain/index.php</div>
          </div>
        </div>
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5"
             stroke-linecap="round" stroke-linejoin="round">
          <line x1="5" y1="12" x2="19" y2="12"/>
          <polyline points="12 5 19 12 12 19"/>
        </svg>
      </a>

      <!-- ───── ขั้นตอนการใช้งาน ───── -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;
                  color:var(--clr-text-muted);margin-bottom:14px">ขั้นตอนการรีเซทรหัสผ่าน</div>

      <!-- Step 1 -->
      <div style="border:1px solid var(--clr-border);border-radius:14px;overflow:hidden;margin-bottom:12px">
        <div style="background:var(--clr-primary-pale);padding:10px 16px;display:flex;align-items:center;
                    gap:10px;border-bottom:1px solid var(--clr-border)">
          <div style="width:24px;height:24px;background:var(--clr-primary);border-radius:50%;flex-shrink:0;
                      display:flex;align-items:center;justify-content:center;
                      color:white;font-size:.72rem;font-weight:700">1</div>
          <span style="font-weight:600;font-size:.9rem;color:var(--clr-primary-dark)">
            กรอก Username แล้วกด "ขอรีเซ็ตรหัสผ่าน"
          </span>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:0">
          <div style="padding:12px;border-right:1px solid var(--clr-border)">
            <img src="../assets/images/reset_step1.png"
                 alt="หน้าจอกรอก Username เพื่อรีเซทรหัสผ่าน"
                 style="width:100%;border-radius:8px;display:block"
                 onerror="this.style.display=\'none\';this.nextElementSibling.style.display=\'flex\'">
            <div style="display:none;background:#f0f4ff;border-radius:8px;padding:20px;min-height:80px;
                        flex-direction:column;align-items:center;justify-content:center;
                        gap:4px;color:#94a3b8;font-size:.75rem">
              reset_step1.png
            </div>
          </div>
          <div style="padding:16px;display:flex;flex-direction:column;justify-content:center;gap:8px;
                      font-size:.84rem;color:var(--clr-text);line-height:1.7">
            <div style="display:flex;gap:8px">
              <span style="color:var(--clr-primary);font-weight:700;flex-shrink:0">•</span>
              <span>พิมพ์ <strong>Username หน้าแดง</strong> ในช่อง</span>
            </div>
            <div style="display:flex;gap:8px">
              <span style="color:var(--clr-primary);font-weight:700;flex-shrink:0">•</span>
              <span>ทำรายการได้สูงสุด <strong>5 ครั้ง</strong>ต่อนาที</span>
            </div>
            <div style="display:flex;gap:8px">
              <span style="color:var(--clr-primary);font-weight:700;flex-shrink:0">•</span>
              <span>กดปุ่ม <strong>"ขอรีเซ็ตรหัสผ่าน"</strong></span>
            </div>
          </div>
        </div>
      </div>

      <!-- Step 2 -->
      <div style="border:1px solid var(--clr-border);border-radius:14px;overflow:hidden;margin-bottom:12px">
        <div style="background:var(--clr-primary-pale);padding:10px 16px;display:flex;align-items:center;
                    gap:10px;border-bottom:1px solid var(--clr-border)">
          <div style="width:24px;height:24px;background:var(--clr-primary);border-radius:50%;flex-shrink:0;
                      display:flex;align-items:center;justify-content:center;
                      color:white;font-size:.72rem;font-weight:700">2</div>
          <span style="font-weight:600;font-size:.9rem;color:var(--clr-primary-dark)">
            เปิด Email แล้วคัดลอกรหัส OTP 6 หลัก
          </span>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:0">
          <div style="padding:12px;border-right:1px solid var(--clr-border)">
            <img src="../assets/images/reset_email_otp.png"
                 alt="Email OTP รีเซทรหัสผ่าน"
                 style="width:100%;border-radius:8px;display:block"
                 onerror="this.style.display=\'none\';this.nextElementSibling.style.display=\'flex\'">
            <div style="display:none;background:#f0f4ff;border-radius:8px;padding:20px;min-height:80px;
                        flex-direction:column;align-items:center;justify-content:center;
                        gap:4px;color:#94a3b8;font-size:.75rem">
              reset_email_otp.png
            </div>
          </div>
          <div style="padding:16px;display:flex;flex-direction:column;justify-content:center;gap:8px;
                      font-size:.84rem;color:var(--clr-text);line-height:1.7">
            <div style="display:flex;gap:8px">
              <span style="color:var(--clr-primary);font-weight:700;flex-shrink:0">•</span>
              <span>ระบบส่ง Email หัวข้อ <strong>"แจ้งตั้งค่ารหัสผ่านใหม่ (AD Reset)"</strong></span>
            </div>
            <div style="display:flex;gap:8px">
              <span style="color:var(--clr-primary);font-weight:700;flex-shrink:0">•</span>
              <span>จาก <strong>fdnet4141@dhammakaya.center</strong></span>
            </div>
            <div style="display:flex;gap:8px">
              <span style="color:var(--clr-primary);font-weight:700;flex-shrink:0">•</span>
              <span>คัดลอก <strong>รหัส 6 หลัก</strong> ที่แสดงในเมล</span>
            </div>
            <div style="background:#fef3c7;border:1px solid #fde68a;border-radius:8px;
                        padding:8px 10px;font-size:.79rem;color:#92400e">
              ⏱️ รหัสมีอายุ <strong>30 นาที</strong> เท่านั้น
            </div>
          </div>
        </div>
      </div>

      <!-- Step 3 -->
      <div style="border:1px solid var(--clr-border);border-radius:14px;overflow:hidden;margin-bottom:12px">
        <div style="background:var(--clr-primary-pale);padding:10px 16px;display:flex;align-items:center;
                    gap:10px;border-bottom:1px solid var(--clr-border)">
          <div style="width:24px;height:24px;background:var(--clr-primary);border-radius:50%;flex-shrink:0;
                      display:flex;align-items:center;justify-content:center;
                      color:white;font-size:.72rem;font-weight:700">3</div>
          <span style="font-weight:600;font-size:.9rem;color:var(--clr-primary-dark)">
            กรอกรหัส OTP และตั้งรหัสผ่านใหม่
          </span>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:0">
          <div style="padding:12px;border-right:1px solid var(--clr-border)">
            <img src="../assets/images/reset_step3.png"
                 alt="หน้าจอกรอก OTP และรหัสผ่านใหม่"
                 style="width:100%;border-radius:8px;display:block"
                 onerror="this.style.display=\'none\';this.nextElementSibling.style.display=\'flex\'">
            <div style="display:none;background:#f0f4ff;border-radius:8px;padding:20px;min-height:80px;
                        flex-direction:column;align-items:center;justify-content:center;
                        gap:4px;color:#94a3b8;font-size:.75rem">
              reset_step3.png
            </div>
          </div>
          <div style="padding:16px;display:flex;flex-direction:column;justify-content:center;gap:8px;
                      font-size:.84rem;color:var(--clr-text);line-height:1.7">
            <div style="display:flex;gap:8px">
              <span style="color:var(--clr-primary);font-weight:700;flex-shrink:0">•</span>
              <span>กรอก <strong>รหัสยืนยัน 6 หลัก</strong> จาก Email</span>
            </div>
            <div style="display:flex;gap:8px">
              <span style="color:var(--clr-primary);font-weight:700;flex-shrink:0">•</span>
              <span>ตั้ง <strong>รหัสผ่านใหม่</strong> ตามเงื่อนไข</span>
            </div>
            <div style="display:flex;gap:8px">
              <span style="color:var(--clr-primary);font-weight:700;flex-shrink:0">•</span>
              <span>กรอก <strong>ยืนยันรหัสผ่านใหม่</strong> อีกครั้ง</span>
            </div>
            <div style="display:flex;gap:8px">
              <span style="color:var(--clr-primary);font-weight:700;flex-shrink:0">•</span>
              <span>กด <strong>"บันทึกรหัสผ่านใหม่"</strong></span>
            </div>
          </div>
        </div>
      </div>

      <!-- Step 4 สำเร็จ -->
      <div style="border:1px solid #bbf7d0;border-radius:14px;overflow:hidden;margin-bottom:24px">
        <div style="background:#f0fdf4;padding:10px 16px;display:flex;align-items:center;
                    gap:10px;border-bottom:1px solid #bbf7d0">
          <div style="width:24px;height:24px;background:#16a34a;border-radius:50%;flex-shrink:0;
                      display:flex;align-items:center;justify-content:center;
                      color:white;font-size:.72rem;font-weight:700">✓</div>
          <span style="font-weight:600;font-size:.9rem;color:#166534">เสร็จสิ้น — ส่งรหัสสำเร็จ</span>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:0">
          <div style="padding:12px;border-right:1px solid #bbf7d0">
            <img src="../assets/images/reset_success.png"
                 alt="หน้าจอส่งรหัสสำเร็จ"
                 style="width:100%;border-radius:8px;display:block"
                 onerror="this.style.display=\'none\';this.nextElementSibling.style.display=\'flex\'">
            <div style="display:none;background:#f0fdf4;border-radius:8px;padding:20px;min-height:80px;
                        flex-direction:column;align-items:center;justify-content:center;
                        gap:4px;color:#94a3b8;font-size:.75rem">
              reset_success.png
            </div>
          </div>
          <div style="padding:16px;display:flex;flex-direction:column;justify-content:center;gap:8px">
            <div style="background:#dcfce7;border-radius:10px;padding:12px 14px;
                        font-size:.84rem;color:#166534;line-height:1.7">
              ✅ ระบบส่งรหัสยืนยันและลิงก์ตั้งค่าใหม่ไปยัง Email ของท่านเรียบร้อยแล้ว
            </div>
            <div style="font-size:.82rem;color:var(--clr-text-muted);line-height:1.6">
              สามารถล็อกอินด้วยรหัสผ่านใหม่ได้ทันทีหลังบันทึกสำเร็จ
            </div>
          </div>
        </div>
      </div>

      <!-- ───── เงื่อนไขรหัสผ่านใหม่ ───── -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;
                  color:var(--clr-text-muted);margin-bottom:10px">เงื่อนไขรหัสผ่านใหม่</div>
      <div style="background:var(--clr-bg);border-radius:12px;padding:16px 18px;margin-bottom:20px;
                  display:grid;grid-template-columns:1fr 1fr;gap:8px;font-size:.85rem">
        <div style="display:flex;align-items:center;gap:8px">
          <span style="color:#22c55e;font-weight:700;font-size:1rem;flex-shrink:0">✔</span>
          <span>ยาว <strong>8 ตัวอักษร</strong>ขึ้นไป</span>
        </div>
        <div style="display:flex;align-items:center;gap:8px">
          <span style="color:#22c55e;font-weight:700;font-size:1rem;flex-shrink:0">✔</span>
          <span>มีตัวอักษร<strong>ภาษาอังกฤษ</strong></span>
        </div>
        <div style="display:flex;align-items:center;gap:8px">
          <span style="color:#22c55e;font-weight:700;font-size:1rem;flex-shrink:0">✔</span>
          <span>มี<strong>ตัวเลข</strong>อย่างน้อย 1 ตัว</span>
        </div>
        <div style="display:flex;align-items:center;gap:8px">
          <span style="color:#22c55e;font-weight:700;font-size:1rem;flex-shrink:0">✔</span>
          <span>มี<strong>อักขระพิเศษ</strong>อย่างน้อย 1 ตัว</span>
        </div>
        <div style="display:flex;align-items:center;gap:8px;grid-column:1/-1">
          <span style="color:#ef4444;font-weight:700;font-size:1rem;flex-shrink:0">✘</span>
          <span><strong>ห้ามใช้รหัสผ่านเดิม</strong>ซ้ำ</span>
        </div>
      </div>

      <!-- ตัวอย่างรหัสผ่าน -->
      <table style="width:100%;border-collapse:collapse;font-size:.85rem;margin-bottom:20px">
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
            <td style="padding:9px 14px;border:1px solid var(--clr-border);text-align:center;
                       color:#22c55e;font-weight:700">✔</td>
            <td style="padding:9px 14px;border:1px solid var(--clr-border)">ครบทุกเงื่อนไข</td>
          </tr>
          <tr style="background:var(--clr-bg)">
            <td style="padding:9px 14px;border:1px solid var(--clr-border);font-family:monospace">password123</td>
            <td style="padding:9px 14px;border:1px solid var(--clr-border);text-align:center;
                       color:#ef4444;font-weight:700">✘</td>
            <td style="padding:9px 14px;border:1px solid var(--clr-border)">ไม่มีอักขระพิเศษ</td>
          </tr>
        </tbody>
      </table>

      <!-- ───── ติดต่อสอบถาม ───── -->
      <div style="display:flex;flex-wrap:wrap;gap:10px;align-items:center">

        <!-- Email -->
        <a href="mailto:noc@dhammakaya.center"
           style="display:inline-flex;align-items:center;gap:8px;
                  background:var(--clr-bg);border:1px solid var(--clr-border);
                  color:var(--clr-text);padding:10px 18px;border-radius:8px;
                  font-size:.87rem;font-weight:600;text-decoration:none">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
               stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
            <polyline points="22,6 12,13 2,6"/>
          </svg>
          noc@dhammakaya.center
        </a>

        <!-- Line it4141 -->
        <a href="https://line.me/ti/p/~it4141" target="_blank"
           style="display:inline-flex;align-items:center;gap:8px;
                  background:#06C755;border:1px solid #05a847;
                  color:white;padding:10px 18px;border-radius:8px;
                  font-size:.87rem;font-weight:600;text-decoration:none">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="white">
            <path d="M19.365 9.863c.349 0 .63.285.63.631 0 .345-.281.63-.63.63H17.61v1.125h1.755
                     c.349 0 .63.283.63.63 0 .344-.281.629-.63.629h-2.386c-.345 0-.627-.285-.627-.629V8.108
                     c0-.345.282-.63.63-.63h2.386c.346 0 .627.285.627.63 0 .349-.281.63-.63.63H17.61v1.125h1.755z
                     M14.271 12.629c0 .27-.174.51-.432.594a.627.627 0 0 1-.695-.232l-2.386-3.239v2.877
                     c0 .344-.283.629-.627.629-.35 0-.631-.285-.631-.629V8.108c0-.27.173-.51.43-.594
                     a.63.63 0 0 1 .697.233l2.386 3.239V8.108c0-.345.282-.63.63-.63.346 0 .628.285.628.63v4.521z
                     M9.818 12.629c0 .344-.282.629-.63.629-.346 0-.628-.285-.628-.629V8.108
                     c0-.345.282-.63.628-.63.348 0 .63.285.63.63v4.521z
                     M7.576 12.629H5.189c-.344 0-.627-.285-.627-.629V8.108c0-.345.283-.63.63-.63
                     .345 0 .627.285.627.63v3.891h1.755c.349 0 .63.283.63.63 0 .344-.281.629-.628.629z
                     M22 10.732C22 5.442 17.073 1 11 1S0 5.442 0 10.732c0 4.766 4.168 8.76 9.8 9.516
                     .382.083.902.254 1.033.582.12.3.078.769.038 1.073l-.164 1.003
                     c-.045.3-.24 1.178 1.048.642 1.286-.537 6.956-4.143 9.489-7.094
                     C21.392 14.375 22 12.618 22 10.732z"/>
          </svg>
          Line: it4141
        </a>

        <!-- Line it4141-2 -->
        <a href="https://line.me/ti/p/~it4141-2" target="_blank"
           style="display:inline-flex;align-items:center;gap:8px;
                  background:#06C755;border:1px solid #05a847;
                  color:white;padding:10px 18px;border-radius:8px;
                  font-size:.87rem;font-weight:600;text-decoration:none">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="white">
            <path d="M19.365 9.863c.349 0 .63.285.63.631 0 .345-.281.63-.63.63H17.61v1.125h1.755
                     c.349 0 .63.283.63.63 0 .344-.281.629-.63.629h-2.386c-.345 0-.627-.285-.627-.629V8.108
                     c0-.345.282-.63.63-.63h2.386c.346 0 .627.285.627.63 0 .349-.281.63-.63.63H17.61v1.125h1.755z
                     M14.271 12.629c0 .27-.174.51-.432.594a.627.627 0 0 1-.695-.232l-2.386-3.239v2.877
                     c0 .344-.283.629-.627.629-.35 0-.631-.285-.631-.629V8.108c0-.27.173-.51.43-.594
                     a.63.63 0 0 1 .697.233l2.386 3.239V8.108c0-.345.282-.63.63-.63.346 0 .628.285.628.63v4.521z
                     M9.818 12.629c0 .344-.282.629-.63.629-.346 0-.628-.285-.628-.629V8.108
                     c0-.345.282-.63.628-.63.348 0 .63.285.63.63v4.521z
                     M7.576 12.629H5.189c-.344 0-.627-.285-.627-.629V8.108c0-.345.283-.63.63-.63
                     .345 0 .627.285.627.63v3.891h1.755c.349 0 .63.283.63.63 0 .344-.281.629-.628.629z
                     M22 10.732C22 5.442 17.073 1 11 1S0 5.442 0 10.732c0 4.766 4.168 8.76 9.8 9.516
                     .382.083.902.254 1.033.582.12.3.078.769.038 1.073l-.164 1.003
                     c-.045.3-.24 1.178 1.048.642 1.286-.537 6.956-4.143 9.489-7.094
                     C21.392 14.375 22 12.618 22 10.732z"/>
          </svg>
          Line: it4141-2
        </a>

      </div>

    ',
  ],

  // Join Domain
  [
    'cat'   => 'domain',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>',
    'title' => 'ขอ Join Domain',
    'desc'  => 'ขอ Computer Name เพื่อนำเครื่องเข้าสู่ระบบ Domain ขององค์กร',
    'extra_html' => '

      <!-- ───── คำอธิบาย ───── -->
      <p style="font-size:.93rem;line-height:1.85;color:var(--clr-text);margin-bottom:24px">
        การขอ <strong>Computer Name</strong> เพื่อ Join Domain คือการลงทะเบียนคอมพิวเตอร์เข้าสู่ระบบเครือข่ายส่วนกลางขององค์กร
        เมื่อดำเนินการสำเร็จแล้ว สามารถล็อกอินด้วย Account องค์กร เข้าถึง File Server
        และใช้งานระบบต่างๆ ได้โดยอัตโนมัติ
      </p>

      <!-- ───── ขั้นตอน ───── -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;
                  color:var(--clr-text-muted);margin-bottom:14px">ขั้นตอนการดำเนินการ</div>

      <!-- Step 1 -->
      <div style="display:flex;gap:16px;margin-bottom:16px">
        <div style="display:flex;flex-direction:column;align-items:center;gap:0;flex-shrink:0">
          <div style="width:36px;height:36px;background:var(--clr-primary);border-radius:50%;
                      display:flex;align-items:center;justify-content:center;
                      color:white;font-size:.8rem;font-weight:700;flex-shrink:0">1</div>
          <div style="width:2px;flex:1;background:var(--clr-border);margin-top:4px;min-height:40px"></div>
        </div>
        <div style="padding-bottom:20px;flex:1">
          <div style="font-weight:700;font-size:.93rem;color:var(--clr-text);margin-bottom:8px">
            ส่งอีเมลแจ้ง Username มาที่ IT
          </div>
          <div style="background:var(--clr-bg);border-radius:12px;padding:14px 16px;
                      font-size:.85rem;color:var(--clr-text);line-height:1.75;
                      border:1px solid var(--clr-border)">
            แจ้ง <strong>Username (Account หน้าแดง)</strong> ที่ต้องการขอ Computer Name
            พร้อมระบุ <strong>ชื่อ-สกุล</strong> และ <strong>หน่วยงาน</strong> มาที่
            <a href="mailto:noc@dhammakaya.center"
               style="color:var(--clr-primary);font-weight:600;text-decoration:none">
              noc@dhammakaya.center
            </a>
          </div>
          <!-- ปุ่ม Email -->
          <a href="mailto:noc@dhammakaya.center?subject=ขอ Computer Name เพื่อ Join Domain&body=Username (Account หน้าแดง): %0Aชื่อ-สกุล: %0Aหน่วยงาน: "
             style="display:inline-flex;align-items:center;gap:8px;margin-top:10px;
                    background:var(--clr-primary);color:white;border-radius:8px;
                    padding:9px 16px;font-size:.83rem;font-weight:600;text-decoration:none">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white"
                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
              <polyline points="22,6 12,13 2,6"/>
            </svg>
            คลิกส่งอีเมลได้เลย
          </a>
        </div>
      </div>

      <!-- Step 2 -->
      <div style="display:flex;gap:16px;margin-bottom:24px">
        <div style="display:flex;flex-direction:column;align-items:center;gap:0;flex-shrink:0">
          <div style="width:36px;height:36px;background:#16a34a;border-radius:50%;
                      display:flex;align-items:center;justify-content:center;
                      color:white;font-size:.8rem;font-weight:700;flex-shrink:0">2</div>
        </div>
        <div style="flex:1">
          <div style="font-weight:700;font-size:.93rem;color:var(--clr-text);margin-bottom:8px">
            รอรับ Computer Name ทาง Email
          </div>
          <div style="background:#f0fdf4;border:1px solid #bbf7d0;border-radius:12px;
                      padding:14px 16px;font-size:.85rem;color:#166534;line-height:1.75">
            เจ้าหน้าที่จะดำเนินการและ<strong>ส่ง Computer Name กลับไปทาง Email</strong>
            ที่ท่านแจ้งไว้ภายใน <strong>1 วันทำการ</strong>
          </div>
        </div>
      </div>

      <!-- ───── Divider ───── -->
      <div style="border-top:1px dashed var(--clr-border);margin-bottom:20px"></div>

      <!-- ───── ปุ่มคู่มือ Join Domain ───── -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;
                  color:var(--clr-text-muted);margin-bottom:12px">ขั้นตอนถัดไป</div>

      <a href="manual.php?cat=domain"
         style="display:flex;align-items:center;justify-content:space-between;
                background:var(--clr-bg);border:1px solid var(--clr-border);
                border-radius:14px;padding:16px 20px;text-decoration:none;
                transition:box-shadow .15s"
         onmouseover="this.style.boxShadow=\'0 4px 16px rgba(0,0,0,.1)\'"
         onmouseout="this.style.boxShadow=\'none\'">
        <div style="display:flex;align-items:center;gap:14px">
          <div style="width:44px;height:44px;background:var(--clr-primary-pale);border-radius:10px;
                      display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--clr-primary)"
                 stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
              <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
            </svg>
          </div>
          <div>
            <div style="font-weight:700;font-size:.92rem;color:var(--clr-text)">
              คู่มือการนำเครื่องเข้า Domain
            </div>
            <div style="font-size:.78rem;color:var(--clr-text-muted);margin-top:2px">
              ขั้นตอนการตั้งค่าหลังได้รับ Computer Name แล้ว
            </div>
          </div>
        </div>
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--clr-text-muted)"
             stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="9 18 15 12 9 6"/>
        </svg>
      </a>

    ',
  ],

  // ขอสิทธิ์เข้า Computer
  [
    'cat'   => 'access',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
    'title' => 'ขอสิทธิ์เข้า Computer',
    'desc'  => 'ขอเพิ่มสิทธิ์ Username ให้สามารถ Login เข้าคอมพิวเตอร์เครื่องที่ต้องการได้',
    'extra_html' => '

      <p style="font-size:.93rem;line-height:1.85;color:var(--clr-text);margin-bottom:24px">
        คอมพิวเตอร์แต่ละเครื่องในองค์กรกำหนดสิทธิ์ผู้ใช้งานไว้เฉพาะ
        หากต้องการ Login เข้าเครื่องที่ไม่ใช่เครื่องประจำของตนเอง
        จำเป็นต้องแจ้งขอเพิ่มสิทธิ์ก่อนทุกครั้ง
      </p>

      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;
                  color:var(--clr-text-muted);margin-bottom:14px">ขั้นตอนการดำเนินการ</div>

      <!-- Step 1 -->
      <div style="display:flex;gap:16px;margin-bottom:16px">
        <div style="display:flex;flex-direction:column;align-items:center;flex-shrink:0">
          <div style="width:36px;height:36px;background:var(--clr-primary);border-radius:50%;
                      display:flex;align-items:center;justify-content:center;
                      color:white;font-size:.8rem;font-weight:700">1</div>
          <div style="width:2px;flex:1;background:var(--clr-border);margin-top:4px;min-height:40px"></div>
        </div>
        <div style="padding-bottom:20px;flex:1">
          <div style="font-weight:700;font-size:.93rem;color:var(--clr-text);margin-bottom:8px">
            ส่งอีเมลแจ้ง Username และ Computer Name
          </div>
          <div style="background:var(--clr-bg);border-radius:12px;padding:14px 16px;
                      font-size:.85rem;color:var(--clr-text);line-height:1.8;
                      border:1px solid var(--clr-border);display:flex;flex-direction:column;gap:6px">
            <div style="display:flex;gap:8px">
              <span style="color:var(--clr-primary);font-weight:700;flex-shrink:0">•</span>
              <span><strong>Username</strong> (Account หน้าแดง) ที่ต้องการขอสิทธิ์</span>
            </div>
            <div style="display:flex;gap:8px">
              <span style="color:var(--clr-primary);font-weight:700;flex-shrink:0">•</span>
              <span><strong>Computer Name</strong> ของเครื่องที่ต้องการ Login</span>
            </div>
            <div style="margin-top:4px;padding-top:10px;border-top:1px dashed var(--clr-border);
                        font-size:.82rem;color:var(--clr-text-muted)">
              ส่งมาที่
              <a href="mailto:noc@dhammakaya.center"
                 style="color:var(--clr-primary);font-weight:600;text-decoration:none">
                noc@dhammakaya.center
              </a>
            </div>
          </div>
          <a href="mailto:noc@dhammakaya.center?subject=ขอเพิ่มสิทธิ์ Username เข้า Computer&body=Username (Account หน้าแดง): %0AComputer Name: %0Aชื่อ-สกุล: %0Aหน่วยงาน: "
             style="display:inline-flex;align-items:center;gap:8px;margin-top:10px;
                    background:var(--clr-primary);color:white;border-radius:8px;
                    padding:9px 16px;font-size:.83rem;font-weight:600;text-decoration:none">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white"
                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
              <polyline points="22,6 12,13 2,6"/>
            </svg>
            คลิกส่งอีเมลได้เลย
          </a>
        </div>
      </div>

      <!-- Step 2 -->
      <div style="display:flex;gap:16px">
        <div style="flex-shrink:0">
          <div style="width:36px;height:36px;background:#16a34a;border-radius:50%;
                      display:flex;align-items:center;justify-content:center;
                      color:white;font-size:.8rem;font-weight:700">2</div>
        </div>
        <div style="flex:1">
          <div style="font-weight:700;font-size:.93rem;color:var(--clr-text);margin-bottom:8px">
            รอรับการแจ้งกลับทาง Email
          </div>
          <div style="background:#f0fdf4;border:1px solid #bbf7d0;border-radius:12px;
                      padding:14px 16px;font-size:.85rem;color:#166534;line-height:1.75">
            เจ้าหน้าที่จะดำเนินการเพิ่มสิทธิ์และ<strong>แจ้งผลกลับทาง Email</strong>
            ภายใน <strong>1 วันทำการ</strong>
          </div>
        </div>
      </div>

    ',
  ],

  // ขอเปลี่ยน Email
  [
    'cat'   => 'email',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>',
    'title' => 'ขอเปลี่ยน Email',
    'desc'  => 'ขอเปลี่ยนอีเมลที่ผูกกับ Account หน้าแดง เพื่อใช้รีเซตรหัสผ่านในอนาคต',
    'extra_html' => '

      <p style="font-size:.93rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        Email ที่ผูกกับ Account ใช้สำหรับ<strong>รีเซตรหัสผ่าน</strong>และรับการแจ้งเตือนจากระบบ
        หากต้องการเปลี่ยนเป็น Email ใหม่ สามารถทำได้ <strong>2 วิธี</strong>
      </p>

      <!-- 2 ช่องทาง -->
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:24px">
        <div style="background:#eff6ff;border:2px solid #bfdbfe;border-radius:14px;padding:16px">
          <div style="font-size:1.4rem;margin-bottom:8px">🏢</div>
          <div style="font-weight:700;font-size:.9rem;color:#1e40af;margin-bottom:4px">มาด้วยตนเอง</div>
          <div style="font-size:.8rem;color:#1e3a8a;line-height:1.65">
            กองบริหารสารสนเทศ<br>
            อาคาร 100 ปีคุณยายฯ ตึก O ชั้น 11<br>
            โทร <strong>4141</strong><br>
            <span style="color:#3b82f6">นำบัตรประชาชนหรือบัตรเจ้าหน้าที่มาด้วย</span>
          </div>
        </div>
        <div style="background:#f0fdf4;border:2px solid #bbf7d0;border-radius:14px;padding:16px">
          <div style="font-size:1.4rem;margin-bottom:8px">🌐</div>
          <div style="font-weight:700;font-size:.9rem;color:#166534;margin-bottom:4px">ผ่านเว็บออนไลน์</div>
          <div style="font-size:.8rem;color:#14532d;line-height:1.65">
            กรอกฟอร์มต่ออายุ Account<br>
            ระบุ Email ใหม่ในช่องที่กำหนด<br>
            <span style="color:#16a34a">ต้องรออนุมัติจากหัวหน้า</span>
          </div>
        </div>
      </div>

      <!-- วิธีที่ 2 ขั้นตอนออนไลน์ -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;
                  color:var(--clr-text-muted);margin-bottom:12px">ขั้นตอน — วิธีออนไลน์</div>

      <div style="border:1px solid var(--clr-border);border-radius:14px;overflow:hidden;margin-bottom:20px">
        <!-- Step 2.1 -->
        <div style="display:flex;gap:14px;padding:14px 16px;border-bottom:1px solid var(--clr-border)">
          <div style="width:26px;height:26px;background:var(--clr-primary-pale);border-radius:50%;flex-shrink:0;
                      display:flex;align-items:center;justify-content:center;
                      font-size:.72rem;font-weight:700;color:var(--clr-primary)">1</div>
          <div style="font-size:.85rem;color:var(--clr-text);line-height:1.7;flex:1">
            กรอกข้อมูลผ่านฟอร์มต่ออายุ Account —
            ใส่ <strong>Email ใหม่</strong> ที่ต้องการในช่อง Email Address
            <a href="https://fdnet.dhammakaya.network/register_renew.php" target="_blank"
               style="display:inline-flex;align-items:center;gap:5px;margin-left:6px;
                      background:var(--clr-primary);color:white;border-radius:6px;
                      padding:3px 10px;font-size:.76rem;font-weight:600;text-decoration:none;
                      vertical-align:middle">
              เปิดฟอร์ม →
            </a>
          </div>
        </div>
        <!-- Step 2.2 -->
        <div style="display:flex;gap:14px;padding:14px 16px;border-bottom:1px solid var(--clr-border);
                    background:var(--clr-bg)">
          <div style="width:26px;height:26px;background:var(--clr-primary-pale);border-radius:50%;flex-shrink:0;
                      display:flex;align-items:center;justify-content:center;
                      font-size:.72rem;font-weight:700;color:var(--clr-primary)">2</div>
          <div style="font-size:.85rem;color:var(--clr-text);line-height:1.7">
            ในช่อง <strong>"ใช้งานเกี่ยวกับ"</strong> ให้ระบุว่า
            <span style="background:#fef3c7;color:#92400e;padding:2px 8px;border-radius:4px;
                         font-weight:600;font-size:.82rem">"ขอเปลี่ยน Email ใหม่"</span>
          </div>
        </div>
        <!-- Step 2.3 -->
        <div style="display:flex;gap:14px;padding:14px 16px;border-bottom:1px solid var(--clr-border)">
          <div style="width:26px;height:26px;background:var(--clr-primary-pale);border-radius:50%;flex-shrink:0;
                      display:flex;align-items:center;justify-content:center;
                      font-size:.72rem;font-weight:700;color:var(--clr-primary)">3</div>
          <div style="font-size:.85rem;color:var(--clr-text);line-height:1.7">
            รอ <strong>หัวหน้ากอง / เจ้าอาวาส / หัวหน้าศูนย์</strong> ที่ท่านสังกัดอนุมัติ
          </div>
        </div>
        <!-- Step 2.4 -->
        <div style="display:flex;gap:14px;padding:14px 16px;background:#f0fdf4">
          <div style="width:26px;height:26px;background:#16a34a;border-radius:50%;flex-shrink:0;
                      display:flex;align-items:center;justify-content:center;
                      color:white;font-size:.72rem;font-weight:700">✓</div>
          <div style="font-size:.85rem;color:#166534;line-height:1.7">
            เจ้าหน้าที่ดำเนินการเปลี่ยน Email ให้และ<strong>แจ้งผลกลับทาง Email</strong>
          </div>
        </div>
      </div>

    ',
  ],

  // ขอเพิ่มปริมาณอินเตอร์เน็ต
  [
    'cat'   => 'internet',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.55a11 11 0 0 1 14.08 0"/><path d="M1.42 9a16 16 0 0 1 21.16 0"/><path d="M8.53 16.11a6 6 0 0 1 6.95 0"/><circle cx="12" cy="20" r="1" fill="currentColor"/></svg>',
    'title' => 'ขอปรับปริมาณการใช้อินเทอร์เน็ต',
    'desc'  => 'ขอปรับโควต้าหรือ Bandwidth อินเทอร์เน็ต โดยต้องได้รับการอนุมัติจากหัวหน้า',
    'extra_html' => '

      <p style="font-size:.93rem;line-height:1.85;color:var(--clr-text);margin-bottom:24px">
        ปริมาณการใช้อินเทอร์เน็ตของแต่ละบุคลากรจะถูกกำหนดโดย
        <strong>หัวหน้ากอง / เจ้าอาวาส / หัวหน้าศูนย์</strong> ที่ท่านสังกัด
        หากต้องการปรับเพิ่ม ให้ดำเนินการตามขั้นตอนด้านล่าง
      </p>

      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;
                  color:var(--clr-text-muted);margin-bottom:12px">ขั้นตอนการดำเนินการ</div>

      <div style="border:1px solid var(--clr-border);border-radius:14px;overflow:hidden;margin-bottom:20px">

        <!-- Step 1 -->
        <div style="display:flex;gap:14px;padding:14px 16px;border-bottom:1px solid var(--clr-border)">
          <div style="width:26px;height:26px;background:var(--clr-primary-pale);border-radius:50%;flex-shrink:0;
                      display:flex;align-items:center;justify-content:center;
                      font-size:.72rem;font-weight:700;color:var(--clr-primary)">1</div>
          <div style="font-size:.85rem;color:var(--clr-text);line-height:1.7;flex:1">
            กรอกข้อมูลผ่านฟอร์มต่ออายุ Account
            <a href="https://fdnet.dhammakaya.network/register_renew.php" target="_blank"
               style="display:inline-flex;align-items:center;gap:5px;margin-left:6px;
                      background:var(--clr-primary);color:white;border-radius:6px;
                      padding:3px 10px;font-size:.76rem;font-weight:600;text-decoration:none;
                      vertical-align:middle">
              เปิดฟอร์ม →
            </a>
          </div>
        </div>

        <!-- Step 2 -->
        <div style="display:flex;gap:14px;padding:14px 16px;border-bottom:1px solid var(--clr-border);
                    background:var(--clr-bg)">
          <div style="width:26px;height:26px;background:var(--clr-primary-pale);border-radius:50%;flex-shrink:0;
                      display:flex;align-items:center;justify-content:center;
                      font-size:.72rem;font-weight:700;color:var(--clr-primary)">2</div>
          <div style="font-size:.85rem;color:var(--clr-text);line-height:1.7">
            ในช่อง <strong>"ใช้งานเกี่ยวกับ"</strong> ให้ระบุว่า
            <span style="background:#fef3c7;color:#92400e;padding:2px 8px;border-radius:4px;
                         font-weight:600;font-size:.82rem">"ขอปรับปริมาณการใช้อินเทอร์เน็ต"</span>
          </div>
        </div>

        <!-- Step 3 -->
        <div style="display:flex;gap:14px;padding:14px 16px;border-bottom:1px solid var(--clr-border)">
          <div style="width:26px;height:26px;background:var(--clr-primary-pale);border-radius:50%;flex-shrink:0;
                      display:flex;align-items:center;justify-content:center;
                      font-size:.72rem;font-weight:700;color:var(--clr-primary)">3</div>
          <div style="font-size:.85rem;color:var(--clr-text);line-height:1.7">
            รอ <strong>หัวหน้ากอง / เจ้าอาวาส / หัวหน้าศูนย์</strong> ที่ท่านสังกัดอนุมัติ
            <br>
            <span style="font-size:.8rem;color:var(--clr-text-muted)">
              หัวหน้าจะเป็นผู้ระบุปริมาณการใช้งานอินเทอร์เน็ตที่อนุมัติให้
            </span>
          </div>
        </div>

        <!-- Step 4 -->
        <div style="display:flex;gap:14px;padding:14px 16px;border-bottom:1px solid var(--clr-border);
                    background:var(--clr-bg)">
          <div style="width:26px;height:26px;background:var(--clr-primary-pale);border-radius:50%;flex-shrink:0;
                      display:flex;align-items:center;justify-content:center;
                      font-size:.72rem;font-weight:700;color:var(--clr-primary)">4</div>
          <div style="font-size:.85rem;color:var(--clr-text);line-height:1.7">
            รอเจ้าหน้าที่ดำเนินการปรับปริมาณอินเทอร์เน็ตให้
            และ<strong>แจ้งผลกลับทาง Email</strong>
          </div>
        </div>

        <!-- หมายเหตุ -->
        <div style="display:flex;gap:14px;padding:14px 16px;background:#fefce8">
          <div style="width:26px;height:26px;flex-shrink:0;
                      display:flex;align-items:center;justify-content:center;font-size:1rem">⚠️</div>
          <div style="font-size:.83rem;color:#854d0e;line-height:1.7">
            <strong>หมายเหตุ:</strong> ปริมาณอินเทอร์เน็ตที่ได้รับขึ้นอยู่กับดุลยพินิจของ
            หัวหน้ากอง / เจ้าอาวาส / หัวหน้าศูนย์ที่ท่านสังกัดเป็นหลัก
          </div>
        </div>

      </div>

    ',
  ],

  // เช็คโคต้าอินเตอร์เน็ตที่ใช้
  [
    'cat'   => 'quota',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.55a11 11 0 0 1 14.08 0"/><path d="M1.42 9a16 16 0 0 1 21.16 0"/><path d="M8.53 16.11a6 6 0 0 1 6.95 0"/><circle cx="12" cy="20" r="1" fill="currentColor"/></svg>',
    'title' => 'เช็กโควต้าอินเทอร์เน็ตที่ใช้',
    'desc'  => 'ตรวจสอบปริมาณอินเทอร์เน็ตที่ใช้ไปในแต่ละวัน ผ่าน Sophos User Portal',
    'extra_html' => '

      <!-- ───── ปุ่มเปิดระบบ ───── -->
      <a href="https://cyberoam.dhammakaya.network:4443/userportal/webpages/myaccount/login.jsp" target="_blank"
         style="display:flex;align-items:center;justify-content:space-between;
                background:linear-gradient(135deg,#1e3a8a 0%,#2563eb 100%);
                color:white;border-radius:14px;padding:16px 22px;text-decoration:none;
                margin-bottom:24px;box-shadow:0 4px 15px rgba(37,99,235,.35)">
        <div style="display:flex;align-items:center;gap:12px">
          <div style="width:40px;height:40px;background:rgba(255,255,255,.2);border-radius:10px;
                      display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round">
              <path d="M5 12.55a11 11 0 0 1 14.08 0"/>
              <path d="M1.42 9a16 16 0 0 1 21.16 0"/>
              <path d="M8.53 16.11a6 6 0 0 1 6.95 0"/>
              <circle cx="12" cy="20" r="1" fill="white"/>
            </svg>
          </div>
          <div>
            <div style="font-weight:700;font-size:.95rem">เปิด Sophos User Portal</div>
            <div style="font-size:.78rem;opacity:.85;margin-top:2px">cyberoam.dhammakaya.network:4443</div>
          </div>
        </div>
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5"
             stroke-linecap="round" stroke-linejoin="round">
          <line x1="5" y1="12" x2="19" y2="12"/>
          <polyline points="12 5 19 12 12 19"/>
        </svg>
      </a>

      <!-- ───── คำอธิบาย ───── -->
      <p style="font-size:.93rem;line-height:1.85;color:var(--clr-text);margin-bottom:24px">
        ระบบ <strong>Sophos User Portal</strong> ให้ท่านตรวจสอบปริมาณอินเทอร์เน็ตที่ใช้ไปได้ด้วยตนเอง
        ทั้งยอดรวมรายเดือน ยอดรายวัน Upload/Download และเวลาที่ใช้งาน
      </p>

      <!-- ───── ขั้นตอน ───── -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;
                  color:var(--clr-text-muted);margin-bottom:14px">ขั้นตอนการเช็กโควต้าอินเทอร์เน็ต</div>

      <!-- Step 1 -->
      <div style="border:1px solid var(--clr-border);border-radius:14px;overflow:hidden;margin-bottom:12px">
        <div style="background:var(--clr-primary-pale);padding:10px 16px;display:flex;
                    align-items:center;gap:10px;border-bottom:1px solid var(--clr-border)">
          <div style="width:24px;height:24px;background:var(--clr-primary);border-radius:50%;
                      display:flex;align-items:center;justify-content:center;
                      color:white;font-size:.72rem;font-weight:700;flex-shrink:0">1</div>
          <span style="font-weight:600;font-size:.9rem;color:var(--clr-primary-dark)">
            เข้าสู่ระบบด้วย Username และ Password หน้าแดง
          </span>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:0">
          <div style="padding:12px;border-right:1px solid var(--clr-border)">
            <img src="../assets/images/quota_login.png"
                 alt="หน้า Login Sophos User Portal"
                 style="width:100%;border-radius:8px;display:block;border:1px solid #e5e7eb"
                 onerror="this.style.display=\'none\';this.nextElementSibling.style.display=\'flex\'">
            <div style="display:none;background:#eff6ff;border-radius:8px;padding:20px;min-height:100px;
                        flex-direction:column;align-items:center;justify-content:center;
                        gap:4px;color:#94a3b8;font-size:.75rem;text-align:center">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#93c5fd" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
              quota_login.png
            </div>
          </div>
          <div style="padding:16px;display:flex;flex-direction:column;justify-content:center;
                      gap:8px;font-size:.84rem;color:var(--clr-text);line-height:1.75">
            <div style="display:flex;gap:8px">
              <span style="color:var(--clr-primary);font-weight:700;flex-shrink:0">•</span>
              <span>เปิดลิงก์ <strong>Sophos User Portal</strong> ด้านบน</span>
            </div>
            <div style="display:flex;gap:8px">
              <span style="color:var(--clr-primary);font-weight:700;flex-shrink:0">•</span>
              <span>กรอก <strong>Username</strong> หน้าแดง เช่น <code style="background:#f1f5f9;padding:1px 6px;border-radius:4px;font-family:monospace;font-size:.85em;color:#dc2626">makarawit</code></span>
            </div>
            <div style="display:flex;gap:8px">
              <span style="color:var(--clr-primary);font-weight:700;flex-shrink:0">•</span>
              <span>กรอก <strong>Password</strong> หน้าแดง แล้วกด <strong>Login</strong></span>
            </div>
          </div>
        </div>
      </div>

      <!-- Step 2 -->
      <div style="border:1px solid var(--clr-border);border-radius:14px;overflow:hidden;margin-bottom:12px">
        <div style="background:var(--clr-primary-pale);padding:10px 16px;display:flex;
                    align-items:center;gap:10px;border-bottom:1px solid var(--clr-border)">
          <div style="width:24px;height:24px;background:var(--clr-primary);border-radius:50%;
                      display:flex;align-items:center;justify-content:center;
                      color:white;font-size:.72rem;font-weight:700;flex-shrink:0">2</div>
          <span style="font-weight:600;font-size:.9rem;color:var(--clr-primary-dark)">
            คลิกเมนู "Internet usage" เพื่อดูรายละเอียด
          </span>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:0">
          <div style="padding:12px;border-right:1px solid var(--clr-border)">
            <img src="../assets/images/quota_usage.png"
                 alt="หน้า Internet Usage Sophos"
                 style="width:100%;border-radius:8px;display:block;border:1px solid #e5e7eb"
                 onerror="this.style.display=\'none\';this.nextElementSibling.style.display=\'flex\'">
            <div style="display:none;background:#eff6ff;border-radius:8px;padding:20px;min-height:100px;
                        flex-direction:column;align-items:center;justify-content:center;
                        gap:4px;color:#94a3b8;font-size:.75rem;text-align:center">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#93c5fd" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
              quota_usage.png
            </div>
          </div>
          <div style="padding:16px;display:flex;flex-direction:column;justify-content:center;
                      gap:8px;font-size:.84rem;color:var(--clr-text);line-height:1.75">
            <div style="display:flex;gap:8px">
              <span style="color:var(--clr-primary);font-weight:700;flex-shrink:0">•</span>
              <span>ในเมนูซ้าย คลิก <strong>"Internet usage"</strong></span>
            </div>
            <div style="display:flex;gap:8px">
              <span style="color:var(--clr-primary);font-weight:700;flex-shrink:0">•</span>
              <span>ระบบแสดง <strong>Policy information</strong> เช่น Group, เวลาใช้งาน และวันต่ออายุ</span>
            </div>
            <div style="display:flex;gap:8px">
              <span style="color:var(--clr-primary);font-weight:700;flex-shrink:0">•</span>
              <span>ดู <strong>Usage information</strong> ยอด Upload / Download / Total รวม</span>
            </div>
            <div style="display:flex;gap:8px">
              <span style="color:var(--clr-primary);font-weight:700;flex-shrink:0">•</span>
              <span>ดู <strong>CurrentDailyCycle</strong> ปริมาณใช้งานรอบวันปัจจุบัน</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Step 3 -->
      <div style="border:1px solid var(--clr-border);border-radius:14px;overflow:hidden;margin-bottom:24px">
        <div style="background:#f0fdf4;padding:10px 16px;display:flex;
                    align-items:center;gap:10px;border-bottom:1px solid #bbf7d0">
          <div style="width:24px;height:24px;background:#16a34a;border-radius:50%;
                      display:flex;align-items:center;justify-content:center;
                      color:white;font-size:.72rem;font-weight:700;flex-shrink:0">3</div>
          <span style="font-weight:600;font-size:.9rem;color:#166534">
            เลือกเดือนเพื่อดูประวัติการใช้งานรายวัน
          </span>
        </div>
        <div style="padding:14px 16px;font-size:.85rem;color:var(--clr-text);line-height:1.8;
                    display:flex;flex-direction:column;gap:6px">
          <div style="display:flex;gap:8px">
            <span style="color:#16a34a;font-weight:700;flex-shrink:0">•</span>
            <span>เลื่อนลงมาที่ส่วน <strong>"View usage for"</strong> เลือกเดือนที่ต้องการ เช่น <strong>May-2026</strong></span>
          </div>
          <div style="display:flex;gap:8px">
            <span style="color:#16a34a;font-weight:700;flex-shrink:0">•</span>
            <span>ตารางด้านล่างจะแสดง <strong>IP Address, เวลาเริ่ม/หยุด, ระยะเวลา (นาที), Download/Upload</strong> แต่ละ Session</span>
          </div>
          <div style="display:flex;gap:8px">
            <span style="color:#16a34a;font-weight:700;flex-shrink:0">•</span>
            <span>สามารถกด <strong>คอลัมน์ Start time</strong> เพื่อเรียงลำดับวันที่ได้</span>
          </div>
        </div>
      </div>

      <!-- ───── ตารางอธิบายข้อมูล ───── -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;
                  color:var(--clr-text-muted);margin-bottom:10px">คำอธิบายข้อมูลในหน้า Internet Usage</div>
      <div style="border:1px solid var(--clr-border);border-radius:12px;overflow:hidden;margin-bottom:20px">
        <table style="width:100%;border-collapse:collapse;font-size:.84rem">
          <thead>
            <tr style="background:var(--clr-primary-pale)">
              <th style="padding:10px 14px;text-align:left;border-bottom:1px solid var(--clr-border);
                         font-weight:700;color:var(--clr-primary-dark)">ฟิลด์</th>
              <th style="padding:10px 14px;text-align:left;border-bottom:1px solid var(--clr-border);
                         font-weight:700;color:var(--clr-primary-dark)">ความหมาย</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="padding:9px 14px;border-bottom:1px solid var(--clr-border);font-weight:600;white-space:nowrap">Time allotted (HH)</td>
              <td style="padding:9px 14px;border-bottom:1px solid var(--clr-border);color:var(--clr-text)">เวลาที่ได้รับสิทธิ์ใช้งาน (ชั่วโมง) — <strong style="color:#16a34a">Unlimited</strong> คือไม่จำกัด</td>
            </tr>
            <tr style="background:var(--clr-bg)">
              <td style="padding:9px 14px;border-bottom:1px solid var(--clr-border);font-weight:600;white-space:nowrap">Surfing quota expiry</td>
              <td style="padding:9px 14px;border-bottom:1px solid var(--clr-border);color:var(--clr-text)">วันหมดอายุโควต้าท่องเว็บ — <strong style="color:#16a34a">N.A.</strong> คือไม่มีกำหนด</td>
            </tr>
            <tr>
              <td style="padding:9px 14px;border-bottom:1px solid var(--clr-border);font-weight:600;white-space:nowrap">Data transfer cycle renewal</td>
              <td style="padding:9px 14px;border-bottom:1px solid var(--clr-border);color:var(--clr-text)">วันที่รีเซตยอด Data รายเดือน</td>
            </tr>
            <tr style="background:var(--clr-bg)">
              <td style="padding:9px 14px;border-bottom:1px solid var(--clr-border);font-weight:600;white-space:nowrap">Internet usage time</td>
              <td style="padding:9px 14px;border-bottom:1px solid var(--clr-border);color:var(--clr-text)">เวลาสะสมที่ใช้งานอินเทอร์เน็ตทั้งหมด (HH:MM)</td>
            </tr>
            <tr>
              <td style="padding:9px 14px;border-bottom:1px solid var(--clr-border);font-weight:600;white-space:nowrap">Download / Upload</td>
              <td style="padding:9px 14px;border-bottom:1px solid var(--clr-border);color:var(--clr-text)">ปริมาณดาวน์โหลด / อัปโหลดสะสม (MB)</td>
            </tr>
            <tr style="background:var(--clr-bg)">
              <td style="padding:9px 14px;font-weight:600;white-space:nowrap">Cycle total network traffic</td>
              <td style="padding:9px 14px;color:var(--clr-text)">โควต้า Data รายวันที่ได้รับ และเหลืออยู่ (MB)</td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- ───── Info box ───── -->
      <div style="background:#eff6ff;border:1px solid #bfdbfe;border-radius:12px;
                  padding:14px 18px;font-size:.88rem;color:#1e3a8a;line-height:1.75;margin-bottom:12px">
        💡 <strong>เคล็ดลับ:</strong> หาก <strong>Remaining</strong> ใกล้ศูนย์ แสดงว่าโควต้าใกล้หมด
        ให้รีบติดต่อขอปรับปริมาณอินเทอร์เน็ตได้ที่เมนู
        <a href="services.php?cat=internet" style="color:#1d4ed8;font-weight:600;text-decoration:underline">
          ขอปรับปริมาณการใช้อินเทอร์เน็ต
        </a>
      </div>

      <div style="background:#f0fdf4;border:1px solid #bbf7d0;border-radius:12px;
                  padding:14px 18px;font-size:.88rem;color:#166534;line-height:1.75">
        📞 หากเข้าระบบไม่ได้หรือพบปัญหา ติดต่อกองบริหารสารสนเทศ โทร <strong>4141</strong>
        / Line: <strong>it4141</strong>
      </div>

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