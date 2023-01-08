  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="{{ $twitter }}" target="_blank">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="{{ $facebook }}" target="_blank">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="mailto:{{ $owner_email }}" target="_blank">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fas fa-envelope fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; {{ $owner_name }} 2022 </p>
        </div>
      </div>
    </div> 
  </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('themes/' . $theme_directory . '/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('themes/' . $theme_directory . '/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Custom scripts for this template -->
    <script src="{{ asset('themes/' . $theme_directory . '/js/clean-blog.js') }}"></script>
    
    @if (boolval($is_cookieconsent))
      @include('partials/cookieconsent')
  	@endif
</body>
</html>