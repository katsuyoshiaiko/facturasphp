<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();
################################################################################
################################################################################
################################################################################
if (!$error) {
    
    
    include view('config', "debug_lang"); 
    
    
}

//$_options = _options_details($id);

//include view("_options", "index");
