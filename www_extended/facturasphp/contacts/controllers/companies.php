<?php

if (!permissions_has_permission($u_rol, "companies", "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();

$contacts_list = null;

$companies_list = companies_list();



include view("contacts", "companies");

if ($debug) {
   
    include view("contacts", "debug");
    
   
}
