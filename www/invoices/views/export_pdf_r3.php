<?php

//
//include view("doc_models" , "rappel") ;

include pdf_template("rappel") ;

// Instanciation de la classe dérivée
$pdf = new RAPPEL() ;
$pdf->SetTitle("Coello.be") ;
$pdf->SetAuthor("Robinson Coello <info@coello.be>") ;
$pdf->SetCreator("Coello.be") ;
$pdf->SetKeywords("Coello.be") ;
$pdf->SetSubject("Rappel 3") ;
//------------------------------------------------------------------------------

$pdf->AliasNbPages() ;
$pdf->AddPage() ;
$pdf->doc_title($lettreTitle) ;

$pdf->addresses_billing($addresses_billing, $reciver_id) ;
$pdf->LettreDate($lettreDate) ;
$pdf->Ln() ;
$pdf->LettreBody(utf8_decode($lettreBody)) ;
$pdf->LettreSignature(utf8_decode($lettreSignature)) ;
//******************************************************************************


$pdf->AddPage() ;
$pdf->doc_title($lettreTitle) ;
$pdf->body($invoices) ;
//$pdf->Output() ;


//$invoices = invoices_details($id) ;
//$addresses_billing = json_decode($invoices['addresses_billing'] , true) ;
//$addresses_delivery = json_decode($invoices['addresses_delivery'] , true) ;



switch ( $way ) {
    case "pdf":
        $pdf->Output("Invoice_$id" . ".pdf" , "D") ;
        break ;

    case "web":
        $pdf->Output("Invoice_$id" . ".pdf" , "I") ;
        break ;

    case "email":
        
        
        
        // solo cuando es email, registro
        invoices_add_r3($id) ;
//
//        $email_Subject = "$config_company_name Rappel 3" ;
//        //$email_reciver = "robin@factux.com" ;
//        //$email_reciver = $reciver_email ;
//        //$email_reciver_name = " $reciver_name $reciver_lastname " ;
//        $email_Body = $message ;
//        $email_AltBody = '$email_AltBody' ;
//        include controller("emails", "send_email_file");
        break ;
   
    default:
        break ;
}


