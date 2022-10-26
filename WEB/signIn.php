<!-- サインイン -->

<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>新規登録 | cookpod</title>
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
<link href="css/bootstrap.min.css" rel="stylesheet" />
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
                        <button class="btn text-white" style="background-color:#64BCFC;" type="button" onclick="registClick()">ログイン</button>
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
                    <button class="btn text-white" style="background-color:#64BCFC;" type="button">新規登録</button>
                </div>
            </div>
        </div>
        
        <!-- bootstrapのjs読み込み -->
        <script src="js/bootstrap.min.js"></script>
</body>

</html>
