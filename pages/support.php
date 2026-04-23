<?php
// pages/support.php — แจ้งปัญหาการใช้งาน
require_once '../includes/config.php';
$page_title = 'แจ้งปัญหาการใช้งาน';
$cat = $_GET['cat'] ?? '';

$sections = [
  'accountSupport' => ['label' => 'Account ถูกระงับการใช้งาน'],
  'specialSupport' => ['label' => 'แจ้งปัญหาระบบเฉพาะทาง'],
  'networkSupport' => ['label' => 'แจ้งปัญหาระบบเครือข่าย'],
  'otherSupport'   => ['label' => 'แจ้งปัญหาอื่นๆ'],
];

$support_items = [

  // ─────────────────────────────────────────────
  // 1. Account ถูกระงับการใช้งาน
  // ─────────────────────────────────────────────
  [
    'cat'   => 'accountSupport',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/><line x1="18" y1="8" x2="23" y2="13"/><line x1="23" y1="8" x2="18" y2="13"/></svg>',
    'title' => 'Account ถูกระงับการใช้งาน',
    'desc'  => 'ไม่สามารถเข้าระบบหรือล็อกอินได้ เนื่องจาก Account ถูกระงับหรือหมดอายุ',
    'extra_html' => '
      <!-- สาเหตุที่พบบ่อย -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">สาเหตุที่พบบ่อย</div>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-bottom:24px">
        <div style="display:flex;gap:10px;background:var(--clr-bg);border-radius:10px;padding:12px">
          <span style="font-size:1.3rem;flex-shrink:0">⏰</span>
          <div>
            <div style="font-weight:600;font-size:.87rem;margin-bottom:2px">Account หมดอายุ</div>
            <div style="font-size:.78rem;color:var(--clr-text-muted)">ต่ออายุทุก 6–12 เดือนตามนโยบาย</div>
          </div>
        </div>
        <div style="display:flex;gap:10px;background:var(--clr-bg);border-radius:10px;padding:12px">
          <span style="font-size:1.3rem;flex-shrink:0">🔒</span>
          <div>
            <div style="font-weight:600;font-size:.87rem;margin-bottom:2px">กรอกรหัสผ่านผิดหลายครั้ง</div>
            <div style="font-size:.78rem;color:var(--clr-text-muted)">ระบบล็อกอัตโนมัติหลัง 5 ครั้ง</div>
          </div>
        </div>
        <div style="display:flex;gap:10px;background:var(--clr-bg);border-radius:10px;padding:12px">
          <span style="font-size:1.3rem;flex-shrink:0">🏢</span>
          <div>
            <div style="font-weight:600;font-size:.87rem;margin-bottom:2px">เปลี่ยนหน่วยงาน / ตำแหน่ง</div>
            <div style="font-size:.78rem;color:var(--clr-text-muted)">สิทธิ์อาจถูกปรับตามโครงสร้างใหม่</div>
          </div>
        </div>
        <div style="display:flex;gap:10px;background:var(--clr-bg);border-radius:10px;padding:12px">
          <span style="font-size:1.3rem;flex-shrink:0">⚠️</span>
          <div>
            <div style="font-weight:600;font-size:.87rem;margin-bottom:2px">ฝ่าฝืนนโยบาย IT</div>
            <div style="font-size:.78rem;color:var(--clr-text-muted)">Account ถูกระงับโดยผู้ดูแลระบบ</div>
          </div>
        </div>
      </div>

      <!-- ขั้นตอนการแก้ไข -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">ขั้นตอนการดำเนินการ</div>
      <div style="position:relative;padding-left:28px;margin-bottom:24px;display:flex;flex-direction:column;gap:0">
        <!-- timeline line -->
        <div style="position:absolute;left:10px;top:12px;bottom:12px;width:2px;background:var(--clr-border)"></div>
        <div style="position:relative;display:flex;gap:14px;align-items:flex-start;margin-bottom:18px">
          <div style="position:absolute;left:-22px;width:24px;height:24px;background:var(--clr-primary);border-radius:50%;display:flex;align-items:center;justify-content:center;color:white;font-size:.7rem;font-weight:700;flex-shrink:0">1</div>
          <div style="padding-left:8px">
            <div style="font-weight:600;font-size:.88rem">ติดต่อ Callcenter</div>
            <div style="font-size:.8rem;color:var(--clr-text-muted);margin-top:2px">โทร 4141 หรือ Email: ict@watphrathammakaya.ac.th แจ้งชื่อ-สกุลและหน่วยงาน</div>
          </div>
        </div>
        <div style="position:relative;display:flex;gap:14px;align-items:flex-start;margin-bottom:18px">
          <div style="position:absolute;left:-22px;width:24px;height:24px;background:var(--clr-primary);border-radius:50%;display:flex;align-items:center;justify-content:center;color:white;font-size:.7rem;font-weight:700;flex-shrink:0">2</div>
          <div style="padding-left:8px">
            <div style="font-weight:600;font-size:.88rem">เจ้าหน้าที่ตรวจสอบสถานะ</div>
            <div style="font-size:.8rem;color:var(--clr-text-muted);margin-top:2px">ระบุสาเหตุการระงับและแนวทางแก้ไขที่เหมาะสม</div>
          </div>
        </div>
        <div style="position:relative;display:flex;gap:14px;align-items:flex-start;margin-bottom:18px">
          <div style="position:absolute;left:-22px;width:24px;height:24px;background:var(--clr-primary);border-radius:50%;display:flex;align-items:center;justify-content:center;color:white;font-size:.7rem;font-weight:700;flex-shrink:0">3</div>
          <div style="padding-left:8px">
            <div style="font-weight:600;font-size:.88rem">ยืนยันตัวตน</div>
            <div style="font-size:.8rem;color:var(--clr-text-muted);margin-top:2px">อาจต้องแสดงบัตรประจำตัวหรือรับรองจากหัวหน้างาน</div>
          </div>
        </div>
        <div style="position:relative;display:flex;gap:14px;align-items:flex-start">
          <div style="position:absolute;left:-22px;width:24px;height:24px;background:#16a34a;border-radius:50%;display:flex;align-items:center;justify-content:center;color:white;font-size:.7rem;font-weight:700;flex-shrink:0">✓</div>
          <div style="padding-left:8px">
            <div style="font-weight:600;font-size:.88rem;color:#16a34a">Account ถูกปลดล็อก</div>
            <div style="font-size:.8rem;color:var(--clr-text-muted);margin-top:2px">ใช้เวลาดำเนินการ 15–30 นาทีในเวลาทำการ</div>
          </div>
        </div>
      </div>

      <div style="background:#fefce8;border:1px solid #fde68a;border-radius:12px;padding:14px 18px;font-size:.88rem;color:#854d0e;line-height:1.7">
        💡 <strong>เคล็ดลับ:</strong> หากลืมรหัสผ่าน (ไม่ใช่ Account ถูกระงับ) สามารถรีเซทด้วยตัวเองได้ผ่านหน้า <a href="services.php?cat=reset" style="color:var(--clr-primary);text-decoration:underline">รีเซทรหัสผ่าน</a>
      </div>
    ',
  ],

  // ─────────────────────────────────────────────
  // 2. แจ้งปัญหาระบบเฉพาะทาง
  // ─────────────────────────────────────────────
  [
    'cat'   => 'specialSupport',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/><line x1="12" y1="11" x2="12" y2="17"/><line x1="9" y1="14" x2="15" y2="14"/></svg>',
    'title' => 'แจ้งปัญหาการใช้งานระบบเฉพาะทาง',
    'desc'  => 'พบปัญหาการใช้งานระบบภายในองค์กร เช่น ระบบบุคคล ทะเบียนพระ บัญชีกรรม หรือระบบรับ-ส่งหนังสือ',
    'extra_html' => '
      <!-- รายการระบบ -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">ระบบที่ให้บริการ</div>
      <div style="display:flex;flex-direction:column;gap:8px;margin-bottom:24px">
        <div style="display:flex;justify-content:space-between;align-items:center;background:var(--clr-bg);border-radius:10px;padding:12px 16px">
          <div style="display:flex;gap:10px;align-items:center">
            <span style="font-size:1.1rem">👤</span>
            <span style="font-size:.9rem;font-weight:500">ระบบบริหารบุคคล</span>
          </div>
          <span style="background:#dcfce7;color:#166534;font-size:.72rem;padding:3px 10px;border-radius:20px;font-weight:600">ปกติ</span>
        </div>
        <div style="display:flex;justify-content:space-between;align-items:center;background:var(--clr-bg);border-radius:10px;padding:12px 16px">
          <div style="display:flex;gap:10px;align-items:center">
            <span style="font-size:1.1rem">📿</span>
            <span style="font-size:.9rem;font-weight:500">ระบบทะเบียนพระ</span>
          </div>
          <span style="background:#dcfce7;color:#166534;font-size:.72rem;padding:3px 10px;border-radius:20px;font-weight:600">ปกติ</span>
        </div>
        <div style="display:flex;justify-content:space-between;align-items:center;background:var(--clr-bg);border-radius:10px;padding:12px 16px">
          <div style="display:flex;gap:10px;align-items:center">
            <span style="font-size:1.1rem">📊</span>
            <span style="font-size:.9rem;font-weight:500">ระบบบัญชีกรรม</span>
          </div>
          <span style="background:#dcfce7;color:#166534;font-size:.72rem;padding:3px 10px;border-radius:20px;font-weight:600">ปกติ</span>
        </div>
        <div style="display:flex;justify-content:space-between;align-items:center;background:var(--clr-bg);border-radius:10px;padding:12px 16px">
          <div style="display:flex;gap:10px;align-items:center">
            <span style="font-size:1.1rem">📬</span>
            <span style="font-size:.9rem;font-weight:500">ระบบรับ-ส่งหนังสือ</span>
          </div>
          <span style="background:#dcfce7;color:#166534;font-size:.72rem;padding:3px 10px;border-radius:20px;font-weight:600">ปกติ</span>
        </div>
      </div>

      <!-- ฟอร์มแจ้งปัญหา (static UI) -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">แบบฟอร์มแจ้งปัญหา</div>
      <div style="background:var(--clr-bg);border-radius:14px;padding:20px;display:flex;flex-direction:column;gap:14px;margin-bottom:20px;border:1px solid var(--clr-border)">
        <div>
          <label style="display:block;font-size:.82rem;font-weight:600;color:var(--clr-text-muted);margin-bottom:6px">ระบบที่พบปัญหา *</label>
          <select style="width:100%;padding:9px 12px;border-radius:8px;border:1px solid var(--clr-border);background:var(--clr-surface);font-size:.88rem;color:var(--clr-text)">
            <option>— กรุณาเลือกระบบ —</option>
            <option>ระบบบริหารบุคคล</option>
            <option>ระบบทะเบียนพระ</option>
            <option>ระบบบัญชีกรรม</option>
            <option>ระบบรับ-ส่งหนังสือ</option>
          </select>
        </div>
        <div>
          <label style="display:block;font-size:.82rem;font-weight:600;color:var(--clr-text-muted);margin-bottom:6px">ชื่อ-สกุลผู้แจ้ง *</label>
          <input type="text" placeholder="กรอกชื่อ-สกุล" style="width:100%;padding:9px 12px;border-radius:8px;border:1px solid var(--clr-border);background:var(--clr-surface);font-size:.88rem;color:var(--clr-text);box-sizing:border-box">
        </div>
        <div>
          <label style="display:block;font-size:.82rem;font-weight:600;color:var(--clr-text-muted);margin-bottom:6px">หน่วยงาน / แผนก *</label>
          <input type="text" placeholder="กรอกชื่อหน่วยงาน" style="width:100%;padding:9px 12px;border-radius:8px;border:1px solid var(--clr-border);background:var(--clr-surface);font-size:.88rem;color:var(--clr-text);box-sizing:border-box">
        </div>
        <div>
          <label style="display:block;font-size:.82rem;font-weight:600;color:var(--clr-text-muted);margin-bottom:6px">อธิบายปัญหา *</label>
          <textarea rows="4" placeholder="อธิบายปัญหาที่พบ เช่น ข้อความ Error, ขั้นตอนที่เกิดปัญหา, ความถี่ที่เกิด..." style="width:100%;padding:9px 12px;border-radius:8px;border:1px solid var(--clr-border);background:var(--clr-surface);font-size:.88rem;color:var(--clr-text);resize:vertical;box-sizing:border-box"></textarea>
        </div>
        <div>
          <label style="display:block;font-size:.82rem;font-weight:600;color:var(--clr-text-muted);margin-bottom:6px">ระดับความเร่งด่วน</label>
          <div style="display:flex;gap:8px">
            <label style="display:flex;align-items:center;gap:6px;background:var(--clr-surface);border:1px solid var(--clr-border);border-radius:8px;padding:7px 14px;cursor:pointer;font-size:.82rem">
              <input type="radio" name="priority_special" value="low"> ปกติ
            </label>
            <label style="display:flex;align-items:center;gap:6px;background:var(--clr-surface);border:1px solid var(--clr-border);border-radius:8px;padding:7px 14px;cursor:pointer;font-size:.82rem">
              <input type="radio" name="priority_special" value="high"> เร่งด่วน
            </label>
            <label style="display:flex;align-items:center;gap:6px;background:var(--clr-surface);border:1px solid var(--clr-border);border-radius:8px;padding:7px 14px;cursor:pointer;font-size:.82rem">
              <input type="radio" name="priority_special" value="critical"> วิกฤต 🚨
            </label>
          </div>
        </div>
        <button type="button" style="background:var(--clr-primary);color:white;border:none;padding:11px 24px;border-radius:8px;font-size:.9rem;font-weight:600;cursor:pointer;align-self:flex-start">
          📨 ส่งแบบแจ้งปัญหา
        </button>
      </div>

      <div style="background:#f0f9ff;border:1px solid #bae6fd;border-radius:12px;padding:14px 18px;font-size:.88rem;color:#075985;line-height:1.7">
        📞 สำหรับปัญหาเร่งด่วน กรุณาโทรตรงที่ <strong>4141</strong> เพื่อรับการช่วยเหลือทันที
      </div>
    ',
  ],

  // ─────────────────────────────────────────────
  // 3. แจ้งปัญหาระบบเครือข่าย
  // ─────────────────────────────────────────────
  [
    'cat'   => 'networkSupport',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/><line x1="12" y1="2" x2="12" y2="4" stroke="#ef4444" stroke-width="3"/></svg>',
    'title' => 'แจ้งปัญหาการใช้งานระบบเครือข่าย',
    'desc'  => 'อินเทอร์เน็ตช้า, Wi-Fi ขาดหาย, VPN เชื่อมต่อไม่ได้ หรือปัญหาเครือข่ายอื่นๆ',
    'extra_html' => '
      <!-- ตรวจสอบเบื้องต้น -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">ตรวจสอบเบื้องต้นด้วยตัวเอง</div>
      <div style="border:1px solid var(--clr-border);border-radius:14px;overflow:hidden;margin-bottom:24px">
        <div style="background:var(--clr-primary-pale);padding:12px 16px;font-size:.82rem;font-weight:600;color:var(--clr-primary)">
          ✅ ลองทำตามขั้นตอนนี้ก่อนแจ้งเจ้าหน้าที่
        </div>
        <div style="display:flex;flex-direction:column">
          <div style="display:flex;gap:12px;align-items:flex-start;padding:12px 16px;border-bottom:1px solid var(--clr-border)">
            <div style="width:26px;height:26px;background:#f1f5f9;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:.75rem;font-weight:700;color:var(--clr-text-muted);flex-shrink:0">1</div>
            <div>
              <div style="font-weight:600;font-size:.87rem">Restart อุปกรณ์</div>
              <div style="font-size:.79rem;color:var(--clr-text-muted);margin-top:2px">ปิด-เปิดคอมพิวเตอร์หรือโทรศัพท์ แล้วลองเชื่อมต่อใหม่</div>
            </div>
          </div>
          <div style="display:flex;gap:12px;align-items:flex-start;padding:12px 16px;border-bottom:1px solid var(--clr-border)">
            <div style="width:26px;height:26px;background:#f1f5f9;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:.75rem;font-weight:700;color:var(--clr-text-muted);flex-shrink:0">2</div>
            <div>
              <div style="font-weight:600;font-size:.87rem">ลืม Wi-Fi แล้วเชื่อมต่อใหม่</div>
              <div style="font-size:.79rem;color:var(--clr-text-muted);margin-top:2px">ไปที่การตั้งค่า Wi-Fi → กด "Forget" → เชื่อมต่อใหม่</div>
            </div>
          </div>
          <div style="display:flex;gap:12px;align-items:flex-start;padding:12px 16px;border-bottom:1px solid var(--clr-border)">
            <div style="width:26px;height:26px;background:#f1f5f9;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:.75rem;font-weight:700;color:var(--clr-text-muted);flex-shrink:0">3</div>
            <div>
              <div style="font-weight:600;font-size:.87rem">ทดสอบด้วยอุปกรณ์อื่น</div>
              <div style="font-size:.79rem;color:var(--clr-text-muted);margin-top:2px">หากอุปกรณ์อื่นใช้งานได้ปกติ ปัญหาอยู่ที่อุปกรณ์ของท่าน</div>
            </div>
          </div>
          <div style="display:flex;gap:12px;align-items:flex-start;padding:12px 16px">
            <div style="width:26px;height:26px;background:#f1f5f9;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:.75rem;font-weight:700;color:var(--clr-text-muted);flex-shrink:0">4</div>
            <div>
              <div style="font-weight:600;font-size:.87rem">ตรวจสอบสาย LAN</div>
              <div style="font-size:.79rem;color:var(--clr-text-muted);margin-top:2px">ถ้าใช้สาย ลองถอดแล้วเสียบใหม่ หรือเปลี่ยนพอร์ต</div>
            </div>
          </div>
        </div>
      </div>

      <!-- ประเภทปัญหาเครือข่าย -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">เลือกประเภทปัญหาที่พบ</div>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-bottom:24px">
        <div style="border:1px solid var(--clr-border);border-radius:10px;padding:14px 16px;cursor:pointer;background:var(--clr-bg)">
          <div style="font-size:1.2rem;margin-bottom:6px">🐌</div>
          <div style="font-weight:600;font-size:.87rem;margin-bottom:3px">อินเทอร์เน็ตช้า</div>
          <div style="font-size:.77rem;color:var(--clr-text-muted)">ใช้งานได้แต่ความเร็วต่ำกว่าปกติ</div>
        </div>
        <div style="border:1px solid var(--clr-border);border-radius:10px;padding:14px 16px;cursor:pointer;background:var(--clr-bg)">
          <div style="font-size:1.2rem;margin-bottom:6px">📡</div>
          <div style="font-weight:600;font-size:.87rem;margin-bottom:3px">Wi-Fi เชื่อมต่อไม่ได้</div>
          <div style="font-size:.77rem;color:var(--clr-text-muted)">ไม่พบชื่อ Wi-Fi หรือเชื่อมต่อแล้วหลุด</div>
        </div>
        <div style="border:1px solid var(--clr-border);border-radius:10px;padding:14px 16px;cursor:pointer;background:var(--clr-bg)">
          <div style="font-size:1.2rem;margin-bottom:6px">🔒</div>
          <div style="font-weight:600;font-size:.87rem;margin-bottom:3px">VPN ใช้งานไม่ได้</div>
          <div style="font-size:.77rem;color:var(--clr-text-muted)">เชื่อมต่อ VPN ล้มเหลวจากนอกสถานที่</div>
        </div>
        <div style="border:1px solid var(--clr-border);border-radius:10px;padding:14px 16px;cursor:pointer;background:var(--clr-bg)">
          <div style="font-size:1.2rem;margin-bottom:6px">🖥️</div>
          <div style="font-weight:600;font-size:.87rem;margin-bottom:3px">เข้าระบบภายในไม่ได้</div>
          <div style="font-size:.77rem;color:var(--clr-text-muted)">Intranet, File Server, หรือ Printer</div>
        </div>
      </div>

      <!-- ข้อมูลที่ต้องแจ้งเมื่อโทร -->
      <div style="background:#fff7ed;border:1px solid #fed7aa;border-radius:12px;padding:16px 18px;font-size:.88rem;color:#9a3412;line-height:1.8;margin-bottom:16px">
        📋 <strong>ข้อมูลที่ควรเตรียมก่อนโทรแจ้ง:</strong><br>
        ชื่อ-สกุล · อาคาร/ชั้น/ห้องที่ใช้งาน · ชื่อ Wi-Fi ที่พยายามเชื่อมต่อ · ข้อความ Error (ถ้ามี) · เวลาที่เริ่มพบปัญหา
      </div>

      <a href="tel:4141" style="display:inline-flex;align-items:center;gap:8px;background:var(--clr-primary);color:white;padding:10px 20px;border-radius:8px;font-size:.88rem;font-weight:600;text-decoration:none">
        📞 โทร 4141 แจ้งปัญหาเครือข่าย →
      </a>
    ',
  ],

  // ─────────────────────────────────────────────
  // 4. แจ้งปัญหาอื่นๆ
  // ─────────────────────────────────────────────
  [
    'cat'   => 'otherSupport',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>',
    'title' => 'แจ้งปัญหาการใช้งานอื่นๆ',
    'desc'  => 'ปัญหาที่ไม่เข้าหมวดหมู่ข้างต้น เช่น ปัญหา Hardware, Printer, Email หรือซอฟต์แวร์ทั่วไป',
    'extra_html' => '
      <!-- ตัวอย่างปัญหา -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">ตัวอย่างปัญหาที่สามารถแจ้งได้</div>
      <div style="display:flex;flex-wrap:wrap;gap:8px;margin-bottom:24px">
        <span style="background:var(--clr-bg);border:1px solid var(--clr-border);border-radius:20px;padding:5px 14px;font-size:.8rem">🖨️ Printer ไม่ทำงาน</span>
        <span style="background:var(--clr-bg);border:1px solid var(--clr-border);border-radius:20px;padding:5px 14px;font-size:.8rem">📧 Email ส่ง/รับไม่ได้</span>
        <span style="background:var(--clr-bg);border:1px solid var(--clr-border);border-radius:20px;padding:5px 14px;font-size:.8rem">💻 คอมพิวเตอร์ค้าง/ช้า</span>
        <span style="background:var(--clr-bg);border:1px solid var(--clr-border);border-radius:20px;padding:5px 14px;font-size:.8rem">🖥️ จอไม่ติด</span>
        <span style="background:var(--clr-bg);border:1px solid var(--clr-border);border-radius:20px;padding:5px 14px;font-size:.8rem">🔊 ลำโพง/ไมค์ไม่ทำงาน</span>
        <span style="background:var(--clr-bg);border:1px solid var(--clr-border);border-radius:20px;padding:5px 14px;font-size:.8rem">⌨️ คีย์บอร์ด/เมาส์เสีย</span>
        <span style="background:var(--clr-bg);border:1px solid var(--clr-border);border-radius:20px;padding:5px 14px;font-size:.8rem">📱 โทรศัพท์มีปัญหา</span>
        <span style="background:var(--clr-bg);border:1px solid var(--clr-border);border-radius:20px;padding:5px 14px;font-size:.8rem">🗂️ ไฟล์หาย / เปิดไม่ได้</span>
        <span style="background:var(--clr-bg);border:1px solid var(--clr-border);border-radius:20px;padding:5px 14px;font-size:.8rem">🦠 สงสัยว่าถูก Virus</span>
      </div>

      <!-- ฟอร์มอื่นๆ -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">แบบฟอร์มแจ้งปัญหาทั่วไป</div>
      <div style="background:var(--clr-bg);border-radius:14px;padding:20px;display:flex;flex-direction:column;gap:14px;margin-bottom:20px;border:1px solid var(--clr-border)">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px">
          <div>
            <label style="display:block;font-size:.82rem;font-weight:600;color:var(--clr-text-muted);margin-bottom:6px">ชื่อ-สกุล *</label>
            <input type="text" placeholder="ชื่อ-สกุล" style="width:100%;padding:9px 12px;border-radius:8px;border:1px solid var(--clr-border);background:var(--clr-surface);font-size:.88rem;color:var(--clr-text);box-sizing:border-box">
          </div>
          <div>
            <label style="display:block;font-size:.82rem;font-weight:600;color:var(--clr-text-muted);margin-bottom:6px">เบอร์ภายใน / โทรศัพท์</label>
            <input type="text" placeholder="เช่น 4xxx" style="width:100%;padding:9px 12px;border-radius:8px;border:1px solid var(--clr-border);background:var(--clr-surface);font-size:.88rem;color:var(--clr-text);box-sizing:border-box">
          </div>
        </div>
        <div>
          <label style="display:block;font-size:.82rem;font-weight:600;color:var(--clr-text-muted);margin-bottom:6px">ประเภทอุปกรณ์ / ซอฟต์แวร์ที่มีปัญหา *</label>
          <input type="text" placeholder="เช่น คอมพิวเตอร์ Dell รุ่น xxx, Microsoft Outlook" style="width:100%;padding:9px 12px;border-radius:8px;border:1px solid var(--clr-border);background:var(--clr-surface);font-size:.88rem;color:var(--clr-text);box-sizing:border-box">
        </div>
        <div>
          <label style="display:block;font-size:.82rem;font-weight:600;color:var(--clr-text-muted);margin-bottom:6px">สถานที่ (อาคาร/ชั้น/ห้อง) *</label>
          <input type="text" placeholder="เช่น อาคาร 100 ปี ชั้น 3 ห้อง 301" style="width:100%;padding:9px 12px;border-radius:8px;border:1px solid var(--clr-border);background:var(--clr-surface);font-size:.88rem;color:var(--clr-text);box-sizing:border-box">
        </div>
        <div>
          <label style="display:block;font-size:.82rem;font-weight:600;color:var(--clr-text-muted);margin-bottom:6px">รายละเอียดปัญหา *</label>
          <textarea rows="4" placeholder="อธิบายปัญหาที่พบโดยละเอียด เพื่อให้เจ้าหน้าที่เตรียมอุปกรณ์และดำเนินการได้อย่างรวดเร็ว..." style="width:100%;padding:9px 12px;border-radius:8px;border:1px solid var(--clr-border);background:var(--clr-surface);font-size:.88rem;color:var(--clr-text);resize:vertical;box-sizing:border-box"></textarea>
        </div>
        <div>
          <label style="display:block;font-size:.82rem;font-weight:600;color:var(--clr-text-muted);margin-bottom:6px">ช่วงเวลาที่สะดวกให้เจ้าหน้าที่เข้าไปแก้ไข</label>
          <div style="display:flex;gap:8px;flex-wrap:wrap">
            <label style="display:flex;align-items:center;gap:6px;background:var(--clr-surface);border:1px solid var(--clr-border);border-radius:8px;padding:7px 14px;cursor:pointer;font-size:.82rem">
              <input type="checkbox" name="time_morning"> ช่วงเช้า (09:00–12:00)
            </label>
            <label style="display:flex;align-items:center;gap:6px;background:var(--clr-surface);border:1px solid var(--clr-border);border-radius:8px;padding:7px 14px;cursor:pointer;font-size:.82rem">
              <input type="checkbox" name="time_afternoon"> ช่วงบ่าย (13:00–17:30)
            </label>
          </div>
        </div>
        <button type="button" style="background:var(--clr-primary);color:white;border:none;padding:11px 24px;border-radius:8px;font-size:.9rem;font-weight:600;cursor:pointer;align-self:flex-start">
          📨 ส่งแบบแจ้งปัญหา
        </button>
      </div>

      <!-- ช่องทางอื่น -->
      <div style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--clr-text-muted);margin-bottom:12px">ช่องทางการติดต่ออื่น</div>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px">
        <a href="tel:4141" style="text-decoration:none;display:flex;gap:12px;align-items:center;background:var(--clr-bg);border-radius:10px;padding:14px 16px;border:1px solid var(--clr-border)">
          <div style="width:38px;height:38px;background:var(--clr-primary-pale);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.2rem">📞</div>
          <div>
            <div style="font-weight:600;font-size:.87rem;color:var(--clr-text)">โทรศัพท์ภายใน</div>
            <div style="font-size:.8rem;color:var(--clr-primary);font-weight:600">4141</div>
          </div>
        </a>
        <a href="mailto:ict@watphrathammakaya.ac.th" style="text-decoration:none;display:flex;gap:12px;align-items:center;background:var(--clr-bg);border-radius:10px;padding:14px 16px;border:1px solid var(--clr-border)">
          <div style="width:38px;height:38px;background:var(--clr-primary-pale);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.2rem">📧</div>
          <div>
            <div style="font-weight:600;font-size:.87rem;color:var(--clr-text)">Email</div>
            <div style="font-size:.77rem;color:var(--clr-primary)">ict@watphrathammakaya.ac.th</div>
          </div>
        </a>
      </div>
    ',
  ],

];

require_once '../includes/header.php';
?>

<?php
$panel_title   = 'แจ้งปัญหาการใช้งาน';
$panel_cat     = $cat;
$panel_base    = 'support.php';
$panel_menu    = $sections;
$panel_items   = $support_items;
$panel_contact = false;
?>

<main class="layout__main">
  <nav class="breadcrumb">
    <a href="../index.php">หน้าหลัก</a>
    <span class="breadcrumb__sep">›</span>
    <span>แจ้งปัญหาการใช้งาน</span>
  </nav>

  <?php require_once '../includes/single-panel.php'; ?>
</main>

<?php require_once '../includes/footer.php'; ?>