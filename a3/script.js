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

document.addEventListener('DOMContentLoaded', () => {
    const movieSelection = document.querySelectorAll('input[name="movie"]');
    const screeningTimes = document.getElementById('screening-times');
    
    const moviesDataElement = document.getElementById('movies-data');
    const moviesObject = JSON.parse(moviesDataElement.getAttribute('data-movies'));

    movieSelection.forEach(radio => {
        radio.addEventListener('change', (event) => {
            const selectedMovie = event.target.value;
            const movieData = moviesObject[selectedMovie];
            const screeningList = movieData.screenings;

            const screeningHTML = Object.keys(screeningList).map(day => {
                const time = screeningList[day].time;
                return `<option value="${time}">${day} - ${time}</option>`;
            }).join('');

            screeningTimes.innerHTML = screeningHTML;
        });
    });
});

