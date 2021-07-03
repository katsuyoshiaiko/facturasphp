<?php

include pdf_template("miri");

class INVOICE extends MIRI {

    function body($invoices , $addresses_billing , $addresses_delivery) {
        
        global $u_owner_id, $config_bank; 

        $total_advance = (balance_total_pay_by_invoice($invoices['id']))? balance_total_pay_by_invoice($invoices['id']) : 0;

        $this->Ln() ;
        $this->Ln() ;
        

        # 777
        # 777
        # 777
        # 777
        $this->SetFont('Arial' , 'B' , 10) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , _trc("Date") , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , _trc("Invoice") , "" , 1 , 'R' , 0) ;

        $this->SetFont('Arial' , '' , 10) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , substr($invoices['date_registre'], 0, 10) , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , $invoices['budget_id'] , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , $invoices['id'] , "" , 1 , 'R' , 0) ;


        $this->Ln() ;

        ## TOTAL DE LA FACTURA
        ## TOTAL DE LA FACTURA
        ## TOTAL DE LA FACTURA
        $this->SetFont('Arial' , 'B' , 15) ;
        $this->Cell($this->get_Pdf_ancho() / 2 , $this->get_Pdf_alto_linea() * 1.8 , _trc("Invoice") , "TB" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 2 , $this->get_Pdf_alto_linea() * 1.8 , monedaf($invoices['total'] + $invoices['tax']) , "TB" , 1 , 'R' , 0) ;

        // esto es el encabeado
        $this->encabezados() ;
        
        
        
        ## ITEMS 
        ## ITEMS 
        ## ITEMS 
        ## ITEMS 
        $this->SetFillColor(249 , 249 , 249) ;
        $this->SetFont('Arial' , '' , 6) ;


        $totalprice = 0 ;
        $subtotal = 0 ;
        $totaltax = 0 ;
        $tvac = 0 ;
        $discounts = 0 ;
        $discounts_mode = 0 ;
 

        $i = 1 ;
        foreach ( invoice_lines_list_by_invoice_id($invoices['id']) as $key => $ii ) {
 
            // Esto es el la parte de arriba
            if($this->GetY() > 265){                
                $this->AddPage();                 
                $this->bodyDate($invoices); 
                $this->Ln(); 
                $this->encabezados();                                
            }   
            
            
            $totalprice = $totalprice + ($ii['price'] * $ii['quantity'] ) ;
            $subtotal = $subtotal + $ii['subtotal'] ;
            $totaltax = $totaltax + $ii['totaltax'] ;
            $tvac = $tvac + ($ii["subtotal"] + $ii["totaltax"]) ;
            $totaldiscounts = $totaldiscounts + ($ii["totaldiscounts"]) ;
            $discounts_mode = ($ii['discounts_mode'] == '%') ? "$ii[discounts]$ii[discounts_mode]" : "" ;
                      
            
            // MUESTRO SOLO SI TIENE PRECIO O ....
            if( 
                    $ii['price'] > 0 ||
                    $ii['code'] == "PAT" ||
                    $ii['code'] == "ORDER" ||
                    $ii['code'] == "SIDEL" ||
                    $ii['code'] == "SIDER"                                        
            ){
           
            $color = ( $i % 2 == 0 ) ? 1 : 0 ;
            
            // si es order agregamos un espacio 
            if( $ii['code'] == 'ORDER'){
             //   $this->Ln();
            }
            
            
            if( $ii['code'] == 'ORDER' ){
                
                $order_id = (int) filter_var($ii['description'], FILTER_SANITIZE_NUMBER_INT);  
                $client_ref = orders_field_id('client_ref', $order_id);                                
                $office_id = (orders_field_id("company_id", $order_id ));                
                $office_name = contacts_formated(orders_field_id("company_id", $order_id ));
                
                // id cliente | nombre de empresa | referencia dela empresa 
                $this->Cell(($this->get_Pdf_ancho() / 100) * 100 , $this->get_Pdf_alto_linea() * 0.7 
                        , "$office_id  $office_name / " . _trc("Your reference") . " : $client_ref"  
                        , 'B' , 1 , 'L' , $color) ;
            }
            
            
            // si el precio es cero, no puestro nada 
            
            // sino muestro con precios
            
            //if( $ii['price'] > 0 ){  //              
            if( 1 == 1  ){  //              
                $this->Cell(($this->get_Pdf_ancho() / 100) *  5 , $this->get_Pdf_alto_linea() * 0.7 , $ii['quantity']   , 0 , 0 , 'L' , $color) ;            
                $this->Cell(($this->get_Pdf_ancho() / 100) *  7 , $this->get_Pdf_alto_linea() * 0.7 , $ii['code']       , 0 , 0 , "L" , $color) ;            
                $this->Cell(($this->get_Pdf_ancho() / 100) * 28 , $this->get_Pdf_alto_linea() * 0.7 , ''                , 0 , 0 , "L" , $color) ;
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 0.7 , moneda($ii['price']) , 0 , 0 , 'R' , $color) ;
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 0.7 , moneda($ii['price'] * $ii['quantity']) , 0 , 0 , 'R' , $color) ;
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 0.7 , "$discounts_mode " . moneda($ii['totaldiscounts']) , 0 , 0 , 'R' , $color) ;
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 0.7 , moneda($ii['subtotal']) , 0 , 0 , 'R' , $color) ;
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 0.7 , "(".$ii['tax']."%) ".moneda($ii['totaltax']) , 0 , 0 , 'R' , $color) ;
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 0.7 , moneda($ii['subtotal'] + $ii['totaltax']) , 0 , 1 , 'R' , $color) ;
            }else{            
                $this->Cell(($this->get_Pdf_ancho() / 100) *  5 , $this->get_Pdf_alto_linea() * 0.7 , $ii['quantity']   , 0 , 0 , 'L' , $color) ;            
                $this->Cell(($this->get_Pdf_ancho() / 100) *  7 , $this->get_Pdf_alto_linea() * 0.7 , $ii['code']       , 0 , 0 , "L" , $color) ;            
                $this->Cell(($this->get_Pdf_ancho() / 100) * 28 , $this->get_Pdf_alto_linea() * 0.7 , ''                , 0 , 0 , "L" , $color) ;
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 0.7 , '' , 0 , 0 , 'R' , $color) ;
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 0.7 , "" , 0 , 0 , 'R' , $color) ;
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 0.7 , "" , 0 , 0 , 'R' , $color) ;
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 0.7 , "" , 0 , 0 , 'R' , $color) ;
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 0.7 , "" , 0 , 0 , 'R' , $color) ;
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 0.7 , "" , 0 , 1 , 'R' , $color) ;
            }
//// MULTI CELDA
                $this->SetY($this->GetY() -3); // distancia desde arriba
                $this->SetX($this->GetX() +22);
                $this->MultiCell(
                        ($this->get_Pdf_ancho() / 100) * 28, 
                        $this->get_Pdf_alto_linea() * 0.5,
                        utf8_decode($ii['description']), 
                        0, 
                        'T', 
                        0
                        );
                $this->SetY($this->GetY() + 0); // le da un ancho en la base del multicell
                //$this->Ln();
                // MULTI CELDA
            
            $i ++ ;
            } 
            
            
            
           
        }
      
        $this->SetFont('Arial' , '' , 8) ;
   
        // Esto necesita de un espacio minimo de 
      // X si es inferior agregamos un apagina 
      if($this->GetY() > 178  ){
          
          while ( $this->GetY() < 265 ) {
              $color = ( $i++ % 2 == 0 ) ? 1 : 0 ;
              $this->lineasVacias($color);
          }
          $this->Cell(($this->get_Pdf_ancho() / 100) * 100 , $this->get_Pdf_alto_linea() * 1 , ">>>" , "T" , 1 , 'R' , 0) ;
          $this->AddPage(); 
      }

      // 
      if($this->GetY() < 100 ){         
          while ( $this->GetY() < 180 ) {
              $color = ( $i++ % 2 == 0 ) ? 1 : 0 ;
              $this->lineasVacias($color);
          }
      }
        
      
      
      
      //$this->Ln() ;
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
        // PAGOS RECIVIDOS
        // PAGOS RECIVIDOS
        // PAGOS RECIVIDOS
        // PAGOS RECIVIDOS
        // PAGOS RECIVIDOS      
        // Total pago recibidos
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Total Advance") , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , moneda($total_advance) , 'LR' , 1 , 'R' , 0) ;
                ## Total a payer
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , 0) ;
        
        $this->SetFont('Arial' , '' , 15) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1.5 , _trc("To pay"), 0 , 0 , 'R' , 0) ;
        
        
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1.5 , moneda($tvac - $total_advance) , "RLTB" , 1 , 'R' , 0) ;
    
        $this->SetFont('Arial' , '' , 8) ;
        //$this->Ln() ;
        
        $this->bodyfoot();
                
                
                
    }
        
    function bodyDate($invoices) {

        
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
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , substr($invoices['date_registre'], 0, 10), "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , $invoices['budget_id'] , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , $invoices['id'] , "" , 1 , 'R' , 0) ;


    }         
    
    function bodyfoot(){
        global $invoices, $tvac; 
        
        
        
        
        
        //$this->communication($invoices);                                                
        $this->Ln();         
        $this->blocTva(); 
        $this->Ln(); 
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

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , utf8_decode(contacts_formated($ba['contact_id'])) , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , utf8_decode($ba['number']) . " " . utf8_decode($ba['address']) . "" , "" , 1 , 'L' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , utf8_decode($ba['postcode']) . " " . utf8_decode($ba['barrio']) , "" , 1 , 'L' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , utf8_decode($ba['city']) . " " . utf8_decode($ba['country']) , "" , 1 , 'L' , 0) ;



        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;


        $this->SetX($resetx + 102 + ($this->get_Pdf_ancho() / 2)) ;
        $this->SetY($resetY) ;
        $this->SetFont('Arial' , 'B' , 10) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , _trc("Delivery address") . mb_detect_encoding(("Delivery address")) , "B" , 1 , 'L' , 0) ;
        $this->SetFont('Arial' , '' , 10) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , utf8_decode(contacts_formated($da['contact_id'])) , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , utf8_decode($da['number']) . ", " . utf8_decode($da['address']) . "" , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , utf8_decode($da['postcode']) . " " . utf8_decode($da['barrio']) , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , utf8_decode($da['city']) . " " . utf8_decode($da['country']) , "" , 1 , 'L' , 0) ;



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
