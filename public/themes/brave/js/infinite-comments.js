document.addEventListener("DOMContentLoaded", () => {
    const container = document.getElementById("comments_container");
    if (!container || container.dataset.infinitescroll !== "1") return;

    const status = document.getElementById("comments_status");
    const loader = document.getElementById("comments_loader");

    const totalComments = parseInt(status?.dataset.count || "0", 10);
    let loadedComments = container.children.length;

    if (loadedComments >= totalComments) return;

    let page = 0;
    let loading = false;

    const sentinel = document.createElement("div");
    sentinel.id = "comments_sentinel";
    container.after(sentinel);

    const observer = new IntersectionObserver(([entry]) => {
        if (!entry.isIntersecting || loading) return;
        loadMoreComments();
    }, { threshold: 1 });

    observer.observe(sentinel);

    async function loadMoreComments() {
        if (loading || loadedComments >= totalComments) return;

        loading = true;
        loader?.classList.remove("d-none");
        page++;

        try {
            const res = await fetch("/load_comments", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                    "X-Requested-With": "XMLHttpRequest"
                },
                body: JSON.stringify({
                    article_id: container.dataset.articleId,
                    page
                })
            });

            if (!res.ok) throw new Error("Request failed");

            const { html } = await res.json();
            if (!html?.trim()) return;

            const temp = document.createElement("div");
            temp.innerHTML = html;

            const newComments = Array.from(temp.children);
            newComments.forEach(comment => {
                comment.classList.add("comment-batch-enter");
                container.appendChild(comment);
                comment.getBoundingClientRect();
                comment.classList.add("comment-batch-enter-active");
            });

            loadedComments += newComments.length;

            if (loadedComments >= totalComments) {
                observer.disconnect();
                sentinel.remove();
            }

        } catch (e) {
            console.error("Infinite comments error:", e);
        } finally {
            loader?.classList.add("d-none");
            loading = false;
        }
    }
});