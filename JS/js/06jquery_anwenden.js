// $('body').html('<div id="jsElement"></div>');
// document.getElementsByTagName('body').innerHTML = '<div id="neues-js-element"></div>';


console.log('Die Seite ist geladen');

// $('#calc').click(
//     function () {
//         console.log('button clicked');
//         console.log($('input').val());
//         console.log(eval($('input').val()));
//     }
// );

$('#calc').click(
    function () {
        console.log('button clicked');
        let eingabe = $('input').val();
        let result = eval(eingabe);
        // console.log(result);
        $('#result').val(result);

    }
);

$('#events').on({

    'mouseenter': function () {
        $(this).css({
            'background-color': 'yellow',
            'color': 'green'
        });
    },

    'mouseleave': function () {
        $(this).css({
            'background-color': 'green',
            'color': 'yellow'
        });
    }

});

$('#events2').on({

    'mouseenter': function () {
        $(this).addClass('mouseover');
    },

    'mouseleave': function () {
        $(this).removeClass('mouseover');
    }

});