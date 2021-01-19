// list with img names and alt
let images = [
    ["pexels0", "turkish coffee"],
    ["pexels1", "coffee on bed"],
    ["pexels2", "filter coffee"],
    ["pexels3", "coffee foam art"],
    ["pexels4", "ice coffee"],
    ["pexels5", "normal coffee aerial view"],
    ["pexels6", "coffee with slogan: \"Life begins after coffee\""],
    ["pexels7", "coffee in a jug"],
    ["pexels8", "ice coffee with a camera behind it"],
    ["pexels9", "people sitting in a circle drinking coffee (aerial view)"]
];

let gallery = $('#gallery');
// console.log(gallery);

let divClassLightbox = $(`<div id="lightbox" class="hide"> <img class="close" src="img/close.png" alt="close-button"> <div class="lightboxInner"></div> </div>`);
$('body > .wrapper').append(divClassLightbox);


// output thumbs
$(images).each(function (i) {

    let imgTag = `<img src="img/thumbs/${images[i][0]}.jpg" alt="${images[i][1]}" class="thumb">`
    // console.log(imgTag);

    let output = `<a href="img/original/${images[i][0]}.jpg">${imgTag}</a>`;

    // gallery.html(output);
    gallery.append(output);

});


// click event to show original size img
$('#gallery a').click(function (e) {
    e.preventDefault();
    let originalImg = $(this).attr('href');
    divClassLightbox.find('.lightboxInner').html(`<img src="${originalImg}" alt="">`);
    divClassLightbox.removeClass('hide');
});


// click event to close original size img with the close button
$('.close').click(function () {
    divClassLightbox.addClass('hide');
    console.log('click on close');
});


// click event to close original size img with a click outside
$('.lightboxInner').click(function (e) {

    // What is 'e'?
    // https://www.youtube.com/watch?v=OiWLIe_Cz6E&feature=emb_logo

    let lightboxImg = $('.lightboxInner img');

    // console.log(lightboxImg);
    // lightboxImg: <img src="img/original/pexels2.jpg" alt="">

    // console.log(e);
    // console.log(e.target);
    // e.target: <img src="img/original/pexels2.jpg" alt="">

    if (lightboxImg.is(e.target)) {
        console.log('click on img');
    } else {
        divClassLightbox.addClass('hide');
        console.log('click outside img');
    }

    // if (!lightboxImg.is(e.target)) {
    //     divClassLightbox.addClass('hide');
    //     console.log('click outside img');
    // }

    // .is(selector)Returns: Boolean
    // Description: Check the current matched set of elements against a selector, element, or jQuery object 
    //              and return true if at least one of these elements matches the given arguments.

});


// key event to close original size img with the escape key
$(document).on('keydown', function (e) {

    if (e.keyCode === 27) {
        divClassLightbox.addClass('hide');
        console.log('Escape key pressed');
    }

});

// different structure
// $(document).on({
//     'click': function () {
//         // click event
//     },
//     'keydown': function (e) {
//         // key event
//     }
// });


// TODO: switch between original size img with arrow keys
// https://stackoverflow.com/questions/3149362/capture-key-press-or-keydown-event-on-div-element
