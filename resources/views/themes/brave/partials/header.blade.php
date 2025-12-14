<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $tagline }} | {{ $site_name }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $article->short_description ?? '' }}">

    <script src="{{ asset('themes/' . $theme_directory . '/js/alpine.js') }}" defer></script>

    @if (boolval($is_cookieconsent))
        <link href="{{ asset('lib/cookieconsent/css/cookies.css') }}" rel="stylesheet">
        <script src="{{ asset('lib/cookieconsent/js/cookieconsent.min.js') }}"></script>
    @endif

    <link rel="icon" href="{{ asset('themes/' . $theme_directory . '/img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('themes/' . $theme_directory . '/css/style.css') }}">
</head>

<body>

    <div id="app">
        <nav class="navbar sticky-top navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('themes/' . $theme_directory . '/img/logo.png') }}" alt="Brave CMS">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavigation"
                    aria-controls="mainNavigation" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNavigation">
                    <ul class="navbar-nav pe-md-1 navbar-expand-md">
                        @if (count($pages))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                                <ul class="dropdown-menu ms-2 navbar-dropdown-menu">
                                    @foreach ($pages as $page)
                                        <li><a class="dropdown-item text-body"
                                                href="{{ url('/page/' . $page->id) }}">{{ $page->title }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                        </li>
                        @if (count($categories))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Categories
                                </a>
                                <ul class="dropdown-menu ms-2 navbar-dropdown-menu">
                                    @foreach ($categories as $category)
                                        <li><a class="dropdown-item text-body"
                                                href="{{ url('/category/' . $category->id) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    </ul>
                    <form method="get" action="{{ url('/') }}"
                        class="search_form w-100 pe-md-2 mx-auto mt-2 mt-md-0" role="search">
                        <div class="input-group">
                            <input class="form-control search-box" name="search" type="search"
                                placeholder="Search articles..." aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn rounded-end" type="submit">
                                    <i class="fa-solid fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <ul class="navbar-nav button-nav navbar-expand-md mr-auto px-0 pl-md-1 text-nowrap">
                        @guest
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="btn btn-sm btn-success">
                                    <i class="fa-solid fa-right-to-bracket pe-1"></i> Login
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="btn btn-sm btn-success">
                                    <i class="fa-solid fa-user-plus pe-1"></i> Register
                                </a>
                            </li>
                        @else
                            <li class="nav-item profile-menu dropdown">
                                <img class="rounded-circle avatar-top" id="top_avatar"
                                    src="{{ asset('images/avatars') }}/{{ auth()->user()->avatar }}"
                                    alt="{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}">

                                <a id="navbarDropdown" class="nav-link px-2 dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Welcome, {{ Auth::user()->first_name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-start rounded-0" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-body" href="{{ route('dashboard') }}">Dashboard</a>
                                    <a class="dropdown-item text-body" href="{{ route('user') }}">Your profile</a>
                                    <a class="dropdown-item text-body" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                      @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
