<?php
session_start();
require_once '../db.php';

use PHPMailer\PHPMailer\PHPMailer;
if(isset($_POST['signin'])){

  //lấy thông tin từ các form bằng phương thức POST
      //lấy thông tin từ các form bằng phương thức POST
      $name =$_POST["fname"];
      $email =$_POST["email"];
      $password=$_POST["Pass"];
      $Password = md5($password);
      $sdt=$_POST["sdt"];
      $cmnd=$_POST["cmnd"];
      $address=$_POST["address"];

      //Kiểm tra email có đúng định dạng hay không
      if (!preg_match("/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i", $email))
      {
          echo'<script language="javascript">alert("email not Invalid . Please enter other email"); window.history.go(-1);</script>';
      exit;
      }
   
         // Kiểm tra tài khoản đã tồn tại chưa
         $sql="select name from register where name='$name'";
          $kt=mysqli_query($conn, $sql);
    if ($kt>0) {
      echo'<script language="javascript">alert("Name already exists"); window.history.go(-1);</script>';
    } else {
      $sql = "
      INSERT INTO register(name, email, password,phone,CMND,adress) VALUES
      ( '$name', '$email','$Password','$sdt','$cmnd','$address')
      ";  
       // thực thi câu $sql với biến conn lấy từ file connection.php
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['email'] = $_POST['mail'];
        $_SESSION['password'] = $_POST['pass'];
        $_SESSION['code'] = mt_rand(10000, 70000);
        $name = $_SESSION['name'];
        $code = $_SESSION['code'];
        $email = $_SESSION['email'];
        require_once "supportEmail/PHPMailer.php";
        require_once "supportEmail/SMTP.php";
        require_once "supportEmail/Exception.php";

        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        $mail->CharSet = "utf-8";
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = 'thunguyen.dn2021@gmail.com'; // Gmail address which you want to use as SMTP server
        $mail->Password = 'happyteam21'; // Gmail address Password
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($email);
        $mail->addAddress("$email"); //enter you email address
        // $mail->Subject = ("$subject");
        $mail->Body = " <h3> Chào mừng bạn $name đã đến với khách sạn chúng tôi <br> $ <br>Email : $email <br> Code : $code </h3>";

        if ($mail->send()) {
            // $status = " ";
            // $response = " ";
            echo'<script language="javascript">alert("You are suscessfully")'; 
           // header("location:http://localhost/project/code.php"); // chuyển tới một trang để nhập code
        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }
        exit(json_encode(array("status" => $status, "response" => $response)));
    }
}
        /// kiểm tra email