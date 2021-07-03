<?php

require "includes/qrcode/qrcode.class.php";
//require "includes/phpqrcode/qrlib.php";
require('includes/fpdf/fpdf.php');

class MIRI extends FPDF {

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
        $pdf_order, 
                $pdf_order_remake, 
                $pdf_order_date, 
                $pdf_order_date_delivery, 
                $dif_day, 
                $config_company_name, 
                $config_company_a_address, 
                $config_company_a_number,
                $config_company_a_postal_code, 
                $config_company_a_barrio,  
                $config_company_tel, 
                $config_company_url, 
                $config_company_email, 
                $config_company_logo, 
                $config_company_tva; 

        $this->SetFont('Arial', 'I', 8);
        $this->SetFillColor(255, 200, 250);
        $this->Image($config_company_logo, 10, 10, -200);

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
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), utf8_decode("$config_company_name"), 0, 2, 'C', 0);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), utf8_decode("$config_company_a_address $config_company_a_number"), "", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), utf8_decode("$config_company_a_postal_code - $config_company_a_barrio"), "", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), _trc("Tel").": " . utf8_decode($config_company_tel), "", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "$config_company_url", "", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(),  "$config_company_tva", "", 2, 'C', 0);
        //$this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "$config_company_email", "", 2, 'C', 0);
        $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea(), "-", 0, 2, 'C', 0);
    //    $this->SetFont('Arial', '', 8);
    //    $this->SetFillColor(255, 255, 255);        
        
    $this->Ln();
    }
    
   
       function addresses($addresses_billing , $addresses_delivery) {
        $ba = $addresses_billing ;
        $da = $addresses_delivery ;
        
        
        // Saco la tva segun la direccion de facturacion 
        $contact_id = $ba['contact_id']; 
        $tva = contacts_field_id("tva", $contact_id);  
        
        # 1
        $this->SetFont('Arial' , 'B' , 10) ;
        $resetx = $this->GetX() ;
        $resetY = $this->GetY() ;
        
        
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , _trc("Billing address") , 0 , 1 , 'L' , 0) ;
        $this->SetFont('Arial' , '' , 10) ;
        
        
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , utf8_decode(contacts_formated($ba['contact_id'])) , "" , 1 , 'L' , 0) ;
        
        
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , $ba['number'] . ", " . utf8_decode($ba['address']) . "" , "" , 1 , 'L' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , $ba['postcode'] . " " . utf8_decode($ba['barrio']) , "" , 1 , 'L' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , utf8_decode($ba['city']) . " " . utf8_decode(countries_country_by_country_code($ba['country'])) , "" , 1 , 'L' , 0) ;
          


        $this->SetX($resetx + 102 + ($this->get_Pdf_ancho() / 2)) ;
        $this->SetY($resetY) ;
        $this->SetFont('Arial' , 'B' , 10) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , _trc("Delivery address") , 0 , 1 , 'L' , 0) ;
        $this->SetFont('Arial' , '' , 10) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , utf8_decode(contacts_formated($da['contact_id'])) , "" , 1 , 'L' , 0) ;

        

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , ($da['number']) . ", " . utf8_decode($da['address']) . "" , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , ($da['postcode']) . " " . utf8_decode($da['barrio']) , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , utf8_decode($da['city']) . " " . utf8_decode(countries_country_by_country_code($da['country'])) , "" , 1 , 'L' , 0) ;
        $this->SetFont('Arial' , 'B' , 10) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , _trc("Tva") . ": $tva" , "" , 1 , 'L' , 0) ;
        $this->SetFont('Arial' , '' , 10) ;
        
    }

    
    
    /**
     * Mustra las direcciones
     * 
     * @param type $addresses_billing
     * @param type $addresses_delivery
     */
    function addresses_invoice($addresses_billing , $addresses_delivery) {
        $ba = $addresses_billing ;
        $da = $addresses_delivery ;
        
        
        // Saco la tva segun la direccion de facturacion 
        $contact_id = $ba['contact_id']; 
        $tva = contacts_field_id("tva", $contact_id);  
        
        # 1
        $this->SetFont('Arial' , 'B' , 10) ;
        $resetx = $this->GetX() ;
        $resetY = $this->GetY() ;
        
//        
//        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , _trc("Delivery address") , 0 , 1 , 'L' , 0) ;
//        $this->SetFont('Arial' , '' , 10) ;
//        
//        
//        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , utf8_decode(contacts_formated($da['contact_id'])) , "" , 1 , 'L' , 0) ;
//        
//        
//        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , $da['number'] . ", " . utf8_decode($da['address']) . "" , "" , 1 , 'L' , 0) ;
//        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , $da['postcode'] . " " . utf8_decode($da['barrio']) , "" , 1 , 'L' , 0) ;
//        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , utf8_decode($da['city']) . " " . utf8_decode(countries_country_by_country_code($da['country'])) , "" , 1 , 'L' , 0) ;
          


        $this->SetX($resetx + 102 + ($this->get_Pdf_ancho() / 2)) ;
        $this->SetY($resetY) ;
        $this->SetFont('Arial' , 'B' , 10) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , _trc("Billing address") , 0 , 1 , 'L' , 0) ;
        $this->SetFont('Arial' , '' , 10) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , utf8_decode(contacts_formated($ba['contact_id'])) , "" , 1 , 'L' , 0) ;

        

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , ($ba['number']) . ", " . utf8_decode($ba['address']) . "" , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , ($ba['postcode']) . " " . utf8_decode($ba['barrio']) , "" , 1 , 'L' , 0) ;

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , '' , "" , 0 , 'R' , 0) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , utf8_decode($ba['city']) . " " . utf8_decode(countries_country_by_country_code($ba['country'])) , "" , 1 , 'L' , 0) ;
        $this->SetFont('Arial' , 'B' , 10) ;
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5 , $this->get_Pdf_alto_linea() * 1 , _trc("Tva") . ": $tva" , "" , 1 , 'L' , 0) ;
        $this->SetFont('Arial' , '' , 10) ;
        
    }

    
    function encabezados() {

        $this->SetFont('Arial' , 'B' , 8) ;
        $this->SetFillColor(249 , 249 , 249) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 5  , $this->get_Pdf_alto_linea() * 1 , _trc("Qty") , 0 , 0 , 'L' , 1) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 7  , $this->get_Pdf_alto_linea() * 1 , _trc("Code") , 0 , 0 , 'L' , 1) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 28 , $this->get_Pdf_alto_linea() * 1 , _trc("Description") , 0 , 0 , 'L' , 1) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , _trc("Price") , "0" , 0 , 'R' , 1) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , _trc("Sub total") , "0" , 0 , 'R' , 1) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , _trc("Discount") , "0" , 0 , 'R' , 1) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , _trc("HTVA") , "0" , 0 , 'R' , 1) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , _trc("TVA") , "0" , 0 , 'R' , 1) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10 , $this->get_Pdf_alto_linea() * 1 , _trc("TVAC") , "0" , 1 , 'R' , 1) ;
        $this->SetFont('Arial' , '' , 8) ;
        $this->SetFillColor(249 , 249 , 249) ;
    }

    function lineasVacias($coloreada) {
        //$color = ( $i % 2 == 0 ) ? 1 : 0 ;
        $color = ( $coloreada ) ? 1 : 0 ;
        
        $this->Cell(($this->get_Pdf_ancho() / 100) * 5 ,    $this->get_Pdf_alto_linea() * 0.71 , '-' , 0 , 0 , 'L' , $color) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 41 ,   $this->get_Pdf_alto_linea() * 0.71 , " " , 0 , 0 , "L" , $color) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 9 ,    $this->get_Pdf_alto_linea() * 0.71 , " " , 0 , 0 , 'R' , $color) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 9 ,    $this->get_Pdf_alto_linea() * 0.71 , " " , 0 , 0 , 'R' , $color) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 9 ,    $this->get_Pdf_alto_linea() * 0.71 , " " , 0 , 0 , 'R' , $color) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 9 ,    $this->get_Pdf_alto_linea() * 0.71 , " " , 0 , 0 , 'R' , $color) ;
        $this->Cell(($this->get_Pdf_ancho() / 100) * 9 ,    $this->get_Pdf_alto_linea() * 0.71 , " " , 0 , 0 , 'R' , $color) ;        
        $this->Cell(($this->get_Pdf_ancho() / 100) * 9 ,    $this->get_Pdf_alto_linea() * 0.71 , "" , 0 , 1 , 'R' , $color) ;
    }
    
    function completarLineas($x){
        for($i=0; $i<$x; $i++){
            $this->lineasVacias($coloreada); 
        }
    }

    function condiciones($condiciones) {
        
         
     
    //$this->SetY(10);
    $this->SetFont('Arial', '', 15);
    $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea()*2, _trc('Terms of sale'), 0, 2, 'C', 0);
    $this->SetFont('Arial', '', 8);
    
    $this->MultiCell($this->get_Pdf_ancho(), 4, "$condiciones");
    
    //$this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea()*2, $doc_title, 0, 2, 'R', 0);
    $this->SetFont('Arial', '', 10);
    $this->SetY(43);
    $this->Ln();

    }
    
    function doc_title($doc_title) {
     
    $this->SetY(10);
    $this->SetFont('Arial', 'B', 15);
    $this->Cell(($this->get_Pdf_ancho()), $this->get_Pdf_alto_linea()*2, ($doc_title), 0, 2, 'R', 0);
    $this->SetFont('Arial', '', 10);
    $this->SetY(43);
    //$this->Ln();

    }
    
    function payements_conditions($invoices){                        
        global $u_owner_id, $config_bank;                         
               
        $tvac = $invoices['total'] + $invoices['tax']; 
        $solde = ($tvac - $invoices['advance']) ;             
        $bank_name = $config_bank['bank'];
        $account_number = $config_bank['account_number']; 
        $bank_bic = $config_bank['bic'];
        $bank_iban = $config_bank['iban'];
                       
        $this->SetFont('Arial' , '' , 10) ;
        $this->Cell(($this->get_Pdf_ancho() / 1) * 1 , $this->get_Pdf_alto_linea() * 1 , "$bank_name -  ". (_trc("Account number"))." $account_number - "._trc("BIC")." $bank_bic " , "" , 1 , 'C' , 0) ;

        $this->Ln() ;
        $this->Cell($this->get_Pdf_ancho() , $this->get_Pdf_alto_linea() , _trc("To pay") . ' ' . monedaf($solde) , 0 , 0 , 'C' , 0) ;
        $this->Ln() ;
        $this->Ln() ;

    }
    
    function communication($invoices){
        
        $this->Cell($this->get_Pdf_ancho() , $this->get_Pdf_alto_linea() , (_trc("Communication")) . ": " . $invoices['ce']   , 1 , 1 , 'C' , 1) ;

    }
    
    function Footer() {
        
        global $u_id; 
        
        $doc_model = _options_option("doc_model"); 

        // Positionnement à 1,5 cm du bas        
        $this->SetY(-15);        
        
        //$this->Cell($this->get_Pdf_ancho(), $this->get_Pdf_alto_linea(), "", 1, 1); 
        $this->SetFont('Arial', '', 7);
        $this->Cell(10, 10, 'Doc_model: ' . $doc_model, 0, 0, 'L');
        $this->Cell(10, 10, '', 0, 0, 'L');
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
        $this->Cell(0, 10, 'Print by '.$u_id.' '. utf8_decode(contacts_formated($u_id)).' '  . date("d/m/Y H:i"), 0, 0, 'R');
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

    
    function cell_patient($p) {

        $this->SetFont('Arial', 'I', 8);

        $this->SetFillColor(255, 200, 250);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell($this->get_Pdf_ancho(), $this->get_Pdf_alto_linea(), _trc("Patient"), "LTR", 1, 'L', 1);
        $this->SetFont('Arial', '', 8);

        $this->SetFillColor(255, 200, 250);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea(), _trc("Name"), "LT", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea(), _trc("Lastname"), "LT", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea(), _trc("Birthdate"), "LT", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea(), _trc("Nationa Number"), "LTR", 1, 'L', 0);

        $this->SetFillColor(255, 200, 250);
        //$this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea(), _trc("Name"), "LTB", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea(), utf8_decode($p['name']), "LTB", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea(), utf8_decode($p['lastname']), "LTB", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea(), utf8_decode($p['bd']), "LTRB", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea(), utf8_decode($p['nn']), "LTRB", 1, 'L', 0);



        $this->Ln();
    }

    function cell_client($client) {

        $this->SetFont('Arial', 'I', 8);

        $this->SetFillColor(255, 200, 250);


        $this->SetFont('Arial', 'B', 8);
        $this->Cell($this->get_Pdf_ancho(), $this->get_Pdf_alto_linea(), _trc("Company"), "LTR", 1, 'L', 1);

        $this->SetFont('Arial', '', 8);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), _trc("Name"), "LT", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), utf8_decode($client['name']), "T", 0, 'R', 0);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), _trc("Delivery address") . " [$client[da_id]]", 1, 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), _trc("Billing address") . " [$client[ba_id]]", 1, 1, 'R', 0);
        $this->SetFont('Arial', '', 8);


        //2
        $this->SetFillColor(255, 200, 250);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), _trc("Id Company"), "LT", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), "$client[id]", "T", 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), "$client[da_number] - ". utf8_decode($client['da_address']), 1, 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), "$client[ba_number] - ". utf8_decode($client['ba_address']) , 1, 1, 'R', 0);


        $this->SetFillColor(255, 200, 250);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), _trc(""), "LT", 0, 'L', 0);
        //$this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), "$client[client_ref]", "T", 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), "", "T", 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), "$client[da_postcode] - ". utf8_decode($client['da_barrio']), 1, 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), "$client[ba_postcode] - ". utf8_decode($client['ba_barrio']), 1, 1, 'R', 0);




        $this->SetFillColor(255, 200, 250);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), "", "LBT", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 6, $this->get_Pdf_alto_linea(), "", "TB", 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), utf8_decode($client['da_city']) . " - " . utf8_decode($client['da_country']) , 1, 0, 'R', 0);
        $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea(), utf8_decode($client['ba_city']) . " - " . utf8_decode($client['ba_city']), 1, 1, 'R', 0);
        $this->Ln();
    }

    
    function cell_items($pdf_items_l, $pdf_items_l_options, $pdf_items_r, $pdf_items_r_options, $pdf_items_s, $pdf_items_s_options) {

        $this->SetFillColor(255, 200, 250);
        $this->SetFont('Arial', 'B', 8);
        //   $this->Cell(($this->get_Pdf_ancho() / 20) * 9.8, $this->get_Pdf_alto_linea(), _trc("Items Left"), 1, 0, 'C', 1);
        // $this->Cell(($this->get_Pdf_ancho() / 20) * 0.4, $this->get_Pdf_alto_linea(), "", 0, 0, 'R', 0);
        // $this->Cell(($this->get_Pdf_ancho() / 20) * 9.8, $this->get_Pdf_alto_linea(), _trc("Items Right"), 1, 1, 'C', 1);
        $this->SetFont('Arial', '', 8);

        $this->SetFillColor(255, 200, 250);

        $x = $this->GetX();
        $y = $this->GetY();



        ########################################################################
        ########################################################################
        ########################################################################
        if ($pdf_items_s) {
            ### START STEREO ########################################################

            $this->SetFillColor(255, 200, 250);
            $this->SetFont('Arial', 'B', 8);
            $this->Cell(($this->get_Pdf_ancho() / 1) * 1, $this->get_Pdf_alto_linea(), _trc("STEREO"), 1, 1, 'C', 1);
            $this->SetFont('Arial', '', 8);

            $i = 0;
            if ($pdf_items_s) {
                foreach ($pdf_items_s as $key => $value) {
                    $llenado = 0;
                    if ($i % 2 == 0) {
                        $llenado = 1;
                    }
                    $this->Cell(($this->get_Pdf_ancho() / 2) * 1, $this->get_Pdf_alto_linea(), strtoupper($key), 1, 0, 'R', $llenado);
                    $this->Cell(($this->get_Pdf_ancho() / 2) * 1, $this->get_Pdf_alto_linea(), utf8_decode($value), 1, 1, 'L', $llenado);
                    $i++;
                }

                if ($pdf_items_s_options) {
                    foreach ($pdf_items_s_options as $key => $value) {
                        $llenado = 0;
                        if ($i % 2 == 0) {
                            $llenado = 1;
                        }
                        $this->Cell(($this->get_Pdf_ancho() / 2 ) * 1, $this->get_Pdf_alto_linea(), strtoupper("option"), 1, 0, 'R', $llenado);
                        $this->Cell(($this->get_Pdf_ancho() / 2 ) * 1, $this->get_Pdf_alto_linea(), utf8_decode($value), 1, 1, 'L', $llenado);

                        $i++;
                    }
                }
            }
            ### END STEREO ########################################################
        } else {
            //
            ### START RIGHT ########################################################

            $i = 0;
            if ($pdf_items_l) {



                $this->SetFillColor(255, 200, 250);
                $this->SetFont('Arial', 'B', 8);
                $this->Cell(($this->get_Pdf_ancho() / 20) * 9.8, $this->get_Pdf_alto_linea(), _trc("Items Left"), 1, 1, 'C', 1);

                //$this->Cell(($this->get_Pdf_ancho() / 20) * 0.4, $this->get_Pdf_alto_linea(), "", 0, 0, 'R', 0);
                //$this->Cell(($this->get_Pdf_ancho() / 20) * 9.8, $this->get_Pdf_alto_linea(), _trc("Items Right"), 1, 1, 'C', 1);
                $this->SetFont('Arial', '', 8);



                foreach ($pdf_items_l as $key => $value) {
                    $llenado = 0;
                    if ($i % 2 == 0) {
                        $llenado = 1;
                    }
                    $this->Cell(($this->get_Pdf_ancho() / 20) * 4.9, $this->get_Pdf_alto_linea(), strtoupper($key), 1, 0, 'R', $llenado);
                    $this->Cell(($this->get_Pdf_ancho() / 20) * 4.9, $this->get_Pdf_alto_linea(), utf8_decode($value), 1, 1, 'L', $llenado);
                    $i++;
                }

                if ($pdf_items_l_options) {
                    foreach ($pdf_items_l_options as $key => $value) {
                        $llenado = 0;
                        if ($i % 2 == 0) {
                            $llenado = 1;
                        }
                        $this->Cell(($this->get_Pdf_ancho() / 20) * 4.9, $this->get_Pdf_alto_linea(), strtoupper("Option"), 1, 0, 'R', $llenado);
                        $this->Cell(($this->get_Pdf_ancho() / 20) * 4.9, $this->get_Pdf_alto_linea(), utf8_decode($value), 1, 1, 'L', $llenado);

                        $i++;
                    }
                }
            }
            ### END RIGHT ########################################################
            ### START LEFT ########################################################
            $i = 0;

            if ($pdf_items_r) {

                $this->SetX(120);
                $this->SetY($y);

                $this->SetFillColor(255, 200, 250);
                $this->SetFont('Arial', 'B', 8);
                $this->Cell(($this->get_Pdf_ancho() / 20) * 9.8, $this->get_Pdf_alto_linea(), "", 0, 0, 'C', 0);

                $this->Cell(($this->get_Pdf_ancho() / 20) * 0.4, $this->get_Pdf_alto_linea(), "", 0, 0, 'R', 0);
                $this->Cell(($this->get_Pdf_ancho() / 20) * 9.8, $this->get_Pdf_alto_linea(), _trc("Items Right"), 1, 1, 'C', 1);
                $this->SetFont('Arial', '', 8);


                foreach ($pdf_items_r as $key => $value) {
                    $llenado = 0;
                    if ($i % 2 == 0) {
                        $llenado = 1;
                    }

                    $this->Cell(97, $this->get_Pdf_alto_linea(), "", 0, 0, 'R', 0);
                    $this->Cell(($this->get_Pdf_ancho() / 20) * 4.9, $this->get_Pdf_alto_linea(), strtoupper($key), 1, 0, 'R', $llenado);
                    $this->Cell(($this->get_Pdf_ancho() / 20) * 4.9, $this->get_Pdf_alto_linea(), utf8_decode($value), 1, 1, 'L', $llenado);
                    $i++;
                }



                if ($pdf_items_r_options) {
                    foreach ($pdf_items_r_options as $key => $value) {
                        $llenado = 0;
                        if ($i % 2 == 0) {
                            $llenado = 1;
                        }
                        $this->Cell(97, $this->get_Pdf_alto_linea(), "", 0, 0, 'R', 0);
                        $this->Cell(($this->get_Pdf_ancho() / 20) * 4.9, $this->get_Pdf_alto_linea(), strtoupper("Option"), 1, 0, 'R', $llenado);
                        $this->Cell(($this->get_Pdf_ancho() / 20) * 4.9, $this->get_Pdf_alto_linea(), utf8_decode($value), 1, 1, 'L', $llenado);

                        $i++;
                    }
                }
            }
            ### END LEFT ########################################################
        //
        }
        ########################################################################
        ########################################################################
        ########################################################################
    }

    function cell_extras() {
        $this->SetFont('Arial', 'I', 12);

        $this->SetFillColor(255, 200, 210);
        $this->Cell($this->get_Pdf_ancho(), 10, _trc("Extras"), 1, 1, 'L', 1);
    }

    function cell_comments() {
        global $pdf_order;
        $this->SetFont('Arial', 'I', 10);
        $this->SetFillColor(255, 255, 255);
        //$this->MultiCell($w, $h, $txt, $border, $align, $fill); 
        $this->MultiCell($this->get_Pdf_ancho(), $this->get_Pdf_alto_linea() + 2, _trc("Comments") . ": " . utf8_decode($pdf_order['comments']), 0, 'L', 1);
        //$this->Cell($this->get_Pdf_ancho(), 10, _trc("Comments") . ": " . $pdf_order['comments'], 1, 1, 'L', 1);
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
