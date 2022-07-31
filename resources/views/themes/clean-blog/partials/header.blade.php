<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $site_name }} | {{ $tagline }}</title>

		  <!-- Bootstrap core CSS -->
			<link href="{{ asset('themes/' . $theme_directory . '/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

			<!-- Custom fonts for this template -->
			<link href="{{ asset('themes/' . $theme_directory . '/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
			<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
			<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
		
			<!-- Custom styles for this template -->
			<link href="{{ asset('themes/' . $theme_directory . '/css/clean-blog.css') }}" rel="stylesheet">
</head>
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">{{ $site_name }}</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>

			{{-- Search form --}}
			<form method="get" action="{{ url('/') }}" id="search_form" class="w-100 pt-1 pb-1 pr-lg-3" accept-charset="utf-8">
				<div id="group-search" class="input-group">
					<input class="form-control" type="text" name="search" placeholder="Search articles..." aria-label="Search">
					<div class="input-group-append">
						<button class="btn btn-sm btn-light" type="submit"><i class="fa fa-search"></i></button>
					</div>
				</div>
			</form>

      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">Home</a>
          </li>
          {{-- @if (count($pages))
            @foreach ($pages as $page)
            <li class="nav-item">
              <a class="nav-link" href="#">{{ $page->title}}</a>
            </li>
            @endforeach
          @endif --}}
        </ul>
      </div>
    </div>
  </nav>