document.addEventListener("DOMContentLoaded", function () {
  const commentsContainer = document.getElementById("comments_container");
  const commentsStatus = document.getElementById("comments_status");

  function showAlert(message, type = "success", insertBeforeEl = null, isReply = false) {
    const alert = document.createElement("div");
    alert.className = `alert alert-${type} my-2${isReply ? " me-2" : ""}`;
    alert.textContent = message;

    if (insertBeforeEl && insertBeforeEl.parentNode) {
      insertBeforeEl.parentNode.insertBefore(alert, insertBeforeEl);
    } else if (commentsContainer) {
      commentsContainer.prepend(alert);
    }

    // Remove alert after 4 seconds
    setTimeout(() => alert.remove(), 4000);
  }

  function updateCommentCount(delta) {
    if (!commentsStatus) return;
    let current = parseInt(commentsStatus.getAttribute("data-count") || "0");
    let newCount = current + delta;
    if (newCount < 0) newCount = 0;

    commentsStatus.setAttribute("data-count", newCount);

    if (newCount === 0) {
      commentsStatus.innerHTML = `<i class="fa fa-comments me-1"></i> No comments`;
    } else if (newCount === 1) {
      commentsStatus.innerHTML = `<i class="fa fa-comments me-1"></i> 1 comment`;
    } else {
      commentsStatus.innerHTML = `<i class="fa fa-comments me-1"></i> ${newCount} comments`;
    }
  }

  // ---------- Add comment / reply ----------
  document.querySelectorAll(".comment-form").forEach(form => {
    form.addEventListener("submit", function (e) {
      e.preventDefault();
      const action = form.getAttribute("action");
      const formData = new FormData(form);

      fetch(action, {
        method: "POST",
        headers: { "X-Requested-With": "XMLHttpRequest" },
        body: formData
      })
        .then(res => res.json())
        .then(data => {
          if (data.status === "success") {
            const replyFormWrapper = form.closest(".reply-form"); // the container that has x-show
            const alert = document.createElement("div");
            alert.className = "alert alert-success my-2"; // aligned
            alert.textContent = "Your comment is waiting moderation.";

            // Insert alert above the form
            if (replyFormWrapper) {
              replyFormWrapper.prepend(alert);
            } else {
              form.parentNode.insertBefore(alert, form);
            }

            form.reset();

            if (replyFormWrapper) {
              setTimeout(() => {
                const replyToggleLink = replyFormWrapper.closest('.card.comment').querySelector('.comment-reply');
                if (replyToggleLink) replyToggleLink.click(); // this triggers Alpine transition correctly
                alert.remove();
              }, 4000);
            } else {
              setTimeout(() => alert.remove(), 4000);
            }


          } else {
            showAlert(data.message || "Failed to submit comment.", "danger", form, !!form.closest(".reply-form"));
          }
        })
        .catch(() => showAlert("An error occurred. Try again.", "danger", form, !!form.closest(".reply-form")));
    });
  });

  // ---------- Edit comment / reply ----------
  document.querySelectorAll(".comment-edit-form").forEach(form => {
    form.addEventListener("submit", function (e) {
      e.preventDefault();
      const action = form.getAttribute("action");
      const formData = new FormData(form);
      const commentId = form.dataset.commentId;
      const commentEl = document.getElementById(`comment-${commentId}`);
      const commentTextEl = commentEl ? commentEl.querySelector(".comment__text") : null;
      const toggleLink = commentEl ? commentEl.querySelector(".comment-edit span[x-text]") : null;

      fetch(action, { method: "POST", headers: { "X-Requested-With": "XMLHttpRequest" }, body: formData })
        .then(res => res.json())
        .then(data => {
          if (data.status === "success") {
            if (commentTextEl) commentTextEl.textContent = formData.get("msg");
            form.closest(".comment-edit-form-wrapper").style.display = "none";
            if (toggleLink) toggleLink.textContent = "Edit";

            const isReply = !!commentEl?.classList.contains("reply");
            showAlert("Comment updated and pending approval.", "success", commentEl, isReply);

            updateCommentCount(-1);
          } else {
            showAlert(data.message || "Failed to update comment.", "danger", commentEl);
          }
        })
        .catch(() => showAlert("An error occurred. Try again.", "danger", commentEl));
    });
  });

  // ---------- Delete comment / reply ----------
  document.querySelectorAll(".delete-comment-form").forEach(form => {
    form.addEventListener("submit", function (e) {
      e.preventDefault();
      if (!confirm("Are you sure you want to delete this comment?")) return;

      const action = form.getAttribute("action");
      const formData = new FormData(form);
      const commentId = form.dataset.commentId;
      const commentEl = document.getElementById(`comment-${commentId}`);
      const nextEl = commentEl ? commentEl.nextElementSibling : null;
      const isReply = !!commentEl?.classList.contains("reply");

      fetch(action, { method: "POST", headers: { "X-Requested-With": "XMLHttpRequest" }, body: formData })
        .then(res => res.json())
        .then(data => {
          const insertBefore = nextEl || commentEl;
          if (data.status === "success") {
            showAlert("Comment deleted successfully.", "success", insertBefore, isReply);

            let totalToSubtract = 1;
            if (commentEl) {
              const replies = commentEl.querySelectorAll(".comment.reply");
              totalToSubtract += replies.length;
              commentEl.remove();
            }

            updateCommentCount(-totalToSubtract);
          } else {
            showAlert(data.message || "Failed to delete comment.", "danger", insertBefore, isReply);
          }
        })
        .catch(() => {
          const insertBefore = nextEl || commentEl;
          showAlert("An error occurred. Try again.", "danger", insertBefore, isReply);
        });
    });
  });
});
