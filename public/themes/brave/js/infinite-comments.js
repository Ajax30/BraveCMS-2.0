document.addEventListener("DOMContentLoaded", () => {
  const container = document.getElementById("comments_container");
  if (!container || container.dataset.infinitescroll !== "1") return;

  const loader = document.getElementById("comments_loader");
  const total = parseInt(
    document.getElementById("comments_status")?.dataset.count || "0", 10);

  let loaded = container.children.length;
  if (loaded >= total) return;

  let page = 0;
  let loading = false;
  let finished = false;

  const sentinel = document.createElement("div");
  sentinel.id = "comments_sentinel";
  container.after(sentinel);

  const csrf =
    document.querySelector('meta[name="csrf-token"]')?.content || "";

  const observer = new IntersectionObserver(
    ([e]) => e.isIntersecting && load(),
    { threshold: 0.1, rootMargin: "0px 0px 200px 0px" }
  );

  observer.observe(sentinel);

  async function load() {
    if (loading || finished || loaded >= total) return;

    loading = true;
    page++;
    loader?.classList.remove("d-none");

    try {
      const res = await fetch("/load_comments", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": csrf,
          "X-Requested-With": "XMLHttpRequest"
        },
        body: JSON.stringify({
          article_id: container.dataset.articleId,
          page
        })
      });

      if (!res.ok) throw new Error();

      const { html } = await res.json();
      if (!html?.trim()) return finish();

      const temp = document.createElement("div");
      temp.innerHTML = html;

      if (!temp.children.length) return finish();

      const fragment = document.createDocumentFragment();

      Array.from(temp.children).forEach(el => {
        el.classList.add("comment-batch-enter");
        fragment.appendChild(el);
      });

      container.appendChild(fragment);

      Array.from(
        container.querySelectorAll(".comment-batch-enter:not(.comment-batch-enter-active)")
      ).forEach(el => {
        void el.offsetWidth;
        el.classList.add("comment-batch-enter-active");
      });

      loaded += temp.children.length;

      if (loaded >= total) finish();

    } catch {
      console.error("Infinite comments error");
    } finally {
      loader?.classList.add("d-none");
      loading = false;
    }
  }

  function finish() {
    finished = true;
    observer.disconnect();
    sentinel.remove();
    loader?.classList.add("d-none");
  }
});