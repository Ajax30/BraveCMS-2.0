@extends('themes/' .$theme_directory . '/layout')

@section('content')

<!-- Page Header -->
<header class="masthead" style="background-image: url({{ asset('themes/' . $theme_directory . '/img/home-bg.jpg') }}">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>{{ $page->title }}</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        {!! $page->content !!}
      </div>
    </div>
  </div>

  <hr>

@endsection