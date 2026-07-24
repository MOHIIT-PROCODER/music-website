<?php
// Component: components/home/categories.php
$cats = [
  ['name'=>'Pop',       'color'=>'#ff4785','image'=>'https://picsum.photos/seed/cat1/400/300'],
  ['name'=>'Hip-Hop',   'color'=>'#f1c40f','image'=>'https://picsum.photos/seed/cat2/400/300'],
  ['name'=>'Electronic','color'=>'#00d4aa','image'=>'https://picsum.photos/seed/cat3/400/300'],
  ['name'=>'R&B',       'color'=>'#6c47ff','image'=>'https://picsum.photos/seed/cat4/400/300'],
  ['name'=>'Rock',      'color'=>'#e74c3c','image'=>'https://picsum.photos/seed/cat5/400/300'],
  ['name'=>'Indie',     'color'=>'#3498db','image'=>'https://picsum.photos/seed/cat6/400/300'],
];
?>
<section class="section-sm" aria-labelledby="cats-title">
  <div class="section-header">
    <div>
      <div class="hero__eyebrow" style="margin-bottom:var(--space-2);">🗂️ Browse</div>
      <h2 class="heading-2" id="cats-title">Genres</h2>
    </div>
    <a href="/categories.php" class="btn btn-ghost btn-sm">All genres</a>
  </div>
  <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(160px,1fr));gap:var(--space-3);">
    <?php foreach($cats as $cat): ?>
    <div class="category-card reveal" tabindex="0" onclick="window.location='/category.php?name=<?= urlencode($cat['name']) ?>'" style="height:120px;">
      <div class="category-card__bg" style="background-image:url('<?= htmlspecialchars($cat['image']) ?>');"></div>
      <div style="position:absolute;inset:0;background:linear-gradient(to top,<?= $cat['color'] ?> 0%,transparent 100%);opacity:0.75;"></div>
      <div class="category-card__label"><?= htmlspecialchars($cat['name']) ?></div>
    </div>
    <?php endforeach; ?>
  </div>
</section>
