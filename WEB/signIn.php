<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>header</title>
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

<!-- サインイン -->

<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>新規登録</title>
<style>
</style>
<script type="text/javascript">
<link rel="stylesheet" href="Maeda.css" />
function registClick(){
            //正規表現チェック
            const mailPattern = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]+.[A-Za-z0-9]+$/;
            const passPattern = /^(?=.*[A-Z])(?=.*[.?/-])[a-zA-Z0-9.?/-]{8,24}$/;

            let mail = document.getElementById("usermail").value;
            let pass = document.getElementById("pass").value;
            let isSuccess = true;
            //エラーメッセージ
            document.getElementById("errorMsg").innerHTML = "";
            
  if(mailPattern.test(mail)==false){
    let errorMsgTag = document.createElement("p");
    errorMsgTag.textContent = "メールアドレスの形式が不正です。";
  
    document.getElementById("errorMsg").appendChild(errorMsgTag);

    isSuccess = false;
  }
  
  if(passPattern.test(pass)==false){
    let errorMsgTag = document.createElement("p");
    errorMsgTag.textContent = "パスワードは８文字以上で英字（大文字/小文字）、数字、記号が１つ以上含まれる必要があります";
  
    document.getElementById("errorMsg").appendChild(errorMsgTag);
    isSuccess = false;
  }

  if(isSuccess == true){
    window.location.href = 'success.html';
  }

   }
</script>
<meta name="viewport" content="width=device-width, initial-scale=1" />


<!-- bootstarapのcss読み込み -->
<link href="../Example/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
<div id="maindiv" class="container">
    <div class="row mt-5">
        <div class="offset-md-3 col-md-6">
            <h1 class="text-center bg-light mb-5">ログイン</h1>
            <div class="row">
                <div class="col-md-12 mt-1 mb-1 alert-danger text-center" id="errorMsg">

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control bg-light" id="usermail" placeholder="abc@abc.com">
                        <label for="lastname">メールアドレス</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mt-2">
                    <div class="form-floating">
                        <input type="password" class="form-control bg-light" id="pass" placeholder="abc@abc.com">
                        <label for="lastname">パスワード</label>
                    </div>
                </div>
              </div>
        </div>
    </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="d-grid gap-2">
                        <button class="btn text-white" style="background-color:#68C5F3;" type="button" onclick="registClick()">ログイン</button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mt-2">
                    <div class="d-grid gap-2">
                        <button class="btn  btn-sm" style="background-color:#DFDFDF;" type="button">戻る</button>
                    </div>
                </div>
            </div>

        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="d-grid gap-2">
                    <button class="btn text-white" style="background-color:#68C5F3;" type="button">新規登録</button>
                </div>
            </div>
        </div>
        
        <!-- bootstrapのjs読み込み -->
        <script src="../Example/js/bootstrap.min.js"></script>
</body>

</html>
