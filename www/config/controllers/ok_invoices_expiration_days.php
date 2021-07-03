<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$data = (isset($_REQUEST["data"])) ? clean($_REQUEST["data"]) : false;

$error = array();


if (!$data) {
    array_push($error, "Data not send");
}

if (!is_numeric($data)) {
    array_push($error, "Data is not a number");
}

if ($data < 0) {
    array_push($error, "Data must be positive");
}


// les pasamos a un valor redondo, sin decimales
$data = intval($data);




################################################################################
if (!$error) {

    
    // si no existe esa opcion la agregamos 
    if (!_options_option("config_invoices_expiration_days")) {

        _options_add("config_invoices_expiration_days", $data, 10);
    }else{
        //config_option_data_update("config_invoices_expiration_days", $data);
        _options_update('config_invoices_expiration_days', $data); 
    }


    

    header("Location: index.php?c=config&a=invoices_expiration_days&sms=1");
    
} else {
    
    include view('home', 'pageError');
}

    