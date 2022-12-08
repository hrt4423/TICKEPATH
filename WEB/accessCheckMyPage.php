<?php
    session_start();
    if(isset($_SESSION['clientId'])){
        header('Location: http://bold-obi-8187.littlestar.jp/TICKEPATH/www/mypage.php');
    }else{
        header('Location: http://bold-obi-8187.littlestar.jp/TICKEPATH/www/logIn.php');
    }
?>