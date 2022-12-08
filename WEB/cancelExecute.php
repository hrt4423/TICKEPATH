<?php

try{
    require_once './DAO/booking.php';
    require_once './DAO/seat.php';
    require_once './DAO/booking_detail.php';

    $daoBooking = new DAO_booking;
    $daoSeat = new DAO_seat;
    $daoBookingDetail = new DAO_booking_detail;
}catch(Exception $ex){
    echo $ex->getMessage();
}catch(Error $err){
    echo $err->getMessage();
}

try{
    $daoBooking->Cancel($_POST['id']);
    $seatid = $daoBookingDetail->getSeatIdByBookingId($_POST['id']);
    $daoSeat->CancelReserveSeat($seatid);
}catch(Exception $ex){
    echo $ex->getMessage();
}catch(Error $err){
    echo $err->getMessage();
}

session_start();

try{
    $_SESSION['cancelId'] = $_POST['id'];
}catch(Exception $ex){
    echo $ex->getMessage();
}catch(Error $err){
    echo $err->getMessage();
}

header('location: https://localhost/TICKEPATH/WEB/cancelComplete.php');
?>