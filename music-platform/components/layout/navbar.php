<?php
/**
 * navbar.php — Main Navigation Bar with Day/Night Toggle
 */
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
function navActive(string $page): string {
    global $currentPage;
    return $currentPage === $page ? 'active' : '';
}
?>
<nav class="navbar" id="main-navbar" aria-label="Main navigation">
  <div class="navbar__inner">

    <!-- Logo -->
    <a href="/index.php" class="navbar__logo" aria-label="BeatWave Home">
      <div class="navbar__logo-icon" aria-hidden="true">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
          <path d="M9 18V5l12-2v13"/>
          <circle cx="6" cy="18" r="3"/>
          <circle cx="18" cy="16" r="3"/>
        </svg>
      </div>
      <span class="navbar__logo-text">Beat<span>Wave</span></span>
    </a>

    <!-- Search -->
    <div class="navbar__search" role="search">
      <div class="search-input-wrap">
        <svg class="search-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
          <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
        </svg>
        <input
          type="search"
          id="navbar-search"
          class="input"
          placeholder="Search songs, artists, albums…"
          autocomplete="off"
          aria-label="Search"
          data-search-input
        >
      </div>
      <!-- Suggestions dropdown (populated by search.js) -->
      <div id="search-suggestions" class="dropdown__menu" style="top:calc(100% + 6px); left:0; right:0; min-width:unset;"></div>
    </div>

    <!-- Right Actions -->
    <div class="navbar__actions">

      <!-- Nav Links (desktop) -->
      <nav class="nav-links" aria-label="Site navigation">
        <a href="/index.php"      class="nav-link <?= navActive('index') ?>">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          Home
        </a>
        <a href="/explore.php"    class="nav-link <?= navActive('explore') ?>">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"/></svg>
          Explore
        </a>
        <a href="/trending.php"   class="nav-link <?= navActive('trending') ?>">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
          Trending
        </a>
        <a href="/artists.php"    class="nav-link <?= navActive('artists') ?>">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
          Artists
        </a>
      </nav>

      <!-- Day / Night Toggle -->
      <div class="theme-toggle-wrap" title="Toggle day/night mode">
        <span class="theme-toggle-text" aria-hidden="true">Night</span>
        <label class="theme-toggle" aria-label="Toggle light/dark theme">
          <input type="checkbox" class="theme-toggle__input" id="theme-toggle-main" role="switch" aria-checked="false">
          <span class="theme-toggle__track" aria-hidden="true">
            <span class="theme-toggle__thumb">
              <!-- Moon icon for dark, Sun icon for light (shown via CSS) -->
            </span>
          </span>
        </label>
        <span class="theme-toggle-text" aria-hidden="true"></span>
      </div>

      <!-- User Avatar / Login -->
      <?php
      $isLoggedIn = isset($_SESSION['user_id']);
      if ($isLoggedIn):
        $userAvatar = $_SESSION['avatar'] ?? '/assets/images/default-avatar.webp';
        $userName   = htmlspecialchars($_SESSION['name'] ?? 'User');
      ?>
        <div class="dropdown" id="user-dropdown">
          <button class="btn-ghost" data-dropdown-trigger aria-haspopup="true" aria-expanded="false" aria-controls="user-dropdown-menu" aria-label="User menu" style="padding:0;">
            <img src="<?= $userAvatar ?>" alt="<?= $userName ?>'s avatar" class="avatar">
          </button>
          <div class="dropdown__menu" id="user-dropdown-menu" role="menu">
            <div style="padding: 8px 12px 4px; font-size: 12px; color: var(--text-muted);">Signed in as</div>
            <div style="padding: 0 12px 8px; font-size: 14px; font-weight: 600;"><?= $userName ?></div>
            <div class="dropdown__divider"></div>
            <a href="/dashboard/index.php" class="dropdown__item" role="menuitem">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
              Dashboard
            </a>
            <a href="/dashboard/profile.php" class="dropdown__item" role="menuitem">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
              Profile
            </a>
            <a href="/dashboard/settings.php" class="dropdown__item" role="menuitem">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 010-2.83 2 2 0 012.83 0l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z"/></svg>
              Settings
            </a>
            <div class="dropdown__divider"></div>
            <a href="/logout.php" class="dropdown__item danger" role="menuitem">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
              Sign Out
            </a>
          </div>
        </div>
      <?php else: ?>
        <a href="/login.php"    class="btn btn-ghost btn-sm">Sign In</a>
        <a href="/register.php" class="btn btn-primary btn-sm">Join Free</a>
      <?php endif; ?>

      <!-- Mobile menu button -->
      <button id="mobile-nav-toggle" class="btn-icon" aria-label="Open menu" aria-expanded="false" aria-controls="mobile-nav" style="display:none;">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
      </button>

    </div>
  </div>
</nav>

<!-- Mobile Nav Overlay -->
<div id="mobile-nav" class="mobile-nav" aria-hidden="true" role="dialog" aria-label="Mobile navigation">
  <div class="mobile-nav__backdrop" onclick="document.getElementById('mobile-nav').classList.remove('open')"></div>
  <div class="mobile-nav__panel">
    <div class="mobile-nav__header">
      <a href="/index.php" class="navbar__logo">
        <div class="navbar__logo-icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>
        </div>
        <span class="navbar__logo-text">Beat<span>Wave</span></span>
      </a>
      <button class="btn-icon" onclick="document.getElementById('mobile-nav').classList.remove('open')" aria-label="Close menu">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
    </div>
    <div class="mobile-nav__search" style="padding: 0 16px 16px;">
      <div class="search-input-wrap">
        <svg class="search-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        <input type="search" class="input" placeholder="Search…" aria-label="Search">
      </div>
    </div>
    <nav class="mobile-nav__links">
      <a href="/index.php"      class="mobile-nav__link <?= navActive('index') ?>">🏠 Home</a>
      <a href="/explore.php"    class="mobile-nav__link <?= navActive('explore') ?>">🧭 Explore</a>
      <a href="/trending.php"   class="mobile-nav__link <?= navActive('trending') ?>">🔥 Trending</a>
      <a href="/latest.php"     class="mobile-nav__link <?= navActive('latest') ?>">✨ Latest</a>
      <a href="/artists.php"    class="mobile-nav__link <?= navActive('artists') ?>">🎤 Artists</a>
      <a href="/albums.php"     class="mobile-nav__link <?= navActive('albums') ?>">💿 Albums</a>
      <a href="/categories.php" class="mobile-nav__link <?= navActive('categories') ?>">🎵 Categories</a>
    </nav>
    <div class="mobile-nav__footer">
      <div class="theme-toggle-wrap" style="justify-content:center; padding: 16px;">
        <span style="font-size:13px; color:var(--text-muted);">☽ Night</span>
        <label class="theme-toggle" aria-label="Toggle theme">
          <input type="checkbox" class="theme-toggle__input" id="theme-toggle-mobile">
          <span class="theme-toggle__track"><span class="theme-toggle__thumb"></span></span>
        </label>
        <span style="font-size:13px; color:var(--text-muted);">☀ Day</span>
      </div>
      <?php if (!$isLoggedIn): ?>
        <div style="display:flex; gap:8px; padding:0 16px 16px;">
          <a href="/login.php"    class="btn btn-secondary btn-full">Sign In</a>
          <a href="/register.php" class="btn btn-primary btn-full">Join Free</a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<style>
/* Mobile nav panel */
.mobile-nav { position: fixed; inset: 0; z-index: var(--z-modal); pointer-events: none; }
.mobile-nav.open { pointer-events: all; }
.mobile-nav__backdrop { position: absolute; inset: 0; background: rgba(0,0,0,0.6); opacity: 0; transition: opacity 0.3s; backdrop-filter: blur(4px); }
.mobile-nav.open .mobile-nav__backdrop { opacity: 1; }
.mobile-nav__panel { position: absolute; right: 0; top: 0; bottom: 0; width: min(340px, 90vw); background: var(--bg-card); border-left: 1px solid var(--border-subtle); transform: translateX(100%); transition: transform 0.3s ease; overflow-y: auto; display: flex; flex-direction: column; }
.mobile-nav.open .mobile-nav__panel { transform: translateX(0); }
.mobile-nav__header { display: flex; align-items: center; justify-content: space-between; padding: 16px; border-bottom: 1px solid var(--border-subtle); }
.mobile-nav__links { padding: 8px; flex: 1; }
.mobile-nav__link { display: flex; align-items: center; gap: 10px; padding: 12px 16px; border-radius: var(--radius-md); font-size: 15px; font-weight: 500; color: var(--text-secondary); transition: all 0.15s; margin-bottom: 2px; }
.mobile-nav__link:hover, .mobile-nav__link.active { background: var(--bg-elevated); color: var(--text-primary); }
.mobile-nav__footer { border-top: 1px solid var(--border-subtle); }
@media (min-width: 769px) { #mobile-nav-toggle { display: none !important; } }
@media (max-width: 768px)  { #mobile-nav-toggle { display: flex !important; } }
</style>
