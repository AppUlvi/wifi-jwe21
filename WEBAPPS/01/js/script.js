function parseInput(number_s, defaultValue) {
    if (number_s.trim().toUpperCase() === 'PI') {
        return Math.PI;
    }
    else if (number_s.trim().toUpperCase() === 'E') {
        return Math.E;
    }
    else {
        const number = parseFloat(number_s);

        if (isNaN(number)) {
            return defaultValue;
        }
        else {
            return number;
        }
    }
}

function calculate() {
    const num1 = parseInput(document.querySelector('#num1').value);
    const num2 = parseInput(document.querySelector('#num2').value);
    const operator = document.querySelector('#operator').value;

    // Berechnung und speichern in einer dritten Variable
    let result;

    if (operator === '+') {
        result = num1 + num2;
    }
    else if (operator === '-') {
        result = num1 - num2;
    }
    else if (operator === '*') {
        result = num1 * num2;
    }
    else if (operator === '/') {
        result = num1 / num2;
    }

    // Die Ausgabe
    document.querySelector('#result').value = result;
}

function getNumbers(defaultValue) {
    const numberElems = document.querySelectorAll('.number');

    let numbers = [];
    for (let i = 0; i < numberElems.length; i++) {
        numbers.push(parseInput(numberElems[i].value, defaultValue));
    }

    return numbers;
}

function sum() {
    const numbers = getNumbers(0);

    // let result = 0;
    // for (let number of numbers) {
    //     result += number;
    // }
    let result = numbers[0];
    for (let i = 1; i < numbers.length; i++) {
        result += numbers[i];
    }

    document.querySelector('#result').value = result;
}

function product() {
    const numbers = getNumbers(1);

    let result = 1;
    for (let number of numbers) {
        result *= number;
    }

    document.querySelector('#result').value = result;
}

const button = document.querySelector('#button-calc');
button.addEventListener('click', calculate);

document.querySelector('#button-sum').addEventListener('click', sum);
document.querySelector('#button-product').addEventListener('click', product);