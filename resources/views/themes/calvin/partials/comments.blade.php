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
            @foreach ($comments as $comment)
            <li class="depth-1 comment">
              <div class="comment__avatar">
                <img class="avatar" src="{{ asset('images/avatars/' . $comment->user->avatar) }}" alt="" width="50" height="50">
              </div>
              <div class="comment__content">
                <div class="comment__info">
                  <div class="comment__author">{{ $comment->user->first_name }} {{ $comment->user->last_name }}</div>
                  <div class="comment__meta">
                    <div class="comment__time">{{ date('jS M Y', strtotime($comment->created_at)) }}</div>
                    <div class="comment__reply">
                      <a class="comment-reply-link" href="#0">Reply</a>
                    </div>
                  </div>
                </div>
                <div class="comment__text">
                  <p>{{ $comment->body }}</p>
                </div>
              </div>
            </li>
            @endforeach
          </ol>
          
          <div class="ajax-load text-center is-hidden">
            loading...
          </div>
        </div>
      @endif
      <!-- END commentlist -->
    </div><!-- end col-full -->
  </div><!-- end comments -->
</div><!-- end comments-wrap -->