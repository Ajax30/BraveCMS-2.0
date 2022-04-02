<div class="sidebar card shadow-sm">
	<div class="card-header px-2">{{ __('Sidebar') }}</div>
	<div class="card-body p-0">
		<ul class="list-group list-group-flush">
			<li class="list-group-item">
				<a class="{{ request()->routeIs('dashboard.pages*') ? 'active' : '' }}" href="{{ route('dashboard.pages') }}">
					Pages
					<span class="badge">{{ $page_count }}</span>
				</a>
			</li>
			<li class="list-group-item">
				<a class="{{ request()->routeIs('dashboard.articles*') ? 'active' : '' }}" href="{{ route('dashboard.articles') }}">
					Articles
					<span class="badge">{{ $article_count }}</span>
				</a>
			</li>
			<li class="list-group-item">
				<a class="{{ request()->routeIs('dashboard.categories*') ? 'active' : '' }}" href="{{ route('dashboard.categories') }}">
					Categories
					<span class="badge">{{ $category_count }}</span>
				</a>
			</li>
			<li class="list-group-item">
				<a class="{{ request()->routeIs('dashboard.comments*') ? 'active' : '' }}" href="{{ route('dashboard.comments') }}">
					Comments
					<span class="badge">{{ $comments_count }}</span>
				</a>
			</li>
		</ul>
	</div>
</div>