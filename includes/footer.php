<!-- // includes/footer.php -->
<?php
// includes/footer.php
?>
</div><!-- /.layout -->

<!-- FOOTER -->
<footer class="site-footer">
  <div class="footer__inner">
    <div class="footer__brand">
      <div class="footer__logo">
        <img src="<?= BASE_URL ?>/assets/images/logo.png" alt="<?= SITE_NAME ?>" style="width:38px;height:38px;object-fit:contain;filter:brightness(0) invert(1) opacity(0.85)">
      </div>
      <div>
        <div class="footer__name"><?= SITE_NAME_EN ?></div>
        <div class="footer__sub"><?= SITE_NAME ?></div>
        <div class="footer__contact">
          กองบริการสารสนเทศ ฝ่ายสารสนเทศ<br>
          สำนักประธานคณะกรรมการบริหารสภาธรรมกายสากล<br>
          ที่ตั้ง: อาคาร 100 ปีฯ ตึก 0 ชั้น 11 วัดพระธรรมกาย<br>
          โทร: 02-831-1441 &nbsp;|&nbsp; โทร. 02-831-1000 ต่อ 14141 &nbsp;|&nbsp;
          <a href="mailto:<?= SITE_EMAIL ?>"><?= SITE_EMAIL ?></a><br>
          <?= SITE_HOURS ?>
        </div>
      </div>
    </div>
    <div class="footer__links">
      <div class="footer__col">
        <div class="footer__col-title">บริการยอดนิยม</div>
        <ul>
          <li><a href="pages/services.php?cat=account">ขอ Account ใหม่</a></li>
          <li><a href="pages/services.php?cat=reset">รีเซ็ตรหัสผ่าน</a></li>
          <li><a href="pages/services.php?cat=wifi">ขอใช้ Wi-Fi</a></li>
        </ul>
      </div>
      <div class="footer__col">
        <div class="footer__col-title">คู่มือยอดนิยม</div>
        <ul>
          <li><a href="pages/guides.php?cat=email">การตั้งค่า Email</a></li>
          <li><a href="pages/guides.php?cat=teams">Microsoft Teams</a></li>
          <li><a href="pages/guides.php?cat=wifi">การใช้งาน Wi-Fi</a></li>
          <li><a href="pages/guides.php?cat=vpn">VPN</a></li>
        </ul>
      </div>
      <div class="footer__col">
        <div class="footer__col-title">ลิงก์ด่วน</div>
        <ul>
          <li><a href="pages/network.php?cat=policy">นโยบาย IT</a></li>
          <li><a href="#">ระบบบริหารบุคคล</a></li>
          <li><a href="#">ระบบสารบรรณ</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer__bottom">
    <span>© <?= date('Y') ?> <?= SITE_NAME ?> · พัฒนาโดยทีมกองบริการสารสนเทศ</span>
  </div>
</footer>

<!-- MOBILE NAV JS -->
<script src="assets/js/mobile-nav.js"></script>

<!-- ───── LIGHTBOX ───── -->
<div id="lb-overlay" style="display:none;position:fixed;inset:0;z-index:9999;
     background:rgba(0,0,0,.88);align-items:center;justify-content:center;flex-direction:column">

  <button onclick="lbClose()" title="ปิด (Esc)"
    style="position:absolute;top:14px;right:18px;background:rgba(255,255,255,.15);
           border:none;color:white;font-size:1.5rem;width:40px;height:40px;
           border-radius:50%;cursor:pointer;line-height:1">✕</button>

  <button onclick="lbMove(-1)" id="lb-prev"
    style="position:absolute;left:10px;top:50%;transform:translateY(-50%);
           background:rgba(255,255,255,.15);border:none;color:white;font-size:2rem;
           width:48px;height:48px;border-radius:50%;cursor:pointer">‹</button>

  <button onclick="lbMove(1)" id="lb-next"
    style="position:absolute;right:10px;top:50%;transform:translateY(-50%);
           background:rgba(255,255,255,.15);border:none;color:white;font-size:2rem;
           width:48px;height:48px;border-radius:50%;cursor:pointer">›</button>

  <div id="lb-imgwrap"
    style="width:90vw;height:80vh;overflow:hidden;position:relative;
           display:flex;align-items:center;justify-content:center;cursor:grab">
    <img id="lb-img" src="" alt=""
      style="max-width:90vw;max-height:80vh;border-radius:10px;
             display:block;user-select:none;-webkit-user-drag:none;
             transform-origin:center center;
             transition:none">
  </div>

  <div style="margin-top:12px;display:flex;align-items:center;gap:10px">
    <span id="lb-counter" style="color:rgba(255,255,255,.65);font-size:.85rem;min-width:50px;text-align:center"></span>
    <button onclick="lbZoom(-1)"
      style="background:rgba(255,255,255,.15);border:none;color:white;
             border-radius:6px;padding:5px 14px;cursor:pointer;font-size:1.1rem">−</button>
    <button onclick="lbZoom(1)"
      style="background:rgba(255,255,255,.15);border:none;color:white;
             border-radius:6px;padding:5px 14px;cursor:pointer;font-size:1.1rem">+</button>
    <button onclick="lbZoomReset()"
      style="background:rgba(255,255,255,.15);border:none;color:white;
             border-radius:6px;padding:5px 12px;cursor:pointer;font-size:.8rem">Reset</button>
  </div>
</div>

<script>
  var _lbImgs = [],
    _lbIdx = 0,
    _lbScale = 1;

  function lbOpen(imgs, idx) {
    _lbImgs = imgs;
    _lbIdx = idx;
    _lbScale = 1;
    document.getElementById('lb-overlay').style.display = 'flex';
    document.body.style.overflow = 'hidden';
    lbShow();
  }

  function lbShow() {
    var img = document.getElementById('lb-img');
    img.src = _lbImgs[_lbIdx];
    _lbScale = 1; _panX = 0; _panY = 0;
    _applyTransform();
    document.getElementById('lb-imgwrap').style.cursor = 'grab';
    document.getElementById('lb-counter').textContent =
      _lbImgs.length > 1 ? (_lbIdx + 1) + ' / ' + _lbImgs.length : '';
    document.getElementById('lb-prev').style.display = _lbImgs.length > 1 ? '' : 'none';
    document.getElementById('lb-next').style.display = _lbImgs.length > 1 ? '' : 'none';
  }

  function lbClose() {
    document.getElementById('lb-overlay').style.display = 'none';
    document.body.style.overflow = '';
  }

  function lbMove(d) {
    _lbIdx = (_lbIdx + d + _lbImgs.length) % _lbImgs.length;
    lbShow();
  }

  function lbZoom(d) {
    _lbScale = Math.min(4, Math.max(0.5, _lbScale + d * 0.4));
    _applyTransform();
  }

  function lbZoomReset() {
    _lbScale = 1;
    _panX = 0;
    _panY = 0;
    _applyTransform();
  }
  
  document.addEventListener('keydown', function(e) {
    if (document.getElementById('lb-overlay').style.display === 'none') return;
    if (e.key === 'Escape') lbClose();
    if (e.key === 'ArrowLeft') lbMove(-1);
    if (e.key === 'ArrowRight') lbMove(1);
    if (e.key === '+') lbZoom(1);
    if (e.key === '-') lbZoom(-1);
  });
  document.getElementById('lb-overlay').addEventListener('click', function(e) {
    if (e.target === this) lbClose();
  });

  // ── Pan & Zoom state ──
  var _panX = 0,
    _panY = 0;

  function _applyTransform() {
    document.getElementById('lb-img').style.transform =
      'translate(' + _panX + 'px,' + _panY + 'px) scale(' + _lbScale + ')';
  }

  // ── Mouse Wheel Zoom ──
  document.getElementById('lb-imgwrap').addEventListener('wheel', function(e) {
    e.preventDefault();
    var prev = _lbScale;
    _lbScale = Math.min(4, Math.max(0.5, _lbScale + (e.deltaY < 0 ? 0.3 : -0.3)));
    _applyTransform();
  }, {
    passive: false
  });

  // ── Mouse Drag Pan ──
  var _drag = false,
    _dragStartX = 0,
    _dragStartY = 0,
    _panStartX = 0,
    _panStartY = 0;
  var _wrap = document.getElementById('lb-imgwrap');

  _wrap.addEventListener('mousedown', function(e) {
    _drag = true;
    _dragStartX = e.clientX;
    _dragStartY = e.clientY;
    _panStartX = _panX;
    _panStartY = _panY;
    _wrap.style.cursor = 'grabbing';
    e.preventDefault();
  });
  document.addEventListener('mousemove', function(e) {
    if (!_drag) return;
    _panX = _panStartX + (e.clientX - _dragStartX);
    _panY = _panStartY + (e.clientY - _dragStartY);
    _applyTransform();
  });
  document.addEventListener('mouseup', function() {
    if (!_drag) return;
    _drag = false;
    _wrap.style.cursor = 'grab';
  });

  // ── Touch: 1 นิ้ว Pan + 2 นิ้ว Pinch Zoom ──
  var _touchDist = 0;
  var _t1StartX = 0,
    _t1StartY = 0,
    _panAtTouchX = 0,
    _panAtTouchY = 0;

  _wrap.addEventListener('touchstart', function(e) {
    if (e.touches.length === 1) {
      _t1StartX = e.touches[0].clientX;
      _t1StartY = e.touches[0].clientY;
      _panAtTouchX = _panX;
      _panAtTouchY = _panY;
    }
    if (e.touches.length === 2) {
      _touchDist = Math.hypot(
        e.touches[0].clientX - e.touches[1].clientX,
        e.touches[0].clientY - e.touches[1].clientY
      );
    }
  }, {
    passive: true
  });

  _wrap.addEventListener('touchmove', function(e) {
    e.preventDefault();
    if (e.touches.length === 1) {
      _panX = _panAtTouchX + (e.touches[0].clientX - _t1StartX);
      _panY = _panAtTouchY + (e.touches[0].clientY - _t1StartY);
      _applyTransform();
    }
    if (e.touches.length === 2) {
      var newDist = Math.hypot(
        e.touches[0].clientX - e.touches[1].clientX,
        e.touches[0].clientY - e.touches[1].clientY
      );
      var delta = newDist - _touchDist;
      if (Math.abs(delta) > 3) {
        _lbScale = Math.min(4, Math.max(0.5, _lbScale + (delta > 0 ? 0.05 : -0.05)));
        _applyTransform();
        _touchDist = newDist;
      }
    }
  }, {
    passive: false
  });
</script>

<style>
  /* ============================================================
   FOOTER STYLES
   ============================================================ */
  .site-footer {
    background: #0e2338;
    color: rgba(255, 255, 255, .72);
    font-size: .85rem;
    margin-top: auto;
  }

  .footer__inner {
    max-width: 1280px;
    margin: 0 auto;
    padding: 40px 24px 32px;
    display: flex;
    gap: 48px;
    flex-wrap: wrap;
  }

  .footer__brand {
    display: flex;
    gap: 16px;
    flex: 1;
    min-width: 260px;
  }

  .footer__logo {
    font-size: 2rem;
    width: 52px;
    height: 52px;
    background: rgba(255, 255, 255, .08);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }

  .footer__name {
    color: #fff;
    font-weight: 600;
    font-size: .95rem;
    margin-bottom: 2px;
  }

  .footer__sub {
    font-size: .78rem;
    opacity: .6;
    margin-bottom: 6px;
  }

  .footer__contact {
    font-size: .78rem;
    line-height: 1.8;
  }

  .footer__contact a {
    color: rgba(255, 255, 255, .65);
  }

  .footer__contact a:hover {
    color: #fff;
  }

  .footer__links {
    display: flex;
    gap: 40px;
    flex-wrap: wrap;
  }

  .footer__col-title {
    color: #fff;
    font-weight: 600;
    font-size: .8rem;
    margin-bottom: 10px;
    letter-spacing: .05em;
    text-transform: uppercase;
  }

  .footer__col ul li {
    margin-bottom: 6px;
  }

  .footer__col ul li a {
    color: rgba(255, 255, 255, .58);
    transition: color .2s;
  }

  .footer__col ul li a:hover {
    color: #fff;
  }

  .footer__bottom {
    border-top: 1px solid rgba(255, 255, 255, .08);
    text-align: center;
    padding: 16px 24px;
    font-size: .78rem;
    opacity: .5;
  }
</style>
</body>

</html>