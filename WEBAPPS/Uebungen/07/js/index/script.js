function getMovies(event) {
    fetch('https://Ghibliapi.herokuapp.com/films')
        .then(function (response) {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('Api error');
            }
        })
        .then(function (films) {
            // Für jeden Film:
            // erzeuegen wir ein li
            // befüllen das li mit Information zum Film
            // Füge li an unsere ul hinzu
            const ul = document.querySelector('#film-list');
            for (const film of films) {
                const li = document.createElement('li');
                const title = film.title;
                const id = film.id;

                const a = document.createElement('a');

                a.textContent = title;
                a.href = 'film.html?film_id=' + id;

                li.appendChild(a);
                ul.appendChild(li);
            }
        })
        .catch(function (error) {
            console.log(error.message);
        });
}

document.querySelector('#get-film-btn').addEventListener('click', getMovies);
