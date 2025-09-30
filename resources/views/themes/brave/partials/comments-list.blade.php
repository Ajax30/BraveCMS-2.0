@if ($comments && count($comments))
    <div class="comments mt-4" id="comments_container">
        @foreach ($comments as $comment)
            @if (is_null($comment->parent_id))
                @include('themes/' . $theme_directory . '/partials/comment-card', [
                    'comment' => $comment,
                    'isReply' => false,
                    'article' => $article
                ])
            @endif
        @endforeach
    </div>
@endif