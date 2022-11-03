<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>header</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="css/test.css" />
  <style>
    .navbar{
        background-color: #64BCFC;
    }
  </style>
</head>
<body>
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
    <title>mypage</title>
    <link rel="stylesheet" href="../css/mypage.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <style>
        .btn{
            background-color: #64BCFC;
        }
    </style>
</head>
<body style="background-color: #DFDFDF;">
    <div name="maindiv" class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <ul class="list-group">
                    <li class="list-group-item">マイページ</li><br>

                    <a href="home.php" class="text-decoration-none">
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
                    <a href="home.php" class="text-decoration-none">
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
                    <a href="home.php" class="text-decoration-none">
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
                    <a href="home.php" class="text-decoration-none">
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
                            <button type="button" class="btn btn-info btn-sm text-white border-dark">
                                ホームへ戻る
                            </button>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>