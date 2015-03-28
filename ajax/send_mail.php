<?php
require '../../../../../PHPMailer-master/PHPMailerAutoload.php';

	$name = isset($_POST['name']) ? $_POST['name'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $phone = isset($_POST['phone']) ? $_POST['phone'] : "";
    $message = isset($_POST['message']) ? $_POST['message'] : "";

//Create a new PHPMailer instance
$mail = new PHPMailer;
// Set UTF-8
$mail->CharSet = 'UTF-8';
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
$mail->Host = "mail.kadmon-brin.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 26;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "info@kadmon-brin.com";
//Password to use for SMTP authentication
$mail->Password = "Kadmon2015!";
//Set who the message is to be sent from
$mail->setFrom('info@Kadmon-Brin.com', 'Kadmon Brin');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('amir@kadmon-brin.co.il', 'Amir');
$mail->addAddress('marketing@kadmon-brin.co.il', 'Marketing');
$mail->addAddress('pazaztael@gmail.com', 'Paz');
//Set the subject line
$mail->Subject = 'KadmonBrin Contact Form';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML('<html><body><br/><b>From:</b> '.$name.'<br/> <b>Email:</b> '.$email.'<br/><b>Phone:</b> '.$phone.'<br/><b>Message:</b> '.$message.'</body></html>');
//Replace the plain text body with one created manually
$mail->Body = '<html><body><br/><b>From:</b> '.$name.'<br/> <b>Email:</b> '.$email.'<br/><b>Phone:</b> '.$phone.'<br/><b>Message:</b> '.$message.'</body></html>';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
?>
