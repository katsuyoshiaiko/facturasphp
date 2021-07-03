<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

//include "www/rols_status/views/add.php";
include view("rols_status", "add");                 
