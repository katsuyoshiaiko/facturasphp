<?php

if ( ! permissions_has_permission($u_rol , $c , "read") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}

// id invoice
// id invoice
// id invoice
// id invoice
$id             = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false ;
$type           = (isset($_REQUEST["type"])) ? clean($_REQUEST["type"]) : false ;
$headoffice_id  = offices_headoffice_of_office(invoices_field_id("client_id", $id)); 
// si no envio un destinatario, saco el Admin_HeadOffice de la empresa
$reciver_id     = (isset($_REQUEST["reciver_id"])) ? clean($_REQUEST["reciver_id"]) : offices_list_user_by_rol($headoffice_id, "Admin_HeadOffice")['contact_id'] ;
$message        = (isset($_REQUEST["message"])) ? clean($_REQUEST["message"]) : false ;
$way            = (isset($_REQUEST["way"])) ? clean($_REQUEST["way"]) : false ;
$email_cc       = (isset($_REQUEST["cc"])) ? clean($_REQUEST["cc"]) : false ;
// caja check or not 
$cc2m           = (isset($_REQUEST["cc2m"])) ? clean($_REQUEST["cc2m"]) : false ;
// si caja check, recojo el email del usuario conectado 
if( $cc2m ){
    $email_cc2m = directory_search_data_by_contact_id("Email", $u_id)[0]; 
}
$addresses_billing      = addresses_billing_by_contact_id($headoffice_id); 
$reciver_name           = contacts_field_id("name", $reciver_id) ;
$reciver_lastname       = contacts_field_id("lastname", $reciver_id) ;
$reciver_salutation     = contacts_field_id("title", $reciver_id) ;
$reciver_email          = directory_search_data_by_contact_id("Email", $reciver_id)[0];
//
$message = nl2br($message); 
////////////////////////////////////////////////////////////////////////////////
// Verificar los email to, cc, ccb 
// mensajhe 
//
if( ! is_email($reciver_email) ){
    array_push($error , '$reciver_email : Email format is not correct') ;
}
if( ! is_email($email_cc) ){
    array_push($error , '$email_cc : Email format is not correct') ;
}
//
if( ! is_email($email_cc2m) ){
    array_push($error , '$cc2m : Email format is not correct') ;
}



$error = array() ;




################################################################################

if ( ! $id ) {
    array_push($error , "ID Don't send") ;
}

################################################################################

if ( ! invoices_is_id($id) ) {
    array_push($error , 'ID format error') ;
}
################################################################################

if ( ! invoices_field_id("id" , $id) ) {
    array_push($error , "Invoice id not exist") ;
}


if ( ! $error ) {

    $invoices = invoices_list() ;

//    $addresses_billing = json_decode($invoices['addresses_billing'] , true) ;
//
//    $addresses_delivery = json_decode($invoices['addresses_delivery'] , true) ;

    
// CONTENIDO DE CARTA
// CONTENIDO DE CARTA
// CONTENIDO DE CARTA

    $lettreTitle = _trc("Invoice") ;    
    $lettreDate = _trc("Brussels") . ", " .  date("d") . " ". _trc(date("F")) . " ". date("Y") ;
    $lettreBody = _tr("Subject: Invoice.") ;
    $lettreBody .= "
" ;

    $lettreBody .= "$reciver_salutation, $reciver_name $reciver_lastname" ;
    $lettreBody .= "
" ;

    $lettreBody .= _tr("Adjunta a esta carta encontrará la factura que emitimos a su nombre.
            ") ;

    $lettreBody .= "

" ;
    $lettreBody .= _tr("Rogamos revisen los datos de la factura adjunta y si hubiera alguna incorrección nos lo indiquen lo antes posible para volver a emitirla.") ;
    $lettreBody .= "

" ;
        
    $lettreBody .= _tr("Sin otro particular y agradeciéndoles su confianza en nosotros, reciban un cordial saludo.") ;
    $lettreBody .= "

" ;
        
    $lettreBody .= _tr("Thank you in advance, we ask you to accept") ;
    $lettreBody .= " $reciver_name $reciver_lastname " ;
    $lettreBody .= _tr("the expression of our best regards.") ;
    $lettreBody .= "

" ;
    
$lettreSignature = _tr("Accountability service") ;

$lettreSignature .= "
$config_company_name
Tel: $config_company_tel
email: $config_company_email" ;

// CONTENIDO DE CARTA
// CONTENIDO DE CARTA
// CONTENIDO DE CARTA

    $invoices = invoices_details($id) ;
    
    //$pdf_advance = 100;
    

    $addresses_billing = json_decode($invoices['addresses_billing'] , true) ;

    $addresses_delivery = json_decode($invoices['addresses_delivery'] , true) ;


    
    
    
    // esto es para la expotacion en qr
    $invoice_qr['factux']['version'] = "beta"; 
    //$invoice_qr['factux']['date'] = "2020-04-11"; 
    $invoice_qr['invoice']['number'] = $id; 
//    $invoice_qr['invoice']['from_budget'] = $invoices['budget_id']; 
//    $invoice_qr['invoice']['addresses_billing'] = $invoices['addresses_billing']; 
//    $invoice_qr['invoice']['addresses_delivery'] = $invoices['addresses_delivery']; 
    
    
    $invoice_qr_json = json_encode($invoice_qr); 
    
    
    include view("invoices" , "export_pdf") ;
    

    
    
    
} else {

    include view("home" , "pageError") ;
}
