<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>公演詳細</title>
    <!--BootStrapCDN--><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!--アイコン用CDN--><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    
    <style>
        .navbar{
            background-color: #64BCFC;
        }
        

    </style>
</head>

<script>
</script>

<body style="background-color:#DFDFDF;">
    <!--DBと接続 -->
    <?php
    try{
        
        if(isset($_SESSION['clientId'])){
            echo 'ログイン中<br>ID：', $_SESSION['clientId'],'<br>';
            echo '<a href="http://bold-obi-8187.littlestar.jp/TICKEPATH/www/logout.php">ログアウト</a>';
            
        }else{
            echo 'ログインしていません<br>';
            echo '<a href="http://bold-obi-8187.littlestar.jp/TICKEPATH/www/logIn.php
            ">ログイン</a>';
        }
    }catch(Exception $ex){
        echo $ex->getMessage();
    }catch(Error $err){
        echo $err->getMessage();
    }
        
    try{
        require_once './DAO/performance.php';
        require_once './DAO/favorite.php';
        $daoPerformance = new DAO_performance;
        $daoFavorite = new DAO_favorite;
        if(isset($_POST['key'])){
            $_SESSION['performanceId'] = $_POST['key'];
        }
    }catch(Exception $ex){
        echo $ex->getMessage();
    }catch(Error $err){
        echo $err->getMessage();
    }
    
    try{
        $performanceId=$_SESSION['performanceId'];
        $clientid=$_SESSION['clientId'];

        $duplication = $daoFavorite->checkDuplication($clientid, $performanceId);
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
        <?php 

            if(isset($_POST['artistname'])){
                ?>

            <form action="searchResult.php" method="post" class="text-decoration-none">
                <div class="row">
                    <div class="col-1 d-grid  gap-2 mt-1 text-center">
                    <input type="hidden" name="artistname" value="<?=$_POST['artistname']?>">
                        <input type="submit"  value="戻る" class="btn btn-sm text-white border-dark" 
                        style="background-color:#68C5F3">
                    </div>
                </div>
            </form>
            <?php
            }else{

            }
        ?>   
        <div class="card border-dark mt-1"><!-- 公演写真カード -->
            <h5 class="card-title text-center mt-4">
                <?php 
                try{
                    $daoPerformance->outPutArtist($performanceId);
                }catch(Exception $ex){
                    echo $ex->getMessage();
                }catch(Error $err){
                    echo $err->getMessage();
                }
                    //echo $_POST['key'];
                ?>のチケット情報</h5><!-- アーティスト名 -->
                <div class="card-body mx-auto">
                    <img  class="img-fluid" width="400px" height="331px" src="<?php try{$daoPerformance->getImagePath($performanceId);}catch(Exception $ex){echo $ex->getMessage();}catch(Error $err){echo $err->getMessage();} ?>"><!--写真  -->
                </div>		
        </div>

        <div class="card border-dark mt-1"><!-- 公演詳細カード -->
                <div class=card-body>
                    <h8><?php try{ $daoPerformance->outPutDate($performanceId);}catch(Exception $ex){echo $ex->getMessage();}catch(Error $err){echo $err->getMessage();} ?></h8><br><!--公演日  -->
                    <h8>開演：<?php  $daoPerformance->outPutStartTime($performanceId) ?></h8><br><!--開演時間  -->
                    <span style="color:#68C5F3;"><h8><?php  try{$daoPerformance->outPutPlace($performanceId);}catch(Exception $ex){echo $ex->getMessage();}catch(Error $err){echo $err->getMessage();} ?></h8></span><!-- 会場名 -->
                </div>		
        </div>
        <form action="http://bold-obi-8187.littlestar.jp/TICKEPATH/www/booking.php" method="post" id="form"></form>
        <div class="d-grid gap-2"><!--申込みボタン-->
            <button style="background-color:#68C5F3;border-color:black;color:white" class="btn mt-1" 
                onclick="location.href='http://bold-obi-8187.littlestar.jp/TICKEPATH/www/bookingLoginCheck.php'">
                申し込む
            </button>
        </div>

        <div class="card border-dark mt-3 mb-1">
            <h8 style="color:#0047FF"  class="card-title text-center mt-1">このアーティストをお気に入りに登録する</h8>
            <div class=row>
                <h6 class="text-center"><?php try{$daoPerformance->outPutArtist($performanceId);}catch(Exception $ex){echo $ex->getMessage();}catch(Error $err){echo $err->getMessage();}?></h6> 
            </div>
        </div>

        <!--ボタン、アイコン付近で問題アリ-->
        <form method="post">
            <button type="submit" class="btn btn-danger" name="fav">
            <i class="bi bi-heart"></i>
            登録
            </button>
        </form>

        <?php
        try{
            if($clientid == null){
                if(isset($_POST['fav'])){
                    header("Location:http://bold-obi-8187.littlestar.jp/TICKEPATH/www/logIn.php");
                }
            }
            
            if(empty($duplication)){
                if(isset($_POST['fav'])){
                    $daoFavorite->insertFavoriteArtist($clientid, $performanceId);
                }
            }else{
                if(isset($_POST['fav'])){
                    echo '既に登録済みです';
                }
            }
        }catch(Exception $ex){
            echo $ex->getMessage();
        }catch(Error $err){
            echo $err->getMessage();
        }
            
        ?>
        
    </div> 
    <!-- bootstrapのjs読み込み -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> 
    <!--BootStrapCDN--><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>