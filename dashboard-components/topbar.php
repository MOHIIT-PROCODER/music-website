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
