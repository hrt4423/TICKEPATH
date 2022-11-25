<?php

require_once './DAO/booking.php';
require_once './DAO/seat.php';
require_once './DAO/booking_detail.php';

$daoBooking = new DAO_booking;
$daoSeat = new DAO_seat;
$daoBookingDetail = new DAO_booking_detail;

$daoBooking->Cancel($_POST['id']);
$seatid = $daoBookingDetail->getSeatIdByBookingId($_POST['id']);
$daoSeat->CancelReserveSeat($seatid);


session_start();

$_SESSION['cancelId'] = $_POST['id'];

header('location: https://localhost/TICKEPATH/WEB/cancelComplete.php');
?>