@extends('layouts.app')

@section('content')
	<div class="card shadow-sm">
			<div class="card-header">{{ __('Dashboard') }}</div>

			<div class="card-body">
					@if (session('status'))
							<div class="alert alert-success" role="alert">
									{{ session('status') }}
							</div>
					@endif

					{{ __('You are logged in!') }}
			</div>
	</div>
@endsection
