<?php
// Component: components/home/popular-today.php
$popular = [
  ['id'=>1,'title'=>'Midnight Dreams', 'artist'=>'Luna Sky',   'cover'=>'https://picsum.photos/seed/p1/300/300','duration'=>'3:42'],
  ['id'=>2,'title'=>'Electric Feel',   'artist'=>'Nova Beats', 'cover'=>'https://picsum.photos/seed/p2/300/300','duration'=>'4:01'],
  ['id'=>3,'title'=>'Lost in the City','artist'=>'Echo Rivers','cover'=>'https://picsum.photos/seed/p3/300/300','duration'=>'3:28'],
  ['id'=>4,'title'=>'Golden Hour',     'artist'=>'Sunset Vibes','cover'=>'https://picsum.photos/seed/p4/300/300','duration'=>'4:15'],
];
?>
<section class="section-sm" aria-labelledby="popular-title">
  <div class="section-header">
    <div>
      <div class="hero__eyebrow" style="margin-bottom:var(--space-2);">⚡ Hot Right Now</div>
      <h2 class="heading-2" id="popular-title">Popular Today</h2>
    </div>
    <a href="/trending.php" class="btn btn-ghost btn-sm">View all</a>
  </div>
  <div class="grid-songs" role="list">
    <?php foreach($popular as $s): ?>
    <div class="song-card reveal" tabindex="0"
         data-play-song data-song-id="<?= $s['id'] ?>"
         data-song-title="<?= htmlspecialchars($s['title']) ?>"
         data-song-artist="<?= htmlspecialchars($s['artist']) ?>"
         data-song-cover="<?= htmlspecialchars($s['cover']) ?>">
      <div class="song-card__cover">
        <img src="<?= htmlspecialchars($s['cover']) ?>" alt="<?= htmlspecialchars($s['title']) ?>" loading="lazy">
        <div class="song-card__play-overlay"><button class="btn-play" tabindex="-1"><svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><polygon points="5,3 19,12 5,21"/></svg></button></div>
      </div>
      <div class="song-card__title truncate"><?= htmlspecialchars($s['title']) ?></div>
      <div class="song-card__artist truncate"><?= htmlspecialchars($s['artist']) ?></div>
    </div>
    <?php endforeach; ?>
  </div>
</section>
