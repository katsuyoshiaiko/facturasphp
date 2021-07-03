<?php

include view("doc_models" , "rappel") ;


// Instanciation de la classe dérivée
$pdf = new RAPPEL() ;
$pdf->SetTitle("Coello.be") ;
$pdf->SetAuthor("Robinson Coello <info@coello.be>") ;
$pdf->SetCreator("Coello.be") ;
$pdf->SetKeywords("Coello.be") ;
$pdf->SetSubject("Expense") ;
//------------------------------------------------------------------------------

$pdf->AliasNbPages() ;
$pdf->AddPage() ;
$pdf->doc_title("") ;

$pdf->addresses_billing($addresses_billing) ;
$pdf->LettreDate($lettreDate) ;
$pdf->Ln() ;
$pdf->LettreBody(utf8_decode($lettreBody)) ;
$pdf->LettreSignature(utf8_decode($lettreSignature)) ;
//******************************************************************************


$pdf->AddPage() ;
$pdf->doc_title($lettreTitle) ;
$pdf->body($expenses) ;
$pdf->Output() ;


