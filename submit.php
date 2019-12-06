<?php
 
/* Задаем переменные */
$name = htmlspecialchars($_POST["name"]);
$email = htmlspecialchars($_POST["email"]);
$subj = htmlspecialchars($_POST["subject"]);
$message = htmlspecialchars($_POST["message"]);
 
/* Ваш адрес и тема сообщения */
$address = "selo.moloko@gmail.com";
$sub = "Сообщение с ICFt.eu";
 
/* Формат письма */
$mes = "Сообщение с icft.eu\n
Имя отправителя: $name 
Электронный адрес отправителя: $email
Тема: $subj
Текст сообщения: $massage";
 
 
if (empty($bezspama)) /* Оценка поля bezspama - должно быть пустым*/
{
/* Отправляем сообщение, используя mail() функцию */
$from  = "From: $name <$email> \r\n Reply-To: $email \r\n";
if (mail($address, $sub, $mes, $from)) {
	header('Refresh: 1; URL=http://icft.eu');
	echo '<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>Письмо отправлено, через 5 секунд вы вернетесь на icft.eu</body>';}
else {
	header('Refresh: 3; URL=http://icft.eu');
	echo '<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>Письмо НЕ отправлено, через 5 секунд вы вернетесь на icft.eu</body>';}
}
exit; /* Выход без сообщения, если поле bezspama заполнено спам ботами */
?>