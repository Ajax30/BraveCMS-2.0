<!-- footer
    ================================================== -->
<footer class="s-footer">
    <div class="s-footer__main">
        <div class="row">
            <div class="column large-3 medium-6 tab-12 s-footer__info">
                <h5>About Our Site</h5>
                <p>Theme by StyleShout. Programming by Razvan Zamfir.</p>
            </div> <!-- end s-footer__info -->
            <div class="column large-2 medium-3 tab-6 s-footer__site-links">
                <h5>Site Links</h5>
                @if (count($pages))
                    <ul>
                        @foreach ($pages as $page)
                            <li><a href="{{ url('/page/' . $page->id) }}">{{ $page->title }}</a></li>
                        @endforeach
                    </ul>
                @endif
            </div> <!-- end s-footer__site-links -->
            <div class="column large-2 medium-3 tab-6 s-footer__social-links">
                <h5>Follow Us</h5>
                <ul>
                    <li><a href="{{ $twitter }}">Twitter</a></li>
                    <li><a href="{{ $facebook }}">Facebook</a></li>
                    <li><a href="{{ $instagram }}">Instagram</a></li>
                </ul>
            </div> <!-- end s-footer__social links -->
            @include('themes/' . $theme_directory . '/partials/newsletter-form')
        </div> <!-- end row -->
    </div> <!-- end s-footer__main -->

    <div class="s-footer__bottom">
        <div class="row">
            <div class="column">
                <div class="ss-copyright">
                    <span>© Copyright Calvin 2020</span>
                    <span>Design by <a href="https://www.styleshout.com/">StyleShout</a></span>
                </div> <!-- end ss-copyright -->
            </div>
        </div>

        <div class="ss-go-top">
            <a class="smoothscroll" title="Back to Top" href="#top">
                <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15">
                    <path d="M7.5 1.5l.354-.354L7.5.793l-.354.353.354.354zm-.354.354l4 4 .708-.708-4-4-.708.708zm0-.708l-4 4 .708.708 4-4-.708-.708zM7 1.5V14h1V1.5H7z" fill="currentColor"></path>
                </svg>
            </a>
        </div> <!-- end ss-go-top -->
    </div> <!-- end s-footer__bottom -->

</footer> <!-- end s-footer -->


<!-- Java Script
================================================== -->
<script src="{{ asset('themes/' . $theme_directory . '/js/jquery-3.5.0.min.js') }}"></script>
<script src="{{ asset('themes/' . $theme_directory . '/js/plugins.js') }}"></script>
<script src="{{ asset('themes/' . $theme_directory . '/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('themes/' . $theme_directory . '/js/newsletter.js') }}"></script>
@yield('custom_js_files') 
<script src="{{ asset('themes/' . $theme_directory . '/js/main.js') }}"></script>
@if (boolval($is_cookieconsent))
  @include('partials/cookieconsent')
@endif
</body>
</html>
