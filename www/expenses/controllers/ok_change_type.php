<?php

if ( ! permissions_has_permission($u_rol , $c , "update") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}

$expense_id = (isset($_GET['expense_id']) && $_GET['expense_id'] != "") ? $_GET['expense_id'] : false ;
$type = "M"; 
$error = array() ;

################################################################################
if ( ! $expense_id ) {
    array_push($error , '$expense_id not send') ;
}
if ( ! is_id($expense_id) ) {
    array_push($error , '$expense_id format error') ;
}
################################################################################
if( expenses_field_id("type", $expense_id) != null ){
    array_push($error , 'Invoice already has a type') ;
}






if ( ! $error ) {
    
    expenses_update_type($expense_id, $type); 
    
    ############################################################################
    ############################################################################
    ############################################################################
    //$id = $expense_id; 
        
    $level = null ;
    $date = null ;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null ;
    $description = "Change expense [$expense_id] type to: [$type]";
    $doc_id = $expense_id ;
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
    
    

    header("Location: index.php?c=expenses&a=edit&id=$expense_id") ;
} else {
   
    include view("home", "pageError");
}
