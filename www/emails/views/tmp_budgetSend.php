<?php 

include "includes/PHPMailer-master/src/Exception.php" ; // debe estar en la primera linea
include "includes/PHPMailer-master/src/PHPMailer.php" ;
include "includes/PHPMailer-master/src/SMTP.php" ;

use PHPMailer\PHPMailer\Exception; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\POP3;

//Import the PHPMailer class into the global namespace
//use PHPMailer\PHPMailer\PHPMailer;

//require '../vendor/autoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
// Set PHPMailer to use the sendmail transport
$mail->isSendmail();
//Set who the message is to be sent from
$mail->setFrom($config_company_email, $config_company_name);
//Set an alternative reply-to address
$mail->addReplyTo($config_company_email_secure, $config_company_name);
//Set who the message is to be sent to
$mail->addAddress("$reciver_email", $reciver);
//Set the subject line
$mail->Subject = "$config_company_name Forget password";
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents("www_extended/default/emails/templates/defecto/lostPassword.php"), __DIR__);
$mail->msgHTML("

<p>Hello $reciver_name $reciver_lastname</p>
<p>".
_tr('Here you are the budget')
."</p>
<p>
<a href=$config_company_url/index.php?c=home&a=updatePassword&code=$code&email=$reciver_email>$config_company_url/index.php?c=home&a=updatePassword&code=$code&email=$reciver_email</a>
</p> 
<p>"._tr('with the following code').":</p>
$code
<p>$config_company_name</p>
");
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
  //  echo 'Mailer Error: '. $mail->ErrorInfo;
} else {
   // echo 'Message sent!';
}
    
    
   