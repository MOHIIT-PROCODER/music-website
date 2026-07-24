<?php
// Component: components/home/latest-albums.php
$latestAlbums = [
  ['id'=>1,'title'=>'Midnight Dreams','artist'=>'Luna Sky',    'tracks'=>12,'cover'=>'https://picsum.photos/seed/al1/300/300'],
  ['id'=>2,'title'=>'Neon Nights',    'artist'=>'Nova Beats',  'tracks'=>10,'cover'=>'https://picsum.photos/seed/al2/300/300'],
  ['id'=>3,'title'=>'Lost & Found',   'artist'=>'Echo Rivers', 'tracks'=>14,'cover'=>'https://picsum.photos/seed/al3/300/300'],
  ['id'=>4,'title'=>'Golden Hour',    'artist'=>'Sunset Vibes','tracks'=>8, 'cover'=>'https://picsum.photos/seed/al4/300/300'],
  ['id'=>5,'title'=>'Electric Pulse', 'artist'=>'Pulse Wave',  'tracks'=>15,'cover'=>'https://picsum.photos/seed/al5/300/300'],
];
?>
<section class="section-sm" aria-labelledby="albums-title">
  <div class="section-header">
    <div>
      <div class="hero__eyebrow" style="margin-bottom:var(--space-2);">💿 Latest Albums</div>
      <h2 class="heading-2" id="albums-title">New Albums</h2>
    </div>
    <a href="/albums.php" class="btn btn-ghost btn-sm">View all</a>
  </div>
  <div class="scroll-row" role="list">
    <?php foreach($latestAlbums as $al): ?>
    <div class="album-card reveal" style="width:180px;" tabindex="0" onclick="window.location='/album.php?id=<?= $al['id'] ?>'">
      <div class="album-card__cover" style="aspect-ratio:1;">
        <img src="<?= htmlspecialchars($al['cover']) ?>" alt="<?= htmlspecialchars($al['title']) ?>" loading="lazy">
        <div class="song-card__play-overlay"><button class="btn-play" tabindex="-1" onclick="event.stopPropagation();"><svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><polygon points="5,3 19,12 5,21"/></svg></button></div>
      </div>
      <div class="album-card__title truncate"><?= htmlspecialchars($al['title']) ?></div>
      <div class="album-card__artist truncate"><?= htmlspecialchars($al['artist']) ?></div>
      <div style="font-size:var(--text-xs);color:var(--text-muted);margin-top:2px;"><?= $al['tracks'] ?> tracks</div>
    </div>
    <?php endforeach; ?>
  </div>
</section>
