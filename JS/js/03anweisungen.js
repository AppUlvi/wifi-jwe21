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
