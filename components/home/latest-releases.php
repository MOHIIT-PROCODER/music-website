<?php
// Component: components/home/latest-releases.php
$latestReleases = [
  ['id'=>7, 'title'=>'Crystal Clear',  'artist'=>'Ava Monroe', 'cover'=>'https://picsum.photos/seed/n1/300/300', 'date'=>'Today'],
  ['id'=>8, 'title'=>'Starfall',       'artist'=>'Zion Cole',  'cover'=>'https://picsum.photos/seed/n2/300/300', 'date'=>'Today'],
  ['id'=>9, 'title'=>'Purple Rain',    'artist'=>'Kylie Dawn',  'cover'=>'https://picsum.photos/seed/n3/300/300', 'date'=>'Yesterday'],
  ['id'=>10,'title'=>'Breathe Again',  'artist'=>'Marcus J.',   'cover'=>'https://picsum.photos/seed/n4/300/300', 'date'=>'2 days ago'],
  ['id'=>11,'title'=>'Tokyo Drift',    'artist'=>'Riku',        'cover'=>'https://picsum.photos/seed/n5/300/300', 'date'=>'3 days ago'],
];
?>
<section class="section-sm" aria-labelledby="latest-title">
  <div class="section-header">
    <div>
      <div class="hero__eyebrow" style="margin-bottom:var(--space-2);">✨ Fresh Drops</div>
      <h2 class="heading-2" id="latest-title">New Releases</h2>
    </div>
    <a href="/latest.php" class="btn btn-ghost btn-sm">View all</a>
  </div>
  <div class="scroll-row" role="list">
    <?php foreach($latestReleases as $s): ?>
    <div class="song-card reveal" style="width:180px;" tabindex="0"
         data-play-song data-song-id="<?= $s['id'] ?>"
         data-song-title="<?= htmlspecialchars($s['title']) ?>"
         data-song-artist="<?= htmlspecialchars($s['artist']) ?>"
         data-song-cover="<?= htmlspecialchars($s['cover']) ?>">
      <div class="song-card__cover">
        <img src="<?= htmlspecialchars($s['cover']) ?>" alt="<?= htmlspecialchars($s['title']) ?>" loading="lazy">
        <div class="song-card__play-overlay"><button class="btn-play" tabindex="-1"><svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><polygon points="5,3 19,12 5,21"/></svg></button></div>
        <div style="position:absolute;top:8px;left:8px;"><span class="badge" style="background:rgba(0,0,0,0.6);color:#fff;backdrop-filter:blur(4px);"><?= $s['date'] ?></span></div>
      </div>
      <div class="song-card__title truncate"><?= htmlspecialchars($s['title']) ?></div>
      <div class="song-card__artist truncate"><?= htmlspecialchars($s['artist']) ?></div>
    </div>
    <?php endforeach; ?>
  </div>
</section>
