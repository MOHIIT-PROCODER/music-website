/**
 * player.js — Music Player Logic
 */
const BeatWavePlayer = (function () {
  'use strict';

  let audio = new Audio();
  let currentSong = null;
  let isPlaying = false;
  let queue = [];
  let queueIndex = -1;
  let isShuffle = false;
  let repeatMode = 0; // 0=off, 1=repeat-all, 2=repeat-one
  let volumeLevel = 0.8;

  // DOM refs
  const dom = {};

  function init() {
    dom.player     = document.querySelector('.music-player');
    dom.playBtn    = document.getElementById('player-play-btn');
    dom.prevBtn    = document.getElementById('player-prev-btn');
    dom.nextBtn    = document.getElementById('player-next-btn');
    dom.shuffleBtn = document.getElementById('player-shuffle-btn');
    dom.repeatBtn  = document.getElementById('player-repeat-btn');
    dom.cover      = document.getElementById('player-cover');
    dom.title      = document.getElementById('player-title');
    dom.artist     = document.getElementById('player-artist');
    dom.progress   = document.getElementById('player-progress-fill');
    dom.progressBar= document.getElementById('player-progress-bar');
    dom.currentTime= document.getElementById('player-current-time');
    dom.duration   = document.getElementById('player-duration');
    dom.volume     = document.getElementById('player-volume');
    dom.likeBtn    = document.getElementById('player-like-btn');

    if (!dom.player) return;

    audio.volume = volumeLevel;

    // Events
    if (dom.playBtn)    dom.playBtn.addEventListener('click', togglePlay);
    if (dom.prevBtn)    dom.prevBtn.addEventListener('click', playPrev);
    if (dom.nextBtn)    dom.nextBtn.addEventListener('click', playNext);
    if (dom.shuffleBtn) dom.shuffleBtn.addEventListener('click', toggleShuffle);
    if (dom.repeatBtn)  dom.repeatBtn.addEventListener('click', cycleRepeat);
    if (dom.volume)     dom.volume.addEventListener('input', setVolume);
    if (dom.progressBar) dom.progressBar.addEventListener('click', seek);

    audio.addEventListener('timeupdate', updateProgress);
    audio.addEventListener('ended',      onEnded);
    audio.addEventListener('loadedmetadata', updateDuration);
    audio.addEventListener('play',  () => setPlayState(true));
    audio.addEventListener('pause', () => setPlayState(false));

    // Play buttons on song cards / rows
    document.addEventListener('click', function (e) {
      const btn = e.target.closest('[data-play-song]');
      if (btn) {
        const data = {
          id:     btn.dataset.songId,
          title:  btn.dataset.songTitle  || 'Unknown',
          artist: btn.dataset.songArtist || 'Unknown',
          cover:  btn.dataset.songCover  || '',
          src:    btn.dataset.songSrc    || '',
        };
        playSong(data);
      }
    });
  }

  function playSong(song) {
    currentSong = song;
    audio.src = song.src || '';
    audio.play().catch(() => {});

    // Update player UI
    if (dom.title)  dom.title.textContent  = song.title;
    if (dom.artist) dom.artist.textContent = song.artist;
    if (dom.cover && song.cover) {
      dom.cover.src = song.cover;
      dom.cover.style.display = 'block';
    }

    // Highlight playing rows
    document.querySelectorAll('.song-row').forEach(row => row.classList.remove('playing'));
    const activeRow = document.querySelector(`[data-song-id="${song.id}"]`);
    if (activeRow) activeRow.closest('.song-row')?.classList.add('playing');
  }

  function togglePlay() {
    if (!currentSong) return;
    if (isPlaying) audio.pause();
    else audio.play().catch(() => {});
  }

  function setPlayState(playing) {
    isPlaying = playing;
    if (!dom.playBtn) return;
    dom.playBtn.innerHTML = playing
      ? `<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg>`
      : `<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><polygon points="5,3 19,12 5,21"/></svg>`;
  }

  function playNext() {
    if (queue.length === 0) return;
    if (isShuffle) {
      queueIndex = Math.floor(Math.random() * queue.length);
    } else {
      queueIndex = (queueIndex + 1) % queue.length;
    }
    playSong(queue[queueIndex]);
  }

  function playPrev() {
    if (audio.currentTime > 3) { audio.currentTime = 0; return; }
    if (queue.length === 0) return;
    queueIndex = (queueIndex - 1 + queue.length) % queue.length;
    playSong(queue[queueIndex]);
  }

  function toggleShuffle() {
    isShuffle = !isShuffle;
    dom.shuffleBtn?.classList.toggle('active', isShuffle);
  }

  function cycleRepeat() {
    repeatMode = (repeatMode + 1) % 3;
    if (dom.repeatBtn) {
      dom.repeatBtn.classList.toggle('active', repeatMode > 0);
      dom.repeatBtn.title = ['Repeat off', 'Repeat all', 'Repeat one'][repeatMode];
    }
  }

  function onEnded() {
    if (repeatMode === 2) { audio.play(); return; }
    if (queue.length > 0) playNext();
  }

  function updateProgress() {
    if (!audio.duration) return;
    const pct = (audio.currentTime / audio.duration) * 100;
    if (dom.progress) dom.progress.style.width = pct + '%';
    if (dom.currentTime) dom.currentTime.textContent = formatTime(audio.currentTime);
  }

  function updateDuration() {
    if (dom.duration) dom.duration.textContent = formatTime(audio.duration);
  }

  function seek(e) {
    const rect = dom.progressBar.getBoundingClientRect();
    const pct  = (e.clientX - rect.left) / rect.width;
    audio.currentTime = pct * audio.duration;
  }

  function setVolume(e) {
    volumeLevel = parseFloat(e.target.value);
    audio.volume = volumeLevel;
  }

  function formatTime(sec) {
    if (!sec || isNaN(sec)) return '0:00';
    const m = Math.floor(sec / 60);
    const s = Math.floor(sec % 60).toString().padStart(2, '0');
    return `${m}:${s}`;
  }

  function setQueue(songs, startIndex = 0) {
    queue = songs;
    queueIndex = startIndex;
    playSong(songs[startIndex]);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

  return { playSong, setQueue, togglePlay, playNext, playPrev };
})();
