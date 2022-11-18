<p>新規ユーザー登録が完了しました</p>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=webdb;charset=utf8',
'webuser','abccsd2');
$sql ="INSERT INTO  (user_mail,user_name,user_password,user_address) VALUES(?,?,?,?)";
$ps=$pdo->prepare($sql);
$ps->bindValue(1,$_POST['mail'],PDO::PARAM_STR);
$ps->bindValue(2,$_POST['name'],PDO::PARAM_STR);
$ps->bindValue(3,password_hash($_POST['passward'],PASSWORD_DEFAULT),PDO::PARAM_STR);
$ps->bindValue(4,$_POST['home'],PDO::PARAM_STR);
$ps->execute();
echo "メアド(アカウント):".$_POST['mail']<br>;
echo "氏名：".$_POST['name']<br>;
echo "住所：".$_POST['home']<br>;
?>