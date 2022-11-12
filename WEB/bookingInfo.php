<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>予約状況照会</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../css/mypage.css">
  <link rel="stylesheet" href="css/test.css" />
  <style>
    .navbar{
        background-color: #64BCFC;
    }
  </style>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['clientId'])){
            echo 'ログイン中<br>ID：', $_SESSION['clientId'],'<br>';
            echo '<a href="https://localhost/TICKEPATH/WEB/logout.php">ログアウト</a>';
            
        }else{
            echo 'ログインしていません<br>';
            echo '<a href="https://localhost/TICKEPATH/WEB/login.php">ログイン</a>';
        }
    ?>
    <!-- ナビゲーションバー -->
    <nav class="navbar navbar-light">
        <div class="container-fluid">
            <!-- タイトル -->
            <a class="navbar-brand" href="#">
                <img src="../images/黄色ロゴ.png" height="75px">
            </a>
            
        </div>
    </nav>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<style>
</style>
<script type="text/javascript">
</script>
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!--アイコンのCDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<!--DBと接続 -->
<body style="background-color:#DFDFDF;">
    <?php
        require_once './DAO/performance.php';
        require_once './DAO/booking.php';
        require_once './DAO/booking_detail.php';
        require_once './DAO/seat.php';
        $daoPerformance = new DAO_performance;
        $daoBooking =new DAO_booking;
        $daoBookingDetail = new DAO_booking_detail;
        $daoSeat = new DAO_seat;

        
    ?>
    <div id="maindiv" style="background-color:#DFDFDF;">
        <div class="container-fluid">
            <div class="row">
                <h3 style="background-color:#FFFFFF;" class="col-md-12 text-center p-3">予約情報照会</h3>
            </div>



            <?php 
            $bookingIds=array();
            $bookingIds= $daoBooking->getBookingIdByClientId($_SESSION['clientId']);//BookingID取得 
                foreach($bookingIds as $BookingID){
                    $seatId = $daoBookingDetail->getSeatIdByBookingId($BookingID);//席ID取得
                    $performanceId = $daoSeat->getSeatIdByBookingId($seatId);//公演ID取得
                ?>
                    <div class="card_position"><!--カード位置調整-->
            <div class="card">
                <div class="card-body">
                    <div class="row gx-0">
                        <div class="col-3" >
                            <?php 
                                $daoPerformance->outPutDate($performanceId);
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
                                    $daoPerformance->outPutArtist($performanceId);
                                ?>
                            </h6>
                            <div>
                                <?php
                                    $daoPerformance->outPutPlace($performanceId);
                                ?>
                            </div> 
                            <div>
                                <?php
                                    echo '開演：';
                                    $daoPerformance->outPutStartTime($performanceId);
                                    echo '～';
                                    echo '（開場', $daoPerformance->outPutOpenTime($performanceId), '～）';
                                ?>
                            </div>
                        </div>
                    </div><!--row-->
                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- カード位置調整 -->
                    <?php } ?>
        

	    </div>
            
            <div class="d-grid gap-2 mt-3">
                <button class="btn  text-white" style="background-color:#68C5F3;"
                onclick="location.href='https://localhost/TICKEPATH/WEB/myPage.php'">
                    マイページに戻る    
                </button>
            </div>
        </div>
    </div>
</body>
    <!-- bootstrapのjs読み込み -->
    <script src="js/bootstrap.min.js"></script>
    </html>