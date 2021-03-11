const params = new URLSearchParams(window.location.search);
const id = params.get('film_id');

// console.log(window.location.search);
// console.log(params);
// console.log(id);

if (id !== undefined) {
    // fetch auf API:  https://ghibliapi.herokuapp.com/films/{id}
    fetch('https://Ghibliapi.herokuapp.com/films/' + id)
        .then(function (response) {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('Api error');
            }
        })
        .then(function (film) {
            const title = document.querySelector('#film-title');
            const description = document.querySelector('#film-description');

            title.textContent = film.title;
            description.textContent = film.description;

            // displays properties from film in console
            for (const property in film) {
                console.log(property + ': ' + film[property]);
            }
        })
        .catch(function (error) {
            console.log(error.message);
        });
}
