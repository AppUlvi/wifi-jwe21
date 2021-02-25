// WIFI
// Ulvi Ulu
// =============================================================================

let randomList;

function onGenerateClick() {
    let valStart = parseFloat(document.querySelector('#start-value').value);
    let valEnd = parseFloat(document.querySelector('#end-value').value);
    let arrLength = parseFloat(document.querySelector('#array-length').value);

    if (arrLength > 0 && valStart <= valEnd) {

        let startTime = performance.now();
        randomList = generateRandomList(valStart, valEnd, arrLength);
        console.log((performance.now() - startTime) + "ms");

        document.querySelector('#output').textContent = randomList.join(', ');
    } else
        document.querySelector('#output').textContent = "error";

}

function generateRandomList(valStart, valEnd, arrLength) {
    let list = [];
    for (let i = 0; i < arrLength; i++) {
        // https://www.w3schools.com/js/js_random.asp
        // This JavaScript function always returns a random number between min and max (both included):
        list[i] = Math.floor(Math.random() * (valEnd - valStart + 1)) + valStart;
    }
    return list;
}

// Search
function onSearchClick() {
    const valSearch = parseFloat(document.querySelector('#search-value').value);

    if (isInList(valSearch)) {
        let count = 0;
        for (let i = 0; i < randomList.length; i++)
            if (valSearch === randomList[i])
                count++;

        document.querySelector('#found-value').value = count;
    } else
        document.querySelector('#found-value').value = 'not found';

}

function isInList(valSearch) {
    for (let i = 0; i < randomList.length; i++)
        if (valSearch === randomList[i])
            return true;

    return false;
}


document.querySelector('#btn-generate').addEventListener('click', onGenerateClick);
document.querySelector('#btn-search').addEventListener('click', onSearchClick);