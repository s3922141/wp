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

// Get references to the radio buttons and screenings container
const radioButtons = document.querySelectorAll('input[name="movie"]');
const screeningsContainer = document.getElementById('screenings-container');

// Add a change event listener to the radio buttons
radioButtons.forEach(radioButton => {
  radioButton.addEventListener('change', async () => {
    // Clear previous content
    screeningsContainer.innerHTML = '';

    // Get the selected movie's key (e.g., 'ACT', 'RMC', etc.)
    const selectedMovieKey = radioButton.value;

    // Fetch the screenings for the selected movie using the moviesObject array
    const selectedMovie = moviesObject[selectedMovieKey];
    if (selectedMovie) {
      // Create and display the list of screenings
      const screeningsList = document.createElement('ul');
      for (const day in selectedMovie.screenings) {
        const screening = selectedMovie.screenings[day];
        const screeningItem = document.createElement('li');
        screeningItem.textContent = `Day: ${day}, Time: ${screening.time}, Rate: ${screening.rate}`;
        screeningsList.appendChild(screeningItem);
      }

      // Append the list to the container
      screeningsContainer.appendChild(screeningsList);
    }
  });
});
