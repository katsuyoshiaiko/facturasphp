<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
################################################################################

if ( $u_rol != 'root' ) {
    array_push($error, 'You are not root');
}
################################################################################


if ( !$error) {
    
    _options_update("debug", 1); 
    


    header("Location: index.php?c=_options");
         
}else{
    
    include view("home", "pageError");  
}


