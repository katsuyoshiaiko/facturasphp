<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


//include "www/budget_lines/views/search_advanced.php";
include view("budget_lines", "search_advanced");      
