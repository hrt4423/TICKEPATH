<?php
    $pdo = new PDO('mysql:host=mysql207.phy.lolipop.lan;dbname=LAA1417809-tickepath;charset=utf8',
                'LAA1417809', 'Team6db');

    //SQLの生成　入力を受け取る部分は”？”
    $sql = "SELECT * FROM performance WHERE performance_id=?";

    //prepare:準備　戻り値を変数に保持
    $ps = $pdo -> prepare($sql);

    //”？”に値を設定する。
    $ps->bindValue(1, $id, PDO::PARAM_INT); 

    //SQLの実行
    $ps->execute();
    $result = $ps->fetchAll(PDO::FETCH_ASSOC);

    //var_dump($result);


?>