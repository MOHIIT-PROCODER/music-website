<?php
/**
 * artists.php — Artists Directory
 */
session_start();
$pageTitle       = 'Artists — BeatWave';
$pageDescription = 'Discover and follow your favorite artists on BeatWave.';

$artists = [
  ['id'=>1, 'name'=>'Luna Sky',     'followers'=>'1.2M', 'avatar'=>'https://picsum.photos/seed/a1/200/200', 'genre'=>'Indie Pop'],
  ['id'=>2, 'name'=>'Nova Beats',   'followers'=>'980K', 'avatar'=>'https://picsum.photos/seed/a2/200/200', 'genre'=>'Electronic'],
  ['id'=>3, 'name'=>'Echo Rivers',  'followers'=>'850K', 'avatar'=>'https://picsum.photos/seed/a3/200/200', 'genre'=>'R&B'],
  ['id'=>4, 'name'=>'Sunset Vibes', 'followers'=>'760K', 'avatar'=>'https://picsum.photos/seed/a4/200/200', 'genre'=>'Chillout'],
  ['id'=>5, 'name'=>'Pulse Wave',   'followers'=>'620K', 'avatar'=>'https://picsum.photos/seed/a5/200/200', 'genre'=>'EDM'],
  ['id'=>6, 'name'=>'Mira Sol',     'followers'=>'540K', 'avatar'=>'https://picsum.photos/seed/a6/200/200', 'genre'=>'Soul'],
  ['id'=>7, 'name'=>'Ava Monroe',   'followers'=>'480K', 'avatar'=>'https://picsum.photos/seed/a7/200/200', 'genre'=>'Pop'],
  ['id'=>8, 'name'=>'Zion Cole',    'followers'=>'410K', 'avatar'=>'https://picsum.photos/seed/a8/200/200', 'genre'=>'Hip-Hop'],
  ['id'=>9, 'name'=>'Kylie Dawn',   'followers'=>'390K', 'avatar'=>'https://picsum.photos/seed/a9/200/200', 'genre'=>'Pop'],
  ['id'=>10,'name'=>'Marcus J.',    'followers'=>'340K', 'avatar'=>'https://picsum.photos/seed/a10/200/200','genre'=>'Soul'],
  ['id'=>11,'name'=>'Riku',         'followers'=>'290K', 'avatar'=>'https://picsum.photos/seed/a11/200/200','genre'=>'J-Pop'],
  ['id'=>12,'name'=>'Sol Tribe',    'followers'=>'250K', 'avatar'=>'https://picsum.photos/seed/a12/200/200','genre'=>'World'],
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
        <span class="breadcrumb-item current">Artists</span>
      </div>
      
      <div class="section-header">
        <div>
          <h1 class="display-2" style="margin-bottom:var(--space-2);">🎤 Top Artists</h1>
          <p style="color:var(--text-muted); font-size:var(--text-lg);">Follow artists to get updates on new releases</p>
        </div>
        
        <!-- Search filter -->
        <div class="search-input-wrap" style="width:280px;">
          <svg class="search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
          <input type="search" class="input" placeholder="Search artists..." aria-label="Search artists" id="artist-search">
        </div>
      </div>

      <!-- Genres filter tabs -->
      <div class="search-tabs" style="margin-bottom:var(--space-8);">
        <button class="search-tab active">All</button>
        <button class="search-tab">Pop</button>
        <button class="search-tab">Electronic</button>
        <button class="search-tab">Hip-Hop</button>
        <button class="search-tab">R&B</button>
        <button class="search-tab">Soul</button>
      </div>

      <div class="grid-artists" id="artist-grid">
        <?php foreach($artists as $artist): ?>
        <div class="artist-card reveal" tabindex="0" onclick="window.location='/artist.php?id=<?= $artist['id'] ?>'" data-genre="<?= htmlspecialchars($artist['genre']) ?>">
          <img class="artist-card__avatar" src="<?= htmlspecialchars($artist['avatar']) ?>" alt="<?= htmlspecialchars($artist['name']) ?>" loading="lazy">
          <div>
            <div class="artist-card__name"><?= htmlspecialchars($artist['name']) ?></div>
            <div class="artist-card__followers"><?= htmlspecialchars($artist['followers']) ?> followers</div>
          </div>
          <button class="btn-follow btn-sm" onclick="event.stopPropagation(); this.classList.toggle('following'); this.textContent = this.classList.contains('following') ? 'Following' : 'Follow'; showToast(this.classList.contains('following') ? 'Following artist' : 'Unfollowed', 'info')">Follow</button>
        </div>
        <?php endforeach; ?>
      </div>

      <div class="flex-center" style="margin-top:var(--space-10);">
        <button class="btn btn-secondary">Load More</button>
      </div>

    </div>
  </div>
</main>

<?php include 'components/layout/footer.php'; ?>
<?php include 'components/layout/music-player.php'; ?>
<script src="/assets/js/app.js"></script>
<script src="/assets/js/player.js"></script>
<script>
// Simple client-side filter
document.querySelectorAll('.search-tab').forEach(tab => {
  tab.addEventListener('click', function() {
    document.querySelectorAll('.search-tab').forEach(t => t.classList.remove('active'));
    this.classList.add('active');
    
    const filter = this.textContent;
    document.querySelectorAll('.artist-card').forEach(card => {
      if (filter === 'All' || card.dataset.genre.includes(filter)) {
        card.style.display = '';
      } else {
        card.style.display = 'none';
      }
    });
  });
});

document.getElementById('artist-search').addEventListener('input', function(e) {
  const term = e.target.value.toLowerCase();
  document.querySelectorAll('.artist-card').forEach(card => {
    const name = card.querySelector('.artist-card__name').textContent.toLowerCase();
    card.style.display = name.includes(term) ? '' : 'none';
  });
});
</script>
</body>
</html>
