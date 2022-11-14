<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>閲覧履歴</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <style>
    .navbar{
        background-color: #64BCFC;
    }
    .delhistory{
        font-size: 10px;
    }
    #vertical_line{
        background-color: #888888;
        width: 0.5px;
        height: 100px;
        margin-left: 8px;
    }
  </style>
</head>
<body style="background-color: #DFDFDF;">
    <?php
        session_start();
        
        if(isset($_SESSION['clientId'])){
            echo 'ログイン中<br>ID：', $_SESSION['clientId'],'<br>';
            echo '<a href="https://localhost/TICKEPATH/WEB/logout.php">ログアウト</a>';
            
        }else{
            echo 'ログインしていません<br>';
            echo '<a href="https://localhost/TICKEPATH/WEB/login.php">ログイン</a>';
        }   
        //クラス読み込み
        require_once './DAO/history.php';
        require_once './DAO/performance.php';

        //インスタンス生成
        $daoPerformance = new DAO_performance;
        $daoHistory = new DAO_history;

        $_SESSION['clientId'];
    ?>

    <!-- ナビゲーションバー -->
    <nav class="navbar navbar-light mb-3">
        <div class="container-fluid">
            <!-- タイトル -->
            <a class="navbar-brand" href="#">
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
                        <a class="nav-link text-light" href="#">ホーム</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">新規登録</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link text-light" href="#">ログイン</a>
                    </li>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="キーワードを入力">
                        <button class="btn btn-secondary" type="button"><i class="bi bi-search"></i></button>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <ul class="list-group">
                <li class="list-group-item">閲覧履歴<button class="delhistory float-end" type="button">履歴全削除</button></li><br>
            </ul>

            
    <?php
        $performanceIds = array();
        $performanceIds = $daoHistory->getHistoryTblById($_SESSION['clientId']);
        //var_dump($performanceIds);
        foreach($performanceIds as $performanceId){
    ?>
            <div class="card_position"><!--カード位置調整-->
            <div class="card">
                <div class="card-body">
                    <div class="row gx-0">
                        <div class="col-3" >
                            <?=$daoPerformance->outPutDate($performanceId['performance_id']);?>
                        </div>

                        <div class="col-1">
                            <div id="vertical_line">
                                <!-- 縦線-->
                            </div>
                        </div>

                        <div class="col-8">
                            <h6 class="card-title">
                                <!-- アーティスト名表示 -->
                                <?=$daoPerformance->outPutArtist($performanceId['performance_id']);?>
                            </h6>
                            <div>
                                <!-- 会場表示 -->
                                <?=$daoPerformance->outPutPlace($performanceId['performance_id']);?>
                            </div>
                            <div>
                                    <!-- 開演時間表示 -->
                                    開演
                                    <?=$daoPerformance->outPutStartTime($performanceId['performance_id']);?>
                                    ～
                                    <!-- 開場時間表示 -->
                                    開場
                                    <?=$daoPerformance->outPutOpenTime($performanceId['performance_id']);?>
                            </div>
                        </div>
                    </div><!--row-->
                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- カード位置調整 -->
    <?php
        }
    ?>

    <button class="btn  text-white" style="background-color:#68C5F3;"
        onclick="location.href='https://localhost/TICKEPATH/WEB/myPage.php'">
        マイページに戻る    
    </button>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>