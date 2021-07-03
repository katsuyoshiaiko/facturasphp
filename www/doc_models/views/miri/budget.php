<?php

include pdf_template("miri");

class BUDGET extends MIRI {

    function body($budget) {

        $this->Ln();

        $this->bodyDate($budget);


        $this->Ln();


        $this->SetFont('Arial', 'B', 25);
        $this->Cell($this->get_Pdf_ancho() / 2, $this->get_Pdf_alto_linea() * 3, _trc("Total"), "TB", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 2, $this->get_Pdf_alto_linea() * 3, monedaf($budget['total'] + $budget['tax']), "TB", 1, 'R', 0);

        // esto es el encabeado
        $this->encabezados();


        ## ITEMS 
        $this->SetFillColor(249, 249, 249);
        $this->SetFont('Arial', '', 8);


        $totalprice = 0;
        $subtotal = 0;
        $totaltax = 0;
        $tvac = 0;
        $totaldiscounts = 0;
        $discounts_mode = 0;



        $i = 0;
        //foreach ( invoice_lines_list_by_invoice_id($budget['id']) as $key => $line ) {
        //foreach (budget_lines_list_by_budget_id($budget['id']) as $key => $line) {
        foreach (budget_lines_list_by_budget_id_without_transport($budget['id']) as $key => $line) {
            if ($this->GetY() > 265) {
                $this->AddPage();
                $this->bodyDate($budgets);
                $this->Ln();
                $this->encabezados();
            }
            $totalprice = $totalprice + ($line['price'] * $line['quantity'] );
            $subtotal = $subtotal + $line['subtotal'];
            $totaltax = $totaltax + $line['totaltax'];
            $tvac = $tvac + ($line["subtotal"] + $line["totaltax"]);
            $totaldiscounts = $totaldiscounts + ($line["totaldiscounts"]);
            $discounts_mode = ($line['discounts_mode'] == '%') ? "$line[discounts]$line[discounts_mode]" : "";
            $separador = ( substr($line['description'], 0, 3) == '---' ) ? true : false;

            $this->SetFillColor(255, 255, 255);
            $this->SetFont('Arial', '', 8);
            $color = ( $i % 2 == 0 ) ? 1 : 0;

            if ($separador) {
                $this->Cell(($this->get_Pdf_ancho() / 100) * 100, $this->get_Pdf_alto_linea() * 1, utf8_decode(substr($line['description'], 3)), 0, 1, 'L', $color);
            } else {
                $this->Cell(($this->get_Pdf_ancho() / 100) * 5, $this->get_Pdf_alto_linea() * 1, $line['quantity'], 0, 0, 'L', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 7, $this->get_Pdf_alto_linea() * 1, utf8_decode($line['code']), 0, 0, "L", $color);
                //$this->Cell(($this->get_Pdf_ancho() / 100) * 28, $this->get_Pdf_alto_linea() * 1, utf8_decode($line['description']), 0, 0, "L", $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 28, $this->get_Pdf_alto_linea() * 1, '', 0, 0, "L", $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, moneda($line['price']), 0, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, moneda($line['price'] * $line['quantity']), 0, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "$discounts_mode " . moneda($line["totaldiscounts"]), 0, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, moneda($line['subtotal']), 0, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "(" . $line['tax'] . "%) " . moneda($line['totaltax']), 0, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, moneda($line['subtotal'] + $line['totaltax']), 0, 1, 'R', $color);

//// MULTI CELDA
                $this->SetY($this->GetY() -4);
                $this->SetX($this->GetX() +22);
                $this->MultiCell(
                        ($this->get_Pdf_ancho() / 100) * 28, 
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


        $this->ln();
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 5, $this->get_Pdf_alto_linea() * 1, _trc("Transport"), 0, 1, 'L', 0);



        $this->SetFont('Arial', '', 8);
        $this->encabezados();


        // TRANSPRT 
        // TRANSPRT 
        // TRANSPRT 
        // TRANSPRT 
        // TRANSPRT 
        // TRANSPRT 
        foreach (budget_lines_list_transport_by_budget_id($budget['id']) as $key => $line) {
            if ($this->GetY() > 265) {
                $this->AddPage();
                $this->bodyDate($budgets);
                $this->Ln();
                $this->encabezados();
            }
            $totalprice = $totalprice + ($line['price'] * $line['quantity'] );
            $subtotal = $subtotal + $line['subtotal'];
            $totaltax = $totaltax + $line['totaltax'];
            $tvac = $tvac + ($line["subtotal"] + $line["totaltax"]);
            $totaldiscounts = $totaldiscounts + ($line["totaldiscounts"]);
            $discounts_mode = ($line['discounts_mode'] == '%') ? "$line[discounts]$line[discounts_mode]" : "";
            $separador = ( substr($line['description'], 0, 3) == '---' ) ? true : false;

            $this->SetFillColor(255, 255, 255);
            $this->SetFont('Arial', '', 8);
            $color = ( $i % 2 == 0 ) ? 1 : 0;

            if ($separador) {
                $this->Cell(($this->get_Pdf_ancho() / 100) * 100, $this->get_Pdf_alto_linea() * 1, utf8_decode(substr($line['description'], 3)), 0, 1, 'L', $color);
            } else {
                $this->Cell(($this->get_Pdf_ancho() / 100) * 5, $this->get_Pdf_alto_linea() * 1, $line['quantity'], 0, 0, 'L', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 7, $this->get_Pdf_alto_linea() * 1, utf8_decode($line['code']), 0, 0, "L", $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 28, $this->get_Pdf_alto_linea() * 1, utf8_decode($line['description']), 0, 0, "L", $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, moneda($line['price']), 0, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, moneda($line['price'] * $line['quantity']), 0, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "$discounts_mode " . moneda($line["totaldiscounts"]), 0, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, moneda($line['subtotal']), 0, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "(" . $line['tax'] . "%) " . moneda($line['totaltax']), 0, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, moneda($line['subtotal'] + $line['totaltax']), 0, 1, 'R', $color);
            }
            $i++;
        }




//         Esto necesita de un espacio minimo de 
        //     X si es inferior agregamos un apagina 
        if ($this->GetY() > 228) {

            while ($this->GetY() < 265) {
                $color = ( $i++ % 2 == 0 ) ? 1 : 0;
                $this->lineasVacias($color);
            }
            $this->Cell(($this->get_Pdf_ancho() / 100) * 100, $this->get_Pdf_alto_linea() * 1, ">>>", "T", 1, 'R', 0);
            $this->AddPage();
        }

        //
        if ($this->GetY() < 100) {
            $this->bodyDate($budget);
            $this->Ln();
            $this->encabezados();
            while ($this->GetY() < 230) {
                $color = ( $i++ % 2 == 0 ) ? 1 : 0;
                $this->lineasVacias($color);
            }
        }
    }

    function bodyDate($budget) {

        $total_order_list = count(orders_budgets_list_orders_by_budget($budget['id']));

        if ($total_order_list == 0) {
            $from_order_txt = "";
            $total_order_total = "";
        }

        if ($total_order_list == 1) {
            $from_order_txt = _trc("From order");
            $total_order_total = orders_budgets_list_orders_by_budget($budget['id'])[0]['order_id'];
        }

        if ($total_order_list > 1) {
            $from_order_txt = _trc("Total orders");
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
    }

    function bodyfoot() {
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

        
    }

    
    
    
    function tax_short($budget) {
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
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "", 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, _trc("Total Tva"), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, _trc("Total"), 1, 1, 'R', 0);

        foreach (tax_list() as $key => $tax) {
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", "L", 0, 'R', 0);
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", "L", "L", "L", 0);
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", "L", 0, 'R', 0);
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", "L", 0, 'R', 0);
//
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "$tax[value] %", "L", 0, 'R', 0);
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 15,
//                    $this->get_Pdf_alto_linea() * 1, moneda(budget_lines_total_by_tax($budget['id'], $tax['value'])), "L", 0, 'R', 0);
//
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", "LR", 1, 'R', 0);
        }


        ## Totales TVA
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "           -", 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($totalprice), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($totaldiscounts), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($totalprice - $totaldiscounts), 1, 0, 'R', 0);

        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "", 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($totaltax), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($tvac), 1, 1, 'R', 0);

        
    }

    
    
    
    
    function pago() {
        global $u_owner_id, $config_bank;
        # CONDICIOES DE PAGO
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(($this->get_Pdf_ancho() / 1) * 1, $this->get_Pdf_alto_linea() * 1, "", "", 1, 'L', 0);        
        $this->SetFont('Arial', '', 10);
        $bank_name = $config_bank['bank'];
        $account_number = $config_bank['account_number'];
        $bank_bic = $config_bank['bic'];
        $bank_iban = $config_bank['iban'];
        $this->Cell(($this->get_Pdf_ancho() / 1) * 1, $this->get_Pdf_alto_linea() * 1, "$bank_name -  " . (_trc("Account number")) . " $account_number - " . _trc("BIC") . " $bank_bic ", "", 1, 'C', 0);
    }

    function bodyNoValued($budget) {
        $this->SetFont('Arial', 'B', 10);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, _trc("Date"), "", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, "", "", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, _trc("From order"), "", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, _trc("Budget"), "", 1, 'R', 0);

        $this->SetFont('Arial', '', 10);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, substr($budget['date_registre'], 0, 10), "", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, "", "", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, $budget['order_id'], "", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, $budget['id'], "", 1, 'R', 0);


        $this->Ln();

        ## TOTAL DE LA FACTURA
        ## TOTAL DE LA FACTURA
        ## TOTAL DE LA FACTURA
        $this->SetFont('Arial', 'B', 25);
        $this->Cell($this->get_Pdf_ancho() / 2, $this->get_Pdf_alto_linea() * 3, _trc("Total"), "TB", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 2, $this->get_Pdf_alto_linea() * 3, "", "TB", 1, 'R', 0);

        // esto es el encabeado
        $this->encabezados();


        ## ITEMS 
        ## ITEMS 
        ## ITEMS 
        ## ITEMS 
        $this->SetFillColor(220, 220, 220);
        $this->SetFont('Arial', '', 8);


        $totalprice = 0;
        $subtotal = 0;
        $totaltax = 0;
        $tvac = 0;
        $totaldiscounts = 0;
        $discounts_mode = 0;

        $description = "";
        // vardump(budget_lines_list_description_lines_by_budget_id($budget['id'])); 


        $i = 0;
        $j = 0;

        $des = array();

        //foreach ( invoice_lines_list_by_invoice_id($budget['id']) as $key => $line ) {
        foreach (budget_lines_list_description_lines_by_budget_id($budget['id']) as $key => $line) {

            if ($line['price'] > 0) {

                $description = $description . " " . $line['description'];
            }



            $color = ( $i % 2 == 0 ) ? 1 : 0;
//           $this->Cell(($this->get_Pdf_ancho() / 100) * 7 , $this->get_Pdf_alto_linea() * 1 , $line['quantity'] , 0 , 0 , 'L' , $color) ;
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 7 , $this->get_Pdf_alto_linea() * 1 , $line['code'] , 0 , 0 , "L" , $color) ;
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 36 , $this->get_Pdf_alto_linea() * 1 , $line['description'] , 0 , 0 , "L" , $color) ;
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "", 0 , 0 , 'R' , $color) ;
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , $color) ;
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , $color) ;
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , $color) ;
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , "$i" , 0 , 1 , 'R' , $color) ;
            $i++;
        }


        // $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , $line['description'] , 0 , 1 , 'R' , 1) ; 
        $this->MultiCell(($this->get_Pdf_ancho() / 100) * 100, $this->get_Pdf_alto_linea() * 1, $i . $description, 1, "L", 1);

        $this->Ln();

//        $this->Ln() ;
        # CONDICIOES DE PAGO
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(($this->get_Pdf_ancho() / 1) * 1, $this->get_Pdf_alto_linea() * 1, "", "", 1, 'L', 0);
        // $this->Cell(($this->get_Pdf_ancho() / 1) * 1 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;
        $this->SetFont('Arial', '', 8);
        $this->Ln();
    }

    function bodyNoValuedShort($items , $show_price = false) {
        // muestro precio?
        $this->bodyValuedShort($items, false); 
    }

    function bodyValuedShort($items, $show_price = true) {
        $this->SetFillColor(220, 220, 220);
        $this->SetFont('Arial', '', 8);

        foreach ($items as $key => $line) { 
            // si puestro pecio 
            $total = ($show_price)? monedaf($line['total']) : "";             
            //
            $color = ( $i % 2 == 0 ) ? 0 : 1;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 20, $this->get_Pdf_alto_linea() * 1, _trc("ORDER") . " : " . $line['id'], "TL", 0, 'L', $color);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 70, $this->get_Pdf_alto_linea() * 1, _trc("Paciente") . " : " . $line['patient'], 'T', 0, "L", $color);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, $total, 1, 1, 'R', $color);
            $this->MultiCell(($this->get_Pdf_ancho() / 100) * 100, $this->get_Pdf_alto_linea() * 1, $line['description'], 'LRB', "L", $color);                                    
            $i++;
        }
    }
    
    
    function bodyTransport($items) {
        $this->SetFillColor(220, 220, 220);                               
        $this->SetFont('Arial', 'B', 10);
        $this->MultiCell(($this->get_Pdf_ancho() / 100) * 100, $this->get_Pdf_alto_linea() * 1, _trc("Transport"), 'B', "L", $color);                                    
        
        $this->SetFont('Arial', '', 8);
        
        foreach ($items as $key => $line) {
            $color = ( $i % 2 == 0 ) ? 0 : 1;            
            $this->Cell(($this->get_Pdf_ancho() / 100) * 90, $this->get_Pdf_alto_linea() * 1, $line['description'], 'L', 0, 'L');
            $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, monedaf($line['subtotal'] + $line['totaltax']), "R", 1, 'R');            
            $i++;
        }
        
        $this->Cell(($this->get_Pdf_ancho() / 100) * 100, $this->get_Pdf_alto_linea() * 1, '', 'T', 1, 'R');
    }

    
    
    
    function signatures() {
        ## TVA            
        $this->Cell(($this->get_Pdf_ancho() / 100) * 30, $this->get_Pdf_alto_linea() * 1, "", "T", 0, "L", 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 30, $this->get_Pdf_alto_linea() * 1, "", 0, 0, '', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "", 0, 0, '', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 30, $this->get_Pdf_alto_linea() * 1, "", 'T', 1, 'R', 0);

        $this->SetFont('Arial', '', 8);
        
    }

}
