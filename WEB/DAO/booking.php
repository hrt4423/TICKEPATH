<?php
    //booking（予約）テーブルにアクセスするクラス
    class DAO_booking{
        //データベースに接続する関数
        private function dbConnect(){
            //データベースに接続
            $pdo = new PDO('mysql:host=localhost; dbname=webdb; charset=utf8',
                            'webuser', 'abccsd2');
            return $pdo;
        }

        //client_idから予約IDを検索する関数, 戻り値：booking_id 複数？
        public function getBookingIdByClientId($clientId){
            $pdo = $this -> dbConnect();

            //SQLの生成　入力を受け取る部分は”？”
            $sql = "SELECT * FROM booking WHERE client_id=?";

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
                    $bookingIds[]=$row['booking_id'];
                }
            } 
            //var_dump($bookingIds);
            return $bookingIds;
        }
    }
?>