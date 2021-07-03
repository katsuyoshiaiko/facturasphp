<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


//include "www/_diccionario/views/search_advanced.php";
include view("_diccionario", "search_advanced");      
