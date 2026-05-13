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
        1. <a href="https://fdnet.dhammakaya.network/form/%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%9F%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%A1/Old-move_to_FDnet/old2/%E0%B8%84%E0%B8%9E.xx%20%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%9F%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%A1%E0%B8%82%E0%B8%AD%E0%B8%AD%E0%B8%99%E0%B8%B8%E0%B8%A1%E0%B8%B1%E0%B8%95%E0%B8%B4%E0%B9%80%E0%B8%84%E0%B8%A3%E0%B8%B7%E0%B8%AD%E0%B8%82%E0%B9%88%E0%B8%B2%E0%B8%A2%E0%B8%84%E0%B8%AD%E0%B8%A1%E0%B8%9E%E0%B8%B4%E0%B8%A7%E0%B9%80%E0%B8%95%E0%B8%AD%E0%B8%A3%E0%B9%8C-2021.xlsx" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">Click for Download</a> แบบฟอร์มขออนุมัติเครือข่ายคอมพิวเตอร์ 2021<br>
        2. กรอกข้อมูลในไฟล์ให้ครบถ้วน<br>
        3. <a href="https://fdnet.dhammakaya.network/fdcom/system/form.php?&sidebarId=12&autocat=52" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">กรอก Link คพ.</a> และแนบไฟล์ที่กรอกข้อมูล เพื่อขออนุมัติ<br>
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
        1. <a href="https://fdnet.dhammakaya.network/fdcom/system/form.php?&sidebarId=12&autocat=50&item=%E0%B8%82%E0%B8%AD%E0%B8%95%E0%B8%B4%E0%B8%94%E0%B8%95%E0%B8%B1%E0%B9%89%E0%B8%87%E0%B8%81%E0%B8%A5%E0%B9%89%E0%B8%AD%E0%B8%87%E0%B8%A7%E0%B8%87%E0%B8%88%E0%B8%A3%E0%B8%9B%E0%B8%B4%E0%B8%94%20%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B9%80%E0%B8%A7%E0%B8%93...&purpose=%E0%B9%80%E0%B8%9E%E0%B8%B7%E0%B9%88%E0%B8%AD...%20(%E0%B9%80%E0%B8%8A%E0%B9%88%E0%B8%99%20%E0%B8%94%E0%B8%B9%E0%B9%81%E0%B8%A5%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%9B%E0%B8%A5%E0%B8%AD%E0%B8%94%E0%B8%A0%E0%B8%B1%E0%B8%A2%20%E0%B9%80%E0%B8%9B%E0%B9%87%E0%B8%99%E0%B8%95%E0%B9%89%E0%B8%99)" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">กรอก Link คพ.</a> และแนบไฟล์ที่กรอกข้อมูล เพื่อขออนุมัติ<br>
        2. <a href="https://fdnet.dhammakaya.network/fdcom/system/form.php?&sidebarId=12&autocat=51&item=%E0%B8%82%E0%B8%AD%E0%B9%81%E0%B8%88%E0%B9%89%E0%B8%87%E0%B8%8B%E0%B9%88%E0%B8%AD%E0%B8%A1%E0%B8%81%E0%B8%A5%E0%B9%89%E0%B8%AD%E0%B8%87%E0%B8%A7%E0%B8%87%E0%B8%88%E0%B8%A3%E0%B8%9B%E0%B8%B4%E0%B8%94%20%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B9%80%E0%B8%A7%E0%B8%93...&purpose=%E0%B9%80%E0%B8%9E%E0%B8%B7%E0%B9%88%E0%B8%AD...%20(%E0%B9%80%E0%B8%8A%E0%B9%88%E0%B8%99%20%E0%B8%94%E0%B8%B9%E0%B9%81%E0%B8%A5%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%9B%E0%B8%A5%E0%B8%AD%E0%B8%94%E0%B8%A0%E0%B8%B1%E0%B8%A2%20%E0%B9%80%E0%B8%9B%E0%B9%87%E0%B8%99%E0%B8%95%E0%B9%89%E0%B8%99)" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">กรอก Link คพ.</a> และแนบไฟล์ที่กรอกข้อมูล เพื่อขอเเจ้งซ่อม<br>
        3. กรอกข้อมูลในไฟล์ให้ครบถ้วน<br>
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
      <p style="font-size:1rem;font-weight:700;color:var(--clr-text);margin-bottom:12px">ขอสิทธิ์ใช้งาน VPN ใหม่ / ขอต่ออายุ VPN / ขอใช้อีเมลองค์กร</p>

      <div style="display:flex;flex-direction:column;gap:6px;font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        <p style="margin:0">1. <a href="https://fdnet.dhammakaya.network/fdcom/system/form2.php?sidebarId=12&autocat=49&man=../../services/VPN.php&item=(%E0%B8%95%E0%B8%B1%E0%B8%A7%E0%B8%AD%E0%B8%A2%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%81%E0%B8%A3%E0%B8%AD%E0%B8%81)%20%E0%B8%82%E0%B8%AD%E0%B9%83%E0%B8%8A%E0%B9%89%20VPN%20/%20%E0%B8%95%E0%B9%88%E0%B8%AD%E0%B8%AD%E0%B8%B2%E0%B8%A2%E0%B8%B8%20VPN%20%3E%20Username:%20p...&purpose=(%E0%B8%95%E0%B8%B1%E0%B8%A7%E0%B8%AD%E0%B8%A2%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%81%E0%B8%A3%E0%B8%AD%E0%B8%81)%20%E0%B9%80%E0%B8%9E%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B9%83%E0%B8%8A%E0%B9%89%20Winbudget%20/%20%E0%B9%80%E0%B8%9E%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B9%80%E0%B8%82%E0%B9%89%E0%B8%B2%20LAN%20%E0%B8%88%E0%B8%B2%E0%B8%81%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C%E0%B8%AA%E0%B8%B2%E0%B8%82%E0%B8%B2" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">กรอก Link คพ.</a> เพื่อขออนุมัติ ตามตัวอย่างด้านล่าง</p>
        <p style="margin:0">2. แนบไฟล์ภาพถ่ายบัตรองค์กรของผู้ที่ต้องการใช้ VPN / อีเมลองค์กร</p>
        <p style="margin:0">3. รอหัวหน้ากอง / เจ้าอาวาส และทีม CNA อนุมัติ</p>
        <p style="margin:0">4. รอเจ้าหน้าที่ดำเนินการให้ เสร็จแล้วเจ้าหน้าที่จะส่งอีเมลแจ้งกลับไป</p>
      </div>

      <p style="font-size:.95rem;font-weight:600;color:var(--clr-text);margin-bottom:10px">ตัวอย่างการกรอกข้อมูลขอ VPN</p>

      <img src="../assets/images/procurement/vpn/vpn1.png" alt="ตัวอย่างการกรอกข้อมูลขอ VPN"
        onclick="lbOpen([\'../assets/images/procurement/vpn/vpn1.png\'],0)"
        style="width:100%;max-width:460px;border-radius:8px;border:1px solid var(--clr-border);display:block;cursor:pointer">
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
        1. <a href="https://fdnet.dhammakaya.network/fdcom/system/form.php?&sidebarId=12&autocat=59" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">กรอก Link คพ.</a> เพื่อขออนุมัติ สำหรับขอใหม่<br>
        2. <a href="https://fdnet.dhammakaya.network/fdcom/system/form.php?&sidebarId=12&autocat=18" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">กรอก Link คพ.</a> สำหรับแจ้งซ่อม<br>
        3. กรอกข้อมูลในไฟล์ให้ครบถ้วน<br>
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
        <a href="https://fdnet.dhammakaya.network/fdcom/system/form.php?&sidebarId=12&autocat=63&item=%E0%B8%82%E0%B8%AD%E0%B9%83%E0%B8%8A%E0%B9%89%E0%B8%88%E0%B8%AD%20LED&purpose=%E0%B9%80%E0%B8%9E%E0%B8%B7%E0%B9%88%E0%B8%AD...%20(%E0%B9%80%E0%B8%8A%E0%B9%88%E0%B8%99%20%E0%B9%83%E0%B8%8A%E0%B9%89%E0%B9%83%E0%B8%99%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%96%E0%B9%88%E0%B8%B2%E0%B8%A2%E0%B8%97%E0%B8%AD%E0%B8%94%E0%B8%AA%E0%B8%94%E0%B8%87%E0%B8%B2%E0%B8%99%E0%B8%95%E0%B8%B1%E0%B8%81%E0%B8%9A%E0%B8%B2%E0%B8%95%E0%B8%A3%20%E0%B9%80%E0%B8%9B%E0%B9%87%E0%B8%99%E0%B8%95%E0%B9%89%E0%B8%99)" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">กรอก Link คพ.</a> ขอใช้บริการจอ LED และบันทึกเป็นไฟล์ PDF
      </p>

      <p style="font-size:.95rem;font-weight:600;color:var(--clr-text);margin-bottom:12px">ตัวอย่างขั้นตอนการกรอกข้อมูลขอยืมจอ LED</p>

      <div style="display:flex;flex-direction:column;gap:20px;font-size:.92rem;line-height:1.85;color:var(--clr-text)">

        <div>
          <p style="margin:0 0 8px"><strong>1.</strong> Login เข้าหน้า FDcom</p>
          <img src="../assets/images/procurement/led/step1.png" alt="Login FDcom"
            onclick="lbOpen([\'../assets/images/procurement/led/step1.png\',\'../assets/images/procurement/led/step2.png\',\'../assets/images/procurement/led/step3.png\',\'../assets/images/procurement/led/step4.png\',\'../assets/images/procurement/led/step5.png\',\'../assets/images/procurement/led/step6.png\',\'../assets/images/procurement/led/step7.png\'],0)"
            style="width:100%;max-width:460px;border-radius:8px;border:1px solid var(--clr-border);display:block;cursor:pointer">
        </div>

        <div>
          <p style="margin:0 0 8px"><strong>2.</strong> กดเลือกเมนู 1.2 กรอกใบ คพ.</p>
          <img src="../assets/images/procurement/led/step2.png" alt="เมนู 1.2"
            onclick="lbOpen([\'../assets/images/procurement/led/step1.png\',\'../assets/images/procurement/led/step2.png\',\'../assets/images/procurement/led/step3.png\',\'../assets/images/procurement/led/step4.png\',\'../assets/images/procurement/led/step5.png\',\'../assets/images/procurement/led/step6.png\',\'../assets/images/procurement/led/step7.png\'],1)"
            style="width:100%;max-width:460px;border-radius:8px;border:1px solid var(--clr-border);display:block;cursor:pointer">
        </div>

        <div>
          <p style="margin:0 0 8px"><strong>3.</strong> กรอกข้อมูลส่วนตัวและเลือกหมวดที่ต้องการขอใช้บริการ</p>
          <img src="../assets/images/procurement/led/step3.png" alt="กรอกข้อมูลส่วนตัว"
            onclick="lbOpen([\'../assets/images/procurement/led/step1.png\',\'../assets/images/procurement/led/step2.png\',\'../assets/images/procurement/led/step3.png\',\'../assets/images/procurement/led/step4.png\',\'../assets/images/procurement/led/step5.png\',\'../assets/images/procurement/led/step6.png\',\'../assets/images/procurement/led/step7.png\'],2)"
            style="width:100%;max-width:460px;border-radius:8px;border:1px solid var(--clr-border);display:block;cursor:pointer">
        </div>

        <div>
          <p style="margin:0 0 8px"><strong>4.</strong> กรอกแบบฟอร์มขอใช้บริการ</p>
          <img src="../assets/images/procurement/led/step4.png" alt="กรอกแบบฟอร์ม 1"
            onclick="lbOpen([\'../assets/images/procurement/led/step1.png\',\'../assets/images/procurement/led/step2.png\',\'../assets/images/procurement/led/step3.png\',\'../assets/images/procurement/led/step4.png\',\'../assets/images/procurement/led/step5.png\',\'../assets/images/procurement/led/step6.png\',\'../assets/images/procurement/led/step7.png\'],3)"
            style="width:100%;max-width:460px;border-radius:8px;border:1px solid var(--clr-border);display:block;margin-bottom:8px;cursor:pointer">
          <img src="../assets/images/procurement/led/step5.png" alt="กรอกแบบฟอร์ม 2"
            onclick="lbOpen([\'../assets/images/procurement/led/step1.png\',\'../assets/images/procurement/led/step2.png\',\'../assets/images/procurement/led/step3.png\',\'../assets/images/procurement/led/step4.png\',\'../assets/images/procurement/led/step5.png\',\'../assets/images/procurement/led/step6.png\',\'../assets/images/procurement/led/step7.png\'],4)"
            style="width:100%;max-width:460px;border-radius:8px;border:1px solid var(--clr-border);display:block;cursor:pointer">
        </div>

        <div>
          <p style="margin:0 0 8px"><strong>5.</strong> กดดาวน์โหลดไฟล์ PDF</p>
          <img src="../assets/images/procurement/led/step6.png" alt="ดาวน์โหลด PDF"
            onclick="lbOpen([\'../assets/images/procurement/led/step1.png\',\'../assets/images/procurement/led/step2.png\',\'../assets/images/procurement/led/step3.png\',\'../assets/images/procurement/led/step4.png\',\'../assets/images/procurement/led/step5.png\',\'../assets/images/procurement/led/step6.png\',\'../assets/images/procurement/led/step7.png\'],5)"
            style="width:100%;max-width:460px;border-radius:8px;border:1px solid var(--clr-border);display:block;cursor:pointer">
        </div>

        <div>
          <p style="margin:0 0 8px"><strong>6.</strong> กรอกวัตถุประสงค์ในการใช้งานและแนบไฟล์ PDF + ไฟล์ตำแหน่งที่ติดตั้งจอ LED</p>
          <img src="../assets/images/procurement/led/step7.png" alt="แนบไฟล์ PDF"
            onclick="lbOpen([\'../assets/images/procurement/led/step1.png\',\'../assets/images/procurement/led/step2.png\',\'../assets/images/procurement/led/step3.png\',\'../assets/images/procurement/led/step4.png\',\'../assets/images/procurement/led/step5.png\',\'../assets/images/procurement/led/step6.png\',\'../assets/images/procurement/led/step7.png\'],6)"
            style="width:100%;max-width:460px;border-radius:8px;border:1px solid var(--clr-border);display:block;cursor:pointer">
        </div>

        <div>
          <p style="margin:0 0 8px"><strong>7.</strong> รอเจ้าหน้าที่ติดต่อกลับ — ติดตามรายละเอียดการดำเนินการใน
            <a href="https://fdnet.dhammakaya.network/fdcom/system/form1_user_list.php?sidebarId=11" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">Link Here</a>
          </p>
        </div>

      </div>

      <div style="margin-top:24px;padding:14px 16px;background:var(--clr-bg);border-radius:10px;border:1px solid var(--clr-border);font-size:.9rem;line-height:1.85;color:var(--clr-text)">
        <p style="margin:0 0 10px;font-weight:600">สอบถามรายละเอียดเพิ่มเติมที่</p>

        <div style="display:flex;align-items:center;gap:8px;margin-bottom:4px">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;color:var(--clr-text-muted)"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.41 2 2 0 0 1 3.6 1.23h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.91a16 16 0 0 0 6.18 6.18l.95-.95a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          <span>เบอร์โทรภายใน: <a href="tel:028311000" style="color:#1e73be;font-weight:600;text-decoration:none">02-831-1000</a> ต่อ 11842</span>
        </div>

        <div style="display:flex;align-items:center;gap:8px;margin-bottom:12px">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;color:var(--clr-text-muted)"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          <span>พระนที พุทฺธินนฺโท: <a href="tel:0835404987" style="color:#1e73be;font-weight:600;text-decoration:none">083-540-4987</a></span>
        </div>

        <p style="margin:0 0 8px;font-weight:600">ทีมช่างติดตั้ง-ซ่อมแซม</p>

        <div style="display:flex;align-items:center;gap:8px;margin-bottom:4px">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;color:var(--clr-text-muted)"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
          <span>ช่างนาท: <a href="tel:0861221856" style="color:#1e73be;font-weight:600;text-decoration:none">086-122-1856</a></span>
        </div>

        <div style="display:flex;align-items:center;gap:8px">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;color:var(--clr-text-muted)"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
          <span>ช่างพรชัย (ตูน): <a href="tel:0623744781" style="color:#1e73be;font-weight:600;text-decoration:none">062-374-4781</a></span>
        </div>
      </div>
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
        1. <a href="https://fdnet.dhammakaya.network/fdcom/system/form.php?&sidebarId=12&autocat=30" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">กรอก Link คพ.</a> เพื่อขออนุมัติ สำหรับ Wi-Fi<br>
        2. <a href="https://fdnet.dhammakaya.network/fdcom/system/form.php?&sidebarId=12&autocat=5" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">กรอก Link คพ.</a> เพื่อขออนุมัติ สำหรับ LAN<br>
        3. รอหัวหน้ากองอนุมัติ แล้วเจ้าหน้าที่จะดำเนินการให้<br><br>
        สอบถามรายละเอียดเพิ่มเติมที่<br>
        พระพงษ์สันต์ กุลเชฏฺโฐ: 086-822-8849
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
      <p style="font-size:1rem;font-weight:700;color:var(--clr-text);margin-bottom:12px">โทรศัพท์มือถือ</p>

      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:6px">
        1. Download ไฟล์ตามประเภทที่ต้องการ
      </p>

      <div style="display:flex;flex-direction:column;gap:6px;margin-bottom:16px;padding-left:16px">
        <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap">
          <a href="https://fdnet.dhammakaya.network/form/%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%9F%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%A1/%E0%B8%84%E0%B8%9E.%E0%B9%82%E0%B8%97%E0%B8%A3%E0%B8%A8%E0%B8%B1%E0%B8%9E%E0%B8%97%E0%B9%8C%E0%B8%A1%E0%B8%B7%E0%B8%AD%E0%B8%96%E0%B8%B7%E0%B8%AD%20%E0%B8%97%E0%B8%A8.%201%20%E0%B8%82%E0%B8%AD%E0%B8%AD%E0%B8%99%E0%B8%B8%E0%B8%A1%E0%B8%B1%E0%B8%95%E0%B8%B4%E0%B9%83%E0%B8%AB%E0%B8%A1%E0%B9%88.xlsx" target="_blank"
            style="display:inline-flex;align-items:center;gap:6px;background:#1e73be;color:#fff;font-size:.82rem;font-weight:600;padding:5px 12px;border-radius:6px;text-decoration:none;white-space:nowrap">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
            Click for Download ทศ.1
          </a>
          <span style="font-size:.88rem;color:var(--clr-text)">ขออนุมัติใหม่</span>
        </div>

        <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap">
          <a href="https://fdnet.dhammakaya.network/form/%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%9F%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%A1/%E0%B8%84%E0%B8%9E.%E0%B9%82%E0%B8%97%E0%B8%A3%E0%B8%A8%E0%B8%B1%E0%B8%9E%E0%B8%97%E0%B9%8C%E0%B8%A1%E0%B8%B7%E0%B8%AD%E0%B8%96%E0%B8%B7%E0%B8%AD%20%E0%B8%97%E0%B8%A8.%202%20%20%E0%B9%80%E0%B8%9B%E0%B8%A5%E0%B8%B5%E0%B9%88%E0%B8%A2%E0%B8%99%E0%B9%80%E0%B8%9A%E0%B8%AD%E0%B8%A3%E0%B9%8C%20%E0%B8%A2%E0%B9%89%E0%B8%B2%E0%B8%A2%E0%B8%84%E0%B9%88%E0%B8%B2%E0%B8%A2%20%E0%B8%87%E0%B8%9A%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%A1%E0%B8%B2%E0%B8%93.xlsx" target="_blank"
            style="display:inline-flex;align-items:center;gap:6px;background:#1e73be;color:#fff;font-size:.82rem;font-weight:600;padding:5px 12px;border-radius:6px;text-decoration:none;white-space:nowrap">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
            Click for Download ทศ.2
          </a>
          <span style="font-size:.88rem;color:var(--clr-text)">เปลี่ยนเบอร์ ย้ายค่าย งบประมาณ</span>
        </div>

        <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap">
          <a href="https://fdnet.dhammakaya.network/form/%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%9F%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%A1/%E0%B8%84%E0%B8%9E.%E0%B9%82%E0%B8%97%E0%B8%A3%E0%B8%A8%E0%B8%B1%E0%B8%9E%E0%B8%97%E0%B9%8C%E0%B8%A1%E0%B8%B7%E0%B8%AD%E0%B8%96%E0%B8%B7%E0%B8%AD%20%E0%B8%97%E0%B8%A8.%203%20%20%E0%B8%A2%E0%B9%89%E0%B8%B2%E0%B8%A2%E0%B8%AB%E0%B8%99%E0%B9%88%E0%B8%A7%E0%B8%A2%E0%B8%87%E0%B8%B2%E0%B8%99%20%E0%B8%81%E0%B8%AD%E0%B8%87%E0%B8%AA%E0%B8%B3%E0%B8%99%E0%B8%B1%E0%B8%81.xlsx" target="_blank"
            style="display:inline-flex;align-items:center;gap:6px;background:#1e73be;color:#fff;font-size:.82rem;font-weight:600;padding:5px 12px;border-radius:6px;text-decoration:none;white-space:nowrap">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
            Click for Download ทศ.3
          </a>
          <span style="font-size:.88rem;color:var(--clr-text)">ย้ายหน่วยงาน กองสำนัก</span>
        </div>
      </div>

      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:4px">
        2. กรอกข้อมูลในไฟล์ให้ครบถ้วน
      </p>
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:4px">
        3. <a href="https://fdnet.dhammakaya.network/fdcom/system/" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">กรอก Link คพ.</a> และแนบไฟล์ที่กรอกข้อมูล เพื่อขออนุมัติ
      </p>
      <p style="font-size:.95rem;line-height:1.85;color:var(--clr-text);margin-bottom:0">
        4. รอหัวหน้ากองอนุมัติ แล้วเจ้าหน้าที่จะดำเนินการให้
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
      <p style="font-size:1rem;font-weight:700;color:var(--clr-text);margin-bottom:12px">ถ่ายเอกสารขาว-ดำ</p>

      <div style="padding:14px 16px;background:var(--clr-bg);border-radius:10px;border:1px solid var(--clr-border);font-size:.9rem;line-height:1.85;color:var(--clr-text)">

        <div style="display:flex;align-items:flex-start;gap:8px;margin-bottom:6px">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:4px;color:var(--clr-text-muted)"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
          <span>ติดต่อที่ห้องถ่ายเอกสารอาคาร 100 ปีคุณยายฯ ชั้น 1 ฝั่งตะวันออก</span>
        </div>

        <div style="display:flex;align-items:center;gap:8px">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;color:var(--clr-text-muted)"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.41 2 2 0 0 1 3.6 1.23h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.91a16 16 0 0 0 6.18 6.18l.95-.95a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          <span>เบอร์ภายใน: <a href="tel:028311000" style="color:#1e73be;font-weight:600;text-decoration:none">02-831-1000</a> ต่อ 11820</span>
        </div>

      </div>
    ',
  ],

  // File Share
  [
    'cat'   => 'fileShred',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><polyline points="16 6 12 2 8 6"/><line x1="12" y1="2" x2="12" y2="15"/></svg>',
    'title' => 'File Share',
    'desc'  => 'ขั้นตอนการขอใช้งาน File Share สำหรับบุคลากรที่ต้องการแชร์ไฟล์ภายในองค์กร',
    'extra_html' => '
      <p style="font-size:1rem;font-weight:700;color:var(--clr-text);margin-bottom:16px">File Share (ss100, st100, etc)</p>

      <div style="font-size:.92rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">

        <p style="margin:0 0 6px;font-weight:600">1. กรณีมีชื่อไฟล์แชร์อยู่แล้ว ต้องการขอเพิ่มสิทธ์เข้าใช้งาน</p>
        <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap;margin-bottom:14px;padding-left:16px">
          <a href="https://fdnet.dhammakaya.network/form/%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%9F%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%A1/%E0%B8%84%E0%B8%9E.%208.2%20%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%9F%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%A1%E0%B8%82%E0%B8%AD%E0%B8%AA%E0%B8%B4%E0%B8%97%E0%B8%98%E0%B8%B4%E0%B9%8C%E0%B9%83%E0%B8%99%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%82%E0%B9%89%E0%B8%B2%E0%B9%84%E0%B8%9F%E0%B8%A5%E0%B9%8C%E0%B9%81%E0%B8%8A%E0%B8%A3%E0%B9%8C%20(Permission%20Form)%20By%20C%20N%20A%20-%20v.1.0.pdf" target="_blank"
            style="display:inline-flex;align-items:center;gap:6px;background:#1e73be;color:#fff;font-size:.82rem;font-weight:600;padding:5px 12px;border-radius:6px;text-decoration:none;white-space:nowrap">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
            Click for Download
          </a>
          <span>คพ.8.2 แบบฟอร์มขอสิทธิ์ในการเข้าไฟล์แชร์ (Permission Form) CNA</span>
        </div>

        <p style="margin:0 0 6px;font-weight:600">กรณียังไม่มีชื่อไฟล์แชร์ ต้องการสร้างพื้นที่ไฟล์แชร์</p>
        <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap;margin-bottom:20px;padding-left:16px">
          <a href="https://fdnet.dhammakaya.network/form/%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%9F%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%A1/%E0%B8%84%E0%B8%9E.8.1_%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%9F%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%A1%E0%B8%82%E0%B8%AD%E0%B8%9E%E0%B8%B7%E0%B9%89%E0%B8%99%E0%B8%97%E0%B8%B5%E0%B9%88%E0%B9%80%E0%B8%81%E0%B9%87%E0%B8%9A%E0%B8%82%E0%B9%89%E0%B8%AD%E0%B8%A1%E0%B8%B9%E0%B8%A5(Storage_Request_Form)_v.1.3_CNA.pdf" target="_blank"
            style="display:inline-flex;align-items:center;gap:6px;background:#1e73be;color:#fff;font-size:.82rem;font-weight:600;padding:5px 12px;border-radius:6px;text-decoration:none;white-space:nowrap">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
            Click for Download
          </a>
          <span>คพ.8.1 แบบฟอร์มขอพื้นที่เก็บข้อมูล (Storage Request Form) CNA</span>
        </div>

        <p style="margin:0 0 4px">2. กรอกข้อมูลในเอกสารให้ครบถ้วน</p>
        <p style="margin:0 0 4px">3. สแกนเอกสารเป็นไฟล์ PDF</p>
        <p style="margin:0 0 4px">4. <a href="https://fdnet.dhammakaya.network/fdcom/system/" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">กรอก Link คพ.</a> เพื่อขออนุมัติ และแนบเอกสารที่สแกนไว้</p>
        <p style="margin:0">5. รอหัวหน้ากองอนุมัติจากนั้นเจ้าหน้าที่จะดำเนินการขั้นต่อไป ดำเนินการเรียบร้อยแล้วเจ้าหน้าที่จะส่งอีเมลแจ้งกลับไป</p>

      </div>
    ',
  ],

  // อบรมความรู้สารสนเทศ
  [
    'cat'   => 'training',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>',
    'title' => 'อบรมความรู้สารสนเทศ',
    'desc'  => 'ขั้นตอนการสมัครเข้าอบรมความรู้ด้านสารสนเทศสำหรับบุคลากรภายในองค์กร',
    'extra_html' => '
      <p style="font-size:1rem;font-weight:700;color:var(--clr-text);margin-bottom:12px">ขออบรมโปรแกรมคอมพิวเตอร์</p>
      <p style="font-size:.88rem;color:var(--clr-text-muted);margin-bottom:14px">สำหรับผู้สนใจสมัครเรียนโปรแกรม</p>

      <div style="font-size:.92rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        <p style="margin:0 0 8px">1. <a href="https://form.jotform.com/231301336713444" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">กรอก Link ฟอร์ม</a> เข้ารับการอบรมคอมพิวเตอร์ และบันทึกเป็นไฟล์ PDF</p>
        <p style="margin:0 0 8px">2. <a href="https://fdnet.dhammakaya.network/fdcom/system/form2.php?sidebarId=12&autocat=58&man=../../services/Training_computer.php&item=(%E0%B8%95%E0%B8%B1%E0%B8%A7%E0%B8%AD%E0%B8%A2%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%81%E0%B8%A3%E0%B8%AD%E0%B8%81)%20%E0%B8%82%E0%B8%AD%E0%B8%AA%E0%B8%A1%E0%B8%B1%E0%B8%84%E0%B8%A3%E0%B8%AD%E0%B8%9A%E0%B8%A3%E0%B8%A1%E0%B9%82%E0%B8%9B%E0%B8%A3%E0%B9%81%E0%B8%81%E0%B8%A3%E0%B8%A1...%20%E0%B8%A7%E0%B8%B1%E0%B8%99%E0%B8%97%E0%B8%B5%E0%B9%88...&purpose=(%E0%B8%95%E0%B8%B1%E0%B8%A7%E0%B8%AD%E0%B8%A2%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%81%E0%B8%A3%E0%B8%AD%E0%B8%81)%20%E0%B9%80%E0%B8%9E%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B8%99%E0%B8%B3%E0%B9%84%E0%B8%9B%E0%B9%83%E0%B8%8A%E0%B9%89%E0%B8%87%E0%B8%B2%E0%B8%99...%20/%20%E0%B9%80%E0%B8%9E%E0%B8%B7%E0%B9%88%E0%B8%AD%E0%B9%80%E0%B8%9E%E0%B8%B4%E0%B9%88%E0%B8%A1%E0%B8%97%E0%B8%B1%E0%B8%81%E0%B8%A9%E0%B8%B0" target="_blank" style="color:#1e73be;font-weight:600;text-decoration:none">กรอก Link คพ.</a> และแนบไฟล์ PDF ที่บันทึกไว้ เพื่อขออนุมัติ</p>
        <p style="margin:0 0 4px">• ต้องมีความรู้พื้นฐานการใช้งานคอมพิวเตอร์เบื้องต้น <span style="color:var(--clr-text-muted)">(เฉพาะบางโปรแกรม)</span></p>
        <p style="margin:0 0 4px">• ทำแบบทดสอบที่กองบริการสารสนเทศ <span style="color:var(--clr-text-muted)">(เฉพาะบางโปรแกรม)</span></p>
        <p style="margin:0 0 4px">• อาคาร 100 ปี คุณยายฯ ตึก O ชั้น 11 เวลา 9.00-17.00 น.</p>
        <p style="margin:0">• ห้องอบรมคอมพิวเตอร์ ชั้น L1M อาคาร 100 ปีคุณยายฯ</p>
      </div>

      <div style="padding:14px 16px;background:var(--clr-bg);border-radius:10px;border:1px solid var(--clr-border);font-size:.9rem;line-height:1.85;color:var(--clr-text);margin-bottom:20px">
        <p style="margin:0 0 8px;font-weight:600">สอบถามรายละเอียดเพิ่มเติมที่</p>
        <div style="display:flex;align-items:center;gap:8px;margin-bottom:4px">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;color:var(--clr-text-muted)"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.41 2 2 0 0 1 3.6 1.23h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.91a16 16 0 0 0 6.18 6.18l.95-.95a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          <span>เบอร์ภายใน: <a href="tel:028311000" style="color:#1e73be;font-weight:600;text-decoration:none">02-831-1000</a> ต่อ 11850</span>
        </div>
        <div style="display:flex;align-items:center;gap:8px">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;color:var(--clr-text-muted)"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          <span>กัลฯ ศิรินภา (ผิง): <a href="tel:0652929465" style="color:#1e73be;font-weight:600;text-decoration:none">065-292-9465</a></span>
        </div>
      </div>

      <div style="border:1px solid var(--clr-border);border-radius:10px;overflow:hidden;margin-bottom:20px">
        <div style="padding:10px 16px;background:var(--clr-bg);border-bottom:1px solid var(--clr-border);font-size:.9rem;font-weight:600;color:var(--clr-text)">ข้อปฏิบัติและกติกาในการเข้าอบรม</div>
        <div style="padding:12px 16px;font-size:.88rem;line-height:1.85;color:var(--clr-text)">
          <p style="margin:0 0 6px">1. เมื่อสมัครเข้าอบรมผ่านเว็บไซต์ ตามระบบเรียบร้อยแล้ว ก่อนวันอบรมจะมีเจ้าหน้าที่โทรแจ้งคอนเฟิร์ม ว่าท่านสามารถที่จะเข้าอบรมได้หรือไม่</p>
          <p style="margin:0 0 6px">2. เมื่อสมัครเข้าอบรมเรียบร้อยแล้ว หากไม่สามารถเข้าอบรมตาม วัน,เวลา ที่กำหนดได้ ควรแจ้งเจ้าหน้าที่ล่วงหน้าอย่างน้อย 3 วัน มิฉะนั้นท่านจะถูกงดใช้สิทธิ์การอบรมในครั้งต่อไป และในกรณีที่สมัครเรียนแล้ว เจ้าหน้าที่ติดต่อไม่ได้ถือว่า "สละสิทธิ์" ในการอบรมครั้งนั้น</p>
          <p style="margin:0 0 6px">3. ควรเข้าอบรมไม่ต่ำกว่า 80% ของระยะเวลาการอบรม เพื่อได้รับความรู้อย่างเต็มที่</p>
          <p style="margin:0 0 6px">4. คอร์สที่เรียนปกติ 13.30 น. (เริ่มลงทะเบียนเรียนเวลา 13.00 - 13.15 น. หากไม่สามารถมาลงทะเบียนเรียนได้ตามเวลาที่กำหนด กรุณาโทรแจ้งเจ้าหน้าที่ล่วงหน้าก่อนลงทะเบียนอย่างน้อย 30 นาที)</p>
          <p style="margin:0 0 6px">5. ร่วมบุญค่าลงทะเบียนเรียน ในวันแรกของการอบรมบริเวณด้านหลังห้องอบรม ก่อนเข้านั่งประจำที่อบรม</p>
          <p style="margin:0 0 6px">6. ห้ามนำอาหารและเครื่องดื่มเข้ามารับประทานในห้องอบรมเพื่อป้องกันการหกใส่อุปกรณ์คอมพิวเตอร์ และห้ามรับประทานอาหาร / เครื่องดื่มขณะที่กำลังมีการเรียนการสอน (ให้รับประทานได้ในช่วงเวลาที่อาจารย์ผู้สอนอนุญาต หรือเบรกเท่านั้น)</p>
          <p style="margin:0 0 6px">7. เมื่อเข้าอบรม ห้ามใช้โทรศัพท์มือถือขณะเรียน หากมีธุระจำเป็นให้ออกมาคุยด้านนอกห้องเรียนและเปิดระบบแบบสั่นหรือเสียงเบา ๆ (เพื่อให้ผู้เข้ารับการอบรมและอาจารย์มีสมาธิในการเรียนและการสอน)</p>
          <p style="margin:0 0 6px">8. ผู้เข้ารับการอบรมควรมีพื้นฐานความรู้ตามโปรแกรมที่อาจารย์กำหนด ก่อนเข้าอบรมโปรแกรมนั้น ๆ</p>
          <p style="margin:0">9. ในคาบเรียนให้ส่งแบบฝึกหัด แบบทดสอบ เพื่อวัดผลทั้งภายในห้องเรียนและนอกห้องเรียน ตามที่อาจารย์ผู้สอนกำหนดให้ทำ</p>
        </div>
      </div>

      <p style="font-size:.95rem;font-weight:600;color:var(--clr-text);margin-bottom:10px">ตัวอย่างการกรอกใบสมัครอบรมคอมพิวเตอร์</p>

      <div style="display:flex;flex-direction:column;gap:8px">
        <img src="../assets/images/procurement/training/step1.png" alt="ตัวอย่างการกรอก 1"
          onclick="lbOpen([\'../assets/images/procurement/training/step1.png\',\'../assets/images/procurement/training/step2.png\',\'../assets/images/procurement/training/step3.png\',\'../assets/images/procurement/training/step4.png\',\'../assets/images/procurement/training/step5.png\',\'../assets/images/procurement/training/step6.png\',\'../assets/images/procurement/training/step7.png\'],0)"
          style="width:100%;max-width:460px;border-radius:8px;border:1px solid var(--clr-border);display:block;cursor:pointer">
        <img src="../assets/images/procurement/training/step2.png" alt="ตัวอย่างการกรอก 2"
          onclick="lbOpen([\'../assets/images/procurement/training/step1.png\',\'../assets/images/procurement/training/step2.png\',\'../assets/images/procurement/training/step3.png\',\'../assets/images/procurement/training/step4.png\',\'../assets/images/procurement/training/step5.png\',\'../assets/images/procurement/training/step6.png\',\'../assets/images/procurement/training/step7.png\'],1)"
          style="width:100%;max-width:460px;border-radius:8px;border:1px solid var(--clr-border);display:block;cursor:pointer">
        <img src="../assets/images/procurement/training/step3.png" alt="ตัวอย่างการกรอก 3"
          onclick="lbOpen([\'../assets/images/procurement/training/step1.png\',\'../assets/images/procurement/training/step2.png\',\'../assets/images/procurement/training/step3.png\',\'../assets/images/procurement/training/step4.png\',\'../assets/images/procurement/training/step5.png\',\'../assets/images/procurement/training/step6.png\',\'../assets/images/procurement/training/step7.png\'],2)"
          style="width:100%;max-width:460px;border-radius:8px;border:1px solid var(--clr-border);display:block;cursor:pointer">
        <img src="../assets/images/procurement/training/step4.png" alt="ตัวอย่างการกรอก 4"
          onclick="lbOpen([\'../assets/images/procurement/training/step1.png\',\'../assets/images/procurement/training/step2.png\',\'../assets/images/procurement/training/step3.png\',\'../assets/images/procurement/training/step4.png\',\'../assets/images/procurement/training/step5.png\',\'../assets/images/procurement/training/step6.png\',\'../assets/images/procurement/training/step7.png\'],3)"
          style="width:100%;max-width:460px;border-radius:8px;border:1px solid var(--clr-border);display:block;cursor:pointer">
        <img src="../assets/images/procurement/training/step5.png" alt="ตัวอย่างการกรอก 5"
          onclick="lbOpen([\'../assets/images/procurement/training/step1.png\',\'../assets/images/procurement/training/step2.png\',\'../assets/images/procurement/training/step3.png\',\'../assets/images/procurement/training/step4.png\',\'../assets/images/procurement/training/step5.png\',\'../assets/images/procurement/training/step6.png\',\'../assets/images/procurement/training/step7.png\'],4)"
          style="width:100%;max-width:460px;border-radius:8px;border:1px solid var(--clr-border);display:block;cursor:pointer">
        <img src="../assets/images/procurement/training/step6.png" alt="ตัวอย่างการกรอก 6"
          onclick="lbOpen([\'../assets/images/procurement/training/step1.png\',\'../assets/images/procurement/training/step2.png\',\'../assets/images/procurement/training/step3.png\',\'../assets/images/procurement/training/step4.png\',\'../assets/images/procurement/training/step5.png\',\'../assets/images/procurement/training/step6.png\',\'../assets/images/procurement/training/step7.png\'],5)"
          style="width:100%;max-width:460px;border-radius:8px;border:1px solid var(--clr-border);display:block;cursor:pointer">
        <img src="../assets/images/procurement/training/step7.png" alt="ตัวอย่างการกรอก 7"
          onclick="lbOpen([\'../assets/images/procurement/training/step1.png\',\'../assets/images/procurement/training/step2.png\',\'../assets/images/procurement/training/step3.png\',\'../assets/images/procurement/training/step4.png\',\'../assets/images/procurement/training/step5.png\',\'../assets/images/procurement/training/step6.png\',\'../assets/images/procurement/training/step7.png\',\'../assets/images/procurement/training/step8.png\'],6)"
          style="width:100%;max-width:460px;border-radius:8px;border:1px solid var(--clr-border);display:block;cursor:pointer">
        <img src="../assets/images/procurement/training/step8.png" alt="ตัวอย่างการกรอก 8"
          onclick="lbOpen([\'../assets/images/procurement/training/step1.png\',\'../assets/images/procurement/training/step2.png\',\'../assets/images/procurement/training/step3.png\',\'../assets/images/procurement/training/step4.png\',\'../assets/images/procurement/training/step5.png\',\'../assets/images/procurement/training/step6.png\',\'../assets/images/procurement/training/step7.png\',\'../assets/images/procurement/training/step8.png\'],7)"
          style="width:100%;max-width:460px;border-radius:8px;border:1px solid var(--clr-border);display:block;cursor:pointer">
      </div>
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
        5. โทรภายใน <strong>11842</strong>
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
            <img class="eq-img" src="../assets/images/procurement/location/computer1.png" alt="ตัวอย่างกรอกเอกสาร 1"
              onclick="lbOpen([\'../assets/images/procurement/location/computer1.png\',\'../assets/images/procurement/location/computer2.png\',\'../assets/images/procurement/location/computer3.png\'],0)"
              style="cursor:pointer">
            <img class="eq-img" src="../assets/images/procurement/location/computer2.png" alt="ตัวอย่างกรอกเอกสาร 2"
              onclick="lbOpen([\'../assets/images/procurement/location/computer1.png\',\'../assets/images/procurement/location/computer2.png\',\'../assets/images/procurement/location/computer3.png\'],1)"
              style="cursor:pointer">
            <img class="eq-img" src="../assets/images/procurement/location/computer3.png" alt="ตัวอย่างกรอกเอกสาร 3"
              onclick="lbOpen([\'../assets/images/procurement/location/computer1.png\',\'../assets/images/procurement/location/computer2.png\',\'../assets/images/procurement/location/computer3.png\'],2)"
              style="cursor:pointer">

            <div class="eq-note" style="margin-top:14px">
              <strong>ตัวอย่างการกรอก คพ. เพื่อขอให้หัวหน้ากองอนุมัติ</strong>
            </div>
            <img class="eq-img" src="../assets/images/procurement/location/form1.png" alt="ตัวอย่าง คพ. 1"
              onclick="lbOpen([\'../assets/images/procurement/location/form1.png\',\'../assets/images/procurement/location/form2.png\',\'../assets/images/procurement/location/form3.png\'],0)"
              style="cursor:pointer">
            <img class="eq-img" src="../assets/images/procurement/location/form2.png" alt="ตัวอย่าง คพ. 2"
              onclick="lbOpen([\'../assets/images/procurement/location/form1.png\',\'../assets/images/procurement/location/form2.png\',\'../assets/images/procurement/location/form3.png\'],1)"
              style="cursor:pointer">
            <img class="eq-img" src="../assets/images/procurement/location/form3.png" alt="ตัวอย่าง คพ. 3"
              onclick="lbOpen([\'../assets/images/procurement/location/form1.png\',\'../assets/images/procurement/location/form2.png\',\'../assets/images/procurement/location/form3.png\'],2)"
              style="cursor:pointer">

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