// assets/js/search-index.js
// ══════════════════════════════════════════════════════════════
// Search Index — รวมเนื้อหาทุกหน้าของเว็บไซต์กองบริหารสารสนเทศ
// ══════════════════════════════════════════════════════════════

window.SITE_SEARCH_INDEX = [

  // หน้าหลัก
  {
    title: 'หน้าหลัก', desc: 'กองบริการสารสนเทศ วัดพระธรรมกาย', url: '../index.php', section: 'หน้าหลัก',
    keywords: 'home หน้าหลัก กองบริการ กองบริหาร สารสนเทศ it center วัดพระธรรมกาย dhammakaya ติดต่อ โทร 4141'
  },

  // ── บริการ IT ──────────────────────────────────────────────
  {
    title: 'ขอ Account ใหม่', desc: 'สมัครบัญชีผู้ใช้งานใหม่สำหรับบุคลากรที่ยังไม่เคยมี Account ในระบบ',
    url: '../pages/services.php?cat=account', section: 'บริการ IT',
    keywords: 'account ใหม่ สมัคร สร้าง username บัญชี register fdnet หน้าแดง new user ขอ บัญชีใหม่ เปิดบัญชี ครั้งแรก ยังไม่มี'
  },

  {
    title: 'ต่ออายุ Account', desc: 'ขยายอายุการใช้งานบัญชีที่ใกล้หมดอายุหรือถูกระงับชั่วคราว',
    url: '../pages/services.php?cat=renew', section: 'บริการ IT',
    keywords: 'ต่ออายุ renew account หมดอายุ ระงับ ขยาย expire อายุ ต่อ ปีใหม่ ธันวาคม ปีนี้ ต่ออายุปี'
  },

  {
    title: 'เช็กสถานะ Account / รหัสผ่าน', desc: 'ตรวจสอบว่าบัญชียังใช้งานได้อยู่หรือไม่ และวันหมดอายุ',
    url: '../pages/services.php?cat=status', section: 'บริการ IT',
    keywords: 'เช็ก สถานะ ตรวจสอบ account รหัสผ่าน check status password expire วันหมดอายุ ยังใช้ได้ ใช้งานได้ไหม บัญชี oauth chkrenew'
  },

  {
    title: 'รีเซทรหัสผ่าน', desc: 'ขอรีเซทรหัสผ่านกรณีลืมรหัสผ่านหรือรหัสผ่านหมดอายุ',
    url: '../pages/services.php?cat=reset', section: 'บริการ IT',
    keywords: 'reset รีเซท รหัสผ่าน ลืม password เปลี่ยน change forgot otp เข้าไม่ได้ ล็อกอินไม่ได้ pass pw ใหม่ กำหนดใหม่ ตั้งใหม่'
  },

  {
    title: 'ขอ Join Domain', desc: 'ขอ Computer Name เพื่อนำเครื่องเข้าสู่ระบบ Domain ขององค์กร',
    url: '../pages/services.php?cat=domain', section: 'บริการ IT',
    keywords: 'join domain เข้า domain computer name dhammakaya.network เครื่อง ลงทะเบียน คอมพิวเตอร์ ชื่อเครื่อง ขอชื่อ เข้าระบบ องค์กร'
  },

  {
    title: 'ขอสิทธิ์เข้า Computer', desc: 'ขอเพิ่มสิทธิ์ Username ให้สามารถ Login เข้าคอมพิวเตอร์เครื่องที่ต้องการได้',
    url: '../pages/services.php?cat=access', section: 'บริการ IT',
    keywords: 'สิทธิ์ computer login เข้า access permission เครื่อง เพิ่มสิทธิ์ ขอสิทธิ์ เข้าเครื่อง ใช้เครื่อง เครื่องอื่น'
  },

  {
    title: 'ขอเปลี่ยน Email', desc: 'ขอเปลี่ยนอีเมลที่ผูกกับ Account หน้าแดง เพื่อใช้รีเซตรหัสผ่าน',
    url: '../pages/services.php?cat=email', section: 'บริการ IT',
    keywords: 'เปลี่ยน email อีเมล change แก้ไข mail ที่อยู่ email ใหม่ อัพเดต อีเมลผิด แก้ไขอีเมล'
  },

  {
    title: 'ขอเพิ่มปริมาณอินเทอร์เน็ต', desc: 'ขอปรับโควต้าหรือ Bandwidth อินเทอร์เน็ต',
    url: '../pages/services.php?cat=internet', section: 'บริการ IT',
    keywords: 'อินเทอร์เน็ต เพิ่ม โควต้า bandwidth internet quota ปรับ เน็ต ช้า หมด ขอเพิ่ม ขยาย เพิ่มเน็ต'
  },

  {
    title: 'เช็กโควต้าอินเทอร์เน็ต', desc: 'ตรวจสอบปริมาณอินเทอร์เน็ตที่ใช้ไปในแต่ละวัน ผ่าน Sophos User Portal',
    url: '../pages/services.php?cat=quota', section: 'บริการ IT',
    keywords: 'โควต้า quota อินเทอร์เน็ต internet ตรวจสอบ sophos user portal cyberoam เน็ตเหลือ เน็ตหมด ใช้ไปเท่าไหร่ ดูโควต้า'
  },

  // ── แจ้งปัญหา ───────────────────────────────────────────────
  {
    title: 'Account ถูกระงับการใช้งาน', desc: 'ไม่สามารถเข้าระบบหรือล็อกอินได้ เนื่องจาก Account ถูกระงับหรือหมดอายุ',
    url: '../pages/support.php?cat=accountSupport', section: 'แจ้งปัญหา',
    keywords: 'ระงับ account ล็อค lock ล็อกอิน login ไม่ได้ ถูกระงับ suspend เข้าไม่ได้ บล็อก blocked หมดอายุ ใช้งานไม่ได้'
  },

  {
    title: 'แจ้งปัญหาระบบเฉพาะทาง', desc: 'พบปัญหาระบบบุคคล ทะเบียนพระ บัญชีกรรม หรือรับ-ส่งหนังสือ',
    url: '../pages/support.php?cat=specialSupport', section: 'แจ้งปัญหา',
    keywords: 'ระบบ บุคคล ทะเบียนพระ บัญชีกรรม รับส่งหนังสือ ปัญหา เฉพาะทาง ระบบใน intranet ระบบภายใน error'
  },

  {
    title: 'แจ้งปัญหาระบบเครือข่าย', desc: 'อินเทอร์เน็ตช้า Wi-Fi ขาดหาย VPN เชื่อมต่อไม่ได้',
    url: '../pages/support.php?cat=networkSupport', section: 'แจ้งปัญหา',
    keywords: 'เครือข่าย wifi อินเทอร์เน็ต vpn ช้า ขาด หาย เชื่อมต่อ network ปัญหา สัญญาณ ไม่มีสัญญาณ เน็ตหลุด ออฟไลน์ offline'
  },

  {
    title: 'แจ้งปัญหาอื่นๆ', desc: 'ปัญหา Hardware Printer Email หรือซอฟต์แวร์ทั่วไป',
    url: '../pages/support.php?cat=otherSupport', section: 'แจ้งปัญหา',
    keywords: 'ปัญหา printer เครื่องพิมพ์ hardware software email คอมพิวเตอร์ จอ ลำโพง คีย์บอร์ด เมาส์ virus ไวรัส พัง เสีย ซ่อม ช้า ค้าง แฮง hang crash'
  },

  // ── คู่มือ ──────────────────────────────────────────────────
  {
    title: 'คู่มือเครือข่ายและการเชื่อมต่อ', desc: 'คู่มือตรวจสอบ IP ping ตั้งค่า WiFi บน Android iOS Windows',
    url: '../pages/manual.php?cat=network', section: 'คู่มือ',
    keywords: 'คู่มือ ipconfig ping ip address wifi android ios windows เครือข่าย network การเชื่อมต่อ วิธี ขั้นตอน'
  },

  {
    title: 'คู่มือ ipconfig และ ping', desc: 'คำสั่ง ipconfig ตรวจสอบ IP Address และการ ping ทดสอบการเชื่อมต่อ',
    url: '../pages/manual.php?cat=network', section: 'คู่มือ',
    keywords: 'ipconfig ping ip command prompt cmd windows ตรวจสอบ cmd คำสั่ง dos เช็ค ip หา ip ดู ip ของตัวเอง'
  },

  {
    title: 'คู่มือตั้งค่า WiFi บน Android', desc: 'ตั้งค่า .100Y-dot1x-Dhammakaya บน Android PEAP EAP FD-NET',
    url: '../pages/manual.php?cat=network', section: 'คู่มือ',
    keywords: 'wifi android ตั้งค่า .100Y-dot1x-Dhammakaya PEAP EAP fdnet captive portal มือถือ แอนดรอยด์ samsung huawei oppo เชื่อมต่อวิธี'
  },

  {
    title: 'คู่มือตั้งค่า WiFi บน iOS', desc: 'ตั้งค่า .100Y-dot1x-Dhammakaya บน iPhone iPad Trust Certificate',
    url: '../pages/manual.php?cat=network', section: 'คู่มือ',
    keywords: 'wifi ios iphone ipad ตั้งค่า .100Y-dot1x-Dhammakaya trust certificate apple มือถือ แอปเปิ้ล'
  },

  {
    title: 'คู่มือตั้งค่า WiFi บน Windows 7', desc: 'ตั้งค่า .100Y-dot1x-Dhammakaya บน Windows 7 WPA2-Enterprise',
    url: '../pages/manual.php?cat=network', section: 'คู่มือ',
    keywords: 'wifi windows 7 ตั้งค่า WPA2 enterprise PEAP WLAN autoconfig คอมพิวเตอร์ วินโดวส์ เจ็ด'
  },

  {
    title: 'คู่มือความปลอดภัยระบบปฏิบัติการ', desc: 'อัปเดต Windows Antivirus ป้องกันมัลแวร์ AVG',
    url: '../pages/manual.php?cat=security', section: 'คู่มือ',
    keywords: 'windows update อัพเดต antivirus avg malware มัลแวร์ patch ความปลอดภัย security ไวรัส ป้องกัน โปรแกรมป้องกัน'
  },

  {
    title: 'คู่มือการใช้งาน Domain', desc: 'นำเครื่องเข้า Domain dhammakaya.network ทุกระบบปฏิบัติการ',
    url: '../pages/manual.php?cat=domain', section: 'คู่มือ',
    keywords: 'domain dhammakaya.network join เข้า mac windows คู่มือ active directory เข้าโดเมน ลงทะเบียนเครื่อง'
  },

  {
    title: 'คู่มือ Join Domain Mac OS X', desc: 'ขั้นตอนนำ Mac เข้า Domain dhammakaya.network',
    url: '../pages/manual.php?cat=domain', section: 'คู่มือ',
    keywords: 'mac join domain active directory directory utility bind macbook imac apple โดเมน'
  },

  {
    title: 'คู่มือ Join Domain Windows 7', desc: 'ขั้นตอนนำ Windows 7 เข้า Domain',
    url: '../pages/manual.php?cat=domain', section: 'คู่มือ',
    keywords: 'windows 7 join domain computer name workgroup properties วินโดวส์ เจ็ด เข้าโดเมน'
  },

  {
    title: 'คู่มือ Join Domain Windows 8', desc: 'ขั้นตอนนำ Windows 8 เข้า Domain',
    url: '../pages/manual.php?cat=domain', section: 'คู่มือ',
    keywords: 'windows 8 join domain this pc properties วินโดวส์ แปด เข้าโดเมน'
  },

  {
    title: 'คู่มือ Join Domain Windows 10', desc: 'ขั้นตอนนำ Windows 10 เข้า Domain dhammakaya.network',
    url: '../pages/manual.php?cat=domain', section: 'คู่มือ',
    keywords: 'windows 10 join domain computer name dhammakaya.network วินโดวส์ สิบ เข้าโดเมน'
  },

  {
    title: 'คู่มือ Join Domain Windows 11', desc: 'ขั้นตอนนำ Windows 11 เข้า Domain dhammakaya.network',
    url: '../pages/manual.php?cat=domain', section: 'คู่มือ',
    keywords: 'windows 11 join domain settings about วินโดวส์ สิบเอ็ด เข้าโดเมน'
  },

  {
    title: 'คู่มือปรับ Chrome Flags', desc: 'วิธีการปรับแต่งการตั้งค่าขั้นสูงของ Google Chrome',
    url: '../pages/manual.php?cat=tools', section: 'คู่มือ',
    keywords: 'chrome flags browser ปรับ ตั้งค่า google เบราว์เซอร์ chrome://flags ขั้นสูง advanced'
  },

  {
    title: 'เอกสารระบบ คพ.', desc: 'เอกสารอ้างอิงระบบ คพ. สำหรับกองบริหารสารสนเทศ',
    url: '../pages/manual.php?cat=documents', section: 'คู่มือ',
    keywords: 'เอกสาร คพ fdnet คู่มือ อ้างอิง document form แบบฟอร์ม'
  },

  // ── จัดหาอุปกรณ์ ────────────────────────────────────────────
  {
    title: 'ขอใช้งาน Access Control', desc: 'ขั้นตอนการขออนุมัติ Access Control ระบบควบคุมการเข้าออก',
    url: '../pages/procurement.php?cat=accessControl', section: 'จัดหาอุปกรณ์',
    keywords: 'access control ประตู เข้าออก คพ ขออนุมัติ บัตร สแกน card reader กุญแจ ประตูอัตโนมัติ'
  },

  {
    title: 'ขอใช้งาน CCTV', desc: 'ขั้นตอนการขอติดตั้งกล้องวงจรปิด CCTV',
    url: '../pages/procurement.php?cat=cctv', section: 'จัดหาอุปกรณ์',
    keywords: 'cctv กล้อง วงจรปิด ติดตั้ง ขอ camera กล้องวงจรปิด security กล้องดู'
  },

  {
    title: 'ขอ VPN และ Mail องค์กร', desc: 'ขั้นตอนการขอสิทธิ์ใช้งาน VPN ใหม่ ต่ออายุ VPN ขอใช้อีเมลองค์กร',
    url: '../pages/procurement.php?cat=vpn&mail', section: 'จัดหาอุปกรณ์',
    keywords: 'vpn mail อีเมล email องค์กร ขอ สิทธิ์ ต่ออายุ ทำงานนอกสถานที่ remote เข้าจากบ้าน'
  },

  {
    title: 'ขอใช้งานกล่องสัญญาณ GBN', desc: 'ขั้นตอนการขอใช้งานกล่องสัญญาณ GBN',
    url: '../pages/procurement.php?cat=gbn', section: 'จัดหาอุปกรณ์',
    keywords: 'gbn กล่องสัญญาณ สัญญาณ กล่อง set top box ดาวเทียม'
  },

  {
    title: 'ขอใช้งานจอ LED', desc: 'ขั้นตอนการขอใช้งานจอ LED',
    url: '../pages/procurement.php?cat=led', section: 'จัดหาอุปกรณ์',
    keywords: 'led จอ display ขอ ใช้งาน จอใหญ่ หน้าจอ ป้าย ป้ายไฟ'
  },

  {
    title: 'ขอ IP Address ถาวร', desc: 'ขั้นตอนการขอใช้งาน IP Address ถาวรสำหรับ Server',
    url: '../pages/procurement.php?cat=server', section: 'จัดหาอุปกรณ์',
    keywords: 'ip address ถาวร server static คพ 3.6 fixed ip เซิร์ฟเวอร์'
  },

  {
    title: 'ขอใช้งาน Wi-Fi และ LAN', desc: 'ขั้นตอนการขอใช้งาน Wi-Fi และ LAN ขออนุมัติเครือข่าย',
    url: '../pages/procurement.php?cat=wifi&lan', section: 'จัดหาอุปกรณ์',
    keywords: 'wifi lan เครือข่าย ขอ ใช้งาน network สาย สายแลน ติดตั้งเน็ต เดินสาย'
  },

  {
    title: 'ขอเบิกค่าบริการโทรศัพท์', desc: 'ขั้นตอนการขอเบิกค่าบริการโทรศัพท์',
    url: '../pages/procurement.php?cat=telephonebill', section: 'จัดหาอุปกรณ์',
    keywords: 'โทรศัพท์ ค่าบริการ เบิก telephone bill ค่าโทร ค่าโทรศัพท์ มือถือ ซิม'
  },

  {
    title: 'ขอใช้บริการถ่ายเอกสาร', desc: 'ขั้นตอนการขอใช้บริการถ่ายเอกสารภายในองค์กร',
    url: '../pages/procurement.php?cat=printDocument', section: 'จัดหาอุปกรณ์',
    keywords: 'ถ่ายเอกสาร print เอกสาร copy ขอ photocopy ซีร็อกซ์ ถ่ายสำเนา'
  },

  {
    title: 'ขอใช้งาน File Share', desc: 'ขั้นตอนการขอใช้งาน File Share แชร์ไฟล์ภายในองค์กร',
    url: '../pages/procurement.php?cat=fileShred', section: 'จัดหาอุปกรณ์',
    keywords: 'file share แชร์ไฟล์ ไฟล์ folder โฟลเดอร์ shared folder network drive เข้าถึงไฟล์ แผนกไฟล์'
  },

  {
    title: 'สมัครอบรมความรู้สารสนเทศ', desc: 'ขั้นตอนการสมัครอบรมความรู้ด้านสารสนเทศ',
    url: '../pages/procurement.php?cat=training', section: 'จัดหาอุปกรณ์',
    keywords: 'อบรม training ความรู้ สารสนเทศ it สมัคร เรียน course class'
  },

  {
    title: 'ยืม คืน ซ่อมคอมพิวเตอร์', desc: 'ขั้นตอนการยืม คืน และแจ้งซ่อมอุปกรณ์คอมพิวเตอร์ แบบฟอร์ม คพ.5',
    url: '../pages/procurement.php?cat=it&com', section: 'จัดหาอุปกรณ์',
    keywords: 'ยืม คืน ซ่อม คอมพิวเตอร์ computer อุปกรณ์ คพ5 repair borrow notebook laptop โน้ตบุ๊ค คีย์บอร์ด เมาส์ จอ'
  },

  {
    title: 'ยืม คืน ซ่อมอุปกรณ์มัลติมีเดีย', desc: 'จัดซื้อ ยืม คืน แจ้งซ่อมอุปกรณ์มัลติมีเดีย โปรเจคเตอร์ จอ',
    url: '../pages/procurement.php?cat=video', section: 'จัดหาอุปกรณ์',
    keywords: 'มัลติมีเดีย multimedia โปรเจคเตอร์ projector จอ ยืม คืน ซ่อม กล้อง camera วีดีโอ'
  },

  {
    title: 'ยืม คืน ซ่อมอุปกรณ์เครื่องเสียง', desc: 'จัดซื้อ ยืม คืน แจ้งซ่อมอุปกรณ์เครื่องเสียง',
    url: '../pages/procurement.php?cat=audio', section: 'จัดหาอุปกรณ์',
    keywords: 'เครื่องเสียง audio ลำโพง ไมโครโฟน ไมค์ mic speaker ยืม คืน ซ่อม amplifier เครื่องขยาย'
  },

  {
    title: 'ยืม คืน วิทยุสื่อสาร', desc: 'ยืม-คืน/แจ้งซ่อมวิทยุสื่อสาร',
    url: '../pages/procurement.php?cat=radio', section: 'จัดหาอุปกรณ์',
    keywords: 'วิทยุ สื่อสาร radio walkie talkie ยืม คืน ซ่อม วิทยุมือถือ'
  },

  {
    title: 'ขอใช้ห้อง Data Center (Colocation)', desc: 'ขอยืมพื้นที่ภายในห้อง Data Center คพ.8.5',
    url: '../pages/procurement.php?cat=location', section: 'จัดหาอุปกรณ์',
    keywords: 'data center colocation ห้อง server rack คพ8.5 วางเครื่อง วางเซิร์ฟเวอร์'
  },

  {
    title: 'ขอใช้ห้องคอมพิวเตอร์', desc: 'จองห้องอบรมคอมพิวเตอร์ ชั้น L1M อาคาร 100 ปีคุณยายฯ',
    url: '../pages/procurement.php?cat=location', section: 'จัดหาอุปกรณ์',
    keywords: 'ห้องคอมพิวเตอร์ จอง อบรม L1M 100ปี location สถานที่ ห้องเรียน ห้องประชุม'
  },

  // ── เครือข่าย ───────────────────────────────────────────────
  {
    title: 'WiFi ภายในองค์กร', desc: 'รายชื่อ WiFi ในแต่ละพื้นที่ของวัดพระธรรมกาย',
    url: '../pages/network.php?cat=network', section: 'เครือข่าย',
    keywords: 'wifi ภายใน วัด พระธรรมกาย DKC network สัญญาณ ชื่อ wifi รหัส ssid รายชื่อ wifi ทั้งหมด'
  },

  {
    title: 'WiFi สำนักงานใหญ่', desc: 'DKC Network (HQ) — สำนักงานใหญ่',
    url: '../pages/network.php?cat=network', section: 'เครือข่าย',
    keywords: 'DKC HQ สำนักงานใหญ่ wifi headquarters ชื่อ wifi'
  },

  {
    title: 'WiFi อาคาร 100 ปี', desc: '.100Y-Office — อาคาร 100 ปีคุณยายฯ',
    url: '../pages/network.php?cat=network', section: 'เครือข่าย',
    keywords: '100ปี .100Y-Office wifi อาคาร คุณยาย ตึก 100'
  },

  {
    title: 'WiFi สภาธรรมกายสากล', desc: 'DKC Network (Spha) — สภาธรรมกายสากล',
    url: '../pages/network.php?cat=network', section: 'เครือข่าย',
    keywords: 'สภาธรรมกายสากล spha DKC wifi สภา'
  },

  {
    title: 'WiFi มหาวิหารคด', desc: 'DKC Network (VHK) — มหาวิหารคด',
    url: '../pages/network.php?cat=network', section: 'เครือข่าย',
    keywords: 'มหาวิหารคด VHK DKC wifi มหาวิหาร'
  },

  {
    title: 'WiFi อาคารพระผู้ปราบมาร', desc: 'DKC Network (PM) — อาคารพระผู้ปราบมาร',
    url: '../pages/network.php?cat=network', section: 'เครือข่าย',
    keywords: 'พระผู้ปราบมาร PM DKC wifi ปราบมาร'
  },

  {
    title: 'WiFi อาคารหนึ่งไม่มีสอง', desc: 'DKC Network (UPK) — อาคารหนึ่งไม่มีสอง',
    url: '../pages/network.php?cat=network', section: 'เครือข่าย',
    keywords: 'หนึ่งไม่มีสอง UPK DKC wifi upk'
  },

  {
    title: 'WiFi พื้นที่ 58 ไร่', desc: 'DKC Network — พื้นที่ 58 ไร่',
    url: '../pages/network.php?cat=network', section: 'เครือข่าย',
    keywords: '58ไร่ DKC wifi 58 ไร่'
  },

  {
    title: 'WiFi อาคารบุญรักษา', desc: 'Boonraksa — อาคารบุญรักษา',
    url: '../pages/network.php?cat=network', section: 'เครือข่าย',
    keywords: 'บุญรักษา Boonraksa wifi อาคาร'
  },
];