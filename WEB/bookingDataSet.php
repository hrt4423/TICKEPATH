<?php
    session_start();

    try{
        //入力値をセッション変数に保存
        if(isset($_POST['seatValueId']) && isset($_POST['ticketNum'])){
            $_SESSION['seatValueId'] = $_POST['seatValueId'];
            $_SESSION['ticketNum'] = $_POST['ticketNum'];
        }else{
            $_SESSION['seatValueId'] = null;
            $_SESSION['ticketNum'] = null;
        }
    }catch(Exception $ex){
        echo $ex->getMessage();
    }catch(Error $err){
        echo $err->getMessage();
    }

    header('Location: http://bold-obi-8187.littlestar.jp/TICKEPATH/www/paymentMethod.php');
?>