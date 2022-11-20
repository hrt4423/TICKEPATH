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

        //client_idから予約IDを検索する関数, 戻り値：booking_id 配列
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
                $bookingIds = array();
            }else{
                foreach($result as $row){
                    $bookingIds[]=$row['booking_id'];
                }
            } 
            
            return $bookingIds;
        }

        //is_cancelをtrueにするメソッド
        public function Cancel($bookingid){
            $pdo = $this -> dbConnect();
            //SQLの生成　入力を受け取る部分は”？”
            $sql = "UPDATE booking SET is_cancel = true WHERE booking_id=?";
            //prepare:準備　戻り値を変数に保持
            $ps = $pdo -> prepare($sql);
            //”？”に値を設定する
            $ps->bindValue(1, $bookingid, PDO::PARAM_INT);
            //SQLの実行
            $ps->execute();
        }

        //予約データを登録する　引数：顧客ID インサートしたデータのIDを返す
        public function addBooking($clientId){
            //現在の年月日を取得
            $timeStamp = time();
            $currentDate = date("Y-m-d H:i:s", $timeStamp);

            $pdo = $this -> dbConnect();

            //トランザクション開始
            $pdo->beginTransaction();

            //SQLの生成　入力を受け取る部分は”？”
            $sql =" INSERT INTO booking(booking_date_time, client_id, is_cancel) 
                VALUES(?, ?, false);";

            //prepare:準備　戻り値を変数に保持
            $ps = $pdo -> prepare($sql);
            //”？”に値を設定する
            $ps->bindValue(1, $currentDate, PDO::PARAM_STR);
            $ps->bindValue(2, $clientId, PDO::PARAM_INT);

            //SQLの実行
            $ps->execute();

            //SQLの生成　入力を受け取る部分は”？”
            $sql =" SELECT LAST_INSERT_ID();";

            //prepare:準備　戻り値を変数に保持
            $ps = $pdo -> prepare($sql);

            //SQLの実行
            $ps->execute();

            //コミット
            $pdo->commit();

            //実行結果を配列に格納
            $result = $ps->fetchAll(PDO::FETCH_ASSOC);

            
            foreach($result as $row){
                $bookingId = $row['LAST_INSERT_ID()'];
            }


            return $bookingId;
        }

    }
?>