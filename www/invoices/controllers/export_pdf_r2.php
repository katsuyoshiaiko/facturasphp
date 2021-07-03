<?php

if ( ! permissions_has_permission($u_rol , $c , "read") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}
$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false ;
$headoffice_id = offices_headoffice_of_office(invoices_field_id("client_id", $id)); 

// si no envio un destinatario, saco el Admin_HeadOffice de la empresa
$reciver_id = (isset($_REQUEST["reciver_id"])) ? clean($_REQUEST["reciver_id"]) : offices_list_user_by_rol($headoffice_id, "Admin_HeadOffice")['contact_id'] ;
$message = (isset($_REQUEST["message"])) ? clean($_REQUEST["message"]) : false ;
$way = (isset($_REQUEST["way"])) ? clean($_REQUEST["way"]) : false ;
$addresses_billing = addresses_billing_by_contact_id($headoffice_id); 
$reciver_name = contacts_field_id("name", $reciver_id) ;
$reciver_lastname = contacts_field_id("lastname", $reciver_id) ;
$reciver_salutation = contacts_field_id("title", $reciver_id) ;
$reciver_email = directory_search_data_by_contact_id("Email", $reciver_id)[0];

$message = nl2br($message); 

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

    // recojo la lista de facturas impagas de este client
    $invoices = invoices_receivable_by_client($headoffice_id);  

//    $addresses_billing = json_decode($invoices['addresses_billing'] , true) ;
//
//    $addresses_delivery = json_decode($invoices['addresses_delivery'] , true) ;

    $lettreTitle = _tr("Reminder 2") ;

    $lettreDate = _tr("Brussels") . ", " . date("d") . " " . _tr(date("F")) . " " . date("Y") ;

    $lettreBody = _tr("Subject: Reminder of payment due.") ;

    $lettreBody .= "

" ;

    $lettreBody .= "$reciver_salutation, $reciver_name $reciver_lastname" ;
    $lettreBody .= "
" ;

    $lettreBody .= _tr("Unless we are mistaken or omitted, we note that your customer account currently has a debit balance.");
    $lettreBody .= _tr("This amount corresponds to your unpaid invoices") ;

    $lettreBody .= "

" ;

    $lettreBody .= _tr("As the deadline has passed, we ask you to correct this situation by return mail. In the event that your payment has been sent in the meantime, we ask you not to take this into account.") ;

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
Tel: $config_company_tel" ;



    include view("invoices" , "export_pdf_r2") ;
    
    
} else {

    include view("home" , "pageError") ;
}
