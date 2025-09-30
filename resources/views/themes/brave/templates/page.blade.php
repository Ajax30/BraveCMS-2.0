@extends('themes/' . $theme_directory . '/layout')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-xs-12 col-sm-7 col-lg-8 col-xl-9">
              <main class="content">
                  <h2 class="page-title display-4 text-center text-md-start">{{ $page->title }}</h2>
                  <div class="page-content">
                    {!! $page->content !!}
                  </div>
              </main>
          </div>
          <div class="col-xs-12 col-sm-5 col-lg-4 col-xl-3">
              @include('themes/' . $theme_directory . '/partials/sidebar') 
          </div>
      </div>
  </div>
@endsection