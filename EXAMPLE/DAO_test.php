<?php
$pdo = new PDO('mysql:host=localhost; dbname=tickepath; charset=utf8','dev', 'Team6db');
//ユーザー名：dev
//パスワード：Team6db

//SQLの生成　入力を受け取る部分は”？”
$sql = "SELECT * FROM client";

//prepare:準備　戻り値を変数に保持
$ps = $pdo -> prepare($sql);

//SQLの実行
$ps->execute();
$result = $ps->fetchAll();

foreach($result as $row){
    echo $row['ClientID'],$row['FirstName'],'<br>';
}

?>