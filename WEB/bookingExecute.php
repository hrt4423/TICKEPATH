<?php 
    //予約処理

    session_start();
    require_once './DAO/booking.php';
    require_once './DAO/seat.php';
    require_once './DAO/booking_detail.php';
    require_once './DAO/client.php';
    $daoBooking = new DAO_booking();
    $daoSeat = new DAO_seat();
    $daoBookingDetail = new DAO_booking_detail();
    $daoClient = new DAO_client();
    

    //予約テーブルに登録、登録したレコードのIDを取得
    $_SESSION['bookingId'] =  $daoBooking->addBooking($_SESSION['clientId']);
    $lastInsertBookingId = $_SESSION['bookingId'];
    

    //指定した公演・席種の空席を取得
    $vacantSeatIds = array();
    $vacantSeatIds = $daoSeat->getVacantSeat($_SESSION['performanceId'], $_SESSION['seatValueId']);

    $cnt = 0;
    foreach($vacantSeatIds as $vacantSeatId){
        //席を予約
        $daoSeat->reserveSeat($vacantSeatId); 
        //予約明細を登録
        $daoBookingDetail->addBookingDetail($daoClient->getFamilyName($_SESSION['clientId']),
            $daoClient->getFirstName($_SESSION['clientId']),
            $lastInsertBookingId, $vacantSeatId);
        $cnt++;
        if($cnt >= $_SESSION['ticketNum'])
        break;
    }

    header('Location: https://localhost/TICKEPATH/WEB/bookingComplete.php');
?>