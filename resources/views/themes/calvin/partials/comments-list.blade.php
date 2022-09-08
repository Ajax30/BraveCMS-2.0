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

    @if (!boolval($is_infinitescroll))
        {!! $comments->links() !!}
    @endif


    <div class="ajax-load">
      <span></span>
    </div>
</div>
<!-- END commentlist -->
