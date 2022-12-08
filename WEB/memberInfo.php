<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録情報確認</title>
</head>
<body>
    <?php
    try{
        session_start();
        if(isset($_SESSION['clientId'])){
            echo 'ログイン中<br>ID：', $_SESSION['clientId'],'<br>';
            echo '<a href="https://localhost/TICKEPATH/WEB/logout.php">ログアウト</a>';
            
        }else{
            echo 'ログインしていません<br>';
            echo '<a href="https://localhost/TICKEPATH/WEB/login.php">ログイン</a>';
        }
    }catch(Exception $ex){
        echo $ex->getMessage();
    }catch(Error $err){
        echo $err->getMessage();
    }    
    ?>

    <p>
        登録情報確認ページです。
    </p> 

    <button class="btn  text-white" style="background-color:#68C5F3;"
        onclick="location.href='https://localhost/TICKEPATH/WEB/myPage.php'">
        マイページに戻る    
    </button>


</body>
</html>