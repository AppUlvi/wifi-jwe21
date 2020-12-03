let userNameFromDatabase = 'Roland';

function isInputString(input) {
    if (typeof input == 'string' && input.length >= 2 && isNaN(parseInt(input)))
        return true;
    else
        return false;
}

function sayMyName(name) {
    if (isInputString(name))
        console.log('Your name is ' + name);
    else
        console.log(name + ' is not a Name.');
}

// sayMyName('Ulvi');
// sayMyName('Thomas');
// sayMyName('Bernhard');
// sayMyName(userNameFromDatabase);
