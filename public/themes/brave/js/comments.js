document.addEventListener("DOMContentLoaded", function () {
    const commentsContainer = document.getElementById("comments_container");
    const commentsStatus = document.getElementById("comments_status");

    function showAlert(message, type = "success", insertBeforeEl = null, extraClass = "") {
        const alert = document.createElement("div");
        alert.className = `alert alert-${type} my-2 ${extraClass}`.trim();
        alert.textContent = message;
        if (insertBeforeEl && insertBeforeEl.parentNode) {
            insertBeforeEl.parentNode.insertBefore(alert, insertBeforeEl);
        } else if (commentsContainer) {
            commentsContainer.prepend(alert);
        }
        setTimeout(() => alert.remove(), 4000);
    }

    function updateCommentCount(delta) {
        if (!commentsStatus) return;
        const current = parseInt(commentsStatus.getAttribute("data-count") || "0");
        const newCount = current + delta;
        commentsStatus.setAttribute("data-count", newCount);
        commentsStatus.innerHTML = `<i class="fa fa-comments me-1"></i> ${newCount} comments`;
    }

    // ---------- Add comment / reply ----------
    document.querySelectorAll(".comment-form").forEach(form => {
        form.addEventListener("submit", function (e) {
            e.preventDefault();
            const action = form.getAttribute("action");
            const formData = new FormData(form);

            fetch(action, { method: "POST", headers: { "X-Requested-With": "XMLHttpRequest" }, body: formData })
                .then(res => res.json())
                .then(data => {
                    if (data.status === "success") {
                        const isReply = form.closest(".me-2");
                        showAlert("Your comment is waiting moderation.", "success", form, isReply ? "me-2" : "");
                        form.reset();
                    } else {
                        showAlert(data.message || "Failed to submit comment.", "danger", form);
                    }
                })
                .catch(() => showAlert("An error occurred. Try again.", "danger", form));
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

                        const extraClass = commentEl.classList.contains("me-2") ? "me-2" : "";
                        showAlert("Comment updated and pending approval.", "success", commentEl, extraClass);

                        updateCommentCount(-1); // mark as unapproved
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
            const extraClass = commentEl?.classList.contains("me-2") ? "me-2" : "";

            fetch(action, { method: "POST", headers: { "X-Requested-With": "XMLHttpRequest" }, body: formData })
                .then(res => res.json())
                .then(data => {
                    const insertBefore = nextEl || commentEl;
                    if (data.status === "success") {
                        showAlert("Comment deleted successfully.", "success", insertBefore, extraClass);
                        if (commentEl) commentEl.remove();
                        updateCommentCount(-1);
                    } else {
                        showAlert(data.message || "Failed to delete comment.", "danger", insertBefore, extraClass);
                    }
                })
                .catch(() => {
                    const insertBefore = nextEl || commentEl;
                    showAlert("An error occurred. Try again.", "danger", insertBefore, extraClass);
                });
        });
    });
});
