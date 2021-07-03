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

    $lettreTitle = _tr("Citation with lawyer") ;

    $lettreDate = _tr("Brussels") . ", " .  date("d") . " ". _tr(date("F")) . " ". date("Y") ;

    $lettreBody = _tr("Subject: Reminder of payment due.") ;

    $lettreBody .= "

" ;

    $lettreBody .= "$reciver_salutation, $reciver_name $reciver_lastname" ;
    $lettreBody .= "
" ;

    $lettreBody .= _tr("We regret to note that you did not follow up on our previous reminder and that your account remains still debitor corresponding to your following unpaid invoices:") ;

    $lettreBody .= "

" ;

    $lettreBody .= _tr("We therefore ask you to pay us the full amount within a week. After this deadline, we entrust the file to our firm which will implement all the necessary steps to recover your debit.") ;

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



    include view("invoices" , "export_pdf_r3") ;
    
} else {

    include view("home" , "pageError") ;
}
