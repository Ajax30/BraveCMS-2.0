@if (session('success') && session('success_comment_id') == ($comment->id ?? null))
    @include('themes/' .$theme_directory . '/partials/success')
@endif

<div class="form-wrapper">
  <div class="alert-box-ajax alert-box alert-box--success">
    Your comment is pending
  </div>

  <div class="alert-box-ajax alert-box alert-box--error">
    Failed to add comment!
  </div>

  <form class="commentForm" method="post" action="{{ route('comment.submit') }}" autocomplete="off">
    @csrf
      <fieldset>
        <input type="hidden" name="article_id" value="{{ isset($article->id) ? $article->id : $article_id }}">
        <input type="hidden" name="parent_id" value="{{ $comment->id ?? '' }}">

        <div class="message form-field">
            <textarea name="msg" id="message" class="h-full-width" placeholder="Your Message" required></textarea>

            @error('msg')
            <p class="help-block text-danger">{{ $message }}</p>
            @enderror
        </div>
        <br>
        <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large h-full-width" value="Add Comment" type="submit">
      </fieldset>
  </form>
</div>