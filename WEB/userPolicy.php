<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <title>規約</title>
    <!-- bootstarapのcss読み込み -->
    <link href="../Example/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body style="background-color: #DFDFDFDF;">
    <?php
        session_start();
        if(isset($_SESSION['clientId'])){
            echo 'ログイン中<br>ID：', $_SESSION['clientId'],'<br>';
            echo '<a href="https://localhost/TICKEPATH/WEB/logout.php">ログアウト</a>';
            
        }else{
            echo 'ログインしていません<br>';
            echo '<a href="https://localhost/TICKEPATH/WEB/login.php">ログイン</a>';
        }
        echo '<br>performanceId：', $_SESSION['performanceId'];

        if(isset($_SESSION['seatValueId']) && isset($_SESSION['ticketNum'])){
            echo '<br>席種ID：', $_SESSION['seatValueId'];
            echo '<br>チケット枚数：', $_SESSION['ticketNum'];
        }
    ?>
    <div class="container-fluid">
        <div class="row">
            <h3 class="bg-white col-md-12 text-center">利用規約</h3>
        
            <div><!-- カード位置　調整 -->
                <div class="card">
                    <div class="card-body">
                            <div class="text-center">
                                <h2>利用規約</h2>
                                この利用規約は，チーム6（以下，「当社」といいます。）がこのウェブサイト上で提供するサービスの利用条件を定めるものです。登録ユーザーの皆さまには，本規約に従って，本サービスをご利用いただきます。
                                ユーザーは，本サービスの利用にあたり，以下の行為をしてはなりません。

                                <h2>第1条（適用）</h2>
                                本規約は，ユーザーと当社との間の本サービスの利用に関わる一切の関係に適用されるものとします。
                                当社は本サービスに関し，本規約のほか，ご利用にあたってのルール等，各種の定めをすることがあります。これら個別規定はその名称のいかんに関わらず，本規約の一部を構成するものとします。
                                本規約の規定が前条の個別規定の規定と矛盾する場合には，個別規定において特段の定めなき限り，個別規定の規定が優先されるものとします。
                                
                                <h2>第2条（利用登録）</h2>
                                本サービスにおいては，登録希望者が本規約に同意の上，当社の定める方法によって利用登録を申請し，当社がこれを承認することによって，利用登録が完了するものとします。
                                当社は，利用登録の申請者に以下の事由があると判断した場合，利用登録の申請を承認しないことがあり，その理由については一切の開示義務を負わないものとします。
                                利用登録の申請に際して虚偽の事項を届け出た場合
                                本規約に違反したことがある者からの申請である場合
                                その他，当社が利用登録を相当でないと判断した場合

                                <h2>第3条（ユーザーIDおよびパスワードの管理）</h2>
                                ユーザーは，自己の責任において，本サービスのユーザーIDおよびパスワードを適切に管理するものとします。
                                ユーザーは，いかなる場合にも，ユーザーIDおよびパスワードを第三者に譲渡または貸与し，もしくは第三者と共用することはできません。当社は，ユーザーIDとパスワードの組み合わせが登録情報と一致してログインされた場合には，そのユーザーIDを登録しているユーザー自身による利用とみなします。
                                ユーザーID及びパスワードが第三者によって使用されたことによって生じた損害は，当社に故意又は重大な過失がある場合を除き，当社は一切の責任を負わないものとします。
                            </div>
    
                    </div><!-- card-body -->
                </div><!-- card -->
            </div><!-- カード位置　調整 -->
        <div><!-- カード位置　調整 -->
            <div class="card">
                <div class="card-body">
                        <div class="text-center">
                            <form action="" method="post">
                                <input type="checkbox" name="kiyaku" id="checkbox">利用規約に同意する
                            </form>
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- カード位置　調整 -->
        </div>
    </div>

            <div class="row">
                <div class="offset-2 col-4">
                    <button class="btn btn-ligh text-dark" style="background-color: #FFFF;"
                        onclick="location.href='https://localhost/TICKEPATH/WEB/paymentMethod.php'">
                            戻る
                    </button>
                </div>
            
                <div class="col-6">
                        <button class="btn mx-2 btn-info" style="background-color:#68C5F3;" 
                            onclick="location.href='https://localhost/TICKEPATH/WEB/confirm.php'"
                            id="button"
                            disabled>
                            次へ
                        </button>
                </div>
        </div><!-- row -->
    </div>

    <!-- bootstrapのjs読み込み -->
    <script src="../Example/js/bootstrap.min.js"></script>
    <script src="./SCRIPT/script.js"></script>
</body>
</html>