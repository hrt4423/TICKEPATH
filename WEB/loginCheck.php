<?php
    require_once './DAO/client.php';
    $daoClient = new DAO_client;
    //メールアドレス
    $emailAddress = $_POST['email_address'];
    $password = $_POST['password'];

    //バリデーションチェック
    if (filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
        //入力形式が正しい
        //$clientData=array();
        $clientData = $daoClient->loginCheck($emailAddress);
        if(count($clientData)==0){
            echo 'アカウントが存在しません<br>';
            echo '<a href="https://localhost/TICKEPATH/WEB/logIn.php">ログイン画面へ戻る</a>';
        }else{
            foreach($clientData as $row){
                if($password == $row['client_password']){
                    header('location: https://localhost/TICKEPATH/WEB/home.php');
                }else{
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
