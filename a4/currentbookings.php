<?php
session_start();

//include tools.php for access to movie details
include 'tools.php';  
?>

<!DOCTYPE html>
<html lang='en'>
<header>
    <title>Current Bookings</title>
    <h1>Current Bookings</h1>
</header>
<nav>
    <a href="http://titan.csit.rmit.edu.au/~s3922141/wp/a4/index.php">Home</a>
</nav>

<link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">

<body>
    <?php   
    //make a variable to track if any matches are found
    $matchFound = false;
    
    // Retrieve the stored data from the session
    if (isset($_SESSION['form_data'])) {
        $data = $_SESSION['form_data'];
        
        // Read and process the bookings.txt file
        $checkEmail = $data['email'];
        $checkPhone = $data['phone'];
        echo "<hr>";
    
        $file = fopen("bookings.txt", "r");
        if ($file) {
            while (($line = fgets($file)) !== false) {
                $bookingInfo = str_getcsv($line);
                $emailInFile = $bookingInfo[2]; 
                $phoneInFile = $bookingInfo[3]; 
                $movieCode = $bookingInfo[4];

                if ($emailInFile === $checkEmail && $phoneInFile === $checkPhone) {
                    $movieTitle = $moviesObject[$movieCode]['title'];

                    echo "<form action='reciept.php' method='post'>";
                    echo "Booking placed: " . $bookingInfo[0] . "<br>";
                    echo "Name: " . $bookingInfo[1] . "<br>";
                    echo "Movie: " . $movieTitle . "<br>";
                    echo "<br>";
                    echo "Number of seats:". "<br>";

                    //for each seat type, if not 0 display number of seats
                    //first class adult
                    if ($bookingInfo[7] != 0){
                        echo "First class adult - " . $bookingInfo[7] . "<br>";
                    }

                    //first class concession
                    if ($bookingInfo[9] != 0){
                        echo "First class concession - " . $bookingInfo[9] . "<br>";
                    }

                    //first class child
                    if ($bookingInfo[11] != 0){
                        echo "First class child - " . $bookingInfo[11] . "<br>";
                    }
                    
                    //standard adult
                    if ($bookingInfo[13] != 0){
                        echo "Standard adult - " . $bookingInfo[13] . "<br>";
                    }

                    //standard concession
                    if ($bookingInfo[15] != 0){
                        echo "Standard concession - " . $bookingInfo[15] . "<br>";
                    }

                    //standard child
                    if ($bookingInfo[17] != 0){
                        echo "Standard child - " . $bookingInfo[17] . "<br>";
                    }

                    // convert the line into an array then store the booking data in the session
                    $data = explode(",", $line);
    
                    // Add a button to view receipt
                    echo "<form action='reciept.php' method='post'>";
                    echo "<input type='hidden' name='booking_data' value='$line'>";
                    echo "<input type='submit' value='View Receipt'>";
                    echo "</form>";
                    echo "<hr>";
    
                    //set matchfound to true
                    $matchFound = true;
                }
            }
            fclose($file);
        } else {
            echo "Error reading the file.";
        }
    } else {
        echo "Form data not set.";
    }
    
    if ($matchFound === false)
    {
        echo "No existing bookings found.";
    }
    ?>
    
</body>
</html>
