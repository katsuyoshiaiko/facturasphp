<?php

include pdf_template("miri");

class RAPPEL extends MIRI {

    function body($invoices) {



        ## ENCABEZADOS DE LOS ITEMS
        ## ENCABEZADOS DE LOS ITEMS
        ## ENCABEZADOS DE LOS ITEMS
        $this->SetFont('Arial' , 'B' , 10) ;
        $this->SetFillColor(249 , 249 , 249) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , _trc("Invoice") , 0 , 0 , 'L' , 1) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 20 , $this->get_Pdf_alto_linea() * 1 , _trc("Date") , 0 , 0 , 'L' , 1) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 25 , $this->get_Pdf_alto_linea() * 1 , _trc("Communication") , 0 , 0 , 'L' , 1) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Total") , "0" , 0 , 'R' , 1) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Advance") , "0" , 0 , 'R' , 1) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Solde") , "0" , 1 , 'R' , 1) ;




        ## ITEMS 
        ## ITEMS 
        ## ITEMS 
        ## ITEMS 
        $this->SetFillColor(220 , 220 , 220) ;
        $this->SetFont('Arial' , '' , 8) ;

        $total = 0 ;
        $tax = 0 ;
        $advance = 0 ;

        $i = 0 ;
        foreach ( $invoices as $key => $ii ) {

            $color = ( $i % 2 == 0 ) ? 1 : 0 ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , $ii['id'] , 0 , 0 , 'L' , $color) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 20 , $this->get_Pdf_alto_linea() * 1 , $ii['date_registre'] , 0 , 0 , "L" , $color) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 25 , $this->get_Pdf_alto_linea() * 1 , $ii['ce'] , 0 , 0 , "L" , $color) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , moneda($ii['total'] + $ii['tax']) , 0 , 0 , 'R' , $color) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , moneda($ii['advance']) , 0 , 0 , 'R' , $color) ;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , moneda(($ii['total'] + $ii['tax']) - $ii['advance']) , 0 , 1 , 'R' , $color) ;
            $total = $total + $ii['total'] ;
            $tax = $tax + $ii['tax'] ;
            $advance = $advance + $ii['advance'] ;

            $i ++ ;
        }

        $this->Ln();


        ## TOTALES

        $color = ( $i % 2 == 0 ) ? 1 : 0 ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 7 , $this->get_Pdf_alto_linea() * 1 , _trc("Totals") , 0 , 0 , 'L' , $color) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 48 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , "L" , $color) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , moneda($total + $tax) , 0 , 0 , 'R' , $color) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , moneda($advance) , 0 , 0 , 'R' , $color) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , moneda(($total + $tax) - $advance) , 0 , 1 , 'R' , $color) ;

        $this->Ln() ;
        $this->Ln() ;




        ## TOTAL DE LA FACTURA
        ## TOTAL DE LA FACTURA
        ## TOTAL DE LA FACTURA
        $this->SetFont('Arial' , 'B' , 25) ;
        $this->Cell($this->get_Pdf_ancho() / 2 , $this->get_Pdf_alto_linea() * 3 , _trc("Total") , "TB" , 0 , 'L' , 0) ;
        $this->Cell($this->get_Pdf_ancho() / 2 , $this->get_Pdf_alto_linea() * 3 , monedaf(($total + $tax) - $advance) , "TB" , 1 , 'R' , 0) ;

        $this->SetFont('Arial' , '' , 8) ;






        $this->Ln() ;
    }

    function addresses($addresses_billing , $addresses_delivery) {




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

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , $ba[number] . ", " . $ba[address] . "" , "" , 1 , 'L' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , $ba[postcode] . " " . $ba[barrio] , "" , 1 , 'L' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , $ba[city] . " " . $ba[country] , "" , 1 , 'L' , 0) ;



        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;


        $this->SetX($resetx + 102 + ($this->get_Pdf_ancho() / 2)) ;
        $this->SetY($resetY) ;
        $this->SetFont('Arial' , 'B' , 10) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , _trc("Delivery address") , "B" , 1 , 'L' , 0) ;
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
    }

    function addresses_billing($addresses_billing, $reciver_id) {


        $reciver_name = contacts_field_id("name", $reciver_id); 
        $reciver_lastname = contacts_field_id("lastname", $reciver_id); 

        $ba = $addresses_billing ;


        $this->SetFont('Arial' , 'B' , 10) ;
        $resetx = $this->GetX() ;
        $resetY = $this->GetY() ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;
        $this->SetFont('Arial' , '' , 10) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;



        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;


        $this->SetX($resetx + 102 + ($this->get_Pdf_ancho() / 2)) ;
        $this->SetY($resetY) ;
        $this->SetFont('Arial' , 'B' , 10) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , '' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , '' , 0) ;
        $this->SetFont('Arial' , '' , 10) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , contacts_formated($ba['contact_id']) , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , utf8_decode("$reciver_name $reciver_lastname") , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , $ba['number'] . ", " . $ba['address'] . "" , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , $ba['postcode'] . " " . $ba['barrio'] , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , $ba['city'] . " " . $ba['country'] , "" , 1 , 'L' , 0) ;



        $this->Ln() ;
        $this->Ln() ;
        $this->Ln() ;
    }

    function addresses_delivery($addresses_billing , $addresses_delivery) {




        $ba = $addresses_billing ;
        $da = $addresses_delivery ;

        # 1
        # 1
        # 1
        $this->SetFont('Arial' , 'B' , 10) ;
        $resetx = $this->GetX() ;
        $resetY = $this->GetY() ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , _trc("") , "B" , 1 , 'L' , 0) ;
        $this->SetFont('Arial' , '' , 10) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , "" , 1 , 'L' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , "" , 1 , 'L' , 0) ;



        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , "TVA: BE123-456-789" , "" , 1 , 'L' , 0) ;


        $this->SetX($resetx + 102 + ($this->get_Pdf_ancho() / 2)) ;
        $this->SetY($resetY) ;
        $this->SetFont('Arial' , 'B' , 10) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , _trc("Delivery address") , "B" , 1 , 'L' , 0) ;
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
    }

}

