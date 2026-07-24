<?php
/**
 * trending.php — Trending Songs Page
 */
session_start();
$pageTitle       = 'Trending Songs — BeatWave';
$pageDescription = 'Discover the hottest trending songs right now on BeatWave.';

$songs = [
  ['id'=>1,  'title'=>'Midnight Dreams',   'artist'=>'Luna Sky',       'plays'=>'4.2M', 'downloads'=>'820K', 'cover'=>'https://picsum.photos/seed/t1/300/300', 'duration'=>'3:42', 'genre'=>'Indie Pop'],
  ['id'=>2,  'title'=>'Electric Feel',     'artist'=>'Nova Beats',     'plays'=>'3.8M', 'downloads'=>'710K', 'cover'=>'https://picsum.photos/seed/t2/300/300', 'duration'=>'4:01', 'genre'=>'Electronic'],
  ['id'=>3,  'title'=>'Lost in the City',  'artist'=>'Echo Rivers',    'plays'=>'3.1M', 'downloads'=>'590K', 'cover'=>'https://picsum.photos/seed/t3/300/300', 'duration'=>'3:28', 'genre'=>'R&B'],
  ['id'=>4,  'title'=>'Golden Hour',       'artist'=>'Sunset Vibes',   'plays'=>'2.9M', 'downloads'=>'540K', 'cover'=>'https://picsum.photos/seed/t4/300/300', 'duration'=>'4:15', 'genre'=>'Chillout'],
  ['id'=>5,  'title'=>'Neon Lights',       'artist'=>'Pulse Wave',     'plays'=>'2.6M', 'downloads'=>'490K', 'cover'=>'https://picsum.photos/seed/t5/300/300', 'duration'=>'3:55', 'genre'=>'EDM'],
  ['id'=>6,  'title'=>'Ocean Eyes',        'artist'=>'Mira Sol',       'plays'=>'2.4M', 'downloads'=>'450K', 'cover'=>'https://picsum.photos/seed/t6/300/300', 'duration'=>'3:10', 'genre'=>'Soul'],
  ['id'=>7,  'title'=>'Crystal Clear',     'artist'=>'Ava Monroe',     'plays'=>'2.2M', 'downloads'=>'420K', 'cover'=>'https://picsum.photos/seed/t7/300/300', 'duration'=>'3:33', 'genre'=>'Pop'],
  ['id'=>8,  'title'=>'Starfall',          'artist'=>'Zion Cole',      'plays'=>'2.0M', 'downloads'=>'390K', 'cover'=>'https://picsum.photos/seed/t8/300/300', 'duration'=>'4:05', 'genre'=>'Hip-Hop'],
  ['id'=>9,  'title'=>'Purple Rain',       'artist'=>'Kylie Dawn',     'plays'=>'1.9M', 'downloads'=>'360K', 'cover'=>'https://picsum.photos/seed/t9/300/300', 'duration'=>'3:48', 'genre'=>'Pop'],
  ['id'=>10, 'title'=>'Breathe Again',     'artist'=>'Marcus J.',      'plays'=>'1.8M', 'downloads'=>'340K', 'cover'=>'https://picsum.photos/seed/t10/300/300','duration'=>'4:22', 'genre'=>'Soul'],
  ['id'=>11, 'title'=>'Tokyo Drift',       'artist'=>'Riku & Friends', 'plays'=>'1.7M', 'downloads'=>'310K', 'cover'=>'https://picsum.photos/seed/t11/300/300','duration'=>'3:15', 'genre'=>'J-Pop'],
  ['id'=>12, 'title'=>'Desert Wind',       'artist'=>'Sol Tribe',      'plays'=>'1.5M', 'downloads'=>'280K', 'cover'=>'https://picsum.photos/seed/t12/300/300','duration'=>'3:50', 'genre'=>'World'],
];

include 'components/layout/head.php';
include 'components/layout/navbar.php';
?>

<main class="page-wrapper" id="main-content">
  <div class="container">

    <!-- Page Header -->
    <div class="section" style="padding-bottom: var(--space-6);">
      <div class="breadcrumbs" style="margin-bottom:var(--space-5);">
        <a href="/index.php" class="breadcrumb-item">Home</a>
        <span class="breadcrumb-sep">›</span>
        <span class="breadcrumb-item current">Trending</span>
      </div>
      <div style="display:flex; align-items:flex-end; justify-content:space-between; flex-wrap:wrap; gap:var(--space-4);">
        <div>
          <div class="hero__eyebrow" style="margin-bottom:var(--space-3);">🔥 Updated hourly</div>
          <h1 class="display-2">Trending Songs</h1>
          <p style="color:var(--text-muted); margin-top:var(--space-2);">The hottest tracks everyone's listening to right now</p>
        </div>
        <div style="display:flex; gap:var(--space-3);">
          <button class="btn btn-secondary btn-sm" id="filter-week-btn" onclick="filterPeriod('week')" aria-pressed="true">This Week</button>
          <button class="btn btn-ghost btn-sm" id="filter-month-btn" onclick="filterPeriod('month')" aria-pressed="false">This Month</button>
          <button class="btn btn-ghost btn-sm" id="filter-alltime-btn" onclick="filterPeriod('all')" aria-pressed="false">All Time</button>
        </div>
      </div>
    </div>

    <!-- Song List -->
    <div class="section-sm">
      <div id="trending-song-list" role="list" aria-label="Trending songs">
        <?php foreach ($songs as $i => $song): $rank = $i + 1; ?>
        <div class="song-row reveal"
             role="listitem"
             id="song-row-<?= $song['id'] ?>"
             style="grid-template-columns: 32px 60px 1fr auto auto auto; margin-bottom:4px;"
             data-play-song
             data-song-id="<?= $song['id'] ?>"
             data-song-title="<?= htmlspecialchars($song['title']) ?>"
             data-song-artist="<?= htmlspecialchars($song['artist']) ?>"
             data-song-cover="<?= htmlspecialchars($song['cover']) ?>"
             data-song-src=""
             tabindex="0"
             aria-label="<?= htmlspecialchars($song['title']) ?> by <?= htmlspecialchars($song['artist']) ?>">
          <!-- Rank -->
          <span class="rank-number <?= $rank <= 3 ? 'text-gradient' : '' ?>"><?= $rank ?></span>
          <!-- Cover -->
          <img class="song-row__cover" src="<?= htmlspecialchars($song['cover']) ?>" alt="<?= htmlspecialchars($song['title']) ?> cover" loading="lazy">
          <!-- Info -->
          <div class="song-row__info" style="min-width:0;">
            <div class="song-row__title truncate"><?= htmlspecialchars($song['title']) ?></div>
            <div style="display:flex; align-items:center; gap:var(--space-2);">
              <span class="song-row__artist"><?= htmlspecialchars($song['artist']) ?></span>
              <span class="badge badge-primary" style="padding:2px 7px; font-size:10px;"><?= htmlspecialchars($song['genre']) ?></span>
            </div>
          </div>
          <!-- Plays -->
          <div style="font-size:var(--text-xs); color:var(--text-muted); text-align:right; min-width:60px;">
            <div><?= $song['plays'] ?></div>
            <div style="font-size:10px; opacity:0.6;">plays</div>
          </div>
          <!-- Duration -->
          <span class="song-row__duration"><?= $song['duration'] ?></span>
          <!-- Actions -->
          <div class="song-row__actions" aria-label="Song actions">
            <button class="btn-favorite" aria-label="Add to favorites">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>
            </button>
            <button class="btn-icon-round btn-sm" aria-label="Download" title="Download">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
            </button>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <!-- Pagination -->
      <nav class="pagination" aria-label="Pagination">
        <button class="page-btn" aria-label="Previous page">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
        </button>
        <button class="page-btn active" aria-current="page">1</button>
        <button class="page-btn">2</button>
        <button class="page-btn">3</button>
        <span style="color:var(--text-muted); font-size:var(--text-sm);">…</span>
        <button class="page-btn">12</button>
        <button class="page-btn" aria-label="Next page">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
        </button>
      </nav>
    </div>

  </div>
</main>

<?php include 'components/layout/footer.php'; ?>
<?php include 'components/layout/music-player.php'; ?>

<script src="/assets/js/app.js"></script>
<script src="/assets/js/player.js"></script>
<script>
function filterPeriod(period) {
  ['week','month','alltime'].forEach(p => {
    const btn = document.getElementById('filter-' + p + '-btn');
    if (btn) { btn.classList.remove('btn-secondary'); btn.classList.add('btn-ghost'); btn.setAttribute('aria-pressed','false'); }
  });
  const active = document.getElementById('filter-' + period + '-btn');
  if (active) { active.classList.remove('btn-ghost'); active.classList.add('btn-secondary'); active.setAttribute('aria-pressed','true'); }
}
</script>
</body>
</html>
