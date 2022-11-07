<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>header</title>
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
    <!-- ナビゲーションバー -->
    <nav class="navbar navbar-light">
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

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/home.css">
    <title>検索結果画面</title>
</head>
<body style="background-color: #DFDFDF;">
    <?php
        require_once './DAO/performance.php';
        require_once './DAO/performance2.php';
        $daoPerformance = new DAO_performance;
        $daoPerformance2 = new DAO_performance2;

        $performances = ["あいみょん" => 1, "米津玄師" => 2];
        //$aimyon=1;
        //$yonedu=2;
    ?>

    <div class="container-fluid">
        <div class="row">
        <h2 class="bg-white col-md-12 pt-3 pb-3 text-center">
            <!-- 検索した名前を表示 -->
            <?php
                $daoPerformance2->search($_POST['name']);
            ?>の検索結果<br>
            <!-- 検索件数を表示 -->
            <?php
            $count = $daoPerformance2->performanceCount($_POST['name']);

            echo '<small class="text-secondary">全' . $count . "件中 " . $count . '件</small></h2>';
            ?>

        </div><!--row-->
        <?php
        for($i = 0; $i < $count; $i++){
            ?>
                <div class="card_position"><!--カード位置調整-->
                    <div class="card">
                        <div class="card-body">
                            <div class="row gx-0">
                                    <div class="col-3" >
                                         <?=$daoPerformance2->outPutDate($_POST['name']); ?>
                                    </div>

                                    <div class="col-1">
                                        <div id="vertical_line">
                                            <!-- 縦線-->
                                        </div>
                                    </div>

                                    <div class="col-8">

                                        <h6 class="card-title">
                                            <?=$daoPerformance2->outPutArtist($_POST['name']); ?>
                                        </h6>
                                        <div>
                                            <?=$daoPerformance2->outPutPlace($_POST['name']); ?>
                                        </div>
                                        <div>
                                           
                                        </div>
                                        <div>
                                            開演：
                                            <?=$daoPerformance2->outPutStartTime($_POST['name']); ?>
                                             ～（開場
                                            <?=$daoPerformance2->outPutOpenTime($_POST['name']); ?>
                                             ～）
                                        </div>
                                    </div>
                            </div><!--row-->
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- カード位置調整 -->
        <?php        
        }
        ?>
    </div><!--container-fluid-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
    
</body>
</html>
