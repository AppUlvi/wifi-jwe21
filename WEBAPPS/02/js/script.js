const queue = [];

function enqueue(element) {
    queue.push(element);
}

function dequeue() {
    return queue.shift();
}

const stack = [];

function push(element) {
    stack.push(element);
}

function pop() {
    return stack.pop();
}

function onEnqueueButtonClick() {
    const elem = document.querySelector('#enqueue-value').value;

    enqueue(elem);

    showQueue();
}

function onDequeueButtonClick() {
    const elem = dequeue();

    const output = document.querySelector('#dequeue-value');
    if (elem !== undefined) {
        output.classList.remove('warn');
        // entspricht $("#dequeue-value").html("..."):
        output.innerText = 'Wert: ' + elem;
    }
    else {
        output.classList.add('warn');
        output.innerText = 'Eine leere Queue kann kein dequeue!';
    }
    showQueue();
}

function showQueue() {
    showDataStructure('queue', queue);
}

function showStack() {
    showDataStructure('stack', stack);
}

function showDataStructure(id, data_structure) {
    const div = document.querySelector('#' + id);
    div.querySelector('.output').textContent = id + ": " + data_structure.join(', ');
}

document.querySelector('#enqueue-button').addEventListener('click', onEnqueueButtonClick);
document.querySelector('#dequeue-button').addEventListener('click', onDequeueButtonClick);
