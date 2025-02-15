@extends('layouts.app')

@section('content')
	<div class="card shadow-sm">
		<div class="card-header px-2">{{ __('New tag') }}</div>
		<div class="card-body">
			<form method="POST" action="{{ route('dashboard.tags.add') }}" novalidate>
					@csrf
					<div class="row mb-2">
							<label for="name" class="col-md-12">{{ __('Name') }}</label>

							<div class="col-md-12 @error('name') has-error @enderror">
									<input id="name" type="text" placeholder="Tag name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

									@error('name')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
									@enderror
							</div>
					</div>
					
					<div class="row mb-0">
							<div class="col-md-12">
									<button type="submit" class="w-100 btn btn-primary">
											{{ __('Save') }}
									</button>
							</div>
					</div>
			</form>
		</div>
	</div>
@endsection
