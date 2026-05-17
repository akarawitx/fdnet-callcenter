# กองบริหารสารสนเทศ — FD-net Callcenter 4141

> ระบบพอร์ทัลบริการสารสนเทศสำหรับบุคลากรวัดพระธรรมกาย  
> พัฒนาด้วย PHP แบบ Traditional MVC-like Architecture ไม่พึ่งพา Framework ภายนอก

---

## สารบัญ

- [ภาพรวมโครงการ](#ภาพรวมโครงการ)
- [คุณสมบัติหลัก (Features)](#คุณสมบัติหลัก-features)
- [เทคโนโลยีที่ใช้](#เทคโนโลยีที่ใช้)
- [โครงสร้างไฟล์](#โครงสร้างไฟล์)
- [สถาปัตยกรรมของระบบ](#สถาปัตยกรรมของระบบ)
- [การตั้งค่าระบบ (Configuration)](#การตั้งค่าระบบ-configuration)
- [หน้าและโมดูลต่าง ๆ](#หน้าและโมดูลต่าง-ๆ)
- [ระบบค้นหา (Search)](#ระบบค้นหา-search)
- [ระบบ Lightbox](#ระบบ-lightbox)
- [การติดตั้งและเปิดใช้งาน](#การติดตั้งและเปิดใช้งาน)
- [Environment & BASE_URL](#environment--base_url)
- [การปรับแต่งและขยายระบบ](#การปรับแต่งและขยายระบบ)

---

## ภาพรวมโครงการ

ระบบนี้เป็นเว็บพอร์ทัลสำหรับให้บริการด้านสารสนเทศแก่บุคลากรภายในวัดพระธรรมกาย พัฒนาโดยทีมกองบริการสารสนเทศ ฝ่ายสารสนเทศ ตั้งอยู่ที่อาคาร 100 ปีคุณยายฯ ตึก O ชั้น 11

ระบบครอบคลุมบริการหลัก ได้แก่:

- การจัดการบัญชีผู้ใช้งาน (Account) ทั้งการสมัคร ต่ออายุ เช็กสถานะ และรีเซทรหัสผ่าน
- คู่มือการใช้งานระบบเครือข่าย การ Join Domain และความปลอดภัย
- ระบบจัดหาและยืม-คืนอุปกรณ์สารสนเทศ
- ฐานข้อมูลปัญหาที่พบบ่อย (FAQ) พร้อมแนวทางแก้ไข
- ระบบค้นหาแบบ Real-time ครอบคลุมเนื้อหาทั้งเว็บไซต์

---

## คุณสมบัติหลัก (Features)

### User-Facing

| คุณสมบัติ | รายละเอียด |
|---|---|
| **Quick Service Strip** | ปุ่มลัดบริการ 8 รายการบน Hero Banner สามารถเข้าถึงบริการหลักได้ทันที |
| **Carousel Slideshow** | สไลด์แนะนำบริการพร้อม Dot Navigation และ Auto-transition |
| **Sidebar Navigation** | เมนูหมวดหมู่แบบ Sticky ในทุกหน้าย่อย ช่วยนำทางระหว่างบริการ |
| **Real-time Search** | ค้นหาแบบ Client-side ที่ Debounce อัตโนมัติ พร้อม Keyboard Navigation |
| **FAQ Accordion** | ระบบถาม-ตอบแบบพับ-ขยาย พร้อม Indicator dot แสดงสถานะ |
| **Step-by-step Guide** | คู่มือแสดงขั้นตอนพร้อมภาพประกอบแบบ Accordion |
| **Lightbox Gallery** | ดูภาพขยายพร้อม Zoom, Pan, Pinch (Touch), Keyboard navigation |
| **Responsive Layout** | รองรับทุกขนาดหน้าจอ พร้อม Mobile Hamburger Menu |
| **Dark Contact Bar** | แถบติดต่อในทุกหน้า ลิงก์ Email, โทรศัพท์ และ LINE Official |

### Developer-Facing

| คุณสมบัติ | รายละเอียด |
|---|---|
| **Shared Panel Component** | `single-panel.php` render ได้ทั้ง Grid View (ทุกหมวด) และ Single View (เลือกหมวด) |
| **Helper Functions** | ฟังก์ชัน `faq_accordion()`, `faq_cause_box()`, `make_accordion()` สำหรับ generate HTML |
| **Dynamic Navigation** | เมนูหลักสร้างจาก `get_navigation()` array ใน `config.php` รองรับ 3 ระดับ (Nested) |
| **Active Menu Detection** | `is_active()` ตรวจสอบหน้าปัจจุบันโดยเปรียบเทียบ `basename($_SERVER['PHP_SELF'])` |
| **Auto BASE_URL Detection** | ตรวจสอบ Environment อัตโนมัติ รองรับ localhost, VM และ Production |
| **Search Index** | ไฟล์ `search-index.js` เป็น Flat JSON array รวมข้อมูลทุกหน้าสำหรับ Client-side Search |

---

## เทคโนโลยีที่ใช้

### Backend
- **PHP 8.x** — ไม่ใช้ Framework ใดทั้งสิ้น (Vanilla PHP) ใช้ `require_once` สำหรับ include ส่วนประกอบ
- **PHP Closures / Arrow Functions** — ใช้ใน `array_filter()` สำหรับกรองข้อมูล

### Frontend
- **HTML5 / CSS3** — เขียน Inline Style และ `<style>` block ต่อหน้า ไม่มี External CSS Framework
- **Vanilla JavaScript (ES5/ES6)** — ไม่ใช้ jQuery หรือ Framework ใด ๆ
- **CSS Custom Properties (Variables)** — ระบบ Design Token ผ่าน `:root` variables สำหรับสี, font, radius, shadow
- **CSS Grid & Flexbox** — Layout หลักทั้งหมด
- **Google Fonts** — IBM Plex Sans (ภาษาอังกฤษ) + Prompt (ภาษาไทย)

### Asset Management
- ไม่มี Build Tool (ไม่มี Webpack, Vite, npm)
- ไฟล์ JavaScript เขียนตรงใน `assets/js/` และ Inline ใน `<script>` tag
- รูปภาพจัดเก็บใน `assets/images/` จัดโฟลเดอร์ตามหมวดหมู่

### Infrastructure
- Web Server: Apache / Nginx (PHP compatible)
- ไม่ใช้ Database (ข้อมูลทั้งหมดอยู่ใน PHP Array)
- ไม่มี Session / Authentication (Public Portal)

---

## โครงสร้างไฟล์

```
makarawit/
│
├── index.php                    # หน้าหลัก (Hero, Quick Strip, Carousel, Guide Grid)
│
├── assets/
│   ├── images/
│   │   ├── logo.png             # โลโก้องค์กร
│   │   ├── redlogin.png         # ภาพประกอบ Slide 1
│   │   ├── fdnet.png            # ภาพประกอบ Slide 2
│   │   ├── account_form_preview.png
│   │   ├── renew_form_preview.png
│   │   ├── reset_step1.png … reset_success.png
│   │   ├── status_step1.png … status_email.png
│   │   ├── quota_login.png, quota_usage.png
│   │   │
│   │   ├── manual/
│   │   │   ├── network/
│   │   │   │   ├── ping/        # ping1–ping5.png
│   │   │   │   ├── android/     # android1–android6.png
│   │   │   │   ├── ios/         # ios1–ios10.png (ios9, ios10 สำรอง)
│   │   │   │   └── windowns/    # windowns1–windowns10.png
│   │   │   └── domain/
│   │   │       ├── mac/         # mac1–mac14.png
│   │   │       ├── win7/        # win7-0 – win7-15.png
│   │   │       ├── win8/        # win8-0 – win8-7.png
│   │   │       ├── win10/       # win10-0 – win10-8.png
│   │   │       ├── win11/       # win11-0 – win11-9.png
│   │   │       └── winXP/       # (สำรองสำหรับอนาคต)
│   │   │
│   │   ├── procurement/
│   │   │   ├── led/             # step1–step7.png
│   │   │   ├── training/        # step1–step8.png
│   │   │   ├── vpn/             # vpn1.png
│   │   │   └── location/        # computer1–3.png, form1–3.png
│   │   │
│   │   └── support/
│   │       └── hr_login_button.png
│   │
│   └── js/
│       ├── search-index.js      # ข้อมูล Search Index ทั้งเว็บ (Flat JSON Array)
│       └── mobile-nav.js        # Logic สำหรับ Mobile Hamburger Menu
│
├── includes/
│   ├── config.php               # ค่าคงที่, BASE_URL, get_navigation(), is_active()
│   ├── header.php               # HTML Head, Site Header, Nav Bar, Mobile Nav, Search UI
│   ├── footer.php               # Footer, Lightbox HTML+JS, Copyright
│   └── single-panel.php         # Shared Layout: Sidebar + Content (Grid/Single view)
│
└── pages/
    ├── services.php             # บริการ IT — Account, Renew, Reset, Domain ฯลฯ
    ├── support.php              # ปัญหาที่พบบ่อย — FAQ Accordion
    ├── manual.php               # คู่มือการใช้งานระบบ — Step-by-step พร้อมรูป
    ├── procurement.php          # ระบบจัดหาอุปกรณ์ — แบบฟอร์ม คพ.
    └── network.php              # ระบบเครือข่าย — ตาราง WiFi ภายในองค์กร
```

---

## สถาปัตยกรรมของระบบ

### Pattern: Page-centric Include Architecture

ระบบใช้ Pattern แบบ PHP Include ดั้งเดิม โดยแต่ละหน้าทำงานดังนี้:

```
[page.php]
    │
    ├── require_once 'includes/config.php'   → โหลด Constants, get_navigation()
    │
    ├── กำหนดตัวแปร $panel_* ต่าง ๆ        → ส่งข้อมูลไปยัง shared component
    │
    ├── require_once 'includes/header.php'   → render <head>, <header>, <nav>, mobile nav
    │
    ├── [Page-specific HTML/PHP content]     → เนื้อหาเฉพาะหน้า
    │
    ├── require_once 'includes/single-panel.php' → Sidebar + Content layout
    │
    └── require_once 'includes/footer.php'   → Footer + Lightbox
```

### Shared Panel Component (`single-panel.php`)

Component กลางที่ทุกหน้ารองรับ 2 โหมดการแสดงผล:

**Grid View** — แสดงทุกรายการในหมวดหมู่ (เมื่อไม่มี `?cat=`)
```
┌─────────────────────────────────────────┐
│  Sidebar Menu  │  Grid ของ Items ทั้งหมด  │
└─────────────────────────────────────────┘
```

**Single View** — แสดงเนื้อหาเต็มรูปแบบของรายการเดียว (เมื่อมี `?cat=xxx`)
```
┌─────────────────────────────────────────┐
│  Sidebar Menu  │  รายละเอียดแบบเต็ม       │
│                │  Icon, Title, Steps,    │
│                │  Extra HTML Content     │
└─────────────────────────────────────────┘
```

ตัวแปรที่ต้องส่งก่อน include:

```php
$panel_title   = 'ชื่อหน้า';           // แสดงเป็น h1
$panel_cat     = $_GET['cat'] ?? '';  // หมวดปัจจุบัน
$panel_base    = 'services.php';       // URL ไฟล์ปัจจุบัน (สำหรับสร้าง href)
$panel_menu    = $categories;          // array ของ sidebar menu
$panel_items   = $all_services;        // array ของรายการทั้งหมด
$panel_contact = true;                 // แสดงกล่องติดต่อใน sidebar หรือไม่
```

### Data Structure ของ Items

แต่ละ Item ใน `$panel_items` มีโครงสร้าง:

```php
[
  'cat'        => 'account',            // ใช้ match กับ ?cat= ใน URL
  'icon'       => '<svg>...</svg>',     // SVG icon (Inline)
  'title'      => 'ขอ Account ใหม่',
  'desc'       => 'คำอธิบายสั้น...',
  'steps'      => ['ขั้นตอน 1', '...'], // optional: แสดงเป็น <ol>
  'time'       => '1 วันทำการ',         // optional: badge เวลาดำเนินการ
  'extra_html' => '...',               // optional: HTML เพิ่มเติมอิสระ
]
```

---

## การตั้งค่าระบบ (Configuration)

ไฟล์ `includes/config.php` เป็นศูนย์กลางของการตั้งค่าทั้งหมด:

```php
// ข้อมูลองค์กร
define('SITE_NAME',    'กองบริหารสารสนเทศ');
define('SITE_NAME_EN', 'FD-net Callcenter 4141');
define('SITE_PHONE',   '14141');
define('SITE_EMAIL',   'noc@dhammakaya.center');
define('SITE_HOURS',   'เปิดทำการ วันจันทร์–เสาร์ เวลา 09:00–17:30 น.');

// BASE_URL ตรวจจาก SCRIPT_NAME อัตโนมัติ
define('BASE_URL', '');                          // localhost / production root
define('BASE_URL', '/itdiv/makarawit-services'); // VM subdirectory
```

### Navigation Menu

เมนูหลักทั้งหมดสร้างจาก `get_navigation()` รองรับ 3 ระดับ (level 0, 1, 2):

```php
[
  'label'    => 'ยูสเซอร์หน้าแดง',
  'url'      => "$b/pages/services.php",
  'icon'     => '<svg>...</svg>',
  'children' => [
    ['label' => 'ขอ Account ใหม่', 'url' => "$b/pages/services.php?cat=account"],
    // ...
    ['label' => 'หมวดย่อย', 'url' => '...', 'children' => [ /* level 2 */ ]],
  ],
]
```

ฟังก์ชัน `render_nav_items()` ใน `header.php` จะวนซ้ำ Array นี้แบบ Recursive เพื่อสร้าง Dropdown Menu HTML

---

## หน้าและโมดูลต่าง ๆ

### `index.php` — หน้าหลัก

| ส่วนประกอบ | รายละเอียด |
|---|---|
| **Hero Banner** | Background gradient + ภาพจาก Unsplash, แสดงชื่อและวันเวลาทำการ |
| **Quick Service Strip** | 8 ปุ่มลอยออกจาก Hero ด้วย `position: absolute; bottom: -36px` |
| **Intro Carousel** | 2 Slide, ใช้ CSS `opacity + translateX` Transition, Auto-dot สร้างจาก JS |
| **Featured Guides Grid** | แสดง Item จาก `$featured_guides` array ในรูปแบบ Card list |

### `pages/services.php` — บริการ IT

รองรับ 9 หมวดบริการ: `account`, `renew`, `status`, `reset`, `domain`, `access`, `email`, `internet`, `quota`

แต่ละหมวดมี `extra_html` ที่ประกอบด้วย:
- ปุ่มลิงก์ไปฟอร์มจริง (Gradient Button)
- ภาพตัวอย่างพร้อม Browser Bar จำลอง
- ขั้นตอน Step-by-step พร้อมหมายเลข
- ปุ่มติดต่อ Email + LINE

### `pages/support.php` — ปัญหาที่พบบ่อย

ใช้ Helper Functions สร้าง HTML:

```php
faq_accordion($id, $title, $body_html)  // สร้าง Accordion Item
faq_cause_box($title, $desc, $type)     // กล่องสาเหตุ (info/warning/danger)
faq_action_btn($url, $label, $color)    // ปุ่มดำเนินการ
```

FAQ Toggle ทำงานด้วย `classList.toggle('is-open')` และ CSS `max-height` transition

### `pages/manual.php` — คู่มือการใช้งาน

ใช้ `make_accordion($id, $title, $icon, $steps[])` สร้าง Accordion พร้อมรูปภาพ:

```php
$steps = [
  [
    'title'   => 'เปิด Command Prompt',
    'desc'    => 'กด Windows + R แล้วพิมพ์ cmd...',
    'img'     => '../assets/images/manual/network/ping/ping1.png',
    'caption' => 'คำอธิบายใต้ภาพ',
  ],
  // ...
];
```

รองรับ Fallback เมื่อรูปโหลดไม่ได้ (แสดง Placeholder SVG)

### `pages/procurement.php` — ระบบจัดหาอุปกรณ์

16 หมวดบริการครอบคลุม: Access Control, CCTV, VPN, GBN, LED, Server/IP, WiFi/LAN, ค่าโทร, ถ่ายเอกสาร, File Share, อบรม, Computer, Multimedia, Audio, Radio, สถานที่

บางหมวดมี Accordion แบบซ้อน (ห้องคอมพิวเตอร์/Data Center) ใช้ CSS class `.eq-acc` แยกต่างหากจาก FAQ Accordion หลัก

### `pages/network.php` — ระบบเครือข่าย

แสดงตาราง WiFi SSID ทั้งหมดภายในองค์กร จำนวน 11 พื้นที่ ในรูปแบบ `<table>`

---

## ระบบค้นหา (Search)

### สถาปัตยกรรม

ระบบค้นหาเป็น **Client-side Full-text Search** ทั้งหมด ไม่มี API Call:

```
search-index.js    →   window.SITE_SEARCH_INDEX = [...]
                                    ↓
                         Header Search Input (header.php)
                                    ↓
                         score() function (Weighted matching)
                                    ↓
                         Grouped Dropdown Results
```

### Scoring Algorithm

```javascript
function score(item, tokens) {
  // title match  → +10 คะแนน
  // section match → +5 คะแนน
  // desc match   → +3 คะแนน
  // keywords     → +2 คะแนน
}
```

### Search Index Structure

```javascript
{
  title:    'ขอ Account ใหม่',
  desc:     'สมัครบัญชีผู้ใช้งานใหม่...',
  url:      '/pages/services.php?cat=account',
  section:  'บริการ IT',
  keywords: 'account ใหม่ สมัคร username บัญชี register fdnet...'
}
```

Index ครอบคลุม 60+ รายการ แบ่ง 6 Section: บริการ IT, แจ้งปัญหา, คู่มือ, จัดหาอุปกรณ์, เครือข่าย, หน้าหลัก

### Features ของ Search UI

- Keyboard navigation (↑↓ เลือก, Enter เปิด, Esc ปิด)
- Highlight คำค้นหาใน Title ด้วย `<mark>`
- Group results ตาม Section
- แสดง Empty state เมื่อไม่พบผลลัพธ์
- ปิดเมื่อ Click ข้างนอก (Document click listener)

---

## ระบบ Lightbox

Lightbox ถูก implement ใน `footer.php` เป็น Global ใช้ได้ทุกหน้า เรียกผ่าน:

```javascript
lbOpen(imgs, idx)
// imgs = array ของ URL รูปภาพ
// idx  = index รูปที่ต้องการเปิดก่อน

// ตัวอย่าง:
lbOpen(['../assets/images/reset_step1.png', '../assets/images/reset_step2.png'], 0)
```

### ฟีเจอร์

| ฟีเจอร์ | รายละเอียด |
|---|---|
| **Multi-image** | เปิดได้หลายภาพ มี Prev/Next navigation |
| **Mouse Wheel Zoom** | Scroll เพื่อ Zoom in/out (0.5x – 4x) |
| **Mouse Drag Pan** | Click + Drag เพื่อเลื่อนภาพที่ Zoom แล้ว |
| **Touch Pinch Zoom** | 2 นิ้ว Pinch สำหรับ Mobile |
| **Touch Pan** | 1 นิ้ว Drag สำหรับ Mobile |
| **Keyboard** | ← → นำทาง, + - Zoom, Esc ปิด |
| **Counter** | แสดง "1 / 5" ที่ด้านล่าง |
| **Zoom Reset** | ปุ่ม Reset กลับ 1x และ Center |

---

## การติดตั้งและเปิดใช้งาน

### ความต้องการของระบบ

- PHP 8.0 ขึ้นไป
- Web Server: Apache 2.4+ หรือ Nginx 1.18+
- ไม่ต้องการ Database
- ไม่ต้องการ Composer หรือ npm

### วิธีติดตั้ง

**1. Clone หรือ Copy ไฟล์ทั้งหมดไปยัง Web Root:**

```bash
cp -r makarawit/ /var/www/html/
# หรือ สำหรับ localhost
cp -r makarawit/ /Applications/MAMP/htdocs/
```

**2. ตรวจสอบ `BASE_URL` ใน `includes/config.php`:**

```php
// localhost (root)
define('BASE_URL', '');

// subdirectory เช่น /mysite/makarawit
define('BASE_URL', '/mysite/makarawit');

// VM (ระบบตรวจจากอัตโนมัติจาก SCRIPT_NAME)
```

**3. ตรวจสอบ Permission:**

```bash
chmod -R 755 /var/www/html/makarawit/
```

**4. เปิดเบราว์เซอร์:**

```
http://localhost/makarawit/
```

### Development Server (PHP Built-in)

```bash
cd makarawit/
php -S localhost:8000
```

---

## Environment & BASE_URL

ระบบตรวจสอบ Environment อัตโนมัติใน `config.php`:

```php
$host        = $_SERVER['HTTP_HOST'] ?? '';
$script_name = $_SERVER['SCRIPT_NAME'] ?? '';

if (str_starts_with($host, 'localhost') || $host === '127.0.0.1') {
    define('BASE_URL', '');                          // PHP Built-in server / XAMPP
} elseif (str_contains($script_name, '/itdiv/makarawit-services')) {
    define('BASE_URL', '/itdiv/makarawit-services'); // VM subdirectory
} else {
    define('BASE_URL', '');                          // Production root
}
```

`BASE_URL` ถูกส่งต่อไปยัง JavaScript ผ่าน:

```html
<script>window.BASE_URL = "<?= BASE_URL ?>";</script>
```

เพื่อให้ `search-index.js` สร้าง URL ที่ถูกต้องในทุก Environment

---

## การปรับแต่งและขยายระบบ

### เพิ่มบริการใหม่ใน `services.php`

1. เพิ่ม key ใน `$categories` array:
```php
$categories['myservice'] = ['label' => 'บริการใหม่'];
```

2. เพิ่ม item ใน `$all_services` array:
```php
[
  'cat'        => 'myservice',
  'icon'       => '<svg>...</svg>',
  'title'      => 'ชื่อบริการ',
  'desc'       => 'คำอธิบาย',
  'extra_html' => '<p>เนื้อหา HTML ได้เลย</p>',
]
```

### เพิ่มเมนูใน Navigation

แก้ไข `get_navigation()` ใน `config.php` โดยเพิ่ม array item ใหม่

### เพิ่มข้อมูลลง Search Index

เพิ่ม Object ใน `assets/js/search-index.js`:
```javascript
{
  title:    'ชื่อหน้าหรือบริการ',
  desc:     'คำอธิบายสั้น',
  url:      B + '/pages/mypage.php?cat=xxx',
  section:  'บริการ IT',      // หมวดหมู่สำหรับ Group
  keywords: 'คำค้น เพิ่มเติม keyword'
}
```

### ปรับ Design Token

แก้ไข CSS Variables ใน `header.php`:
```css
:root {
  --clr-primary:      #4a90b8;   /* สีหลัก */
  --clr-primary-dark: #2e6f96;   /* สีหลักเข้ม */
  --clr-primary-pale: #eef6fb;   /* สีหลักอ่อน (background) */
  --clr-accent:       #c9a84c;   /* สีเน้น */
  --clr-bg:           #f5f8fc;   /* Background หน้าเว็บ */
  --clr-surface:      #ffffff;   /* Background Card */
  --radius-lg:        14px;      /* Border Radius หลัก */
  --shadow-md:        ...;       /* Shadow ค่าหลัก */
}
```

*อัปเดตล่าสุด: มกราคม 2568*