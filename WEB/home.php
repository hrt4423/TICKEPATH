<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--BootStrapCDN--><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!--アイコン用CDN--><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <!--css--><link rel="stylesheet" href="../CSS/home.css">
    <style>
        .navbar{
            background-color: #64BCFC;
        }
        .homebtn{
            background-color: #64BCFC;
        }
        .card1{
            text-align: left;
        }
    </style>
    <title>ホーム画面</title>
</head>

<body style="background-color: #DFDFDF;">
    <?php
        //クラスファイルの読込み
        try{
            require_once './DAO/performance.php';
            require_once './DAO/booking.php';
            require_once './DAO/booking_detail.php';
            require_once './DAO/seat.php';
            require_once './DAO/favorite.php';
        }catch(Exception $ex){
            echo $ex->getMessage();
        }catch(Error $err){
            echo $err->getMessage();
        }
        //インスタンスの生成
        try{
            $daoPerformance = new DAO_performance;
            $daoBooking = new DAO_booking;
            $daoBookingDetail = new DAO_booking_detail;
            $daoSeat = new DAO_seat;
            $daoFavorit = new DAO_favorite;

        }catch(Exception $ex){
            echo $ex->getMessage();
        }catch(Error $err){
            echo $err->getMessage();
        }
        //通知フラグ
        $notification_flg = false;
        
        //performance_idを変数に設定
        $aimyon=1;
        $yonedu=2;
    ?>

<!--ログイン状態の表示-->
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
    ?>
        <!--ログイン状態の表示-->
        
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
                            <a class="nav-link text-light" href="http://bold-obi-8187.littlestar.jp/TICKEPATH/www/accessCheckMyPage.php">マイページ</a>
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
                        <!-- 検索の処理 -->
                        <form action="searchResult.php" method="post">
                            <div class="input-group">
                                <input type="text" name="name" class="form-control" placeholder="キーワードを入力" required>
                                <button type="submit" name="search" class="btn btn-secondary" id="searchbutton" type="button"><i class="bi bi-search"></i></button>
                            </div>
                        </form>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
        <?php
            //ログイン済みであれば（セッション変数に値があれば）リマインド処理を動かす
            if(isset($_SESSION['clientId'])){
                /*
                    リマインド処理
                    ユーザが申し込んだ公演のうち、公演日が1週間以内のものがあればアラートを表示する。
                */

                //現在の時刻を取得
                try{
                    $currentDate = new DateTime();
                }catch(Exception $ex){
                    echo $ex->getMessage();
                }catch(Error $err){
                    echo $err->getMessage();
                }
                    
                    //client_idから顧客ごとの予約(booking_id)を取得
                    $bookingIds = array();
                try{
                    $bookingIds = $daoBooking->getBookingIdByClientId($_SESSION['clientId']);
                }catch(Exception $ex){
                    echo $ex->getMessage();
                }catch(Error $err){
                    echo $err->getMessage();
                }
                
                if(isset($bookingIds)){
                    //booking_idから公演日を調べる
                    foreach ($bookingIds as $bookingId) {
                        //client_idから予約している公演のperformance_dateを取得
                        try{
                            $seatId = $daoBookingDetail->getSeatIdByBookingId($bookingId);
                            $performanceId = $daoSeat->getSeatIdByBookingId($seatId);
                            $performanceDataArray = $daoPerformance->getPerformanceTblByid($performanceId);
                        }catch(Exception $ex){
                            echo $ex->getMessage();
                        }catch(Error $err){
                            echo $err->getMessage();
                        }
        
                        //公演日を取得
                        foreach ($performanceDataArray as $row) {
                            $performanceDate = $row['performance_date'];
                        }
        
                        //公演日をDateTime型に変換（データ型を揃えるため）
                        try{
                            $performanceDate = new DateTime($performanceDate);
                        }catch(Exception $ex){
                            echo $ex->getMessage();
                        }catch(Error $err){
                            echo $err->getMessage();
                        }
                                
                        //公演日から1週間前の日付を取得
                        try{
                            $oneWeekBeforeDate = $performanceDate;
                            $oneWeekBeforeDate->sub(new DateInterval('P7D'));
                        }catch(Exception $ex){
                            echo $ex->getMessage();
                        }catch(Error $err){
                            echo $err->getMessage();
                        }
                        
                        //公演日が一週間以内か判定
                        try{
                            if(($oneWeekBeforeDate <= $currentDate) 
                                    && ($currentDate <= $performanceDate->add(new DateInterval('P7D')))
                                    || $currentDate == $performanceDate){
                                $notification_flg = true;
                                break;
                            }
                        }catch(Exception $ex){
                            echo $ex->getMessage();
                        }catch(Error $err){
                            echo $err->getMessage();
                        }
                    }
                }
        
                    
                //通知フラグがtureなら通知を表示
                if($notification_flg){
                    echo '
                        <div id="alert"><!--通知-->
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <!--アイコン-->
                                <i class="bi bi-bell-fill position-relative"></i>
                
                                <!--通知テキスト-->
                                <span id="alert_message">
                                    <strong>公演が近づいています！
                                        <a href="http://bold-obi-8187.littlestar.jp/TICKEPATH/www/bookingInfo.php" class="text-decoration-none">
                                            確認する
                                        </a>
                                    </strong>
                                </span>
                
                                <!--閉じるボタン-->
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div><!--通知-->
                    ';
                }
            }
        ?>

        <div id="carousel_bg"><!--画像スライド-->
            <div id="carousel">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
            
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../IMAGES/PERFORMANCE/aimyon_live_image.png" class="d-block mx-auto" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../IMAGES/PERFORMANCE/yonedu_live_image.jpg" class="d-block mx-auto" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../IMAGES/PERFORMANCE/vaundy.jpg" class="d-block mx-auto" alt="...">
                            </div>
                        </div>
            
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                </div>
            </div>
        </div><!--画像スライド-->
        
        
        <div class="row">
            <div class="col-12" id="headline">
                <h4 class="">
                    おすすめ公演・チケット情報
                </h4>
            </div>
        </div><!--row-->

        <form action="http://bold-obi-8187.littlestar.jp/TICKEPATH/www/performanceDetail.php" method="post" id="home1">
        <div class="card_position"><!--カード位置調整-->
            <div class="card">
            <button class="btn btn-white">
                <div class="card-body">
                <input type="hidden" name="key" value="<?=$aimyon?>">
                    <div class="card1 row gx-0">
                        <div class="col-4">
                            <?php 
                                //日付を表示
                            try{
                                $daoPerformance->outPutDate($aimyon);
                            }catch(Exception $ex){
                                echo $ex->getMessage();
                            }catch(Error $err){
                                echo $err->getMessage();
                            }
                            ?>
                        </div>

                        <div class="col-1">
                            <div id="vertical_line">
                                <!-- 縦線-->
                            </div>
                        </div>

                        <div class="col-7">
                            <h6 class="card-title">
                                <?php
                                    //アーティスト名を表示
                                try{
                                    $daoPerformance->outPutArtist($aimyon);
                                }catch(Exception $ex){
                                    echo $ex->getMessage();
                                }catch(Error $err){
                                    echo $err->getMessage();
                                }
                                ?>
                            </h6>
                            <div>
                                <?php
                                    //会場を表示
                                try{
                                    $daoPerformance->outPutPlace($aimyon);
                                }catch(Exception $ex){
                                    echo $ex->getMessage();
                                }catch(Error $err){
                                    echo $err->getMessage();
                                }
                                ?>
                            </div>
                            <div>
                                <?php
                                    //開演、開場時間を表示
                                try{
                                    echo '開演：';
                                    $daoPerformance->outPutStartTime($aimyon);
                                    echo '～';
                                    echo '（開場', $daoPerformance->outPutOpenTime($aimyon), '～）';
                                }catch(Exception $ex){
                                    echo $ex->getMessage();
                                }catch(Error $err){
                                    echo $err->getMessage();
                                }
                                ?>
                            </div>
                        </div>
                    </div><!--row-->
                </div><!-- card-body -->
            </button>
            </div><!-- card -->
        </div><!-- カード位置調整 -->
        </form>

        <form action="performanceDetail.php" method="post" id="home2">
        <div class="card_position"><!--カード位置調整-->
            <div class="card">
            <button class="btn btn-white">
                <div class="card-body">
                <input type="hidden" name="key" value="<?=$yonedu?>">
                    <div class="card1 row gx-0">
                        <div class="col-4">
                        <?php 
                        try{
                            $daoPerformance->outPutDate($yonedu);
                        }catch(Exception $ex){
                            echo $ex->getMessage();
                        }catch(Error $err){
                            echo $err->getMessage();
                        }
                        ?>
                        </div>

                        <div class="col-1">
                            <div id="vertical_line">
                                <!-- 縦線-->
                            </div>
                        </div>

                        <div class="col-7">
                            <h6 class="card-title">
                            <?php
                            try{
                                $daoPerformance->outPutArtist($yonedu);
                            }catch(Exception $ex){
                                echo $ex->getMessage();
                            }catch(Error $err){
                                echo $err->getMessage();
                            }
                            ?>
                            </h6>
                            <div>
                                <?php
                                try{
                                    $daoPerformance->outPutPlace($yonedu);
                                }catch(Exception $ex){
                                    echo $ex->getMessage();
                                }catch(Error $err){
                                    echo $err->getMessage();
                                }
                                ?>
                            </div>
                            <div>
                                <?php
                                try{
                                    echo '開演：';
                                    $daoPerformance->outPutStartTime($yonedu);
                                    echo '～';
                                    echo '（開場', $daoPerformance->outPutOpenTime($yonedu), '～）';
                                }catch(Exception $ex){
                                    echo $ex->getMessage();
                                }catch(Error $err){
                                    echo $err->getMessage();
                                }
                                ?>
                            </div>
                        </div>
                    </div><!--row-->
                </div><!-- card-body -->
            </div>
            </div><!-- card -->
        </div><!-- カード位置調整 -->
        </form>

        <div class="row">
            <div class="col-12" id="headline">
                <h4 class="">
                    お気に入りアーティストの公演
                </h4>
            </div>
        </div><!--row-->

        <?php
            //ログイン済みであれば（セッション変数に値があれば）お気に入り表示処理を動かす
            if(isset($_SESSION['clientId'])){
                /*
                    お気に入り：表示
                    お気に入り登録されているアーティストの公演を表示する
                */

                //client_idからartist_idを配列で取得
            try{
                $artistIds = array();
                $artistIds=$daoFavorit->getBookingIdByClientId($_SESSION['clientId']);
            }catch(Exception $ex){
                echo $ex->getMessage();
            }catch(Error $err){
                echo $err->getMessage();
            }

                if(isset($artistIds)){
                    //取得したartist_idの公演を表示
                    foreach($artistIds as $artistId){
                    try{
                        $performanceIds = array();
                        $performanceIds=$daoPerformance->getPerformanceIdsByArtistId($artistId);
                    }catch(Exception $ex){
                        echo $ex->getMessage();
                    }catch(Error $err){
                        echo $err->getMessage();
                    }
                        foreach($performanceIds as $performanceId){
                            try{
                            echo '
                            <form action="http://bold-obi-8187.littlestar.jp/TICKEPATH/www/performanceDetail.php" method="post" id="home3">
                            <div class="card_position"><!--カード位置調整-->
                            <div class="card">
                            <button class="btn btn-white">
                                <div class="card-body">
                                    <div class="row gx-0">
                                    <input type="hidden" name="key" value="',$performanceId,'">
                                        <div class="col-3" >
                                            '
                                            ,$daoPerformance->outPutDate($performanceId),
                                            '
                                        </div>
                
                                        <div class="col-1">
                                            <div id="vertical_line">
                                                <!-- 縦線-->
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <h6 class="card-title">
                                                '
                                                ,$daoPerformance->outPutArtist($performanceId),
                                                '
                                            </h6>
                                            <div>
                                                '
                                                ,$daoPerformance->outPutPlace($performanceId),
                                            '</div>
                                            <div>
                                                開演：'
                                                ,$daoPerformance->outPutStartTime($performanceId), '～
                                                （開場', $daoPerformance->outPutOpenTime($performanceId), '～）
                                            </div>
                                        </div>
                                    </div><!--row-->
                                </div><!-- card-body -->
                                </button>
                            </div><!-- card -->
                            </div><!-- カード位置調整 -->
                            </form>
                            ';}catch(Exception $ex){
                                echo $ex->getMessage();
                            }catch(Error $err){
                                echo $err->getMessage();
                            }//end-echo
                        }
                    }
                }else{
                    echo '<p>アーティストをお気に入り登録して最新情報をゲット！</p>';
                }
            }else{
                echo 'お気に入りアーティストの公演を表示するには';
                echo '<a href="http://bold-obi-8187.littlestar.jp/TICKEPATH/www/logIn.php">ログイン</a>';
                echo 'してください';
            }
        ?>

        <div class="row"><!--フッター-->
            <div class="col-12" id="footer">
                <h3 id=""></h3>
            </div>
        </div>
    
    </div><!--container-fluid-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  
    <!--BootStrapCDN--><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>



</body>
</html>