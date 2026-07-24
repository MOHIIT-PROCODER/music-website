<?php
/**
 * categories.php — Browse Categories/Genres
 */
session_start();
$pageTitle       = 'Categories — BeatWave';
$pageDescription = 'Browse music by genre and category on BeatWave.';

$categories = [
  ['name'=>'Pop',        'color'=>'#ff4785', 'image'=>'https://picsum.photos/seed/cat1/400/300'],
  ['name'=>'Hip-Hop',    'color'=>'#f1c40f', 'image'=>'https://picsum.photos/seed/cat2/400/300'],
  ['name'=>'Electronic', 'color'=>'#00d4aa', 'image'=>'https://picsum.photos/seed/cat3/400/300'],
  ['name'=>'R&B',        'color'=>'#6c47ff', 'image'=>'https://picsum.photos/seed/cat4/400/300'],
  ['name'=>'Rock',       'color'=>'#e74c3c', 'image'=>'https://picsum.photos/seed/cat5/400/300'],
  ['name'=>'Indie',      'color'=>'#3498db', 'image'=>'https://picsum.photos/seed/cat6/400/300'],
  ['name'=>'Jazz',       'color'=>'#e67e22', 'image'=>'https://picsum.photos/seed/cat7/400/300'],
  ['name'=>'Classical',  'color'=>'#9b59b6', 'image'=>'https://picsum.photos/seed/cat8/400/300'],
  ['name'=>'Country',    'color'=>'#d35400', 'image'=>'https://picsum.photos/seed/cat9/400/300'],
  ['name'=>'Latin',      'color'=>'#1abc9c', 'image'=>'https://picsum.photos/seed/cat10/400/300'],
  ['name'=>'K-Pop',      'color'=>'#ff6b81', 'image'=>'https://picsum.photos/seed/cat11/400/300'],
  ['name'=>'Metal',      'color'=>'#2c3e50', 'image'=>'https://picsum.photos/seed/cat12/400/300'],
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
        <span class="breadcrumb-item current">Categories</span>
      </div>
      
      <div class="section-header">
        <div>
          <h1 class="display-2" style="margin-bottom:var(--space-2);">🗂️ Browse Genres</h1>
          <p style="color:var(--text-muted); font-size:var(--text-lg);">Find music that matches your vibe</p>
        </div>
      </div>

      <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(200px, 1fr)); gap:var(--space-4);">
        <?php foreach($categories as $cat): ?>
        <div class="category-card reveal" tabindex="0" onclick="window.location='/category.php?name=<?= urlencode($cat['name']) ?>'">
          <div class="category-card__bg" style="background-image:url('<?= htmlspecialchars($cat['image']) ?>');"></div>
          <div style="position:absolute; inset:0; background:linear-gradient(to top, <?= $cat['color'] ?> 0%, transparent 100%); opacity:0.8;"></div>
          <div class="category-card__label" style="text-shadow:0 2px 4px rgba(0,0,0,0.5);"><?= htmlspecialchars($cat['name']) ?></div>
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
