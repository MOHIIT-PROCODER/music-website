<?php
/**
 * index.php — BeatWave Homepage
 */
session_start();

$pageTitle       = 'BeatWave — Stream & Discover Music';
$pageDescription = 'Discover, stream, and download your favorite music on BeatWave. Explore trending songs, top artists, and new album releases.';

// ── Demo data (replace with DB queries) ──────────────────
$trendingSongs = [
  ['id'=>1, 'title'=>'Midnight Dreams', 'artist'=>'Luna Sky',      'plays'=>'4.2M', 'cover'=>'https://picsum.photos/seed/s1/300/300', 'duration'=>'3:42'],
  ['id'=>2, 'title'=>'Electric Feel',   'artist'=>'Nova Beats',    'plays'=>'3.8M', 'cover'=>'https://picsum.photos/seed/s2/300/300', 'duration'=>'4:01'],
  ['id'=>3, 'title'=>'Lost in the City','artist'=>'Echo Rivers',   'plays'=>'3.1M', 'cover'=>'https://picsum.photos/seed/s3/300/300', 'duration'=>'3:28'],
  ['id'=>4, 'title'=>'Golden Hour',     'artist'=>'Sunset Vibes',  'plays'=>'2.9M', 'cover'=>'https://picsum.photos/seed/s4/300/300', 'duration'=>'4:15'],
  ['id'=>5, 'title'=>'Neon Lights',     'artist'=>'Pulse Wave',    'plays'=>'2.6M', 'cover'=>'https://picsum.photos/seed/s5/300/300', 'duration'=>'3:55'],
  ['id'=>6, 'title'=>'Ocean Eyes',      'artist'=>'Mira Sol',      'plays'=>'2.4M', 'cover'=>'https://picsum.photos/seed/s6/300/300', 'duration'=>'3:10'],
];

$latestSongs = [
  ['id'=>7,  'title'=>'Crystal Clear',    'artist'=>'Ava Monroe',    'cover'=>'https://picsum.photos/seed/n1/300/300', 'duration'=>'3:33'],
  ['id'=>8,  'title'=>'Starfall',         'artist'=>'Zion Cole',     'cover'=>'https://picsum.photos/seed/n2/300/300', 'duration'=>'4:05'],
  ['id'=>9,  'title'=>'Purple Rain',      'artist'=>'Kylie Dawn',    'cover'=>'https://picsum.photos/seed/n3/300/300', 'duration'=>'3:48'],
  ['id'=>10, 'title'=>'Breathe Again',    'artist'=>'Marcus J.',     'cover'=>'https://picsum.photos/seed/n4/300/300', 'duration'=>'4:22'],
  ['id'=>11, 'title'=>'Tokyo Drift',      'artist'=>'Riku & Friends','cover'=>'https://picsum.photos/seed/n5/300/300', 'duration'=>'3:15'],
  ['id'=>12, 'title'=>'Desert Wind',      'artist'=>'Sol Tribe',     'cover'=>'https://picsum.photos/seed/n6/300/300', 'duration'=>'3:50'],
  ['id'=>13, 'title'=>'Moonwalk',         'artist'=>'Luna Sky',      'cover'=>'https://picsum.photos/seed/n7/300/300', 'duration'=>'4:10'],
  ['id'=>14, 'title'=>'City Lights',      'artist'=>'Nova Beats',    'cover'=>'https://picsum.photos/seed/n8/300/300', 'duration'=>'3:27'],
];

$featuredArtists = [
  ['id'=>1, 'name'=>'Luna Sky',     'followers'=>'1.2M', 'avatar'=>'https://picsum.photos/seed/a1/200/200', 'genre'=>'Indie Pop'],
  ['id'=>2, 'name'=>'Nova Beats',   'followers'=>'980K',  'avatar'=>'https://picsum.photos/seed/a2/200/200', 'genre'=>'Electronic'],
  ['id'=>3, 'name'=>'Echo Rivers',  'followers'=>'850K',  'avatar'=>'https://picsum.photos/seed/a3/200/200', 'genre'=>'R&B'],
  ['id'=>4, 'name'=>'Sunset Vibes', 'followers'=>'760K',  'avatar'=>'https://picsum.photos/seed/a4/200/200', 'genre'=>'Chillout'],
  ['id'=>5, 'name'=>'Pulse Wave',   'followers'=>'620K',  'avatar'=>'https://picsum.photos/seed/a5/200/200', 'genre'=>'EDM'],
  ['id'=>6, 'name'=>'Mira Sol',     'followers'=>'540K',  'avatar'=>'https://picsum.photos/seed/a6/200/200', 'genre'=>'Soul'],
];

$latestAlbums = [
  ['id'=>1, 'title'=>'Midnight Sessions', 'artist'=>'Luna Sky',     'year'=>2026, 'cover'=>'https://picsum.photos/seed/al1/400/400', 'tracks'=>12],
  ['id'=>2, 'title'=>'Electric Dreams',   'artist'=>'Nova Beats',   'year'=>2026, 'cover'=>'https://picsum.photos/seed/al2/400/400', 'tracks'=>10],
  ['id'=>3, 'title'=>'Riverbank',         'artist'=>'Echo Rivers',  'year'=>2025, 'cover'=>'https://picsum.photos/seed/al3/400/400', 'tracks'=>14],
  ['id'=>4, 'title'=>'Golden State',      'artist'=>'Sunset Vibes', 'year'=>2025, 'cover'=>'https://picsum.photos/seed/al4/400/400', 'tracks'=>11],
  ['id'=>5, 'title'=>'Frequencies',       'artist'=>'Pulse Wave',   'year'=>2026, 'cover'=>'https://picsum.photos/seed/al5/400/400', 'tracks'=>9],
];

$categories = [
  ['name'=>'Hip-Hop',    'color'=>'#ff4785', 'icon'=>'🎤', 'count'=>'12K'],
  ['name'=>'Pop',        'color'=>'#6c47ff', 'icon'=>'🎵', 'count'=>'18K'],
  ['name'=>'Electronic', 'color'=>'#00d4aa', 'icon'=>'🎛️', 'count'=>'9K'],
  ['name'=>'R&B / Soul', 'color'=>'#ff8c47', 'icon'=>'🎷', 'count'=>'7K'],
  ['name'=>'Rock',       'color'=>'#e74c3c', 'icon'=>'🎸', 'count'=>'11K'],
  ['name'=>'Jazz',       'color'=>'#f1c40f', 'icon'=>'🎺', 'count'=>'4K'],
  ['name'=>'Classical',  'color'=>'#9b59b6', 'icon'=>'🎻', 'count'=>'3K'],
  ['name'=>'Afrobeats',  'color'=>'#27ae60', 'icon'=>'🥁', 'count'=>'6K'],
];

include 'components/layout/head.php';
include 'components/layout/navbar.php';
?>

<main class="page-wrapper" id="main-content">

  <!-- ══ HERO ═══════════════════════════════════════════════ -->
  <?php include 'components/home/hero.php'; ?>

  <!-- ══ TRENDING SONGS ═══════════════════════════════════ -->
  <section class="section" id="trending-section" aria-labelledby="trending-title">
    <div class="container">
      <div class="section-header">
        <div>
          <h2 class="section-title" id="trending-title">
            🔥 Trending Now
          </h2>
          <p class="section-subtitle">Most played songs this week</p>
        </div>
        <a href="/trending.php" class="section-link">
          View All
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
        </a>
      </div>

      <div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: var(--space-4);">
        <?php foreach ($trendingSongs as $i => $song): $rank = $i + 1; ?>
        <div class="trending-card <?= $rank <= 3 ? 'top-3' : '' ?> reveal"
             role="article"
             tabindex="0"
             aria-label="<?= htmlspecialchars($song['title']) ?> by <?= htmlspecialchars($song['artist']) ?>"
             data-play-song
             data-song-id="<?= $song['id'] ?>"
             data-song-title="<?= htmlspecialchars($song['title']) ?>"
             data-song-artist="<?= htmlspecialchars($song['artist']) ?>"
             data-song-cover="<?= htmlspecialchars($song['cover']) ?>"
             data-song-src="">
          <span class="trending-card__rank"><?= $rank ?></span>
          <img class="trending-card__cover" src="<?= htmlspecialchars($song['cover']) ?>" alt="<?= htmlspecialchars($song['title']) ?> cover" loading="lazy">
          <div class="trending-card__info" style="flex:1; min-width:0;">
            <div class="trending-card__title truncate"><?= htmlspecialchars($song['title']) ?></div>
            <div class="trending-card__artist truncate"><?= htmlspecialchars($song['artist']) ?></div>
            <div style="font-size:var(--text-xs); color:var(--text-muted); margin-top:2px;"><?= $song['plays'] ?> plays</div>
          </div>
          <div style="display:flex; align-items:center; gap:var(--space-2);">
            <span style="font-size:var(--text-xs); color:var(--text-muted);"><?= $song['duration'] ?></span>
            <button class="btn-icon btn-play-sm"
                    data-play-song
                    data-song-id="<?= $song['id'] ?>"
                    data-song-title="<?= htmlspecialchars($song['title']) ?>"
                    data-song-artist="<?= htmlspecialchars($song['artist']) ?>"
                    data-song-cover="<?= htmlspecialchars($song['cover']) ?>"
                    data-song-src=""
                    aria-label="Play <?= htmlspecialchars($song['title']) ?>">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="5,3 19,12 5,21"/></svg>
            </button>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ══ LATEST RELEASES ══════════════════════════════════ -->
  <section class="section" id="latest-section" aria-labelledby="latest-title" style="background: var(--bg-surface); border-radius: var(--radius-xl); margin-inline: 0;">
    <div class="container">
      <div class="section-header">
        <div>
          <h2 class="section-title" id="latest-title">✨ Latest Releases</h2>
          <p class="section-subtitle">Fresh drops you won't want to miss</p>
        </div>
        <a href="/latest.php" class="section-link">
          View All
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
        </a>
      </div>
      <div class="scroll-row" role="list" aria-label="Latest releases">
        <?php foreach ($latestSongs as $song): ?>
        <div class="song-card" role="listitem" style="width:180px;"
             tabindex="0"
             data-play-song
             data-song-id="<?= $song['id'] ?>"
             data-song-title="<?= htmlspecialchars($song['title']) ?>"
             data-song-artist="<?= htmlspecialchars($song['artist']) ?>"
             data-song-cover="<?= htmlspecialchars($song['cover']) ?>"
             data-song-src=""
             aria-label="Play <?= htmlspecialchars($song['title']) ?> by <?= htmlspecialchars($song['artist']) ?>">
          <div class="song-card__cover">
            <img src="<?= htmlspecialchars($song['cover']) ?>" alt="<?= htmlspecialchars($song['title']) ?> cover" loading="lazy">
            <div class="song-card__play-overlay" aria-hidden="true">
              <button class="btn-play" tabindex="-1">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><polygon points="5,3 19,12 5,21"/></svg>
              </button>
            </div>
            <div style="position:absolute; top:8px; right:8px;">
              <span class="badge badge-new">New</span>
            </div>
          </div>
          <div class="song-card__title truncate"><?= htmlspecialchars($song['title']) ?></div>
          <div class="song-card__artist truncate"><?= htmlspecialchars($song['artist']) ?></div>
          <div class="song-card__meta">
            <span style="font-size:var(--text-xs); color:var(--text-muted);"><?= $song['duration'] ?></span>
            <button class="btn-favorite" aria-label="Add to favorites" title="Favorite">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>
            </button>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ══ FEATURED ARTISTS ═════════════════════════════════ -->
  <section class="section" id="artists-section" aria-labelledby="artists-title">
    <div class="container">
      <div class="section-header">
        <div>
          <h2 class="section-title" id="artists-title">🎤 Featured Artists</h2>
          <p class="section-subtitle">Top artists making waves this month</p>
        </div>
        <a href="/artists.php" class="section-link">
          All Artists
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
        </a>
      </div>
      <div class="scroll-row" role="list" aria-label="Featured artists">
        <?php foreach ($featuredArtists as $artist): ?>
        <div class="artist-card" role="listitem" style="width:160px;" tabindex="0" aria-label="<?= htmlspecialchars($artist['name']) ?>">
          <img class="artist-card__avatar" src="<?= htmlspecialchars($artist['avatar']) ?>" alt="<?= htmlspecialchars($artist['name']) ?>" loading="lazy">
          <div>
            <div class="artist-card__name"><?= htmlspecialchars($artist['name']) ?></div>
            <div class="artist-card__followers"><?= htmlspecialchars($artist['followers']) ?> followers</div>
            <span class="badge badge-primary" style="margin-top:4px;"><?= htmlspecialchars($artist['genre']) ?></span>
          </div>
          <button class="btn-follow btn-sm" aria-label="Follow <?= htmlspecialchars($artist['name']) ?>">Follow</button>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ══ LATEST ALBUMS ════════════════════════════════════ -->
  <section class="section" id="albums-section" aria-labelledby="albums-title" style="background: var(--bg-surface);">
    <div class="container">
      <div class="section-header">
        <div>
          <h2 class="section-title" id="albums-title">💿 Latest Albums</h2>
          <p class="section-subtitle">Brand new collections from top artists</p>
        </div>
        <a href="/albums.php" class="section-link">
          All Albums
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
        </a>
      </div>
      <div class="scroll-row" role="list" aria-label="Latest albums">
        <?php foreach ($latestAlbums as $album): ?>
        <div class="album-card reveal" role="listitem" style="width:200px;" tabindex="0" aria-label="<?= htmlspecialchars($album['title']) ?> album by <?= htmlspecialchars($album['artist']) ?>">
          <div style="position:relative;">
            <img class="album-card__cover" src="<?= htmlspecialchars($album['cover']) ?>" alt="<?= htmlspecialchars($album['title']) ?> album cover" loading="lazy">
            <div style="position:absolute; inset:0; background:rgba(0,0,0,0); display:flex; align-items:center; justify-content:center; transition:background 0.2s;" class="album-overlay">
              <button class="btn-play" aria-label="Play <?= htmlspecialchars($album['title']) ?>" style="opacity:0; transition:opacity 0.2s;" class="album-play-btn">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><polygon points="5,3 19,12 5,21"/></svg>
              </button>
            </div>
          </div>
          <div class="album-card__info">
            <div class="album-card__title truncate"><?= htmlspecialchars($album['title']) ?></div>
            <div class="album-card__artist truncate"><?= htmlspecialchars($album['artist']) ?></div>
            <div class="album-card__year"><?= $album['year'] ?> · <?= $album['tracks'] ?> tracks</div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ══ CATEGORIES ═══════════════════════════════════════ -->
  <section class="section" id="categories-section" aria-labelledby="categories-title">
    <div class="container">
      <div class="section-header">
        <div>
          <h2 class="section-title" id="categories-title">🎵 Browse Genres</h2>
          <p class="section-subtitle">Explore music by genre</p>
        </div>
        <a href="/categories.php" class="section-link">
          All Genres
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
        </a>
      </div>
      <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(140px, 1fr)); gap:var(--space-4);">
        <?php foreach ($categories as $cat): ?>
        <a href="/category.php?name=<?= urlencode($cat['name']) ?>"
           class="reveal"
           style="display:flex; flex-direction:column; align-items:center; justify-content:center; gap:10px; padding:var(--space-5); border-radius:var(--radius-lg); background:<?= $cat['color'] ?>18; border:1.5px solid <?= $cat['color'] ?>33; text-align:center; transition:all 0.2s; cursor:pointer; text-decoration:none;"
           onmouseover="this.style.background='<?= $cat['color'] ?>30'; this.style.transform='translateY(-4px)'; this.style.borderColor='<?= $cat['color'] ?>66';"
           onmouseout="this.style.background='<?= $cat['color'] ?>18'; this.style.transform=''; this.style.borderColor='<?= $cat['color'] ?>33';"
           aria-label="Browse <?= htmlspecialchars($cat['name']) ?>">
          <span style="font-size:2rem;" aria-hidden="true"><?= $cat['icon'] ?></span>
          <span style="font-size:var(--text-sm); font-weight:700; color:var(--text-primary);"><?= htmlspecialchars($cat['name']) ?></span>
          <span style="font-size:var(--text-xs); color:var(--text-muted);"><?= $cat['count'] ?> songs</span>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ══ CTA BANNER ═══════════════════════════════════════ -->
  <?php if (!isset($_SESSION['user_id'])): ?>
  <section class="section-sm" aria-label="Sign up call to action">
    <div class="container">
      <div style="background: var(--gradient-brand); border-radius: var(--radius-xl); padding: var(--space-12) var(--space-10); display:flex; align-items:center; justify-content:space-between; gap:var(--space-8); flex-wrap:wrap; box-shadow: 0 8px 40px rgba(108,71,255,0.35);">
        <div>
          <h2 style="font-family:var(--font-display); font-size:var(--text-3xl); font-weight:900; color:#fff; margin-bottom:var(--space-2);">Ready to Start Your Journey?</h2>
          <p style="color:rgba(255,255,255,0.85); font-size:var(--text-base);">Join millions of music lovers. Create your free account today.</p>
        </div>
        <div style="display:flex; gap:var(--space-3); flex-wrap:wrap;">
          <a href="/register.php" id="cta-signup-btn" style="background:#fff; color:var(--accent-primary); padding:0.85rem 2rem; border-radius:var(--radius-md); font-weight:700; font-size:var(--text-base); transition:all 0.2s; white-space:nowrap;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 20px rgba(0,0,0,0.2)';" onmouseout="this.style.transform=''; this.style.boxShadow='';">
            Create Free Account
          </a>
          <a href="/about.php" style="border:2px solid rgba(255,255,255,0.5); color:#fff; padding:0.85rem 2rem; border-radius:var(--radius-md); font-weight:600; font-size:var(--text-base); transition:all 0.2s;" onmouseover="this.style.borderColor='#fff';" onmouseout="this.style.borderColor='rgba(255,255,255,0.5)';">
            Learn More
          </a>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>

</main>

<?php include 'components/layout/footer.php'; ?>
<?php include 'components/layout/music-player.php'; ?>

<!-- Scripts -->
<script src="/assets/js/app.js"></script>
<script src="/assets/js/player.js"></script>

</body>
</html>
