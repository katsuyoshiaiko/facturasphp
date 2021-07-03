<?php
/**
 *Test conection 
 * https://stackoverflow.com/questions/3675897/how-to-check-by-php-if-my-script-is-connecting-to-smtp-server
 * 
##----------------------------------------------------------------------
        $email_Subject = "$config_company_name Invoice" ;
        //$reciver_email = ""; 
        // $reciver_name $reciver_lastname
        $email_Body = $message ;
        $email_AltBody = '$email_AltBody' ;
##----------------------------------------------------------------------
        
        include controller("emails", "send_email_file") ;
 * 
 * 
 */

//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer ;
use PHPMailer\PHPMailer\SMTP ;
use PHPMailer\PHPMailer\Exception ;




// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true) ;

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER ;                   // Enable verbose debug output
    $mail->isSMTP() ;                                           // Send using SMTP
    $mail->Host = $config_mail_host ;                           // Set the SMTP server to send through
    $mail->SMTPAuth = true ;                                    // Enable SMTP authentication
    $mail->Username = $config_mail_username ;                   // SMTP username
    $mail->Password = $config_mail_password ;                   // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS ;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port = 587 ; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    //Recipients
    $mail->setFrom($config_company_email , $config_company_name) ;
    $mail->addAddress($reciver_email , "$reciver_name $reciver_lastname") ;     // Add a recipient
    //$mail->addAddress('rc@factux.com') ;               // Name is optional
    $mail->addReplyTo($config_company_email , $config_company_name) ; // responder a 
    
    // siempre envio al email de seguridad
    if($config_company_email_secure){
        $mail->addBCC($config_company_email_secure) ;
    }        
    // Carbon copy
    if($email_cc){
        $mail->addBCC($email_cc);
    } 
    // Carbon copy To Me
    if($email_cc2m){
        $mail->addBCC($email_cc2m);
    }     
    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    // Content
    $mail->isHTML(true) ;                                  // Set email format to HTML
    $mail->Subject = $email_Subject ;
    $mail->Body = $email_Body ;
    $mail->AltBody = $email_AltBody ;
    $mail->MsgHTML($email_Body) ;
    
   // $doc = $pdf->Output('file.pdf' , 'S') ;
    //$mail->AddStringAttachment($pdf , "budget.pdf" , 'base64' , 'application/pdf') ;
    $mail->AddStringAttachment($doc, 'doc.pdf', 'base64', 'application/pdf');

    $mail->send() ;
                
    //include view('emails', 'email_send_ok');
   //header("location index.php?c=budgets&a=details&id=$id"); 
   
    echo 'Message has been sent <br>' ;
    
    echo '<button onclick="goBack()">Go Back</button>

                <script>
                    function goBack() {
                        window.history.back();
                    }
                </script> 
'; 
    
    
} catch ( Exception $e ) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}" ;
    
}

