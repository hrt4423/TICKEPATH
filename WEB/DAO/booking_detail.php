<?php
    //booking_detail（予約明細）テーブルにアクセスするクラス
    class DAO_booking_detail{
        //データベースに接続する関数
        private function dbConnect(){
            //データベースに接続
            $pdo = new PDO('mysql:host=localhost; dbname=webdb; charset=utf8',
                            'webuser', 'abccsd2');
            return $pdo;
        }

        //予約IDから席IDを検索する関数
        public function getSeatIdByBookingId($bookingId){
            $pdo = $this -> dbConnect();

            //SQLの生成　入力を受け取る部分は”？”
            $sql = "SELECT * FROM booking_detail WHERE booking_id=?";

            //prepare:準備　戻り値を変数に保持
            $ps = $pdo -> prepare($sql);

            //”？”に値を設定する
            $ps->bindValue(1, $bookingId, PDO::PARAM_INT); 

            //SQLの実行
            $ps->execute();
            //実行結果を配列に格納
            $result = $ps->fetchAll(PDO::FETCH_ASSOC);

            if(empty($result)){
                echo '指定したIDに該当するデータはありません。';
            }else{
                foreach($result as $row){
                    $seatId=$row['seat_id'];
                }
            } 
            //echo $seatId;
            return $seatId;
        }

        //明細を登録　引数：
        public function addBookingDetail($familyName, $firstName, $bookingId, $seatId){
            

            $pdo = $this->dbConnect();
            //SQLの生成　入力を受け取る部分は”？”
            $sql = "INSERT INTO booking_detail(booking_id, visitor_family_name, 
            visitor_first_name, seat_id) 
            VALUES(?, ?, ?, ?)";

            //prepare:準備　戻り値を変数に保持
            $ps = $pdo -> prepare($sql);

            //”？”に値を設定する
            $ps->bindValue(1, $bookingId, PDO::PARAM_INT); 
            $ps->bindValue(2, $familyName, PDO::PARAM_STR); //family name
            $ps->bindValue(3, $firstName, PDO::PARAM_STR); //first name
            $ps->bindValue(4, $seatId, PDO::PARAM_INT); 
            
            //SQLの実行
            $ps->execute();
        }
    }
?>

