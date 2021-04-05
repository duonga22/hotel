<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'Exception.php';
require_once 'PHPMailer.php';
require_once 'SMTP.php';
$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['signin'])){
  $email = $_POST['email'];
  $name = $_POST['fname'];
  $_SESSION['so'] = mt_rand(1000,6000);  
  $body = $_SESSION['so'];
  try{
    
    $mail->isSMTP();
    $mail->Host = 'localhost';
    $mail->SMTPAuth = true;
    $mail->Username = 'hothithuou2001@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'XH12345@nai'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 25;
    
    $mail->setFrom('hothithuou2001@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress($email); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
    
    $mail->isHTML(true);
    $mail->Subject = 'You have successfully registered ';
    $mail->Body = "<h3>Than".$name."for coming to our hotel<br>Email:".$email."<br> Mã xác nhận của bạn là:".$body;
    
    if($mail->send()){
      //echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="dangki.php";</script>';
      echo "haha";
      header('Location:./dangki.php'); 
    }
    else{
       echo "huhu";
    }
  } catch (Exception $e){
    echo '<script language="javascript">alert("Đăng ký khoong thành công!"); window.location="./dangki.php";</script>';
    echo "haha";
  }
}
?>