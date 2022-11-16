<?php
    //seat（席）テーブルにアクセスするクラス
    class DAO_seat{
        //データベースに接続する関数
        private function dbConnect(){
            //データベースに接続
            $pdo = new PDO('mysql:host=localhost; dbname=webdb; charset=utf8',
                            'webuser', 'abccsd2');
            return $pdo;
        }

        //席IDから公演IDを検索する関数
        public function getSeatIdByBookingId($seat_id){
            $pdo = $this -> dbConnect();

            //SQLの生成　入力を受け取る部分は”？”
            $sql = "SELECT * FROM seat WHERE seat_id=?";

            //prepare:準備　戻り値を変数に保持
            $ps = $pdo -> prepare($sql);

            //”？”に値を設定する
            $ps->bindValue(1, $seat_id, PDO::PARAM_INT); 

            //SQLの実行
            $ps->execute();
            //実行結果を配列に格納
            $result = $ps->fetchAll(PDO::FETCH_ASSOC);

            if(empty($result)){
                echo '指定したIDに該当するデータはありません。';
            }else{
                foreach($result as $row){
                    $performanceId=$row['performance_id'];
                }
            } 
            return $performanceId;
        }

        //公演IDから席種IDを取得する関数 戻り値：配列
        public function getSeatValueIdsByPerformanceId($performanceId){
            $pdo = $this->dbConnect();
            //SQLの生成　入力を受け取る部分は”？”
            $sql = "SELECT * FROM seat WHERE performance_id=? ORDER BY seat_value_id";

            //prepare:準備　戻り値を変数に保持
            $ps = $pdo -> prepare($sql);

            //”？”に値を設定する
            $ps->bindValue(1, $performanceId, PDO::PARAM_INT); 

            //SQLの実行
            $ps->execute();

            //実行結果を配列に格納
            $result = $ps->fetchAll(PDO::FETCH_ASSOC);

            if(empty($result)){
                echo '指定したIDに該当するデータはありません。';
            }else{
                foreach($result as $row){
                    $seatValueIds[]=$row['seat_value_id'];
                }
            } 
            return $seatValueIds;
        }

        //公演ID、席種IDから値段を表示する関数
        public function outputSeatPrice($performanceId, $seatValueId){
            $pdo = $this->dbConnect();
            //SQLの生成　入力を受け取る部分は”？”
            $sql = "SELECT * FROM seat WHERE performance_id=? AND seat_value_id=?";

            //prepare:準備　戻り値を変数に保持
            $ps = $pdo -> prepare($sql);

            //”？”に値を設定する
            $ps->bindValue(1, $performanceId, PDO::PARAM_INT); 
            $ps->bindValue(2, $seatValueId, PDO::PARAM_INT); 


            //SQLの実行
            $ps->execute();

            //実行結果を配列に格納
            $result = $ps->fetchAll(PDO::FETCH_ASSOC);

            if(empty($result)){
                //戻り値なし
            }else{
                foreach($result as $row){
                    $seatPrice=$row['seat_price'];
                }
            } 
            echo $seatPrice;
        }
    }

?>