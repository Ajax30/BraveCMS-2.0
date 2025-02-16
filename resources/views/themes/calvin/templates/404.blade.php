@extends('themes/' .$theme_directory . '/layout')

@section('content')

<!-- content
  ================================================== -->
  <section class="s-content--small-top-padding">
    <div class="row">
      <div class="column large-12">
        <article class="s-content__entry">
          <div class="s-content__media-medium">
            <img src="{{ asset('themes/' . $theme_directory . '/images/404.jpg') }}" alt="{{ $title }}">
          </div>

          <h1 class="s-content__title">{{ $title }}</h1>
          <!-- end s-content__entry-header -->
          <div class="s-content__primary">
            <div class="s-content__page-content">
              <p>{{ $message }}</p>
            </div>
          </div>
      </div>
      <!-- end s-entry__page-content -->
    </div>
    <!-- end s-content__primary -->
    </article> <!-- end entry -->
    </div> <!-- end column -->
    </div> <!-- end row -->
  </section>
  <!-- end s-content -->

@endsection