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
            $sql = "SELECT DISTINCT seat_value_id FROM seat WHERE performance_id=? ORDER BY seat_value_id";

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

        //seatidから公演idを取得
        public function getPerformanceId($seatid){
            $pdo = $this->dbConnect();
            //SQLの生成　入力を受け取る部分は”？”
            $sql = "SELECT * FROM seat WHERE seat_id=?";

            //prepare:準備　戻り値を変数に保持
            $ps = $pdo -> prepare($sql);

            //”？”に値を設定する
            $ps->bindValue(1, $seatid, PDO::PARAM_INT); 


            //SQLの実行
            $ps->execute();

            //実行結果を配列に格納
            $result = $ps->fetchAll(PDO::FETCH_ASSOC);

            if(empty($result)){
                echo '指定したIDに該当するデータはありません。';
            }else{
                foreach($result as $row){
                    $performanceid=$row['performance_id'];
                }
            } 
            return $performanceid;
        }

        //seatidから席種idを取得
        public function getSeatValueId($seatid){
            $pdo = $this->dbConnect();
            //SQLの生成　入力を受け取る部分は”？”
            $sql = "SELECT * FROM seat WHERE seat_id=?";

            //prepare:準備　戻り値を変数に保持
            $ps = $pdo -> prepare($sql);

            //”？”に値を設定する
            $ps->bindValue(1, $seatid, PDO::PARAM_INT); 


            //SQLの実行
            $ps->execute();

            //実行結果を配列に格納
            $result = $ps->fetchAll(PDO::FETCH_ASSOC);

            if(empty($result)){
                echo '指定したIDに該当するデータはありません。';
            }else{
                foreach($result as $row){
                    $seatvalueid=$row['seat_value_id'];
                }
            } 
            return $seatvalueid;
        }

        //公演、席種を指定して残席数を取得する関数
        public function seatCheck($performanceId, $seatValueId){
            $pdo = $this->dbConnect();

            //SQLの生成　入力を受け取る部分は”？”
            $sql = "SELECT seat_value_id, count(*)
            FROM aimyon_seat
            WHERE performance_id = ?
            AND seat_value_id = ?
            AND is_reserved = false;";

            //prepare:準備　戻り値を変数に保持
            $ps = $pdo -> prepare($sql);

            //”？”に値を設定する
            $ps->bindValue(1, $performanceId, PDO::PARAM_INT); 
            $ps->bindValue(2, $seatValueId, PDO::PARAM_INT); 

            //SQLの実行
            $ps->execute();

            //実行結果を配列に格納
            $result = $ps->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($result as $row){
                $seatCount = $row['count(*)'];
            }
            return $seatCount;
        }
    }

?>