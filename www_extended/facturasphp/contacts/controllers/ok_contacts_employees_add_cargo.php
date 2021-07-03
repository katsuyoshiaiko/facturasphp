<?php

if ( ! permissions_has_permission($u_rol , "patients" , "create") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}


$company_id = (isset($_POST['company_id'])) ? clean($_POST['company_id']) : false; 
$contact_id = (isset($_POST['contact_id'])) ? clean($_POST['contact_id']) : false; 
$owner_ref = (isset($_POST['owner_ref'])) ? clean($_POST['owner_ref']) : null; 
$cargo = (isset($_POST['cargo'])) ? clean($_POST['cargo']) : false; 


$error = array() ;

################################################################################
if ( ! $company_id ) {
    array_push($error , '$company_id dont send') ;
}

if ( ! $contact_id ) {
    array_push($error , '$contact_id dont send') ;
}

if ( ! $cargo ) {
    array_push($error , '$cargo dont send') ;
}
################################################################################
if ( ! is_id($company_id) ) {
    array_push($error , '$company_id format error') ;
}

if ( ! is_id($contact_id) ) {
    array_push($error , '$contact_id format error') ;
}


################################################################################
if ( ! $error ) {


    employees_add(
            $company_id, $contact_id, $owner_ref, null, $cargo, 1, 1
            );
    
    
    
    ############################################################################
    $level = null ;
    $date = null ;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null ;
    $description = "Add contact [$contact_id] like employee  in company [$company_id]"; 
    $doc_id = $contact_id ;
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



    header("Location: index.php?c=contacts&a=contacts&id=$company_id") ;
} else {

    include view("home" , "pageError") ;
}

