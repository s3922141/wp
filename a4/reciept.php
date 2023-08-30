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
$priceFCA = $data[8];
$numberFCP = $data[9];
$priceFCP = $data[10];
$numberFCC = $data[11];
$priceFCC = $data[12];
$numberSTA = $data[13];
$priceSTA = $data[14];
$numberSTP = $data[15];
$priceSTP = $data[16];
$numberSTC = $data[17];
$priceSTC = $data[18];
$total = $data[19];
$gst = $data[20];

$movieTitle = $moviesObject[$movieCode]['title'];
?>



<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Receipt</title>
</head>
<body>
    <h1>Receipt</h1>
    <p>Name:<?=$name?></p>
    <p>Email:<?=$email?></p>
    <p>Mobile:<?=$mobile?></p>
    <p>Total:<?=$total?></p>
    <p>Title:<?=$movieTitle?></p>
</body>
</html>
