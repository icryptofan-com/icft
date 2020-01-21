<?php

/* Задаем переменные */
$name = htmlspecialchars($_POST["name"]);
$email = htmlspecialchars($_POST["email"]);
$subj = htmlspecialchars($_POST["subject"]);
$message = htmlspecialchars($_POST["message"]);

/* Ваш адрес и тема сообщения */
$address = "info@icft.eu";
$addressLs = "novikov.v.s@gmail.com";
$sub = "Сообщение с ICFt.eu";

/* Формат письма */
$mes = "Сообщение с icft.eu\n
Имя отправителя: $name
Электронный адрес отправителя: $email
Тема: $subj
Текст сообщения: $message";


if (empty($bezspama)) /* Оценка поля bezspama - должно быть пустым*/
{
/* Отправляем сообщение, используя mail() функцию */
$from  = "From: $name <$email> \r\n Reply-To: $email \r\n";
if (mail($address, $sub, $mes, $from) || mail($addressLs, $sub, $mes, $from)) {
	header('Refresh: 1; URL=http://icft.eu');
	echo '<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>The letter is sent, after 5 seconds you will return to icft.eu</body>';}
else {
	header('Refresh: 3; URL=http://icft.eu');
	echo '<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>The letter is NOT sent, after 5 seconds you will return to icft.eu</body>';}
}
exit; /* Выход без сообщения, если поле bezspama заполнено спам ботами */
?>