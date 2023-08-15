alert("JavaScript is working!");

function updateAboutUsLink() {
    const aboutUsSection = document.getElementById('About-Us');
    const aboutUsLink = document.querySelector('nav a[href="#About-Us"]');

    const rect = aboutUsSection.getBoundingClientRect();
    const windowHeight = window.innerHeight || document.documentElement.clientHeight;

    // Check if the section is in view and takes up at least half of the screen
    const isAboutUsSectionInView = rect.top <= windowHeight / 2 && rect.bottom >= windowHeight / 2;

    if (isAboutUsSectionInView) {
        aboutUsLink.classList.add('active');
    } else {
        aboutUsLink.classList.remove('active');
    }
}

function updateSeatsandPricesLink() {
    const aboutUsSection = document.getElementById('Seats-and-Prices');
    const aboutUsLink = document.querySelector('nav a[href="#Seats-and-Prices"]');

    const rect = aboutUsSection.getBoundingClientRect();
    const windowHeight = window.innerHeight || document.documentElement.clientHeight;

    // Check if the section is in view and takes up at least half of the screen
    const isAboutUsSectionInView = rect.top <= windowHeight / 2 && rect.bottom >= windowHeight / 2;

    if (isAboutUsSectionInView) {
        aboutUsLink.classList.add('active');
    } else {
        aboutUsLink.classList.remove('active');
    }
}

function updateNowShowingLink() {
    const aboutUsSection = document.getElementById('Now-Showing');
    const aboutUsLink = document.querySelector('nav a[href="#Now-Showing"]');

    const rect = aboutUsSection.getBoundingClientRect();
    const windowHeight = window.innerHeight || document.documentElement.clientHeight;

    // Check if the section is in view and takes up at least half of the screen
    const isAboutUsSectionInView = rect.top <= windowHeight / 2 && rect.bottom >= windowHeight / 2;

    if (isAboutUsSectionInView) {
        aboutUsLink.classList.add('active');
    } else {
        aboutUsLink.classList.remove('active');
    }
}

// Add scroll event listener to update the active link on scroll
window.addEventListener('scroll', updateAboutUsLink);
window.addEventListener('scroll', updateSeatsandPricesLink);
window.addEventListener('scroll', updateNowShowingLink);


//called by booking.php grabs movie from url and auto selects matching button in pick a movie section
document.addEventListener("DOMContentLoaded", function() {
    var urlParams = new URLSearchParams(window.location.search);
    var selectedMovie = urlParams.get("movie");
    var radioButtons = document.getElementsByName("movie");

    for (var i = 0; i < radioButtons.length; i++) {
        if (radioButtons[i].value === selectedMovie) {
            radioButtons[i].checked = true;
            break;
        }
    }
});

document.addEventListener("DOMContentLoaded", function() {
    const movieRadios = document.querySelectorAll('input[name="movie"]');
    const movieDetailsDiv = document.getElementById('movie-details');

    movieRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.checked) {
                const selectedMovie = this.value;
                fetchMovieDetails(selectedMovie);
            }
        });
    });

    function fetchMovieDetails(movieCode) {
        const url = 'tools.php';

        fetch(url)
            .then(response => response.json())
            .then(data => {
                const movie = data[movieCode];
                if (movie) {
                    const details = `
                        <h2>${movie.title}</h2>
                        <p>Genre: ${movie.genre}</p>
                        <p>Rating: ${movie.rating}</p>
                        <p>Summary: ${movie.summary}</p>
                        <!-- Add more details as needed -->
                    `;
                    movieDetailsDiv.innerHTML = details;
                } else {
                    movieDetailsDiv.innerHTML = '<p>No movie details available.</p>';
                }
            })
            .catch(error => {
                console.error('Error fetching movie details:', error);
                movieDetailsDiv.innerHTML = '<p>An error occurred while fetching movie details.</p>';
            });
    }
});
