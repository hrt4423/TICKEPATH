<?php

    class DAO_performance2{
        private function dbConnect(){
            //データベースに接続
            $pdo = new PDO('mysql:host=localhost; dbname=webdb; charset=utf8',
                            'webuser', 'abccsd2');
            return $pdo;
        }

        //公演の情報を全て配列に入れて返す関数, 引数：performance_id
        public function getPerformanceTblByid($id){
            $pdo = $this -> dbConnect();

            //SQLの生成　入力を受け取る部分は”？”
            $sql = "SELECT * FROM performance WHERE performance_id=?";

            //prepare:準備　戻り値を変数に保持
            $ps = $pdo -> prepare($sql);

            //”？”に値を設定する。
            $ps->bindValue(1, $id, PDO::PARAM_INT); 

            //SQLの実行
            $ps->execute();
            $result = $ps->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }

        //公演の情報を全て配列に入れて返す関数, 引数：performance_id
        public function getPerformanceTblByname($name){
            $pdo = $this -> dbConnect();

            //SQLの生成　入力を受け取る部分は”？”
            $sql = "SELECT * FROM performance WHERE artist_name=?";

            //prepare:準備　戻り値を変数に保持
            $ps = $pdo -> prepare($sql);

            //”？”に値を設定する。
            $ps->bindValue(1, $name, PDO::PARAM_STR); 

            //SQLの実行
            $ps->execute();
            $result = $ps->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }

        //検索した名前を表示
        public function search($name){
            echo '"' . $name . '"';
        }

        //公演名を出力する関数, 引数：performance_id
        public function outPutperformanceName($id){
            $result = $this->getPerformanceTblByid($id);
            
            if(empty($result)){
                echo '指定したIDに該当するデータはありません。';
            }else{
                foreach($result as $row){
                    $performanceName=$row['performance_name'];
                }
            } 
            echo $performanceName;
        }

        public function outPutperformanceName2($id){
            $result = $this->getPerformanceTblByid($id);

            echo $result['performance_name'];
        }
        
        //公演日を出力する関数, 引数：performance_id
        public function outPutDate($id){
            $result = $this->getPerformanceTblByid($id);
            
            if(empty($result)){
                echo '指定したIDに該当するデータはありません。';
            }else{
                foreach($result as $row){
                    $date=$row['performance_date'];
                }
            } 
            echo date('Y/m/d', strtotime($date));
        }
        
        //アーティスト名を出力する関数, 引数：performance_id
        public function outPutArtist($id){
            $result = $this->getPerformanceTblByid($id);

            if(empty($result)){
                echo '指定したIDに該当するデータはありません。';
            }else{
                foreach($result as $row){
                    $artist=$row['artist_name'];
                }
            } 
            echo $artist;
        }

        //会場を出力する関数, 引数：performance_id
        public function outPutPlace($id){
            $result = $this->getPerformanceTblByid($id);

            if(empty($result)){
                echo '指定したIDに該当するデータはありません。';
            }else{
                foreach($result as $row){
                    $place=$row['place'];
                }
            } 
            echo $place;
        }

        //開演時間を出力する関数, 引数：performance_id
        public function outPutStartTime($id){
            $result = $this->getPerformanceTblByid($id);

            if(empty($result)){
                echo '指定したIDに該当するデータはありません。';
            }else{
                foreach($result as $row){
                    $startTime=$row['start_time'];
                }
            } 
            echo date('H:i', strtotime($startTime));
        }

        //開場時間を出力する関数, 引数：performance_id
        public function outPutOpenTime($id){
            $result = $this->getPerformanceTblByid($id);

            if(empty($result)){
                echo '指定したIDに該当するデータはありません。';
            }else{
                foreach($result as $row){
                    $openTime=$row['open_time'];
                }
            } 
            echo date('H:i', strtotime($openTime));
        }

        //検索件数
        public function performanceCount($id){
            $pdo = $this -> dbConnect();

            //SQLの生成　入力を受け取る部分は”？”
            $sql = "SELECT * FROM performance WHERE artist_name=?";

            //prepare:準備　戻り値を変数に保持
            $ps = $pdo -> prepare($sql);

            //”？”に値を設定する。
            $ps->bindValue(1, $id, PDO::PARAM_STR); 

            //SQLの実行
            $ps->execute();
            $count = $ps -> rowCount();

            return $count;
        }
    }
    ?>