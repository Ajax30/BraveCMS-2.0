@extends('themes/' . $theme_directory . '/layout')

@section('content')
    <div class="container">
        <div class="row">
            {{-- Main Article Column --}}
            <div class="col-xs-12 col-sm-7 col-lg-8 col-xl-9">
                <main class="content" id="article-content">
                    {{-- Article Title --}}
                    <h1 class="article-title text-center text-md-start">{{ $article->title }}</h1>

                    {{-- Article Meta --}}
                    <div class="row article-meta">
                        <div class="left-half col-sm-12 col-sm-7 col-lg-8">
                            <span class="author">
                                <a href="{{ url('/author/' . $article->user->id) }}">
                                    <img src="{{ asset('images/avatars/' . $article->user->avatar) }}"
                                        alt="{{ $article->user->first_name }} {{ $article->user->last_name }}"
                                        class="rounded-circle">
                                    <span class="pl-1">by {{ $article->user->first_name }}
                                        {{ $article->user->last_name }}</span>
                                </a>
                            </span>
                            <strong>·</strong>
                            <span class="date">{{ $article->published_at->format('M j, Y') }}</span>
                        </div>

                        <div class="right-half col-sm-12 col-sm-5 col-lg-4">
                            <a class="comments" id="comments_status" href="#comments_container"
                                title="{{ $comments_count }} {{ Str::plural('comment', $comments_count) }}"
                                data-count="{{ $comments_count }}">
                                <i class="fa fa-comments me-1"></i> {{ $comments_count ? $comments_count : 'No' }}
                                {{ Str::plural('comment', $comments_count) }}
                            </a>

                            <strong>·</strong>

                            <a href="#" id="print_btn"
                                onclick="printJS({ printable: 'article-content', type: 'html', css: ['{{ asset('themes/' . $theme_directory . '/css/style.css') }}', '{{ asset('themes/' . $theme_directory . '/css/print.css') }}'] })">
                                <i class="fa fa-print"></i> Print
                            </a>
                        </div>
                    </div>

                    {{-- Video or Thumbnail --}}
                    @if ($article->video)
                        @include('themes/' . $theme_directory . '/partials/video-player')
                    @else
                        <div class="post-thumbnail mb-3">
                            <img src="{{ asset('images/articles/' . $article->image) }}" alt="{{ $article->title }}">
                        </div>
                    @endif

                    {{-- Article Content --}}
                    <div class="article-content">
                        {!! $article->content !!}
                    </div>

                    {{-- Tags --}}
                    @if ($article->tags && $article->tags->isNotEmpty())
                        <div class="tag-cloud">
                            @foreach ($article->tags as $tag)
                                <a href="{{ url('/tag/' . $tag->id) }}">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                    @endif

                    {{-- Social Share --}}
                    @include('themes/' . $theme_directory . '/partials/social')

                    {{-- Comment Form --}}
                    @if (!$article->disable_comments)
                        <div class="comment-form-wrapper" id="comment_form_wrapper">
                            @auth
                                <h3 class="comment-form-title">Leave a comment</h3>
                                @include('themes/' . $theme_directory . '/partials/comment-form')
                            @endauth

                            @guest
                                <h5 class="text-center text-muted">You need to <strong>sign in</strong> to comment</h5>
                            @endguest
                        </div>
                    @else
                        <div class="comments-disabled-wrapper mt-4">
                            <h5 class="text-center text-muted">Adding comments is disabled for this article</h5>
                        </div>
                    @endif

                    {{-- Comments List (Infinite Scroll) --}}
                    @if ($comments && count($comments))
                        <div class="comments mt-4" id="comments_container" data-article-id="{{ $article->id }}"
                            data-comments-per-page="{{ $comments_per_page }}"
                            data-infinitescroll="{{ $is_infinitescroll ? '1' : '0' }}">
                            @include('themes/' . $theme_directory . '/partials/comments-list', [
                                'comments' => $comments,
                            ])
                        </div>

                        @if ($is_infinitescroll)
                            <div id="comments_loader" class="pt-1 d-none">
                                <div class="dots-loader">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        @endif
                    @endif
                </main>
            </div>

            {{-- Sidebar Column --}}
            <div class="col-xs-12 col-sm-5 col-lg-4 col-xl-3">
                @include('themes/' . $theme_directory . '/partials/sidebar')
            </div>
        </div>
    </div>
@endsection
