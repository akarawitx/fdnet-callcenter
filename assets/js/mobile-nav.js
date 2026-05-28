(function () {
  'use strict';

  var overlay  = document.getElementById('mobile-overlay');
  var mobileNav = document.getElementById('mobile-nav');
  var openBtn  = document.getElementById('hamburger-btn');
  var closeBtn = document.getElementById('mobile-close-btn');

  function openNav() {
    mobileNav.classList.add('open');
    overlay.style.display = 'block';
    document.body.style.overflow = 'hidden';
  }

  function closeNav() {
    mobileNav.classList.remove('open');
    overlay.style.display = 'none';
    document.body.style.overflow = '';
  }

  if (openBtn)  openBtn.addEventListener('click', openNav);
  if (closeBtn) closeBtn.addEventListener('click', closeNav);
  if (overlay)  overlay.addEventListener('click', closeNav);

  document.querySelectorAll('.mobile-toggle-btn').forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      e.stopPropagation();
      // หา .mobile-submenu ใน <li> เดียวกับปุ่ม
      var li  = btn.closest('li');
      var sub = li ? li.querySelector(':scope > .mobile-submenu') : null;
      if (!sub) return;
      var isOpen = sub.classList.contains('open');
      sub.classList.toggle('open', !isOpen);
      btn.classList.toggle('open', !isOpen);
    });
  });
})();