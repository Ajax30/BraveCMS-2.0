@if (@count($comments))
    <div class="comments mt-4">
        @foreach ($comments as $comment)
            @if (null == $comment->parent_id)
                <div class="card bg-light comment"> 
                    <h5 class="card-header">
                        <span class="row">
                            <span class="col-md-6 text-dark avatar">
                                <img src="{{ asset('images/avatars/' . $comment->user->avatar) }}"
                                    alt="{{ $comment->user->first_name }} {{ $comment->user->last_name }}"
                                    class="rounded-circle">{{ $comment->user->first_name }}
                                {{ $comment->user->last_name }}
                                says:
                            </span>
                            <span class="col-md-6 text-dark d-none d-md-flex align-items-center justify-content-end">{{ date('jS M Y', strtotime($comment->created_at)) }}</span>
                        </span>
                    </h5>
                    <div class="card-body bg-white p-2">
                        <p>{{ $comment->body }}</p>
                        <ul class="comment-actions list-unstyled">
                            @if (Auth::user() && $comment->user->id !== Auth::user()->id)
                                <li>
                                    <a href="#"><i class="fa-regular fa-comments"></i> Reply</a>
                                </li>
                            @endif

                            @if (Auth::user() && $comment->user->id == Auth::user()->id)
                                <li>
                                    <a href="#"><i class="fa-regular fa-pen-to-square"></i> Edit</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa-solid fa-trash"></i> Delete</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>

                @if (count($comment->replies))
                    <div class="replies ps-4 mb-3">
                        @foreach ($comment->replies as $reply)
                            <div class="card bg-light comment">
                                <h5 class="card-header">
                                    <span class="row">
                                        <span class="col-md-6 text-dark avatar">
                                            <img src="{{ asset('images/avatars/' . $reply->user->avatar) }}"
                                                alt="{{ $comment->user->first_name }} {{ $comment->user->last_name }}"
                                                class="rounded-circle">{{ $comment->user->first_name }}
                                            {{ $comment->user->last_name }}
                                            says:
                                        </span>
                                        <span
                                            class="col-md-6 text-dark d-none d-md-flex align-items-center justify-content-end">{{ date('jS M Y', strtotime($reply->created_at)) }}</span>
                                    </span>
                                </h5>
                                <div class="card-body bg-white p-2">
                                    <p>{{ $reply->body }}</p>
                                    <ul class="comment-actions list-unstyled">
                                        @if (Auth::user() && $reply->user->id == Auth::user()->id)
                                            <li>
                                                <a href="#"><i class="fa-regular fa-pen-to-square"></i> Edit</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa-solid fa-trash"></i> Delete</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endif
        @endforeach
    </div>
@endif
