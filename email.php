<?php
// if(isset($_POST['phone'])) {
//     echo $_POST['phone'];
// }
//     if(!isset($_POST['phone'])) {
//         header('Location: https://topcredit.am/');
//     } else {
//         $name = $_POST['fname'];
//         $birtday = $_POST['birthday'];
//         $phon = $_POST['phone'];
//         $money = $_POST['money'];
//         //echo $phone."<br>".$massege;

//         $to='armen.safs@gmail.com';
//         $subject='тема сообщений';
//         $body ="name: ".$name."\r\n birtday: ".$birtday."\r\n phone: ".$phon."\r\n money: ".$money;

//         mail ($to, $subject, $massege);

//         header('Location: https://topcredit.am/');
//     }
?>


<?php

session_start();
error_reporting(E_ALL);
date_default_timezone_set("America/Sao_Paulo");

require_once("PHPMailer.php");
require_once("SMTP.php");
require_once("Exception.php");

use PHPMailer\PHPMailer\PHPMailer;

function redirectToIndex()
{
  header("Location: ./index.php");
  exit;
}

function sendMail($name, $email, $message, $subject, $date)
{

 
  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->Mailer = "smtp";
  $mail->SMTPDebug  = 1;  
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = "tls";
  $mail->Username = armen.safs@gmail.com;
  $mail->Password = Mnac4ban;
  $mail->Port = 587;

  $mail->setFrom($myemail, $name);
  $mail->addReplyTo($email, $name);
  $mail->addAddress($myemail);

  $mail->isHTML(true);
  $mail->Subject = $subject;
  $mail->Body = "<b>Name:</b> {$name}<br><b>Email:</b> {$email}<br><br><b>Message:</b><br><br>
    {$message}<br><br><b>Date:</b> {$date}";

  if ($mail->send()) {
    $_SESSION["mail_success"] = true;
  } else {
    $_SESSION["mail_error"] = true;
  }

  redirectToIndex();
}


function start()
{
	
  if (
    !isset($_POST['phone'])
  ) {
$birtday = $_POST['birthday'];
        $phon = $_POST['phone'];
        $money = $_POST['money'];
	  
    $name = $_POST['fname'];
    $email = "esa";
    $message = "name: ".$name."\r\n birtday: ".$birtday."\r\n phone: ".$phon."\r\n money: ".$money;
    $subject = "Contact";
    $date = $birtday;

    sendMail($name, $email, $message, $subject, $date);
  } else {
    $_SESSION["mail_error"] = true;
    redirectToIndex();
  }
}

start();
?>
