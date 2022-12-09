<?php 

    session_start();

    if(isset($_POST['artistname'])){
        $_SESSION['artistName'] = $_POST['artistname'];
        header('Location: https://localhost/TICKEPATH/WEB/searchResult.php');
    }else{
        header('Location: https://localhost/TICKEPATH/WEB/home.php');
    }

?>