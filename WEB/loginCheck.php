<!DOCTYPE html>
<html lang="ja">
    <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
            <link rel="stylesheet" href="../CSS/loginCheck.css">
            <title>loginCheck</title>
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
        <nav class="navbar navbar-light">
                <div class="container-fluid">
                        <!-- タイトル -->
                        <a class="navbar-brand" href="https://localhost/TICKEPATH/WEB/home.php">
                                <img src="../images/黄色ロゴ.png" height="75px">
                        </a>
                        <!-- ハンバーガーメニュー -->
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
    <div class="card border-dark mt-1">
        <?php
            session_start();
            require_once './DAO/client.php';
            $daoClient = new DAO_client;
            /*
                ログインチェック処理
                1.メールアドレスの入力形式は正しい？
                2.テーブルにメールアドレスはある？
                3.パスワードは合ってる？
            */

            //メールアドレスの入力形式が正しいか判定
            if (filter_var($_POST['email_address'], FILTER_VALIDATE_EMAIL)) {//入力形式が正しい
                //入力されたメールアドレスのアカウントが存在するか調べる
                $clientData = $daoClient->getClientDataByEmail($_POST['email_address']);
                if(count($clientData)==0){//アカウントが無い
                    echo '<p class="card-title text-center mt-4">入力されたメールアドレスのアカウントは存在しません</p>';
                }else{//アカウント有り
                    //パスワードが一致するか確認
                    foreach($clientData as $row){
                        if($_POST['password'] == $row['client_password']){//パスワード一致
                            //セッション変数にID、苗字、メールアドレスを入力（ログイン済みの証明とする）
                            $_SESSION['clientId'] = $row['client_id'];
                            $_SESSION['familyName'] = $row['family_name'];
                            $_SESSION['emailAddress'] = $row['email_address'];
                            //ホームに遷移
                            header('location: https://localhost/TICKEPATH/WEB/home.php');
                        }else{//パスワードが一致しない
                            echo '<p class="card-title text-center mt-4">パスワードが一致しません</p>';
                        }
                    }
                }
            }else{//入力形式が不正
                echo '<p class="card-title text-center mt-4">不正な形式のメールアドレスです</p>';
            }
        ?>
        <div class="row">
                    <div class="offset-lg-4 col-lg-4  offset-sm-4 col-sm-4  mt-2">
                    <div class="d-grid gap-2">
                            <button class="  btn-sm mb-2 btn text-white border-dark" style="background-color:#64BCFC;" onclick="location.href='https://localhost/TICKEPATH/WEB/logIn.php'">
                            ログイン画面に戻る</button>
                    </div>
                    </div>
        </div>
    </div>
</body>
</html>

