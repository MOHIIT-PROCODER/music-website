<?php
// Dashboard Sidebar Component
$current_page = basename($_SERVER['PHP_SELF']);
?>
<aside class="dashboard-sidebar" style="width: 250px; background: var(--bg-elevated); border-right: 1px solid var(--border-default); height: 100vh; position: sticky; top: 0; padding: var(--space-4) 0; display: flex; flex-direction: column;">
    <div style="padding: 0 var(--space-4) var(--space-6);">
        <a href="/index.php" class="auth-card__logo" aria-label="BeatWave Home" style="font-size: 1.5rem; justify-content: flex-start;">
            <div class="navbar__logo-icon" style="width: 28px; height: 28px;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>
            </div>
            Beat<span style="color:var(--accent-primary);">Wave</span>
        </a>
    </div>
    <nav style="flex: 1; overflow-y: auto; padding: 0 var(--space-3);">
        <div style="font-size: var(--text-xs); font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: var(--text-muted); margin: var(--space-4) var(--space-3) var(--space-2);">Menu</div>
        <a href="index.php" class="nav-item <?= $current_page == 'index.php' ? 'active' : '' ?>" style="display: flex; align-items: center; gap: var(--space-3); padding: var(--space-2) var(--space-3); border-radius: var(--radius-md); color: <?= $current_page == 'index.php' ? 'var(--accent-primary)' : 'var(--text-secondary)' ?>; font-weight: 500; text-decoration: none; margin-bottom: 4px; background: <?= $current_page == 'index.php' ? 'rgba(108,71,255,0.1)' : 'transparent' ?>;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
            Overview
        </a>
        <a href="music.php" class="nav-item <?= $current_page == 'music.php' ? 'active' : '' ?>" style="display: flex; align-items: center; gap: var(--space-3); padding: var(--space-2) var(--space-3); border-radius: var(--radius-md); color: <?= $current_page == 'music.php' ? 'var(--accent-primary)' : 'var(--text-secondary)' ?>; font-weight: 500; text-decoration: none; margin-bottom: 4px; background: <?= $current_page == 'music.php' ? 'rgba(108,71,255,0.1)' : 'transparent' ?>;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>
            My Music
        </a>
        <a href="albums.php" class="nav-item <?= $current_page == 'albums.php' ? 'active' : '' ?>" style="display: flex; align-items: center; gap: var(--space-3); padding: var(--space-2) var(--space-3); border-radius: var(--radius-md); color: <?= $current_page == 'albums.php' ? 'var(--accent-primary)' : 'var(--text-secondary)' ?>; font-weight: 500; text-decoration: none; margin-bottom: 4px; background: <?= $current_page == 'albums.php' ? 'rgba(108,71,255,0.1)' : 'transparent' ?>;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"/><circle cx="12" cy="12" r="3"/><line x1="12" y1="12" x2="12" y2="12.01"/></svg>
            Albums
        </a>
        <a href="analytics.php" class="nav-item <?= $current_page == 'analytics.php' ? 'active' : '' ?>" style="display: flex; align-items: center; gap: var(--space-3); padding: var(--space-2) var(--space-3); border-radius: var(--radius-md); color: <?= $current_page == 'analytics.php' ? 'var(--accent-primary)' : 'var(--text-secondary)' ?>; font-weight: 500; text-decoration: none; margin-bottom: 4px; background: <?= $current_page == 'analytics.php' ? 'rgba(108,71,255,0.1)' : 'transparent' ?>;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
            Analytics
        </a>
        
        <div style="font-size: var(--text-xs); font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: var(--text-muted); margin: var(--space-6) var(--space-3) var(--space-2);">Settings</div>
        <a href="profile.php" class="nav-item <?= $current_page == 'profile.php' ? 'active' : '' ?>" style="display: flex; align-items: center; gap: var(--space-3); padding: var(--space-2) var(--space-3); border-radius: var(--radius-md); color: <?= $current_page == 'profile.php' ? 'var(--accent-primary)' : 'var(--text-secondary)' ?>; font-weight: 500; text-decoration: none; margin-bottom: 4px; background: <?= $current_page == 'profile.php' ? 'rgba(108,71,255,0.1)' : 'transparent' ?>;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            Profile
        </a>
    </nav>
    <div style="padding: var(--space-4);">
        <a href="/api/auth/logout.php" class="btn btn-secondary btn-full" style="justify-content: flex-start; background: transparent; border-color: var(--border-subtle); color: var(--text-secondary);">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
            Sign Out
        </a>
    </div>
</aside>
