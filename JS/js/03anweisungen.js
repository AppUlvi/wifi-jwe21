if (typeof 'Apfel' == 'string')
    console.log(true);
else
    console.log(false);
// true

if (1 > 0)
    console.log(true);
else
    console.log(false);
// true


if (1 == 1)
    console.log(true);
else
    console.log(false);
// true

if (0 <= 1)
    console.log(true);
else
    console.log(false);
// true

if (0 != 1)
    console.log(true);
else
    console.log(false);
// true

if (!(0 == 1))
    console.log(true);
else
    console.log(false);
// true

if ((1 < 5) && (9 == 14))
    console.log(true);
else
    console.log(false);
// false

if ((1 < 5) || (9 == 14))
    console.log(true);
else
    console.log(false);
// true

if ((1 == 1) || (2 > 1 && 4 == 6))
    console.log(true);
else
    console.log(false);
// true

if ('Name'.length == 4)
    console.log(true);
else
    console.log(false);
// true

if ('Name'.indexOf('o') == -1)
    console.log(true);
else
    console.log(false);
// true


let vorname = 'Qendrim';

switch (vorname) {
    case 'Roland':
        console.log('Ich bin Netflix-Fan');
        break;
    case 'Qendrim':
        console.log('Ich habe coding für mich entdeckt!');
        break;
    default:
        console.log("What");
}