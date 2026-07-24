<?php
// Component: components/home/top-downloads.php
$topDownloads = [
  ['id'=>1, 'title'=>'Midnight Dreams',  'artist'=>'Luna Sky',    'downloads'=>'820K', 'cover'=>'https://picsum.photos/seed/d1/60/60'],
  ['id'=>2, 'title'=>'Electric Feel',    'artist'=>'Nova Beats',  'downloads'=>'710K', 'cover'=>'https://picsum.photos/seed/d2/60/60'],
  ['id'=>3, 'title'=>'Lost in the City', 'artist'=>'Echo Rivers', 'downloads'=>'590K', 'cover'=>'https://picsum.photos/seed/d3/60/60'],
  ['id'=>4, 'title'=>'Golden Hour',      'artist'=>'Sunset Vibes','downloads'=>'540K', 'cover'=>'https://picsum.photos/seed/d4/60/60'],
  ['id'=>5, 'title'=>'Neon Lights',      'artist'=>'Pulse Wave',  'downloads'=>'490K', 'cover'=>'https://picsum.photos/seed/d5/60/60'],
];
?>
<section class="section-sm" aria-labelledby="top-downloads-title">
  <div class="section-header">
    <div>
      <div class="hero__eyebrow" style="margin-bottom:var(--space-2);">⬇️ Most Downloaded</div>
      <h2 class="heading-2" id="top-downloads-title">Top Downloads</h2>
    </div>
    <a href="/trending.php" class="btn btn-ghost btn-sm">View all</a>
  </div>
  <div role="list">
    <?php foreach($topDownloads as $i => $song): ?>
    <div class="song-row reveal" style="grid-template-columns:28px 52px 1fr auto auto;" tabindex="0"
         data-play-song data-song-id="<?= $song['id'] ?>"
         data-song-title="<?= htmlspecialchars($song['title']) ?>"
         data-song-artist="<?= htmlspecialchars($song['artist']) ?>"
         data-song-cover="<?= htmlspecialchars($song['cover']) ?>">
      <span style="font-weight:700; font-size:var(--text-sm); color:var(--text-muted); text-align:center;"><?= $i+1 ?></span>
      <img class="song-row__cover" src="<?= htmlspecialchars($song['cover']) ?>" alt="" loading="lazy">
      <div>
        <div class="song-row__title"><?= htmlspecialchars($song['title']) ?></div>
        <div class="song-row__artist"><?= htmlspecialchars($song['artist']) ?></div>
      </div>
      <span style="font-size:var(--text-xs); color:var(--text-muted);"><?= $song['downloads'] ?></span>
      <button class="btn-icon-round btn-sm" aria-label="Download" title="Download">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
      </button>
    </div>
    <?php endforeach; ?>
  </div>
</section>
