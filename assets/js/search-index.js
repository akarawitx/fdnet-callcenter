// assets/js/search-index.js
// ══════════════════════════════════════════════════════════════
// Search Index — รวมเนื้อหาทุกหน้าของเว็บไซต์กองบริหารสารสนเทศ
// อัปเดตล่าสุด: 2568
// ══════════════════════════════════════════════════════════════

var B = B || '';
window.SITE_SEARCH_INDEX = [

  // ════════════════════════════════════════════
  // หน้าหลัก
  // ════════════════════════════════════════════
  {
    title: 'หน้าหลัก',
    desc: 'กองบริการสารสนเทศ วัดพระธรรมกาย',
    url: B + '/index.php',
    section: 'หน้าหลัก',
    keywords: 'home หน้าหลัก กองบริการ กองบริหาร สารสนเทศ it center วัดพระธรรมกาย dhammakaya ติดต่อ โทร 4141 14141'
  },

  // ════════════════════════════════════════════
  // บริการ IT — services.php
  // ════════════════════════════════════════════
  {
    title: 'ขอ Account ใหม่',
    desc: 'สมัครบัญชีผู้ใช้งานใหม่สำหรับบุคลากรที่ยังไม่เคยมี Account ในระบบ',
    url: B + '/pages/services.php?cat=account',
    section: 'บริการ IT',
    keywords: 'account ใหม่ สมัคร สร้าง username บัญชี register fdnet หน้าแดง new user ขอบัญชีใหม่ เปิดบัญชี ครั้งแรก ยังไม่มี'
  },
  {
    title: 'ต่ออายุ Account',
    desc: 'ขยายอายุการใช้งานบัญชีที่ใกล้หมดอายุหรือถูกระงับชั่วคราว',
    url: B + '/pages/services.php?cat=renew',
    section: 'บริการ IT',
    keywords: 'ต่ออายุ renew account หมดอายุ ระงับ ขยาย expire อายุ ต่อ ปีใหม่ ธันวาคม ปีนี้ ต่ออายุปี fdnet.dhammakaya.network register_renew'
  },
  {
    title: 'เช็กสถานะ Account / รหัสผ่าน',
    desc: 'ตรวจสอบว่าบัญชียังใช้งานได้อยู่หรือไม่ วันหมดอายุ และสถานะรหัสผ่าน',
    url: B + '/pages/services.php?cat=status',
    section: 'บริการ IT',
    keywords: 'เช็ก สถานะ ตรวจสอบ account รหัสผ่าน check status password expire วันหมดอายุ ยังใช้ได้ ใช้งานได้ไหม บัญชี oauth chkrenew OAuthDKC'
  },
  {
    title: 'รีเซทรหัสผ่าน',
    desc: 'ขอรีเซทรหัสผ่านกรณีลืมรหัสผ่านหรือรหัสผ่านหมดอายุ ผ่านระบบ OTP Email',
    url: B + '/pages/services.php?cat=reset',
    section: 'บริการ IT',
    keywords: 'reset รีเซท รหัสผ่าน ลืม password เปลี่ยน change forgot otp เข้าไม่ได้ ล็อกอินไม่ได้ pass pw ใหม่ กำหนดใหม่ ตั้งใหม่ new_domain'
  },
  {
    title: 'ขอ Join Domain',
    desc: 'ขอ Computer Name เพื่อนำเครื่องเข้าสู่ระบบ Domain ขององค์กร dhammakaya.network',
    url: B + '/pages/services.php?cat=domain',
    section: 'บริการ IT',
    keywords: 'join domain เข้าโดเมน computer name dhammakaya.network เครื่อง ลงทะเบียน คอมพิวเตอร์ ชื่อเครื่อง ขอชื่อ เข้าระบบ องค์กร'
  },
  {
    title: 'ขอสิทธิ์เข้า Computer',
    desc: 'ขอเพิ่มสิทธิ์ Username ให้สามารถ Login เข้าคอมพิวเตอร์เครื่องที่ต้องการได้',
    url: B + '/pages/services.php?cat=access',
    section: 'บริการ IT',
    keywords: 'สิทธิ์ computer login เข้า access permission เครื่อง เพิ่มสิทธิ์ ขอสิทธิ์ เข้าเครื่อง ใช้เครื่อง เครื่องอื่น'
  },
  {
    title: 'ขอเปลี่ยน Email',
    desc: 'ขอเปลี่ยนอีเมลที่ผูกกับ Account หน้าแดง เพื่อใช้รีเซทรหัสผ่านในอนาคต',
    url: B + '/pages/services.php?cat=email',
    section: 'บริการ IT',
    keywords: 'เปลี่ยน email อีเมล เมล ผูก บัญชี แก้ไข update profile oauth'
  },
  {
    title: 'ขอเพิ่มปริมาณอินเทอร์เน็ต',
    desc: 'ขอปรับโควต้าหรือ Bandwidth อินเทอร์เน็ต โดยต้องได้รับการอนุมัติจากหัวหน้า',
    url: B + '/pages/services.php?cat=internet',
    section: 'บริการ IT',
    keywords: 'อินเทอร์เน็ต เพิ่ม โควต้า bandwidth internet quota ปรับ เน็ต ช้า หมด ขอเพิ่ม ขยาย เพิ่มเน็ต'
  },
  {
    title: 'เช็กโควต้าอินเทอร์เน็ต',
    desc: 'ตรวจสอบปริมาณอินเทอร์เน็ตที่ใช้ไปในแต่ละวัน ผ่าน Sophos User Portal',
    url: B + '/pages/services.php?cat=quota',
    section: 'บริการ IT',
    keywords: 'โควต้า quota อินเทอร์เน็ต internet ตรวจสอบ sophos user portal cyberoam เน็ตเหลือ เน็ตหมด ใช้ไปเท่าไหร่ ดูโควต้า CurrentDailyCycle'
  },

  // ════════════════════════════════════════════
  // แจ้งปัญหา — support.php
  // ════════════════════════════════════════════
  {
    title: 'ปัญหาที่พบบ่อย — ภาพรวม',
    desc: 'รวมปัญหาที่พบบ่อยด้านสารสนเทศ เช่น เข้าหน้าแดงไม่ได้ เข้า HR ไม่ได้',
    url: B + '/pages/support.php',
    section: 'แจ้งปัญหา',
    keywords: 'ปัญหา faq แจ้ง support ช่วยเหลือ help ไม่ได้ ไม่สามารถ'
  },
  {
    title: 'เข้าหน้าแดงไม่ได้ / เข้าใช้อินเทอร์เน็ตไม่ได้',
    desc: 'รวมปัญหาที่พบบ่อยเมื่อไม่สามารถ Login หน้าแดง FD-NET หรือใช้งานอินเทอร์เน็ตไม่ได้',
    url: B + '/pages/support.php?cat=redlogin',
    section: 'แจ้งปัญหา',
    keywords: 'หน้าแดง fdnet เข้าไม่ได้ login ล็อกอิน อินเทอร์เน็ต ใช้งานไม่ได้ ล็อค รหัสผ่าน หมดอายุ โควต้า ระงับ account disabled cyberoam'
  },
  {
    title: 'บัญชีถูกล็อคชั่วคราว (ใส่รหัสผิดหลายครั้ง)',
    desc: 'ระบบจะล็อคบัญชีอัตโนมัติหากใส่รหัสผ่านผิดติดต่อกัน 30 ครั้งภายใน 5 ชั่วโมง',
    url: B + '/pages/support.php?cat=redlogin',
    section: 'แจ้งปัญหา',
    keywords: 'ล็อค lock บัญชี ใส่รหัสผ่านผิด หลายครั้ง 30 ครั้ง 5 ชั่วโมง ล็อคอัตโนมัติ ปลดล็อค'
  },
  {
    title: 'รหัสผ่านหมดอายุ หรือจำรหัสผ่านไม่ได้ (หน้าแดง)',
    desc: 'รีเซทรหัสผ่านด้วยตัวเองได้ตลอด 24 ชั่วโมง ผ่านระบบ OTP Email',
    url: B + '/pages/support.php?cat=redlogin',
    section: 'แจ้งปัญหา',
    keywords: 'รหัสผ่าน หมดอายุ ลืม จำไม่ได้ reset รีเซท otp email password expire forgot หน้าแดง'
  },
  {
    title: 'Account ถูกระงับการใช้งาน (Account Disabled)',
    desc: 'ไม่ได้ต่ออายุ Account ประจำปี หรือสาเหตุอื่น บัญชีจึงถูกปิดการใช้งาน',
    url: B + '/pages/support.php?cat=redlogin',
    section: 'แจ้งปัญหา',
    keywords: 'ระงับ account disabled ปิดการใช้งาน ไม่ได้ต่ออายุ suspend บล็อก blocked ธันวาคม'
  },
  {
    title: 'โควต้าอินเทอร์เน็ตหมด',
    desc: 'โควต้าการใช้งานอินเทอร์เน็ตรายวันหมด รอบใหม่จะเริ่มในวันถัดไป',
    url: B + '/pages/support.php?cat=redlogin',
    section: 'แจ้งปัญหา',
    keywords: 'โควต้า quota หมด อินเทอร์เน็ต เน็ตหมด รายวัน วันถัดไป sophos cyberoam'
  },
  {
    title: 'เข้าเว็บ HR ไม่ได้',
    desc: 'รวมปัญหาที่พบบ่อยเมื่อไม่สามารถ Login เข้าระบบ HR ได้',
    url: B + '/pages/support.php?cat=hrweb',
    section: 'แจ้งปัญหา',
    keywords: 'hr เว็บ hr ระบบ hr login เข้าไม่ได้ human resource บุคคล ปุ่ม login ผิด'
  },
  {
    title: 'กดปุ่ม Login HR ผิด',
    desc: 'กรุณากดที่ปุ่ม "Login เข้าสู่ระบบ HR" เท่านั้น ห้ามกดปุ่มอื่น',
    url: B + '/pages/support.php?cat=hrweb',
    section: 'แจ้งปัญหา',
    keywords: 'hr login ปุ่มผิด กดผิด เข้าไม่ได้ hr web'
  },

  // ════════════════════════════════════════════
  // คู่มือการใช้งานระบบ — manual.php
  // ════════════════════════════════════════════
  {
    title: 'คู่มือการใช้งานระบบ — ภาพรวม',
    desc: 'คู่มือครอบคลุมเครือข่าย ความปลอดภัย Domain และเครื่องมือต่าง ๆ',
    url: B + '/pages/manual.php',
    section: 'คู่มือ',
    keywords: 'คู่มือ manual วิธี ขั้นตอน ตั้งค่า การใช้งาน ระบบ'
  },
  {
    title: 'คู่มือเครือข่ายและการเชื่อมต่อ',
    desc: 'คู่มือตรวจสอบ IP ping ตั้งค่า WiFi บน Android iOS Windows',
    url: B + '/pages/manual.php?cat=network',
    section: 'คู่มือ',
    keywords: 'คู่มือ ipconfig ping ip address wifi android ios windows เครือข่าย network การเชื่อมต่อ วิธี ขั้นตอน'
  },
  {
    title: 'คู่มือ ipconfig และ ping',
    desc: 'คำสั่ง ipconfig ตรวจสอบ IP Address และการ ping ทดสอบการเชื่อมต่อ',
    url: B + '/pages/manual.php?cat=network',
    section: 'คู่มือ',
    keywords: 'ipconfig ping ip command prompt cmd windows ตรวจสอบ คำสั่ง dos เช็ค ip หา ip ดู ip ของตัวเอง'
  },
  {
    title: 'คู่มือตั้งค่า WiFi .100Y-dot1x-Dhammakaya บน Android',
    desc: 'ตั้งค่า .100Y-dot1x-Dhammakaya บน Android PEAP EAP FD-NET',
    url: B + '/pages/manual.php?cat=network',
    section: 'คู่มือ',
    keywords: 'wifi android ตั้งค่า 100Y dot1x Dhammakaya PEAP EAP fdnet captive portal มือถือ แอนดรอยด์ samsung huawei oppo เชื่อมต่อ'
  },
  {
    title: 'คู่มือตั้งค่า WiFi .100Y-dot1x-Dhammakaya บน iOS',
    desc: 'ตั้งค่า .100Y-dot1x-Dhammakaya บน iPhone iPad Trust Certificate',
    url: B + '/pages/manual.php?cat=network',
    section: 'คู่มือ',
    keywords: 'wifi ios iphone ipad ตั้งค่า 100Y dot1x Dhammakaya trust certificate apple มือถือ แอปเปิ้ล'
  },
  {
    title: 'คู่มือตั้งค่า WiFi .100Y-dot1x-Dhammakaya บน Windows 7',
    desc: 'ตั้งค่า .100Y-dot1x-Dhammakaya บน Windows 7 WPA2-Enterprise',
    url: B + '/pages/manual.php?cat=network',
    section: 'คู่มือ',
    keywords: 'wifi windows 7 ตั้งค่า WPA2 enterprise PEAP WLAN autoconfig คอมพิวเตอร์ วินโดวส์ เจ็ด 100Y dot1x'
  },
  {
    title: 'คู่มือระบบปฏิบัติการและความปลอดภัย',
    desc: 'อัปเดต Windows Antivirus ป้องกันมัลแวร์ AVG',
    url: B + '/pages/manual.php?cat=security',
    section: 'คู่มือ',
    keywords: 'windows update อัพเดต antivirus avg malware มัลแวร์ patch ความปลอดภัย security ไวรัส ป้องกัน'
  },
  {
    title: 'คู่มือการใช้งาน Domain',
    desc: 'นำเครื่องเข้า Domain dhammakaya.network รองรับ Mac, Windows 7, 8, 10, 11',
    url: B + '/pages/manual.php?cat=domain',
    section: 'คู่มือ',
    keywords: 'domain dhammakaya.network join เข้า mac windows คู่มือ active directory เข้าโดเมน ลงทะเบียนเครื่อง'
  },
  {
    title: 'คู่มือ Join Domain — Mac OS X',
    desc: 'ขั้นตอนนำ Mac เข้า Domain dhammakaya.network ผ่าน Directory Utility',
    url: B + '/pages/manual.php?cat=domain',
    section: 'คู่มือ',
    keywords: 'mac join domain active directory directory utility bind macbook imac apple โดเมน'
  },
  {
    title: 'คู่มือ Join Domain — Windows 7',
    desc: 'ขั้นตอนนำ Windows 7 เข้า Domain dhammakaya.network',
    url: B + '/pages/manual.php?cat=domain',
    section: 'คู่มือ',
    keywords: 'windows 7 join domain computer name workgroup properties วินโดวส์ เจ็ด เข้าโดเมน'
  },
  {
    title: 'คู่มือ Join Domain — Windows 8',
    desc: 'ขั้นตอนนำ Windows 8 เข้า Domain dhammakaya.network',
    url: B + '/pages/manual.php?cat=domain',
    section: 'คู่มือ',
    keywords: 'windows 8 join domain this pc properties วินโดวส์ แปด เข้าโดเมน'
  },
  {
    title: 'คู่มือ Join Domain — Windows 10',
    desc: 'ขั้นตอนนำ Windows 10 เข้า Domain dhammakaya.network',
    url: B + '/pages/manual.php?cat=domain',
    section: 'คู่มือ',
    keywords: 'windows 10 join domain computer name dhammakaya.network วินโดวส์ สิบ เข้าโดเมน'
  },
  {
    title: 'คู่มือ Join Domain — Windows 11',
    desc: 'ขั้นตอนนำ Windows 11 เข้า Domain dhammakaya.network',
    url: B + '/pages/manual.php?cat=domain',
    section: 'คู่มือ',
    keywords: 'windows 11 join domain settings about วินโดวส์ สิบเอ็ด เข้าโดเมน'
  },
  {
    title: 'คู่มือการตั้งค่าและเครื่องมือเพิ่มเติม',
    desc: 'ปรับแต่ง Browser Chrome Flags และเครื่องมือเพิ่มเติม',
    url: B + '/pages/manual.php?cat=tools',
    section: 'คู่มือ',
    keywords: 'chrome flags browser ปรับ ตั้งค่า google เบราว์เซอร์ chrome://flags ขั้นสูง advanced tools'
  },
  {
    title: 'คู่มือปรับ Chrome Flags',
    desc: 'วิธีการปรับแต่งการตั้งค่าขั้นสูงของ Google Chrome',
    url: B + '/pages/manual.php?cat=tools',
    section: 'คู่มือ',
    keywords: 'chrome flags browser ปรับ ตั้งค่า google เบราว์เซอร์ chrome://flags'
  },
  {
    title: 'เอกสารระบบ คพ.',
    desc: 'เอกสารอ้างอิงระบบ คพ. สำหรับกองบริหารสารสนเทศ คพ.3.3 คพ.FDnet',
    url: B + '/pages/manual.php?cat=documents',
    section: 'คู่มือ',
    keywords: 'เอกสาร คพ fdnet คู่มือ อ้างอิง document form แบบฟอร์ม 3.3'
  },

  // ════════════════════════════════════════════
  // ระบบจัดหาอุปกรณ์สารสนเทศ — procurement.php
  // ════════════════════════════════════════════
  {
    title: 'ระบบจัดหาอุปกรณ์สารสนเทศ — ภาพรวม',
    desc: 'คู่มือการขอใช้อุปกรณ์สารสนเทศทุกประเภทภายในองค์กร',
    url: B + '/pages/procurement.php',
    section: 'จัดหาอุปกรณ์',
    keywords: 'จัดหา อุปกรณ์ สารสนเทศ ขอ คพ procurement ทั้งหมด'
  },
  {
    title: 'ขอใช้งาน Access Control',
    desc: 'ขั้นตอนการขออนุมัติ Access Control ระบบควบคุมการเข้าออก ดาวน์โหลดแบบฟอร์ม กรอก คพ.',
    url: B + '/pages/procurement.php?cat=accessControl',
    section: 'จัดหาอุปกรณ์',
    keywords: 'access control ประตู เข้าออก คพ ขออนุมัติ บัตร สแกน card reader กุญแจ ประตูอัตโนมัติ'
  },
  {
    title: 'ขอใช้งาน CCTV',
    desc: 'ขั้นตอนการขอติดตั้งกล้องวงจรปิด หรือแจ้งซ่อม CCTV',
    url: B + '/pages/procurement.php?cat=cctv',
    section: 'จัดหาอุปกรณ์',
    keywords: 'cctv กล้อง วงจรปิด ติดตั้ง ขอ camera กล้องวงจรปิด security กล้องดู แจ้งซ่อม'
  },
  {
    title: 'ขอสิทธิ์ VPN ใหม่ / ต่ออายุ VPN / ขอใช้อีเมลองค์กร',
    desc: 'กรอก Link คพ. แนบบัตรองค์กร รอหัวหน้ากอง / เจ้าอาวาส และทีม CNA อนุมัติ',
    url: B + '/pages/procurement.php?cat=vpn%26mail',
    section: 'จัดหาอุปกรณ์',
    keywords: 'vpn mail อีเมล email องค์กร ขอ สิทธิ์ ต่ออายุ ทำงานนอกสถานที่ remote เข้าจากบ้าน CNA อนุมัติ บัตรองค์กร vpn&mail'
  },
  {
    title: 'ขอใช้งานกล่องสัญญาณ GBN',
    desc: 'ขั้นตอนการขอใช้งานกล่องสัญญาณ GBN หรือแจ้งซ่อม',
    url: B + '/pages/procurement.php?cat=gbn',
    section: 'จัดหาอุปกรณ์',
    keywords: 'gbn กล่องสัญญาณ สัญญาณ กล่อง set top box ดาวเทียม แจ้งซ่อม'
  },
  {
    title: 'ขอใช้งานจอ LED',
    desc: 'ขั้นตอนการขอใช้งานจอ LED กรอก Link คพ. ดาวน์โหลด PDF',
    url: B + '/pages/procurement.php?cat=led',
    section: 'จัดหาอุปกรณ์',
    keywords: 'led จอ display ขอ ใช้งาน จอใหญ่ หน้าจอ ป้าย ป้ายไฟ'
  },
  {
    title: 'ขอ IP Address ถาวร / Server',
    desc: 'ขั้นตอนการขอใช้งาน IP Address ถาวรสำหรับ Server ดาวน์โหลดแบบฟอร์ม คพ.3.6',
    url: B + '/pages/procurement.php?cat=server',
    section: 'จัดหาอุปกรณ์',
    keywords: 'ip address ถาวร server static คพ 3.6 fixed ip เซิร์ฟเวอร์ NCR3.6'
  },
  {
    title: 'ขอใช้งาน Wi-Fi และ LAN',
    desc: 'ขั้นตอนการขอใช้งาน Wi-Fi และ LAN ขออนุมัติเครือข่าย',
    url: B + '/pages/procurement.php?cat=wifi%26lan',
    section: 'จัดหาอุปกรณ์',
    keywords: 'wifi lan เครือข่าย ขอ ใช้งาน network สายแลน ติดตั้งเน็ต เดินสาย wi-fi wifi&lan'
  },
  {
    title: 'ค่าบริการโทรศัพท์มือถือ',
    desc: 'ดาวน์โหลดแบบฟอร์ม ทศ.1 ขออนุมัติใหม่ / ทศ.2 เปลี่ยนเบอร์ ย้ายค่าย / ทศ.3 ย้ายหน่วยงาน',
    url: B + '/pages/procurement.php?cat=telephonebill',
    section: 'จัดหาอุปกรณ์',
    keywords: 'โทรศัพท์ ค่าบริการ เบิก telephone bill ค่าโทร มือถือ ซิม ทศ.1 ทศ.2 ทศ.3 เปลี่ยนเบอร์ ย้ายค่าย งบประมาณ ย้ายหน่วยงาน'
  },
  {
    title: 'ถ่ายเอกสารขาว-ดำ',
    desc: 'ห้องถ่ายเอกสารอาคาร 100 ปีคุณยายฯ ชั้น 1 ฝั่งตะวันออก เบอร์ภายใน 11820',
    url: B + '/pages/procurement.php?cat=printDocument',
    section: 'จัดหาอุปกรณ์',
    keywords: 'ถ่ายเอกสาร print เอกสาร copy ขอ photocopy ซีร็อกซ์ ถ่ายสำเนา ขาวดำ 11820 ชั้น 1 ฝั่งตะวันออก'
  },
  {
    title: 'ขอใช้งาน File Share (ss100, st100)',
    desc: 'ขอสิทธิ์เข้าไฟล์แชร์ คพ.8.2 หรือขอสร้างพื้นที่ไฟล์แชร์ใหม่ คพ.8.1',
    url: B + '/pages/procurement.php?cat=fileShred',
    section: 'จัดหาอุปกรณ์',
    keywords: 'file share แชร์ไฟล์ ไฟล์ folder โฟลเดอร์ shared folder network drive เข้าถึงไฟล์ ss100 st100 คพ8.1 คพ8.2 permission storage CNA'
  },
  {
    title: 'อบรมความรู้สารสนเทศ / อบรมโปรแกรมคอมพิวเตอร์',
    desc: 'สมัครอบรมผ่าน Jotform กรอก Link คพ. ห้องอบรม ชั้น L1M อาคาร 100 ปีคุณยายฯ',
    url: B + '/pages/procurement.php?cat=training',
    section: 'จัดหาอุปกรณ์',
    keywords: 'อบรม training ความรู้ สารสนเทศ it สมัคร เรียน course class โปรแกรม คอมพิวเตอร์ jotform ศิรินภา ผิง 11850 L1M ข้อปฏิบัติ กติกา'
  },
  {
    title: 'ยืม คืน ซ่อมอุปกรณ์คอมพิวเตอร์',
    desc: 'ขั้นตอนการยืม คืน และแจ้งซ่อมอุปกรณ์คอมพิวเตอร์ แบบฟอร์ม คพ.5',
    url: B + '/pages/procurement.php?cat=it%26com',
    section: 'จัดหาอุปกรณ์',
    keywords: 'ยืม คืน ซ่อม คอมพิวเตอร์ computer อุปกรณ์ คพ5 repair borrow notebook laptop โน้ตบุ๊ค คีย์บอร์ด เมาส์ จอ it&com'
  },
  {
    title: 'จัดซื้อ ยืม คืน แจ้งซ่อมอุปกรณ์มัลติมีเดีย',
    desc: 'จัดซื้อ ยืม คืน แจ้งซ่อมอุปกรณ์มัลติมีเดีย โปรเจคเตอร์ จอ',
    url: B + '/pages/procurement.php?cat=video',
    section: 'จัดหาอุปกรณ์',
    keywords: 'มัลติมีเดีย multimedia โปรเจคเตอร์ projector จอ ยืม คืน ซ่อม กล้อง camera วีดีโอ'
  },
  {
    title: 'จัดซื้อ ยืม คืน แจ้งซ่อมอุปกรณ์เครื่องเสียง',
    desc: 'จัดซื้อ ยืม คืน แจ้งซ่อมอุปกรณ์เครื่องเสียง',
    url: B + '/pages/procurement.php?cat=audio',
    section: 'จัดหาอุปกรณ์',
    keywords: 'เครื่องเสียง audio ลำโพง ไมโครโฟน ไมค์ mic speaker ยืม คืน ซ่อม amplifier เครื่องขยาย'
  },
  {
    title: 'ยืม-คืน / แจ้งซ่อมวิทยุสื่อสาร',
    desc: 'ยืม-คืน/แจ้งซ่อมวิทยุสื่อสาร ดาวน์โหลดแบบฟอร์มยืม-คืน',
    url: B + '/pages/procurement.php?cat=radio',
    section: 'จัดหาอุปกรณ์',
    keywords: 'วิทยุ สื่อสาร radio walkie talkie ยืม คืน ซ่อม วิทยุมือถือ'
  },
  {
    title: 'ขอใช้ห้อง Data Center (Colocation)',
    desc: 'ขอยืมพื้นที่ภายในห้อง Data Center ดาวน์โหลดแบบฟอร์ม คพ.8.5',
    url: B + '/pages/procurement.php?cat=location',
    section: 'จัดหาอุปกรณ์',
    keywords: 'data center colocation ห้อง server rack คพ8.5 วางเครื่อง วางเซิร์ฟเวอร์'
  },
  {
    title: 'ขอใช้ห้องคอมพิวเตอร์',
    desc: 'จองห้องอบรมคอมพิวเตอร์ ชั้น L1M อาคาร 100 ปีคุณยายฯ ปฏิทินการจอง',
    url: B + '/pages/procurement.php?cat=location',
    section: 'จัดหาอุปกรณ์',
    keywords: 'ห้องคอมพิวเตอร์ จอง อบรม L1M 100ปี location สถานที่ ห้องเรียน ห้องประชุม ปฏิทิน'
  },

  // ════════════════════════════════════════════
  // ระบบเครือข่าย — network.php
  // ════════════════════════════════════════════
  {
    title: 'ระบบเครือข่าย & ความปลอดภัย — ภาพรวม',
    desc: 'เครือข่ายอินเทอร์เน็ตไร้สายในแต่ละพื้นที่ของวัดพระธรรมกาย',
    url: B + '/pages/network.php',
    section: 'เครือข่าย',
    keywords: 'network เครือข่าย ความปลอดภัย wifi lan ภายใน วัด'
  },
  {
    title: 'WiFi ภายในองค์กร — รายชื่อทั้งหมด',
    desc: 'รายชื่อ WiFi ในแต่ละพื้นที่ของวัดพระธรรมกาย DKC Network',
    url: B + '/pages/network.php?cat=network',
    section: 'เครือข่าย',
    keywords: 'wifi ภายใน วัด พระธรรมกาย DKC network สัญญาณ ชื่อ wifi รหัส ssid รายชื่อ wifi ทั้งหมด'
  },
  {
    title: 'WiFi สำนักงานใหญ่ — DKC Network (HQ)',
    desc: 'DKC Network (HQ) — สำนักงานใหญ่',
    url: B + '/pages/network.php?cat=network',
    section: 'เครือข่าย',
    keywords: 'DKC HQ สำนักงานใหญ่ wifi headquarters'
  },
  {
    title: 'WiFi อาคาร 100 ปีคุณยายฯ',
    desc: '.100Y-Office และ .100Y.Dhammakaya_dot1x — อาคาร 100 ปีคุณยายฯ',
    url: B + '/pages/network.php?cat=network',
    section: 'เครือข่าย',
    keywords: '100ปี 100Y Office wifi อาคาร คุณยาย ตึก dot1x'
  },
  {
    title: 'WiFi สภาธรรมกายสากล',
    desc: 'DKC Network (Spha) — สภาธรรมกายสากล',
    url: B + '/pages/network.php?cat=network',
    section: 'เครือข่าย',
    keywords: 'สภาธรรมกายสากล spha DKC wifi สภา'
  },
  {
    title: 'WiFi มหาวิหารคด',
    desc: 'DKC Network (VHK) — มหาวิหารคด',
    url: B + '/pages/network.php?cat=network',
    section: 'เครือข่าย',
    keywords: 'มหาวิหารคด VHK DKC wifi มหาวิหาร'
  },
  {
    title: 'WiFi อาคารพระผู้ปราบมาร 1-2',
    desc: 'PIM-LANWAT-1-2-CNA และ PM-12-Dot1X-CNA — อาคารพระผู้ปราบมาร',
    url: B + '/pages/network.php?cat=network',
    section: 'เครือข่าย',
    keywords: 'พระผู้ปราบมาร PM DKC wifi ปราบมาร PIM CNA'
  },
  {
    title: 'WiFi อาคารหนึ่งไม่มีสอง',
    desc: 'DKC Network (UPK) — อาคารหนึ่งไม่มีสอง',
    url: B + '/pages/network.php?cat=network',
    section: 'เครือข่าย',
    keywords: 'หนึ่งไม่มีสอง UPK DKC wifi upk'
  },
  {
    title: 'WiFi พื้นที่ 58 ไร่',
    desc: 'DKC Network — พื้นที่ 58 ไร่',
    url: B + '/pages/network.php?cat=network',
    section: 'เครือข่าย',
    keywords: '58ไร่ DKC wifi 58 ไร่'
  },
  {
    title: 'WiFi อาคารบุญรักษา',
    desc: 'Boonraksa — อาคารบุญรักษา',
    url: B + '/pages/network.php?cat=network',
    section: 'เครือข่าย',
    keywords: 'บุญรักษา Boonraksa wifi อาคาร'
  },
  {
    title: 'WiFi อาคารร้อยสิบห้าปี',
    desc: 'DKC Network (115Y) — อาคารร้อยสิบห้าปี',
    url: B + '/pages/network.php?cat=network',
    section: 'เครือข่าย',
    keywords: 'ร้อยสิบห้าปี 115Y DKC wifi 115'
  },

];