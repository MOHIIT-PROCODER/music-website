<?php
// Component: components/home/featured-artists.php
$featuredArtists = [
  ['id'=>1,'name'=>'Luna Sky',    'followers'=>'1.2M','avatar'=>'https://picsum.photos/seed/a1/150/150','genre'=>'Indie Pop'],
  ['id'=>2,'name'=>'Nova Beats',  'followers'=>'980K', 'avatar'=>'https://picsum.photos/seed/a2/150/150','genre'=>'Electronic'],
  ['id'=>3,'name'=>'Echo Rivers', 'followers'=>'850K', 'avatar'=>'https://picsum.photos/seed/a3/150/150','genre'=>'R&B'],
  ['id'=>4,'name'=>'Sunset Vibes','followers'=>'760K', 'avatar'=>'https://picsum.photos/seed/a4/150/150','genre'=>'Chillout'],
  ['id'=>5,'name'=>'Pulse Wave',  'followers'=>'620K', 'avatar'=>'https://picsum.photos/seed/a5/150/150','genre'=>'EDM'],
  ['id'=>6,'name'=>'Mira Sol',    'followers'=>'540K', 'avatar'=>'https://picsum.photos/seed/a6/150/150','genre'=>'Soul'],
];
?>
<section class="section-sm" aria-labelledby="artists-title">
  <div class="section-header">
    <div>
      <div class="hero__eyebrow" style="margin-bottom:var(--space-2);">🎤 Top Creators</div>
      <h2 class="heading-2" id="artists-title">Featured Artists</h2>
    </div>
    <a href="/artists.php" class="btn btn-ghost btn-sm">See all</a>
  </div>
  <div class="scroll-row" role="list">
    <?php foreach($featuredArtists as $a): ?>
    <div class="artist-card reveal" style="width:160px;flex-direction:column;text-align:center;padding:var(--space-5);" tabindex="0"
         onclick="window.location='/artist.php?id=<?= $a['id'] ?>'">
      <img class="artist-card__avatar" style="width:90px;height:90px;margin:0 auto var(--space-3);"
           src="<?= htmlspecialchars($a['avatar']) ?>" alt="<?= htmlspecialchars($a['name']) ?>" loading="lazy">
      <div class="artist-card__name"><?= htmlspecialchars($a['name']) ?></div>
      <div class="artist-card__followers"><?= $a['followers'] ?></div>
      <button class="btn-follow btn-sm" style="margin-top:var(--space-2);" onclick="event.stopPropagation(); this.classList.toggle('following'); this.textContent = this.classList.contains('following')?'Following':'Follow';">Follow</button>
    </div>
    <?php endforeach; ?>
  </div>
</section>
