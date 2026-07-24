<?php
/**
 * footer.php — Site Footer
 */
?>
<footer class="footer" role="contentinfo">
  <div class="container">
    <div class="footer__grid">

      <!-- Brand -->
      <div class="footer__brand">
        <a href="/index.php" class="logo" aria-label="BeatWave Home">
          <div class="navbar__logo-icon" aria-hidden="true">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
              <path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/>
            </svg>
          </div>
          <span class="navbar__logo-text">Beat<span>Wave</span></span>
        </a>
        <p>Your ultimate destination for discovering, streaming, and downloading the best music from around the world. Powered by artists. Built for fans.</p>
        <div class="footer__socials" role="list" aria-label="Social media links">
          <a href="#" class="footer__social-btn" role="listitem" aria-label="Twitter" title="Twitter">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.742l7.73-8.835L1.254 2.25H8.08l4.253 5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
          </a>
          <a href="#" class="footer__social-btn" role="listitem" aria-label="Instagram" title="Instagram">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
          </a>
          <a href="#" class="footer__social-btn" role="listitem" aria-label="YouTube" title="YouTube">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M22.54 6.42a2.78 2.78 0 00-1.95-1.95C18.88 4 12 4 12 4s-6.88 0-8.59.47A2.78 2.78 0 001.46 6.42 29 29 0 001 12a29 29 0 00.46 5.58 2.78 2.78 0 001.95 1.95C5.12 20 12 20 12 20s6.88 0 8.59-.47a2.78 2.78 0 001.95-1.95A29 29 0 0023 12a29 29 0 00-.46-5.58zM9.75 15.02V8.98L15.5 12l-5.75 3.02z"/></svg>
          </a>
          <a href="#" class="footer__social-btn" role="listitem" aria-label="TikTok" title="TikTok">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.31 6.31 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V8.93a8.16 8.16 0 004.77 1.52V7.01a4.85 4.85 0 01-1-.32z"/></svg>
          </a>
        </div>
      </div>

      <!-- Explore -->
      <div>
        <h3 class="footer__col-title">Explore</h3>
        <nav class="footer__links" aria-label="Explore links">
          <a href="/trending.php"   class="footer__link">Trending Songs</a>
          <a href="/latest.php"     class="footer__link">Latest Releases</a>
          <a href="/artists.php"    class="footer__link">Artists</a>
          <a href="/albums.php"     class="footer__link">Albums</a>
          <a href="/categories.php" class="footer__link">Categories</a>
          <a href="/explore.php"    class="footer__link">Discover</a>
        </nav>
      </div>

      <!-- Account -->
      <div>
        <h3 class="footer__col-title">Account</h3>
        <nav class="footer__links" aria-label="Account links">
          <a href="/login.php"         class="footer__link">Sign In</a>
          <a href="/register.php"      class="footer__link">Create Account</a>
          <a href="/dashboard/index.php" class="footer__link">Artist Dashboard</a>
          <a href="/dashboard/upload.php" class="footer__link">Upload Music</a>
          <a href="/forgot-password.php" class="footer__link">Forgot Password</a>
        </nav>
      </div>

      <!-- Company -->
      <div>
        <h3 class="footer__col-title">Company</h3>
        <nav class="footer__links" aria-label="Company links">
          <a href="/about.php"     class="footer__link">About Us</a>
          <a href="/contact.php"   class="footer__link">Contact</a>
          <a href="/privacy.php"   class="footer__link">Privacy Policy</a>
          <a href="/terms.php"     class="footer__link">Terms of Service</a>
          <a href="/copyright.php" class="footer__link">Copyright</a>
          <a href="/report.php"    class="footer__link">Report Issue</a>
        </nav>
      </div>

    </div>

    <!-- Bottom Bar -->
    <div class="footer__bottom">
      <p class="footer__copy">
        © <?= date('Y') ?> BeatWave. All rights reserved. Made with ♪ for music lovers.
      </p>
      <div class="footer__legal">
        <a href="/privacy.php">Privacy</a>
        <a href="/terms.php">Terms</a>
        <a href="/copyright.php">Copyright</a>
      </div>
    </div>
  </div>
</footer>
