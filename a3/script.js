alert("JavaScript is working!");

const movieDetailsDiv = document.getElementById('movie-details');

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

function fetchMovieDetails(movieCode) {
    const url = `tools.php?movie=${movieCode}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            if ('error' in data) {
                movieDetailsDiv.innerHTML = '<p>Invalid movie selection.</p>';
            } else {
                const screenings = data.screenings;

                // Generate radio buttons for screening times
                const screeningTimeRadioDiv = document.getElementById('screening-time-radio-buttons');
                let screeningTimeRadios = '';
                for (const day in screenings) {
                    const screening = screenings[day];
                    screeningTimeRadios += `
                        <label>
                            <input type="radio" name="screening-time" value="${day}">
                            ${day}: ${screening.time} (${screening.rate})
                        </label><br>`;
                }
                screeningTimeRadioDiv.innerHTML = screeningTimeRadios;

                // Update the main movie-details div with other movie information
                const details = `
                    <h2>${data.title}</h2>
                    <p>Genre: ${data.genre}</p>
                    <p>Rating: ${data.rating}</p>
                    <p>Summary: ${data.summary}</p>
                    <!-- Add more details as needed -->
                `;
                movieDetailsDiv.innerHTML = details;
            }
        })
        .catch(error => {
            console.error('Error fetching movie details:', error);
            movieDetailsDiv.innerHTML = '<p>An error occurred while fetching movie details.</p>';
        });

        const screeningTimeRadios = document.querySelectorAll('input[name="screening-time"]');
}

document.addEventListener("DOMContentLoaded", function() {
    // Check if the current page is index.php before adding scroll event listeners
    if (window.location.pathname.includes("index.php")) {
        window.addEventListener('scroll', updateAboutUsLink);
        window.addEventListener('scroll', updateSeatsandPricesLink);
        window.addEventListener('scroll', updateNowShowingLink);
    }
});



//called by booking.php grabs movie from url and auto selects matching button in pick a movie section
document.addEventListener("DOMContentLoaded", function() {
    var urlParams = new URLSearchParams(window.location.search);
    var selectedMovie = urlParams.get("movie");
    var radioButtons = document.getElementsByName("movie");
    var movieMatched = false;

    for (var i = 0; i < radioButtons.length; i++) {
        if (radioButtons[i].value === selectedMovie) {
            radioButtons[i].checked = true;
            fetchMovieDetails(selectedMovie);
            movieMatched = true;
            break;
        }
    }
    if (!movieMatched) {
        alert("No movie match!");
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
});

const prices = {
    regular: {
        FCA: 31.00, // First Class Adult regular price
        FCP: 28.00, // First Class Concession regular price
        FCC: 25.00, // First Class Child regular price
        STA: 21.50, // Standard Adult regular price
        STP: 19.00, // Standard Concession regular price
        STC: 17.50, // Standard Child regular price
    },
    discount: {
        FCA: 25.00, // First Class Adult discount price
        FCP: 23.50, // First Class Concession discount price
        FCC: 22.00, // First Class Child discount price
        STA: 16.00, // Standard Adult discount price
        STP: 14.50, // Standard Concession discount price
        STC: 13.00, // Standard Child discount price
    }
};

// ... Your existing JavaScript code ...
// Helper function to get the selected screening rate
function getSelectedScreeningRate() {
    const selectedScreening = document.querySelector('input[name="screening-time"]:checked');
    if (selectedScreening) {
        const selectedScreeningLabel = selectedScreening.parentElement.textContent;
        if (selectedScreeningLabel.includes("(discount)")) {
            return "discount";
        } else {
            return "regular";
        }
    }
    return 'regular';
}


function updateTotalPrice() {
    const totalPriceDisplay = document.getElementById('total-price-display');
    const seatSelects = document.querySelectorAll('select[name^="seats"]');
    const selectedScreeningRate = getSelectedScreeningRate();
    let totalPrice = 0;

    seatSelects.forEach(seat => {
        const seatType = seat.name.split('[')[1].split(']')[0];
        if (selectedScreeningRate === "discount") {
            const seatPrice = prices.discount[seatType]; // You can adjust this based on your pricing data
            totalPrice += seat.value * seatPrice;
        } else {
            const seatPrice = prices.regular[seatType]; // You can adjust this based on your pricing data
            totalPrice += seat.value * seatPrice;
        }
    });

    totalPriceDisplay.textContent = `Total Price: $${totalPrice.toFixed(2)}`;
}

document.addEventListener("DOMContentLoaded", function() {
    const seatSelects = document.querySelectorAll('select[name^="seats"]');
    const screeningTimeRadios = document.querySelectorAll('input[name="screening-time"]');

    // Add change event listeners to seat selection elements
    seatSelects.forEach(seat => {
        seat.addEventListener('change', updateTotalPrice);
    });

    // Find the fieldset containing the screening time radio buttons
    const screeningTimeFieldset = document.querySelector('#screening-time-radio-buttons');

    // Add change event listener using event delegation
    screeningTimeFieldset.addEventListener('change', function(event) {
        if (event.target.name === 'screening-time') {
            updateTotalPrice();
        }
    });


    // Call updateTotalPrice once on initial load
    updateTotalPrice();
});

document.addEventListener("DOMContentLoaded", function() {
    const rememberMeCheckbox = document.getElementById('remember-me-checkbox');
    const nameInput = document.querySelector('input[name="customer[name]"]');
    const emailInput = document.querySelector('input[name="customer[email]"]');
    const mobileInput = document.querySelector('input[name="customer[mobile]"]');

    // Load saved customer details from localStorage if "Remember Me" was checked
    if (localStorage.getItem('rememberMe') === 'true') {
        rememberMeCheckbox.checked = true;
        nameInput.value = localStorage.getItem('customerName');
        emailInput.value = localStorage.getItem('customerEmail');
        mobileInput.value = localStorage.getItem('customerMobile');
    }

    // Add change event listener to "Remember Me" checkbox
    rememberMeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            // Save customer details to localStorage
            localStorage.setItem('rememberMe', 'true');
            localStorage.setItem('customerName', nameInput.value);
            localStorage.setItem('customerEmail', emailInput.value);
            localStorage.setItem('customerMobile', mobileInput.value);
        } else {
            // Remove customer details from localStorage
            localStorage.removeItem('rememberMe');
            localStorage.removeItem('customerName');
            localStorage.removeItem('customerEmail');
            localStorage.removeItem('customerMobile');
        }
    });
});
