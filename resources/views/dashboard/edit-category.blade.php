@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header px-2">{{ __('Edit category') }}</div>
            <div class="card-body">
                <form method="POST" action="{{ route('dashboard.categories.update', [$category->id]) }}" novalidate>
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="page" value="{{ request()->get('page', 1) }}">
                    
                    <div class="row mb-2">
                        <label for="name" class="col-md-12">{{ __('Name') }}</label>

                        <div class="col-md-12 @error('name') has-error @enderror">
                            <input id="name" type="text" placeholder="Category name"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name', $category->name) }}" autocomplete="name" autofocus>

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
                                <a href="{{ route('dashboard.categories') }}?page={{ request()->get('page', 1) }}" class="btn btn-success w-100">{{ __('Cancel') }}</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
