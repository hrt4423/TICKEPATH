<?php

    class DAO_Performance{
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
    }
?>


