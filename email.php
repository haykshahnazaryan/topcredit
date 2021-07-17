<?php
if(!isset($_POST['phone'])) {
    header('Location: https://topcredit.am/');
}else{
    $phon = $_POST['fname'];
    $phon = $_POST['birthday'];
    $phon = $_POST['phone'];
    $phon = $_POST['money'];
    $phon = $_POST['yes'];
    $phon = $_POST['no'];
    $phon = $_POST['yes_two'];
    $masseg = $_POST['no_two'];
//echo $phone."<br>".$massege;

    $to='armen.safs@gmail.com';
    $subject='тема сообщений';
    $massege ="что интересует: ".$masseg."\r\n тел: ".$phon;

    mail ($to, $subject, $massege);

    header('Location: https://topcredit.am/');
}


?>
