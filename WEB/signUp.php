<!-- 新規登録 -->

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>新規登録</title>
<style>
</style>
<script type="text/javascript">
function registClick(){
            //正規表現チェック
            const mailPattern = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]+.[A-Za-z0-9]+$/;
            const passPattern = /^(?=.*[A-Z])(?=.*[.?/-])[a-zA-Z0-9.?/-]{8,24}$/;

            let mail = document.getElementById("address").value;
            let pass = document.getElementById("password").value;
            let isSuccess = true;
            //エラーメッセージ
            document.getElementById("errorMsg").innerHTML = "";
            
  if(mailPattern.test(address)==false){
    let errorMsgTag = document.createElement("p");
    errorMsgTag.textContent = "メールアドレスの形式ちがいます。";
  
    document.getElementById("errorMsg").appendChild(errorMsgTag);

    isSuccess = false;
  }
  
  if(passPattern.test(password)==false){
    let errorMsgTag = document.createElement("p");
    errorMsgTag.textContent = "パスワードは８文字以上で数字 英字(大文字/小文字)、記号が１つ以上含まれる必要があります";
  
    document.getElementById("errorMsg").appendChild(errorMsgTag);

    isSuccess = false;
  }
  if(isSuccess == true){
    window.location.href = 'signUpdetail.html';
  }
}
</script>
<meta name="viewport" content="width=device-width, initial-scale=1" />


<!-- bootstarapのcss読み込み -->
</head>

<form action="signUpdetail.php" method="POST">
  <body style="background-color:#FFFF;">
    <div id="maindiv">
      <div class="container-fluid">
          <div class="row">
                  <h1 class="col-md-12 text-center" text-center style="background-color:#DFDFDF;">会員情報入力</h1>
                    <div class="col-md-12 mt-1 mb-1  text-danger text-center" id="errorMsg"></div><!-- エラーメッセージの設定 -->
                      <label for="address" class="form-label col-md-12" style="background-color:#DFDFDF;">メールアドレス</label>
                      <input type="text" class="form-control p-12" id="address" name="e-address" placeholder="">

                      <label for="password" class="form-label col-md-12 mt-2" style="background-color:#DFDFDF;">パスワード</label>
                      <input type="text" class="form-control" id="password" name="password" placeholder="８文字以上で英字、数字、記号が１つ以上含まれる必要があります">

                      <label for="password" class="form-label col-md-12 mt-2">確認のため再入力してください</label>
                      <input type="text" class="form-control" id="password" name="password" placeholder="">

                      <label for="name" class="form-label col-md-12 mt-2" style="background-color:#DFDFDF;">名前(全角)</label>
                      <input type="text" class="form-control" id="familyname" name="familyname" placeholder="苗字">
                      <input type="text" class="form-control mt-2" id="firstname" name="firstname" placeholder="名前">

                      <label for="phonenumber" class="form-label col-md-12 mt-2" style="background-color:#DFDFDF;">電話番号</label>
                      <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="000-0000-0000">

                      <label for="Gender" class="col-form-label col-md-12 mt-2" style="background-color:#DFDFDF;">性別</label>
                        
                      
                            <div class="form-check form-check-inline">
                              <input type="radio" name="gender" value="男性">
                              <label class="form-check-label" for="男性">男性</label>
                            </div>
                            <div class="form-check form-check-inline">           
                              <input type="radio" name="gender" value="女性">
                              <label class="form-check-label" for="女性">女性</label> 
                            </div>
                      <label for="phonenumber" class="form-label col-md-12 mt-2" style="background-color:#DFDFDF;">都道府県</label>
                      <input type="text" class="form-control" id="Ken" name="Ken" placeholder="">

                      <label for="phonenumber" class="form-label col-md-12 mt-2" style="background-color:#DFDFDF;">市区町村</label>
                      <input type="text" class="form-control" id="City" name="City"  placeholder="">

                      <label for="phonenumber" class="form-label col-md-12 mt-2" style="background-color:#DFDFDF;">番地</label>
                      <input type="text" class="form-control" id="AddressNumber" name="AddressNumber" placeholder="">

                        <label for="phonenumber" class="form-label col-md-12 mt-2" style="background-color:#DFDFDF;">マンション名・部屋番号</label>
                        <input type="text" class="form-control" id="HomeNumber" name="HomeNumber" placeholder="">

                        <label for="phonenumber" class="form-label col-md-12 mt-2" style="background-color:#DFDFDF;">郵便番号</label>
                        <input type="text" class="form-control" id="PostCode" name="PostCode"  placeholder="">
                


                  <div class="d-grid gap-2 mt-3">
                      <button class="btn btn-danger" type="submit" onclick="registClick">新規登録をする</button>
                  </div>            
          </div><!--class="row"-->
      </div><!--class="container-fluid"-->
  </div><!--id="maindiv" -->
</form>
<script src="js/bootstrap.min.js"></script><!-- bootstrapのjs読み込み -->
</body>

</html>
