<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
		<title>{{ $site_name }} | {{ $tagline }}</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link href="{{ asset('themes/' . $theme_directory . '/css/vendor.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/' . $theme_directory . '/css/styles.css') }}" rel="stylesheet">

    <!-- script
    ================================================== -->
    <script src="{{ asset('themes/' . $theme_directory . '/js/modernizr.js') }}"></script>
    <script src="{{ asset('themes/' . $theme_directory . '/js/fontawesome/all.min.js') }}"></script>

    <!-- favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"  href="{{ asset('themes/' . $theme_directory . '/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"  href="{{ asset('themes/' . $theme_directory . '/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('themes/' . $theme_directory . '/site.webmanifest') }}">

</head>

<body id="top">


    <!-- preloader
    ================================================== -->
    <div id="preloader"> 
    	<div id="loader"></div>
    </div>


    <!-- header
    ================================================== -->
    <header class="s-header {{ request()->route()->getName() == 'homepage' ? '' : 's-header--opaque' }}">

        <div class="s-header__logo">
            <a class="logo" href="{{ url('/')}}">
                <img src="{{ asset('themes/' . $theme_directory . '/images/logo.svg') }}" alt="Homepage">
            </a>
        </div>

        <div class="row s-header__navigation">

            <nav class="s-header__nav-wrap">

                <h3 class="s-header__nav-heading h6">Navigate to</h3>

                <ul class="s-header__nav">
                    <li><a href="{{ url('/') }}" title="Home">Home</a></li>
                    <li class="has-children">
											<a href="#0">Categories</a>
											@if (count($categories))
											<ul class="sub-menu">
												@foreach ($categories as $category)
													<li><a href="{{ url('/category/' . $category->id) }}">{{ $category->name }}</a></li>
												@endforeach
											</ul>
											@endif
                    </li>

										<li class="has-children">
											<a href="#0">Pages</a>
											@if (count($pages))
											<ul class="sub-menu">
												@foreach ($pages as $page)
													<li><a href="{{ url('/page/' . $page->id) }}">{{ $page->title }}</a></li>
												@endforeach
											</ul>
											@endif
                    </li>

										<li>
											<a href="{{ url('/contact') }}">Contact</a>
										</li>
                </ul> <!-- end s-header__nav -->

                <a href="#0" title="Close Menu" class="s-header__overlay-close close-mobile-menu">Close</a>

            </nav> <!-- end s-header__nav-wrap -->

        </div> <!-- end s-header__navigation -->

        <a class="s-header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

        @include('themes/' . $theme_directory . '/partials/search')

    </header> <!-- end s-header -->