<?php

require "includes/qrcode/qrcode.class.php";
//require "includes/phpqrcode/qrlib.php";
require('includes/fpdf/fpdf.php');

class ROJO extends FPDF {

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
    public $pdf_ancho_largo = 275; 
    public $pdf_alto_linea = 5;
    
    
    
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
    
    function get_Pdf_ancho_largo() {
        return $this->pdf_ancho_largo;
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

    // En-tête
    // En-tête
    // En-tête
    // En-tête
    // En-tête
    // En-tête
    // En-tête
    // En-tête
    // En-tête
    // En-tête
    function Header() {
        
        global 
        $pdf_order, $pdf_order_remake, $pdf_order_date, $pdf_order_date_delivery, $dif_day, $config_company_name, $config_company_a_address, $config_company_a_number,
        $config_company_a_postal_code, $config_company_a_barrio,  $config_company_tel, $config_company_url, $config_company_email, $config_company_logo, $config_company_tva; 

        
        
        
        if(isset($config_company_logo) && file_exists("./www/gallery/img/logos/$config_company_logo") ){
            $logo  = "./www/gallery/img/logos/$config_company_logo"; 
        }else{
            $logo  = "./www/gallery/img/logos/factux.jpg"; 
        }
        
       // vardump(isset($config_company_logo));
        
       // vardump(file_exists("./www/gallery/img/logos/$config_company_logo"));
        
        $this->SetFont('Arial', 'I', 8);
        $this->SetFillColor(255, 200, 250);
        // LOGO
        // LOGO
        // LOGO
        // LOGO
        //vardump($config_company_logo); 
        //vardump($logo); 
        
        //$this->Image($config_company_logo, 10, 10, -180);
        //$this->Image("./www/gallery/img/logos/".$config_company_logo, 10, 10, -180);
        $this->Image($logo, 10, 10, -180);

        //$this->Image("qr.png", 167, 50, -180);
        //https://prgm.spipu.net/view/27
        //$this->Image("qr.php", 167, 50, -180);
        // $this->Image("img/QR/$id.png", 157, 48, 40);               
        $this->SetX(-10);
        $this->SetX(190);
    //    $qrcode = new QRcode("$pdf_order[id]" ."-". $pdf_order["bac"], 'H');
    //    $qrcode->displayFPDF($this, $this->GetX() - 30, $this->GetY(), "40", array(255, 255, 255), array(0, 0, 0));

        $this->SetX(10);
        $this->SetFont('Arial', 'b', 12);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), utf8_decode("$config_company_name"), 0, 2, 'R', 0);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), utf8_decode("$config_company_a_address $config_company_a_number"),       "", 2, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), utf8_decode("$config_company_a_postal_code - $config_company_a_barrio"), "", 2, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), _trc("Tel").": " . utf8_decode($config_company_tel),                     "", 2, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "$config_company_url",                                                   "", 2, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(),  "$config_company_tva",                                                  "", 2, 'R', 0);
        //$this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "$config_company_email", "", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "-",                                                                     "", 2, 'R', 0);
        $this->SetFont('Arial', '', 8);
        $this->SetFillColor(255, 255, 255);
        
        $this->Ln();
    }
    
   
   
    
    
    /**
     * Mustra las direcciones
     * 
     * @param type $addresses_billing
     * @param type $addresses_delivery
     */
    function addresses($addresses_billing , $addresses_delivery) {
        $ba = $addresses_billing ;
        $da = $addresses_delivery ;
        
        
        // Saco la tva segun la direccion de facturacion 
        $contact_id = $ba['contact_id']; 
        $tva = contacts_field_id("tva", $contact_id);  
        
        

        # 1
        # 1
        # 1
        $this->SetFont('Arial' , 'B' , 10) ;
        $resetx = $this->GetX() ;
        $resetY = $this->GetY() ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , _trc("Billing Address") , 0 , 1 , 'L' , 0) ;
        $this->SetFont('Arial' , '' , 10) ;
        
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , contacts_formated($ba['contact_id']) , "" , 1 , 'L' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;
        
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , $ba['number'] . " " . utf8_decode($ba['address']) . "" , "" , 1 , 'L' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , $ba['postcode'] . " " . utf8_decode($ba['barrio']) , "" , 1 , 'L' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , ($ba['city']) . " " . utf8_decode($ba['country']) , "" , 1 , 'L' , 0) ;
        $this->SetFont('Arial' , 'B' , 10) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , _trc("Tva") . ": $tva" , "" , 1 , 'L' , 0) ;
        $this->SetFont('Arial' , '' , 10) ;


        $this->SetX($resetx + 102 + ($this->get_Pdf_ancho() / 2)) ;
        $this->SetY($resetY) ;
        $this->SetFont('Arial' , 'B' , 10) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , _trc("Delivery address") , 0 , 1 , 'L' , 0) ;
        $this->SetFont('Arial' , '' , 10) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , contacts_formated($da['contact_id']) , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , "" , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , ($da['number']) . " " . utf8_decode($da['address']) . "" , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , ($da['postcode']) . " " . ($da['barrio']) , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , ($da['city']) . " " . ($da['country']) , "" , 1 , 'L' , 0) ;
        
    }

    
    function encabezados() {

        $this->SetFont('Arial' , 'B' , 10) ;
        $this->SetFillColor(200 , 239 , 239) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15 , $this->get_Pdf_alto_linea() * 1 , _trc("Qty")         , 'B' , 0 , 'L' , 1) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 31 , $this->get_Pdf_alto_linea() * 1 , _trc("Description") , 'B' , 0 , 'C' , 1) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 9 , $this->get_Pdf_alto_linea() * 1 , _trc("Price")        , 'B' , 0,  'R' , 1) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 9 , $this->get_Pdf_alto_linea() * 1 , _trc("Sub total")    , 'B' , 0,  'R' , 1) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 9 , $this->get_Pdf_alto_linea() * 1 , _trc("Discount")     , 'B' , 0,  'R' , 1) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 9 , $this->get_Pdf_alto_linea() * 1 , _trc("HTVA")         , 'B' , 0,  'R' , 1) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 9 , $this->get_Pdf_alto_linea() * 1 , _trc("TVA")          , 'B' , 0,  'R' , 1) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 9 , $this->get_Pdf_alto_linea() * 1 , _trc("TVAC")         , 'B' , 1,  'R' , 1) ;
        $this->SetFont('Arial' , '' , 8) ;
        //$this->SetFillColor(249 , 249 , 249) ;
    }

    function lineasVacias($coloreada) {
        //$color = ( $i % 2 == 0 ) ? 1 : 0 ;
        $color = ( $coloreada ) ? 1 : 0 ;
        $this->Cell(($this->get_Pdf_ancho() / 100) *  5, $this->get_Pdf_alto_linea() * 1 , "-" , 0 , 0 , 'L' , $color) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 41, $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , "L" , $color) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) *  9, $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , $color) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) *  9, $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , $color) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) *  9, $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , $color) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) *  9, $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , $color) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) *  9, $this->get_Pdf_alto_linea() * 1 , "" , 0 , 0 , 'R' , $color) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) *  9, $this->get_Pdf_alto_linea() * 1 , "" , 0 , 1 , 'R' , $color) ;
    }
    
    function completarLineas($x){
        for($i=0; $i<$x; $i++){
            $this->lineasVacias($coloreada); 
        }
    }

    function condiciones($condiciones) {
        
         
     
    //$this->SetY(10);
    $this->SetFont('Arial', '', 15);
    $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea()*2, "Condiciones de venta", 0, 2, 'C', 0);
    
    $this->SetFont('Arial', '', 6);
    
    $this->MultiCell($this->get_Pdf_ancho(), 4, "$condiciones");
    
    //$this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea()*2, $doc_title, 0, 2, 'R', 0);
    
    $this->SetFont('Arial', '', 10);
    $this->SetY(43);
    $this->Ln();

    }
    
    function doc_title($doc_title) {
     
    $this->SetY(10);
    $this->SetFont('Arial', 'B', 15);
    $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea()*1, ($doc_title), 0, 2, 'C', 0);
    $this->SetFont('Arial', '', 10);
    $this->SetY(43);
    $this->Ln();

    }
    
    function payements_conditions($invoices){
        
                
        global $u_owner_id, $config_bank; 
        
        
        $tvac = $invoices['total'] + $invoices['tax']; 
        
        
        # CONDICIOES DE PAGO
        # CONDICIOES DE PAGO
        # CONDICIOES DE PAGO
        //$this->SetFont('Arial' , 'B' , 10) ;
        //$this->Cell(($this->get_Pdf_ancho() / 1) * 1 , $this->get_Pdf_alto_linea() * 1 , (_trc(" ")) , "" , 1 , 'L' , 0) ;

    //    $this->Ln() ;
        $this->SetFont('Arial' , '' , 10) ;
       
        
        $bank_name = $config_bank['bank'];
        $account_number = $config_bank['account_number']; 
        $bank_bic = $config_bank['bic'];
        $bank_iban = $config_bank['iban'];
        
       
        
        $this->Cell(($this->get_Pdf_ancho() / 1) * 1 , $this->get_Pdf_alto_linea() * 1 , "$bank_name -  ". (_trc("Account number"))." $account_number - "._trc("BIC")." $bank_bic " , "" , 1 , 'C' , 0) ;

        $this->Ln() ;
        $this->Cell($this->get_Pdf_ancho() , $this->get_Pdf_alto_linea() , _trc("Net to pay") . ' ' . monedaf($tvac) , 0 , 0 , 'C' , 0) ;
        $this->Ln() ;
        $this->Ln() ;

    }
    
    function communication($invoices){
        $this->SetFont('Arial' , 'B' , 10) ;
        $this->Cell(
                $this->get_Pdf_ancho() , 
                $this->get_Pdf_alto_linea() , 
                (_trc("Communication")) . ": " . $invoices['ce']   , 0 , 0 , 'C' , 1) ;
        
        $this->SetFont('Arial' , '' , 8) ;

    }
    
    function Footer() {
        
        global $u_id; 
        
        $doc_model = _options_option("doc_model"); 

        // Positionnement à 1,5 cm du bas        
        $this->SetY(-15);        
        
        //$this->Cell($this->get_Pdf_ancho(), $this->get_Pdf_alto_linea(), "", 1, 1); 
        $this->SetFont('Arial', '', 7);
        $this->Cell(10, 10, 'Doc : ' . $doc_model, 0, 0, 'L');
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
        $this->Cell(0, 10, 'Print by '.$u_id.' '. contacts_formated($u_id).' '  . date("d/m/Y H:i"), 0, 0, 'R');
        $this->SetFont('Arial', '', 8);
    }

    function cell_empresa($id) {
        global
        $config_company_a_address,
        $config_company_a_number,
        $config_company_a_postal_code,
        $config_company_a_barrio,
        $config_company_tel,
        $config_company_url,
        $config_company_email;


        $this->SetFont('Arial', 'I', 8);

        $this->SetFillColor(255, 200, 250);

        $this->Image("logo.jpg", 15, 50, -180);
        //$this->Image("qr.png", 167, 50, -180);
        //https://prgm.spipu.net/view/27
        //$this->Image("qr.php", 167, 50, -180);
        // $this->Image("img/QR/$id.png", 157, 48, 40);

        $this->SetX(10);



        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "", "LTR", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "$config_company_a_address $config_company_a_number", "LR", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "$config_company_a_postal_code - $config_company_a_barrio", "LR", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "Tel: $config_company_tel", "LR", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "$config_company_url", "LR", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "", "LR", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "$config_company_email", "LR", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "", "LBR", 2, 'C', 0);

        $this->Ln();
    }

    

    

    function cell_client($client) {

        $this->SetFont('Arial', 'I', 8);

        $this->SetFillColor(255, 200, 250);


        $this->SetFont('Arial', 'B', 8);
        $this->Cell($this->get_Pdf_ancho(), $this->get_Pdf_alto_linea(), _trc("Company"), "LTR", 1, 'L', 1);

        $this->SetFont('Arial', '', 8);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), _trc("Name"), "LT", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), "$client[name]", "T", 0, 'R', 0);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), _trc("Delivery address") . " [$client[da_id]]", 1, 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), _trc("Billing address") . " [$client[ba_id]]", 1, 1, 'R', 0);
        $this->SetFont('Arial', '', 8);


        //2
        $this->SetFillColor(255, 200, 250);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), _trc("Id Company"), "LT", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), "$client[id]", "T", 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), "$client[da_number] - $client[da_address]", 1, 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), "$client[ba_number] - $client[ba_address]", 1, 1, 'R', 0);


        $this->SetFillColor(255, 200, 250);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), _trc(""), "LT", 0, 'L', 0);
        //$this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), "$client[client_ref]", "T", 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), "", "T", 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), "$client[da_postcode] - $client[da_barrio]", 1, 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), "$client[ba_postcode] - $client[ba_barrio] ", 1, 1, 'R', 0);




        $this->SetFillColor(255, 200, 250);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), "", "LBT", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), "", "TB", 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), "$client[da_city] - $client[da_country]", 1, 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), "$client[ba_city] - $client[ba_city]", 1, 1, 'R', 0);
        $this->Ln();
    }


    function cell_comments() {
        global $invoices;
        $this->SetFont('Arial', '', 8);
        $this->SetFillColor(255, 255, 255);                              
        $this->MultiCell($this->get_Pdf_ancho(), $this->get_Pdf_alto_linea() , _trc("Comments") . ": " . utf8_decode($invoices['comments']), 0, 'L', 1);        
    }

    function cell_QR() {
        $qrcode = new QRcode("2020", 'H');
        $qrcode->displayFPDF($this, $x, $y, "40", array(255, 255, 255), array(0, 0, 0));

        
        
    }
    
    
    function LettreReceiverAddress($data){
        //$this->SetFillColor(255, 255, 0);
        $this->MultiCell($this->get_Pdf_ancho(), $this->get_Pdf_alto_linea() + 2, $data, 0, 'R', 0);
    }
    
    function LettreDate($date){
        //$this->SetFillColor(255, 255, 0);
        $this->MultiCell($this->get_Pdf_ancho(), $this->get_Pdf_alto_linea() + 2, $date, 0, 'R', 0);
    }
    
        function LettreBody($text){
        $this->MultiCell($this->get_Pdf_ancho(), $this->get_Pdf_alto_linea() + 2, $text, 0, 'L', 0);
    }
    
        function LettreSignature($signature){
        $this->MultiCell($this->get_Pdf_ancho(), $this->get_Pdf_alto_linea() + 2, $signature, 0, 'L', 0);
    }
    
    
    
    
}
