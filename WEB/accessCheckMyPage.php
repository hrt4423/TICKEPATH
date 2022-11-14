<?php
    session_start();
    if(isset($_SESSION['clientId'])){
        header('Location: https://localhost/TICKEPATH/WEB/myPage.php');
    }else{
        header('Location: https://localhost/TICKEPATH/WEB/login.php');
    }
?>