<!-- // includes/config.php -->
<?php
// ==============================
// Site Configuration
// ==============================
define('SITE_NAME', 'กองบริหารสารสนเทศ');
define('SITE_NAME_EN', 'FD-net Callcenter 4141');
define('SITE_SUBTITLE', 'วัดพระธรรมกาย');
define('SITE_PHONE', '4141');
define('SITE_EMAIL', 'ict@watphrathammakaya.ac.th');
define('SITE_HOURS', 'เปิดทำการ วันจันทร์–ศุกร์ เวลา 09:00–17:30 น.');

$host = $_SERVER['HTTP_HOST'] ?? '';
define('BASE_URL', (str_starts_with($host, 'localhost') || $host === '127.0.0.1') ? '' : '/itdiv/makarawit-services');

// ==============================
// Navigation Menu Structure
// ==============================
// Each item: [label, url, icon (optional), children[]]
function get_navigation(): array
{
    $b = BASE_URL;
    return [
        [
            'label' => 'หน้าหลัก',
            'url'   => "$b/index.php",
            'icon'  => '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>',
        ],
        [
            'label'    => 'ยูสเซอร์หน้าแดง',
            'url'      => "$b/pages/services.php",
            'icon'     => '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/><line x1="18" y1="8" x2="23" y2="13"/><line x1="23" y1="8" x2="18" y2="13"/></svg>',
            'children' => [
                ['label' => 'ขอ Account ใหม่',             'url' => "$b/pages/services.php?cat=account"],
                ['label' => 'ต่ออายุ Account',              'url' => "$b/pages/services.php?cat=renew"],
                ['label' => 'เช็กสถานะ Account/รหัสผ่าน',  'url' => "$b/pages/services.php?cat=status"],
                ['label' => 'รีเซทรหัสผ่าน',               'url' => "$b/pages/services.php?cat=reset"],
                ['label' => 'ขอ Join Domain',               'url' => "$b/pages/services.php?cat=domain"],
                ['label' => 'ขอสิทธิ์เข้า Computer',       'url' => "$b/pages/services.php?cat=access"],
                ['label' => 'ขอเปลี่ยน Email',             'url' => "$b/pages/services.php?cat=email"],
                ['label' => 'ขอเพิ่มปริมาณอินเทอร์เน็ต',  'url' => "$b/pages/services.php?cat=internet"],
            ],
        ],
        [
            'label'    => 'คู่มือการใช้งาน',
            'url'      => "$b/pages/guides.php",
            'icon'     => '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>',
            'children' => [
                ['label' => 'การตั้งค่า Email',        'url' => "$b/pages/guides.php?cat=email"],
                ['label' => 'การใช้งาน Wi-Fi',         'url' => "$b/pages/guides.php?cat=wifi"],
                ['label' => 'ระบบสารบรรณ',             'url' => "$b/pages/guides.php?cat=saraban"],
                [
                    'label'    => 'Microsoft Office 365',
                    'url'      => "$b/pages/guides.php?cat=office365",
                    'children' => [
                        ['label' => 'Word & Excel',   'url' => "$b/pages/guides.php?cat=word-excel"],
                        ['label' => 'Microsoft Teams', 'url' => "$b/pages/guides.php?cat=teams"],
                        ['label' => 'OneDrive',       'url' => "$b/pages/guides.php?cat=onedrive"],
                        ['label' => 'SharePoint',     'url' => "$b/pages/guides.php?cat=sharepoint"],
                    ],
                ],
            ],
        ],
        [
            'label'    => 'ระบบเครือข่าย',
            'url'      => "$b/pages/network.php",
            'icon'     => '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>',
            'children' => [
                ['label' => 'นโยบาย IT',          'url' => "$b/pages/network.php?cat=policy"],
                ['label' => 'VPN',                 'url' => "$b/pages/network.php?cat=vpn"],
                ['label' => 'ความปลอดภัยข้อมูล',  'url' => "$b/pages/network.php?cat=security"],
            ],
        ],
        [
            'label'    => 'ระบบเฉพาะทาง',
            'url'      => '#',
            'icon'     => '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>',
            'children' => [
                ['label' => 'ระบบบริหารบุคคล',    'url' => '#'],
                ['label' => 'ระบบทะเบียนพระ',     'url' => '#'],
                ['label' => 'ระบบบัญชีกรรม',      'url' => '#'],
                ['label' => 'ระบบรับ-ส่งหนังสือ', 'url' => '#'],
            ],
        ],
        [
            'label'    => 'อบรม & พัฒนา',
            'url'      => '#',
            'icon'     => '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>',
            'children' => [
                ['label' => 'ตารางอบรม',         'url' => '#'],
                ['label' => 'สมัครอบรม',         'url' => '#'],
                ['label' => 'เอกสารประกอบการอบรม', 'url' => '#'],
            ],
        ],
    ];
}

// ==============================
// Helper: Active menu check
// ==============================
function is_active(string $url): bool
{
    $current = basename($_SERVER['PHP_SELF']);
    $target  = basename(strtok($url, '?'));
    return $current === $target;
}
