<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$tva = (isset($_REQUEST["tva"])) ? clean($_REQUEST["tva"]) : false ;

$error = array();


if( ! $tva || $tva == '' ){
    array_push($error, "Vat not send"); 
}
// si existen facturas ya no se puede cambiar de TVA
if( invoices_list() ){
    array_push($error, "If there are invoices you can no longer change your VAT"); 
}

$tva = tva_formated($tva); 


################################################################################
if ( !$error ) {    
   
    _options_update('config_company_tva', $tva); 
    
    header("Location: index.php?c=config&a=tva&sms=1"); 
        
}else{
    include view('home', 'pageError');
}

    