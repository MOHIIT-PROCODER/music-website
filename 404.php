<?php
/**
 * 404.php — Not Found Error Page
 */
http_response_code(404);
$pageTitle       = '404 — Page Not Found | BeatWave';
$pageDescription = 'The page you are looking for could not be found on BeatWave.';
include 'components/layout/head.php';
?>
<main class="error-page" id="main-content">
  <div style="position:absolute; inset:0; background: radial-gradient(ellipse 60% 60% at 50% 40%, rgba(108,71,255,0.12) 0%, transparent 70%); pointer-events:none;" aria-hidden="true"></div>
  <div style="position:relative; text-align:center; display:flex; flex-direction:column; align-items:center; gap:var(--space-5); animation: fadeIn 0.6s both;">
    <div class="error-page__code" aria-label="Error 404">404</div>
    <div style="font-size:4rem;" aria-hidden="true">🎵</div>
    <h1 class="error-page__title">Track Not Found</h1>
    <p class="error-page__desc">Oops! Looks like this page skipped to a different album. The beat you're looking for doesn't exist here.</p>
    <div style="display:flex; gap:var(--space-4); flex-wrap:wrap; justify-content:center; margin-top:var(--space-4);">
      <a href="/index.php" class="btn btn-primary btn-lg" id="error-home-btn">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        Go Home
      </a>
      <a href="/explore.php" class="btn btn-secondary btn-lg" id="error-explore-btn">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"/></svg>
        Explore Music
      </a>
    </div>
    <!-- Theme toggle -->
    <div style="position:fixed; top:24px; right:24px;" title="Toggle day/night mode">
      <div class="theme-toggle-wrap">
        <span class="theme-toggle-text" aria-hidden="true">Night</span>
        <label class="theme-toggle" aria-label="Toggle light/dark theme">
          <input type="checkbox" class="theme-toggle__input">
          <span class="theme-toggle__track"><span class="theme-toggle__thumb"></span></span>
        </label>
      </div>
    </div>
  </div>
</main>
<script src="/assets/js/theme.js"></script>
</body>
</html>
