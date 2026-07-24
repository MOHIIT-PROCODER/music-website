<?php
/**
 * login.php — Sign In Page
 */
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: /index.php');
    exit;
}
$pageTitle       = 'Sign In — BeatWave';
$pageDescription = 'Sign in to your BeatWave account to access your music, favorites, and playlists.';
include 'components/layout/head.php';
?>

<main class="auth-page" id="main-content">
  <div class="auth-card animate-fade-in" role="main">

    <!-- Logo -->
    <a href="/index.php" class="auth-card__logo" aria-label="BeatWave Home">
      <div class="navbar__logo-icon">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
          <path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/>
        </svg>
      </div>
      Beat<span style="color:var(--accent-primary);">Wave</span>
    </a>

    <h1 class="auth-card__title">Welcome back 👋</h1>
    <p class="auth-card__subtitle">Sign in to continue your music journey</p>

    <!-- Theme toggle inside auth card -->
    <div style="position:absolute; top:24px; right:24px;" title="Toggle day/night mode">
      <label class="theme-toggle" aria-label="Toggle light/dark theme">
        <input type="checkbox" class="theme-toggle__input" id="theme-toggle-auth">
        <span class="theme-toggle__track"><span class="theme-toggle__thumb"></span></span>
      </label>
    </div>

    <!-- Social Sign In -->
    <div style="display:flex; flex-direction:column; gap:var(--space-3); margin-bottom:var(--space-2);">
      <button class="btn btn-secondary btn-full" id="google-signin-btn" aria-label="Continue with Google">
        <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
        Continue with Google
      </button>
    </div>

    <div class="auth-divider">or sign in with email</div>

    <!-- Login Form -->
    <form id="login-form" method="POST" action="/api/auth/login.php" novalidate>
      <input type="hidden" name="csrf_token" value="<?= bin2hex(random_bytes(16)) ?>">

      <div class="form-group">
        <label for="login-email" class="form-label">Email address</label>
        <input type="email" id="login-email" name="email" class="input" placeholder="you@example.com" required autocomplete="email" aria-required="true">
        <div class="form-error" id="login-email-error" role="alert" aria-live="polite"></div>
      </div>

      <div class="form-group">
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:var(--space-2);">
          <label for="login-password" class="form-label" style="margin:0;">Password</label>
          <a href="/forgot-password.php" style="font-size:var(--text-xs); color:var(--accent-primary); font-weight:600;">Forgot password?</a>
        </div>
        <div style="position:relative;">
          <input type="password" id="login-password" name="password" class="input" placeholder="Enter your password" required autocomplete="current-password" aria-required="true" style="padding-right:44px;">
          <button type="button" id="toggle-password-vis" style="position:absolute; right:12px; top:50%; transform:translateY(-50%); color:var(--text-muted);" aria-label="Toggle password visibility">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
          </button>
        </div>
        <div class="form-error" id="login-password-error" role="alert" aria-live="polite"></div>
      </div>

      <div style="display:flex; align-items:center; gap:var(--space-2); margin-bottom:var(--space-6);">
        <input type="checkbox" id="remember-me" name="remember" style="width:16px; height:16px; accent-color:var(--accent-primary);">
        <label for="remember-me" style="font-size:var(--text-sm); color:var(--text-secondary); cursor:pointer;">Remember me for 30 days</label>
      </div>

      <button type="submit" class="btn btn-primary btn-full btn-lg" id="login-submit-btn">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
        Sign In
      </button>

      <div id="login-global-error" class="form-error" style="text-align:center; margin-top:var(--space-3);" role="alert" aria-live="assertive"></div>
    </form>

    <p style="text-align:center; margin-top:var(--space-6); font-size:var(--text-sm); color:var(--text-muted);">
      Don't have an account?
      <a href="/register.php" style="color:var(--accent-primary); font-weight:600;">Create one free</a>
    </p>

  </div>
</main>

<script src="/assets/js/theme.js"></script>
<script>
document.getElementById('toggle-password-vis')?.addEventListener('click', function () {
  const input = document.getElementById('login-password');
  input.type = input.type === 'password' ? 'text' : 'password';
});

document.getElementById('login-form')?.addEventListener('submit', async function (e) {
  e.preventDefault();
  const btn = document.getElementById('login-submit-btn');
  btn.disabled = true;
  btn.innerHTML = '<span class="spinner spinner-sm"></span> Signing in…';
  // Actual AJAX call would go here
  setTimeout(() => { btn.disabled = false; btn.innerHTML = 'Sign In'; }, 2000);
});
</script>
</body>
</html>
