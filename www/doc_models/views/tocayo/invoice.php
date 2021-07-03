<?php

include pdf_template("tocayo") ;

class INVOICE extends TOCAYO {

    function body($invoices , $addresses_billing , $addresses_delivery) {
        
        global $u_owner_id, $config_bank; 
        
        $total_advance = invoices_field_id('advance', $invoices['id']);
        
        


        $this->Ln() ;
        $this->Ln() ;

        $this->bodyDate($invoices); 

        $this->Ln() ;
//
//        ## TOTAL DE LA FACTURA
//        ## TOTAL DE LA FACTURA
//        ## TOTAL DE LA FACTURA
        $this->SetFont('Arial' , 'B' , 25) ;
        $this->Cell($this->get_Pdf_ancho() / 2 , $this->get_Pdf_alto_linea() * 3 , _trc("Total invoice") , "TB" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 2 , $this->get_Pdf_alto_linea() * 3 , monedaf($invoices['total'] + $invoices['tax']) , "TB" , 1 , 'R' , 0) ;

        // esto es el encabeado
        $this->encabezados() ;
        
        
        
        ## ITEMS 
        ## ITEMS 
        ## ITEMS 
        ## ITEMS 
        $this->SetFillColor(250, 250, 250);
        $this->SetFont('Arial' , '' , 8) ;


        $totalprice = 0 ;
        $subtotal = 0 ;
        $totaltax = 0 ;
        $tvac = 0 ;
        $discounts = 0 ;
        $discounts_mode = 0 ;
        $totaldiscounts = 0; 
 

        $i = 1 ;
        foreach ( invoice_lines_list_by_invoice_id($invoices['id']) as $key => $ii ) {
            
            
            if($this->GetY() > 270){
                
               $this->AddPage(); 
               $this->bodyDate($invoices); 
               $this->Ln() ;
               $this->encabezados();
               $this->SetFillColor(250, 250, 250);
            }
 
            $totalprice = $totalprice + ($ii['price'] * $ii['quantity'] ) ;
            $subtotal = $subtotal + $ii['subtotal'] ;
            $totaltax = $totaltax + $ii['totaltax'] ;
            $tvac = $tvac + ($ii["subtotal"] + $ii["totaltax"]) ;
            $totaldiscounts = $totaldiscounts + ($ii["totaldiscounts"]) ;
            $discounts_mode = ($ii['discounts_mode'] == '%') ? "$ii[discounts]$ii[discounts_mode]" : "" ;
            $separador = ( substr($ii['description'],0,3) == '---' )? true : false;
 
           
            $color = ( $i % 2 == 0 ) ? 1 : 0 ;
            
            if($separador){
                $this->Cell(
                        ($this->get_Pdf_ancho() / 100) * 100, 
                        $this->get_Pdf_alto_linea() * 1, 
                        utf8_decode(substr($ii['description'],3)), 
                        'T',
                        1, 
                        'L', 
                        $color);
            }else{  
                $this->Cell(($this->get_Pdf_ancho() / 100) * 5 , $this->get_Pdf_alto_linea() * 1 , $ii['quantity'] , 0 , 0 , 'L' , $color) ;                        
                $this->Cell(($this->get_Pdf_ancho() / 100) * 41 , $this->get_Pdf_alto_linea() * 1 , '' , 0 , 0 , "L" , $color) ;
                $this->Cell(($this->get_Pdf_ancho() / 100) * 9 , $this->get_Pdf_alto_linea() * 1 , moneda($ii['price']) , 0 , 0 , 'R' , $color) ;
                $this->Cell(($this->get_Pdf_ancho() / 100) * 9 , $this->get_Pdf_alto_linea() * 1 , moneda($ii['price'] * $ii['quantity']) , 0 , 0 , 'R' , $color) ;
                $this->Cell(($this->get_Pdf_ancho() / 100) * 9 , $this->get_Pdf_alto_linea() * 1 , "$discounts_mode " . moneda($ii['totaldiscounts']) , 0 , 0 , 'R' , $color) ;
                $this->Cell(($this->get_Pdf_ancho() / 100) * 9 , $this->get_Pdf_alto_linea() * 1 , moneda($ii['subtotal']) , 0 , 0 , 'R' , $color) ;
                $this->Cell(($this->get_Pdf_ancho() / 100) * 9 , $this->get_Pdf_alto_linea() * 1 , "".$ii['tax']."% ".moneda($ii['totaltax']) , 0 , 0 , 'R' , $color) ;
                $this->Cell(($this->get_Pdf_ancho() / 100) * 9 , $this->get_Pdf_alto_linea() * 1 , moneda($ii['subtotal'] + $ii['totaltax']) , 0 , 1 , 'R' , $color) ;
                             //// MULTI CELDA
                $this->SetY($this->GetY() - 4);
                $this->SetX($this->GetX() + 10);
                $this->MultiCell(
                        ($this->get_Pdf_ancho() / 100) * 43, 
                        $this->get_Pdf_alto_linea() * 0.5,
                        utf8_decode($ii['description']), 
                        0, 
                        'T', 
                        0
                        );
                $this->SetY($this->GetY() + 0); // le da un ancho en la base del multicell
                $this->Ln();
                // MULTI CELDA  
                
                
            }
            $i ++ ;
           
        }
      
        // Esto necesita de un espacio minimo de 
      // X si es inferior agregamos un apagina 
      if($this->GetY() > 188){
          //$i=0; 
          while ( $this->GetY() < 268 ) {
              $color = ( $i++ % 2 == 0 ) ? 1 : 0 ;
              $this->lineasVacias($color);
          }
          $this->Cell(($this->get_Pdf_ancho() / 100) * 100 , $this->get_Pdf_alto_linea() * 1 , " >>>" , "T" , 1 , 'R' , 0) ;
          $this->AddPage(); 
      }

        $this->Ln() ;



        ## TVA            
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 1 , 0 , "L" , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Total") , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Discounts") , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Base taxable") , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , _trc("% Tva") , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Total Tva") , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Total") , 1 , 1 , 'R' , 0) ;

        
        
        
        
        
        
        
        foreach ( tax_list() as $key => $tax ) {
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , "L" , 0 , 'R' , 0) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , "L" , "L" , "L" , 0) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , "L" , 0 , 'R' , 0) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , "L" , 0 , 'R' , 0) ;

            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "$tax[value] %" , "L" , 0 , 'R' , 0) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , moneda(invoice_lines_total_by_tax($invoices['id'] , $tax['value'])) , "L" , 0 , 'R' , 0) ;

            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , "LR" , 1 , 'R' , 0) ;
        }


        ## Totales TVA
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "           " , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , moneda($totalprice) , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , moneda($discounts) , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , moneda($totalprice - $discounts) , 1 , 0 , 'R' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "" , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , moneda($totaltax) , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , moneda($tvac) , 1 , 1 , 'R' , 0) ;


        
        // Total pago recibidos
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Total Advance"), 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , moneda($total_advance) , 'LR' , 1 , 'R' , 0) ;
                ## Total a payer
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("To pay"), 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , moneda($tvac - $total_advance) , "RLTB" , 1 , 'R' , 0) ;


        $this->Ln() ;
        
        
        $this->bodyfoot();
        
    }
    
    
    function bodyDate($invoices){
        
        $date = 
                ($invoices['date'])
                ? 
                $invoices['date'] 
                : 
                substr($invoices['date_registre'],0,10);
                
        
        $this->SetFont('Arial' , 'B' , 10) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , _trc("Invoice date") , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , _trc("Expiration date") , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , _trc("From budget") , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , _trc("Invoice") , "" , 1 , 'R' , 0) ;

        $this->SetFont('Arial' , '' , 10) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , $date , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , $invoices['date_expiration'] , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , $invoices['budget_id'] , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , $invoices['id'] , "" , 1 , 'R' , 0) ;
        
    }
    
    
    
    function bodyfoot(){
        global $invoices, $tvac; 
                
        $this->blocTva(); 
        //$this->Ln(); 
        $this->cell_comments();
        $this->Ln(); 
        $this->payements_conditions($invoices);
        $this->communication($invoices);                                        
    }
    
    function blocTva() {
        global $invoices;                 
        }

        


}
