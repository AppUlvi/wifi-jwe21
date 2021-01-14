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
console.log(gallery);

// output thumbs

$(images).each(function (i, elm) {
    // console.log(images[i]);

    let imgTag = `<img src="img/thumbs/${elm}.jpg" alt="" class="thumb">`
    // console.log(imgTag);

    // gallery.html(imgTag);

    gallery.append(imgTag)


});

// click event to show original size img