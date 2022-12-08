<?php
    session_start();
    if(isset($_SESSION['clientId'])){
        header('location: http://bold-obi-8187.littlestar.jp/TICKEPATH/www/booking.php');
    }else{
        header('location: http://bold-obi-8187.littlestar.jp/TICKEPATH/www/logIn.php');
    }
?>