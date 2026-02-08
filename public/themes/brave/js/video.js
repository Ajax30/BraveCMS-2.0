document.addEventListener('DOMContentLoaded', () => {

  String.prototype.timeFormat = function () {
    let sec = parseInt(this, 10);
    let h = Math.floor(sec / 3600);
    let m = Math.floor((sec % 3600) / 60);
    let s = sec % 60;
    if (h < 10) h = '0' + h;
    if (m < 10) m = '0' + m;
    if (s < 10) s = '0' + s;
    return h > 0 ? `${h}:${m}:${s}` : `${m}:${s}`;
  };

  function toggleFullScreen(elem) {
    if (!document.fullscreenElement) {
      elem.requestFullscreen?.() || elem.webkitRequestFullscreen?.() || elem.msRequestFullscreen?.();
    } else {
      document.exitFullscreen?.() || document.webkitExitFullscreen?.() || document.msExitFullscreen?.();
    }
  }

  document.querySelectorAll('.video-container').forEach(container => {
    const video = container.querySelector('video');
    const poster = container.querySelector('.poster');
    const spinner = container.querySelector('.loading-spinner');
    const playBtn = container.querySelector('input[name="play-pause"]');
    const progressBar = container.querySelector('.progress-bar');
    const progress = container.querySelector('.progress');
    const currentTimeEl = container.querySelector('.current-time');
    const durationEl = container.querySelector('.duration');
    const volumeSlider = container.querySelector('.volume-slider');
    const muteToggle = container.querySelector('.mute-toggle');
    const muteCheckbox = muteToggle.querySelector('input[type="checkbox"]');
    const rateDisplay = container.querySelector('.rate_display');
    const fullscreenBtn = container.querySelector('input[name="screen-toggler"]');
    const rateOptions = container.querySelectorAll('.playback-rate ul li');

    let manualPaused = false;
    let isTryingToPlay = false;

    function isBuffered(time) {
      for (let i = 0; i < video.buffered.length; i++) {
        if (time >= video.buffered.start(i) && time <= video.buffered.end(i)) return true;
      }
      return false;
    }

    function showSpinner() { spinner.style.opacity = 1; }
    function hideSpinner() { spinner.style.opacity = 0; }

    function updatePlayPause() {
      if (video.paused || !isBuffered(video.currentTime)) {
        playBtn.value = 'Play';
        playBtn.classList.add('play'); playBtn.classList.remove('pause');
      } else {
        playBtn.value = 'Pause';
        playBtn.classList.remove('play'); playBtn.classList.add('pause');
      }
    }

    function updateProgress() {
      const dur = isFinite(video.duration) ? video.duration : 0;
      const cur = isFinite(video.currentTime) ? video.currentTime : 0;
      const percent = dur > 0 ? (cur / dur) * 100 : 0;
      progress.style.width = percent + '%';
      currentTimeEl.textContent = Math.round(cur).toString().timeFormat();
      durationEl.textContent = dur > 0 ? Math.round(dur).toString().timeFormat() : '--:--';
    }

    function attemptPlay() {
      if (manualPaused || isTryingToPlay) return;
      isTryingToPlay = true;
      if (isBuffered(video.currentTime)) {
        video.play().then(() => {
          hideSpinner();
          isTryingToPlay = false;
          updatePlayPause();
        }).catch(() => {
          showSpinner();
          isTryingToPlay = false;
        });
      } else {
        showSpinner();
        isTryingToPlay = false;
      }
    }

    playBtn.addEventListener('click', () => {
      manualPaused = video.paused ? false : true;
      if (!manualPaused) {
        poster.style.display = 'none';
        attemptPlay();
      } else {
        video.pause();
      }
      updatePlayPause();
    });

    volumeSlider.addEventListener('input', () => {
      video.volume = volumeSlider.value;
      video.muted = video.volume === 0;
      muteCheckbox.checked = video.muted;
      muteToggle.classList.toggle('muted', video.muted);
    });

    muteToggle.addEventListener('click', () => {
      video.muted = muteCheckbox.checked;
      muteToggle.classList.toggle('muted', video.muted);
    });

    progressBar.addEventListener('click', e => {
      const rect = progressBar.getBoundingClientRect();
      const dur = isFinite(video.duration) && video.duration > 0 ? video.duration : 100;
      const newTime = ((e.clientX - rect.left) / rect.width) * dur;
      video.currentTime = newTime;
      updateProgress();
      attemptPlay();
    });

    fullscreenBtn.addEventListener('click', () => {
      container.classList.toggle('fullscreen');
      fullscreenBtn.classList.toggle('exit');
      toggleFullScreen(document.body);
    });

    document.addEventListener('fullscreenchange', () => {
      if (!document.fullscreenElement) {
        container.classList.remove('fullscreen');
        fullscreenBtn.classList.remove('exit');
      }
    });

    rateOptions.forEach(opt => {
      opt.addEventListener('click', () => {
        video.playbackRate = parseFloat(opt.dataset.rate);
        rateDisplay.textContent = video.playbackRate === 1 ? 'Normal' : video.playbackRate + 'x';
      });
    });

    video.addEventListener('loadedmetadata', updateProgress);
    video.addEventListener('timeupdate', updateProgress);
    video.addEventListener('waiting', showSpinner);
    video.addEventListener('stalled', showSpinner);
    video.addEventListener('seeking', showSpinner);

    video.addEventListener('playing', () => { hideSpinner(); updatePlayPause(); });
    video.addEventListener('canplay', () => { hideSpinner(); updatePlayPause(); });
    video.addEventListener('pause', updatePlayPause);
    video.addEventListener('ended', updatePlayPause);

    video.addEventListener('seeked', () => {
      updateProgress();
      if (!manualPaused) attemptPlay();
      updatePlayPause();
    });
  });
});
