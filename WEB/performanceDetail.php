<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>商品詳細</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../css/mypage.css">
  <link rel="stylesheet" href="css/test.css" />
  <style>
    .navbar{
        background-color: #64BCFC;
    }
  </style>
</head>
<body>
    <!-- ナビゲーションバー -->
    <nav class="navbar navbar-light">
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
                    <li class="nav-item mb-2">
                        <a class="nav-link text-light" href="#">ログイン</a>
                    </li>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="キーワードを入力">
                        <button class="btn btn-secondary" type="button"><i class="bi bi-search"></i></button>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>

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

<!--アイコンのCDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<!--DBと接続 -->
<body style="background-color:#DFDFDF;">
    <?php
    require_once './DAO/performance.php';
    $daoPerformance = new DAO_performance;
    $aimyon=$_POST['key'];
?>
<div class="container-fluid">   
	<div class="card border-dark mt-1"><!-- 公演写真カード -->
		<h5 class="card-title text-center mt-4">
			<?php 
				$daoPerformance->outPutArtist($aimyon);
                echo $_POST['key'];
			?>のチケット情報</h5><!-- アーティスト名 -->
			<div class="card-body ">
				<img class="mx-auto img-fluid" src="<?php $daoPerformance->getImagePath($aimyon); ?>"><!--写真  -->
            </div>		
	</div>

	<div class="card border-dark mt-1"><!-- 公演詳細カード -->
			<div class=card-body>
				<h8><?php  $daoPerformance->outPutDate($aimyon) ?></h8><br><!--公演日  -->
				<h8>開園：<?php  $daoPerformance->outPutStartTime($aimyon) ?></h8><br><!--開園時間  -->
				<span style="color:#68C5F3;"><h8><?php  $daoPerformance->outPutPlace($aimyon) ?></h8></span><!-- 会場名 -->
            </div>		
	</div>
	<div class="d-grid gap-2"><!--申込みボタン-->
		<button style="background-color:#68C5F3;border-color:black;color:white" class="btn mt-1"type="button">申し込む</button>
	</div>


	<div class="card border-dark mt-3">
		<h8 style="color:#0047FF"  class="card-title text-center mt-1">このアーティストをお気に入りに登録する</h8>
		<div class=row>
			<h6 class="text-center"><?php $daoPerformance->outPutArtist($aimyon);?></h6> 
		</div>
	</div>
	<button type="button" class="btn btn-outline-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-heart" >
  <path d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z"/>
</svg>
                登録
              </button>





</div> 
</body>
    <!-- bootstrapのjs読み込み -->
    <script src="js/bootstrap.min.js"></script>
    </html>