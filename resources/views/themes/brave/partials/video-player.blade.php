<div class="video-container mb-3">
    <img src="{{ asset('images/articles/' . $article->image) }}" class="poster" />
    <video src="{{ asset('videos/articles/' . $article->video) }}" type="video/mp4"></video>

    <div class="controls-wrapper">
        <div class="progress-bar">
            <div class="progress"></div>
        </div>
        <ul class="video-controls">
            <li>
                <input type="button" name="play-pause" value="Play" class="play" />
            </li>
            <li><a href="#" class="previous">Previous</a></li>
            <li><a href="#" class="next">Next</a></li>
            <li class="mute-toggle unmuted">
                <input type="checkbox" name="mute" />
            </li>
            <li>
                <input type="range" min="0" max="1" step="0.01" class="volume-slider" />
            </li>
            <li class="timer">
                <span class="current-time"></span><span>/</span><span class="duration"></span>
            </li>
            <li class="playback-rate">
                <span class="rate_display">Normal</span>
                <div class="piker">
                    <ul class="dropdown-content" id="rate_selector">
                        <li data-rate="0.5">0.5x</li>
                        <li data-rate="0.75">0.75x</li>
                        <li data-rate="1">Normal</li>
                        <li data-rate="1.125">1.125x</li>
                        <li data-rate="1.5">1.5x</li>
                        <li data-rate="2">2x</li>
                    </ul>
                </div>
            </li>
            <li class="fullscreen-container">
                <input type="button" name="screen-toggler" value="Fullscreen" class="toggle-fullscreen" />
            </li>
        </ul>
    </div>
</div>
