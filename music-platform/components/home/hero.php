<?php
/**
 * hero.php — Homepage Hero Section
 */
?>
<section class="hero" id="hero" aria-label="Welcome section">
  <div class="hero__bg" aria-hidden="true">
    <div class="hero__bg-gradient"></div>
    <div class="hero__grid-lines"></div>
  </div>

  <div class="container" style="position:relative; z-index:1; width:100%;">
    <div class="hero__content animate-fade-in">

      <div class="hero__eyebrow" aria-hidden="true">
        <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><polygon points="5,3 19,12 5,21"/></svg>
        Now Streaming Worldwide
      </div>

      <h1 class="hero__title">
        Feel The<br>
        <span class="text-gradient">Beat. Every</span><br>
        Moment.
      </h1>

      <p class="hero__subtitle">
        Discover millions of songs, follow your favorite artists, and vibe to curated playlists — all in one place. Free forever.
      </p>

      <div class="hero__cta">
        <a href="/explore.php" class="btn btn-primary btn-lg" id="hero-explore-btn">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5,3 19,12 5,21"/></svg>
          Start Listening
        </a>
        <a href="/trending.php" class="btn btn-secondary btn-lg" id="hero-trending-btn">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
          What's Trending
        </a>
      </div>

      <div class="hero__stats" role="list" aria-label="Platform statistics">
        <div class="hero__stat" role="listitem">
          <div class="hero__stat-value" data-count="2400000" data-suffix="+">2,400,000+</div>
          <div class="hero__stat-label">Songs</div>
        </div>
        <div class="hero__stat" role="listitem">
          <div class="hero__stat-value" data-count="85000" data-suffix="+">85,000+</div>
          <div class="hero__stat-label">Artists</div>
        </div>
        <div class="hero__stat" role="listitem">
          <div class="hero__stat-value" data-count="12000000" data-suffix="+">12M+</div>
          <div class="hero__stat-label">Listeners</div>
        </div>
      </div>

    </div>
  </div>

  <!-- Decorative spinning disc -->
  <div class="hero__visual" aria-hidden="true">
    <div class="hero__disc animate-float"></div>
  </div>
</section>
