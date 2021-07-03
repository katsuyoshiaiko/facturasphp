<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


//include "www/rols_status/views/search_advanced.php";
include view("rols_status", "search_advanced");      
