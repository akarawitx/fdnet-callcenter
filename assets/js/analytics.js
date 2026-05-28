/**
 * assets/js/analytics.js
 * ส่งข้อมูล pageview ไปที่ analytics/tracker.php
 * โหลดครั้งเดียวใน footer.php แทน Cloudflare beacon
 */
(function () {
  'use strict';

  // BASE_URL มาจาก config.php ที่ inject ใน header.php แล้ว
  var base = (typeof window.BASE_URL !== 'undefined') ? window.BASE_URL : '';
  var endpoint = base + '/analytics/tracker.php';

  function send() {
    var payload = {
      page:     window.location.pathname + window.location.search,
      title:    document.title,
      referrer: document.referrer || ''
    };

    // ใช้ fetch ถ้ามี, fallback เป็น sendBeacon
    if (navigator.sendBeacon) {
      var blob = new Blob([JSON.stringify(payload)], { type: 'application/json' });
      navigator.sendBeacon(endpoint, blob);
    } else if (window.fetch) {
      fetch(endpoint, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload),
        keepalive: true
      }).catch(function () {});
    }
  }

  // ส่งเมื่อหน้าโหลดเสร็จ
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', send);
  } else {
    send();
  }
})();