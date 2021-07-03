<?php

//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer ;
use PHPMailer\PHPMailer\SMTP ;
use PHPMailer\PHPMailer\Exception ;

// require '../vendor/autoload.php' ;

if ( ! permissions_has_permission($u_rol , $c , "read") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false ;
$type = (isset($_REQUEST["type"])) ? clean($_REQUEST["type"]) : false ;
$message = (isset($_REQUEST["message"])) ? clean($_REQUEST["message"]) : false ;
$message = nl2br($message); 


$error = array() ;

################################################################################
if ( ! $id ) {
    array_push($error , "ID Don't send") ;
}
################################################################################
if ( ! expenses_is_id($id) ) {
    array_push($error , 'ID format error') ;
}
################################################################################
if ( ! expenses_field_id("id" , $id) ) {
    array_push($error , "Invoice id not exist") ;
}




if ( ! $error ) {

    $expenses = expenses_details($id) ;
    $addresses_billing = json_decode($expenses['addresses_billing'] , true) ;
    $addresses_delivery = json_decode($expenses['addresses_delivery'] , true) ;

    
    $email_Subject = "$config_company_name" ;
    $email_reciver = "robincoello@hotmail.com"; 
    $email_reciver_name = "robin"; 
    $email_Body = $message ;
    $email_AltBody = $message ;




// Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true) ;

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER ;                      // Enable verbose debug output
        $mail->isSMTP() ;                                            // Send using SMTP
        $mail->Host = $config_mail_host ;                    // Set the SMTP server to send through
        $mail->SMTPAuth = true ;                                   // Enable SMTP authentication
        $mail->Username = $config_mail_username ;                     // SMTP username
        $mail->Password = $config_mail_password ;                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS ;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port = 587 ;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        //Recipients
        $mail->setFrom($config_company_email , $config_company_name) ;
        $mail->addAddress($email_reciver , $email_reciver_name) ;     // Add a recipient
        //$mail->addAddress('rc@factux.com') ;               // Name is optional
        $mail->addReplyTo($config_company_email , $config_company_name) ; // responder a 
        $mail->addBCC('test@factux.com') ;
        //$mail->addBCC('bcc@example.com');
        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        // Content
        $mail->isHTML(true) ;                                  // Set email format to HTML
        $mail->Subject = $email_Subject ;
        $mail->Body = $email_Body ;
        $mail->AltBody = $email_AltBody ;

        $mail->send() ;
        echo 'Message has been sent' ;
    } catch ( Exception $e ) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}" ;
    }


//
//
//    switch ( $type ) {
//        case "nv":
//            include view("expenses" , "export_pdf_noValued") ;
//            break ;
//
//        default:
//            include view("expenses" , "export_pdf") ;
//            break ;
//    }
//    
} else {

    include view("home" , "pageError") ;
}
