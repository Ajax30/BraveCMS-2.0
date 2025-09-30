  <div class="site-footer-wrapper">
      <div class="footer-copyright">
          <p class="text-center">Copyright &copy; {{ $owner_name }} 2022 - {{ \Carbon\Carbon::now()->format('Y') }}</p>
      </div>
  </div>
  </div>

  <script src="{{ asset('themes/' . $theme_directory . '/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('themes/' . $theme_directory . '/js/newsletter.js') }}"></script>
  
  @if (Route::is('show'))
      {{-- Scripts for single.blade.php only --}}
      <script src="{{ asset('themes/' . $theme_directory . '/js/print.min.js') }}"></script>
      <script src="{{ asset('themes/' . $theme_directory . '/js/share.js') }}"></script>
      {{-- Include video.js if the article has a video --}}
      @if ($article->video)
          <script src="{{ asset('themes/' . $theme_directory . '/js/video.js') }}"></script>
      @endif
       <script src="{{ asset('themes/' . $theme_directory . '/js/comments.js') }}"></script>
  @endif

  @if (boolval($is_cookieconsent))
      @include('partials/cookieconsent')
  @endif
  </body>
  </html>
