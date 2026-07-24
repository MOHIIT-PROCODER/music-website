<?php
// Dashboard Stat Card Component
// Expects: $title, $value, $trend, $trendUp (bool), $icon
?>
<div class="stat-card" style="background: var(--bg-elevated); border: 1px solid var(--border-default); border-radius: var(--radius-lg); padding: var(--space-5); display: flex; flex-direction: column; gap: var(--space-3);">
    <div style="display: flex; align-items: center; justify-content: space-between;">
        <h3 style="font-size: var(--text-sm); font-weight: 500; color: var(--text-secondary);"><?= htmlspecialchars($title ?? 'Stat') ?></h3>
        <div style="width: 36px; height: 36px; border-radius: var(--radius-md); background: rgba(108,71,255,0.1); color: var(--accent-primary); display: flex; align-items: center; justify-content: center;">
            <?= $icon ?? '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>' ?>
        </div>
    </div>
    <div style="font-size: 2rem; font-weight: 700; font-family: var(--font-display);"><?= htmlspecialchars($value ?? '0') ?></div>
    <?php if (isset($trend)): ?>
    <div style="display: flex; align-items: center; gap: 4px; font-size: var(--text-xs); font-weight: 500; color: <?= $trendUp ? 'var(--success)' : 'var(--error)' ?>;">
        <?php if ($trendUp): ?>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
        <?php else: ?>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"/><polyline points="17 18 23 18 23 12"/></svg>
        <?php endif; ?>
        <?= htmlspecialchars($trend) ?> vs last month
    </div>
    <?php endif; ?>
</div>
