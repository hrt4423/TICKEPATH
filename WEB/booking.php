<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>予約</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <style>
    .navbar{
        background-color: #64BCFC;
    }
    .homebtn{
        background-color: #64BCFC;
    }
    </style>

</head>
<?php
    session_start();
    if(isset($_SESSION['clientId'])){
        echo 'ログイン中<br>ID：', $_SESSION['clientId'],'<br>';
        echo '<a href="https://localhost/TICKEPATH/WEB/logout.php">ログアウト</a>';
        
    }else{
        echo 'ログインしていません<br>';
        echo '<a href="https://localhost/TICKEPATH/WEB/login.php">ログイン</a>';
    }
    $performanceId = $_SESSION['tmpPerformanceId'];
    echo '<br>tempPerformanceId：', $performanceId;

    require_once './DAO/performance.php';
    require_once './DAO/seat.php';
    require_once './DAO/seat_value.php';
    $daoPerformance = new DAO_performance();
    $daoSeat = new DAO_seat();
    $daoSeatValue = new DAO_seat_value();

?>
<body style="background-color: #DFDFDFDF;">

    <form action="https://localhost/TICKEPATH/WEB/paymentMethod.php" method="post" id="bookingForm"></form>

    <!-- ナビゲーションバー -->
    <nav class="navbar navbar-light" style="background-color: #64BCFC;">
        <div class="container-fluid">
            <!-- タイトル -->
            <a class="navbar-brand" href="https://localhost/TICKEPATH/WEB/home.php">
                <img src="../images/黄色ロゴ.png" height="75px">
            </a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <p class="bg-white col-md-12 text-center">詳細をご確認の上、画面下より申込手続きへお進みください。</p>
        
            <div><!-- カード位置　調整 -->
                <div class="card">
                    <div class="card-body" style="background-color:#C0C0C0">

                        <div class="row">
                            <div>公演名</div>
                                <div class="bg-white col-md-12 mt-1 mb-1">
                                    <?php $daoPerformance->outPutPerformanceName($performanceId)?>
                                </div>
                            <div>アーティスト</div>
                                <div class="bg-white col-md-12 mt-1 mb-1">
                                    <?php $daoPerformance->outPutArtist($performanceId)?>
                                </div>
                            <div>会場</div>
                                <div class="bg-white col-md-12 mt-1 mb-1">
                                    <?php $daoPerformance->outPutPlace($performanceId)?>
                                </div>
                            <div>公演日時</div>
                                <div class="bg-white col-md-12 mt-1 mb-1">
                                    <?php
                                        $daoPerformance->outPutDate($performanceId);
                                        echo ' 開演:', $daoPerformance->outPutStartTime($performanceId);
                                        echo '（開場:', $daoPerformance->outPutOpenTime($performanceId),'）';
                                    ?>
                                </div>
                        </div>
                    </div><!-- card-body -->
                </div><!-- card -->
            </div><!-- カード位置　調整 -->

            <p class="bg-white col-md-12 text-center mt-3">申込内容選択</p>
            <div><!--カード位置　調整-->
                <div class="card">
                    <div class="card-body">

                        <!-- <label for="select_month" class="mt-3 mb-2">有効期限</label> -->
                            <div class="row">
                                <div class="col-3 mt-1 text-center">
                                    日時
                                </div>
                                <div class="col-9">
                                    <select name="performanceDate" id="select_date" class="form-select" form="bookingForm">
                                        <option selected>----------</option>
                                        <!--DBから日時情報を取得-->
                                        <?php
                                            echo '<option value="1">',
                                                $daoPerformance->outPutDate($performanceId),
                                                ' 開演:', 
                                                $daoPerformance->outPutStartTime($performanceId),
                                            '</option>';
                                        ?>
                                        
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-3 mt-1 text-center">
                                    席種
                                </div>
                                <div class="col-9">
                                    <select name="seatValueId" id="select_seat" class="form-select" form="bookingForm">
                                        <option selected>----------</option>
                                        <!--DBから席と対応する値段を取得-->
                                        <!--選択した席種とvalueの対応が必要 -->
                                        <?php
                                            
                                            $seatValueIds = array();
                                            $seatValueIds =  $daoSeat->getSeatValueIdsByPerformanceId($performanceId);
                                            
                                            foreach($seatValueIds as $seatValueId){
                                                if($daoSeat->seatCheck($performanceId, $seatValueId)!= 0){
                                                    echo '<option value="', $seatValueId, '">';
                                                    $daoSeatValue->outputSeatName($seatValueId);
                                                    echo '　￥';
                                                    $daoSeat->outputSeatPrice($performanceId, $seatValueId);
                                                    echo '</option>';
                                                }else{
                                                    continue;
                                                }
                                                
                                            }
                                  
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-3 mt-1 text-center">
                                    枚数
                                </div>
                                <div class="col-9">
                                    <select name="ticketNum" id="select_number" class="form-select" form="bookingForm">
                                        <!--枚数を送信。指定された分だけ席を押さえる。空きの判定、席が無い場合の処理も必要-->
                                        <option selected>----------</option>
                                        <option value="1">01</option>
                                    </select>
                                </div>
                            </div>
                    
                    
                    </div><!--card-body--> 
                </div><!--card-->
            </div><!--カード位置　調整-->

            <div><!--カード位置　調整-->
                <dic class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-6">
                            <button  class="btn text-dark m-2" style="background-color: #DFDFDF;"
                            onclick="location.href='https://localhost/TICKEPATH/WEB/performanceDetail.php'">
                                 　戻る　
                            </button>
                        </div>

                        <div class="col-6">
                            <button type="submit" class="btn text-dark m-2" style="background-color: #68C5F3;" form="bookingForm">
                                決算方法選択
                            </button>
                        </div>
                        

                    </div><!--card-body-->
                </dic><!--card-->
            </div><!--カード位置　調整-->

        </div><!-- row -->
    </div><!-- container -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>