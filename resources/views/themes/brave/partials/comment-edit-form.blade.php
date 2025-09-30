<form class="comment-edit-form" method="POST" data-comment-id="{{ $commentOrReply->id }}" action="{{ route('comment.update', $commentOrReply->id) }}">
    @csrf
    <input type="hidden" name="article_id" value="{{ $commentOrReply->article_id }}">

    <div class="form-feedback d-none alert alert-success"></div>

    <div class="form-group">
        <textarea name="msg" class="form-control" rows="3" required>{{ old('msg', $commentOrReply->body) }}</textarea>
    </div>

    <div class="form-group mt-2">
        <button type="submit" class="btn btn-success btn-sm w-100">Update</button>
    </div>
</form>
