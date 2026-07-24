<?php
// Component: components/home/trending.php
$trendingSongs = [
  ['id'=>1,'title'=>'Midnight Dreams','artist'=>'Luna Sky',    'plays'=>'4.2M','cover'=>'https://picsum.photos/seed/t1/300/300','duration'=>'3:42'],
  ['id'=>2,'title'=>'Electric Feel',  'artist'=>'Nova Beats',  'plays'=>'3.8M','cover'=>'https://picsum.photos/seed/t2/300/300','duration'=>'4:01'],
  ['id'=>3,'title'=>'Lost in the City','artist'=>'Echo Rivers','plays'=>'3.1M','cover'=>'https://picsum.photos/seed/t3/300/300','duration'=>'3:28'],
  ['id'=>4,'title'=>'Golden Hour',    'artist'=>'Sunset Vibes','plays'=>'2.9M','cover'=>'https://picsum.photos/seed/t4/300/300','duration'=>'4:15'],
  ['id'=>5,'title'=>'Neon Lights',    'artist'=>'Pulse Wave',  'plays'=>'2.6M','cover'=>'https://picsum.photos/seed/t5/300/300','duration'=>'3:55'],
];
?>
<section class="section-sm" aria-labelledby="trending-title">
  <div class="section-header">
    <div>
      <div class="hero__eyebrow" style="margin-bottom:var(--space-2);">🔥 Chart Toppers</div>
      <h2 class="heading-2" id="trending-title">Trending Now</h2>
    </div>
    <a href="/trending.php" class="btn btn-ghost btn-sm">See all</a>
  </div>
  <div role="list">
    <?php foreach($trendingSongs as $i => $s): ?>
    <div class="song-row reveal" style="grid-template-columns:28px 52px 1fr auto auto;" tabindex="0"
         data-play-song data-song-id="<?= $s['id'] ?>"
         data-song-title="<?= htmlspecialchars($s['title']) ?>"
         data-song-artist="<?= htmlspecialchars($s['artist']) ?>"
         data-song-cover="<?= htmlspecialchars($s['cover']) ?>">
      <span class="rank-number <?= $i<3?'text-gradient':'' ?>"><?= $i+1 ?></span>
      <img class="song-row__cover" src="<?= htmlspecialchars($s['cover']) ?>" alt="" loading="lazy">
      <div>
        <div class="song-row__title"><?= htmlspecialchars($s['title']) ?></div>
        <div class="song-row__artist"><?= htmlspecialchars($s['artist']) ?></div>
      </div>
      <span style="font-size:var(--text-xs);color:var(--text-muted);"><?= $s['plays'] ?></span>
      <button class="btn-favorite" aria-label="Favorite"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg></button>
    </div>
    <?php endforeach; ?>
  </div>
</section>
