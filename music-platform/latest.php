<?php
/**
 * latest.php — Latest Releases Page
 */
session_start();
$pageTitle       = 'Latest Releases — BeatWave';
$pageDescription = 'Stream the newest songs and albums dropped this week on BeatWave.';

$latestSongs = [
  ['id'=>7,  'title'=>'Crystal Clear',    'artist'=>'Ava Monroe',    'cover'=>'https://picsum.photos/seed/n1/300/300', 'duration'=>'3:33', 'date'=>'Today'],
  ['id'=>8,  'title'=>'Starfall',         'artist'=>'Zion Cole',     'cover'=>'https://picsum.photos/seed/n2/300/300', 'duration'=>'4:05', 'date'=>'Today'],
  ['id'=>9,  'title'=>'Purple Rain',      'artist'=>'Kylie Dawn',    'cover'=>'https://picsum.photos/seed/n3/300/300', 'duration'=>'3:48', 'date'=>'Yesterday'],
  ['id'=>10, 'title'=>'Breathe Again',    'artist'=>'Marcus J.',     'cover'=>'https://picsum.photos/seed/n4/300/300', 'duration'=>'4:22', 'date'=>'Yesterday'],
  ['id'=>11, 'title'=>'Tokyo Drift',      'artist'=>'Riku & Friends','cover'=>'https://picsum.photos/seed/n5/300/300', 'duration'=>'3:15', 'date'=>'2 days ago'],
  ['id'=>12, 'title'=>'Desert Wind',      'artist'=>'Sol Tribe',     'cover'=>'https://picsum.photos/seed/n6/300/300', 'duration'=>'3:50', 'date'=>'2 days ago'],
  ['id'=>13, 'title'=>'Moonwalk',         'artist'=>'Luna Sky',      'cover'=>'https://picsum.photos/seed/n7/300/300', 'duration'=>'4:10', 'date'=>'3 days ago'],
  ['id'=>14, 'title'=>'City Lights',      'artist'=>'Nova Beats',    'cover'=>'https://picsum.photos/seed/n8/300/300', 'duration'=>'3:27', 'date'=>'3 days ago'],
  ['id'=>15, 'title'=>'Sunrise',          'artist'=>'Echo Rivers',   'cover'=>'https://picsum.photos/seed/n9/300/300', 'duration'=>'2:55', 'date'=>'4 days ago'],
  ['id'=>16, 'title'=>'Shadows',          'artist'=>'Mira Sol',      'cover'=>'https://picsum.photos/seed/n10/300/300','duration'=>'3:40', 'date'=>'4 days ago'],
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
        <span class="breadcrumb-item current">Latest Releases</span>
      </div>
      <h1 class="display-2" style="margin-bottom:var(--space-2);">✨ New Music Friday</h1>
      <p style="color:var(--text-muted); font-size:var(--text-lg); margin-bottom:var(--space-8);">Fresh tracks added this week</p>

      <div class="grid-songs">
        <?php foreach($latestSongs as $song): ?>
        <div class="song-card reveal" tabindex="0"
             data-play-song
             data-song-id="<?= $song['id'] ?>"
             data-song-title="<?= htmlspecialchars($song['title']) ?>"
             data-song-artist="<?= htmlspecialchars($song['artist']) ?>"
             data-song-cover="<?= htmlspecialchars($song['cover']) ?>"
             data-song-src="">
          <div class="song-card__cover">
            <img src="<?= htmlspecialchars($song['cover']) ?>" alt="<?= htmlspecialchars($song['title']) ?> cover" loading="lazy">
            <div class="song-card__play-overlay"><button class="btn-play" tabindex="-1"><svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><polygon points="5,3 19,12 5,21"/></svg></button></div>
            <div style="position:absolute; top:8px; left:8px;"><span class="badge" style="background:rgba(0,0,0,0.6); color:#fff; backdrop-filter:blur(4px);"><?= $song['date'] ?></span></div>
          </div>
          <div class="song-card__title truncate"><?= htmlspecialchars($song['title']) ?></div>
          <div class="song-card__artist truncate"><?= htmlspecialchars($song['artist']) ?></div>
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
