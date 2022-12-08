<?php
session_start();
if(isset($_SESSION['clientId'])){
    header('location: https://localhost/TICKEPATH/WEB/booking.php');
}else{
    header('location: https://localhost/TICKEPATH/WEB/logIn.php');
}
?>