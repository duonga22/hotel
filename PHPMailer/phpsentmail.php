<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'PHPMailer/Exception.php';
require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'thunguyen.dn2021@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'happyteam21'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('thunguyen.dn2021@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress($email); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Your order is submitted successfully.';
    $mail->Body = '
    <h3  style="color:#00004d;">Thank you for your order. Your order is below:</h3>
    
    <table style="border-collapse: collapse; font-family: Arial, Helvetica, sans-serif; border: 1px solid #ddd;width: 80%"; text-align:center; >
      <tr>
        <th  style=" padding: 12px ;border-collapse: collapse;border: 1px solid #ddd; background-color: #4CAF50;color: white;text-align:center;"><strong>DESCRIPTION</th>
        <th style=" padding: 12px ;border-collapse: collapse;border: 1px solid #ddd;background-color: #4CAF50;color: white;text-align:center;">INFORMATION</th></strong>
  
      </tr>
      <tr >
        <td style=" padding: 8px;border-collapse: collapse;border: 1px solid #ddd;text-align:left;">Name</t>
        <td style=" padding: 8px;border-collapse: collapse;border: 1px solid #ddd;text-align:left;">'."$title"." $fname"." $lname".'</td>
  
      </tr>
      
      
      <tr >
        <td style=" padding: 8px;border-collapse: collapse;border: 1px solid #ddd;text-align:left;">Phone No </td>
        <td style=" padding: 8px;border-collapse: collapse;border: 1px solid #ddd;text-align:left;">'."$Phone".'</td>
  
      </tr>
      <tr >
        <td style=" padding: 8px;border-collapse: collapse;border: 1px solid #ddd;text-align:left;">Type Of the Room </td>
        <td style=" padding: 8px;border-collapse: collapse;border: 1px solid #ddd;text-align:left;">'."$troom".'</td>
  
      </tr>
      <tr >
        <td style=" padding: 8px;border-collapse: collapse;border: 1px solid #ddd;text-align:left;">No Of the Room </td>
        <td style=" padding: 8px;border-collapse: collapse;border: 1px solid #ddd;text-align:left;">'."$nroom".'</td>
  
      </tr>
      <tr>
        <td style=" padding: 8px;border-collapse: collapse;border: 1px solid #ddd;text-align:left;">Meal Plan </td>
        <td style=" padding: 8px;border-collapse: collapse;border: 1px solid #ddd;text-align:left;">'."$meal".'</td>
  
      </tr>
      <tr >
        <td style=" padding: 8px;border-collapse: collapse;border: 1px solid #ddd;text-align:left;">Bedding </td>
        <td style=" padding: 8px;border-collapse: collapse;border: 1px solid #ddd;text-align:left;">'."$bed".'</td>
  
      </tr>
      <tr >
        <td style=" padding: 8px;border-collapse: collapse;border: 1px solid #ddd;text-align:left;">Check-in Date </td>
        <td style=" padding: 8px;border-collapse: collapse;border: 1px solid #ddd;text-align:left;">'."$cin".'</td>
  
      </tr>
      <tr >
        <td style=" padding: 8px;border-collapse: collapse;border: 1px solid #ddd;text-align:left;">Check-out Date</td>
        <td style=" padding: 8px;border-collapse: collapse;border: 1px solid #ddd;text-align:left;">'."$cout".'</td>
  
      </tr>
      <tr >
        <td style=" padding: 8px;border-collapse: collapse;border: 1px solid #ddd;text-align:left;">No of days</td>
        <td style=" padding: 8px;border-collapse: collapse;border: 1px solid #ddd;text-align:left;">'."$days".'</td>
  
      </tr>
      <tr >
        <td style=" padding: 8px;border-collapse: collapse;border: 1px solid #ddd; color:red;text-align:center;">Total</td>
        <td style=" padding: 8px;border-collapse: collapse;border: 1px solid #ddd;text-align:left;">'."$fintot".'</td>
  
      </tr>
    
    </table>
  
  ';


  if($mail->send()){
    echo '<script>Xác nhận đơn hàng đã được gửi về gmail của khách.</script>';
  }else{
    echo '<script>Mail xác nhận không được gửi đi.</script>';
  }


  
?>