// assets/js/mobile-nav.js
(function () {
  'use strict';

  const overlay = document.getElementById('mobile-overlay');
  const mobileNav = document.getElementById('mobile-nav');
  const openBtn = document.getElementById('hamburger-btn');
  const closeBtn = document.getElementById('mobile-close-btn');

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

  if (openBtn) openBtn.addEventListener('click', openNav);
  if (closeBtn) closeBtn.addEventListener('click', closeNav);
  if (overlay) overlay.addEventListener('click', closeNav);

  // Accordion toggles inside mobile nav
  document.querySelectorAll('.mobile-toggle-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var submenu = btn.nextElementSibling;
      if (!submenu || !submenu.classList.contains('mobile-submenu')) return;
      var isOpen = btn.classList.contains('open');
      btn.classList.toggle('open', !isOpen);
      submenu.classList.toggle('open', !isOpen);
    });
  });
})();
