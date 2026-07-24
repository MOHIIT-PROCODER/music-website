<?php
/**
 * Component: components/artist/artist-songs.php
 * Expects $artistSongs array to be available in scope
 */
?>
<div class="artist-songs-component">
  <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:var(--space-4);">
    <h3 class="heading-3">Popular Tracks</h3>
    <button class="btn btn-ghost btn-sm">View All</button>
  </div>
  
  <div role="list" aria-label="Popular tracks">
    <?php if(!empty($artistSongs)): foreach($artistSongs as $i => $song): ?>
      <div class="song-row reveal" style="grid-template-columns: 40px 1fr auto auto;" tabindex="0" 
           data-play-song 
           data-song-id="<?= $song['id'] ?? $i ?>" 
           data-song-title="<?= htmlspecialchars($song['title'] ?? 'Unknown Title') ?>" 
           data-song-artist="<?= htmlspecialchars($song['artist'] ?? 'Unknown Artist') ?>" 
           data-song-cover="<?= htmlspecialchars($song['cover'] ?? '') ?>">
        <div style="color:var(--text-muted); font-size:var(--text-sm); text-align:center;"><?= $i + 1 ?></div>
        <div>
          <div class="song-row__title"><?= htmlspecialchars($song['title'] ?? 'Unknown Title') ?></div>
          <div class="song-row__artist" style="font-size:var(--text-xs);"><?= htmlspecialchars($song['plays'] ?? '0') ?> plays</div>
        </div>
        <div class="song-row__duration" style="margin-right:var(--space-3);"><?= htmlspecialchars($song['duration'] ?? '0:00') ?></div>
        <div class="song-row__actions">
          <button class="btn-favorite" aria-label="Like"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg></button>
          <button class="btn-icon-round btn-sm" aria-label="More options"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg></button>
        </div>
      </div>
    <?php endforeach; else: ?>
      <p style="color:var(--text-muted);">No tracks available for this artist yet.</p>
    <?php endif; ?>
  </div>
</div>
