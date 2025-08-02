@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header px-2">{{ __('Edit article') }}</div>
        <div class="card-body">
            <form method="POST" action="{{ route('dashboard.articles.update', [$article->id]) }}"
                enctype="multipart/form-data" novalidate>
                @csrf

                <input type="hidden" id="defaultImage" name="defaultImage"
                    value="{{ asset('images/articles/default.jpg') }}" />

                {{-- Title --}}
                <div class="row mb-2">
                    <label for="title" class="col-md-12">{{ __('Title') }}</label>
                    <div class="col-md-12 @error('title') has-error @enderror">
                        <input id="title" type="text" placeholder="Title"
                            class="form-control @error('title') is-invalid @enderror" name="title"
                            value="{{ old('title', $article->title) }}" autocomplete="title" autofocus>
                        @error('title')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                {{-- Short description --}}
                <div class="row mb-2">
                    <label for="short_description" class="col-md-12">{{ __('Short description') }}</label>
                    <div class="col-md-12 @error('short_description') has-error @enderror">
                        <input id="short_description" type="text" placeholder="Short description"
                            class="form-control @error('short_description') is-invalid @enderror" name="short_description"
                            value="{{ old('short_description', $article->short_description) }}"
                            autocomplete="short_description" autofocus>
                        @error('short_description')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                {{-- Category --}}
                <div class="row mb-2">
                    <label for="category_id" class="col-md-12">{{ __('Category') }}</label>
                    <div class="col-md-12 @error('category_id') has-error @enderror">
                        <select name="category_id" id="category_id"
                            class="form-control @error('category_id') is-invalid @enderror">
                            <option value="0">Pick a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == old('category_id', $article->category->id) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                {{-- Tags --}}
                <div class="row mb-3">
                    <label for="tags" class="col-md-12">{{ __('Tags') }}</label>
                    <div class="position-relative">
                        <span id="tagSelectorToggler" class="tag-toggler" onclick="toggleTagSelector(event)">
                            <i class="fas fa-chevron-up"></i>
                        </span>
                        <ul id="tagsList" class="form-control tags-list mb-1" onclick="toggleTagSelector(event)">
                            <li class="text-muted">Select one or more tags from the list</li>
                        </ul>
                    </div>

                    <div id="tagActions" class="tag-actions">
                        <input oninput="filterTags(event)" type="search" class="form-control mb-1"
                            placeholder="Filter available tags" />
                        @php $selectedTags = old('tags', $attached_tags); @endphp
                        <select name="tags[]" id="tags" class="form-control tag-select" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}"
                                    {{ in_array($tag->id, $selectedTags) ? 'selected' : '' }}>
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Featured --}}
                <div class="row mb-3">
                    <div class="col-md-12 d-flex align-items-center switch-toggle">
                        <p class="mb-0 me-3">Featured article?</p>
                        <input class="mt-1" type="checkbox" id="featured" name="featured" value="featured"
                            {{ old('featured', $article->featured) ? 'checked' : '' }}>
                        <label class="px-1" for="featured">{{ __('Toggle') }}</label>
                    </div>
                </div>

                {{-- Tabs for image/video --}}
                <ul class="nav nav-tabs mb-2" id="mediaTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-section"
                            type="button" role="tab" aria-controls="image-section" aria-selected="true">
                            Article Image
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="video-tab" data-bs-toggle="tab" data-bs-target="#video-section"
                            type="button" role="tab" aria-controls="video-section" aria-selected="false">
                            Article Video
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="mediaTabContent">
                    {{-- Image Section --}}
                    <div class="tab-pane fade show active" id="image-section" role="tabpanel"
                        aria-labelledby="image-tab">
                        <div class="row mb-2">
                            <label for="file" class="col-md-12">{{ __('Upload image') }}</label>
                            <div class="col-md-12 post-media @error('image') has-error @enderror">
                                <input type="file" name="image" id="file"
                                    class="file-upload-btn replace-image" onchange="previewImage(event)">
                                @error('image')
                                    <span class="invalid-feedback invalid-upload"
                                        role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-md-12 post-media text-center">
                                <img id="imagePreview" class="image-preview large"
                                    src="{{ asset('images/articles/' . $article->image) }}" alt="{{ $article->title }}">
                                <a class="remove-media {{ $article->image !== 'default.jpg' ? 'edit' : '' }}"
                                    href="{{ route('dashboard.articles.delete-image', [$article->id, $article->image]) }}"
                                    id="delete-image" title="Remove image"
                                    style="{{ $article->image === 'default.jpg' ? 'display: none;' : '' }}"
                                    onclick="removeImage(event)">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Video Section --}} 
                    <div class="tab-pane fade" id="video-section" role="tabpanel" aria-labelledby="video-tab">
                        <div class="row mb-2">
                            <label for="video-file" class="col-md-12">{{ __('Upload video') }}</label>
                            <div class="col-md-12 post-video @error('video') has-error @enderror">
                                <input type="file" name="video" id="video-file"
                                    class="file-upload-btn video-upload {{ $article->video ? 'replace-video' : '' }}"
                                    onchange="validateVideo(event)">
                                @error('video')
                                    <span class="invalid-feedback invalid-upload"
                                        role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        {{-- Always include video preview container --}}
                        <div class="my-3 post-media video {{ $article->video ? 'video-preview' : 'd-none' }}">
                            @if ($article->video)
                                <div class="ratio ratio-16x9">
                                    <video id="videoPreview" controls>
                                        @if ($article->video)
                                            <source src="{{ asset('videos/articles/' . $article->video) }}"
                                                type="video/mp4">
                                        @endif
                                    </video>
                                </div>
                                <a class="remove-media remove-video"
                                    href="{{ $article->video ? route('dashboard.articles.delete-video', [$article->id, $article->video]) : '#' }}"
                                    id="delete-video" title="Remove video" onclick="removeVideo(event)">
                                    <i class="fa fa-remove"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Content --}}
                <div class="row mb-2">
                    <label for="content" class="col-md-12 pt-2">{{ __('Content') }}</label>
                    <div class="col-md-12 @error('content') has-error @enderror">
                        <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror"
                            placeholder="Content" cols="30" rows="6">{{ old('content', $article->content) }}</textarea>
                        @error('content')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                {{-- Buttons (Submit & Cancel) --}}
                <div class="row mb-0">
                    <div class="col-md-12 d-flex">
                        <div class="w-50 pe-1">
                            <button type="submit" class="btn btn-success w-100">{{ __('Update') }}</button>
                        </div>
                        <div class="w-50 ps-1">
                            <a href="{{ route('dashboard.articles') }}"
                                class="btn btn-success w-100">{{ __('Cancel') }}</a>
                        </div>
                    </div>
                </div>
            </form>
            @include('partials.media-preview-script')
        </div>
    </div>
@endsection
