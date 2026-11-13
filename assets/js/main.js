/* MATMAZEL İzmit — site etkileşimleri (bağımlılıksız) */
(function () {
  'use strict';
  window.__matmazel = true;

  var doc = document;
  var body = doc.body;

  /* ---------- Kaydırmada header görünümü ---------- */
  var header = doc.querySelector('[data-header]');
  if (header) {
    var onScroll = function () {
      header.classList.toggle('is-scrolled', window.scrollY > 20);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  /* ---------- Mobil menü ---------- */
  var toggle = doc.querySelector('[data-menu-toggle]');
  var overlay = doc.querySelector('[data-menu-overlay]');
  function setMenu(open) {
    if (!header || !toggle) return;
    header.classList.toggle('menu-open', open);
    toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    toggle.setAttribute('aria-label', open ? 'Menüyü kapat' : 'Menüyü aç');
  }
  if (toggle) {
    toggle.addEventListener('click', function () {
      setMenu(!header.classList.contains('menu-open'));
    });
  }
  if (overlay) overlay.addEventListener('click', function () { setMenu(false); });

  /* ---------- Görünür olunca belirme ---------- */
  var revealEls = doc.querySelectorAll('[data-reveal]');
  function finishReveal(el) {
    el.removeAttribute('data-reveal');
    el.classList.remove('is-visible');
  }
  function show(el) {
    el.classList.add('is-visible');
    var done = function (e) {
      if (e.target === el && e.propertyName === 'opacity') {
        el.removeEventListener('transitionend', done);
        finishReveal(el);
      }
    };
    el.addEventListener('transitionend', done);
    // Güvenlik ağı: transitionend gelmezse (sekme arka planda vb.)
    setTimeout(function () { finishReveal(el); }, 2000);
  }
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          show(entry.target);
          io.unobserve(entry.target);
        }
      });
    }, { rootMargin: '0px 0px -40px 0px', threshold: 0.1 });
    revealEls.forEach(function (el) { io.observe(el); });
  } else {
    revealEls.forEach(finishReveal);
  }

  /* ---------- Ortak: kaydırma kilidi + ESC ---------- */
  var openLayers = [];
  function lockScroll() { body.style.overflow = openLayers.length ? 'hidden' : ''; }
  doc.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      if (openLayers.length) openLayers[openLayers.length - 1]();
      else setMenu(false);
    }
  });

  /* ---------- Karşılama popup'ı (oturumda bir kez) ---------- */
  var popup = doc.querySelector('[data-popup]');
  var POPUP_KEY = 'matmazel_location_popup_seen';
  function seen() {
    try { return sessionStorage.getItem(POPUP_KEY); } catch (e) { return '1'; }
  }
  function closePopup() {
    if (!popup || popup.hidden) return;
    try { sessionStorage.setItem(POPUP_KEY, 'true'); } catch (e) {}
    popup.classList.add('is-closing');
    setTimeout(function () {
      popup.hidden = true;
      popup.classList.remove('is-closing');
    }, 250);
    openLayers = openLayers.filter(function (f) { return f !== closePopup; });
    lockScroll();
  }
  if (popup && !seen()) {
    setTimeout(function () {
      popup.hidden = false;
      openLayers.push(closePopup);
      lockScroll();
      var card = popup.querySelector('.popup-card');
      if (card) card.focus({ preventScroll: true });
    }, 400);
    popup.querySelectorAll('[data-popup-close]').forEach(function (el) {
      el.addEventListener('click', closePopup);
    });
  }

  /* ---------- Galeri lightbox ---------- */
  var modal = doc.querySelector('[data-lightbox-modal]');
  if (modal) {
    var modalImg = modal.querySelector('[data-lightbox-img]');
    var lastTrigger = null;
    var closeLightbox = function () {
      modal.hidden = true;
      openLayers = openLayers.filter(function (f) { return f !== closeLightbox; });
      lockScroll();
      if (lastTrigger) lastTrigger.focus({ preventScroll: true });
    };
    doc.querySelectorAll('[data-lightbox]').forEach(function (link) {
      link.addEventListener('click', function (e) {
        e.preventDefault();
        lastTrigger = link;
        var thumb = link.querySelector('img');
        modalImg.src = link.getAttribute('href');
        modalImg.alt = thumb ? thumb.alt : '';
        modal.hidden = false;
        openLayers.push(closeLightbox);
        lockScroll();
        modal.querySelector('[data-lightbox-close]').focus({ preventScroll: true });
      });
    });
    modal.addEventListener('click', function (e) {
      if (e.target === modal || e.target.hasAttribute('data-lightbox-close')) closeLightbox();
    });
  }
})();
