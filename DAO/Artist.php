<?php
define('DSN','mysql:host=mysql207.phy.lolipop.lan;charset=utf8');
define('DB_USER', '	LAA1417809');
define('DB_PASS', 'Team6db');
$pdo = new PDO(DSN, DB_USER, DB_PASS);

//SQLの生成　入力を受け取る部分は”？”
$sql = "SELECT * FROM Artist ";

//prepare:準備　戻り値を変数に保持
$ps = $pdo -> prepare($sql);

//SQLの実行
$ps->execute();
$result = $ps->fetchAll();

foreach($result as $row){
    echo $row['ArtistName'],'<br>';
    $cnt++;
}

?>