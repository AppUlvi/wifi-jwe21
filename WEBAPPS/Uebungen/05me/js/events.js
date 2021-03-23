// function onOuterClick(event) {
//     console.log("Das outer div wurde geklickt");
// }

function onMiddleClick(event) {
    console.log('Das middle div wurde geklickt');

    // event.target: Das HTML Element, wo das Event entstanden ist
    const element = event.target;
    // event.currentTarget: Das HTML Element, wo dieser EventListener hinzugefügt worden ist.
    if (element !== event.currentTarget) {
        console.log(`Tatsächlich wurde ${element.id} angeklickt.`);
    } else {
        console.log('Das middle div selbst wurde angeklickt');
    }
}

// function onInnerClick(event) {
//     console.log("Das inner div wurde geklickt");
//     // Um zu verhindern, dass ein Event an die äußeren Elemente weitergereicht wird:
//     // event.stopPropagation();
// }

// const outerDiv = document.querySelector('#outer');
const middleDiv = document.querySelector('#middle');
// const innerDiv = document.querySelector('#inner');
// const inner2Div = document.querySelector('#inner2');

// outerDiv.addEventListener('click', onOuterClick);
middleDiv.addEventListener('click', onMiddleClick);
// innerDiv.addEventListener('click', onInnerClick);
// inner2Div.addEventListener('click', onInnerClick);

// Events steigen in der Struktur der Elemente auf der Seite auf
document.body.addEventListener('click', function (event) {
    console.log(
        'Der Eventlistener am body Element hat ein click Event bemerkt.'
    );
});
