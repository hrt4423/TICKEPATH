<?php

require_once './DAO/booking.php';

$daoBooking = new DAO_booking;

$daoBooking->Cancel($_POST['id']);

session_start();

$_SESSION['cancelId'] = $_POST['id'];

header('location: https://localhost/TICKEPATH/WEB/cancelComplete.php');
?>