@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header px-2">{{ __('Edit tag') }}</div>
            <div class="card-body">
                <form method="POST" action="{{ route('dashboard.tags.update', [$tag->id]) }}" novalidate>
                    @csrf
                    <div class="row mb-2">
                        <label for="name" class="col-md-12">{{ __('Name') }}</label>

                        <div class="col-md-12 @error('name') has-error @enderror">
                            <input id="name" type="text" placeholder="Tag name"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name', $tag->name) }}" autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-12 d-flex">
                            <div class="w-50 pe-1">
                                <button type="submit" class="w-100 btn btn-success">{{ __('Update') }}</button>
                            </div>
                            <div class="w-50 ps-1">
                                <a href="{{ route('dashboard.tags') }}" class="btn btn-success w-100">{{ __('Cancel') }}</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
