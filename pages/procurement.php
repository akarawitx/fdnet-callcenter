<?php
// pages/procurement.php — Procurement
require_once '../includes/config.php';

$page_title = 'ระบบจัดหาอุปกรณ์สารสนเทศ';
$cat = $_GET['cat'] ?? '';

$categories = [
  'accessControl'     => ['label' => 'Access Control'],
  'cctv'              => ['label' => 'CCTV'],
  'vpn&mail'          => ['label' => 'VPN, Mail องค์กร'],
  'gbn'               => ['label' => 'กล่องสัญญาณ GBN'],
  'led'               => ['label' => 'จอ LED'],
  'server'            => ['label' => 'Server'],
  'wifi&lan'          => ['label' => 'Wi-Fi , LAN'],
  'telephonebill'     => ['label' => 'ค่าบริการโทรศัพท์'],
  'printDocument'     => ['label' => 'ถ่ายเอกสาร'],
  'fileShred'         => ['label' => 'File Share'],
  'training'          => ['label' => 'อบรมความรู้สารสนเทศ'],
  'it&com'            => ['label' => 'ยืม คืน ซ่อมอุปกรณ์คอมพิวเตอร์'],
  'video'             => ['label' => 'จัดซื้อ ยืม คืน เเจ้งซ่อมอุปกรณ์มัลติมีเดีย'],
  'audio'             => ['label' => 'จัดซื้อ ยืม คืน เเจ้งซ่อมอุปกรณ์เครื่องเสียง'],
  'radio'             => ['label' => 'ยืม-คืน/เเจ้งซ่อมวิทยุสื่อสาร'],
  'location'          => ['label' => 'การขอใช้งานสถานที่'],
];

$guides = [
  // Access Control
  [
    'cat'   => 'accessControl',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>',
    'title' => 'Access Control',
    'desc'  => 'ขั้นตอนการขอใช้งาน Access Control สำหรับบุคลากรที่ต้องการเข้าถึงระบบภายในองค์กร',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        1. <a href="https://fdnet.dhammakaya.network/form/%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%9F%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%A1/old/old2/%E0%B8%84%E0%B8%9E.xx%20%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%9F%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%A1%E0%B8%82%E0%B8%AD%E0%B8%AD%E0%B8%99%E0%B8%B8%E0%B8%A1%E0%B8%B1%E0%B8%95%E0%B8%B4%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B8%AD%E0%B8%82%E0%B9%88%E0%B8%B2%E0%B8%A2%E0%B8%84%E0%B8%AD%E0%B8%A1%E0%B8%9E%E0%B8%B4%E0%B8%A7%E0%B9%80%E0%B8%95%E0%B8%AD%E0%B8%A3%E0%B9%8C-2021.xlsx" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">Click for Download</a> แบบฟอร์มขออนุมัติเครือข่ายคอมพิวเตอร์ 2021<br>
        2. กรอกข้อมูลในไฟล์ให้ครบถ้วน<br>
        3. <a href="https://fdnet.dhammakaya.network/fdcom/system/" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">กรอก Link คพ.</a> และแนบไฟล์ที่กรอกข้อมูล เพื่อขออนุมัติ<br>
        4. รอหัวหน้ากองอนุมัติ แล้วเจ้าหน้าที่จะดำเนินการให้
      </p>
    ',
  ],

  // CCTV
  [
    'cat'   => 'cctv',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>',
    'title' => 'CCTV',
    'desc'  => 'ขั้นตอนการขอใช้งาน CCTV สำหรับบุคลากรที่ต้องการติดตั้งกล้องวงจรปิดภายในองค์กร',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        1. <a href="https://fdnet.dhammakaya.network/form/%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%9F%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%A1/old/old2/%E0%B8%84%E0%B8%9E.xx%20%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%9F%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%A1%E0%B8%82%E0%B8%AD%E0%B8%AD%E0%B8%99%E0%B8%B8%E0%B8%A1%E0%B8%B1%E0%B8%95%E0%B8%B4%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B8%AD%E0%B8%82%E0%B9%88%E0%B8%B2%E0%B8%A2%E0%B8%84%E0%B8%AD%E0%B8%A1%E0%B8%9E%E0%B8%B4%E0%B8%A7%E0%B9%80%E0%B8%95%E0%B8%AD%E0%B8%A3%E0%B9%8C-2021.xlsx" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">Click for Download</a> แบบฟอร์มขออนุมัติเครือข่ายคอมพิวเตอร์ 2021<br>
        2. กรอกข้อมูลในไฟล์ให้ครบถ้วน<br>
        3. <a href="https://fdnet.dhammakaya.network/fdcom/system/" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">กรอก Link คพ.</a> และแนบไฟล์ที่กรอกข้อมูล เพื่อขออนุมัติ<br>
        4. รอหัวหน้ากองอนุมัติ แล้วเจ้าหน้าที่จะดำเนินการให้
      </p>
    ',
  ],

  // VPN & Mail
  [
    'cat'   => 'vpn&mail',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>',
    'title' => 'ขอสิทธิ์ใช้งาน VPN ใหม่ / ขอต่ออายุ VPN / ขอใช้อีเมลองค์กร',
    'desc'  => 'ขั้นตอนการขอใช้งาน VPN สำหรับบุคลากรที่ต้องการเข้าถึงระบบภายในองค์กรจากภายนอก',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        1. กรอก link คพ. เพื่อขออนุมัติ ตามตัวอย่างด้านล่าง</br>
        2. แนบไฟล์ภาพถ่ายบัตรองค์กรของผู้ที่ต้องการใช้ VPN / อีเมลองค์กร​​</br>
        3. รอหัวหน้ากอง / เจ้าอาวาส และทีม CNA อนุมัติ</br>
        4. รอเจ้าหน้าที่ดำเนินการให้ เสร็จแล้วเจ้าหน้าที่จะส่งอีเมลแจ้งกลับไป</br>
      </p>
    ',
  ],

  // GBN
  [
    'cat'   => 'gbn',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>',
    'title' => 'กล่องสัญญาณ GBN',
    'desc'  => 'ขั้นตอนการขอใช้งานกล่องสัญญาณ GBN สำหรับบุคลากรที่ต้องการเชื่อมต่อระบบภายในองค์กร',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        1. <a href="https://fdnet.dhammakaya.network/form/%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%9F%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%A1/old/old2/%E0%B8%84%E0%B8%9E.xx%20%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%9F%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%A1%E0%B8%82%E0%B8%AD%E0%B8%AD%E0%B8%99%E0%B8%B8%E0%B8%A1%E0%B8%B1%E0%B8%95%E0%B8%B4%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B8%AD%E0%B8%82%E0%B9%88%E0%B8%B2%E0%B8%A2%E0%B8%84%E0%B8%AD%E0%B8%A1%E0%B8%9E%E0%B8%B4%E0%B8%A7%E0%B9%80%E0%B8%95%E0%B8%AD%E0%B8%A3%E0%B9%8C-2021.xlsx" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">Click for Download</a> แบบฟอร์มขออนุมัติเครือข่ายคอมพิวเตอร์ 2021<br>
        2. กรอกข้อมูลในไฟล์ให้ครบถ้วน<br>
        3. <a href="https://fdnet.dhammakaya.network/fdcom/system/" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">กรอก Link คพ.</a> และแนบไฟล์ที่กรอกข้อมูล เพื่อขออนุมัติ<br>
        4. รอหัวหน้ากองอนุมัติ แล้วเจ้าหน้าที่จะดำเนินการให้
      </p>
    ',
  ],

  // LED
  [
    'cat'   => 'led',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>',
    'title' => 'จอ LED',
    'desc'  => 'ขั้นตอนการขอใช้งานจอ LED สำหรับบุคลากรที่ต้องการใช้จอ LEDภายในองค์กร',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        1. <a href="https://fdnet.dhammakaya.network/form/%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%9F%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%A1/old/old2/%E0%B8%84%E0%B8%9E.xx%20%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%9F%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%A1%E0%B8%82%E0%B8%AD%E0%B8%AD%E0%B8%99%E0%B8%B8%E0%B8%A1%E0%B8%B1%E0%B8%95%E0%B8%B4%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B8%AD%E0%B8%82%E0%B9%88%E0%B8%B2%E0%B8%A2%E0%B8%84%E0%B8%AD%E0%B8%A1%E0%B8%9E%E0%B8%B4%E0%B8%A7%E0%B9%80%E0%B8%95%E0%B8%AD%E0%B8%A3%E0%B9%8C-2021.xlsx" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">Click for Download</a> แบบฟอร์มขออนุมัติเครือข่ายคอมพิวเตอร์ 2021<br>
        2. กรอกข้อมูลในไฟล์ให้ครบถ้วน<br>
        3. <a href="https://fdnet.dhammakaya.network/fdcom/system/" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">กรอก Link คพ.</a> และแนบไฟล์ที่กรอกข้อมูล เพื่อขออนุมัติ<br>
        4. รอหัวหน้ากองอนุมัติ แล้วเจ้าหน้าที่จะดำเนินการให้
      </p>
    ',
  ],

  // IP Address
  [
    'cat'   => 'server',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>',
    'title' => 'ขอใช้งาน IP Address ถาวร',
    'desc'  => 'ขั้นตอนการขอใช้งาน IP Address สำหรับบุคลากรที่ต้องการเข้าถึงระบบภายในองค์กร',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        1. <a href="https://fdnet.dhammakaya.network/form/%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%9F%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%A1/%E0%B8%84%E0%B8%9E.3.6%20NCR3.6%20V.1.2%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%9F%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%A1%E0%B8%82%E0%B8%AD%20IP%20ADDRESS%20%E0%B8%96%E0%B8%B2%E0%B8%A7%E0%B8%A3.pdf" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">
          Click for Download
        </a> คพ.3.6 เพื่อขอ IP Address ถาวร<br>
        
        2. กรอกข้อมูลในเอกสารให้ครบถ้วน<br>
        3. สแกนเอกสารเป็นไฟล์<br>
        4. ส่งไฟล์เอกสาร มาที่อีเมล 
          <a href="mailto:noc@dhammakaya.center" style="color:#1e73be">noc@dhammakaya.center</a><br>
        5. รอเจ้าหน้าที่ดำเนินการให้ เสร็จแล้วเจ้าหน้าที่จะส่งอีเมลแจ้งกลับไป
      </p>
    ',
  ],

  // WIFI & LAN
  [
    'cat'   => 'wifi&lan',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>',
    'title' => 'ขอใช้งาน Wi-Fi และ LAN',
    'desc'  => 'ขั้นตอนการขอใช้งาน Wi-Fi และ LAN สำหรับบุคลากรที่ต้องการเชื่อมต่อระบบภายในองค์กร',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        1. <a href="https://fdnet.dhammakaya.network/form/%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%9F%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%A1/old/old2/%E0%B8%84%E0%B8%9E.xx%20%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%9F%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%A1%E0%B8%82%E0%B8%AD%E0%B8%AD%E0%B8%99%E0%B8%B8%E0%B8%A1%E0%B8%B1%E0%B8%95%E0%B8%B4%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B8%AD%E0%B8%82%E0%B9%88%E0%B8%B2%E0%B8%A2%E0%B8%84%E0%B8%AD%E0%B8%A1%E0%B8%9E%E0%B8%B4%E0%B8%A7%E0%B9%80%E0%B8%95%E0>B.1.2.xlsx" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">Click for Download</a> แบบฟอร์มขออนุมัติเครือข่ายคอมพิวเตอร์ 2021<br>
        2. กรอกข้อมูลในไฟล์ให้ครบถ้วน<br>
        3. <a href="https://fdnet.dhammakaya.network/fdcom/system/" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">กรอก Link คพ.</a> และแนบไฟล์ที่กรอกข้อมูล เพื่อขออนุมัติ<br>
        4. รอหัวหน้ากองอนุมัติ แล้วเจ้าหน้าที่จะดำเนินการให้ เสร็จแล้วเจ้าหน้าที่จะส่งอีเมลแจ้งกลับไป
      </p>
    ',
  ],

  // ค่าบริการโทรศัพท์
  [
    'cat'   => 'telephonebill',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.41 2 2 0 0 1 3.6 1.23h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.91a16 16 0 0 0 6.18 6.18l.95-.95a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>',
    'title' => 'ค่าบริการโทรศัพท์',
    'desc'  => 'ขั้นตอนการขอเบิกค่าบริการโทรศัพท์สำหรับบุคลากรภายในองค์กร',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        1. <a href="https://fdnet.dhammakaya.network/fdcom/system/" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">กรอก Link คพ.</a> เพื่อขออนุมัติ<br>
        2. รอหัวหน้ากองอนุมัติ แล้วเจ้าหน้าที่จะดำเนินการให้
      </p>
    ',
  ],

  // ถ่ายเอกสาร
  [
    'cat'   => 'printDocument',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>',
    'title' => 'ถ่ายเอกสาร',
    'desc'  => 'ขั้นตอนการขอใช้บริการถ่ายเอกสารภายในองค์กร',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        1. <a href="https://fdnet.dhammakaya.network/fdcom/system/" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">กรอก Link คพ.</a> เพื่อขออนุมัติ<br>
        2. รอหัวหน้ากองอนุมัติ แล้วเจ้าหน้าที่จะดำเนินการให้
      </p>
    ',
  ],

  // File Share
  [
    'cat'   => 'fileShred',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><polyline points="16 6 12 2 8 6"/><line x1="12" y1="2" x2="12" y2="15"/></svg>',
    'title' => 'File Share',
    'desc'  => 'ขั้นตอนการขอใช้งาน File Share สำหรับบุคลากรที่ต้องการแชร์ไฟล์ภายในองค์กร',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        1. <a href="https://fdnet.dhammakaya.network/fdcom/system/" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">กรอก Link คพ.</a> เพื่อขออนุมัติ<br>
        2. รอหัวหน้ากองอนุมัติ แล้วเจ้าหน้าที่จะดำเนินการให้
      </p>
    ',
  ],

  // อบรมความรู้สารสนเทศ
  [
    'cat'   => 'training',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>',
    'title' => 'อบรมความรู้สารสนเทศ',
    'desc'  => 'ขั้นตอนการสมัครเข้าอบรมความรู้ด้านสารสนเทศสำหรับบุคลากรภายในองค์กร',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        1. <a href="https://fdnet.dhammakaya.network/fdcom/system/" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">กรอก Link คพ.</a> เพื่อขออนุมัติ<br>
        2. รอหัวหน้ากองอนุมัติ แล้วเจ้าหน้าที่จะดำเนินการให้
      </p>
    ',
  ],

  // ยืม คืน ซ่อมอุปกรณ์คอมพิวเตอร์
  [
    'cat'   => 'it&com',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>',
    'title' => 'ยืม คืน ซ่อมอุปกรณ์คอมพิวเตอร์',
    'desc'  => 'ขั้นตอนการยืม คืน และแจ้งซ่อมอุปกรณ์คอมพิวเตอร์ภายในองค์กร',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        1. <a href="https://fdnet.dhammakaya.network/form/%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%9F%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%A1/%E0%B8%84%E0%B8%9E.5%20%E0%B9%83%E0%B8%9A%E0%B8%A2%E0%B8%B7%E0%B8%A1%E0%B8%AD%E0%B8%B8%E0%B8%9B%E0%B8%81%E0%B8%A3%E0%B8%93%E0%B9%8C(%E0%B8%AA%E0%B9%88%E0%B8%A7%E0%B8%99%E0%B8%81%E0%B8%A5%E0%B8%B2%E0%B8%87).xls" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">ดาวน์โหลดแบบฟอร์ม คพ.5</a> สำหรับการยืม/คืนอุปกรณ์<br>
        2. กรอกข้อมูลในเอกสารให้ครบถ้วน<br>
        3. เสนอหัวหน้าหน่วยงานลงนามรับรอง<br>
        4. นำเอกสารส่งที่ห้องซ่อม ชั้น L1M<br>
        5. แจ้งซ่อม: ติดต่อห้องซ่อม อาคาร 100 ปีคุณยายฯ ชั้น L1M โทรภายใน <strong>02-831-1000 ต่อ 11840</strong>
      </p>
    ',
  ],

  // จัดซื้อ ยืม คืน แจ้งซ่อมอุปกรณ์มัลติมีเดีย
  [
    'cat'   => 'video',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/></svg>',
    'title' => 'จัดซื้อ ยืม คืน แจ้งซ่อมอุปกรณ์มัลติมีเดีย',
    'desc'  => 'ขั้นตอนการจัดซื้อ ยืม คืน และแจ้งซ่อมอุปกรณ์มัลติมีเดียภายในองค์กร',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        1. <a href="https://fdnet.dhammakaya.network/fdcom/system/" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">กรอก Link คพ.</a> เพื่อขออนุมัติ<br>
        2. รอหัวหน้ากองอนุมัติ แล้วเจ้าหน้าที่จะดำเนินการให้
      </p>
    ',
  ],

  // จัดซื้อ ยืม คืน แจ้งซ่อมอุปกรณ์เครื่องเสียง
  [
    'cat'   => 'audio',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>',
    'title' => 'จัดซื้อ ยืม คืน แจ้งซ่อมอุปกรณ์เครื่องเสียง',
    'desc'  => 'ขั้นตอนการจัดซื้อ ยืม คืน และแจ้งซ่อมอุปกรณ์เครื่องเสียงภายในองค์กร',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        1. <a href="https://fdnet.dhammakaya.network/fdcom/system/" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">กรอก Link คพ.</a> เพื่อขออนุมัติ<br>
        2. รอหัวหน้ากองอนุมัติ แล้วเจ้าหน้าที่จะดำเนินการให้
      </p>
    ',
  ],

  // ยืม-คืน/แจ้งซ่อมวิทยุสื่อสาร
  [
    'cat'   => 'radio',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"/><path d="M19 10v2a7 7 0 0 1-14 0v-2"/><line x1="12" y1="19" x2="12" y2="23"/><line x1="8" y1="23" x2="16" y2="23"/></svg>',
    'title' => 'ยืม-คืน/แจ้งซ่อมวิทยุสื่อสาร',
    'desc'  => 'ขั้นตอนการยืม คืน และแจ้งซ่อมวิทยุสื่อสารภายในองค์กร',
    'extra_html' => '
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        1. <a href="https://fdnet.dhammakaya.network/form/%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%9F%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%A1/%E0%B8%A2%E0%B8%B7%E0%B8%A1-%E0%B8%84%E0%B8%B7%E0%B8%99%E0%B8%A7%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%AA%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%AA%E0%B8%B2%E0%B8%A3%20v.2020.xlsx" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">ดาวน์โหลดแบบฟอร์มยืม-คืนอุปกรณ์วิทยุสื่อสาร</a><br>
        2. กรอกข้อมูลในไฟล์ให้ครบถ้วน<br>
        3. <a href="https://fdnet.dhammakaya.network/fdcom/system/" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">กรอก Link คพ.</a> และแนบไฟล์ที่กรอกข้อมูล เพื่อขออนุมัติ<br>
        4. รอหัวหน้ากองอนุมัติ แล้วเจ้าหน้าที่จะดำเนินการให้
      </p>
    ',
  ],

  // Location
  [
    'cat'   => 'location',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>',
    'title' => 'ขอใช้งานสถานที่',
    'desc'  => 'ขั้นตอนการขอใช้งานสถานที่สำหรับบุคลากรที่ต้องการใช้พื้นที่ภายในองค์กร',
    'extra_html' => '
      <style>
        .eq-acc { margin:0; padding:0; }
        .eq-sec { border:1px solid var(--clr-border); border-radius:10px; margin-bottom:8px; overflow:hidden; }
        .eq-hdr { display:flex; align-items:center; gap:10px; padding:12px 16px; cursor:pointer; user-select:none; transition:background .15s; }
        .eq-hdr:hover { background:var(--clr-bg); }
        .eq-ico { width:28px; height:28px; border-radius:6px; flex-shrink:0; display:flex; align-items:center; justify-content:center; background:var(--clr-bg); }
        .eq-ttl { flex:1; font-size:.9rem; font-weight:600; color:var(--clr-text); }
        .eq-chev { color:var(--clr-text-muted); transition:transform .2s ease; }
        .eq-chev.open { transform:rotate(180deg); }
        .eq-body { display:none; padding:6px 16px 16px; border-top:1px solid var(--clr-border); }
        .eq-body.open { display:block; }
        .eq-list { list-style:none; margin:10px 0 0; padding:0; font-size:.88rem; color:var(--clr-text); line-height:1.7; }
        .eq-list li { display:flex; gap:10px; padding:7px 0; border-bottom:1px solid var(--clr-border); }
        .eq-list li:last-child { border-bottom:none; }
        .eq-num { width:20px; height:20px; border-radius:50%; flex-shrink:0; font-size:.72rem; font-weight:700; margin-top:2px; display:flex; align-items:center; justify-content:center; background:var(--clr-bg); color:var(--clr-text-muted); border:1px solid var(--clr-border); }
        .eq-list a { color:var(--clr-primary); font-weight:600; text-decoration:none; }
        .eq-list a:hover { text-decoration:underline; }
        .eq-img { display:block; margin-top:8px; width:100%; max-width:460px; border-radius:8px; border:1px solid var(--clr-border); }
        .eq-note { margin-top:12px; padding:10px 14px; background:var(--clr-bg); border-left:2px solid var(--clr-border-strong, var(--clr-primary)); border-radius:0 6px 6px 0; font-size:.85rem; color:var(--clr-text); line-height:1.75; }
      </style>

      <div class="eq-acc">

        <!-- 1. Data Center -->
        <div class="eq-sec">
          <div class="eq-hdr" onclick="eqT(this)">
            <div class="eq-ico">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--clr-text-muted)"><rect x="2" y="2" width="20" height="8" rx="2"/><rect x="2" y="14" width="20" height="8" rx="2"/><line x1="6" y1="6" x2="6.01" y2="6"/><line x1="6" y1="18" x2="6.01" y2="18"/></svg>
            </div>
            <span class="eq-ttl">ขอยืมพื้นที่ภายในห้อง Data Center (Colocation Service)</span>
            <svg class="eq-chev" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
          </div>
          <div class="eq-body">
            <ul class="eq-list">
              <li>
                <span class="eq-num">1</span>
                <div><a href="https://fdnet.dhammakaya.network/form/%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%9F%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%A1/%E0%B8%84%E0%B8%9E.8.5%20%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%9F%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%A1%E0%B8%82%E0%B8%AD%E0%B8%A2%E0%B8%B7%E0%B8%A1%E0%B8%AA%E0%B8%96%E0%B8%B2%E0%B8%99%E0%B8%97%E0%B8%B5%E0%B9%88%E0%B9%83%E0%B8%99%E0%B8%AB%E0%B9%89%E0%B8%AD%E0%B8%87%E0%B8%94%E0%B8%B2%E0%B8%95%E0%B9%89%E0%B8%B2%E0%B9%80%E0%B8%8B%E0%B8%99%E0%B9%80%E0%B8%95%E0%B8%AD%E0%B8%A3%E0%B9%8C%20(Colocation%20Service)%20v.3.1.pdf" target="_blank">ดาวน์โหลดแบบฟอร์ม คพ.8.5 (Colocation Service)</a></div>
              </li>
              <li><span class="eq-num">2</span><div>กรอกข้อมูลในเอกสารให้ครบถ้วน</div></li>
              <li><span class="eq-num">3</span><div>สแกนเอกสารเป็นไฟล์ (PDF)</div></li>
              <li>
                <span class="eq-num">4</span>
                <div>ส่งเอกสารทางอีเมลไปที่ <a href="mailto:noc@dhammakaya.center">noc@dhammakaya.center</a></div>
              </li>
              <li><span class="eq-num">5</span><div>รอเจ้าหน้าที่ตรวจสอบและดำเนินการ เมื่อเสร็จสิ้นจะแจ้งผลกลับทางอีเมล</div></li>
            </ul>
          </div>
        </div>

        <!-- 2. ห้องคอมพิวเตอร์ -->
        <div class="eq-sec">
          <div class="eq-hdr" onclick="eqT(this)">
            <div class="eq-ico">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--clr-text-muted)"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
            </div>
            <span class="eq-ttl">ขอใช้ห้องคอมพิวเตอร์</span>
            <svg class="eq-chev" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
          </div>
          <div class="eq-body">
            <ul class="eq-list">
              <li>
                <span class="eq-num">1</span>
                <div>ห้องอบรมคอมพิวเตอร์ ชั้น L1M อาคาร 100 ปีคุณยายฯ</div>
              </li>
              <li>
                <span class="eq-num">2</span>
                <div><a href="https://fdnet.dhammakaya.network/fdcom/system/form2.php?sidebarId=12" target="_blank">กรอก Link ฟอร์มขอใช้ห้องคอมพิวเตอร์</a> และบันทึกเป็นไฟล์ PDF</div>
              </li>
              <li>
                <span class="eq-num">3</span>
                <div><a href="https://fdnet.dhammakaya.network/fdcom/system/" target="_blank">กรอก Link คพ.</a> และแนบไฟล์ PDF ที่บันทึกไว้ เพื่อขออนุมัติใช้ห้องคอมพิวเตอร์ โดยให้ใส่รายละเอียดว่า <strong>"ขอใช้ห้องคอมพิวเตอร์"</strong></div>
              </li>
            </ul>

            <div class="eq-note" style="margin-top:14px">
              <strong>ตัวอย่างการกรอกเอกสารเพื่อขอใช้ห้องคอมพิวเตอร์</strong>
            </div>
            <img class="eq-img" src="https://i.pinimg.com/1200x/52/c0/e6/52c0e6034e7f0a11870cfaf91cf3362e.jpg" alt="ตัวอย่างกรอกเอกสาร 1">
            <img class="eq-img" src="https://i.pinimg.com/1200x/52/c0/e6/52c0e6034e7f0a11870cfaf91cf3362e.jpg" alt="ตัวอย่างกรอกเอกสาร 2">
            <img class="eq-img" src="https://i.pinimg.com/1200x/52/c0/e6/52c0e6034e7f0a11870cfaf91cf3362e.jpg" alt="ตัวอย่างกรอกเอกสาร 3">
            <img class="eq-img" src="https://i.pinimg.com/1200x/52/c0/e6/52c0e6034e7f0a11870cfaf91cf3362e.jpg" alt="ตัวอย่างกรอกเอกสาร 4">

            <div class="eq-note" style="margin-top:14px">
              <strong>ตัวอย่างการกรอก คพ. เพื่อขอให้หัวหน้ากองอนุมัติ</strong>
            </div>
            <img class="eq-img" src="https://i.pinimg.com/1200x/52/c0/e6/52c0e6034e7f0a11870cfaf91cf3362e.jpg" alt="ตัวอย่าง คพ. 1">
            <img class="eq-img" src="https://i.pinimg.com/1200x/52/c0/e6/52c0e6034e7f0a11870cfaf91cf3362e.jpg" alt="ตัวอย่าง คพ. 2">
            <img class="eq-img" src="https://i.pinimg.com/1200x/52/c0/e6/52c0e6034e7f0a11870cfaf91cf3362e.jpg" alt="ตัวอย่าง คพ. 3">

            <div class="eq-note" style="margin-top:14px">
              <strong>ปฏิทินการจองห้องคอมพิวเตอร์</strong>
              <div style="margin-top:10px; border-radius:8px; overflow:hidden; border:1px solid var(--clr-border);">
                <iframe
                  src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23ffffff&ctz=Asia%2FBangkok&showTitle=1&showNav=1&showPrint=1&showTabs=1&showTz=1&showCalendars=1&src=Yi5yaWNoeTg4ODhAZ21haWwuY29t&src=6b7c41b2ac3dd681b14cd9439cba41e1e59865c77eb17d944a5c346de42c61e6@group.calendar.google.com&color=%237986CB&color=%237986CB&color=%230B8043&color=%2333B679"
                  style="border:0; width:100%; height:500px; display:block;"
                  frameborder="0"
                  scrolling="no">
                </iframe>
              </div>
            </div>

          </div>
        </div>

      </div>

      <script>
      if (typeof eqT !== "function") {
        function eqT(h) {
          var b = h.nextElementSibling, c = h.querySelector(".eq-chev"), o = b.classList.contains("open");
          b.classList.toggle("open", !o); c.classList.toggle("open", !o);
        }
      }
      </script>
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
$panel_base    = 'procurement.php';
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