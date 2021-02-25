// WIFI
// Ulvi Ulu
// =============================================================================

let arr = [];

function generateRandomArray() {

    arr = [];

    const valStart = parseFloat(document.querySelector('#start-value').value);
    const valEnd = parseFloat(document.querySelector('#end-value').value);
    const arrLength = parseFloat(document.querySelector('#array-length').value);

    if (arrLength > 0 && valStart <= valEnd) {
        for (let i = 0; i < arrLength; i++) {
            // https://www.w3schools.com/js/js_random.asp
            // This JavaScript function always returns a random number between min and max (both included):
            arr[i] = Math.floor(Math.random() * (valEnd - valStart + 1)) + valStart;
        }
        document.querySelector('#output').textContent = arr.join(', ')
    } else
        document.querySelector('#output').textContent = "error";

}

function searchForValueInArray() {

    const valSearch = parseFloat(document.querySelector('#search-value').value);

    let count = 0;

    for (let i = 0; i < arr.length; i++)
        if (valSearch === arr[i])
            count++;

    if (count > 0)
        document.querySelector('#found-value').value = count;
    else
        document.querySelector('#found-value').value = 'not found';

}


document.querySelector('#btn-generate').addEventListener('click', generateRandomArray);
document.querySelector('#btn-search').addEventListener('click', searchForValueInArray);