let randomList;

function onGenerateClick() {
    let min = parseInt(document.querySelector('#min-value').value);
    let max = parseInt(document.querySelector('#max-value').value);
    let length = parseInt(document.querySelector('#length').value);

    randomList = new RandomList(min, max, length);

    document.querySelector('#generate-output').textContent =
        'Liste erzeugt';
}

function onSearchClick() {
    const value = parseInt(document.querySelector('#search-value').value)

    let start = performance.now();
    const isInList = randomList.isInList(value);
    const isInListTime = performance.now() - start;

    let output = document.querySelector('#search-output');
    if (isInList) {
        start = performance.now();
        const n = randomList.count(value);
        const countTime = performance.now() - start;
        output.textContent = value + " wurde " + n + "-mal gefunden. " + countTime + "ms";
    }
    else {
        output.textContent = value + " wurde nicht gefunden.";
    }
}

document.querySelector('#generate')
    .addEventListener('click', onGenerateClick);

document.querySelector('#search')
    .addEventListener('click', onSearchClick);