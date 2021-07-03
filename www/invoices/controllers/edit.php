<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;

$error = array();

################################################################################
if (!$id) {
    array_push($error, "ID Don't send");
}

if (!invoices_is_id($id)) {
    array_push($error, "ID format error");
}

$status = invoices_field_id("status", $id);

switch ($status) {
    case 0:
        array_push($error, "This invoice has status error");
        break;

    case -10:
    case -20:
        array_push($error, "An invoice with this status cannot be edited");
        break;

    default:
        break;
}



if (invoices_field_id('advance', $id) > 0 ) {
    array_push($error, "If there are already payments on the invoice it can't be edited");
}


################################################################################

if (!$error) {

    $invoices = invoices_details($id);

    $addresses_billing = json_decode($invoices['addresses_billing'], true);

    $addresses_delivery = json_decode($invoices['addresses_delivery'], true);
    
    
    ############################################################################
    ############################################################################
    ############################################################################
//
//
//    $level = null ;
//    $date = null ;
//    //$u_id
//    //$u_rol , 
//    //$c , $a , 
//    $w = null ;
//    $description = "Open to edit" ;
//
//    $doc_id = $id ;
//    $crud = "update" ;
//    $error = null ;
//    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null ;
//    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null ;
//    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null ;
//    $ip4 = get_user_ip() ;
//    $ip6 = get_user_ip6() ;
//    $broswer = json_encode(get_user_browser()) ; //https://www.php.net/manual/es/function.get-browser.php
//
//    logs_add(
//            $level , $date , $u_id , $u_rol , $c , $a , $w ,
//            $description , $doc_id , $crud , $error ,
//            $val_get , $val_post , $val_request , $ip4 , $ip6 , $broswer
//    ) ;
    ############################################################################
    ############################################################################
    ############################################################################     
    
    
    
    
    
    
    
    

    include view("invoices", "edit");
} else {

    include view("home", "pageError");
}
