<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>予約完了</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body style="background-color: #DFDFDFDF;">
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
            echo '<br>performanceId：', $_SESSION['performanceId'];
        }catch(Exception $ex){
            echo $ex->getMessage();
        }catch(Error $err){
            echo $err->getMessage();
        }

        try{
            require_once './DAO/performance.php';
            require_once './DAO/seat.php';
            require_once './DAO/seat_value.php';
            
            $daoPerformance = new DAO_performance();
            $daoSeat = new DAO_seat();
            $daoSeatValue = new DAO_seat_value();
            if(isset($_SESSION['bookingId'])){
                $bookingId =  $_SESSION['bookingId'];
            }else{
                $bookingId = 9999;
            }
        }catch(Exception $ex){
            echo $ex->getMessage();
        }catch(Error $err){
            echo $err->getMessage();
        }
    ?>
    
    <!-- ナビゲーションバー -->
    <nav class="navbar navbar-light mb-3">
        <div class="container-fluid">
            <!-- タイトル -->
            <a class="navbar-brand" href="http://bold-obi-8187.littlestar.jp/TICKEPATH/www/home.php">
                <img src="http://bold-obi-8187.littlestar.jp/TICKEPATH/IMAGES/黄色ロゴ.png" height="75px">
            </a>
            <!-- ハンバーガーメニュー -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- ナビゲーションメニュー -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link text-light" href="http://bold-obi-8187.littlestar.jp/TICKEPATH/www/home.php">ホーム</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="http://bold-obi-8187.littlestar.jp/TICKEPATH/www/myPage.php">マイページ</a>
                    </li>
                    <?php
                        try{
                            if(isset($_SESSION['clientId'])){
                                ?>
                                <li class="nav-item mb-2">
                                    <a class="nav-link text-light" href="http://bold-obi-8187.littlestar.jp/TICKEPATH/www/logout.php">ログアウト</a>
                                </li>
                                <?php
                            }else{
                                ?>
                                <li class="nav-item mb-2">
                                    <a class="nav-link text-light" href="http://bold-obi-8187.littlestar.jp/TICKEPATH/www/logIn.php">新規登録orログイン</a>
                                </li>
                                <?php
                            }

                        }catch(Exception $ex){
                            echo $ex->getMessage();
                        }catch(Error $err){
                            echo $err->getMessage();
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container-fluid">
        <div class="row">
            <p class="bg-white col-md-12 p-3 text-center">予約完了</p>

            <div class="text-center mb-3">
                <small>下記の内容で予約が完了しました</small>
            </div>
        
            <div><!-- カード位置　調整 -->
                <div class="card">
                    <div class="card-body" style="background-color:#C0C0C0">

                        <div class="row">
                            <div>公演名</div>
                                <div class="bg-white col-md-12 mt-1 mb-1">
                                    <?php 
                                    try{
                                        $daoPerformance->outPutPerformanceName($_SESSION['performanceId']);
                                    }catch(Exception $ex){
                                        echo $ex->getMessage();
                                    }catch(Error $err){
                                        echo $err->getMessage();
                                    }
                                    ?>
                                </div>
                            <div>アーティスト</div>
                                <div class="bg-white col-md-12 mt-1 mb-1">
                                    <?php 
                                    try{
                                        $daoPerformance->outPutArtist($_SESSION['performanceId']);
                                    }catch(Exception $ex){
                                        echo $ex->getMessage();
                                    }catch(Error $err){
                                        echo $err->getMessage();
                                    }
                                    ?>
                                </div>
                            <div>会場</div>
                                <div class="bg-white col-md-12 mt-1 mb-1">
                                    <?php 
                                    try{
                                        $daoPerformance->outPutPlace($_SESSION['performanceId']);
                                    }catch(Exception $ex){
                                        echo $ex->getMessage();
                                    }catch(Error $err){
                                        echo $err->getMessage();
                                    }
                                    ?>
                                </div>
                            <div>公演日時</div>
                                <div class="bg-white col-md-12 mt-1 mb-1">
                                    <?php
                                    try{
                                        $daoPerformance->outPutDate($_SESSION['performanceId']);
                                        echo ' 開演:', $daoPerformance->outPutStartTime($_SESSION['performanceId']);
                                        echo '（開場:', $daoPerformance->outPutOpenTime($_SESSION['performanceId']),'）';
                                    }catch(Exception $ex){
                                        echo $ex->getMessage();
                                    }catch(Error $err){
                                        echo $err->getMessage();
                                    }
                                    ?>
                                </div>
                            <div>席種・料金</div>
                                <div class="bg-white col-md-12 mt-1 mb-1">
                                    <?php 
                                    try{
                                        $daoSeatValue->outputSeatName($_SESSION['seatValueId']);
                                        echo '×', $_SESSION['ticketNum'], '枚　￥';
                                        $daoSeat->outputSeatPrice($_SESSION['performanceId'], $_SESSION['seatValueId']);
                                    }catch(Exception $ex){
                                        echo $ex->getMessage();
                                    }catch(Error $err){
                                        echo $err->getMessage();
                                    }
                                    ?>
                                </div>
                            <div>予約番号</div>
                                <div class="bg-white col-md-12 mt-1 mb-1">
                                    <?php 
                                    try{
                                        echo $bookingId,'番';
                                    }catch(Exception $ex){
                                        echo $ex->getMessage();
                                    }catch(Error $err){
                                        echo $err->getMessage();
                                    }
                                    ?>
                                </div>
                        </div><!--row-->
                    </div><!-- card-body -->
                </div><!-- card -->
            </div><!-- カード位置　調整 -->

            <?php
            try{
                //セッション変数(performanceId, seatValueId, ticketNum, bookingId)の初期化
                $_SESSION['performanceId'] = null;
                $_SESSION['seatValueId'] = null;
                $_SESSION['ticketNum'] = null;
                $_SESSION['bookingId'] = null;
            }catch(Exception $ex){
                echo $ex->getMessage();
            }catch(Error $err){
                echo $err->getMessage();
            }

            ?>

            <div class="text-center mt-3">
                <small>入力したメールに詳細を送信しました</small><br>
                <small>メールを確認してください</small>
            </div>

            
                <dic class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                    
                        <div class="offset-3 col-6 offset-3">
                            <button  class="btn text-white px-4" style="background-color: #68C5F3;"
                            onclick="location.href='http://bold-obi-8187.littlestar.jp/TICKEPATH/www/home.php'">
                                ホームへ
                            </button>
                        </div>
                        </div>
                        

                    </div><!--card-body-->
                </dic><!--card-->
            </div><!--カード位置　調整-->

        </div><!-- row -->
    </div><!-- container -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>