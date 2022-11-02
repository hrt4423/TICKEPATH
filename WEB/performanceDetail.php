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
    require_once './DAO/performance.php';
    $daoPerformance = new DAO_performance;
    $aimyon=1;
    $yonedu=2;
?>
<div class="container-fluid">   
	<div class="card border-dark">
		<h5 class="card-title text-center mt-4">
			<?php 
				$daoPerformance->outPutArtist($aimyon);
			?>のチケット情報</h5>
			<div class=card-body>
				<img src="<?php $daoPerformance->getImagePath($aimyon); ?>">;
            </div>		
	</div>

	<div class="card border-dark mt-1">
			<div class=card-body>
				<h6><?php  $daoPerformance->outPutDate($aimyon) ?></h6>
				<h6>開園：<?php  $daoPerformance->outPutStartTime($aimyon) ?></h6>
            </div>		
	</div>



</div> 
</body>
    <!-- bootstrapのjs読み込み -->
    <script src="js/bootstrap.min.js"></script>
    </html>