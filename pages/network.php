<?php
// pages/network.php — Network & Security
require_once '../includes/config.php';
$page_title = 'ระบบเครือข่าย & ความปลอดภัย';
$cat = $_GET['cat'] ? $_GET['cat'] : '';

$sections = [
  'network'    => ['label' => 'WiFi ภายในองค์กร'],
  'speedtest'  => ['label' => 'ทดสอบคุณภาพอินเทอร์เน็ต'],
];

// ───────────────────────────────────────────────────────────────────
// สคริปต์สร้าง .app + .dmg สำหรับ macOS (คัดลอกจากคู่มือกอง CNA)
// เก็บด้วย Nowdoc (<<<'MACBUILDSCRIPT') เพื่อไม่ต้อง escape เครื่องหมาย
// คำพูด / $ / backtick ใด ๆ ภายในสคริปต์เลย
// ───────────────────────────────────────────────────────────────────
$cna_mac_script = <<<'MACBUILDSCRIPT'
cat << 'CREATE_DMG' > ~/Desktop/build_cna_dmg.sh
#!/bin/bash
# ========================================================
# Script สร้าง .app และ .dmg สำหรับ Check Net กอง CNA v. 1.0
# ========================================================

BUILD_DIR="$HOME/Desktop/CNA_Build"
APP_NAME="CNA-CheckNet"
APP_DIR="$BUILD_DIR/$APP_NAME.app"
DMG_NAME="CNA-CheckNet-v1.0.dmg"

# 1. ล้างโฟลเดอร์เก่าและเตรียมโครงสร้าง .app
rm -rf "$BUILD_DIR"
rm -f "$HOME/Desktop/$DMG_NAME"
mkdir -p "$APP_DIR/Contents/MacOS"
mkdir -p "$APP_DIR/Contents/Resources"

# 2. สร้าง Info.plist
cat << 'EOF' > "$APP_DIR/Contents/Info.plist"
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<plist version="1.0">
<dict>
    <key>CFBundleExecutable</key>
    <string>CNA-CheckNet</string>
    <key>CFBundleIdentifier</key>
    <string>network.dhammakaya.cna.checknet</string>
    <key>CFBundleName</key>
    <string>CNA CheckNet</string>
    <key>CFBundlePackageType</key>
    <string>APPL</string>
    <key>CFBundleShortVersionString</key>
    <string>1.0</string>
    <key>LSUIElement</key>
    <false/>
</dict>
</plist>
EOF

# 3. ใส่สคริปต์ประมวลผลเข้าไปใน .app
cat << 'RUNNER' > "$APP_DIR/Contents/MacOS/CNA-CheckNet"
#!/bin/bash
COMP_NAME=$(scutil --get ComputerName 2>/dev/null || hostname -s)
AD_DOMAIN=$(dsconfigad -show 2>/dev/null | awk -F'=[[:space:]]*' '/Active Directory Domain/{print $2}')

if [ -n "$AD_DOMAIN" ]; then
    DOMAIN_STATUS="Join Domain แล้ว ($AD_DOMAIN)"
    DOMAIN_BADGE="badge-domain-yes"
else
    DOMAIN_STATUS="ไม่ได้ Join Domain (Local / Workgroup)"
    DOMAIN_BADGE="badge-domain-no"
fi

GW=$(route -n get default 2>/dev/null | awk '/gateway:/{print $2}')
NET_IF=$(route -n get default 2>/dev/null | awk '/interface:/{print $2}')
[ -z "$GW" ] && GW="ไม่มี Gateway"

if [ -n "$NET_IF" ]; then
    HW_PORT=$(networksetup -listallhardwareports 2>/dev/null | awk -v iface="$NET_IF" '$0 ~ iface {print prev} {prev=$0}' | awk -F': ' '{print $2}')
    if [ -n "$HW_PORT" ]; then
        NIC_NAME="$HW_PORT ($NET_IF)"
    else
        NIC_NAME="$NET_IF"
    fi
    IP_ADDR=$(ipconfig getifaddr "$NET_IF" 2>/dev/null)
    [ -z "$IP_ADDR" ] && IP_ADDR=$(ifconfig "$NET_IF" 2>/dev/null | awk '/inet /{print $2}')
else
    NIC_NAME="ไม่พบการ์ดเครือข่ายที่เชื่อมต่อ"
    IP_ADDR="ไม่พบ IP"
fi
[ -z "$IP_ADDR" ] && IP_ADDR="ไม่พบ IP"

DNS_SERVERS=$(awk '/nameserver/{print $2}' /etc/resolv.conf 2>/dev/null | tr '\n' ', ' | sed 's/,[[:space:]]*$//')
if [ -z "$DNS_SERVERS" ]; then
    DNS_SERVERS=$(scutil --dns 2>/dev/null | awk '/nameserver\[[0-9]+\]/{print $3}' | head -n 2 | tr '\n' ', ' | sed 's/,[[:space:]]*$//')
fi
[ -z "$DNS_SERVERS" ] && DNS_SERVERS="ไม่พบ DNS"

CHECK_TIME=$(date "+%Y-%m-%d %H:%M:%S")

ROUTE_ROWS=""
while read -r dest gateway iface flags; do
    [ -z "$dest" ] && continue
    if [ "$dest" = "default" ]; then
        ROUTE_ROWS="${ROUTE_ROWS}<tr style='background-color: #ecfdf5; font-weight: bold;'><td><code>0.0.0.0/0 (default)</code></td><td><code>$gateway</code></td><td>$iface</td><td>$flags</td></tr>"$'\n'
    else
        ROUTE_ROWS="${ROUTE_ROWS}<tr><td><code>$dest</code></td><td><code>$gateway</code></td><td>$iface</td><td>$flags</td></tr>"$'\n'
    fi
done < <(netstat -nr -f inet 2>/dev/null | awk 'NR>3 && NF>=4 && $1 !~ /Destination/ {print $1, $2, $4, $3}')

HTML_FILE="/tmp/cna_network_report.html"
cat << 'HTMLEOF' > "$HTML_FILE"
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สรุปผลการเชื่อมต่อเครือข่าย (CNA Network Status v. 1.0 macOS)</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; }
        body { background-color: #f8fafc; color: #1e293b; padding: 24px; }
        .container { max-width: 950px; margin: 0 auto; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 10px; }
        h1 { font-size: 22px; color: #0f172a; }
        .timestamp { font-size: 13px; color: #64748b; }
        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 14px; margin-bottom: 20px; }
        .card { background: #ffffff; border-radius: 10px; padding: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.06); border-top: 4px solid #3b82f6; }
        .card.comp { border-top-color: #0284c7; }
        .card.domain { border-top-color: #6366f1; }
        .card.gw { border-top-color: #10b981; }
        .card.dns { border-top-color: #8b5cf6; }
        .card.nic { border-top-color: #f59e0b; }
        .card-label { font-size: 11px; font-weight: 600; text-transform: uppercase; color: #64748b; margin-bottom: 6px; }
        .card-value { font-size: 16px; font-weight: 700; color: #0f172a; word-break: break-all; }
        .badge-domain-yes { color: #15803d; font-weight: 700; }
        .badge-domain-no { color: #b45309; font-weight: 700; }
        .action-box { background: #eff6ff; border: 1px solid #bfdbfe; border-radius: 8px; padding: 14px 18px; display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; gap: 15px; }
        .copy-btn { background: #2563eb; color: white; border: none; padding: 10px 20px; border-radius: 6px; font-weight: 600; font-size: 14px; cursor: pointer; transition: 0.2s; white-space: nowrap; }
        .copy-btn:hover { background: #1d4ed8; }
        .copy-btn.copied { background: #16a34a !important; }
        .table-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
        .search-input { padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 6px; width: 260px; font-size: 13px; }
        .table-box { background: #ffffff; border-radius: 10px; box-shadow: 0 1px 3px rgba(0,0,0,0.06); overflow-x: auto; max-height: 380px; }
        table { width: 100%; border-collapse: collapse; font-size: 13px; text-align: left; }
        thead { position: sticky; top: 0; background: #f1f5f9; z-index: 1; }
        th { padding: 10px 14px; font-weight: 600; color: #475569; border-bottom: 1px solid #cbd5e1; }
        td { padding: 10px 14px; border-bottom: 1px solid #f1f5f9; }
        code { background: #f1f5f9; padding: 2px 6px; border-radius: 4px; font-family: ui-monospace, Menlo, Consolas, monospace; font-size: 12px; color: #0369a1; }
        .tip { font-size: 12px; color: #64748b; margin-top: 8px; }
        .cna-footer { margin-top: 35px; padding-top: 15px; border-top: 1px solid #e2e8f0; text-align: center; font-size: 13px; color: #64748b; font-weight: 600; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div>
                <h1>รายงานสถานะเครื่องและเครือข่ายคอมพิวเตอร์ (macOS)</h1>
                <div class="timestamp">เวลาที่ตรวจสอบ: <span id="disp-time">__CHECK_TIME__</span></div>
            </div>
        </div>

        <div class="grid">
            <div class="card comp">
                <div class="card-label">ชื่อเครื่อง (Computer Name)</div>
                <div class="card-value" id="disp-comp">__COMP_NAME__</div>
            </div>
            <div class="card domain">
                <div class="card-label">สถานะระบบ Domain</div>
                <div class="card-value __DOMAIN_BADGE__" id="disp-domain">__DOMAIN_STATUS__</div>
            </div>
            <div class="card">
                <div class="card-label">IP Address</div>
                <div class="card-value" id="disp-ip">__IP_ADDR__</div>
            </div>
            <div class="card gw">
                <div class="card-label">Default Gateway</div>
                <div class="card-value" id="disp-gw">__GW__</div>
            </div>
            <div class="card dns">
                <div class="card-label">DNS Server</div>
                <div class="card-value" id="disp-dns">__DNS_SERVERS__</div>
            </div>
            <div class="card nic">
                <div class="card-label">การ์ดเครือข่ายหลัก</div>
                <div class="card-value" id="disp-nic">__NIC_NAME__</div>
            </div>
        </div>

        <div class="action-box">
            <div>
                <strong>ต้องการส่งข้อมูลให้ทีมงาน IT หรือไม่?</strong>
                <div style="font-size: 12px; color: #475569; margin-top: 2px;">กดปุ่มนี้เพื่อคัดลอกข้อมูลสรุป แล้วนำไปวาง (Cmd+V) ส่งใน LINE ได้ทันที</div>
            </div>
            <button id="copyBtn" class="copy-btn" onclick="copyInfo()">📋 คัดลอกข้อมูลส่งให้ทีม IT</button>
        </div>

        <div class="table-header">
            <div style="font-weight: 600; font-size: 15px; color: #0f172a;">ตารางเส้นทางเครือข่าย (IP Routing Table)</div>
            <input type="text" id="searchInput" class="search-input" placeholder="พิมพ์ค้นหา เช่น default หรือ IP..." onkeyup="filterTable()">
        </div>

        <div class="table-box">
            <table id="routeTable">
                <thead>
                    <tr>
                        <th>Destination Prefix</th>
                        <th>Gateway (Next Hop)</th>
                        <th>Interface</th>
                        <th>Flags</th>
                    </tr>
                </thead>
                <tbody>
__ROUTE_ROWS__
                </tbody>
            </table>
        </div>
        <div class="tip">* แถบสีเขียวคือ Default Route เส้นทางหลักในการออกสู่อินเทอร์เน็ต</div>

        <div class="cna-footer">
            Script Check Net พัฒนาโดย กอง CNA v. 1.0
        </div>
    </div>

    <script>
        function copyInfo() {
            var comp   = document.getElementById('disp-comp').innerText.trim();
            var domain = document.getElementById('disp-domain').innerText.trim();
            var ip     = document.getElementById('disp-ip').innerText.trim();
            var gw     = document.getElementById('disp-gw').innerText.trim();
            var dns    = document.getElementById('disp-dns').innerText.trim();
            var nic    = document.getElementById('disp-nic').innerText.trim();
            var time   = document.getElementById('disp-time').innerText.trim();
            
            var text = "[ข้อมูลระบบและเครือข่ายเครื่องผู้ใช้งาน (macOS)]\n" +
                       "- ชื่อเครื่อง: " + comp + "\n" +
                       "- สถานะ Domain: " + domain + "\n" +
                       "- IP Address: " + ip + "\n" +
                       "- Default Gateway: " + gw + "\n" +
                       "- DNS Server: " + dns + "\n" +
                       "- การ์ดเครือข่าย: " + nic + "\n" +
                       "- วันเวลาที่ตรวจสอบ: " + time + "\n" +
                       "- Script Check Net พัฒนาโดย กอง CNA v. 1.0";

            var tempArea = document.createElement("textarea");
            tempArea.value = text;
            tempArea.style.position = "fixed";
            tempArea.style.left = "-9999px";
            tempArea.style.top = "0";
            document.body.appendChild(tempArea);
            tempArea.focus();
            tempArea.select();
            
            var success = false;
            try { success = document.execCommand('copy'); } catch (e) { success = false; }
            document.body.removeChild(tempArea);

            var btn = document.getElementById('copyBtn');
            if (success) {
                var oldText = btn.innerHTML;
                btn.innerHTML = "✅ คัดลอกสำเร็จแล้ว!";
                btn.classList.add('copied');
                setTimeout(function() {
                    btn.innerHTML = oldText;
                    btn.classList.remove('copied');
                }, 2500);
            }
        }

        function filterTable() {
            var input = document.getElementById("searchInput").value.toLowerCase();
            var rows = document.getElementById("routeTable").getElementsByTagName("tbody")[0].getElementsByTagName("tr");
            for (var i = 0; i < rows.length; i++) {
                var text = rows[i].innerText.toLowerCase();
                rows[i].style.display = text.includes(input) ? "" : "none";
            }
        }
    </script>
</body>
</html>
HTMLEOF

sed -i '' "s|__CHECK_TIME__|$CHECK_TIME|g" "$HTML_FILE"
sed -i '' "s|__COMP_NAME__|$COMP_NAME|g" "$HTML_FILE"
sed -i '' "s|__DOMAIN_BADGE__|$DOMAIN_BADGE|g" "$HTML_FILE"
sed -i '' "s|__DOMAIN_STATUS__|$DOMAIN_STATUS|g" "$HTML_FILE"
sed -i '' "s|__IP_ADDR__|$IP_ADDR|g" "$HTML_FILE"
sed -i '' "s|__GW__|$GW|g" "$HTML_FILE"
sed -i '' "s|__DNS_SERVERS__|$DNS_SERVERS|g" "$HTML_FILE"
sed -i '' "s|__NIC_NAME__|$NIC_NAME|g" "$HTML_FILE"
awk -v r="$ROUTE_ROWS" '{gsub(/__ROUTE_ROWS__/, r)}1' "$HTML_FILE" > "${HTML_FILE}.tmp" && mv "${HTML_FILE}.tmp" "$HTML_FILE"

open "$HTML_FILE"
RUNNER

# 4. ให้สิทธิ์ Execute แก่ตัวแอป
chmod +x "$APP_DIR/Contents/MacOS/CNA-CheckNet"

# 5. สร้าง Shortcut ไปยัง Applications ใน DMG
ln -s /Applications "$BUILD_DIR/Applications"

# 6. แพ็กออกเป็นไฟล์ DMG ด้วย hdiutil
hdiutil create -volname "CNA-CheckNet-v1.0" \
               -srcfolder "$BUILD_DIR" \
               -ov -format UDZO \
               "$HOME/Desktop/$DMG_NAME"

# ทำความสะอาดโฟลเดอร์ชั่วคราว
rm -rf "$BUILD_DIR"
echo "=== สร้างไฟล์ $HOME/Desktop/$DMG_NAME สำเร็จเรียบร้อย ==="
CREATE_DMG

chmod +x ~/Desktop/build_cna_dmg.sh
~/Desktop/build_cna_dmg.sh
MACBUILDSCRIPT;

$network_items = [
  // WiFi ภายในองค์กร
  [
    'cat'   => 'network',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>',
    'title' => 'WiFi ภายในองค์กร',
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
            <tr>
              <td style="padding:10px">อาคาร 100 ปี</td>
              <td style="padding:10px">.100Y.Dhammakaya_dot1x</td>
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
              <td style="padding:10px">อาคารพระผู้ปราบมาร1-2</td>
              <td style="padding:10px">PM-LANWAT-1-2-CNA</td>
            </tr>
            <tr style="background:#f2f2f2">
              <td style="padding:10px">อาคารพระผู้ปราบมาร1-2</td>
              <td style="padding:10px">PM-12-Dot1X-CNA</td>
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
            <tr>
              <td style="padding:10px">อาคารร้อยสิบห้าปี</td>
              <td style="padding:10px">DKC Network (115Y)</td>
            </tr>
          </tbody>
        </table>
      </div>
    ',
  ],

  // ทดสอบคุณภาพอินเทอร์เน็ต
  [
    'cat'   => 'speedtest',
    'icon'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20a8 8 0 1 0 0-16 8 8 0 0 0 0 16Z"/><path d="M12 12 16 8"/><path d="M12 3v1"/><path d="M3 12h1"/><path d="M20 12h1"/></svg>',
    'title' => 'ทดสอบคุณภาพอินเทอร์เน็ต',
    'desc'  => 'ตรวจสอบคุณภาพเครือข่าย LAN และอินเทอร์เน็ตด้วยตัวเอง — เปิดอ่านทีละหัวข้อได้ด้านล่าง',
    'extra_html' => '
      <!-- ═══════════ Accordion 1: เว็บทดสอบทันที ═══════════ -->
      <div class="accordion" id="acc-speedweb">
        <button class="accordion__btn" onclick="toggleAcc(\'acc-speedweb\')">
          <span class="accordion__icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20a8 8 0 1 0 0-16 8 8 0 0 0 0 16Z"/><path d="M12 12 16 8"/></svg>
          </span>
          <span class="accordion__title">1. ทดสอบผ่านเว็บไซต์ (สะดวกที่สุด ไม่ต้องติดตั้งอะไร)</span>
          <span class="accordion__arrow">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
          </span>
        </button>
        <div class="accordion__body">
          <div class="accordion__inner">
            <a href="http://checkall.dhammakaya.network" target="_blank"
               style="display:flex;align-items:center;justify-content:space-between;
                      background:linear-gradient(135deg,#1e40af 0%,#3b82f6 100%);
                      color:white;border-radius:14px;padding:16px 22px;text-decoration:none;
                      box-shadow:0 4px 15px rgba(59,130,246,.35)">
              <div style="display:flex;align-items:center;gap:12px">
                <div style="width:40px;height:40px;background:rgba(255,255,255,.2);border-radius:10px;
                            display:flex;align-items:center;justify-content:center;flex-shrink:0">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                    <path d="M12 20a8 8 0 1 0 0-16 8 8 0 0 0 0 16Z"/>
                    <path d="M12 12 16 8"/>
                  </svg>
                </div>
                <div>
                  <div style="font-weight:700;font-size:.95rem">เปิดเว็บทดสอบคุณภาพเครือข่าย</div>
                  <div style="font-size:.78rem;opacity:.85;margin-top:2px">CheckALL.Dhammakaya.network</div>
                </div>
              </div>
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5"
                   stroke-linecap="round" stroke-linejoin="round">
                <line x1="5" y1="12" x2="19" y2="12"/>
                <polyline points="12 5 19 12 12 19"/>
              </svg>
            </a>

            <div style="display:flex;gap:10px;align-items:flex-start;background:#fffbeb;border:1px solid #fde68a;
                        border-radius:12px;padding:12px 16px;margin-top:14px">
              <span style="font-size:1rem;flex-shrink:0">⚠️</span>
              <span style="font-size:.85rem;color:#92400e;line-height:1.6">
                ใช้ได้เฉพาะเครื่องที่เชื่อมต่อ <strong>LAN / WiFi ภายในวัดพระธรรมกาย</strong> เท่านั้น
                หากอยู่นอกพื้นที่จะเปิดเว็บไซต์นี้ไม่ได้
              </span>
            </div>
          </div>
        </div>
      </div>

      <!-- ═══════════ Accordion 2: Windows ═══════════ -->
      <div class="accordion" id="acc-speedwin">
        <button class="accordion__btn" onclick="toggleAcc(\'acc-speedwin\')">
          <span class="accordion__icon">
            <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><path d="M0 3.449 9.75 2.1v9.451H0m10.949-9.602L24 0v11.4H10.949M0 12.6h9.75v9.451L0 20.699M10.949 12.6H24V24l-12.9-1.801"/></svg>
          </span>
          <span class="accordion__title">2. เครื่องมือตรวจเช็คเน็ต สำหรับ Windows 10 / 11</span>
          <span class="accordion__arrow">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
          </span>
        </button>
        <div class="accordion__body">
          <div class="accordion__inner">
            <p style="font-size:.85rem;color:var(--clr-text-muted);line-height:1.75;margin:0">
              Script Check Net (.bat) พัฒนาโดยกอง CNA v.1.0 — ไม่ต้องติดตั้งโปรแกรมเพิ่มเติม
              เปิดใช้งานได้ทันทีด้วยการดับเบิลคลิก ระบบจะเปิดหน้าเว็บสรุปผลให้อัตโนมัติ
            </p>

            <a href="../assets/downloads/NetInfo-CNA1-0.zip" download
               style="display:flex;align-items:center;justify-content:space-between;
                      background:linear-gradient(135deg,#0f766e 0%,#14b8a6 100%);
                      color:white;border-radius:14px;padding:16px 22px;text-decoration:none;
                      box-shadow:0 4px 15px rgba(20,184,166,.35)">
              <div style="display:flex;align-items:center;gap:12px">
                <div style="width:40px;height:40px;background:rgba(255,255,255,.2);border-radius:10px;
                            display:flex;align-items:center;justify-content:center;flex-shrink:0">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                    <polyline points="7 10 12 15 17 10"/>
                    <line x1="12" y1="15" x2="12" y2="3"/>
                  </svg>
                </div>
                <div>
                  <div style="font-weight:700;font-size:.95rem">ดาวน์โหลด NetInfo-CNA1-0.zip</div>
                  <div style="font-size:.78rem;opacity:.85;margin-top:2px">สำหรับ Windows 10 / 11 ทุกเครื่อง</div>
                </div>
              </div>
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5"
                   stroke-linecap="round" stroke-linejoin="round">
                <line x1="5" y1="12" x2="19" y2="12"/>
                <polyline points="12 5 19 12 12 19"/>
              </svg>
            </a>

            <div class="step-block">
              <div class="step-header">
                <div class="step-num">1</div>
                <div class="step-title">แตกไฟล์ (Extract)</div>
              </div>
              <div class="step-body" style="padding-left:38px">
                <p class="step-desc">ดับเบิลคลิกไฟล์ <strong>NetInfo-CNA1-0.zip</strong> ที่ดาวน์โหลดมา เพื่อแตกไฟล์ออกมาในโฟลเดอร์เดียวกัน</p>
              </div>
            </div>

            <div class="step-block">
              <div class="step-header">
                <div class="step-num">2</div>
                <div class="step-title">ดับเบิลคลิกเปิดไฟล์ ตรวจเช็คเน็ต.bat</div>
              </div>
              <div class="step-body" style="padding-left:38px">
                <p class="step-desc">อยู่ในโฟลเดอร์ที่แตกออกมา ไม่ต้องติดตั้งหรือรอ ระบบจะเริ่มทำงานทันที</p>
              </div>
            </div>

            <div class="step-block">
              <div class="step-header">
                <div class="step-num">3</div>
                <div class="step-title">ดูผลลัพธ์บนหน้าเว็บที่เปิดขึ้นอัตโนมัติ</div>
              </div>
              <div class="step-body" style="padding-left:38px">
                <p class="step-desc">แสดงชื่อเครื่อง สถานะ Domain, IP Address, Default Gateway, DNS Server และตาราง Routing
                  พร้อมปุ่ม <strong>"คัดลอกข้อมูลส่งให้ทีม IT"</strong> เพื่อวางส่งทาง LINE ได้ทันที</p>
                <div class="step-img-wrap" style="margin-top:10px">
                  <div style="border:1px solid var(--clr-border);border-radius:14px;overflow:hidden;
                              box-shadow:0 2px 12px rgba(0,0,0,.07)">
                    <div style="background:#e2e8f0;padding:8px 14px;display:flex;align-items:center;gap:6px">
                      <div style="width:10px;height:10px;background:#f87171;border-radius:50%"></div>
                      <div style="width:10px;height:10px;background:#fbbf24;border-radius:50%"></div>
                      <div style="width:10px;height:10px;background:#34d399;border-radius:50%"></div>
                      <div style="background:white;border-radius:4px;padding:3px 12px;font-size:.72rem;
                                  color:#64748b;margin-left:8px;flex:1;max-width:320px">
                        cna_network_report.html
                      </div>
                    </div>
                    <img src="../assets/images/network/speedtest_win_preview.png"
                      alt="ตัวอย่างหน้าผลลัพธ์ Check Net Windows"
                      onclick="lbOpen([\'../assets/images/network/speedtest_win_preview.png\'], 0)"
                      style="width:100%;display:block;cursor:pointer"
                      onerror="this.style.display=\'none\';this.nextElementSibling.style.display=\'flex\'">
                    <div style="display:none;background:#f8fafc;padding:32px;flex-direction:column;
                                align-items:center;gap:10px;color:#94a3b8">
                      <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <rect x="3" y="3" width="18" height="18" rx="2"/>
                        <circle cx="8.5" cy="8.5" r="1.5"/>
                        <polyline points="21 15 16 10 5 21"/>
                      </svg>
                      <span style="font-size:.82rem">วางรูปภาพ speedtest_win_preview.png ไว้ในโฟลเดอร์ assets/images/network/</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ═══════════ Accordion 3: macOS ═══════════ -->
      <div class="accordion" id="acc-speedmac">
        <button class="accordion__btn" onclick="toggleAcc(\'acc-speedmac\')">
          <span class="accordion__icon">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M16.365 1.43c0 1.14-.493 2.27-1.177 3.08-.744.9-1.99 1.57-2.987 1.57-.12 0-.23-.02-.3-.03-.01-.06-.04-.22-.04-.39 0-1.15.572-2.27 1.206-2.98.804-.94 2.142-1.64 3.248-1.68.03.13.05.28.05.43zm4.565 15.71c-.03.07-.463 1.58-1.518 3.12-.945 1.34-1.94 2.71-3.43 2.71-1.517 0-1.9-.88-3.63-.88-1.698 0-2.302.91-3.67.91-1.377 0-2.332-1.26-3.428-2.8-1.287-1.82-2.323-4.63-2.323-7.28 0-4.28 2.797-6.55 5.552-6.55 1.448 0 2.675.95 3.6.95.865 0 2.222-1.01 3.902-1.01.613 0 2.886.06 4.374 2.19-.13.09-2.383 1.37-2.383 4.19 0 3.26 2.854 4.42 2.955 4.45z"/></svg>
          </span>
          <span class="accordion__title">3. เครื่องมือตรวจเช็คเน็ต สำหรับ macOS (ทำเองได้ใน 2 นาที)</span>
          <span class="accordion__arrow">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
          </span>
        </button>
        <div class="accordion__body">
          <div class="accordion__inner">
            <p style="font-size:.85rem;color:var(--clr-text-muted);line-height:1.75;margin:0">
              ทำได้โดยตรงบน macOS โดยไม่ต้องติดตั้งโปรแกรมเสริมใด ๆ ใช้คำสั่ง <code>hdiutil</code> ที่มากับเครื่อง
              แปลงสคริปต์ให้เป็นแอป แล้วแพ็กออกมาเป็นไฟล์ .dmg — เปิดใช้งานได้ทันทีเหมือนเวอร์ชัน Windows 100%
            </p>

            <div class="step-block">
              <div class="step-header">
                <div class="step-num">1</div>
                <div class="step-title">เปิดโปรแกรม Terminal บนเครื่อง Mac</div>
              </div>
              <div class="step-body" style="padding-left:38px">
                <p class="step-desc">กด <code>Cmd + Space</code> พิมพ์ <code>Terminal</code> แล้วเปิดโปรแกรม</p>
              </div>
            </div>

            <div class="step-block">
              <div class="step-header">
                <div class="step-num">2</div>
                <div class="step-title">คัดลอกสคริปต์ด้านล่างทั้งหมด แล้ววางใน Terminal</div>
              </div>
              <div class="step-body" style="padding-left:38px">
                <p class="step-desc">กดปุ่ม <strong>"คัดลอกโค้ด"</strong> ด้านล่าง แล้ววาง (Cmd+V) ลงใน Terminal จากนั้นกด <code>Enter</code></p>
              </div>
            </div>

            <div class="step-block">
              <div class="step-header">
                <div class="step-num">3</div>
                <div class="step-title">รอสักครู่ — ไฟล์แอปจะถูกสร้างขึ้นเองอัตโนมัติ</div>
              </div>
              <div class="step-body" style="padding-left:38px">
                <p class="step-desc">ระบบจะสร้างไฟล์ <strong>CNA-CheckNet-v1.0.dmg</strong> ไว้บน Desktop ให้ทันที —
                  ดับเบิลคลิกเปิดไฟล์ แล้วเลือก <strong>เปิดใช้งานทันที</strong> จากในหน้าต่าง DMG ได้เลย
                  หรือ <strong>ลากไอคอนไปวางที่โฟลเดอร์ Applications</strong> เพื่อติดตั้งถาวร
                  (ครั้งต่อไปเปิดผ่าน Spotlight หรือ Launchpad ได้เลย)</p>
              </div>
            </div>

            <div style="margin-top:6px">
              <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:8px">
                <span style="font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;
                            color:var(--clr-text-muted)">สคริปต์สำหรับวางใน Terminal</span>
                <button onclick="copyMacScript()" id="copyMacBtn"
                  style="display:flex;align-items:center;gap:6px;background:var(--clr-primary);color:#fff;
                         border:none;border-radius:8px;padding:7px 14px;font-size:.8rem;font-weight:600;
                         cursor:pointer;font-family:inherit">
                  <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                  คัดลอกโค้ด
                </button>
              </div>
              <pre id="macScriptBox" style="background:#0f172a;color:#e2e8f0;border-radius:12px;padding:18px;
                          overflow-x:auto;max-height:320px;font-size:.76rem;line-height:1.65;
                          font-family:ui-monospace,Menlo,Consolas,monospace;margin:0"><code>' . htmlspecialchars($cna_mac_script) . '</code></pre>
            </div>
          </div>
        </div>
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

<!-- ─── Accordion Styles (เหมือนหน้า manual.php) ─── -->
<style>
  .accordion {
    border: 1px solid var(--clr-border);
    border-radius: 14px;
    margin-bottom: 12px;
    overflow: hidden;
    background: var(--clr-surface, #fff);
    transition: box-shadow .2s;
  }

  .accordion.is-open {
    box-shadow: 0 4px 20px rgba(0, 0, 0, .08);
  }

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
    color: var(--clr-primary);
  }

  .accordion__btn:hover {
    background: var(--clr-primary-pale, #eff6ff);
  }

  .accordion.is-open .accordion__btn {
    background: var(--clr-primary-pale, #eff6ff);
    border-bottom: 1px solid var(--clr-border);
  }

  .accordion__icon {
    flex-shrink: 0;
    display: flex;
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
    gap: 16px;
  }

  .accordion__inner>* {
    min-width: 0;
  }

  .step-block {
    display: flex;
    flex-direction: column;
    gap: 8px;
  }

  .step-header {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .step-num {
    width: 26px;
    height: 26px;
    border-radius: 50%;
    background: var(--clr-primary, #2563eb);
    color: #fff;
    font-size: .76rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }

  .step-title {
    font-weight: 600;
    font-size: .88rem;
    color: var(--clr-text);
  }

  .step-desc {
    font-size: .85rem;
    line-height: 1.75;
    color: var(--clr-text);
    margin: 0;
  }

  .step-desc code {
    background: #f1f5f9;
    padding: 1px 6px;
    border-radius: 4px;
    font-family: "Courier New", monospace;
    font-size: .85em;
    color: #dc2626;
  }
</style>

<script>
  function toggleAcc(id) {
    const el = document.getElementById(id);
    if (!el) return;
    const isOpen = el.classList.contains('is-open');
    el.classList.toggle('is-open', !isOpen);
  }

  function copyMacScript() {
    var box = document.getElementById('macScriptBox');
    var text = box.innerText;
    var tempArea = document.createElement('textarea');
    tempArea.value = text;
    tempArea.style.position = 'fixed';
    tempArea.style.left = '-9999px';
    document.body.appendChild(tempArea);
    tempArea.focus();
    tempArea.select();
    var ok = false;
    try {
      ok = document.execCommand('copy');
    } catch (e) {
      ok = false;
    }
    document.body.removeChild(tempArea);
    var btn = document.getElementById('copyMacBtn');
    if (ok) {
      var old = btn.innerHTML;
      btn.innerHTML = '✅ คัดลอกแล้ว';
      setTimeout(function() {
        btn.innerHTML = old;
      }, 2200);
    }
  }
</script>

<main class="layout__main">
  <nav class="breadcrumb">
    <a href="../index.php">หน้าหลัก</a>
    <span class="breadcrumb__sep">›</span>
    <span>ระบบเครือข่าย & ความปลอดภัย</span>
  </nav>

  <?php require_once '../includes/single-panel.php'; ?>
</main>

<?php require_once '../includes/footer.php'; ?>