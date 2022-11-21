<?php
    class DAO_client{
        //データベースに接続する関数
        private function dbConnect(){
            //データベースに接続
            $pdo = new PDO('mysql:host=localhost; dbname=webdb; charset=utf8',
                            'webuser', 'abccsd2');
            return $pdo;
        }

        //メールアドレスから顧客データを取得する関数
        public function getClientDataByEmail($emailAddress){

            $pdo = $this -> dbConnect();

            //SQLの生成　入力を受け取る部分は”？”
            $sql = "SELECT * FROM client WHERE email_address = ?";

            //prepare:準備　戻り値を変数に保持
            $ps = $pdo -> prepare($sql);

            //”？”に値を設定する
            $ps->bindValue(1, $emailAddress ,PDO::PARAM_STR); 
            
            //SQLの実行
            $ps->execute();

            $result = $ps -> fetchAll();

            return $result;
        }

        //clientIdから姓を取得する関数
        public function getFamilyName($clientId){
            $pdo = $this -> dbConnect();

            //SQLの生成　入力を受け取る部分は”？”
            $sql = "SELECT * FROM client WHERE client_id=?";

            //prepare:準備　戻り値を変数に保持
            $ps = $pdo -> prepare($sql);
            //”？”に値を設定する
            $ps->bindValue(1, $clientId, PDO::PARAM_INT); 
            //SQLの実行
            $ps->execute();
            //実行結果を配列に格納
            $result = $ps->fetchAll(PDO::FETCH_ASSOC);

            if(empty($result)){
                echo '指定したIDに該当するデータはありません。';
            }else{
                foreach($result as $row){
                    $familyName=$row['family_name'];
                }
            } 
            return $familyName;
        }

        //clientIdから名を取得する関数
        public function getFirstName($clientId){
            $pdo = $this -> dbConnect();

            //SQLの生成　入力を受け取る部分は”？”
            $sql = "SELECT * FROM client WHERE client_id=?";

            //prepare:準備　戻り値を変数に保持
            $ps = $pdo -> prepare($sql);
            //”？”に値を設定する
            $ps->bindValue(1, $clientId, PDO::PARAM_INT); 
            //SQLの実行
            $ps->execute();
            //実行結果を配列に格納
            $result = $ps->fetchAll(PDO::FETCH_ASSOC);

            if(empty($result)){
                echo '指定したIDに該当するデータはありません。';
            }else{
                foreach($result as $row){
                    $firstName=$row['first_name'];
                }
            } 
            return $firstName;
        }
        
    }

?>