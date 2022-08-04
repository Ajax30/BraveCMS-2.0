@extends('layouts.app')

@section('content')
	<div class="card shadow-sm">
		<div class="card-header">{{ __('Register') }}</div>
		<div class="card-body">
				<form method="POST" action="{{ route('register') }}">
						@csrf

						<div class="row mb-2">
								<label for="first_name" class="col-md-12">{{ __('First name') }}</label>

								<div class="col-md-12 @error('first_name') has-error @enderror">
										<input id="first_name" type="text" placeholder="First name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" autocomplete="first_name" autofocus>

										@error('first_name')
												<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
												</span>
										@enderror
								</div>
						</div>

						<div class="row mb-2">
								<label for="last_name" class="col-md-12">{{ __('Last name') }}</label>

								<div class="col-md-12 @error('last_name') has-error @enderror">
										<input id="last_name" type="text" placeholder="Last name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" autofocus>

										@error('last_name')
												<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
												</span>
										@enderror
								</div>
						</div>

						<div class="row mb-2">
								<label for="email" class="col-md-12">{{ __('Email address') }}</label>

								<div class="col-md-12 @error('email') has-error @enderror">
										<input id="email" type="email" placeholder="Email address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

										@error('email')
												<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
												</span>
										@enderror
								</div>
						</div>

						<div class="row mb-2">
								<label for="password" class="col-md-12">{{ __('Password') }}</label>

								<div class="col-md-12 @error('password') has-error @enderror">
										<input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

										@error('password')
												<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
												</span>
										@enderror
								</div>
						</div>

						<div class="row mb-2">
								<label for="password-confirm" class="col-md-12">{{ __('Confirm password') }}</label>

								<div class="col-md-12 @error('password_confirmation') has-error @enderror">
										<input id="password-confirm" type="password" placeholder="Password again" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="password_confirmation">

										@error('password_confirmation')
										<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
										</span>
								@enderror
								</div>
						</div>

						<div class="row mb-1 @error('accept') has-error @enderror">
							<div class="d-flex pb-2">
								<input class="mt-1" type="checkbox" name="accept" id="accept">

								<label class="px-1" for="accept">
									Accept the <a href="{{ url('/page/1') }}">Terms and conditions</a>
								</label>

									@error('accept')
										<span class="invalid-feedback accept" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
							</div>

						</div>

						<div class="row mb-0">
								<div class="col-md-12">
										<button type="submit" class="w-100 btn btn-primary">
												{{ __('Register') }}
										</button>
								</div>
						</div>
				</form>
		</div>
	</div>
@endsection
