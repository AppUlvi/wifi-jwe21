// WIFI
// Shopping List
// =============================================================================


let inputField = $('#text_field');
let shopList = $('#app_list');
let counter = $('#count_items');
let list = [];

let addButton = $('#add_button');

// counter.removeClass('hidden');

inputField.keyup(function (e) {
    // keyCode of "Enter" is 13
    if (e.keyCode === 13) {
        // saves the value of inputField into input 
        let input = e.target.value;

        if (checkMyInput(input)) {
            addHTML(list);
        }

    }
});

addButton.click(function () {

    let input = inputField.val();
    if (checkMyInput(input)) {
        addHTML(list);
    }

});




function checkMyInput(input) {
    // capitalize the first character of a string
    // info: slice() slices the string and returns it starting from the given index
    input = input.charAt(0).toUpperCase() + input.slice(1);

    if (searchArrayForDuplicateItem(list, input) == -1) {
        list.push([input, 'noCheck']);
        console.log(list); // DEBUG

        return true;
    } else return false;
}

// searches a given array for a given item and if it exist returns index of item if not returns -1
// only for two dimensional arrays and only for the first column
function searchArrayForDuplicateItem(array, item) {
    for (let i = 0; i < array.length; i++) {
        if (item == array[i][0])
            return i;
    }
    return -1;
}

function addHTML(array) {

    let listItems = '';
    array.forEach(elm => {
        listItems += `<div class="app_list_item"><button class="check_button">&check;</button><p class="app_list_item_name">${elm[0]}</p><button class="minus_button">&#65293;</button></div>`;
        shopList.html(listItems);
    });

    if (array.length >= 1 && array.length <= 9) {
        counter.removeClass('hidden');
        counter.html(`<p>${array.length}</p>`);
    } else if (array.length > 9) {
        counter.html(`<p>9+</p>`);
    } else {
        counter.addClass('hidden');
    }
}

