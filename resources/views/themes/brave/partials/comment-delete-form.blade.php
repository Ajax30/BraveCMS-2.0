<form class="delete-comment-form"
      method="POST"
      data-comment-id="{{ $commentOrReply->id }}"
      action="{{ route('comment.delete', ['id' => $commentOrReply->id]) }}">
    @csrf
    <button type="submit" class="comment-delete">
        <i class="fa-solid fa-trash"></i> Delete
    </button>
</form>
