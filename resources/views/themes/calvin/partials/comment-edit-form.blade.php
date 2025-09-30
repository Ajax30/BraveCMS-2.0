@if (session('success') && session('success_comment_id') == ($commentOrReply->id ?? null))
    @include('themes/' .$theme_directory . '/partials/success')
@endif

<div class="form-wrapper">
    <div class="h-text-center alert-box-ajax alert-box alert-box--success">
        Your comment was updated and will be visible to everyone after approval.
    </div>

    <div class="h-text-center alert-box-ajax alert-box alert-box--error">
        Failed to update comment!
    </div>

    <form class="commentEditForm" method="post" action="{{ route('comment.update', $commentOrReply->id) }}" autocomplete="off" novalidate>
        @csrf
        <fieldset>
            <div class="message form-field">
                <textarea name="msg" class="h-full-width" placeholder="Your Message" required>{{ $commentOrReply->body }}</textarea>

                @error('msg')
                    <p class="help-block text-danger">{{ $message }}</p>
                @enderror
            </div>
            <br>
            <input name="submit" class="btn btn--primary btn-wide btn--large h-full-width" value="Update Comment" type="submit">
        </fieldset>
    </form>
</div>
