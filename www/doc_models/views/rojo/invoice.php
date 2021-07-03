<?php

include pdf_template("rojo") ;

class INVOICE extends ROJO {

    function body($invoices , $addresses_billing , $addresses_delivery) {
        
        global $u_owner_id, $config_bank; 


        $this->Ln() ;
        $this->Ln() ;

        $this->bodyDate($invoices); 

        $this->Ln() ;
//
//        ## TOTAL DE LA FACTURA
//        ## TOTAL DE LA FACTURA
//        ## TOTAL DE LA FACTURA
//        $this->SetFont('Arial' , 'B' , 25) ;
//        $this->Cell($this->get_Pdf_ancho() / 2 , $this->get_Pdf_alto_linea() * 3 , _trc("Total invoice") , "TB" , 0 , 'L' , 0) ;
//        $this->Cell($this->get_Pdf_ancho() / 2 , $this->get_Pdf_alto_linea() * 3 , monedaf($invoices['total'] + $invoices['tax']) , "TB" , 1 , 'R' , 0) ;

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
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , ""                      , 0 , 0 , "L" , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Total")           , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Discounts")       , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Base taxable")    , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , _trc("% Tva")           , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Total Tva")       , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Total")           , 0 , 1 , 'R' , 0) ;

        foreach ( tax_list() as $key => $tax ) {
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , "L" , "L" , 0) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;

            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "$tax[value] %" , 0 , 0 , 'R' , 0) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , moneda(invoice_lines_total_by_tax($invoices['id'] , $tax['value'])) , 0 , 0 , 'R' , 0) ;

            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 1 , 'R' , 0) ;
        }


        ## Totales TVA
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "           "           , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , moneda($totalprice)     , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , moneda($discounts)      , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , moneda($totalprice - $discounts) , 0 , 0 , 'R' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , ""                      , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , moneda($totaltax)       , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , moneda($tvac)           , 0 , 1 , 'R' , 0) ;


        
        // Total pago recibidos
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Total Advance")       , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , moneda($total_advance)      , 0 , 1 , 'R' , 0) ;
                ## Total a payer
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("To pay")                  , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , moneda($tvac - $total_advance)  , 0 , 1 , 'R' , 0) ;


        $this->Ln() ;
        
        
        $this->bodyfoot();
        
    }
    
    
    function bodyDate($invoices){
        
        $this->SetFont('Arial' , 'B' , 10) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , _trc("Invoice date") , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , _trc("Expiration date") , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , _trc("From budget") , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , _trc("Invoice") , "" , 1 , 'R' , 0) ;

        $this->SetFont('Arial' , '' , 10) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , substr($invoices['date_registre'],0,10) , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , ($invoices['date_expiration']) , "" , 0 , 'L' , 0) ;
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
        
    function bodyNoValued($invoices , $addresses_billing , $addresses_delivery) {

        global  $color; 


        $ba = $addresses_billing ;
        $da = $addresses_delivery ;

        # 1
        # 1
        # 1
        $this->SetFont('Arial' , 'B' , 10) ;
        $resetx = $this->GetX() ;
        $resetY = $this->GetY() ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , _trc("Billing Address") , "B" , 1 , 'L' , 0) ;
        $this->SetFont('Arial' , '' , 10) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , contacts_formated($ba['contact_id']) , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , $ba['number'] . ", " . $ba['address'] . "" , "" , 1 , 'L' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , $ba['postcode'] . " " . $ba['barrio'] , "" , 1 , 'L' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , $ba['city'] . " " . $ba['country'] , "" , 1 , 'L' , 0) ;



        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;


        $this->SetX($resetx + 102 + ($this->get_Pdf_ancho() / 2)) ;
        $this->SetY($resetY) ;
        $this->SetFont('Arial' , 'B' , 10) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , _trc("Delivery address") . mb_detect_encoding(("Delivery address")) , "B" , 1 , 'L' , 0) ;
        $this->SetFont('Arial' , '' , 10) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , contacts_formated($da['contact_id']) , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , $da['number'] . ", " . $da['address'] . "" , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , $da['postcode'] . " " . $da['barrio'] , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , $da['city'] . " " . $da['country'] , "" , 1 , 'L' , 0) ;



        $this->Ln() ;

        # 777
        # 777
        # 777
        # 777
        $this->SetFont('Arial' , 'B' , 10) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , _trc("Date") , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , _trc("From budget") , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , _trc("Invoice") , "" , 1 , 'R' , 0) ;

        $this->SetFont('Arial' , '' , 10) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , $invoices['date_registre'] , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , $invoices['budget_id'] , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , $invoices['id'] , "" , 1 , 'R' , 0) ;


        $this->Ln() ;

        ## TOTAL DE LA FACTURA
        ## TOTAL DE LA FACTURA
        ## TOTAL DE LA FACTURA
        $this->SetFont('Arial' , 'B' , 25) ;
        $this->Cell($this->get_Pdf_ancho() / 2 , $this->get_Pdf_alto_linea() * 3 , _trc("Total invoice") , "TB" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 2 , $this->get_Pdf_alto_linea() * 3 , "-" , "TB" , 1 , 'R' , 0) ;

        // esto es el encabeado
        $this->encabezados() ;


        ## ITEMS 
        ## ITEMS 
        ## ITEMS 
        ## ITEMS 
        $this->SetFillColor(220 , 220 , 220) ;
        $this->SetFont('Arial' , '' , 8) ;
        
        
        $totalprice = 0; 
            $subtotal = 0; 
            $totaltax = 0; 
            $tvac = 0; 
            $discounts = 0; 
            $discounts_mode = null; 
        $i = 0 ;
        foreach ( invoice_lines_list_by_invoice_id($invoices['id']) as $key => $ii ) {
            $totalprice = $totalprice + $ii['price'] ;
            $subtotal = $subtotal + $ii['subtotal'] ;
            $totaltax = $totaltax + $ii['totaltax'] ;
            $tvac = $tvac + ($ii["subtotal"] + $ii["totaltax"]) ;
            $discounts = $discounts + ($ii["totaldiscounts"]) ;
            $discounts_mode = ($ii['discounts_mode'] == '%') ? "$ii[discounts] $ii[discounts_mode]" : "" ;


            $color = ( $i % 2 == 0 ) ? 1 : 0 ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 7 , $this->get_Pdf_alto_linea() * 1 , $ii['quantity'] , 0 , 0 , 'L' , $color) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 43 , $this->get_Pdf_alto_linea() * 1 , $ii['description'] , 0 , 0 , "L" , $color) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "-" , 0 , 0 , 'R' , $color) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "-" , 0 , 0 , 'R' , $color) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "-" , 0 , 0 , 'R' , $color) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "-" , 0 , 0 , 'R' , $color) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "-" , 0 , 1 , 'R' , $color) ;
            $i ++ ;
        }






        $this->Ln() ;



        ## TVA            
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 1 , 0 , "L" , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Total") , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Discounts") , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Taxable base") , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , _trc("% Tva") , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Total Tva") , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Total Euros") , 1 , 1 , 'R' , 0) ;

        foreach ( tax_list() as $key => $tax ) {
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , "L" , 0 , 'R' , 0) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , "L" , "L" , "L" , 0) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , "L" , 0 , 'R' , 0) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , "L" , 0 , 'R' , 0) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "" , "L" , 0 , 'R' , 0) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , "L" , 0 , 'R' , 0) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , "LR" , 1 , 'R' , 0) ;
        }


        ## Totales TVA
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "-" , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "-" , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "-" , 1 , 0 , 'R' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , " " , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "-" , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "-" , 1 , 1 , 'R' , 0) ;




        $this->Ln() ;


//

        $this->Ln() ;

//        if ($pdf_order["express"]) {
//            $this->SetFillColor(248, 243, 43);
//            $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea() * 1, _trc("EXPRESS"), 1, 0, 'L', 1);
//        } else {
//            $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea() * 1, "99", 1, 0, 'L', 0);
//        }




        $this->Ln() ;
    }

    function details($budgets) {

        global $color; 
        # 1
        # 1
        # 1
        $this->SetFont('Arial' , 'B' , 10) ;
        $resetx = $this->GetX() ;
        $resetY = $this->GetY() ;



        //encabezados(); 
        ## ITEMS 
        ## ITEMS 
        ## ITEMS 
        ## ITEMS 
        $this->SetFillColor(220 , 220 , 220) ;
        $this->SetFont('Arial' , '' , 10) ;

        $i = 1 ;
        foreach ( $budgets as $key => $budget ) {
            $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 3 , $this->get_Pdf_alto_linea() * 1 , _trc("Order") . " " . $budget['id'] , 0 , 1 , 'L' , $color) ;

            foreach ( $budget as $key => $butget_line ) {

                $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 3 , $this->get_Pdf_alto_linea() * 1 , "//" , 0 , 0 , 'L' , $color) ;
                $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , $budget['id'] , 0 , 0 , 'L' , $color) ;
                $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , $budget['date_registre'] , 0 , 0 , 'L' , $color) ;
                $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 8 , $this->get_Pdf_alto_linea() * 1 , '$budget[ref]' , 0 , 0 , 'L' , $color) ;
                $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 20 , $this->get_Pdf_alto_linea() * 1 , '$budget[patient_id]' , 0 , 0 , "L" , $color) ;
                $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 3 , $this->get_Pdf_alto_linea() * 1 , "99" , 0 , 0 , 'R' , $color) ;
                $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "002233445566778899" , 0 , 0 , 'R' , $color) ;
                $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 32 , $this->get_Pdf_alto_linea() * 1 , "Buchon droite silicon roue oticon event 15, option " , 0 , 1 , 'L' , $color) ;
            }
            $i ++ ;
        }


        $this->Ln() ;
    }
    
    
    
    function condiciones($condiciones) {
        parent::condiciones($condiciones);
    }








    function virement(){
                global  $config_company_logo; 

        $this->SetFont('Arial', 'I', 8);
        $this->SetFillColor(255, 200, 250);
        
        $this->Image("v.jpg", 20, 175, 0);
    }
    
    

}
