<form class="comment-form" method="POST" action="{{ route('comment.submit') }}">
    @csrf

    <input type="hidden" name="article_id" value="{{ $article->id }}">
    <input type="hidden" name="parent_id" value="{{ $parent_id ?? 0 }}">

    <div class="form-feedback d-none alert alert-success"></div>

    <div class="form-group">
        <textarea name="msg" class="form-control" rows="4" required>{{ old('msg') }}</textarea>
    </div>
    
    <div class="form-group mt-2">
        <button type="submit" class="btn btn-success btn-sm w-100">Submit</button>
    </div>
</form>
