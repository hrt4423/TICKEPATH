<?php
$to = "2101017@.asojuku.ac.jp";
$subject = "TEST MAIL";
$message = "Hello!\r\nThis is TEST MAIL.";
$headers = "From: 2101385@s.asojuku.ac.jp";
 
mail($to, $subject, $message, $headers);
?>