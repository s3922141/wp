<?php
session_start();

// Retrieve the stored data from the session
if (isset($_SESSION['form_data'])) {
    $data = $_SESSION['form_data'];
    print_r($data);
    echo "existing booking data found.";

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
