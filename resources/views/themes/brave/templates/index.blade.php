@extends('themes/' . $theme_directory . '/layout')

@section('content')
    <div class="container">
        @isset($author)
            <div class="author">
                <h1 class="author-name">{{ $author->first_name }} {{ $author->last_name }}</h1>
                <img src="{{ asset('images/avatars/' . $author->avatar) }}"
                    alt="{{ $author->first_name }} {{ $author->last_name }}" class="img-thumbnail rounded-circle">
            </div>
            <p class="bio">{{ $author->bio }}</p>
        @endisset

        @isset($search_query)
            <h1 class="mt-3 mb-0 search-title text-center">Search results</h1>
            <p class="mt-1 text-muted text-center">
                We found {{ $article_count ? $article_count : 'no' }}
                {{ $article_count > 1 ? 'articles' : 'article' }} containing "{{ $search_query }}"
            </p>
        @endisset

        @isset($category)
            <p class="mb-0 mt-3 text-muted text-center">Category</p>
            <h1 class="mb-0 category-name text-center">{{ $category->name }}</h1>
        @endisset

        @isset($tag)
            <p class="mb-0 mt-3 text-muted text-center">Tag</p>
            <h1 class="mb-0 tag-name text-center">{{ $tag->name }}</h1>
        @endisset

        @if (count($articles))
            <div class="row articles-grid">
                @foreach ($articles as $article)
                    <div class="col-xs-12 col-sm-6 col-lg-4 col-xl-3">
                        <div class="article">
                            <div class="thumbnail">
                                <a href="{{ url('/show/' . $article->slug) }}">
                                    <img src="{{ asset('images/articles/' . $article->image) }}"
                                        alt="{{ $article->title }}">
                                </a>
                            </div>
                            <div class="text">
                                @empty($category)
                                    <p class="article-category">
                                        <a href="{{ url('/category/' . $article->category->id) }}">
                                            {{ $article->category->name }}
                                        </a>
                                    </p>
                                @endempty

                                <h2 class="card-title">
                                    <a href="{{ url('/show/' . $article->slug) }}">{{ $article->title }}</a>
                                </h2>
                                <p class="text-muted">{{ $article->short_description }}</p>
                            </div>
                            <div class="read-more">
                                <a href="{{ url('/show/' . $article->slug) }}" class="btn btn-sm btn-success w-100">Read
                                    more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            @isset($category)
                <p class="mt-5 text-center text-muted">There are no articles in the "{{ $category->name }}" category right now,
                    but you should come back later!</p>
            @endisset

            @isset($author)
                <p class="mt-5 text-center text-muted">There are no articles by <strong>{{ $author->first_name }}
                  {{ $author->last_name }}</strong> yet.</p>
            @endisset
        @endif

        @if ($articles->hasPages())
            <nav class="pagination-container">
                {!! $articles->onEachSide(1)->withQueryString()->links() !!}
            </nav>
        @endif
    </div>
@endsection 
