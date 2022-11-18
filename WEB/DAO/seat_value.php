<?php
    //seat（席）テーブルにアクセスするクラス
    class DAO_seat_value{
        //データベースに接続する関数
        private function dbConnect(){
            //データベースに接続
            $pdo = new PDO('mysql:host=localhost; dbname=webdb; charset=utf8',
                            'webuser', 'abccsd2');
            return $pdo;
        }

        //席種名を表示する
        public function getSeatName($seatValueId){
            $pdo = $this->dbConnect();
            //SQLの生成　入力を受け取る部分は”？”
            $sql = "SELECT * FROM seat_value WHERE seat_value_id=?";

            //prepare:準備　戻り値を変数に保持
            $ps = $pdo -> prepare($sql);

            //”？”に値を設定する
            $ps->bindValue(1, $seatValueId, PDO::PARAM_INT); 

            //SQLの実行
            $ps->execute();

            //実行結果を配列に格納
            $result = $ps->fetchAll(PDO::FETCH_ASSOC);

            if(empty($result)){
                echo '指定したIDに該当するデータはありません。';
            }else{
                foreach($result as $row){
                    $seatName=$row['seat_name'];
                }
            } 
            return $seatName;
        }

        //席種IDから席種名を表示する関数
        public function outputSeatName($seatValueId){
            $pdo = $this->dbConnect();
            //SQLの生成　入力を受け取る部分は”？”
            $sql = "SELECT * FROM seat_value WHERE seat_value_id=?";

            //prepare:準備　戻り値を変数に保持
            $ps = $pdo -> prepare($sql);

            //”？”に値を設定する
            $ps->bindValue(1, $seatValueId, PDO::PARAM_INT); 

            //SQLの実行
            $ps->execute();

            //実行結果を配列に格納
            $result = $ps->fetchAll(PDO::FETCH_ASSOC);

            if(empty($result)){
                echo '指定したIDに該当するデータはありません。';
            }else{
                foreach($result as $row){
                    $seatName=$row['seat_name'];
                }
            } 
            echo $seatName;
        }
    }

?>