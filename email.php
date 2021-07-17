<?php
require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';

$birtday = $_POST['birthday'];
$phon = $_POST['phone'];
$money = $_POST['money'];
$name = $_POST['fname'];

$title = "VERNAGIR";
$body = "
	<h2>Новое письмо</h2>
	<b>Name:</b> $name<br>
	<b>Birthday:</b> $birtday<br>
	<b>Money:</b>$money<br>
	<b>Phone:</b>$phon<br>
";

$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    //$mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
    $mail->Username   = 'armen.safs@gmail.com'; // Логин на почте
    $mail->Password   = 'Mnac4ban'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('armen.safs@gmail.com', 'Armen'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('armen.safs@gmail.com');  

    // Прикрипление файлов к письму
if (!empty($file['name'][0])) {
    for ($ct = 0; $ct < count($file['tmp_name']); $ct++) {
        $uploadfile = tempnam(sys_get_temp_dir(), sha1($file['name'][$ct]));
        $filename = $file['name'][$ct];
        if (move_uploaded_file($file['tmp_name'][$ct], $uploadfile)) {
            $mail->addAttachment($uploadfile, $filename);
            $rfile[] = "Файл $filename прикреплён";
        } else {
            $rfile[] = "Не удалось прикрепить файл $filename";
        }
    }   
}
// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;    

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);
function start()
{
	
  if (
    !isset($_POST['phone'])
  ) {
    $birtday = $_POST['birthday'];
    $phon = $_POST['phone'];
    $money = $_POST['money'];
    $name = $_POST['fname'];
    $message = "name: ".$name."\r\n birtday: ".$birtday."\r\n phone: ".$phon."\r\n money: ".$money;
    $subject = "Contact";
    

    sendMail($name, $email, $message, $subject, $date);
  } else {
    $_SESSION["mail_error"] = true;
    redirectToIndex();
  }
}

start();
?>
