const exportButton = document.getElementById('exploreSite')
const resultBlock = document.getElementById('result')
const searchInput = document.getElementById('search-url')

urlRegex = /^https?:\/\/(?:www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b(?:[-a-zA-Z0-9()@:%_\+.~#?&\/=]*)$/

searchInput.onkeyup = function (event) {
    if (!event.target.value || !urlRegex.test(event.target.value)) {
        return
    }

    searchInput.classList.remove('is-invalid')
}

exportButton.onclick = function () {
    const searchUrl = searchInput.value

    if (
        !searchUrl
        || !urlRegex.test(searchUrl)
    ) {
        searchInput.classList.add('is-invalid')

        return
    }

    const requestUrl = 'model.php?url=' + searchUrl

    resultBlock.innerHTML = `Loading from ${requestUrl}...`

    fetch(requestUrl)
        .then((result) => result.text())
        .then((data) => {
            resultBlock.innerHTML = data
        })
}

