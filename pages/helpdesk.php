<!-- // pages/helpdesk.php -->
<?php
// pages/helpdesk.php — Helpdesk Ticket
require_once '../includes/config.php';
$page_title = 'แจ้งปัญหา / Helpdesk';

// Simulated recent tickets
$recent_tickets = [
  ['id' => 'HD-2569-0041', 'title' => 'Email ส่งไม่ออก',          'status' => 'กำลังดำเนินการ', 'status_class' => 'badge--amber', 'date' => '16 เม.ย. 2569'],
  ['id' => 'HD-2569-0038', 'title' => 'คอมพิวเตอร์เปิดไม่ติด',   'status' => 'เสร็จสิ้น',       'status_class' => 'badge--green', 'date' => '14 เม.ย. 2569'],
  ['id' => 'HD-2569-0035', 'title' => 'ขอติดตั้ง Adobe Reader',   'status' => 'เสร็จสิ้น',       'status_class' => 'badge--green', 'date' => '10 เม.ย. 2569'],
  ['id' => 'HD-2569-0032', 'title' => 'Wi-Fi ตัดบ่อย ห้อง B201', 'status' => 'รอดำเนินการ',     'status_class' => 'badge--blue',  'date' => '8 เม.ย. 2569'],
];

require_once '../includes/header.php';
?>

<main class="layout__main">

  <nav class="breadcrumb">
    <a href="../index.php">หน้าหลัก</a>
    <span class="breadcrumb__sep">›</span>
    <span>แจ้งปัญหา / Helpdesk</span>
  </nav>

  <div class="helpdesk-layout">

    <!-- FORM -->
    <div>
      <h1 class="page-title">แจ้งปัญหาด้าน IT</h1>
      <p style="color:var(--clr-text-muted);margin-bottom:24px;font-size:.9rem">กรอกรายละเอียดปัญหาให้ครบถ้วนเพื่อให้เจ้าหน้าที่สามารถช่วยเหลือท่านได้รวดเร็วยิ่งขึ้น</p>

      <form class="hd-form" method="post" action="#">
        <div class="form-row">
          <div class="form-group">
            <label class="form-label">ชื่อ-สกุล <span class="required">*</span></label>
            <input type="text" class="form-input" placeholder="กรอกชื่อ-สกุล" required>
          </div>
          <div class="form-group">
            <label class="form-label">หน่วยงาน / แผนก <span class="required">*</span></label>
            <input type="text" class="form-input" placeholder="เช่น แผนกบัญชี, ฝ่ายการศึกษา">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label class="form-label">อีเมล</label>
            <input type="email" class="form-input" placeholder="email@watphrathammakaya.ac.th">
          </div>
          <div class="form-group">
            <label class="form-label">เบอร์โทรภายใน</label>
            <input type="text" class="form-input" placeholder="เช่น 1234">
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">ประเภทปัญหา <span class="required">*</span></label>
          <select class="form-input form-select" required>
            <option value="">— เลือกประเภทปัญหา —</option>
            <option>คอมพิวเตอร์ / Hardware</option>
            <option>อีเมล / Email</option>
            <option>เครือข่าย / Wi-Fi</option>
            <option>ซอฟต์แวร์ / Software</option>
            <option>บัญชีผู้ใช้ / Account</option>
            <option>เครื่องพิมพ์ / Printer</option>
            <option>อื่น ๆ</option>
          </select>
        </div>

        <div class="form-group">
          <label class="form-label">หัวข้อปัญหา <span class="required">*</span></label>
          <input type="text" class="form-input" placeholder="สรุปปัญหาโดยย่อ" required>
        </div>

        <div class="form-group">
          <label class="form-label">รายละเอียด <span class="required">*</span></label>
          <textarea class="form-input form-textarea" rows="5" placeholder="อธิบายปัญหาให้ละเอียด เช่น เกิดขึ้นเมื่อใด ทำอะไรอยู่ มี error message อะไรบ้าง" required></textarea>
        </div>

        <div class="form-group">
          <label class="form-label">ระดับความเร่งด่วน</label>
          <div class="priority-group">
            <label class="priority-option">
              <input type="radio" name="priority" value="low" checked>
              <span class="priority-label priority--low">🟢 ปกติ</span>
            </label>
            <label class="priority-option">
              <input type="radio" name="priority" value="medium">
              <span class="priority-label priority--medium">🟡 ปานกลาง</span>
            </label>
            <label class="priority-option">
              <input type="radio" name="priority" value="high">
              <span class="priority-label priority--high">🔴 เร่งด่วน</span>
            </label>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">แนบไฟล์ / รูปภาพ (ถ้ามี)</label>
          <div class="file-drop">
            <span style="display:flex;align-items:center;gap:6px;justify-content:center">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48" />
              </svg>
              คลิกหรือลากไฟล์มาวางที่นี่
            </span>
            <span style="font-size:.75rem;color:var(--clr-text-light)">รองรับ PNG, JPG, PDF ขนาดไม่เกิน 10MB</span>
            <input type="file" multiple accept=".png,.jpg,.jpeg,.pdf" style="display:none">
          </div>
        </div>

        <div class="form-footer">
          <button type="submit" class="btn btn--primary" style="padding:11px 32px;font-size:.95rem">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="22" y1="2" x2="11" y2="13" />
              <polygon points="22 2 15 22 11 13 2 9 22 2" />
            </svg>
            ส่งคำร้อง
          </button> <span class="form-note">หลังส่งแล้ว ท่านจะได้รับหมายเลข Ticket ทาง Email</span>
        </div>
      </form>
    </div>

    <!-- SIDEBAR -->
    <aside>
      <div class="sidebar-card">
        <div class="sidebar-title">ตรวจสอบสถานะ</div>
        <input type="text" class="form-input" placeholder="กรอกหมายเลข Ticket" style="margin-bottom:10px">
        <button class="btn btn--primary btn--sm" style="width:100%;justify-content:center">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8" />
            <line x1="21" y1="21" x2="16.65" y2="16.65" />
          </svg>
          ค้นหา
        </button>
      </div>

      <div class="sidebar-card">
        <div class="sidebar-title">Ticket ล่าสุดในระบบ</div>
        <div class="ticket-list">
          <?php foreach ($recent_tickets as $t): ?>
            <div class="ticket-item">
              <div class="ticket-id"><?= htmlspecialchars($t['id']) ?></div>
              <div class="ticket-title"><?= htmlspecialchars($t['title']) ?></div>
              <div class="ticket-footer">
                <span class="badge <?= $t['status_class'] ?>"><?= htmlspecialchars($t['status']) ?></span>
                <span class="ticket-date"><?= $t['date'] ?></span>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="sidebar-card" style="background:var(--clr-primary);color:#fff;border-color:var(--clr-primary)">
        <div style="font-weight:600;margin-bottom:6px;display:flex;align-items:center;gap:6px">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10" />
            <line x1="12" y1="8" x2="12" y2="12" />
            <line x1="12" y1="16" x2="12.01" y2="16" />
          </svg>
          เร่งด่วนมาก?
        </div>
        <div style="font-size:.82rem;opacity:.85;margin-bottom:12px">โทรหาเจ้าหน้าที่โดยตรงในเวลาทำการ</div>
        <a href="tel:<?= SITE_PHONE ?>" style="background:#fff;color:var(--clr-primary);display:block;text-align:center;padding:8px;border-radius:var(--radius-md);font-weight:600;font-size:.9rem"><?= SITE_PHONE ?></a>
      </div>
    </aside>

  </div>

</main>

<?php require_once '../includes/footer.php'; ?>

<style>
  .page-title {
    font-size: 1.4rem;
    font-weight: 600;
    color: var(--clr-primary-dark);
    margin-bottom: 0;
  }

  .helpdesk-layout {
    display: grid;
    grid-template-columns: 1fr 260px;
    gap: 28px;
    align-items: start;
  }

  @media (max-width: 850px) {
    .helpdesk-layout {
      grid-template-columns: 1fr;
    }
  }

  .hd-form {
    background: var(--clr-surface);
    border: 1px solid var(--clr-border);
    border-radius: var(--radius-lg);
    padding: 28px;
    box-shadow: var(--shadow-sm);
  }

  .form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
  }

  @media (max-width: 600px) {
    .form-row {
      grid-template-columns: 1fr;
    }
  }

  .form-group {
    margin-bottom: 18px;
  }

  .form-label {
    display: block;
    font-size: .85rem;
    font-weight: 500;
    color: var(--clr-text);
    margin-bottom: 6px;
  }

  .required {
    color: var(--clr-danger);
  }

  .form-input {
    width: 100%;
    padding: 10px 12px;
    border: 1.5px solid var(--clr-border);
    border-radius: var(--radius-md);
    font-family: var(--font-th);
    font-size: .88rem;
    color: var(--clr-text);
    background: var(--clr-bg);
    outline: none;
    transition: border-color .2s, box-shadow .2s;
  }

  .form-input:focus {
    border-color: var(--clr-primary);
    box-shadow: 0 0 0 3px rgba(26, 111, 168, .1);
    background: #fff;
  }

  .form-select {
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%235a7186' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 12px center;
    padding-right: 32px;
  }

  .form-textarea {
    resize: vertical;
    min-height: 110px;
  }

  .priority-group {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
  }

  .priority-option {
    cursor: pointer;
  }

  .priority-option input {
    display: none;
  }

  .priority-label {
    display: block;
    padding: 7px 14px;
    border-radius: var(--radius-md);
    font-size: .85rem;
    border: 1.5px solid var(--clr-border);
    transition: all .2s;
  }

  .priority-option input:checked+.priority-label {
    border-color: var(--clr-primary);
    background: var(--clr-primary-pale);
    font-weight: 500;
  }

  .file-drop {
    border: 2px dashed var(--clr-border);
    border-radius: var(--radius-md);
    padding: 24px;
    text-align: center;
    cursor: pointer;
    display: flex;
    flex-direction: column;
    gap: 4px;
    font-size: .85rem;
    color: var(--clr-text-muted);
    transition: border-color .2s;
  }

  .file-drop:hover {
    border-color: var(--clr-primary);
  }

  .form-footer {
    display: flex;
    align-items: center;
    gap: 16px;
    flex-wrap: wrap;
  }

  .form-note {
    font-size: .8rem;
    color: var(--clr-text-muted);
  }

  /* Sidebar */
  .sidebar-card {
    background: var(--clr-surface);
    border: 1px solid var(--clr-border);
    border-radius: var(--radius-lg);
    padding: 18px;
    margin-bottom: 16px;
    box-shadow: var(--shadow-sm);
  }

  .sidebar-title {
    font-size: .78rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: .07em;
    color: var(--clr-text-muted);
    margin-bottom: 12px;
  }

  .ticket-list {
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  .ticket-item {
    padding: 10px;
    background: var(--clr-bg);
    border-radius: var(--radius-md);
  }

  .ticket-id {
    font-size: .72rem;
    color: var(--clr-text-light);
    font-family: var(--font-en);
    margin-bottom: 2px;
  }

  .ticket-title {
    font-size: .85rem;
    color: var(--clr-text);
    margin-bottom: 6px;
  }

  .ticket-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .ticket-date {
    font-size: .72rem;
    color: var(--clr-text-light);
  }
</style>