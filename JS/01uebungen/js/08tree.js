


let treeSize = 7;

let star = "*"
let space = " ";

let output = "";

let cnt1 = treeSize - 1;
let cnt2 = 1;

for (let i = 0; i < treeSize; i++) {

    let starCnt = "";
    let spaceCnt = "";

    for (let j = 0; j < cnt1; j++)
        spaceCnt += space;


    for (let k = 0; k < cnt2; k++)
        starCnt += star;


    output = spaceCnt + starCnt;
    console.log(output);

    cnt1--;
    cnt2 += 2;
}

let spaceCnt = "";

for (let j = 0; j < treeSize - 1; j++)
    spaceCnt += space;

console.log(spaceCnt + "*")


