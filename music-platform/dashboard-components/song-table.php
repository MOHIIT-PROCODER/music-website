<?php
// Dashboard Song Table Component
// Expects: $songs array
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
                <?php if (!empty($songs)): foreach ($songs as $song): ?>
                <tr style="border-bottom: 1px solid var(--border-subtle); transition: background 0.2s;">
                    <td style="padding: var(--space-3) var(--space-5);">
                        <div style="display: flex; align-items: center; gap: var(--space-3);">
                            <img src="<?= htmlspecialchars($song['cover'] ?? '') ?>" alt="Cover" style="width: 40px; height: 40px; border-radius: var(--radius-sm); object-fit: cover;">
                            <div>
                                <div style="font-weight: 600; color: var(--text-primary);"><?= htmlspecialchars($song['title'] ?? '') ?></div>
                                <div style="font-size: var(--text-xs); color: var(--text-muted);"><?= htmlspecialchars($song['date'] ?? '') ?></div>
                            </div>
                        </div>
                    </td>
                    <td style="padding: var(--space-3) var(--space-5);">
                        <?php $status = $song['status'] ?? 'Published'; ?>
                        <span class="badge" style="background: <?= $status == 'Published' ? 'rgba(39, 174, 96, 0.1)' : 'rgba(241, 196, 15, 0.1)' ?>; color: <?= $status == 'Published' ? 'var(--success)' : 'var(--warning)' ?>;">
                            <?= htmlspecialchars($status) ?>
                        </span>
                    </td>
                    <td style="padding: var(--space-3) var(--space-5); font-variant-numeric: tabular-nums;"><?= htmlspecialchars($song['plays'] ?? '0') ?></td>
                    <td style="padding: var(--space-3) var(--space-5); font-variant-numeric: tabular-nums;">$<?= htmlspecialchars($song['revenue'] ?? '0.00') ?></td>
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
