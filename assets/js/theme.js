/**
 * theme.js — Day / Night (Light / Dark) Toggle
 * Persists preference to localStorage, respects system preference.
 */
(function () {
  'use strict';

  const STORAGE_KEY = 'beatwave_theme';
  const DARK  = 'dark';
  const LIGHT = 'light';

  /**
   * Get initial theme:
   * 1. Saved preference
   * 2. System preference
   * 3. Fallback dark
   */
  function getInitialTheme() {
    const saved = localStorage.getItem(STORAGE_KEY);
    if (saved === DARK || saved === LIGHT) return saved;
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: light)').matches) return LIGHT;
    return DARK;
  }

  function applyTheme(theme) {
    document.documentElement.setAttribute('data-theme', theme);
    localStorage.setItem(STORAGE_KEY, theme);

    // Update all toggle inputs
    document.querySelectorAll('.theme-toggle__input').forEach(input => {
      input.checked = theme === LIGHT;
    });

    // Update toggle text labels
    document.querySelectorAll('.theme-toggle-text').forEach(el => {
      el.textContent = theme === LIGHT ? 'Day' : 'Night';
    });

    // Update meta theme-color
    const meta = document.querySelector('meta[name="theme-color"]');
    if (meta) meta.content = theme === LIGHT ? '#f5f5fa' : '#0a0a0f';
  }

  function toggleTheme() {
    const current = document.documentElement.getAttribute('data-theme') || DARK;
    applyTheme(current === DARK ? LIGHT : DARK);
  }

  // Apply immediately (before render) to avoid flash
  applyTheme(getInitialTheme());

  // Bind all toggles after DOM ready
  function bindToggles() {
    document.querySelectorAll('.theme-toggle__input').forEach(input => {
      input.addEventListener('change', toggleTheme);
    });
    // Also support clicks on the track
    document.querySelectorAll('.theme-toggle__track').forEach(track => {
      track.addEventListener('click', function (e) {
        // Only fire if not clicking the input (to avoid double-fire)
        if (e.target !== this.previousElementSibling) toggleTheme();
      });
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', bindToggles);
  } else {
    bindToggles();
  }

  // Listen to system preference changes
  if (window.matchMedia) {
    window.matchMedia('(prefers-color-scheme: light)').addEventListener('change', e => {
      if (!localStorage.getItem(STORAGE_KEY)) {
        applyTheme(e.matches ? LIGHT : DARK);
      }
    });
  }

  // Expose globally
  window.BeatWaveTheme = { toggle: toggleTheme, apply: applyTheme, get: getInitialTheme };
})();
