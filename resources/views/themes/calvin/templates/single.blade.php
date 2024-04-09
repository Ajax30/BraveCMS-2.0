@extends('themes/' .$theme_directory . '/layout')

@section('content')

    <section class="s-content">
        <div class="row">
            <div class="column large-12">
                <article class="s-content__entry format-standard">
                    <div class="s-content__media">
                        <div class="s-content__post-thumb">
                            <img src="{{ asset('images/articles/' . $article->image) }}" alt="{{ $article->title }}">
                        </div>
                    </div>
                    <!-- end s-content__media -->
                    <div class="s-content__entry-header">
                        <h1 class="article-title s-content__title s-content__title--post">
                            {{ $article->title }}
                        </h1>
                    </div>
                    <!-- end s-content__entry-header -->
                    <div class="s-content__primary">
                        <div class="s-content__entry-content">
                            {!! $article->content !!}

                            @include('themes/' . $theme_directory . '/partials/share')
                        </div>

                        <!-- end s-entry__entry-content -->
                        <div class="s-content__entry-meta">
                            <div class="entry-author meta-blk">
                                <div class="author-avatar">
                                    <img class="avatar" src="{{ asset('images/avatars/' . $article->user->avatar) }}" alt="{{ $article->user->first_name }} {{ $article->user->last_name }}">
                                </div>
                                <div class="byline">
                                    <span class="bytext">Posted By</span>
                                    <a href="{{ url('/author/' . $article->user->id) }}">
                                        {{ $article->user->first_name }} {{ $article->user->last_name }}
                                    </a>
                                </div>
                            </div>

                            <div class="meta-bottom">
                                <div class="entry-cat-links meta-blk">
                                    <div class="cat-links">
                                        <span>In</span>
                                        <a href="{{ url('/category/' . $article->category->id) }}">{{ $article->category->name }}</a>
                                    </div>
                                    <span>On</span>
                                    {{ date('j F, Y', strtotime($article->created_at)) }}
                                </div>
                            </div>
                        </div><!-- s-content__entry-meta -->
                        <div class="s-content__pagenav">
                            @if($old_article)
                                <div class="next-nav">
                                    <a href="{{ url('/show/' . $old_article->slug) }}">
                                        <span>Older</span>
                                        {{ $old_article->title }}
                                    </a>
                                </div>
                            @endif

                            @if($new_article)
                                <div class="next-nav">
                                    <a href="{{ url('/show/' . $new_article->slug) }}">
                                        <span>Newer</span>
                                        {{ $new_article->title }}
                                    </a>
                                </div>
                            @endif
                        </div>
                        <!-- end s-content__pagenav -->
                    </div>
                    <!-- end s-content__primary -->
                </article><!-- end entry -->
            </div><!-- end column -->
        </div><!-- end row -->

        @include('themes/' . $theme_directory . '/partials/comments')
    </section>
    <script>
        let article_id = '{{$article->id}}';
        let token = "{{ csrf_token() }}";
    </script>
@endsection

@if ($is_infinitescroll && $comments_count > $comments_per_page)
    @section('custom_js_files')
        <script src="{{ asset('js/infinite-comments.js') }}"></script>
    @endsection
@endif
