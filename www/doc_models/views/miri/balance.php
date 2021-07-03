<?php

include pdf_template("miri");

class BALANCE extends MIRI {
    
    
    function body(){                        
        $balance = balance_list();
        
        $this->cabeceras();
        
        foreach ($balance as $key => $extracto) {
            //$this->extracto($extracto);
            // $this->AddPage("L", array(148,210));            
            $this->listing2($extracto);
            //$this->Line(10, $this->GetY() , 200 , $this->GetY());                        
        }    
        $this->Cell(($this->GetPageWidth()/100)*94 , $this->get_Pdf_alto_linea(), ''     , 'T'   , 1 , "C" , 0 , false);                
    }

    
    
    function extracto($extracto){
        
        #ID
        $this->Cell(($this->GetPageWidth()-20)/2 , $this->get_Pdf_alto_linea(), _trc('Id') , 1 , 0 , "L" , 0 , false);
        $this->Cell(5 , $this->get_Pdf_alto_linea(), " : " , 1 , 0 , "L" , 0 , false);
        $this->Cell(($this->GetPageWidth()-20)/2 , $this->get_Pdf_alto_linea(), $extracto['id'] , 1 , 1 , "R" , 0 , false);            
                        
        #ID Date registre
        $this->Cell(($this->GetPageWidth()-20)/2 , $this->get_Pdf_alto_linea(), _trc('Date registre') , 1 , 0 , "L" , 0 , false);
        $this->Cell(5 , $this->get_Pdf_alto_linea(), " : " , 1 , 0 , "L" , 0 , false);
        $this->Cell(($this->GetPageWidth()-20)/2 , $this->get_Pdf_alto_linea(), $extracto['date_registre'] , 1 , 1 , "R" , 0 , false);   

        $this->Ln();

        
        
        #ID date valor
        $this->Cell(($this->GetPageWidth()-20)/2 , $this->get_Pdf_alto_linea(), _trc('Date') , 1 , 0 , "L" , 0 , false);
        $this->Cell(5 , $this->get_Pdf_alto_linea(), " : " , 1 , 0 , "L" , 0 , false);
        $this->Cell(($this->GetPageWidth()-20)/2 , $this->get_Pdf_alto_linea(), $this->GetPageWidth() . "Test de linea" , 1 , 1 , "R" , 0 , false);            
        
        #ID facture
        $this->Cell(($this->GetPageWidth()-20)/2 , $this->get_Pdf_alto_linea(), _trc('Invoice') , 1 , 0 , "L" , 0 , false);
        $this->Cell(5 , $this->get_Pdf_alto_linea(), " : " , 1 , 0 , "L" , 0 , false);
        $this->Cell(($this->GetPageWidth()-20)/2 , $this->get_Pdf_alto_linea(), $this->GetPageWidth() . "Test de linea" , 1 , 1 , "R" , 0 , false);            
                
        #ID credit note
        $this->Cell(($this->GetPageWidth()-20)/2 , $this->get_Pdf_alto_linea(), _trc('Credit note') , 1 , 0 , "L" , 0 , false);
        $this->Cell(5 , $this->get_Pdf_alto_linea(), " : " , 1 , 0 , "L" , 0 , false);
        $this->Cell(($this->GetPageWidth()-20)/2 , $this->get_Pdf_alto_linea(), $this->GetPageWidth() . "Test de linea" , 1 , 1 , "R" , 0 , false);                    $this->Ln();
        #ID Reference
        $this->Cell(($this->GetPageWidth()-20)/2 , $this->get_Pdf_alto_linea(), _trc('Reference') , 1 , 0 , "L" , 0 , false);
        $this->Cell(5 , $this->get_Pdf_alto_linea(), " : " , 1 , 0 , "L" , 0 , false);
        $this->Cell(($this->GetPageWidth()-20)/2 , $this->get_Pdf_alto_linea(), $this->GetPageWidth() . "Test de linea" , 1 , 1 , "R" , 0 , false);            
        #ID Description
        $this->Cell(($this->GetPageWidth()-20)/2 , $this->get_Pdf_alto_linea(), _trc('Description') , 1 , 0 , "L" , 0 , false);
        $this->Cell(5 , $this->get_Pdf_alto_linea(), " : " , 1 , 0 , "L" , 0 , false);
        $this->Cell(($this->GetPageWidth()-20)/2 , $this->get_Pdf_alto_linea(), $this->GetPageWidth() . "Test de linea" , 1 , 1 , "R" , 0 , false);                           

        #ID c/e
        $this->Cell(($this->GetPageWidth()-20)/2 , $this->get_Pdf_alto_linea(), _trc('c/e') , 1 , 0 , "L" , 0 , false);
        $this->Cell(5 , $this->get_Pdf_alto_linea(), " : " , 1 , 0 , "L" , 0 , false);
        $this->Cell(($this->GetPageWidth()-20)/2 , $this->get_Pdf_alto_linea(), $this->GetPageWidth() . "Test de linea" , 1 , 1 , "R" , 0 , false);                    
                 
        $this->Ln();
        #ID Annuler?
        $this->Cell(($this->GetPageWidth()-20)/2 , $this->get_Pdf_alto_linea(), _trc('Cancel') , 1 , 0 , "L" , 0 , false);
        $this->Cell(5 , $this->get_Pdf_alto_linea(), " : " , 1 , 0 , "L" , 0 , false);
        $this->Cell(($this->GetPageWidth()-20)/2 , $this->get_Pdf_alto_linea(), $this->GetPageWidth() . "Test de linea" , 1 , 1 , "R" , 0 , false);            
        #ID Code cancel
        $this->Cell(($this->GetPageWidth()-20)/2 , $this->get_Pdf_alto_linea(), _trc('Cancel code') , 1 , 0 , "L" , 0 , false);
        $this->Cell(5 , $this->get_Pdf_alto_linea(), " : " , 1 , 0 , "L" , 0 , false);
        $this->Cell(($this->GetPageWidth()-20)/2 , $this->get_Pdf_alto_linea(), $this->GetPageWidth() . "Test de linea" , 1 , 1 , "R" , 0 , false);            
        $this->Ln();
        

        #ID Code cancel
        $this->Cell(($this->GetPageWidth()-20)/2 , $this->get_Pdf_alto_linea(), _trc('Value') , 1 , 0 , "L" , 0 , false);
        $this->Cell(5 , $this->get_Pdf_alto_linea(), " : " , 1 , 0 , "L" , 0 , false);
        $this->Cell(($this->GetPageWidth()-20)/2 , $this->get_Pdf_alto_linea(), moneda(555), 1 , 1 , "R" , 0 , false);            

        
    }
    

    
    function listing($extracto){
        
        #ID
        
        $this->Cell((($this->GetPageWidth()-20)/100)*10 , $this->get_Pdf_alto_linea(), $extracto['id'] , '1' , 0 , 'C' , 0 , false);
        
        $this->Cell((($this->GetPageWidth()-20)/100)*20 , $this->get_Pdf_alto_linea(), $extracto['date_registre'] , 'T' , 0 , "L" , 0 , false);
        
        $this->Cell((($this->GetPageWidth()-20)/100)*20 , $this->get_Pdf_alto_linea(), $extracto['account_number'] , 'T' ,  0 , false);
        $this->Cell((($this->GetPageWidth()-20)/100)*12 , $this->get_Pdf_alto_linea(), '2020-02-28' , 'T' , 0 , "L" , 0 , false);       
        $this->Cell((($this->GetPageWidth()-20)/100)*38 , $this->get_Pdf_alto_linea(), '' , 'TR' , 1 , "L" , 0 , false);       

        
       
        $this->Cell((($this->GetPageWidth()-20)/100)*20 , $this->get_Pdf_alto_linea(), 'Client: ' . $extracto['client_id'] , 'L' , 0 , "L" , 0 , false);
        $this->Cell((($this->GetPageWidth()-20)/100)*80 , $this->get_Pdf_alto_linea(), contacts_formated($extracto['client_id']), 'R', 1, "L" , 0 , false);
        
        $this->Cell((($this->GetPageWidth()-20)/100)*100 , $this->get_Pdf_alto_linea(), 'Description: ' . $extracto['description'] , 'LR' , 1 , "L" , 0 , false);
        $this->Cell((($this->GetPageWidth()-20)/100)*35 , $this->get_Pdf_alto_linea(), 'Ref: ' . $extracto['ref'] , 'L' , 0 , "L" , 0 , false);
        $this->Cell((($this->GetPageWidth()-20)/100)*25 , $this->get_Pdf_alto_linea(), $extracto['ce'] , 0 , 0 , "C" , 0 , false);
        
        $this->Cell((($this->GetPageWidth()-20)/100)*10 , $this->get_Pdf_alto_linea(), 'in/out' , 0 , 0 , "R" , 0 , false);       
        $this->Cell((($this->GetPageWidth()-20)/100)*30 , $this->get_Pdf_alto_linea(), monedaf(250), 'R' , 1 , "R" , 0 , false);
                        

    }
    
    function listing2($extracto){
        
        #ID
        $contact_formated = contacts_formated($extracto['client_id']); 
        
        if($extracto['total'] < 0 &&   $extracto['type'] == -1 ){
            $total_n =  $extracto['total'];
        }
        
        if($extracto['total'] == 0 &&   $extracto['type'] == -1 ){
            $total_n =  $extracto['total'];
        }
        
        if($extracto['total'] > 0  &&   $extracto['type'] == 1 ){
            $total_p = "+" . $extracto['total'];
        }
        
        if($extracto['total'] == 0 &&   $extracto['type'] == 1 ){
            $total_p = $extracto['total'];
        }
        
        
        
        $this->Cell(($this->GetPageWidth()/100)*5 , $this->get_Pdf_alto_linea(), $extracto['id']                , 'T'   , 0 , 'L' , 0 , false);        
        $this->Cell(($this->GetPageWidth()/100)*10 , $this->get_Pdf_alto_linea(), $extracto['date_registre']    , 'T'   , 0 , "L" , 0 , false);        
        $this->Cell(($this->GetPageWidth()/100)*5 , $this->get_Pdf_alto_linea(), $extracto['ref']               , 'T'   , 0 , 'L' , 0,  false);
        $this->Cell(($this->GetPageWidth()/100)*8 , $this->get_Pdf_alto_linea(), $extracto['account_number']    , 'T'   , 0 , "L" , 0 , false);       
        $this->Cell(($this->GetPageWidth()/100)*11 , $this->get_Pdf_alto_linea(), $extracto['ce']               , 'T'   , 0 , "L" , 0 , false);          
//$this->Cell(($this->GetPageWidth()/100)*2 , $this->get_Pdf_alto_linea(), $extracto['type']              , 'T'   , 0 , "L" , 0 , false);                             
        $this->Cell(($this->GetPageWidth()/100)*12 , $this->get_Pdf_alto_linea(), $contact_formated             , 'T'   , 0 , "L" , 0 , false);        
        $this->Cell(($this->GetPageWidth()/100)*11 , $this->get_Pdf_alto_linea(), $extracto['description']      , 'T'   , 0 , "L" , 0 , false);        
              
        $this->Cell(($this->GetPageWidth()/100)*5 , $this->get_Pdf_alto_linea(),$extracto['expense_id']         , 'T'   , 0 , "R" , 0 , false);
        $this->Cell(($this->GetPageWidth()/100)*5 , $this->get_Pdf_alto_linea(), $extracto['invoice_id']        , 'T'   , 0 , "R" , 0 , false);
        $this->Cell(($this->GetPageWidth()/100)*5 , $this->get_Pdf_alto_linea(), $extracto['credit_note_id']    , 'T'   , 0 , "R" , 0 , false);        
        $this->Cell(($this->GetPageWidth()/100)*5 , $this->get_Pdf_alto_linea(), $total_n             , 'T'   , 0 , "R" , 0 , false);                
        $this->Cell(($this->GetPageWidth()/100)*5 , $this->get_Pdf_alto_linea(), $total_p             , 'T'   , 0 , "R" , 0 , false);                
        $this->Cell(($this->GetPageWidth()/100)*5 , $this->get_Pdf_alto_linea(), $extracto['canceled_code']     , 'T'   , 1 , "C" , 0 , false);                
        
        
    }
    
    function cabeceras(){
        
        
        $this->Cell(($this->GetPageWidth()/100)*5 , $this->get_Pdf_alto_linea(), _tr("Id")                , 'T'   , 0 , 'L' , 0 , false);        
        $this->Cell(($this->GetPageWidth()/100)*10 , $this->get_Pdf_alto_linea(), _tr('date_registre')    , 'T'   , 0 , "L" , 0 , false);        
        $this->Cell(($this->GetPageWidth()/100)*5 , $this->get_Pdf_alto_linea(), _tr('ref')               , 'T'   , 0 , 'L' , 0,  false);
        $this->Cell(($this->GetPageWidth()/100)*8 , $this->get_Pdf_alto_linea(), _tr('account_number')    , 'T'   , 0 , "L" , 0 , false);       
$this->Cell(($this->GetPageWidth()/100)*11 , $this->get_Pdf_alto_linea(), _tr('ce')               , 'T'   , 0 , "L" , 0 , false);                
//$this->Cell(($this->GetPageWidth()/100)*2 , $this->get_Pdf_alto_linea(), _tr('Type')              , 'T'   , 0 , "L" , 0 , false);                             
        $this->Cell(($this->GetPageWidth()/100)*12 , $this->get_Pdf_alto_linea(), _tr('Client')             , 'T'   , 0 , "L" , 0 , false);        
        $this->Cell(($this->GetPageWidth()/100)*11 , $this->get_Pdf_alto_linea(), _tr('description')      , 'T'   , 0 , "L" , 0 , false);        
        
        $this->Cell(($this->GetPageWidth()/100)*5 , $this->get_Pdf_alto_linea(),_tr('Expense')         , 'T'   , 0 , "L" , 0 , false);
        $this->Cell(($this->GetPageWidth()/100)*5 , $this->get_Pdf_alto_linea(), _tr('Invoice')        , 'T'   , 0 , "L" , 0 , false);
        $this->Cell(($this->GetPageWidth()/100)*5 , $this->get_Pdf_alto_linea(), _tr('Credit note')    , 'T'   , 0 , "C" , 0 , false);        
        $this->Cell(($this->GetPageWidth()/100)*5 , $this->get_Pdf_alto_linea(), _tr('total')             , 'T'   , 0 , "R" , 0 , false);                
        $this->Cell(($this->GetPageWidth()/100)*5 , $this->get_Pdf_alto_linea(), _tr('total')             , 'T'   , 0 , "R" , 0 , false);                
        $this->Cell(($this->GetPageWidth()/100)*5 , $this->get_Pdf_alto_linea(), _tr('cc')     , 'T'   , 1 , "C" , 0 , false);                
        
        
    }
    

    
    
    
    
    
    
}