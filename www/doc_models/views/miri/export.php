<?php

include pdf_template("miri");

class EXPORT extends MIRI {

    function body_invoices($invoices) {
        $this->encabezados_invoices();

        $total = 0; 
        $tax = 0;
        $advance = 0; 
        
        
        foreach ($invoices as $key => $value) {

            $total  = $total + $value['total'];
            $tax    = $tva + $value['tax'];
            $advance    = $advance  + $value['advance'];
            
            
            $this->Cell(($this->GetPageWidth() / 100) * 5, $this->get_Pdf_alto_linea(), $value['id']                , 1, 0, 'L', 0, false);
            $this->Cell(($this->GetPageWidth() / 100) * 7, $this->get_Pdf_alto_linea(), $value["date"]    , 1, 0, 'L', 0, false);
            $this->Cell(($this->GetPageWidth() / 100) * 26, $this->get_Pdf_alto_linea(), contacts_formated($value["client_id"])        , 1, 0, 'L', 0, false);
            $this->Cell(($this->GetPageWidth() / 100) * 8, $this->get_Pdf_alto_linea(), $value["total"]             , 1, 0, 'R', 0, false);            
            $this->Cell(($this->GetPageWidth() / 100) * 8, $this->get_Pdf_alto_linea(), $value["advance"]           , 1, 0, 'R', 0, false);
            $this->Cell(($this->GetPageWidth() / 100) * 8, $this->get_Pdf_alto_linea(), "--"                        , 1, 0, 'R', 0, false);
            $this->Cell(($this->GetPageWidth() / 100) * 7, $this->get_Pdf_alto_linea(), $value["r1"], 1, 0, 'C', 0, false);
            $this->Cell(($this->GetPageWidth() / 100) * 7, $this->get_Pdf_alto_linea(), $value["r2"], 1, 0, 'C', 0, false);
            $this->Cell(($this->GetPageWidth() / 100) * 7, $this->get_Pdf_alto_linea(), $value["r3"], 1, 0, 'C', 0, false);
            //$this->Cell(($this->GetPageWidth() / 100) * 13, $this->get_Pdf_alto_linea(), $value["ce"], 1, 0, 'C', 0, false);
            //$this->Cell(($this->GetPageWidth() / 100) * 13, $this->get_Pdf_alto_linea(), "", 1, 0, 'C', 0, false);
            $this->SetFont("arial", "", 8);
            $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), invoice_status_by_status($value["status"]), 1, 1, 'L', 0, false);                        
            $this->SetFont("arial", "", 10);
        }
        
        
        
            $this->Cell(($this->GetPageWidth() / 100) * 5, $this->get_Pdf_alto_linea(), ''                , 0, 0, 'L', 0, false);
            $this->Cell(($this->GetPageWidth() / 100) * 7, $this->get_Pdf_alto_linea(), ''    , 0, 0, 'L', 0, false);
            $this->Cell(($this->GetPageWidth() / 100) * 26, $this->get_Pdf_alto_linea(), ''        , 0, 0, 'L', 0, false);
            $this->Cell(($this->GetPageWidth() / 100) * 8, $this->get_Pdf_alto_linea(), $total             , 1, 0, 'R', 0, false);            
            $this->Cell(($this->GetPageWidth() / 100) * 8, $this->get_Pdf_alto_linea(), $advance           , 1, 0, 'R', 0, false);
            $this->Cell(($this->GetPageWidth() / 100) * 8, $this->get_Pdf_alto_linea(),    $total-$advance                     , 1, 0, 'R', 0, false);
            $this->Cell(($this->GetPageWidth() / 100) * 7, $this->get_Pdf_alto_linea(), '', 0, 0, 'C', 0, false);
            $this->Cell(($this->GetPageWidth() / 100) * 7, $this->get_Pdf_alto_linea(), '', 0, 0, 'C', 0, false);
            $this->Cell(($this->GetPageWidth() / 100) * 7, $this->get_Pdf_alto_linea(), '', 0, 0, 'C', 0, false);
            $this->Cell(($this->GetPageWidth() / 100) * 13, $this->get_Pdf_alto_linea(), '', 0, 0, 'C', 0, false);
            $this->Cell(($this->GetPageWidth() / 100) * 8, $this->get_Pdf_alto_linea(), '', 0, 1, 'C', 0, false); 
        
        
    }

    function encabezados_invoices() {
        $this->SetFont("arial", "", 10);

        $this->Cell(($this->GetPageWidth() / 100) * 5, $this->get_Pdf_alto_linea(), _trc("Number"), 1, 0, 'C', 0, false);
        $this->Cell(($this->GetPageWidth() / 100) * 7, $this->get_Pdf_alto_linea(), _trc("Date"), 1, 0, 'C', 0, false);
        $this->Cell(($this->GetPageWidth() / 100) * 26, $this->get_Pdf_alto_linea(), _trc("Client"), 1, 0, 'C', 0, false);
        $this->Cell(($this->GetPageWidth() / 100) * 8, $this->get_Pdf_alto_linea(), _trc("Total"), 1, 0, 'C', 0, false);
        $this->Cell(($this->GetPageWidth() / 100) * 8, $this->get_Pdf_alto_linea(), _trc("Advance"), 1, 0, 'C', 0, false);
        $this->Cell(($this->GetPageWidth() / 100) * 8, $this->get_Pdf_alto_linea(), _trc("Solde"), 1, 0, 'C', 0, false);
        $this->Cell(($this->GetPageWidth() / 100) * 7, $this->get_Pdf_alto_linea(), _trc("r1"), 1, 0, 'C', 0, false);
        $this->Cell(($this->GetPageWidth() / 100) * 7, $this->get_Pdf_alto_linea(), _trc("r2"), 1, 0, 'C', 0, false);
        $this->Cell(($this->GetPageWidth() / 100) * 7, $this->get_Pdf_alto_linea(), _trc("r3"), 1, 0, 'C', 0, false);                
        //$this->Cell(($this->GetPageWidth() / 100) * 13, $this->get_Pdf_alto_linea(), "", 1, 0, 'C', 0, false);                
        $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), _trc("Status"), 1, 1, 'C', 0, false);
    }
    
    function body_credit_notes($cn) {
        $this->encabezados_credit_notes();

        $total = 0; 
        $tax = 0;
        $advance = 0;         
        
        foreach ($cn as $key => $value) {

            $total  = $total + $value['total'];
            $tax    = $tva + $value['tax'];
            $returned    = $returned  + $value['returned'];
                        
            $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), $value['id']                , 1, 0, 'L', 0, false);
            $this->Cell(($this->GetPageWidth() / 100) * 12, $this->get_Pdf_alto_linea(), $value["date_registre"]    , 1, 0, 'L', 0, false);
            $this->Cell(($this->GetPageWidth() / 100) * 25, $this->get_Pdf_alto_linea(), contacts_formated($value["client_id"])        , 1, 0, 'L', 0, false);
            $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), $value["total"]             , 1, 0, 'R', 0, false);            
            $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), $value["returned"]           , 1, 0, 'R', 0, false);
            $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(),  $value["total"] - $value["returned"]                       , 1, 0, 'R', 0, false);                                                
            $this->Cell(($this->GetPageWidth() / 100) * 18, $this->get_Pdf_alto_linea(), credit_notes_status_by_status($value["status"]), 1, 1, 'C', 0, false);                        
        }
                    
            $this->Cell(($this->GetPageWidth() / 100) * 47, $this->get_Pdf_alto_linea(), ''                , 0, 0, 'L', 0, false);                        
            $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), $total             , 1, 0, 'R', 0, false);            
            $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), $returned           , 1, 0, 'R', 0, false);
            $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(),    $total-$returned                     , 1, 0, 'R', 0, false);
            $this->Cell(($this->GetPageWidth() / 100) * 8, $this->get_Pdf_alto_linea(), '', 0, 1, 'C', 0, false); 
        
        
    }

    function encabezados_credit_notes() {
        $this->SetFont("arial", "B", 10);

        $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), _trc("Number"), 1, 0, 'C', 0, false);
        $this->Cell(($this->GetPageWidth() / 100) * 12, $this->get_Pdf_alto_linea(), _trc("Date"), 1, 0, 'C', 0, false);
        $this->Cell(($this->GetPageWidth() / 100) * 25, $this->get_Pdf_alto_linea(), _trc("Client"), 1, 0, 'C', 0, false);
        $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), _trc("Total"), 1, 0, 'C', 0, false);
        $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), _trc("Refunded"), 1, 0, 'C', 0, false);
        $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), _trc("To refund"), 1, 0, 'C', 0, false);                                
        $this->Cell(($this->GetPageWidth() / 100) * 18, $this->get_Pdf_alto_linea(), _trc("Status"), 1, 1, 'C', 0, false);
        $this->SetFont("arial", "", 10);
    }

    function body_contacts($contacts) {
        $this->encabezados_contacts();
              
        $i=1; 
        foreach ($contacts as $key => $value) {
            
            $this->Cell(($this->GetPageWidth() / 100) * 4, $this->get_Pdf_alto_linea(), $i++                , 1, 0, 'L', 0, false);
            $this->Cell(($this->GetPageWidth() / 100) * 8, $this->get_Pdf_alto_linea(), $value['id']                , 1, 0, 'L', 0, false);
            $this->Cell(($this->GetPageWidth() / 100) * 8, $this->get_Pdf_alto_linea(), $value["owner_id"]          , 1, 0, 'L', 0, false);
            $this->Cell(($this->GetPageWidth() / 100) * 5, $this->get_Pdf_alto_linea(), $value["type"]              , 1, 0, 'L', 0, false);
            $this->Cell(($this->GetPageWidth() / 100) * 5, $this->get_Pdf_alto_linea(), utf8_decode($value["title"])            , 1, 0, 'L', 0, false);            
            $this->Cell(($this->GetPageWidth() / 100) * 20, $this->get_Pdf_alto_linea(),utf8_decode( $value["name"])             , 1, 0, 'L', 0, false);
            $this->Cell(($this->GetPageWidth() / 100) * 20, $this->get_Pdf_alto_linea(), utf8_decode($value["lastname"])         , 1, 0, 'L', 0, false);            
            $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), $value["tva"], 1, 0, 'L', 0, false);
            $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), $value["discounts"], 1, 1, 'C', 0, false);                        
        }
        
        
        
    }

    function encabezados_contacts() {
        $this->SetFont("arial", "B", 10);

        $this->Cell(($this->GetPageWidth() / 100) * 4, $this->get_Pdf_alto_linea(), '#', 1, 0, 'C', 0, false);
        $this->Cell(($this->GetPageWidth() / 100) * 8, $this->get_Pdf_alto_linea(), _trc("Id"), 1, 0, 'C', 0, false);
        $this->Cell(($this->GetPageWidth() / 100) * 8, $this->get_Pdf_alto_linea(), _trc("owner"), 1, 0, 'C', 0, false);
        $this->Cell(($this->GetPageWidth() / 100) * 5, $this->get_Pdf_alto_linea(), _trc("Type"), 1, 0, 'C', 0, false);
        $this->Cell(($this->GetPageWidth() / 100) * 5, $this->get_Pdf_alto_linea(), _trc("Title"), 1, 0, 'C', 0, false);
        $this->Cell(($this->GetPageWidth() / 100) * 20, $this->get_Pdf_alto_linea(), _trc("Name"), 1, 0, 'C', 0, false);
        $this->Cell(($this->GetPageWidth() / 100) * 20, $this->get_Pdf_alto_linea(), _trc("Lastname"), 1, 0, 'C', 0, false);
        $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), _trc("Tva"), 1, 0, 'C', 0, false);
        $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), _trc("Discounts") . " %", 1, 1, 'C', 0, false);
        $this->SetFont("arial", "", 10);
    }
    
    function body_balance($balance) {
        $this->encabezados_balance();
              
        $i=1; 
        foreach ($balance as $key => $value) {
            
            $this->Cell(($this->GetPageWidth() / 100) * 4, $this->get_Pdf_alto_linea(), $i++                                , 'TL', 0, 'L', 0, false);                        
            $this->Cell(($this->GetPageWidth() / 100) * 12, $this->get_Pdf_alto_linea(), _trc("Date")                        , 'T', 0, 'L', 0, false);            
            $this->Cell(($this->GetPageWidth() / 100) * 12, $this->get_Pdf_alto_linea(), $value['date']              , 'T', 0, 'L', 0, false);            
            $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), ""                                , 'T', 0, 'L', 0, false);            
            $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), _trc("Ref")                                , 'T', 0, 'L', 0, false);            
            $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), _trc("Expense")                    , 'T', 0, 'L', 0, false);            
            $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), _trc("Invoice")                    , 'T', 0, 'L', 0, false);            
            $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), _trc("Credit note")                , 'T', 0, 'L', 0, false);                        
            $this->Cell(($this->GetPageWidth() / 100) * 8, $this->get_Pdf_alto_linea(), ""                                 , 'T', 0, 'L', 0, false);                                                                                   
            $this->Cell(($this->GetPageWidth() / 100) * 8, $this->get_Pdf_alto_linea(), ''                                 , 'TR', 1, 'C', 0, false);                                                                                                                        
            
            $this->Cell(($this->GetPageWidth() / 100) * 4, $this->get_Pdf_alto_linea(), ''                                  , 'L', 0, 'L', 0, false);            
            $this->Cell(($this->GetPageWidth() / 100) * 12, $this->get_Pdf_alto_linea(), _trc("Date registre")              , 0, 0, 'L', 0, false);            
            $this->Cell(($this->GetPageWidth() / 100) * 12, $this->get_Pdf_alto_linea(), $value['date_registre']            , 0, 0, 'L', 0, false);            
            $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), ""                               , 0, 0, 'L', 0, false);            
            $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), $value['ref']                               , 0, 0, 'L', 0, false);            
            $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), $value['expense_id']               , 0, 0, 'L', 0, false);            
            $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), $value['invoice_id']               , 0, 0, 'L', 0, false);            
            $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), $value['credit_note_id']           , 0, 0, 'L', 0, false);                                    
            $this->Cell(($this->GetPageWidth() / 100) * 8, $this->get_Pdf_alto_linea(), ( $value['total'] < 0 )? $value['total']:""          , 0, 0, 'R', 0, false);                                                                                   
            $this->Cell(($this->GetPageWidth() / 100) * 8, $this->get_Pdf_alto_linea(), ( $value['total'] >= 0 )? $value['total']:""          , 'R', 1, 'R', 0, false);                                                                                                           
            
            
            $this->Cell(($this->GetPageWidth() / 100) * 4, $this->get_Pdf_alto_linea(), $value['id']                       , 1, 0, 'L', 0, false);            
            $this->Cell(($this->GetPageWidth() / 100) * 12, $this->get_Pdf_alto_linea(), _trc("c/e")                     , 'B', 0, 'L', 0, false);            
            $this->Cell(($this->GetPageWidth() / 100) * 20, $this->get_Pdf_alto_linea(), $value['ce']                     , 'B', 0, 'L', 0, false);            
            $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), $value['description']                     , 'B', 0, 'L', 0, false);                                    
            $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), ''                     , 'B', 0, 'L', 0, false);            
            $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), ""                     , 'B', 0, 'L', 0, false);            
            $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), ""                     , 'B', 0, 'L', 0, false);            
            $this->Cell(($this->GetPageWidth() / 100) * 10, $this->get_Pdf_alto_linea(), ""                       , 'B', 0, 'L', 0, false);                                                                                   
            $this->Cell(($this->GetPageWidth() / 100) * 8, $this->get_Pdf_alto_linea(),  ($value['canceled_code'])? _trc("Transaction canceled") . " : " .  $value['canceled_code']   : ""                       , 'BR', 1, 'R', 0, false);                                                                                                                        
            $this->Ln();
            
        }
        
        
        
    }

    function encabezados_balance() {
        $this->SetFont("arial", "B", 10);

        
        
        $this->SetFont("arial", "", 10);
    }

}
