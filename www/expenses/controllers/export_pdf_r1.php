<?php

if ( ! permissions_has_permission($u_rol , $c , "read") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false ;

$headoffice_id = offices_headoffice_of_office(expenses_field_id("client_id", $id)); 

$addresses_billing = addresses_billing_by_contact_id($headoffice_id); 

$name = "Lucho" ;
$lastname = "Perez" ;
$salutation = "Monsieur" ;

$error = array() ;

################################################################################

if ( ! $id ) {
    array_push($error , "ID Don't send") ;
}

################################################################################

if ( ! expenses_is_id($id) ) {
    array_push($error , 'ID format error') ;
}
################################################################################

if ( ! expenses_field_id("id" , $id) ) {
    array_push($error , "Invoice id not exist") ;
}




if ( ! $error ) {

    $expenses = expenses_list() ;

//    $addresses_billing = json_decode($expenses['addresses_billing'] , true) ;
//
//    $addresses_delivery = json_decode($expenses['addresses_delivery'] , true) ;

    $lettreTitle = _tr("Reminder 1") ;

    $lettreDate = _tr("Brussels") . ", " .  date("d") . " ". _tr(date("F")) . " ". date("Y") ;

    $lettreBody = _tr("Subject: Reminder of payment due.") ;

    $lettreBody .= "

" ;

    $lettreBody .= "$salutation, $name $lastname" ;
    $lettreBody .= "
" ;

    $lettreBody .= _tr("Unless we are mistaken or omitted, we note that your customer account currently has a debit balance.");
    $lettreBody .= _tr("This amount corresponds to our unpaid expenses") ;

    $lettreBody .= "

" ;

    $lettreBody .= _tr("As the deadline has passed, we ask you to correct this situation by return mail. In the event that your payment has been sent in the meantime, we ask you not to take this into account.") ;

    $lettreBody .= "

" ;

    $lettreBody .= _tr("Thank you in advance, we ask you to accept") ;

    $lettreBody .= " $name $lastname " ;

    $lettreBody .= _tr("the expression of our best regards.") ;

    $lettreBody .= "

" ;




$lettreSignature = _tr("Accountability service") ;

$lettreSignature .= "
$config_company_name
Tel: $config_company_tel
email: $config_company_email" ;



    include view("expenses" , "export_pdf_r1") ;
} else {

    include view("home" , "pageError") ;
}
