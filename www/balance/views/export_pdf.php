<?php

include pdf_template("balance") ;

//$pdf = new FPDF();

$pdf = new BALANCE(); 

//$pdf->AddPage("L", array(148,210));
$pdf->AddPage("L");
$pdf->SetFont("Arial","",8);
$pdf->body(); 
$pdf->Output();
