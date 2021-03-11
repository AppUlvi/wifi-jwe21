// returns Math.PI if input is 'PI'
// returns Math.E if input is 'E'
// returns defaultValue if input isNaN
// returns parseFloat if input is a number
function parseInput(input, defaultValue) {
    if (input.trim().toUpperCase() === 'PI') return Math.PI;
    else if (input.trim().toUpperCase() === 'E') return Math.E;
    else if (isNaN(parseFloat(input))) return defaultValue;
    else return parseFloat(input);
}

// calculates number 1 & number 2 with the selected operator and writes it into #result query
function calculate() {
    const num1 = parseInput(document.querySelector('#num1').value);
    const num2 = parseInput(document.querySelector('#num2').value);
    const operator = document.querySelector('#operator').value;

    let result;

    if (operator === '+') result = num1 + num2;
    else if (operator === '-') result = num1 - num2;
    else if (operator === '*') result = num1 * num2;
    else if (operator === '/') result = num1 / num2;

    document.querySelector('#result').value = result;
}

// returns numbers array and overwrites with defaultValue if number isNaN
function getNumbers(defaultValue) {
    const numberElems = document.querySelectorAll('.number');
    let numbers = [];

    for (let i = 0; i < numberElems.length; i++)
        numbers.push(parseInput(numberElems[i].value, defaultValue));

    return numbers;
}

// calculates sum of numbers array
function sum() {
    const numbers = getNumbers(0);
    let result = numbers[0];

    for (let i = 1; i < numbers.length; i++) {
        result += numbers[i];
    }

    document.querySelector('#result').value = result;
}

// calculates product of numbers array
function product() {
    const numbers = getNumbers(1);
    let result = 1;

    for (let number of numbers) result *= number;

    document.querySelector('#result').value = result;
}

// const button = document.querySelector('#button-calc');
// button.addEventListener('click', calculate);

document.querySelector('#button-calc').addEventListener('click', calculate);
document.querySelector('#button-sum').addEventListener('click', sum);
document.querySelector('#button-product').addEventListener('click', product);
