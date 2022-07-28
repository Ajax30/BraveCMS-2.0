@extends('themes.default.layout')

@section('content')

<h1>Posts</h1>

	@if (count($articles))
	<ul>
			@foreach ($articles as $article)
				<li>
					<h1>{{ $article->title }}</h1>
					<p>{{ $article->short_description }}</p>
					<div>
						<a href="/show/{{ $article->slug }}">View post</a>
					</div>
				</li>
			@endforeach
	</ul>
	@endif

@endsection

	