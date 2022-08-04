@extends('themes/' .$theme_directory . '/layout')

@section('content')

<!-- Page Header -->
<header class="masthead" style="background-image: url({{ asset('themes/' . $theme_directory . '/img/home-bg.jpg') }}">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading">
					<h1>{{ $site_name }}</h1>
					<span class="subheading">
						@if(isset($category))
							{{ $category->name }}
						@elseif(isset($author))
							Articles by {{ $author->first_name }} {{ $author->last_name }}
						@else
							{{ $tagline }}
						@endif
					</span>
				</div>
			</div>
		</div>
	</div>
</header>

	<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

				@if (isset($search_query))
					<p class="mt-0 text-muted">We found {{ $article_count }} posts containing <span class="quote-inline">{{ $search_query }}</span>:</p>
				@endif

				@if (count($articles))
					@foreach ($articles as $article)
						<div class="post-preview">
							<a href="{{ url('/show/' . $article->slug) }}">
								<h2 class="post-title">
									{{ $article->title }}
								</h2>
								<h3 class="post-subtitle">
									{{ $article->short_description }}
								</h3>
							</a>
							<p class="post-meta">Posted by
								<a href="{{ url('/author/' . $article->user->id) }}">{{ $article->user->first_name }} {{ $article->user->last_name }}</a>
								on {{ date('j F, Y', strtotime($article->created_at)) }}
							</p>
						</div>

						{{-- 	 --}}
						@if(!$loop->last)<hr>@endif
						
					@endforeach
				@endif

				<!-- Pager -->
				@if($articles->hasPages())
					<div class="clearfix">
						<ul class="pagination">
							<li class="next">
								<a class="btn btn-primary {{ $articles->withQueryString()->onFirstPage() ? 'disabled' : '' }}" href="{{ $articles->previousPageUrl() }}">&larr; Newer Posts</a>
							</li>
							<li class="prev">
								<a class="btn btn-primary {{ $articles->withQueryString()->onLastPage() ? 'disabled' : '' }}" href="{{ $articles->nextPageUrl() }}">Older Posts &rarr;</a>
							</li>
						</ul>
					</div>
				@endif
      </div>
    </div>
  </div>
  <hr>
@endsection

	