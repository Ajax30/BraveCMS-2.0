@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header px-2">{{ __('New article') }}</div>
        <div class="card-body">
            <form method="POST" action="{{ route('dashboard.articles.add') }}" enctype="multipart/form-data" novalidate>
                @csrf

                <input type="hidden" id="defaultImage" name="defaultImage" value="{{ asset('images/articles/default.jpg') }}" />
                
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

                        <select name="category_id" id="category_id"
                            class="form-control @error('category_id') is-invalid @enderror">
                            <option value="0">Pick a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == old('category_id') ? 'selected' : '' }}>{{ $category->name }}
                                </option>
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
                    <label for="tagsSelector" class="col-md-12">{{ __('Tags') }}</label>

                    <div class="position-relative">
                        <span id="tagSelectorToggler" class="tag-toggler" onclick="toggleTagSelector(event)">
                            <i class="fas fa-chevron-up"></i>
                        </span>
                        <ul id="tagsList" class="form-control tags-list mb-1" onclick="toggleTagSelector(event)">
                            <li class="text-muted">
                                Select one or more tags from the list
                            </li>
                        </ul>
                    </div>

                    <div id="tagActions" class="tag-actions">
                        <input oninput="filterTags(event)" type="search" class="form-control mb-1"
                            placeholder="Filter available tags" />

                        <select name="tags[]" id="tags" class="form-control tag-select" multiple>
                          @foreach ($tags as $tag)
                              <option value="{{ $tag->id }}" 
                                  {{ (collect(old('tags'))->contains($tag->id)) ? 'selected' : '' }}>
                                  {{ $tag->name }}
                              </option>
                          @endforeach
                      </select>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-12 d-flex align-items-center switch-toggle">
                        <p class="mb-0 me-3">Featured article?</p>
                        <input class="mt-1" type="checkbox" id="featured" name="featured"
                            {{ old('featured') ? 'checked' : '' }}>
                        <label class="px-1" for="featured">{{ __('Toggle') }}</label>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="image" class="col-md-12">{{ __('Article image') }}</label>

                    <div class="col-md-12 post-image @error('image') has-error @enderror">
                        <input type="file" value="{{ old('image') }}" name="image" id="file"
                            class="file-upload-btn" onchange="previewImage(event)">

                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3 d-none">
                    <div class="col-md-12 post-image text-center">
                        <img id="imagePreview" class="image-preview large" src="">

                        <a class="remove-image" href="#" title="Remove image" onclick="removeImage(event)">
                            <i class="fa fa-remove"></i>
                        </a>
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
                    <div class="col-md-12 d-flex">
                      <div class="w-50 pe-1">
                        <button type="submit" class="btn btn-success w-100">{{ __('Save') }}</button>
                      </div>
                      <div class="w-50 ps-1">
                        <a href="{{ route('dashboard.articles') }}" class="btn btn-success w-100">{{ __('Cancel') }}</a>
                      </div>
                    </div>
                </div>
            </form>
            @include('partials.image-preview-script')
        </div>
    </div>
@endsection
