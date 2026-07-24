<?php
/**
 * search.php — Global Search Page
 */
session_start();
$query = isset($_GET['q']) ? trim($_GET['q']) : '';
$pageTitle       = ($query !== '') ? "Search: $query — BeatWave" : 'Search — BeatWave';
$pageDescription = 'Search for songs, artists, albums, and playlists on BeatWave.';

include 'components/layout/head.php';
include 'components/layout/navbar.php';
?>

<main class="page-wrapper" id="main-content">
  <div class="container section">
    
    <div style="max-width:800px; margin:0 auto; text-align:center;">
      <h1 class="display-2" style="margin-bottom:var(--space-6);">What do you want to listen to?</h1>
      
      <form action="/search.php" method="GET" style="position:relative;" role="search">
        <svg style="position:absolute; left:20px; top:50%; transform:translateY(-50%); color:var(--text-muted);" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        <input type="search" name="q" class="input" placeholder="Artists, songs, or podcasts..." 
               value="<?= htmlspecialchars($query) ?>" autofocus 
               style="padding-left:56px; height:64px; font-size:1.2rem; border-radius:99px; box-shadow:var(--shadow-md);">
        <button type="submit" class="btn btn-primary" style="position:absolute; right:8px; top:8px; bottom:8px; border-radius:99px; padding:0 24px;">Search</button>
      </form>
    </div>

    <?php if ($query !== ''): ?>
    <div style="margin-top:var(--space-10);">
      <h2 class="heading-3" style="margin-bottom:var(--space-6);">Search Results for "<?= htmlspecialchars($query) ?>"</h2>
      
      <!-- Fake Results Demo -->
      <div class="search-tabs" style="margin-bottom:var(--space-6);">
        <button class="search-tab active">Top Results</button>
        <button class="search-tab">Songs</button>
        <button class="search-tab">Artists</button>
        <button class="search-tab">Albums</button>
      </div>

      <div style="display:grid; grid-template-columns:1fr 2fr; gap:var(--space-6);">
        <!-- Top Result -->
        <div>
          <h3 class="heading-4" style="margin-bottom:var(--space-4);">Top Result</h3>
          <div style="padding:var(--space-5); background:var(--glass-bg); border-radius:var(--radius-lg); border:1px solid var(--border-subtle); display:flex; flex-direction:column; gap:var(--space-4); cursor:pointer; transition:all 0.2s;" class="hover-elevate">
            <img src="https://picsum.photos/seed/sr1/120/120" style="width:100px; height:100px; border-radius:50%; object-fit:cover;" alt="Artist">
            <div>
              <div class="display-4" style="margin-bottom:4px;"><?= htmlspecialchars($query) ?></div>
              <div style="color:var(--text-secondary); display:flex; gap:8px; align-items:center;">
                <span class="badge badge-primary">Artist</span>
                <span>850K Followers</span>
              </div>
            </div>
            <button class="btn btn-play" style="position:absolute; bottom:20px; right:20px; width:50px; height:50px; border-radius:50%; box-shadow:var(--shadow-md);"><svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><polygon points="5,3 19,12 5,21"/></svg></button>
          </div>
        </div>

        <!-- Songs -->
        <div>
          <h3 class="heading-4" style="margin-bottom:var(--space-4);">Songs</h3>
          <div role="list">
            <?php for($i=1; $i<=4; $i++): ?>
            <div class="song-row" style="grid-template-columns: 50px 1fr auto;" tabindex="0" data-play-song data-song-title="<?= htmlspecialchars($query) ?> Mix <?= $i ?>" data-song-artist="Various Artists" data-song-cover="https://picsum.photos/seed/s<?= $i ?>/50/50">
              <img class="song-row__cover" src="https://picsum.photos/seed/s<?= $i ?>/50/50" alt="">
              <div>
                <div class="song-row__title"><?= htmlspecialchars($query) ?> Mix <?= $i ?></div>
                <div class="song-row__artist">Various Artists</div>
              </div>
              <div class="song-row__actions">
                <button class="btn-favorite"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg></button>
              </div>
            </div>
            <?php endfor; ?>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>

  </div>
</main>

<?php include 'components/layout/footer.php'; ?>
<?php include 'components/layout/music-player.php'; ?>
<script src="/assets/js/app.js"></script>
<script src="/assets/js/player.js"></script>
</body>
</html>
