<?php
// Файлы phpmailer
require 'assets/phpmailer/PHPMailer.php';
require 'assets/phpmailer/SMTP.php';
require 'assets/phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
$email = $_POST['email'];
$comment = $_POST['comment'];

if (isset($email)) {
// Формирование самого письма
$title = "Новое обращение";
$body = "
<h2>Новое обращение</h2>
<b>Почта:</b>$email<br><br>
";

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    //$mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
    $mail->Username   = 'zbaklanov2@gmail.com'; // Логин на почте
    $mail->Password   = '123654eerr8900'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('zbaklanov2@gmail.com', 'Женя Бакланов'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('zbaklanov4@gmail.com');  

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
header("Location: thankyou.php");
} elseif(isset($comment)) {
    // Формирование самого письма
$title = "Новое обращение";
$body = "
<h2>Новое обращение</h2>
<b>Коментарий:</b>$comment<br><br>
";

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    //$mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
    $mail->Username   = 'zbaklanov2@gmail.com'; // Логин на почте
    $mail->Password   = '123654eerr8900'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('zbaklanov2@gmail.com', 'Женя Бакланов'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('zbaklanov4@gmail.com');  

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
header("Location: thankyou.php");
}