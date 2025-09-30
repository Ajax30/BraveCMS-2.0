<form id="commentForm" class="comment-form" method="post" action="{{ route('comment.submit') }}" autocomplete="off"
    novalidate="novalidate">
    @csrf
    <input type="hidden" name="article_id" value="{{ isset($article->id) ? $article->id : $article_id }}">
    <input type="hidden" name="parent_id" value="{{ $comment->id ?? '' }}">
    <div class="form-group">
        <textarea name="msg" id="message" cols="30" rows="5" class="form-control" placeholder="Comment"
            data-rule-required="true"></textarea>
        @error('msg')
            <p class="help-block text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <input type="submit" value="Comment" class="btn btn-md btn-success w-100">
    </div>
</form>
