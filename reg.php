<?php
$name=stripslashes($_POST["name"]);
$email=stripslashes($_POST["email"]);
$message=stripslashes($_POST["message"]);
$secret="6LeEkTwUAAAAAFdf4_JNzVki3umbbbXexmaWF0Oj";
$response=$_POST["captcha"];

$verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
$captcha_success=json_decode($verify);
if ($captcha_success->success==false) {
 print "gagal nih";

}
else if ($captcha_success->success==true) {
   print "suskes captcha bossss hehe";

}


?>