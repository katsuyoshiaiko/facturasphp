<?php

//include view("doc_models" , "credit_note") ;

include pdf_template("ndc") ;



// Instanciation de la classe dérivée
$pdf = new NDC() ;
$pdf->SetTitle("Coello.be") ;
$pdf->SetAuthor("Robinson Coello <info@coello.be>") ;
$pdf->SetCreator("Coello.be") ;
$pdf->SetKeywords("Coello.be") ;
$pdf->SetSubject("Credit note > $config_company_name") ;
$pdf->AliasNbPages() ;

$pdf->AddPage() ;
$pdf->doc_title(_trc("Credit note") . ': ' . $id);
$pdf->addresses($addresses_billing , $addresses_delivery); 
$pdf->Ln(); 
$pdf->body($credit_note); 
// agrego una nueva pagina
//$pdf->AddPage() ;
//$pdf->condiciones("Estas son las condiciones"); 

//$pdf->AddPage() ;
//$pdf->cell_QR(10,70,"robinosn"); 

switch ( $way ) {
    case "pdf":
        $pdf->Output("Credit_note_$id" . ".pdf" , "D") ;
        break ;

    case "web":
        $pdf->Output("Credit_note_$id" . ".pdf" , "I") ;
        break ;

    case "email":                        

        $email_Subject = "$config_company_name Budget" ;
        $email_Body = $message ;
        $email_AltBody = '$email_AltBody' ;
        include controller("emails", "send_email_file");        
        break ;


    default:
        $pdf->Output("Credit_note_$id" . ".pdf" , "I") ;
        break ;
}

