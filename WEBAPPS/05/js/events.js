function onOuterClick(event) {
    console.log("Das outer div wurde geklickt");
}

function onMiddleClick(event) {
    console.log("Das middle div wurde geklickt");
}

function onInnerClick(event) {
    console.log("Das inner div wurde geklickt");
    // Um zu verhindern, dass ein Event an die äußeren Elemente weitergereicht wird:
    // event.stopPropagation();
}


const outerDiv = document.querySelector('#outer');
const middleDiv = document.querySelector('#middle');
const innerDiv = document.querySelector('#inner');

outerDiv.addEventListener('click', onOuterClick);
middleDiv.addEventListener('click', onMiddleClick);
innerDiv.addEventListener('click', onInnerClick);