<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$web = (isset($_REQUEST["web"])) ? clean($_REQUEST["web"]) : false ;

$error = array();


if( ! $web ){
    array_push($error, "Url not send"); 
}

//if( ! is_url($web) ){
//    array_push($error, "Url not send"); 
//}



################################################################################
if ( !$error ) {
    
   
    //config_web_update($web);
    _options_update('config_company_url', $web); 
    
    header("Location: index.php?c=config&a=web&sms=1"); 
        
}else{
    include view('home', 'pageError');
}

    