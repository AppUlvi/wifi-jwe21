let userNameFromDatabase = 'Roland';

function checkMyInput(input) {
    if (typeof input == 'string' && input.length >= 2) {
        for (i = 0; i < input.length; i++) {
            if (!(isNaN(parseInt(input.charAt(i)))))
                return false;
        } //checks if there is a number in string
        return true;
    } else
        return false;
}

function sayMyName(name) {
    if (checkMyInput(name))
        console.log('Your name is ' + name);
    else
        console.log(name + ' is not a Name.');
}

sayMyName('Ulvi');
sayMyName('T');
sayMyName('123');
sayMyName('Ber22');
sayMyName(userNameFromDatabase);
