<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

$addresses_transport = null;

$addresses_transport = addresses_transport_list();

//include "www/addresses_transport/views/export_json.php";
include view("addresses_transport", "export_json");  
if ($debug) {
    include "www/addresses_transport/views/debug.php";
}