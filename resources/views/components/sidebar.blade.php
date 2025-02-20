<div class="sidebar card shadow-sm">
    <div class="card-header px-2">{{ __('Menu') }}</div>
    <div class="card-body p-0">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <a class="{{ request()->routeIs('dashboard.pages*') ? 'active' : '' }}"
                    href="{{ route('dashboard.pages') }}">
                    <span>
                        <i class="far fa-file-alt pe-1"></i> Pages
                    </span>
                    <span class="badge">{{ $page_count }}</span>
                </a>
            </li>
            <li class="list-group-item">
                <a class="{{ request()->routeIs('dashboard.articles*') ? 'active' : '' }}"
                    href="{{ route('dashboard.articles') }}">
                    <span>
                        <i class="far fa-newspaper pe-1"></i> Articles
                    </span>
                    <span class="badge">{{ $article_count }}</span>
                </a>
            </li>
            <li class="list-group-item">
                <a class="{{ request()->routeIs('dashboard.categories*') ? 'active' : '' }}"
                    href="{{ route('dashboard.categories') }}">
                    <span>
                        <i class="far fa-list-alt pe-1"></i> Categories
                    </span>
                    <span class="badge">{{ $category_count }}</span>
                </a>
            </li>
            <li class="list-group-item">
                <a class="{{ request()->routeIs('dashboard.tags*') ? 'active' : '' }}"
                    href="{{ route('dashboard.tags') }}">
                    <span>
                        <i class="fa-solid fa-tags pe-1"></i> Tags
                    </span>
                    <span class="badge">{{ $tag_count }}</span>
                </a>
            </li>
            <li class="list-group-item">
                <a class="{{ request()->routeIs('dashboard.comments*') ? 'active' : '' }}"
                    href="{{ route('dashboard.comments') }}">
                    <span>
                        <i class="far fa-comments pe-1"></i> Comments
                    </span>
                    <span class="badge">{{ $comments_count }}</span>
                </a>
            </li>
        </ul>
    </div>
</div>
