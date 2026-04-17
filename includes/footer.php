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
          ที่ตั้ง: อาคาร 100 ปีฯ ตึก O ชั้น 11 วัดพระธรรมกาย<br>
          โทร: 02-831-1441 &nbsp;|&nbsp; <?= SITE_PHONE ?> &nbsp;|&nbsp;
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
    <span>© <?= date('Y') ?> <?= SITE_NAME ?> · พัฒนาโดยทีม ICT วัดพระธรรมกาย</span>
  </div>
</footer>

<!-- MOBILE NAV JS -->
<script src="assets/js/mobile-nav.js"></script>

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