<?php
    session_start();

    //セッション変数を初期化
    $_SESSION = array();

    //セッションを破棄
    session_destroy();
?>

<p>ログアウトしました</p>
<a href="https://localhost/TICKEPATH/WEB/home.php">ホームへ戻る</a>