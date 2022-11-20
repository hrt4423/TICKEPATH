<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>seatCheck</title>
</head>
<body>
    <?php
        require_once './DAO/seat.php';
        require_once './DAO/seat_value.php';
        $daoSeat = new DAO_seat();
        $daoSeatValue = new DAO_seat_value();

        //公演IDを設定
        $performanceId = 1; //aimyon    

        //設定した公演の席種をすべて取得
        $seatValueIds = array();
        $seatValueIds = $daoSeat->getSeatValueIdsByPerformanceId($performanceId);
        
        //席種ごとの残席数を表示
        foreach($seatValueIds as $seatValueId){
            echo $daoSeatValue->outputSeatName($seatValueId),'：',
                $daoSeat->seatCheck($performanceId, $seatValueId),'席<br>';

        }
        
        

    ?>
    
</body>
</html>