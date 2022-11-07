<?php
class DAO_history{
    private function dbConnect(){
        $pdo = new PDO('mysql:host=localhost; dbname=webdb; charset=utf8',
                        'webuser', 'abccsd2');
        return  $pdo;
    }

    public function getHistoryTblById($id){
        $pdo = $this->dbConnect();

        $sql = "SELECT performance_id FROM history WHERE client_id = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $id, PDO::PARAM_INT);
        
        $ps->execute();
        $result = $ps->fetchAll();

        return $result;
    }
}
?>