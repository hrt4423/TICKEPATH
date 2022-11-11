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
            echo '入力されたメールアドレスのアカウントは存在しません<br>';
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
                    echo 'パスワードが一致しません<br>';
                    echo '<a href="https://localhost/TICKEPATH/WEB/logIn.php">ログイン画面へ戻る</a>';
                }
            }
        }
    }else{//入力形式が不正
        echo "不正な形式のメールアドレスです<br>";
        echo '<a href="https://localhost/TICKEPATH/WEB/logIn.php">ログイン画面へ戻る</a>';
    }
?>
