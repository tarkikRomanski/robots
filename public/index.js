const exportButton = document.getElementById('exploreSite')
const resultBlock = document.getElementById('result')

exportButton.onclick = function () {
    resultBlock.innerHTML = 'Loading...'

    fetch('model.php')
        .then((result) => result.json())
        .then((data) => {
            resultBlock.innerHTML = data
        })
}

