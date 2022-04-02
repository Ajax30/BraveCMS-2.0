@include('partials/header')
@include('partials/navbar')

<main class="py-3">
		@if (session('error'))
				@include('partials.errors')
		@endif

		@if (session('success'))
				@include('partials.success')
		@endif

		<div class="container">
			<div class="row justify-content-center">
				{{-- 6 columns for user profile --}}
				@if(request()->routeIs(['user','register','login','password*']))<div class="col-md-6">@else<div class="col-md-12">@endif
						
						@if(!request()->routeIs(['user','register','login','password*']))
						<div class="row">
							<div class="col-sm-4 col-md-3 d-none d-sm-block">
								<x-sidebar/>
							</div>
						@endif
						
						@if(!request()->routeIs(['user','register','login','password*']))<div class="col-sm-8 col-md-9">@endif
								@yield('content')
						@if(!request()->routeIs(['user','register','login','password*']))</div>@endif
						</div>
					</div>
				</div>
		</div>
</main>

@include('partials/footer')
