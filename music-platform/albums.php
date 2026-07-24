<?php
/**
 * albums.php — Albums Directory
 */
session_start();
$pageTitle       = 'Albums — BeatWave';
$pageDescription = 'Browse top albums from your favorite artists.';

$albums = [
  ['id'=>1, 'title'=>'Midnight Dreams', 'artist'=>'Luna Sky',     'year'=>'2024', 'tracks'=>12, 'cover'=>'https://picsum.photos/seed/al1/300/300'],
  ['id'=>2, 'title'=>'Neon Nights',     'artist'=>'Nova Beats',   'year'=>'2023', 'tracks'=>10, 'cover'=>'https://picsum.photos/seed/al2/300/300'],
  ['id'=>3, 'title'=>'Lost & Found',    'artist'=>'Echo Rivers',  'year'=>'2024', 'tracks'=>14, 'cover'=>'https://picsum.photos/seed/al3/300/300'],
  ['id'=>4, 'title'=>'Golden Hour',     'artist'=>'Sunset Vibes', 'year'=>'2022', 'tracks'=>8,  'cover'=>'https://picsum.photos/seed/al4/300/300'],
  ['id'=>5, 'title'=>'Electric Pulse',  'artist'=>'Pulse Wave',   'year'=>'2024', 'tracks'=>15, 'cover'=>'https://picsum.photos/seed/al5/300/300'],
  ['id'=>6, 'title'=>'Ocean Eyes',      'artist'=>'Mira Sol',     'year'=>'2023', 'tracks'=>11, 'cover'=>'https://picsum.photos/seed/al6/300/300'],
  ['id'=>7, 'title'=>'Crystal Clear',   'artist'=>'Ava Monroe',   'year'=>'2024', 'tracks'=>9,  'cover'=>'https://picsum.photos/seed/al7/300/300'],
  ['id'=>8, 'title'=>'Starfall',        'artist'=>'Zion Cole',    'year'=>'2024', 'tracks'=>13, 'cover'=>'https://picsum.photos/seed/al8/300/300'],
];

include 'components/layout/head.php';
include 'components/layout/navbar.php';
?>

<main class="page-wrapper" id="main-content">
  <div class="container">
    <div class="section">
      <div class="breadcrumbs" style="margin-bottom:var(--space-5);">
        <a href="/index.php" class="breadcrumb-item">Home</a>
        <span class="breadcrumb-sep">›</span>
        <span class="breadcrumb-item current">Albums</span>
      </div>
      
      <div class="section-header">
        <div>
          <h1 class="display-2" style="margin-bottom:var(--space-2);">💿 Popular Albums</h1>
          <p style="color:var(--text-muted); font-size:var(--text-lg);">Listen to full albums from top creators</p>
        </div>
      </div>

      <div class="grid-albums">
        <?php foreach($albums as $album): ?>
        <div class="album-card reveal" tabindex="0" onclick="window.location='/album.php?id=<?= $album['id'] ?>'">
          <div class="album-card__cover">
            <img src="<?= htmlspecialchars($album['cover']) ?>" alt="<?= htmlspecialchars($album['title']) ?> cover" loading="lazy">
            <div class="song-card__play-overlay"><button class="btn-play" tabindex="-1" onclick="event.stopPropagation();"><svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><polygon points="5,3 19,12 5,21"/></svg></button></div>
          </div>
          <div class="album-card__title truncate"><?= htmlspecialchars($album['title']) ?></div>
          <div class="album-card__artist truncate"><?= htmlspecialchars($album['artist']) ?></div>
          <div style="font-size:var(--text-xs); color:var(--text-muted); margin-top:4px;">
            <?= htmlspecialchars($album['year']) ?> • <?= htmlspecialchars($album['tracks']) ?> tracks
          </div>
        </div>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</main>

<?php include 'components/layout/footer.php'; ?>
<?php include 'components/layout/music-player.php'; ?>
<script src="/assets/js/app.js"></script>
<script src="/assets/js/player.js"></script>
</body>
</html>
