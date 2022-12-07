<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    

    <title>検索結果画面</title>
</head>
<body style="background-color: #DFDFDF;">
    <?php
    try{
        session_start();
        if(isset($_SESSION['clientId'])){
            echo 'ログイン中<br>ID：', $_SESSION['clientId'],'<br>';
            echo '<a href="https://localhost/TICKEPATH/WEB/logout.php">ログアウト</a>';
            
        }else{
            echo 'ログインしていません<br>';
            echo '<a href="https://localhost/TICKEPATH/WEB/login.php">ログイン</a>';
        }
        
        require_once './DAO/performance.php';
        $daoPerformance = new DAO_performance;
    }catch(Exception $ex){
        echo $ex->getMessage();
    }catch(Error $err){
        echo $err->getMessage();
    }
    ?>
<!-- ナビゲーションバー -->
<nav class="navbar navbar-light">
        <div class="container-fluid">
            <!-- タイトル -->
            <a class="navbar-brand" href="https://localhost/TICKEPATH/WEB/home.php">
                <img src="../images/黄色ロゴ.png" height="75px">
            </a>
            <!-- ハンバーガーメニュー -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- ナビゲーションメニュー -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link text-light" href="https://localhost/TICKEPATH/WEB/home.php">ホーム</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="https://localhost/TICKEPATH/WEB/accessCheckMyPage.php">マイページ</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link text-light" href="#">新規登録orログイン</a>
                    </li>
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
        <div class="row">
        <h2 class="bg-white col-md-12 pt-3 pb-3 text-center">
            <!-- 検索した名前を表示 -->
            <?php
            if(isset($_POST['name'])){
            try{
                $daoPerformance->search($_POST['name']);
            }catch(Exception $ex){
                echo $ex->getMessage();
            }catch(Error $err){
                echo $err->getMessage();
            }
            ?>の検索結果<br>
                


            <!-- 検索件数を表示 -->
            <?php
        try{
            $count = $daoPerformance->performanceCount($_POST['name']);

            echo '<small class="text-secondary">全' . $count . "件中 " . $count . '件</small></h2>';
        }catch(Exception $ex){
            echo $ex->getMessage();
        }catch(Error $err){
            echo $err->getMessage();
        }
            ?>

        </div><!--row-->
        <?php
    try{
        $result = $daoPerformance->getPerformanceTblByname($_POST['name']);
    }catch(Exception $ex){
        echo $ex->getMessage();
    }catch(Error $err){
        echo $err->getMessage();
    }
        foreach($result as $row){
            ?>
            <form action="performanceDetail.php" method="post" id="form1">
                <div class="card_position"><!--カード位置調整-->
                    <div class="card mt-3 mb-3">
                    <button class="btn btn-white">
                        <div class="card-body">
                        <input type="hidden" name="key" value="<?=$row['performance_id']?>">
                        <input type="hidden" name="artistname" value="<?=$_POST['name']?>">
                            <div class="row gx-0">
                                    <div class="col-4" >
                                        <?= $daoPerformance->outPutDate($row['performance_id']);?>
                                    </div>

                                    <div class="col-1">
                                        <div id="vertical_line">
                                            <!-- 縦線-->
                                        </div>
                                    </div>

                                    <div class="col-7">

                                        <h6 class="card-title">
                                            <?=$daoPerformance->outPutArtist($row['performance_id']);?>
                                        </h6>
                                        <div>
                                            <?=$daoPerformance->outPutPlace($row['performance_id']);?>
                                        </div>
                                        <div>
                                        
                                        </div>
                                        <div>
                                            開演：
                                            <?=$daoPerformance->outPutStartTime($row['performance_id']);?>
                                             ～（開場
                                            <?=$daoPerformance->outPutOpenTime($row['performance_id']);?>
                                             ～）
                                        </div>
                                    </div>
                            </div><!--row-->
                        </div><!-- card-body -->
                        </button>
                    </div><!-- card -->
                </div><!-- カード位置調整 -->
        </form>
        <?php        
        }
    }else{
        ?>
        <div class="container-fluid">
        <div class="row">
        <h2 class="bg-white col-md-12 pt-3 pb-3 text-center">
            <?php
        try{$daoPerformance->search($_POST['artistname']);}catch(Exception $ex){echo $ex->getMessage();}catch(Error $err){echo $err->getMessage();}
            ?>の検索結果<br>
            <!-- 検索件数を表示 -->
            <?php
        try{$count = $daoPerformance->performanceCount($_POST['artistname']);}catch(Exception $ex){echo $ex->getMessage();}catch(Error $err){echo $err->getMessage();}

            echo '<small class="text-secondary">全' . $count . "件中 " . $count . '件</small></h2>';
            ?>

        </div><!--row-->
        <?php
        try{$result = $daoPerformance->getPerformanceTblByname($_POST['artistname']);}catch(Exception $ex){echo $ex->getMessage();}catch(Error $err){echo $err->getMessage();}
        try{
        foreach($result as $row){
            ?>
            <form action="performanceDetail.php" method="post" id="form1">
                <div class="card_position"><!--カード位置調整-->
                    <div class="card mt-3 mb-3">
                    <button class="btn btn-white">
                        <div class="card-body">
                        <input type="hidden" name="key" value="<?=$row['performance_id']?>">
                        <input type="hidden" name="artistname" value="<?=$_POST['artistname']?>">
                            <div class="row gx-0">
                                    <div class="col-4" >
                                        <?=$daoPerformance->outPutDate($row['performance_id']);?>
                                    </div>

                                    <div class="col-1">
                                        <div id="vertical_line">
                                            <!-- 縦線-->
                                        </div>
                                    </div>

                                    <div class="col-7">

                                        <h6 class="card-title">
                                            <?=$daoPerformance->outPutArtist($row['performance_id']);?>
                                        </h6>
                                        <div>
                                            <?=$daoPerformance->outPutPlace($row['performance_id']);?>
                                        </div>
                                        <div>
                                        
                                        </div>
                                        <div>
                                            開演：
                                            <?=$daoPerformance->outPutStartTime($row['performance_id']);?>
                                             ～（開場
                                            <?=$daoPerformance->outPutOpenTime($row['performance_id']);?>
                                             ～）
                                        </div>
                                    </div>
                            </div><!--row-->
                        </div><!-- card-body -->
                        </button>
                    </div><!-- card -->
                </div><!-- カード位置調整 -->
        </form>
        <?php        
        }
    }catch(Exception $ex){
        echo $ex->getMessage();
    }catch(Error $err){
        echo $err->getMessage();
    }
    }
        ?>
    </div><!--container-fluid-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
    
</body>
</html>
