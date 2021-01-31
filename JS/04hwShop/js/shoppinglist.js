// WIFI
// Shopping List
// Ulvi Ulu
// =============================================================================

let inputField = $('#text_field');
let list = [];

// MAIN
// =============================================================================

inputField.keyup(function (e) {
    // keyCode of "Enter" is 13
    if (e.keyCode === 13) {
        let input = inputField.val();

        // if input is correct run functions
        if (checkMyInput(input)) {
            addHTML(list);
            deleteItem(list);
            checkItem(list);
            countListItems(list);
        }

        // removes input text after enter Key
        inputField.val('');
    }
});

$('#add_button').click(function () {
    let input = inputField.val();

    // if input is correct run functions
    if (checkMyInput(input)) {
        addHTML(list);
        deleteItem(list);
        checkItem(list);
        countListItems(list);
    }

    // removes input text after click
    inputField.val('');
});

// adds html code to the empty app_list div
function addHTML(array) {

    let listItems = '';
    array.forEach(elm => {
        if (elm[1] == 'noCheck') {
            listItems += `<div class="app_list_item"><button class="check_button">&check;</button><p class="app_list_item_name">${elm[0]}</p><button class="minus_button">&#65293;</button></div>`;
        } else {
            listItems += `<div class="app_list_item"><button class="check_button">&check;</button><p class="app_list_item_name check">${elm[0]}</p><button class="minus_button">&#65293;</button></div>`;
        }
        $('#app_list').html(listItems);
    });
}

// LIST BUTTON FUNCTIONS
// =============================================================================

function deleteItem(array) {
    // searches for every delete button
    $(".minus_button").each(function () {
        let deleteButton = $(this);
        // adds a click event to the specific delete button
        deleteButton.click(function (e) {
            // selects parent of the button
            let parent = e.target.parentNode;
            // select content from p-tag
            let content = parent.children[1].textContent;
            // see below: searchArrayForDuplicateItem(array, item)
            let index = searchArrayForItem(array, content);

            // deletes array at click/index position
            // see documentation: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/splice
            array.splice(index, 1);

            // deletes html
            parent.remove();

            // refresh count
            countListItems(array);
        });
    });
}

function checkItem(array) {
    $(".check_button").each(function () {
        let checkButton = $(this);
        checkButton.click(function (e) {
            let parent = e.target.parentNode;
            let content = parent.children[1].textContent;
            let index = searchArrayForItem(array, content);

            // if there is no check on selected p tag add check to array and add class check 
            // else add noCheck to array and remove class
            if (array[index][1] == 'noCheck') {
                array[index].splice(1, 1, 'check');
                parent.children[1].classList.add('check')
            } else {
                array[index].splice(1, 1, 'noCheck');
                parent.children[1].classList.remove('check')
            }
        });
    });
}

// HELP FUNCTIONS
// =============================================================================

let counter = $('#count_items');

// counts list items with the help from array
function countListItems(array) {
    if (array.length >= 1 && array.length <= 9) {
        counter.removeClass('hidden');
        counter.html(`<p>${array.length}</p>`);
    } else if (array.length > 9) {
        counter.html(`<p>9+</p>`);
    } else {
        counter.addClass('hidden');
    }
}

// checks the input for duplicate or empty values
function checkMyInput(input) {
    // capitalize the first character of a string
    // info: slice() slices the string and returns it starting from the given index
    input = input.charAt(0).toUpperCase() + input.slice(1);

    // returns true if no duplicate or empty values else returns false
    if (searchArrayForItem(list, input) == -1 && input != '') {
        list.push([input, 'noCheck']);
        return true;
    } else return false;
}

// searches a given array for a given item
// if it exists returns index of item if not returns "-1"
// only for two dimensional arrays and only for the first column
function searchArrayForItem(array, item) {
    for (let i = 0; i < array.length; i++) {
        if (item == array[i][0])
            return i;
    }
    return -1;
}
