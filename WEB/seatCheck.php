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
    try{
        $timeStamp = time();
        $currentDate = date("Y-m-d H:i:s", $timeStamp);
        echo $currentDate;
    }catch(Exception $ex){
        echo $ex->getMessage();
    }catch(Error $err){
        echo $err->getMessage();
    }
    ?>
    
</body>
</html>