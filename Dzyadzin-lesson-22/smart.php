<?php 
	$username=$_POST['username'];
	$email=$_POST['email'];
	$whatever=$_POST['whatever'];
	$user_message=$_POST['user_message'];
require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = '50-22-30@mail.ru';                 // SMTP username
$mail->Password = 'sekufgYTDY0547d';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('50-22-30@mail.ru', '50-5-22-30');
$mail->addAddress('975349@mail.ru', '975349');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка с сайта site.sl - 2';
$mail->Body    = "
	Форма: ".htmlspecialchars($whatever)."<br />
	Имя пользователя: ".htmlspecialchars($username)."<br />
	Майл: <a href='mailto:$email'>".htmlspecialchars($email)."</a><br>
	Сообщение: ".htmlspecialchars($user_message);
	
$mail->AltBody = "
	Форма: ".htmlspecialchars($whatever).",
	Имя пользователя: ".htmlspecialchars($username).",
	Майл: ".htmlspecialchars($email).",
	Сообщение: ".htmlspecialchars($user_message);
	

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    header('Location: thanks.html');
}

?>