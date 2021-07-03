<?php

if ( ! permissions_has_permission($u_rol , $c , "read") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false ;

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

if ( ! expenses_field_id("*" , $id) ) {
    array_push($error , "id not exist") ;
}



if ( ! $error ) {

    $expenses = expenses_details($id) ;

    $addresses_billing = json_decode($expenses['addresses_billing'] , true) ;

    $addresses_delivery = json_decode($expenses['addresses_delivery'] , true) ;

    
    include view("expenses" , "details") ;
    
    
    ############################################################################
    ############################################################################
    ############################################################################
    $level = null ;
    $date = null ;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null ;
    $description = "See order details: $id";
    $doc_id = $id ;
    $crud = "read" ;
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
    
    
    
    
} else {
   
    include view("home", "pageError");
}
