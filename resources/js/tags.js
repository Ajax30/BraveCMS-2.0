const tagsList = document.querySelector(".tags-list")
const tagActions = document.getElementById("tagActions")
const tagSelector = document.getElementById("tags")
const tagToggler = document.getElementById("tagSelectorToggler")
if (tagSelector) {
  var preSelectedTags = Array.from(tagSelector.options)
    .filter((option) => option.selected)
    .map((option) => option.text)
  var selectedTags = new Set()
}

window.filterTags = (event) => {
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

window.toggleTagSelector = (event) => {
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

window.renderTags = () => {
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
    option.selected = selectedTags.has(option.textContent.trim())
  }
}

if (preSelectedTags) {
  window.addPreselectedTags = () => {
    preSelectedTags.forEach(selectedTags.add.bind(selectedTags))
    renderTags()
  }
}

if (tagsList) {
  tagsList.addEventListener("click", function (event) {
    if (event.target.tagName !== "BUTTON") return
    let tagToRemove = event.target.closest("LI").children[0].textContent.trim()
    let optionToDeselect = Array.from(tagSelector.options).find((option) => {
      return option.innerText == tagToRemove
    })
    optionToDeselect.removeAttribute('selected')
    selectedTags.delete(tagToRemove)
    renderTags()
  })
}

if (tagSelector) {
  tagSelector.addEventListener("change", function () {
    selectedTags = new Set(
      Array.from(tagSelector.options)
        .filter((option) => option.selected)
        .map((option) => option.textContent.trim()),
    )
    renderTags()
  })
}

if (tagSelector) {
  window.addPreselectedTags();
} 