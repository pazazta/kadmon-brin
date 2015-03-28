<?php
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $phone = isset($_POST['phone']) ? $_POST['phone'] : "";
    $message = isset($_POST['message']) ? $_POST['message'] : "";

   // $to = 'amir@kadmon-brin.co.il,marketing@kadmon-brin.co.il';
	$to = 'pazaztael@gmail.com,paze@aspireglobal.com';
    $subject = 'KadmonBrin Contact Form';
    $headers = 'From: info@kadmon-brin.co.il' . "\r\n". "CC: pazaltachen@gmail.com";
    $headers .= "MIME-Version: 1.0\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";
    $message = '<html><body><br/><b>From:</b> '.$name.'<br/> <b>Email:</b> '.$email.'<br/><b>Phone:</b> '.$phone.'<br/><b>Message:</b> '.$message.'</body></html>';
    mail($to, $subject, $message, $headers); //This method sends the mail.

?>