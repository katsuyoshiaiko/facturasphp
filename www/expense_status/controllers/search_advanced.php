<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


//include "www/expense_status/views/search_advanced.php";
include view("expense_status", "search_advanced");      
