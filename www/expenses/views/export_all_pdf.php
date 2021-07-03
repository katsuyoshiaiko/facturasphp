<?php
include pdf_template('export'); 

$pdf = new EXPORT();
$pdf->AddPage("L");

$pdf->SetFont("Arial","B",16);
$pdf->Cell(100, 10, _trc("Expenses"), 0, 1);
$pdf->SetFont("Arial","B",10);

$pdf->Cell(40,10,_trc("Year") . ": $year - ". _trc("Trimester").": $tri", 0, 1);

$pdf->body_expenses($expenses);

//
//$pdf->SetFont("Arial","B",16);
//$pdf->Cell(40,10,"Hello World !");
$pdf->Output();
