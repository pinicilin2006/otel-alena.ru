<?php
foreach($_POST as $key => $val){
	if(empty($val)){
		continue;
	}
	$$key = mysql_escape_string($val);
	//echo $key."<br>";
}
if(!$email && !$phone){
	echo 'Укажите номер телефона или email';
	exit();
}
if(!$message){
	echo 'Отсутствует текст сообщения';
	exit();
}
$to      = 'otel-alena@yandex.ru';
$subject = 'Обращение с сайта';
$message = 'Текстовое сообщение с сайта: "'.$message.'". Номер телефон:'.$phone.'. Email:'.$email.'. Имя:'.$name;
$headers = 'From: site@otel-alena.ru' . "\r\n" .
    'Reply-To: site@otel-alena.ru' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message, $headers)){
	echo 'Сообщение успешно отправлено!';
}
?>
