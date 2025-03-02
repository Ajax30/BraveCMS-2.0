window.onload = function () {
  const tagsList = document.getElementById("tagsList")
  const tagSelector = document.getElementById("tagsSelector")
  const preSelectedTags = Array.from(tagSelector.options)
    .filter((option) => option.selected)
    .map((option) => option.text)
  var selectedTags = new Set()

  function filterTags(event) {
    var query = event.target.value
    var availableTags = Array.from(tagSelector.options)

    availableTags.forEach(function (option) {
      if (!option.text.toLowerCase().includes(query.toLowerCase())) {
        option.classList.add("d-none")
      } else {
        option.classList.remove("d-none")
      }
    })
  }

  function renderTags() {
    tagsList.innerHTML =
      [...selectedTags]
        .sort()
        .map(
          (tag) =>
            `<li class="tag"
              ><span class="value">${tag}</span>
              <button>&times;</button>
           </li>`,
        )
        .join("") ||
      `<li class="text-muted">Use [Ctrl] + [Click] to select one or more tags from the list</li>`
    for (const option of tagSelector.options) {
      option.selected = selectedTags.has(option.textContent)
    }
  }

  function addPreselectedTags() {
    preSelectedTags.forEach(selectedTags.add.bind(selectedTags))
    renderTags()
  }

  tagsList.addEventListener("click", function (event) {
    if (event.target.tagName !== "BUTTON") return
    const span = event.target.closest("LI").children[0]
    selectedTags.delete(span.textContent)
    renderTags()
  })

  tagSelector.addEventListener("change", function () {
    selectedTags = new Set(
      Array.from(tagSelector.options)
        .filter((option) => option.selected)
        .map((option) => option.textContent),
    )
    renderTags()
  })

  addPreselectedTags();
};

function toggleTagSelector(event) {
  const tagToggler = document.getElementById("tagSelectorToggler")
  const tagActions = document.getElementById("tagActions")
  let tagActionsVisibility = tagActions.checkVisibility()

  if (event.target.tagName !== "BUTTON" && event.target.tagName !== "SPAN") {
    if (tagActionsVisibility) {
      tagActions.style.display = "none"
      tagToggler.classList.add("active")
    } else {
      tagActions.style.display = "block"
      tagToggler.classList.remove("active")
    }
  }
}