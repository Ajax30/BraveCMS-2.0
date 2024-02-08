@if (session('success') && session('success_comment_id') == ($comment->id ?? null))
    @include('themes/' .$theme_directory . '/partials/success')
@endif

<div class="form-wrapper">

  <div class="h-text-center alert-box-ajax alert-box alert-box--success">
    Your comment was updated and will be visible to everyone after approval.
  </div>

  <form class="commentEditForm" method="post" action="{{ route('comment.update', $commentOrReply->id) }}" autocomplete="off" novalidate> 
    @csrf
      <fieldset>
        <div class="message form-field">
          <textarea name="msg" id="message" class="h-full-width" placeholder="Your Message" required>{{ $commentOrReply->body }}</textarea>

          @error('msg')
          <p class="help-block text-danger">{{ $message }}</p>
          @enderror
        </div>
        <br>
        <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large h-full-width" value="Update Comment" type="submit">
      </fieldset>
  </form>
</div>