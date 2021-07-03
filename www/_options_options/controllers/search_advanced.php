<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


//include "www/_options_options/views/search_advanced.php";
include view("_options_options", "search_advanced");      
