<?php
/**
 * register.php — Create Account Page
 */
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: /index.php');
    exit;
}
$pageTitle       = 'Create Account — BeatWave';
$pageDescription = 'Join BeatWave for free and discover millions of songs, follow your favorite artists, and more.';
include 'components/layout/head.php';
?>

<main class="auth-page" id="main-content">
  <div class="auth-card animate-fade-in" style="max-width: 500px;" role="main">

    <!-- Logo -->
    <a href="/index.php" class="auth-card__logo" aria-label="BeatWave Home">
      <div class="navbar__logo-icon">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
          <path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/>
        </svg>
      </div>
      Beat<span style="color:var(--accent-primary);">Wave</span>
    </a>

    <!-- Theme toggle -->
    <div style="position:absolute; top:24px; right:24px;">
      <label class="theme-toggle" aria-label="Toggle light/dark theme">
        <input type="checkbox" class="theme-toggle__input" id="theme-toggle-reg">
        <span class="theme-toggle__track"><span class="theme-toggle__thumb"></span></span>
      </label>
    </div>

    <h1 class="auth-card__title">Join BeatWave 🎵</h1>
    <p class="auth-card__subtitle">Free forever. No credit card needed.</p>

    <!-- Social -->
    <button class="btn btn-secondary btn-full" id="google-register-btn" aria-label="Continue with Google" style="margin-bottom:var(--space-2);">
      <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
      Continue with Google
    </button>

    <div class="auth-divider">or create with email</div>

    <form id="register-form" method="POST" action="/api/auth/register.php" novalidate>
      <input type="hidden" name="csrf_token" value="<?= bin2hex(random_bytes(16)) ?>">

      <div style="display:grid; grid-template-columns:1fr 1fr; gap:var(--space-4);">
        <div class="form-group">
          <label for="reg-fname" class="form-label">First Name</label>
          <input type="text" id="reg-fname" name="first_name" class="input" placeholder="Alex" required autocomplete="given-name">
          <div class="form-error" id="reg-fname-error" role="alert" aria-live="polite"></div>
        </div>
        <div class="form-group">
          <label for="reg-lname" class="form-label">Last Name</label>
          <input type="text" id="reg-lname" name="last_name" class="input" placeholder="Johnson" required autocomplete="family-name">
        </div>
      </div>

      <div class="form-group">
        <label for="reg-username" class="form-label">Username</label>
        <div style="position:relative;">
          <span style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:var(--text-muted);font-weight:500;">@</span>
          <input type="text" id="reg-username" name="username" class="input" placeholder="cooluser" required autocomplete="username" style="padding-left:28px;" pattern="[a-zA-Z0-9_]+" title="Only letters, numbers, underscores">
        </div>
        <div class="form-error" id="reg-username-error" role="alert" aria-live="polite"></div>
      </div>

      <div class="form-group">
        <label for="reg-email" class="form-label">Email address</label>
        <input type="email" id="reg-email" name="email" class="input" placeholder="you@example.com" required autocomplete="email">
        <div class="form-error" id="reg-email-error" role="alert" aria-live="polite"></div>
      </div>

      <div class="form-group">
        <label for="reg-password" class="form-label">Password</label>
        <div style="position:relative;">
          <input type="password" id="reg-password" name="password" class="input" placeholder="At least 8 characters" required autocomplete="new-password" style="padding-right:44px;" minlength="8">
          <button type="button" id="toggle-reg-password" style="position:absolute;right:12px;top:50%;transform:translateY(-50%);color:var(--text-muted);" aria-label="Toggle password visibility">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
          </button>
        </div>
        <!-- Password strength indicator -->
        <div id="password-strength" style="display:flex; gap:4px; margin-top:6px;" aria-label="Password strength indicator">
          <div class="strength-bar" style="height:3px;flex:1;border-radius:99px;background:var(--border-subtle);transition:background 0.3s;"></div>
          <div class="strength-bar" style="height:3px;flex:1;border-radius:99px;background:var(--border-subtle);transition:background 0.3s;"></div>
          <div class="strength-bar" style="height:3px;flex:1;border-radius:99px;background:var(--border-subtle);transition:background 0.3s;"></div>
          <div class="strength-bar" style="height:3px;flex:1;border-radius:99px;background:var(--border-subtle);transition:background 0.3s;"></div>
        </div>
        <div class="form-error" id="reg-password-error" role="alert" aria-live="polite"></div>
      </div>

      <!-- Role selection -->
      <div class="form-group">
        <label class="form-label">I am a…</label>
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:var(--space-3);">
          <label style="display:flex; align-items:center; gap:var(--space-3); padding:var(--space-4); border:1.5px solid var(--border-default); border-radius:var(--radius-md); cursor:pointer; transition:all 0.15s;" id="role-listener-label">
            <input type="radio" name="role" value="listener" checked style="accent-color:var(--accent-primary);" aria-describedby="role-listener-desc">
            <div>
              <div style="font-weight:600; font-size:var(--text-sm);">🎧 Listener</div>
              <div id="role-listener-desc" style="font-size:var(--text-xs); color:var(--text-muted);">Discover & enjoy music</div>
            </div>
          </label>
          <label style="display:flex; align-items:center; gap:var(--space-3); padding:var(--space-4); border:1.5px solid var(--border-default); border-radius:var(--radius-md); cursor:pointer; transition:all 0.15s;" id="role-artist-label">
            <input type="radio" name="role" value="artist" style="accent-color:var(--accent-primary);" aria-describedby="role-artist-desc">
            <div>
              <div style="font-weight:600; font-size:var(--text-sm);">🎤 Artist</div>
              <div id="role-artist-desc" style="font-size:var(--text-xs); color:var(--text-muted);">Upload & share music</div>
            </div>
          </label>
        </div>
      </div>

      <div style="display:flex; align-items:flex-start; gap:var(--space-2); margin-bottom:var(--space-6);">
        <input type="checkbox" id="reg-terms" name="terms" required style="width:16px;height:16px;margin-top:2px;accent-color:var(--accent-primary);">
        <label for="reg-terms" style="font-size:var(--text-sm); color:var(--text-secondary); line-height:1.5; cursor:pointer;">
          I agree to the <a href="/terms.php" style="color:var(--accent-primary);font-weight:600;">Terms of Service</a> and <a href="/privacy.php" style="color:var(--accent-primary);font-weight:600;">Privacy Policy</a>
        </label>
      </div>

      <button type="submit" class="btn btn-primary btn-full btn-lg" id="register-submit-btn">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/></svg>
        Create My Account
      </button>
    </form>

    <p style="text-align:center; margin-top:var(--space-6); font-size:var(--text-sm); color:var(--text-muted);">
      Already have an account?
      <a href="/login.php" style="color:var(--accent-primary); font-weight:600;">Sign in</a>
    </p>
  </div>
</main>

<script src="/assets/js/theme.js"></script>
<script>
// Password visibility toggle
document.getElementById('toggle-reg-password')?.addEventListener('click', function () {
  const input = document.getElementById('reg-password');
  input.type = input.type === 'password' ? 'text' : 'password';
});

// Password strength meter
document.getElementById('reg-password')?.addEventListener('input', function () {
  const val = this.value;
  const bars = document.querySelectorAll('.strength-bar');
  let strength = 0;
  if (val.length >= 8)   strength++;
  if (/[A-Z]/.test(val)) strength++;
  if (/[0-9]/.test(val)) strength++;
  if (/[^A-Za-z0-9]/.test(val)) strength++;
  const colors = ['#e74c3c', '#f39c12', '#f1c40f', '#27ae60'];
  bars.forEach((bar, i) => {
    bar.style.background = i < strength ? colors[strength - 1] : 'var(--border-subtle)';
  });
});

// Role label highlight
document.querySelectorAll('input[name="role"]').forEach(function (radio) {
  radio.addEventListener('change', function () {
    document.querySelectorAll('input[name="role"]').forEach(r => {
      r.closest('label').style.borderColor = 'var(--border-default)';
      r.closest('label').style.background = '';
    });
    this.closest('label').style.borderColor = 'var(--accent-primary)';
    this.closest('label').style.background = 'rgba(108,71,255,0.08)';
  });
});
// Set initial
document.querySelector('input[name="role"]:checked')?.dispatchEvent(new Event('change'));
</script>
</body>
</html>
