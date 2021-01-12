function init_canvas(id, canvas_width, canvas_height) {
    let canvas = document.getElementById(id);
    let ctx = canvas.getContext("2d");
    let scale = window.devicePixelRatio;
    console.log(`creating a canvas with ${canvas_width} x ${canvas_height} css pixels at devicePixelRatio ${window.devicePixelRatio}`);

    // set to real pixels - will never be used again!
    canvas.width = canvas_width * scale;
    canvas.height = canvas_height * scale;
    ctx.scale(scale, scale)

    // set style to virtual pixels, we will work with virtual pixels from now on
    canvas.style.width = canvas_width + "px";
    canvas.style.height = canvas_height + "px";
    return ctx;
}
