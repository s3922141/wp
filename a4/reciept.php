<?php
session_start();

// Retrieve the stored data from the session
if (isset($_SESSION['booking_data'])) {
    $data = $_SESSION['booking_data'];
    print_r($data);
    echo "Booking data is available.";

} else {
    echo "No booking data available.";
}
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Receipt</title>
</head>
<body>
    <h1>Receipt</h1>
</body>
</html>
