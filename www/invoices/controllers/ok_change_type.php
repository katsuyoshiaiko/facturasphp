<?php

if ( ! permissions_has_permission($u_rol , $c , "update") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}

$invoice_id = (isset($_GET['invoice_id']) && $_GET['invoice_id'] != "") ? $_GET['invoice_id'] : false ;
$type = "M"; 
$error = array() ;

################################################################################
if ( ! $invoice_id ) {
    array_push($error , '$invoice_id not send') ;
}
if ( ! is_id($invoice_id) ) {
    array_push($error , '$invoice_id format error') ;
}
################################################################################
if( invoices_field_id("type", $invoice_id) != null ){
    array_push($error , 'Invoice already has a type') ;
}






if ( ! $error ) {
    
    invoices_update_type($invoice_id, $type); 
    
    ############################################################################
    ############################################################################
    ############################################################################
    //$id = $invoice_id; 
        
    $level = null ;
    $date = null ;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null ;
    $description = "Change invoice : [$invoice_id] to type : [$type]";
    $doc_id = $invoice_id ;
    $crud = "update" ;
    $error = null ;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null ;
    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null ;
    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null ;
    $ip4 = get_user_ip() ;
    $ip6 = get_user_ip6() ;
    $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php

    logs_add(
            $level , $date , $u_id , $u_rol , $c , $a , $w ,
            $description , $doc_id , $crud , $error ,
            $val_get , $val_post , $val_request , $ip4 , $ip6 , $broswer
    ) ;
    ############################################################################
    ############################################################################
    ############################################################################  
    
    

    header("Location: index.php?c=invoices&a=edit&id=$invoice_id") ;
} else {
   
    include view("home", "pageError");
}
