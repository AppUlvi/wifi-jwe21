// WIFI
// Ulvi Ulu
// =============================================================================

// QUEUE
const queue = [];

function enqueue(element) {
    queue.push(element);
}

function dequeue() {
    console.log('test');
    return queue.shift();
}

// Eingabe holen aus dem Element #enqueue-value
// Aufruf der enqueue-Funktion mit der Eingabe
function onEnqueueButtonClick() {
    const inputValue = document.querySelector('#input-value').value;

    if (!inputValue)
        document.querySelector('#action-value').value = "error: empty value";
    else {
        enqueue(inputValue);
        document.querySelector('#action-value').value = "enqueue " + inputValue;
        document.querySelector('#queue-list').value = queue;
    }
}

// Ausgabe der Variable
// Aufruf der dequeue-Funktion und speichern einer Variable
function onDequeueButtonClick() {
    let val = dequeue();

    if (val === undefined) {
        document.querySelector('#action-value').value = "error: nothing to remove";
        document.querySelector('#dequeue-value').value = "no value";
    } else {
        document.querySelector('#dequeue-value').value = val;
        document.querySelector('#action-value').value = "dequeue " + val;
        document.querySelector('#queue-list').value = queue;
    }
}


// STACK
const stack = [];

function push(element) {
    stack.push(element);
}

function pop() {
    return stack.pop();
}

function onPushButtonClick() {
    const inputValue = document.querySelector('#input-value').value;

    if (!inputValue)
        document.querySelector('#action-value').value = "error: empty value";
    else {
        push(inputValue);
        document.querySelector('#action-value').value = "push " + inputValue;
        document.querySelector('#stack-list').value = stack;
    }
}

function onPopButtonClick() {
    let val = pop();

    if (val === undefined) {
        document.querySelector('#action-value').value = "error: nothing to pop";
        document.querySelector('#pop-value').value = "no value";
    } else {
        document.querySelector('#pop-value').value = val;
        document.querySelector('#action-value').value = "pull " + val;
        document.querySelector('#stack-list').value = stack;
    }
}

// MAIN
document.querySelector('#enqueue-button').addEventListener('click', onEnqueueButtonClick);
document.querySelector('#dequeue-button').addEventListener('click', onDequeueButtonClick);
document.querySelector('#push-button').addEventListener('click', onPushButtonClick);
document.querySelector('#pop-button').addEventListener('click', onPopButtonClick);

