<form class="commentDeleteForm" onsubmit="return confirm('Delete this comment?')" method="post"
    action="{{ route('comment.delete', $commentOrReply->id) }}" novalidate>
    @csrf
    <button type="submit" class="comment-delete-btn">
        <i class="fa fa-trash"></i> Delete
    </button>
</form>
