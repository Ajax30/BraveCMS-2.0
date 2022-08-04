@extends('themes/' .$theme_directory . '/layout')

@section('content')

  <!-- Page Header -->
  <header class="masthead" style="background-image: url({{ asset('images/articles/' . $article->image) }}">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>{{ $article->title }}</h1>
            <h2 class="subheading">{{ $article->short_description }}</h2>
            <span class="meta">Posted by
              <a href="{{ url('/author/' . $article->user->id) }}">{{ $article->user->first_name }} {{ $article->user->last_name }}	</a>
              on {{ date('j F, Y', strtotime($article->created_at)) }}</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          {!! $article->content !!}
        </div>
      </div>
    </div>
  </article>

  <hr>

@endsection