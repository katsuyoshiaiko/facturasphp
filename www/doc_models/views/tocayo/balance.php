<?php

include pdf_template("tocayo") ;

class INVOICE extends TOCAYO {


    function body($invoices , $addresses_billing , $addresses_delivery) {




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



        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , _trc("Véronica") . "TVA: BE123-456-789" , "" , 1 , 'L' , 0) ;


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
        $this->Cell($this->get_Pdf_ancho() / 2 , $this->get_Pdf_alto_linea() * 3 , monedaf($invoices['total'] + $invoices['tax']) , "TB" , 1 , 'R' , 0) ;

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
            $discounts_mode = 0;
        
        
        
        $i = 0 ;
        foreach ( invoice_lines_list_by_invoice_id($invoices['id']) as $key => $invoice_items ) {
            $totalprice = $totalprice + $invoice_items['price'] ;
            $subtotal = $subtotal + $invoice_items['subtotal'] ;
            $totaltax = $totaltax + $invoice_items['totaltax'] ;
            $tvac = $tvac + ($invoice_items["subtotal"] + $invoice_items["totaltax"]) ;
            $discounts = $discounts + ($invoice_items["totaldiscounts"]) ;
            $discounts_mode = ($invoice_items['discounts_mode'] == '%') ? "$invoice_items[discounts]$invoice_items[discounts_mode]" : "" ;


            $color = ( $i % 2 == 0 ) ? 1 : 0 ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 7 , $this->get_Pdf_alto_linea() * 1 , $i . $invoice_items['quantity'] , 0 , 0 , 'L' , $color) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 43 , $this->get_Pdf_alto_linea() * 1 , $invoice_items['description'] , 0 , 0 , "L" , $color) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , moneda($invoice_items['price']) , 0 , 0 , 'R' , $color) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "$discounts_mode " . moneda($invoice_items['discounts_mode']) , 0 , 0 , 'R' , $color) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , moneda($invoice_items['subtotal']) , 0 , 0 , 'R' , $color) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , moneda($invoice_items['totaltax']) , 0 , 0 , 'R' , $color) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , moneda($invoice_items['subtotal'] + $invoice_items['totaltax']) , 0 , 1 , 'R' , $color) ;
            $i ++ ;
            
        }
                
           
            
            
            
        
            $this->Ln();



        ## TVA            
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 1 , 0 , "L" , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _tr("Total") , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _tr("Discounts") , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "Base taxable" , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , _tr("% Tva") , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _tr("Total Tva") , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "Total EUR" , 1 , 1 , 'R' , 0) ;

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




        $this->Ln() ;




        # CONDICIOES DE PAGO
        # CONDICIOES DE PAGO
        # CONDICIOES DE PAGO
        $this->SetFont('Arial' , 'B' , 10) ;
        $this->Cell(($this->get_Pdf_ancho() / 1) * 1 , $this->get_Pdf_alto_linea() * 1 , _tr("To pay in 15 days ") , "" , 1 , 'L' , 0) ;
        // $this->Cell(($this->get_Pdf_ancho() / 1) * 1 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;

        $this->Ln() ;
        $this->SetFont('Arial' , '' , 10) ;
        $this->Cell(($this->get_Pdf_ancho() / 1) * 1 , $this->get_Pdf_alto_linea() * 1 , "Pacific bank -  Accunt numer 123-456-789 - IBAN 9966 - SWIF 986566658 " , "" , 1 , 'C' , 0) ;
        //$this->Cell(($this->get_Pdf_ancho() / 1) * 1 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;
        //$this->Cell(($this->get_Pdf_ancho() / 1) * 1 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;
        //$this->Cell(($this->get_Pdf_ancho() / 1) * 1 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;

        $this->Ln() ;
        $this->Cell($this->get_Pdf_ancho() , $this->get_Pdf_alto_linea() , _tr("Net to pay") . ' ' . $tvac , 0 , 0 , 'C' , 0) ;


        $this->Ln() ;
        $this->Ln() ;

        $this->Cell($this->get_Pdf_ancho() , $this->get_Pdf_alto_linea() , "Comunication: +++016/7910/34042+++ " , 1 , 0 , 'C' , 1) ;



        $this->Ln() ;

//        if ($pdf_order["express"]) {
//            $this->SetFillColor(248, 243, 43);
//            $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea() * 1, _trc("EXPRESS"), 1, 0, 'L', 1);
//        } else {
//            $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea() * 1, "99", 1, 0, 'L', 0);
//        }




        $this->Ln() ;
    }

    
    
    
    
    function bodyNoValued($invoices , $addresses_billing , $addresses_delivery) {




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

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , contacts_formated($ba[contact_id]) , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , $ba[number] . ", " . $ba[address] . "" , "" , 1 , 'L' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , $ba[postcode] . " " . $ba[barrio] , "" , 1 , 'L' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , $ba[city] . " " . $ba[country] , "" , 1 , 'L' , 0) ;



        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , _trc("Véronica") . "TVA: BE123-456-789" , "" , 1 , 'L' , 0) ;


        $this->SetX($resetx + 102 + ($this->get_Pdf_ancho() / 2)) ;
        $this->SetY($resetY) ;
        $this->SetFont('Arial' , 'B' , 10) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , _trc("Delivery address") . mb_detect_encoding(("Delivery address")) , "B" , 1 , 'L' , 0) ;
        $this->SetFont('Arial' , '' , 10) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , contacts_formated($da[contact_id]) , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , $da[number] . ", " . $da[address] . "" , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , $da[postcode] . " " . $da[barrio] , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , $da[city] . " " . $da[country] , "" , 1 , 'L' , 0) ;



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
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , $invoices[date_registre] , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , $invoices[budget_id] , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , $invoices[id] , "" , 1 , 'R' , 0) ;


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

        $i = 0 ;
        foreach ( invoice_lines_list_by_invoice_id($invoices[id]) as $key => $invoice_items ) {
            $totalprice = $totalprice + $invoice_items['price'] ;
            $subtotal = $subtotal + $invoice_items['subtotal'] ;
            $totaltax = $totaltax + $invoice_items['totaltax'] ;
            $tvac = $tvac + ($invoice_items["subtotal"] + $invoice_items["totaltax"]) ;
            $discounts = $discounts + ($invoice_items["totaldiscounts"]) ;
            $discounts_mode = ($invoice_items['discounts_mode'] == '%') ? "$invoice_items[discounts]$invoice_items[discounts_mode]" : "" ;


            $color = ( $i % 2 == 0 ) ? 1 : 0 ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 7 , $this->get_Pdf_alto_linea() * 1 , $invoice_items[quantity] , 0 , 0 , 'L' , $color) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 43 , $this->get_Pdf_alto_linea() * 1 , $invoice_items[description] , 0 , 0 , "L" , $color) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "-" , 0 , 0 , 'R' , $color) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "-", 0 , 0 , 'R' , $color) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "-", 0 , 0 , 'R' , $color) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "-", 0 , 0 , 'R' , $color) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "-" , 0 , 1 , 'R' , $color) ;
            $i ++ ;
            
        }
                
           
            
            
            
        
            $this->Ln();



        ## TVA            
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 1 , 0 , "L" , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _tr("Total") , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _tr("Discounts") , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "Base taxable" , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , _tr("% Tva") , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _tr("Total Tva") , 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "Total EUR" , 1 , 1 , 'R' , 0) ;

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
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "", 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "-", 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "-", 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "-", 1 , 0 , 'R' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , " ", 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "-", 1 , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "-", 1 , 1 , 'R' , 0) ;




        $this->Ln() ;




        # CONDICIOES DE PAGO
        # CONDICIOES DE PAGO
        # CONDICIOES DE PAGO
        $this->SetFont('Arial' , 'B' , 10) ;
        $this->Cell(($this->get_Pdf_ancho() / 1) * 1 , $this->get_Pdf_alto_linea() * 1 , _tr("To pay in 15 days ") , "" , 1 , 'L' , 0) ;
        // $this->Cell(($this->get_Pdf_ancho() / 1) * 1 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;

        $this->Ln() ;
        $this->SetFont('Arial' , '' , 10) ;
        $this->Cell(($this->get_Pdf_ancho() / 1) * 1 , $this->get_Pdf_alto_linea() * 1 , "Pacific bank -  Accunt numer 123-456-789 - IBAN 9966 - SWIF 986566658 " , "" , 1 , 'C' , 0) ;
        //$this->Cell(($this->get_Pdf_ancho() / 1) * 1 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;
        //$this->Cell(($this->get_Pdf_ancho() / 1) * 1 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;
        //$this->Cell(($this->get_Pdf_ancho() / 1) * 1 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;

        $this->Ln() ;
        $this->Cell($this->get_Pdf_ancho() , $this->get_Pdf_alto_linea() , _tr("Net to pay") . ' ' . $tvac , 0 , 0 , 'C' , 0) ;


        $this->Ln() ;
        $this->Ln() ;

        $this->Cell($this->get_Pdf_ancho() , $this->get_Pdf_alto_linea() , "Comunication: +++016/7910/34042+++ " , 1 , 0 , 'C' , 1) ;



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
            $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 3 , $this->get_Pdf_alto_linea() * 1 , _tr("Order") . " " . $budget[id] , 0 , 1 , 'L' , $color) ;

            foreach ( $budget as $key => $butget_line ) {

                $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 3 , $this->get_Pdf_alto_linea() * 1 , "//" , 0 , 0 , 'L' , $color) ;
                $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , $budget[id] , 0 , 0 , 'L' , $color) ;
                $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , $budget[date - registre] , 0 , 0 , 'L' , $color) ;
                $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 8 , $this->get_Pdf_alto_linea() * 1 , $budget[ref] , 0 , 0 , 'L' , $color) ;
                $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 20 , $this->get_Pdf_alto_linea() * 1 , $budget[patient_id] , 0 , 0 , "L" , $color) ;
                $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 3 , $this->get_Pdf_alto_linea() * 1 , "99" , 0 , 0 , 'R' , $color) ;
                $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "002233445566778899" , 0 , 0 , 'R' , $color) ;
                $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 32 , $this->get_Pdf_alto_linea() * 1 , "Buchon droite silicon roue oticon event 15, option " , 0 , 1 , 'L' , $color) ;
            }
            $i ++ ;
        }


        $this->Ln() ;
    }

}
