<?php
/**
 * music-player.php — Sticky bottom music player bar
 */
?>
<div class="music-player" id="music-player" role="region" aria-label="Music player">

  <!-- Left: Song Info -->
  <div class="player__song-info">
    <div class="player__cover-placeholder" id="player-cover-wrap">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
        <path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/>
      </svg>
    </div>
    <img id="player-cover" class="player__cover" src="" alt="Song cover" style="display:none;" loading="lazy">
    <div class="player__meta">
      <div class="player__title" id="player-title">No song playing</div>
      <div class="player__artist" id="player-artist">–</div>
    </div>
    <button class="btn-icon-round player__like" id="player-like-btn" aria-label="Like song" title="Add to favorites">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/>
      </svg>
    </button>
  </div>

  <!-- Center: Controls + Progress -->
  <div class="player__controls">
    <div class="player__buttons">

      <!-- Shuffle -->
      <button class="player__btn" id="player-shuffle-btn" aria-label="Shuffle" title="Shuffle">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <polyline points="16 3 21 3 21 8"/><line x1="4" y1="20" x2="21" y2="3"/>
          <polyline points="21 16 21 21 16 21"/><line x1="15" y1="15" x2="21" y2="21"/>
          <line x1="4" y1="4" x2="9" y2="9"/>
        </svg>
      </button>

      <!-- Previous -->
      <button class="player__btn" id="player-prev-btn" aria-label="Previous track" title="Previous">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
          <polygon points="19,20 9,12 19,4"/><line x1="5" y1="19" x2="5" y2="5" stroke="currentColor" stroke-width="2" fill="none"/>
        </svg>
      </button>

      <!-- Play / Pause -->
      <button class="player__play-btn" id="player-play-btn" aria-label="Play/Pause" title="Play/Pause">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
          <polygon points="5,3 19,12 5,21"/>
        </svg>
      </button>

      <!-- Next -->
      <button class="player__btn" id="player-next-btn" aria-label="Next track" title="Next">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
          <polygon points="5,4 15,12 5,20"/><line x1="19" y1="5" x2="19" y2="19" stroke="currentColor" stroke-width="2" fill="none"/>
        </svg>
      </button>

      <!-- Repeat -->
      <button class="player__btn" id="player-repeat-btn" aria-label="Repeat" title="Repeat off">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <polyline points="17 1 21 5 17 9"/><path d="M3 11V9a4 4 0 014-4h14"/>
          <polyline points="7 23 3 19 7 15"/><path d="M21 13v2a4 4 0 01-4 4H3"/>
        </svg>
      </button>

    </div>

    <!-- Progress -->
    <div class="player__progress">
      <span class="player__time" id="player-current-time">0:00</span>
      <div class="progress-bar" id="player-progress-bar" role="slider" aria-label="Seek" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" tabindex="0">
        <div class="progress-bar__fill" id="player-progress-fill" style="width:0%"></div>
      </div>
      <span class="player__time" id="player-duration">0:00</span>
    </div>
  </div>

  <!-- Right: Volume & Queue -->
  <div class="player__extras">

    <!-- Queue -->
    <button class="player__btn player__queue-btn" id="player-queue-btn" aria-label="Queue" title="View queue">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/>
        <line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/>
      </svg>
    </button>

    <!-- Volume -->
    <div class="player__volume-wrap">
      <button class="player__btn" id="player-mute-btn" aria-label="Toggle mute" title="Mute">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/><path d="M19.07 4.93a10 10 0 010 14.14"/><path d="M15.54 8.46a5 5 0 010 7.07"/>
        </svg>
      </button>
      <input type="range" class="player__volume-slider" id="player-volume" min="0" max="1" step="0.01" value="0.8" aria-label="Volume">
    </div>

  </div>
</div>
