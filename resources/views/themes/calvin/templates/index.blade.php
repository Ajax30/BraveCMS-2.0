@extends('themes/' .$theme_directory . '/layout')

@section('content')

<!-- content
    ================================================== -->
    <section class="s-content s-content--no-top-padding">


        <!-- masonry
        ================================================== -->
        <div class="s-bricks">

            <div class="masonry">
                <div class="bricks-wrapper h-group">

                    <div class="grid-sizer"></div>

                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    @if (count($articles))
											@foreach ($articles as $article)

											<article class="brick entry" data-aos="fade-up">

													<div class="entry__thumb">
															<a href="{{ url('/show/' . $article->slug) }}" class="thumb-link">
																	<img src="{{ asset('images/articles/' . $article->image) }}"  alt="{{ $article->title }}">
															</a>
													</div> <!-- end entry__thumb -->

													<div class="entry__text">
															<div class="entry__header">
																	<h1 class="entry__title">
																		<a href="{{ url('/show/' . $article->slug) }}">
																			{{ $article->title }}
																		</a>
																	</h1>

																	<div class="entry__meta">
																			<span class="byline">By:
																					<span class='author'>
																							<a href="{{ url('/author/' . $article->user->id) }}">{{ $article->user->first_name }} {{ $article->user->last_name }}</a>
																			</span>
																	</span>
																			<span class="cat-links">
																					<a href="{{ url('/category/' . $article->category->id) }}">{{ $article->category->name }}</a>
																			</span>
																	</div>
															</div>
															<div class="entry__excerpt">
																	<p>{{ $article->short_description }}</p>
															</div>
															<a class="entry__more-link" href="{{ url('/show/' . $article->slug) }}">Learn More</a>
													</div> <!-- end entry__text -->

											</article> <!-- end article -->

											@endforeach
                    @endif
                </div> <!-- end brick-wrapper -->
            </div> <!-- end masonry -->

            @if($articles->hasPages())
							<div class="row">
								<div class="column large-12">
										<nav class="pgn">
											{!! $articles->onEachSide(1)->withQueryString()->links() !!}
										</nav><!-- end pgn -->
								</div><!-- end column -->
							</div><!-- end row -->
						@endif

        </div> <!-- end s-bricks -->

    </section> <!-- end s-content -->

@endsection
