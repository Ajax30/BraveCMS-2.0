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
        <input type="hidden" name="parent_id" value="{{ $comment->id ?? '' }}">

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