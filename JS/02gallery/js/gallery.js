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

// output thumbs

$(images).each(function (i, elm) {
    // console.log(images[i]);

    // img tag

    let imgTag = `<img src="img/thumgbs/${elm}.jpg" alt="">`


    console.log(imgTag);

});

// click event to show original size img