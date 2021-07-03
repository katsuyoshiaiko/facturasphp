<?php

require "includes/qrcode/qrcode.class.php";
require('includes/fpdf/fpdf.php');

class PDF extends FPDF {

    public $id;
    public $via;
    public $date;
    public $company_id;
    public $client_ref;
    public $address_billing;
    public $address_delivery;
    public $patient_id;
    public $bac;
    public $price;
    public $comments;
    public $status;
    /**/
    public $pdf_ancho = 190;
    public $pdf_alto_linea = 4.5;
    public $pdf_color1_r = "242";
    public $pdf_color1_g = "242";
    public $pdf_color1_b = "242";
    public $qr_position_x = 10;
    public $qr_position_y = 10;

    function setQr_position_x($x) {
        $this->qr_positions_x = $x;
    }

    function setQr_position_y($y) {
        $this->qr_positions_y = $y;
    }

    function getQr_position_x() {
        return $this->qr_position_x;
    }

    function getQr_position_y() {
        return $this->qr_position_y;
    }

    function setId($id) {
        return $this->id = $id;
    }

    function setVia($via) {
        return $this->via = $via;
    }

    function setDate($date) {
        return $this->date = $date;
    }

    function SetCompany_id($company_id) {
        return $this->company_id = $company_id;
    }

    function setClient_ref($client_ref) {
        $this->client_ref = $client_ref;
    }

    function set_Pdf_Ancho() {
        return $this->GetPageWidth() - 20;
    }

    /*     * *********************************************************************** */

    function getId() {
        return $this->id;
    }

    function getDate() {
        return $this->date;
    }

    function get_Pdf_ancho() {
        return $this->pdf_ancho;
    }

    function get_Pdf_alto_linea() {
        return $this->pdf_alto_linea;
    }

    function get_Pdf_patient_name() {
        return $this->pdf_patiente_name;
    }

    function get_Pdf_patient_lastname() {
        return $this->pdf_patiente_Lastname;
    }

    function get_Pdf_patient_birthdate() {
        return $this->pdf_patiente_birthdate;
    }

    function get_color1_r() {
        return $this->pdf_color1_r;
    }

    function get_color1_g() {
        return $this->pdf_color1_g;
    }

    function get_color1_b() {
        return $this->pdf_color1_b;
    }

    // En-tête
    function Header() {
        global 
                $pdf_order, 
                $pdf_order_remake, 
                $pdf_order_date, 
                $pdf_order_date_delivery, 
                $pdf_dif_day, 
                $config_company_name, 
                $config_company_a_address, 
                $config_company_a_number,
                $config_company_a_postal_code, 
                $config_company_a_barrio, 
                $config_company_tel,
                $config_company_url,
                $config_company_email,
                $config_company_logo, 
                $config_company_tva, 
                $config_bac_prefix
        ; 

        $this->SetFont('Arial', 'I', 8);
        $this->SetFillColor(255, 200, 250);
        $this->Image($config_company_logo, 15, 14, -180);

        //$this->Image("qr.png", 167, 50, -180);
        //https://prgm.spipu.net/view/27
        //$this->Image("qr.php", 167, 50, -180);
        // $this->Image("img/QR/$id.png", 157, 48, 40);               
        $this->SetX(-10);
        $this->SetX(190);
        $qrcode = new QRcode("$pdf_order[id]" ."-". $pdf_order["bac"], 'H');
        $qrcode->displayFPDF($this, $this->GetX() - 30, $this->GetY(), "40", array(255, 255, 255), array(0, 0, 0));

        $this->SetX(10);
        $this->SetFont('Arial', 'b', 12);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), utf8_decode($config_company_name), "", 2, 'C', 0);
        $this->SetFont('Arial', '', 8);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), utf8_decode($config_company_a_address) . " " . utf8_decode($config_company_a_number), "", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), utf8_decode($config_company_a_postal_code) . " " . utf8_decode($config_company_a_barrio), "", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "Tel: " . utf8_decode($config_company_tel), "", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "$config_company_url", "", 2, 'C', 0);
        
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "$config_company_tva", "", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "", "", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "", "", 2, 'C', 0);



        $this->Ln();



        $this->SetFont('Arial', 'B', 15);

        $this->SetFillColor(255, 200, 250);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea() * 1.5, "", "", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea() * 1.5, "", "", 0, 'C', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea() * 1.5, (_trc("Order N:")) ." ". $pdf_order["id"] . "-" .$pdf_order["bac"], "", 1, 'R', 0);
        $this->Ln();

        
        ## TITULO CELDA
        ## TITULO CELDA
        ## TITULO CELDA
        //$this->SetFillColor(255, 200, 250);
        $this->SetFillColor($this->get_color1_r(), $this->get_color1_g(), $this->get_color1_b());
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, (_trc("Ref")), 0, 0, 'L', 1);
        //$this->Cell($this->get_Pdf_ancho() / 5, $this->get_Pdf_alto_linea() * 1, _trc("Express"), 0, 0, 'L', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, (_trc("Side")), 0, 0, 'L', 1);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, (_trc("Bac")), 0, 0, 'L', 1);
        
        $this->Cell(($this->get_Pdf_ancho() / 100 ) * 20, $this->get_Pdf_alto_linea() * 1, (_trc("Remake from")), 0, 0, 'L', 1);
        $this->Cell(($this->get_Pdf_ancho() / 100 ) * 20, $this->get_Pdf_alto_linea() * 1, (_trc("Registre date")), 0, 0, 'L', 1);
        $this->Cell(($this->get_Pdf_ancho() / 100 ) * 30, $this->get_Pdf_alto_linea() * 1, (_trc("Delivery date"))." (". _trc("Ymd").")" , 0, 1, 'R', 1);

        ## DATOS
        ## DATOS
        ## DATOS
        $this->SetFont('Arial', '', 8);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1.5, ($pdf_order["client_ref"]), 0, 0, 'L', 0);
        
//        if ($pdf_order["express"]) {
//            $this->SetFillColor(248, 243, 43);
//            $this->Cell($this->get_Pdf_ancho() / 5, $this->get_Pdf_alto_linea() * 1.5, _trc("Yes"), 1, 0, 'L', 1);
//        } else {
//            $this->Cell($this->get_Pdf_ancho() / 5, $this->get_Pdf_alto_linea() * 1.5, _trc("No"), 1, 0, 'L', 0);
//        }
        
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1.5,  $pdf_order["side"], 0, 0, 'L', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1.5, "$config_bac_prefix - " . $pdf_order["bac"], 0, 0, 'L', 0);
        
        $this->Cell(($this->get_Pdf_ancho() / 100) * 20, $this->get_Pdf_alto_linea() * 1.5, $pdf_order_remake, 0, 0, 'L', 0);        
        $this->Cell(($this->get_Pdf_ancho() / 100) * 20, $this->get_Pdf_alto_linea() * 1.5, "$pdf_order_date", 0, 0, 'L', 0);
        //$this->Cell($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1.5, "$pdf_order_date_delivery +$pdf_dif_day", 0, 1, 'R', 0);
        // esto ya esta traducido en controllers
        $this->Cell(($this->get_Pdf_ancho() / 100) * 30, $this->get_Pdf_alto_linea() * 1.5, $pdf_order_date_delivery , 0, 1, 'R', 0);
        


        $this->Ln();

//        $this->Ln();
    }

    function Footer() {
        global $pdf_order, $pdf_dif_day, $u_id;
//        global $config_bac_prefix; 
//        
//        
//       // vardump($pdf_dif_day)
//        
//        $doc_model = _options_option("doc_model"); 
//       
//        
//        $this->SetY(-22);                
//        $this->SetX(66);                
//        $this->SetFont('Arial', '', 10);
//        $this->Cell(20, 7, "REMAKE ".$pdf_order['id'], 1, 0, 'R');
//        
//        $this->SetY(-22);                
//        $this->SetX(166);                
//        $this->SetFont('Arial', '', 10);
//        $this->Cell(20, 7, "ORDER: ".$pdf_order['id'], 1, 1, 'R');         
//     
//        
//        // si hay fecha de entrega, se cuenta cuantos dias tiene para entregar 
//        
//        // sino, se pone los dias que esta en el sistema
//        
//        
//        
//        //$dif_day_f = ($pdf_dif_day == 1) ? "+" . "$pdf_dif_day" : $pdf_dif_day; 
//       // $dif_day_f = ($pdf_dif_day == 1) ? "+" . "$pdf_dif_day" : $pdf_dif_day; 
//// IZQ 
//        $this->SetY(-22); 
//        $this->SetX(30); 
//        
//        $qrcode = new QRcode("$pdf_order[id]", 'H');
//        $qrcode->displayFPDF($this, $this->GetX() - 20, $this->GetY(), "20", array(255, 255, 255), array(0, 0, 0));
//     
//        $this->SetY(-22);                
//        $this->SetX(30);                
//        $this->SetFont('Arial', '', 20);
//        $this->Cell(($this->pdf_ancho / 2.5), 20, "".$pdf_order['bac'] . " + " . $pdf_order['delivery_days'], 1, 0, 'L');
//
//        
//        $qrcode = new QRcode("$pdf_order[id]", 'H');
//        $qrcode->displayFPDF($this, $this->GetX() - 20, $this->GetY(), "20", array(255, 255, 255), array(0, 0, 0));
//        
//
//
//
//// DER
//        $this->SetY(-22); 
//        $this->SetX(130); 
//        
//        $qrcode = new QRcode("$pdf_order[id]", 'H');
//        $qrcode->displayFPDF($this, $this->GetX() - 20, $this->GetY(), "20", array(255, 255, 255), array(0, 0, 0));
//     
//        $this->SetY(-22);                
//        $this->SetX(130);                
//        $this->SetFont('Arial', '', 20);
//        $this->Cell(($this->pdf_ancho / 2.5), 20, "".$pdf_order['bac'] . " + " . $pdf_order['delivery_days'], 1, 0, 'L');
//
//        
//        $qrcode = new QRcode("$pdf_order[id]", 'H');
//        $qrcode->displayFPDF($this, $this->GetX() - 20, $this->GetY(), "20", array(255, 255, 255), array(0, 0, 0));
//        
//
//
//        
//        
////--------------------------------------------------------------------------------        
//        
//        
//        $this->SetX($this->GetX());
//        $this->SetY(-7); 
//        $this->SetX(30); 
//        $this->SetFont('Arial', 'I', 5);
//    //    $this->Cell(($this->pdf_ancho/10) * 5, 7, 'http://coello.be' . ' Doc_model: ' . $doc_model , 0, 0, 'L');
//       // $this->Cell(10, 7, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
//        $this->Cell(0, 7, 'Print by '. $u_id . " " . contacts_formated($u_id).' at ' . date("Y-m-d H\hi"), 0, 0, 'L');
//        
        if( $pdf_order['side'] == 'R'){
            $y = -24; 
            $x = 25; 
            $this->footer_qr($x, $y);
        } 
        
        
        if( $pdf_order['side'] == 'L' || $pdf_order['side'] == 'S' || $pdf_order['side'] == null ){
            $y = -24; 
            $x = 130; 
            $this->footer_qr($x, $y);
        } 
        
    }
    
    function footer_qr($x, $y){
    
        global $pdf_order, $pdf_dif_day, $u_id;
        global $config_bac_prefix; 
        
        
        $is_remake = 1;                
        
        $doc_model = _options_option("doc_model"); 
       
        
        $this->SetY($y);                
        $this->SetX($x);                
        $this->SetFont('Arial', '', 10);
        $this->Cell(20, 7, "N: ".$pdf_order['id'], 0, 0, 'L');
        
        // is remake 
        if($is_remake){            
            $this->SetY($y);                
            $this->SetX($x+36);                
            $this->SetFont('Arial', '', 10);
         //   $this->Cell(20, 7, "From: ".$pdf_order['remake'], 0, 1, 'R');         
        }
        
        // si hay fecha de entrega, se cuenta cuantos dias tiene para entregar 
        
        // sino, se pone los dias que esta en el sistema
        
        
        
        //$dif_day_f = ($pdf_dif_day == 1) ? "+" . "$pdf_dif_day" : $pdf_dif_day; 
       // $dif_day_f = ($pdf_dif_day == 1) ? "+" . "$pdf_dif_day" : $pdf_dif_day; 
// IZQ 
        $this->SetY($y); 
        $this->SetX($x); 
        
        $qrcode = new QRcode("$pdf_order[id]", 'H');
        $qrcode->displayFPDF($this, $this->GetX() - 20, $this->GetY(), "20", array(255, 255, 255), array(0, 0, 0));
     
        $this->SetY($y);                
        $this->SetX($x);                
        $this->SetFont('Arial', '', 20);
        $this->Cell(($this->pdf_ancho / 2.5), 20, "".$pdf_order['bac'] . " + " . $pdf_dif_day, 1, 0, 'L');

        
        
       // REMAKE
        if($is_remake){  
        //     $qrcode = new QRcode("$pdf_order[id]", 'H');
        //    $qrcode->displayFPDF($this, $this->GetX() - 20, $this->GetY(), "20", array(255, 255, 255), array(0, 0, 0));
        }
        
        
        
        
//        
        $this->SetX($this->GetX());
        $this->SetY($y-6); 
        $this->SetX($x-21); 
        $this->SetFont('Arial', 'I', 8);
    //    $this->Cell(($this->pdf_ancho/10) * 5, 7, 'http://coello.be' . ' Doc_model: ' . $doc_model , 0, 0, 'L');
       // $this->Cell(10, 7, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
        $this->Cell(0, 7, 'Print by: '. $u_id . " " . contacts_formated($u_id).' at: (ymd) ' . date("Y-m-d H\hi"), 0, 0, 'L');
        

//
//// DER
//        $this->SetY(-22); 
//        $this->SetX(130); 
//        
//        $qrcode = new QRcode("$pdf_order[id]", 'H');
//        $qrcode->displayFPDF($this, $this->GetX() - 20, $this->GetY(), "20", array(255, 255, 255), array(0, 0, 0));
//     
//        $this->SetY(-22);                
//        $this->SetX(130);                
//        $this->SetFont('Arial', '', 20);
//        $this->Cell(($this->pdf_ancho / 2.5), 20, "".$pdf_order['bac'] . " + " . $pdf_order['delivery_days'], 1, 0, 'L');
//
//        
//        $qrcode = new QRcode("$pdf_order[id]", 'H');
//        $qrcode->displayFPDF($this, $this->GetX() - 20, $this->GetY(), "20", array(255, 255, 255), array(0, 0, 0));
//                
//        
//        $this->SetX($this->GetX());
//        $this->SetY(-7); 
//        $this->SetX(30); 
//        $this->SetFont('Arial', 'I', 5);
//    //    $this->Cell(($this->pdf_ancho/10) * 5, 7, 'http://coello.be' . ' Doc_model: ' . $doc_model , 0, 0, 'L');
//       // $this->Cell(10, 7, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
//        $this->Cell(0, 7, 'Print by '. $u_id . " " . contacts_formated($u_id).' at ' . date("Y-m-d H\hi"), 0, 0, 'L');
//        
//    
    }
    
    // Empresa
    function cell_empresa($id) {
//        global 
//        $pdf_order, 
//        $config_company_a_address ,
//        $config_company_a_number ,
//        $config_company_a_postal_code,
//        $config_company_a_barrio ,        
//        $config_company_tel,
//        $config_company_url,
//        $config_company_email;
//
//        $this->SetFont('Arial', 'I', 8);
//        $this->SetFillColor(255, 200, 250);
//        $this->Image("logo.jpg", 15, 50, -180);
//        //$this->Image("qr.png", 167, 50, -180);
//        //https://prgm.spipu.net/view/27
//        //$this->Image("qr.php", 167, 50, -180);
//      // $this->Image("img/QR/$id.png", 157, 48, 40);               
//        $this->SetX(-10);
//        $this->SetX(190);        
//        $qrcode = new QRcode("$pdf_order[id]", 'H');
//        $qrcode->displayFPDF($this, $this->GetX() - 30, $this->GetY(), "40", array(255, 255, 255), array(0, 0, 0));
//        
//        $this->SetX(10);
//        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "", "", 2, 'C', 0);
//        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "$config_company_a_address $config_company_a_number", "", 2, 'C', 0);
//        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "$config_company_a_postal_code - $config_company_a_barrio", "", 2, 'C', 0);
//        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "Tel: $config_company_tel", "", 2, 'C', 0);
//        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "$config_company_url", "", 2, 'C', 0);
//        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "", "", 2, 'C', 0);
//        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "$config_company_email", "", 2, 'C', 0);
//        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "", "", 2, 'C', 0);
//        
//
//
//        $this->Ln();
    }

    // Paciente
    function cell_patient($p) {

        $this->SetFont('Arial', 'I', 8);

        $this->SetFillColor($this->get_color1_r(), $this->get_color1_g(), $this->get_color1_b());

        $this->SetFont('Arial', 'B', 8);
        $this->SetFillColor($this->get_color1_r(), $this->get_color1_g(), $this->get_color1_b());
        $this->Cell($this->get_Pdf_ancho(), $this->get_Pdf_alto_linea(), (_trc("Patient")) . " - " . $p['id'], 0, 1, 'L', 1);
        $this->SetFont('Arial', '', 8);

        $this->SetFillColor(255, 255, 255);
        $this->Cell(($this->get_Pdf_ancho() / 10) * 3, $this->get_Pdf_alto_linea(),  (_trc("Name")), 0, 0, 'L', 0);
        $this->Cell(($this->get_Pdf_ancho() / 10) * 3, $this->get_Pdf_alto_linea(),  (_trc("Lastname")), 0, 0, 'L', 0);
        $this->Cell(($this->get_Pdf_ancho() / 10) * 2, $this->get_Pdf_alto_linea(),  (_trc("Birthdate")), 0, 0, 'L', 0);
        $this->Cell(($this->get_Pdf_ancho() / 10) * 2, $this->get_Pdf_alto_linea(),  (_trc("National Number")), 0, 1, 'R', 0);

        $this->SetFillColor(255, 200, 250);
        //$this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea(), _trc("Name"), 0, 0, 'L', 0);
        $this->Cell(($this->get_Pdf_ancho() / 10) * 3,  $this->get_Pdf_alto_linea(), utf8_decode($p['name']), 0, 0, 'L', 0);
        $this->Cell(($this->get_Pdf_ancho() / 10) * 3 , $this->get_Pdf_alto_linea(), utf8_decode($p['lastname']), 0, 0, 'L', 0);
        $this->Cell(($this->get_Pdf_ancho() / 10) * 2 , $this->get_Pdf_alto_linea(), ($p['bd']), 0, 0, 'L', 0);
        $this->Cell(($this->get_Pdf_ancho() / 10) * 2 , $this->get_Pdf_alto_linea(), ($p['nn']), 0, 1, 'R', 0);



        $this->Ln();
    }

    function cell_client($client) {

        $this->SetFont('Arial', 'I', 8);

        $this->SetFillColor($this->get_color1_r(), $this->get_color1_g(), $this->get_color1_b());


        $this->SetFont('Arial', 'B', 8);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), (_trc("Company"))    . " - " . $client['id']    , 0, 0, 'L', 1);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), (_trc("Delivery address")) . " [$client[da_id]]", 0, 0, 'R', 1);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), (_trc("Billing address"))  . " [$client[ba_id]]", 0, 1, 'R', 1);
    

        $this->SetFont('Arial', '', 8);

        


        //2
        $this->SetFillColor(255, 200, 250);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), utf8_decode($client['name']), "", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), "", 0, 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), utf8_decode($client['da_number']) . ' - ' . utf8_decode($client['da_address']), "", 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), utf8_decode($client['ba_number']) . ' - ' .  utf8_decode($client['ba_address']), "", 1, 'R', 0);


        $this->SetFillColor(255, 200, 250);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), "", "", 0, 'L', 0);
        //$this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), "$client[client_ref]", "T", 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), "", 0, 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), utf8_decode($client['da_postcode']) . ' - ' . utf8_decode($client['da_barrio']), "", 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), utf8_decode($client['ba_postcode']) . ' - ' . utf8_decode($client['ba_barrio']), "", 1, 'R', 0);




        $this->SetFillColor(255, 200, 250);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), "", "", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), "", "", 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), utf8_decode($client['da_city']) . ' - ' . utf8_decode($client['da_country']), "", 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), utf8_decode($client['ba_city']) . ' - ' . utf8_decode($client['ba_country']), "", 0, 'R', 0);
        $this->Ln();
        $this->Ln();
    }

    // items
    function cell_items($pdf_items_l, $pdf_items_r, $pdf_items_s) {

        $this->SetFillColor($this->get_color1_r(), $this->get_color1_g(), $this->get_color1_b());
        $this->SetFont('Arial', 'B', 8);
        //   $this->Cell(($this->get_Pdf_ancho() / 20) * 9.8, $this->get_Pdf_alto_linea(), _trc("Items Left"), 1, 0, 'C', 1);
        // $this->Cell(($this->get_Pdf_ancho() / 20) * 0.4, $this->get_Pdf_alto_linea(), "", 0, 0, 'R', 0);
        // $this->Cell(($this->get_Pdf_ancho() / 20) * 9.8, $this->get_Pdf_alto_linea(), _trc("Items Right"), 1, 1, 'C', 1);
        $this->SetFont('Arial', '', 8);

        $this->SetFillColor($this->get_color1_r(), $this->get_color1_g(), $this->get_color1_b());

        $x = $this->GetX();
        $y = $this->GetY();



        ########################################################################
        ########################################################################
        ########################################################################
        if ($pdf_items_s) {
            ### START STEREO ########################################################
            ### START STEREO ########################################################
            ### START STEREO ########################################################
            ### START STEREO ########################################################
            ### START STEREO ########################################################
            ### START STEREO ########################################################
            //$this->SetFillColor(255, 200, 250);
            $this->SetFillColor($this->get_color1_r(), $this->get_color1_g(), $this->get_color1_b());
            $this->SetFont('Arial', 'B', 8);
            $this->Cell(($this->get_Pdf_ancho() / 1) * 1, $this->get_Pdf_alto_linea(), (_trc("STEREO")), 0, 1, 'C', 1);
            $this->SetFont('Arial', '', 8);

            $i = 0;
            if ($pdf_items_s) {
                foreach ($pdf_items_s as $key => $value) {
                    $llenado = 1;
                    if ($i % 2 == 0) {
                        $llenado = 0;
                    }
                    //$this->Cell(($this->get_Pdf_ancho() / 2) * 1, $this->get_Pdf_alto_linea(), strtoupper(_trc($key)), 1, 0, 'R', $llenado);
                    //$this->Cell(($this->get_Pdf_ancho() / 2) * 1, $this->get_Pdf_alto_linea(), (_trc($value)), 1, 1, 'L', $llenado);
                    
                    $this->Cell(($this->get_Pdf_ancho() / 10) * 1, $this->get_Pdf_alto_linea(), strtoupper($value['side']), 0, 0, 'R', $llenado);
                    $this->Cell(($this->get_Pdf_ancho() / 10) * 2, $this->get_Pdf_alto_linea(), strtoupper($value['code']), 0, 0, 'R', $llenado);
                    $this->Cell(($this->get_Pdf_ancho() / 10) * 7, $this->get_Pdf_alto_linea(), (_trc($value["description"])), 0, 1, 'L', $llenado);
                    
                    
                    $i++;
                }

//                if ($pdf_items_s_options) {
//                    foreach ($pdf_items_s_options as $key => $value) {
//                        $llenado = 0;
//                        if ($i % 2 == 0) {
//                            $llenado = 1;
//                        }
//                        $this->Cell(($this->get_Pdf_ancho() / 2 ) * 1, $this->get_Pdf_alto_linea(), strtoupper(_trc("Option")), 1, 0, 'R', $llenado);
//                        $this->Cell(($this->get_Pdf_ancho() / 2 ) * 1, $this->get_Pdf_alto_linea(), (_trc($value)), 1, 1, 'L', $llenado);
//
//                        $i++;
//                    }
//                }
            }
            ### END STEREO ########################################################
        } else {
            //
            ### START RIGTH ########################################################
            ### START RIGTH ########################################################
            ### START RIGTH ########################################################
            ### START RIGTH ########################################################
            ### START RIGTH ########################################################
            ### START RIGTH ########################################################
            ### START RIGTH ########################################################
            ### START RIGTH ########################################################

            $i = 0;
            if ($pdf_items_r) {



                $this->SetFillColor($this->get_color1_r(), $this->get_color1_g(), $this->get_color1_b());
                $this->SetFont('Arial', 'B', 8);
                $this->Cell(($this->get_Pdf_ancho() / 20) * 9.8, $this->get_Pdf_alto_linea(), (_trc("Items Right")), 0, 1, 'C', 1);

                //$this->Cell(($this->get_Pdf_ancho() / 20) * 0.4, $this->get_Pdf_alto_linea(), "", 0, 0, 'R', 0);
                //$this->Cell(($this->get_Pdf_ancho() / 20) * 9.8, $this->get_Pdf_alto_linea(), _trc("Items Right"), 1, 1, 'C', 1);
                $this->SetFont('Arial', '', 8);



                foreach ($pdf_items_r as $key => $value) {
                    $llenado = 1;
                    if ($i % 2 == 0) {
                        $llenado = 0;
                    }                                                        
                    
                    $this->Cell(($this->get_Pdf_ancho() / 20) * 0.5, $this->get_Pdf_alto_linea(), strtoupper($value['side']), "", 0, 'L', $llenado);

                    // FORME ET MARQUES a la derecha
                    // FORME ET MARQUES a la derecha
                    // FORME ET MARQUES a la derecha
                    // FORME ET MARQUES a la derecha
                    // FORME ET MARQUES a la derecha
                    
                    if( strstr($value['code'], "FOR") || strstr($value['code'], "MAR") ){
                        $this->SetFont('Arial', 'B', 9);
// LA X                       
                        $this->Cell(($this->get_Pdf_ancho() / 20) * 0.5, $this->get_Pdf_alto_linea(), "", "", 0, 'L', $llenado);
                        $this->SetFillColor($this->get_color1_r(), $this->get_color1_g(), $this->get_color1_b());                    
                        $this->Cell(($this->get_Pdf_ancho() / 20) * 1.5, $this->get_Pdf_alto_linea(), strtoupper($value['code']), 0, 0, 'R', $llenado);
                        $this->Cell(($this->get_Pdf_ancho() / 20) * 7.3, $this->get_Pdf_alto_linea(), (_trc($value["description"])), 0, 1, 'R', $llenado);
                    }else{
// LA X                       
                        $this->Cell(($this->get_Pdf_ancho() / 20) * 0.5, $this->get_Pdf_alto_linea(), " ", "", 0, 'L', $llenado);
                        $this->SetFillColor($this->get_color1_r(), $this->get_color1_g(), $this->get_color1_b());                    
                        $this->Cell(($this->get_Pdf_ancho() / 20) * 1.5, $this->get_Pdf_alto_linea(), strtoupper($value['code']), 0, 0, 'R', $llenado);
                        $this->Cell(($this->get_Pdf_ancho() / 20) * 7.3, $this->get_Pdf_alto_linea(), (_trc($value["description"])), 0, 1, 'L', $llenado);
                    }
                    
                    $this->SetFont('Arial', '', 8);
                    $i++;
                }
                //$this->Cell(($this->get_Pdf_ancho() / 20) * 9.5, $this->get_Pdf_alto_linea(), "", "T", 1, 'L', $llenado);

//                if ($pdf_items_l_options) {
//                    foreach ($pdf_items_l_options as $key => $value) {
//                        $llenado = 0;
//                        if ($i % 2 == 0) {
//                            $llenado = 1;
//                        }
//                        $this->Cell(($this->get_Pdf_ancho() / 20) * 4.9, $this->get_Pdf_alto_linea(), strtoupper(_trc("Option")), 1, 0, 'R', $llenado);
//                        $this->Cell(($this->get_Pdf_ancho() / 20) * 4.9, $this->get_Pdf_alto_linea(), (_trc($value)), 1, 1, 'L', $llenado);
//
//                        $i++;
//                    }
//                }
            }
            
            // una vez las lineas de left llegan al final se define este punto como final 
            $y_end_r = $this->GetY(); 
            
            ### END LEFT ########################################################
            ### START RIGHT ########################################################
            $i = 0;

            if ($pdf_items_l) {

                $this->SetX(120);
                $this->SetY($y);

                $this->SetFillColor($this->get_color1_r(), $this->get_color1_g(), $this->get_color1_b());
                $this->SetFont('Arial', 'B', 8);
                $this->Cell(($this->get_Pdf_ancho() / 20) * 9.8, $this->get_Pdf_alto_linea(), "", 0, 0, 'C', 0);

                $this->Cell(($this->get_Pdf_ancho() / 20) * 0.4, $this->get_Pdf_alto_linea(), "", 0, 0, 'R', 0);
                $this->Cell(($this->get_Pdf_ancho() / 20) * 9.8, $this->get_Pdf_alto_linea(), (_trc("Items Left")), 0, 1, 'C', 1);
                $this->SetFont('Arial', '', 8);


                foreach ($pdf_items_l as $key => $value) {
                    $llenado = 1;
                    if ($i % 2 == 0) {
                        $llenado = 0;
                    }

                    $this->Cell(97, $this->get_Pdf_alto_linea(), "", 0, 0, 'R', 0);
                    
                    
                    
                    if( strstr($value['code'], "FOR") || strstr($value['code'], "MAR") ){
                        $this->SetFont('Arial', 'B', 9);
                        $this->Cell(($this->get_Pdf_ancho() / 20) * 0.5, $this->get_Pdf_alto_linea(), strtoupper($value['side']), "", 0, 'L', $llenado);
                        // La x en GRAS
                        $this->Cell(($this->get_Pdf_ancho() / 20) * 0.5, $this->get_Pdf_alto_linea(), "", "", 0, 'L', $llenado);
                        $this->SetFillColor($this->get_color1_r(), $this->get_color1_g(), $this->get_color1_b());                    
                        $this->Cell(($this->get_Pdf_ancho() / 20) * 1.5, $this->get_Pdf_alto_linea(), strtoupper($value['code']), 0, 0, 'R', $llenado);
                        $this->Cell(($this->get_Pdf_ancho() / 20) * 7.3, $this->get_Pdf_alto_linea(), (_trc($value["description"])), 0, 1, 'R', $llenado);
                    }else{
                        $this->Cell(($this->get_Pdf_ancho() / 20) * 0.5, $this->get_Pdf_alto_linea(), strtoupper($value['side']), "", 0, 'L', $llenado);
// la X
                        $this->Cell(($this->get_Pdf_ancho() / 20) * 0.5, $this->get_Pdf_alto_linea(), "", "", 0, 'L', $llenado);
                        $this->SetFillColor($this->get_color1_r(), $this->get_color1_g(), $this->get_color1_b());                    
                        $this->Cell(($this->get_Pdf_ancho() / 20) * 1.5, $this->get_Pdf_alto_linea(), strtoupper($value['code']), 0, 0, 'R', $llenado);
                        $this->Cell(($this->get_Pdf_ancho() / 20) * 7.3, $this->get_Pdf_alto_linea(), (_trc($value["description"])), 0, 1, 'L', $llenado);
                    }
                    
                    $this->SetFont('Arial', '', 8);
                    
                    
                    
                    
                    
                    $i++;
                }



//                if ($pdf_items_r_options) {
//                    foreach ($pdf_items_r_options as $key => $value) {
//                        $llenado = 0;
//                        if ($i % 2 == 0) {
//                            $llenado = 1;
//                        }
//                        $this->Cell(97, $this->get_Pdf_alto_linea(), "", 0, 0, 'R', 0);
//                        $this->Cell(($this->get_Pdf_ancho() / 20) * 4.9, $this->get_Pdf_alto_linea(), strtoupper(_trc('Option')), 1, 0, 'R', $llenado);
//                        $this->Cell(($this->get_Pdf_ancho() / 20) * 4.9, $this->get_Pdf_alto_linea(), (_trc($value)), 1, 1, 'L', $llenado);
//
//                        $i++;
//                    }
//                }
            }
            
            $this->Ln(); 
            
            $y_end_l = $this->GetY();
            
            
            // una vez terminado la derecha, vemos cual es el mas largo 
            
            $y_end = ($y_end_r > $y_end_l)? $y_end_r : $y_end_l; 
            
            $this->SetY($y_end);
            
            
            
            
            ### END RIGHT ########################################################
            //
        }
        ########################################################################
        ########################################################################
        ########################################################################
    }
//
//    function cell_extras() {
//        $this->SetFont('Arial', 'I', 12);
//
//        $this->SetFillColor(255, 200, 210);
//        $this->Cell($this->get_Pdf_ancho(), 10, _trc("Extras"), 1, 1, 'L', 1);
//    }

    function cell_comments() {
        global $pdf_order;
        
        $startX = $this->GetX();
        $startY = $this->GetY();
        
        if( $pdf_order['side'] == 'R'  ){
            $this->SetFont('Arial', 'I', 8);
            $this->SetFillColor($this->get_color1_r(), $this->get_color1_g(), $this->get_color1_b());        
            $this->MultiCell($this->get_Pdf_ancho()/2, $this->get_Pdf_alto_linea() , (_trc("Comments")) . ": " . utf8_decode($pdf_order['comments'])  , 0, 'L', 1);
        } 
        
        if( $pdf_order['side'] == 'L' || $pdf_order['side'] == 'S' ){
            $this->SetY($startY);        
            $this->SetX(($this->get_Pdf_ancho()/2)+10);
         $this->MultiCell($this->get_Pdf_ancho()/2, $this->get_Pdf_alto_linea() , (_trc("Comments")) . ": " . utf8_decode($pdf_order['comments'])  , 0, 'L', 1);
        
        }
        
        
    }
    function cell_resumen($pdf_order_side) {
       global $pdf_order_remake, $pdf_order; 
       
       //$pdf_order["side"]
        
        // La gran X
        $pax = ($pdf_order["side"] === "S")?"2":"1";
        
        $remakeFrom = ($pdf_order_remake)? _trc("Remake from")." : $pdf_order_remake": "";
        
        $startX = $this->GetX();
        $startY = $this->GetY();
        // RIGHT
        
        if( $pdf_order['side'] == 'R'){                
            $this->SetFont('Arial', 'I', 50);
            $this->SetFillColor($this->get_color1_r(), $this->get_color1_g(), $this->get_color1_b());        
            $this->Cell($this->get_Pdf_ancho()/6, $this->get_Pdf_alto_linea() *5, "X$pax", 0, 0, "L", 0);
            
            $this->SetFont('Arial', 'I', 15);
            $this->Cell($this->get_Pdf_ancho()/4, $this->get_Pdf_alto_linea() *5, "$remakeFrom", 0, 0, "L", 0);
        } 
        
        // LEFT
        if( $pdf_order['side'] == 'L' || $pdf_order['side'] == 'S' || $pdf_order['side'] ==  null  ){   
            $this->SetY($startY);
            $this->SetX(($this->get_Pdf_ancho()/2)+10);
            $this->SetFont('Arial', 'I', 50);
            $this->Cell($this->get_Pdf_ancho()/6, $this->get_Pdf_alto_linea() *5, "X$pax", 0, 0, "L", 0);
            
            $this->SetFont('Arial', 'I', 15);
            $this->Cell($this->get_Pdf_ancho()/4, $this->get_Pdf_alto_linea() *5, "$remakeFrom", 0, 0, "L", 0);
        }
        
    }
    
    
    
    
    

    function cell_QR() {
        
    }

}
