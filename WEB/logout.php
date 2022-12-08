<?php
    session_start();
?>
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
    try{
        //セッション変数を初期化
        $_SESSION = array();
    
        //セッションを破棄
        session_destroy();
    }catch(Exception $ex){
        echo $ex->getMessage();
    }catch(Error $err){
        echo $err->getMessage();
    }
    ?>
    
    <p>ログアウトしました</p>
    <a href="http://bold-obi-8187.littlestar.jp/TICKEPATH/www/home.php">ホームへ戻る</a>
    
</body>
</html>