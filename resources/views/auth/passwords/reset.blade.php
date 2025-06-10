@extends('layouts.app')

@section('content')
	<div class="card shadow-sm">
		<div class="card-header">{{ __('Reset Password') }}</div>

		<div class="card-body">
				<form method="POST" action="{{ route('password.update') }}">
						@csrf

						<input type="hidden" name="token" value="{{ $token }}">

						<div class="row mb-2">
								<label for="email" class="col-md-12">{{ __('Email Address') }}</label>

								<div class="col-md-12">
										<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

										@error('email')
												<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
												</span>
										@enderror
								</div>
						</div>

						<div class="row mb-2">
								<label for="password" class="col-md-12">{{ __('Password') }}</label>

								<div class="col-md-12">
										<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

										@error('password')
												<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
												</span>
										@enderror
								</div>
						</div>

						<div class="row mb-2">
								<label for="password-confirm" class="col-md-12">{{ __('Confirm Password') }}</label>

								<div class="col-md-12">
										<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="password_confirmation">

										@error('password_confirmation')
										<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
										</span>
								@enderror
								</div>
						</div>

						<div class="row mb-0">
								<div class="col-md-6 offset-md-4">
										<button type="submit" class="btn btn-success">
												{{ __('Reset Password') }}
										</button>
								</div>
						</div>
				</form>
		</div>
	</div>
@endsection
