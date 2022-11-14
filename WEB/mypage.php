<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>マイページ</title>
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
    ?>
    <!-- ナビゲーションバー -->
    <nav class="navbar navbar-light mb-3">
        <div class="container-fluid">
            <!-- タイトル -->
            <a class="navbar-brand" href="https://localhost/TICKEPATH/WEB/home.php">
                <img src="../images/黄色ロゴ.png" height="75px">
            </a>
        </div>
    </nav>
    <div name="maindiv" class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <ul class="list-group">
                    <li class="list-group-item">マイページ</li><br>
                    <a href="https://localhost/TICKEPATH/WEB/bookingInfo.php" class="text-decoration-none">
                        <li class="list-group-item border border-dark">
                            <div class="row">
                                <div class="col-6">
                                    予約照会
                                </div>
                                <div class="col-6">
                                    <i class="bi bi-arrow-right float-end"></i>
                                </div>
                            </div>
                        </li>
                    </a>

                    <a href="https://localhost/TICKEPATH/WEB/memberInfo.php" class="text-decoration-none">
                        <li class="list-group-item border border-dark">
                            <div class="row">
                                <div class="col-6">
                                    登録情報
                                </div>
                                <div class="col-6">
                                    <i class="bi bi-arrow-right float-end"></i>
                                </div>

                            </div>
                        </li>
                    </a>

                    <a href="https://localhost/TICKEPATH/WEB/history.php" class="text-decoration-none">
                        <li class="list-group-item border border-dark">
                            <div class="row">
                                <div class="col-6">
                                    閲覧履歴
                                </div>
                                <div class="col-6">
                                    <i class="bi bi-arrow-right float-end"></i>
                                </div>
                            </div>
                        </li>
                    </a>
                    
                    <a href="https://localhost/TICKEPATH/WEB/logout.php" class="text-decoration-none">
                        <li class="list-group-item border border-dark">
                            <div class="row">
                                <div class="col-6">
                                    ログアウト
                                </div>
                                <div class="col-6">
                                    <i class="bi bi-arrow-right float-end"></i>
                                </div>
                            </div>
                        </li>
                    </a><br>
                </ul>
                <a href="home.php"  class="text-decoration-none">
                    <div class="row">
                        <div class="d-grid  gap-2 text-center">
                            <button type="button" class="homebtn btn btn-info btn-sm text-white border-dark">
                                ホームへ戻る
                            </button>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>