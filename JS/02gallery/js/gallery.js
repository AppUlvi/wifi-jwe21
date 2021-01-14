// list with img names

let images = [
    "pexels0",
    "pexels1",
    "pexels2",
    "pexels3",
    "pexels4",
    "pexels5",
    "pexels6",
    "pexels7",
    "pexels8",
    "pexels9"
];

let gallery = $('#gallery');
// console.log(gallery);

let lightboxContainer = $(`<div id="lightbox" class="hide"> <span class="close">X</span> <div class="lightboxInner"></div> </div>`);
lightboxContainer.find('.lightboxInner').html('<img src="img/original/pexels0.jpg" alt="">');
$('body > .wrapper').append(lightboxContainer);


// output thumbs
$(images).each(function (i, elm) {
    // console.log(images[i]);

    let imgTag = `<img src="img/thumbs/${elm}.jpg" alt="" class="thumb">`
    // console.log(imgTag);



    let output = `<a href="img/original/${elm}.jpg">${imgTag}</a>`;

    // gallery.html(output);
    gallery.append(output);

});


//    < div id = "lightbox" >
//         <span class="close">X</span>
//         <div class="lightboxInner">
//             <img src="img/original/pexels0.jpg" alt="">
//         </div>
//     </div>

// let imgLightbox = `<img src="img/original/pexels0.jpg" alt="">`;

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