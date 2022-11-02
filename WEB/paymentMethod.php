<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>決済方法選択画面</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
        <div class="row">
            <h3 class="bg-white col-md-12 text-center">決済方法の選択</h3>
        
            <div><!-- カード位置　調整 -->
                <div class="card">
                    <div class="card-body">
    
                        <form action="" method="post" class="bg-white" id="payment_method_form">
                            <div class="form-check mt-2">
                            <input type="radio" name="payment_method_radio" id="" class="form-check-input">
                            <label for="rd1" class="form-check-label">
                                クレジットカード決済
                            </label>
                            </div>
    
                            <label for="credit_card_number" class="form-label mt-2">クレジットカード番号</label>
                            <input type="text"  id="holder_name" class="form-control" 
                            placeholder="0000-0000-0000-0000">
    
                            <label for="holder_name" class="form-label mt-3">名義人</label>
                            <input type="text"  id="holder_name" class="form-control" 
                            placeholder="TARO YAMADA">
                            
                            <label for="select_month" class="mt-3 mb-2">有効期限</label>
                            <div class="row">
                                <div class="col-6">
                                    <select name="month" id="select_month" class="form-select">
                                        <option selected>01</option>
                                        <option value="2">02</option>
                                        <option value="3">03</option>
                                        <option value="4">04</option>
                                        <option value="5">05</option>
                                        <option value="6">06</option>
                                        <option value="7">07</option>
                                        <option value="8">08</option>
                                        <option value="9">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>
    
                                <div class="col-6">
                                    <select name="year" id="select_year" class="form-select">
                                        <option selected>2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                        <option value="2031">2031</option>
                                        <option value="2032">2032</option>
                                        <option value="2033">2033</option>
                                        <option value="2034">2034</option>
                                        <option value="2035">2035</option>
                                    </select>
                                </div>
                            </div>
    
                            <label for="security_code" class="form-label mt-3">セキュリティコード</label>
                            <input type="text"  id="security_code" class="form-control" 
                            placeholder="123" style="width: 119px;">
    
                            <div class="form-check mt-3">
                                <input type="radio" name="payment_method_radio" id="" class="form-check-input">
                                <label for="rd1" class="form-check-label">
                                    コンビニ決済
                                </label>
                            </div>
                            <div class="text-center">
                                コンビニエンスストアで代金をお支払いいただけます。
                            </div>

                            <div class="row mt-3">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-ligh text-dark" style="background-color: #DFDFDF;">
                                        戻る
                                    </button>
                                </div>
                
                                <div class="col-6">
                                    <a href=""><!--  -->
                                        <button type="submit" class="btn btn-info text-white" 
                                            form="payment_method_form">
                                            申込み
                                        </button>
                                    </a>
                                </div>
                            </div><!-- row -->

                        </form>
    
                    </div><!-- card-body -->
                </div><!-- card -->
            </div><!-- カード位置　調整 -->

        </div><!-- row -->
    </div><!-- container -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>