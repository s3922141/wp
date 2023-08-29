<?php
session_start();

// Retrieve the stored data from the session
if (isset($_SESSION['form_data'])) {
    $data = $_SESSION['form_data'];
    
    // Read and process the bookings.txt file
    $checkEmail = $data['email'];
    $checkPhone = $data['phone'];

    $file = fopen("bookings.txt", "r");
    if ($file) {
        while (($line = fgets($file)) !== false) {
            $bookingInfo = str_getcsv($line);
            $emailInFile = $bookingInfo[2]; 
            $phoneInFile = $bookingInfo[3]; 
            
            if ($emailInFile === $checkEmail && $phoneInFile === $checkPhone) {
                echo "Order Date: " . $bookingInfo[0] . "<br>";
                echo "Name: " . $bookingInfo[1] . "<br>";
                echo "Email: " . $emailInFile . "<br>";
                echo "Mobile: " . $phoneInFile . "<br>";
                
                // convert the line into an array then store the booking data in the session
                $data = explode(",", $line);

                // Add a button to view receipt
                echo "<form action='reciept.php' method='post'>";
                echo "<input type='hidden' name='booking_id' value='$line'>";
                echo "<input type='submit' value='View Receipt'>";
                echo "</form>";

                
                echo "<hr>";
            }
        }
        fclose($file);
    } else {
        echo "Error reading the file.";
    }
} else {
    echo "No previous bookings found.";
}
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Current Bookings</title>
</head>
<body>
    <h1>Current Bookings</h1>
</body>
</html>
