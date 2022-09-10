<!-- comments
================================================== -->
<div class="comments-wrap">
    <div class="row comment-respond">
        @auth
            <!-- START respond -->
            <div id="respond" class="column">
                <h3>
                    Add Comment
                </h3>

                @if (session('success'))
                    @include('themes/' .$theme_directory . '/partials/success')
                @endif

                @if (session('error'))
                    @include('themes/' .$theme_directory . '/partials/errors')
                @endif

                <form method="post" action="{{ route('comment.submit') }}" autocomplete="off">
                    @csrf
                    <fieldset>

                        <input type="hidden" name="article_id" value="{{ $article->id }}">

                        <div class="form-field">
                            <input type="text" name="name" id="name" class="h-full-width h-remove-bottom" value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}" disabled>
                        </div>

                        <div class="message form-field">
                            <textarea name="msg" id="message" class="h-full-width" placeholder="Your Message"></textarea>

                            @error('msg')
                            <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <br>
                        <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large h-full-width" value="Add Comment" type="submit">
                    </fieldset>
                </form>
                <!-- end form -->
            </div><!-- END respond-->
        @endauth

        @guest
            <p class="h-text-center h-full-width">You need to <strong>sign in</strong> to comment</p>
        @endguest

    </div><!-- end comment-respond -->

    <div id="comments" class="row">
        <div class="column large-12">
            @if ($comments)
                <h3>
                    @if ($comments_count === 0)
                        No comments for this article yet
                    @else
                        {{ $comments_count }} comment{{ $comments_count > 1 ? 's': ''}}
                    @endif
                </h3>
                <!-- START commentlist -->
                <div id="commentsList">
                    <ol class="commentlist {{ boolval($is_infinitescroll) ? 'infinite-scroll' : '' }}">
                        @include('themes/' . $theme_directory . '/partials/comments-list')
                    </ol>
                    
                    @if ($comments_count > $comments_per_page)
                      <div class="ajax-load">
                        <span></span>
                      </div>
                    @endif
                </div>
            @endif
        </div><!-- end col-full -->
    </div><!-- end comments -->
</div><!-- end comments-wrap -->
