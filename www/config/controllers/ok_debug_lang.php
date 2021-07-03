<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$status = (isset($_REQUEST["status"])) ? clean($_REQUEST["status"]) : false ;



$error = array();

if( ! $status ){
    array_push($error, "status not send"); 
}


################################################################################
################################################################################
################################################################################
if ( !$error ) {
    
    if( $status == "true" ){
        // change to false
       // _options_update('debug_lang', 0);
        
    }else{
        // change to true
      //  _options_update('debug_lang', 1);
    }
    
   // header("Location index.php?c=config&a=debug_lang"); 
    
    
}








