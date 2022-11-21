<?php
    session_start();

    //入力値をセッション変数に保存
    if(isset($_POST['seatValueId']) && isset($_POST['ticketNum'])){
        $_SESSION['seatValueId'] = $_POST['seatValueId'];
        $_SESSION['ticketNum'] = $_POST['ticketNum'];
    }else{
        $_SESSION['seatValueId'] = null;
        $_SESSION['ticketNum'] = null;
    }

    header('Location: https://localhost/TICKEPATH/WEB/paymentMethod.php');
?>