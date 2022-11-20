<p>新規ユーザー登録が完了しました</p>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=webdb;charset=utf8','webuser','abccsd2');
$sql ="INSERT INTO client(client_password,family_name,first_name,gender,email_address,mobile_phone_number,post_code,prefecture,city,address,Room_number)
       VALUES(?,?,?,?,?,?,?,?,?,?,?)";
$ps=$pdo->prepare($sql);
$ps->bindValue(1,password_hash($_POST['password'],PASSWORD_DEFAULT),PDO::PARAM_STR);
$ps->bindValue(2,$_POST['familyname'],PDO::PARAM_STR);
$ps->bindValue(3,$_POST['firstname'],PDO::PARAM_STR);
$ps->bindValue(4,$_POST['gender'],PDO::PARAM_STR);
$ps->bindValue(5,$_POST['e-address'],PDO::PARAM_STR);
$ps->bindValue(6,$_POST['phonenumber'],PDO::PARAM_STR);
$ps->bindValue(7,$_POST['PostCode'],PDO::PARAM_STR);
$ps->bindValue(8,$_POST['Ken'],PDO::PARAM_STR);
$ps->bindValue(9,$_POST['City'],PDO::PARAM_STR);
$ps->bindValue(10,$_POST['AddressNumber'],PDO::PARAM_STR);
$ps->bindValue(11,$_POST['HomeNumber'],PDO::PARAM_STR);
$ps->execute();
?>