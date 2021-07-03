<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


//include "www/invoice_status/views/search_advanced.php";
include view("invoice_status", "search_advanced");      
