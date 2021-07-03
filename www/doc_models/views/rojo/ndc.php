<?php

include pdf_template("rojo") ;

class NDC extends ROJO {

    function body($credit_notes) {

        # 777
        # 777
        # 777
        # 777
        $this->SetFont('Arial' , 'B' , 10) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , _trc("Date") , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 0 , 'L' , 0) ;
        //$this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , _trc("Credit note") , "" , 1 , 'R' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'R' , 0) ;

        $this->SetFont('Arial' , '' , 10) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , substr($credit_notes['date_registre'], 0,10) . ' yyyy/mm/dd' , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 'L' , 0) ;
        //$this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , $credit_notes['id'] , "" , 1 , 'R' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'R' , 0) ;


        $this->Ln() ;



        ## ENCABEZADOS DE LOS ITEMS
        ## ENCABEZADOS DE LOS ITEMS
        ## ENCABEZADOS DE LOS ITEMS
        $this->SetFont('Arial' , 'B' , 10) ;
        $this->SetFillColor(249 , 249 , 249) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , _trc("Qty") , 0 , 0 , 'L' , 1) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 80 , $this->get_Pdf_alto_linea() * 1 , _trc("Description") , 0 , 0 , 'L' , 1) ;
        //$this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , _trc("Price") , "0" , 0 , 'R' , 1) ;
        //$this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , _trc("Discount") , "0" , 0 , 'R' , 1) ;
        //$this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , _trc("HTVA") , "0" , 0 , 'R' , 1) ;
        //$this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , _trc("TVA") , "0" , 0 , 'R' , 1) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , _trc("TVAC") , "0" , 1 , 'R' , 1) ;



        ## ITEMS 
        ## ITEMS 
        ## ITEMS 
        ## ITEMS 
        $this->SetFillColor(250, 250, 250);
        $this->SetFont('Arial' , '' , 8) ;






        $i = 0 ;
        //foreach ( invoice_lines_list_by_invoice_id($credit_notes[id]) as $key => $cn ) {
        
        $subtotal = 0 ;
        $totaltax = 0 ;
        $totaltaxc = 0;                                                 
        foreach ( credit_note_lines_list_by_credit_note_id($credit_notes['id']) as $key => $cn ) {

              $subtotal = $subtotal + $cn['value'] ;
              $totaltax = $totaltax + $cn['totaltax'] ;
              $totaltaxc = $totaltaxc + $cn['totaltaxc'] ;            
//            $totalprice = $totalprice + $cn['value'] ;
//            $subtotal = $subtotal + $cn['subtotal'] ;
//            $tax = $tax + $cn['totaltax'] ;
//            $tvac = $tvac + ($cn["subtotal"] + $cn["totaltax"]) ;
//            $discounts = $discounts + ($cn["totaldiscounts"]) ;
//            $discounts_mode = ($cn['discounts_mode'] == '%') ? "$cn[discounts]$cn[discounts_mode]" : "" ;


            $color = ( $i % 2 == 0 ) ? 1 : 0 ;
            
            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , $cn['quantity'] , 0 , 0 , 'L' , false) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 80 , $this->get_Pdf_alto_linea() * 1 , '' , 0 , 0 , "L" , false) ;
            //$this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , moneda($cn['value']) , 0 , 0 , 'R' , $color) ;
            //$this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "$discounts_mode " . moneda($cn) , 0 , 0 , 'R' , $color) ;
            //$this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , moneda($cn['subtotal']) , 0 , 0 , 'R' , $color) ;
            //$this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , moneda($cn['totaltax']) , 0 , 0 , 'R' , $color) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , monedaf($cn['totaltaxc'] ) , 0 , 1 , 'R' , false) ;
                                         //// MULTI CELDA
                $this->SetY($this->GetY() - 4);
                $this->SetX($this->GetX() + 10);
                $this->MultiCell(
                        ($this->get_Pdf_ancho() / 100) * 80, 
                        $this->get_Pdf_alto_linea() * 0.5,
                        utf8_decode($cn['description']), 
                        0, 
                        'T', 
                        0
                        );
                $this->SetY($this->GetY() + 0); // le da un ancho en la base del multicell
                $this->Ln();
                // MULTI CELDA
            $i ++ ;
        }

        
                ## TOTAL DE LA FACTURA
        ## TOTAL DE LA FACTURA
        ## TOTAL DE LA FACTURA
        $this->SetFont('Arial' , 'B' , 20) ;
        $this->Cell($this->get_Pdf_ancho() / 2 , $this->get_Pdf_alto_linea() * 2 , _trc("Total") , "TB" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 2 , $this->get_Pdf_alto_linea() * 2 , monedaf($credit_notes['total'] + $credit_notes['tax']) , "TB" , 1 , 'R' , 0) ;


        $this->Ln() ;
    }

}
