<?php

include pdf_template('expense');

// Instanciation de la classe dérivée
$pdf = new EXPENSE();

$pdf->AliasNbPages();

$pdf->AddPage();

$pdf->body_expense();

$pdf->Output();


