<?php
/**
 * Component: components/music/song-card.php
 * Expects $song array
 */
?>
<div class="song-card reveal" tabindex="0"
     data-play-song
     data-song-id="<?= $song['id'] ?? '' ?>"
     data-song-title="<?= htmlspecialchars($song['title'] ?? 'Unknown Title') ?>"
     data-song-artist="<?= htmlspecialchars($song['artist'] ?? 'Unknown Artist') ?>"
     data-song-cover="<?= htmlspecialchars($song['cover'] ?? '') ?>"
     data-song-src="<?= htmlspecialchars($song['src'] ?? '') ?>">
  <div class="song-card__cover">
    <img src="<?= htmlspecialchars($song['cover'] ?? 'https://picsum.photos/300/300') ?>" alt="Cover" loading="lazy">
    <div class="song-card__play-overlay"><button class="btn-play" tabindex="-1"><svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><polygon points="5,3 19,12 5,21"/></svg></button></div>
    <?php if(isset($song['date'])): ?>
    <div style="position:absolute; top:8px; left:8px;"><span class="badge" style="background:rgba(0,0,0,0.6); color:#fff; backdrop-filter:blur(4px);"><?= htmlspecialchars($song['date']) ?></span></div>
    <?php endif; ?>
  </div>
  <div class="song-card__title truncate"><?= htmlspecialchars($song['title'] ?? 'Unknown Title') ?></div>
  <div class="song-card__artist truncate"><?= htmlspecialchars($song['artist'] ?? 'Unknown Artist') ?></div>
</div>
