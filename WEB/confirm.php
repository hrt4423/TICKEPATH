<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>予約確認</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body style="background-color: #DFDFDFDF;">
    <?php
        session_start();

        try{
            if(isset($_SESSION['clientId'])){
                echo 'ログイン中<br>ID：', $_SESSION['clientId'],'<br>';
                echo '<a href="https://localhost/TICKEPATH/WEB/logout.php">ログアウト</a>';
                
            }else{
                echo 'ログインしていません<br>';
                echo '<a href="https://localhost/TICKEPATH/WEB/login.php">ログイン</a>';
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
            if(isset($_SESSION['seatValueId']) && isset($_SESSION['ticketNum'])){
                echo '<br>席種ID：', $_SESSION['seatValueId'];
                echo '<br>チケット枚数：', $_SESSION['ticketNum'];
            }
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
        }catch(Exception $ex){
            echo $ex->getMessage();
        }catch(Error $err){
            echo $err->getMessage();
        }
    ?>
    
    <div class="container-fluid">
        <div class="row">
            <p class="bg-white col-md-12 text-center">予約内容をご確認の上、画面下より申込確定手続きへお進みください。</p>
        
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
                        </div>
                    </div><!-- card-body -->
                </div><!-- card -->
            </div><!-- カード位置　調整 -->

            
                <dic class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-6">
                            <button class="btn text-dark m-2" style="background-color: #DFDFDF;"
                            onclick="location.href='https://localhost/TICKEPATH/WEB/userPolicy.php'">
                                 　戻る　
                            </button>
                        </div>

                        <div class="col-6">
                            <button type="submit" class="btn text-white m-2" style="background-color: #68C5F3;"
                            onclick="location.href='https://localhost/TICKEPATH/WEB/bookingExecute.php'">
                                購入
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