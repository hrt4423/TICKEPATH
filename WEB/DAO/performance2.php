<?php

    class DAO_performance2{
        private function dbConnect(){
            //データベースに接続
            
        }
        //検索した名前を表示
        public function search($name){
            echo '"' . $name . '"';
        }
    }
    ?>