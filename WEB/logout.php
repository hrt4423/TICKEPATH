<?php
    session_start();

    $_SESSION = array();

    session_destroy();
?>

<p>ログアウトしました</p>
<a href="https://localhost/TICKEPATH/WEB/home.php">ホームへ戻る</a>