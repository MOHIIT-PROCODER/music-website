<?php
/**
 * Component: components/artist/artist-card.php
 * Expects $artist array
 */
?>
<div class="artist-card reveal" tabindex="0" onclick="window.location='/artist.php?id=<?= $artist['id'] ?? '' ?>'">
  <img class="artist-card__avatar" src="<?= htmlspecialchars($artist['avatar'] ?? 'https://picsum.photos/200/200') ?>" alt="<?= htmlspecialchars($artist['name'] ?? 'Artist') ?>" loading="lazy">
  <div>
    <div class="artist-card__name"><?= htmlspecialchars($artist['name'] ?? 'Unknown Artist') ?></div>
    <?php if(isset($artist['followers'])): ?>
    <div class="artist-card__followers"><?= htmlspecialchars($artist['followers']) ?> followers</div>
    <?php endif; ?>
  </div>
  <button class="btn-follow btn-sm" onclick="event.stopPropagation(); this.classList.toggle('following'); this.textContent = this.classList.contains('following') ? 'Following' : 'Follow';">Follow</button>
</div>
