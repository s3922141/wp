<?php
session_start();

include 'post-validation.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit_existing_booking'])) {
        $_SESSION['form_data'] = array(
            'email' => $_POST['email'],
            'phone' => $_POST['phone']
        );
        header("Location: currentbookings.php");
        exit();
    }
  }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit_booking'])) {
        $errors = [];
        $postErrors = validateBooking();

        if (!empty($errors['dishonest'])) {
            //there are dishonest errors, go to index
            header("Location: index.php");
            exit;  
        } 
        else if (!empty($errors)) {
            //there are honest errors
            //adress them
        }
        else {
            // There are no errors,add booking then go to receipt

            // Get all info relevant to booking
            $orderDate = date('Y-m-d H:i:s');
            $name = trim($_POST['customer']['name']);
            $email = trim($_POST['customer']['email']);
            $mobile = trim($_POST['customer']['mobile']);
            $movieCode = trim($_POST['movie']);
        
            $screeningDetails = trim($_POST['screening-time']);
            $selectedValues = explode(':', $screeningDetails);

            $dayOfMovie = $selectedValues[0];
            $timeOfMovie = trim($selectedValues[1]);
            $rateOfMovie = trim($selectedValues[2]);

            //set values to 0 by default, will be updated if field is set
            $numberFCA = 0;
            $priceFCA = 0.00;
            $numberFCP = 0;
            $priceFCP = 0.00;
            $numberFCC = 0;
            $priceFCC = 0.00;
            $numberSTA = 0;
            $priceSTA = 0.00;
            $numberSTP = 0;
            $priceSTP = 0.00;
            $numberSTC = 0;
            $priceSTC = 0.00;

            if (isset($_POST['seats']['FCA'])) {
                $numberFCA = trim($_POST['seats']['FCA']);
                if ($rateOfMovie == 'discount') {
                    $priceFCA = $numberFCA * 25.00;
                }
                else {
                    $priceFCA = $numberFCA * 31.00;
                }
            } 

            if (isset($_POST['seats']['FCP'])) {
                $numberFCP = trim($_POST['seats']['FCP']);
                if ($rateOfMovie == 'discount') {
                    $priceFCP = $numberFCP * 23.50;
                }
                else {
                    $priceFCP = $numberFCP * 28.00;
                }
            } 

            if (isset($_POST['seats']['FCC'])) {
                $numberFCC = trim($_POST['seats']['FCC']);
                if ($rateOfMovie == 'discount') {
                    $priceFCC = $numberFCC * 22.00;
                }
                else {
                    $priceFCC = $numberFCC * 25.00;
                }
            }

            if (isset($_POST['seats']['STA'])) {
                $numberSTA = trim($_POST['seats']['STA']);
                if ($rateOfMovie == 'discount') {
                    $priceSTA = $numberSTA * 16.00;
                }
                else {
                    $priceSTA = $numberSTA * 21.50;
                }
            }

            if (isset($_POST['seats']['STP'])) {
                $numberSTP = trim($_POST['seats']['STP']);
                if ($rateOfMovie == 'discount') {
                    $priceSTP = $numberSTP * 14.50;
                }
                else {
                    $priceSTP = $numberSTP * 19.00;
                }
            }

            if (isset($_POST['seats']['STC'])) {
                $numberSTC = trim($_POST['seats']['STC']);
                if ($rateOfMovie == 'discount') {
                    $priceSTC = $numberSTC * 17.50;
                }
                else {
                    $priceSTC = $numberSTC * 13;
                }
            }
        
        
            $total = $priceFCA + $priceFCP + $priceFCC + $priceSTA + $priceSTP + $priceSTC;
            $gst = $total / 11;         

            $data = array($orderDate, $name, $email, $mobile, $movieCode, $dayOfMovie, $timeOfMovie, $numberFCA, $priceFCA, $numberFCP, $priceFCP, $numberFCC, $priceFCC, $numberSTA, $priceSTA, $numberSTP, $priceSTP, $numberSTC, $priceSTC, $total, $gst);
            // Open the file for writing in append mode
            $file = fopen('bookings.txt', 'a');
            // Write the data to the file in CSV format
            fputcsv($file, $data);
            // Close the file
            fclose($file);

            $_SESSION['booking_data'] = $data;

            header("Location: reciept.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lunardo Booking Page</title>
    
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
    
  </head>

  <body>

    <header>
      <h1>Lunardo</h1>
      <img src="../../media/LunardoLogo.png" alt="Lunardo Logo" id = "LunardoLogo">
    </header>

    <nav>
      | <a href="http://titan.csit.rmit.edu.au/~s3922141/wp/a4/index.php">Home</a> |
    </nav>

    <h2>Booking Page</h2>
        <!--buttons for selecting a movie-->
    <form action="booking.php?movie=ACT" method="post">
        <input type="hidden" name="movie" value="ACT">

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

        <input type="hidden" name="selected-screening" id="selected-screening">
         <!--displays the details of a selected movie-->
        <div id="movie-details"></div>
        <div id="screenings-details"></div>

         <!--based on selected movie displays screening times-->
        <fieldset>
            <legend>Select a screening time!</legend>
            <div id="screening-time-radio-buttons"></div>
        </fieldset>

         <!--dropdowns for each seat type-->
        <fieldset class="seat-selection">
            <legend>Select Seat Types</legend>

            <div class="seat-row">
                <label for="First-Class-Adult">First Class Adult:</label>
                <select name="seats[FCA]" id="First-Class-Adult">
                    <option value="" disabled selected>Please select</option>
                    <?php
                    for ($i = 0; $i <= 10; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
            </div>
            
            <div class="seat-row">
                <label for="First-Class-Concession">First Class Concession:</label>
                <select name="seats[FCP]" id="First-Class-Concession">
                    <option value="" disabled selected>Please select</option>
                    <?php
                    for ($i = 0; $i <= 10; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="seat-row">
                <label for="First-Class-Child">First Class Child:</label>
                <select name="seats[FCC]" id="First-Class-Child">
                    <option value="" disabled selected>Please select</option>
                    <?php
                    for ($i = 0; $i <= 10; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="seat-row">
                <label for="Standard-Adult">Standard Adult:</label>
                <select name="seats[STA]" id="Standard-Adult">
                    <option value="" disabled selected>Please select</option>
                    <?php
                    for ($i = 0; $i <= 10; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="seat-row">
                <label for="Standard-Concession">Standard Concession:</label>
                <select name="seats[STP]" id="Standard-Concession">
                    <option value="" disabled selected>Please select</option>
                    <?php
                    for ($i = 0; $i <= 10; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="seat-row">
                <label for="Standard-Child">Standard Child:</label>
                <select name="seats[STC]" id="Standard-Child">
                    <option value="" disabled selected>Please select</option>
                    <?php
                    for ($i = 0; $i <= 10; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
            </div>
        </fieldset>


         <!--total price display, updates as changes are made-->
        <div id="total-price">
            <span id="total-price-display">Total Price: $0.00</span>
        </div>

         <!--customer information entry, patterns for validation-->
       <fieldset>
            <legend>Customer Details</legend>
            <label>Full Name: <input type="text" name="customer[name]" pattern="[A-Za-zÀ-ÖØ-öø-ÿ\s'\-]+" required></label><br>
            <label>Email: <input type="email" name="customer[email]" required></label><br>
            <label>Australian Mobile: <input type="tel" name="customer[mobile]" pattern="[0-9]{10}" required></label><br>
            <label>
                <input type="checkbox" id="remember-me-checkbox" name="remember-me">
                Remember Me
            </label>

        </fieldset>

        <button type="submit" name="submit_booking">Submit Booking</button>
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
    <fieldset>
    <legend>Existing bookings</legend>

    <form method="post" action="">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required>
        <br>
        <button type="submit" name="submit_existing_booking">Submit Existing Booking</button>
    </form>
    
</fieldset>

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



  <script src='script.js'></script>
</html>
