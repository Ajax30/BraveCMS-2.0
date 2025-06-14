@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header">{{ __('Reset Password') }}</div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="row mb-2">
                <label for="email" class="col-md-12">{{ __('Email Address') }}</label>

                <div class="col-md-12 @error('email') has-error @enderror">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-12">
                    <button type="submit" class="w-100 btn btn-success">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
