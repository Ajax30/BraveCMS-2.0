<aside class="sidebar"> 
     
    @include('themes/' . $theme_directory . '/partials/newsletter-form')

    <div class="tabbed-sidebar">
        <div class="tabbed-heading">
            <ul class="nav nav-tabs" role="tablist" data-bs-tabs="tabs">
                @if (count($articles))
                    <li class="nav-item">
                        <a class="nav-link active" href="#newest_posts" role="tab" data-bs-toggle="tab">New</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="#authors_list" role="tab" data-bs-toggle="tab">Authors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#categories" role="tab" data-bs-toggle="tab">Categories</a>
                </li>
            </ul>
        </div>

        <div class="tab-content">
            @if (count($articles))
                <div class="tab-pane active" id="newest_posts">
                    <ul class="list-unstyled sidebar-list d-table">
                        @foreach ($articles as $article)
                            <li class="d-table-row">
                                <div class="thumbnail d-table-cell">
                                    <a href="{{ url('/show/' . $article->slug) }}">
                                        <img src="{{ asset('images/articles/' . $article->image) }}"
                                            alt="{{ $article->title }}" class="img-thumbnail">
                                    </a>
                                </div>
                                <div class="text d-table-cell">
                                    <h3><a href="{{ url('/show/' . $article->slug) }}">{{ $article->title }}</a></h3>
                                    <p>{{ Str::limit($article->short_description, 90, ' [...]') }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="tab-pane" id="authors_list">
                <ul class="list-unstyled sidebar-list d-table">
                    @foreach ($authors as $author)
                        <li class="d-table-row">
                            <div class="thumbnail d-table-cell text-center">
                                <a href="{{ url('/author/' . $author->id) }}">
                                    <img src="{{ asset('images/avatars/' . $author->avatar) }}"
                                        alt="{{ $author->first_name }}{{ $author->last_name }}"
                                        class="img-thumbnail rounded-circle">
                                </a>
                            </div>
                            <div class="text d-table-cell">
                                <h3>
                                    <a href="{{ url('/author/' . $author->id) }}">{{ $author->first_name }}
                                        {{ $author->last_name }}</a>
                                </h3>
                                <p>{{ Str::limit($author->bio, 75, ' [...]') }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="tab-pane" id="categories">
                <div class="list-group list-group-flush">
                    @foreach ($categories as $category)
                        <a href="{{ url('/category/' . $category->id) }}"
                            class="list-group-item list-group-item-action">
                            <span>{{ $category->name }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</aside>
