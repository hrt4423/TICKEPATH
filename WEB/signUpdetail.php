<!DOCTYPE html>
<html lang="ja">
       <head>
              <meta charset="UTF-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width,initial-scale=1">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
              <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  
              <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
              <style>
                     .navbar{
                            background-color: #64BCFC;
                     }
                     .homebtn{
                            background-color: #64BCFC;
                     }
              </style>

              

              <title>登録完了画面</title>
       </head>
<body style="background-color: #DFDFDF;">
       <nav class="navbar navbar-light">
              <div class="container-fluid">
                     <!-- タイトル -->
                     <a class="navbar-brand" href="http://bold-obi-8187.littlestar.jp/TICKEPATH/www/home.php">
                            <img src="http://bold-obi-8187.littlestar.jp/TICKEPATH/IMAGES/黄色ロゴ.png" height="75px">
                     </a>
                     <!-- ハンバーガーメニュー -->
                     </button>
                     <!-- ナビゲーションメニュー -->
                     <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                   <li class="nav-item active">
                                          <a class="nav-link text-light" href="https://localhost/TICKEPATH/WEB/home.php">ホーム</a>
                                   </li>
                                   <li class="nav-item">
                                          <a class="nav-link text-light" href="https://localhost/TICKEPATH/WEB/accessCheckMyPage.php">マイページ</a>
                                   </li>
                                   <li class="nav-item mb-2">
                                          <a class="nav-link text-light" href="#">新規登録orログイン</a>
                                   </li>
                                   <!-- 検索の処理 -->
                                   <form action="searchResult.php" method="post">
                                          <div class="input-group">
                                                 <input type="text" name="name" class="form-control" placeholder="キーワードを入力" required>
                                                 <button type="submit" name="search" class="btn btn-secondary" id="searchbutton" type="button"><i class="bi bi-search"></i></button>
                                          </div>
                                   </form>
                            </ul>
                     </div>
              </div>
       </nav>



       <div class="card border-dark mt-1">
              <h5 class="card-title text-center mt-4">
                     新規ユーザー登録が完了しました
              </h5>
                     <?php
                            $pdo = new PDO('mysql:host=mysql207.phy.lolipop.lan;dbname=LAA1417809-tickepath;charset=utf8',
                            'LAA1417809', 'Team6db');
                            $sql ="INSERT INTO client(client_password,family_name,first_name,gender,email_address,mobile_phone_number,post_code,prefecture,city,address,Room_number)
                                   VALUES(?,?,?,?,?,?,?,?,?,?,?)";
                            $ps=$pdo->prepare($sql);
                            $ps->bindValue(1,($_POST['password']),PDO::PARAM_STR);
                            $ps->bindValue(2,$_POST['familyname'],PDO::PARAM_STR);
                            $ps->bindValue(3,$_POST['firstname'],PDO::PARAM_STR);
                            $ps->bindValue(4,$_POST['gender'],PDO::PARAM_STR);
                            $ps->bindValue(5,$_POST['e-address'],PDO::PARAM_STR);
                            $ps->bindValue(6,$_POST['phonenumber'],PDO::PARAM_STR);
                            $ps->bindValue(7,$_POST['PostCode'],PDO::PARAM_STR);
                            $ps->bindValue(8,$_POST['Ken'],PDO::PARAM_STR);
                            $ps->bindValue(9,$_POST['City'],PDO::PARAM_STR);
                            $ps->bindValue(10,$_POST['AddressNumber'],PDO::PARAM_STR);
                            $ps->bindValue(11,$_POST['HomeNumber'],PDO::PARAM_STR);
                            $ps->execute();
                     ?>
              <div class="row">
                     <div class="offset-lg-4 col-lg-4  offset-sm-4 col-sm-4  mt-2">
                            <div class="d-grid gap-2">
                                   <button class="  btn-sm mb-2 btn text-white border-dark" style="background-color:#64BCFC;" onclick="location.href='http://bold-obi-8187.littlestar.jp/TICKEPATH/www/logIn.php'">
                                          ログイン画面に戻る
                                   </button>
                            </div>
                     </div>
              </div>
       </div>
</body>
</html>
