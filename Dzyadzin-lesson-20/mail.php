<?php
	//Принимаем постовые данные
	$username=$_POST['username'];
	$email=$_POST['email'];
	$whatever=$_POST['whatever'];
	$user_message=$_POST['user_message'];
	//Тут указываем на какой ящик посылать письмо
	$to = "975349@mail.ru";
	//Далее идет тема и само сообщение
	// Тема письма
	$subject = "Заявка с сайта site.sl";
	// Сообщение письма
	$message = "
	Форма: ".htmlspecialchars($whatever)."<br />
	Имя пользователя: ".htmlspecialchars($username)."<br />
	Майл: <a href='mailto:$email'>".htmlspecialchars($email)."</a><br>
	Сообщение: ".htmlspecialchars($user_message);
	
	// Отправляем письмо при помощи функции mail();
	$headers = "From: site.sl <mail@site.sl>\r\nContent-type: text/html; charset=UTF-8 \r\n";
	mail ($to, $subject, $message, $headers);
	// Перенаправляем человека на страницу благодарности и завершаем скрипт
	header('Location: thanks.html');
	exit();
?>