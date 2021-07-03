<?php

include pdf_template("budget") ;


class NDE extends BUDGET {

//   function body($budget) {
//
//        $this->Ln() ;
//
//        # 777
//        # 777
//        # 777
//        # 777
//        $this->SetFont('Arial' , 'B' , 10) ;
//        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , _trc("Date") , "" , 0 , 'L' , 0) ;
//        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , "---" , "" , 0 , 'L' , 0) ;
//        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , _trc("From order") , "" , 0 , 'L' , 0) ;
//        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , _trc("Budget") , "" , 1 , 'R' , 0) ;
//
//        $this->SetFont('Arial' , '' , 10) ;
//        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , substr($budget['date_registre'] , 0 , 10) , "" , 0 , 'L' , 0) ;
//        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 0 , 'L' , 0) ;
//        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 0 , 'L' , 0) ;
//        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , $budget['id'] , "" , 1 , 'R' , 0) ;
//
//
//        $this->Ln() ;
//
//        ## TOTAL DE LA FACTURA
//        ## TOTAL DE LA FACTURA
//        ## TOTAL DE LA FACTURA
//        $this->SetFont('Arial' , 'B' , 25) ;
//        $this->Cell($this->get_Pdf_ancho() / 2 , $this->get_Pdf_alto_linea() * 3 , _trc("Total") , "TB" , 0 , 'L' , 0) ;
//        $this->Cell($this->get_Pdf_ancho() / 2 , $this->get_Pdf_alto_linea() * 3 , monedaf($budget['total'] + $budget['tax']) , "TB" , 1 , 'R' , 0) ;
//
//        // esto es el encabeado
//        $this->encabezados() ;
//
//
//        ## ITEMS 
//        ## ITEMS 
//        ## ITEMS 
//        ## ITEMS 
//        $this->SetFillColor(220 , 220 , 220) ;
//        $this->SetFont('Arial' , '' , 8) ;
//
//
//        $totalprice = 0 ;
//        $subtotal = 0 ;
//        $totaltax = 0 ;
//        $tvac = 0 ;
//        $totaldiscounts = 0 ;
//        $discounts_mode = 0 ;
//
//
//
//        $i = 0 ;
//        //foreach ( invoice_lines_list_by_invoice_id($budget['id']) as $key => $line ) {
//        foreach ( budget_lines_list_by_budget_id($budget['id']) as $key => $line ) {
//            $totalprice = $totalprice + ($line['price'] * $line['quantity'] ) ;
//            $subtotal = $subtotal + $line['subtotal'] ;
//            $totaltax = $totaltax + $line['totaltax'] ;
//            $tvac = $tvac + ($line["subtotal"] + $line["totaltax"]) ;
//            $totaldiscounts = $totaldiscounts + ($line["totaldiscounts"]) ;
//            $discounts_mode = ($line['discounts_mode'] == '%') ? "$line[discounts]$line[discounts_mode]" : "" ;
//
//
//            $color = ( $i % 2 == 0 ) ? 1 : 0 ;
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 7 , $this->get_Pdf_alto_linea() * 1 , $line['quantity'] , 0 , 0 , 'L' , $color) ;
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 7 , $this->get_Pdf_alto_linea() * 1 , utf8_decode($line['code']) , 0 , 0 , "L" , $color) ;
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 36 , $this->get_Pdf_alto_linea() * 1 , utf8_decode($line['description']) , 0 , 0 , "L" , $color) ;
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , moneda($line['price']) , 0 , 0 , 'R' , $color) ;
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "$discounts_mode " . moneda($line["totaldiscounts"]) , 0 , 0 , 'R' , $color) ;
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , moneda($line['subtotal']) , 0 , 0 , 'R' , $color) ;
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , moneda($line['totaltax']) , 0 , 0 , 'R' , $color) ;
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , moneda($line['subtotal'] + $line['totaltax']) , 0 , 1 , 'R' , $color) ;
//            $i ++ ;
//        }
//
//        $this->Ln() ;
//
//        ## TVA            
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 1 , 0 , "L" , 0) ;
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Total") , 1 , 0 , 'R' , 0) ;
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Discounts") , 1 , 0 , 'R' , 0) ;
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "Base taxable" , 1 , 0 , 'R' , 0) ;
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , _trc("% Tva") , 1 , 0 , 'R' , 0) ;
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Total Tva") , 1 , 0 , 'R' , 0) ;
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "Total EUR" , 1 , 1 , 'R' , 0) ;
//
//        foreach ( tax_list() as $key => $tax ) {
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , "L" , 0 , 'R' , 0) ;
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , "L" , "L" , "L" , 0) ;
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , "L" , 0 , 'R' , 0) ;
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , "L" , 0 , 'R' , 0) ;
//
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "$tax[value] %" , "L" , 0 , 'R' , 0) ;
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , 
//                        $this->get_Pdf_alto_linea() * 1 , moneda(budget_lines_total_by_tax($budget['id'] , $tax['value'])) , "L" , 0 , 'R' , 0) ;
//
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , "LR" , 1 , 'R' , 0) ;
//        }
//
//
//        ## Totales TVA
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "           -" , 1 , 0 , 'R' , 0) ;
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , moneda($totalprice) , 1 , 0 , 'R' , 0) ;
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , moneda($totaldiscounts) , 1 , 0 , 'R' , 0) ;
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , moneda($totalprice - $totaldiscounts) , 1 , 0 , 'R' , 0) ;
//
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "" , 1 , 0 , 'R' , 0) ;
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , moneda($totaltax) , 1 , 0 , 'R' , 0) ;
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , moneda($tvac) , 1 , 1 , 'R' , 0) ;
//
//        $this->Ln() ;
//
//        # CONDICIOES DE PAGO
//        $this->SetFont('Arial' , 'B' , 10) ;
//        $this->Cell(($this->get_Pdf_ancho() / 1) * 1 , $this->get_Pdf_alto_linea() * 1 , _trc("Valid 15 days") , "" , 1 , 'L' , 0) ;
//        // $this->Cell(($this->get_Pdf_ancho() / 1) * 1 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;
//        $this->SetFont('Arial' , '' , 8) ;
//
//
//
//
//
//        $this->Ln() ;
//    }
//           
//   function bodyDate($budget) {
//
//        $this->Ln() ;
//
//        # 777
//        # 777
//        # 777
//        # 777
//        $this->SetFont('Arial' , 'B' , 10) ;
//        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , _trc("Date") , "" , 0 , 'L' , 0) ;
//        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 0 , 'L' , 0) ;
//        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , "", "" , 0 , 'L' , 0) ;
//        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'R' , 0) ;
//
//        $this->SetFont('Arial' , '' , 10) ;
//        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , substr($budget['date_registre'] , 0 , 10) , "" , 0 , 'L' , 0) ;
//        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 0 , 'L' , 0) ;
//        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 0 , 'L' , 0) ;
//        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'R' , 0) ;
//
//
//
//        $this->Ln() ;
//    }
//            
//   function bodyNoValued($budget) {
//
//        $this->Ln() ;
//
//        # 777
//        # 777
//        # 777
//        # 777
//        $this->SetFont('Arial' , 'B' , 10) ;
//        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , _trc("Date") , "" , 0 , 'L' , 0) ;
//        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , "---" , "" , 0 , 'L' , 0) ;
//        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , _trc("From order") , "" , 0 , 'L' , 0) ;
//        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , _trc("Budget") , "" , 1 , 'R' , 0) ;
//
//        $this->SetFont('Arial' , '' , 10) ;
//        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , substr($budget['date_registre'] , 0 , 10) , "" , 0 , 'L' , 0) ;
//        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 0 , 'L' , 0) ;
//        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , $budget['order_id'] , "" , 0 , 'L' , 0) ;
//        $this->Cell($this->get_Pdf_ancho() / 4 , $this->get_Pdf_alto_linea() * 1 , $budget['id'] , "" , 1 , 'R' , 0) ;
//
//
//        $this->Ln() ;
//
//        ## TOTAL DE LA FACTURA
//        ## TOTAL DE LA FACTURA
//        ## TOTAL DE LA FACTURA
//        $this->SetFont('Arial' , 'B' , 25) ;
//        $this->Cell($this->get_Pdf_ancho() / 2 , $this->get_Pdf_alto_linea() * 3 , _trc("Total") , "TB" , 0 , 'L' , 0) ;
//        $this->Cell($this->get_Pdf_ancho() / 2 , $this->get_Pdf_alto_linea() * 3 , "", "TB" , 1 , 'R' , 0) ;
//
//        // esto es el encabeado
//        $this->encabezados() ;
//
//
//        ## ITEMS 
//        ## ITEMS 
//        ## ITEMS 
//        ## ITEMS 
//        $this->SetFillColor(220 , 220 , 220) ;
//        $this->SetFont('Arial' , '' , 8) ;
//
//
//        $totalprice = 0 ;
//        $subtotal = 0 ;
//        $totaltax = 0 ;
//        $tvac = 0 ;
//        $totaldiscounts = 0 ;
//        $discounts_mode = 0 ;
//        
//        $description = ""; 
//       // vardump(budget_lines_list_description_lines_by_budget_id($budget['id'])); 
//        
//        
//        $i = 0 ;
//        $j=0; 
//        
//        $des = array(); 
//        
//        //foreach ( invoice_lines_list_by_invoice_id($budget['id']) as $key => $line ) {
//        foreach ( budget_lines_list_description_lines_by_budget_id($budget['id']) as $key => $line ) {
//
//            if( $line['price']  > 0){
//            
//                $description = $description . " " . $line['description']; 
//            } 
//            
//            
//            
//            $color = ( $i % 2 == 0 ) ? 1 : 0 ;
////           $this->Cell(($this->get_Pdf_ancho() / 100) * 7 , $this->get_Pdf_alto_linea() * 1 , $line['quantity'] , 0 , 0 , 'L' , $color) ;
////            $this->Cell(($this->get_Pdf_ancho() / 100) * 7 , $this->get_Pdf_alto_linea() * 1 , $line['code'] , 0 , 0 , "L" , $color) ;
////            $this->Cell(($this->get_Pdf_ancho() / 100) * 36 , $this->get_Pdf_alto_linea() * 1 , $line['description'] , 0 , 0 , "L" , $color) ;
////            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "", 0 , 0 , 'R' , $color) ;
////            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , $color) ;
////            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , $color) ;
////            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , $color) ;
////            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "$i" , 0 , 1 , 'R' , $color) ;
//            $i ++ ;
//        }
//        
// 
//               // $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , $line['description'] , 0 , 1 , 'R' , 1) ; 
//                 $this->MultiCell(($this->get_Pdf_ancho() / 100) * 100 , $this->get_Pdf_alto_linea() * 1 , $i .  $description , 1 , "L" , 1);
//
//            
//           
//            
//            
//
//        $this->Ln() ;
//
////
////
////        ## TVA            
////        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 1 , 0 , "L" , 0) ;
////        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Total") , 1 , 0 , 'R' , 0) ;
////        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Discounts") , 1 , 0 , 'R' , 0) ;
////        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "Base taxable" , 1 , 0 , 'R' , 0) ;
////        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , _trc("% Tva") , 1 , 0 , 'R' , 0) ;
////        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Total Tva") , 1 , 0 , 'R' , 0) ;
////        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "Total EUR" , 1 , 1 , 'R' , 0) ;
////
////        foreach ( tax_list() as $key => $tax ) {
////            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , "L" , 0 , 'R' , 0) ;
////            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , "L" , "L" , "L" , 0) ;
////            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , "L" , 0 , 'R' , 0) ;
////            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , "L" , 0 , 'R' , 0) ;
////
////            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "$tax[value] %" , "L" , 0 , 'R' , 0) ;
////            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "", "L" , 0 , 'R' , 0) ;
////
////            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , "LR" , 1 , 'R' , 0) ;
////        }
////
////
////        ## Totales TVA
////        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 1 , 0 , 'R' , 0) ;
////        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "", 1 , 0 , 'R' , 0) ;
////        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 1 , 0 , 'R' , 0) ;
////        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 1 , 0 , 'R' , 0) ;
////
////        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "" , 1 , 0 , 'R' , 0) ;
////        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 1 , 0 , 'R' , 0) ;
////        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "", 1 , 1 , 'R' , 0) ;
////
////        $this->Ln() ;
//
//        # CONDICIOES DE PAGO
//        $this->SetFont('Arial' , 'B' , 10) ;
//        $this->Cell(($this->get_Pdf_ancho() / 1) * 1 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;
//        // $this->Cell(($this->get_Pdf_ancho() / 1) * 1 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;
//        $this->SetFont('Arial' , '' , 8) ;
//
//
//
//
//
//        $this->Ln() ;
//    }
//    
//   function bodyNoValuedShort($items) {
//
//        $this->SetFont('Arial' , 'B' , 10) ;
//        $this->SetFillColor(220 , 220 , 220) ;
//      //  $this->Cell(($this->get_Pdf_ancho() / 100) * 20, $this->get_Pdf_alto_linea() * 1 , _trc("Items") , 1 , 0 , 'L' , 1) ;
//      //  $this->Cell(($this->get_Pdf_ancho() / 100) * 80, $this->get_Pdf_alto_linea() * 1 , "", 1 , 1 , 'L' , 1) ;
//
//
//
//        //$this->Ln() ;
//        ## ITEMS 
//        ## ITEMS 
//        ## ITEMS 
//        $this->SetFillColor(220 , 220 , 220) ;
//        $this->SetFont('Arial' , '' , 8) ;
//
//
//        $totalprice = 0 ;
//        $subtotal = 0 ;
//        $totaltax = 0 ;
//        $tvac = 0 ;
//        $totaldiscounts = 0 ;
//        $discounts_mode = 0 ;
//        
//        $description = ""; 
//       // vardump(budget_lines_list_description_lines_by_budget_id($budget['id'])); 
//        
//        
//        $i = 0 ;
//        $j=0; 
//        
//        $des = array(); 
//        
//        //foreach ( invoice_lines_list_by_invoice_id($budget['id']) as $key => $line ) {
//        foreach ( $items as $key => $line ) {
//            
//            $color = ( $i % 2 == 0 ) ? 0 : 1 ;
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 20 , $this->get_Pdf_alto_linea() * 1 , _trc("ORDER") . " : " . $line['id']  , 1 , 0 , 'L' , $color) ;
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 70 , $this->get_Pdf_alto_linea() * 1 , _trc("Paciente") . " : "  . $line['patient'] , 1 , 0 , "L" , $color) ;
////            $this->Cell(($this->get_Pdf_ancho() / 100) * 36 , $this->get_Pdf_alto_linea() * 1 , $line['description'] , 0 , 0 , "L" , $color) ;
////            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "", 0 , 0 , 'R' , $color) ;
////            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , $color) ;
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , '--' , 1 , 1 , 'R' , $color) ;
////            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , $color) ;
////            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "$i" , 0 , 1 , 'R' , $color) ;
//            //$this->MultiCell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1 , $i          , 1 , "L" , $color);
//            
//            $this->MultiCell(($this->get_Pdf_ancho() / 100) * 100, $this->get_Pdf_alto_linea() * 1 , $line['description']  , 1 , "L" , $color);
//        //    $this->MultiCell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1 , "11"  , 0 , "L" , $color);
//            
//            
//            //$this->MultiCell($w, $h, $txt, $border, $align, $fill);
//            
//            $i ++ ;
//        }
//        
// 
//               // $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , $line['description'] , 0 , 1 , 'R' , 1) ; 
//        //         $this->MultiCell(($this->get_Pdf_ancho() / 100) * 100 , $this->get_Pdf_alto_linea() * 1 , $i .  $description , 1 , "L" , 1);
//
//            
//           
//            
//            
//
//        $this->Ln() ;
//
////
////
////        ## TVA            
////        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 1 , 0 , "L" , 0) ;
////        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Total") , 1 , 0 , 'R' , 0) ;
////        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Discounts") , 1 , 0 , 'R' , 0) ;
////        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "Base taxable" , 1 , 0 , 'R' , 0) ;
////        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , _trc("% Tva") , 1 , 0 , 'R' , 0) ;
////        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Total Tva") , 1 , 0 , 'R' , 0) ;
////        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "Total EUR" , 1 , 1 , 'R' , 0) ;
////
////        foreach ( tax_list() as $key => $tax ) {
////            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , "L" , 0 , 'R' , 0) ;
////            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , "L" , "L" , "L" , 0) ;
////            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , "L" , 0 , 'R' , 0) ;
////            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , "L" , 0 , 'R' , 0) ;
////
////            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "$tax[value] %" , "L" , 0 , 'R' , 0) ;
////            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "", "L" , 0 , 'R' , 0) ;
////
////            $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , "LR" , 1 , 'R' , 0) ;
////        }
////
////
////        ## Totales TVA
////        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 1 , 0 , 'R' , 0) ;
////        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "", 1 , 0 , 'R' , 0) ;
////        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 1 , 0 , 'R' , 0) ;
////        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 1 , 0 , 'R' , 0) ;
////
////        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "" , 1 , 0 , 'R' , 0) ;
////        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "" , 1 , 0 , 'R' , 0) ;
////        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , "", 1 , 1 , 'R' , 0) ;
////
////        $this->Ln() ;
//
//        # CONDICIOES DE PAGO
//        $this->SetFont('Arial' , 'B' , 10) ;
//        $this->Cell(($this->get_Pdf_ancho() / 1) * 1 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;
//        // $this->Cell(($this->get_Pdf_ancho() / 1) * 1 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;
//        $this->SetFont('Arial' , '' , 8) ;
//
//
//
//
//
//        $this->Ln() ;
//    }
//        
//
//    function signatures() {
//        ## TVA            
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 30 , $this->get_Pdf_alto_linea() * 1 , "" , "T" , 0 , "L" , 0) ;        
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 30 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , '' , 0) ;       
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , '' , 0) ;        
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 30 , $this->get_Pdf_alto_linea() * 1 , _trc("Signature for acceptance") , 'T' , 1 , 'R' , 0) ;
//
//        $this->SetFont('Arial' , '' , 8) ;
//        $this->Ln() ;
//    }    
//    

}
