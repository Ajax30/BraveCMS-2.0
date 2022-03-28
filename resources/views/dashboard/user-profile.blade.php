@extends('layouts.app')

@section('content')
		<div class="card shadow-sm">
				<div class="card-header">{{ __('User Profile') }}</div>
				<div class="card-body">
						<form action="{{ route('user.update') }}" enctype='multipart/form-data' method="post" novalidate>
							@csrf

								<div class="row mb-2">
									<label for="first_name" class="col-md-12">{{ __('First name') }}</label>

									<div class="col-md-12 @error('first_name') has-error @enderror">
											<input id="first_name" type="text" placeholder="First name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name', $current_user->first_name) }}" autocomplete="first_name" autofocus>

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
											<input id="last_name" type="text" placeholder="Last name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name', $current_user->last_name) }}" autocomplete="last_name" autofocus>

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
											<input id="email" type="email" placeholder="Email address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $current_user->email) }}" autocomplete="email">

											@error('email')
													<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
													</span>
											@enderror
									</div>
							</div>

							<div class="row mb-3">
								<label for="bio" class="col-md-12">{{ __('Bio') }}</label>

								<div class="col-md-12 @error('bio') has-error @enderror">

									<textarea name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror" placeholder="Bio" cols="30" rows="6">{{old('bio', $current_user->bio)}}</textarea>

									@error('bio')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
									@enderror
								</div>
							</div>

								<label for="avatar" class="text-muted">Upload avatar</label>
								<div class="form-group d-flex justify-content-between">
									<input type='file' name='avatar' id="avatar" class="form-control border-0 py-0 pl-0 file-upload-btn" value="{{$current_user->avatar}}">
										@error('avatar')
												<span class="invalid-feedback" role="alert">{{ $errors->first('avatar') }}</span>
										@endif

									<div class="position-relative" id="avatar-container">
										<img class="rounded-circle img-thumbnail avatar-preview" src="{{asset('images/avatars')}}/{{$current_user->avatar}}" alt="{{$current_user->first_name}} {{$current_user->last_name}}">
										<span class="avatar-trash">
											@if($current_user->avatar !== 'default.png')
												<a href="#" class="icon text-light" id="delete-avatar" data-uid="{{$current_user->id}}">
													<i class="fa-solid fa-trash"></i>
												</a>
											@endif
										</span>
									</div>
								</div>

								<div class="form-group d-flex mb-0 mt-2">
										<div class="w-50 pe-1">
											<input type="submit" name="submit" value="Save" class="w-100 btn btn-primary">
										</div>
										<div class="w-50 ps-1">
											<a href="{{route('user')}}" class="w-100 btn btn-primary">Cancel</a>
										</div>
								</div>
						</form>
				</div>
		</div>
@endsection