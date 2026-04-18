<?php
// pages/network.php — Network & Security
require_once '../includes/config.php';
$page_title = 'ระบบเครือข่าย & ความปลอดภัย';
$cat = $_GET['cat'] ?? '';

$sections = [
  'network'  => ['label' => 'อินเตอร์เน็ตภายในองค์กร'],
  'policy'   => ['label' => 'นโยบาย IT'],
  'vpn'      => ['label' => 'VPN'],
  'security' => ['label' => 'ความปลอดภัยข้อมูล'],
];

$network_items = [
  [
    'cat'   => 'network',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>',
    'title' => 'อินเตอร์เน็ตภายในองค์กร',
    'desc'  => 'เครือข่ายอินเทอร์เน็ตไร้สายในแต่ละพื้นที่ของวัดพระธรรมกาย',
    'extra_html' => '
      <div style="overflow-x:auto">
        <table style="width:100%;border-collapse:collapse;font-size:.95rem">
          <thead>
            <tr style="background:#2f7aa3;color:#fff;text-align:left">
              <th style="padding:10px">สถานที่</th>
              <th style="padding:10px">ชื่อ Wifi</th>
            </tr>
          </thead>
          <tbody>
            <tr style="background:#f2f2f2">
              <td style="padding:10px">สำนักงานใหญ่</td>
              <td style="padding:10px">DKC Network (HQ)</td>
            </tr>
            <tr>
              <td style="padding:10px">อาคาร 100 ปี</td>
              <td style="padding:10px">.100Y-Office</td>
            </tr>
            <tr style="background:#f2f2f2">
              <td style="padding:10px">สภาธรรมกายสากล</td>
              <td style="padding:10px">DKC Network (Spha)</td>
            </tr>
            <tr>
              <td style="padding:10px">มหาวิหารคด</td>
              <td style="padding:10px">DKC Network (VHK)</td>
            </tr>
            <tr style="background:#f2f2f2">
              <td style="padding:10px">อาคารพระผู้ปราบมาร</td>
              <td style="padding:10px">DKC Network (PM)</td>
            </tr>
            <tr>
              <td style="padding:10px">อาคารหนึ่งไม่มีสอง</td>
              <td style="padding:10px">DKC Network (UPK)</td>
            </tr>
            <tr style="background:#f2f2f2">
              <td style="padding:10px">พื้นที่ 58 ไร่</td>
              <td style="padding:10px">DKC Network</td>
            </tr>
            <tr>
              <td style="padding:10px">อาคารบุญรักษา</td>
              <td style="padding:10px">Boonraksa</td>
            </tr>
          </tbody>
        </table>
      </div>
    ',
  ],
  [
    'cat'   => 'policy',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>',
    'title' => 'นโยบาย IT',
    'desc'  => 'ข้อกำหนดและนโยบายการใช้งานระบบสารสนเทศขององค์กร',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:24px">
        นโยบาย IT ขององค์กรกำหนดขึ้นเพื่อ<strong>ปกป้องข้อมูลและระบบสารสนเทศ</strong>
        บุคลากรทุกคนมีหน้าที่รับทราบและปฏิบัติตามอย่างเคร่งครัด
        การฝ่าฝืนอาจส่งผลต่อสิทธิ์การเข้าถึงระบบและอาจมีโทษทางวินัย
      </p>

      <!-- หมวดนโยบายหลัก -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:14px">นโยบายหลัก 4 ด้าน</div>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:28px">
        <div style="border-left:4px solid #2563eb;background:var(--clr-bg);border-radius:0 10px 10px 0;padding:14px 16px">
          <div style="font-weight:700;font-size:.9rem;color:var(--clr-text);margin-bottom:6px">🔑 รหัสผ่าน</div>
          <ul style="font-size:.82rem;color:var(--clr-text-muted);padding-left:0;list-style:none;display:flex;flex-direction:column;gap:4px;line-height:1.6">
            <li>• ความยาวขั้นต่ำ 8 ตัวอักษร</li>
            <li>• ต้องมีตัวพิมพ์ใหญ่ + ตัวเลข + อักขระพิเศษ</li>
            <li>• เปลี่ยนทุก 90 วัน</li>
            <li>• ห้ามใช้ซ้ำ 5 ครั้งล่าสุด</li>
          </ul>
        </div>
        <div style="border-left:4px solid #16a34a;background:var(--clr-bg);border-radius:0 10px 10px 0;padding:14px 16px">
          <div style="font-weight:700;font-size:.9rem;color:var(--clr-text);margin-bottom:6px">💻 การใช้คอมพิวเตอร์</div>
          <ul style="font-size:.82rem;color:var(--clr-text-muted);padding-left:0;list-style:none;display:flex;flex-direction:column;gap:4px;line-height:1.6">
            <li>• ห้ามติดตั้งซอฟต์แวร์ที่ไม่ได้รับอนุญาต</li>
            <li>• ล็อกหน้าจอทุกครั้งที่ออกจากโต๊ะ</li>
            <li>• ห้ามใช้เพื่อกิจกรรมส่วนตัว</li>
          </ul>
        </div>
        <div style="border-left:4px solid #d97706;background:var(--clr-bg);border-radius:0 10px 10px 0;padding:14px 16px">
          <div style="font-weight:700;font-size:.9rem;color:var(--clr-text);margin-bottom:6px">🌐 การใช้อินเทอร์เน็ต</div>
          <ul style="font-size:.82rem;color:var(--clr-text-muted);padding-left:0;list-style:none;display:flex;flex-direction:column;gap:4px;line-height:1.6">
            <li>• ห้ามเข้าเว็บที่ถูกบล็อกโดยองค์กร</li>
            <li>• ต้องใช้ VPN เมื่อเข้าจากนอกอาคาร</li>
            <li>• ห้ามดาวน์โหลดไฟล์จากแหล่งที่ไม่น่าเชื่อถือ</li>
          </ul>
        </div>
        <div style="border-left:4px solid #7c3aed;background:var(--clr-bg);border-radius:0 10px 10px 0;padding:14px 16px">
          <div style="font-weight:700;font-size:.9rem;color:var(--clr-text);margin-bottom:6px">💾 การจัดการข้อมูล</div>
          <ul style="font-size:.82rem;color:var(--clr-text-muted);padding-left:0;list-style:none;display:flex;flex-direction:column;gap:4px;line-height:1.6">
            <li>• สำรองข้อมูลบน OneDrive หรือ SharePoint</li>
            <li>• ห้ามส่งข้อมูลลับผ่าน Email ส่วนตัว</li>
            <li>• ลบข้อมูลที่ไม่ใช้ตามแนวทางองค์กร</li>
          </ul>
        </div>
      </div>

      <!-- ตารางระดับโทษ -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:10px">ระดับการฝ่าฝืนและผลที่ตามมา</div>
      <table style="width:100%;border-collapse:collapse;font-size:.87rem;margin-bottom:20px">
        <thead>
          <tr style="background:var(--clr-primary-pale)">
            <th style="padding:10px 14px;text-align:left;border:1px solid var(--clr-border)">ระดับ</th>
            <th style="padding:10px 14px;text-align:left;border:1px solid var(--clr-border)">ตัวอย่างการกระทำ</th>
            <th style="padding:10px 14px;text-align:left;border:1px solid var(--clr-border)">ผลที่ตามมา</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)"><span style="background:#fef3c7;color:#92400e;padding:2px 8px;border-radius:20px;font-size:.78rem;font-weight:600">เบา</span></td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">ไม่ล็อกหน้าจอ, ใช้รหัสผ่านอ่อน</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">แจ้งเตือนและบันทึก</td>
          </tr>
          <tr style="background:var(--clr-bg)">
            <td style="padding:10px 14px;border:1px solid var(--clr-border)"><span style="background:#fee2e2;color:#991b1b;padding:2px 8px;border-radius:20px;font-size:.78rem;font-weight:600">หนัก</span></td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">ติดตั้งซอฟต์แวร์โดยไม่ได้รับอนุญาต</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">ระงับสิทธิ์ชั่วคราว + ตักเตือน</td>
          </tr>
          <tr>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)"><span style="background:#7f1d1d;color:white;padding:2px 8px;border-radius:20px;font-size:.78rem;font-weight:600">ร้ายแรง</span></td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">ขโมยข้อมูล, เจาะระบบ</td>
            <td style="padding:10px 14px;border:1px solid var(--clr-border)">ดำเนินการทางวินัยและกฎหมาย</td>
          </tr>
        </tbody>
      </table>

      <div style="background:#f0fdf4;border:1px solid #bbf7d0;border-radius:12px;padding:14px 18px;font-size:.88rem;color:#166534;line-height:1.7">
        📄 นโยบาย IT ฉบับเต็มสามารถดาวน์โหลดได้ที่ SharePoint ขององค์กร หรือขอรับเอกสารกระดาษได้ที่กองบริหารสารสนเทศ
      </div>
    ',
  ],

  [
    'cat'   => 'vpn',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>',
    'title' => 'VPN',
    'desc'  => 'ใช้ VPN เพื่อเชื่อมต่อระบบภายในจากที่พักหรือสถานที่อื่นๆ อย่างปลอดภัย',
    'extra_html' => '
      <!-- แผนภาพ VPN -->
      <div style="background:linear-gradient(135deg,#0f172a,#1e293b);border-radius:14px;padding:24px;margin-bottom:24px;text-align:center">
        <div style="display:flex;align-items:center;justify-content:center;gap:16px;flex-wrap:wrap">
          <div style="text-align:center">
            <div style="background:#334155;border-radius:12px;padding:12px 16px;margin-bottom:6px">
              <div style="font-size:1.5rem">🏠</div>
            </div>
            <div style="color:#94a3b8;font-size:.72rem">บ้าน / นอกสถานที่</div>
          </div>
          <div style="display:flex;flex-direction:column;align-items:center;gap:4px">
            <div style="width:60px;height:2px;background:linear-gradient(90deg,#ef4444,#f59e0b)"></div>
            <div style="font-size:.65rem;color:#ef4444;font-weight:600">ไม่ปลอดภัย</div>
          </div>
          <div style="text-align:center">
            <div style="background:#1d4ed8;border-radius:12px;padding:12px 16px;margin-bottom:6px;box-shadow:0 0 20px rgba(59,130,246,.4)">
              <div style="font-size:1.5rem">🛡️</div>
            </div>
            <div style="color:#60a5fa;font-size:.72rem;font-weight:600">VPN Server</div>
          </div>
          <div style="display:flex;flex-direction:column;align-items:center;gap:4px">
            <div style="width:60px;height:2px;background:linear-gradient(90deg,#22c55e,#22c55e)"></div>
            <div style="font-size:.65rem;color:#22c55e;font-weight:600">ปลอดภัย 🔒</div>
          </div>
          <div style="text-align:center">
            <div style="background:#334155;border-radius:12px;padding:12px 16px;margin-bottom:6px">
              <div style="font-size:1.5rem">🏢</div>
            </div>
            <div style="color:#94a3b8;font-size:.72rem">เครือข่ายองค์กร</div>
          </div>
        </div>
        <div style="margin-top:12px;color:#64748b;font-size:.75rem">การเชื่อมต่อทั้งหมดถูกเข้ารหัส (Encrypted Tunnel)</div>
      </div>

      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        VPN (Virtual Private Network) สร้าง<strong>"อุโมงค์" การสื่อสารที่ปลอดภัย</strong>
        ระหว่างอุปกรณ์ของคุณกับเครือข่ายขององค์กร ทำให้สามารถเข้าถึงระบบ Intranet
        ไฟล์เซิร์ฟเวอร์ และระบบภายในได้จากทุกที่ ราวกับนั่งอยู่ที่สำนักงาน
      </p>

      <!-- ระบบปฏิบัติการที่รองรับ -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">รองรับทุกอุปกรณ์</div>
      <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:10px;margin-bottom:24px">
        <div style="background:var(--clr-bg);border-radius:10px;padding:14px;text-align:center">
          <div style="font-size:1.8rem;margin-bottom:6px">🪟</div>
          <div style="font-size:.78rem;font-weight:600;color:var(--clr-text)">Windows</div>
          <div style="font-size:.7rem;color:var(--clr-text-muted)">10 / 11</div>
        </div>
        <div style="background:var(--clr-bg);border-radius:10px;padding:14px;text-align:center">
          <div style="font-size:1.8rem;margin-bottom:6px">🍎</div>
          <div style="font-size:.78rem;font-weight:600;color:var(--clr-text)">macOS</div>
          <div style="font-size:.7rem;color:var(--clr-text-muted)">Monterey+</div>
        </div>
        <div style="background:var(--clr-bg);border-radius:10px;padding:14px;text-align:center">
          <div style="font-size:1.8rem;margin-bottom:6px">📱</div>
          <div style="font-size:.78rem;font-weight:600;color:var(--clr-text)">iOS</div>
          <div style="font-size:.7rem;color:var(--clr-text-muted)">iPhone / iPad</div>
        </div>
        <div style="background:var(--clr-bg);border-radius:10px;padding:14px;text-align:center">
          <div style="font-size:1.8rem;margin-bottom:6px">🤖</div>
          <div style="font-size:.78rem;font-weight:600;color:var(--clr-text)">Android</div>
          <div style="font-size:.7rem;color:var(--clr-text-muted)">9.0 ขึ้นไป</div>
        </div>
      </div>

      <!-- ข้อมูลการตั้งค่า -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:10px">ข้อมูลการเชื่อมต่อ</div>
      <div style="background:var(--clr-bg);border-radius:12px;padding:16px;font-family:monospace;font-size:.85rem;color:var(--clr-text);display:flex;flex-direction:column;gap:8px;margin-bottom:20px;border:1px solid var(--clr-border)">
        <div style="display:flex;gap:12px"><span style="color:var(--clr-text-muted);width:120px;flex-shrink:0">Server Address</span><strong>vpn.example.go.th</strong></div>
        <div style="display:flex;gap:12px"><span style="color:var(--clr-text-muted);width:120px;flex-shrink:0">Protocol</span><strong>IKEv2 / L2TP</strong></div>
        <div style="display:flex;gap:12px"><span style="color:var(--clr-text-muted);width:120px;flex-shrink:0">Username</span><strong>Username องค์กร</strong></div>
        <div style="display:flex;gap:12px"><span style="color:var(--clr-text-muted);width:120px;flex-shrink:0">Password</span><strong>รหัสผ่านองค์กร</strong></div>
      </div>

      <a href="guides.php?cat=vpn" style="display:inline-flex;align-items:center;gap:8px;background:var(--clr-primary);color:white;padding:10px 20px;border-radius:8px;font-size:.88rem;font-weight:600;text-decoration:none">
        📖 อ่านคู่มือติดตั้ง VPN แบบละเอียด →
      </a>
    ',
  ],

  [
    'cat'   => 'security',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
    'title' => 'ความปลอดภัยข้อมูล',
    'desc'  => 'แนวทางปฏิบัติเพื่อความปลอดภัยของข้อมูลส่วนตัวและข้อมูลองค์กร',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        ภัยคุกคามทางไซเบอร์เพิ่มขึ้นทุกปี บุคลากรทุกคนคือ<strong>"ด่านแรก"</strong>ของการป้องกัน
        การรู้จักและระวังภัยพื้นฐานสามารถลดความเสี่ยงได้มากกว่า 90%
      </p>

      <!-- กราฟสถิติ -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">สาเหตุหลักของการรั่วไหลข้อมูลในองค์กร</div>
      <div style="background:var(--clr-bg);border-radius:12px;padding:20px;margin-bottom:24px;display:flex;flex-direction:column;gap:12px">
        <div>
          <div style="display:flex;justify-content:space-between;font-size:.82rem;margin-bottom:5px">
            <span>🎣 Phishing / หลอกลวง</span><strong style="color:#ef4444">36%</strong>
          </div>
          <div style="background:#e2e8f0;border-radius:20px;height:14px;overflow:hidden">
            <div style="background:#ef4444;width:36%;height:100%;border-radius:20px"></div>
          </div>
        </div>
        <div>
          <div style="display:flex;justify-content:space-between;font-size:.82rem;margin-bottom:5px">
            <span>🔑 รหัสผ่านอ่อนแอ</span><strong style="color:#f59e0b">27%</strong>
          </div>
          <div style="background:#e2e8f0;border-radius:20px;height:14px;overflow:hidden">
            <div style="background:#f59e0b;width:27%;height:100%;border-radius:20px"></div>
          </div>
        </div>
        <div>
          <div style="display:flex;justify-content:space-between;font-size:.82rem;margin-bottom:5px">
            <span>💾 USB / อุปกรณ์ไม่รู้จัก</span><strong style="color:#7c3aed">18%</strong>
          </div>
          <div style="background:#e2e8f0;border-radius:20px;height:14px;overflow:hidden">
            <div style="background:#7c3aed;width:18%;height:100%;border-radius:20px"></div>
          </div>
        </div>
        <div>
          <div style="display:flex;justify-content:space-between;font-size:.82rem;margin-bottom:5px">
            <span>🌐 ซอฟต์แวร์ไม่อัปเดต</span><strong style="color:#0891b2">12%</strong>
          </div>
          <div style="background:#e2e8f0;border-radius:20px;height:14px;overflow:hidden">
            <div style="background:#0891b2;width:12%;height:100%;border-radius:20px"></div>
          </div>
        </div>
        <div>
          <div style="display:flex;justify-content:space-between;font-size:.82rem;margin-bottom:5px">
            <span>📋 อื่นๆ</span><strong style="color:#94a3b8">7%</strong>
          </div>
          <div style="background:#e2e8f0;border-radius:20px;height:14px;overflow:hidden">
            <div style="background:#94a3b8;width:7%;height:100%;border-radius:20px"></div>
          </div>
        </div>
      </div>

      <!-- 4 แนวปฏิบัติหลัก -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">แนวปฏิบัติที่แนะนำ</div>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:20px">
        <div style="display:flex;gap:12px;background:var(--clr-bg);border-radius:var(--radius-md);padding:14px">
          <div style="width:40px;height:40px;background:var(--clr-primary-pale);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.2rem">🎣</div>
          <div>
            <div style="font-weight:600;font-size:.88rem;margin-bottom:3px">ระวัง Phishing</div>
            <div style="font-size:.8rem;color:var(--clr-text-muted)">อย่าคลิกลิงก์จาก Email ที่ไม่รู้จัก ตรวจสอบ URL ก่อนเสมอ</div>
          </div>
        </div>
        <div style="display:flex;gap:12px;background:var(--clr-bg);border-radius:var(--radius-md);padding:14px">
          <div style="width:40px;height:40px;background:var(--clr-primary-pale);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.2rem">🔐</div>
          <div>
            <div style="font-weight:600;font-size:.88rem;margin-bottom:3px">เปิดใช้ 2FA</div>
            <div style="font-size:.8rem;color:var(--clr-text-muted)">เปิด Two-Factor Authentication ทุกบัญชีที่รองรับ</div>
          </div>
        </div>
        <div style="display:flex;gap:12px;background:var(--clr-bg);border-radius:var(--radius-md);padding:14px">
          <div style="width:40px;height:40px;background:var(--clr-primary-pale);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.2rem">☁️</div>
          <div>
            <div style="font-weight:600;font-size:.88rem;margin-bottom:3px">สำรองข้อมูล</div>
            <div style="font-size:.8rem;color:var(--clr-text-muted)">บันทึกไฟล์สำคัญบน OneDrive หรือ SharePoint เสมอ</div>
          </div>
        </div>
        <div style="display:flex;gap:12px;background:var(--clr-bg);border-radius:var(--radius-md);padding:14px">
          <div style="width:40px;height:40px;background:var(--clr-primary-pale);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.2rem">🖥️</div>
          <div>
            <div style="font-weight:600;font-size:.88rem;margin-bottom:3px">ล็อกหน้าจอ</div>
            <div style="font-size:.8rem;color:var(--clr-text-muted)">กด Win+L ทุกครั้งที่ออกจากโต๊ะ แม้เพียงแค่ชั่วคราว</div>
          </div>
        </div>
      </div>

      <!-- วิธีสังเกต Email หลอกลวง -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:10px">วิธีสังเกต Email Phishing</div>
      <div style="border:2px solid #fca5a5;border-radius:12px;overflow:hidden;margin-bottom:16px">
        <div style="background:#fee2e2;padding:10px 16px;display:flex;align-items:center;gap:8px">
          <span style="font-size:.85rem">⚠️</span>
          <span style="font-size:.82rem;font-weight:600;color:#991b1b">ตัวอย่าง Email อันตราย — อย่าคลิก!</span>
        </div>
        <div style="background:white;padding:16px;font-size:.83rem;color:#374151;line-height:1.7">
          <div style="margin-bottom:6px"><strong>จาก:</strong> <span style="color:#dc2626">admin@micros0ft-support.com</span> <span style="background:#fee2e2;color:#991b1b;font-size:.7rem;padding:1px 6px;border-radius:4px;margin-left:4px">❌ โดเมนปลอม</span></div>
          <div style="margin-bottom:6px"><strong>หัวข้อ:</strong> ⚠️ บัญชีของคุณจะถูกลบภายใน 24 ชั่วโมง! คลิกด่วน <span style="background:#fee2e2;color:#991b1b;font-size:.7rem;padding:1px 6px;border-radius:4px;margin-left:4px">❌ สร้างความตื่นตระหนก</span></div>
          <div style="color:#6b7280;font-style:italic;font-size:.8rem">"กรุณาคลิกลิงก์นี้และยืนยันรหัสผ่านของคุณภายใน 24 ชั่วโมง มิฉะนั้นบัญชีจะถูกลบ..."</div>
        </div>
      </div>

      <div style="background:#f0fdf4;border:1px solid #bbf7d0;border-radius:12px;padding:14px 18px;font-size:.88rem;color:#166534;line-height:1.7">
        🆘 หากพบ Email น่าสงสัยหรือคิดว่าถูกโจมตี ให้แจ้งเจ้าหน้าที่ IT ทันที ห้ามเปิดไฟล์หรือคลิกลิงก์ใดๆ ในอีเมลนั้น
      </div>
    ',
  ],
];

require_once '../includes/header.php';
?>

<?php
$panel_title   = 'ระบบเครือข่าย & ความปลอดภัย';
$panel_cat     = $cat;
$panel_base    = 'network.php';
$panel_menu    = $sections;
$panel_items   = $network_items;
$panel_contact = false;
?>

<main class="layout__main">
  <nav class="breadcrumb">
    <a href="../index.php">หน้าหลัก</a>
    <span class="breadcrumb__sep">›</span>
    <span>ระบบเครือข่าย & ความปลอดภัย</span>
  </nav>

  <?php require_once '../includes/single-panel.php'; ?>
</main>

<?php require_once '../includes/footer.php'; ?>