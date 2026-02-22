document.addEventListener("DOMContentLoaded", () => {
    const container = document.getElementById("comments_container");
    if (!container || container.dataset.infinitescroll !== "1") return;

    const articleId = container.dataset.articleId;
    const loader = document.getElementById("comments_loader");

    let page = 0;
    let loading = false;
    let moreComments = container.dataset.commentsPerPage > 0;

    if (!moreComments) {
        if (loader) loader.style.display = "none";
        return;
    }

    const sentinel = document.createElement("div");
    sentinel.id = "comments_sentinel";
    container.after(sentinel);

    const observer = new IntersectionObserver(entries => {
        const entry = entries[0];
        if (!entry.isIntersecting || loading || !moreComments) return;
        loadMoreComments();
    }, { threshold: 1 });

    observer.observe(sentinel);

    async function loadMoreComments() {
        if (!moreComments) return;
        loading = true;
        if (loader) loader.style.display = "flex";
        page++;

        try {
            const res = await fetch("/load_comments", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                    "X-Requested-With": "XMLHttpRequest"
                },
                body: JSON.stringify({ article_id: articleId, page: page })
            });

            const data = await res.json();

            if (data.html?.trim()) {
                const temp = document.createElement("div");
                temp.innerHTML = data.html;
                Array.from(temp.children).forEach(comment => {
                    comment.classList.add("comment-batch-enter");
                    container.appendChild(comment);
                    comment.getBoundingClientRect();
                    comment.classList.add("comment-batch-enter-active");
                });
            }

            moreComments = data.more_comments_to_display;

            if (!moreComments) {
                observer.disconnect();
                sentinel.remove();
            }

        } catch (e) {
            console.error("Infinite comments error:", e);
        }

        if (loader) loader.style.display = "none";
        loading = false;
    }
});