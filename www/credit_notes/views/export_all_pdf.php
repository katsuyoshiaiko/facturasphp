<?php
include pdf_template('export'); 

$pdf = new EXPORT();
$pdf->AddPage("L");

$pdf->SetFont("Arial","B",16);
$pdf->Cell(100, 10, _trc("Credit notes"), 0, 1);
$pdf->SetFont("Arial","",10);

$pdf->Cell(40,10,_trc("Year") . ": $year - ". _trc("Trimester").": $tri", 0, 1);
$pdf->body_credit_notes($credit_notes);


//$pdf->SetFont("Arial","B",16);
//$pdf->Cell(40,10,"Hello World !");
$pdf->Output();
