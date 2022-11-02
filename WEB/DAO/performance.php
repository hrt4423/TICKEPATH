<?php

    class DAO_performance{
        private function dbConnect(){
            //データベースに接続
            $pdo = new PDO('mysql:host=localhost; dbname=webdb; charset=utf8',
                            'webuser', 'abccsd2');
            return $pdo;
        }

        public function getPerformanceTblByid($id){
            $pdo = $this -> dbConnect();

            //SQLの生成　入力を受け取る部分は”？”
            $sql = "SELECT * FROM performance WHERE performance_id=?";

            //prepare:準備　戻り値を変数に保持
            $ps = $pdo -> prepare($sql);

            //”？”に値を設定する。
            $ps->bindValue(1, $id, PDO::PARAM_STR); 

            //SQLの実行
            $ps->execute();
            $result = $ps->fetchAll(PDO::FETCH_ASSOC);

            return $result;
            
        }

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

        public function getImagePath($id){
            $result = $this->getPerformanceTblByid($id);

            if(empty($result)){
                echo '指定したIDに該当するデータはありません。';
            }else{
                foreach($result as $row){
                    $imagePath=$row['image_path'];
                }
            } 
            echo $imagePath;
        }
    }
?>


