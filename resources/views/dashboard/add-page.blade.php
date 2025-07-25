@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header px-2">{{ __('New page') }}</div>
        <div class="card-body">
            <form method="POST" action="{{ route('dashboard.pages.add') }}" novalidate>
                @csrf
                <div class="row mb-2">
                    <label for="title" class="col-md-12">{{ __('Title') }}</label>

                    <div class="col-md-12 @error('title') has-error @enderror">
                        <input id="title" type="text" placeholder="Page title"
                            class="form-control @error('title') is-invalid @enderror" name="title"
                            value="{{ old('title') }}" autocomplete="title" autofocus>

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="content" class="col-md-12">{{ __('Page content') }}</label>

                    <div class="col-md-12 @error('content') has-error @enderror">

                        <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror"
                            placeholder="Content" cols="30" rows="6">{{ old('content') }}</textarea>

                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-12">
                        <button type="submit" class="w-100 btn btn-success">
                            {{ __('Save') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
