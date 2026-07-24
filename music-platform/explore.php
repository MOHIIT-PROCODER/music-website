<?php
/**
 * explore.php — Discover Music
 */
session_start();
$pageTitle       = 'Explore Music — BeatWave';
$pageDescription = 'Discover new music, curated playlists, and hidden gems on BeatWave.';

$genres = [
    ['name'=>'Chill Vibes',  'image'=>'https://picsum.photos/seed/g1/400/250'],
    ['name'=>'Workout Mix',  'image'=>'https://picsum.photos/seed/g2/400/250'],
    ['name'=>'Party Hits',   'image'=>'https://picsum.photos/seed/g3/400/250'],
    ['name'=>'Focus & Study','image'=>'https://picsum.photos/seed/g4/400/250'],
    ['name'=>'Late Night',   'image'=>'https://picsum.photos/seed/g5/400/250'],
    ['name'=>'Road Trip',    'image'=>'https://picsum.photos/seed/g6/400/250'],
];

$topCharts = [
    ['id'=>1, 'title'=>'Global Top 50', 'cover'=>'https://picsum.photos/seed/c1/300/300', 'color'=>'#6c47ff'],
    ['id'=>2, 'title'=>'Viral 50',      'cover'=>'https://picsum.photos/seed/c2/300/300', 'color'=>'#ff4785'],
    ['id'=>3, 'title'=>'New Music',     'cover'=>'https://picsum.photos/seed/c3/300/300', 'color'=>'#00d4aa'],
    ['id'=>4, 'title'=>'Top Indie',     'cover'=>'https://picsum.photos/seed/c4/300/300', 'color'=>'#f1c40f'],
];

include 'components/layout/head.php';
include 'components/layout/navbar.php';
?>

<main class="page-wrapper" id="main-content">
  <div class="container">

    <!-- Header -->
    <div class="section" style="padding-bottom:var(--space-6);">
      <h1 class="display-2" style="margin-bottom:var(--space-2);">🧭 Discover</h1>
      <p style="color:var(--text-muted); font-size:var(--text-lg);">Find your next favorite track</p>
    </div>

    <!-- Moods & Activities -->
    <section class="section-sm" aria-labelledby="moods-title">
      <h2 class="heading-2" id="moods-title" style="margin-bottom:var(--space-6);">Moods & Activities</h2>
      <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(240px, 1fr)); gap:var(--space-4);">
        <?php foreach($genres as $genre): ?>
        <div class="category-card reveal" tabindex="0" role="button" aria-label="Explore <?= htmlspecialchars($genre['name']) ?>">
          <div class="category-card__bg" style="background-image:url('<?= htmlspecialchars($genre['image']) ?>');"></div>
          <div class="category-card__label"><?= htmlspecialchars($genre['name']) ?></div>
        </div>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- Top Charts -->
    <section class="section-sm" aria-labelledby="charts-title">
      <h2 class="heading-2" id="charts-title" style="margin-bottom:var(--space-6);">Featured Charts</h2>
      <div class="scroll-row" role="list">
        <?php foreach($topCharts as $chart): ?>
        <div class="album-card reveal" style="width:220px;" role="listitem" tabindex="0" aria-label="<?= htmlspecialchars($chart['title']) ?>">
          <div style="position:relative; aspect-ratio:1; display:flex; align-items:center; justify-content:center; overflow:hidden;">
            <div style="position:absolute; inset:0; background:linear-gradient(45deg, <?= $chart['color'] ?>, #222); opacity:0.8;"></div>
            <img src="<?= htmlspecialchars($chart['cover']) ?>" style="position:absolute; inset:0; width:100%; height:100%; object-fit:cover; mix-blend-mode:overlay;" alt="">
            <div style="position:relative; z-index:1; font-family:var(--font-display); font-size:1.8rem; font-weight:900; color:#fff; text-align:center; padding:1rem;">
              <?= htmlspecialchars($chart['title']) ?>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </section>

  </div>
</main>

<?php include 'components/layout/footer.php'; ?>
<?php include 'components/layout/music-player.php'; ?>
<script src="/assets/js/app.js"></script>
<script src="/assets/js/player.js"></script>
</body>
</html>
