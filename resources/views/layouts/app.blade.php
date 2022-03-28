<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
			@include('partials/navbar')

        <main class="py-4">
            @if (session('error'))
								@include('partials.errors')
						@endif

						@if (session('success'))
								@include('partials.success')
						@endif

            <div class="container">
							<div class="row justify-content-center">
								{{-- 6 columns for user profile --}}
								@if(Route::is('user'))<div class="col-md-6">@else<div class="col-md-12">@endif
										
										@if(!Route::is('user'))
										<div class="row">
											<div class="col-sm-4 col-md-3 d-none d-sm-block">
												@include('partials.sidebar')
											</div>
										@endif
										
										@if(!Route::is('user'))<div class="col-sm-8 col-md-9">@endif
												@yield('content')
										@if(!Route::is('user'))</div>@endif
										</div>
									</div>
								</div>
						</div>
        </main>
    </div>
</body>
<script>
    var APP_URL = "{{ env("APP_URL") }}"
</script>
</html>
