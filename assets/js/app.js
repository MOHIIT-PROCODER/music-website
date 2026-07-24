/**
 * app.js — Main application bootstrap
 */
document.addEventListener('DOMContentLoaded', function () {
  'use strict';

  /* ── Dropdowns ─────────────────────────────────────────── */
  document.querySelectorAll('.dropdown').forEach(function (dropdown) {
    const trigger = dropdown.querySelector('[data-dropdown-trigger]');
    if (!trigger) return;
    trigger.addEventListener('click', function (e) {
      e.stopPropagation();
      const isOpen = dropdown.classList.contains('open');
      document.querySelectorAll('.dropdown.open').forEach(d => d.classList.remove('open'));
      if (!isOpen) dropdown.classList.add('open');
    });
  });
  document.addEventListener('click', function () {
    document.querySelectorAll('.dropdown.open').forEach(d => d.classList.remove('open'));
  });

  /* ── Modals ────────────────────────────────────────────── */
  document.querySelectorAll('[data-modal-open]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      const id = btn.dataset.modalOpen;
      const overlay = document.getElementById(id);
      if (overlay) overlay.classList.add('open');
    });
  });
  document.querySelectorAll('[data-modal-close]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      btn.closest('.modal-overlay')?.classList.remove('open');
    });
  });
  document.querySelectorAll('.modal-overlay').forEach(function (overlay) {
    overlay.addEventListener('click', function (e) {
      if (e.target === overlay) overlay.classList.remove('open');
    });
  });

  /* ── Tabs ──────────────────────────────────────────────── */
  document.querySelectorAll('.tab-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      const tabGroup = btn.closest('[data-tab-group]');
      if (!tabGroup) return;
      const target = btn.dataset.tab;

      tabGroup.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      document.querySelectorAll(`[data-tab-content]`).forEach(function (panel) {
        panel.style.display = panel.dataset.tabContent === target ? '' : 'none';
      });
    });
  });

  /* ── Favorites (UI only — hydrated from server) ─────────── */
  document.querySelectorAll('.btn-favorite').forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      e.stopPropagation();
      btn.classList.toggle('active');
      showToast(btn.classList.contains('active') ? '❤️ Added to favorites' : 'Removed from favorites', 'success');
    });
  });

  /* ── Follow (UI only) ──────────────────────────────────── */
  document.querySelectorAll('.btn-follow').forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      e.stopPropagation();
      const following = btn.classList.toggle('following');
      btn.textContent = following ? 'Following' : 'Follow';
      showToast(following ? '✅ Following artist' : 'Unfollowed', 'info');
    });
  });

  /* ── Toast Notifications ───────────────────────────────── */
  window.showToast = function (message, type = 'info', duration = 3000) {
    let container = document.querySelector('.toast-container');
    if (!container) {
      container = document.createElement('div');
      container.className = 'toast-container';
      document.body.appendChild(container);
    }
    const icons = { success: '✓', error: '✕', info: 'ℹ' };
    const toast = document.createElement('div');
    toast.className = `toast toast--${type}`;
    toast.innerHTML = `<span style="font-size:16px">${icons[type] || icons.info}</span><span>${message}</span>`;
    container.appendChild(toast);
    setTimeout(() => {
      toast.style.opacity = '0';
      toast.style.transform = 'translateX(20px)';
      toast.style.transition = 'all 0.3s ease';
      setTimeout(() => toast.remove(), 300);
    }, duration);
  };

  /* ── Lazy Image Loading ────────────────────────────────── */
  if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          const img = entry.target;
          if (img.dataset.src) {
            img.src = img.dataset.src;
            img.removeAttribute('data-src');
          }
          imageObserver.unobserve(img);
        }
      });
    });
    document.querySelectorAll('img[data-src]').forEach(img => imageObserver.observe(img));
  }

  /* ── Smooth Scroll Reveal ──────────────────────────────── */
  if ('IntersectionObserver' in window) {
    const revealObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('animate-fade-in');
          revealObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1 });
    document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));
  }

  /* ── Mobile Nav ────────────────────────────────────────── */
  const mobileNavBtn = document.getElementById('mobile-nav-toggle');
  const mobileNav    = document.getElementById('mobile-nav');
  if (mobileNavBtn && mobileNav) {
    mobileNavBtn.addEventListener('click', function () {
      mobileNav.classList.toggle('open');
      mobileNavBtn.setAttribute('aria-expanded', mobileNav.classList.contains('open'));
    });
  }

  /* ── Number counters (stats) ────────────────────────────── */
  function animateCounter(el) {
    const target = parseInt(el.dataset.count, 10);
    const duration = 1500;
    const start = performance.now();
    function step(now) {
      const progress = Math.min((now - start) / duration, 1);
      const eased = 1 - Math.pow(1 - progress, 3);
      el.textContent = Math.floor(eased * target).toLocaleString();
      if (progress < 1) requestAnimationFrame(step);
      else el.textContent = target.toLocaleString() + (el.dataset.suffix || '');
    }
    requestAnimationFrame(step);
  }
  document.querySelectorAll('[data-count]').forEach(function (el) {
    const obs = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) { animateCounter(el); obs.disconnect(); }
      });
    });
    obs.observe(el);
  });
});
