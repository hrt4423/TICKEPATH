<?php
    class DAO_favorite{
        //データベースに接続する関数
        private function dbConnect(){
            //データベースに接続
            $pdo = new PDO('mysql:host=localhost; dbname=webdb; charset=utf8',
                            'webuser', 'abccsd2');
            return $pdo;
        }

        //client_idからartist_idを検索する関数, 戻り値：artist_id 配列
        public function getBookingIdByClientId($clientId){
            $pdo = $this -> dbConnect();

            //SQLの生成　入力を受け取る部分は”？”
            $sql = "SELECT * FROM favorite WHERE client_id=?";

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
                    $artistIds[]=$row['artist_id'];
                }
            } 
            
            return $artistIds;
        }

        public function insertFavoriteArtist($cid, $aid){
            $pdo = $this -> dbConnect();

            $sql = "INSERT INTO favorite(client_id, artist_id) VALUES(?, ?)";

            $ps = $pdo -> prepare($sql);

            $ps->bindValue(1, $cid, PDO::PARAM_INT);
            $ps->bindValue(2, $aid, PDO::PARAM_INT);

            $ps->execute();
        }

        public function checkDuplication($cid, $aid){
            $pdo = $this -> dbConnect();

            $sql = "SELECT COUNT(*) AS cnt FROM favorite WHERE client_id = ? AND artist_id = ?";

            $ps = $pdo -> prepare($sql);

            $ps->bindValue(1, $cid, PDO::PARAM_INT);
            $ps->bindValue(2, $aid, PDO::PARAM_INT);

            $ps->execute();
        }
    }
?>