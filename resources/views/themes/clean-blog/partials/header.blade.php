<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $site_name }} | {{ $tagline }}</title>

			@if (boolval($is_cookieconsent))
				<link href="{{ asset('lib/cookieconsent/css/cookies.css') }}" rel="stylesheet">
				<script src="{{ asset('lib/cookieconsent/js/cookieconsent.min.js') }}"></script>
			@endif

		  <!-- Bootstrap core CSS -->
			<link href="{{ asset('themes/' . $theme_directory . '/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

			<!-- Custom fonts for this template -->
			<link href="{{ asset('themes/' . $theme_directory . '/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
			<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
			<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
		
			<!-- Custom styles for this template -->
			<link href="{{ asset('themes/' . $theme_directory . '/css/clean-blog.min.css') }}" rel="stylesheet">

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
					@if (count($categories))
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
						<div class="dropdown-menu overflow-hidden py-0">
							@foreach ($categories as $category)
								<a class="dropdown-item text-secondary" href="{{ url('/category/' . $category->id) }}">{{ $category->name	}}</a>
            	@endforeach
						</div>
					</li>
          @endif

					@if (count($pages))
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
						<div class="dropdown-menu overflow-hidden py-0">
							@foreach ($pages as $page)
								<a class="dropdown-item text-secondary" href="{{ url('/page/' . $page->id) }}">{{ $page->title	}}</a>
            	@endforeach
						</div>
					</li>
          @endif

					<li class="nav-item">
            <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>