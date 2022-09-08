@include('themes/' . $theme_directory . '/partials/header')

@if (!isset($category) && !isset($author))
    @include('themes/' . $theme_directory . '/partials/hero')
@endif

<!-- Main Content -->
@yield('content')

@include('themes/' . $theme_directory . '/partials/footer')



