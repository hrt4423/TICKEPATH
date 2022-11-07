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
    
    <!-- ナビゲーションバー -->
    <nav class="navbar navbar-light bg-info mb-3">
        <div class="container-fluid">
            <!-- タイトル -->
            <a class="navbar-brand" href="#">
                <img src="../images/黄色ロゴ.png" height="75px">
            </a>
            <!-- ハンバーガーメニュー -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- ナビゲーションメニュー -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link text-light" href="#">ホーム</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">新規登録</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">ログイン</a>
                    </li>
                    <!-- 検索フォーム -->
                    <form class="d-flex m-2">
                        <input class="form-control form-control-sm" type="search" placeholder="キーワードで検索" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
    <div class="row p-2">
        <h2 class="text-center">チケットをキャンセルしました</h2>        
        <div class="container p-4">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="table"style="background-color:#DFDFDF;"><td>公演名</td></tr>
                    <tr><td>○○○○</td></tr>
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