<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logout</title>
</head>
<body>
    <?php
        session_start();
    
        //セッション変数を初期化
        $_SESSION = array();
    
        //セッションを破棄
        session_destroy();
    ?>
    
    <p>ログアウトしました</p>
    <a href="https://localhost/TICKEPATH/WEB/home.php">ホームへ戻る</a>
    
</body>
</html>