<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/loginCheck.css">
    <title>loginCheck</title>
</head>
<body>
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
                echo '<p>入力されたメールアドレスのアカウントは存在しません</p>';
                echo '<a href="https://localhost/TICKEPATH/WEB/logIn.php">ログイン画面へ戻る</a>';
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
                        echo '<p>パスワードが一致しません</p>';
                        echo '<a href="https://localhost/TICKEPATH/WEB/logIn.php">ログイン画面へ戻る</a>';
                    }
                }
            }
        }else{//入力形式が不正
            echo "<p>不正な形式のメールアドレスです</p>";
            echo '<a href="https://localhost/TICKEPATH/WEB/logIn.php">ログイン画面へ戻る</a>';
        }
    ?>
    
</body>
</html>

