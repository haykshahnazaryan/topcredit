<?php
if(!isset($_POST['phone'])) {
    header('Location: https://topcredit.am/');
}else{
    $phon = $_POST['phone'];
    $masseg = $_POST['what'];
//echo $phone."<br>".$massege;

    $to='info@armatura-garant.ru';
    $subject='тема сообщений';
    $massege ="что интересует: ".$masseg."\r\n тел: ".$phon;

    mail ($to, $subject, $massege);

    header('Location: https://topcredit.am/');
}


?>
