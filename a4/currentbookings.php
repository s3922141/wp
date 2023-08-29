<?php
session_start();

// Retrieve the stored data from the session
if (isset($_SESSION['form_data'])) {
    $data = $_SESSION['form_data'];
    
    // Read and process the bookings.txt file
    $file = fopen("bookings.txt", "r");
    if ($file) {
        while (($line = fgets($file)) !== false) {
            $bookingInfo = str_getcsv($line);
            $emailInFile = $bookingInfo[2]; 
            $phoneInFile = $bookingInfo[3]; 
            
            if ($emailInFile === $data['email'] && $phoneInFile === $data['phone']) {
                echo "Order Date: " . $bookingInfo[0] . "<br>";
                echo "Name: " . $bookingInfo[1] . "<br>";
                echo "Email: " . $emailInFile . "<br>";
                echo "Mobile: " . $phoneInFile . "<br>";
                
                // Store the booking data in the session
                $_SESSION['booking_data'] = $line;

                // Add a button to view receipt
                echo "<form action='reciept.php' method='post'>";
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
