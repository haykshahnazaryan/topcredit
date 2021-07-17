<?php
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
        $massege ="name: ".$name."\r\n birtday: ".$birtday."\r\n phone: ".$phon."\r\n money: ".$money;

        mail ($to, $subject, $massege);

        header('Location: https://topcredit.am/');
    }
?>
