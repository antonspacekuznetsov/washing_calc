<?php
if (!isset($_POST['ergdf3']))
	exit();
require ('vendor/autoload.php');
include_once ('safemysql.class.php');

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.yandex.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'papafred.info@yandex.ru';                 // SMTP username
$mail->Password = '123qq123qq';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('papafred.info@yandex.ru', 'Washing calc');
$db = new SafeMySQL();
$result =$db->query("SELECT * FROM sw_cmails");
if($result)
while ($data = mysqli_fetch_assoc($result))
{
	$mail->addAddress($data['mail']);
}

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Новая заявка с сайта';
$mail->Body    = $_POST['msg'];

$mail->send();
echo "ok";

?>