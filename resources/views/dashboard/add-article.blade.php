@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header px-2">{{ __('New article') }}</div>
        <div class="card-body">
            <form method="POST" action="{{ route('dashboard.articles.add') }}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="row mb-2">
                    <label for="title" class="col-md-12">{{ __('Title') }}</label>

                    <div class="col-md-12 @error('title') has-error @enderror">
                        <input id="title" type="text" placeholder="Title"
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
                    <label for="short_description" class="col-md-12">{{ __('Short description') }}</label>

                    <div class="col-md-12 @error('short_description') has-error @enderror">
                        <input id="short_description" type="text" placeholder="Short description"
                            class="form-control @error('short_description') is-invalid @enderror" name="short_description"
                            value="{{ old('short_description') }}" autocomplete="short_description" autofocus>

                        @error('short_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="category" class="col-md-12">{{ __('Category') }}</label>

                    <div class="col-md-12 @error('category_id') has-error @enderror">

                        <select name="category_id" id="category"
                            class="form-control @error('category_id') is-invalid @enderror">
                            <option>Pick a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>


                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="tags" class="col-md-12">{{ __('Tags') }}</label>

                    <select name="tags[]" id="tags_ids" class="form-control" multiple="multiple">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('tags') || $errors->has('tags.*'))
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $errors->first('tags') ?? $errors->first('tags.*') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="row mb-2">
                    <div class="col-md-12 d-flex align-items-center switch-toggle">
                        <p class="mb-0 me-3">Featured article?</p>
                        <input class="mt-1" type="checkbox" id="featured" name="featured"
                            {{ old('featured') ? 'checked' : '' }}>
                        <label class="px-1" for="featured">{{ __('Toggle') }}</label>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="image" class="col-md-12">{{ __('Article image') }}</label>

                    <div class="col-md-12 post-image @error('image') has-error @enderror">
                        <input type="file" value="{{ old('image') }}" name="image" id="file"
                            class="file-upload-btn">

                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="content" class="col-md-12">{{ __('Content') }}</label>

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
                        <button type="submit" class="w-100 btn btn-primary">
                            {{ __('Save') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
