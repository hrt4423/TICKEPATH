<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>キャンセル確認画面</title>
    <link href="../Example/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <?php

        try{
            if(isset($_SESSION['clientId'])){
                echo 'ログイン中<br>ID：', $_SESSION['clientId'],'<br>';
                echo '<a href="http://bold-obi-8187.littlestar.jp/TICKEPATH/www/logout.php">ログアウト</a>';
                
            }else{
                echo 'ログインしていません<br>';
                echo '<a href="http://bold-obi-8187.littlestar.jp/TICKEPATH/www/logIn.php">ログイン</a>';
            }
        }catch(Exception $ex){
            echo $ex->getMessage();
        }catch(Error $err){
            echo $err->getMessage();
        }

        try{
            require_once './DAO/performance.php';
            require_once './DAO/seat.php';
            require_once './DAO/booking_detail.php';
            require_once './DAO/booking.php';
            $daoPerformance = new DAO_performance;
            $daoSeat = new DAO_seat;
            $daoBookingDetail = new DAO_booking_detail;
            $daoBooking = new DAO_booking;
        }catch(Exception $ex){
            echo $ex->getMessage();
        }catch(Error $err){
            echo $err->getMessage();
        }
    ?>
    <!-- ナビゲーションバー -->
    <nav class="navbar navbar-light  mb-3" style="background-color: #64BCFC;">
        <div class="container-fluid">
            <!-- タイトル -->
            <a class="navbar-brand" href="http://bold-obi-8187.littlestar.jp/TICKEPATH/www/home.php">
                <img src="http://bold-obi-8187.littlestar.jp/TICKEPATH/IMAGES/黄色ロゴ.png" height="75px">
            </a>
            
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row p-2">
            <h2 class="text-center">キャンセルの確認</h2>
            <h4 class="text-center">以下の申し込みをキャンセルします</h4>
            <?php
            try{
                $bookingIds=array();
                $bookingIds= $daoBooking->getBookingIdByClientId($_SESSION['clientId']);//BookingID取得 
                $result = $daoPerformance->getPerformanceTblByid($_POST['key']);
                $seat = $daoBookingDetail->getSeatIdByBookingId($_POST['key']);
                $performanceId = $daoSeat->getSeatIdByBookingId($seat);
                $seatvalueid = $daoSeat->getSeatValueId($seat);
            }catch(Exception $ex){
                echo $ex->getMessage();
            }catch(Error $err){
                echo $err->getMessage();
            }
            
            ?>
            <div class="container p-4">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="table"style="background-color:#DFDFDF;"><td>公演名</td></tr>
                        <tr><td><?php
                        try{
                            $daoPerformance->outPutPerformanceName($performanceId);
                        }catch(Exception $ex){
                            echo $ex->getMessage();
                        }catch(Error $err){
                            echo $err->getMessage();
                        }
                        ?></td></tr>
                        <tr class="table"style="background-color:#DFDFDF;"><td>会場</td></tr>
                        <tr><td><?php
                        try{
                            $daoPerformance->outPutPlace($performanceId);
                        }catch(Exception $ex){
                            echo $ex->getMessage();
                        }catch(Error $err){
                            echo $err->getMessage();
                        }
                        ?></td></tr>
                        <tr class="table"style="background-color:#DFDFDF;"><td>公演日時</td></tr>
                        <tr><td><?php
                        try{
                            $daoPerformance->outPutDate($performanceId);
                        }catch(Exception $ex){
                            echo $ex->getMessage();
                        }catch(Error $err){
                            echo $err->getMessage();
                        }
                        ?></td></tr>
                        <tr class="table"style="background-color:#DFDFDF;"><td>席種・料金</td></tr>
                        <tr><td>¥<?php
                        try{
                            $daoSeat->outputSeatPrice($performanceId,$seatvalueid);
                        }catch(Exception $ex){
                            echo $ex->getMessage();
                        }catch(Error $err){
                            echo $err->getMessage();
                        }
                        ?></td></tr>
                    </thead>
                </table>
            </div>
            <?php 
            
            ?>
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">
            <form action="cancelExecute.php" method="post">
            <input type="hidden" name="id" value="<?=$_POST['key']?>">
                <button class="btn mx-1 px-3" style="color:#fff; background-color: #64BCFC;" type="submit">キャンセルを確定する</button>
            </form>
            <!-- <a href="cancelComplete.php" class="btn" style="color:#fff; background-color: #64BCFC;" type="button">キャンセルを確定する</a> -->
            <a href="bookingInfo.php" class="btn mx-1 px-3" style="background-color:#DFDFDF;" type="button">戻る</a>
        </div>
    </div>
    <script src="../Example/js/bootstrap.min.js"></script>
</body>
</html>