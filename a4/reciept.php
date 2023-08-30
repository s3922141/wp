<?php
session_start();

//include tools.php for access to movie details
include 'tools.php'; 

if (isset($_POST['booking_data'])) {
    $line = $_POST['booking_data'];
    $data = explode(",", $line);
}
elseif (isset($_SESSION['booking_data'])) {
    $data = $_SESSION['booking_data'];
} 
else {
    header("Location: index.php");
    exit;
}

$orderDate = $data[0];
$name = $data[1];
$email = $data[2];
$mobile = $data[3];
$movieCode = $data[4];
$dayOfMovie = $data[5];
$timeOfMovie = $data[6];
$numberFCA = $data[7];
$priceFCA = number_format($data[8], 2);
$numberFCP = $data[9];
$priceFCP = number_format($data[10], 2);
$numberFCC = $data[11];
$priceFCC = number_format($data[12], 2);;
$numberSTA = $data[13];
$priceSTA = number_format($data[14], 2);
$numberSTP = $data[15];
$priceSTP = number_format($data[16], 2);
$numberSTC = $data[17];
$priceSTC = number_format($data[18], 2);
$total = number_format($data[19], 2);
$gst = number_format($data[20], 2);

$movieTitle = $moviesObject[$movieCode]['title'];
?>



<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Receipt</title>
    <style>
        header {
            background-color: lightgrey;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
         footer {
            background-color: lightgrey;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
         }
         body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
         }
    </style>
</head>

<body>
    <header>
        <h1>Receipt</h1>
    </header>

    <main>
        <p>Name:<?=$name?></p>
        <p>Email:<?=$email?></p>
        <p>Mobile:<?=$mobile?></p>
        <br>
        <p>First class adult seats: <?=$numberFCA?> Subtotal: $<?=$priceFCA?></p>
        <p>First class concession seats: <?=$numberFCP?> Subtotal: $<?=$priceFCP?></p>
        <p>First class child seats: <?=$numberFCC?> Subtotal: $<?=$priceFCC?></p>
        <p>Standard adult seats: <?=$numberSTA?> Subtotal: $<?=$priceSTA?></p>
        <p>Standard concession seats: <?=$numberSTP?> Subtotal: $<?=$priceSTP?></p>
        <p>Standard child seats: <?=$numberSTC?> Subtotal: $<?=$priceSTC?></p>
        <p>Total(including GST): $<?=$total?></p>
        <p>GST: $<?=$gst?></p>
        <br>
    </main>

    <footer>
        <p>Lunardo | 23 Main street, Springfield | Lunardo@emailplace.com.au | 035967876</p>
    </footer>

</body>
</html>
