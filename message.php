<?php   

date_default_timezone_set('Etc/UTC');
require 'PHPMailer-master/PHPMailerAutoload.php';

$nome = $_POST["name"];
$email = $_POST["email"];
$assunto = $_POST["subject"];
$mensagem = $_POST["message"];
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "luiswbastos@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "#ZIGso172";
//Set who the message is to be sent from
$mail->setFrom($email, $nome);
//Set who the message is to be sent to
$mail->addAddress('luiswagner8@gmail.com', 'Luis Wagner');
//Set the subject line
$mail->Subject = $assunto;
//Replace the plain text body with one created manually
$mail->Body = $mensagem;
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    header('Location: index.html');
}

?>