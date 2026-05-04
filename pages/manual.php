<?php
// pages/manual.php — คู่มือการใช้งานระบบ
require_once '../includes/config.php';
$page_title = 'คู่มือการใช้งานระบบ';
$cat = $_GET['cat'] ?? '';

$sections = [
  'network'   => ['label' => 'เครือข่ายและการเชื่อมต่อ'],
  'security'  => ['label' => 'ระบบปฏิบัติการและความปลอดภัย'],
  'domain'    => ['label' => 'การใช้งาน Domain'],
  'tools'     => ['label' => 'การตั้งค่าและเครื่องมือเพิ่มเติม'],
  'documents' => ['label' => 'เอกสารระบบ'],
];

// ───────────────────────────────────────────────────────────────────
// Helper: สร้าง accordion item พร้อมรูปภาพขั้นตอน
// ───────────────────────────────────────────────────────────────────
function make_accordion(string $id, string $title, string $icon, array $steps): string
{
  $steps_html = '';
  foreach ($steps as $i => $step) {
    $num = $i + 1;
    $steps_html .= '
      <div class="step-block">
        <div class="step-header">
          <div class="step-num">' . $num . '</div>
          <div class="step-title">' . htmlspecialchars($step['title']) . '</div>
        </div>
        <div class="step-body">
          <p class="step-desc">' . $step['desc'] . '</p>
          <div class="step-img-wrap">
            ' . (isset($step['img'])
      ? '<img src="' . htmlspecialchars($step['img']) . '" alt="' . htmlspecialchars($step['caption'] ?? $step['title']) . '" style="max-width:100%;border-radius:10px;border:1px solid #e5e7eb;" loading="lazy">'
      : '<div class="step-img-placeholder">
                  <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                  <span class="step-img-label">รูปภาพประกอบขั้นตอนที่ ' . $num . '</span>
                  <span class="step-img-hint">[ แทนที่ด้วยภาพจริง ]</span>
                </div>'
    ) . '
            <p class="step-img-caption">ภาพที่ ' . $num . ': ' . htmlspecialchars($step['caption'] ?? $step['title']) . '</p>
          </div>
        </div>
      </div>';
  }

  return '
    <div class="accordion" id="acc-' . $id . '">
      <button class="accordion__btn" onclick="toggleAcc(\'acc-' . $id . '\')">
        <span class="accordion__icon">' . $icon . '</span>
        <span class="accordion__title">' . htmlspecialchars($title) . '</span>
        <span class="accordion__arrow">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
        </span>
      </button>
      <div class="accordion__body">
        <div class="accordion__inner">' . $steps_html . '</div>
      </div>
    </div>';
}

// ───────────────────────────────────────────────────────────────────
// ข้อมูลเมนูหลักและเนื้อหา extra_html
// ───────────────────────────────────────────────────────────────────
$manual_items = [

  // ════════════════════════════════════════════
  // 1. เครือข่ายและการเชื่อมต่อ
  // ════════════════════════════════════════════
  [
    'cat'   => 'network',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>',
    'title' => 'เครือข่ายและการเชื่อมต่อ',
    'desc'  => 'คู่มือการตรวจสอบ IP, การใช้ ping, การตั้งค่า WiFi บน Android, iOS, Windows และการแก้ปัญหาเครือข่ายเบื้องต้น',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:24px">
        คู่มือหมวดนี้ครอบคลุมการใช้งานและการตรวจสอบระบบเครือข่ายพื้นฐาน
        เหมาะสำหรับบุคลากรที่ต้องการตรวจสอบการเชื่อมต่ออินเทอร์เน็ต หรือตั้งค่า WiFi องค์กร
      </p>
      ' .
      make_accordion('net1', 'คู่มือการใช้คำสั่ง ipconfig เพื่อตรวจสอบ IP และการใช้ ping', '', [
        ['title' => 'เปิด Command Prompt', 'desc' => 'กด <strong>Windows + R</strong> แล้วพิมพ์ <code>cmd</code> จากนั้นกด Enter เพื่อเปิดโปรแกรม Command Prompt', 'img' => '../assets/images/manual/network/ping/ping1.png', 'caption' => 'เปิดหน้าต่าง Run และพิมพ์ cmd'],
        ['title' => 'พิมพ์คำสั่ง ipconfig', 'desc' => 'ในหน้าต่าง Command Prompt พิมพ์ <code>ipconfig</code> แล้วกด Enter ระบบจะแสดงข้อมูล IP Address ของเครื่อง', 'img' => '../assets/images/manual/network/ping/ping2.png', 'caption' => 'ผลลัพธ์คำสั่ง ipconfig แสดง IP Address'],
        ['title' => 'อ่านค่า IP Address', 'desc' => 'ดูที่บรรทัด <strong>IPv4 Address</strong> ซึ่งคือ IP ของเครื่องคอมพิวเตอร์ท่าน เช่น 192.168.1.xx', 'img' => '../assets/images/manual/network/ping/ping3.png', 'caption' => 'ตำแหน่ง IPv4 Address ในผลลัพธ์'],
        ['title' => 'ทดสอบการเชื่อมต่อด้วย ping', 'desc' => 'พิมพ์คำสั่ง <code>ping 8.8.8.8</code> แล้วกด Enter เพื่อทดสอบว่าเครื่องเชื่อมต่ออินเทอร์เน็ตได้หรือไม่', 'img' => '../assets/images/manual/network/ping/ping4.png', 'caption' => 'การใช้คำสั่ง ping ทดสอบการเชื่อมต่อ'],
        ['title' => 'อ่านผลลัพธ์ ping', 'desc' => 'หากได้รับ Reply ครบ 4 ครั้ง แสดงว่าเชื่อมต่อได้ปกติ หากได้ Request Timeout แสดงว่ามีปัญหาการเชื่อมต่อ', 'img' => '../assets/images/manual/network/ping/ping5.png', 'caption' => 'ตัวอย่างผลลัพธ์ ping ที่สำเร็จ'],
      ]) .
      make_accordion('net3', 'คู่มือการตั้งค่า WiFi .100Y-dot1x-Dhammakaya บน Android', '', [
        [
          'title' => 'เปิด Settings และแตะชื่อ WiFi',
          'desc'  => 'ไปที่ <strong>Settings → Wi-Fi</strong> แล้วเปิดสวิตช์ Wi-Fi รอจนเห็น <strong>.100Y-dot1x-Dhammakaya</strong> ปรากฏในรายการ แล้วแตะที่ชื่อนั้น',
          'img'   => '../assets/images/manual/network/android/android1.png',
          'caption' => 'หน้า Wi-Fi Settings แสดงชื่อ .100Y-dot1x-Dhammakaya ในรายการ'
        ],
        [
          'title' => 'กรอกข้อมูลเชื่อมต่อและกด Connect',
          'desc'  => 'จะมีหน้าต่างขึ้นมาให้กรอก ดังนี้<br>
                     • EAP method: <strong>PEAP</strong><br>
                     • Phase 2 authentication: <strong>None</strong><br>
                     • CA certificate: <strong>Unspecified</strong><br>
                     • Identity: กรอก <strong>Username</strong> ที่ได้รับจากกองบริหารสารสนเทศ<br>
                     • Password: กรอก <strong>Password</strong> ที่ได้รับ<br>
                     จากนั้นกด <strong>Connect</strong>',
          'img'   => '../assets/images/manual/network/android/android2.png',
          'caption' => 'หน้าต่างกรอก EAP Credentials และกด Connect'
        ],
        [
          'title' => 'ตรวจสอบสถานะ Connected',
          'desc'  => 'เมื่อเชื่อมต่อสำเร็จ จะแสดงสถานะ <strong>Connected</strong> ใต้ชื่อ WiFi และมีข้อความยืนยันที่แถบด้านล่างหน้าจอ',
          'img'   => '../assets/images/manual/network/android/android3.png',
          'caption' => 'สถานะ Connected และข้อความยืนยันการเชื่อมต่อ'
        ],
        [
          'title' => 'เปิดเบราว์เซอร์ — ระบบ Redirect ไปหน้า FD-NET',
          'desc'  => 'เปิดเบราว์เซอร์ใดก็ได้ ระบบจะ Redirect อัตโนมัติไปยังหน้า <strong>Captive Portal FD-NET</strong> พื้นหลังสีแดง ที่อยู่ <code>10.100.180.7:8090/httpclient.html</code>',
          'img'   => '../assets/images/manual/network/android/android4.png',
          'caption' => 'หน้า Captive Portal FD-NET ที่เปิดขึ้นอัตโนมัติ'
        ],
        [
          'title' => 'Login ด้วย Username และ Password',
          'desc'  => 'กรอก <strong>Username</strong> และ <strong>Password new domain</strong> ในช่องที่กำหนด จากนั้นกด <strong>LOG IN กดครั้งเดียว!</strong>',
          'img'   => '../assets/images/manual/network/android/android5.png',
          'caption' => 'หน้า Login FD-NET กรอก Username และ Password'
        ],
        [
          'title' => 'เชื่อมต่ออินเทอร์เน็ตสำเร็จ',
          'desc'  => 'เมื่อ Login สำเร็จ เบราว์เซอร์จะเปิดหน้าเว็บได้ตามปกติ แสดงว่าการตั้งค่า WiFi เสร็จสมบูรณ์แล้ว',
          'img'   => '../assets/images/manual/network/android/android6.png',
          'caption' => 'เชื่อมต่ออินเทอร์เน็ตสำเร็จ เปิดเว็บได้ตามปกติ'
        ],
      ]) .
      make_accordion('net4', 'คู่มือการตั้งค่า WiFi .100Y-dot1x-Dhammakaya บน iOS', '', [
        [
          'title' => 'เปิด Settings และแตะชื่อ WiFi',
          'desc'  => 'ไปที่ <strong>Settings → Wi-Fi</strong> แล้วเปิดสวิตช์ Wi-Fi รอจนเห็น <strong>.100Y-dot1x-Dhammakaya</strong> ปรากฏในรายการ แล้วแตะที่ชื่อนั้น',
          'img'   => '../assets/images/manual/network/ios/ios1.png',
          'caption' => 'หน้า Wi-Fi Settings แสดงรายการ .100Y-dot1x-Dhammakaya'
        ],

        [
          'title' => 'แตะ Join Network',
          'desc'  => 'ระบบจะเปิดหน้าข้อมูลเครือข่าย ให้แตะ <strong>Join Network</strong> เพื่อดำเนินการเชื่อมต่อ',
          'img'   => '../assets/images/manual/network/ios/ios2.png',
          'caption' => 'หน้าข้อมูลเครือข่ายและปุ่ม Join Network'
        ],

        [
          'title' => 'กรอก Username',
          'desc'  => 'ในหน้า <strong>Enter Password</strong> ให้กรอก <strong>Username</strong> ที่ได้รับจากกองบริหารสารสนเทศในช่อง Username <span style="color:#dc2626">(3)</span>',
          'img'   => '../assets/images/manual/network/ios/ios3.png',
          'caption' => 'ช่องกรอก Username ในหน้า Enter Password'
        ],

        [
          'title' => 'กรอก Password และกด Join',
          'desc'  => 'กรอก <strong>Password</strong> ในช่อง Password <span style="color:#dc2626">(4)</span> จากนั้นแตะปุ่ม <strong>Join</strong> ที่มุมบนขวา',
          'img'   => '../assets/images/manual/network/ios/ios4.png',
          'caption' => 'กรอก Password และกด Join'
        ],

        [
          'title' => 'ยืนยัน Certificate — กด Trust',
          'desc'  => 'ระบบจะแสดงหน้า <strong>Certificate</strong> ของ CPPM_Dhammakaya ให้แตะ <strong>Trust</strong> <span style="color:#dc2626">(5)</span> ที่มุมบนขวาเพื่อยืนยัน',
          'img'   => '../assets/images/manual/network/ios/ios5.png',
          'caption' => 'หน้า Certificate CPPM_Dhammakaya กด Trust เพื่อยืนยัน'
        ],

        [
          'title' => 'เปิดเบราว์เซอร์ — ระบบ Redirect ไปหน้า FD-NET',
          'desc'  => 'เปิดเบราว์เซอร์ ระบบจะ Redirect อัตโนมัติไปยังหน้า <strong>Captive Portal FD-NET</strong> พื้นหลังสีแดง',
          'img'   => '../assets/images/manual/network/ios/ios6.png',
          'caption' => 'หน้า Captive Portal FD-NET เปิดขึ้นอัตโนมัติบน iOS'
        ],

        [
          'title' => 'Login ด้วย Username และ Password แล้วกด LOG IN',
          'desc'  => 'กรอก <strong>Username</strong> และ <strong>Password new domain</strong> ในช่องที่กำหนด จากนั้นกด <strong>LOG IN กดครั้งเดียว!</strong> <span style="color:#dc2626">(6)</span>',
          'img'   => '../assets/images/manual/network/ios/ios7.png',
          'caption' => 'หน้า Login FD-NET กรอก Username/Password และกด LOG IN'
        ],

        [
          'title' => 'กด Done และตรวจสอบการเชื่อมต่อ',
          'desc'  => 'แตะปุ่ม <strong>Done</strong> <span style="color:#dc2626">(7)</span> ที่มุมบนขวา จากนั้นตรวจสอบว่า <strong>.100Y-dot1x-Dhammakaya</strong> มีเครื่องหมายถูก ✓ แสดงว่าเชื่อมต่อสำเร็จ สามารถใช้งานอินเทอร์เน็ตได้ตามปกติ',
          'img'   => '../assets/images/manual/network/ios/ios8.png',
          'caption' => 'กด Done และตรวจสอบสถานะ Connected บน iOS'
        ],
      ]) .
      make_accordion('net5', 'คู่มือการตั้งค่า WiFi .100Y-dot1x-Dhammakaya บน Windows 7', '', [
        [
          'title' => 'เปิด Network and Sharing Center และคลิก Manage Wireless Networks',
          'desc'  => 'คลิกไอคอนสัญญาณ WiFi ที่ Taskbar มุมขวาล่าง <span style="color:#dc2626">(1)</span> แล้วคลิก <strong>Open Network and Sharing Center</strong> จากนั้นคลิก <strong>Manage wireless networks</strong> <span style="color:#dc2626">(2)</span> ในแถบเมนูซ้าย',
          'img'   => '../assets/images/manual/network/windowns/windowns1.png',
          'caption' => 'เปิด Network and Sharing Center และคลิก Manage Wireless Networks'
        ],

        [
          'title' => 'คลิก Add และเลือก Manually create a network profile',
          'desc'  => 'คลิกปุ่ม <strong>Add</strong> <span style="color:#dc2626">(3)</span> ที่แถบด้านบน จากนั้นในหน้าต่างที่เปิดขึ้น เลือก <strong>Manually create a network profile</strong> <span style="color:#dc2626">(4)</span>',
          'img'   => '../assets/images/manual/network/windowns/windowns2.png',
          'caption' => 'คลิก Add และเลือก Manually create a network profile'
        ],

        [
          'title' => 'กรอกชื่อ Network ตั้งค่า Security และคลิก Next',
          'desc'  => 'กรอกข้อมูลดังนี้ <span style="color:#dc2626">(5)</span><br>
                     • Network name: <strong>.100Y-dot1x-Dhammakaya</strong><br>
                     • Security type: <strong>WPA2-Enterprise</strong><br>
                     • Encryption type: <strong>AES</strong><br>
                     จากนั้นคลิก <strong>Next</strong> <span style="color:#dc2626">(6)</span> และคลิก <strong>Close</strong> <span style="color:#dc2626">(7)</span>',
          'img'   => '../assets/images/manual/network/windowns/windowns3.png',
          'caption' => 'กรอกชื่อ Network ตั้งค่า Security type และ Encryption'
        ],

        [
          'title' => 'คลิกขวาที่ชื่อ WiFi → Properties และไปที่แท็บ Security',
          'desc'  => 'คลิกขวาที่ <strong>.100Y-dot1x-Dhammakaya</strong> ในรายการ <span style="color:#dc2626">(8)</span> แล้วเลือก <strong>Properties</strong> จากนั้นคลิกแท็บ <strong>Security</strong> และคลิกปุ่ม <strong>Settings</strong> <span style="color:#dc2626">(9)</span> ถัดจาก Microsoft Protected EAP (PEAP)',
          'img'   => '../assets/images/manual/network/windowns/windowns4.png',
          'caption' => 'คลิกขวา Properties → Security tab → Settings'
        ],

        [
          'title' => 'ปิด Validate server certificate และตั้งค่า EAP-MSCHAPv2',
          'desc'  => 'ในหน้าต่าง Protected EAP Properties ให้ <strong>ติ๊กออก</strong> (ยกเลิก) ที่ <strong>Validate server certificate</strong> <span style="color:#dc2626">(10)</span><br>
                     จากนั้นตรวจสอบว่า Authentication Method เป็น <strong>Secured password (EAP-MSCHAPv2)</strong> แล้วคลิก <strong>Configure...</strong> <span style="color:#dc2626">(11)</span><br>
                     ในหน้าต่าง EAP MSCHAPv2 Properties ให้ <strong>ติ๊กออก</strong> ที่ <strong>Automatically use my Windows logon name and password</strong> <span style="color:#dc2626">(12)</span> แล้วคลิก <strong>OK</strong> <span style="color:#dc2626">(13)</span>',
          'img'   => '../assets/images/manual/network/windowns/windowns5.png',
          'caption' => 'ปิด Validate server certificate และตั้งค่า EAP-MSCHAPv2'
        ],

        [
          'title' => 'คลิก Advanced settings และตั้งค่า Specify authentication mode',
          'desc'  => 'กลับมาที่แท็บ Security คลิกปุ่ม <strong>Advanced settings</strong> <span style="color:#dc2626">(14)</span><br>
                     ติ๊กเปิด <strong>Specify authentication mode</strong> แล้วเลือก <strong>User or computer authentication</strong> <span style="color:#dc2626">(15)</span> จากนั้นคลิก <strong>OK</strong> <span style="color:#dc2626">(16)</span>',
          'img'   => '../assets/images/manual/network/windowns/windowns6.png',
          'caption' => 'ตั้งค่า Advanced settings และ Specify authentication mode'
        ],

        [
          'title' => 'เปิด Services และตรวจสอบ WLAN AutoConfig',
          'desc'  => 'คลิก Start แล้วพิมพ์ <strong>services</strong> <span style="color:#dc2626">(17)</span> ในช่อง Search จากนั้นคลิก <strong>Services Running on this Computer</strong> <span style="color:#dc2626">(18)</span>',
          'img'   => '../assets/images/manual/network/windowns/windowns7.png',
          'caption' => 'เปิด Services ผ่าน Start Menu Search'
        ],

        [
          'title' => 'ตรวจสอบและ Start WLAN AutoConfig',
          'desc'  => 'ในหน้าต่าง Services ค้นหา <strong>WLAN AutoConfig</strong> <span style="color:#dc2626">(19)</span> ดับเบิลคลิกเพื่อเปิด Properties ตรวจสอบว่า Startup type เป็น <strong>Automatic</strong> <span style="color:#dc2626">(20)</span> และ Service status เป็น <strong>Started</strong> หากยังไม่ได้ Start ให้คลิกปุ่ม <strong>Start</strong> <span style="color:#dc2626">(21)</span> แล้วคลิก <strong>OK</strong>',
          'img'   => '../assets/images/manual/network/windowns/windowns8.png',
          'caption' => 'ตั้งค่า WLAN AutoConfig ให้เป็น Automatic และ Start'
        ],

        [
          'title' => 'เชื่อมต่อ WiFi และกรอก Credentials',
          'desc'  => 'คลิกไอคอน WiFi ที่ Taskbar แล้วคลิกที่ <strong>.100Y-dot1x-Dhammakaya</strong> <span style="color:#dc2626">(22)</span> ระบบจะแสดงหน้าต่าง <strong>Windows Security — Network Authentication</strong> ให้กรอก <strong>Username</strong> และ <strong>Password</strong> <span style="color:#dc2626">(23)</span> ที่ได้รับจากกองบริหารสารสนเทศ แล้วคลิก <strong>OK</strong>',
          'img'   => '../assets/images/manual/network/windowns/windowns9.png',
          'caption' => 'เลือก WiFi และกรอก Network Authentication Credentials'
        ],

        [
          'title' => 'เชื่อมต่อสำเร็จ — Login หน้าแดง FD-NET',
          'desc'  => 'เมื่อ Windows รับรอง Credentials แล้ว เปิดเบราว์เซอร์ ระบบจะ Redirect ไปหน้าแดง <strong>FD-NET</strong> ให้กรอก <strong>Username</strong> และ <strong>Password new domain</strong> อีกครั้ง แล้วคลิก <strong>LOG IN กดครั้งเดียว!</strong> เพื่อใช้งานอินเทอร์เน็ตได้ตามปกติ',
          'img'   => '../assets/images/manual/network/windowns/windowns10.png',
          'caption' => 'Login หน้าแดง FD-NET เพื่อใช้งานอินเทอร์เน็ต'
        ],
      ]) . '
      <div style="background:#f0fdf4;border:1px solid #bbf7d0;border-radius:12px;padding:14px 18px;font-size:.88rem;color:#166534;line-height:1.7;margin-top:20px">
        📞 หากตั้งค่าไม่สำเร็จ กรุณาติดต่อกองบริหารสารสนเทศ โทร <strong>4141</strong>
      </div>
    ',
  ],

  // ════════════════════════════════════════════
  // 2. ระบบปฏิบัติการและความปลอดภัย
  // ════════════════════════════════════════════
  [
    'cat'   => 'security',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
    'title' => 'ระบบปฏิบัติการและความปลอดภัย',
    'desc'  => 'คู่มือการอัปเดต Windows, ติดตั้ง Antivirus และการป้องกันมัลแวร์เพื่อความปลอดภัยของข้อมูลองค์กร',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:24px">
        คู่มือหมวดนี้ช่วยให้บุคลากรสามารถดูแลรักษาความปลอดภัยของเครื่องคอมพิวเตอร์
        รวมถึงการอัปเดตระบบปฏิบัติการและโปรแกรมป้องกันไวรัสอย่างถูกต้อง
      </p>

      <div style="display:flex;flex-direction:column;gap:12px;margin-bottom:24px">

        <a href="https://fdnet.dhammakaya.network/form/%E0%B8%84%E0%B8%B3%E0%B9%81%E0%B8%99%E0%B8%B0%E0%B8%99%E0%B8%B3-LAN-FDNET/%E0%B8%82%E0%B8%B1%E0%B9%89%E0%B8%99%E0%B8%95%E0%B8%AD%E0%B8%99%20update%20Patch%20windows%2010%20%E0%B9%80%E0%B8%9E%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%9B%E0%B9%89%E0%B8%AD%E0%B8%87%E0%B8%81%E0%B8%B1%E0%B8%99%E0%B8%A1%E0%B8%B1%E0%B8%A5%E0%B9%81%E0%B8%A7%E0%B8%A3%E0%B9%8C.pdf"
           target="_blank"
           style="display:flex;align-items:center;gap:14px;padding:16px 18px;border:1px solid var(--clr-border);border-radius:12px;background:var(--clr-surface);text-decoration:none;transition:box-shadow .2s,border-color .2s;"
           onmouseover="this.style.boxShadow=\'0 4px 16px rgba(0,0,0,.08)\';this.style.borderColor=\'var(--clr-primary)\'"
           onmouseout="this.style.boxShadow=\'none\';this.style.borderColor=\'var(--clr-border)\'">
          <span style="flex-shrink:0;width:40px;height:40px;background:#fee2e2;border-radius:10px;display:flex;align-items:center;justify-content:center;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
          </span>
          <span style="flex:1">
            <span style="display:block;font-weight:600;font-size:.92rem;color:var(--clr-text)">ขั้นตอน Update Patch Windows 10 เพื่อป้องกันมัลแวร์</span>
            <span style="display:block;font-size:.8rem;color:var(--clr-text-muted);margin-top:2px">วิธีการอัปเดต Patch เพื่อป้องกันภัยคุกคามและมัลแวร์บน Windows 10</span>
          </span>
          <span style="flex-shrink:0;color:var(--clr-text-muted)">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
          </span>
        </a>

        <a href="https://fdnet.dhammakaya.network/form/%E0%B8%84%E0%B8%B3%E0%B9%81%E0%B8%99%E0%B8%B0%E0%B8%99%E0%B8%B3-LAN-FDNET/%E0%B8%82%E0%B8%B1%E0%B9%89%E0%B8%99%E0%B8%95%E0%B8%AD%E0%B8%99%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%95%E0%B8%B4%E0%B8%94%E0%B8%95%E0%B8%B1%E0%B9%89%E0%B8%87%E0%B9%82%E0%B8%9B%E0%B8%A3%E0%B9%81%E0%B8%81%E0%B8%A3%E0%B8%A1%20Antivirus%20AVG%202015.pdf"
           target="_blank"
           style="display:flex;align-items:center;gap:14px;padding:16px 18px;border:1px solid var(--clr-border);border-radius:12px;background:var(--clr-surface);text-decoration:none;transition:box-shadow .2s,border-color .2s;"
           onmouseover="this.style.boxShadow=\'0 4px 16px rgba(0,0,0,.08)\';this.style.borderColor=\'var(--clr-primary)\'"
           onmouseout="this.style.boxShadow=\'none\';this.style.borderColor=\'var(--clr-border)\'">
          <span style="flex-shrink:0;width:40px;height:40px;background:#fee2e2;border-radius:10px;display:flex;align-items:center;justify-content:center;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
          </span>
          <span style="flex:1">
            <span style="display:block;font-weight:600;font-size:.92rem;color:var(--clr-text)">ขั้นตอนการติดตั้งโปรแกรม Antivirus AVG 2015</span>
            <span style="display:block;font-size:.8rem;color:var(--clr-text-muted);margin-top:2px">คู่มือติดตั้งและตั้งค่าโปรแกรมป้องกันไวรัส AVG 2015</span>
          </span>
          <span style="flex-shrink:0;color:var(--clr-text-muted)">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
          </span>
        </a>

        <a href="https://fdnet.dhammakaya.network/form/%E0%B8%84%E0%B8%B3%E0%B9%81%E0%B8%99%E0%B8%B0%E0%B8%99%E0%B8%B3-LAN-FDNET/%E0%B8%84%E0%B8%B9%E0%B9%88%E0%B8%A1%E0%B8%B7%E0%B8%AD%E0%B8%AD%E0%B8%B1%E0%B8%9E%E0%B9%80%E0%B8%94%E0%B8%95%20windows%2010.pdf"
           target="_blank"
           style="display:flex;align-items:center;gap:14px;padding:16px 18px;border:1px solid var(--clr-border);border-radius:12px;background:var(--clr-surface);text-decoration:none;transition:box-shadow .2s,border-color .2s;"
           onmouseover="this.style.boxShadow=\'0 4px 16px rgba(0,0,0,.08)\';this.style.borderColor=\'var(--clr-primary)\'"
           onmouseout="this.style.boxShadow=\'none\';this.style.borderColor=\'var(--clr-border)\'">
          <span style="flex-shrink:0;width:40px;height:40px;background:#fee2e2;border-radius:10px;display:flex;align-items:center;justify-content:center;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
          </span>
          <span style="flex:1">
            <span style="display:block;font-weight:600;font-size:.92rem;color:var(--clr-text)">คู่มืออัพเดต Windows 10</span>
            <span style="display:block;font-size:.8rem;color:var(--clr-text-muted);margin-top:2px">ขั้นตอนการอัปเดต Windows 10 ให้เป็นเวอร์ชันล่าสุด</span>
          </span>
          <span style="flex-shrink:0;color:var(--clr-text-muted)">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
          </span>
        </a>

      </div>

      <div style="background:#fefce8;border:1px solid #fde68a;border-radius:12px;padding:14px 18px;font-size:.88rem;color:#713f12;line-height:1.7;margin-top:20px">
        ⚠️ ควรอัปเดต Windows และ Antivirus สม่ำเสมออย่างน้อยเดือนละครั้ง เพื่อป้องกันภัยคุกคามใหม่ๆ
      </div>
    ',
  ],

  // ════════════════════════════════════════════
  // 3. การใช้งาน Domain
  // ════════════════════════════════════════════
  [
    'cat'   => 'domain',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>',
    'title' => 'การใช้งาน Domain',
    'desc'  => 'คู่มือการนำเครื่องคอมพิวเตอร์เข้าร่วม Domain ขององค์กร รองรับทุกระบบปฏิบัติการตั้งแต่ Mac OS X จนถึง Windows 11',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:24px">
        การนำเครื่องเข้า Domain ช่วยให้สามารถล็อกอินด้วย Account องค์กร
        และเข้าถึงทรัพยากรเครือข่ายต่างๆ ได้อย่างปลอดภัย
        กรุณาเตรียม <strong>Username และ Password</strong> ขององค์กรให้พร้อมก่อนเริ่ม
      </p>
      ' .
      make_accordion('dom1', 'คู่มือการนำเครื่องเข้า Domain สำหรับ Mac OS X', '', [
        [
          'title'   => 'คลิก Apple Menu → System Preferences',
          'desc'    => 'คลิกที่ Apple Logo มุมบนซ้าย แล้วเลือก <strong>System Preferences…</strong>',
          'img'     => '../assets/images/manual/domain/mac/mac1.png',
          'caption' => 'Apple Menu → System Preferences',
        ],
        [
          'title'   => 'คลิก Sharing',
          'desc'    => 'ในหน้า System Preferences ให้คลิกที่ <strong>Sharing</strong>',
          'img'     => '../assets/images/manual/domain/mac/mac2.png',
          'caption' => 'หน้า System Preferences — คลิก Sharing',
        ],
        [
          'title'   => 'ใส่ Computer Name แล้วรีสตาร์ทเครื่อง',
          'desc'    => 'ในช่อง <strong>Computer Name</strong> ให้พิมพ์ชื่อเครื่องที่ได้รับจากกองบริหารสารสนเทศ เช่น <strong>b306-vthaweeboon</strong> จากนั้นรีสตาร์ทเครื่อง 1 ครั้ง',
          'img'     => '../assets/images/manual/domain/mac/mac3.png',
          'caption' => 'กรอก Computer Name ในหน้า Sharing',
        ],
        [
          'title'   => 'กลับเข้า System Preferences → Users & Groups',
          'desc'    => 'หลังรีสตาร์ทแล้ว ให้ทำตามข้อ 1 อีกครั้ง แล้วคลิกเลือก <strong>Users &amp; Groups</strong>',
          'img'     => '../assets/images/manual/domain/mac/mac4.png',
          'caption' => 'System Preferences → Users & Groups',
        ],
        [
          'title'   => 'คลิก "Click the lock to make changes"',
          'desc'    => 'คลิกไอคอนกุญแจ <strong>"Click the lock to make changes."</strong> ที่มุมล่างซ้าย',
          'img'     => '../assets/images/manual/domain/mac/mac5.png',
          'caption' => 'คลิก Lock เพื่อปลดล็อกการแก้ไข',
        ],
        [
          'title'   => 'ใส่ Password ของ User เครื่อง',
          'desc'    => 'ระบบจะ Pop up ขึ้นมาให้กรอก <strong>Password</strong> ของ User เครื่อง แล้วคลิก <strong>Unlock</strong>',
          'img'     => '../assets/images/manual/domain/mac/mac6.png',
          'caption' => 'กรอก Password เครื่องแล้วคลิก Unlock',
        ],
        [
          'title'   => 'คลิก Login Options → Join',
          'desc'    => 'คลิก <strong>Login Options</strong> ในแถบซ้าย จากนั้นคลิกปุ่ม <strong>Join…</strong> ถัดจาก Network Account Server',
          'img'     => '../assets/images/manual/domain/mac/mac7.png',
          'caption' => 'Login Options → คลิก Join',
        ],
        [
          'title'   => 'คลิก Open Directory Utility…',
          'desc'    => 'ในหน้าต่างที่เปิดขึ้น ให้คลิกปุ่ม <strong>Open Directory Utility…</strong>',
          'img'     => '../assets/images/manual/domain/mac/mac8.png',
          'caption' => 'คลิก Open Directory Utility',
        ],
        [
          'title'   => 'Authenticate และคลิก Modify Configuration',
          'desc'    => 'คลิก <strong>Authenticating…</strong> จะมี Pop up ขึ้นมาให้ใส่ Password ของ User เครื่อง แล้วคลิก <strong>Modify Configuration</strong>',
          'img'     => '../assets/images/manual/domain/mac/mac9.png',
          'caption' => 'กรอก Password แล้วคลิก Modify Configuration',
        ],
        [
          'title'   => 'ดับเบิลคลิกที่ Active Directory',
          'desc'    => 'ในหน้าต่าง Directory Utility ให้ดับเบิลคลิกที่ <strong>Active Directory</strong>',
          'img'     => '../assets/images/manual/domain/mac/mac10.png',
          'caption' => 'ดับเบิลคลิก Active Directory ใน Directory Utility',
        ],
        [
          'title'   => 'กรอก Active Directory Domain และ Computer ID',
          'desc'    => 'ในช่อง <strong>Active Directory Domain</strong> ให้ใส่ <strong>dhammakaya.network</strong><br>ในช่อง <strong>Computer ID</strong> ให้ใส่ชื่อเครื่องที่ได้รับจากกองบริหารสารสนเทศ',
          'img'     => '../assets/images/manual/domain/mac/mac11.png',
          'caption' => 'กรอก Domain = dhammakaya.network และ Computer ID',
        ],
        [
          'title'   => 'คลิกแท็บ Administrative → ติ๊ก Prefer this domain server',
          'desc'    => 'คลิกแท็บ <strong>Administrative</strong> แล้วติ๊กถูกที่ช่อง <strong>Prefer this domain server</strong> และใส่ <strong>dhammakaya.network</strong> แล้วคลิก <strong>OK</strong>',
          'img'     => '../assets/images/manual/domain/mac/mac12.png',
          'caption' => 'Administrative tab → Prefer this domain server = dhammakaya.network',
        ],
        [
          'title'   => 'คลิก Bind และกรอก User&Password จากกองบริหารสารสนเทศ',
          'desc'    => 'คลิกปุ่ม <strong>Bind…</strong> จะมี Pop up <strong>Network Administrator Required</strong> ขึ้นมา ให้กรอก <strong>Username</strong> และ <strong>Password</strong> ที่ได้รับจากกองบริหารสารสนเทศ แล้วคลิก <strong>OK</strong> จากนั้น<strong>รีสตาร์ทเครื่อง 1 รอบ</strong>',
          'img'     => '../assets/images/manual/domain/mac/mac13.png',
          'caption' => 'กรอก Network Admin Credentials แล้วคลิก OK',
        ],
        [
          'title'   => 'Login ด้วย User&Password หน้าแดง',
          'desc'    => 'หลังรีสตาร์ทเครื่องแล้ว จะมีหน้าจอ Login ขึ้นมา ให้ใส่ <strong>Username</strong> และ <strong>Password หน้าแดง</strong> ที่ได้รับจากกองบริหารสารสนเทศ เพื่อเข้าใช้งาน Domain ได้ตามปกติ',
          'img'     => '../assets/images/manual/domain/mac/mac14.png',
          'caption' => 'หน้าจอ Login Mac หลังเข้า Domain สำเร็จ',
        ],
      ]) .
      make_accordion('dom3', 'คู่มือการนำเครื่องเข้า Domain สำหรับ Windows 7', '', [
        [
          'title'   => 'ข้อกำหนดก่อนเริ่มต้น',
          'desc'    => 'เครื่องคอมพิวเตอร์ที่สามารถเข้าเป็นสมาชิกของโดเมนได้ จะต้องติดตั้ง Windows ดังต่อไปนี้<br><br>
                       • <strong>Windows XP</strong> (Professional Edition)<br>
                       • <strong>Windows Vista หรือ Windows 7</strong> (Business, Ultimate หรือ Professional Edition)<br><br>
                       <span style="color:#dc2626"><strong>* Windows Home Edition ไม่สามารถนำเข้าโดเมนได้</strong></span><br><br>
                       คู่มือนี้จะกล่าวถึงเฉพาะขั้นตอนสำหรับ <strong>Windows Vista และ Windows 7</strong> เท่านั้น<br>
                       กรุณา Login ด้วยชื่อ <strong>User Admin ของเครื่อง</strong> ก่อนเริ่มดำเนินการ',
          'img'     => '../assets/images/manual/domain/win7/win7-0.png',
          'caption' => 'ข้อกำหนดระบบปฏิบัติการที่รองรับ',
        ],
        [
          'title'   => 'คลิก Start → คลิกขวา Computer → คลิก Properties',
          'desc'    => 'Login ด้วยชื่อ User Admin ของเครื่องก่อน จากนั้นคลิก <strong>Start</strong> แล้วคลิกขวาที่ <strong>Computer</strong> แล้วเลือก <strong>Properties</strong>',
          'img'     => '../assets/images/manual/domain/win7/win7-1.png',
          'caption' => 'Start → คลิกขวา Computer → Properties',
        ],
        [
          'title'   => 'คลิก Change settings',
          'desc'    => 'ในหน้า System ให้คลิก <strong>Change settings</strong> ที่ด้านขวาในส่วน Computer name, domain and workgroup settings',
          'img'     => '../assets/images/manual/domain/win7/win7-2.png',
          'caption' => 'คลิก Change settings ในหน้า System Properties',
        ],
        [
          'title'   => 'คลิก Change',
          'desc'    => 'ในหน้าต่าง System Properties แท็บ <strong>Computer Name</strong> ให้คลิกปุ่ม <strong>Change…</strong>',
          'img'     => '../assets/images/manual/domain/win7/win7-3.png',
          'caption' => 'คลิกปุ่ม Change ในแท็บ Computer Name',
        ],
        [
          'title'   => 'ใส่ Computer Name และติ๊ก Workgroup แล้วคลิก OK',
          'desc'    => 'ในช่อง <strong>Computer name</strong> ให้พิมพ์ชื่อเครื่องที่ได้รับจากกองบริหารสารสนเทศ เช่น <strong>b302-k</strong><br>จากนั้นติ๊กที่ <strong>Workgroup</strong> แล้วพิมพ์ <strong>WORKGROUP</strong> หรืออักษรอะไรก็ได้เพื่อให้ปุ่ม OK ทำงาน (Active) แล้วคลิก <strong>OK</strong>',
          'img'     => '../assets/images/manual/domain/win7/win7-4.png',
          'caption' => 'กรอก Computer Name และติ๊ก Workgroup แล้วคลิก OK',
        ],
        [
          'title'   => 'คลิก OK เพื่อยืนยัน',
          'desc'    => 'ระบบจะแจ้งว่าต้องรีสตาร์ทเครื่องเพื่อให้การเปลี่ยนแปลงมีผล ให้คลิก <strong>OK</strong>',
          'img'     => '../assets/images/manual/domain/win7/win7-5.png',
          'caption' => 'คลิก OK ยืนยันการเปลี่ยน Computer Name',
        ],
        [
          'title'   => 'คลิก Close',
          'desc'    => 'คลิกปุ่ม <strong>Close</strong> ในหน้าต่าง System Properties',
          'img'     => '../assets/images/manual/domain/win7/win7-6.png',
          'caption' => 'คลิก Close ปิดหน้าต่าง System Properties',
        ],
        [
          'title'   => 'คลิก Restart Now',
          'desc'    => 'ระบบจะถามว่าต้องการรีสตาร์ทเดี๋ยวนี้หรือไม่ ให้คลิก <strong>Restart Now</strong>',
          'img'     => '../assets/images/manual/domain/win7/win7-7.png',
          'caption' => 'คลิก Restart Now เพื่อรีสตาร์ทเครื่อง',
        ],
        [
          'title'   => 'หลัง Restart — เข้า Computer → Properties อีกครั้ง แล้วคลิก Change settings',
          'desc'    => 'เมื่อเครื่อง Restart เสร็จแล้ว ให้เข้าที่ <strong>Computer → Properties</strong> อีกครั้ง จากนั้นคลิก <strong>Change settings</strong>',
          'img'     => '../assets/images/manual/domain/win7/win7-8.png',
          'caption' => 'กลับเข้า Computer → Properties → Change settings อีกครั้ง',
        ],
        [
          'title'   => 'คลิก Change อีกครั้ง',
          'desc'    => 'ในหน้าต่าง System Properties แท็บ <strong>Computer Name</strong> ให้คลิกปุ่ม <strong>Change…</strong> อีกครั้ง',
          'img'     => '../assets/images/manual/domain/win7/win7-9.png',
          'caption' => 'คลิก Change อีกครั้งเพื่อเข้า Domain',
        ],
        [
          'title'   => 'ติ๊ก Domain แล้วพิมพ์ dhammakaya.network',
          'desc'    => 'ในส่วน Member of ให้เลือก <strong>Domain</strong> แล้วพิมพ์ <strong>dhammakaya.network</strong> จากนั้นคลิก <strong>OK</strong>',
          'img'     => '../assets/images/manual/domain/win7/win7-10.png',
          'caption' => 'ติ๊ก Domain และพิมพ์ dhammakaya.network',
        ],
        [
          'title'   => 'ใส่ Username และ Password ที่ได้รับจากกองบริหารสารสนเทศ แล้วคลิก OK',
          'desc'    => 'ระบบจะ Pop up <strong>Windows Security</strong> ขึ้นมา ให้กรอก <strong>Username</strong> และ <strong>Password</strong> ที่ได้รับจากกองบริหารสารสนเทศ แล้วคลิก <strong>OK</strong>',
          'img'     => '../assets/images/manual/domain/win7/win7-11.png',
          'caption' => 'กรอก Username/Password แล้วคลิก OK',
        ],
        [
          'title'   => 'คลิก OK — Welcome to the domain',
          'desc'    => 'ระบบจะแสดงข้อความ <strong>"Welcome to the dkc.net domain."</strong> ให้คลิก <strong>OK</strong>',
          'img'     => '../assets/images/manual/domain/win7/win7-12.png',
          'caption' => 'Welcome to the domain — คลิก OK',
        ],
        [
          'title'   => 'คลิก OK เพื่อยืนยันการรีสตาร์ท',
          'desc'    => 'ระบบจะแจ้งให้รีสตาร์ทเครื่อง ให้คลิก <strong>OK</strong>',
          'img'     => '../assets/images/manual/domain/win7/win7-13.png',
          'caption' => 'คลิก OK ยืนยันการรีสตาร์ท',
        ],
        [
          'title'   => 'คลิก Close',
          'desc'    => 'คลิกปุ่ม <strong>Close</strong> ในหน้าต่าง System Properties จะเห็นว่า Domain เปลี่ยนเป็น <strong>dkc.net</strong> แล้ว',
          'img'     => '../assets/images/manual/domain/win7/win7-14.png',
          'caption' => 'คลิก Close — Domain แสดงเป็น dkc.net แล้ว',
        ],
        [
          'title'   => 'Restart เครื่อง',
          'desc'    => 'รีสตาร์ทเครื่องอีก 1 ครั้งเพื่อให้การเข้า Domain มีผลสมบูรณ์',
          'img'     => '../assets/images/manual/domain/win7/win7-15.png',
          'caption' => 'รีสตาร์ทเครื่องเพื่อให้การเข้า Domain มีผล',
        ],
        [
          'title'   => 'Login ด้วย Username ที่ได้รับจากกองบริหารสารสนเทศ',
          'desc'    => 'หลัง Restart เครื่องแล้ว จะสามารถ Login เข้าใช้งานได้ด้วย <strong>Username</strong> และ <strong>Password</strong> ที่ได้รับจากกองบริหารสารสนเทศ',
          'img'     => '../assets/images/manual/domain/win7/win7-0.png',
          'caption' => 'Login ด้วย Username จากกองบริหารสารสนเทศหลังเข้า Domain สำเร็จ',
        ],
      ]) .
      make_accordion('dom4', 'คู่มือการนำเครื่องเข้า Domain สำหรับ Windows 8', '', [
        [
          'title'   => 'ข้อกำหนดก่อนเริ่มต้น',
          'desc'    => 'ก่อนเริ่มต้น ท่านจะต้องได้รับข้อมูลจากศูนย์เครือข่ายคอมพิวเตอร์ดังนี้<br><br>
                      • <strong>Username</strong> เช่น pmaha<br>
                      • <strong>Password</strong> เช่น p+123456<br>
                      • <strong>Computer Name</strong> เช่น b307-sw<br><br>
                      <span style="color:#dc2626"><strong>หมายเหตุ:</strong></span> สำหรับ Notebook ต้องนำเครื่องเข้า Domain ผ่านสายแลนให้เรียบร้อยก่อน จึงจะสามารถปรับไปใช้งานผ่าน WiFi ได้<br><br>
                      หากมีข้อสงสัย ติดต่อได้ที่เบอร์โทร. <strong>4141</strong>',
          'img'     => '../assets/images/manual/domain/win8/win8-0.png',
          'caption' => 'ข้อมูลที่ต้องเตรียมก่อนเริ่ม Join Domain',
        ],
        [
          'title'   => 'คลิกขวาที่ This PC → Properties → Change settings',
          'desc'    => 'คลิกขวาที่ <strong>This PC</strong> แล้วคลิกที่ <strong>Properties</strong> จากนั้นคลิก <strong>Change settings</strong>',
          'img'     => '../assets/images/manual/domain/win8/win8-1.png',
          'caption' => 'คลิกขวา This PC → Properties',
        ],
        [
          'title'   => 'หน้า System Properties ขึ้นมา แล้วคลิกที่ Change',
          'desc'    => 'ในหน้าต่าง <strong>System Properties</strong> ให้คลิกปุ่ม <strong>Change…</strong>',
          'img'     => '../assets/images/manual/domain/win8/win8-2.png',
          'caption' => 'หน้า System Properties — คลิก Change',
        ],
        [
          'title'   => 'ใส่ Computer Name ติ๊ก Workgroup แล้วคลิก OK',
          'desc'    => 'ในช่อง <strong>Computer name</strong> ให้พิมพ์ชื่อเครื่องที่ได้รับจากศูนย์เครือข่ายคอมพิวเตอร์<br>
                      จากนั้นติ๊กที่ <strong>Workgroup</strong> แล้วพิมพ์ <strong>WORKGROUP</strong> หรืออักษรอะไรก็ได้เพื่อให้ปุ่ม OK ทำงาน (Active) แล้วคลิก <strong>OK</strong>',
          'img'     => '../assets/images/manual/domain/win8/win8-3.png',
          'caption' => 'กรอก Computer Name และติ๊ก Workgroup แล้วคลิก OK',
        ],
        [
          'title'   => 'เครื่องจะให้ Restart คลิก OK',
          'desc'    => 'ระบบจะแจ้งให้รีสตาร์ทเครื่อง ให้คลิก <strong>OK</strong> แล้วรีสตาร์ทเครื่อง',
          'img'     => '../assets/images/manual/domain/win8/win8-4.png',
          'caption' => 'คลิก OK และรีสตาร์ทเครื่อง',
        ],
        [
          'title'   => 'หลัง Restart — ไปที่ System → Change settings → Change แล้วติ๊ก Domain พิมพ์ dhammakaya.network',
          'desc'    => 'เปิดเครื่องแล้ว ทำเหมือนเดิม ไปที่ <strong>System → Change settings</strong> ขึ้นหน้า System Properties แล้วคลิกที่ <strong>Change</strong><br>
                      จะขึ้นหน้า Computer Name/Domain Changes ให้เลือกที่ <strong>Domain</strong> พิมพ์คำว่า <strong>dhammakaya.network</strong> แล้วกด <strong>OK</strong>',
          'img'     => '../assets/images/manual/domain/win8/win8-5.png',
          'caption' => 'ติ๊ก Domain พิมพ์ dhammakaya.network แล้วกด OK',
        ],
        [
          'title'   => 'ใส่ User/Password ที่ได้รับจากศูนย์คอมฯ แล้วคลิก OK',
          'desc'    => 'ระบบจะ Pop up <strong>Windows Security</strong> ขึ้นมา ให้กรอก <strong>Username</strong> และ <strong>Password</strong> ที่ได้รับจากศูนย์เครือข่ายคอมพิวเตอร์ แล้วคลิก <strong>OK</strong>',
          'img'     => '../assets/images/manual/domain/win8/win8-6.png',
          'caption' => 'กรอก Username/Password แล้วคลิก OK',
        ],
        [
          'title'   => 'Join Domain สำเร็จ — Welcome to the dhammakaya.network domain แล้ว Restart',
          'desc'    => 'เมื่อ Join Domain สำเร็จ จะขึ้นข้อความ <strong>"Welcome to the dhammakaya.network domain"</strong> ให้กด <strong>OK</strong> แล้วเครื่องจะ Restart อีกครั้ง เสร็จขั้นตอนการ Join Domain',
          'img'     => '../assets/images/manual/domain/win8/win8-7.png',
          'caption' => 'Welcome to the dhammakaya.network domain — กด OK และ Restart',
        ],
      ]) .
      make_accordion('dom5', 'คู่มือการนำเครื่องเข้า Domain สำหรับ Windows 10', '', [
        [
          'title'   => 'ข้อกำหนดก่อนเริ่มต้น',
          'desc'    => 'ต้องมี <strong>Computer Name</strong> ที่ทางศูนย์คอมฯออกให้ก่อน<br><br>
                      หากยังไม่มี Computer Name ให้ส่งเมลขอมาที่ <a href="mailto:noc@dhammakaya.center" style="color:var(--clr-primary);font-weight:600">noc@dhammakaya.center</a> พร้อมแจ้ง <strong>User (หน้าแดง)</strong> ที่จะใช้ Login คอมพิวเตอร์เครื่องนั้นมาด้วย<br><br>
                      หากมีข้อสงสัยหรือสอบถามรายละเอียดเพิ่มเติม โทร <strong>14141</strong> / Line: <strong>it4141</strong>',
          'img'     => '../assets/images/manual/domain/win10/win10-0.png',
          'caption' => 'ข้อกำหนดก่อนเริ่ม Join Domain',
        ],
        [
          'title'   => 'Login ด้วย User Admin ของเครื่อง แล้วคลิกขวาที่ This PC → Properties',
          'desc'    => 'Login เข้าเครื่องด้วย <strong>User Admin ของเครื่อง</strong> ก่อน จากนั้นคลิกขวาที่ <strong>This PC</strong> แล้วเลือก <strong>Properties</strong>',
          'img'     => '../assets/images/manual/domain/win10/win10-1.png',
          'caption' => 'คลิกขวา This PC → Properties',
        ],
        [
          'title'   => 'เลือก Change settings แล้วเลือก Change',
          'desc'    => 'ในหน้า System ให้คลิก <strong>Change settings</strong> <span style="color:#dc2626">(1)</span> จากนั้นในหน้าต่าง System Properties ให้คลิกปุ่ม <strong>Change…</strong> <span style="color:#dc2626">(2)</span>',
          'img'     => '../assets/images/manual/domain/win10/win10-2.png',
          'caption' => 'คลิก Change settings แล้วคลิก Change',
        ],
        [
          'title'   => 'ใส่ Computer Name ที่ทางศูนย์คอมฯออกให้ แล้วคลิก OK',
          'desc'    => 'ในช่อง <strong>Computer name</strong> <span style="color:#dc2626">(1)</span> ให้พิมพ์ชื่อเครื่องที่ได้รับจากกองบริหารสารสนเทศ จากนั้นคลิก <strong>OK</strong> <span style="color:#dc2626">(2)</span>',
          'img'     => '../assets/images/manual/domain/win10/win10-3.png',
          'caption' => 'กรอก Computer Name แล้วคลิก OK',
        ],
        [
          'title'   => 'เครื่องจะ Restart ให้เลือก OK',
          'desc'    => 'ระบบจะแจ้งให้รีสตาร์ทเครื่อง ให้คลิก <strong>OK</strong> แล้วรีสตาร์ทเครื่อง',
          'img'     => '../assets/images/manual/domain/win10/win10-4.png',
          'caption' => 'คลิก OK และรีสตาร์ทเครื่อง',
        ],
        [
          'title'   => 'หลัง Restart — ทำตามข้อ 2 และ 3 อีกครั้ง แล้วติ๊ก Domain พิมพ์ dhammakaya.network',
          'desc'    => 'เมื่อเครื่อง Start ขึ้นมาแล้ว ให้ทำตามขั้นตอนที่ 2 และ 3 อีกครั้ง จากนั้นคลิกปุ่ม <strong>Change…</strong> แล้วในส่วน Member of ให้เลือก <strong>Domain</strong> <span style="color:#dc2626">(1)</span> แล้วพิมพ์ <strong>dhammakaya.network</strong> จากนั้นคลิก <strong>OK</strong> <span style="color:#dc2626">(2)</span>',
          'img'     => '../assets/images/manual/domain/win10/win10-5.png',
          'caption' => 'ติ๊ก Domain พิมพ์ dhammakaya.network แล้วคลิก OK',
        ],
        [
          'title'   => 'ใส่ User และ Password (หน้าแดง) ที่มีสิทธิ์ Join Domain แล้วคลิก OK',
          'desc'    => 'ระบบจะ Pop up <strong>Windows Security</strong> ขึ้นมา ให้กรอก <strong>Username</strong> <span style="color:#dc2626">(1)</span> และ <strong>Password (หน้าแดง)</strong> ที่มีสิทธิ์ Join Domain แล้วคลิก <strong>OK</strong> <span style="color:#dc2626">(2)</span>',
          'img'     => '../assets/images/manual/domain/win10/win10-6.png',
          'caption' => 'กรอก Username/Password หน้าแดง แล้วคลิก OK',
        ],
        [
          'title'   => 'Join Domain สำเร็จ — Welcome to the dhammakaya.network แล้วคลิก OK',
          'desc'    => 'เมื่อ Join Domain สำเร็จ ระบบจะแสดงข้อความ <strong>"Welcome to the dhammakaya.network"</strong> ให้คลิก <strong>OK</strong> แล้วเครื่องจะ Restart อีกครั้ง',
          'img'     => '../assets/images/manual/domain/win10/win10-7.png',
          'caption' => 'Welcome to the dhammakaya.network — คลิก OK',
        ],
        [
          'title'   => 'เลือก Other User แล้ว Login ด้วย User และ Password (หน้าแดง)',
          'desc'    => 'เมื่อ Restart ขึ้นมาใหม่ ให้เลือก <strong>Other user</strong> <span style="color:#dc2626">(1)</span> ที่มุมซ้ายล่าง จากนั้น Login ด้วย <strong>Username</strong> และ <strong>Password (หน้าแดง)</strong> <span style="color:#dc2626">(2)</span> เสร็จสิ้นขั้นตอนการ Join Domain',
          'img'     => '../assets/images/manual/domain/win10/win10-8.png',
          'caption' => 'เลือก Other user แล้ว Login ด้วย User หน้าแดง',
        ],
      ]) .
      make_accordion('dom6', 'คู่มือการนำเครื่องเข้า Domain สำหรับ Windows 11', '', [
        [
          'title'   => 'ข้อกำหนดก่อนเริ่มต้น',
          'desc'    => 'ต้องมี <strong>Computer Name</strong> ที่ทางกองบริหารสารสนเทศออกให้ก่อน<br><br>
                        หากยังไม่มี Computer Name ให้ส่งเมลขอมาที่ <a href="mailto:noc@dhammakaya.center" style="color:var(--clr-primary);font-weight:600">noc@dhammakaya.center</a> พร้อมแจ้ง <strong>User (หน้าแดง)</strong> ที่จะใช้ Login คอมพิวเตอร์เครื่องนั้นมาด้วย<br><br>
                        หากมีข้อสงสัยหรือสอบถามรายละเอียดเพิ่มเติม โทร <strong>14141</strong> / Line: <strong>it4141</strong>',
          'img'     => '../assets/images/manual/domain/win11/win11-0.png',
          'caption' => 'ข้อกำหนดก่อนเริ่ม Join Domain',
        ],
        [
          'title'   => 'Login ด้วย User Admin ของเครื่อง แล้วคลิกขวาที่ Start → Settings',
          'desc'    => 'Login เข้าเครื่องด้วย <strong>User Admin ของเครื่อง</strong> ก่อน จากนั้นคลิกขวาที่ปุ่ม <strong>Start</strong> แล้วเลือก <strong>Settings</strong>',
          'img'     => '../assets/images/manual/domain/win11/win11-1.png',
          'caption' => 'คลิกขวา Start → Settings',
        ],
        [
          'title'   => 'เลือก System → About',
          'desc'    => 'ในหน้า Settings ให้คลิก <strong>System</strong> ในแถบซ้าย จากนั้นเลือก <strong>About</strong> ที่อยู่ด้านล่างสุด',
          'img'     => '../assets/images/manual/domain/win11/win11-2.png',
          'caption' => 'Settings → System → About',
        ],
        [
          'title'   => 'คลิก Domain or workgroup',
          'desc'    => 'ในหน้า System → About ให้คลิกที่ <strong>Domain or workgroup</strong> ในส่วน Related links',
          'img'     => '../assets/images/manual/domain/win11/win11-3.png',
          'caption' => 'คลิก Domain or workgroup ใน Related links',
        ],
        [
          'title'   => 'คลิก Change แล้วใส่ Computer Name และคลิก OK',
          'desc'    => 'ในหน้าต่าง System Properties ให้คลิกปุ่ม <strong>Change…</strong> จากนั้นในช่อง <strong>Computer name</strong> ให้พิมพ์ชื่อเครื่องที่ได้รับจากกองบริหารสารสนเทศ แล้วคลิก <strong>OK</strong>',
          'img'     => '../assets/images/manual/domain/win11/win11-4.png',
          'caption' => 'กรอก Computer Name แล้วคลิก OK',
        ],
        [
          'title'   => 'เครื่องจะ Restart ให้เลือก OK',
          'desc'    => 'ระบบจะแจ้งว่าต้องรีสตาร์ทเครื่องเพื่อให้การเปลี่ยนแปลงมีผล ให้คลิก <strong>OK</strong> แล้วรีสตาร์ทเครื่อง',
          'img'     => '../assets/images/manual/domain/win11/win11-5.png',
          'caption' => 'คลิก OK และรีสตาร์ทเครื่อง',
        ],
        [
          'title'   => 'หลัง Restart — ทำตามข้อ 2 และ 3 อีกครั้ง แล้วติ๊ก Domain พิมพ์ dhammakaya.network',
          'desc'    => 'เมื่อเครื่อง Start ขึ้นมาแล้ว ให้ทำตามขั้นตอนที่ 2 และ 3 อีกครั้ง จากนั้นคลิกปุ่ม <strong>Change…</strong> แล้วในส่วน Member of ให้เลือก <strong>Domain</strong> แล้วพิมพ์ <strong>dhammakaya.network</strong> จากนั้นคลิก <strong>OK</strong>',
          'img'     => '../assets/images/manual/domain/win11/win11-6.png',
          'caption' => 'ติ๊ก Domain พิมพ์ dhammakaya.network แล้วคลิก OK',
        ],
        [
          'title'   => 'ใส่ User และ Password (หน้าแดง) ที่มีสิทธิ์ Join Domain แล้วคลิก OK',
          'desc'    => 'ระบบจะ Pop up <strong>Windows Security</strong> ขึ้นมา ให้กรอก <strong>Username</strong> และ <strong>Password (หน้าแดง)</strong> ที่มีสิทธิ์ Join Domain แล้วคลิก <strong>OK</strong>',
          'img'     => '../assets/images/manual/domain/win11/win11-7.png',
          'caption' => 'กรอก Username/Password หน้าแดง แล้วคลิก OK',
        ],
        [
          'title'   => 'Join Domain สำเร็จ — Welcome to the dhammakaya.network แล้วคลิก OK',
          'desc'    => 'เมื่อ Join Domain สำเร็จ ระบบจะแสดงข้อความ <strong>"Welcome to the dhammakaya.network"</strong> ให้คลิก <strong>OK</strong> แล้วเครื่องจะ Restart อีกครั้ง',
          'img'     => '../assets/images/manual/domain/win11/win11-8.png',
          'caption' => 'Welcome to the dhammakaya.network — คลิก OK',
        ],
        [
          'title'   => 'เลือก Other User แล้ว Login ด้วย User และ Password (หน้าแดง)',
          'desc'    => 'เมื่อ Restart ขึ้นมาใหม่ ให้เลือก <strong>Other user</strong> ที่มุมซ้ายล่าง จากนั้น Login ด้วย <strong>Username</strong> และ <strong>Password (หน้าแดง)</strong> เสร็จสิ้นขั้นตอนการ Join Domain',
          'img'     => '../assets/images/manual/domain/win11/win11-9.png',
          'caption' => 'เลือก Other user แล้ว Login ด้วย User หน้าแดง',
        ],
      ]) . '
      <div style="background:#eff6ff;border:1px solid #bfdbfe;border-radius:12px;padding:14px 18px;font-size:.88rem;color:#1e3a8a;line-height:1.7;margin-top:20px">
        💡 หากพบปัญหาระหว่างการเข้า Domain เช่น เครื่องไม่พบ Domain หรือ Credentials ไม่ถูกต้อง กรุณาติดต่อกองบริหารสารสนเทศ โทร <strong>4141</strong>
      </div>
    ',
  ],

  // ════════════════════════════════════════════
  // 4. การตั้งค่าและเครื่องมือเพิ่มเติม
  // ════════════════════════════════════════════
  [
    'cat'   => 'tools',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>',
    'title' => 'การตั้งค่าและเครื่องมือเพิ่มเติม',
    'desc'  => 'คู่มือการปรับแต่ง Browser Chrome Flags และเครื่องมือเพิ่มเติมสำหรับการทำงาน',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:24px">
        คู่มือหมวดนี้รวบรวมวิธีการปรับแต่งการตั้งค่าขั้นสูงของโปรแกรมต่างๆ
        เพื่อเพิ่มประสิทธิภาพการทำงาน
      </p>

      <div style="display:flex;flex-direction:column;gap:12px;margin-bottom:24px">

        <a href="https://fdnet.dhammakaya.network/form/%E0%B8%84%E0%B8%B3%E0%B9%81%E0%B8%99%E0%B8%B0%E0%B8%99%E0%B8%B3-LAN-FDNET/%E0%B8%84%E0%B8%B9%E0%B9%88%E0%B8%A1%E0%B8%B7%E0%B8%AD%E0%B8%9B%E0%B8%A3%E0%B8%B1%E0%B8%9A%20Browser%20Chrome%20Flags.pdf"
           target="_blank"
           style="display:flex;align-items:center;gap:14px;padding:16px 18px;border:1px solid var(--clr-border);border-radius:12px;background:var(--clr-surface);text-decoration:none;transition:box-shadow .2s,border-color .2s;"
           onmouseover="this.style.boxShadow=\'0 4px 16px rgba(0,0,0,.08)\';this.style.borderColor=\'var(--clr-primary)\'"
           onmouseout="this.style.boxShadow=\'none\';this.style.borderColor=\'var(--clr-border)\'">
          <span style="flex-shrink:0;width:40px;height:40px;background:#fee2e2;border-radius:10px;display:flex;align-items:center;justify-content:center;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
          </span>
          <span style="flex:1">
            <span style="display:block;font-weight:600;font-size:.92rem;color:var(--clr-text)">คู่มือการปรับ Browser Chrome Flags</span>
            <span style="display:block;font-size:.8rem;color:var(--clr-text-muted);margin-top:2px">วิธีการปรับแต่งการตั้งค่าขั้นสูงของ Google Chrome</span>
          </span>
          <span style="flex-shrink:0;color:var(--clr-text-muted)">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
          </span>
        </a>

      </div>

      <div style="background:#fef9c3;border:1px solid #fde68a;border-radius:12px;padding:14px 18px;font-size:.88rem;color:#713f12;line-height:1.7">
        ⚠️ การเปลี่ยน Chrome Flags อาจส่งผลต่อเสถียรภาพของ Browser หากพบปัญหาสามารถคลิก <strong>Reset all to default</strong> ใน chrome://flags ได้ทันที
      </div>
    ',
  ],

  // ═══════════════════════════════════════════
  // 5. เอกสารและคู่มืออ้างอิงระบบ
  // ═══════════════════════════════════════════
  [
    'cat'   => 'documents',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>',
    'title' => 'เอกสารระบบ',
    'desc'  => 'เอกสารและคู่มืออ้างอิงระบบ คพ. สำหรับกองบริหารสารสนเทศ',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:24px">
        เอกสารระบบเหล่านี้เป็นเอกสารอ้างอิงอย่างเป็นทางการที่ใช้ภายในองค์กร
        กรุณาตรวจสอบให้ใช้ Version ล่าสุดเสมอ
      </p>

      <div style="display:flex;flex-direction:column;gap:12px;margin-bottom:24px">

        <a href="https://fdnet.dhammakaya.network/form/%E0%B8%84%E0%B8%B3%E0%B9%81%E0%B8%99%E0%B8%B0%E0%B8%99%E0%B8%B3-LAN-FDNET/%E0%B8%84%E0%B8%9E.%203.3_v.2560_original.pdf"
           target="_blank"
           style="display:flex;align-items:center;gap:14px;padding:16px 18px;border:1px solid var(--clr-border);border-radius:12px;background:var(--clr-surface);text-decoration:none;transition:box-shadow .2s,border-color .2s;"
           onmouseover="this.style.boxShadow=\'0 4px 16px rgba(0,0,0,.08)\';this.style.borderColor=\'var(--clr-primary)\'"
           onmouseout="this.style.boxShadow=\'none\';this.style.borderColor=\'var(--clr-border)\'">
          <span style="flex-shrink:0;width:40px;height:40px;background:#fee2e2;border-radius:10px;display:flex;align-items:center;justify-content:center;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
          </span>
          <span style="flex:1">
            <span style="display:block;font-weight:600;font-size:.92rem;color:var(--clr-text)">เอกสาร คพ. 3.3_v.2560_original</span>
            <span style="display:block;font-size:.8rem;color:var(--clr-text-muted);margin-top:2px">มาตรฐานการจัดทำเอกสารสารสนเทศฉบับดั้งเดิม</span>
          </span>
          <span style="flex-shrink:0;color:var(--clr-text-muted)">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
          </span>
        </a>

        <a href="https://fdnet.dhammakaya.network/form/%E0%B8%84%E0%B8%B3%E0%B9%81%E0%B8%99%E0%B8%B0%E0%B8%99%E0%B8%B3-LAN-FDNET/%E0%B8%84%E0%B8%B9%E0%B9%88%E0%B8%A1%E0%B8%B7%E0%B8%AD%20%E0%B8%84%E0%B8%9E.FDnet.pdf"
           target="_blank"
           style="display:flex;align-items:center;gap:14px;padding:16px 18px;border:1px solid var(--clr-border);border-radius:12px;background:var(--clr-surface);text-decoration:none;transition:box-shadow .2s,border-color .2s;"
           onmouseover="this.style.boxShadow=\'0 4px 16px rgba(0,0,0,.08)\';this.style.borderColor=\'var(--clr-primary)\'"
           onmouseout="this.style.boxShadow=\'none\';this.style.borderColor=\'var(--clr-border)\'">
          <span style="flex-shrink:0;width:40px;height:40px;background:#fee2e2;border-radius:10px;display:flex;align-items:center;justify-content:center;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
          </span>
          <span style="flex:1">
            <span style="display:block;font-weight:600;font-size:.92rem;color:var(--clr-text)">คู่มือเอกสาร คพ. FDnet</span>
            <span style="display:block;font-size:.8rem;color:var(--clr-text-muted);margin-top:2px">มาตรฐานการจัดทำเอกสารสารสนเทศระบบเครือข่าย FDnet</span>
          </span>
          <span style="flex-shrink:0;color:var(--clr-text-muted)">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
          </span>
        </a>

      </div>

      <div style="background:#f0fdf4;border:1px solid #bbf7d0;border-radius:12px;padding:14px 18px;font-size:.88rem;color:#166534;line-height:1.7">
        📥 เอกสารทั้งหมดอัปเดตล่าสุด <strong>มกราคม 2568</strong> สอบถามเพิ่มเติม: <a href="mailto:ict@watphrathammakaya.ac.th" style="color:#166534;font-weight:600">ict@watphrathammakaya.ac.th</a>
      </div>
    ',
  ],

];

require_once '../includes/header.php';
?>

<?php
$panel_title   = 'คู่มือการใช้งานระบบ';
$panel_cat     = $cat;
$panel_base    = 'manual.php';
$panel_menu    = $sections;
$panel_items   = $manual_items;
$panel_contact = false;
?>

<!-- ─── Accordion Styles ─── -->
<style>
  /* Accordion wrapper */
  .accordion {
    border: 1px solid var(--clr-border);
    border-radius: 14px;
    margin-bottom: 10px;
    overflow: hidden;
    background: var(--clr-surface, #fff);
    transition: box-shadow .2s;
  }

  .accordion.is-open {
    box-shadow: 0 4px 20px rgba(0, 0, 0, .08);
  }

  /* Button */
  .accordion__btn {
    width: 100%;
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 15px 18px;
    background: none;
    border: none;
    cursor: pointer;
    text-align: left;
    font-family: inherit;
    transition: background .15s;
  }

  .accordion__btn:hover {
    background: var(--clr-primary-pale, #eff6ff);
  }

  .accordion.is-open .accordion__btn {
    background: var(--clr-primary-pale, #eff6ff);
    border-bottom: 1px solid var(--clr-border);
  }

  .accordion__icon {
    font-size: 1.15rem;
    flex-shrink: 0;
  }

  .accordion__title {
    flex: 1;
    font-size: .92rem;
    font-weight: 600;
    color: var(--clr-text);
    line-height: 1.4;
  }

  .accordion__arrow {
    flex-shrink: 0;
    color: var(--clr-text-muted);
    transition: transform .25s;
    display: flex;
  }

  .accordion.is-open .accordion__arrow {
    transform: rotate(180deg);
  }

  /* Body */
  .accordion__body {
    max-height: 0;
    overflow: hidden;
    transition: max-height .35s cubic-bezier(.4, 0, .2, 1);
  }

  .accordion.is-open .accordion__body {
    max-height: 9999px;
  }

  .accordion__inner {
    padding: 20px 20px 24px;
    display: flex;
    flex-direction: column;
    gap: 24px;
  }

  /* Step block */
  .step-block {
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  .step-header {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .step-num {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    background: var(--clr-primary, #2563eb);
    color: #fff;
    font-size: .78rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }

  .step-title {
    font-weight: 600;
    font-size: .9rem;
    color: var(--clr-text);
  }

  .step-body {
    padding-left: 38px;
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  .step-desc {
    font-size: .875rem;
    line-height: 1.75;
    color: var(--clr-text);
    margin: 0;
  }

  .step-desc code {
    background: #f1f5f9;
    padding: 1px 6px;
    border-radius: 4px;
    font-family: 'Courier New', monospace;
    font-size: .85em;
    color: #dc2626;
  }

  /* Step image placeholder */
  .step-img-wrap {
    display: flex;
    flex-direction: column;
    gap: 6px;
  }

  .step-img-placeholder {
    width: 100%;
    min-height: 160px;
    background: #f3f4f6;
    border: 2px dashed #d1d5db;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: 20px;
  }

  .step-img-label {
    font-size: .8rem;
    font-weight: 600;
    color: #6b7280;
  }

  .step-img-hint {
    font-size: .72rem;
    color: #9ca3af;
  }

  .step-img-caption {
    font-size: .78rem;
    color: var(--clr-text-muted);
    font-style: italic;
    margin: 0;
    text-align: center;
  }
</style>

<script>
  function toggleAcc(id) {
    const el = document.getElementById(id);
    if (!el) return;
    const isOpen = el.classList.contains('is-open');
    el.classList.toggle('is-open', !isOpen);
  }
</script>

<main class="layout__main">
  <nav class="breadcrumb">
    <a href="../index.php">หน้าหลัก</a>
    <span class="breadcrumb__sep">›</span>
    <span><?= $cat && isset($sections[$cat]) ? htmlspecialchars($sections[$cat]['label']) : 'คู่มือการใช้งานระบบ' ?></span>
  </nav>

  <?php require_once '../includes/single-panel.php'; ?>
</main>

<?php require_once '../includes/footer.php'; ?>