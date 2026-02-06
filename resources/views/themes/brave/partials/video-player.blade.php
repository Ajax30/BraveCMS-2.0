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
            @if (!empty($article->video))
                <li>
                    @if ($prev_video_article)
                        <a href="{{ url('/show/' . $prev_video_article->slug) }}" class="previous"
                            title="{{ 'Previous video: ' . $prev_video_article->title }}">
                            Previous
                        </a>
                    @endif
                </li>
                <li>
                    @if ($next_video_article)
                        <a href="{{ url('/show/' . $next_video_article->slug) }}" class="next"
                            title="{{ 'Next video: ' . $next_video_article->title }}">
                            Next
                        </a>
                    @endif
                </li>
            @endif
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
