<?php

include pdf_template("tocayo");

class EXPENSE extends TOCAYO {
    

    function body_expense() {
        
        $this->company();
        $this->client_number();
        $this->me_in_this_company();
        $this->Ln();
        $this->Ln();
        $this->payements_list();
        $this->Ln();
        $this->Ln();
        $this->files();
    }

    function company() {
        $this->Cell(($this->GetPageWidth() - 20) / 100 * 25, 5, "Company : CIPAC", 1, 1, 1, 0);
        $this->Cell(($this->GetPageWidth() - 20) / 100 * 25, 5, "363 ch. de Waterloo", 1, 1, 1, 0);
        $this->Cell(($this->GetPageWidth() - 20) / 100 * 25, 5, "1060 - St. gilles", 1, 1, 1, 0);
        $this->Cell(($this->GetPageWidth() - 20) / 100 * 25, 5, "Bruxelles - Belgique ", 1, 1, 1, 0);
        $this->Cell(($this->GetPageWidth() - 20) / 100 * 25, 5, "Tel: 023659874", 1, 1, 1, 0);
        $this->Cell(($this->GetPageWidth() - 20) / 100 * 25, 5, "Email: info@cipac.be", 1, 1, 1, 0);
    }

    function me_in_this_company() {
        $this->SetY(50);
        $this->SetX(150);
        $this->Cell(($this->GetPageWidth() - 20) / 100 * 25, 5, "Facture number: ", 1, 2, 1, 0);
        $this->Cell(($this->GetPageWidth() - 20) / 100 * 25, 5, "Facture number: 5252", 1, 2, 1, 0);
        $this->Cell(($this->GetPageWidth() - 20) / 100 * 25, 5, "Facture date: 2020-01-20", 1, 2, 1, 0);
        $this->Cell(($this->GetPageWidth() - 20) / 100 * 25, 5, "My ref: 2021-12", 1, 2, 1, 0);
        $this->Cell(($this->GetPageWidth() - 20) / 100 * 25, 5, "My client number: 5241", 1, 2, 1, 0);
        $this->Cell(($this->GetPageWidth() - 20) / 100 * 25, 5, "SALDO: 252.20 EUR", 1, 2, 1, 0);
    }

    function client_number() {
        global $expense; 
        
       // $to_pay = ($expense['total'] + $expense['tax']) - abs($expense['expense']);
        $to_pay = 100;
        
        $this->SetY(50);
        $this->SetX(75);
        $this->SetFont("Arial", "", 15);
        $this->Cell(($this->GetPageWidth() - 20) / 100 * 30, 10, "Client number", 1, 2, 'C', 0);
        $this->Cell(($this->GetPageWidth() - 20) / 100 * 30, 10, "202020", 1, 2, "C", 0);
        //$this->SetFont("Arial", "", 7);
        $this->Cell(($this->GetPageWidth() - 20) / 100 * 30, 10, _trc('To pay') . ' ' . moneda($to_pay), 1, 2, "C", 0);
        $this->SetFont("Arial", "", 8);
    }

    // Documentos adjuntos
    function files() {
        $this->Cell(($this->GetPageWidth() - 20) / 100 * 100, 10, "Files", 1, 1, 'C', 0);
        
        for($i=0; $i<5; $i++){
            $this->Cell(190, 5, 'file 1', 1, 1);
        }
        
        
        $this->AddPage();
        $this->Cell(100, 5, "Archivo ubicacion, fecha de encio, expense n 252, date 2020-01-01", 1, 1);
        $this->Image('4.jpg', $this->GetX(), $this->GetY(), ($this->GetPageWidth() - 20) * 0.8);

        $this->AddPage();
        $this->Cell(100, 5, "Archivo ubicacion, fecha de encio, expense n 252, date 2020-01-01", 1, 1);
        $this->Image('4.jpg', $this->GetX(), $this->GetY(), ($this->GetPageWidth() - 20) * 0.8);
    }

    // lista de pagos realizados

    /**
     * Pagos realizados para esta factura
     */
    function payements_list() {
        global $expense; 
                
        $this->SetFont("Arial", "", 15);
        $this->Cell($this->GetPageWidth() - 20, 10, _trc("Payements list"), 1, 2, 'C', 0);
        $this->SetFont("Arial", "", 8);
        
        
        $this->Cell(30, 5, "", 0, 1, "L", 0);
        
        $this->Cell(30, 5, _trc("Payement date"), 'BLT', 0, "L", 0);
        $this->Cell(30, 5, _trc("Bank"), 'BT', 0, "L", 0);
        $this->Cell(15, 5, _trc("Ref"), 'BT', 0, "L", 0);
        $this->Cell(35, 5, _trc("c/e"), 'BT', 0, "L", 0);
        $this->Cell(30, 5, _trc("Value"), 'BT', 0, "L", 0);
        $this->Cell(50, 5, _trc("Notes"), 'BTR', 1,  "L", 0);
        

        //for($i=1; $i<10; $i++) {
        $total_general = 0 ; 
        foreach (balance_list_by_expense($expense['id']) as $key => $value) {                    
            
            //$total = $value['total'] + $value['tax']; 
            $total = $value['total'] ; 
            $total_general = $total_general + $total; 

            $this->Cell(30, 5, $value['date'], 'LB', 0, "L", 0);            
            $this->Cell(30, 5, $value['account_number'], 'B', 0, "L", 0);
            $this->Cell(15, 5, $value['ref'], 'B', 0, "L", 0);
            $this->Cell(35, 5, $value['ce'], 'B', 0, "L", 0);            
            $this->Cell(30, 5, moneda($total), 'B', 0, "R", 0);
            $this->Cell(50, 5, "", 'BR', 1, "L", 0);
            
        }                    
            $this->Cell(75, 5, "", 0, 0, "L", 0);
            $this->Cell(35, 5, _trc("Total pay"), 0, 0, 0, 0);
            $this->Cell(30, 5, moneda($total_general), 0, 0, "R", 0);
            $this->Cell(50, 5, "", 0, 1, "L", 0);                

            $this->Cell(75, 5, "", 0, 0, "L", 0);                        
            $this->Cell(35, 5, _trc("Total expense"), 0, 0, "R", 0);
            $this->Cell(30, 5, moneda($expense['total'] + $expense['tax']  ), 0, 0, 'R', 0);
            $this->Cell(50, 5, "", 0, 1, "L", 0);                

            $this->Cell(75, 5, "", 0, 0, "L", 0);                        
            $this->Cell(35, 5, _trc("Total pay"), 0, 0, "R", 0);
            $this->Cell(30, 5, moneda( ($expense['total'] + $expense['tax']) - abs($total_general)), 1, 0, "R", 0);
            $this->Cell(50, 5, "", 0, 1, "L", 0);                
    }

}
