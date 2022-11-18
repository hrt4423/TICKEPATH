<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>キャンセル完了画面</title>
    <link href="../Example/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['clientId'])){
            echo 'ログイン中<br>ID：', $_SESSION['clientId'],'<br>';
            echo '<a href="https://localhost/TICKEPATH/WEB/logout.php">ログアウト</a>';
            
        }else{
            echo 'ログインしていません<br>';
            echo '<a href="https://localhost/TICKEPATH/WEB/login.php">ログイン</a>';
        }
        
    ?>
    <!-- ナビゲーションバー -->
    <nav class="navbar navbar-light  mb-3" style="background-color: #64BCFC;">
        <div class="container-fluid">
            <!-- タイトル -->
            <a class="navbar-brand" href="https://localhost/TICKEPATH/WEB/home.php">
                <img src="../images/黄色ロゴ.png" height="75px">
            </a>
            
        </div>
    </nav>

    <div class="container-fluid">
    <div class="row p-2">
        <h2 class="text-center">チケットをキャンセルしました</h2>        
        <div class="container p-4">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="table"style="background-color:#DFDFDF;"><td>公演名</td></tr>
                    <tr><td><?= echo $_SESSION['cancelId']?></td></tr>
                    <tr class="table"style="background-color:#DFDFDF;"><td>会場</td></tr>
                    <tr><td>○○○○</td></tr>
                    <tr class="table"style="background-color:#DFDFDF;"><td>公演日時</td></tr>
                    <tr><td>○○○○</td></tr>
                    <tr class="table"style="background-color:#DFDFDF;"><td>席種・料金</td></tr>
                    <tr><td>¥：0000</td></tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="d-grid gap-2 col-6 mx-auto">
        <a href="mypage.php" class="btn" style="color:#fff; background-color: #64BCFC;" type="button">マイページへ戻る</a>      
    </div>
    </div>
    <script src="../Example/js/bootstrap.min.js"></script>
</body>
</html>