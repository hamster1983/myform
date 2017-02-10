<?php
header('Content-Type: text/html; charset=utf-8');
require_once('my_db.php');

//данные пользователя из формы
$name = strip_tags($_POST['name']);
$tel = strip_tags($_POST['tel']);
$email = strip_tags($_POST['email']);
$note = strip_tags($_POST['text']);

$time_reg = strtotime('now'); //время регистрации
$user_ip = $_SERVER['REMOTE_ADDR']; //ip пользователя

$checkip = new CheckIP();
$adddata = new AddData();

$user_time = $checkip->getTime($user_ip);
$result = $checkip->timeOut($time_reg, $user_time);

if($result) {
	echo "<b style=\"color: red\">Повторная регистрация с вашего IP будет доступна через ".$result." минут</b>";
}
else if((!$result)&&($name)&&($tel)&&($email)) {
	$adddata->addInfo($name, $tel, $email, $note, $time_reg, $user_ip);
    echo "<b style=\"color: green\">Регистрация прошла успешно</b>";
}
else {
	echo "<b style=\"color: red\">Зарегистрироваться не удалось</b>";
}