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
</head>
<body style="background-color: #DFDFDF;">
    <div name="maindiv" class="container">
        <div class="row">
            <div class="col-12 p-3">
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
    <?php

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>