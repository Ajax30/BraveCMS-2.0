@if ($comments && count($comments))
    <div class="comments mt-4" id="comments_container">
        @foreach ($comments as $comment)
            @if (is_null($comment->parent_id))
                <div x-data="{ showEdit: false, showReply: false }" class="card bg-light comment mb-3" id="comment-{{ $comment->id }}">
                    <h5 class="card-header">
                        <span class="row">
                            <span class="col-md-6 text-dark avatar">
                                <img src="{{ asset('images/avatars/' . $comment->user->avatar) }}"
                                    alt="{{ $comment->user->first_name }} {{ $comment->user->last_name }}"
                                    class="rounded-circle me-1">
                                {{ $comment->user->first_name }} {{ $comment->user->last_name }} says:
                            </span>
                            <span class="col-md-6 text-dark d-none d-md-flex align-items-center justify-content-end">
                                {{ date('jS M Y', strtotime($comment->created_at)) }}
                            </span>
                        </span>
                    </h5>

                    <div class="card-body bg-white p-2">
                        <p class="comment__text">{{ $comment->body }}</p>
                        <ul class="comment-actions list-unstyled">
                            @if (Auth::check() && $comment->user->id !== Auth::id())
                                <li>
                                    <a class="comment-reply" @click.prevent="showReply = !showReply">
                                        <i class="fa-regular fa-comments"></i>
                                        <span x-text="showReply ? 'Cancel' : 'Reply'"></span>
                                    </a>
                                </li>
                            @endif
                            @if (Auth::check() && $comment->user->id === Auth::id())
                                <li>
                                    <a class="comment-edit" @click.prevent="showEdit = !showEdit">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                        <span x-text="showEdit ? 'Cancel' : 'Edit'"></span>
                                    </a>
                                </li>
                                <li>
                                    @include(
                                        'themes/' . $theme_directory . '/partials/comment-delete-form',
                                        ['commentOrReply' => $comment]
                                    )
                                </li>
                            @endif
                        </ul>

                        {{-- Edit form --}}
                        <div class="mt-2 comment-edit-form-wrapper" x-show="showEdit" x-transition>
                            @include('themes/' . $theme_directory . '/partials/comment-edit-form', [
                                'commentOrReply' => $comment,
                            ])
                        </div>

                        {{-- Reply form --}}
                        @if (Auth::check())
                            <div class="mt-2 reply-form" x-show="showReply" x-transition>
                                @include('themes/' . $theme_directory . '/partials/comment-form', [
                                    'article' => $article,
                                    'parent_id' => $comment->id,
                                ])
                            </div>
                        @endif
                    </div>

                    {{-- Replies --}}
                    @if ($comment->replies && count($comment->replies))
                        <div class="replies ps-4 mt-3">
                            @foreach ($comment->replies as $reply)
                                <div x-data="{ showEdit: false }" class="card bg-light comment mb-2 me-2"
                                    id="comment-{{ $reply->id }}">
                                    <h5 class="card-header">
                                        <span class="row">
                                            <span class="col-md-6 text-dark avatar">
                                                <img src="{{ asset('images/avatars/' . $reply->user->avatar) }}"
                                                    alt="{{ $reply->user->first_name }} {{ $reply->user->last_name }}"
                                                    class="rounded-circle me-1">
                                                {{ $reply->user->first_name }} {{ $reply->user->last_name }} says:
                                            </span>
                                            <span
                                                class="col-md-6 text-dark d-none d-md-flex align-items-center justify-content-end">
                                                {{ date('jS M Y', strtotime($reply->created_at)) }}
                                            </span>
                                        </span>
                                    </h5>

                                    <div class="card-body bg-white p-2">
                                        <p class="comment__text">{{ $reply->body }}</p>
                                        <ul class="comment-actions list-unstyled">
                                            @if (Auth::check() && $reply->user->id === Auth::id())
                                                <li>
                                                    <a class="comment-edit" @click.prevent="showEdit = !showEdit">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                        <span x-text="showEdit ? 'Cancel' : 'Edit'"></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    @include(
                                                        'themes/' .
                                                            $theme_directory .
                                                            '/partials/comment-delete-form',
                                                        ['commentOrReply' => $reply]
                                                    )
                                                </li>
                                            @endif
                                        </ul>

                                        {{-- Edit form --}}
                                        <div class="mt-2 comment-edit-form-wrapper" x-show="showEdit" x-transition>
                                            @include(
                                                'themes/' . $theme_directory . '/partials/comment-edit-form',
                                                ['commentOrReply' => $reply]
                                            )
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif
        @endforeach
    </div>
@endif
