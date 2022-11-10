<?php
    session_start();
    require_once './DAO/client.php';
    $daoClient = new DAO_client;
    //メールアドレス
    $emailAddress = $_POST['email_address'];
    $password = $_POST['password'];

    //バリデーションチェック
    if (filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
        //入力形式が正しい
        $clientData = $daoClient->loginCheck($emailAddress);
        //データが無い
        if(count($clientData)==0){
            echo 'アカウントが存在しません<br>';
            echo '<a href="https://localhost/TICKEPATH/WEB/logIn.php">ログイン画面へ戻る</a>';
        }else{
            foreach($clientData as $row){
                if($password == $row['client_password']){//パスワード一致
                    $_SESSION['clientId'] = $row['client_id'];
                    $_SESSION['familyName'] = $row['family_name'];
                    $_SESSION['emailAddress'] = $row['email_address'];
                    header('location: https://localhost/TICKEPATH/WEB/home.php');
                }else{//パスワードが一致しない
                    echo 'パスワードが一致しません<br>';
                    echo '<a href="https://localhost/TICKEPATH/WEB/logIn.php">ログイン画面へ戻る</a>';
                }
            }
        }
    }else{
        //入力形式が不正
        echo "不正な形式のメールアドレスです<br>";
        echo '<a href="https://localhost/TICKEPATH/WEB/logIn.php">ログイン画面へ戻る</a>';
    }
?>
