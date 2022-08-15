@extends('themes/' .$theme_directory . '/layout')

@section('content')

<!-- content
  ================================================== -->
  <section class="s-content">
    <div class="row">
      <div class="column large-12">
        <article class="s-content__entry">
          <div class="s-content__media">
            <img src="{{ asset('themes/' . $theme_directory . '/images/page.jpg') }}" alt="{{ $page->title }}">
          </div>
          <!-- end s-content__media -->
          <div class="s-content__entry-header">
            <h1 class="s-content__title">
                {{ $page->title }}
            </h1>
          </div>
          <!-- end s-content__entry-header -->
          <div class="s-content__primary">
            <div class="s-content__page-content">
                {!! $page->content !!}
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