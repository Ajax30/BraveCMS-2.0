@foreach ($comments as $comment)
    @if (null == $comment->parent_id)
        <li class="depth-1 comment">
            <div class="comment__avatar">
                <img class="avatar" src="{{ asset('images/avatars/' . $comment->user->avatar) }}"
                    alt="{{ $comment->user->first_name }} {{ $comment->user->last_name }}" width="50" height="50">
            </div>
            <div class="comment__content">
                <div class="comment__info">
                    <div class="comment__author">{{ $comment->user->first_name }} {{ $comment->user->last_name }}</div>
                    <div class="comment__meta">
                        <div class="comment__time">{{ date('jS M Y', strtotime($comment->created_at)) }}</div>
                        @auth
                            <div class="comment__reply">
                                @if ($comment->user->id !== Auth::user()->id)
                                    <a class="comment-reply-link" href="#0">
                                        <i class="fa fa-comment"></i> Reply
                                    </a>
                                @endif

                                @if ($comment->user->id == Auth::user()->id)
                                    <a href="#0" class="comment-edit-link">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    @include(
                                        'themes/' . $theme_directory . '/partials/comment-delete-form',
                                        ['commentOrReply' => $comment]
                                    )
                                @endif
                            </div>
                        @endauth
                    </div>
                </div>
                <div class="comment__text">
                    <p>{{ $comment->body }}</p>
                </div>
            </div>

            @auth
                @include('themes/' . $theme_directory . '/partials/comment-form')

                @if ($comment->user->id == Auth::user()->id)
                    @include('themes/' . $theme_directory . '/partials/comment-edit-form', [
                        'commentOrReply' => $comment,
                    ])
                @endif
            @endauth

            {{-- Comment replies --}}
            @if (count($comment->replies))
                <ul class="children">
                    @foreach ($comment->replies as $reply)
                        <li class="depth-2 comment">
                            <div class="comment__avatar">
                                <img class="avatar" src="{{ asset('images/avatars/' . $reply->user->avatar) }}"
                                    alt="{{ $comment->user->first_name }} {{ $comment->user->last_name }}"
                                    width="50" height="50">
                            </div>
                            <div class="comment__content">
                                <div class="comment__info">
                                    <div class="comment__author">{{ $reply->user->first_name }}
                                        {{ $reply->user->last_name }}</div>
                                    <div class="comment__meta">
                                        <div class="comment__time">{{ date('jS M Y', strtotime($reply->created_at)) }}
                                        </div>
                                        @auth
                                            <div class="comment__reply">
                                                @if ($reply->user->id == Auth::user()->id)
                                                    <a href="#0" class="comment-edit-link">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                    @include(
                                                        'themes/' .
                                                            $theme_directory .
                                                            '/partials/comment-delete-form',
                                                        ['commentOrReply' => $reply]
                                                    )
                                                @endif
                                            </div>
                                        @endauth
                                    </div>
                                </div>
                                <div class="comment__text">
                                    <p>{{ $reply->body }}</p>
                                </div>
                            </div>

                            @auth
                                @if ($reply->user->id == Auth::user()->id)
                                    @include('themes/' . $theme_directory . '/partials/comment-edit-form', [
                                        'commentOrReply' => $reply,
                                    ])
                                @endif
                            @endauth
                        </li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endif
@endforeach
