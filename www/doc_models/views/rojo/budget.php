<?php

include pdf_template("rojo");

class BUDGET extends ROJO {
    
    function body($budget) {

        $this->Ln();

                
        $total_order_list = count(orders_budgets_list_orders_by_budget($budget['id'])) ;
        
        if( $total_order_list == 0 ){
            $from_order_txt = "";
            $total_order_total = "";
            
        }
        
        if( $total_order_list == 1){
            $from_order_txt = _tr("From order");
            $total_order_total = orders_budgets_list_orders_by_budget($budget['id'])[0]['order_id'];
            
            
        }
        
        if( $total_order_list > 1 ){
            $from_order_txt = _tr("Total orders");
            $total_order_total = $total_order_list;
        }
        
        
        
        # 777
        $this->SetFont('Arial', 'B', 10);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, _trc("Date"), "", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, "", "", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, "$from_order_txt", "", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, _trc("Budget"), "", 1, 'R', 0);

        $this->SetFont('Arial', '', 10);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, substr($budget['date_registre'], 0, 10), "", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, "", "", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, "$total_order_total", "", 0, 'L', 0);
        
        // si viene de un pedido, 
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, $budget['id'], "", 1, 'R', 0);


        $this->Ln();

        ## TOTAL DE LA FACTURA
        ## TOTAL DE LA FACTURA
        ## TOTAL DE LA FACTURA
        $this->SetFont('Arial', 'B', 20);
        $this->Cell($this->get_Pdf_ancho() / 2, $this->get_Pdf_alto_linea() * 2, _trc("Total"), "TB", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 2, $this->get_Pdf_alto_linea() * 2, monedaf($budget['total'] + $budget['tax']), "TB", 1, 'R', 0);

        // esto es el encabeado
        $this->encabezados();
        ## ITEMS 
        $this->SetFillColor(250, 250, 250);
        $this->SetFont('Arial', '', 8);


        $totalprice = 0;
        $subtotal = 0;
        $totaltax = 0;
        $tvac = 0;
        $totaldiscounts = 0;
        $discounts_mode = 0;
        $i = 0;
        
        foreach (budget_lines_list_by_budget_id($budget['id']) as $key => $line) {
            
            // Esto es el la parte de arriba
            if($this->GetY() > 265){                
                $this->AddPage();                 
                $this->bodyDate($budget);                 
                $this->encabezados();                                
            }            
                 
            $totalprice = $totalprice + ($line['price'] * $line['quantity'] );
            $subtotal = $subtotal + $line['subtotal'];
            $totaltax = $totaltax + $line['totaltax'];
            $tvac = $tvac + ($line["subtotal"] + $line["totaltax"]);
            $totaldiscounts = $totaldiscounts + ($line["totaldiscounts"]);
            $discounts_mode = ($line['discounts_mode'] == '%') ? "$line[discounts]$line[discounts_mode]" : "";            
            $separador = ( substr($line['description'],0,3) == '---' )? true : false; 
            
            
            
            $this->SetFillColor(250, 250, 250);
            $this->SetFont('Arial', '', 8);
            $color = ( $i % 2 == 0 ) ? 1 : 0;
            
            if($separador){
                $this->Cell(
                        ($this->get_Pdf_ancho() / 100) * 100, 
                        $this->get_Pdf_alto_linea() * 1, 
                        utf8_decode(substr($line['description'],3)), 
                       'T', 
                        1, 
                        'L', 
                        $color);
                
            }else{                
                $this->Cell(($this->get_Pdf_ancho() / 100) * 5, $this->get_Pdf_alto_linea() * 1, $line['quantity'], 0, 0, 'L', $color);                
                $this->Cell(($this->get_Pdf_ancho() / 100) * 41, $this->get_Pdf_alto_linea() * 1, "", 0, 0, "L", $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 9, $this->get_Pdf_alto_linea() * 1, moneda($line['price']), 0, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 9, $this->get_Pdf_alto_linea() * 1, moneda($line['price'] * $line['quantity']), 0, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 9, $this->get_Pdf_alto_linea() * 1, "$discounts_mode " . moneda($line["totaldiscounts"]), 0, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 9, $this->get_Pdf_alto_linea() * 1, moneda($line['subtotal']), 0, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 9, $this->get_Pdf_alto_linea() * 1, "(".$line['tax'] ."%) ".moneda($line['totaltax']), 0, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 9, $this->get_Pdf_alto_linea() * 1, moneda($line['subtotal'] + $line['totaltax']), 0, 1, 'R', $color);
                                         //// MULTI CELDA
                $this->SetY($this->GetY() - 4);
                $this->SetX($this->GetX() + 10);
                $this->MultiCell(
                        ($this->get_Pdf_ancho() / 100) * 41, 
                        $this->get_Pdf_alto_linea() * 0.5,
                        utf8_decode($line['description']), 
                        0, 
                        'T', 
                        0
                        );
                $this->SetY($this->GetY() + 0); // le da un ancho en la base del multicell
                $this->Ln();
                // MULTI CELDA
                
            }
                        
            $i++;
        }
                
        $this->Ln();
        
                
        // Esto necesita de un espacio minimo de 
      // X si es inferior agregamos un apagina 
//      if($this->GetY() > 188){
//          //$i=0; 
//          while ( $this->GetY() < 268 ) {
//              $color = ( $i++ % 2 == 0 ) ? 1 : 0 ;
//              $this->lineasVacias($color);
//          }
//          
//          $this->Cell(($this->get_Pdf_ancho() / 100) * 100 , $this->get_Pdf_alto_linea() * 1 , "" , "T" , 1 , 'R' , 0) ;
//          $this->AddPage(); 
//      }
        
    }

    function tax($budget) {
            $totalprice = 0;
            $subtotal = 0;
            $totaltax = 0;
            $tvac = 0;
            $totaldiscounts = 0;
            $discounts_mode = 0;
            
            
        
        $i = 0;        
        foreach (budget_lines_list_by_budget_id($budget['id']) as $key => $line) {
            $totalprice = $totalprice + ($line['price'] * $line['quantity'] );
            $subtotal = $subtotal + $line['subtotal'];
            $totaltax = $totaltax + $line['totaltax'];
            $tvac = $tvac + ($line["subtotal"] + $line["totaltax"]);
            $totaldiscounts = $totaldiscounts + ($line["totaldiscounts"]);
            $discounts_mode = ($line['discounts_mode'] == '%') ? "$line[discounts]$line[discounts_mode]" : "";

        }
        
        
        

        ## TVA            
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 1, 0, "L", 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, _trc("Total"), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, _trc("Discounts"), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, _trc("Base taxable"), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, _trc("% Tva"), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, _trc("Total Tva"), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, _trc("Total"), 1, 1, 'R', 0);

        foreach (tax_list() as $key => $tax) {
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", "L", 0, 'R', 0);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", "L", "L", "L", 0);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", "L", 0, 'R', 0);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", "L", 0, 'R', 0);

            $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "$tax[value] %", "L", 0, 'R', 0);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15,
                    $this->get_Pdf_alto_linea() * 1, moneda(budget_lines_total_by_tax($budget['id'], $tax['value'])), "L", 0, 'R', 0);

            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", "LR", 1, 'R', 0);
        }


        ## Totales TVA
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "           -", 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($totalprice), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($totaldiscounts), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($totalprice - $totaldiscounts), 1, 0, 'R', 0);

        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "", 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($totaltax), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($tvac), 1, 1, 'R', 0);
        
        $this->pago();
        $this->Ln(); 
        $this->comments(); 
        $this->Ln(); 
        $this->Ln(); 
        $this->signatures();
        
        
        
        
    }

    function pago() {
        global $u_owner_id, $config_bank; 
        
        # CONDICIOES DE PAGO
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(($this->get_Pdf_ancho() / 1) * 1, $this->get_Pdf_alto_linea() * 1, "", "", 1, 'L', 0);
        // $this->Cell(($this->get_Pdf_ancho() / 1) * 1 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;
        $this->SetFont('Arial', '', 8);
        

        $this->Ln() ;
        $this->SetFont('Arial' , '' , 10) ;
       
        
        $bank_name = $config_bank['bank'];
        $account_number = $config_bank['account_number']; 
        $bank_bic = $config_bank['bic'];
        $bank_iban = $config_bank['iban'];
        
       
        
        $this->Cell(($this->get_Pdf_ancho() / 1) * 1 , $this->get_Pdf_alto_linea() * 1 , "$bank_name -  ". (_trc("Account number"))." $account_number - "._trc("BIC")." $bank_bic " , "" , 1 , 'C' , 0) ;


        
        
    }
    
    function comments() {
        global $budget;
        $this->SetFont('Arial', '', 8);
        $this->SetFillColor(255, 255, 255);                              
        $this->MultiCell($this->get_Pdf_ancho(), $this->get_Pdf_alto_linea() , utf8_decode($budget['comments']), 0, 'L', 1);        
    }
    

    

    function bodyDate($budget) {

        $this->Ln();

        # 777
        # 777
        # 777
        # 777
        $this->SetFont('Arial', 'B', 10);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, _trc("Date"), "", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, "", "", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, "", "", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, _trc("Budget"), "", 1, 'R', 0);

        $this->SetFont('Arial', '', 10);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, substr($budget['date_registre'], 0, 10), "", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, "", "", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, "", "", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, $budget['id'], "", 1, 'R', 0);



        $this->Ln();
    }


    function signatures() {
        ## TVA            
        $this->Cell(($this->get_Pdf_ancho() / 100) * 30, $this->get_Pdf_alto_linea() * 1, _trc("For approval"), "T", 0, "L", 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 30, $this->get_Pdf_alto_linea() * 1, "", 0, 0, '', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "", 0, 0, '', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 30, $this->get_Pdf_alto_linea() * 1, "", 'T', 1, 'R', 0);

        $this->SetFont('Arial', '', 8);
        $this->Ln();
    }

}