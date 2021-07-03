<?php
include pdf_template('export'); 

$pdf = new EXPORT();
$pdf->AddPage("L");

$pdf->SetFont("arial", "B", 16);
$pdf->Cell(100, 10, _trc("Balance"), 0, 1);
$pdf->SetFont("arial", "", 10);

$pdf->body_balance($balance); 


//$pdf->SetFont("Arial","B",16);
//$pdf->Cell(40,10,"Hello World !");
$pdf->Output();
