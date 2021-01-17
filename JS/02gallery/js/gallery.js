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

let lightboxContainer = $(`<div id="lightbox" class="hide"> <span class="close">X</span> <div class="lightboxInner"></div> </div>`);
lightboxContainer.find('.lightboxInner').html('<img src="img/original/pexels0.jpg" alt="">');
$('body > .wrapper').append(lightboxContainer);


// output thumbs
$(images).each(function (i, elm) {
    // console.log(images[i]);

    let imgTag = `<img src="img/thumbs/${images[i][0]}.jpg" alt="${images[i][1]}" class="thumb">`
    console.log(imgTag);


    let output = `<a href="img/original/${images[i][0]}.jpg">${imgTag}</a>`;

    // gallery.html(output);
    gallery.append(output);

});

// click event to show original size img

$('#gallery a').click(function (e) {
    e.preventDefault();
    let originalImg = $(this).attr('href');
    lightboxContainer.find('.lightboxInner').html(`<img src="${originalImg}" alt="">`);
    lightboxContainer.removeClass('hide');
    console.log(originalImg);
});

$('span').click(function () {
    lightboxContainer.addClass('hide');
});


//ecomerce
//fag gesetzt