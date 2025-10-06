document.addEventListener('DOMContentLoaded', () => {

  function toggleFullScreen(elem) {
    if (!document.fullscreenElement) {
      if (elem.requestFullscreen) {
        elem.requestFullscreen();
      } else if (elem.webkitRequestFullscreen) {
        elem.webkitRequestFullscreen();
      } else if (elem.msRequestFullscreen) {
        elem.msRequestFullscreen();
      }
    } else {
      if (document.exitFullscreen) {
        document.exitFullscreen();
      } else if (document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
      } else if (document.msExitFullscreen) {
        document.msExitFullscreen();
      }
    }
  }

  String.prototype.timeFormat = function () {
    let sec_num = parseInt(this, 10);
    let hours = Math.floor(sec_num / 3600);
    let minutes = Math.floor((sec_num - (hours * 3600)) / 60);
    let seconds = sec_num - (hours * 3600) - (minutes * 60);

    if (hours < 10) hours = "0" + hours;
    if (minutes < 10) minutes = "0" + minutes;
    if (seconds < 10) seconds = "0" + seconds;

    return hours > 0 ? `${hours}:${minutes}:${seconds}` : `${minutes}:${seconds}`;
  };

  document.querySelectorAll('video').forEach(video => {
    const container = video.closest('.video-container');
    const playBtn = container.querySelector('input[name="play-pause"]');
    const poster = document.querySelector('.poster');
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

    function updatePlayPause() {
      if (video.paused) {
        playBtn.value = 'Play';
        playBtn.classList.remove('pause');
        playBtn.classList.add('play');
      } else {
        playBtn.value = 'Pause';
        playBtn.classList.remove('play');
        playBtn.classList.add('pause');
      }
    }

    playBtn.addEventListener('click', () => {
      if (video.paused) {
        video.play();
        poster.style.display = 'none';
      } else {
        video.pause()
      }
      updatePlayPause();
      updateRateDisplay();
    });

    muteToggle.addEventListener('click', () => {
      video.muted = muteCheckbox.checked;
      muteToggle.classList.toggle('muted', video.muted);
    });

    volumeSlider.addEventListener('input', () => {
      video.volume = volumeSlider.value;
      if (video.volume == 0) {
        muteCheckbox.checked = true;
        video.muted = true;
        muteToggle.classList.add('muted');
      } else {
        muteCheckbox.checked = false;
        video.muted = false;
        muteToggle.classList.remove('muted');
      }
    });

    function updateProgress() {
      const percent = (video.currentTime / video.duration) * 100;
      progress.style.width = `${percent}%`;
    }

    video.addEventListener('timeupdate', () => {
      updateProgress();
      currentTimeEl.textContent = Math.round(video.currentTime).toString().timeFormat();
      durationEl.textContent = Math.round(video.duration).toString().timeFormat();
      if (video.currentTime === video.duration) updatePlayPause();
    });

    progressBar.addEventListener('click', e => {
      const rect = progressBar.getBoundingClientRect();
      const x = e.clientX - rect.left;
      video.currentTime = (x / progressBar.offsetWidth) * video.duration;
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

    function updateRateDisplay() {
      const rate = video.playbackRate;
      rateDisplay.textContent = rate === 1 ? 'Normal' : `${rate}x`;
    }

    rateOptions.forEach(opt => {
      opt.addEventListener('click', () => {
        const rate = parseFloat(opt.dataset.rate);
        video.playbackRate = rate;
        updateRateDisplay();
      });
    });

    video.addEventListener('loadedmetadata', () => {
      currentTimeEl.textContent = Math.round(video.currentTime).toString().timeFormat();
      durationEl.textContent = Math.round(video.duration).toString().timeFormat();
    });
  });
});
