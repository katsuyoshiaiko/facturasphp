<?php

include view("doc_models", "expense");



    

// Instanciation de la classe dérivée
$pdf = new INVOICE();
$pdf->AliasNbPages();

//$pdf->AddPage();
//$pdf->LettreDate("date"); 
//$pdf->LettreBody("Welcome"); 
//$pdf->LettreSignature("Signature"); 


$pdf->AddPage();
$pdf->doc_title("Facture 2020-1018"); 
//$pdf->body($expenses, $addresses_billing, $addresses_delivery); 
$pdf->bodyNoValued($expenses, $addresses_billing, $addresses_delivery); 

if(budgets_expenses_list_budgets_by_expense_id($id)){
    $pdf->AddPage("L");
    $pdf->doc_title("Details"); 
    $pdf->details(budgets_expenses_list_budgets_by_expense_id($id)); 
}

$pdf->Output();