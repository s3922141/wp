<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lunardo Booking Page</title>
    
    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
    <script src='script.js'></script>
  </head>

  <body>

    <header>
      <h1>Lunardo</h1>
    </header>

    <nav>
      | <a href="http://titan.csit.rmit.edu.au/~s3922141/wp/a3/index.php">Home</a> |
    </nav>

    <h2>Booking Page</h2>

    <form action="bookings.php" method="post">
        <!-- Hidden Field for Movie Code -->
        <input type="hidden" name="movie" value="ACT">

        <!-- Radio Buttons for movie -->
        <fieldset>
            <legend>Pick a movie!</legend>
            <label class="movie-label">
                <input type="radio" name="movie" value="ACT" >
                Indiana Jones and the Dial of Destiny
            </label>
            <label class="movie-label">
                <input type="radio" name="movie" value="RMC" >
                Barbie
            </label>
            <label class="movie-label">
                <input type="radio" name="movie" value="ANM" >
                Teenage Mutant Ninja Turtles: Mutant Mayhem
            </label>
            <label class="movie-label">
                <input type="radio" name="movie" value="DRM" >
                Oppenheimer
            </label>
        </fieldset>

        <fieldset>
            <legend>Pick a day!</legend>
            <label class="day-label">
                <input type="radio" name="day" value="MON" >
                Monday
            </label>
            <label class="day-label">
                <input type="radio" name="day" value="TUE" >
                Tuesday
            </label>
            <label class="day-label">
                <input type="radio" name="day" value="WED" >
                Wednesday
            </label>
            <label class="day-label">
                <input type="radio" name="day" value="THU" >
                Thursday
            </label>
            <label class="day-label">
                <input type="radio" name="day" value="FRI" >
                Friday
            </label>
            <label class="day-label">
                <input type="radio" name="day" value="SAT" >
                Saturday
            </label>
            <label class="day-label">
                <input type="radio" name="day" value="SUN" >
                Sunday
            </label>
        </fieldset>

        <fieldset>
            <legend>Pick a time!</legend>
            <label class="time-label">
                <input type="radio" name="time" value="3PM" >
                3pm
            </label>
            <label class="time-label">
                <input type="radio" name="time" value="6PM" >
                6pm
            </label>
            <label class="time-label">
                <input type="radio" name="time" value="9PM" >
                9pm
            </label>
            <label class="time-label">
                <input type="radio" name="time" value="12P" >
                12pm
            </label>
        </fieldset>

        <fieldset>
            <legend>Select your seats!</legend>
            
            <div class="option">
                <label for="option1">First Class Standard:</label>
                <select id="option1" name="option1">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            
            <div class="option">
                <label for="option2">Option 2:</label>
                <select id="option2" name="option2">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            
            <!-- Add more option blocks as needed -->
            
        </fieldset>

        <!-- Dropdowns for Seat Types -->
        <fieldset>
            <legend>Select Seat Types</legend>
            <select name="seats[STA]" data-fullprice="21.5" data-discprice="16">
                <option value="" disabled selected>Please select</option>
                <?php
                    for ($i = 1; $i <= 10; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                ?>
            </select>
            <!-- Add other seat types here -->
        </fieldset>

        <!-- Text-based Fields -->
        <fieldset>
            <legend>Customer Details</legend>
            <label>Full Name: <input type="text" name="customer[name]" required></label><br>
            <label>Email: <input type="email" name="customer[email]" required></label><br>
            <label>Australian Mobile: <input type="tel" name="customer[mobile]" pattern="[0-9]{10}" required></label><br>
        </fieldset>

        <button type="submit">Submit Booking</button>
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo "<h2>Submitted Data:</h2>";
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
        }
    ?>
    <footer>
      <div>| Lunardo@emailplace.com.au | 035967876 | 23 Main street, Springfield |</div>
      <div>&copy;<script>
        document.write(new Date().getFullYear());
      </script>, Benjamin Finn, S3922141, <a href="https://github.com/s3922141/wp">Github</a>, Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>
    <aside id="debug">
      <hr>
      <h3>Debug Area</h3>
      <pre>
GET Contains:
<?php print_r($_GET) ?>
POST Contains:
<?php print_r($_POST) ?>
SESSION Contains:
<?php print_r($_SESSION) ?>
      </pre>
    </aside>

  </body>
</html>
