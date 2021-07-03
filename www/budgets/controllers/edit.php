<?php

if ( ! permissions_has_permission($u_rol , $c , "update") ) {
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
################################################################################
################################################################################

if ( $a != "edit" ) {
    array_push($error , "Action format error") ;
}
if ( ! budgets_is_id($id) ) {
    array_push($error , "ID format error") ;
}

if ( budgets_field_id("status" , $id) == 30 ) {
    array_push($error , "Budget already acepted") ;
}

if ( budgets_field_id("status" , $id) == 40 ) {
    array_push($error , "Budget already rejected by customer") ;
}

if ( budgets_field_id("status" , $id) == -10 ) {
    array_push($error , "Budget already cancel") ;
}

################################################################################
if ( ! $error ) {

    $budgets = budgets_details($id) ;
    $owner_id = contacts_field_id("owner_id" , budgets_field_id("client_id" , $id)) ;
    $addresses_billing = json_decode($budgets['addresses_billing'] , true) ;
    $addresses_delivery = json_decode($budgets['addresses_delivery'] , true) ;

    include view("budgets" , "edit") ;
    
    
    
    ############################################################################
    ############################################################################
    ############################################################################
   // $id = $budget_id ;

    $level = null ;
    $date = null ;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null ;
    $description = "Open budget to edit id: ($id)" ;
    $doc_id = $id ;
    $crud = "edit" ;
    $error = null ;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null ;
    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null ;
    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null ;
    $ip4 = get_user_ip() ;
    $ip6 = get_user_ip6() ;
    $broswer = json_encode(get_user_browser()) ; //https://www.php.net/manual/es/function.get-browser.php

    logs_add(
            $level , $date , $u_id , $u_rol , $c , $a , $w ,
            $description , $doc_id , $crud , $error ,
            $val_get , $val_post , $val_request , $ip4 , $ip6 , $broswer
    ) ;
    ############################################################################
    ############################################################################
    ############################################################################ 
    
    
    
    
    
    
    
    
} else {

    include view("home" , "pageError") ;
}

