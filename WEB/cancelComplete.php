<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>キャンセル完了画面</title>
    
    <!--BootStrapCDN--><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!--アイコン用CDN--><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    
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
            $daoPerformance = new DAO_performance;
            $daoSeat = new DAO_seat;
            $daoBookingDetail = new DAO_booking_detail;
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
        <h2 class="text-center">チケットをキャンセルしました</h2>
        <?php
        try{
            $result = $daoPerformance->getPerformanceTblByid($_SESSION['cancelId']);
            $bookingdetaile = $daoBookingDetail->getSeatIdByBookingId($_SESSION['cancelId']);
            $performanceid = $daoSeat->getPerformanceId($bookingdetaile);
            $seatvalueid = $daoSeat->getSeatValueId($bookingdetaile);
        }catch(Exception $ex){
            echo $ex->getMessage();
        }catch(Error $err){
            echo $err->getMessage();
        }
        
        try{
            foreach($result as $row){
                ?>
            <div class="container p-4">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="table"style="background-color:#DFDFDF;"><td>公演名</td></tr>
                        <tr><td><?=$daoPerformance->outPutPerformanceName($row['performance_id']);?></td></tr>
                        <tr class="table"style="background-color:#DFDFDF;"><td>会場</td></tr>
                        <tr><td><?=$daoPerformance->outPutPlace($row['performance_id']);?></td></tr>
                        <tr class="table"style="background-color:#DFDFDF;"><td>公演日時</td></tr>
                        <tr><td><?=$daoPerformance->outPutDate($row['performance_id']);?></td></tr>
                        <tr class="table"style="background-color:#DFDFDF;"><td>席種・料金</td></tr>
                        <tr><td>¥<?=$daoSeat->outputSeatPrice($performanceid,$seatvalueid);?></td></tr>
                    </thead>
                </table>
            </div>
        <?php 
        }
        }catch(Exception $ex){
            echo $ex->getMessage();
        }catch(Error $err){
            echo $err->getMessage();
        }
        ?>
        
        </div>
    </div>
    <div class="d-grid gap-2 col-6 mx-auto">
        <a href="mypage.php" class="btn" style="color:#fff; background-color: #64BCFC;" type="button">マイページへ戻る</a>      
    </div>
    </div>
    
    <!--BootStrapCDN--><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>