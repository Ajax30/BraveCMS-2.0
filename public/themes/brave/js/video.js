document.addEventListener('DOMContentLoaded', () => {
  class VideoPlayer {
    constructor(container) {
      this.container = container;
      this.video = container.querySelector('video');
      this.poster = container.querySelector('.poster');
      this.spinner = container.querySelector('.loading-spinner');
      this.playBtn = container.querySelector('[name="play-pause"]');
      this.progressBar = container.querySelector('.progress-bar');
      this.progress = container.querySelector('.progress');
      this.tooltip = container.querySelector('.seek-tooltip');
      this.currentTimeEl = container.querySelector('.current-time');
      this.durationEl = container.querySelector('.duration');
      this.volumeSlider = container.querySelector('.volume-slider');
      this.muteToggle = container.querySelector('.mute-toggle');
      this.muteCheckbox = this.muteToggle.querySelector('input');
      this.rateDisplay = container.querySelector('.rate_display');
      this.fullscreenBtn = container.querySelector('[name="screen-toggler"]');
      this.rateOptions = container.querySelectorAll('.playback-rate li');

      this.started = false;
      this.isTrying = false;
      this.wasPlayingBeforeSeek = false;

      this.init();
    }

    init() {
      this.bindEvents();
      this.updateProgress();
      this.updatePlayState();
    }

    formatTime(sec) {
      sec = Math.floor(sec || 0);
      const h = Math.floor(sec / 3600);
      const m = Math.floor((sec % 3600) / 60);
      const s = sec % 60;
      const pad = n => n.toString().padStart(2, '0');
      return h ? `${pad(h)}:${pad(m)}:${pad(s)}` : `${pad(m)}:${pad(s)}`;
    }

    showSpinner() { this.spinner.style.opacity = 1; }
    hideSpinner() { this.spinner.style.opacity = 0; }

    updatePlayState() {
      const paused = this.video.paused;
      this.playBtn.value = paused ? 'Play' : 'Pause';
      this.playBtn.classList.toggle('play', paused);
      this.playBtn.classList.toggle('pause', !paused);
    }

    updateProgress() {
      const dur = this.video.duration || 0;
      const cur = this.video.currentTime || 0;
      this.progress.style.width = dur ? (cur / dur) * 100 + '%' : '0%';
      this.currentTimeEl.textContent = this.formatTime(cur);
      this.durationEl.textContent = dur ? this.formatTime(dur) : '--:--';
    }

    async play() {
      if (!this.started || this.isTrying) return;
      this.isTrying = true;
      this.showSpinner();
      try { await this.video.play(); } catch {}
      this.hideSpinner();
      this.isTrying = false;
      this.updatePlayState();
    }

    togglePlayback() {
      if (!this.started) {
        this.started = true;
        this.poster.style.display = 'none';
        this.play();
        return;
      }
      this.video.paused ? this.play() : this.video.pause();
    }

    seek(e) {
      const rect = this.progressBar.getBoundingClientRect();
      const dur = this.video.duration || 0;
      if (!dur) return;

      this.wasPlayingBeforeSeek = !this.video.paused;
      this.video.currentTime = ((e.clientX - rect.left) / rect.width) * dur;
      this.updateProgress();

      if (!this.started) this.poster.style.display = 'none';
    }

    async handleSeeked() {
      this.hideSpinner();
      if (this.wasPlayingBeforeSeek) {
        try { await this.video.play(); } catch {}
      }
      this.updatePlayState();
    }

    updateTooltip(e) {
      const rect = this.progressBar.getBoundingClientRect();
      const percent = (e.clientX - rect.left) / rect.width;
      const time = percent * (this.video.duration || 0);
      this.tooltip.textContent = this.formatTime(time);
      this.tooltip.style.left = `${percent * 100}%`;
      this.tooltip.style.opacity = 1;
    }

    hideTooltip() {
      this.tooltip.style.opacity = 0;
    }

    bindEvents() {

      this.playBtn.addEventListener('click', () => this.togglePlayback());
      this.video.addEventListener('click', () => this.togglePlayback());
      this.progressBar.addEventListener('click', e => this.seek(e));

      this.progressBar.addEventListener('mousemove', e => this.updateTooltip(e));
      this.progressBar.addEventListener('mouseleave', () => this.hideTooltip());

      this.volumeSlider.addEventListener('input', () => {
        this.video.volume = this.volumeSlider.value;
        this.video.muted = this.video.volume === 0;
        this.muteCheckbox.checked = this.video.muted;
        this.muteToggle.classList.toggle('muted', this.video.muted);
      });

      this.muteToggle.addEventListener('click', () => {
        this.video.muted = this.muteCheckbox.checked;
        this.muteToggle.classList.toggle('muted', this.video.muted);
      });

      this.fullscreenBtn.addEventListener('click', () => {
        this.container.classList.toggle('fullscreen');
        this.fullscreenBtn.classList.toggle('exit');
        !document.fullscreenElement
          ? this.container.requestFullscreen?.()
          : document.exitFullscreen?.();
      });

      this.rateOptions.forEach(opt => {
        opt.addEventListener('click', () => {
          this.video.playbackRate = parseFloat(opt.dataset.rate);
          this.rateDisplay.textContent =
            this.video.playbackRate === 1 ? 'Normal' : this.video.playbackRate + 'x';
        });
      });

      ['waiting', 'stalled', 'seeking']
        .forEach(e => this.video.addEventListener(e, () => this.showSpinner()));

      this.video.addEventListener('seeked', () => this.handleSeeked());
      this.video.addEventListener('playing', () => { this.hideSpinner(); this.updatePlayState(); });
      this.video.addEventListener('pause', () => this.updatePlayState());
      this.video.addEventListener('timeupdate', () => this.updateProgress());
      this.video.addEventListener('loadedmetadata', () => this.updateProgress());
      this.video.addEventListener('ended', () => {
        this.started = false;
        this.poster.style.display = '';
        this.updatePlayState();
      });

      document.addEventListener('fullscreenchange', () => {
        if (!document.fullscreenElement) {
          this.container.classList.remove('fullscreen');
          this.fullscreenBtn.classList.remove('exit');
        }
      });
    }
  }

  document.querySelectorAll('.video-container')
    .forEach(container => new VideoPlayer(container));

});