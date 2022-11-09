<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--BootStrapCDN--><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!--アイコン用CDN--><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <!--css--><link rel="stylesheet" href="../CSS/home.css">
    <title>ホーム画面</title>
</head>

<body style="background-color: #DFDFDF;">
    <?php
        //クラスファイルの読込み
        require_once './DAO/performance.php';
        require_once './DAO/booking.php';
        require_once './DAO/booking_detail.php';
        require_once './DAO/seat.php';
        require_once './DAO/favorite.php';
        //インスタンスの生成
        $daoPerformance = new DAO_performance;
        $daoBooking = new DAO_booking;
        $daoBookingDetail = new DAO_booking_detail;
        $daoSeat = new DAO_seat;
        $daoFavorit = new DAO_Favorite;
        //通知フラグ
        $notification_flg = false;
        
        //performance_idを変数に設定
        $aimyon=1;
        $yonedu=2;
        //client_idを変数に設定
        $clientId = 3;
    ?>

    <!--PHPテスト-->
    <?php
        

    ?>
    

    <div class="container-fluid">

        <div class="row"><!--仮ヘッダ-->
            <div class="col-12" id="header">
                <h1>TICKEPATH</h1>
            </div>
        </div><!--仮ヘッダ-->

        <?php
            //通知：ユーザが申し込んだ公演のうち、公演日が1週間以内のものがあればアラートを表示する。

            //現在の時刻を取得
            $currentDate = new DateTime();
            
            //client_idから顧客ごとの予約(booking_id)を取得
            $bookingIds = array();
            $bookingIds = $daoBooking->getBookingIdByClientId($clientId);

            //booking_idから公演日を調べる
            foreach ($bookingIds as $bookingId) {
                //client_idから予約している公演のperformance_dateを取得
                $seatId = $daoBookingDetail->getSeatIdByBookingId($bookingId);
                $performanceId = $daoSeat->getSeatIdByBookingId($seatId);
                $performanceDataArray = $daoPerformance->getPerformanceTblByid($performanceId);

                //公演日を取得
                foreach ($performanceDataArray as $row) {
                    $performanceDate = $row['performance_date'];
                }

                //公演日をDateTime型に変換（データ型を揃えるため）
                $performanceDate = new DateTime($performanceDate);
                    
                //公演日から1週間前の日付を取得
                $oneWeekBeforeDate = $performanceDate;
                $oneWeekBeforeDate->sub(new DateInterval('P7D'));
                
                //公演日が一週間以内か判定
                if(($oneWeekBeforeDate <= $currentDate) 
                        && ($currentDate <= $performanceDate->add(new DateInterval('P7D')))
                        || $currentDate == $performanceDate){
                    $notification_flg = true;
                    break;
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
                                    <a href="https://localhost/TICKEPATH/WEB/bookingInfo.php" class="text-decoration-none">
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

        <div class="card_position"><!--カード位置調整-->
            <div class="card">
                <div class="card-body">
                    <div class="row gx-0">
                        <div class="col-3" >
                            <?php 
                                //日付を表示
                                $daoPerformance->outPutDate($aimyon);
                            ?>
                        </div>

                        <div class="col-1">
                            <div id="vertical_line">
                                <!-- 縦線-->
                            </div>
                        </div>

                        <div class="col-8">
                            <h6 class="card-title">
                                <?php
                                    //アーティスト名を表示
                                    $daoPerformance->outPutArtist($aimyon);
                                ?>
                            </h6>
                            <div>
                                <?php
                                    //会場を表示
                                    $daoPerformance->outPutPlace($aimyon);
                                ?>
                            </div>
                            <div>
                                <?php
                                    //開演、開場時間を表示
                                    echo '開演：';
                                    $daoPerformance->outPutStartTime($aimyon);
                                    echo '～';
                                    echo '（開場', $daoPerformance->outPutOpenTime($aimyon), '～）';
                                ?>
                            </div>
                        </div>
                    </div><!--row-->
                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- カード位置調整 -->

        <div class="card_position"><!--カード位置調整-->
            <div class="card">
                <div class="card-body">
                    <div class="row gx-0">
                        <div class="col-3">
                        <?php 
                            $daoPerformance->outPutDate($yonedu);
                        ?>
                        </div>

                        <div class="col-1">
                            <div id="vertical_line">
                                <!-- 縦線-->
                            </div>
                        </div>

                        <div class="col-8">
                            <h6 class="card-title">
                            <?php
                                $daoPerformance->outPutArtist($yonedu);
                            ?>
                            </h6>
                            <div>
                                <?php
                                    $daoPerformance->outPutPlace($yonedu);
                                ?>
                            </div>
                            <div>
                                <?php
                                    echo '開演：';
                                    $daoPerformance->outPutStartTime($yonedu);
                                    echo '～';
                                    echo '（開場', $daoPerformance->outPutOpenTime($yonedu), '～）';
                                ?>
                            </div>
                        </div>
                    </div><!--row-->
                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- カード位置調整 -->

        <div class="row">
            <div class="col-12" id="headline">
                <h4 class="">
                    お気に入りアーティストの公演
                </h4>
            </div>
        </div><!--row-->

        <?php
            //client_idからartist_idを配列で取得
            $artistIds = array();
            $artistIds=$daoFavorit->getBookingIdByClientId($clientId);

            //取得したartist_idの公演を表示
            foreach($artistIds as $artistId){
                $performanceIds = array();
                $performanceIds=$daoPerformance->getPerformanceIdsByArtistId($artistId);
                foreach($performanceIds as $performanceId){
                    echo '
                        <div class="card_position"><!--カード位置調整-->
                        <div class="card">
                            <div class="card-body">
                                <div class="row gx-0">
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
                        </div><!-- card -->
                        </div><!-- カード位置調整 -->
                    ';//end-echo
                }
            }
        
        ?>

        <div class="row"><!--フッター-->
            <div class="col-12" id="footer">
                <h3 id=""></h3>
            </div>
        </div>
    
    </div><!--container-fluid-->
    <!--BootStrapCDN--><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>