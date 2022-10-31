<!-- 新規登録 -->

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>検索結果表示</title>
<style>
</style>
<script type="text/javascript">
</script>
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- bootstarapのcss読み込み -->
</head>
<!--DBと接続 -->

<body style="background-color:#DFDFDF;">
<?php
    $pdo = new PDO('mysql:host=localhost;dbname=webdb;charset=utf8', 'webuser','abccsd2');
    $sql = "SELECT * FROM performance WHERE artist_name=?";
    $ps=$pdo->prepare($sql);
    $ps->bindValue(1,$_POST['inputName'],PDO::)
?>
</body>
    <!-- bootstrapのjs読み込み -->
    <script src="js/bootstrap.min.js"></script>
    </html>