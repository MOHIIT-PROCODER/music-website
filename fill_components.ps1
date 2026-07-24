$components = @{
    "dashboard-components/sidebar.php" = @"
<?php
// Dashboard Sidebar Component
`$current_page = basename(`$_SERVER['PHP_SELF']);
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
        <a href="index.php" class="nav-item <?= `$current_page == 'index.php' ? 'active' : '' ?>" style="display: flex; align-items: center; gap: var(--space-3); padding: var(--space-2) var(--space-3); border-radius: var(--radius-md); color: <?= `$current_page == 'index.php' ? 'var(--accent-primary)' : 'var(--text-secondary)' ?>; font-weight: 500; text-decoration: none; margin-bottom: 4px; background: <?= `$current_page == 'index.php' ? 'rgba(108,71,255,0.1)' : 'transparent' ?>;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
            Overview
        </a>
        <a href="music.php" class="nav-item <?= `$current_page == 'music.php' ? 'active' : '' ?>" style="display: flex; align-items: center; gap: var(--space-3); padding: var(--space-2) var(--space-3); border-radius: var(--radius-md); color: <?= `$current_page == 'music.php' ? 'var(--accent-primary)' : 'var(--text-secondary)' ?>; font-weight: 500; text-decoration: none; margin-bottom: 4px; background: <?= `$current_page == 'music.php' ? 'rgba(108,71,255,0.1)' : 'transparent' ?>;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>
            My Music
        </a>
        <a href="albums.php" class="nav-item <?= `$current_page == 'albums.php' ? 'active' : '' ?>" style="display: flex; align-items: center; gap: var(--space-3); padding: var(--space-2) var(--space-3); border-radius: var(--radius-md); color: <?= `$current_page == 'albums.php' ? 'var(--accent-primary)' : 'var(--text-secondary)' ?>; font-weight: 500; text-decoration: none; margin-bottom: 4px; background: <?= `$current_page == 'albums.php' ? 'rgba(108,71,255,0.1)' : 'transparent' ?>;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"/><circle cx="12" cy="12" r="3"/><line x1="12" y1="12" x2="12" y2="12.01"/></svg>
            Albums
        </a>
        <a href="analytics.php" class="nav-item <?= `$current_page == 'analytics.php' ? 'active' : '' ?>" style="display: flex; align-items: center; gap: var(--space-3); padding: var(--space-2) var(--space-3); border-radius: var(--radius-md); color: <?= `$current_page == 'analytics.php' ? 'var(--accent-primary)' : 'var(--text-secondary)' ?>; font-weight: 500; text-decoration: none; margin-bottom: 4px; background: <?= `$current_page == 'analytics.php' ? 'rgba(108,71,255,0.1)' : 'transparent' ?>;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
            Analytics
        </a>
        
        <div style="font-size: var(--text-xs); font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: var(--text-muted); margin: var(--space-6) var(--space-3) var(--space-2);">Settings</div>
        <a href="profile.php" class="nav-item <?= `$current_page == 'profile.php' ? 'active' : '' ?>" style="display: flex; align-items: center; gap: var(--space-3); padding: var(--space-2) var(--space-3); border-radius: var(--radius-md); color: <?= `$current_page == 'profile.php' ? 'var(--accent-primary)' : 'var(--text-secondary)' ?>; font-weight: 500; text-decoration: none; margin-bottom: 4px; background: <?= `$current_page == 'profile.php' ? 'rgba(108,71,255,0.1)' : 'transparent' ?>;">
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
"@

    "dashboard-components/topbar.php" = @"
<?php
// Dashboard Topbar Component
?>
<header class="dashboard-topbar" style="height: 70px; background: var(--bg-base); border-bottom: 1px solid var(--border-default); display: flex; align-items: center; justify-content: space-between; padding: 0 var(--space-6); position: sticky; top: 0; z-index: 40;">
    <div style="display: flex; align-items: center; gap: var(--space-4);">
        <div class="search-input-wrap" style="width: 300px;">
            <svg class="search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
            <input type="search" class="input" placeholder="Search your music, analytics..." style="border-radius: 99px; background: var(--bg-elevated); border: none; height: 38px;">
        </div>
    </div>
    <div style="display: flex; align-items: center; gap: var(--space-4);">
        <a href="upload.php" class="btn btn-primary btn-sm" style="border-radius: 99px;">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
            Upload Music
        </a>
        
        <label class="theme-toggle" aria-label="Toggle light/dark theme" title="Toggle Theme" style="margin-right: var(--space-2);">
            <input type="checkbox" class="theme-toggle__input" id="dashboard-theme-toggle">
            <span class="theme-toggle__track"><span class="theme-toggle__thumb"></span></span>
        </label>
        
        <button class="btn-icon-round" aria-label="Notifications" style="position: relative;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
            <span style="position: absolute; top: 4px; right: 6px; width: 8px; height: 8px; background: var(--accent-primary); border-radius: 50%; border: 2px solid var(--bg-base);"></span>
        </button>
        <div style="width: 36px; height: 36px; border-radius: 50%; overflow: hidden; border: 2px solid var(--border-default); cursor: pointer;">
            <img src="https://picsum.photos/100" alt="Artist Profile" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
    </div>
</header>
"@

    "dashboard-components/stat-card.php" = @"
<?php
// Dashboard Stat Card Component
// Expects: `$title, `$value, `$trend, `$trendUp (bool), `$icon
?>
<div class="stat-card" style="background: var(--bg-elevated); border: 1px solid var(--border-default); border-radius: var(--radius-lg); padding: var(--space-5); display: flex; flex-direction: column; gap: var(--space-3);">
    <div style="display: flex; align-items: center; justify-content: space-between;">
        <h3 style="font-size: var(--text-sm); font-weight: 500; color: var(--text-secondary);"><?= htmlspecialchars(`$title ?? 'Stat') ?></h3>
        <div style="width: 36px; height: 36px; border-radius: var(--radius-md); background: rgba(108,71,255,0.1); color: var(--accent-primary); display: flex; align-items: center; justify-content: center;">
            <?= `$icon ?? '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>' ?>
        </div>
    </div>
    <div style="font-size: 2rem; font-weight: 700; font-family: var(--font-display);"><?= htmlspecialchars(`$value ?? '0') ?></div>
    <?php if (isset(`$trend)): ?>
    <div style="display: flex; align-items: center; gap: 4px; font-size: var(--text-xs); font-weight: 500; color: <?= `$trendUp ? 'var(--success)' : 'var(--error)' ?>;">
        <?php if (`$trendUp): ?>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
        <?php else: ?>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"/><polyline points="17 18 23 18 23 12"/></svg>
        <?php endif; ?>
        <?= htmlspecialchars(`$trend) ?> vs last month
    </div>
    <?php endif; ?>
</div>
"@

    "dashboard-components/song-table.php" = @"
<?php
// Dashboard Song Table Component
// Expects: `$songs array
?>
<div style="background: var(--bg-elevated); border: 1px solid var(--border-default); border-radius: var(--radius-lg); overflow: hidden;">
    <div style="padding: var(--space-4) var(--space-5); border-bottom: 1px solid var(--border-subtle); display: flex; align-items: center; justify-content: space-between;">
        <h3 class="heading-4" style="margin: 0;">Recent Tracks</h3>
        <a href="music.php" class="btn btn-ghost btn-sm">View All</a>
    </div>
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: var(--text-sm);">
            <thead>
                <tr style="border-bottom: 1px solid var(--border-subtle); color: var(--text-muted);">
                    <th style="padding: var(--space-3) var(--space-5); font-weight: 500;">Track</th>
                    <th style="padding: var(--space-3) var(--space-5); font-weight: 500;">Status</th>
                    <th style="padding: var(--space-3) var(--space-5); font-weight: 500;">Plays</th>
                    <th style="padding: var(--space-3) var(--space-5); font-weight: 500;">Revenue</th>
                    <th style="padding: var(--space-3) var(--space-5); font-weight: 500; text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty(`$songs)): foreach (`$songs as `$song): ?>
                <tr style="border-bottom: 1px solid var(--border-subtle); transition: background 0.2s;">
                    <td style="padding: var(--space-3) var(--space-5);">
                        <div style="display: flex; align-items: center; gap: var(--space-3);">
                            <img src="<?= htmlspecialchars(`$song['cover'] ?? '') ?>" alt="Cover" style="width: 40px; height: 40px; border-radius: var(--radius-sm); object-fit: cover;">
                            <div>
                                <div style="font-weight: 600; color: var(--text-primary);"><?= htmlspecialchars(`$song['title'] ?? '') ?></div>
                                <div style="font-size: var(--text-xs); color: var(--text-muted);"><?= htmlspecialchars(`$song['date'] ?? '') ?></div>
                            </div>
                        </div>
                    </td>
                    <td style="padding: var(--space-3) var(--space-5);">
                        <?php `$status = `$song['status'] ?? 'Published'; ?>
                        <span class="badge" style="background: <?= `$status == 'Published' ? 'rgba(39, 174, 96, 0.1)' : 'rgba(241, 196, 15, 0.1)' ?>; color: <?= `$status == 'Published' ? 'var(--success)' : 'var(--warning)' ?>;">
                            <?= htmlspecialchars(`$status) ?>
                        </span>
                    </td>
                    <td style="padding: var(--space-3) var(--space-5); font-variant-numeric: tabular-nums;"><?= htmlspecialchars(`$song['plays'] ?? '0') ?></td>
                    <td style="padding: var(--space-3) var(--space-5); font-variant-numeric: tabular-nums;">$<?= htmlspecialchars(`$song['revenue'] ?? '0.00') ?></td>
                    <td style="padding: var(--space-3) var(--space-5); text-align: right;">
                        <button class="btn-icon-round btn-sm" aria-label="Edit track"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg></button>
                        <button class="btn-icon-round btn-sm" style="color: var(--error);" aria-label="Delete track"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg></button>
                    </td>
                </tr>
                <?php endforeach; else: ?>
                <tr><td colspan="5" style="padding: var(--space-6); text-align: center; color: var(--text-muted);">No tracks uploaded yet.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
"@
}

foreach (`$kv in `$components.GetEnumerator()) {
    `$path = Join-Path "d:\music website\music-platform" `$kv.Key
    Set-Content -Path `$path -Value `$kv.Value -Encoding UTF8
}
Write-Host "Replaced dashboard components with real code!"
