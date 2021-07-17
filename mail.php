<?php
// if(isset($_POST['phone'])) {
//     echo $_POST['phone'];
// }
    if(!isset($_POST['phone'])) {
        header('Location: https://topcredit.am/');
    } else {
        $name = $_POST['fname'];
        $birtday = $_POST['birthday'];
        $phon = $_POST['phone'];
        $money = $_POST['money'];
        //echo $phone."<br>".$massege;

        $to='armen.safs@gmail.com';
        $subject='тема сообщений';
        $body ="name: ".$name."\r\n birtday: ".$birtday."\r\n phone: ".$phon."\r\n money: ".$money;

//         mail ($to, $subject, $massege);

//         header('Location: https://topcredit.am/');
    }
?>


<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once "PHPMailer/PHPMailer.php";
include_once "PHPMailer/Exception.php";
include_once "PHPMailer/SMTP.php";

function send_mail($to,$subject,$body){
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function


$mail = new PHPMailer(true);                                 // Passing `true` enables exceptions

    //Server settings
    $mail->SMTPDebug = 0;                                     // Enable verbose debug output
    $mail->isSMTP();                                         // Set mailer to use SMTP
    $mail->Host = 'www.gmail.com';                       	// Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                                // Enable SMTP authentication
    $mail->Username = 'armen.safs@gmail.com';               // SMTP username
    $mail->Password = 'Mnac4ban';                              // SMTP password
    $mail->SMTPSecure = 'tls';                          // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                 // TCP port to connect to

    //Recipients
    $mail->setFrom('armen.safs@gmail.com', 'Armen');				//SET "FROM" EMAIL AND NAME. 
	// IT SHOULD BE LIKE THIS, $mail->setFrom('info@hackerrahul.com', 'HackerRahul');
    
	
	$mail->addAddress($to);            							// Add a recipient

    //Content
    $mail->isHTML(true);                                      // Set email format to HTML
    $mail->Subject = $subject;								 // Subject of the Email
    $mail->Body    = $body;									// Body of the Email

   if($mail->send()){
    $response = '1';
    }else{
    $response = '0';
    }
    return $response;
}


?>
